<!-- Modal -->
<div class="modal fade" id="validationModal" tabindex="-1" aria-labelledby="validationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <p class="modal-title fw-600" id="validationModalLabel">
                    <i class="fa-solid fa-triangle-exclamation pe-3"></i>We need to fix a few things</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" style="background-color: #fffbf0;">

                <div class="validate-drives alert alert-warning mb-3 fw-600 shadow-sm d-none">
                </div>

                <div class="validate-pci alert alert-warning mb-3 fw-600 shadow-sm d-none">
                </div>

                <div class="validate-selections alert alert-warning mb-4 d-none fw-600 shadow-sm">
                    Make selections for the following before proceeding:
                    <ul class="list-group list-group-flush ms-0 mt-2 unvalidated-list">
                    </ul>
            </div>
        </div>
    </div>
</div>