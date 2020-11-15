<?php
/**
 * Template Name: Blog Posts
 */
get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Blog Posts</h1>
            <p class="text-center">Our wonderful collection of blog posts on servers, IT infrastructure, Networking Equipment and much more!</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">

        <?php
        $post_args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                 'key' => 'post_content_migrated',
                 'value' => true
                ),
            ),
        );

        $query = new WP_Query($post_args);

        if ($query->have_posts()) :
            $converted_posts = '';
        	while ($query->have_posts()) : $query->the_post();
        		$converted_posts .= '<div class="col-md-4">';
        		$converted_posts .= '<div class="card" style="width: 100%;">';
        		$converted_posts .= '<img src="' . get_field('post_featured_image') .  '" class="card-img-top" alt="...">';
        		$converted_posts .= '<div class="card-body">';
        		$converted_posts .= '<h5 class="card-title">' . get_the_title() . '</h5>';
        		$converted_posts .= '<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>';
        		$converted_posts .= '<a href="' . get_the_permalink() . '" class="btn btn-primary">View Post</a>';
        		$converted_posts .= '</div></div></div>';
        	endwhile;

        	echo $converted_posts;
        endif;
        ?>

        <?php
        $cats = get_categories();
        var_dump($cats);
        ?>

    </div>
</div>



<?php get_footer(); ?>
