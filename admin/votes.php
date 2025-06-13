<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body style="background: linear-gradient(135deg, #2E2E2E, #7AC87B); font-family: 'Poppins', sans-serif; color: white;">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper -->
  <div class="content-wrapper" style="background: transparent;">
    <section class="content-header text-white text-center">
      <h1 class="fw-bold">🗳 VOTES</h1>
      <ol class="breadcrumb">
        <li><a href="#" class="text-white"><i class="fa fa-home"></i> Home</a></li>
        <li class="active text-white">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
              <i class='fa fa-exclamation-circle'></i> ".$_SESSION['error']."
              <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            </div>";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
              <i class='fa fa-check-circle'></i> ".$_SESSION['success']."
              <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            </div>";
          unset($_SESSION['success']);
        }
      ?>

      <div class="row">
        <div class="col-12">
          <div class="glass-card">
            <div class="card-header text-center">
              <a href="#reset" data-toggle="modal" class="btn btn-danger btn-sm btn-curve w-100" 
                 style="background: #FF6B6B; color: white; font-size: 14px;">
                <i class="fa fa-refresh"></i> Reset Votes
              </a>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-hover text-center">
                <thead class="text-white">
                  <th class="hidden"></th>
                  <th>Position</th>
                  <th>Candidate</th>
                  <th>Voter</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, candidates.firstname AS canfirst, candidates.lastname AS canlast, 
                                   voters.firstname AS votfirst, voters.lastname AS votlast 
                            FROM votes 
                            LEFT JOIN positions ON positions.id=votes.position_id 
                            LEFT JOIN candidates ON candidates.id=votes.candidate_id 
                            LEFT JOIN voters ON voters.id=votes.voters_id 
                            ORDER BY positions.priority ASC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                        <tr class='vote-row'>
                          <td class='hidden'></td>
                          <td>".$row['description']."</td>
                          <td>".$row['canfirst'].' '.$row['canlast']."</td>
                          <td>".$row['votfirst'].' '.$row['votlast']."</td>
                        </tr>";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>

  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/votes_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>

<style>
/* Glassmorphism Table */
.glass-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    border-radius: 12px;
    padding: 20px;
    color: white;
    transition: 0.3s ease-in-out;
    box-shadow: 0 4px 10px rgba(255, 255, 255, 0.2);
}
.glass-card:hover {
    transform: translateY(-5px);
}

/* Table Styling */
.table {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    color: white;
    border-radius: 10px;
    overflow: hidden;
}
.table th, .table td {
    padding: 12px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.3);
}
.vote-row:hover {
    background: rgba(255, 255, 255, 0.3);
    transition: 0.3s ease-in-out;
}

/* Buttons */
.btn-danger {
    background: #FF6B6B;
    border: none;
    font-weight: bold;
    transition: 0.3s ease-in-out;
}
.btn-danger:hover {
    background: #D9534F;
}
</style>

</body>
</html>
