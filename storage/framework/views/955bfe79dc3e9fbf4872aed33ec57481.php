<?php $__env->startSection('content'); ?>
<div class="container">
    <h3 class="mb-3">Daftar Prodi</h3>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <a href="<?php echo e(route('departments.create')); ?>" class="btn btn-success mb-3">Tambah Prodi</a>
	<a href="<?php echo e(route('departments.uploadForm')); ?>" class="btn btn-primary mb-2">Upload Data Prodi</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama Prodi</th>
                <th>Jumlah Mahasiswa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($dep->name); ?></td>
                <td><?php echo e($dep->student_count); ?></td>
                <td>
                    <a href="<?php echo e(route('departments.show', $dep->id)); ?>" class="btn btn-info btn-sm">Detail</a>
                    <a href="<?php echo e(route('departments.edit', $dep->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form method="POST" action="<?php echo e(route('departments.destroy', $dep->id)); ?>" style="display:inline;">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data prodi ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="3" class="text-center">Belum ada prodi.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sipenjaku\resources\views/departments/index.blade.php ENDPATH**/ ?>