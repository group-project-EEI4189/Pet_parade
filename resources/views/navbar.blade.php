<header class="bg-pink-100 p-4 shadow-md sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo Section -->
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/logo.png') }}" alt="Pet Parade Logo" class="h-10">
            <span class="font-bold text-lg text-gray-800">Pet Parade</span>
        </div>

        <!-- Main Navigation Links -->
        <nav class="flex space-x-6">
            <span class="text-orange-500 font-semibold cursor-default">Show Case</span>
            <a href="{{ url('/dog_food') }}" class="text-gray-600 font-medium hover:text-pink-600 transition">
                Best Sellings
            </a>
        </nav>

        <!-- Category Selection -->
        <div class="flex items-center space-x-4">
            <!-- Cat and Dog Buttons -->
            <button id="cat-button" 
                data-food-url="{{ url('/cat_food') }}" 
                data-accessories-url="{{ url('/Cat_Accessories') }}" 
                class="bg-white border border-pink-600 text-pink-600 rounded-full px-4 py-1.5 hover:bg-pink-100 transition">
                Cat
            </button>
            <button id="dog-button" 
                data-food-url="{{ url('/dog_food') }}" 
                data-accessories-url="{{ url('/Dog_Accessories') }}" 
                class="bg-pink-600 text-white rounded-full px-4 py-1.5 hover:bg-pink-700 transition">
                Dog
            </button>
        </div>
    </div>

    <!-- Sub-Navigation Links -->
    <div class="container mx-auto mt-4 flex justify-center space-x-6">
        <a href="#" id="food-link" class="text-gray-600 font-medium hover:text-pink-600 transition">
            Foods & Medicines
        </a>
        <a href="#" id="accessories-link" class="text-gray-600 font-medium hover:text-pink-600 transition">
            Accessories & Toys
        </a>
    </div>

    <!-- Cart Navigation Bar -->
    <nav class="bg-pink-50 mt-4 p-2 shadow-md">
        <div class="container mx-auto flex justify-end">
            <a href="{{ url('/cart') }}" class="text-gray-600 font-medium hover:text-pink-600 transition">
                Cart (<span id="cart-count">0</span>)
            </a>
        </div>
    </nav>
</header>
