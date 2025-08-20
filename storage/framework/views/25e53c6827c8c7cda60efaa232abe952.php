<?php $__env->startSection('content'); ?>
<div class="container">
    <h3 class="mb-3">Daftar Ruangan</h3>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <a href="<?php echo e(route('rooms.create')); ?>" class="btn btn-success mb-3">Tambah Ruangan</a>
	<a href="<?php echo e(route('rooms.uploadForm')); ?>" class="btn btn-primary mb-2">Upload Ruangang</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama Ruangan</th>
                <th>Kapasitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($room->name); ?></td>
                <td><?php echo e($room->capacity); ?></td>
                <td>
                    <a href="<?php echo e(route('rooms.show', $room->id)); ?>" class="btn btn-info btn-sm">Detail</a>
                    <a href="<?php echo e(route('rooms.edit', $room->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form method="POST" action="<?php echo e(route('rooms.destroy', $room->id)); ?>" style="display:inline;">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus ruangan ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="3" class="text-center">Belum ada ruangan.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sipenjaku\resources\views/rooms/index.blade.php ENDPATH**/ ?>