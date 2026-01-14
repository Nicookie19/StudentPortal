@extends('layouts.admin-portal')

@section('title', 'Subject Details')

@section('content')
<div class="page-header">
    <div>
        <h2>Subject Details</h2>
        <p>{{ $subject->subject_code }} - {{ $subject->subject_name }}</p>
    </div>
    <div class="page-header-actions">
        <a href="{{ route('admin.subjects.edit', $subject->id) }}" class="btn-primary">Edit Subject</a>
        <a href="{{ route('admin.subjects.index') }}" class="btn-secondary">Back to List</a>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon blue">📅</div>
        <div class="stat-info">
            <h4>Schedules</h4>
            <p>{{ $subject->schedules->count() }}</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green">👨‍🎓</div>
        <div class="stat-info">
            <h4>Enrolled Students</h4>
            <p>{{ $subject->enrollments->count() }}</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Subject Information</h3>
    </div>
    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
        <div>
            <p style="color: var(--text-secondary); font-size: 0.85rem;">Subject Code</p>
            <p style="font-weight: 600;">{{ $subject->subject_code }}</p>
        </div>
        <div>
            <p style="color: var(--text-secondary); font-size: 0.85rem;">Subject Name</p>
            <p style="font-weight: 600;">{{ $subject->subject_name }}</p>
        </div>
        <div>
            <p style="color: var(--text-secondary); font-size: 0.85rem;">Units</p>
            <p style="font-weight: 600;">{{ $subject->units }} units</p>
        </div>
        <div>
            <p style="color: var(--text-secondary); font-size: 0.85rem;">Type</p>
            <span class="badge badge-info">{{ ucfirst($subject->type) }}</span>
        </div>
        <div>
            <p style="color: var(--text-secondary); font-size: 0.85rem;">Department</p>
            <p style="font-weight: 600;">{{ $subject->department->name ?? 'N/A' }}</p>
        </div>
        <div>
            <p style="color: var(--text-secondary); font-size: 0.85rem;">Recommended Semester</p>
            <p style="font-weight: 600;">{{ $subject->semester ? 'Semester ' . $subject->semester : 'N/A' }}</p>
        </div>
        <div style="grid-column: span 2;">
            <p style="color: var(--text-secondary); font-size: 0.85rem;">Prerequisites</p>
            <p style="font-weight: 600;">{{ $subject->prerequisites ?? 'None' }}</p>
        </div>
        <div style="grid-column: span 2;">
            <p style="color: var(--text-secondary); font-size: 0.85rem;">Description</p>
            <p>{{ $subject->description ?? 'No description provided.' }}</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Schedules</h3>
        <a href="{{ route('admin.schedules.create') }}" class="btn-secondary btn-sm">+ Add Schedule</a>
    </div>
    @if($subject->schedules->count() > 0)
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Room</th>
                        <th>Section</th>
                        <th>Semester</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subject->schedules as $schedule)
                        <tr>
                            <td>{{ $schedule->day_of_week }}</td>
                            <td>{{ $schedule->formatted_time }}</td>
                            <td>{{ $schedule->room ?? 'TBA' }}</td>
                            <td>{{ $schedule->section ?? 'All' }}</td>
                            <td>{{ $schedule->semester ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p style="color: var(--text-secondary);">No schedules assigned to this subject.</p>
    @endif
</div>

<div class="card">
    <div class="card-header">
        <h3>Enrolled Students</h3>
    </div>
    @if($subject->enrollments->count() > 0)
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Semester</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subject->enrollments as $enrollment)
                        <tr>
                            <td>{{ $enrollment->student->student_id }}</td>
                            <td>{{ $enrollment->student->full_name }}</td>
                            <td>{{ $enrollment->semester }} - {{ $enrollment->academic_year }}</td>
                            <td>
                                <span class="badge badge-success">{{ $enrollment->status }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p style="color: var(--text-secondary);">No students enrolled in this subject.</p>
    @endif
</div>
@endsection

