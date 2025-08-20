<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>Data Dosen</h3>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <a href="<?php echo e(route('lecturers.create')); ?>" class="btn btn-primary mb-2">Tambah Dosen</a>
	<a href="<?php echo e(route('lecturers.uploadForm')); ?>" class="btn btn-primary mb-2">Upload Dosen</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $lecturers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lecturer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($lecturer->nidn); ?></td>
                <td><?php echo e($lecturer->name); ?></td>
                <td><?php echo e($lecturer->email); ?></td>
                <td>
                    <a href="<?php echo e(route('lecturers.show', $lecturer->id)); ?>" class="btn btn-info btn-sm">Detail</a>
                    <a href="<?php echo e(route('lecturers.edit', $lecturer->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form action="<?php echo e(route('lecturers.destroy', $lecturer->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sipenjaku\resources\views/lecturers/index.blade.php ENDPATH**/ ?>