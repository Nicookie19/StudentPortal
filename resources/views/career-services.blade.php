@extends('layouts.portal')

@section('title', 'Career Services - Student Portal')

@section('content')
    <header class="header">
        <h2>Career Center</h2>
        <div class="user-profile">
            Welcome, <a href="#">Alex Doe</a>
        </div>
    </header>

    <div class="feature-grid">
        <div class="feature-card">
            <h3>Job Board</h3>
            <ul>
                <li><a href="#">Junior Web Developer - TechCorp</a></li>
                <li><a href="#">Data Analyst Intern - DataSystems</a></li>
                <li><a href="#">Network Admin - College IT</a></li>
            </ul>
        </div>
        <div class="feature-card">
            <h3>My Application</h3>
            <ul>
                <li>Resume: <strong>uploaded_v2.pdf</strong></li>
                <li>Cover Letter: <strong>Not uploaded</strong></li>
                <li><a href="#">Update Documents</a></li>
            </ul>
        </div>
    </div>
@endsection

