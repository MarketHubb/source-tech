<?php
$query_params = get_query_var('query_params');
?>

<!-- Description / Order (Right) -->
<div class="col-md-5">

    <?php
    if( have_rows('configurations')) {
        get_template_part('template-parts/products/content', 'buy');
    } else { ?>

        <!-- HPE NVMe-->
        <?php if (is_single(3226)) { ?>
            <?php get_template_part('template-parts/products/content', 'buy-storage'); ?>
        <?php } ?>

    <?php if (is_singular('servers') || is_singular('networking')) { ?>

    <?php
    $price =  'Save up to 30%';
    $callout = 'In-stock & ready to ship';
    $feature_1 = 'Certified refurbished ' . $manufacturer[0] . ' hardware';
    $features = [$feature_1, 'Factory sealed & tested', 'Free 24-month warranty standard'];
    echo return_price($price, $callout, $features);
    ?>


        <div class="d-grid me-1 me-md-5 pe-0 pe-md-4 pe-lg-5">
            <!-- CTA Button -->
            <?php
            $primary_btn = array(
                'text' => '<i class="fa-solid fa-file-lines me-2"></i> Request a Quote',
                'data' => 'data-bs-toggle="modal" data-bs-target="#customModal" data-product="' . get_the_title() . '"',
                'type' => 'primary'
            );
            echo return_cta_btn($primary_btn);
            ?>

            <!-- Description -->
            <p class="lh-sm mt-2 text-center">
                <small class="fst-italic text-dark"><?php the_title(); ?>'s are custom-configured to order</small>
            </p>
        </div>
    
        <!-- Max Specs -->
        <?php 
        if( have_rows('post_servers_specs') ):
            $s  = '<div class="d-grid gap-1 bg-light border rounded p-4">';
            $s .= '<h5 class="mb-2 text-center d-inline-block border-bottom border-1 pb-2">' . get_sub_field('configuration_label')[0] . ' Configuration Specs</h5>';
            $s .= '<table class="table table-borderless">';
            $s .= '<tbody>';
            $exclude = ['Storage Controllers', 'Dimensions', 'Weight', 'I/O Expansion'];
            while ( have_rows('post_servers_specs') ) : the_row();
                if (!in_array(get_sub_field('post_servers_specs_label'), $exclude)) {

                    if (get_sub_field('post_servers_specs_label') == 'Processors') {
                        $label = 'CPU';
                    } elseif (get_sub_field('post_servers_specs_label') == 'Drive Bays/Storage') {
                        $label = 'Drives';
                    } else {
                        $label = get_sub_field('post_servers_specs_label');
                    }

                    $s .= '<tr>';
                    $s .= '<th scope="row">' . $label . '</th>';
                    $s .= '<td>' . get_sub_field('post_servers_specs_value') . '</td>';
                    $s .= '</tr>';
                }

                $label = get_sub_field('post_servers_specs_label');
                $value = get_sub_field('post_servers_specs_value');



//                if ($label == 'Processors') {
//                    $s .= '<p class="mb-0"><strong class="me-2 d-inline-block">CPU:</strong>' . get_sub_field('post_servers_specs_value') . '</p>';
//                }

            endwhile;
                $s .= '</tbody>';
                $s .= '</table>';
                $s .= '</div></div>';
            echo $s;
        endif;
        ?>


    <?php
    // Feature Panels (Gray)
    $tab_panes  = '<div class="row my-4">';
    $tab_panes .= '<div class="col-md-6">';
    $tab_panes .= '<div class="h-100 bg-light px-4 py-4 text-center rounded border">';
    $tab_panes .= '<i class="text-blue fa-xl fa-thin fa-globe"></i>';
    $tab_panes .= '<p class="fw-bold my-2">International Delivery</p>';
    $tab_panes .= '<p class="mb-0">Ground & expedited options</p>';
    $tab_panes .= '</div></div>';
    $tab_panes .= '<div class="col-md-6">';
    $tab_panes .= '<div class="h-100 bg-light px-4 py-4 text-center rounded  border">';
    $tab_panes .= '<i class="text-blue fa-xl fa-thin fa-badge-check"></i>';
    $tab_panes .= '<p class="fw-bold my-2">Free 2-Year  Warranty</p>';
    $tab_panes .= '<p class="mb-0">Standard on all server orders</p>';
    $tab_panes .= '</div></div></div>';

    echo $tab_panes;
    ?>

</div>

<?php } ?>

    </div>

<?php } ?>

</div>
</div>
</div>
