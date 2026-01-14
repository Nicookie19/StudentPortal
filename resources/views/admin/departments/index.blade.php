@extends('layouts.admin-portal')

@section('title', 'Manage Departments')

@section('content')
<div class="page-header">
    <div>
        <h2>Departments Management</h2>
        <p>Manage academic departments</p>
    </div>
    <div class="page-header-actions">
        <button class="btn-primary" onclick="document.getElementById('addModal').classList.add('active')">+ Add New Department</button>
    </div>

<!-- Add Department Modal -->
<div id="addModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Add New Department</h3>
            <button onclick="document.getElementById('addModal').classList.remove('active')" style="background: none; border: none; color: var(--text-primary); cursor: pointer; font-size: 1.5rem;">&times;</button>
        </div>
        <form method="POST" action="{{ route('admin.departments.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Department Name *</label>
                <input type="text" id="name" name="name" class="form-control" required placeholder="e.g., Computer Science">
            </div>
            <div class="form-group">
                <label for="code">Department Code *</label>
                <input type="text" id="code" name="code" class="form-control" required placeholder="e.g., CS">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="3" placeholder="Department description..."></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="document.getElementById('addModal').classList.remove('active')">Cancel</button>
                <button type="submit" class="btn-primary">Create Department</button>
            </div>
        </form>
    </div>

<div class="card">
    <div class="table-container">
        @if($departments->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Students</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <td style="font-weight: 600;">{{ $department->code }}</td>
                            <td>{{ $department->name }}</td>
                            <td>
                                <span class="badge badge-info">{{ $department->students_count }} students</span>
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('admin.departments.edit', $department->id) }}" class="action-btn edit">Edit</a>
                                    <form action="{{ route('admin.departments.destroy', $department->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete" onclick="return confirmDelete('Are you sure you want to delete this department?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            {{ $departments->links() }}
        @else
            <div style="text-align: center; padding: 40px; color: var(--text-secondary);">
                <p>No departments found.</p>
                <button class="btn-primary" style="margin-top: 16px;" onclick="document.getElementById('addModal').classList.add('active')">Add First Department</button>
            </div>
        @endif
    </div>
@endsection
