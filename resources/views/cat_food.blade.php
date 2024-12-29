<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Parade - Cat Foods & Medicines</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <!-- Include the Navbar -->
    @include('navbar')
    <main>
        <section id="cat-section">
            <!-- Cat Food Products -->
            <h2 id="cat-foods">Cat Foods</h2>
            <div class="product-cards">
                <div class="product-card">
                    <img src="{{ asset('images/cat royal food.png') }}" alt="Royal Canin Indoor Adult Dry Cat Food">
                    <h3>Royal Canin Indoor Adult Dry Cat Food</h3>
                    <p>A specialized diet for indoor cats to support healthy digestion and reduce hairballs.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/purina cat.png') }}" alt="Purina ONE Indoor Advantage Adult Dry Cat Food">
                    <h3>Purina ONE Indoor Advantage Adult Dry Cat Food</h3>
                    <p>Formulated to help maintain a healthy weight and lean muscles for indoor cats.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/hills cat.png') }}" alt="Hill's Science Diet Adult Indoor Cat Food">
                    <h3>Hill's Science Diet Adult Indoor Cat Food</h3>
                    <p>Supports healthy digestion and weight management for indoor cats.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/blue buff cat.png') }}" alt="Blue Buffalo Wilderness High Protein Grain Free, Natural Adult Indoor Hairball Control Dry Cat Food">
                    <h3>Blue Buffalo Wilderness High Protein Grain Free, Natural Adult Indoor Hairball Control Dry Cat Food</h3>
                    <p>Grain-free formula to reduce hairballs and support healthy weight in indoor cats.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/lams cat.png') }}" alt="Iams Proactive Health Adult Indoor Weight & Hairball Care Dry Cat Food">
                    <h3>Iams Proactive Health Adult Indoor Weight & Hairball Care Dry Cat Food</h3>
                    <p>Helps maintain a healthy weight and reduces hairballs with a tailored fiber blend.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/nutro_cat.png') }}" alt="Nutro Wholesome Essentials Indoor Adult Dry Cat Food">
                    <h3>Nutro Wholesome Essentials Indoor Adult Dry Cat Food</h3>
                    <p>Provides essential nutrients and fiber to support indoor cats' health and wellbeing.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/fancy cat.png') }}" alt="Fancy Feast Gravy Lovers Poultry & Beef Feast Variety Pack Canned Cat Food">
                    <h3>Fancy Feast Gravy Lovers Poultry & Beef Feast Variety Pack Canned Cat Food</h3>
                    <p>A delicious variety of wet food to satisfy the gourmet tastes of your indoor cat.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/sheba cat.png') }}" alt="Sheba Perfect Portions Paté Wet Cat Food Trays">
                    <h3>Sheba Perfect Portions Paté Wet Cat Food Trays</h3>
                    <p>Convenient, single-serve trays of delicious paté for easy portion control.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/meow cat.png') }}" alt="Meow Mix Original Choice Dry Cat Food">
                    <h3>Meow Mix Original Choice Dry Cat Food</h3>
                    <p>A balanced and complete dry cat food with irresistible flavors and essential nutrients.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/core_cat .png') }}" alt="Wellness CORE RawRev Indoor Recipe with Freeze-Dried Turkey & Chicken Dry Cat Food">
                    <h3>Wellness CORE RawRev Indoor Recipe with Freeze-Dried Turkey & Chicken Dry Cat Food</h3>
                    <p>Combines high-protein kibble with freeze-dried raw meat to support lean body mass and healthy weight.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            
            <h2 id="cat-medicines">Cat Medicines</h2>
            <div class="product-cards">
                <!-- Medicine products -->
                <div class="product-card">
                    <img src="{{ asset('images/revolution.png') }}" alt="Revolution Plus for Cats">
                    <h3>Revolution Plus for Cats</h3>
                    <p>A topical solution that protects cats from fleas, ticks, ear mites, roundworms, hookworms, and heartworms.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/frontline.png') }}" alt="Frontline Plus for Cats">
                    <h3>Frontline Plus for Cats</h3>
                    <p>A topical flea and tick treatment that kills fleas, flea eggs, lice, and ticks, and prevents infestations.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/advantage.png') }}" alt="Advantage II for Cats">
                    <h3>Advantage II for Cats</h3>
                    <p>A topical flea prevention that kills adult fleas, flea larvae, and flea eggs, providing comprehensive flea control.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/cerenia.png') }}" alt="Cerenia Tablets">
                    <h3>Cerenia Tablets</h3>
                    <p>Used to prevent acute vomiting and motion sickness in cats. Commonly prescribed for gastrointestinal issues.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/fortiflora.png') }}" alt="FortiFlora for Cats">
                    <h3>FortiFlora for Cats</h3>
                    <p>A probiotic supplement that helps manage diarrhea and improves intestinal health in cats. Supports a healthy immune system.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/methimazole.png') }}" alt="Methimazole (Tapazole)">
                    <h3>Methimazole (Tapazole)</h3>
                    <p>An oral medication used to treat hyperthyroidism in cats. Helps regulate thyroid hormone levels.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/prednisolone.png') }}" alt="Prednisolone">
                    <h3>Prednisolone</h3>
                    <p>A corticosteroid used to treat a variety of inflammatory and immune-mediated conditions in cats, including allergies, asthma, and arthritis.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/drontal.png') }}" alt="Drontal for Cats">
                    <h3>Drontal for Cats</h3>
                    <p>A broad-spectrum dewormer that treats tapeworms, roundworms, and hookworms. Available in tablet form.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/baytril.png') }}" alt="Baytril (Enrofloxacin)">
                    <h3>Baytril (Enrofloxacin)</h3>
                    <p>An antibiotic used to treat bacterial infections in cats, including skin infections, urinary tract infections, and respiratory infections.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/bupreno medi.png') }}" alt="Buprenorphine">
                    <h3>Buprenorphine</h3>
                    <p>A pain relief medication used to manage moderate to severe pain in cats. Often prescribed post-surgery or for chronic pain conditions.</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
        </section>
    </main>
</body>
</html>

