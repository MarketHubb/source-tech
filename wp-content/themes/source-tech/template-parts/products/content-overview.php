<?php $query_params = get_query_var('query_params'); ?>

<div class="container">
    <div class="wrapper">
        <div class="row content align-items-center justify-content-between">
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
            <div class="col-md-5">

                <?php

                $button_copy = array(
                    'Request a Quote',
                    'Get Sale Pricing',
                    'Get Discounted Pricing Now',
                    'Get a Custom Quote',
                    'Get a Quote in Minutes'
                );
                $button = '<button type="button" class="btn btn-primary bg-orange cta-btn mt-3 mb-2" data-toggle="modal" data-target="#quoteModal" data-product="';
                $button .= get_the_title() . '">' . $button_copy[array_rand($button_copy)] . '<i class="fas fa-long-arrow-right pl-2"></i></button>';

//                if (isset($query_params) && !empty($query_params)) {

//                    $callout = $query_params['c'] === 'warranty' ? 'free 24-month warranty' : 'free domestic shipping';
                    $savings = 'Save up to 60%';
                    $callout = 'free 24-month warranty';

                    $q  = '<div class="query_cta_container">';
                    $q .= '<h4 class="text-orange font-weight-bold mb-0 pb-0">Huge Clearance Sale!</h4>';
                    $q .= '<p class="lead text-black font-weight-normal mb-0 pb-0">';
                    $q .= $savings . ' + ' . $callout;
                    $q .= ' on all ' . get_the_title() . ' ' . get_post_type($post->ID) . '</p>';
                    $q .= $button;
                    $q .= '</div>';

                    echo $q;
//              m  }
                ?>


                <?php
                if (get_field('post_servers_description_lead')) {
                    $description_lead = get_field('post_servers_description_lead');
                } else {
                    $description_lead = 'Product Overview';
                }
                $description = 'post_' . $post_type_for_acf . '_description';
                ?>

                <p class="mb-0 text-black"><?php echo get_field($description); ?></p>

                <?php if (!isset($query_params) || empty($query_params)) { ?>

<!--                    <button type="button" class="btn btn-primary bg-orange cta-btn mt-4" data-toggle="modal" data-target="#quoteModal" data-product="--><?php //the_title(); ?><!--">Request a Quote <i class="fas fa-long-arrow-right pl-2"></i></button>-->

                <?php } ?>

            </div>
        </div>
    </div>
</div>