@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Teaching Team</h3>
    <table class="table">
        <tr>
            <th>Kode</th>
            <td>{{ $team->code }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $team->name }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $team->description }}</td>
        </tr>
    </table>
    <a href="{{ route('teaching_teams.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('teaching_teams.edit', $team->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection