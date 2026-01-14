<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Schedule;
use App\Models\Department;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_students' => Student::count(),
            'total_subjects' => Subject::count(),
            'total_schedules' => Schedule::count(),
            'total_enrollments' => Enrollment::count(),
            'active_students' => Student::where('status', 'active')->count(),
            'pending_enrollments' => Enrollment::where('status', 'enrolled')->count(),
        ];

        $recent_students = Student::latest()->take(5)->get();
        $departments = Department::withCount('students')->get();

        return view('admin.dashboard', compact('stats', 'recent_students', 'departments'));
    }
}

