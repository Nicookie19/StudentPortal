@extends('layouts.admin-portal')

@section('title', 'Add New Subject')

@section('content')
<div class="page-header">
    <div>
        <h2>Add New Subject</h2>
        <p>Create a new academic subject</p>
    </div>
</div>

<div class="card">
    <form method="POST" action="{{ route('admin.subjects.store') }}">
        @csrf
        
        <div class="form-row">
            <div class="form-group">
                <label for="subject_code">Subject Code *</label>
                <input type="text" id="subject_code" name="subject_code" class="form-control" required placeholder="e.g., CS101">
            </div>
            <div class="form-group">
                <label for="subject_name">Subject Name *</label>
                <input type="text" id="subject_name" name="subject_name" class="form-control" required placeholder="e.g., Introduction to Computer Science">
            </div>
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="3" placeholder="Subject description..."></textarea>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="units">Units *</label>
                <input type="number" id="units" name="units" class="form-control" required min="1" max="10" value="3">
            </div>
            <div class="form-group">
                <label for="type">Type *</label>
                <select id="type" name="type" class="form-control" required>
                    <option value="lecture">Lecture</option>
                    <option value="laboratory">Laboratory</option>
                    <option value="both">Both (Lecture + Lab)</option>
                </select>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="department_id">Department</label>
                <select id="department_id" name="department_id" class="form-control">
                    <option value="">Select Department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="semester">Recommended Semester</label>
                <input type="number" id="semester" name="semester" class="form-control" min="1" max="8" placeholder="e.g., 1">
            </div>
        </div>
        
        <div class="form-group">
            <label for="prerequisites">Prerequisites</label>
            <input type="text" id="prerequisites" name="prerequisites" class="form-control" placeholder="e.g., CS100 or leave empty">
        </div>
        
        <div class="btn-group" style="margin-top: 24px;">
            <button type="submit" class="btn-primary">Create Subject</button>
            <a href="{{ route('admin.subjects.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection

