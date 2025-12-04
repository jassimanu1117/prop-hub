@extends('layouts.app')

@section('title', 'Home - Property & To-Let Listings')

@section('content')

<!-- Hero Section -->
<section class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content container">
        <h1>Find Your Perfect Property or Rental Home</h1>
<p>Search, Explore & Discover Properties & To-Let Listings Easily with <span>ProRent</span> – Your Trusted Real Estate Platform</p>

        <a href="#" class="btn">Start Searching</a>
    </div>
</section>

<!-- Search Section -->
<section class="search-section container mt-5">
    <div class="row g-3 align-items-center">

    <!-- Location -->
    <div class="col-md-4 position-relative">
        <input type="text" id="locationInput" class="form-control" placeholder="City, Area, Landmark or Pin Code">
        <ul id="locationSuggestions" class="list-group position-absolute w-100 d-none" style="z-index: 999;"></ul>
    </div>

    <!-- Listing Category -->
    <div class="col-md-3">
        <select id="listingType" class="form-select">
            <option selected>Listing Type</option>
             <option value="sale">Properties for Sale</option>
             <option value="rent">Properties for Rent</option>
            <option value="room">Rooms / PG / Hostels</option>
           
        </select>
    </div>

    <!-- Property Type -->
    <div class="col-md-3">
        <select id="propertyType" class="form-select">
            <option selected>Property Type</option>
        
            <!-- Residential -->
            <option disabled>-- Residential --</option>
            <option>Apartment / Flat</option>
            <option>Independent House / Villa</option>
            <option>Builder Floor</option>
            <option>Studio Apartment</option>
            <option>Penthouse</option>

            <!-- Rooms & PG -->
            <option disabled>-- Rooms & PG --</option>
            <option>Room (Single)</option>
            <option>Room (Shared)</option>
            <option>PG / Hostel</option>
            <option>Coliving Space</option>

            <!-- Commercial -->
            <option disabled>-- Commercial --</option>
            <option>Office Space</option>
            <option>Shop / Showroom</option>
            <option>Warehouse / Godown</option>

        </select>
    </div>

    <!-- Budget -->
    <div class="col-md-2">
        <select id="budget" class="form-select">
            <option selected>Budget</option>
            <option>₹5,000 - ₹10,000</option>
            <option>₹10,001 - ₹20,000</option>
            <option>₹20,001 - ₹40,000</option>
            <option>₹40,001 - ₹80,000</option>
            <option>₹80,000+</option>
        </select>
    </div>

    <!-- Search Button -->
    <div class="col-md-12 col-lg-2">
        <button id="searchBtn" class="btn w-100">Search</button>
    </div>

</div>


</section>

