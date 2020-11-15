<div class="row model-page-how-title">
    <div class="col col-md-12 col-lg-12">
        <h2 class="section-heading text-center mb-4">Getting the lowest price on a <?php the_title(); ?> has never been easier</h2>
    </div>
</div>
<div class="row row-eq-height model-page-how">
    <?php
    $repeater_field = 'global_' . get_post_type() . '_how_it_works';
    if( have_rows($repeater_field, 'option') ):
        $how = '';
        $i = 1;
        while ( have_rows($repeater_field, 'option') ) : the_row();
            $heading_field = 'global_' . get_post_type() . '_how_it_works_heading';
            $icon_field = 'global_' . get_post_type() . '_how_it_works_icon';
            $description_field = 'global_' . get_post_type() . '_how_it_works_description';
            $description = replace_product_variable_in_string(get_sub_field($description_field, 'option'), $post->ID);

            $how .= '<div class="col col-md-4 col-lg-4 text-center">';
            $how .= '<div class="h-100 panel shadow">';
            $how .= get_sub_field($icon_field, 'option');
            $how .= '<h3 class="section-heading">' . get_row_index() . '. ' . get_sub_field($heading_field, 'option') . '</h3>';
            $how .= '<p class="how-copy single-product-copy">' . $description . '</p>';
            $how .= '</div>';
            $how .= '</div>';
        endwhile;
    endif;

    echo $how;


    ?>
</div>