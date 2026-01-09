@extends('layouts.portal')

@section('title', 'Announcements - Student Portal')

@section('content')
    <header class="header">
        <h2>Campus News</h2>
        <div class="user-profile">
            Welcome, <a href="#">Alex Doe</a>
        </div>
    </header>

    <div class="feature-grid">
        <div class="feature-card">
            <h3>System Maintenance</h3>
            <p><small>Posted: 2 hours ago</small></p>
            <p>The student portal will be undergoing scheduled maintenance this Saturday from 2 AM to 4 AM.</p>
        </div>
        <div class="feature-card">
            <h3>Hackathon 2024</h3>
            <p><small>Posted: Yesterday</small></p>
            <p>Registration for the annual campus Hackathon opens next week. Get your teams ready!</p>
        </div>
        <div class="feature-card">
            <h3>Library Hours</h3>
            <p><small>Posted: 3 days ago</small></p>
            <p>Extended library hours for finals week have been posted.</p>
        </div>
    </div>
@endsection

