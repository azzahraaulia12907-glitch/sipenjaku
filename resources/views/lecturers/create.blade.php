@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Dosen</h3>
    <form method="POST" action="{{ route('lecturers.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">NIDN</label>
            <input type="text" name="nidn" class="form-control" required value="{{ old('nidn') }}">
            @error('nidn') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('lecturers.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection