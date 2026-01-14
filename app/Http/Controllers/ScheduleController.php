<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Subject;
use App\Models\Student;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $query = Schedule::with('subject');

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->whereHas('subject', function ($q) use ($search) {
                $q->where('subject_code', 'like', "%{$search}%")
                  ->orWhere('subject_name', 'like', "%{$search}%");
            });
        }

        if ($request->has('day') && !empty($request->day)) {
            $query->where('day_of_week', $request->day);
        }

        if ($request->has('semester') && !empty($request->semester)) {
            $query->where('semester', $request->semester);
        }

        $schedules = $query->orderBy('day_of_week')->orderBy('start_time')->get();
        
        // Group schedules by day of week (portal style)
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $schedulesByDay = [];
        
        foreach ($days as $day) {
            $schedulesByDay[$day] = $schedules->where('day_of_week', $day);
        }
        
        $subjects = Subject::all();

        return view('admin.schedules.index', compact('schedules', 'schedulesByDay', 'days', 'subjects'));
    }

    public function create()
    {
        $subjects = Subject::all();
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        return view('admin.schedules.create', compact('subjects', 'days'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'day_of_week' => 'required',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'room' => 'nullable',
            'section' => 'nullable',
            'semester' => 'nullable',
            'academic_year' => 'nullable',
        ]);

        Schedule::create($validated);

        return redirect()->route('admin.schedules.index')
            ->with('success', 'Schedule created successfully!');
    }

    public function show(Schedule $schedule)
    {
        $schedule->load(['subject', 'enrollments.student']);
        return view('admin.schedules.show', compact('schedule'));
    }

    public function edit(Schedule $schedule)
    {
        $subjects = Subject::all();
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        return view('admin.schedules.edit', compact('schedule', 'subjects', 'days'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'day_of_week' => 'required',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'room' => 'nullable',
            'section' => 'nullable',
            'semester' => 'nullable',
            'academic_year' => 'nullable',
        ]);

        $schedule->update($validated);

        return redirect()->route('admin.schedules.index')
            ->with('success', 'Schedule updated successfully!');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('admin.schedules.index')
            ->with('success', 'Schedule deleted successfully!');
    }
}

