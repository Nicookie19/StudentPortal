@extends('layouts.admin-portal')

@section('title', 'Manage Schedules')

@section('content')
<div class="page-header">
    <div>
        <h2>Schedules Management</h2>
        <p>Manage class schedules and time slots</p>
    </div>
    <div class="page-header-actions">
        <a href="{{ route('admin.schedules.create') }}" class="btn-primary">+ Add New Schedule</a>
    </div>
</div>

<!-- Search and Filters -->
<div class="card">
    <form method="GET" action="{{ route('admin.schedules.index') }}" class="search-bar" style="margin-bottom: 0;">
        <input type="text" name="search" class="form-control" placeholder="Search by subject..." value="{{ request('search') }}">
        
        <select name="day" class="form-control" style="width: 150px;">
            <option value="">All Days</option>
            @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                <option value="{{ $day }}" {{ request('day') == $day ? 'selected' : '' }}>{{ $day }}</option>
            @endforeach
        </select>
        
        <select name="semester" class="form-control" style="width: 150px;">
            <option value="">All Semesters</option>
            <option value="1st Semester" {{ request('semester') == '1st Semester' ? 'selected' : '' }}>1st Semester</option>
            <option value="2nd Semester" {{ request('semester') == '2nd Semester' ? 'selected' : '' }}>2nd Semester</option>
            <option value="Summer" {{ request('semester') == 'Summer' ? 'selected' : '' }}>Summer</option>
        </select>
        
        <button type="submit" class="btn-primary">Search</button>
        <a href="{{ route('admin.schedules.index') }}" class="btn-secondary">Reset</a>
    </form>
</div>

<!-- Schedule by Day (Portal Style) -->
@foreach($days as $day)
    @if($schedulesByDay[$day]->count() > 0)
        <div class="card" style="margin-bottom: 16px;">
            <div class="card-header" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);">
                <h3 style="color: white;">📅 {{ $day }}</h3>
                <span style="color: rgba(255,255,255,0.8);">{{ $schedulesByDay[$day]->count() }} classes</span>
            </div>
            <div class="table-container" style="margin-top: 0;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Subject</th>
                            <th>Section</th>
                            <th>Room</th>
                            <th>Semester</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schedulesByDay[$day] as $schedule)
                            <tr>
                                <td>
                                    <strong>{{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}</strong>
                                    -
                                    {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}
                                </td>
                                <td>
                                    <strong>{{ $schedule->subject->subject_code }}</strong><br>
                                    <span style="font-size: 0.85em; color: var(--text-secondary);">
                                        {{ $schedule->subject->subject_name }}
                                    </span>
                                </td>
                                <td style="text-align: center;">
                                    <span class="badge badge-primary">{{ $schedule->section }}</span>
                                </td>
                                <td style="text-align: center;">{{ $schedule->room ?? 'TBA' }}</td>
                                <td>{{ $schedule->semester ?? 'N/A' }}</td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="action-btn edit">Edit</a>
                                        <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn delete" onclick="return confirmDelete('Are you sure you want to delete this schedule?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endforeach

@if($schedules->count() == 0)
    <div class="card">
        <div style="text-align: center; padding: 40px; color: var(--text-secondary);">
            <p>No schedules available.</p>
            <a href="{{ route('admin.schedules.create') }}" class="btn-primary" style="margin-top: 16px;">Add First Schedule</a>
        </div>
    </div>
@endif

<!-- Summary -->
<div class="card-grid" style="margin-top: 20px;">
    <div class="card">
        <div class="card-header">
            <h3>📊 Schedule Summary</h3>
        </div>
        <ul>
            <li><strong>Total Classes:</strong> {{ $schedules->count() }}</li>
            <li><strong>Unique Days:</strong> {{ $schedules->pluck('day_of_week')->unique()->count() }}</li>
            <li><strong>Unique Subjects:</strong> {{ $schedules->pluck('subject_id')->unique()->count() }}</li>
        </ul>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>🕐 Time Distribution</h3>
        </div>
        <ul>
            <li><strong>Morning (8AM-12PM):</strong> {{ $schedules->filter(function($s) { return \Carbon\Carbon::parse($s->start_time)->hour < 12; })->count() }} classes</li>
            <li><strong>Afternoon (12PM-5PM):</strong> {{ $schedules->filter(function($s) { return \Carbon\Carbon::parse($s->start_time)->hour >= 12 && \Carbon\Carbon::parse($s->start_time)->hour < 17; })->count() }} classes</li>
            <li><strong>Evening (5PM+):</strong> {{ $schedules->filter(function($s) { return \Carbon\Carbon::parse($s->start_time)->hour >= 17; })->count() }} classes</li>
        </ul>
    </div>
</div>
@endsection

