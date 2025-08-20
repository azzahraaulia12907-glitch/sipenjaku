@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Dosen</h3>
    <table class="table">
        <tr>
            <th>NIDN</th>
            <td>{{ $lecturer->nidn }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $lecturer->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $lecturer->email }}</td>
        </tr>
    </table>
    <a href="{{ route('lecturers.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('lecturers.edit', $lecturer->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection