<div class="bg-grey-blue-light py-0 py-md-5 mb-4">
    <div class="container bg-white rounded p-md-5 pt-1 shadow-lg rounded">

        <!-- Title & Image Gallery -->
        <div class="row justify-content-between align-items-start pb-md-4 pt-3">
            <div class="col-md-5">
                <?php get_template_part('template-parts/product-single/content', 'title'); ?>
            </div>

            <div class="col-md-6">
                <?php get_template_part('template-parts/product-single/content', 'image-container'); ?>
            </div>
        </div>

        <!-- Config Inputs + Order Summary + Why SourceTech -->

        <div class="row justify-content-between align-items-start mb-5 pb-4">

            <div class="col-md-5 ps-md-4 mb-3 mb-md-0 sticky-top order-md-2 bg-white" id="order-summary-container">
                <?php
                get_template_part('template-parts/product-single/content', 'order-summary');
                get_template_part('template-parts/product-single/content', 'attributes');

                // Pre-config (desktop)
                if (have_rows('configurations')) {
                    get_template_part('template-parts/product-single/content', 'preconfig', 'd-none d-md-block');
                }
                ?>
            </div>

            <div class="col-md-7 order-md-1">
                <?php
                get_template_part('template-parts/product-single/content', 'custom-inputs');
                // Pre-config (mobile)
                if (have_rows('configurations')) {
                    get_template_part('template-parts/product-single/content', 'preconfig', 'd-block d-md-none');
                }
                ?>
            </div>

        </div>

    </div>
</div>
