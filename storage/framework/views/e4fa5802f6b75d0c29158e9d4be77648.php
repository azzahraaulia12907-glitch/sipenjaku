<?php $__env->startSection('content'); ?>
<div class="container">
    <h3 class="mb-3">Upload Data Mata Kuliah (Excel/CSV)</h3>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>
    <form method="POST" action="<?php echo e(route('courses.upload')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label class="form-label">Pilih File (.xlsx, .csv)</label>
            <input type="file" name="file" class="form-control" required accept=".xlsx,.csv">
        </div>
        <button type="submit" class="btn btn-success">Upload</button>
        <a href="<?php echo e(route('courses.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
    <hr>
    <p><strong>Template Excel/CSV:</strong></p>
    <table class="table table-bordered w-50">
        <thead>
            <tr>
                <th>code</th>
                <th>name</th>
                <th>credits</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>IF101</td>
                <td>Pemrograman Dasar</td>
                <td>3</td>
            </tr>
            <tr>
                <td>SI202</td>
                <td>Analisis Sistem</td>
                <td>2</td>
            </tr>
        </tbody>
    </table>
    <p>Pastikan urutan dan nama kolom sesuai dengan template di atas.</p>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sipenjaku\resources\views/courses/upload.blade.php ENDPATH**/ ?>