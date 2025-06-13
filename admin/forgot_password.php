<?php
session_start();
include 'includes/conn.php'; // Ensure the database connection is included

if(isset($_POST['reset'])){
    $username = $_POST['username'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if($new_password !== $confirm_password){
        $_SESSION['error'] = "Passwords do not match!";
        header("Location: forgot_password.php");
        exit();
    }

    // Hash the new password before storing it
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Check if username exists
    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $query = $conn->query($sql);

    if($query->num_rows > 0){
        // Update password in database
        $update_sql = "UPDATE admin SET password = '$hashed_password' WHERE username = '$username'";
        if($conn->query($update_sql)){
            $_SESSION['success'] = "Password reset successfully!";
            header("Location: index.php"); // Redirect to login page
            exit();
        } else {
            $_SESSION['error'] = "Error updating password!";
        }
    } else {
        $_SESSION['error'] = "Username not found!";
    }
}
?>

<?php include 'includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Voting System - Admin Reset Password</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <!-- Google Font: Poppins -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
  <style>
    /* Global Glass-Themed Styles */
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #2E2E2E, #7AC87B);
    }
    /* Glass Effect Login Box */
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
    /* Header inside the box */
    .login-logo h3 {
      color: #fff;
      margin-bottom: 20px;
      font-weight: 600;
    }
    /* Instruction Text */
    .login-box p {
      color: #fff;
      font-size: 16px;
      margin-bottom: 20px;
    }
    /* Input Fields */
    .form-control {
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
      border: none;
      padding: 12px;
      border-radius: 8px;
      margin-bottom: 15px;
    }
    .form-control::placeholder {
      color: rgba(255, 255, 255, 0.8);
    }
    /* Primary Button */
    .btn-primary {
      background: #5F9F77;
      border: none;
      padding: 12px;
      font-size: 16px;
      border-radius: 8px;
      width: 100%;
      transition: 0.3s;
    }
    .btn-primary:hover {
      background: #4a8b65;
    }
    /* Secondary Button */
    .btn-secondary {
      background: rgba(255, 255, 255, 0.15);
      color: #fff;
      padding: 10px;
      font-size: 14px;
      border-radius: 8px;
      width: 100%;
      border: 1px solid rgba(255, 255, 255, 0.3);
      transition: 0.3s;
      margin-top: 10px;
    }
    .btn-secondary:hover {
      background: rgba(255, 255, 255, 0.25);
    }
    /* Alert/Callout Styles */
    .alert {
      border-radius: 5px;
      margin-top: 10px;
      padding: 12px;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <div class="login-logo">
      <h3>Reset Password</h3>
    </div>
    <p>Enter your username and new password</p>
    <form action="forgot_password.php" method="POST">
      <div class="mb-3 text-start">
        <label class="text-white">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Enter username" required>
      </div>
      <div class="mb-3 text-start">
        <label class="text-white">New Password</label>
        <input type="password" class="form-control" name="new_password" placeholder="Enter new password" required>
      </div>
      <div class="mb-3 text-start">
        <label class="text-white">Confirm New Password</label>
        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm new password" required>
      </div>
      <button type="submit" class="btn btn-primary" name="reset">
        <i class="fa fa-key"></i> Reset Password
      </button>
    </form>
    <!-- Back to Login Button -->
    <a href="index.php" class="btn btn-secondary">
      <i class="fa fa-arrow-left"></i> Back to Login
    </a>
    <?php
    if(isset($_SESSION['error'])){
        echo "
            <div class='alert alert-danger text-white text-center'>
                <p>".$_SESSION['error']."</p> 
            </div>
        ";
        unset($_SESSION['error']);
    }
    if(isset($_SESSION['success'])){
        echo "
            <div class='alert alert-success text-white text-center'>
                <p>".$_SESSION['success']."</p> 
            </div>
        ";
        unset($_SESSION['success']);
    }
    ?>
  </div>
  
  <?php include 'includes/scripts.php'; ?>
</body>
</html>
