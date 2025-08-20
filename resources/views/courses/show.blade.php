@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="mb-3">Detail Mata Kuliah</h3>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $course->name }}</h5>
            <p class="card-text">
                <strong>Jenis:</strong> {{ ucfirst($course->type) }}<br>
                <strong>SKS:</strong> {{ $course->sks }}<br>
                <strong>Prodi:</strong> {{ $course->department->name ?? '-' }}
            </p>
            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection