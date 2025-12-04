<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password - ShopEase</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #000, #5a0d0d);
      font-family: 'Poppins', sans-serif;
      color: #fff;
    }
    .reset-container {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 20px;
    }
    .reset-card {
      background: #1a1a1a;
      border-radius: 15px;
      box-shadow: 0 0 25px rgba(255, 0, 0, 0.3);
      padding: 40px 30px;
      max-width: 430px;
      width: 100%;
    }
    .reset-card h3 {
      color: #ff4d4d;
      text-align: center;
      font-weight: 600;
      margin-bottom: 10px;
    }
    .reset-card p {
      text-align: center;
      color: #bbb;
      margin-bottom: 25px;
      font-size: 0.95rem;
    }
    .form-control {
      background: #2a2a2a;
      border: 1px solid #444;
      color: #fff;
    }
    .form-control:focus {
      background: #2a2a2a;
      border-color: #ff4d4d;
      box-shadow: none;
      color: #fff;
    }
    .btn-reset {
      background: #ff4d4d;
      border: none;
      font-weight: 600;
      transition: 0.3s;
      width: 100%;
      padding: 12px;
      border-radius: 8px;
    }
    .btn-reset:hover {
      background: #cc0000;
    }
    .extra-links {
      text-align: center;
      margin-top: 20px;
      font-size: 0.9rem;
    }
    .extra-links a {
      color: #ff4d4d;
      text-decoration: none;
    }
    .extra-links a:hover {
      text-decoration: underline;
    }
    footer {
      text-align: center;
      margin-top: 20px;
      color: #bbb;
      font-size: 0.85rem;
    }
  </style>
</head>
<body>

  <div class="reset-container">
    <div class="reset-card">
      <h3><i class="fas fa-key"></i> Reset Password</h3>
      <p>Enter your new password below and confirm it to reset your account.</p>

      <form>
        <div class="mb-3">
          <label class="form-label">New Password</label>
          <div class="input-group">
            <span class="input-group-text bg-dark text-light"><i class="fas fa-lock"></i></span>
            <input type="password" class="form-control" placeholder="Enter new password" required>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Confirm Password</label>
          <div class="input-group">
            <span class="input-group-text bg-dark text-light"><i class="fas fa-lock"></i></span>
            <input type="password" class="form-control" placeholder="Confirm new password" required>
          </div>
        </div>

        <button type="submit" class="btn btn-reset">Update Password</button>
      </form>

      <div class="extra-links">
        <p><a href="login.html"><i class="fas fa-arrow-left"></i> Back to Login</a></p>
      </div>

      <footer>
        © 2025 ShopEase | Designed by <strong>JSWEBCODE</strong>
      </footer>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
