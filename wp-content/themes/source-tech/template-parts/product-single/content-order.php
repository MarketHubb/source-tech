<div class="bg-grey-blue-light py-5 mb-4">
    <div class="container bg-white rounded p-md-5 pt-1 shadow-lg rounded">

        <!-- Title & Image Gallery -->
        <div class="row justify-content-between align-items-start pb-4 pt-3">
            <div class="col-md-5">
                <?php get_template_part('template-parts/product-single/content', 'title'); ?>
            </div>

            <div class="col-md-6">
                <?php get_template_part('template-parts/product-single/content', 'image-container'); ?>
            </div>
        </div>

        <!-- Config Inputs + Order Summary + Why SourceTech -->

        <div class="row justify-content-between align-items-start mb-5 pb-4 pt-3">

            <div class="col-md-5 ps-md-4  sticky-top order-md-2">
                <?php get_template_part('template-parts/product-single/content', 'order-summary'); ?>
                <?php get_template_part('template-parts/product-single/content', 'callouts'); ?>
            </div>

            <div class="col-md-7 order-md-1">
                <?php get_template_part('template-parts/product-single/content', 'custom-inputs'); ?>
            </div>

        </div>

    </div>
</div>
