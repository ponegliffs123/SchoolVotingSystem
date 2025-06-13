<!-- Add New Voter -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content glass-modal">
            <div class="modal-header">
              <button type="button" class="btn-close btn-curve" data-bs-dismiss="modal" aria-label="Close"></button>
              <h4 class="modal-title"><b>Add New Voter</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_add.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" id="photo" name="photo">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light btn-curve" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-curve" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Voter -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content glass-modal">
            <div class="modal-header">
              <button type="button" class="btn-close btn-curve" data-bs-dismiss="modal" aria-label="Close"></button>
              <h4 class="modal-title"><b>Edit Voter</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="edit_firstname">Firstname</label>
                    <input type="text" class="form-control" id="edit_firstname" name="firstname">
                </div>
                <div class="form-group">
                    <label for="edit_lastname">Lastname</label>
                    <input type="text" class="form-control" id="edit_lastname" name="lastname">
                </div>
                <div class="form-group">
                    <label for="edit_password">Password</label>
                    <input type="password" class="form-control" id="edit_password" name="password">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light btn-curve" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-curve" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Voter -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content glass-modal">
            <div class="modal-header">
              <button type="button" class="btn-close btn-curve" data-bs-dismiss="modal" aria-label="Close"></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body text-center">
              <form class="form-horizontal" method="POST" action="voters_delete.php">
                <input type="hidden" class="id" name="id">
                <p>DELETE VOTER</p>
                <h2 class="bold fullname"></h2>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light btn-curve" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-curve" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Voter Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content glass-modal">
            <div class="modal-header">
              <button type="button" class="btn-close btn-curve" data-bs-dismiss="modal" aria-label="Close"></button>
              <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="photo">Upload New Photo</label>
                    <input type="file" id="photo" name="photo" required>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light btn-curve" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-curve" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

<style>
/* Glassmorphism Modals */
.glass-modal {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    border-radius: 12px;
    padding: 20px;
    color: white;
    transition: 0.3s ease-in-out;
    box-shadow: 0 4px 10px rgba(255, 255, 255, 0.2);
}

/* Input Fields */
.form-control {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    border: none;
    padding: 10px;
    border-radius: 8px;
}
.form-control::placeholder {
    color: rgba(255, 255, 255, 0.8);
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
</style>
