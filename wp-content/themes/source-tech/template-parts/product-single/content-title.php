<div class="mb-4 mb-md-5">
    <?php get_template_part('template-parts/products/content', 'tags'); ?>
</div>

<?php $form_factor = get_post_type(get_the_ID()) === 'servers' ? get_field('post_servers_size', get_the_ID()) : ""; ?>

<?php //$title = "Refurbished " . get_the_title() . ' ' . get_formatted_post_type(get_the_ID()) ?>
<?php $title = get_formatted_server_title(get_the_ID()); ?>

<h1 class="d-block d-md-none fw-bolder text-capitalize lh-sm  mb-3" data-form="<?php echo $form_factor; ?>"><?php echo $title; ?></h1>
<h1 class="d-none d-md-block fw-bolder text-capitalize lh-base  mb-3 pb-md-4" data-form="<?php echo $form_factor; ?>"><?php echo $title; ?></h1>

<?php get_template_part('template-parts/product-single/content', 'callouts', 'list'); ?>