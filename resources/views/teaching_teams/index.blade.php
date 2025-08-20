@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Teaching Team List</h3>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('teaching_teams.create') }}" class="btn btn-primary mb-2">Tambah Teaching Team</a>
    <a href="{{ route('teaching_teams.uploadForm') }}" class="btn btn-primary mb-2">Upload Tim Teaching</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teams as $team)
            <tr>
                <td>{{ $team->code }}</td>
                <td>{{ $team->name }}</td>
                <td>{{ $team->description }}</td>
                <td>
                    <a href="{{ route('teaching_teams.show', $team->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('teaching_teams.edit', $team->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('teaching_teams.destroy', $team->id) }}" method="POST" style="display:inline;">
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