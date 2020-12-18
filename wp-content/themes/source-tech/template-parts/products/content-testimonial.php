<?php
if (get_field('post_servers_testimonial')) {
    $testimonial = get_field('post_servers_testimonial');
    $author = get_field('post_servers_author');
} else {
    $testimonial_args = array(
        'post_type' => 'testimonial',
        'orderby' => 'rand',
        'posts_per_page' => 1,
        'meta_query' => array(
            array(
                'key'     => 'post_testimonial_topic',
                'value'   => 'Servers'
            ),
        ),
    );

    $query = new WP_Query($testimonial_args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $post_id = $post->ID;
            $testimonial = get_field('post_testimonial_testimonial', $post_id);
            $author = get_field('post_testimonial_author', $post_id);
        endwhile;
    endif; wp_reset_postdata();
}
?>

<div class="content testimonial-container bg-blue">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row align-items-center">
                <div class="col-md-5 h-100">
                    <h3 class="display-4">What our customers are saying</h3>
                </div>
                <div class="col-md-7 h-100">
                    <p class="lead mb-0">"<?php echo $testimonial; ?>"</p>
                    <p class="mt-3 mb-0"><strong>- <?php echo $author; ?></strong></p>
                </div>
            </div>
        </div>
    </div>
</div>