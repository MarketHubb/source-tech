<?php $categories = get_the_category(); ?>

<div class="container-fluid" id="single-post">
    <div class="wrapper">
        <div class="row">
            <div class="col shadow">
                <div class="px-sm-3 px-md-4 px-lg-5 py-2">

                <?php
                if (!get_field('post_content_migrated')) {
                    echo get_the_content();
                } else {
                    if( have_rows('post_section') ):
                        $content = '';
                        if( have_rows('post_overview') ):
                            $content .= '<div id="post-overview">';
                            $content .= '<ul>';
                            while ( have_rows('post_overview') ) : the_row();
                                $content .= '<li>' .get_sub_field('post_overview_bullet') . '</li>';
                            endwhile;
                            $content .= '</ul></div>';
                        endif;


                        while ( have_rows('post_section') ) : the_row();

                            if (get_sub_field('post_section_content_heading')) {
                                $content .= '<h3 class="display-4 font-weight-bold my-4">' . get_sub_field('post_section_content_heading') . '</h3>';
                            }

                            if (get_sub_field('post_section_content_type') == 'Text') {
                                $content .= get_sub_field('post_section_content_body');
                            }

                            if (get_sub_field('post_section_content_type') == 'Callout') {
                                $content .= '<div class="post-callout bg-blue-grey">';
                                $content .= '<p class="lead font-weight-bold">' . get_sub_field('post_section_callout') . '</p>';
                                $content .= '</div>';
                            }

                            if (get_sub_field('post_section_content_type') == 'Images') {
                                $row_count = 12 / count(get_sub_field('post_section_images'));

                                if( have_rows('post_section_images') ):
                                    $content .= '<div class="row post-images">';
                                    while ( have_rows('post_section_images') ) : the_row();
                                        $content .= '<div class="col-md-' . $row_count . '">';
                                        $content .= '<div class="text-center">';
                                        $content .= '<img src="' . get_sub_field('post_section_images_image') . '" />';
                                        $content .= '</div>';
                                        $content .= '<p>' . get_sub_field('post_section_images_description') . '</p>';
                                        $content .= '</div>';
                                    endwhile;
                                    $content .= '</div>';

                                endif;

                            }
                        endwhile;
                    endif;

                    echo $content;
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
