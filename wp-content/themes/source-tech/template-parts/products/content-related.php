<?php
if (wp_get_post_parent_id($post) === 1638) {
    $man = "Dell";
}
$generation_tax = get_the_terms($post->ID, 'generation');
if ($generation_tax) {
    $gen = $generation_tax[0]->name;
}

$heading_lead = $gen . '<sup>th</sup> Generation' . ' ' . $man;
?>
<div class="container" id="related">
    <div class="wrapper">
        <div class="row">
            <div class="col-md-12 text-center mb-3">
                <h2>Explore these other powerful <?php echo $heading_lead;  ?> Servers</h2>
                <p class="">SourceTech carries largest selection of certified pre-owned <?php echo $man; ?> servers that are in-stock and ready to ship</p>
            </div>
        </div>

            <?php
            $query_args = array(
                'post_type' => 'servers',
                'post__not_in' => [$post->ID],
                'posts_per_page' => 4,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'generation',
                        'field'    => 'name',
                        'terms'    => '14',
                    ),
                ),
                'orderby' => 'rand'

            );

            $query = new WP_Query($query_args);

            if ($query->have_posts()) :
                $r = '<div class="row justify-content-center">';
            	while ($query->have_posts()) : $query->the_post();
                    $manufacturer = explode(' ',trim(get_the_title()));
                    $logo = get_server_manufacturer_logo(get_the_title());
                    // Apply custom CSS to Dell and HPE Rackmount servers only
                    $rack_cats = [142, 150];
                    $custom_rack_class = in_array(get_queried_object_id(), $rack_cats) ? 'product-rack-class' : '';
                    $size = get_form_factor_size($post->ID);
                    $title_explode = explode_content(" ", get_the_title());
                    $part_number = get_server_part_number($title_explode);
                    $img = get_repeater_field_row('post_servers_images', 1,'post_servers_images_image', $post->ID);

                    $r .= '<div class="col-md-3 mb-4 ' . strtolower($manufacturer[0]) . '">';
                    $r .= '<div class="panel bg-white product-cat-panel shadow h-100 text-center d-flex flex-column ' . $custom_rack_class . '">';
                    $r .= '<img class="product-cat-img related-img mt-5" src="' . $img . '" />';
                    $r .= '<a href="' . get_permalink() . '" class="link stretched-link font-weight-normal"></a>';
                    $r .= '<div class="product-cat-copy px-2 mt-auto">';

                    if (!empty($logo)) {
                        $r .= '<img src="' . get_home_url() . $logo['image'] . '" class="product-cat-hover ' . $logo['class'] . '" />';
                    }

                    $r .= '<p class="form-manufacturer product-cat-model mt-2 mb-0">' . $title_explode[1] . '</p>';
                    $r .= '<h3 class="product-cat-part product-cat-hover">' . $part_number . '</h3>';

                    if (!empty($size)) {
                        $r .= '<span class="badge badge-pill badge-primary">' . $size . '</span>';
                    }

                    $r .= '</div></div></div>';
            	endwhile;
            	$r .= '</div>';
            	echo $r;
            endif;
            ?>


    </div>
</div>