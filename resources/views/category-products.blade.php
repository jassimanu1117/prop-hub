<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ShopEase - Product Detail</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<style>
body { font-family: 'Poppins', sans-serif; margin:0; background:#fafafa; }
.navbar { background:linear-gradient(135deg,#a30000,#000); }
.navbar-brand, .navbar-nav .nav-link { color:#fff !important; font-weight:500; }
.navbar-nav .nav-link:hover { color:#ffcccc !important; }
.navbar .btn-account { background:#ff3333; color:#fff; border-radius:20px; padding:6px 16px; font-weight:600; transition:0.3s; }
.navbar .btn-account:hover { background:#cc0000; color:#fff; }
.breadcrumb { background:transparent; padding:0; margin-top:20px; }
.breadcrumb a { color:#a30000; text-decoration:none; }
.breadcrumb a:hover { text-decoration:underline; }
.product-detail { padding:40px 20px; max-width:1200px; margin:auto; }
.product-images { border-radius:12px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.08); cursor:zoom-in; }
.product-images img { width:100%; height:auto; border-radius:12px; object-fit:cover; }
.product-thumbs { margin-top:10px; display:flex; gap:10px; justify-content:center; }
.product-thumbs img { width:70px; height:70px; object-fit:cover; border-radius:8px; cursor:pointer; border:2px solid transparent; transition:0.3s; }
.product-thumbs img.active, .product-thumbs img:hover { border-color:#a30000; }
.product-info h2 { font-weight:700; margin-bottom:15px; }
.product-info .price { font-size:1.5rem; font-weight:700; color:#b71c1c; margin-bottom:10px; }
.product-info .rating i { color:#ffcc00; margin-right:2px; }
.product-info .stock { font-weight:500; margin-bottom:15px; }
.product-info .description { margin-bottom:20px; }
.product-info .quantity { display:flex; align-items:center; gap:10px; margin-bottom:20px; }
.product-info .quantity button { background:#a30000; border:none; color:#fff; width:30px; height:30px; border-radius:4px; cursor:pointer; }
.product-info .quantity span { min-width:30px; text-align:center; display:inline-block; font-weight:600; }
.add-cart-btn { background:#a30000; color:#fff; border:none; padding:12px 20px; font-weight:600; border-radius:8px; transition:0.3s; }
.add-cart-btn:hover { background:#cc3333; }
.related-products { margin-top:50px; max-width:1200px; margin:auto; }
.related-products h4 { font-weight:700; margin-bottom:20px; text-align:center; }
.related-products .card { border:none; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.08); transition:0.3s; text-align:center; }
.related-products .card:hover { transform:translateY(-5px); box-shadow:0 6px 18px rgba(0,0,0,0.15); }
.related-products img { border-radius:12px 12px 0 0; height:180px; object-fit:cover; }
.related-products .price { font-weight:700; color:#b71c1c; margin-bottom:10px; }
#miniCart { position:fixed; top:0; right:-350px; width:300px; height:100%; background:#111; color:#fff; box-shadow:-2px 0 10px rgba(0,0,0,0.4); transition:0.3s; padding:20px; z-index:2000; overflow-y:auto; }
#miniCart.active { right:0; }
#miniCart h4 { font-size:1.3rem; margin-bottom:15px; }
.cart-item { display:flex; align-items:center; gap:10px; background:#222; padding:10px; border-radius:8px; margin-bottom:10px; }
.cart-item img { width:50px; height:50px; object-fit:cover; border-radius:6px; }
.cart-item-details { flex-grow:1; }
.cart-item-details h6 { margin:0; font-size:0.9rem; }
.cart-item-details .price { font-size:0.85rem; color:#f88; }
.cart-item .quantity-controls { display:flex; align-items:center; gap:5px; margin-top:5px; }
.cart-item .quantity-controls button { background:#a30000; border:none; color:#fff; width:25px; height:25px; border-radius:4px; cursor:pointer; }
.cart-item .quantity-controls span { color:#fff; min-width:20px; text-align:center; }
.cart-item button.remove { background:red; border:none; color:#fff; border-radius:6px; padding:3px 6px; cursor:pointer; }
.cart-total { font-weight:600; margin-top:10px; font-size:1rem; }
.checkout-btn { background:#b71c1c; border:none; color:#fff; padding:10px; border-radius:8px; margin-top:15px; width:100%; font-weight:600; }
.footer { background:linear-gradient(135deg,#111,#a30000); color:#fff; padding:40px 20px; margin-top:50px; text-align:center; }
.footer h5 { font-weight:700; margin-bottom:15px; }
.footer p { margin:0; }
.footer .copyright { margin-top:15px; font-size:0.9rem; color:#ddd; }
/* View Details Button */
.view-details { border:1px solid #a30000; color:#a30000; border-radius:8px; padding:8px 16px; display:block; margin-top:8px; text-decoration:none; transition:0.3s; }
.view-details:hover { background:#a30000; color:#fff; }
@media(max-width:768px){ .product-detail { padding:20px 10px; } .product-thumbs { justify-content:center; } .add-cart-btn { width:100%; position:sticky; bottom:0; left:0; margin:0; border-radius:0; } .related-products h4 { font-size:1.2rem; } }
</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">ShopEase</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">
       <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('track.order') }}">Track Your Order</a></li>
         <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('wishlists') }}">
        <!-- Wishlist -->
       <li class="nav-item"><a class="nav-link" href="{{ route('wishlists') }}">
            <i class="bi bi-heart"></i> <span id="wishlistCount" class="badge bg-danger">0</span>
        </a></li> 
        <li class="nav-item"><a class="nav-link" href="javascript:void(0)" onclick="toggleMiniCart()">
            <i class="bi bi-cart"></i> <span id="cartCount" class="badge bg-danger">0</span>
        </a></li>
        <li class="nav-item ms-2">
          <a class="btn btn-account" href="register.html">Create Account</a>
        </li>
         <li class="nav-item ms-2">
          <a class="btn btn-outline-light" href="login.html">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Category Products -->
@if ($category->products->count() > 0)

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/') }}">Home</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        {{ $category->name }}
    </li>
  </ol>
</nav>


<div class="container related-products">
  <h4>{{ $category->name }} Products</h4>

  <div class="row g-4" id="categoryProductsGrid">

    @foreach ($category->products as $product)
      @php
          $img = $product->images->first();
          $imageUrl = $img->image_thumb ?? $img->image_path ?? 'default.jpg';
      @endphp

      <div class="col-md-3 col-sm-6 product"
           data-id="{{ $product->id }}"
           data-price="{{ $product->price }}"
           data-title="{{ $product->name ? ucwords(strtolower($product->name)) : 'N/A' }}"
           data-img="{{ asset('storage/' . $imageUrl) }}">

        <div class="card product-card">
          <img src="{{ asset('storage/' . $imageUrl) }}" alt="{{ $product->name }}">
          <div class="card-body">
            <h6>{{ $product->name ? ucwords(strtolower($product->name)) : 'N/A' }}</h6>

            <div class="rating mb-2 text-warning">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star"></i>
            </div>

            <div class="price">${{ $product->price }}</div>

            <div class="d-flex gap-2">
              <button class="btn btn-sm btn-success add-cart-btn" onclick="addToCart(this)">
                <i class="bi bi-cart-plus"></i> Add to Cart
              </button>
              <button class="btn btn-sm btn-outline-danger add-wishlist-btn" onclick="addToWishlist(this)">
                <i class="bi bi-heart"></i> Wishlist
              </button>
            </div>

            <a href="{{ route('product.details', $product->slug) }}" class="view-details d-block mt-2">
              View Details
            </a>
          </div>
        </div>
      </div>

    @endforeach

  </div>

  <div class="text-center mt-4">
    <button class="btn btn-outline-danger" id="categoryLoadMoreBtn">Load More</button>
  </div>
</div>


@endif


<!-- Mini Cart -->
<div id="miniCart">
  <button class="btn-close btn-close-white mb-3" onclick="closeMiniCart()" style="float:right;"></button>
  <h4>Your Cart</h4>
  <div id="cartItems"></div>
  <div class="cart-total" id="cartTotal">Total: $0</div>
  {{-- For Guests --}}
  @guest
    <button class="checkout-btn btn btn-primary" onclick="openCheckoutModal()">
      Checkout
    </button>
  @endguest

  {{-- For Logged-in Users --}}
  @auth
    <a href="{{ route('checkout') }}" class="checkout-btn btn btn-primary">
      Checkout
    </a>
  @endauth
</div>

<!-- Checkout Options Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 rounded-4 shadow-lg">
      <div class="modal-header border-0" style="background:linear-gradient(135deg,#a30000,#000); color:#fff;">
        <h5 class="modal-title fw-bold">Choose Your Checkout Option</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center p-4" style="background:#fafafa;">
        <p class="mb-4 text-muted">Please select how you would like to continue with your checkout.</p>
        
        <div class="d-grid gap-3">
          <a href="{{ route('checkout.guest') }}" class="btn btn-light border border-2 py-3 fw-semibold rounded-3 shadow-sm"
                  style="border-color:#a30000; color:#a30000;">
            <i class="bi bi-bag-check-fill me-2"></i> Checkout as Guest
            <div class="small text-muted">Quick purchase without creating an account.</div>
          </a>

          <a href="{{ route('checkout.register') }}" class="btn text-white fw-semibold py-3 rounded-3 shadow-sm" style="background:#a30000;">
            <i class="bi bi-person-plus-fill me-2"></i> Create Account / Register
            <div class="small text-light">Save your details for faster checkout next time.</div>
          </a>

          <a href="{{ route('checkout.login') }}" class="btn btn-dark fw-semibold py-3 rounded-3 shadow-sm">
            <i class="bi bi-box-arrow-in-right me-2"></i> Login (Already Have Account)
            <div class="small text-muted">Access saved addresses and order history.</div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<!--  Cart Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 rounded-4 shadow-lg">
      <div class="modal-header" style="background:#a30000; color:#fff;">
        <h5 class="modal-title">Cart Notification</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center" id="cartModalBody">
        <!-- Product name will appear here -->
      </div>
      <div class="modal-footer d-flex justify-content-center gap-2">
        <a href="checkout.html" class="btn btn-dark">Go to Cart</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continue Shopping</button>
      </div>
    </div>
  </div>
</div>




<!-- Wishlist Modal -->
<div class="modal fade" id="wishlistModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 rounded-4 shadow-lg">
      <div class="modal-header" style="background:#a30000; color:#fff;">
        <h5 class="modal-title" id="wishlistModalTitle">Wishlist Notification</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center" id="wishlistModalBody">
        <!-- Message will appear here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Reviews & Add Review Modal -->
<div class="modal fade" id="reviewsModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 rounded-3 shadow-lg">
      
      <!-- Header -->
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title"><i class="bi bi-star-half"></i> Product Reviews</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <!-- Body -->
      <div class="modal-body p-4">

        <!-- Add New Review Form -->
        <div class="mt-4 p-3 border rounded" style="background:#f8f8f8;">
          <h5 class="mb-3">Add Your Review</h5>
          <div class="mb-3">
            <label for="reviewerName" class="form-label">Name</label>
            <input type="text" class="form-control" id="reviewerName" placeholder="Enter your name">
          </div>
          <div class="mb-3">
            <label for="reviewText" class="form-label">Review</label>
            <textarea class="form-control" id="reviewText" rows="3" placeholder="Write your review here..."></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Rating</label>
            <select class="form-select" id="reviewRating">
              <option value="5">★★★★★ - Excellent</option>
              <option value="4">★★★★☆ - Good</option>
              <option value="3">★★★☆☆ - Average</option>
              <option value="2">★★☆☆☆ - Poor</option>
              <option value="1">★☆☆☆☆ - Very Poor</option>
            </select>
          </div>
          <button class="btn btn-danger w-100" onclick="submitReview()">Submit Review</button>
        </div>

        <!-- Reviews List -->
        <div id="reviewsList">
          <!-- 12 Static Reviews -->
          <div class="review d-none">
            <strong>John D.</strong> <span class="text-warning">★★★★★</span>
            <p>Great product! Works as expected.</p>
            <small class="text-muted">2 days ago</small>
            <hr>
          </div>
          <div class="review d-none">
            <strong>Sarah M.</strong> <span class="text-warning">★★★★☆</span>
            <p>Good quality, but shipping was late.</p>
            <small class="text-muted">1 week ago</small>
            <hr>
          </div>
          <div class="review d-none">
            <strong>David K.</strong> <span class="text-warning">★★★★★</span>
            <p>Excellent value for money. Highly recommend.</p>
            <small class="text-muted">3 weeks ago</small>
            <hr>
          </div>
          <div class="review d-none">
            <strong>Alice R.</strong> <span class="text-warning">★★★☆☆</span>
            <p>Average product, expected more features.</p>
            <small class="text-muted">1 month ago</small>
            <hr>
          </div>
          <div class="review d-none">
            <strong>Michael B.</strong> <span class="text-warning">★★★★☆</span>
            <p>Solid build, looks premium.</p>
            <small class="text-muted">2 months ago</small>
            <hr>
          </div>
          <div class="review d-none">
            <strong>Emma W.</strong> <span class="text-warning">★★★★★</span>
            <p>Absolutely love it! Worth every penny.</p>
            <small class="text-muted">3 months ago</small>
            <hr>
          </div>
          <div class="review d-none">
            <strong>Chris P.</strong> <span class="text-warning">★★★★☆</span>
            <p>Nice product, good customer support.</p>
            <small class="text-muted">4 months ago</small>
            <hr>
          </div>
          <div class="review d-none">
            <strong>Sophia L.</strong> <span class="text-warning">★★★★★</span>
            <p>Fast delivery, highly satisfied.</p>
            <small class="text-muted">5 months ago</small>
            <hr>
          </div>
          <div class="review d-none">
            <strong>Daniel R.</strong> <span class="text-warning">★★★☆☆</span>
            <p>It’s okay, not too impressive.</p>
            <small class="text-muted">6 months ago</small>
            <hr>
          </div>
          <div class="review d-none">
            <strong>Olivia C.</strong> <span class="text-warning">★★★★★</span>
            <p>Superb experience, totally recommended!</p>
            <small class="text-muted">7 months ago</small>
            <hr>
          </div>
          <div class="review d-none">
            <strong>James H.</strong> <span class="text-warning">★★★★☆</span>
            <p>Good product but packaging was poor.</p>
            <small class="text-muted">8 months ago</small>
            <hr>
          </div>
          <div class="review d-none">
            <strong>Ava T.</strong> <span class="text-warning">★★★★★</span>
            <p>Perfect purchase, I’m very happy!</p>
            <small class="text-muted">9 months ago</small>
          </div>
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-3">
          <button class="btn btn-outline-dark" id="loadMoreBtn">Load More Reviews</button>
        </div>

      </div>
    </div>
  </div>
</div><!-- Reviews & Add Review Modal Close -->


<div class="footer"><h5>ShopEase</h5><p>Your one-stop shop for everything</p><div class="copyright">© 2025 ShopEase | Designed by <strong>JSWEBCODE</strong></div></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
/* =======================
   IMAGE SWITCH FUNCTION
   ======================= */
function changeImage(el) {
  // Change main product image when a thumbnail is clicked
  document.getElementById('mainImage').src = el.src;

  // Highlight the active thumbnail
  document.querySelectorAll('.product-thumbs img').forEach(img => img.classList.remove('active'));
  el.classList.add('active');
}

/* =======================
   QUANTITY CONTROL
   ======================= */
function increaseQty() {
  let el = document.getElementById('qty');
  el.innerText = parseInt(el.innerText) + 1;

  // optional: update mini cart if item already added
  updateCartQtyFromDetail();
}

function decreaseQty() {
  let el = document.getElementById('qty');
  if (parseInt(el.innerText) > 1) el.innerText = parseInt(el.innerText) - 1;

  updateCartQtyFromDetail();
}

function updateCartQtyFromDetail() {
  const parent = document.querySelector('.product-detail');
  const id = parent.getAttribute('data-id');
  let qty = parseInt(document.getElementById('qty').innerText);

  let cart = JSON.parse(localStorage.getItem('cartItems')) || [];
  const exist = cart.find(i => i.id === id);
  if (exist) {
    exist.qty = qty;  // update quantity in cart
    localStorage.setItem('cartItems', JSON.stringify(cart));
    loadCart(); // refresh mini cart display
  }
}

/* =======================
   CART FUNCTIONS
   ======================= */

// Load cart items from localStorage and display in mini cart
function loadCart() {
  const cart = JSON.parse(localStorage.getItem('cartItems')) || [];
  const cartContainer = document.getElementById('cartItems');
  cartContainer.innerHTML = '';

  let total = 0, count = 0;

  cart.forEach(item => {
    total += item.price * item.qty;
    count += item.qty;

    const div = document.createElement('div');
    div.className = 'cart-item';
    div.innerHTML = `
      <img src="${item.img}" alt="${item.title}">
      <div class="cart-item-details">
        <h6>${item.title}</h6>
        <div class="price">$${(item.price * item.qty).toFixed(2)}</div>
        <div class="quantity-controls">
          <button onclick="updateQty('${item.id}','-'); event.stopPropagation()">-</button>
          <span>${item.qty}</span>
          <button onclick="updateQty('${item.id}','+'); event.stopPropagation()">+</button>
        </div>
      </div>
      <button class="remove" onclick="removeItem('${item.id}'); event.stopPropagation()">&times;</button>
    `;
    cartContainer.appendChild(div);
  });

  // Update cart total and badge
  document.getElementById('cartTotal').innerText = `Total: $${total.toFixed(2)}`;
  document.getElementById('cartCount').innerText = count;
}

// Save cart to localStorage
function saveCart(cart) {
  localStorage.setItem('cartItems', JSON.stringify(cart));
}

// Add product to cart
function addToCart(el) {
  const parent = el.closest('[data-id]'); // Get parent container with data attributes
  const id = parent.getAttribute('data-id');
  const title = parent.getAttribute('data-title') || parent.querySelector('h2,h6').innerText;
  const price = parseFloat(parent.getAttribute('data-price'));
  const img = parent.getAttribute('data-img') || parent.querySelector('img').src;

  // For product detail page, use custom quantity
  let qty = 1;
  if (parent.classList.contains('product-detail')) qty = parseInt(document.getElementById('qty').innerText);

  let cart = JSON.parse(localStorage.getItem('cartItems')) || [];
  const exist = cart.find(i => i.id === id);

  if (exist) {
    exist.qty += qty; // Increase quantity if already exists
  } else {
    cart.push({ id, title, price, img, qty });
  }

  saveCart(cart);
  loadCart();
  showCartModal(title); // <-- call helper for popup
}

/**
 * Function for cart popup 
 */
function showCartModal(productName) {
    const modalBody = document.getElementById("cartModalBody");
    modalBody.innerHTML = `<p><strong>${productName}</strong> has been added to your cart!</p>`;
    const bsModal = new bootstrap.Modal(document.getElementById("cartModal"));
    bsModal.show();
}

// Update quantity of a cart item
function updateQty(id, action) { 
  let cart = JSON.parse(localStorage.getItem('cartItems')) || [];
  cart = cart.map(item => {
    if (item.id === id) {
      if (action === '+') item.qty++;
      if (action === '-' && item.qty > 1) item.qty--;
    }
    return item;
  });
  saveCart(cart);
  loadCart();
}

// Remove item from cart
function removeItem(id) {
  let cart = JSON.parse(localStorage.getItem('cartItems')) || [];
  cart = cart.filter(item => item.id !== id);
  saveCart(cart);
  loadCart();
}

// Mini cart toggle functions
function toggleMiniCart() { 
  document.getElementById('miniCart').classList.toggle('active'); 
}

function closeMiniCart() { 
  document.getElementById('miniCart').classList.remove('active'); 
}

/**
 * Close mini cart if clicked outside
 */
document.addEventListener('click', function(e){
  const miniCart = document.getElementById('miniCart');
  const cartBtn = document.querySelector('.bi-cart').closest('a');
  if(miniCart.classList.contains('active') && !miniCart.contains(e.target) && !cartBtn.contains(e.target)){
    closeMiniCart();
  }
});

/**
 * Open checkout modal
 */
function openCheckoutModal(){
  const modal = new bootstrap.Modal(document.getElementById('checkoutModal'));
  modal.show();
}

// Initialize cart on page load
document.addEventListener('DOMContentLoaded', loadCart);

/* =======================
   WISHLIST FUNCTIONS
   ======================= */

// Load wishlist from localStorage or initialize empty array
let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];

// Update wishlist counter badge in navbar
updateWishlistCount();

/**
 * Add product to wishlist
 */
function addToWishlist(button) {
  const productEl = button.closest(".product, [data-id]"); // Support any parent with data-id
  const product = {
    id: productEl.getAttribute("data-id"),
    name: productEl.getAttribute("data-title"),
    price: productEl.getAttribute("data-price"),
    image: productEl.getAttribute("data-img")
  };

  // Check if product already exists in wishlist
  const exists = wishlist.some(item => item.id === product.id);
  if (!exists) {
    wishlist.push(product);
    localStorage.setItem("wishlist", JSON.stringify(wishlist));
    updateWishlistCount();
    showWishlistModal(`${product.name} added to wishlist!`, "bg-success");
  } else {
    showWishlistModal(`${product.name} is already in your wishlist.`, "bg-warning");
  }
}

/**
 * Show wishlist notification popup using Bootstrap modal
 */
function showWishlistModal(message, type = "bg-success") {
  const modalEl = document.getElementById("wishlistModal");
  const modalBody = document.getElementById("wishlistModalBody");

  modalBody.innerHTML = `<div class="p-2 text-white ${type} rounded">${message}</div>`;
  const bsModal = new bootstrap.Modal(modalEl);
  bsModal.show();
}

/**
 * Update wishlist badge count
 */
function updateWishlistCount() {
  document.getElementById("wishlistCount").textContent = wishlist.length;
}

/* =======================
   CATEGORY LOAD MORE
======================= */

document.addEventListener("DOMContentLoaded", function () {
    const productsPerPage = 4; // Number of products to show initially
    let currentCount = 0;

    const allProducts = [...document.querySelectorAll("#categoryProductsGrid .product")];
    const loadMoreBtn = document.getElementById("categoryLoadMoreBtn");

    function displayProducts() {
        // Hide all products
        allProducts.forEach(p => p.style.display = "none");

        // Show products up to currentCount
        allProducts.slice(0, currentCount).forEach(p => p.style.display = "block");

        // Show/hide Load More button
        loadMoreBtn.style.display = currentCount >= allProducts.length ? "none" : "inline-block";
    }

    function loadMore() {
        currentCount += productsPerPage;
        displayProducts();
    }

    // Initial load
    currentCount = productsPerPage;
    displayProducts();

    // Event listener
    loadMoreBtn.addEventListener("click", loadMore);
});

</script>

</body>
</html>
