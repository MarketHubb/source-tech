<?php
get_query_var('title');
?>
<div class="row" id="model-page-tabs-content">
    <div class="col">
        <div class="tab-content" id="server-tab-content">

            <?php get_template_part('template-parts/products/tab-content-overview'); ?>

            <?php get_template_part('template-parts/products/tab-content-specs'); ?>

            <?php get_template_part('template-parts/products/tab-content-faq'); ?>

            <?php get_template_part('template-parts/products/tab-content-warranty'); ?>

            <?php get_template_part('template-parts/products/tab-content-shipping'); ?>

        </div>
    </div>
</div>