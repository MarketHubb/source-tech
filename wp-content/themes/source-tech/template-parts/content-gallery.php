<div class="row align-items-center mt-4 mt-md-5">
    <div class="col-md-2">
        <?php
        $post_type_for_acf = get_query_var('post_type_for_acf');
        $images_repeater_field = 'post_'. $post_type_for_acf . '_images';
        $images_sub_field = 'post_'. $post_type_for_acf . '_images_image';
        if (have_rows($images_repeater_field)):
            $images_lg = '<ul class="d-none d-md-flex list-group flush no-border image-thumb-container">';
            $images_sm = '<ul class="d-flex d-md-none ps-0 ms-0 mb-0 list-group-horizontal no-border image-thumb-container">';
            while (have_rows($images_repeater_field)) : the_row();
                $image_class = get_row_index() === 1 ? 'active' : '';
                $images .= '<li class="list-group-item px-sm-1 d-inline  bg-transparent flex-fill no-border ' . $image_class . '">';
                $images .= '<img src="' . get_sub_field($images_sub_field) . '" class="img-thumbnail rounded p-2" />';
                $images .= '</li>';
            endwhile;
            $images_lg .= $images;
            $images_lg .= '</ul>';
            $images_sm .= $images;
            $images_sm .= '</ul>';
        endif;
        echo $images_lg;
        echo $images_sm;
        ?>
    </div>
    <div class="col-md-10 text-center">
        <?php $first_image = get_repeater_field_row($images_repeater_field, 1, $args['image_gallery_sub_field'], $post->ID); ?>
        <img class="model-page-featured-image" src="<?php echo $first_image; ?>" alt="">
    </div>
</div>