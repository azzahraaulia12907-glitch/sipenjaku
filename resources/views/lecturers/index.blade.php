@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Data Dosen</h3>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('lecturers.create') }}" class="btn btn-primary mb-2">Tambah Dosen</a>
	<a href="{{ route('lecturers.uploadForm') }}" class="btn btn-primary mb-2">Upload Dosen</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lecturers as $lecturer)
            <tr>
                <td>{{ $lecturer->nidn }}</td>
                <td>{{ $lecturer->name }}</td>
                <td>{{ $lecturer->email }}</td>
                <td>
                    <a href="{{ route('lecturers.show', $lecturer->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('lecturers.edit', $lecturer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('lecturers.destroy', $lecturer->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection