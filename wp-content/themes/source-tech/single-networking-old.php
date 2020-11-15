<?php
get_header();
$tags = get_formatted_product_terms($post->ID);
set_query_var('tags', $tags);
$title = ($post->post_type == 'servers') ? get_the_title() . ' Servers' : get_the_title();
set_query_var('title', $title);
?>

<div class="custom-page-content" id="custom-model-page-template">

    <div class="container">

        <?php get_template_part('template-parts/products/content', 'title'); ?>

        <?php get_template_part('template-parts/products/tab-headings'); ?>

        <?php get_template_part('template-parts/products/tab-content'); ?>

        <?php get_template_part('template-parts/products/how-it-works'); ?>

    </div>

</div><!-- .custom-page-content-->

<?php get_footer(); ?>
