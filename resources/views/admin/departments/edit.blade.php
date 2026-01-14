@extends('layouts.admin-portal')

@section('title', 'Edit Department')

@section('content')
<div class="page-header">
    <div>
        <h2>Edit Department</h2>
        <p>Update department information</p>
    </div>

<div class="card">
    <form method="POST" action="{{ route('admin.departments.update', $department->id) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Department Name *</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $department->name) }}" required>
        </div>
        
        <div class="form-group">
            <label for="code">Department Code *</label>
            <input type="text" id="code" name="code" class="form-control" value="{{ old('code', $department->code) }}" required>
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="3">{{ old('description', $department->description) }}</textarea>
        </div>
        
        <div class="btn-group" style="margin-top: 24px;">
            <button type="submit" class="btn-primary">Update Department</button>
            <a href="{{ route('admin.departments.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
