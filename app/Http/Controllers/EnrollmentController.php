<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Enrollment::with(['student', 'subject']);

        if ($request->has('student')) {
            $query->where('student_id', $request->student);
        }

        if ($request->has('subject')) {
            $query->where('subject_id', $request->subject);
        }

        if ($request->has('semester')) {
            $query->where('semester', $request->semester);
        }

        $enrollments = $query->latest()->paginate(15);
        $students = Student::all();
        $subjects = Subject::all();

        return view('admin.enrollments.index', compact('enrollments', 'students', 'subjects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'semester' => 'required',
            'academic_year' => 'required',
            'status' => 'required',
        ]);

        // Check for duplicate enrollment
        $exists = Enrollment::where('student_id', $validated['student_id'])
            ->where('subject_id', $validated['subject_id'])
            ->where('semester', $validated['semester'])
            ->where('academic_year', $validated['academic_year'])
            ->exists();

        if ($exists) {
            return back()->with('error', 'Student is already enrolled in this subject for this semester.');
        }

        Enrollment::create($validated);

        return redirect()->route('admin.enrollments.index')
            ->with('success', 'Enrollment created successfully!');
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $validated = $request->validate([
            'grade' => 'nullable|integer|min:0|max:100',
            'status' => 'required',
        ]);

        $enrollment->update($validated);

        return redirect()->route('admin.enrollments.index')
            ->with('success', 'Enrollment updated successfully!');
    }

    public function edit(Enrollment $enrollment)
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('admin.enrollments.edit', compact('enrollment', 'students', 'subjects'));
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return redirect()->route('admin.enrollments.index')
            ->with('success', 'Enrollment deleted successfully!');
    }
}

