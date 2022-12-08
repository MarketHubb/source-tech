<?php if (is_singular('servers') || is_singular('networking')) { ?>

    <?php
    $price =  'Save up to 30%';
    $callout = 'In-stock & ready to ship';
    $feature_1 = 'Certified refurbished ' . $manufacturer[0] . ' hardware';
    $features = [$feature_1, 'Factory sealed & tested', 'Free 24-month warranty standard'];
    echo return_price($price, $callout, $features);
    ?>


    <div class="d-grid me-1 me-md-5 pe-0 pe-md-4 pe-lg-5">


        <?php get_template_part('template-parts/cta/content', 'button-quote'); ?>

        <!-- Description -->
        <p class="lh-sm mt-2 text-center">
            <small class="fst-italic text-dark"><?php the_title(); ?>'s are custom-configured to order</small>
        </p>

    </div> <!--d-grid me-1 me-md-5 pe-0 pe-md-4 pe-lg-5-->

    <?php get_template_part('template-parts/specs/content', 'quote'); ?>

    <?php get_template_part('template-parts/cta/content', 'panels'); ?>


<?php } // is_singular('servers') || is_singular('networking') ?>
