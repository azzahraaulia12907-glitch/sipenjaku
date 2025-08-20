<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIJADWAL - Penjadwalan Berbasis Genetika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f9f9f9; }
        .navbar { background-color: #00611d; }
        .navbar-brand, .nav-link, .navbar-text { color: #ffd900 !important; }
        .btn-primary { background-color: #00611d; border-color: #00611d; }
        .btn-warning { background-color: #ffd900; color: #00611d; border-color: #ffd900; }
        .form-control:focus { border-color: #00611d; box-shadow: 0 0 0 0.2rem rgba(0,97,29,.25); }
        .table thead { background-color: #00611d; color: #ffd900; }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg mb-4">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('dashboard')); ?>">SIJADWAL</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('schedules.index')); ?>">Jadwal</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('courses.index')); ?>">Mata Kuliah</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('departments.index')); ?>">Prodi</a></li>
                    <?php if(auth()->check()): ?>
                        <li class="nav-item"><span class="navbar-text">Hai, <?php echo e(auth()->user()->name); ?>!</span></li>
                        <li class="nav-item">
                            <form method="POST" action="<?php echo e(route('logout')); ?>" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-sm btn-warning ms-2">Logout</button>
                            </form>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div class="container">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\sipenjaku\resources\views/layouts/app.blade.php ENDPATH**/ ?>