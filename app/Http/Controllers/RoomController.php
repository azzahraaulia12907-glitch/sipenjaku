<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
        ]);
        Room::create($request->all());
        return redirect()->route('rooms.index')->with('success', 'Ruangan ditambahkan!');
    }

    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.show', compact('room'));
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
        ]);
        $room->update($request->all());
        return redirect()->route('rooms.index')->with('success', 'Ruangan diupdate!');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Ruangan dihapus!');
    }
	
	public function uploadForm()
{
    return view('rooms.upload');
}

public function upload(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,csv'
    ]);

    $file = $request->file('file');
    $data = \Maatwebsite\Excel\Facades\Excel::toArray([], $file)[0];

    // Validasi header
    if (count($data) < 1 || $data[0][0] !== 'name' || $data[0][1] !== 'capacity') {
        return back()->with('error', 'Header file tidak sesuai template.');
    }

    unset($data[0]); // Hapus header

    $inserted = 0;
    foreach ($data as $row) {
        if (isset($row[0]) && isset($row[1])) {
            $validator = \Validator::make([
                'name' => $row[0],
                'capacity' => $row[1]
            ], [
                'name' => 'required',
                'capacity' => 'required|integer'
            ]);
            if ($validator->fails()) continue;

            \App\Models\Room::create([
                'name' => $row[0],
                'capacity' => $row[1]
            ]);
            $inserted++;
        }
    }
    return back()->with('success', "$inserted data berhasil diimport!");
	}
}