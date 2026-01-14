@extends('layouts.portal')

@section('title', 'Class Schedules - Student Portal')

@section('content')
    <div class="page-header">
        <h2>Class Schedules</h2>
        <p>View all class schedules organized by day</p>
    </div>

    <!-- Schedule by Day -->
    @foreach($days as $day)
        @if($schedulesByDay[$day]->count() > 0)
            <div class="card" style="margin-bottom: 16px;">
                <div class="card-header" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);">
                    <h3 style="color: white;">📅 {{ $day }}</h3>
                    <span style="color: rgba(255,255,255,0.8);">{{ $schedulesByDay[$day]->count() }} classes</span>
                </div>
                <table class="info-table" style="margin-top: 0;">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Subject</th>
                            <th>Section</th>
                            <th>Room</th>
                            <th>Semester</th>
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
                                <td style="text-align: center;">{{ $schedule->room }}</td>
                                <td>{{ $schedule->semester }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endforeach

    @if($schedules->count() == 0)
        <div class="card">
            <div style="text-align: center; padding: 40px; color: var(--text-secondary);">
                <p>No schedules available.</p>
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

