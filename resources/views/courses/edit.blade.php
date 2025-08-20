@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="mb-3">Edit Mata Kuliah</h3>
    <form method="POST" action="{{ route('courses.update', $course->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Mata Kuliah</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $course->name) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Jenis</label>
            <select name="type" class="form-select" required>
                <option value="teori" {{ $course->type == 'teori' ? 'selected' : '' }}>Teori</option>
                <option value="praktikum" {{ $course->type == 'praktikum' ? 'selected' : '' }}>Praktikum</option>
                <option value="seminar" {{ $course->type == 'seminar' ? 'selected' : '' }}>Seminar</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">SKS</label>
            <input type="number" name="sks" class="form-control" required value="{{ old('sks', $course->sks) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Prodi</label>
            <select name="department_id" class="form-select" required>
                <option value="">Pilih Prodi</option>
                @foreach($departments as $dep)
                    <option value="{{ $dep->id }}" {{ $course->department_id == $dep->id ? 'selected' : '' }}>{{ $dep->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection