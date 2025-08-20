<?php $__env->startSection('content'); ?>
<div class="container">
    <h3 class="mb-3">Tambah Prodi</h3>
    <form method="POST" action="<?php echo e(route('departments.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label class="form-label">Nama Prodi</label>
            <input type="text" name="name" class="form-control" required value="<?php echo e(old('name')); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Jumlah Mahasiswa</label>
            <input type="number" name="student_count" class="form-control" required value="<?php echo e(old('student_count')); ?>">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?php echo e(route('departments.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sipenjaku\resources\views/departments/create.blade.php ENDPATH**/ ?>