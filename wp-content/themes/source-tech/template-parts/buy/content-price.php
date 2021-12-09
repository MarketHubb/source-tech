<div class="row align-items-center my-3">
    <div class="col">

            <div class="d-flex align-items-center">

            <?php if (array_key_exists('price', $args) && $args['price']) { ?>
                <h3 class="d-inline-block price-red mb-0"><?php echo '$' .  $args['price']; ?></h3>
            <?php } ?>

            <?php if (array_key_exists('callout', $args) && $args['callout']) { ?>
                <span class="text-secondary px-3">|</span><span class="text-success fw-bold"><?php echo $args['callout']; ?></span>
            <?php } ?>

            </div>

            <?php
            if (array_key_exists('features', $args) && $args['features']) {
                $features = '<div class="mt-3 mb-2">';
                foreach ($args['features'] as $feature) {
                    $features .= '<p class="mb-0 fst-italic"><i class="fa-regular fa-check text-success me-2"></i>';
                    $features .= $feature;
                    $features .= '</p>';
                }
                $features .= '</div>';
                echo $features;
            }
            ?>

    </div>
</div>
