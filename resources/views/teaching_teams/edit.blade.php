@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Teaching Team</h3>
    <form method="POST" action="{{ route('teaching_teams.update', $team->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Kode</label>
            <input type="text" name="code" class="form-control" required value="{{ old('code', $team->code) }}">
            @error('code') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $team->name) }}">
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <input type="text" name="description" class="form-control" value="{{ old('description', $team->description) }}">
            @error('description') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('teaching_teams.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection