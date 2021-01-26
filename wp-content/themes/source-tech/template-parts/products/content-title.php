<?php
$tags = get_query_var('tags');
$title = ($post->post_type == 'servers') ? get_the_title() . ' Server' : get_the_title();
?>

<!-- Product Title -->

<div class="container">
    <div class="wrapper">
        <div class="row mt-4 pt-3">
            <div class="col">
                <?php
                $tag_items = '';
                foreach ($tags as $tag => $value) {
                    if ($tag != 'title' && $tag != 'product') {
                        $tag_items .= '<span class="badge badge-pill badge-primary model-page-tags">' . $value . '</span>';
                    }
                }
                echo $tag_items;
                ?>
                <h1 class="mt-1 mb-2 display-4"><?php echo $title; ?></h1>
                <p class="lead product-subtitle mb-0">
                    <span>Factory Tested</span>
                    <span>Configured to Order</span>
                    <span>24-Month Warranty</span>
                </p>
            </div>
        </div>
    </div>
</div>