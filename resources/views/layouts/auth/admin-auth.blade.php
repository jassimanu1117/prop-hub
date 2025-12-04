<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Admin Auth')</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
      background-size: 400% 400%;
      animation: gradientBG 12s ease infinite;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
    }

    .shape { position: absolute; border-radius: 50%; opacity: 0.2; animation: float 8s ease-in-out infinite; }
    .shape1 { width: 150px; height: 150px; background: #ff512f; top: 10%; left: 5%; animation-delay: 0s; }
    .shape2 { width: 200px; height: 200px; background: #dd2476; bottom: 10%; right: 10%; animation-delay: 2s; }
    .shape3 { width: 100px; height: 100px; background: #24c6dc; top: 50%; right: 20%; animation-delay: 4s; }

    @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-20px); } }
    @keyframes gradientBG { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }

    .login-card {
      position: relative; 
      z-index: 2;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(12px);
      border-radius: 20px;
      padding: 40px 30px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.2);
      width: 100%;
      max-width: 400px;
    }
  </style>
</head>
<body>
  <!-- Floating Shapes -->
  <div class="shape shape1"></div>
  <div class="shape shape2"></div>
  <div class="shape shape3"></div>

  <div class="login-card">
      @yield('content')
  </div>

  @stack('scripts')
</body>
</html>
