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

        <!-- Container to display cart items -->
        <div id="cart-items"></div>

        <!-- Button to clear the cart -->
        <button id="clear-cart">Clear Cart</button>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const cartItemsContainer = document.getElementById('cart-items'); // Reference to the container for cart items
            const clearCartButton = document.getElementById('clear-cart'); // Reference to the 'Clear Cart' button

            // Function to load cart items from localStorage and display them
            function loadCart() {
                const cart = JSON.parse(localStorage.getItem('cart')) || []; // Retrieve cart from localStorage or initialize empty array

                if (cart.length === 0) {
                    cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>'; // Show empty cart message
                    return;
                }

                // Generate HTML for each cart item and add it to the container
                cartItemsContainer.innerHTML = cart.map(item => `
                    <div class="cart-item">
                        <img src="${item.image}" alt="${item.name}" style="width: 100px;">
                        <h3>${item.name}</h3>
                        <p>${item.description}</p>
                    </div>
                `).join('');
            }

            // Event listener for clearing the cart
            clearCartButton.addEventListener('click', () => {
                localStorage.removeItem('cart'); // Clear cart from localStorage
                loadCart(); // Reload the cart to reflect changes
                alert('Cart has been cleared.');
            });

            // Load the cart items on page load
            loadCart();
        });
    </script>
</body>
</html>
