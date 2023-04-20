<?php
$custom_config = get_query_var('custom_config');
// No Config (Only Quote)
if (!$custom_config) {
    $heading = "Configuration Specs";
    $subheading = "For the " . get_the_title() . " Server.";
    $link = "Request a quote";
} else {
    $heading = "Custom configure your " . get_the_title();
    $subheading = "Need help with your order?";
    $subheading_mobile = "Need help?";
    $link = "Our support team is available";
}
?>
<div class="card">
    <div class="card-header bg-grey-blue border-blue-light text-center py-3">
        <h5 class="my-1 text-center text-blue-800"><?php echo $heading; ?></h5>
        <p class="mb-0">
            <span class="d-none d-md-inline"><?php echo $subheading; ?></span>
            <span class="d-inline d-md-none"><?php echo $subheading_mobile; ?></span>
        <a href="" class="fw-normal"
           data-bs-toggle="modal"
           data-bs-target="#customModal"
           data-product="<?php echo get_the_title(); ?>">
        <?php echo $link; ?>
        </a>
        </p>
    </div>
    <div class="card-body bg-grey-blue-lightest p-1 p-md-4 border-blue-light" id="custom-config-inputs">
        <?php
        if (!$custom_config) {
            get_template_part('template-parts/product-single/content', 'specs-table');
        } else {
            echo return_formatted_component_options(get_the_ID());
        }
        ?>


    </div>
</div>

