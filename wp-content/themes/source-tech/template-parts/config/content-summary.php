<div class="accordion accordion-flush mt-4" id="accordionSummary">
        <div class="accordion-item summary-links bg-transparent">
            <div class="d-flex flex-row justify-content-between">
                <h2 class="accordion-header d-inline-block anti" id="summary-headingOne">
                    <button class="accordion-button bg-transparent collapsed p-0" type="button" data-bs-toggle="collapse" data-bs-target="#summary-collapseOne" aria-expanded="false" aria-controls="summary-collapseOne">
                        Order Summary
                    </button>
                </h2>
                <div class="summary-links">
                    <span>
                        <a href="" class="fw-normal text-secondary"
                           data-bs-toggle="modal"
                           data-bs-target="#customModal"
                           data-product="<?php echo get_the_title(); ?>">
                            Need help? <i class="fa-solid fa-circle-info"></i>
                        </a>
                    </span>
                </div>
            </div>
            <div id="summary-collapseOne" class="accordion-collapse collapse" aria-labelledby="summary-headingOne" data-bs-parent="#accordionSummary">
                <div class="accordion-body px-0">
                    <div class="order-type-container" id="custom-config">
                        <table class="table table-light p-5" id="summary-table">
                            <thead>
                            <tr class="">
                                <td class="ps-3">
                                    <p class="small fw-bold mb-1 text-secondary anti">Option</p>
                                </td>
                                <td>
                                    <p class="small fw-bold mb-1 text-secondary anti text-end">Total (Per unit)</p>
                                </td>
                            </tr>
                            </thead>
                            <tbody class="py-3">
                                 <?php echo return_summary_component_list($post->ID); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




