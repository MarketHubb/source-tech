<?php
$tags = get_query_var('tags');
$title = ($post->post_type == 'servers') ? get_the_title() . ' Server' : get_the_title();
?>


    <div class="row justify-content-between my-4 pt-3">

        <div class="col-md-6">

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
            //echo $tag_items;
            ?>

            <h1 class="mt-3 fw-800 letter-tight"><?php echo $title; ?></h1>

            <div class="mb-3 product-subtitle">

                <?php if( !have_rows('configurations')) { ?>

                    <?php if (is_singular('storage')) { ?>
                        <?php $warranty = is_single(3226) ? '3-Year Warranty' : '24-Month Warranty'; ?>
                            <p class="text-secondary mb-4">
                                <span><i class="fa-regular fa-check text-success me-2"></i>Factory Sealed</span>
                                <span class="ps-4"><i class="fa-regular fa-check text-success me-2"></i><?php echo $warranty; ?></span>
                                <span class="ps-4"><i class="fa-regular fa-check text-success me-2"></i>Free Ground Shipping</span>
                            </p>
                    <?php } ?>

                    <?php if (is_singular('servers') || is_singular('networking')) { ?>
                        <p class="icon-subtitle lead d-inline-block"><i class="fa-light fa-server me-1 text-blue"></i> Refurbished Servers</p>
                        <p class="icon-subtitle lead d-inline-block ms-3"><i class="fa-solid fa-check me-1 text-blue"></i> In-stock & ready to ship</p>                    <?php } ?>

                <?php } else { ?>
                    <p class="lead d-inline-block"><i class="fa-light fa-server me-1 text-blue"></i> Refurbished Servers</p>
                    <p class="lead d-inline-block ms-3"><i class="fa-solid fa-check me-1 text-blue"></i> In-stock & ready to ship</p>
                <?php }  ?>

            </div>

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
