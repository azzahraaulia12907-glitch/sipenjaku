@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Upload Data Dosen (Excel/CSV)</h3>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form method="POST" action="{{ route('lecturers.upload') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Pilih File (.xlsx, .csv)</label>
            <input type="file" name="file" class="form-control" required accept=".xlsx,.csv">
        </div>
        <button type="submit" class="btn btn-success">Upload</button>
        <a href="{{ route('lecturers.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
    <hr>
    <p><strong>Template Excel/CSV:</strong></p>
    <table class="table table-bordered w-50">
        <thead>
            <tr>
                <th>nidn</th>
                <th>name</th>
                <th>email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>12345678</td>
                <td>Dr. Budi Santoso</td>
                <td>budi@kampus.ac.id</td>
            </tr>
            <tr>
                <td>23456789</td>
                <td>Dr. Siti Aminah</td>
                <td>siti@kampus.ac.id</td>
            </tr>
        </tbody>
    </table>
    <p>Pastikan urutan dan nama kolom sesuai dengan template di atas.</p>
</div>
@endsection