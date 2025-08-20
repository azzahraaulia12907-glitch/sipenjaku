@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="mb-3">Tambah Prodi</h3>
    <form method="POST" action="{{ route('departments.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Prodi</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Jumlah Mahasiswa</label>
            <input type="number" name="student_count" class="form-control" required value="{{ old('student_count') }}">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection