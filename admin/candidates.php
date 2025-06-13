<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body style="background: linear-gradient(135deg, #2E2E2E, #7AC87B); font-family: 'Poppins', sans-serif; color: white;">
<div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper" style="background: transparent;">
        <section class="content-header text-white text-center">
            <h1 class="fw-bold">🗳️ Candidates List</h1>
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
                            <h5 class="fw-bold mb-0">Registered Candidates</h5>
                            <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i> Add Candidate
                            </a>
                        </div>  
                        <div class="card-body">
                            <table id="example1" class="table table-hover text-white">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Position</th>
                                        <th>Photo</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Platform</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT *, candidates.id AS canid FROM candidates 
                                                LEFT JOIN positions ON positions.id=candidates.position_id 
                                                ORDER BY positions.priority ASC";
                                        $query = $conn->query($sql);
                                        while($row = $query->fetch_assoc()){
                                            $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg';
                                            echo "
                                            <tr>
                                                <td>".$row['description']."</td>
                                                <td>
                                                    <img src='".$image."' class='candidate-img'>
                                                    <a href='#edit_photo' data-toggle='modal' class='photo' data-id='".$row['canid']."'>
                                                        <i class='fa fa-edit'></i>
                                                    </a>
                                                </td>
                                                <td>".$row['firstname']."</td>
                                                <td>".$row['lastname']."</td>
                                                <td>
                                                    <a href='#platform' data-toggle='modal' class='btn btn-info btn-sm platform' data-id='".$row['canid']."'>
                                                        <i class='fa fa-search'></i> View
                                                    </a>
                                                </td>
                                                <td>
                                                    <button class='btn btn-success btn-sm edit' data-id='".$row['canid']."'>
                                                        <i class='fa fa-edit'></i> Edit
                                                    </button>
                                                    <button class='btn btn-danger btn-sm delete' data-id='".$row['canid']."'>
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
    <?php include 'includes/candidates_modal.php'; ?>
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

    $(document).on('click', '.photo', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        getRow(id);
    });

    $(document).on('click', '.platform', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        getRow(id);
    });

});

function getRow(id){
    $.ajax({
        type: 'POST',
        url: 'candidates_row.php',
        data: {id:id},
        dataType: 'json',
        success: function(response){
            $('.id').val(response.canid);
            $('#edit_firstname').val(response.firstname);
            $('#edit_lastname').val(response.lastname);
            $('#posselect').val(response.position_id).html(response.description);      
            $('#edit_platform').val(response.platform);
            $('.fullname').html(response.firstname+' '+response.lastname);
            $('#desc').html(response.platform);
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

/* Table Styling */
.table-dark {
    background: rgba(0, 0, 0, 0.6);
}
.table-hover tbody tr:hover {
    background: rgba(255, 255, 255, 0.1);
    transition: 0.3s ease-in-out;
}

/* Candidate Image */
.candidate-img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid rgba(255, 255, 255, 0.3);
    transition: 0.3s ease-in-out;
}
.candidate-img:hover {
    transform: scale(1.1);
    border-color: white;
}

/* Buttons */
.btn-success {
    background: #5F9F77;
    border: none;
    font-weight: bold;
    transition: 0.3s ease-in-out;
}
.btn-danger {
    background: #FF6B6B;
    border: none;
    font-weight: bold;
    transition: 0.3s ease-in-out;
}
.btn-primary {
    background: #4682B4;
    border: none;
    transition: 0.3s ease-in-out;
}
</style>

</body>
</html>
