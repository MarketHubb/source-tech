<?php $query_params = get_query_var('query_params'); ?>

<!-- Right Panel -->

    <?php
    // Custom and Pre Config
    if (get_field('enable_custom') && get_field('enabled_pre')) {
        get_template_part('template-parts/config/content', 'tabs');
    }
    // Only Custom Config
    if (get_field('enable_custom') && !get_field('enabled_pre')) {
        get_template_part('template-parts/products/content', 'customconfigured');
    }
    // Only Pre Config
    if (!get_field('enable_custom') && get_field('enabled_pre')) {
        get_template_part('template-parts/products/content', 'preconfigured');
    }
    // No Config (Only Quote)
    if (!get_field('enable_custom') && !get_field('enabled_pre')) {
        get_template_part('template-parts/products/content', 'rfq');
    }
    ?>




