<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'student_count' => 'required|integer'
        ]);
        Department::create($request->only(['name', 'student_count']));
        return redirect()->route('departments.index')->with('success', 'Prodi ditambahkan!');
    }

    public function show($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.show', compact('department'));
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'student_count' => 'required|integer'
        ]);
        $department->update($request->only(['name', 'student_count']));
        return redirect()->route('departments.index')->with('success', 'Prodi diupdate!');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Prodi dihapus!');
    }

    public function uploadForm()
    {
        return view('departments.upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        $file = $request->file('file');
        $data = Excel::toArray([], $file)[0];

        // Validasi header file
        if (count($data) < 1 || $data[0][0] !== 'name' || $data[0][1] !== 'student_count') {
            return back()->with('error', 'Header file tidak sesuai template.');
        }

        unset($data[0]); // Hapus baris header

        $inserted = 0;
        foreach ($data as $row) {
            if (isset($row[0]) && isset($row[1])) {
                $validator = Validator::make([
                    'name' => $row[0],
                    'student_count' => $row[1]
                ], [
                    'name' => 'required',
                    'student_count' => 'required|integer'
                ]);
                if ($validator->fails()) {
                    continue;
                }

                Department::create([
                    'name' => $row[0],
                    'student_count' => $row[1]
                ]);
                $inserted++;
            }
        }
        return back()->with('success', "$inserted data berhasil diimport!");
    }
}