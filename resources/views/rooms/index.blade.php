@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="mb-3">Daftar Ruangan</h3>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('rooms.create') }}" class="btn btn-success mb-3">Tambah Ruangan</a>
	<a href="{{ route('rooms.uploadForm') }}" class="btn btn-primary mb-2">Upload Ruangang</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama Ruangan</th>
                <th>Kapasitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rooms as $room)
            <tr>
                <td>{{ $room->name }}</td>
                <td>{{ $room->capacity }}</td>
                <td>
                    <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form method="POST" action="{{ route('rooms.destroy', $room->id) }}" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus ruangan ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Belum ada ruangan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection