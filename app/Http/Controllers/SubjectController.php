<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Department;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Subject::with('department');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('subject_code', 'like', "%{$search}%")
                  ->orWhere('subject_name', 'like', "%{$search}%");
            });
        }

        if ($request->has('department')) {
            $query->where('department_id', $request->department);
        }

        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        $subjects = $query->latest()->paginate(10);
        $departments = Department::all();

        return view('admin.subjects.index', compact('subjects', 'departments'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('admin.subjects.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject_code' => 'required|unique:subjects',
            'subject_name' => 'required',
            'description' => 'nullable',
            'units' => 'required|integer|min:1',
            'type' => 'required',
            'department_id' => 'nullable',
            'semester' => 'nullable|integer',
            'prerequisites' => 'nullable',
        ]);

        Subject::create($validated);

        return redirect()->route('admin.subjects.index')
            ->with('success', 'Subject created successfully!');
    }

    public function show(Subject $subject)
    {
        $subject->load(['department', 'schedules', 'enrollments.student']);
        return view('admin.subjects.show', compact('subject'));
    }

    public function edit(Subject $subject)
    {
        $departments = Department::all();
        return view('admin.subjects.edit', compact('subject', 'departments'));
    }

    public function update(Request $request, Subject $subject)
    {
        $validated = $request->validate([
            'subject_code' => 'required|unique:subjects,subject_code,' . $subject->id,
            'subject_name' => 'required',
            'description' => 'nullable',
            'units' => 'required|integer|min:1',
            'type' => 'required',
            'department_id' => 'nullable',
            'semester' => 'nullable|integer',
            'prerequisites' => 'nullable',
        ]);

        $subject->update($validated);

        return redirect()->route('admin.subjects.index')
            ->with('success', 'Subject updated successfully!');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('admin.subjects.index')
            ->with('success', 'Subject deleted successfully!');
    }
}

