<?php
function return_foxycart_links($post_id, $options, $price, $model)
{
    $image = get_repeater_field_row('post_servers_images', 1, 'post_servers_images_image', $post_id);
    $link  = '<form action="https://source-tech.foxycart.com/cart" method="post" accept-charset="utf-8">';
    $link .= '<input type="hidden" name="name" value="' . get_the_title($post_id) . '" />';
    $link .= '<input type="hidden" name="price" value="' . $price . '" />';
    $link .= '<input type="hidden" name="image" value="' . $image . '" />';

    foreach ($options as $key => $val) {
        if ($key !== 'Price') {
            $link .= '<input type="hidden" name="' . strtolower(str_replace(' ', '_', $key)) . '" value="' . $val . '" />';
        }
    }

    $link .= '<input type="submit" value="Add ' . $model . ' to Cart" class="submit" />';
    $link .= '</form>';

    return $link;
}
function return_price($price, $callout, $features=array())
{
    $p  = '<div class="row my-3">';
    $p .= '<div class="col">';
    $p .= '<div class="d-flex align-items-center mt-2 mb-3">';
    $p .= '<h3 class="d-inline-block price-red mb-0">' . $price . '</h3>';

    if ($callout) {
        $p .= '<span class="text-secondary px-3">|</span>';
        $p .= '<span class="text-success fw-bold">' .  $callout . '</span>';
    }
    $p .= '</div>';

    if ($features && !empty($features)) {
        $p .= '<div class="d-grid gap-1 mb-2">';
        foreach ($features as $feature) {
            $p .= '<p class="mb-0 fst-italic text-secondary"><i class="fa-solid fa-check text-success me-2"></i>';
            $p .= $feature;
            $p .= '</p>';
        }
        $p .= '</div>';
    }

    $p .= '</div></div>';

    return $p;
}
function return_cta_btn($btn_attributes=array())
{
    $button = '';
    if (array_key_exists('url', $btn_attributes)) {
        $button .= '<a href="' . $btn_attributes['url'] . '" ';
        $close_tag  = '</a>';
    } else {
        $button .= '<button type="button" ';
        $close_tag  = '</button>';
    }

    $button .= 'class="btn fw-600 shadow-sm modal-cta ';

    if (array_key_exists('type', $btn_attributes )) {
        $type_class = (strtolower($btn_attributes['type']) == 'primary') ? 'cta-btn-primary' : 'btn-outline-secondary';
        $button .= $type_class;
    }

    $button .= '"';

    if (array_key_exists('data', $btn_attributes)) {
        $button .= $btn_attributes['data'];
    }

    $button .= '>';
    $button .= $btn_attributes['text'];
    $button .= $close_tag;

    return $button;
}
function return_cta_btn_secondary($post_id)
{

}
