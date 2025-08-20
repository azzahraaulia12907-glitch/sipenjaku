<?php $__env->startSection('content'); ?>
<div class="container">
    <h3 class="mb-3">Tambah Mata Kuliah</h3>
    <form method="POST" action="<?php echo e(route('courses.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label class="form-label">Nama Mata Kuliah</label>
            <input type="text" name="name" class="form-control" required value="<?php echo e(old('name')); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Jenis</label>
            <select name="type" class="form-select" required>
                <option value="">Pilih Jenis</option>
                <option value="teori">Teori</option>
                <option value="praktikum">Praktikum</option>
                <option value="seminar">Seminar</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">SKS</label>
            <input type="number" name="sks" class="form-control" required value="<?php echo e(old('sks')); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Prodi</label>
            <select name="department_id" class="form-select" required>
                <option value="">Pilih Prodi</option>
                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($dep->id); ?>"><?php echo e($dep->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?php echo e(route('courses.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sipenjaku\resources\views/courses/create.blade.php ENDPATH**/ ?>