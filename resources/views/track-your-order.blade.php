<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ShopEase - Track Orders</title>

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>
body { font-family:'Poppins', sans-serif; margin:0; background:#fafafa; }

/* Navbar */
.navbar { background:linear-gradient(135deg,#a30000,#000); }
.navbar-brand, .navbar-nav .nav-link { color:#fff !important; font-weight:500; }
.navbar-nav .nav-link:hover { color:#ffcccc !important; }
.navbar .btn-account { background:#ff3333; color:#fff; border-radius:20px; padding:6px 16px; font-weight:600; transition:0.3s; }
.navbar .btn-account:hover { background:#cc0000; color:#fff; }

/* Hero */
.hero { background:linear-gradient(rgba(163,0,0,0.8),rgba(0,0,0,0.9)), url('https://picsum.photos/1920/400?random=52'); 
       background-size:cover; color:#fff; text-align:center; padding:60px 20px; }
.hero h1 { font-weight:700; font-size:2.2rem; margin-bottom:15px; }
.hero p { font-size:1.1rem; }

/* Track Container */
.track-container { max-width:1000px; margin:40px auto; padding:20px; }

/* Customer Form */
.track-form { background:#fff; padding:20px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.08); margin-bottom:30px; }
.track-form h5 { font-weight:700; color:#a30000; margin-bottom:15px; }
.track-form .form-control, .track-form .btn { border-radius:8px; }

/* Order Card */
.order-card { background:#fff; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.08); margin-bottom:30px; padding:20px; transition:0.3s; }
.order-card:hover { transform:translateY(-5px); }
.order-header { display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid #eee; padding-bottom:10px; margin-bottom:15px; }
.order-header h5 { color:#a30000; font-weight:700; }
.order-header span { font-weight:500; color:#555; }

/* Accordion Products */
.accordion-button { background:#f8f8f8; font-weight:600; color:#a30000; }
.product-details { display:flex; gap:15px; padding:10px 0; border-bottom:1px solid #eee; }
.product-details img { width:80px; height:80px; object-fit:cover; border-radius:8px; }
.product-details-info { flex-grow:1; }
.product-details-info h6 { margin:0 0 5px 0; font-weight:600; }
.product-details-info p { margin:0; font-size:0.9rem; color:#555; }

/* Tracking Steps */
.tracking { display:flex; justify-content:space-between; margin-top:20px; flex-wrap:wrap; }
.step { text-align:center; position:relative; flex:1; min-width:80px; }
.step::before { content:''; position:absolute; top:15px; left:50%; width:100%; height:4px; background:#eee; z-index:-1; transform:translateX(-50%); }
.step:first-child::before { display:none; }
.step-circle { width:30px; height:30px; background:#eee; border-radius:50%; margin:0 auto 8px auto; line-height:30px; color:#fff; font-weight:600; display:flex; align-items:center; justify-content:center; }
.step.active .step-circle { background:#a30000; }
.step.delivered .step-circle { background:green; }
.step-label { font-size:0.85rem; font-weight:500; color:#555; }

/* Summary */
.order-summary { background:#f8f8f8; padding:15px; border-radius:8px; margin-top:15px; font-size:0.95rem; }
.order-summary p { margin:4px 0; }

/* Need Help / Invoice */
.need-help { font-size:0.85rem; color:#a30000; cursor:pointer; text-decoration:underline; margin-top:5px; display:inline-block; }
.invoice { font-size:0.85rem; color:#555; cursor:pointer; text-decoration:underline; margin-left:15px; }

/* Footer */
.footer { background:linear-gradient(135deg,#111,#a30000); color:#fff; padding:40px 20px; text-align:center; }
.footer h5 { font-weight:700; margin-bottom:15px; }
.footer .copyright { margin-top:15px; font-size:0.9rem; color:#ddd; }

/* Responsive */
@media(max-width:768px){
  .tracking { flex-direction:column; gap:15px; }
  .step::before { width:4px; height:100%; top:50%; left:15px; transform:translateY(-50%); }
}
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
        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="products.html">Products</a></li>
        <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
        <li class="nav-item ms-2">
          <a class="btn btn-account" href="register.html">Create Account</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero -->
<div class="hero">
  <h1>Track Your Orders</h1>
  <p>View all orders and delivery status</p>
</div>

<!-- Track Container -->
<div class="track-container container">

  <!-- Customer Form -->
  <div class="track-form">
    <h5>Search Order</h5>
    <div class="row g-3">
      <div class="col-md-5">
        <input type="text" id="orderId" class="form-control" placeholder="Enter Order ID">
      </div>
      <div class="col-md-5">
        <input type="email" id="email" class="form-control" placeholder="Enter Email">
      </div>
      <div class="col-md-2 d-grid">
        <button class="btn btn-danger" onclick="trackOrder()">Track</button>
      </div>
    </div>
  </div>

  <!-- Orders List -->
  <div id="ordersList">

    <!-- Order Card 1 -->
    <div class="order-card">
      <div class="order-header">
        <h5>Order #12345</h5>
        <span>Placed on: 20 Sep 2025</span>
      </div>

      <!-- Accordion for Products -->
      <div class="accordion" id="accordionOrder1">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
              View Products (2 items)
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionOrder1">
            <div class="accordion-body">
              <div class="product-details">
                <img src="https://picsum.photos/80/80?random=21" alt="Smartphone">
                <div class="product-details-info">
                  <h6>Smartphone XYZ</h6>
                  <p>Qty: 1 | Price: $499</p>
                  <p>Color: Black | Size: N/A</p>
                </div>
              </div>
              <div class="product-details">
                <img src="https://picsum.photos/80/80?random=22" alt="Headphones">
                <div class="product-details-info">
                  <h6>Wireless Headphones</h6>
                  <p>Qty: 1 | Price: $199</p>
                  <p>Color: White | Size: N/A</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Shipping & Payment -->
      <div class="order-summary">
        <p><strong>Shipping:</strong> 123 Main St, City, Country</p>
        <p><strong>Payment:</strong> Credit Card</p>
        <p><strong>Items Total:</strong> $698</p>
        <p><strong>Shipping Fee:</strong> $20</p>
        <p><strong>Grand Total:</strong> $718</p>
      </div>

      <!-- Tracking Steps -->
      <div class="tracking">
        <div class="step active"><div class="step-circle">1</div><div class="step-label">Ordered</div></div>
        <div class="step active"><div class="step-circle">2</div><div class="step-label">Processed</div></div>
        <div class="step active"><div class="step-circle">3</div><div class="step-label">Shipped</div></div>
        <div class="step"><div class="step-circle">4</div><div class="step-label">Out for Delivery</div></div>
        <div class="step"><div class="step-circle">5</div><div class="step-label">Delivered</div></div>
      </div>

      <span class="need-help">Need Help?</span>
      <span class="invoice">Download Invoice</span>
    </div>

    <!-- Order Card 2 -->
    <div class="order-card">
      <div class="order-header">
        <h5>Order #12346</h5>
        <span>Placed on: 18 Sep 2025</span>
      </div>

      <div class="accordion" id="accordionOrder2">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
              View Products (3 items)
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#accordionOrder2">
            <div class="accordion-body">
              <div class="product-details">
                <img src="https://picsum.photos/80/80?random=23" alt="Laptop">
                <div class="product-details-info">
                  <h6>Laptop ABC</h6>
                  <p>Qty: 1 | Price: $899</p>
                  <p>Color: Silver | Size: 15 inch</p>
                </div>
              </div>
              <div class="product-details">
                <img src="https://picsum.photos/80/80?random=24" alt="Mouse">
                <div class="product-details-info">
                  <h6>Wireless Mouse</h6>
                  <p>Qty: 1 | Price: $49</p>
                  <p>Color: Black | Size: N/A</p>
                </div>
              </div>
              <div class="product-details">
                <img src="https://picsum.photos/80/80?random=25" alt="Bag">
                <div class="product-details-info">
                  <h6>Backpack</h6>
                  <p>Qty: 1 | Price: $70</p>
                  <p>Color: Blue | Size: Medium</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Shipping & Payment -->
      <div class="order-summary">
        <p><strong>Shipping:</strong> 456 Park Ave, City, Country</p>
        <p><strong>Payment:</strong> UPI</p>
        <p><strong>Items Total:</strong> $1018</p>
        <p><strong>Shipping Fee:</strong> $15</p>
        <p><strong>Grand Total:</strong> $1033</p>
      </div>

      <!-- Tracking Steps -->
      <div class="tracking">
        <div class="step delivered"><div class="step-circle">1</div><div class="step-label">Ordered</div></div>
        <div class="step delivered"><div class="step-circle">2</div><div class="step-label">Processed</div></div>
        <div class="step delivered"><div class="step-circle">3</div><div class="step-label">Shipped</div></div>
        <div class="step active"><div class="step-circle">4</div><div class="step-label">Out for Delivery</div></div>
        <div class="step"><div class="step-circle">5</div><div class="step-label">Delivered</div></div>
      </div>

      <span class="need-help">Need Help?</span>
      <span class="invoice">Download Invoice</span>
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
function trackOrder(){
  const orderId=document.getElementById('orderId').value.trim();
  const email=document.getElementById('email').value.trim();
  alert('Static page: Dynamic order filtering will require backend or database.');
}
</script>
</body>
</html>
