<div class="container">
    <div class="row mt-4 mb-5 pt-3">

            <!-- Title, Image, Custom Configure -->
            <div class="col-md-7 pe-md-3 pe-lg-5">

                <?php get_template_part('template-parts/products/content', 'tags'); ?>

                <?php get_template_part('template-parts/products/content', 'title'); ?>

                <?php
                $args = ['image_gallery_sub_field' => 'post_servers_images_image'];
                get_template_part('template-parts/content', 'gallery', $args);
                ?>
                
                <?php
                $options = get_all_server_component_options(get_the_ID());
                if (get_field('enable_custom')) {
                    get_template_part('template-parts/products/content', 'components');
                } ?>

            </div>
