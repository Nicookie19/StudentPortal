<?php

use Illuminate\Support\Facades\Route;

// Public routes
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

// Public portal pages with database data
Route::get('/subjects', [\App\Http\Controllers\PortalController::class, 'subjects'])->name('portal.subjects');
Route::get('/schedules', [\App\Http\Controllers\PortalController::class, 'schedules'])->name('portal.schedules');
Route::get('/students', [\App\Http\Controllers\PortalController::class, 'students'])->name('portal.students');

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin authentication (simplified for demo)
    Route::get('/login', function () {
        return view('admin.login');
    })->name('login');
    
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    
    // Protected admin routes using custom AdminMiddleware
    Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
        
        // Student management
        Route::resource('students', \App\Http\Controllers\StudentController::class);
        
        // Subject management
        Route::resource('subjects', \App\Http\Controllers\SubjectController::class);
        
        // Schedule management
        Route::resource('schedules', \App\Http\Controllers\ScheduleController::class);
        
        // Department management
        Route::resource('departments', \App\Http\Controllers\DepartmentController::class)->except(['show']);
        
        // Enrollment management
        Route::resource('enrollments', \App\Http\Controllers\EnrollmentController::class)->except(['show', 'create']);
    });
});

