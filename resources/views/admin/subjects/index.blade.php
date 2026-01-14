@extends('layouts.admin-portal')

@section('title', 'Manage Subjects')

@section('content')
<div class="page-header">
    <div>
        <h2>Subjects Management</h2>
        <p>Manage all academic subjects</p>
    </div>
    <div class="page-header-actions">
        <a href="{{ route('admin.subjects.create') }}" class="btn-primary">+ Add New Subject</a>
    </div>
</div>

<div class="card">
    <form method="GET" action="{{ route('admin.subjects.index') }}" class="search-bar" style="margin-bottom: 0;">
        <input type="text" name="search" class="form-control" placeholder="Search by code or name..." value="{{ request('search') }}">
        
        <select name="department" class="form-control" style="width: 200px;">
            <option value="">All Departments</option>
            @foreach(\App\Models\Department::all() as $department)
                <option value="{{ $department->id }}" {{ request('department') == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                </option>
            @endforeach
        </select>
        
        <select name="type" class="form-control" style="width: 150px;">
            <option value="">All Types</option>
            <option value="lecture" {{ request('type') == 'lecture' ? 'selected' : '' }}>Lecture</option>
            <option value="laboratory" {{ request('type') == 'laboratory' ? 'selected' : '' }}>Laboratory</option>
            <option value="both" {{ request('type') == 'both' ? 'selected' : '' }}>Both</option>
        </select>
        
        <button type="submit" class="btn-primary">Search</button>
        <a href="{{ route('admin.subjects.index') }}" class="btn-secondary">Reset</a>
    </form>
</div>

<div class="card">
    <div class="table-container">
        @if($subjects->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Units</th>
                        <th>Type</th>
                        <th>Department</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subjects as $subject)
                        <tr>
                            <td style="font-weight: 600;">{{ $subject->subject_code }}</td>
                            <td>{{ $subject->subject_name }}</td>
                            <td>{{ $subject->units }}</td>
                            <td>
                                <span class="badge badge-info">{{ ucfirst($subject->type) }}</span>
                            </td>
                            <td>{{ $subject->department->name ?? 'N/A' }}</td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('admin.subjects.show', $subject->id) }}" class="action-btn view">View</a>
                                    <a href="{{ route('admin.subjects.edit', $subject->id) }}" class="action-btn edit">Edit</a>
                                    <form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete" onclick="return confirmDelete('Are you sure you want to delete this subject?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            {{ $subjects->links() }}
        @else
            <div style="text-align: center; padding: 40px; color: var(--text-secondary);">
                <p>No subjects found.</p>
                <a href="{{ route('admin.subjects.create') }}" class="btn-primary" style="margin-top: 16px;">Add First Subject</a>
            </div>
        @endif
    </div>
</div>
@endsection

