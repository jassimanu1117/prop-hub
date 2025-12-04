<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'User Auth') </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-card {
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(15px);
      padding: 40px 30px;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.3);
      width: 100%;
      max-width: 420px;
      border: 1px solid rgba(255,255,255,0.2);
    }
    .login-card h2 {
      text-align: center;
      margin-bottom: 25px;
      font-weight: 700;
      background: linear-gradient(90deg, #00f7c3, #fdbb2d);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .form-control {
      border-radius: 12px;
      border: 1px solid rgba(255,255,255,0.3);
      background: rgba(255,255,255,0.1);
      color: #fff;
      padding-left: 40px;
      transition: all 0.3s ease;
    }
    .form-control::placeholder { color: rgba(255,255,255,0.6); }
    .form-control:focus {
      border-color: #fdbb2d;
      box-shadow: 0 0 10px rgba(253,187,45,0.6);
      background: rgba(255,255,255,0.15);
      color: #fff;
    }
    .input-icon {
      position: absolute;
      left: 15px;
      top: 10px;
      color: rgba(255,255,255,0.6);
    }
    .btn-login {
      background: linear-gradient(90deg, #1a2a6c, #b21f1f, #fdbb2d);
      color: #fff;
      font-weight: 600;
      border-radius: 12px;
      transition: all 0.3s ease;
    }
    .btn-login:hover {
      background: linear-gradient(90deg, #fdbb2d, #b21f1f, #1a2a6c);
      transform: scale(1.05);
    }
    .links {
      display: flex;
      justify-content: space-between;
      margin-top: 15px;
    }
    .links a {
      font-size: 0.9rem;
      background: linear-gradient(90deg, #00f7c3, #fdbb2d);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-decoration: none;
      transition: 0.3s;
    }
    .links a:hover { opacity: 0.8; }

    /* Toast Notification */
    .toast-container {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 9999;
    }
  </style>
</head>
<body>

  <div class="login-card">
    @yield('content')
  </div>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>
