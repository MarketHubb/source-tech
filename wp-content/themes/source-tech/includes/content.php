<?php
function return_product_single_button($post_id, $btn_text)
{
    $btn  = '<button type="button" class=" cta-btn cta-btn-large cta-btn-primary shadow" ';
    $btn .= 'data-bs-toggle="modal" data-bs-target="#quoteModal" data-product="';
    $btn .= get_the_title($post_id) .  '">' . $btn_text . '<i class="fas fa-long-arrow-right ps-2"></i></button>';

    return $btn;
}
function return_brand_image_path($manufacturer)
{
    $root_path = get_home_url() . '/wp-content/uploads/';

    if ($manufacturer === 'Dell') {
        return $root_path . '2020/05/Dell-Logo.png';
    } elseif ($manufacturer === 'EMC') {
        return $root_path . '2020/11/Logo-EMC.png';
    }

}

function get_list_content($content) {

    $content = explode("\n", $content);
    $content = array_map('trim', $content);

    if( is_array($content) ) {

        $list = '<ul class="list-group list-group-flush m-0">';

        foreach( $content as $list_item ) {
            $list .= '<li class="list-group-item font-weight-bold">' . $list_item . '</li>';
        }

        $list .= '</ul>';

        return $list;
    }
}

function return_alternate_content($args=array())
{
    $content = '';

    if (isset($args['product_image'])) {

        $content .= '<img src="' . $args['product_image'] . '" class="alternate-product-image mb-4" />';

    }

    if ($args['content_type'] === 'list') {

        $content .= get_list_content($args['content']);
    }

    return $content;

}

function return_alternate_content_section_heading($args=array())
{
    $heading = [];

    if (isset($args['image'])) {
        $heading['image'] = '<img src="' . $args['image'] . '" class="alternate-heading-image" />';
    }

    if (isset($args['heading'])) {
        $heading['heading'] = '<h2 class="font-weight-bold">' . $args['heading'] . '</h2>';
    }

    if (isset($args['description'])) {
        $heading['description'] = '<p class="lead">' . $args['description'] . '</p>';
    }

    return $heading;
}
function return_hero_gradient($direction="", $custom_gradient="")
{
    $gradient_direction = !empty($direction) ? $direction : 'bottom';
    $gradient_values = !empty($custom_gradient) ? $custom_gradient : 'rgba(0,0,0,0.8) 0%,rgba(0,0,0,0.8) 100%)';
    $gradient  = 'linear-gradient(to ' . $gradient_direction . ',';
    $gradient .= $gradient_values;

    return $gradient;
}

function get_category_hero_args($post_id)
{
    $image = get_field('post_featured_image', $post_id);
    $gradient = return_hero_gradient();

    // Args
    $hero_args = array(
        'hero' => true,
        'image' => $image,
        'text_align' => 'left',
        'heading' => get_the_title($post_id),
        'gradient' => $gradient
    );

    return $hero_args;
}
