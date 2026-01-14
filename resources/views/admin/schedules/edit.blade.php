@extends('layouts.admin-portal')

@section('title', 'Edit Schedule')

@section('content')
<div class="page-header">
    <div>
        <h2>Edit Schedule</h2>
        <p>Update class schedule details</p>
    </div>
    <div class="page-header-actions">
        <a href="{{ route('admin.schedules.index') }}" class="btn-secondary">← Back to Schedules</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.schedules.update', $schedule->id) }}">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="subject_id">Subject *</label>
                <select id="subject_id" name="subject_id" class="form-control @error('subject_id') is-invalid @enderror" required>
                    <option value="">Select a subject</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ $schedule->subject_id == $subject->id ? 'selected' : '' }}>
                            {{ $subject->subject_code }} - {{ $subject->subject_name }}
                        </option>
                    @endforeach
                </select>
                @error('subject_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group" style="flex: 1;">
                    <label for="day_of_week">Day of Week *</label>
                    <select id="day_of_week" name="day_of_week" class="form-control @error('day_of_week') is-invalid @enderror" required>
                        <option value="">Select a day</option>
                        @foreach($days as $day)
                            <option value="{{ $day }}" {{ $schedule->day_of_week == $day ? 'selected' : '' }}>{{ $day }}</option>
                        @endforeach
                    </select>
                    @error('day_of_week')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group" style="flex: 1;">
                    <label for="start_time">Start Time *</label>
                    <input type="time" id="start_time" name="start_time" class="form-control @error('start_time') is-invalid @enderror" 
                           value="{{ old('start_time', $schedule->start_time) }}" required>
                    @error('start_time')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group" style="flex: 1;">
                    <label for="end_time">End Time *</label>
                    <input type="time" id="end_time" name="end_time" class="form-control @error('end_time') is-invalid @enderror" 
                           value="{{ old('end_time', $schedule->end_time) }}" required>
                    @error('end_time')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group" style="flex: 1;">
                    <label for="room">Room</label>
                    <input type="text" id="room" name="room" class="form-control @error('room') is-invalid @enderror" 
                           value="{{ old('room', $schedule->room) }}" placeholder="e.g., Room 101">
                    @error('room')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group" style="flex: 1;">
                    <label for="section">Section</label>
                    <input type="text" id="section" name="section" class="form-control @error('section') is-invalid @enderror" 
                           value="{{ old('section', $schedule->section) }}" placeholder="e.g., A">
                    @error('section')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group" style="flex: 1;">
                    <label for="semester">Semester</label>
                    <select id="semester" name="semester" class="form-control @error('semester') is-invalid @enderror">
                        <option value="">Select semester</option>
                        <option value="1st Semester" {{ $schedule->semester == '1st Semester' ? 'selected' : '' }}>1st Semester</option>
                        <option value="2nd Semester" {{ $schedule->semester == '2nd Semester' ? 'selected' : '' }}>2nd Semester</option>
                        <option value="Summer" {{ $schedule->semester == 'Summer' ? 'selected' : '' }}>Summer</option>
                    </select>
                    @error('semester')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group" style="flex: 1;">
                    <label for="academic_year">Academic Year</label>
                    <input type="text" id="academic_year" name="academic_year" class="form-control @error('academic_year') is-invalid @enderror" 
                           value="{{ old('academic_year', $schedule->academic_year) }}" placeholder="e.g., 2024-2025">
                    @error('academic_year')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('admin.schedules.index') }}" class="btn-secondary">Cancel</a>
                <button type="submit" class="btn-primary">Update Schedule</button>
            </div>
        </form>
    </div>
</div>
@endsection

