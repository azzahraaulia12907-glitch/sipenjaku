<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class LecturerController extends Controller
{
    public function index()
    {
        $lecturers = Lecturer::all();
        return view('lecturers.index', compact('lecturers'));
    }

    public function create()
    {
        return view('lecturers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:lecturers,nidn',
            'name' => 'required',
            'email' => 'required|email|unique:lecturers,email'
        ]);
        Lecturer::create($request->only(['nidn', 'name', 'email']));
        return redirect()->route('lecturers.index')->with('success', 'Dosen berhasil ditambahkan!');
    }

    public function show($id)
    {
        $lecturer = Lecturer::findOrFail($id);
        return view('lecturers.show', compact('lecturer'));
    }

    public function edit($id)
    {
        $lecturer = Lecturer::findOrFail($id);
        return view('lecturers.edit', compact('lecturer'));
    }

    public function update(Request $request, $id)
    {
        $lecturer = Lecturer::findOrFail($id);
        $request->validate([
            'nidn' => 'required|unique:lecturers,nidn,' . $id,
            'name' => 'required',
            'email' => 'required|email|unique:lecturers,email,' . $id
        ]);
        $lecturer->update($request->only(['nidn', 'name', 'email']));
        return redirect()->route('lecturers.index')->with('success', 'Dosen berhasil diupdate!');
    }

    public function destroy($id)
    {
        $lecturer = Lecturer::findOrFail($id);
        $lecturer->delete();
        return redirect()->route('lecturers.index')->with('success', 'Dosen berhasil dihapus!');
    }

    // MENU UPLOADER
    public function uploadForm()
    {
        return view('lecturers.upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        $file = $request->file('file');
        $data = Excel::toArray([], $file)[0];

        // Validasi header
        if (count($data) < 1 || $data[0][0] !== 'nidn' || $data[0][1] !== 'name' || $data[0][2] !== 'email') {
            return back()->with('error', 'Header file tidak sesuai template.');
        }

        unset($data[0]); // Hapus header

        $inserted = 0;
        foreach ($data as $row) {
            if (isset($row[0]) && isset($row[1]) && isset($row[2])) {
                $validator = Validator::make([
                    'nidn' => $row[0],
                    'name' => $row[1],
                    'email' => $row[2]
                ], [
                    'nidn' => 'required|unique:lecturers,nidn',
                    'name' => 'required',
                    'email' => 'required|email|unique:lecturers,email'
                ]);
                if ($validator->fails()) continue;

                Lecturer::create([
                    'nidn' => $row[0],
                    'name' => $row[1],
                    'email' => $row[2]
                ]);
                $inserted++;
            }
        }
        return back()->with('success', "$inserted data berhasil diimport!");
    }
}