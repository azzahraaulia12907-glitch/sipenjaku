@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="mb-3">Detail Ruangan</h3>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $room->name }}</h5>
            <p class="card-text">
                <strong>Kapasitas:</strong> {{ $room->capacity }}
            </p>
            <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection