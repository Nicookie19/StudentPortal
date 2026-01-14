@extends('layouts.admin-portal')

@section('title', 'Manage Enrollments')

@section('content')
<div class="page-header">
    <div>
        <h2>Enrollments Management</h2>
        <p>Manage student course enrollments and grades</p>
    </div>
    <div class="page-header-actions">
        <button class="btn-primary" onclick="document.getElementById('addModal').classList.add('active')">+ Enroll Student</button>
    </div>
</div>

<!-- Add Enrollment Modal -->
<div id="addModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Enroll Student in Subject</h3>
            <button onclick="document.getElementById('addModal').classList.remove('active')" style="background: none; border: none; color: var(--text-primary); cursor: pointer; font-size: 1.5rem;">&times;</button>
        </div>
        <form method="POST" action="{{ route('admin.enrollments.store') }}">
            @csrf
            <div class="form-group">
                <label for="student_id">Student *</label>
                <select id="student_id" name="student_id" class="form-control @error('student_id') is-invalid @enderror" required>
                    <option value="">Select a student</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                            {{ $student->student_id }} - {{ $student->first_name }} {{ $student->last_name }}
                        </option>
                    @endforeach
                </select>
                @error('student_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="subject_id">Subject *</label>
                <select id="subject_id" name="subject_id" class="form-control @error('subject_id') is-invalid @enderror" required>
                    <option value="">Select a subject</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                            {{ $subject->subject_code }} - {{ $subject->subject_name }}
                        </option>
                    @endforeach
                </select>
                @error('subject_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="semester">Semester *</label>
                <select id="semester" name="semester" class="form-control @error('semester') is-invalid @enderror" required>
                    <option value="1st Semester" {{ old('semester') == '1st Semester' ? 'selected' : '' }}>1st Semester</option>
                    <option value="2nd Semester" {{ old('semester') == '2nd Semester' ? 'selected' : '' }}>2nd Semester</option>
                    <option value="Summer" {{ old('semester') == 'Summer' ? 'selected' : '' }}>Summer</option>
                </select>
                @error('semester')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="academic_year">Academic Year *</label>
                <input type="text" id="academic_year" name="academic_year" class="form-control @error('academic_year') is-invalid @enderror" 
                       value="{{ old('academic_year', '2024-2025') }}" required placeholder="e.g., 2024-2025">
                @error('academic_year')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Status *</label>
                <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" required>
                    <option value="enrolled" {{ old('status') == 'enrolled' ? 'selected' : '' }}>Enrolled</option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="dropped" {{ old('status') == 'dropped' ? 'selected' : '' }}>Dropped</option>
                </select>
                @error('status')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="document.getElementById('addModal').classList.remove('active')">Cancel</button>
                <button type="submit" class="btn-primary">Enroll Student</button>
            </div>
        </form>
    </div>
</div>

<!-- Filters -->
<div class="card">
    <form method="GET" action="{{ route('admin.enrollments.index') }}" class="search-bar" style="margin-bottom: 0;">
        <select name="student" class="form-control" style="width: 200px;">
            <option value="">All Students</option>
            @foreach($students as $student)
                <option value="{{ $student->id }}" {{ request('student') == $student->id ? 'selected' : '' }}>
                    {{ $student->first_name }} {{ $student->last_name }}
                </option>
            @endforeach
        </select>
        
        <select name="subject" class="form-control" style="width: 200px;">
            <option value="">All Subjects</option>
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ request('subject') == $subject->id ? 'selected' : '' }}>
                    {{ $subject->subject_code }}
                </option>
            @endforeach
        </select>
        
        <select name="semester" class="form-control" style="width: 150px;">
            <option value="">All Semesters</option>
            <option value="1st Semester" {{ request('semester') == '1st Semester' ? 'selected' : '' }}>1st Semester</option>
            <option value="2nd Semester" {{ request('semester') == '2nd Semester' ? 'selected' : '' }}>2nd Semester</option>
            <option value="Summer" {{ request('semester') == 'Summer' ? 'selected' : '' }}>Summer</option>
        </select>
        
        <button type="submit" class="btn-primary">Filter</button>
        <a href="{{ route('admin.enrollments.index') }}" class="btn-secondary">Reset</a>
    </form>
</div>

<div class="card">
    <div class="table-container">
        @if($enrollments->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Subject</th>
                        <th>Semester</th>
                        <th>Academic Year</th>
                        <th>Status</th>
                        <th>Grade</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enrollments as $enrollment)
                        <tr>
                            <td>
                                <strong>{{ $enrollment->student->first_name }} {{ $enrollment->student->last_name }}</strong><br>
                                <span style="font-size: 0.85rem; color: var(--text-secondary);">{{ $enrollment->student->student_id }}</span>
                            </td>
                            <td>
                                <strong>{{ $enrollment->subject->subject_code }}</strong><br>
                                <span style="font-size: 0.85rem; color: var(--text-secondary);">{{ $enrollment->subject->subject_name }}</span>
                            </td>
                            <td>{{ $enrollment->semester }}</td>
                            <td>{{ $enrollment->academic_year }}</td>
                            <td>
                                @if($enrollment->status == 'enrolled')
                                    <span class="badge badge-success">Enrolled</span>
                                @elseif($enrollment->status == 'completed')
                                    <span class="badge badge-info">Completed</span>
                                @else
                                    <span class="badge badge-warning">Dropped</span>
                                @endif
                            </td>
                            <td>
                                @if($enrollment->grade)
                                    <strong>{{ $enrollment->grade }}</strong>
                                @else
                                    <span style="color: var(--text-secondary);">-</span>
                                @endif
                            </td>
                            <td>
                                <div class="actions">
                                    <button type="button" class="action-btn edit" onclick="openEditModal({{ $enrollment->id }}, '{{ $enrollment->status }}', {{ $enrollment->grade ?? 'null' }})">Update Grade</button>
                                    <form action="{{ route('admin.enrollments.destroy', $enrollment->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete" onclick="return confirmDelete('Are you sure you want to delete this enrollment?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            {{ $enrollments->links() }}
        @else
            <div style="text-align: center; padding: 40px; color: var(--text-secondary);">
                <p>No enrollments found.</p>
                <button class="btn-primary" style="margin-top: 16px;" onclick="document.getElementById('addModal').classList.add('active')">Enroll First Student</button>
            </div>
        @endif
    </div>
</div>

<!-- Edit Grade Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Update Enrollment</h3>
            <button onclick="document.getElementById('editModal').classList.remove('active')" style="background: none; border: none; color: var(--text-primary); cursor: pointer; font-size: 1.5rem;">&times;</button>
        </div>
        <form method="POST" id="editForm">
            @csrf
            @method('PUT')
            <input type="hidden" name="status" id="editStatus" value="enrolled">
            <div class="form-group">
                <label for="grade">Grade (0-100)</label>
                <input type="number" id="editGrade" name="grade" class="form-control @error('grade') is-invalid @enderror" 
                       min="0" max="100" step="1" placeholder="Enter grade (leave empty if not yet graded)">
                @error('grade')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="document.getElementById('editModal').classList.remove('active')">Cancel</button>
                <button type="submit" class="btn-primary">Update Enrollment</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function openEditModal(id, status, grade) {
    document.getElementById('editForm').action = '/admin/enrollments/' + id;
    document.getElementById('editStatus').value = status;
    document.getElementById('editGrade').value = grade || '';
    document.getElementById('editModal').classList.add('active');
}
</script>
@endpush
@endsection

