@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="mb-3">Tambah Mata Kuliah</h3>
    <form method="POST" action="{{ route('courses.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Mata Kuliah</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Jenis</label>
            <select name="type" class="form-select" required>
                <option value="">Pilih Jenis</option>
                <option value="teori">Teori</option>
                <option value="praktikum">Praktikum</option>
                <option value="seminar">Seminar</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">SKS</label>
            <input type="number" name="sks" class="form-control" required value="{{ old('sks') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Prodi</label>
            <select name="department_id" class="form-select" required>
                <option value="">Pilih Prodi</option>
                @foreach($departments as $dep)
                    <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection