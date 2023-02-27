<div class="card">
    <div class="card-header bg-grey-blue border-blue-light text-center py-3">
        <h5 class="my-1 text-center text-blue-800">Configure the <?php the_title(); ?> to Order</h5>
        <p class="mb-0">Too many options, or just need help?
        <a href="" class="fw-normal"
           data-bs-toggle="modal"
           data-bs-target="#customModal"
           data-product="<?php echo get_the_title(); ?>">
            Contact our team
        </a>
        </p>
    </div>
    <div class="card-body bg-grey-blue-lightest p-1 p-md-4 border-blue-light">
        <?php echo return_formatted_component_options($post->ID); ?>
        <?php echo return_mobile_formatted_component_options($post->ID); ?>
    </div>
</div>

