<?php
$manufacturer = get_query_var('manufacturer');
?>
<div class="row">
    <div class="col">
<!--        <h1 class="fw-800 letter-tight mb-5">--><?php //echo get_the_title(); ?><!--</h1>-->
        
        <?php 
        if( have_rows('configurations') ):
            $tabs = '<ul class="nav nav-pills nav-fill flush" id="product_tabs" role="tabList">';
            $tab_panes = '<div class="tab-content">';
            while ( have_rows('configurations') ) : the_row();
                // Vars
                $model_clean = strtolower(str_replace(' ', '_', get_sub_field('configuration_label')[0]));
                $price_starting = get_sub_field('price') + 300;
                $active = get_row_index() === 1 ? 'active' : '';
                $aria_selected = get_row_index() === 1 ? 'true' : 'false';
                $collapsed = get_row_index() === 1 ? '' : '';

                // Tabs
                $tabs .= '<li class="nav-item" role="presentation">';
                $tabs .= '<button class="nav-link ' . $active . '" id="' . $model_clean . '_tab" data-bs-toggle="tab" data-bs-target="#' . $model_clean . '"';
                $tabs .= 'type="button" role="tab" aria-controls="' . $model_clean . '" aria-selected="' . $aria_selected . '">';
                $tabs .= get_sub_field('configuration_label')[0];
                $tabs .= '</button></li>';

                // Tab Panes: Open
                $tab_panes .= '<div class="px-3 tab-pane ' . $active . '" id="' . $model_clean . '" role="tabpanel" aria-labelledby="' . $model_clean . '_tab">';

                // Price
                $price =  '$' . get_sub_field('price');
                $callout = 'In-stock & ready to ship';
                $features = ['Factory sealed & tested', 'Free 24-month warranty standard'];
                $tab_panes .=  return_price($price, $callout, $features);

                // CTA Buttons
                $tab_panes .= '<div class="row justify-content-between mb-3">';
                $tab_panes .= '<div class="col text-center pe-0 pe-md-4 pe-lg-5">';
                $tab_panes .= '<div class="d-grid gap-3">';

                $primary_btn_text =  '<i class="fa-solid fa-cart-shopping-fast me-2 text-white"></i> Add ' . get_sub_field('configuration_label')[0] . ' to Cart</a>';
                $primary_btn = array(
                    'url' => get_sub_field('stripe_payment_link'),
                    'text' => $primary_btn_text,
                    'type' => 'primary'
                );

                $secondary_btn = array(
                    'text' => 'Custom Configure this Server',
                    'data' => 'data-bs-toggle="modal" data-bs-target="#customModal" data-product="' . get_the_title() . '"',
                    'type' => 'secondary'
                );

                $foxycart_options = array(
                    'CPU' => get_sub_field('processor'),
                    'Drives' => get_sub_field('hard_drive'),
                    'Memory' => get_sub_field('memory'),
                    'Chassis' => get_sub_field('chasis')[0],
                    'Raid Controller' => get_sub_field('raid_controller')[0],
                    'Network Daughter Card' =>  get_sub_field('adapter')[0],
                    'Remote Access' => get_sub_field('express_remote')[0],
                    'Rails' => get_sub_field('rails')[0],
                    'Power Supply' => get_sub_field('power_supply')[0]
                );

                $inputs = '';


                $tab_panes .= return_foxycart_links($post->ID, $foxycart_options, get_sub_field('price'), get_sub_field('configuration_label')[0]);

                $tab_panes .= return_cta_btn($primary_btn);
                $tab_panes .= return_cta_btn($secondary_btn);

                $tab_panes .= '</div>';
                $tab_panes .= '<p class="text-center mt-2"><small class="fst-italic">Request a quote on a custom-configured ' . get_the_title() . '</small></p>';
                $tab_panes .= '</div></div>';

                // Config Details
                $tab_panes .= '<div class="d-grid gap-1 bg-light border rounded p-4">';
                $tab_panes .= '<h5 class="mb-2">' . get_sub_field('configuration_label')[0] . ' Configuration Details</h5>';
                $tab_panes .= '<p class="mb-0"><strong class="me-2 d-inline-block">CPU:</strong>' . get_sub_field('processor') . '</p>';
                $tab_panes .= '<p class="mb-0"><strong class="me-2">Drives:</strong>' . get_sub_field('hard_drive') . '</p>';
                $tab_panes .= '<p class="mb-0"><strong class="me-2">Memory:</strong>' . get_sub_field('memory') . '</p>';
                $tab_panes .= '<p class="mb-0"><strong class="me-2">Chassis:</strong>' . get_sub_field('chasis')[0] . '</p>';
                $tab_panes .= '<p class="mb-0"><strong class="me-2">Raid Controller:</strong>' . get_sub_field('raid_controller')[0] . '</p>';
                $tab_panes .= '<p class="mb-0"><strong class="me-2">Network Daughter Card:</strong>' . get_sub_field('adapter')[0] . '</p>';
                $tab_panes .= '<p class="mb-0"><strong class="me-2">Remote Access:</strong>' . get_sub_field('express_remote')[0] . '</p>';
                $tab_panes .= '<p class="mb-0"><strong class="me-2">Rails:</strong>' . get_sub_field('rails')[0] . '</p>';
                $tab_panes .= '<p class="mb-0"><strong class="me-2">Power Supply:</strong>' . get_sub_field('power_supply')[0] . '</p>';
                $tab_panes .= '</div>';

                // Accordion: Open
                $accordion = '<div class="accordion accordion-flush" id="' . $model_clean . '">';

                // Accordion: Configuration Details
                $accordion .= '<div class="accordion-item">';
                $accordion .= '<h2 class="accordion-header" id="accordion_' . $model_clean . '_details">';
                $accordion .= '<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#' . $model_clean . '_details" ';
                $accordion .= 'aria-expanded="false" aria-controls="' . $model_clean . '_details">';
                $accordion .= get_sub_field('configuration_label')[0] . ' Configuration Details</button></h2>';
                $accordion .= '<div id="' . $model_clean . '_details' . '" class="accordion-collapse collapse" ';
                $accordion .= 'aria-labelledby="accordion_' . $model_clean . '_details" ';
                $accordion .= ' data-bs-parent="#' . $model_clean . '">';
                $accordion .= '<div class="accordion-body">';
                $accordion .= '<p class="mb-1"><strong class="">Chasis:</strong></p>' . get_sub_field('chasis')[0] . '</p>';
                $accordion .= '<p class="mb-1"><strong class="">Adapter / Network Daughter:</strong></p>' . get_sub_field('adapter')[0] . '</p>';
                $accordion .= '<p class="mb-1"><strong class="">Express Remote:</strong></p>' . get_sub_field('express_remote')[0] . '</p>';
                $accordion .= '<p class="mb-1"><strong class="">Rails:</strong></p>' . get_sub_field('rails')[0] . '</p>';
                $accordion .= '<p class="mb-1"><strong class="">Power Supply:</strong></p>' . get_sub_field('power_supply')[0] . '</p>';
                $accordion .= '</div></div></div>';

                // Accordion: Warranty & Returns
                // Accordion: Contact Us

                // Accordion: Close
                $accordion .= '</div>';

                // Tab Panes + Accordion
