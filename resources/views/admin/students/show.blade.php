@extends('layouts.admin-portal')

@section('title', 'Student Details')

@section('content')
<div class="page-header">
    <div>
        <h2>Student Details</h2>
        <p>{{ $student->full_name }}</p>
    </div>
    <div class="page-header-actions">
        <a href="{{ route('admin.students.edit', $student->id) }}" class="btn-primary">Edit Student</a>
        <a href="{{ route('admin.students.index') }}" class="btn-secondary">Back to List</a>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon blue">📚</div>
        <div class="stat-info">
            <h4>Enrolled Subjects</h4>
            <p>{{ $student->enrollments->count() }}</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green">✅</div>
        <div class="stat-info">
            <h4>Completed</h4>
            <p>{{ $student->enrollments->where('status', 'completed')->count() }}</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon yellow">📝</div>
        <div class="stat-info">
            <h4>Currently Enrolled</h4>
            <p>{{ $student->enrollments->where('status', 'enrolled')->count() }}</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon purple">📊</div>
        <div class="stat-info">
            <h4>Year Level</h4>
            <p>{{ $student->year_level ?? 'N/A' }}</p>
        </div>
    </div>
</div>

<!-- Navigation Tabs -->
<div style="display: flex; gap: 8px; margin: 20px 0; flex-wrap: wrap;">
    <a href="#personal" class="tab-btn active">Personal Info</a>
    <a href="#academic" class="tab-btn">Academic Info</a>
    <a href="#curriculum" class="tab-btn">Curriculum / Subjects</a>
    <a href="#enrollments" class="tab-btn">Enrollments</a>
</div>

<!-- Personal Information -->
<div id="personal" class="card">
    <div class="card-header">
        <h3>Personal Information</h3>
    </div>
    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
        <div>
            <p style="color: var(--text-secondary); font-size: 0.85rem;">Student ID</p>
            <p style="font-weight: 600;">{{ $student->student_id }}</p>
        </div>
        <div>
            <p style="color: var(--text-secondary); font-size: 0.85rem;">Email</p>
            <p style="font-weight: 600;">{{ $student->user->email ?? 'N/A' }}</p>
        </div>
        <div>
            <p style="color: var(--text-secondary); font-size: 0.85rem;">Full Name</p>
            <p style="font-weight: 600;">{{ $student->full_name }}</p>
        </div>
        <div>
            <p style="color: var(--text-secondary); font-size: 0.85rem;">Gender</p>
            <p style="font-weight: 600;">{{ $student->gender ?? 'N/A' }}</p>
        </div>
        <div>
            <p style="color: var(--text-secondary); font-size: 0.85rem;">Birth Date</p>
            <p style="font-weight: 600;">{{ $student->birth_date ? $student->birth_date->format('F d, Y') : 'N/A' }}</p>
        </div>
        <div>
            <p style="color: var(--text-secondary); font-size: 0.85rem;">Phone</p>
            <p style="font-weight: 600;">{{ $student->phone ?? 'N/A' }}</p>
        </div>
        <div style="grid-column: span 2;">
            <p style="color: var(--text-secondary); font-size: 0.85rem;">Address</p>
            <p style="font-weight: 600;">{{ $student->address ?? 'N/A' }}</p>
        </div>
    </div>
</div>

<!-- Academic Information -->
<div id="academic" class="card">
    <div class="card-header">
        <h3>Academic Information</h3>
    </div>
    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
        <div>
            <p style="color: var(--text-secondary); font-size: 0.85rem;">Department</p>
            <p style="font-weight: 600;">{{ $student->department->name ?? 'N/A' }}</p>
        </div>
        <div>
            <p style="color: var(--text-secondary); font-size: 0.85rem;">Year Level</p>
            <p style="font-weight: 600;">{{ $student->year_level ?? 'N/A' }}</p>
        </div>
        <div>
            <p style="color: var(--text-secondary); font-size: 0.85rem;">Status</p>
            @if($student->status == 'active')
                <span class="badge badge-success">{{ $student->status }}</span>
            @elseif($student->status == 'inactive')
                <span class="badge badge-warning">{{ $student->status }}</span>
            @else
                <span class="badge badge-info">{{ $student->status }}</span>
            @endif
        </div>
        <div>
            <p style="color: var(--text-secondary); font-size: 0.85rem;">Enrollment Date</p>
            <p style="font-weight: 600;">{{ $student->enrollment_date ? $student->enrollment_date->format('F d, Y') : 'N/A' }}</p>
        </div>
    </div>
