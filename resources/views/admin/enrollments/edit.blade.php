@extends('layouts.admin-portal')

@section('title', 'Edit Enrollment')

@section('content')
<div class="page-header">
    <div>
        <h2>Edit Enrollment</h2>
        <p>Update enrollment details and grades</p>
    </div>
    <div class="page-header-actions">
        <a href="{{ route('admin.enrollments.index') }}" class="btn-secondary">← Back to Enrollments</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.enrollments.update', $enrollment->id) }}">
            @csrf
            @method('PUT')
            
            <div class="detail-grid" style="margin-bottom: 24px;">
                <div class="detail-item">
                    <span class="detail-label">Student</span>
                    <span class="detail-value">{{ $enrollment->student->first_name }} {{ $enrollment->student->last_name }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Student ID</span>
                    <span class="detail-value">{{ $enrollment->student->student_id }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Subject</span>
                    <span class="detail-value">{{ $enrollment->subject->subject_code }} - {{ $enrollment->subject->subject_name }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Semester</span>
                    <span class="detail-value">{{ $enrollment->semester }}</span>
                </div>
            </div>

            <div class="form-group">
                <label for="grade">Grade (0-100)</label>
                <input type="number" id="grade" name="grade" class="form-control @error('grade') is-invalid @enderror" 
                       value="{{ old('grade', $enrollment->grade) }}" min="0" max="100" step="1" 
                       placeholder="Enter grade (leave empty if not yet graded)">
                @error('grade')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
                <small style="color: var(--text-secondary);">Leave empty if the subject is not yet completed.</small>
            </div>

            <div class="form-group">
                <label for="status">Status *</label>
                <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" required>
                    <option value="enrolled" {{ $enrollment->status == 'enrolled' ? 'selected' : '' }}>Enrolled</option>
                    <option value="completed" {{ $enrollment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="dropped" {{ $enrollment->status == 'dropped' ? 'selected' : '' }}>Dropped</option>
                </select>
                @error('status')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('admin.enrollments.index') }}" class="btn-secondary">Cancel</a>
                <button type="submit" class="btn-primary">Update Enrollment</button>
            </div>
        </form>
    </div>
</div>
@endsection

