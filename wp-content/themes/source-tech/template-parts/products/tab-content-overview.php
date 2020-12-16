<div class="tab-pane fade show active" id="server" role="tabpanel" aria-labelledby="specs-tab">
    <div class="row">
        <div class="col-12">
            <h2 class="section-heading model-page-tab-content-heading">Overview</h2>
            <?php
            $product_description_field = 'post_' . $post->post_type . '_description';
            $first_sentence_field = 'global_' . $post->post_type . '_first_sentence';
            if (!get_field($first_sentence_field, 'option')) {
                $global_overview_subtitle_field = 'global_' . $post->post_type . '_overview_subheading';
                $overview_subtitle = get_field($global_overview_subtitle_field, 'option');
            } else {
                $overview_subtitle = array_pop(array_reverse(explode('.', get_field($product_description_field))));
            }
            ?>
            <p class="model-page-tab-content-subheading"><?php echo $overview_subtitle; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-7 col-lg-6" id="model-page-image-container">
            <?php
            $images_repeater_field = 'post_' . $post->post_type . '_images';
            $images_sub_field = 'post_' . $post->post_type . '_images_image';

            if( have_rows($images_repeater_field) ):
                $i = 1;
                $images = '<div class="row image-thumb-container">';
                while ( have_rows($images_repeater_field) ) : the_row();
                    if ($i === 1) {
                        $image_class = ' active';
                        $load_image  = '<img src="' . get_sub_field($images_sub_field) . '" class="model-page-featured-image" />';
                    } else {
                        $image_class = ' ';
                    }
                    $images .= '<div class="col-4 col-sm-4 col-md-3 col-lg-3 thumb-images' . $image_class . '">';
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
        <div class="col-12 col-sm-12 col-md-5 col-lg-6">
            <div class="discount-container mb-4">
                <?php
                $sale_copy_field = 'global_' . $post->post_type . '_sale_callout';
                $sale_copy = replace_product_variable_in_string(get_field($sale_copy_field, 'option'), $post->ID);
                $sale_subtitle_field = 'global_' . $post->post_type . '_sale_subtitle';
                ?>
<!--                <p class="model-page-discount mb-2">--><?php //echo $sale_copy; ?><!--</p>-->
<!--                <p class="model-page-discount-sub">--><?php //the_field($sale_subtitle_field, 'option'); ?><!--</p>-->
            </div>
            <div class="panel shadow bt-blue">
                <p class="mt-3"><?php the_field($product_description_field); ?></p></div>
        </div>
    </div>
</div>