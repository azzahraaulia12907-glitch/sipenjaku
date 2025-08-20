@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="mb-3">Daftar Prodi</h3>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('departments.create') }}" class="btn btn-success mb-3">Tambah Prodi</a>
	<a href="{{ route('departments.uploadForm') }}" class="btn btn-primary mb-2">Upload Data Prodi</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama Prodi</th>
                <th>Jumlah Mahasiswa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($departments as $dep)
            <tr>
                <td>{{ $dep->name }}</td>
                <td>{{ $dep->student_count }}</td>
                <td>
                    <a href="{{ route('departments.show', $dep->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('departments.edit', $dep->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form method="POST" action="{{ route('departments.destroy', $dep->id) }}" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data prodi ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Belum ada prodi.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection