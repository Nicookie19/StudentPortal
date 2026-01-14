@extends('layouts.admin-portal')

@section('title', 'Schedule Details')

@section('content')
<div class="page-header">
    <div>
        <h2>Schedule Details</h2>
        <p>View class schedule information</p>
    </div>
    <div class="page-header-actions">
        <a href="{{ route('admin.schedules.index') }}" class="btn-secondary">← Back to Schedules</a>
        <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="btn-primary">Edit Schedule</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="detail-grid">
            <div class="detail-item">
                <span class="detail-label">Subject</span>
                <span class="detail-value">
                    <strong>{{ $schedule->subject->subject_code }}</strong><br>
                    {{ $schedule->subject->subject_name }}
                </span>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Day</span>
                <span class="detail-value">{{ $schedule->day_of_week }}</span>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Time</span>
                <span class="detail-value">{{ $schedule->formatted_time }}</span>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Room</span>
                <span class="detail-value">{{ $schedule->room ?? 'TBA' }}</span>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Section</span>
                <span class="detail-value">{{ $schedule->section ?? 'All' }}</span>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Semester</span>
                <span class="detail-value">{{ $schedule->semester ?? 'N/A' }}</span>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Academic Year</span>
                <span class="detail-value">{{ $schedule->academic_year ?? 'N/A' }}</span>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Enrolled Students</h3>
    </div>
    <div class="card-body">
        @if($schedule->enrollments && $schedule->enrollments->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedule->enrollments as $enrollment)
                        <tr>
                            <td>{{ $enrollment->student->student_id }}</td>
                            <td>{{ $enrollment->student->first_name }} {{ $enrollment->student->last_name }}</td>
                            <td>
                                @if($enrollment->status == 'enrolled')
                                    <span class="badge badge-success">Enrolled</span>
                                @elseif($enrollment->status == 'completed')
                                    <span class="badge badge-info">Completed</span>
                                @else
                                    <span class="badge badge-warning">Dropped</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="text-align: center; padding: 20px; color: var(--text-secondary);">No students enrolled in this schedule.</p>
        @endif
    </div>
</div>
@endsection