</div>

<!-- Curriculum View -->
<div id="curriculum" class="card">
    <div class="card-header">
        <h3>📚 Curriculum / Subjects</h3>
        <span class="card-icon">📖</span>
    </div>
    
    @php
    // Group enrollments by year and semester
    $curriculumByYear = [];
    foreach ($student->enrollments as $enrollment) {
        $year = $enrollment->year_level ?? 'N/A';
        $semester = $enrollment->semester ?? 'N/A';
        $curriculumByYear[$year][$semester][] = $enrollment;
    }
    @endphp
    
    @if($student->enrollments->count() > 0)
        @foreach($curriculumByYear as $year => $semesters)
            <div style="margin-top: 20px;">
                <h4 style="color: var(--primary-color); margin-bottom: 12px;">{{ $year }}</h4>
                
                @foreach($semesters as $semester => $enrollments)
                    <div style="margin-top: 16px; margin-left: 16px;">
                        <h5 style="color: var(--accent-color); margin-bottom: 12px;">{{ $semester }}</h5>
                        <table class="info-table" style="margin-top: 0;">
                            <thead>
                                <tr>
                                    <th style="width: 120px;">Code</th>
                                    <th>Subject Name</th>
                                    <th style="width: 80px;">Units</th>
                                    <th style="width: 100px;">Grade</th>
                                    <th style="width: 100px;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($enrollments as $enrollment)
                                    <tr>
                                        <td><strong>{{ $enrollment->subject->subject_code }}</strong></td>
                                        <td>{{ $enrollment->subject->subject_name }}</td>
                                        <td style="text-align: center;">{{ $enrollment->subject->units }}</td>
                                        <td style="text-align: center;">
                                            {{ $enrollment->grade ?? '—' }}
                                        </td>
                                        <td style="text-align: center;">
                                            @if($enrollment->status == 'completed')
                                                <span class="badge badge-success">Completed</span>
                                            @elseif($enrollment->status == 'enrolled')
                                                <span class="badge badge-info">Enrolled</span>
                                            @else
                                                <span class="badge badge-warning">{{ $enrollment->status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        @endforeach
    @else
        <div style="text-align: center; padding: 40px; color: var(--text-secondary);">
            <p>No enrollments found. The student has no subjects enrolled yet.</p>
        </div>
    @endif
</div>

<!-- Enrolled Subjects (Alternative View) -->
<div id="enrollments" class="card">
    <div class="card-header">
        <h3>Enrolled Subjects</h3>
    </div>
    @if($student->enrollments->count() > 0)
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Year Level</th>
                        <th>Semester</th>
                        <th>Academic Year</th>
                        <th>Grade</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($student->enrollments as $enrollment)
                        <tr>
                            <td>
                                <strong>{{ $enrollment->subject->subject_code }}</strong><br>
                                <span style="font-size: 0.85rem; color: var(--text-secondary);">
                                    {{ $enrollment->subject->subject_name }}
                                </span>
                            </td>
                            <td>{{ $enrollment->year_level ?? 'N/A' }}</td>
                            <td>{{ $enrollment->semester }}</td>
                            <td>{{ $enrollment->academic_year }}</td>
                            <td>{{ $enrollment->grade ?? 'N/A' }}</td>
                            <td>
                                @if($enrollment->status == 'completed')
                                    <span class="badge badge-success">Completed</span>
                                @elseif($enrollment->status == 'enrolled')
                                    <span class="badge badge-info">Enrolled</span>
                                @else
                                    <span class="badge badge-warning">{{ $enrollment->status }}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p style="color: var(--text-secondary);">No enrollments found.</p>
    @endif
</div>

<script>
    // Smooth scroll for navigation tabs
    document.querySelectorAll('.tab-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            document.querySelector(targetId).scrollIntoView({
                behavior: 'smooth'
            });
            
            // Update active tab
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>
@endsection