<!-- Featured Properties Section -->
<section class="featured container mt-5" id="featuredPropertiesSection">
    <!-- Section Header + Filter Bar -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3">
        <h2 class="mb-3 mb-md-0">Featured Properties</h2>

        <!-- Filter Bar -->
        <div class="d-flex gap-2 overflow-auto pb-2" id="propertyBadgeFilterBar">
            <button class="btn btn-sm btn-outline-dark active badge-filter" data-filter="all">All</button>
            <button class="btn btn-sm btn-outline-success badge-filter" data-filter="featured">Featured</button>
            <button class="btn btn-sm btn-outline-primary badge-filter" data-filter="furnished">Furnished</button>
            <button class="btn btn-sm btn-outline-warning badge-filter" data-filter="new-listing">New Listing</button>
            <button class="btn btn-sm btn-outline-danger badge-filter" data-filter="hot-deal">Hot Deal</button>
        </div>
    </div>

    <div class="row g-4">

        <!-- Card 1 -->
        <div class="col-md-4 mb-4 property-card-item" data-badges="featured,furnished">
            <div class="card property-card h-100 shadow-sm border-0">
                <div class="position-absolute m-2" style="z-index: 10;">
                    <span class="badge bg-success">Featured</span>
                    <span class="badge bg-primary">Furnished</span>
                    <span class="badge bg-info">For Sale</span>
                </div>
                <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?auto=format&fit=crop&w=400&q=80" 
                     class="card-img-top" alt="Luxury Apartment">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">Luxury Apartment in Downtown</h5>
                    <p class="text-muted small mb-2"><i class="bi bi-geo-alt"></i> Connaught Place, New Delhi</p>
                    <p class="card-text small mb-2">2 BHK • Modern apartment with balcony, city view, modular kitchen and 24/7 security.</p>

                    <div class="d-flex justify-content-between text-muted small mb-3">
                        <span><i class="bi bi-door-open"></i> 2 Beds</span>
                        <span><i class="bi bi-droplet"></i> 2 Baths</span>
                        <span><i class="bi bi-aspect-ratio"></i> 1200 sqft</span>
                    </div>

                    <p class="fw-bold text-primary fs-5">₹18,000 / month</p>

                    <div class="d-flex gap-2 mt-auto">
                        <a href="#" class="btn btn-outline-primary w-50">View Details</a>
                        <a href="https://wa.me/919999999999" target="_blank" class="btn btn-success w-50 d-flex justify-content-center align-items-center">
                            <i class="bi bi-whatsapp fs-5 me-1"></i> WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4 mb-4 property-card-item" data-badges="featured,new-listing">
            <div class="card property-card h-100 shadow-sm border-0">
                <div class="position-absolute m-2" style="z-index: 10;">
                    <span class="badge bg-success">Featured</span>
                    <span class="badge bg-warning text-dark">New Listing</span>
                    <span class="badge bg-info">For Sale</span>
                </div>
                <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&w=400&q=80" 
                     class="card-img-top" alt="Modern Villa">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">Modern Villa with Garden</h5>
                    <p class="text-muted small mb-2"><i class="bi bi-geo-alt"></i> Bandra West, Mumbai</p>
                    <p class="card-text small mb-2">3 BHK • Spacious villa with private garden, parking, and swimming pool.</p>

                    <div class="d-flex justify-content-between text-muted small mb-3">
                        <span><i class="bi bi-door-open"></i> 3 Beds</span>
                        <span><i class="bi bi-droplet"></i> 3 Baths</span>
                        <span><i class="bi bi-aspect-ratio"></i> 2000 sqft</span>
                    </div>

                    <p class="fw-bold text-primary fs-5">₹45,000 / month</p>

                    <div class="d-flex gap-2 mt-auto">
                        <a href="#" class="btn btn-outline-primary w-50">View Details</a>
                        <a href="https://wa.me/919999999999" target="_blank" class="btn btn-success w-50 d-flex justify-content-center align-items-center">
                            <i class="bi bi-whatsapp fs-5 me-1"></i> WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4 mb-4 property-card-item" data-badges="featured,hot-deal">
            <div class="card property-card h-100 shadow-sm border-0">
                <div class="position-absolute m-2" style="z-index: 10;">
                    <span class="badge bg-success">Featured</span>
                    <span class="badge bg-danger">Hot Deal</span>
                    <span class="badge bg-info">For Sale</span>
                </div>
                <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&w=400&q=80" 
                     class="card-img-top" alt="City Apartment">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">City Apartment with Terrace</h5>
                    <p class="text-muted small mb-2"><i class="bi bi-geo-alt"></i> Koregaon Park, Pune</p>
                    <p class="card-text small mb-2">2 BHK • Apartment with terrace, modular kitchen, and gym facility.</p>

                    <div class="d-flex justify-content-between text-muted small mb-3">
                        <span><i class="bi bi-door-open"></i> 2 Beds</span>
                        <span><i class="bi bi-droplet"></i> 2 Baths</span>
                        <span><i class="bi bi-aspect-ratio"></i> 1000 sqft</span>
                    </div>

                    <p class="fw-bold text-primary fs-5">₹22,000 / month</p>

                    <div class="d-flex gap-2 mt-auto">
                        <a href="#" class="btn btn-outline-primary w-50">View Details</a>
                        <a href="https://wa.me/919999999999" target="_blank" class="btn btn-success w-50 d-flex justify-content-center align-items-center">
                            <i class="bi bi-whatsapp fs-5 me-1"></i> WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<!-- Rooms / To-Let Section -->
