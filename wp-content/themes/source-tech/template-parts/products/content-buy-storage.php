<?php $details = get_field('details'); ?>
<div class="row mt-4">
    <div class="col">

        <h4 class="fw-800 mb-1">HPE NVMe 3.2TB 2.5-inch SSD</h4>
        <p class="lead text-secondary mb-0">NVMe x4 Lanes MU | MLC PCI Express 3.0</p>

        <?php
        $price =  '$' . get_field('price');
        $callout = 'In-stock: Qty 41';
        $features = array(
            'Genuine HP serial number and SSD firmware',
            'Genuine HP Certified NVMe SCN SSD'
        );
        echo return_price($price, $callout, $features);
        ?>

        <div class="row justify-content-between mb-3">
            <div class="col text-center mt-4">
                <div class="d-grid gap-3 pe-1 pe-md-5 me-0 me-md-5">
                    <a href="<?php echo get_field('stripe_link'); ?>" class="btn fw-bold cta-btn-primary shadow-sm">
                        <i class="fa-solid fa-cart-shopping-fast me-2 text-white"></i>
                        Buy Now
                    </a>
                    <button type="button" class="btn btn-outline-secondary fw-bold round" data-bs-toggle="modal" data-bs-target="#customModal" data-product="Dell PowerEdge R730">
                        Get a Quote
                    </button>
                    <p class="text-center"><small class="fst-italic text-secondary">Talk to our U.S-based storage support experts now</small></p>
                </div>
            </div>
        </div>
        <hr>

        <?php if (get_field('buy_it_now')) { ?>

            <div class="row storage-details">
                <div class="col">

                <?php
                if( have_rows('details') ):
                    $d = '';
                    $cat = [];
                    while ( have_rows('details') ) : the_row();
                        if (end($cat) !== get_sub_field('category')) {
                            $d .= '<h5 class="fw-800">' . get_sub_field('category') . ':</h5>';
                        }
                        $d .= '<p class="mb-0">';
                        $d .= '<span class="fw-bold">' . get_sub_field('attribute') . ': </span>';
                        $d .= '<span class="">' . get_sub_field('value') . '</span>';
                        $d .= '</p>';

                        $cat[] = get_sub_field('category');
                    endwhile;
                    echo $d;
                endif;
                ?>

                </div>
            </div>

            <div>
                <h5 class="fw-800 mt-4">Compatible with:</h5>
                <?php 
                if( have_rows('compatible') ):
                    $c = '<ul class="list-group list-group-flush flush">';
                    while ( have_rows('compatible') ) : the_row();
                        $c .= '<li class="list-group-item py-2">';
                        $c .= '<a href="' . get_permalink(get_sub_field('server')) . '" >';
                        $c .= get_the_title(get_sub_field('server')) . '</a>';
                        $c .= '</li>';
                    endwhile;
                    $c .= '</ul>';
                    echo $c;
                endif;
                ?>
            </div>

        <?php } else { ?>

        <?php } ?>

        <?php
        // Feature Panels (Gray)
        $tab_panes  = '<div class="row my-4">';
        $tab_panes .= '<div class="col-md-6">';
        $tab_panes .= '<div class="h-100 bg-light px-4 py-4 text-center rounded border">';
        $tab_panes .= '<i class="text-blue fa-lg fa-thin fa-badge-check"></i>';
        $tab_panes .= '<p class="fw-bold mb-2">3-Year Warranty</p>';
        $tab_panes .= '<p class="mb-0">Free & standard on all orders</p>';
        $tab_panes .= '</div></div>';
        $tab_panes .= '<div class="col-md-6">';
        $tab_panes .= '<div class="h-100 bg-light px-4 py-4 text-center rounded  border">';
        $tab_panes .= '<i class="text-blue fa-lg fa-thin fa-globe d-block mb-2"></i>';
        $tab_panes .= '<p class="fw-bold mb-2">International Delivery</p>';
        $tab_panes .= '<p class="mb-0">Ground & expedited options</p>';
        $tab_panes .= '</div></div></div>';

        echo $tab_panes;
        ?>

    </div>
</div>

