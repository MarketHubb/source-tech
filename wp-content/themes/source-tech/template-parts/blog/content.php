<?php $categories = get_the_category(); ?>

<div class="container-fluid" id="single-post">
    <div class="wrapper">
        <div class="row">
            <div class="col shadow">

                <?php
                if (!get_field('post_content_migrated')) {
                    the_content();
                } else {
                    if( have_rows('post_section') ):
                        $content = '';
                        if( have_rows('post_overview') ):
                            $content .= '<div class="post-content-section px-5" id="post-overview">';
                            $content .= '<ul>';
                            while ( have_rows('post_overview') ) : the_row();
                                $content .= '<li>' .get_sub_field('post_overview_bullet') . '</li>';
                            endwhile;
                            $content .= '</ul></div>';
                        endif;


//                        $content .= '<div class="row">';
                        while ( have_rows('post_section') ) : the_row();
                            $content .= '<div class="post-content-section px-5">';
                            $section_heading = get_sub_field('post_section_content_heading');

                            if ($section_heading) {
                                $content .= '<h3>' . $section_heading . '</h3>';
                            }


                            if (get_sub_field('post_section_content_type') == 'Text') {
                                $content .= get_sub_field('post_section_content_body');
                            }
                            if (get_sub_field('post_section_content_type') == 'Callout') {
                                $content .= '<div class="post-callout bg-blue-grey">';
                                $content .= '<p>' . get_sub_field('post_section_callout') . '</p>';
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
                            $content .= '</div>';
                        endwhile;
//                        $content .= '</div>';
                    endif;
                    echo $content;
                }
                ?>

            </div>
        </div>
    </div>
</div>
