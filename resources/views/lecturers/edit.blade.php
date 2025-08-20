@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Dosen</h3>
    <form method="POST" action="{{ route('lecturers.update', $lecturer->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">NIDN</label>
            <input type="text" name="nidn" class="form-control" required value="{{ old('nidn', $lecturer->nidn) }}">
            @error('nidn') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $lecturer->name) }}">
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email', $lecturer->email) }}">
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('lecturers.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection