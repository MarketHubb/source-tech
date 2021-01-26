<div class="container mb-3">
    <div class="wrapper">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <?php $category_clean = remove_character_from_end_of_string(get_queried_object()->name, 's'); ?>
                <h1 class="display-3 mt-3 mb-2 pb-2"><?php echo $category_clean; ?> Posts</h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="wrapper">

            <?php

            /*
             * 1. Hero banner
             * 2. Featured post
             * 3. Newly formatted posts
             * 4. Old posts (orderby date)
             *
             * */

            if ( have_posts() ) :
                $p = '<div class="row">';

                while ( have_posts() ) : the_post();
                    $p .= '<div class="col-md-6 my-4">';
                    $p .= '<div class="panel shadow h-100 blue-top bg-white ">';
                    $p .= '<a href="' . get_permalink() . '" class="panel-heading">';
                    $p .= '<h4 class="font-weight-bold"> ' . get_the_title() . '</h4></a>';
                    $dates = compare_published_updated_dates($post->ID);
                    foreach ($dates as $key => $val) {
                        $p .= '<p class="dib px-3 round mt-2 bg-light-blue"><small><i class="fas fa-calendar-week pr-2"></i>' . ucwords($key) . ': <strong>' . $val . '</strong></small></p><br>';
                    }

                    if (get_field('post_content_migrated', $post->ID)) {
                        $content_raw = wp_strip_all_tags(get_repeater_field_row('post_section', 1, 'post_section_content_body', $post->ID));
                        $hero_args = get_category_hero_args($post->ID);
                    } else {
                        $content_raw = wp_strip_all_tags(get_the_content());
                    }
                    $p .= get_truncated_string($content_raw, 300, true) . '<br>';
                    $p .= '<a href="' . get_permalink() . '" class="text-link">Read Article <i class="fas fa-long-arrow-right"></i></a>';
                    $p .= '</div></div>';
                endwhile;
                $p .= '</div>';
            endif;

            echo $p;
            ?>


    </div>
</div>
