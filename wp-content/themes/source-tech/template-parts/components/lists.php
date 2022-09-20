<?php
// TEST: Component Options:

// 1. Get current product ID and product cat
$product_id = get_the_ID();
$product_cats = get_the_terms($product_id, 'product_line');

// 2. Get component cats
$component_cats = get_terms('component_categories');

// 3. Get all posts for tax
foreach ($component_cats as $component_cat) {
    $component_args = array(
        'post_type' => 'component',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'component_categories',
                'field'    => 'term_taxonomy_id',
                'terms'    => $component_cat->term_id,
            ),
        ),
    );

    $query = new WP_Query($component_args);

    if ($query->have_posts()) :
        $component_name_clean = strtolower(str_replace(' ', '_', $component_cat->name));

        $components  = '<div class="my-3 py-3">';
        $components .= '<div class="row justify-content-between">';
        $components .= '<div class="col-sm-7 col-md-5">';
        $components .= '<label for="' . $component_name_clean . '" class="form-label fw-bold fs-5">' . $component_cat->name . '</label>';
        $components .= '</div><div class="col-sm-5 col-md-4 col-lg-3">';
        $components .= '<div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant[1]">
                  <i class="fa-solid text-blue fa-circle-minus"></i>
                </button>
                </span>
                <input type="text" name="quant[1]" class="no-border form-control input-number text-center text-black fw-bold" value="1" min="1" max="10">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <i class="fa-solid text-blue fa-circle-plus"></i>
                </button>
                </span>
            </div>';
        $components .= '</div></div><div class="col-sm-12">';

        $components .= '<select id="' . $component_name_clean . '" class="form-select" id="' . $component_cat->name . '" aria-label="Default select">';
        while ($query->have_posts()) : $query->the_post();
            $components .= '<option value="' . get_the_ID() . '">';
            $components .= trim(get_the_title()) . ' (' . trim(get_field('description')) . ') +$' . get_field('unit_price');
            $components .= '</option>';
        endwhile;
        $components .= '</select>';
        $components .= '</div></div>';

        echo $components;
    endif; wp_reset_postdata();
}
