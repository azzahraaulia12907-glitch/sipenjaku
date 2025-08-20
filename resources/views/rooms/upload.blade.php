@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Upload Data Ruangan (Excel/CSV)</h3>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form method="POST" action="{{ route('rooms.upload') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Pilih File (.xlsx, .csv)</label>
            <input type="file" name="file" class="form-control" required accept=".xlsx,.csv">
        </div>
        <button type="submit" class="btn btn-success">Upload</button>
        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
    <hr>
    <p><strong>Template Excel/CSV:</strong></p>
    <table class="table table-bordered w-50">
        <thead>
            <tr>
                <th>name</th>
                <th>capacity</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Lab Komputer 1</td>
                <td>40</td>
            </tr>
            <tr>
                <td>Ruang Kelas A</td>
                <td>30</td>
            </tr>
        </tbody>
    </table>
    <p>Pastikan urutan dan nama kolom sesuai dengan template di atas.</p>
</div>
@endsection