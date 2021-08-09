<?php $query_params = get_query_var('query_params'); ?>

<div class="container">
    <div class="wrapper">
        <div class="row content  justify-content-between">
            <div class="col-md-6">
                <div class="no"></div>
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
            <div class="col-md-5">

                <?php

                $button_copy = array(
                    'Get Sale Pricing',
                    'Get Discounted Pricing Now',
                    'Get a Custom Quote',
                    'Get a Quote Now'
                );
                $button = '<button type="button" class="btn btn-primary bg-orange cta-btn mt-3 mb-2" data-toggle="modal" data-target="#quoteModal" data-product="';
                $button .= get_the_title() . '">' . $button_copy[array_rand($button_copy)] . '<i class="fas fa-long-arrow-right pl-2"></i></button>';

                    $savings = 'Save 30%';
                    $callout = 'free 24-month warranty';

                    $q  = '<div class="query_cta_container">';
                    $q .= '<h4 class="text-orange font-weight-bold mb-0 pb-0">Huge ' . return_season_of_year() . ' Sale!</h4>';
                    $q .= '<p class="lead letter-tight text-black font-weight-normal mb-0 pb-0">';
                    $q .= '<strong>' . $savings . ' + ' . $callout . '</strong>';
//                    $q .= ' on all ' . get_the_title() . ' ' . get_post_type($post->ID) . '</p>';
                    $q .= '</p>';
                    $q .= $button;
                    $q .= '</div>';

                    echo $q;
                ?>

                <!-- Order Your Way -->
                <div class="order-type-container">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="lead mb-3 font-weight-bold">Order a refurbished <?php the_title(); ?></p>
                        </div>
                        <div class="col-md-12">
                            <p><i class="fa-solid fa-server text-blue"></i> Custom configured to order</p>
                            <p><i class="fa-solid fa-circle-info text-blue"></i> In-stock & ready to ship</p>
                            <p><i class="fa-solid fa-truck"></i> Free ground shipping</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="lead mb-3 font-weight-bold">Upgrade your existing server</p>
                        </div>

                        <div class="col-md-6"> <p><i class="fa-solid fa-microchip text-blue"></i> Intel CPU</p></div>
                        <div class="col-md-6"> <p><i class="fa-solid fa-memory text-blue"></i> RAM</p></div>
                        <div class="col-md-6"> <p><i class="fa-solid fa-hard-drive text-blue"></i> SSD & HDD</p></div>
                        <div class="col-md-6"> <p><i class="fa-solid fa-router text-blue"></i> Network Adaptors</p></div>
                    </div>

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

            </div>
        </div>
    </div>
</div>