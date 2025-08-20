@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="mb-3">Edit Ruangan</h3>
    <form method="POST" action="{{ route('rooms.update', $room->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Ruangan</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $room->name) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Kapasitas</label>
            <input type="number" name="capacity" class="form-control" required value="{{ old('capacity', $room->capacity) }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection