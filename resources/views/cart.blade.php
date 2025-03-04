<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    <!-- Include the Navbar -->
    @include('navbar')

    <main>
        <h1>Your Cart</h1>

        <!-- Cart Items Container -->
        <div id="cart-items"></div>

        <!-- Clear Cart Button -->
        <button id="clear-cart">Clear Cart</button>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const cartItemsContainer = document.getElementById('cart-items'); // Reference to cart items container
            const clearCartButton = document.getElementById('clear-cart'); // Reference to the 'Clear Cart' button

            // Function to load cart items from localStorage
            function loadCart() {
                const cart = JSON.parse(localStorage.getItem('cart')) || []; // Retrieve cart from localStorage or initialize empty array

                if (cart.length === 0) {
                    cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>'; // Show empty cart message
                    return;
                }

                // Generate HTML for each cart item and display it
                cartItemsContainer.innerHTML = cart.map(item => `
                    <div class="cart-item">
                        <img src="${item.image}" alt="${item.name}">
                        <div class="cart-details">
                            <h3>${item.name}</h3>
                            <p>${item.description}</p>
                        </div>
                    </div>
                `).join('');
            }

            // Event listener for clearing the cart
            clearCartButton.addEventListener('click', () => {
                localStorage.removeItem('cart'); // Clear cart from localStorage
                loadCart(); // Reload the cart to reflect changes
                alert('Cart has been cleared.');
            });

            // Load cart items on page load
            loadCart();
        });
    </script>
</body>
</html>
