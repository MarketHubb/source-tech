 <?php
    $repeater_field = 'global_' . get_post_type() . '_how_it_works';

    if( have_rows($repeater_field, 'option') ):
        $how = get_background_banner_image_start('row content', get_field('global_server_how_background_image', 'option'), .75);
        $how .= '<div class="container">';
        $how .= '<div class="row justify-content-center">';
        $how .= '<div class="col-md-9 text-center mb-4 mt-1">';
        $how .= '<h2 class="text-white">Getting the lowest price on a ' .  get_the_title(). ' has never been easier</h2>';
        $how .= '</div></div>';
        $how .= '<div class="row row-eq-height mb-2">';

        while ( have_rows($repeater_field, 'option') ) : the_row();
            $heading_field = 'global_' . get_post_type() . '_how_it_works_heading';
            $icon_field = 'global_' . get_post_type() . '_how_it_works_icon';
            $description_field = 'global_' . get_post_type() . '_how_it_works_description';
            $description = replace_product_variable_in_string(get_sub_field($description_field, 'option'), $post->ID);

            $how .= '<div class="col col-md-4 col-lg-4 text-center">';
            $how .= '<div class="h-100 panel shadow blue-top bg-white">';
            $how .= '<i class="' . get_sub_field($icon_field, 'option') . ' fa-2x text-blue"></i>';
            $how .= '<p class="lead font-weight-bold">' . get_row_index() . '. ' . get_sub_field($heading_field, 'option') . '</p>';
            $how .= '<p class="mb-1">' . $description . '</p>';
            $how .= '</div>';
            $how .= '</div>';
        endwhile;
        $how .= '</div></div></div>';
    endif;

    echo $how;


    ?>
