<?php // Template Name: Servers: Test

get_header(); ?>

<div class="container-fluid">
    <div class="wrapper">
        <div class="row">
            <div class="col-md-12">

                <?php
                $query_args = array(
                    'post_type' => ['servers', 'product'],
                    'posts_per_page' => -1,
                );

                $query = new WP_Query($query_args);

                if ($query->have_posts()) :
                	while ($query->have_posts()) : $query->the_post();

                        if (strpos(get_the_title(), "Dell") !== false) { ?>
                    <p class="strong">Full name: <?php echo get_the_title(); ?></p>
                    <p class="strong">Model number: <?php echo return_only_numbers(get_the_title()); ?></p>
                    <hr />

                <?php
                    }
                	endwhile;
                endif;
                ?>


            </div>
        </div>
    </div>
</div>



<?php get_footer();

