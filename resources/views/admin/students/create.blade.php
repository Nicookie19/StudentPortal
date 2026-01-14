@extends('layouts.admin-portal')

@section('title', 'Add New Student')

@section('content')
<div class="page-header">
    <div>
        <h2>Add New Student</h2>
        <p>Register a new student in the system</p>
    </div>
</div>

<div class="card">
    <form method="POST" action="{{ route('admin.students.store') }}">
        @csrf
        
        <div class="card-header">
            <h3>Personal Information</h3>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="student_id">Student ID *</label>
                <input type="text" id="student_id" name="student_id" class="form-control" required placeholder="e.g., 2024-0001">
                @error('student_id')
                    <span style="color: var(--danger); font-size: 0.85rem;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email" class="form-control" required placeholder="student@example.com">
                @error('email')
                    <span style="color: var(--danger); font-size: 0.85rem;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="first_name">First Name *</label>
                <input type="text" id="first_name" name="first_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name *</label>
                <input type="text" id="last_name" name="last_name" class="form-control" required>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="birth_date">Birth Date</label>
                <input type="date" id="birth_date" name="birth_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" class="form-control">
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" class="form-control" placeholder="e.g., +63 912 345 6789">
        </div>
        
        <div class="form-group">
            <label for="address">Address</label>
            <textarea id="address" name="address" class="form-control" rows="3" placeholder="Full address"></textarea>
        </div>
        
        <div class="card-header" style="margin-top: 24px;">
            <h3>Academic Information</h3>
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
                <label for="year_level">Year Level</label>
                <select id="year_level" name="year_level" class="form-control">
                    <option value="">Select Year Level</option>
                    <option value="1st Year">1st Year</option>
                    <option value="2nd Year">2nd Year</option>
                    <option value="3rd Year">3rd Year</option>
                    <option value="4th Year">4th Year</option>
                    <option value="5th Year">5th Year</option>
                </select>
            </div>
        </div>
        
        <div class="btn-group" style="margin-top: 24px;">
            <button type="submit" class="btn-primary">Create Student</button>
            <a href="{{ route('admin.students.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection

