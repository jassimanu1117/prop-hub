<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ShopEase - Register</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body { font-family: 'Poppins', sans-serif; background: #fafafa; margin: 0; }
    .navbar { background:linear-gradient(135deg,#a30000,#000); }
    .navbar-brand, .navbar-nav .nav-link { color:#fff !important; font-weight:500; }
    .navbar-nav .nav-link:hover { color:#ffcccc !important; }
    .navbar .btn-account { background:#ff3333; color:#fff; border-radius:20px; padding:6px 16px; font-weight:600; transition:0.3s; }
    .navbar .btn-account:hover { background:#cc0000; color:#fff; }
    .hero { background: linear-gradient(rgba(163,0,0,0.8),rgba(0,0,0,0.9)), url('https://picsum.photos/1920/400?random=10'); background-size: cover; color: #fff; text-align: center; padding: 60px 20px; }
    .hero h1 { font-weight: 700; font-size: 2.2rem; margin-bottom: 15px; }
    .hero p { font-size: 1.1rem; margin-bottom: 20px; }
    .register-container { max-width: 500px; margin: -50px auto 50px auto; background: #111; padding: 40px; border-radius: 15px; box-shadow: 0 8px 20px rgba(0,0,0,0.3); color: #fff; }
    .register-container h2 { text-align: center; font-weight: 700; margin-bottom: 30px; color: #fdbb2d; }
    .register-container .form-control { background: #222; border: none; color: #fff; border-radius: 8px; padding: 12px; }
    .register-container .form-control:focus { background: #222; box-shadow: 0 0 0 2px #a30000; color: #fff; }
    .register-container .btn-register { background: #a30000; color: #fff; border: none; width: 100%; padding: 12px; font-weight: 600; border-radius: 8px; transition: 0.3s; }
    .register-container .btn-register:hover { background: #cc3333; }
    .register-container .text-center a { color: #fdbb2d; text-decoration: none; }
    .register-container .text-center a:hover { text-decoration: underline; }
    .invalid-feedback { display: block; font-size: 0.875rem; margin-top: 5px; }
    .footer { background: linear-gradient(135deg,#111,#a30000); color: #fff; padding: 40px 20px; text-align: center; }
    .footer p { margin: 0; }
    .footer strong { color: #fdbb2d; }
    @media(max-width:576px){ .register-container { margin: 20px 15px; padding: 30px 20px; } }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">JSWEBCODE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-center">
          <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Products</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Wishlist</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
          <li class="nav-item">
            <a href="{{ route('user.register') }}" class="btn btn-account ms-2"><i class="bi bi-person-plus"></i> Create Account</a>
          </li>
          <li class="nav-item ms-3"><i class="bi bi-heart"></i></li>
          <li class="nav-item ms-3"><i class="bi bi-cart"></i></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Banner -->
  <div class="hero">
    <h1>Create Your Account</h1>
    <p>Join ShopEase and start shopping your favorite products!</p>
  </div>

  <!-- Registration Form -->
  <div class="register-container">
    <h2>Register</h2>

    <!-- Flash Messages -->
    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('user.register') }}" autocomplete="off" >
      @csrf

      <!-- Name -->
      <div class="mb-3">
        <label for="fullName" class="form-label">Full Name</label>
        <input type="text"
               class="form-control @error('name') is-invalid @enderror"
               id="fullName"
               name="name"
               value="{{ old('name') }}"
               placeholder="Enter your full name"
               >
        @error('name')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>

      <!-- Email -->
      <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email"
               class="form-control @error('email') is-invalid @enderror"
               id="email"
               name="email"
               value="{{ old('email') }}"
               placeholder="Enter your email"
               >
        @error('email')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>

      <!-- Password -->
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password"
               class="form-control @error('password') is-invalid @enderror"
               id="password"
               name="password"
               placeholder="Enter password"
               >
        @error('password')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>

      <!-- Confirm Password -->
      <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password"
               class="form-control"
               id="password_confirmation"
               name="password_confirmation"
               placeholder="Confirm password"
               >
      </div>

      <button type="submit" class="btn btn-register">Create Account</button>
      <p class="text-center mt-3">Already have an account? <a href="{{ route('user.login') }}">Login Here</a></p>
    </form>
  </div>

  <!-- Footer -->
  <div class="footer">
    <p>&copy; 2025 ShopEase | Designed by <strong>JSWEBCODE</strong></p>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
