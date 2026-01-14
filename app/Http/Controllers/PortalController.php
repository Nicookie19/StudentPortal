<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\Subject;

class PortalController extends Controller
{
    /**
     * Display all subjects
     */
    public function subjects()
    {
        $subjects = Subject::with('department')->get();
        $departments = Department::all();
        
        return view('portal.subjects', compact('subjects', 'departments'));
    }

    /**
     * Display all schedules
     */
    public function schedules()
    {
        $schedules = Schedule::with(['subject.department'])->get();
        $departments = Department::all();
        
        // Group schedules by day of week
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $schedulesByDay = [];
        
        foreach ($days as $day) {
            $schedulesByDay[$day] = $schedules->where('day_of_week', $day)->sortBy('start_time');
        }
        
        return view('portal.schedules', compact('schedules', 'schedulesByDay', 'days'));
    }

    /**
     * Display students grouped by year level (30 per year level)
     */
    public function students()
    {
        $departments = Department::all();
        
        // Fetch 30 students per year level
        $yearLevels = ['1st Year', '2nd Year', '3rd Year', '4th Year'];
        $studentsByYear = [];
        
        foreach ($yearLevels as $yearLevel) {
            $studentsByYear[$yearLevel] = Student::with('department')
                ->where('year_level', $yearLevel)
                ->limit(30)
                ->get();
        }
        
        // Calculate total students displayed
        $totalDisplayed = array_sum(array_map(function($collection) {
            return $collection->count();
        }, $studentsByYear));
        
        return view('portal.students', compact('studentsByYear', 'departments', 'totalDisplayed', 'yearLevels'));
    }
}

