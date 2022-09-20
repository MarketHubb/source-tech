<?php $title = ($post->post_type == 'servers') ? get_the_title() . ' Server' : get_the_title(); ?>

<h1 class="mt-4 mb-4 fw-800 letter-tight lh-1"><?php echo $title; ?></h1>

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
