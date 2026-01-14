@extends('layouts.portal')

@section('title', 'Student Directory - Student Portal')

@section('content')
    <div class="page-header">
        <h2>Student Directory</h2>
        <p>Browse enrolled students by year level (30 students per year)</p>
    </div>

    <!-- Year Level Navigation -->
    <div class="card">
        <div class="card-header">
            <h3>👥 Enrolled Students by Year Level</h3>
            <span class="card-icon">👨‍🎓</span>
        </div>
        
        <!-- Year Level Tabs -->
        <div style="display: flex; gap: 8px; margin-bottom: 20px; flex-wrap: wrap;">
            @foreach($yearLevels as $index => $yearLevel)
                <a href="#year-{{ str_replace(' ', '-', $yearLevel) }}" class="tab-btn {{ $index === 0 ? 'active' : '' }}">
                    {{ $yearLevel }}
                    <span class="badge badge-primary" style="margin-left: 4px;">
                        {{ $studentsByYear[$yearLevel]->count() }}
                    </span>
                </a>
            @endforeach
        </div>

        <!-- Students by Year Level -->
        @foreach($yearLevels as $yearLevel)
            <div id="year-{{ str_replace(' ', '-', $yearLevel) }}" class="year-section" style="margin-bottom: 30px;">
                <div class="section-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                    <h4 style="color: var(--primary-color); margin: 0;">
                        📚 {{ $yearLevel }} Students
                        <span style="font-size: 0.8em; color: var(--text-secondary);">(Showing {{ $studentsByYear[$yearLevel]->count() }} of 30)</span>
                    </h4>
                    <span class="badge badge-info">{{ $studentsByYear[$yearLevel]->count() }} Students</span>
                </div>
                
                @if($studentsByYear[$yearLevel]->count() > 0)
                    <div class="student-grid">
                        @foreach($studentsByYear[$yearLevel] as $student)
                            <div class="student-card">
                                <div class="student-avatar">
                                    {{ strtoupper(substr($student->first_name, 0, 1)) }}{{ strtoupper(substr($student->last_name, 0, 1)) }}
                                </div>
                                <div class="student-info">
                                    <h4>{{ $student->first_name }} {{ $student->last_name }}</h4>
                                    <p class="student-id">{{ $student->student_id }}</p>
                                    <div class="student-meta">
                                        <span class="badge badge-primary">{{ $student->department->code }}</span>
                                        <span class="badge badge-{{ $student->status == 'active' ? 'success' : 'warning' }}">
                                            {{ ucfirst($student->status) }}
                                        </span>
                                    </div>
                                    <p class="student-year">{{ $yearLevel }}</p>
                                    <p class="student-email">{{ $student->email }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div style="text-align: center; padding: 40px; color: var(--text-secondary); background: var(--bg-secondary); border-radius: 8px;">
                        <p>No students found in this year level.</p>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Summary Stats -->
    <div class="card-grid" style="margin-top: 20px;">
        <div class="card">
            <div class="card-header">
                <h3>📊 Student Statistics</h3>
            </div>
            <ul>
                <li><strong>Total Students Displayed:</strong> {{ $totalDisplayed }}</li>
                <li><strong>Students per Year Level:</strong> 30 max</li>
                <li><strong>Departments:</strong> {{ $departments->count() }}</li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>📚 By Year Level</h3>
            </div>
            <ul>
                @foreach($yearLevels as $yearLevel)
                    <li>
                        <strong>{{ $yearLevel }}:</strong> 
                        {{ $studentsByYear[$yearLevel]->count() }} students
                        @if($studentsByYear[$yearLevel]->count() >= 30)
                            <span class="badge badge-success">Max Reached</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    
    <script>
        // Smooth scroll for year level tabs
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

