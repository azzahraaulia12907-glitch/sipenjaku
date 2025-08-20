@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="mb-3">Daftar Mata Kuliah</h3>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('courses.create') }}" class="btn btn-success mb-3">Tambah Mata Kuliah</a>
	<a href="{{ route('courses.uploadForm') }}" class="btn btn-primary mb-2">Upload Mata Kuliah</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama Mata Kuliah</th>
                <th>Jenis</th>
                <th>SKS</th>
                <th>Prodi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($courses as $course)
            <tr>
                <td>{{ $course->name }}</td>
                <td>{{ ucfirst($course->type) }}</td>
                <td>{{ $course->sks }}</td>
                <td>{{ $course->department->name ?? '-' }}</td>
                <td>
                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form method="POST" action="{{ route('courses.destroy', $course->id) }}" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus mata kuliah ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada mata kuliah.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection