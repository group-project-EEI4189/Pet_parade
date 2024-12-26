<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Parade</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/home.css')); ?>">
</head>
<body>
    <div class="home-up">
        <header class="home-header">
            <div class="head">
                <div class="logo-brand">
                    <div class="logo"><img src="<?php echo e(asset('HomePageImages/Logo.png')); ?>" alt="Logo"></div>
                    <div class="brand">Pet Parade</div>
                </div>
                <nav>
                    <div class="main-nav">
                        <ul>
                            <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li><a href="">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="auth-nav-btn">
                        <ul>
                            <?php if(auth()->guard()->guest()): ?>
                                <li><a href="" class="login-btn">Login</a></li>
                                <li><a href="" class="signup-btn">Sign Up</a></li>
                            <?php else: ?>
                                <li><a href="" class="login-btn">Dashboard</a></li>
                                <li>
                                    <a href="" class="signup-btn" 
                                       onclick="event.preventDefault(); 
                                       document.getElementById('logout-form').submit();">
                                       Logout
                                    </a>
                                </li>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            <?php endif; ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <main class="home-main">
            <section class="hero-1">
                <div class="first-main">
                    <div class="first-main-content-left">
                        <img src="<?php echo e(asset('HomePageImages/FamilyWithPet.png')); ?>" alt="Family with pet">
                    </div>
                    <div class="first-main-content-right">
                        <h1>Swipe. <span class="word-shop">Shop</span>. Snuggle.</h1>
                        <a href="" class="get-started-btn">Get Started</a>
                    </div>
                </div>
            </section>
        </main>
    </div>   
    <div class="home-down">       
        <div class="third-main">
            <h1>Ready to Pamper Your Pets?</h1>
            <p>Discover top-quality pet foods, stylish accessories, fun toys and medicines at</p>
            <p>Pet Parade to keep your furry friends happy and healthy.</p>
        </div>
        <div class="tail">
            <a href="">Terms & Conditions</a>
            <a href="">Privacy Policy</a>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\User\pet_parade_one\resources\views/home.blade.php ENDPATH**/ ?>