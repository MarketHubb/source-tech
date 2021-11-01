<?php $query_params = get_query_var('query_params'); ?>

<!-- Description / Order (Right) -->
<div class="col-md-5">

    <?php
    if( have_rows('configurations')) {
        get_template_part('template-parts/products/content', 'buy');
    } else { ?>

    <?php if (is_single(3226)) { ?>

        <h2>HPE P10471-001 3.2TB NVMe x4 lanes MU (2.5-inch, Refurbished)</h2>
        <p class="lead"><?php echo get_field('post_servers_description'); ?></p>
        <hr>

        <div class="mb-2">
            <p class="mb-0 d-inline-block"><strong>Part:</strong> P10224-B21
                <span class="px-1">|</span></p>
            <p class="mb-0 d-inline"><strong>SKU:</strong> P10471-001
                <span class="px-1">|</span></p>
            <p class="mb-0 d-inline"><strong>Condition:</strong> Refurbished</p>
        </div>

        <div class="product-highlight bg-transparent-blue rounded my-4 px-4 py-2">
            <p class="lead fw-600 text-secondary text-decoration-line-through mb-0">Price: $1,500.00/unit</p>
            <p class="lead fw-bold text-danger fs-1 mb-1">$1,195.00 <span class="fs-5">(Save $305)</span></p>
            <p class="fw-600 mb-0 d-inline-block">3-Year Warranty + Free Domestic Shipping</p>
        </div>

        <div class="mx-auto px-4 px-md-5">
            <?php echo return_product_single_button($post->ID, 'Talk to Our Sales Team'); ?>
        </div>

        <p class="small fst-italic"><i class="fa-light fa-circle-info pe-1"></i>Units in-stock & ready to ship </p>

    <?php } ?>

    <?php if (is_singular('servers') || is_singular('networking')) { ?>

        <p class="lead mt-4 mb-3"><?php echo get_field('post_servers_description'); ?></p>

        <div class="mx-auto px-3 text-center">
            <?php echo return_product_single_button($post->ID, 'Get a Custom Quote'); ?>
            <p class="">
                <small class="fst-italic text-secondary">We custom-configure to order.</small>
            </p>
        </div>

    <?php
    // Feature Panels (Gray)
    $tab_panes  = '<div class="row my-4">';
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

    echo $tab_panes;
    ?>

</div>

<?php } ?>

    </div>

<?php } ?>

</div>
</div>
</div>
