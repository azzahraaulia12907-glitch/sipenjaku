<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>Teaching Team List</h3>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <a href="<?php echo e(route('teaching_teams.create')); ?>" class="btn btn-primary mb-2">Tambah Teaching Team</a>
    <a href="<?php echo e(route('teaching_teams.uploadForm')); ?>" class="btn btn-primary mb-2">Upload Tim Teaching</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($team->code); ?></td>
                <td><?php echo e($team->name); ?></td>
                <td><?php echo e($team->description); ?></td>
                <td>
                    <a href="<?php echo e(route('teaching_teams.show', $team->id)); ?>" class="btn btn-info btn-sm">Detail</a>
                    <a href="<?php echo e(route('teaching_teams.edit', $team->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form action="<?php echo e(route('teaching_teams.destroy', $team->id)); ?>" method="POST" style="display:inline;">
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sipenjaku\resources\views/teaching_teams/index.blade.php ENDPATH**/ ?>