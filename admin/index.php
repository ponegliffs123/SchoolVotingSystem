<?php
session_start();
if(isset($_SESSION['admin'])){
    header('location: home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login - Online Voting System</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <!-- Google Font: Poppins -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
  <style>
    /* Global Styles */
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: linear-gradient(135deg, #2E2E2E, #7AC87B);
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
    }
    /* Glass-style Login Box */
    .login-box {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(12px);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
      text-align: center;
      width: 90%;
      max-width: 400px;
      border: 1px solid rgba(255, 255, 255, 0.3);
    }
    /* Logo Styling: Rounded image */
    .login-logo img {
      width: 90px;
      opacity: 0.85;
      border-radius: 50%;
    }
    .login-logo h3 {
      color: #fff;
      margin-top: 15px;
      font-weight: 600;
    }
    /* Text and Instructions */
    .text-white {
      color: #fff;
    }
    .login-box p {
      color: #fff;
      font-size: 16px;
      margin-bottom: 20px;
    }
    /* Input Fields */
    .login-box .form-control {
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
      border: none;
      padding: 12px;
      border-radius: 8px;
    }
    .login-box .form-control::placeholder {
      color: rgba(255, 255, 255, 0.8);
    }
    /* Primary Button */
    .btn-primary {
      background-color: #5F9F77;
      border: none;
      padding: 12px;
      font-size: 16px;
      border-radius: 8px;
      width: 100%;
      transition: 0.3s;
    }
    .btn-primary:hover {
      background-color: #4E8C68;
    }
    /* Secondary Button */
    .btn-secondary {
      background: rgba(255, 255, 255, 0.15);
      color: #fff;
      padding: 10px;
      font-size: 14px;
      border-radius: 8px;
      width: 100%;
      margin-top: 10px;
      border: 1px solid rgba(255, 255, 255, 0.3);
      transition: 0.3s;
    }
    .btn-secondary:hover {
      background: rgba(255, 255, 255, 0.3);
    }
    /* Forgot Password Link */
    .forgot-password a {
      color: rgba(255, 255, 255, 0.9);
      font-size: 14px;
      text-decoration: none;
      transition: 0.3s;
    }
    .forgot-password a:hover {
      color: #C6F7B8;
    }
    /* Callout for Errors */
    .callout {
      background: rgba(255, 50, 50, 0.3);
      padding: 12px;
      border-radius: 8px;
      margin-top: 12px;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <div class="login-logo">
      <img src="../unnamed.png" alt="Logo">
      <h3 class="text-white">Admin Panel</h3>
    </div>
    <p class="text-white">Sign in to access the admin dashboard</p>
    <form action="login.php" method="POST">
      <div class="mb-3">
        <input type="text" class="form-control" name="username" placeholder="Username" required>
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
      </div>
      <button type="submit" class="btn btn-primary" name="login">
        <i class="fa fa-sign-in"></i> Sign In
      </button>
    </form>
    <div class="forgot-password mt-3">
      <a href="forgot_password.php">Forgot Password?</a>
    </div>
    <a href="../index.php" class="btn btn-secondary mt-3">
      <i class="fa fa-arrow-left"></i> Back to Homepage
    </a>
    <?php if(isset($_SESSION['error'])): ?>
      <div class="callout text-white mt-3">
        <p><?= $_SESSION['error'] ?></p>
      </div>
      <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
  </div>
</body>
</html>
