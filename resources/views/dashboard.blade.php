<style>
    /* Dashboard background */
.dashboard-wrapper {
    background-color: #FFE7DE;
    min-height: 100vh;
    padding: 30px;
    font-family: Arial, sans-serif;
}

/* Section Titles */
.header-title {
    font-size: 28px;
    font-weight: bold;
    color: #333;
    padding-bottom: 20px;
}

.section-title {
    font-size: 20px;
    font-weight: bold;
    margin: 30px 0 15px;
    color: #444;
}

/* Search */
.search-box {
    margin-bottom: 20px;
}

.search-input {
    width: 100%;
    max-width: 400px;
    padding: 10px 16px;
    border: 1px solid #ccc;
    border-radius: 25px;
    font-size: 14px;
}

/* Cards Layout */
.card-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 25px;
}

/* Individual Card */
.card {
    background-color: white;
    padding: 16px;
    border-radius: 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.2s ease;
}

.card:hover {
    transform: translateY(-5px);
}

.card-img {
    width: 130px;
    height: 130px;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
}

.card-title {
    font-size: 14px;
    font-weight: 600;
    color: #333;
}
.category-icons {
    display: flex;
    gap: 20px;
    margin-bottom: 25px;
}

.category-icon {
    background-color: #fff;
    padding: 10px 20px;
    border-radius: 30px;
    font-weight: 600;
    color: #444;
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.2s ease;
}

.category-icon:hover,
.category-icon.active {
    background-color: #FFB6A3;
    color: #fff;
}


</style>
<x-app-layout style="background-color:  #FFE7DE">
    <x-slot name="header">
        <div class="dashboard-wrapper">

        <!-- Category Icons -->
<div class="category-icons">
    <div class="category-icon active">
        🐶 Dog
    </div>
    <div class="category-icon">
        🐱 Cat
    </div>
</div>

        <!-- Search Bar -->
        <div class="search-box">
            <input type="text" placeholder="Search" class="search-input">
        </div>

        <!-- Foods Section -->
        <h3 class="section-title">Foods</h3>
        <div class="card-container">
            @foreach ([
                ['name' => 'Pedigree Adult Dry Dog Food', 'image' => 'images1.png'],
                ['name' => 'Pedigree Puppy Dry Food', 'image' => 'image 2.png'],
                ['name' => 'Himalaya Healthy Pet Food', 'image' => 'image 3.png'],
                ['name' => 'Royal Canin Puppy Food', 'image' => 'image 4.png'],
            ] as $food)
                <div class="card">
                    <img src="{{ asset('images/dashboard/' . $food['image']) }}" class="card-img" alt="{{ $food['name'] }}">
                    <p class="card-title">{{ $food['name'] }}</p>
                </div>
            @endforeach
        </div>

        <!-- Medicines Section -->
        <h3 class="section-title">Medicines</h3>
        <div class="card-container">
            @foreach ([
                ['name' => 'Vetzyme Tablets', 'image' => 'image m1.png'],
                ['name' => 'NexGard Chewables', 'image' => 'image m2.png'],
                ['name' => 'Frontline Spray', 'image' => 'image m3.png'],
                ['name' => 'GreenVet Shampoo', 'image' => 'image m4.png'],
            ] as $med)
                <div class="card">
                    <img src="{{ asset('images/dashboard/' . $med['image']) }}" class="card-img" alt="{{ $med['name'] }}">
                    <p class="card-title">{{ $med['name'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
    </x-slot>
 {{-- Footer --}}
        <div class="mt-10 text-center text-sm text-gray-600">
            <p><strong>Pet Parade</strong> — Swipe. Shop. Snuggle.</p>
            <p class="mt-1">
                <a href="#" class="text-gray-500 hover:underline">Terms & Conditions</a> •
                <a href="#" class="text-gray-500 hover:underline">Privacy Policy</a> •
                <a href="#" class="text-orange-500 font-semibold hover:underline">Contact Us</a>
            </p>
        </div>
</x-app-layout>

