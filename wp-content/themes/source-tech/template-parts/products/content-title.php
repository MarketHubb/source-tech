<?php
$tags = get_query_var('tags');
$title = ($post->post_type == 'servers') ? get_the_title() . ' Server' : get_the_title();
?>

<!-- Product Title -->

<div class="container">
    <div class="wrapper">
        <div class="row mt-4 pt-3">
            <div class="col-md-8">
                <?php
                $tag_items = '';
                foreach ($tags as $tag => $value) {
                    if ($tag != 'title' && $tag != 'product') {
                        if ($value == 'HP') {
                            $value = 'HPE';
                        }
                        $tag_items .= '<span class="badge badge-pill badge-primary model-page-tags">' . $value . '</span>';
                    }
                }
                echo $tag_items;
                ?>
                <h1 class="mt-1 mb-2 display-4"><?php echo $title; ?></h1>
                <p class="lead product-subtitle mb-0">

                    <?php if (is_singular('storage')) { ?>
                        <?php $warranty = is_single(3226) ? '3-Year Warranty' : '24-Month Warranty'; ?>
                        <span>Factory Sealed</span>
                        <span><?php echo $warranty; ?></span>
                        <span>Free Domestic Shipping</span>
                    <?php } ?>

                    <?php if (is_singular('servers') || is_singular('networking')) { ?>
                        <span>Factory Tested</span>
                        <span>Configured to Order</span>
                        <span>24-Month Warranty</span>
                    <?php } ?>

                </p>

            </div>
<!--            <div class="col-md-4">-->
                <?php

                $button_copy = array(
                    'Get Sale Pricing',
                    'Get Discounted Pricing Now',
                    'Get a Custom Quote',
                    'Get a Quote Now'
                );
//                $button = '<button type="button" class="btn btn-primary bg-orange cta-btn mt-3 mb-2" data-toggle="modal" data-target="#quoteModal" data-product="';
//                $button .= get_the_title() . '">' . $button_copy[array_rand($button_copy)] . '<i class="fas fa-long-arrow-right pl-2"></i></button>';
//
//                $savings = 'Save 30%';
//                $callout = 'free 24-month warranty';
//
//                $q  = '<div class="query_cta_container bg-light-blue text-center shadow-sm">';
//                $q .= '<h4 class="text-orange font-weight-bold mb-0 pb-1"><i class="fa-solid fa-bullhorn fa-flip-horizontal"></i> <span class="px-3">Our Biggest Sale Ever</span> <i class="fa-solid fa-bullhorn"></i></h4>';
//                $q .= '<p class="lead letter-tight text-black font-weight-normal mb-0 pb-0">';
//                $q .= '<strong>' . $savings . ' + ' . $callout . '</strong>';
//                $q .= ' on ' . get_the_title() . ' ' . get_post_type($post->ID) . '</p>';
//                $q .= '</p>';
//                $q .= '</div>';
//                echo $q;
                ?>
<!--            </div>-->
        </div>
    </div>
</div>