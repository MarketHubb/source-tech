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

// Custom Config
if (get_field('use')) {
    $config_options =  return_formatted_component_options(get_the_ID());
    set_query_var('config_options', $config_options);
}

?>

<div class="custom-page-content" id="custom-model-page-template" data-id="<?php echo get_the_ID(); ?>">

    <div class="bg-light-grey">

        <div class="container">

            <div class="row justify-content-between align-items-start mt-4 mb-5 pb-4 pt-3">

                <?php get_template_part('template-parts/products/content', 'left'); ?>

                <?php get_template_part('template-parts/products/content', 'right'); ?>

            </div>

        </div>

    </div>

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
