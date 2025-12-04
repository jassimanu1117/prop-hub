<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ShopEase - Cart</title>

<!-- Bootstrap 5 -->
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

.hero { background:linear-gradient(rgba(163,0,0,0.8),rgba(0,0,0,0.9)), url('https://picsum.photos/1920/300?random=21'); 
       background-size:cover; color:#fff; text-align:center; padding:50px 20px; }
.hero h1 { font-weight:700; font-size:2rem; margin-bottom:10px; }
.hero p { font-size:1rem; }

.cart-container {
  margin-top: 50px; margin-bottom: 50px;
  background: #7f1c1c; padding: 30px; border-radius: 12px; box-shadow: 0 0 15px rgba(0,0,0,0.5); color:#fff;
}
.cart-container h2 { font-weight:700; margin-bottom:25px; }

.table-dark th { background:#a30000 !important; }
.table td, .table th { vertical-align: middle; }

.btn-remove { background:red; color:#fff; border:none; padding:6px 12px; border-radius:6px; cursor:pointer; }
.btn-remove:hover { background:#cc0000; }
.quantity-controls { display:flex; align-items:center; gap:8px; }
.quantity-controls button { background:#a30000; color:#fff; border:none; width:30px; height:30px; border-radius:6px; cursor:pointer; }
.quantity-controls span { font-weight:600; }

/* Enhanced Shipping Form */
.form-shipping {
  background: #931e1e;
  padding: 20px;
  border-radius: 15px;
  margin-bottom: 20px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.3);
  max-width: 600px;
  margin-left: auto;
  margin-right: auto;
}
.form-shipping h4 { font-weight:700; margin-bottom:15px; color:#fff; text-align:center; }
.form-shipping label { color:#fff; font-weight:500; }
.form-shipping input, .form-shipping textarea {
  background:#fff;
  border-radius:8px;
  border:none;
  padding:8px 12px;
  height:38px;
  font-size:0.95rem;
}
.form-shipping textarea { height:60px; }
.form-shipping .row .col-md-4 input { height:38px; }

.summary { background:#931e1e; padding:20px; border-radius:10px; margin-top:20px; }
.summary h4 { font-weight:700; margin-bottom:15px; }
.summary .btn {
  width: 100%;
  font-weight: 600;
  background: #000000;
  color: #ffffff;
  padding: 14px;
  border-radius: 12px;   /* Rounded corners */
  border: 2px solid #ffffff; /* White border */
  transition: 0.3s ease;
}

.summary .btn:hover {
  background: #ffffff;
  color: #000000;
  border: 2px solid #000000; /* Invert effect on hover */
}

.footer { background:linear-gradient(135deg,#111,#a30000); color:#fff; padding:40px 20px; text-align:center; }
.footer h5 { font-weight:700; margin-bottom:15px; }
.footer .copyright { margin-top:15px; font-size:0.9rem; color:#ddd; }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">

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
        <li class="nav-item"><a class="nav-link" href="about-us.html">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="track-your-order.html">Track Your Order</a></li>
         <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="wishlist-page.html">
        <li class="nav-item"><a class="nav-link" href="wishlist-page.html">
            <i class="bi bi-heart"></i> <span id="wishlistCount" class="badge bg-danger">0</span>
        </a></li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)" onclick="toggleMiniCart()">
            <i class="bi bi-cart"></i> <span id="cartCount" class="badge bg-danger">0</span>
          </a>
        </li>
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

<!-- Hero -->
<div class="hero">
  <h1>Your Shopping Cart</h1>
  <p>Review items and proceed to checkout</p>
</div>

<!-- Cart Container -->
<div class="container cart-container">
  <h2>Cart Items</h2>
  <div class="table-responsive">
    <table class="table table-light table-striped align-middle" id="cartTable">
      <thead>
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- Cart items dynamically generated here -->
      </tbody>
    </table>
  </div>

  <!-- Enhanced Shipping / Address Form -->
  <div class="form-shipping">
    <h4>Shipping Details</h4>
    <form id="shippingForm">
      <div class="mb-2">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" placeholder="John Doe" required>
      </div>
      <div class="mb-2">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="tel" class="form-control" id="phone" placeholder="+1 234 567 890" required>
      </div>
      <div class="mb-2">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" id="address" rows="2" placeholder="Street, Building, etc." required></textarea>
      </div>
     
    </form>
  </div>

  <!-- Summary -->
  <div class="summary" id="cartSummary">
    <h4>Order Summary</h4>
    <p>Subtotal: <strong>$0</strong></p>
    <p>Shipping: <strong>$0</strong></p>
    <p>Total: <strong>$0</strong></p>

  </div>
</div>


<!-- QR Modal -->
<div class="modal fade" id="qrModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-3">

      <h4 class="text-center mb-3">Scan to Pay</h4>

      <img id="qrImage" class="img-fluid d-block mx-auto mb-3">

      <p class="text-center" id="qrAmount"></p>

      <!-- I Paid Button -->
      <button class="btn btn-success w-100 mb-2" onclick="openTxnModal()">
        I Paid
      </button>


      <button class="btn btn-secondary w-100" data-bs-dismiss="modal">Close</button>
    </div>
  </div>
</div>

<!-- Transaction Modal -->
<div class="modal fade" id="txnModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-3">
      <h5 class="text-center mb-3">Confirm Payment</h5>

      <div class="mb-2">
        <label for="txnId" class="form-label">Enter UPI Transaction ID</label>
        <input type="text" id="txnId" class="form-control" placeholder="Txn ID (optional)">
      </div>

      <div id="txnError" class="text-danger mb-2" style="display:none;"></div>
      <div id="txnSuccess" class="text-success mb-2" style="display:none;"></div>

      <button id="txnSubmitBtn" class="btn btn-success w-100 mb-2">Submit Payment</button>
      <button class="btn btn-secondary w-100" data-bs-dismiss="modal">Cancel</button>
    </div>
  </div>
</div>


<!-- Footer -->
<div class="footer">
  <h5>ShopEase</h5>
  <p>Your one-stop shop for everything</p>
  <div class="copyright">© 2025 ShopEase | Designed by <strong>JSWEBCODE</strong></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// ================= CART FUNCTIONS (LocalStorage) =================

// Load cart items and update table + summary
function loadCart() {
  const cart = JSON.parse(localStorage.getItem('cartItems')) || [];
  const tbody = document.querySelector('#cartTable tbody');
  tbody.innerHTML = '';
  let subtotal = 0;
  let totalItems = 0;

  // Loop through cart items
  cart.forEach(item => {
    subtotal += item.price * item.qty;
    totalItems += item.qty;

    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td><img src="${item.img}" class="me-2 rounded" width="60"> ${item.title}</td>
      <td>$${item.price}</td>
      <td>
        <div class="quantity-controls">
          <button onclick="updateQty('${item.id}','-')">-</button>
          <span>${item.qty}</span>
          <button onclick="updateQty('${item.id}','+')">+</button>
        </div>
      </td>
      <td>$${(item.price * item.qty).toFixed(2)}</td>
      <td><button class="btn-remove" onclick="removeItem('${item.id}')">Remove</button></td>
    `;
    tbody.appendChild(tr);
  });

  // Update cart count in top bar
  document.getElementById('cartCount').innerText = totalItems;

  // Update summary box
  document.getElementById('cartSummary').innerHTML = `
    <h4>Order Summary</h4>
    <p>Subtotal: <strong>$${subtotal.toFixed(2)}</strong></p>
    <p>Shipping: <strong>$0</strong></p>
    <p>Total: <strong>$${subtotal.toFixed(2)}</strong></p>
    <button class="btn btn-danger" onclick="placeOrder()">Proceed to Checkout</button>
      <button class="btn btn-success w-100 mb-2" onclick="payWithScanner()">
  <i class="bi bi-qr-code-scan"></i> Pay With Scanner
</button>
    

  `;
}

// Update item quantity (+ / -)
function updateQty(id, action) {
  let cart = JSON.parse(localStorage.getItem('cartItems')) || [];
  cart = cart.map(item => {
    if (item.id === id) {
      if (action === '+') item.qty++;
      if (action === '-' && item.qty > 1) item.qty--;
    }
    return item;
  });
  localStorage.setItem('cartItems', JSON.stringify(cart));
  loadCart();
}

// Remove item from cart
function removeItem(id) {
  let cart = JSON.parse(localStorage.getItem('cartItems')) || [];
  cart = cart.filter(item => item.id !== id);
  localStorage.setItem('cartItems', JSON.stringify(cart));
  loadCart();
}

// Place order (validate shipping + clear cart)
function placeOrder() {
  const name = document.getElementById('name').value.trim();
  const phone = document.getElementById('phone').value.trim();
  const address = document.getElementById('address').value.trim();
  const city = document.getElementById('city').value.trim();
  const state = document.getElementById('state').value.trim();
  const zip = document.getElementById('zip').value.trim();

  // Validate shipping form
  if (!name || !phone || !address || !city || !state || !zip) {
    alert("Please fill in all shipping details.");
    return;
  }

  const cart = JSON.parse(localStorage.getItem('cartItems')) || [];
  if (cart.length === 0) {
    alert("Your cart is empty.");
    return;
  }

  // ✅ Handle order placement (AJAX / API can be added here)
  alert("Order placed successfully!\nThank you " + name + " for your purchase.");

  // Clear cart + reset form
  localStorage.removeItem('cartItems');
  loadCart();
  document.getElementById('shippingForm').reset();
}


// 1️⃣ Generate QR Code
function payWithScanner() {
    const cart = JSON.parse(localStorage.getItem('cartItems')) || [];
    if(cart.length === 0){
        alert("Your cart is empty!");
        return;
    }

    let total = 0;
    cart.forEach(item => total += item.price * item.qty);
    total = total.toFixed(2);

    const upiId = "jassimanu1117-1@okicici"; // Update with your UPI ID

    const upiString = `upi://pay?pa=${upiId}&pn=YourStore&am=${total}&tn=Order Payment&cu=INR`;

    // ✅ QuickChart.io QR URL
    const qrUrl = "https://quickchart.io/qr?size=300&text=" + encodeURIComponent(upiString);

    document.getElementById("qrImage").src = qrUrl;
    document.getElementById("qrAmount").innerHTML = `Pay Amount: <b>₹${total}</b>`;

    let qrModal = new bootstrap.Modal(document.getElementById('qrModal'));
    qrModal.show();
}

// Open transaction modal
function openTxnModal() {
    let txnModal = new bootstrap.Modal(document.getElementById('txnModal'));
    document.getElementById('txnError').style.display = 'none';
    document.getElementById('txnSuccess').style.display = 'none';
    document.getElementById('txnId').value = '';
    document.getElementById('txnSubmitBtn').disabled = false;
    document.getElementById('txnSubmitBtn').innerText = 'Submit Payment';
    txnModal.show();
}

// Submit Transaction
// Bind once on page load
document.addEventListener('DOMContentLoaded', function(){

    const btn = document.getElementById('txnSubmitBtn');

    btn.addEventListener('click', function(){
        btn.disabled = true;
        btn.innerText = 'Processing...';

        const txnId = document.getElementById('txnId').value.trim();
        const cart = JSON.parse(localStorage.getItem('cartItems')) || [];
        const name = document.getElementById('name').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const address = document.getElementById('address').value.trim();

        // Validate
        if(cart.length === 0){
            alert("Your cart is empty!");
            btn.disabled = false;
            btn.innerText = 'Submit Payment';
            return;
        }
        if(!name || !phone || !address){
            document.getElementById('txnError').style.display = 'block';
            document.getElementById('txnError').innerText = 'Please fill shipping details first.';
            btn.disabled = false;
            btn.innerText = 'Submit Payment';
            return;
        }

        // Send to Laravel
        fetch('/checkout-scanner', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ name, phone, address, cart, txn_id: txnId })
        })
        .then(res => res.json())
        .then(data => {
            btn.disabled = false;
            btn.innerText = 'Submit Payment';

            if(data.status === 'pending'){
                document.getElementById('txnSuccess').style.display = 'block';
                document.getElementById('txnSuccess').innerText = `✅ Order Received! Pending verification.\nOrder ID: ${data.order_id}`;

                // Clear cart
                localStorage.removeItem('cartItems');
                loadCart();
                document.getElementById('shippingForm').reset();

                // Hide QR modal
                bootstrap.Modal.getInstance(document.getElementById('qrModal'))?.hide();
            }else{
                document.getElementById('txnError').style.display = 'block';
                document.getElementById('txnError').innerText = 'Something went wrong. Try again.';
            }
        })
        .catch(err => {
            console.error(err);
            document.getElementById('txnError').style.display = 'block';
            document.getElementById('txnError').innerText = 'Server error. Try again later.';
            btn.disabled = false;
            btn.innerText = 'Submit Payment';
        });
    });
});

// ================= WISHLIST FUNCTIONS (LocalStorage) =================

// Load wishlist from localStorage
let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];

// Update wishlist counter (top bar)
function updateWishlistCount() {
  document.getElementById("wishlistCount").textContent = wishlist.length;
}

// ================= INIT (on page load) =================
document.addEventListener('DOMContentLoaded', () => {
  loadCart();            // Load cart items
  updateWishlistCount(); // Load wishlist count
});
</script>

</body>
</html>
