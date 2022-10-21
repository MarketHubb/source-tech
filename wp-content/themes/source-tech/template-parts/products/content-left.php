<!-- Title, Image, Custom Configure -->
<div class="col-md-7 p-md-4">

    <?php get_template_part('template-parts/products/content', 'tags'); ?>

    <?php get_template_part('template-parts/products/content', 'title'); ?>

    <?php $args = ['image_gallery_sub_field' => 'post_servers_images_image']; ?>

    <?php  get_template_part('template-parts/content', 'gallery', $args); ?>

</div>
