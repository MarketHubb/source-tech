<?php
function get_server_attributes($id)
{
    $terms = get_formatted_product_terms($id);
    $server_attributes = [];

    if ($terms) {

        $server_attributes = array(
            'id' => $id,
            'oem' => $terms['Manufacturer'],
            'model' => $terms['Product Line'],
            'type' => $terms['Type'],
            'form' => $terms['Form Factor']
        );

    }

    return $server_attributes;
}

function check_option_for_this_server($post_id, $option)
{
    $option_check = null;
    $server_attributes = get_server_attributes($post_id);

    if (!empty($option['include']) && in_array($server_attributes['id'], $option['include'])) {
        $option_check = true;
    }

    return $option_check;
}

function get_chassis_options_for_server($post_id) {
    $chassis_rows = get_post_meta(get_the_ID(), 'chassis', true);

    if (get_field('enable_custom', $post_id) && $chassis_rows > 0) {
        $chassis = [];
        $chassis['icon'] = get_home_url() . '/wp-content/uploads/2022/08/Chassis.svg';
        $chassis['optional'] = false;

        if( have_rows('chassis', $post_id) ):

            while ( have_rows('chassis', $post_id) ) : the_row();
                $chassis['options'][] = array(
                  'name' => get_sub_field('name', $post_id),
                  'price' => get_sub_field('price', $post_id)
                );

            endwhile;

        endif;
    }

    return $chassis ?: null;
}

function get_all_server_component_options($post_id) {
    $components = [];

    $chassis_options = get_chassis_options_for_server($post_id);
    if ($chassis_options) {
        $components['Chassis'] = $chassis_options;
    }

    $component_args = array(
        'post_type' => 'component',
        'order' => 'ASC',
        'posts_per_page' => -1,
        'suppress_filters' => false
    );

    $query = new WP_Query($component_args);

    if ($query->have_posts()) :

        while ($query->have_posts()) : $query->the_post();
            $name = get_the_title();
            $components[$name] = array(
                'icon' => get_field('icon'),
                'optional' => get_field('optional'),
                'step_size' => get_field('step_size'),
                'maximum' => get_field('maximum')
            );

            if( have_rows('options') ):

                while ( have_rows('options') ) : the_row();

                    if (get_sub_field('active')) {
                        $options_array = array(
                            'name' => get_sub_field('name'),
                            'price' => get_sub_field('price'),
                            'include' => get_sub_field('include_for'),
                            'oems' => get_sub_field('oems'),
                            'types' => get_sub_field('types'),
                            'excluded' => get_sub_field('excluded_products'),
                            'min_sockets' => get_sub_field('min_sockets')
                        );

                        if (check_option_for_this_server($post_id, $options_array)) {
                            $components[$name]['options'][] = $options_array;
                        }

                    }

                endwhile;
            endif;

        endwhile;

    endif; wp_reset_postdata();

//    if ($chassis_options) {
//        $components['Chassis'][] = get_chassis_options_for_server($post_id);
//    }

    return $components;
}

function get_all_server_components($post_id) {
    $component_options = get_all_server_component_options($post_id);

    $c = '<ul>';
    foreach ($component_options as $key => $val) {

        if (!empty($val['options'])) {
            $c .= '<li>';

            if ($val['icon']) {
                $c .= '<img src="' . $val['icon'] . '" class="component-list-icon me-2"/>';
            }

            $c .= '<p class="component-list-name d-inline-block fw-bold">' . $key;
            $c .= '</p></li>';
        }
    }

    $c .= '</ul>';

    return $c;
}

function return_formatted_component_summary($post_id) {
    $components = get_all_server_component_options($post_id);
    $li = '';

    foreach ($components as $key => $val) {
        $component_clean = str_replace(' ', '_', trim($key));

        if ($val['options']) {
            $li .= '<ul class="summary-list lst-none ps-0 flush d-none small mb-1" data-type="' . $component_clean . '" ';
            $li .= 'id="summary_' . trim($component_clean) . '">';
            $li .= '<li class="summary-component">';
            $li .= '<p class="mb-0">';
            $li .= '<img src="' . $val['icon'] . '" class="summary-icon me-2" />';
            $li .= '<span class="summary-name fw-bold">' . $key . '</span>';
            $li .= '<span class="summary-price ms-2">|</span>';
            $li .= '</p></li>';
            $li .= '<li class="summary-option small"><p class="mb-0">|</p></li>';
            $li .= '</ul>';
//            $li .= '<li class="summary-options small d-none" data-type="' . $component_clean . '" ';
//            $li .= 'data-icon="' .  $val['icon'] . '"></li>';
        }

    }

    return $li;
}

function return_formatted_component_options($post_id) {
    $components = get_all_server_component_options($post_id);

    $form = '<div class="form-container panel pt-0">';
    $form .= '<div class="alert alert-primary py-2 mb-5 text-center" role="alert">';
    $form .= '<img src="' . get_home_url() . '/wp-content/uploads/2022/07/Chat.svg" class="configure-chat-icon"/>';
    $form .= '<p class="d-inline-block ms-3 mb-0 text-body"><span class="fw-bold">Need help with your order?</span> Our server support team is online</p>';
    $form .= '</div>';

    foreach ($components as $key => $val) {
        if ($val['options']) {
            $component_clean = str_replace(' ', '_', trim($key));
            $form .= '<div class="row mb-3 config-container ' . $component_clean . '" ';

            if ($val['maximum'] && $val['step_size']) {
                $form .= 'data-max="' . $val['maximum'] . '" data-step="' . $val['step_size'] . '" ';
            }

            $form .= 'data-row="1" data-type="' . $component_clean . '">';
            $form .= '<label for="' . $component_clean . '" class="col-md-5 form-label fw-bold">';

            if (!empty($val['icon'])) {
                $form .= '<img src="' . $val['icon'] . '" class="component-icon me-3"/>';
            }

            $form .= '<span class="component-name">' . $key . '</span></label>';

            $form .= '<div class="col-md-7">';
            $form .= '<i class="fa-solid fa-circle-check float-end option-selected-icons text-success"></i>';

            $form .= '<div class="input-group mb-3">';
            $form .= '<select id="' . $component_clean . '" class="form-select option-select" aria-label="Default select ">';


            $form .= '<option value="default">-- Select ' . $key . ' --</option>';

            $i = 1;
            foreach ($val['options'] as $option) {
                $option_clean = str_replace('"', ' Inch', trim($option['name']));
                $option_clean_no_spaces = str_replace(' ', '_', trim($option_clean));
                $form .= '<option id="' . $component_clean . '_' . $i . '" ';
                $form .= 'data-name="' . $option_clean_no_spaces . '" ';
                $form .= 'data-row="' . $i . '" ';
                $form .= 'data-price="' . $option['price'] . '" ';

                if ($key === 'Memory') {
                    $form .= 'data-minsocket="' . $option['min_sockets'] . '" ';
                }

                $form .= 'value="' . $option_clean_no_spaces . '">';
                $form .= trim($option['name']) . '  +$' . $option['price'] . '</option>';

                $i++;
            }

            $form .= '</select>';

            $form .= '</div></div></div>';
        }

    }

    $form .= '</div>';

    return $form;

}
