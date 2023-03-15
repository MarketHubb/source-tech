<?php $custom_config = get_query_var('custom_config'); ?>

<div class="card shadow-sm" id="custom-config">
    <div id="summary-total">
        <div class="card-header bg-grey-blue py-3">
            <?php get_template_part('template-parts/product-single/content', 'summary-total'); ?>
        </div>
        <div class="card-body bg-grey-blue-lightest p-2 pt-3 p-md-4">
            <?php
            if ($custom_config) {
                get_template_part('template-parts/product-single/content', 'add-to-cart');
                get_template_part('template-parts/product-single/content', 'summary');
            } else {
                get_template_part('template-parts/product-single/content', 'request-quote');

            }
            ?>
        </div>
    </div>
</div>
