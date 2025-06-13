<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body style="background: linear-gradient(135deg, #2E2E2E, #7AC87B); font-family: 'Poppins', sans-serif; color: white;">
<div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper" style="background: transparent;">
        <section class="content-header text-white text-center">
            <h1 class="fw-bold">📌 Positions</h1>
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
                <div class="col-12">
                    <div class="card glass-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0">Available Positions</h5>
                            <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i> Add Position
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-hover text-white">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Description</th>
                                        <th>Maximum Votes</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM positions ORDER BY priority ASC";
                                        $query = $conn->query($sql);
                                        while($row = $query->fetch_assoc()){
                                            echo "
                                            <tr>
                                                <td>".$row['description']."</td>
                                                <td>".$row['max_vote']."</td>
                                                <td>
                                                    <button class='btn btn-success btn-sm edit' data-id='".$row['id']."'>
                                                        <i class='fa fa-edit'></i> Edit
                                                    </button>
                                                    <button class='btn btn-danger btn-sm delete' data-id='".$row['id']."'>
                                                        <i class='fa fa-trash'></i> Delete
                                                    </button>
                                                </td>
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
    <?php include 'includes/positions_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>

<script>
$(function(){
    $(document).on('click', '.edit', function(e){
        e.preventDefault();
        $('#edit').modal('show');
        var id = $(this).data('id');
        getRow(id);
    });

    $(document).on('click', '.delete', function(e){
        e.preventDefault();
        $('#delete').modal('show');
        var id = $(this).data('id');
        getRow(id);
    });

});

function getRow(id){
    $.ajax({
        type: 'POST',
        url: 'positions_row.php',
        data: {id:id},
        dataType: 'json',
        success: function(response){
            $('.id').val(response.id);
            $('#edit_description').val(response.description);
            $('#edit_max_vote').val(response.max_vote);
            $('.description').html(response.description);
        }
    });
}
</script>

<style>
/* Glassmorphism Style */
.glass-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
    transition: 0.3s ease-in-out;
}
.glass-card:hover {
    transform: translateY(-5px);
}

/* Table Design */
.table-dark {
    background: rgba(0, 0, 0, 0.6);
}
.table-hover tbody tr:hover {
    background: rgba(255, 255, 255, 0.1);
    transition: 0.3s ease-in-out;
}

/* Buttons */
.btn-curve {
    border-radius: 8px;
    font-size: 14px;
}
.btn-primary {
    background: #4682B4;
    border: none;
    transition: 0.3s ease-in-out;
}
.btn-primary:hover {
    background: #366093;
}
.btn-success {
    background: #5F9F77;
    border: none;
    transition: 0.3s ease-in-out;
}
.btn-danger {
    background: #FF6B6B;
    border: none;
    transition: 0.3s ease-in-out;
}
.btn-light {
    background: rgba(255, 255, 255, 0.2);
    color: white;
}
.btn-light:hover {
    background: rgba(255, 255, 255, 0.4);
}

/* Close Button */
.btn-close {
    background: rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    transition: 0.3s ease-in-out;
}
.btn-close:hover {
    background: rgba(255, 255, 255, 0.5);
}

/* Responsive */
@media (max-width: 992px) {
    .glass-card {
        height: auto;
        padding: 15px;
    }
}
</style>
</body>
</html>
