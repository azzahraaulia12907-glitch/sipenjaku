<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeachingTeam;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class TeachingTeamController extends Controller
{
    public function index()
    {
        $teams = TeachingTeam::all();
        return view('teaching_teams.index', compact('teams'));
    }

    public function create()
    {
        return view('teaching_teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:teaching_teams,code',
            'name' => 'required',
            'description' => 'nullable'
        ]);
        TeachingTeam::create($request->only(['code', 'name', 'description']));
        return redirect()->route('teaching_teams.index')->with('success', 'Teaching team berhasil ditambahkan!');
    }

    public function show($id)
    {
        $team = TeachingTeam::findOrFail($id);
        return view('teaching_teams.show', compact('team'));
    }

    public function edit($id)
    {
        $team = TeachingTeam::findOrFail($id);
        return view('teaching_teams.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $team = TeachingTeam::findOrFail($id);
        $request->validate([
            'code' => 'required|unique:teaching_teams,code,' . $id,
            'name' => 'required',
            'description' => 'nullable'
        ]);
        $team->update($request->only(['code', 'name', 'description']));
        return redirect()->route('teaching_teams.index')->with('success', 'Teaching team berhasil diupdate!');
    }

    public function destroy($id)
    {
        $team = TeachingTeam::findOrFail($id);
        $team->delete();
        return redirect()->route('teaching_teams.index')->with('success', 'Teaching team berhasil dihapus!');
    }

    public function uploadForm()
    {
        return view('teaching_teams.upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        $file = $request->file('file');
        $data = Excel::toArray([], $file)[0];

        // Validasi header
        if (count($data) < 1 || $data[0][0] !== 'code' || $data[0][1] !== 'name' || $data[0][2] !== 'description') {
            return back()->with('error', 'Header file tidak sesuai template.');
        }

        unset($data[0]); // Hapus header

        $inserted = 0;
        foreach ($data as $row) {
            if (isset($row[0]) && isset($row[1])) {
                $validator = Validator::make([
                    'code' => $row[0],
                    'name' => $row[1],
                    'description' => $row[2] ?? null
                ], [
                    'code' => 'required|unique:teaching_teams,code',
                    'name' => 'required',
                    'description' => 'nullable'
                ]);
                if ($validator->fails()) continue;

                TeachingTeam::create([
                    'code' => $row[0],
                    'name' => $row[1],
                    'description' => $row[2] ?? null
                ]);
                $inserted++;
            }
        }
        return back()->with('success', "$inserted data teaching team berhasil diimport!");
    }
}