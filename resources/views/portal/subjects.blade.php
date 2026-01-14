@extends('layouts.portal')

@section('title', 'Subject Offerings - Student Portal')

@section('content')
    <div class="page-header">
        <h2>Subject Offerings</h2>
        <p>Browse all available subjects and course offerings</p>
    </div>

    <!-- Department Filter -->
    <div class="card">
        <div class="card-header">
            <h3>📚 Available Subjects</h3>
            <span class="card-icon">📖</span>
        </div>
        
        <!-- Filter Tabs -->
        <div style="display: flex; gap: 8px; margin-bottom: 20px; flex-wrap: wrap;">
            <a href="{{ route('portal.subjects') }}" class="tab-btn active">All Departments</a>
            @foreach($departments as $dept)
                <a href="{{ route('portal.subjects') }}?department={{ $dept->id }}" class="tab-btn">
                    {{ $dept->code }}
                </a>
            @endforeach
        </div>

        <table class="info-table" style="margin-top: 0;">
            <thead>
                <tr>
                    <th style="width: 120px;">Code</th>
                    <th>Subject Name</th>
                    <th style="width: 80px;">Units</th>
                    <th style="width: 100px;">Type</th>
                    <th style="width: 120px;">Department</th>
                    <th style="width: 80px;">Sem</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @forelse($subjects as $subject)
                    <tr>
                        <td><strong>{{ $subject->subject_code }}</strong></td>
                        <td>{{ $subject->subject_name }}</td>
                        <td style="text-align: center;">{{ $subject->units }}</td>
                        <td style="text-align: center;">
                            @if($subject->type == 'lecture')
                                <span class="badge badge-primary">Lec</span>
                            @elseif($subject->type == 'lab')
                                <span class="badge badge-success">Lab</span>
                            @else
                                <span class="badge badge-info">Both</span>
                            @endif
                        </td>
                        <td>{{ $subject->department->code }}</td>
                        <td style="text-align: center;">{{ $subject->semester }}</td>
                        <td style="font-size: 0.9em; color: var(--text-secondary);">{{ $subject->description }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 40px; color: var(--text-secondary);">
                            No subjects found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Summary Stats -->
    <div class="card-grid" style="margin-top: 20px;">
        <div class="card">
            <div class="card-header">
                <h3>📊 Subject Statistics</h3>
            </div>
            <ul>
                <li><strong>Total Subjects:</strong> {{ $subjects->count() }}</li>
                <li><strong>Total Departments:</strong> {{ $departments->count() }}</li>
                <li><strong>Lecture Only:</strong> {{ $subjects->where('type', 'lecture')->count() }}</li>
                <li><strong>Lab Only:</strong> {{ $subjects->where('type', 'lab')->count() }}</li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>📚 By Type</h3>
            </div>
            <ul>
                <li><strong>Combined (Lec+Lab):</strong> {{ $subjects->where('type', 'both')->count() }}</li>
                <li><strong>Total Units:</strong> {{ $subjects->sum('units') }}</li>
                <li><strong>Avg Units/Subject:</strong> {{ number_format($subjects->avg('units'), 1) }}</li>
            </ul>
        </div>
    </div>
@endsection

