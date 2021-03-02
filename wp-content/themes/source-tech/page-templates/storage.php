<?php // Template Name: Storage

get_header();

$testimonial = [
    'topic' => 'Maintenance',
    'style' => 'full-width',
    'background' => 'blue',
    'lead' => 'What our customers are saying'
];
set_query_var('testimonial', $testimonial);
?>

<!-- Hero Banner -->
<?php
$hero_args = array('section_classes' => 'mb-0');
if (get_field('page_include_banner')) {
    if (get_field('page_banner_style') === 'Split') {
        get_template_part('template-parts/global/content', 'hero-split', $hero_args);
    } else {
        get_template_part('template-parts/global/content', 'hero', $hero_args);
    }
} ?>

<!-- Brands List -->
<?php
$image_list_args = array(
    'section_heading' => false,
    'section_classes' => 'bg-blue-light mt-0'
);
 get_template_part('template-parts/global/content', 'image-list', $image_list_args); ?>

<!-- Content (Alternate) -->
<?php 
if( have_rows('brands') ):

    while ( have_rows('brands') ) : the_row();

        if (get_row_index() === 2) {

            $testimonial_args = array();

            get_template_part('template-parts/page/content', 'testimonial', $testimonial_args);

        }

        $image_path = return_brand_image_path(get_sub_field('manufacturer'));

        $section_heading = return_alternate_content_section_heading( array(
            'image' => $image_path,
            'heading' => get_sub_field('series'),
            'description' => get_sub_field('description'),
        ));

        $section_content = return_alternate_content( array(
            'content_type' => 'list',
            'content' => get_sub_field('product_list'),
            'product_image' => get_sub_field('series_image')

        ));

        $align = get_row_index();

        $content_args = array(
            'section_heading' => $section_heading,
            'section_content' => $section_content,
            'row_index' => get_row_index()
        );

        get_template_part('template-parts/global/content', 'alternate', $content_args);

    endwhile;

endif;
?>


<?php get_footer();
