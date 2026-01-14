<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $departments = Department::all();
        
        // Fetch 30 students per year level
        $yearLevels = ['1st Year', '2nd Year', '3rd Year', '4th Year'];
        $studentsByYear = [];
        $totalDisplayed = 0;
        
        // Apply filters if provided
        $query = Student::query();
        
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('student_id', 'like', "%{$search}%");
            });
        }
        
        if ($request->has('department') && !empty($request->department)) {
            $query->where('department_id', $request->department);
        }
        
        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }
        
        // Get filtered student IDs first
        $filteredStudentIds = $query->pluck('id')->toArray();
        
        foreach ($yearLevels as $yearLevel) {
            $yearQuery = Student::with('department')
                ->where('year_level', $yearLevel)
                ->whereIn('id', $filteredStudentIds)
                ->limit(30);
            
            $studentsByYear[$yearLevel] = $yearQuery->get();
            $totalDisplayed += $studentsByYear[$yearLevel]->count();
        }
        
        return view('admin.students.index', compact('studentsByYear', 'departments', 'totalDisplayed', 'yearLevels'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('admin.students.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|unique:students',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'department_id' => 'nullable',
            'year_level' => 'nullable',
            'gender' => 'nullable',
            'birth_date' => 'nullable|date',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        // Create user account
        $user = \App\Models\User::create([
            'name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make('password123'), // Default password
        ]);

        // Create student record
        Student::create([
            'user_id' => $user->id,
            'student_id' => $validated['student_id'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'department_id' => $validated['department_id'],
            'year_level' => $validated['year_level'],
            'gender' => $validated['gender'],
            'birth_date' => $validated['birth_date'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'status' => 'active',
            'enrollment_date' => now(),
        ]);

        return redirect()->route('admin.students.index')
            ->with('success', 'Student created successfully!');
    }

    public function show(Student $student)
    {
        $student->load(['department', 'enrollments.subject.schedules']);
        return view('admin.students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $departments = Department::all();
        return view('admin.students.edit', compact('student', 'departments'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'student_id' => 'required|unique:students,student_id,' . $student->id,
            'first_name' => 'required',
            'last_name' => 'required',
            'department_id' => 'nullable',
            'year_level' => 'nullable',
            'gender' => 'nullable',
            'birth_date' => 'nullable|date',
            'phone' => 'nullable',
            'address' => 'nullable',
            'status' => 'nullable',
        ]);

        $student->update($validated);

        // Update user name if changed
        if ($student->user) {
            $student->user->update([
                'name' => $validated['first_name'] . ' ' . $validated['last_name'],
            ]);
        }

        return redirect()->route('admin.students.index')
            ->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        if ($student->user) {
            $student->user->delete();
        }
        $student->delete();

        return redirect()->route('admin.students.index')
            ->with('success', 'Student deleted successfully!');
    }
}