<section class="featured container mt-5" id="roomCardsSection">
    <!-- Section Header + Filter Bar -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3">
        <h2 class="mb-3 mb-md-0">Rooms / To-Let Listings</h2>

        <!-- Right Filter Bar (Rooms Filters) -->
        <div class="d-flex gap-2 overflow-auto pb-2 badgeFilterBar" id="roomBadgeFilterBar">
            <button class="btn btn-sm btn-outline-dark active room-filter" data-filter="all">All</button>
            <button class="btn btn-sm btn-outline-info room-filter" data-filter="for-rent">For Rent</button>
            <button class="btn btn-sm btn-outline-primary room-filter" data-filter="featured">Featured</button>
            <button class="btn btn-sm btn-outline-success room-filter" data-filter="furnished">Furnished</button>
            <button class="btn btn-sm btn-outline-success room-filter" data-filter="shared">Shared</button>
            <button class="btn btn-sm btn-outline-warning room-filter" data-filter="new-listing">New Listing</button>
            <button class="btn btn-sm btn-outline-danger room-filter" data-filter="hot-deal">Hot Deal</button>
            <button class="btn btn-sm btn-outline-secondary room-filter" data-filter="single-room">Single Room</button>
        </div>
    </div>

    <div class="row g-4">

        <!-- Card 1 -->
        <div class="col-md-4 mb-4 property-card-item" data-badges="for-rent,featured,furnished">
            <div class="card property-card h-100 shadow-sm border-0">
                <div class="position-absolute m-2" style="z-index: 10;">
                    <span class="badge bg-info">For Rent</span>
                    <span class="badge bg-success">Featured</span>
                    <span class="badge bg-primary">Furnished</span>
                </div>
                <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Cozy Single Room">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">Cozy Single Room</h5>
                    <p class="text-muted small mb-2"><i class="bi bi-geo-alt"></i> Andheri West, Mumbai</p>
                    <p class="card-text small mb-2">1 BHK • 400 sqft • Fully Furnished • 24/7 Security • Shared Kitchen Available</p>
                    <div class="d-flex justify-content-between text-muted small mb-3">
                        <span><i class="bi bi-door-open"></i> 1 Bed</span>
                        <span><i class="bi bi-droplet"></i> 1 Bath</span>
                        <span><i class="bi bi-aspect-ratio"></i> 400 sqft</span>
                    </div>
                    <p class="fw-bold text-primary fs-5">₹8,500 / month</p>
                    <div class="d-flex gap-2 mt-auto">
                        <a href="#" class="btn btn-outline-primary w-50">View Details</a>
                        <a href="https://wa.me/919999999999?text=Hi%2C%20I%20am%20interested%20in%20this%20room" target="_blank" class="btn btn-success w-50 d-flex justify-content-center align-items-center">
                            <i class="bi bi-whatsapp fs-5 me-1"></i> WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4 mb-4 property-card-item" data-badges="for-rent,new-listing,shared">
            <div class="card property-card h-100 shadow-sm border-0">
                <div class="position-absolute m-2" style="z-index: 10;">
                    <span class="badge bg-info">For Rent</span>
                    <span class="badge bg-warning text-dark">New Listing</span>
                    <span class="badge bg-success">Shared</span>
                </div>
                <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Shared PG / Hostel">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">Shared PG / Hostel</h5>
                    <p class="text-muted small mb-2"><i class="bi bi-geo-alt"></i> Connaught Place, New Delhi</p>
                    <p class="card-text small mb-2">Shared accommodation • Fully Furnished • Utilities Included • Meals Available</p>
                    <div class="d-flex justify-content-between text-muted small mb-3">
                        <span><i class="bi bi-door-open"></i> 1 Bed</span>
                        <span><i class="bi bi-droplet"></i> 1 Bath</span>
                        <span><i class="bi bi-aspect-ratio"></i> 350 sqft</span>
                    </div>
                    <p class="fw-bold text-primary fs-5">₹5,000 / month</p>
                    <div class="d-flex gap-2 mt-auto">
                        <a href="#" class="btn btn-outline-primary w-50">View Details</a>
                        <a href="https://wa.me/919999999999?text=Interested%20in%20PG%20Room" target="_blank" class="btn btn-success w-50 d-flex justify-content-center align-items-center">
                            <i class="bi bi-whatsapp fs-5 me-1"></i> WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4 mb-4 property-card-item" data-badges="for-rent,hot-deal,furnished">
            <div class="card property-card h-100 shadow-sm border-0">
                <div class="position-absolute m-2" style="z-index: 10;">
                    <span class="badge bg-info">For Rent</span>
                    <span class="badge bg-danger">Hot Deal</span>
                    <span class="badge bg-secondary">Furnished</span>
                </div>
                <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="1 BHK Studio">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">1 BHK Studio</h5>
                    <p class="text-muted small mb-2"><i class="bi bi-geo-alt"></i> Baner, Pune</p>
                    <p class="card-text small mb-2">1 BHK • 500 sqft • Single Occupancy • Ready to Move • WiFi Available</p>
                    <div class="d-flex justify-content-between text-muted small mb-3">
                        <span><i class="bi bi-door-open"></i> 1 Bed</span>
                        <span><i class="bi bi-droplet"></i> 1 Bath</span>
                        <span><i class="bi bi-aspect-ratio"></i> 500 sqft</span>
                    </div>
                    <p class="fw-bold text-primary fs-5">₹7,500 / month</p>
                    <div class="d-flex gap-2 mt-auto">
                        <a href="#" class="btn btn-outline-primary w-50">View Details</a>
                        <a href="https://wa.me/919999999999?text=Interested%20in%201BHK%20Room" target="_blank" class="btn btn-success w-50 d-flex justify-content-center align-items-center">
                            <i class="bi bi-whatsapp fs-5 me-1"></i> WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>



