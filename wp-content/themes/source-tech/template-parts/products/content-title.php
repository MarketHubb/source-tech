<?php $title = ($post->post_type == 'servers') ? get_the_title() . ' Server' : get_the_title(); ?>

<?php $form_factor = get_post_type($post->ID) === 'servers' ? get_field('post_servers_size', $post->ID) : ""; ?>

<h1 class="mt-4 mb-3 fw-800 letter-tight lh-1" data-form="<?php echo $form_factor; ?>">
    <?php echo $title; ?>
</h1>

<?php if (get_field('post_servers_description')) { ?>
    <p class="my-4 pb-2"><?php the_field('post_servers_description'); ?></p>
<?php } ?>

<div class="mb-3 product-subtitle">

    <!-- Configuration Options -->
    <?php if( !have_rows('configurations')) { ?>

        <?php if (is_singular('storage')) { ?>

            <?php $warranty = is_single(3226) ? '3-Year Warranty' : '24-Month Warranty'; ?>
            <p class="text-secondary mb-4">
                <span><i class="fa-regular fa-check text-success me-2"></i>Factory Sealed</span>
                <span class="ps-4"><i class="fa-regular fa-check text-success me-2"></i><?php echo $warranty; ?></span>
                <span class="ps-4"><i class="fa-regular fa-check text-success me-2"></i>Free Ground Shipping</span>
            </p>

        <?php } ?>

    <?php }  ?>

</div>
