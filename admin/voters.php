<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body style="background: linear-gradient(135deg, #2E2E2E, #7AC87B); font-family: 'Poppins', sans-serif; color: white;">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper -->
  <div class="content-wrapper" style="background: transparent;">
    <section class="content-header text-white text-center">
      <h1 class="fw-bold">🗳 Voters List</h1>
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
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-curve w-100" 
                 style="background: #4682B4; color: white; font-size: 14px;">
                <i class="fa fa-plus"></i> Add New Voter
              </a>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-hover text-center">
                <thead class="text-white">
                  <th>Lastname</th>
                  <th>Firstname</th>
                  <th>Photo</th>
                  <th>Voter ID</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM voters";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg';
                      echo "
                        <tr class='vote-row'>
                          <td>".$row['lastname']."</td>
                          <td>".$row['firstname']."</td>
                          <td>
                            <img src='".$image."' class='voter-img'>
                            <a href='#edit_photo' data-toggle='modal' class='photo' data-id='".$row['id']."'>
                              <i class='fa fa-edit'></i>
                            </a>
                          </td>
                          <td>".$row['voters_id']."</td>
                          <td>
                            <button class='btn btn-success btn-sm edit btn-curve' data-id='".$row['id']."' >
                              <i class='fa fa-edit'></i> Edit
                            </button>
                            <button class='btn btn-danger btn-sm delete btn-curve' data-id='".$row['id']."'>
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
  <?php include 'includes/voters_modal.php'; ?>
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

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'voters_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.id);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_password').val(response.password);
      $('.fullname').html(response.firstname+' '+response.lastname);
    }
  });
}
</script>

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

/* Voter Image */
.voter-img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid rgba(255, 255, 255, 0.3);
    transition: 0.3s ease-in-out;
}
.voter-img:hover {
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
.btn-success:hover {
    background: #4E8C68;
}
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
