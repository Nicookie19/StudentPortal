@extends('layouts.admin-portal')

@section('title', 'Manage Students')

@section('content')
<div class="page-header">
    <div>
        <h2>Students Management</h2>
        <p>Manage all registered students (30 students per year level)</p>
    </div>
    <div class="page-header-actions">
        <a href="{{ route('admin.students.create') }}" class="btn-primary">+ Add New Student</a>
    </div>
</div>

<!-- Search and Filters -->
<div class="card">
    <form method="GET" action="{{ route('admin.students.index') }}" class="search-bar" style="margin-bottom: 0;">
        <input type="text" name="search" class="form-control" placeholder="Search by name or student ID..." value="{{ request('search') }}">
        
        <select name="department" class="form-control" style="width: 200px;">
            <option value="">All Departments</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}" {{ request('department') == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                </option>
            @endforeach
        </select>
        
        <select name="status" class="form-control" style="width: 150px;">
            <option value="">All Status</option>
            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            <option value="graduated" {{ request('status') == 'graduated' ? 'selected' : '' }}>Graduated</option>
        </select>
        
        <button type="submit" class="btn-primary">Search</button>
        <a href="{{ route('admin.students.index') }}" class="btn-secondary">Reset</a>
    </form>
</div>

<!-- Year Level Navigation -->
<div class="card">
    <div class="card-header">
        <h3>👥 Enrolled Students by Year Level</h3>
        <span class="card-icon">👨‍🎓</span>
    </div>
    
    <!-- Year Level Tabs -->
    <div style="display: flex; gap: 8px; margin-bottom: 20px; flex-wrap: wrap;">
        @foreach($yearLevels as $index => $yearLevel)
            <a href="#year-{{ str_replace(' ', '-', $yearLevel) }}" class="tab-btn {{ $index === 0 ? 'active' : '' }}">
                {{ $yearLevel }}
                <span class="badge badge-primary" style="margin-left: 4px;">
                    {{ $studentsByYear[$yearLevel]->count() }}
                </span>
            </a>
        @endforeach
    </div>

    <!-- Students by Year Level -->
    @foreach($yearLevels as $index => $yearLevel)
        <div id="year-{{ str_replace(' ', '-', $yearLevel) }}" class="year-section" style="margin-bottom: 30px;">
            <div class="section-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                <h4 style="color: var(--primary-color); margin: 0;">
                    📚 {{ $yearLevel }} Students
                    <span style="font-size: 0.8em; color: var(--text-secondary);">(Showing {{ $studentsByYear[$yearLevel]->count() }} of 30)</span>
                </h4>
                <span class="badge badge-info">{{ $studentsByYear[$yearLevel]->count() }} Students</span>
            </div>
            
            @if($studentsByYear[$yearLevel]->count() > 0)
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentsByYear[$yearLevel] as $student)
                                <tr>
                                    <td>{{ $student->student_id }}</td>
                                    <td>{{ $student->full_name }}</td>
                                    <td>{{ $student->user->email ?? 'N/A' }}</td>
                                    <td>{{ $student->department->name ?? 'N/A' }}</td>
                                    <td>
                                        @if($student->status == 'active')
                                            <span class="badge badge-success">Active</span>
                                        @elseif($student->status == 'inactive')
                                            <span class="badge badge-warning">Inactive</span>
                                        @else
                                            <span class="badge badge-info">{{ $student->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <a href="{{ route('admin.students.show', $student->id) }}" class="action-btn view">View</a>
                                            <a href="{{ route('admin.students.edit', $student->id) }}" class="action-btn edit">Edit</a>
                                            <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="action-btn delete" onclick="return confirmDelete('Are you sure you want to delete this student?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div style="text-align: center; padding: 40px; color: var(--text-secondary); background: var(--bg-secondary); border-radius: 8px;">
                    <p>No students found in this year level.</p>
                </div>
            @endif
        </div>
    @endforeach
</div>

<!-- Summary Stats -->
<div class="card-grid" style="margin-top: 20px;">
    <div class="card">
        <div class="card-header">
            <h3>📊 Student Statistics</h3>
        </div>
        <ul>
            <li><strong>Total Students Displayed:</strong> {{ $totalDisplayed }}</li>
            <li><strong>Students per Year Level:</strong> 30 max</li>
            <li><strong>Departments:</strong> {{ $departments->count() }}</li>
        </ul>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>📚 By Year Level</h3>
        </div>
        <ul>
            @foreach($yearLevels as $yearLevel)
                <li>
                    <strong>{{ $yearLevel }}:</strong> 
                    {{ $studentsByYear[$yearLevel]->count() }} students
                    @if($studentsByYear[$yearLevel]->count() >= 30)
                        <span class="badge badge-success">Max Reached</span>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    // Smooth scroll for year level tabs
    document.querySelectorAll('.tab-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            document.querySelector(targetId).scrollIntoView({
                behavior: 'smooth'
            });
            
            // Update active tab
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>
@endsection

