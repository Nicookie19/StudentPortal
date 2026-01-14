@extends('layouts.admin-portal')

@section('title', 'Add Department')

@section('content')
<div class="page-header">
    <div>
        <h2>Add New Department</h2>
        <p>Create a new academic department</p>
    </div>
    <div class="page-header-actions">
        <a href="{{ route('admin.departments.index') }}" class="btn-secondary">← Back to Departments</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.departments.store') }}">
            @csrf
            
            <div class="form-group">
                <label for="name">Department Name *</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" 
                       value="{{ old('name') }}" required placeholder="e.g., Computer Science">
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="code">Department Code *</label>
                <input type="text" id="code" name="code" class="form-control @error('code') is-invalid @enderror" 
                       value="{{ old('code') }}" required placeholder="e.g., CS" maxlength="10">
                @error('code')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" 
                          rows="4" placeholder="Department description...">{{ old('description') }}</textarea>
                @error('description')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('admin.departments.index') }}" class="btn-secondary">Cancel</a>
                <button type="submit" class="btn-primary">Create Department</button>
            </div>
        </form>
    </div>
</div>
@endsection

