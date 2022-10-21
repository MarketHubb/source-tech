<div class="d-flex flex-row justify-content-between">
    <div class="accordion accordion-flush my-3" id="accordionFlushExample">
    <div class="accordion-item bg-transparent">
        <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button bg-transparent collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Order Summary
            </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <div class="order-type-container" id="custom-config">
                    <p class="fw-bold ps-2 mb-1">Your configuration:</p>
                    <table class="table table-light" id="summary-table">
                        <tbody>
                            <?php echo return_summary_component_list($post->ID); ?>
                        </tbody>
                    </table>
                </div>
             </div>
        </div>
    </div>
</div>
    <div>
        <span><a href="">Need help?</a></span>
    </div>
</div>



