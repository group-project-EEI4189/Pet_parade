import './bootstrap';

// Wait until the DOM content is fully loaded
document.addEventListener("DOMContentLoaded", () => {
    const addToCartButtons = document.querySelectorAll('.add-to-cart'); // Select all 'Add to Cart' buttons
    const cartCount = document.getElementById('cart-count'); // Reference to the cart count display in the header

    // Initialize the cart count on page load
    updateCartCount();

    // Add click event listener to each 'Add to Cart' button
    addToCartButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            // Get the parent product card of the clicked button
            const productCard = event.target.closest('.product-card');

            // Extract product details from the product card
            const productName = productCard.querySelector('h3').innerText;
            const productDescription = productCard.querySelector('p').innerText;
            const productImage = productCard.querySelector('img').src;

            // Call the function to add the product to the cart
            addToCart(productName, productDescription, productImage);
        });
    });

    // Function to add a product to the cart
    function addToCart(name, description, image) {
        // Retrieve the current cart from localStorage (or initialize an empty array if none exists)
        const cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Add the new product to the cart array
        cart.push({ name, description, image });

        // Save the updated cart back to localStorage
        localStorage.setItem('cart', JSON.stringify(cart));

        // Provide feedback to the user
        alert(`${name} has been added to your cart.`);

        // Update the cart count display
        updateCartCount();
    }

    // Function to update the cart count in the header
    function updateCartCount() {
        // Retrieve the current cart from localStorage
        const cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Update the cart count display with the number of items in the cart
        cartCount.textContent = cart.length;
    }
});

// navigation bar function

document.addEventListener('DOMContentLoaded', () => {
    // Reference the category buttons
    const catButton = document.getElementById('cat-button');
    const dogButton = document.getElementById('dog-button');

    // Reference the sub-navigation links
    const foodLink = document.getElementById('food-link');
    const accessoriesLink = document.getElementById('accessories-link');

    // Default category (Dog)
    updateNavigation(dogButton.dataset.foodUrl, dogButton.dataset.accessoriesUrl);

    // Add event listeners to the category buttons
    catButton.addEventListener('click', () => {
        updateNavigation(catButton.dataset.foodUrl, catButton.dataset.accessoriesUrl);
    });

    dogButton.addEventListener('click', () => {
        updateNavigation(dogButton.dataset.foodUrl, dogButton.dataset.accessoriesUrl);
    });

    // Function to update navigation links
    function updateNavigation(foodUrl, accessoriesUrl) {
        // Update the href attributes of the links
        foodLink.href = foodUrl;
        accessoriesLink.href = accessoriesUrl;

        // Provide visual feedback for the active category
        if (foodUrl.includes('cat')) {
            catButton.classList.add('bg-pink-600', 'text-white');
            catButton.classList.remove('bg-white', 'text-pink-600');

            dogButton.classList.add('bg-white', 'text-pink-600');
            dogButton.classList.remove('bg-pink-600', 'text-white');
        } else {
            dogButton.classList.add('bg-pink-600', 'text-white');
            dogButton.classList.remove('bg-white', 'text-pink-600');

            catButton.classList.add('bg-white', 'text-pink-600');
            catButton.classList.remove('bg-pink-600', 'text-white');
        }
    }
});



