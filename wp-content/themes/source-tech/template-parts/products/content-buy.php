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

                // Price + Basic Config
                $tab_panes .= '<h3 class="fw-800 d-inline-block mb-0 mt-4 ms-auto">$' . get_sub_field('price') . '</h3>';
                $tab_panes .= '<span class="fs-4 px-2"> | </span>';
                $tab_panes .= '<i class="fa-brands fa-cc-visa px-2 text-body fs-6"></i><i class="fa-brands fa-cc-mastercard px-2 text-body fs-6"></i><i class="fa-brands fa-cc-discover px-2 text-body fs-6"></i>';
                $tab_panes .= '<i class="fa-brands fa-cc-amex px-2 text-body fs-6"></i><i class="fa-brands fa-cc-apple-pay px-2 text-body fs-6"></i><i class="fa-solid fa-money-check-dollar-pen px-2 text-body fs-6"></i>';
                $tab_panes .= '<div class="mt-3 mb-4 py-1">';
                $tab_panes .= '<p class="mb-1"><i class="text-blue fa-light fa-microchip pe-2"></i><strong class="">CPU:</strong></p>' . get_sub_field('processor') . '</p>';
                $tab_panes .= '<p class="mb-1"><i class="text-blue fa-light fa-hard-drive pe-2"></i><strong class="">Drives:</strong></p>' . get_sub_field('hard_drive') . '</p>';
                $tab_panes .= '<p class="mb-1"><i class="text-blue fa-light fa-server pe-2"></i><strong class="">Memory:</strong></p>' . get_sub_field('memory') . '</p>';
                $tab_panes .= '</div>';

                // CTA Buttons
                $tab_panes .= '<div class="row justify-content-between mb-3">';
                $tab_panes .= '<div class="col text-center">';
                $tab_panes .= '<div class="d-grid gap-3">';
                $tab_panes .= '<a href="' . get_sub_field('stripe_payment_link') . '" class="btn fw-bold cta-btn-primary shadow-sm">';
                $tab_panes .= '<i class="fa-solid fa-cart-shopping-fast me-2 text-white"></i> Add ' . get_sub_field('configuration_label')[0] . ' to Cart</a>';
                $tab_panes .= '<button type="button" class="btn btn-outline-secondary fw-bold" data-bs-toggle="modal" data-bs-target="#customModal" data-product="Dell PowerEdge R730">Configure to Order</button>';
                $tab_panes .= '<p class="text-center"><small class="fst-italic text-secondary">Don\'t see what you need? We can custom-configure to order.</small></p>';
                $tab_panes .= '</div></div></div>';
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
                $tab_panes .= $accordion;

                // Feature Panels (Gray)
                $tab_panes .= '<div class="row my-4">';
                $tab_panes .= '<div class="col-md-6">';
                $tab_panes .= '<div class="h-100 bg-light px-4 py-4 text-center rounded border">';
                $tab_panes .= '<i class="text-blue fa-lg fa-thin fa-globe d-block mb-2"></i>';
                $tab_panes .= '<p class="fw-bold mb-2">International Delivery</p>';
                $tab_panes .= '<p class="mb-0">Ground & expedited options</p>';
                $tab_panes .= '</div></div>';
                $tab_panes .= '<div class="col-md-6">';
                $tab_panes .= '<div class="h-100 bg-light px-4 py-4 text-center rounded  border">';
                $tab_panes .= '<i class="text-blue fa-lg fa-thin fa-badge-check"></i>';
                $tab_panes .= '<p class="fw-bold mb-2">24-Month Warranty</p>';
                $tab_panes .= '<p class="mb-0">Free & standard on all orders</p>';
                $tab_panes .= '</div></div></div>';

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

