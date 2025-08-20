<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>Upload Data Teaching Team (Excel/CSV)</h3>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>
    <form method="POST" action="<?php echo e(route('teaching_teams.upload')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label class="form-label">Pilih File (.xlsx, .csv)</label>
            <input type="file" name="file" class="form-control" required accept=".xlsx,.csv">
        </div>
        <button type="submit" class="btn btn-success">Upload</button>
        <a href="<?php echo e(route('teaching_teams.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
    <hr>
    <p><strong>Template Excel/CSV:</strong></p>
    <table class="table table-bordered w-50">
        <thead>
            <tr>
                <th>code</th>
                <th>name</th>
                <th>description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>TT101</td>
                <td>Tim Pengajar Algoritma</td>
                <td>Tim pengajar untuk mata kuliah Algoritma</td>
            </tr>
            <tr>
                <td>TT102</td>
                <td>Tim Pengajar Basis Data</td>
                <td>Tim pengajar untuk mata kuliah Basis Data</td>
            </tr>
        </tbody>
    </table>
    <p>Pastikan urutan dan nama kolom sesuai dengan template di atas.</p>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sipenjaku\resources\views/teaching_teams/upload.blade.php ENDPATH**/ ?>