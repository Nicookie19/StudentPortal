@extends('layouts.portal')

@section('title', ($title ?? 'Page') . ' - Student Portal')

@section('content')
    <header class="header">
        <h2>{{ $title ?? 'Page' }}</h2>
        <div class="user-profile">
            Welcome, <a href="#">Alex Doe</a>
        </div>
    </header>

    <div class="feature-card">
        <h3>Content Under Construction</h3>
        <p>This page is currently under development. Please check back later!</p>
    </div>
@endsection

