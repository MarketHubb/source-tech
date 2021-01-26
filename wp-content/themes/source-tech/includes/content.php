<?php
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