<!-- Property Categories -->
<section class="categories container mt-5">
    <h2>Explore by Category</h2>
    <div class="row g-4">
        <div class="col-md-3">
            <div class="category-card">
                <img src="https://images.unsplash.com/photo-1599423300746-b62533397364?auto=format&fit=crop&w=400&q=80" alt="Apartment">

                <h5>Apartment</h5>
            </div>
        </div>
        <div class="col-md-3">
            <div class="category-card">
                <img src="https://images.unsplash.com/photo-1599423300746-b62533397364?auto=format&fit=crop&w=400&q=80" alt="House">
                <h5>House</h5>
            </div>
        </div>
        <div class="col-md-3">
            <div class="category-card">
                <img src="https://images.unsplash.com/photo-1599423300746-b62533397364?auto=format&fit=crop&w=400&q=80" alt="Studio">
                <h5>Studio</h5>
            </div>
        </div>
        <div class="col-md-3">
            <div class="category-card">
               <img src="https://images.unsplash.com/photo-1599423300746-b62533397364?auto=format&fit=crop&w=400&q=80" alt="Shared">
                <h5>PG / Shared</h5>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="how-it-works">
    <h2>How It Works</h2>
    <div class="steps">
        <div class="step">
            <i class="fa fa-search"></i>
            <h5>Search Property</h5>
            <p>Find properties based on location, type, and budget.</p>
        </div>
        <div class="step">
            <i class="fa fa-home"></i>
            <h5>Visit & Explore</h5>
            <p>Schedule visits to explore properties in real life.</p>
        </div>
        <div class="step">
            <i class="fa fa-file-contract"></i>
            <h5>Rent & Move-In</h5>
            <p>Complete digital agreements and move in seamlessly.</p>
        </div>
    </div>
</section>

