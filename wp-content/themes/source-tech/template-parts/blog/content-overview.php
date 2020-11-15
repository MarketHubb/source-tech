<?php $categories = get_the_category(); ?>
<div class="bg-blue-grey">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="post-content-section post-overview">
                    <h3>Post Overview</h3>
                    <?php if (get_field('pos_quick_read')) { ?>
                        <p><strong>Quick Read: </strong><?php the_field('pos_quick_read'); ?></p>
                    <?php } ?>
                    <?php if (get_field('post_read_time')) { ?>
                        <p><strong>Read Time: </strong><?php the_field('post_read_time'); ?> minutes</p>
                    <?php } ?>
                    <?php if (!empty($categories)) { ?>
                        <p><strong>Posted In: </strong>
                        <?php
                        foreach ($categories as $category) {
                            echo $category->name;
                        }
                        ?>
                    <?php } ?>
                        </p>
                    <?php
                    if( have_rows('post_products_covered') ):
                        $products = '<p><strong>Models Covered: </strong>';
                        while ( have_rows('post_products_covered') ) : the_row();
                            $products .= '<a href="' . get_permalink(get_sub_field('post_products_covered_product_id')) . '" class="product-links">';
                            $products .= get_the_title(get_sub_field('post_products_covered_product_id'));
                            $products .= '</a>';
                        endwhile;
                    endif;
                    $products .= '</p>';
                    echo $products;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
