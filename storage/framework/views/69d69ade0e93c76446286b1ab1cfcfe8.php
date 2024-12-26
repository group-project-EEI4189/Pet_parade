<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Pet Parade Admin'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
</head>
<body>
    <div class="navbar">
        <div class="logo-brand">
            <img src="<?php echo e(asset('HomePageImages/Logo.png')); ?>" alt="Logo">
            <span>Pet Parade Admin</span>
        </div>
        <nav>
            <a href="<?php echo e(route('pets.index')); ?>">Dashboard</a>
            <a href="<?php echo e(route('pets.create')); ?>">Add Pet</a>
        </nav>
    </div>

    <div class="content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>
</html>
<?php /**PATH C:\Users\User\pet_parade_one\resources\views/layouts/app.blade.php ENDPATH**/ ?>