<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mb-4" style="color: #00611d;">Dashboard Penjadwalan</h1>

    <form method="GET" action="<?php echo e(route('dashboard')); ?>" class="row g-3 mb-4">
        <div class="col-md-3">
            <input type="text" name="q" value="<?php echo e(request('q')); ?>" class="form-control" placeholder="Cari mata kuliah atau pengajar...">
        </div>
        <div class="col-md-2">
            <select name="mode" class="form-select">
                <option value="">Mode</option>
                <option value="online" <?php echo e(request('mode') == 'online' ? 'selected' : ''); ?>>Online</option>
                <option value="offline" <?php echo e(request('mode') == 'offline' ? 'selected' : ''); ?>>Offline</option>
            </select>
        </div>
        <div class="col-md-2">
            <select name="day" class="form-select">
                <option value="">Hari</option>
                <?php $__currentLoopData = ['Senin','Selasa','Rabu','Kamis','Jumat']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($day); ?>" <?php echo e(request('day') == $day ? 'selected' : ''); ?>><?php echo e($day); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-2">
            <select name="department" class="form-select">
                <option value="">Prodi</option>
                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($dep->id); ?>" <?php echo e(request('department') == $dep->id ? 'selected' : ''); ?>><?php echo e($dep->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <p class="card-text" style="font-size:2em;"><?php echo e($totalJadwal); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3" style="background-color: #ffd900; color: #00611d;">
                <div class="card-body">
                    <h5 class="card-title">Jadwal Online</h5>
                    <p class="card-text" style="font-size:2em;"><?php echo e($onlineCount); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3" style="background-color: #ffd900; color: #00611d;">
                <div class="card-body">
                    <h5 class="card-title">Jadwal Offline</h5>
                    <p class="card-text" style="font-size:2em;"><?php echo e($offlineCount); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <?php if(auth()->check() && auth()->user()->role === 'admin'): ?>
        <a href="<?php echo e(route('schedules.create')); ?>" class="btn btn-success" style="background-color: #00611d; border-color: #00611d;">
            <i class="fa fa-plus"></i> Tambah Jadwal
        </a>
        <?php endif; ?>
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
                <?php $__empty_1 = true; $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($schedule->day); ?></td>
                        <td><?php echo e(date('H:i', strtotime($schedule->start_time))); ?></td>
                        <td><?php echo e($schedule->course->name); ?></td>
                        <td><?php echo e($schedule->course->sks); ?></td>
                        <td><?php echo e($schedule->duration); ?> menit</td>
                        <td><?php echo e($schedule->room ? $schedule->room->name : '-'); ?></td>
                        <td>
                            <span class="badge <?php echo e($schedule->mode == 'online' ? 'bg-warning text-dark' : 'bg-success'); ?>">
                                <?php echo e(ucfirst($schedule->mode)); ?>

                            </span>
                        </td>
                        <td>
                            <?php if($schedule->course->teachingTeams->count()): ?>
                                <?php $__currentLoopData = $schedule->course->teachingTeams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="badge bg-secondary"><?php echo e($tt->user->name); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <span class="text-muted">Belum ada tim</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($schedule->course->department->name); ?></td>
                        <td>
                            <a href="<?php echo e(route('schedules.show', $schedule->id)); ?>" class="btn btn-sm btn-info">Detail</a>
                            <?php if(auth()->user()->role === 'admin'): ?>
                                <a href="<?php echo e(route('schedules.edit', $schedule->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <form action="<?php echo e(route('schedules.destroy', $schedule->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus jadwal ini?')">Hapus</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="10" class="text-center">Belum ada jadwal perkuliahan.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sipenjaku\resources\views/dashboard.blade.php ENDPATH**/ ?>