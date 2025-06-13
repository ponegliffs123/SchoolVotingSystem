<?php include 'includes/session.php'; ?>
<?php include 'includes/slugify.php'; ?>
<?php include 'includes/header.php'; ?>
<body style="background: linear-gradient(135deg, #2E2E2E, #7AC87B); font-family: 'Poppins', sans-serif; color: white;">

<div class="wrapper">
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper" style="background: transparent;">
        <section class="content-header text-white text-center">
            <h1 class="fw-bold">📊 Admin Dashboard</h1>
            <ol class="breadcrumb">
                <li><a href="#" class="text-white"><i class="fa fa-home"></i> Home</a></li>
                <li class="active text-white">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <?php
                if(isset($_SESSION['error'])){
                    echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                            <i class='fa fa-exclamation-circle'></i> ".$_SESSION['error']."
                            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                          </div>";
                    unset($_SESSION['error']);
                }
                if(isset($_SESSION['success'])){
                    echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                            <i class='fa fa-check-circle'></i> ".$_SESSION['success']."
                            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                          </div>";
                    unset($_SESSION['success']);
                }
            ?>

            <!-- Stat Boxes -->
            <div class="row">
                <?php 
                    $stats = [
                        ["title" => "Positions", "sql" => "SELECT * FROM positions", "icon" => "fa-cog", "link" => "positions.php"],
                        ["title" => "Candidates", "sql" => "SELECT * FROM candidates", "icon" => "fa-user-tie", "link" => "candidates.php"],
                        ["title" => "Total Voters", "sql" => "SELECT * FROM voters", "icon" => "fa-users", "link" => "voters.php"],
                        ["title" => "Voters Voted", "sql" => "SELECT * FROM votes GROUP BY voters_id", "icon" => "fa-check-square", "link" => "votes.php"]
                    ];

                    foreach ($stats as $stat) {
                        $query = $conn->query($stat["sql"]);
                        echo "
                        <div class='col-md-6 col-lg-3 mb-4'>
                            <div class='card glass-card text-center'>
                                <div class='card-body'>
                                    <i class='fa ".$stat["icon"]." fa-2x mb-2'></i>
                                    <h3>".$query->num_rows."</h3>
                                    <p class='fw-bold'>".$stat["title"]."</p>
                                </div>
                                <div class='card-footer'>
                                    <a href='".$stat["link"]."' class='btn btn-dark btn-sm w-100'><i class='fa fa-arrow-right'></i> More Info</a>
                                </div>
                            </div>
                        </div>";
                    }
                ?>
            </div>

            <!-- Votes Tally -->
            <div class="row mt-4">
                <div class="col-12 text-white">
                    <h3 class="fw-bold">📌 Votes Tally 
                        <span class="float-end">
                            <a href="print.php" class="btn btn-outline-light"><i class="fa fa-print"></i> Print</a>
                        </span>
                    </h3>
                </div>
            </div>

            <!-- Charts -->
            <div class="row">
                <?php
                    $sql = "SELECT * FROM positions ORDER BY priority ASC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                        echo "
                        <div class='col-md-12 col-lg-6 mb-4'>
                            <div class='card glass-card'>
                                <div class='card-header text-white text-center'>
                                    <h5>".$row['description']."</h5>
                                </div>
                                <div class='card-body'>
                                    <canvas id='".slugify($row['description'])."' style='height:200px;'></canvas>
                                </div>
                            </div>
                        </div>";
                    }
                ?>
            </div>
        </section>
    </div>

    <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>

<!-- Chart Script -->
<?php
  $sql = "SELECT * FROM positions ORDER BY priority ASC";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    $sql = "SELECT * FROM candidates WHERE position_id = '".$row['id']."'";
    $cquery = $conn->query($sql);
    $carray = array();
    $varray = array();
    while($crow = $cquery->fetch_assoc()){
      array_push($carray, $crow['lastname']);
      $sql = "SELECT * FROM votes WHERE candidate_id = '".$crow['id']."'";
      $vquery = $conn->query($sql);
      array_push($varray, $vquery->num_rows);
    }
    $carray = json_encode($carray);
    $varray = json_encode($varray);
?>
<script>
$(function(){
    var ctx = $('#<?= slugify($row['description']) ?>').get(0).getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= $carray ?>,
            datasets: [{
                label: 'Votes',
                backgroundColor: 'rgba(50, 200, 50, 0.6)',
                data: <?= $varray ?>
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
});
</script>
<?php } ?>

<style>
/* Glassmorphism Cards */
.glass-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    border-radius: 12px;
    text-align: center;
    padding: 20px;
    color: white;
    transition: 0.3s ease-in-out;
    height: 170px;
    box-shadow: 0 4px 10px rgba(255, 255, 255, 0.2);
}
.glass-card:hover {
    transform: translateY(-5px);
}
.card-footer a {
    text-decoration: none;
    font-weight: bold;
    color: white;
}

/* Breadcrumb */
.breadcrumb a {
    color: rgba(255, 255, 255, 0.7);
}
.breadcrumb a:hover {
    color: white;
}

/* Grid System */
@media (max-width: 992px) {
    .glass-card {
        height: auto;
        padding: 20px;
    }
}
</style>
</body>
</html>
