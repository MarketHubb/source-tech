<?php
$tags = get_query_var('tags');
$title = ($post->post_type == 'servers') ? get_the_title() . ' Server' : get_the_title();
?>

<div class="row justify-content-between model-page-title custom-container-section">
    <div class="col-sm-12 col-md-6 col-lg-8">
        <h1 class="page-title"><?php echo $title; ?></h1>
        <?php
        $manu_term = get_the_terms($post->ID, 'server_manufacturers');
        $model_term = get_the_terms($post->ID, 'product_line');
        $subtitle = 'Refurbished & tested ' . $manu_term[0]->name . ' ' . $model_term[0]->name . ' servers that are configured to order';
        ?>
        <h6 class="server-title-abstract mb-3"><?php echo $subtitle; ?></h6>
        <?php
        foreach ($tags as $tag => $value) {
            if ($tag != 'title' && $tag != 'product') {
                $tag_items .= '<span class="badge badge-pill badge-primary model-page-tags">' . $value . '</span>';
            }
        }

        echo $tag_items;
        ?>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4">
        <?php
        set_query_var('manufacturer',$tags['Manufacturer']);
        get_template_part('template-parts/content', 'cta' );
        ?>
    </div>
</div>
