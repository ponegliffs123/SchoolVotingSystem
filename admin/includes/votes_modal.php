<!-- Reset Modal -->
<div class="modal fade" id="reset" tabindex="-1" aria-labelledby="resetLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content glass-modal">
            <div class="modal-header text-center">
                <h4 class="modal-title fw-bold"><i class="fa fa-exclamation-triangle"></i> Reset Votes</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="text-danger fw-bold">⚠ This action will permanently delete all votes!</p>
                <h5 class="fw-bold">Are you sure you want to reset all votes to 0?</h5>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <!-- Fix: Added correct Bootstrap modal dismiss functionality -->
                <button type="button" class="btn btn-light btn-curve" data-bs-dismiss="modal">
                    <i class="fa fa-close"></i> Cancel
                </button>
                <a href="votes_reset.php" class="btn btn-danger btn-curve">
                    <i class="fa fa-refresh"></i> Confirm Reset
                </a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<style>
/* Glassmorphism Modal */
.glass-modal {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    border-radius: 12px;
    color: white;
    box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
    padding: 15px;
}

/* Modal Buttons */
.modal-footer .btn {
    font-weight: bold;
    transition: all 0.3s ease-in-out;
    border-radius: 8px;
}

.modal-footer .btn:hover {
    transform: scale(1.05);
}
</style>

<script>
// Ensure Bootstrap is properly initialized
document.addEventListener("DOMContentLoaded", function() {
    let resetModal = document.getElementById('reset');
    let modalInstance = new bootstrap.Modal(resetModal);
    
    // Fix: Ensure manual closing via JavaScript in case Bootstrap fails
    document.querySelectorAll('[data-bs-dismiss="modal"]').forEach(button => {
        button.addEventListener("click", function() {
            modalInstance.hide();
        });
    });
});
</script>
