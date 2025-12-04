<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Order Success - ShopEase</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<style>
body { font-family: 'Poppins', sans-serif; background:#fafafa; margin:0; }
.navbar { background:linear-gradient(135deg,#a30000,#000); }
.navbar-brand, .navbar-nav .nav-link { color:#fff !important; font-weight:500; }
.navbar-nav .nav-link:hover { color:#ffcccc !important; }
.hero { 
  background: linear-gradient(rgba(163,0,0,0.85), rgba(0,0,0,0.9)), url('https://picsum.photos/1920/300?random=21'); 
  background-size:cover; 
  color:#fff; 
  text-align:center; 
  padding:80px 20px; 
  border-bottom: 5px solid #ff3333;
}
.hero h1 { font-weight:700; font-size:2.5rem; margin-bottom:10px; }
.hero p { font-size:1.2rem; color:#ffdddd; }

.container { margin-top:50px; margin-bottom:50px; }
.card { border-radius:15px; box-shadow:0 8px 25px rgba(0,0,0,0.3); padding:30px; }
.card h4 { font-weight:700; border-bottom: 2px solid #a30000; padding-bottom:10px; margin-bottom:20px; color:#fff; background:linear-gradient(135deg,#a30000,#7f1c1c); padding:10px; border-radius:10px; }

.table { background:#fff; border-radius:10px; overflow:hidden; }
.table th { background:#a30000; color:#fff; }
.table td, .table th { vertical-align:middle !important; }

.summary { background:linear-gradient(145deg,#4e1f1f,#a30000); color:#fff; padding:20px; border-radius:12px; }
.summary p { font-size:1.05rem; margin-bottom:10px; }

.btn-back { background:#ff3333; color:#fff; border-radius:25px; padding:10px 20px; font-weight:600; transition:0.3s; }
.btn-back:hover { background:#cc0000; color:#fff; }

.progress-container {
  margin-top:30px;
  background:#222;
  border-radius:12px;
  padding:20px;
}
.progress-step {
  display:flex;
  justify-content:space-between;
  position:relative;
  margin-bottom:20px;
}
.progress-step::before {
  content:'';
  position:absolute;
  top:12px;
  left:0;
  width:100%;
  height:4px;
  background:#555;
  z-index:0;
  border-radius:2px;
}
.progress-circle {
  position:relative;
  width:25px;
  height:25px;
  background:#555;
  border-radius:50%;
  z-index:1;
}
.progress-circle.active {
  background:#ff3333;
}
.progress-label {
  position:absolute;
  top:30px;
  width:100px;
  text-align:center;
  left:-38px;
  color:#fff;
  font-size:0.85rem;
}
@media(max-width:768px){
  .hero h1 { font-size:2rem; }
  .hero p { font-size:1rem; }
  .card { padding:20px; }
  .progress-label { font-size:0.75rem; left:-28px; width:80px; }
}
</style>
</head>
<body>



<!-- Hero -->
<div class="hero">
  <h1>Thank You for Your Order!</h1>
  <p>Your order <strong>#{{ $order->id }}</strong> has been placed successfully</p>
</div>

<!-- Order Details -->
<div class="container">
  <div class="card bg-dark text-white">
    <h4>Shipping Information</h4>
    <div class="row mb-4">
      <div class="col-md-4"><p><strong>Name:</strong> {{ $order->name }}</p></div>
      <div class="col-md-4"><p><strong>Phone:</strong> {{ $order->phone }}</p></div>
      <div class="col-md-4"><p><strong>Address:</strong> {{ $order->address }}</p></div>
    </div>

    <h4>Order Items</h4>
    <div class="table-responsive mb-4">
      <table class="table table-bordered text-dark">
        <thead>
          <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          @foreach($order->items as $item)
          <tr>
            <td>{{ $item->product_name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>${{ number_format($item->price, 2) }}</td>
            <td>${{ number_format($item->total, 2) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <h4>Order Summary</h4>
    <div class="summary">
      <p><strong>Subtotal:</strong> ${{ number_format($order->subtotal, 2) }}</p>
      <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
      <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
    </div>

    <!-- Track Order Section -->
    <div class="progress-container mt-4">
      <h4>Track Your Order</h4>
      <div class="progress-step">
        @php
          $steps = ['Pending', 'Processed', 'Shipped', 'Delivered'];
        @endphp
        @foreach($steps as $index => $step)
        <div class="text-center" style="position:relative;">
          <div class="progress-circle {{ $index <= array_search(ucfirst($order->status), $steps) ? 'active' : '' }}"></div>
          <div class="progress-label">{{ $step }}</div>
        </div>
        @endforeach
      </div>
    </div>

    <div class="text-center mt-4">
      <a href="/" class="btn btn-back">Back to Home</a>
    </div>
  </div>
</div>

</body>
</html>
