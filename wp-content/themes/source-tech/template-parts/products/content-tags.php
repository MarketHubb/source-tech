<?php
$tags = get_query_var('tags');
if ($tags) {
    $tag_items = '';
    foreach ($tags as $tag => $value) {
        if ($tag != 'title' && $tag != 'product') {
            if ($value == 'HP') {
                $value = 'HPE';
            }
            $tag_items .= '<span class="badge rounded-pill bg-light border border-1 text-dark model-page-tags me-2">' . $value . '</span>';
        }
    } ?>

    <div class="mb-2"><?php echo $tag_items; ?></div>

<?php } ?>
