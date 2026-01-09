<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('welcome');
});

Route::get('/academic-record', function () {
    return view('grades');
});

Route::get('/class-schedule', function () {
    return view('schedule');
});

Route::get('/financial-record', function () {
    return view('financial-record');
});

Route::get('/clearance', function () {
    return view('clearance');
});

Route::get('/curriculum-view', function () {
    return view('courses');
});

Route::get('/resources', function () {
    return view('library');
});

Route::get('/support-ticket', function () {
    return view('support-ticket');
});

Route::post('/support-ticket', function () {
    // In a real app, you would save the ticket to a database
    return redirect('/support-ticket')->with('success', 'Your ticket has been submitted successfully!');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/logout', function () {
    return redirect('/');
});

