<?php
get_header();
$tags = get_formatted_product_terms($post->ID);
set_query_var('tags', $tags);
$title = get_formatted_product_title($post->ID);
set_query_var('title', $title);
$post_type_for_acf = $post->post_type === 'networking' ? 'networking' : 'servers';
set_query_var('post_type_for_acf', $post_type_for_acf);
$product_type = get_formatted_product_type($post->ID);
set_query_var('product_type', $product_type);

?>

<div class="custom-page-content" id="custom-model-page-template">

        <?php get_template_part('template-parts/products/content', 'title'); ?>

        <?php get_template_part('template-parts/products/content', 'overview'); ?>

        <?php 
        if (have_rows('post_servers_pre_configured')):
            get_template_part('template-parts/products/content', 'configured');
        endif;
        ?>

        <?php get_template_part('template-parts/products/content', 'testimonial'); ?>

        <?php get_template_part('template-parts/products/content', 'warranty'); ?>

        <?php get_template_part('template-parts/products/content', 'specs'); ?>

        <?php get_template_part('template-parts/products/content', 'easy123'); ?>

        <?php get_template_part('template-parts/products/content', 'faq'); ?>

    </div> <!-- End .container-->

        <?php //get_template_part('template-parts/products/tab-content'); ?>

        <?php // get_template_part('template-parts/products/how-it-works'); ?>

        <?php // get_template_part('template-parts/products/testimonials'); ?>

</div><!-- .custom-page-content-->

<?php get_footer(); ?>