//                $tab_panes .= $accordion;

                // Feature Panels (Gray)
//                $tab_panes .= '<div class="row my-4">';
//                $tab_panes .= '<div class="col-md-6">';
//                $tab_panes .= '<div class="h-100 bg-light-blue px-4 py-4 text-center rounded border">';
//                $tab_panes .= '<i class="text-blue fa-lg fa-thin fa-globe d-block mb-2"></i>';
//                $tab_panes .= '<p class="fw-bold mb-2">International Delivery</p>';
//                $tab_panes .= '<p class="mb-0">Ground & expedited options</p>';
//                $tab_panes .= '</div></div>';
//                $tab_panes .= '<div class="col-md-6">';
//                $tab_panes .= '<div class="h-100 bg-light-blue px-4 py-4 text-center rounded  border">';
//                $tab_panes .= '<i class="text-blue fa-lg fa-thin fa-badge-check"></i>';
//                $tab_panes .= '<p class="fw-bold mb-2">24-Month Warranty</p>';
//                $tab_panes .= '<p class="mb-0">Free & standard on all orders</p>';
//                $tab_panes .= '</div></div></div>';

                $tab_panes .= '</div>';

            endwhile;
            $tab_panes .= '</div>';
            $tabs .= '</ul>';
            echo $tabs;
            echo $tab_panes;
        endif;
        ?>

    </div>
</div>

