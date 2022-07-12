<?php
get_header();


if (isset($_GET) && !empty($_GET)) {
//    $query_string_cta = get_query_string_message($post->ID, $_GET);
//    echo get_query_string_message($post->ID, $_GET);
}
set_query_var('query_params', $_GET);
$tags = get_formatted_product_terms($post->ID);
set_query_var('tags', $tags);
$title = get_formatted_product_title($post->ID);
set_query_var('title', $title);
$post_type_for_acf = $post->post_type === 'networking' ? 'networking' : 'servers';
set_query_var('post_type_for_acf', $post_type_for_acf);
$product_type = get_formatted_product_type($post->ID);
set_query_var('product_type', $product_type);
$manufacturer = explode(' ',trim(get_the_title()));
set_query_var('manufacturer', $manufacturer);
$title_explode = explode_content(" ", get_the_title());
$part_number = get_server_part_number($title_explode);
set_query_var('part_number', $part_number);

?>

<div class="custom-page-content" id="custom-model-page-template">

    <?php get_template_part('template-parts/products/content', 'title'); ?>

    <?php get_template_part('template-parts/products/content', 'overview'); ?>

    <?php get_template_part('template-parts/products/content', 'quote'); ?>

    <?php get_template_part('template-parts/products/content', 'specs'); ?>

    <?php
    if(!have_rows('configurations')) {
        if (have_rows('post_servers_pre_configured')):
            get_template_part('template-parts/products/content', 'configured');
        endif;
    }
    ?>

    <?php get_template_part('template-parts/products/content', 'testimonial'); ?>

    <?php get_template_part('template-parts/products/content', 'warranty'); ?>

    <?php get_template_part('template-parts/products/content', 'easy123'); ?>

    <?php get_template_part('template-parts/products/content', 'faq'); ?>

    <?php
    $terms = get_the_terms($post_id, 'generation');
    if ($terms) {
        get_template_part('template-parts/products/content', 'related');
     }
    ?>


        <?php //get_template_part('template-parts/products/tab-content'); ?>

        <?php // get_template_part('template-parts/products/how-it-works'); ?>

        <?php // get_template_part('template-parts/products/testimonials'); ?>

</div><!-- .custom-page-content-->

<?php get_footer(); ?>
