<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Wishlist - JSWEBCODE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<style>
body { font-family: 'Poppins', sans-serif; margin:0; background:#fafafa; }

/* Navbar */
.navbar { background:linear-gradient(135deg,#a30000,#000); }
.navbar-brand, .navbar-nav .nav-link { color:#fff !important; font-weight:500; }
.navbar-nav .nav-link:hover { color:#ffcccc !important; }
.navbar .btn-account { background:#ff3333; color:#fff; border-radius:20px; padding:6px 16px; font-weight:600; transition:0.3s; }
.navbar .btn-account:hover { background:#cc0000; color:#fff; }
/* Make the navbar toggler icon visible on dark background */
/* Make navbar toggler visible with lines */
.navbar-toggler {
    border: 2px solid #ffcccc;  /* optional border */
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 5px;
}

/* Remove default icon */
.navbar-toggler-icon {
    background-image: none;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 30px;
    height: 20px;
}

/* Hamburger lines */
.navbar-toggler-icon span {
    display: block;
    height: 3px;            /* thickness of line */
    width: 100%;            /* full width */
    background-color: #ffcccc; /* line color */
    border-radius: 2px;     /* rounded edges */
}


/* Navbar Logo */
.logo-img {
  width: 50px;      /* increased from 35px */
  height: 50px;     /* increased from 35px */
  border-radius: 50%; /* optional: make it circular */
  object-fit: cover;
  transition: transform 0.3s;
}

.logo-img:hover {
  transform: scale(1.1); /* subtle hover effect */
}

.logo-text {
  color: #fff;
  font-weight: 700;
  font-size: 1.3rem;   /* slightly bigger and professional */
}   
/* Mini Cart */
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

    .wishlist-header { background: linear-gradient(135deg, #8b0000, #000000); color: #fff; padding: 60px 0; text-align: center; border-radius: 0 0 40px 40px; box-shadow: 0 6px 15px rgba(0,0,0,0.3); }
    .wishlist-header h1 { font-weight: 700; font-size: 2.5rem; }
    .wishlist-item { background:#fff; border-radius:15px; padding:20px; margin-bottom:20px; box-shadow:0 4px 15px rgba(0,0,0,0.1); transition:transform 0.3s ease, box-shadow 0.3s ease; position:relative; overflow:hidden; }
    .wishlist-item:hover { transform: translateY(-6px); box-shadow:0 6px 20px rgba(0,0,0,0.15); }
    .wishlist-item img { width:100%; border-radius:12px; height:200px; object-fit:cover; }
    .wishlist-item h5 { font-size:1.2rem; margin-top:15px; font-weight:700; color:#222; }
    .wishlist-item p { font-size:0.95rem; color:#555; margin-bottom:15px; }
    .wishlist-actions .btn { border-radius:25px; font-size:0.85rem; padding:7px 15px; transition:0.3s; }
    .wishlist-actions .btn-success { background: linear-gradient(135deg, #28a745, #218838); border: none; }
    .wishlist-actions .btn-success:hover { background: linear-gradient(135deg, #218838, #1e7e34); }
    .wishlist-actions .btn-outline-danger:hover { background:#dc3545; color:#fff; }
    .add-cart-btn { background:#a30000; color:#fff; border:none; padding:12px 20px; font-weight:600; border-radius:8px; transition:0.3s; }
.add-cart-btn:hover { background:#cc3333; }

.footer {
  background: linear-gradient(135deg,#111,#a30000);
  color: #fff;
  padding: 50px 20px 30px;
}
.footer h5 {
  margin-bottom: 15px;
  font-weight: 700;
  color: #ffcccc;
}
.footer p, .footer a, .footer li {
  font-size: 0.95rem;
}
.footer a {
  transition: 0.3s;
}
.footer a:hover {
  color: #ff3333;
}
.footer hr {
  margin: 20px 0;
  opacity: 0.2;
}
.footer ul li {
  margin-bottom: 8px;
}
.footer ul li i {
  margin-right: 8px;
}

  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
   <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
  <img src="https://picsum.photos/50/50" alt="ShopEase Logo" class="logo-img me-2">
  <span class="logo-text">ShopEase</span>
</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
  <span class="navbar-toggler-icon">
    <span></span>
    <span></span>
    <span></span>
  </span>
   </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('track.order') }}">Track Your Order</a></li>
         <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('wishlists') }}">
            <i class="bi bi-heart"></i> <span id="wishlistCount" class="badge bg-danger">0</span>
        </a></li> 
        <li class="nav-item"><a class="nav-link" href="javascript:void(0)" onclick="toggleMiniCart()">
            <i class="bi bi-cart"></i> <span id="cartCount" class="badge bg-danger">0</span>
        </a></li>
        <li class="nav-item ms-2">
          <a class="btn btn-account" href="{{ route('user.register') }}">Create Account</a>
        </li>
        <li class="nav-item ms-2">
          <a class="btn btn-outline-light" href="{{ route('user.login') }}">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<!-- Wishlist Header -->
<section class="wishlist-header">
  <div class="container">
    <h1>My Wishlist</h1>
    <p class="lead">Here are the products you love ❤️</p>
  </div>
</section>

<!-- Wishlist Items -->
<div class="container my-5">
  <div class="row g-4" id="wishlistContainer">
    <!-- Wishlist items will load here -->
  </div>
</div>

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

<!-- Footer -->
<footer class="footer">
  <div class="container">
    <div class="row">
      
      <!-- About -->
      <div class="col-md-3 mb-4">
        <h5 class="fw-bold">ShopEase</h5>
        <p>Your one-stop shop for everything. We bring quality, affordability, and convenience together for your best shopping experience.</p>
      </div>

      <!-- Quick Links -->
      <div class="col-md-3 mb-4">
        <h5 class="fw-bold">Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="index.html" class="text-white text-decoration-none"><i class="bi bi-chevron-right"></i> Home</a></li>
          <li><a href="about-us.html" class="text-white text-decoration-none"><i class="bi bi-chevron-right"></i> About Us</a></li>
          <li><a href="contact.html" class="text-white text-decoration-none"><i class="bi bi-chevron-right"></i> Contact Us</a></li>
          <li><a href="privacy-policy.html" class="text-white text-decoration-none"><i class="bi bi-chevron-right"></i> Privacy Policy</a></li>
          <li><a href="terms-and-conditions.html" class="text-white text-decoration-none"><i class="bi bi-chevron-right"></i> Terms & Conditions</a></li>
        </ul>
      </div>

      <!-- Get in Touch -->
      <div class="col-md-3 mb-4">
        <h5 class="fw-bold">Get in Touch</h5>
        <ul class="list-unstyled">
          <li><i class="bi bi-geo-alt-fill text-danger"></i> 123 Market Street, New Delhi</li>
          <li><i class="bi bi-telephone-fill text-danger"></i> +91 98765 43210</li>
          <li><i class="bi bi-envelope-fill text-danger"></i> support@shopease.com</li>
        </ul>
      </div>

      <!-- Social + Newsletter -->
      <div class="col-md-3 mb-4">
        <h5 class="fw-bold">Follow Us</h5>
        <div class="d-flex gap-3 fs-4 mb-3">
          <a href="#" class="text-white"><i class="bi bi-facebook"></i></a>
          <a href="#" class="text-white"><i class="bi bi-instagram"></i></a>
          <a href="#" class="text-white"><i class="bi bi-twitter"></i></a>
          <a href="#" class="text-white"><i class="bi bi-linkedin"></i></a>
        </div>

        <!-- Newsletter -->
        <h6 class="fw-bold">Subscribe to our Newsletter</h6>
        <form class="mt-2">
          <div class="mb-2">
            <input type="email" class="form-control" placeholder="Enter your email">
          </div>
          <button class="btn btn-danger w-100" type="submit">Subscribe</button>
        </form>
      </div>

    </div>

    <hr class="border-light">

    <!-- Copyright -->
    <div class="text-center mt-3">
      <p class="mb-1">© 2025 ShopEase | Designed by <strong>JSWEBCODE</strong></p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
/* =======================
   1 --- CART FUNCTIONS ---
   ======================= */

/**
 * Load cart items from localStorage and render inside mini cart
 */
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

  // Update totals
  document.getElementById('cartTotal').innerText = `Total: $${total.toFixed(2)}`;
  document.getElementById('cartCount').innerText = count;
}

/**
 * Save cart items into localStorage
 */
function saveCart(cart) {
  localStorage.setItem('cartItems', JSON.stringify(cart));
}

/**
 * Add an item from wishlist into the cart
 */
function addToCartFromWishlist(id) {
  const wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];
  const item = wishlist.find(i => i.id === id);
  if (!item) return;

  let cart = JSON.parse(localStorage.getItem("cartItems")) || [];
  const existing = cart.find(c => c.id === item.id);

  if (existing) {
    existing.qty++;
  } else {
    cart.push({ id: item.id, title: item.name, price: parseFloat(item.price), img: item.image, qty: 1 });
  }

  localStorage.setItem("cartItems", JSON.stringify(cart));
  loadCart();
  showCartModal(item.name); // <-- call helper for popup
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

/**
 * Update quantity of a product in cart
 */
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

/**
 * Remove item from cart
 */
function removeItem(id) {
  let cart = JSON.parse(localStorage.getItem('cartItems')) || [];
  cart = cart.filter(item => item.id !== id);
  saveCart(cart);
  loadCart();
}

/**
 * Toggle mini cart visibility
 */
function toggleMiniCart() {
  document.getElementById('miniCart').classList.toggle('active');
}

/**
 * Close mini cart
 */
function closeMiniCart() {
  document.getElementById('miniCart').classList.remove('active');
}

/**
 * Close mini cart when clicking outside
 */
document.addEventListener('click', function(e) {
  const miniCart = document.getElementById('miniCart');
  const cartBtn = document.querySelector('.bi-cart').closest('a');

  if (miniCart.classList.contains('active') && !miniCart.contains(e.target) && !cartBtn.contains(e.target)) {
    closeMiniCart();
  }
});

/**
 * Open checkout modal (Bootstrap)
 */
function openCheckoutModal() {
  const modal = new bootstrap.Modal(document.getElementById('checkoutModal'));
  modal.show();
}

/* ==========================
   2 --- WISHLIST FUNCTIONS ---
   ========================== */

/**
 * Load wishlist items from localStorage and display
 */
function loadWishlist() {
  const wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];
  const container = document.getElementById("wishlistContainer");
  container.innerHTML = "";

  if (wishlist.length === 0) {
    container.innerHTML = `
      <div class="col-12 text-center">
        <div class="alert alert-info">Your wishlist is empty ❤️</div>
      </div>`;
    return;
  }

  wishlist.forEach(item => {
    const col = document.createElement("div");
    col.className = "col-md-4";
    col.innerHTML = `
      <div class="wishlist-item">
        <img src="${item.image}" alt="${item.name}">
        <h5>${item.name}</h5>
        <p>$${item.price}</p>
        <div class="wishlist-actions d-flex justify-content-between">
          <button class="add-cart-btn" onclick="addToCartFromWishlist('${item.id}')">
            <i class="bi bi-cart-plus"></i> Add to Cart
          </button>
          <button class="btn btn-sm btn-outline-danger" onclick="removeFromWishlist('${item.id}')">
            <i class="bi bi-trash"></i> Remove
          </button>
        </div>
      </div>`;
    container.appendChild(col);
  });
}

/**
 * Remove item from wishlist
 */
function removeFromWishlist(id) {
  let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];
  wishlist = wishlist.filter(item => item.id !== id);
  localStorage.setItem("wishlist", JSON.stringify(wishlist));

  loadWishlist();
  updateWishlistCount(); // Update counter after removal
}

/**
 * Update wishlist counter in navbar
 */
function updateWishlistCount() {
  const wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];
  document.getElementById("wishlistCount").textContent = wishlist.length;
}

/* ==========================
   3 --- INIT ON PAGE LOAD ---
   ========================== */
document.addEventListener("DOMContentLoaded", function() {
  loadWishlist();
  loadCart();
  updateWishlistCount(); // Ensure badge count is fresh
});

</script>

</body>
</html>
