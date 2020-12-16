<div class="container">
    <div class="wrapper">
        <div class="row content align-items-center justify-content-between">
            <div class="col-md-6">
                <div id="model-page-image-container">
                    <?php
                    $images_repeater_field = 'post_' . $post->post_type . '_images';
                    $images_sub_field = 'post_' . $post->post_type . '_images_image';

                    if (have_rows($images_repeater_field)):
                        $i = 1;
                        $images = '<div class="row image-thumb-container">';
                        while (have_rows($images_repeater_field)) : the_row();
                            if ($i === 1) {
                                $image_class = ' active';
                                $load_image = '<img src="' . get_sub_field($images_sub_field) . '" class="model-page-featured-image" />';
                            } else {
                                $image_class = ' ';
                            }
                            $images .= '<div class="col-4 col-sm-4 col-md-4 thumb-images' . $image_class . '">';
                            $images .= '<img src="' . get_sub_field($images_sub_field) . '" class="img-thumbnail rounded" />';
                            $images .= '</div>';

                            $i++;
                        endwhile;
                        $images .= '</div>';
                    endif;

                    echo $load_image;
                    echo $images;
                    ?>
                </div>
            </div>
            <div class="col-md-5">

                <div class="">
                    <?php
                    if (get_field('post_servers_description_lead')) {
                        $description_lead = get_field('post_servers_description_lead');
                    } else {
                        $description_lead = get_the_title() . ' Overview';
                    }

                    $description = 'post_' . $post->post_type . '_description';
                    ?>
                    <p class="lead"><strong><?php echo $description_lead; ?></strong></p>
                    <p class="mb-0"><?php echo get_field($description); ?></p>
                    <a href="#prevent" onclick='$zoho.salesiq.floatwindow.visible("show");' class="hero-btn shadow text-link">Get a
                        Quote Now</a>
                </div>
            </div>
        </div>
    </div>
</div>