<?php
$post_type_for_acf = get_query_var('post_type_for_acf');
$images_repeater_field = 'post_'. $post_type_for_acf . '_images';
$images_sub_field = 'post_'. $post_type_for_acf . '_images_image';
?>
<div class="row align-items-center mt-4 mb-2 mb-md-5">

    <div class="col-md-12">

        <!-- Featured-->
        <?php $first_image = get_repeater_field_row($images_repeater_field, 1, $args['image_gallery_sub_field'], $post->ID); ?>
        <div class="rounded bg-white text-center">
            <img class="model-page-featured-image w-100" src="<?php echo $first_image; ?>" alt="">
        </div>

        <!-- Thumbnails -->
        <?php
        if (have_rows($images_repeater_field)):
            $images_lg = '<ul class="d-none d-md-flex list-group flush no-border image-thumb-container text-center">';
            $images_sm = '<ul class="d-flex d-md-none ps-0 ms-0 mb-0 list-group-horizontal no-border image-thumb-container">';
            $images = '<ul class="d-flex ps-0 mt-2 mx-0  mx-md-5 mx-lg-5 text-center list-group-horizontal no-border image-thumb-container">';
            while (have_rows($images_repeater_field)) : the_row();
                $image_class = get_row_index() === 1 ? 'active' : '';
                $images .= '<li class="list-group-item ps-0 d-inline  flex-fill bg-transparent no-border ' . $image_class . '">';
                $images .= '<img src="' . get_sub_field($images_sub_field) . '" class="img-thumbnail rounded p-2" />';
                $images .= '</li>';
            endwhile;
            $images .= '</ul>';
        endif;
        echo $images;

        ?>

    </div>
</div>

<div id="foxy-form"></div>
