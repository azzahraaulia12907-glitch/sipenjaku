@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="mb-3">Tambah Ruangan</h3>
    <form method="POST" action="{{ route('rooms.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Ruangan</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Kapasitas</label>
            <input type="number" name="capacity" class="form-control" required value="{{ old('capacity') }}">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection