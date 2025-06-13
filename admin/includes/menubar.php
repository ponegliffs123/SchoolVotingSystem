<aside class="main-sidebar glass-sidebar">
  <section class="sidebar">
    <!-- Sidebar User Panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
        <small><i class="fa fa-circle text-success"></i> Online</small>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">📊 REPORTS</li>
      <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="votes.php"><i class="fa fa-lock"></i> <span>Votes</span></a></li>

      <li class="header">⚙️ MANAGE</li>
      <li><a href="voters.php"><i class="fa fa-users"></i> <span>Voters</span></a></li>
      <li><a href="positions.php"><i class="fa fa-tasks"></i> <span>Positions</span></a></li>
      <li><a href="candidates.php"><i class="fa fa-user-tie"></i> <span>Candidates</span></a></li>

      <li class="header">🔧 SETTINGS</li>
      <li><a href="ballot.php"><i class="fa fa-file-alt"></i> <span>Ballot Position</span></a></li>
      <li><a href="#config" data-toggle="modal"><i class="fa fa-cogs"></i> <span>Election Title</span></a></li>
    </ul>
  </section>
</aside>

<?php include 'config_modal.php'; ?>


<style>
/* Sidebar Fix */
.glass-sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 250px;  /* Sidebar Width */
    height: 100vh;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    transition: 0.3s ease-in-out;
    z-index: 1000; /* Ensures Sidebar Stays on Top */
}
.glass-sidebar:hover {
    background: rgba(255, 255, 255, 0.15);
}

/* Sidebar User Panel */
.user-panel {
    display: flex;
    align-items: center;
    padding: 15px;
}
.user-panel img {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    border: 2px solid white;
}
.user-panel p {
    margin: 0;
    font-weight: bold;
}
.user-panel small {
    display: block;
    font-size: 12px;
    color: #27ae60;
}

/* Sidebar Menu */
.sidebar-menu {
    list-style: none;
    padding: 10px;
}
.sidebar-menu .header {
    text-transform: uppercase;
    font-size: 12px;
    font-weight: bold;
    padding: 10px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.3);
}
.sidebar-menu li {
    margin: 5px 0;
    border-radius: 8px;
    transition: 0.3s;
}
.sidebar-menu li a {
    color: white;
    padding: 10px 15px;
    display: flex;
    align-items: center;
    text-decoration: none;
    transition: 0.3s;
}
.sidebar-menu li a i {
    margin-right: 10px;
}
.sidebar-menu li:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateX(5px);
}

/* Adjust Content to Prevent Overlapping */
.content-wrapper {
    margin-left: 260px;  /* Sidebar Width + Some Space */
    padding: 20px;
    transition: margin 0.3s ease-in-out;
}

/* Mobile Adjustments */
@media (max-width: 992px) {
    .glass-sidebar {
        width: 200px;
    }
    .content-wrapper {
        margin-left: 210px;
    }
    .sidebar-menu li a {
        font-size: 14px;
    }
}
@media (max-width: 768px) {
    .glass-sidebar {
        width: 70px; /* Collapsed Sidebar */
    }
    .sidebar-menu li a span {
        display: none;
    }
    .content-wrapper {
        margin-left: 80px; /* Adjusted for Collapsed Sidebar */
    }
}
</style>
