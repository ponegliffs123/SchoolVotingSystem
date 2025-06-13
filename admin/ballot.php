<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body style="background: linear-gradient(135deg, #1e1e1e, #2a2a2a); font-family: 'Poppins', sans-serif; color: white;">

<div class="wrapper">
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper" style="background: transparent;">
        <section class="content-header text-white text-center">
            <h1 class="fw-bold">📜 Ballot Position</h1>
            <ol class="breadcrumb">
                <li><a href="#" class="text-white"><i class="fa fa-home"></i> Home</a></li>
                <li class="active text-white">Dashboard</li>
            </ol>
        </section>

        <!-- Main Content -->
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

            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="card glass-card">
                        <div class="card-header text-white text-center">
                            <h5 class="fw-bold">Manage Ballot Positions</h5>
                        </div>
                        <div class="card-body">
                            <div id="content" class="text-center">
                                <i class="fa fa-spinner fa-spin fa-2x"></i> Loading ballot positions...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>   
    </div>

    <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>

<script>
$(function(){
    fetch();

    $(document).on('click', '.reset', function(e){
        e.preventDefault();
        var desc = $(this).data('desc');
        $('.' + desc).iCheck('uncheck');
    });

    $(document).on('click', '.moveup', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        animateMove(id, "-50px");
        updatePosition('ballot_up.php', id);
    });

    $(document).on('click', '.movedown', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        animateMove(id, "+50px");
        updatePosition('ballot_down.php', id);
    });
});

function fetch(){
    $.ajax({
        type: 'POST',
        url: 'ballot_fetch.php',
        dataType: 'json',
        success: function(response){
            $('#content').html(response);
        }
    });
}

function updatePosition(url, id){
    $.ajax({
        type: 'POST',
        url: url,
        data: { id: id },
        dataType: 'json',
        success: function(response){
            if(!response.error){
                fetch();
            }
        }
    });
}

function animateMove(id, distance){
    $('#' + id).animate({ 'marginTop': distance }, 300);
}
</script>

<style>
/* Glassmorphism Style */
.glass-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(12px);
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
    transition: 0.3s ease-in-out;
}
.glass-card:hover {
    transform: translateY(-5px);
}
</style>
</body>
</html>
