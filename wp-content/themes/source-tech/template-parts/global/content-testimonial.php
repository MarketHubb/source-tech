<?php
$testimonial = get_query_var('testimonial');

if (!isset($testimonial['testimonial'])) {
    $testimonial_args = array(
        'post_type' => 'testimonial',
        'orderby' => 'rand',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key'     => 'post_testimonial_topic',
                'value'   => $testimonial['topic']
            ),
        ),
    );

    $query = new WP_Query($testimonial_args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $testimonial_content = '"' . get_field('post_testimonial_testimonial', $post->ID) . '"';
            $testimonial_author = get_field('post_testimonial_author', $post->ID);
        endwhile;
    endif; wp_reset_postdata();
} else {
    $testimonial_content = $testimonial['testimonial'];
}

?>

<?php
if (isset($testimonial['background']) && $testimonial['background'] === "blue") {
    $container_color_class = 'bg-blue';
} elseif (isset($testimonial['background']) && $testimonial['background'] === "light") {
    $container_color_class = 'bg-light-blue';
} else {
    $container_color_class = '';
}
?>

<div class="content testimonial-container <?php echo $container_color_class; ?>">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row align-items-center">
                <div class="col-md-5 h-100">
                    <h3 class="display-4"><?php echo $testimonial['lead']; ?></h3>
                </div>
                <div class="col-md-7 h-100">
                    <p class="lead mb-0"><?php echo $testimonial_content; ?></p>

                    <?php if (isset($testimonial_author)) { ?>
                        <p class="mt-3 mb-0"><strong>- <?php echo $testimonial_author; ?></strong></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>