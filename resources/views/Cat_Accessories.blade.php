<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat Accessories</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    
    <!-- Include the Navbar -->
    @include('navbar')
    <main>
        <section>
            <h2>Cat Accessories & Toys</h2>
            <div class="product-cards">
                <div class="product-card">
                    <img src="{{ asset('images/cat scratching post.png') }}" alt="cat scratching post">
                    <h3>Cat scratching post</h3>
                    <p>Multi-level structure for cats to climb, scratch, and rest.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/cat bed.png') }}" alt="cat bed">
                    <h3>Cat bed</h3>
                    <p>Cat beds provide a cozy, secure, and comfortable space for cats to rest while keeping fur off furniture.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/cat carrier.png') }}" alt="cat carrier">
                    <h3>Cat carrier</h3>
                    <p>Cat carriers ensure safe and convenient transportation for cats during travel or vet visits.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/cat collar with bell.png') }}" alt="cat collar with bell">
                    <h3>Cat collar with bell</h3>
                    <p>Cat collars with bells help locate your cat easily and alert wildlife to prevent hunting.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/cat grooming kit.png') }}" alt="cat grooming kit">
                    <h3>Cat grooming kit</h3>
                    <p>A cat grooming kit helps maintain your cat's hygiene, reduces shedding, and keeps their coat healthy and tangle-free.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/cat litter box with scoop.png') }}" alt="cat litter box with scoop">
                    <h3>Cat litter box with scoop</h3>
                    <p>A cat litter box provides a private, hygienic space for cats to relieve themselves indoors.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
        </section>
    </main>
    <script src="script.js"></script>
</body>
</html>
