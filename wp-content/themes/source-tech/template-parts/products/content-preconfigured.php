<!-- ## Pre-config ## -->
<div class="order-type" id="pre-config">
    <?php if( have_rows('configurations')) { ?>

        <?php get_template_part('template-parts/products/content', 'buy'); ?>

        <!-- No Custom Config-->
    <?php } else { ?>

        <!-- HPE NVMe-->
        <?php if (is_single(3226)) { ?>

            <?php get_template_part('template-parts/products/content', 'buy-storage'); ?>

        <?php } ?>

    <?php } // <!-- No Custom Config--> ?>
</div>