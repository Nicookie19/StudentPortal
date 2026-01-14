@extends('layouts.admin-portal')

@section('title', 'Edit Student')

@section('content')
<div class="page-header">
    <div>
        <h2>Edit Student</h2>
        <p>Update student information</p>
    </div>
</div>

<div class="card">
    <form method="POST" action="{{ route('admin.students.update', $student->id) }}">
        @csrf
        @method('PUT')
        
        <div class="card-header">
            <h3>Personal Information</h3>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="student_id">Student ID *</label>
                <input type="text" id="student_id" name="student_id" class="form-control" value="{{ old('student_id', $student->student_id) }}" required>
            </div>
            <div class="form-group">
                <label for="first_name">First Name *</label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name', $student->first_name) }}" required>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="last_name">Last Name *</label>
                <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name', $student->last_name) }}" required>
            </div>
            <div class="form-group">
                <label for="birth_date">Birth Date</label>
                <input type="date" id="birth_date" name="birth_date" class="form-control" value="{{ old('birth_date', $student->birth_date) }}">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" class="form-control">
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender', $student->gender) == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $student->phone) }}">
            </div>
        </div>
        
        <div class="form-group">
            <label for="address">Address</label>
            <textarea id="address" name="address" class="form-control" rows="3">{{ old('address', $student->address) }}</textarea>
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
                        <option value="{{ $department->id }}" {{ old('department_id', $student->department_id) == $department->id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="year_level">Year Level</label>
                <select id="year_level" name="year_level" class="form-control">
                    <option value="">Select Year Level</option>
                    <option value="1st Year" {{ old('year_level', $student->year_level) == '1st Year' ? 'selected' : '' }}>1st Year</option>
                    <option value="2nd Year" {{ old('year_level', $student->year_level) == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                    <option value="3rd Year" {{ old('year_level', $student->year_level) == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                    <option value="4th Year" {{ old('year_level', $student->year_level) == '4th Year' ? 'selected' : '' }}>4th Year</option>
                    <option value="5th Year" {{ old('year_level', $student->year_level) == '5th Year' ? 'selected' : '' }}>5th Year</option>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control">
                <option value="active" {{ old('status', $student->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $student->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                <option value="graduated" {{ old('status', $student->status) == 'graduated' ? 'selected' : '' }}>Graduated</option>
                <option value="dropped" {{ old('status', $student->status) == 'dropped' ? 'selected' : '' }}>Dropped</option>
            </select>
        </div>
        
        <div class="btn-group" style="margin-top: 24px;">
            <button type="submit" class="btn-primary">Update Student</button>
            <a href="{{ route('admin.students.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection

