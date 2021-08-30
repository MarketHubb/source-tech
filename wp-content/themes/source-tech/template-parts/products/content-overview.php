<?php $query_params = get_query_var('query_params'); ?>

<div class="container">
    <div class="wrapper">
        <div class="row content  justify-content-between">
            <div class="col-md-6">

                <div id="model-page-image-container">
                    <?php
                    $post_type_for_acf = get_query_var('post_type_for_acf');
                    $images_repeater_field = 'post_'. $post_type_for_acf . '_images';
                    $images_sub_field = 'post_'. $post_type_for_acf . '_images_image';

                    if (have_rows($images_repeater_field)):
                        $i = 1;
                        $images = '<div class="row image-thumb-container">';
                        while (have_rows($images_repeater_field)) : the_row();
                            if ($i === 1) {
                                $image_class = ' active';
                                $load_image = '<img src="' . get_sub_field($images_sub_field) . '" class="model-page-featured-image" />';
                            } else {
                                $image_class = ' ';
                            }
                            $images .= '<div class="col-4 col-sm-4 col-md-4 thumb-images' . $image_class . '">';
                            $images .= '<img src="' . get_sub_field($images_sub_field) . '" class="img-thumbnail rounded" />';
                            $images .= '</div>';

                            $i++;
                        endwhile;
                        $images .= '</div>';
                    endif;

                    echo $load_image;
                    echo $images;
                    ?>
                </div>
            </div>

            <!-- Description / Order (Right) -->
            <div class="col-md-5">


                <?php if (is_single(3226)) { ?>

                    <h2>HPE P10471-001 3.2TB NVMe x4 lanes MU (2.5-inch, Refurbished)</h2>
                    <p class="lead"><?php echo get_field('post_servers_description'); ?></p>
                    <hr>

                    <div class="mb-2">
                        <p class="mb-0 d-inline-block"><strong>Part:</strong> P10224-B21
                            <span class="px-1">|</span></p>
                        <p class="mb-0 d-inline"><strong>SKU:</strong> P10471-001
                            <span class="px-1">|</span></p>
                        <p class="mb-0 d-inline"><strong>Condition:</strong> Refurbished</p>
                    </div>

                    <div class="product-highlight bg-transparent-blue rounded my-4 px-4 py-2">
                        <p class="lead fw-600 text-secondary text-decoration-line-through mb-0">Price: $1,500.00/unit</p>
                        <p class="lead fw-bold text-danger fs-1 mb-1">$1,195.00 <span class="fs-5">(Save $305)</span></p>
                        <p class="fw-600 mb-0 d-inline-block">3-Year Warranty + Free Domestic Shipping</p>
                    </div>

                    <div class="mt-3 mb-1">
                    <?php echo return_product_single_button($post->ID, 'Talk to Our Sales Team'); ?>
                    </div>

                    <p class="small fst-italic"><i class="fa-light fa-circle-info pe-1"></i>Units in-stock & ready to ship </p>

                <?php } ?>

                <?php if (is_singular('servers') || is_singular('networking')) { ?>

                    <?php
                    $button_copy = array(
                        'Get Sale Pricing',
                        'Get Discounted Pricing Now',
                        'Get a Custom Quote',
                        'Get a Quote Now'
                    );
                    ?>
                    <h2></h2>
                    <p class="lead"><?php echo get_field('post_servers_description'); ?></p>
                    <hr>

                    <div class="mb-2">
                        <p class="mb-0 d-inline-block"><strong>Availability:</strong> In-stock
                            <span class="px-1">|</span></p>
<!--                        <p class="mb-0 d-inline"><strong>SKU:</strong> P10471-001-->
<!--                            <span class="px-1">|</span></p>-->
                        <p class="mb-0 d-inline"><strong>Condition:</strong> Refurbished</p>
                    </div>

                    <div class="product-highlight bg-transparent-blue rounded my-4 px-4 py-2">
                        <p class="lead fw-600 text-secondary text-decoration-line-through mb-0">30% Off <?php the_title(); ?></p>
                        <p class="lead fw-bold text-danger fs-1 mb-1">Up to 60% Off <span class="fs-5">(This week only)</span></p>
                        <p class="fw-600 mb-0 d-inline-block">2-Year Warranty + Free Domestic Shipping</p>
                    </div>


                     <!-- Order Your Way -->
<!--                        <div class="row">-->
<!--                            <div class="col-md-12">-->
<!--                                <h2 class=" mb-0 font-weight-bold">Upgrade your server</h2>-->
<!--                                <p class="lead mb-3">Save 30% + free 24-month warranty</p>-->
<!--                            </div>-->
<!---->
<!--                            <div class="col-md-6"> <p><i class="fa-solid fa-microchip text-blue pr-1"></i> Intel Xeon CPU</p></div>-->
<!--                            <div class="col-md-6"> <p><i class="fa-solid fa-memory text-blue pr-1"></i> RAM</p></div>-->
<!--                            <div class="col-md-6"> <p><i class="fa-solid fa-hard-drive text-blue pr-1"></i> SSD & HDD</p></div>-->
<!--                            <div class="col-md-6"> <p><i class="fa-solid fa-router text-blue pr-1"></i> Network Adaptors</p></div>-->
<!--                        </div>-->

                        <div class="mt-3 mb-1">
                            <?php echo return_product_single_button($post->ID, 'Get Sale Pricing'); ?>
                        </div>

                        <p class="small fst-italic"><i class="fa-light fa-circle-info pe-1"></i>In-stock & ready to ship </p>

                    </div>


                    <?php
                    if (get_field('post_servers_description_lead')) {
                        $description_lead = get_field('post_servers_description_lead');
                    } else {
                        $description_lead = 'Product Overview';
                    }
                    $description = 'post_' . $post_type_for_acf . '_description';
                    ?>

    <!--                <p class="mb-0 text-black">--><?php //echo get_field($description); ?><!--</p>-->

                    <?php if (!isset($query_params) || empty($query_params)) { ?>

    <!--                    <button type="button" class="btn btn-primary bg-orange cta-btn mt-4" data-toggle="modal" data-target="#quoteModal" data-product="--><?php //the_title(); ?><!--">Request a Quote <i class="fas fa-long-arrow-right pl-2"></i></button>-->

                    <?php } ?>

                <?php } ?>

                </div>
        </div>
    </div>
</div>
