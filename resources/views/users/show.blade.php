@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="mb-3">Detail Pengajar</h3>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">
                <strong>Email:</strong> {{ $user->email }}<br>
                <strong>Role:</strong> {{ ucfirst($user->role) }}
            </p>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection