<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt a Pet - Pet Parade</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/adoption.css')); ?>">
</head>
<body>
    <header class="main-header">
        <div class="container header-content">
            <div class="logo-section">
                <img src="<?php echo e(asset('HomePageImages/Logo.png')); ?>" alt="Pet Parade Logo" class="logo">
                <h1 class="brand">Pet Parade</h1>
            </div>
            <nav class="navigation">
                <ul>
                    <li><a href="<?php echo e(route('home')); ?>">Showcase</a></li>
                    <li><a href="#">Best Sellers</a></li>
                </ul>
            </nav>
            <div class="account-btn">
                <a href="" class="btn">My Account</a>
            </div>
        </div>
    </header>

    <main>
        <section class="hero-section">
            <div class="container text-center">
                <h2 class="hero-heading">Adopt a Pet</h2>
                <p class="subheading">Find your perfect companion</p>
            </div>
        </section>

        <section class="pets-showcase">
        <div class="container grid">
            <?php $__currentLoopData = $pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="pet-card">
                    <div class="pet-img">
                        <img src="<?php echo e(asset('storage/' . $pet->image)); ?>" alt="<?php echo e($pet->breed); ?>">
                    </div>
                    <div class="pet-details">
                        <p><strong>Breed:</strong> <?php echo e($pet->breed); ?></p>
                        <p><strong>Age:</strong> <?php echo e($pet->age); ?> years</p>
                        <p><?php echo e($pet->description); ?></p>
                    </div>
                    <div class="adopt-btn">
                        <a href="<?php echo e(route('adoption.form', ['id' => $pet->id])); ?>" class="btn">Adopt Me</a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <footer class="main-footer">
        <div class="container footer-content">
            <div class="footer-left">
                <div class="logo-brand">
                    <div class="logo"><img src="<?php echo e(asset('HomePageImages/Logo.png')); ?>" alt="Pet Parade Logo" class="footer-logo"></div>
                    <div class="brand">Pet Parade</div>
                </div>
                <div class="motto"><p>Swipe. Shop. Snuggle.</p></div>
            </div>
            <div class="footer-center">
                <a href="#">Terms & Conditions</a>
                <a href="#">Privacy Policy</a>
            </div>
            <div class="footer-right">
                <a href="#">Contact Us</a>
            </div>
        </div>
    </footer>
</body>
</html> 
<?php /**PATH C:\Users\User\pet_parade_one\resources\views/adoption/adoptionPage.blade.php ENDPATH**/ ?>