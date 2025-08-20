@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="color:#00611d;">Detail Jadwal Perkuliahan</h2>
    <div class="card mb-4">
        <div class="card-header" style="background-color:#ffd900; color:#00611d;">
            Jadwal #{{ $schedule->id }}
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Mata Kuliah</dt>
                <dd class="col-sm-9">{{ $schedule->course->name }}</dd>
                <dt class="col-sm-3">SKS</dt>
                <dd class="col-sm-9">{{ $schedule->course->sks }}</dd>
                <dt class="col-sm-3">Hari</dt>
                <dd class="col-sm-9">{{ $schedule->day }}</dd>
                <dt class="col-sm-3">Jam Mulai</dt>
                <dd class="col-sm-9">{{ date('H:i', strtotime($schedule->start_time)) }}</dd>
                <dt class="col-sm-3">Durasi</dt>
                <dd class="col-sm-9">{{ $schedule->duration }} menit</dd>
                <dt class="col-sm-3">Ruangan</dt>
                <dd class="col-sm-9">{{ $schedule->room ? $schedule->room->name : '-' }}</dd>
                <dt class="col-sm-3">Mode</dt>
                <dd class="col-sm-9">
                    <span class="badge {{ $schedule->mode == 'online' ? 'bg-warning text-dark' : 'bg-success' }}">
                        {{ ucfirst($schedule->mode) }}
                    </span>
                </dd>
                <dt class="col-sm-3">Pengajar</dt>
                <dd class="col-sm-9">
                    @if($schedule->course->teachingTeams->count())
                        @foreach($schedule->course->teachingTeams as $tt)
                            <span class="badge bg-secondary">{{ $tt->user->name }}</span>
                        @endforeach
                    @else
                        <span class="text-muted">Belum ada tim</span>
                    @endif
                </dd>
                <dt class="col-sm-3">Pertemuan Ke-</dt>
                <dd class="col-sm-9">{{ $schedule->meeting_no }}</dd>
            </dl>
        </div>
    </div>
    <a href="{{ route('dashboard') }}" class="btn btn-success" style="background-color: #00611d;">Kembali ke Dashboard</a>
</div>
@endsection