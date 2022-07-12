<?php
$tags = get_query_var('tags');
$title = ($post->post_type == 'servers') ? get_the_title() . ' Server' : get_the_title();
?>

<div class="container-fluid">
    <div class="wrapper">
        <div class="row mt-4 mb-5 pt-3">

            <!-- Title & Image Gallery -->
            <div class="col-md-7">
                <?php
                $tag_items = '';
                foreach ($tags as $tag => $value) {
                    if ($tag != 'title' && $tag != 'product') {
                        if ($value == 'HP') {
                            $value = 'HPE';
                        }
                        $tag_items .= '<span class="badge rounded-pill bg-light border border-1 text-dark model-page-tags me-2">' . $value . '</span>';
                    }
                }
                ?>

                <div class="mb-2"><?php echo $tag_items; ?></div>
                <h1 class="mt-3 fw-800 letter-tight lh-1"><?php echo $title; ?></h1>
                <div class="mb-3 product-subtitle">

                    <!-- Configuration Options -->
                    <?php if( !have_rows('configurations')) { ?>

                        <?php if (is_singular('storage')) { ?>

                            <?php $warranty = is_single(3226) ? '3-Year Warranty' : '24-Month Warranty'; ?>
                                <p class="text-secondary mb-4">
                                    <span><i class="fa-regular fa-check text-success me-2"></i>Factory Sealed</span>
                                    <span class="ps-4"><i class="fa-regular fa-check text-success me-2"></i><?php echo $warranty; ?></span>
                                    <span class="ps-4"><i class="fa-regular fa-check text-success me-2"></i>Free Ground Shipping</span>
                                </p>

                        <?php } ?>

                    <!-- No Configuration Options -->
                    <?php } else { ?>
    <!--                    <p class="lead d-inline-block"><i class="fa-light fa-server me-1 text-blue"></i> Refurbished Servers</p>-->
    <!--                    <p class="lead d-inline-block"><i class="fa-solid fa-check me-1 text-success"></i> In-stock & ready to ship</p>-->
                    <?php }  ?>

                </div>

                <?php
                $args = ['image_gallery_sub_field' => 'post_servers_images_image'];
                get_template_part('template-parts/content', 'gallery', $args);
                ?>

                <?php get_template_part('template-parts/products/content', 'order-details'); ?>

                <?php get_template_part('template-parts/products/content', 'components'); ?>

    </div>
