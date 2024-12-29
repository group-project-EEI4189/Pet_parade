<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Parade - Dog Foods & Medicines</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>

    <!-- Include the Navbar -->
    @include('navbar')
    <main>
        <section id="dog-section">
            <h2 id="dog-foods">Dog Foods</h2>
            <div class="product-cards">
                <!-- Dog Food products -->
                <div class="product-card">
                    <img src="{{ url('images/royal canin dogfood.png') }}" alt="Royal Canin Breed Health Nutrition">
                    <h3>Royal Canin Breed Health Nutrition</h3>
                    <p>Specialized formulas based on specific dog breeds, addressing unique health needs.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/hillsDF.png') }}" alt="Hill's Science Diet">
                    <h3>Hill's Science Diet</h3>
                    <p>Made with natural ingredients, supports healthy digestion, skin, coat, and energy.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/blue DF.png') }}" alt="Blue Buffalo Life Protection Formula">
                    <h3>Blue Buffalo Life Protection Formula</h3>
                    <p>Contains real meat, wholesome grains, and vegetables to support immune system health.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/purina DF.png') }}" alt="Purina Pro Plan">
                    <h3>Purina Pro Plan</h3>
                    <p>Offers advanced nutrition with high-quality protein and omega-3 for joint health.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/wellness DF.png') }}" alt="Wellness CORE Grain-Free">
                    <h3>Wellness CORE Grain-Free</h3>
                    <p>High-protein, grain-free dog food made with premium meats, fruits, and vegetables.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/merrick DF.png') }}" alt="Merrick Grain-Free Dog Food">
                    <h3>Merrick Grain-Free Dog Food</h3>
                    <p>Features deboned meat as the first ingredient, suitable for sensitive dogs.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/nutro DF.png') }}" alt="Nutro Ultra Adult Dry Dog Food">
                    <h3>Nutro Ultra Adult Dry Dog Food</h3>
                    <p>Made with lean proteins and antioxidants to promote a healthy immune system.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/taste DF.png') }}" alt="Taste of the Wild">
                    <h3>Taste of the Wild</h3>
                    <p>Includes high-quality proteins and probiotics to support digestion and overall health.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/orijen DF.png') }}" alt="Orijen Original Dog Food">
                    <h3>Orijen Original Dog Food</h3>
                    <p>Biologically appropriate food with high protein from fresh, regional ingredients.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/caniddae DF.png') }}" alt="Canidae Pure Limited Ingredient">
                    <h3>Canidae Pure Limited Ingredient</h3>
                    <p>Simple, limited ingredient diet for dogs with food sensitivities or allergies.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            
            <h2 id="dog-medicines">Dog Medicines</h2>
            <div class="product-cards">
                <!-- Dog Medicine products -->
                <div class="product-card">
                    <img src="{{ asset('images/carprofen DM.png') }}" alt="Carprofen (Rimadyl)">
                    <h3>Carprofen (Rimadyl)</h3>
                    <p>A non-steroidal anti-inflammatory drug used for treating pain and inflammation.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/metro DM.png') }}" alt="Metronidazole">
                    <h3>Metronidazole</h3>
                    <p>An antibiotic for treating bacterial infections, often in the gastrointestinal tract.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/apoquel DM.png') }}" alt="Apoquel">
                    <h3>Apoquel</h3>
                    <p>Relieves itching due to allergic skin conditions, commonly used for dermatitis.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/gabapentin DM.png') }}" alt="Gabapentin">
                    <h3>Gabapentin</h3>
                    <p>Medication for nerve pain and seizures, also used to calm dogs during stressful events.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/heartgard DM.png') }}" alt="Heartgard Plus">
                    <h3>Heartgard Plus</h3>
                    <p>Prevents heartworm disease and treats hookworm and roundworm infections.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/trifexis DM.png') }}" alt="Trifexis">
                    <h3>Trifexis</h3>
                    <p>Combines flea prevention with heartworm and intestinal worm treatment.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/cerenia DM.png') }}" alt="Cerenia">
                    <h3>Cerenia</h3>
                    <p>Used to prevent and treat nausea and vomiting, often for motion sickness.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/simparica DM.png') }}" alt="Simparica Trio">
                    <h3>Simparica Trio</h3>
                    <p>Chewable tablet that protects against fleas, ticks, heartworm, and other parasites.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/amoxicillin DM.png') }}" alt="Amoxicillin-Clavulanate (Clavamox)">
                    <h3>Amoxicillin-Clavulanate (Clavamox)</h3>
                    <p>Antibiotic for treating skin, respiratory, and urinary tract infections.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/deramaxx DM.png') }}" alt="Deramaxx">
                    <h3>Deramaxx</h3>
                    <p>An NSAID used for controlling pain and inflammation in osteoarthritis and surgery.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