<!-- Statistics -->
<section class="statistics">
    <h2>Our Achievements</h2>
    <div class="row text-center g-4">
        <div class="col-md-3"><div class="stat">500+</div><div class="stat-text">Properties Listed</div></div>
        <div class="col-md-3"><div class="stat">10k+</div><div class="stat-text">Happy Tenants</div></div>
        <div class="col-md-3"><div class="stat">15k+</div><div class="stat-text">Searches Completed</div></div>
        <div class="col-md-3"><div class="stat">50+</div><div class="stat-text">Cities Covered</div></div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials">
    <h2>What Our Users Say</h2>
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="testimonial-card">
                    <p>"ProRent helped me find my dream apartment in just 3 days! Smooth digital experience."</p>
                    <strong>- Rajesh Kumar</strong>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card">
                    <p>"The platform is intuitive and professional. Renting a house has never been easier."</p>
                    <strong>- Anita Sharma</strong>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {

    // Static dataset (later dynamic from DB)
    const cities = [
        "Delhi", "New Delhi", "Noida", "Greater Noida", "Gurugram",
        "Mumbai", "Navi Mumbai", "Thane", "Pune",
        "Bangalore", "Hyderabad", "Chennai", "Kolkata",
        "Jaipur", "Ahmedabad", "Surat", "Lucknow", "Bhopal", "Indore"
    ];

    const input = document.getElementById("locationInput");
    const box = document.getElementById("locationSuggestions");

    // Autocomplete Logic
    input.addEventListener("input", function () {

        const q = this.value.toLowerCase().trim();
        box.innerHTML = "";

        if (!q) {
            box.classList.add("d-none");
            return;
        }

        const results = cities.filter(c => c.toLowerCase().includes(q)).slice(0, 6);

        if (results.length === 0) {
            box.classList.add("d-none");
            return;
        }

        results.forEach(city => {
            const li = document.createElement("li");
            li.className = "list-group-item list-group-item-action";
            li.style.cursor = "pointer";
            li.textContent = city;

            li.onclick = () => {
                input.value = city;
                box.classList.add("d-none");
            };

            box.appendChild(li);
        });

        box.classList.remove("d-none");
    });

    // Hide on outside click
    document.addEventListener("click", (e) => {
        if (!input.contains(e.target) && !box.contains(e.target)) {
            box.classList.add("d-none");
        }
    });

    // Search Button Logic (static filtering)
    document.getElementById("searchBtn").onclick = function () {

        const data = {
            location: input.value,
            listing: document.getElementById("listingType").value,
            type: document.getElementById("propertyType").value,
            budget: document.getElementById("budget").value,
        };

        console.log("Search Request:", data);

        alert(
            "Searching With:\n\n" +
            "📍 Location: " + data.location + "\n" +
            "🏷 Listing Type: " + data.listing + "\n" +
            "🏠 Property Type: " + data.type + "\n" +
            "💰 Budget: " + data.budget
        );
    };

});


/* ---------------------------------------------------------
  FOR BADGES FILTER
----------------------------------------------------------- */
document.addEventListener("DOMContentLoaded", function() {
    // ===== Featured Properties Filter =====
    const featuredButtons = document.querySelectorAll("#propertyBadgeFilterBar .badge-filter");
    const featuredCards = document.querySelectorAll("#featuredPropertiesSection .property-card-item");

    featuredButtons.forEach(button => {
        button.addEventListener("click", function() {
            featuredButtons.forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");

            const filter = this.getAttribute("data-filter");

            featuredCards.forEach(card => {
                const badges = card.getAttribute("data-badges").split(",");
                if(filter === "all" || badges.includes(filter)) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        });
    });

    // ===== Rooms / To-Let Filter =====
    const roomButtons = document.querySelectorAll("#roomBadgeFilterBar .room-filter");
    const roomCards = document.querySelectorAll("#roomCardsSection .property-card-item");

    roomButtons.forEach(button => {
        button.addEventListener("click", function() {
            roomButtons.forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");

            const filter = this.getAttribute("data-filter");

            roomCards.forEach(card => {
                const badges = card.getAttribute("data-badges").split(",");
                if(filter === "all" || badges.includes(filter)) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        });
    });
});

</script>

@endpush
