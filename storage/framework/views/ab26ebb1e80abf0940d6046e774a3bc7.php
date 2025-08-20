<?php $__env->startSection('content'); ?>
<div class="container">
    <h3 class="mb-3">Daftar Mata Kuliah</h3>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <a href="<?php echo e(route('courses.create')); ?>" class="btn btn-success mb-3">Tambah Mata Kuliah</a>
	<a href="<?php echo e(route('courses.uploadForm')); ?>" class="btn btn-primary mb-2">Upload Mata Kuliah</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama Mata Kuliah</th>
                <th>Jenis</th>
                <th>SKS</th>
                <th>Prodi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($course->name); ?></td>
                <td><?php echo e(ucfirst($course->type)); ?></td>
                <td><?php echo e($course->sks); ?></td>
                <td><?php echo e($course->department->name ?? '-'); ?></td>
                <td>
                    <a href="<?php echo e(route('courses.show', $course->id)); ?>" class="btn btn-info btn-sm">Detail</a>
                    <a href="<?php echo e(route('courses.edit', $course->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form method="POST" action="<?php echo e(route('courses.destroy', $course->id)); ?>" style="display:inline;">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus mata kuliah ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="5" class="text-center">Belum ada mata kuliah.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sipenjaku\resources\views/courses/index.blade.php ENDPATH**/ ?>