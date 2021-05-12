<?php
$heading = return_server_category_heading(get_queried_object()->name);
?>
<div class="container-fluid <?php echo $heading['manufacturer']; ?>" id="custom-content">
    <div class="wrapper">

        <div class="row align-items-center justify-content-center mb-3">
            <div class="col-md-11 text-center">
                <header class="woocommerce-products-header">
                    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                        <h1 class="display-4 mb-1 page-heading"><?php woocommerce_page_title(); ?></h1>
                        <p class=""><?php echo $heading['description']; ?></p>
                    <?php endif; ?>

                    <?php
                    /**
                     * Hook: woocommerce_archive_description.
                     *
                     * @hooked woocommerce_taxonomy_archive_description - 10
                     * @hooked woocommerce_product_archive_description - 10
                     */
                    do_action( 'woocommerce_archive_description' );
                    ?>
                    <p class="text-right mb-1"><small class="font-weight-bold">Showing all <?php echo get_queried_object()->count; ?> results</small></p>
                </header>
            </div>
        </div>
    </div>
</div>

<div class="">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">

            <?php

            $query_args = array(
                'post_type' => 'product',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => get_queried_object()->taxonomy,
                        'field'    => 'term_id',
                        'terms'    => get_queried_object()->term_id
                    ),
                ),
            );

            $query = new WP_Query($query_args);
            if ($query->have_posts()) :
                $p = '';
                while ($query->have_posts()) : $query->the_post();
                    global $product;
                    $manufacturer = explode(' ',trim(get_the_title()));
                    $logo = get_server_manufacturer_logo(get_the_title());
                    // Apply custom CSS to Dell and HPE Rackmount servers only
                    $rack_cats = [142, 150];
                    $custom_rack_class = in_array(get_queried_object_id(), $rack_cats) ? 'product-rack-class' : '';
                    $size = get_form_factor_size($post->ID);
                    $title_explode = explode_content(" ", get_the_title());
                    $part_number = get_server_part_number($title_explode);

                    $p .= '<div class="col-md-3 mb-4 ' . strtolower($manufacturer[0]) . '">';
                    $p .= '<div class="panel bg-white product-cat-panel shadow h-100 text-center ' . $custom_rack_class . '">';
                    $p .= '<img class="product-cat-img" src="' . wp_get_attachment_url( $product->get_image_id() ) . '" />';
                    $p .= '<a href="' . get_permalink() . '" class="link stretched-link font-weight-normal"></a>';
                    $p .= '<div class="product-cat-copy px-2">';

                    if (!empty($logo)) {
                        $p .= '<img src="' . get_home_url() . $logo['image'] . '" class="product-cat-hover ' . $logo['class'] . '" />';
                    }

                    $p .= '<p class="form-manufacturer product-cat-model mt-2 mb-0">' . $title_explode[1] . '</p>';
                    $p .= '<h3 class="product-cat-part product-cat-hover">' . $part_number . '</h3>';

                    if (!empty($size)) {
                        $p .= '<span class="badge badge-pill badge-primary">' . $size . '</span>';
                    }

                    $p .= '</div></div></div>';
                endwhile;
                echo $p;
            endif;

            ?>

            </div>
        </div>
    </div>
</div>
