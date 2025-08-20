<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Department;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('department')->get();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('courses.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'sks' => 'required|integer',
            'department_id' => 'required|exists:departments,id'
        ]);
        Course::create($request->all());
        return redirect()->route('courses.index')->with('success', 'Mata kuliah ditambahkan!');
    }

    public function show($id)
    {
        $course = Course::with('department')->findOrFail($id);
        return view('courses.show', compact('course'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $departments = Department::all();
        return view('courses.edit', compact('course', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'sks' => 'required|integer',
            'department_id' => 'required|exists:departments,id'
        ]);
        $course->update($request->all());
        return redirect()->route('courses.index')->with('success', 'Mata kuliah diupdate!');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Mata kuliah dihapus!');
    }
	
	public function uploadForm()
	{
    return view('courses.upload');
	}

	public function upload(Request $request)
	{
    $request->validate([
        'file' => 'required|mimes:xlsx,csv'
    ]);

    $file = $request->file('file');
    $data = \Maatwebsite\Excel\Facades\Excel::toArray([], $file)[0];

    // Contoh validasi header
    if (count($data) < 1 || $data[0][0] !== 'code' || $data[0][1] !== 'name' || $data[0][2] !== 'credits') {
        return back()->with('error', 'Header file tidak sesuai template.');
    }

    unset($data[0]); // Hapus header

    $inserted = 0;
    foreach ($data as $row) {
        if (isset($row[0]) && isset($row[1]) && isset($row[2])) {
            $validator = \Validator::make([
                'code' => $row[0],
                'name' => $row[1],
                'credits' => $row[2]
            ], [
                'code' => 'required',
                'name' => 'required',
                'credits' => 'required|integer'
            ]);
            if ($validator->fails()) continue;

            \App\Models\Course::create([
                'code' => $row[0],
                'name' => $row[1],
                'credits' => $row[2]
            ]);
            $inserted++;
        }
    }
    return back()->with('success', "$inserted data berhasil diimport!");
	}
}