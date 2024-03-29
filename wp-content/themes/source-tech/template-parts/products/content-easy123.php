 <?php
 $post_type_for_acf = get_query_var('post_type_for_acf');
 $repeater_field = 'global_' . $post_type_for_acf . '_how_it_works';

    if( have_rows($repeater_field, 'option') ):
        $how = get_background_banner_image_start('row content', get_field('global_server_how_background_image', 'option'), .75);
        $how .= '<div class="container">';
        $how .= '<div class="row justify-content-center">';
        $how .= '<div class="col-md-9 text-center mb-4 mt-1">';
        $how .= '<h2 class="text-white">Ordering Made Simple</h2>';
        $how .= '<p class="text-white">More contact options, same-day quotes and insanely fast turn-around times.</p>';
        $how .= '</div></div>';
        $how .= '<div class="row row-eq-height mb-2">';

        while ( have_rows($repeater_field, 'option') ) : the_row();
            $heading_field = 'global_' . $post_type_for_acf . '_how_it_works_heading';
            $icon_field = 'global_' . $post_type_for_acf . '_how_it_works_icon';
            $description_field = 'global_' . $post_type_for_acf . '_how_it_works_description';
            $description = replace_product_variable_in_string(get_sub_field($description_field, 'option'), $post->ID);

            $how .= '<div class="col col-md-4 mt-3 mt-md-0 text-center">';
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
