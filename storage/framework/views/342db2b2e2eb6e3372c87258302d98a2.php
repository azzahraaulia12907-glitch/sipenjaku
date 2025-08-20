<?php $__env->startSection('content'); ?>
<div class="container">
    <h3 class="mb-3">Upload Data Dosen (Excel/CSV)</h3>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>
    <form method="POST" action="<?php echo e(route('lecturers.upload')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label class="form-label">Pilih File (.xlsx, .csv)</label>
            <input type="file" name="file" class="form-control" required accept=".xlsx,.csv">
        </div>
        <button type="submit" class="btn btn-success">Upload</button>
        <a href="<?php echo e(route('lecturers.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
    <hr>
    <p><strong>Template Excel/CSV:</strong></p>
    <table class="table table-bordered w-50">
        <thead>
            <tr>
                <th>nidn</th>
                <th>name</th>
                <th>email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>12345678</td>
                <td>Dr. Budi Santoso</td>
                <td>budi@kampus.ac.id</td>
            </tr>
            <tr>
                <td>23456789</td>
                <td>Dr. Siti Aminah</td>
                <td>siti@kampus.ac.id</td>
            </tr>
        </tbody>
    </table>
    <p>Pastikan urutan dan nama kolom sesuai dengan template di atas.</p>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sipenjaku\resources\views/lecturers/upload.blade.php ENDPATH**/ ?>