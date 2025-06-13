<!-- Description Modal -->
<div class="modal fade" id="platform">
    <div class="modal-dialog">
        <div class="modal-content glass-modal">
            <div class="modal-header">
              <button type="button" class="btn-close btn-curve" data-bs-dismiss="modal"></button>
              <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
                <p id="desc"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light btn-curve" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Candidate Modal -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content glass-modal">
            <div class="modal-header">
              <button type="button" class="btn-close btn-curve" data-bs-dismiss="modal"></button>
              <h4 class="modal-title"><b>Add New Candidate</b></h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="candidates_add.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
                <div class="form-group">
                    <label for="position">Position</label>
                    <select class="form-control" id="position" name="position" required>
                        <option value="" selected>- Select -</option>
                        <?php
                          $sql = "SELECT * FROM positions";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_assoc()){
                            echo "<option value='".$row['id']."'>".$row['description']."</option>";
                          }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" id="photo" name="photo">
                </div>
                <div class="form-group">
                    <label for="platform">Platform</label>
                    <textarea class="form-control" id="platform" name="platform" rows="5"></textarea>
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

<!-- Edit Candidate Modal -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content glass-modal">
            <div class="modal-header">
              <button type="button" class="btn-close btn-curve" data-bs-dismiss="modal"></button>
              <h4 class="modal-title"><b>Edit Candidate</b></h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="candidates_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="edit_firstname">Firstname</label>
                    <input type="text" class="form-control" id="edit_firstname" name="firstname" required>
                </div>
                <div class="form-group">
                    <label for="edit_lastname">Lastname</label>
                    <input type="text" class="form-control" id="edit_lastname" name="lastname" required>
                </div>
                <div class="form-group">
                    <label for="edit_position">Position</label>
                    <select class="form-control" id="edit_position" name="position" required>
                        <option value="" selected id="posselect"></option>
                        <?php
                          $sql = "SELECT * FROM positions";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_assoc()){
                            echo "<option value='".$row['id']."'>".$row['description']."</option>";
                          }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit_platform">Platform</label>
                    <textarea class="form-control" id="edit_platform" name="platform" rows="5"></textarea>
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

<!-- Delete Candidate Modal -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content glass-modal">
            <div class="modal-header">
              <button type="button" class="btn-close btn-curve" data-bs-dismiss="modal"></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body text-center">
              <form method="POST" action="candidates_delete.php">
                <input type="hidden" class="id" name="id">
                <p>Are you sure you want to delete this candidate?</p>
                <h2 class="bold fullname"></h2>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light btn-curve" data-bs-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
              <button type="submit" class="btn btn-danger btn-curve" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styling -->
<style>
.glass-modal {
    background: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(15px);
    border-radius: 12px;
    padding: 20px;
    color: white;
    transition: 0.3s ease-in-out;
    box-shadow: 0 4px 10px rgba(255, 255, 255, 0.2);
}
.btn-curve {
    border-radius: 8px;
    font-size: 14px;
}
.btn-light {
    background: rgba(255, 255, 255, 0.2);
    color: white;
}
.btn-light:hover {
    background: rgba(255, 255, 255, 0.4);
}
</style>
