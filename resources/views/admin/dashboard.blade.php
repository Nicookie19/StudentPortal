@extends('layouts.admin-portal')

@section('title', 'Admin Dashboard')

@section('content')
<div class="page-header">
    <div>
        <h2>Admin Dashboard</h2>
        <p>Welcome to the admin control panel</p>
    </div>
</div>

<!-- Stats Grid -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon blue">👨‍🎓</div>
        <div class="stat-info">
            <h4>Total Students</h4>
            <p>{{ $stats['total_students'] }}</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green">📚</div>
        <div class="stat-info">
            <h4>Total Subjects</h4>
            <p>{{ $stats['total_subjects'] }}</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon yellow">📅</div>
        <div class="stat-info">
            <h4>Schedules</h4>
            <p>{{ $stats['total_schedules'] }}</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon purple">📝</div>
        <div class="stat-info">
            <h4>Enrollments</h4>
            <p>{{ $stats['total_enrollments'] }}</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Quick Actions</h3>
    </div>
    <div class="btn-group">
        <a href="{{ route('admin.students.create') }}" class="btn-primary">+ Add New Student</a>
        <a href="{{ route('admin.subjects.create') }}" class="btn-secondary">+ Add New Subject</a>
        <a href="{{ route('admin.schedules.create') }}" class="btn-secondary">+ Add New Schedule</a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Recent Students</h3>
        <a href="{{ route('admin.students.index') }}" class="btn-secondary btn-sm">View All</a>
    </div>
    @if($recent_students->count() > 0)
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Year Level</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recent_students as $student)
                        <tr>
                            <td>{{ $student->student_id }}</td>
                            <td>{{ $student->full_name }}</td>
                            <td>{{ $student->department->name ?? 'N/A' }}</td>
                            <td>{{ $student->year_level ?? 'N/A' }}</td>
                            <td>
                                <span class="badge badge-success">{{ $student->status }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
<p style="color: var(--text-secondary);">No students found. <a href="{{ route('admin.students.create') }}" style="color: var(--accent-color);">Add your first student</a></p>
    @endif
</div>

<div class="card">
    <div class="card-header">
        <h3>Departments Overview</h3>
        <a href="{{ route('admin.departments.index') }}" class="btn-secondary btn-sm">Manage</a>
    </div>
    @if($departments->count() > 0)
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Department</th>
                        <th>Code</th>
                        <th>Students</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <td>{{ $department->name }}</td>
                            <td>{{ $department->code }}</td>
                            <td>{{ $department->students_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p style="color: var(--text-secondary);">No departments found. Add departments to organize your subjects and students.</p>
    @endif
</div>
@endsection

