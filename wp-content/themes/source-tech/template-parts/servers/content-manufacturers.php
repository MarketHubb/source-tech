<?php
if( have_rows('page_refurbished_servers_manufacturers', 661) ):
    $servers = '';
    while ( have_rows('page_refurbished_servers_manufacturers', 661) ) : the_row();
        $manufacturer = get_sub_field('page_refurbished_servers_manufacturers_name', 661);
        $product_line = get_sub_field('page_refurbished_servers_product_line', 661);
        $accent_color = get_sub_field('page_refurbished_servers_color', 661);
        $logo = get_sub_field('page_refurbished_servers_manufacturers_logo', 661);
        $manufacturer_description = get_sub_field('page_refurbished_servers_manufacturers_description', 661);

        $servers .= '<div class="manufacturer-container">';

        if( have_rows('page_refurbished_servers_form_factors', 661) ):
            $servers .= '<div class="container-fluid fluid-constrained h-100">';
            $servers .= '<div class="row justify-content-start row-eq-height">';
            $servers .= '<div class="col-md-3">';
            $servers .= '<div class="v-align-center h-100">';
            $servers .= '<img src="' . $logo . '" class="manufacturer-logo" />';
            $servers .= '<p class="manufacturer-desc mb-0">' . $manufacturer_description . '</p>';
            $servers .= '</div></div>';

            while ( have_rows('page_refurbished_servers_form_factors', 661) ) : the_row();
                $form_factor = get_sub_field('page_refurbished_servers_form_factors_type', 661);
                $tax = get_sub_field('page_refurbished_servers_form_factors_link', 661);

                $servers .= '<div class="col-md-3 text-center">';
                $servers .= '<div class="panel shadow h-100 bg-white" ';
                $servers .= 'style="border-top: 8px solid ' . $accent_color . '">';
                $servers .= '<p class="form-manufacturer">' . $product_line . '</p>';
                $servers .= '<h3 class="form-factor pb-2">' . get_sub_field('page_refurbished_servers_form_factors_type', 661) . '</h3>';
                $servers .= '<img src="' . get_sub_field('page_refurbished_servers_form_factors_image', 661) . '" class="manufacturer-logo mt-3 mb-4" />';
                $servers .= '<a href="' . get_term_link($tax[0]) . '" class="form-factor-links">';
                $servers .= 'Shop ' . $manufacturer . ' ' . $form_factor . ' <i class="far fa-arrow-right"></i></a>';
                $servers .= '<p class="product-count"><strong>' . get_product_post_count(get_sub_field('page_refurbished_servers_form_factors_link', 661)) . '</strong>';
                $servers .= ' models in stock</p>';
                $servers .= '</div></div>';

            endwhile;
            $servers .= '</div></div>';
        endif;
        $servers .= '</div>';

    endwhile;
    echo $servers;
endif;
?>
