<div class="tab-pane fade show" id="specs" role="tabpanel" aria-labelledby="specs-tab">
    <h2 class="section-heading model-page-tab-content-heading">Details and Specs</h2>
    <?php
    $specs_subheading_field = 'global_' . $post->post_type . '_specs_subheading';
    $specs_subheading = replace_product_variable_in_string(get_field($specs_subheading_field, 'option'), $post->ID);
    ?>

    <p class="model-page-tab-content-subheading"><?php echo $specs_subheading; ?></p>

    <?php
    if ($post->post_type == 'servers') {
        get_template_part('template-parts/products/tab-content-specs-servers');
    } elseif ($post->post_type == 'networking') {
        get_template_part('template-parts/products/tab-content-specs-networking');
    }
    ?>

</div>