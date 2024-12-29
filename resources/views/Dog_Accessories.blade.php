<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Accessories</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <!-- Include the Navbar -->
    @include('navbar')
    <main>
        <section>
            <h2>Dog Accessories & Toys</h2>
            <div class="product-cards">
                <div class="product-card">
                    <img src="{{ asset('images/dog toys.png') }}" alt="dog toys">
                    <h3>dog toys</h3>
                    <p>Dog toys are items designed to entertain, stimulate, and promote the physical and mental health of dogs through play.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/dog bed.png') }}" alt="dog bed">
                    <h3>Dog bed</h3>
                    <p>A dog bed is a comfortable resting place designed specifically for dogs to provide them with warmth, support, and a sense of security.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/dog collar with id tag.png') }}" alt="dog collar with id tag">
                    <h3>dog collar with id tag</h3>
                    <p>A dog collar with an ID tag is a wearable accessory for dogs that secures identification information,ensuring they can be easily identified and returned if lost.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/dog grooming kit.png') }}" alt="dog grooming kit">
                    <h3>Dog grooming kit</h3>
                    <p>A dog grooming kit is a set of tools designed to maintain a dog's hygiene and appearance,typically including brushes, clippers, nail trimmers etc.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/dog harness.png') }}" alt="dog harness">
                    <h3>Dog harness</h3>
                    <p>A dog harness is a piece of equipment that fits around a dog's torso, providing better control and comfort during walks while reducing strain on the neck.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/dog leash.png') }}" alt="dog leash">
                    <h3>Dog leash</h3>
                    <p>A dog leash is a strap or cord used to control and guide a dog during walks, ensuring safety and compliance in public spaces.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/dog raincoat.png') }}" alt="dog raincoat">
                    <h3>Dog raincoat</h3>
                    <p>A dog raincoat is a waterproof garment designed to protect dogs from rain and keep them dry and comfortable during wet weather.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
        </section>
    </main>
    <script src="script.js"></script>
</body>
</html>
