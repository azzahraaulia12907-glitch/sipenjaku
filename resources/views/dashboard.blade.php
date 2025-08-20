@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4" style="color: #00611d;">Dashboard Penjadwalan</h1>

    <form method="GET" action="{{ route('dashboard') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari mata kuliah atau pengajar...">
        </div>
        <div class="col-md-2">
            <select name="mode" class="form-select">
                <option value="">Mode</option>
                <option value="online" {{ request('mode') == 'online' ? 'selected' : '' }}>Online</option>
                <option value="offline" {{ request('mode') == 'offline' ? 'selected' : '' }}>Offline</option>
            </select>
        </div>
        <div class="col-md-2">
            <select name="day" class="form-select">
                <option value="">Hari</option>
                @foreach(['Senin','Selasa','Rabu','Kamis','Jumat'] as $day)
                <option value="{{ $day }}" {{ request('day') == $day ? 'selected' : '' }}>{{ $day }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <select name="department" class="form-select">
                <option value="">Prodi</option>
                @foreach($departments as $dep)
                <option value="{{ $dep->id }}" {{ request('department') == $dep->id ? 'selected' : '' }}>{{ $dep->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary w-100" type="submit"><i class="fa fa-search"></i> Filter</button>
        </div>
    </form>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white mb-3" style="background-color: #00611d;">
                <div class="card-body">
                    <h5 class="card-title">Total Jadwal</h5>
                    <p class="card-text" style="font-size:2em;">{{ $totalJadwal }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3" style="background-color: #ffd900; color: #00611d;">
                <div class="card-body">
                    <h5 class="card-title">Jadwal Online</h5>
                    <p class="card-text" style="font-size:2em;">{{ $onlineCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3" style="background-color: #ffd900; color: #00611d;">
                <div class="card-body">
                    <h5 class="card-title">Jadwal Offline</h5>
                    <p class="card-text" style="font-size:2em;">{{ $offlineCount }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-4">
        @if(auth()->check() && auth()->user()->role === 'admin')
        <a href="{{ route('schedules.create') }}" class="btn btn-success" style="background-color: #00611d; border-color: #00611d;">
            <i class="fa fa-plus"></i> Tambah Jadwal
        </a>
        @endif
    </div>

    <div class="card">
        <div class="card-header" style="background-color: #ffd900;">
            <h4 class="mb-0" style="color: #00611d;">Tabel Jadwal Perkuliahan</h4>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr style="background-color: #00611d; color: #ffd900;">
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Durasi</th>
                        <th>Ruangan</th>
                        <th>Mode</th>
                        <th>Pengajar</th>
                        <th>Prodi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->day }}</td>
                        <td>{{ date('H:i', strtotime($schedule->start_time)) }}</td>
                        <td>{{ $schedule->course->name }}</td>
                        <td>{{ $schedule->course->sks }}</td>
                        <td>{{ $schedule->duration }} menit</td>
                        <td>{{ $schedule->room ? $schedule->room->name : '-' }}</td>
                        <td>
                            <span class="badge {{ $schedule->mode == 'online' ? 'bg-warning text-dark' : 'bg-success' }}">
                                {{ ucfirst($schedule->mode) }}
                            </span>
                        </td>
                        <td>
                            @if($schedule->course->teachingTeams->count())
                                @foreach($schedule->course->teachingTeams as $tt)
                                    <span class="badge bg-secondary">{{ $tt->user->name }}</span>
                                @endforeach
                            @else
                                <span class="text-muted">Belum ada tim</span>
                            @endif
                        </td>
                        <td>{{ $schedule->course->department->name }}</td>
                        <td>
                            <a href="{{ route('schedules.show', $schedule->id) }}" class="btn btn-sm btn-info">Detail</a>
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus jadwal ini?')">Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center">Belum ada jadwal perkuliahan.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection