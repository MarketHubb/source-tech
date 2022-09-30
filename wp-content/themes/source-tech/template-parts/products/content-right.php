<?php
$query_params = get_query_var('query_params');
?>

    <!-- Right Panel -->
    <div class="col-md-5">

        <nav class="nav">
            <a class="nav-link active" aria-current="page" href="#">Build Your Own</a>
            <a class="nav-link" href="#">Browse Pre-configured</a>
            <a class="nav-link" href="#">Product Specs</a>
        </nav>
        
            <?php if (get_field('use') && get_field('pre_configured')) { ?>

            <div class="row justify-content-evenly align-items-end order-type mb-3">
                <div class="col-md-6 order-tab text-center active border-end border-1" data-type="custom-config">
                    <img class="mb-2 tab-icon" src="<?php echo home_url() . '/wp-content/uploads/2022/08/CC.svg'; ?>" alt="">
                    <p class="fw-bold mb-0">Custom Configure</p>
                </div>
                <div class="col-md-6 order-tab text-center" data-type="pre-config">
                    <img class="mb-2 tab-icon" src="<?php echo home_url() . '/wp-content/uploads/2022/08/Pre-Con.svg'; ?>" alt="">
                    <p class="fw-bold mb-0">Pre-Configured</p>
                </div>
            </div>

            <?php } ?>

            <div class="order-types">

            <?php if (get_field('enable_custom')) { ?>

                <?php get_template_part('template-parts/products/content', 'summary'); ?>

            <?php } ?>

            <?php if (get_field('pre_configured')) { ?>

                <?php get_template_part('template-parts/products/content', 'preconfigured'); ?>

            <?php } ?>

            </div>
        
        </div> <!-- row mt-4 mb-5 pt-3 -->

</div> <!-- container-fluid -->


