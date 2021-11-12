<?php
$query_params = get_query_var('query_params');
?>

<!-- Description / Order (Right) -->
<div class="col-md-5">

    <?php
    if( have_rows('configurations')) {
        get_template_part('template-parts/products/content', 'buy');
    } else { ?>

    <?php
        // HPE NVME
        if (is_single(3226)) {
            get_template_part('template-parts/products/content', 'buy-storage');
        }
     ?>

    <?php if (is_singular('servers') || is_singular('networking')) { ?>

        <p class=" mt-4 mb-3">
            <strong class="d-block">Description</strong>
            <?php echo get_field('post_servers_description'); ?>
        </p>

        <div class="mt-4 mb-5 mx-auto px-3 text-center">
            <?php echo return_product_single_button($post->ID, 'Get a Quote Now'); ?>
            <p class="lh-sm mt-2">
                <small class="fst-italic text-secondary">Tell us how you want your <?php the_title(); ?> configured and then get a custom quote in minutes.</small>
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
