<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Department;
use App\Models\Course;
use App\Models\Room;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $query = Schedule::with(['course.department', 'room', 'course.teachingTeams.user']);

        if ($request->filled('q')) {
            $q = $request->input('q');
            $query->whereHas('course', function ($q2) use ($q) {
                $q2->where('name', 'like', "%{$q}%");
            })->orWhereHas('course.teachingTeams.user', function ($uq) use ($q) {
                $uq->where('name', 'like', "%{$q}%");
            });
        }
        if ($request->filled('mode')) {
            $query->where('mode', $request->input('mode'));
        }
        if ($request->filled('day')) {
            $query->where('day', $request->input('day'));
        }
        if ($request->filled('department')) {
            $query->whereHas('course', function ($cq) use ($request) {
                $cq->where('department_id', $request->input('department'));
            });
        }

        $schedules = $query->get();
        $departments = Department::all();
        $totalJadwal = $schedules->count();
        $onlineCount = $schedules->where('mode', 'online')->count();
        $offlineCount = $schedules->where('mode', 'offline')->count();

        return view('dashboard', compact('schedules', 'totalJadwal', 'onlineCount', 'offlineCount', 'departments'));
    }

    public function create()
    {
        $courses = Course::all();
        $rooms = Room::all();
        return view('schedules.create', compact('courses', 'rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'room_id' => 'nullable|exists:rooms,id',
            'day' => 'required',
            'start_time' => 'required',
            'duration' => 'required|integer',
            'mode' => 'required|in:online,offline',
            'meeting_no' => 'required|integer'
        ]);
        Schedule::create($request->all());
        return redirect()->route('dashboard')->with('success', 'Jadwal ditambahkan!');
    }

    public function show($id)
    {
        $schedule = Schedule::with(['course.department', 'room', 'course.teachingTeams.user'])->findOrFail($id);
        return view('schedules.show', compact('schedule'));
    }

    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        $courses = Course::all();
        $rooms = Room::all();
        return view('schedules.edit', compact('schedule', 'courses', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'room_id' => 'nullable|exists:rooms,id',
            'day' => 'required',
            'start_time' => 'required',
            'duration' => 'required|integer',
            'mode' => 'required|in:online,offline',
            'meeting_no' => 'required|integer'
        ]);
        $schedule->update($request->all());
        return redirect()->route('dashboard')->with('success', 'Jadwal diupdate!');
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return redirect()->route('dashboard')->with('success', 'Jadwal dihapus!');
    }
}