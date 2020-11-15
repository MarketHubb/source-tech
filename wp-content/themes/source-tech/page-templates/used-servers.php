<?php
/**
 * Template Name: Used Servers
 */
get_header(); ?>

<div class="">
    <div class="container pt-3 pb-3">
        <div class="row">
            <div class="col">
                <h1 class="page-title text-center">New & Refurbished Servers for Sale</h1>
                <div class="divider"></div>
                <p class="text-center">Save thousands on new and refurbished servers from Dell, HPE, Oracle and more.
                    Every server we sell is custom-configured to order. Call our chat with one of our server-expert
                    technicians today for help configuring or a super-fast custom quote.</p>
            </div>
        </div>
    </div>
</div>
    
    <?php 
    if( have_rows('page_refurbished_servers_manufacturers') ):
        $servers = '';
        while ( have_rows('page_refurbished_servers_manufacturers') ) : the_row();
            $manufacturer = get_sub_field('page_refurbished_servers_manufacturers_name');
            $product_line = get_sub_field('page_refurbished_servers_product_line');
            $accent_color = get_sub_field('page_refurbished_servers_color');
            $logo = get_sub_field('page_refurbished_servers_manufacturers_logo');
            $manufacturer_description = get_sub_field('page_refurbished_servers_manufacturers_description');

            $servers .= '<div class="manufacturer-container">';

//            $servers .= '<div class="container d-flex h-100 mb-4">';
//            $servers .= '<div class="row align-items-center h-100">';
//            $servers .= '<div class="col-md-3 mx-auto">';
//            $servers .= '<img src="' . get_sub_field('page_refurbished_servers_manufacturers_logo') . '" class="manufacturer-logo" />';
//            $servers .= '</div>';
//            $servers .= '<div class="col-md-9 mx-auto">';
//            $servers .= '<p class="manufacturer-desc mb-0">' . get_sub_field('page_refurbished_servers_manufacturers_description') . '</p>';
//            $servers .= '</div></div></div>';

            if( have_rows('page_refurbished_servers_form_factors') ):

                $servers .= '<div class="container-fluid fluid-constrained d-flex h-100">';
                $servers .= '<div class="row row-eq-height">';

                $servers .= '<div class="col-md-3 mx-auto">';
                $servers .= '<div class="v-align-center h-100">';
                $servers .= '<img src="' . $logo . '" class="manufacturer-logo" />';
                $servers .= '<p class="manufacturer-desc mb-0">' . $manufacturer_description . '</p>';
                $servers .= '</div></div>';

                while ( have_rows('page_refurbished_servers_form_factors') ) : the_row();
                    $form_factor = get_sub_field('page_refurbished_servers_form_factors_type');
                    $tax = get_sub_field('page_refurbished_servers_form_factors_link');

                    $servers .= '<div class="col-md-3 text-center">';
                    $servers .= '<div class="panel shadow h-100 bg-white" ';
                    $servers .= 'style="border-top: 8px solid ' . $accent_color . '">';
                    $servers .= '<p class="form-manufacturer">' . $product_line . '</p>';
                    $servers .= '<h3 class="form-factor pb-2">' . get_sub_field('page_refurbished_servers_form_factors_type') . '</h3>';
                    $servers .= '<img src="' . get_sub_field('page_refurbished_servers_form_factors_image') . '" class="manufacturer-logo mt-3 mb-4" />';
                    $servers .= '<a href="' . get_term_link($tax[0]) . '" class="form-factor-links">';
                    $servers .= 'Shop ' . $manufacturer . ' ' . $form_factor . ' <i class="far fa-arrow-right"></i></a>';
                    $servers .= '<p class="product-count"><strong>' . get_product_post_count(get_sub_field('page_refurbished_servers_form_factors_link')) . '</strong>';
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
        
</div>


<?php get_footer(); ?>
