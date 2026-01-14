@extends('layouts.admin-portal')

@section('title', 'Edit Subject')

@section('content')
<div class="page-header">
    <div>
        <h2>Edit Subject</h2>
        <p>Update subject information</p>
    </div>
</div>

<div class="card">
    <form method="POST" action="{{ route('admin.subjects.update', $subject->id) }}">
        @csrf
        @method('PUT')
        
        <div class="form-row">
            <div class="form-group">
                <label for="subject_code">Subject Code *</label>
                <input type="text" id="subject_code" name="subject_code" class="form-control" value="{{ old('subject_code', $subject->subject_code) }}" required>
            </div>
            <div class="form-group">
                <label for="subject_name">Subject Name *</label>
                <input type="text" id="subject_name" name="subject_name" class="form-control" value="{{ old('subject_name', $subject->subject_name) }}" required>
            </div>
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="3">{{ old('description', $subject->description) }}</textarea>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="units">Units *</label>
                <input type="number" id="units" name="units" class="form-control" required min="1" max="10" value="{{ old('units', $subject->units) }}">
            </div>
            <div class="form-group">
                <label for="type">Type *</label>
                <select id="type" name="type" class="form-control" required>
                    <option value="lecture" {{ old('type', $subject->type) == 'lecture' ? 'selected' : '' }}>Lecture</option>
                    <option value="laboratory" {{ old('type', $subject->type) == 'laboratory' ? 'selected' : '' }}>Laboratory</option>
                    <option value="both" {{ old('type', $subject->type) == 'both' ? 'selected' : '' }}>Both (Lecture + Lab)</option>
                </select>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="department_id">Department</label>
                <select id="department_id" name="department_id" class="form-control">
                    <option value="">Select Department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ old('department_id', $subject->department_id) == $department->id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="semester">Recommended Semester</label>
                <input type="number" id="semester" name="semester" class="form-control" min="1" max="8" value="{{ old('semester', $subject->semester) }}">
            </div>
        </div>
        
        <div class="form-group">
            <label for="prerequisites">Prerequisites</label>
            <input type="text" id="prerequisites" name="prerequisites" class="form-control" value="{{ old('prerequisites', $subject->prerequisites) }}">
        </div>
        
        <div class="btn-group" style="margin-top: 24px;">
            <button type="submit" class="btn-primary">Update Subject</button>
            <a href="{{ route('admin.subjects.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection

