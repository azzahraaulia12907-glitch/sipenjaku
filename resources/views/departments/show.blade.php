@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="mb-3">Detail Prodi</h3>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $department->name }}</h5>
            <p class="card-text">
                <strong>Jumlah Mahasiswa:</strong> {{ $department->student_count }}
            </p>
            <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection