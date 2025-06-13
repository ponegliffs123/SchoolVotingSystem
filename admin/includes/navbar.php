<header class="main-header glass-navbar">
  <!-- Logo -->
  <a href="#" class="logo">
    <span class="logo-mini"><b>O</b>VS</span>
    <span class="logo-lg">Online Voting System</span>
  </a>

  <!-- Navbar -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar Toggle Button -->
    <div class="d-flex align-items-center">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <i class="fa fa-bars"></i>
      </a>
    </div>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account Dropdown -->
        <li class="dropdown user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $user['firstname'].' '.$user['lastname']; ?></span>
            <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-glass">
            <!-- User Image -->
            <li class="user-header">
              <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
              <p><?php echo $user['firstname'].' '.$user['lastname']; ?>
                <small>Member since <?php echo date('M. Y', strtotime($user['created_on'])); ?></small>
              </p>
            </li>
            <!-- User Footer -->
            <li class="user-footer">
              <div class="btn-group w-100">
                <a href="#profile" data-toggle="modal" class="btn btn-light w-50" id="admin_profile">Update</a>
                <a href="logout.php" class="btn btn-danger w-50">Sign Out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>

<?php include 'includes/profile_modal.php'; ?>



<style>
/* Glassmorphism Navbar */
.glass-navbar {
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    position: fixed;
    width: 100%;
    height: 55px; /* Smaller height */
    top: 0;
    z-index: 1050; /* Ensures it's above sidebar */
    display: flex;
    align-items: center;
    padding: 0 15px;
}

/* Logo */
.logo {
    display: flex;
    align-items: center;
    font-size: 14px; /* Reduced font size */
    font-weight: bold;
    text-transform: uppercase;
    color: white;
    padding: 5px 15px;
}
.logo-mini {
    font-size: 16px;
    font-weight: bold;
}
.logo-lg {
    font-size: 18px;
}

/* Sidebar Toggle Button */
.sidebar-toggle {
    font-size: 16px;
    padding: 8px;
    color: white;
    transition: 0.3s;
}
.sidebar-toggle:hover {
    color: #ffcc00;
}

/* Navbar */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 55px; /* Adjusted height */
    padding-right: 15px;
}

/* User Dropdown */
.user-menu {
    position: relative;
}
.user-menu a {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px; /* Smaller text */
}
.user-image {
    border-radius: 50%;
    width: 28px;
    height: 28px;
}

/* Dropdown */
.dropdown-glass {
    background: rgba(0, 0, 0, 0.9);
    backdrop-filter: blur(10px);
    border-radius: 10px;
    padding: 10px;
    width: 200px; /* Reduced width */
}

/* User Info */
.user-header img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
}
.user-header p {
    font-size: 13px;
    color: white;
}

/* User Footer Buttons */
.user-footer {
    display: flex;
    justify-content: space-between;
}
.btn-light {
    background: #ffffff;
    color: black;
    border-radius: 6px;
    font-size: 12px;
    padding: 6px;
}
.btn-danger {
    background: #e74c3c;
    border-radius: 6px;
    font-size: 12px;
    padding: 6px;
}

/* Adjust Content Wrapper */
.content-wrapper {
    margin-top: 55px; /* Adjusted for smaller navbar */
}

/* Responsive Fixes */
@media (max-width: 768px) {
    .glass-navbar {
        height: 50px;
    }
    .navbar {
        height: 50px;
    }
    .user-image {
        width: 25px;
        height: 25px;
    }
    .logo-lg {
        font-size: 16px;
    }
}

</style>
