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
        $chassis['icon'] = get_home_url() . '/wp-content/uploads/2022/10/Server-Chassis.svg';
        $chassis['optional'] = false;

        if( have_rows('chassis', $post_id) ):
                while ( have_rows('chassis', $post_id) ) : the_row();
                $chassis['options'][] = array(
                  'name' => get_sub_field('name', $post_id),
                  'price' => get_sub_field('price', $post_id),
                  'default_qty' => 1,
                  'max_drives' => get_sub_field('max_drives', $post_id)
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
            $default = get_field('default_quantity');
            $quantity = is_numeric($default) && $default > 1 ? $default : 1;
            $components[$name] = array(
                'icon' => get_field('icon'),
                'optional' => get_field('optional'),
                'step_size' => get_field('step_size'),
                'maximum' => get_field('maximum'),
                'default_qty' => $quantity
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
                            'excluded' => get_sub_field('excluded_products')
                        );

                        if (check_option_for_this_server($post_id, $options_array)) {
                            $components[$name]['options'][] = $options_array;
                        }

                    }

                endwhile;
            endif;

        endwhile;

    endif; wp_reset_postdata();

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

function return_summary_component_list($post_id) {
    $components = get_all_server_component_options($post_id);
    $li = '';

    foreach ($components as $key => $val) {
        if ($val['options']) {
            $component_clean = trim(str_replace(' ', '_', trim($key)));
            $li .= '<tr class="d-none px-3 ' . $component_clean . '" id="' . $component_clean . '" data-type="' . $component_clean . '">';
            $li .= '<th scope="row" class="ps-3">';
            $li .= '<p class="summary-name fw-bold small anti mb-0">' . $key . '</p>';
            $li .= '</th>';
            $li .= '<td class="align-middle">';
            $li .= '<p class="mb-0 summary-price"></p>';
            $li .= '</th></tr>';
        }

    }

    return $li;
}

function return_formatted_component_options($post_id) {
    $components = get_all_server_component_options($post_id);

    $form = '<div class="form-container panel pt-0">';
//    $form .= '<div class="alert alert-primary py-2 mb-5 text-center" role="alert">';
//    $form .= '<img src="' . get_home_url() . '/wp-content/uploads/2022/07/Chat.svg" class="configure-chat-icon"/>';
//    $form .= '<p class="d-inline-block ms-3 mb-0 text-body"><span class="fw-bold">Need help with your order?</span> Our server support team is online</p>';
//    $form .= '</div>';

    foreach ($components as $key => $val) {

        if ($val['options']) {

            $component_clean = str_replace(' ', '_', trim($key));
            $form .= '<div class="d-flex flex-row justify-content-end align-items-end config-option-container config-container ' . $component_clean . '" ';

            if ($val['maximum'] && $val['step_size']) {
                $form .= 'data-max="' . $val['maximum'] . '" data-step="' . $val['step_size'] . '" ';
            }

            $form .= 'data-row="1" data-type="' . $component_clean . '">';

            // Icon
            $form .= '<div class="me-md-4">';
            $form .= '<img src="' . $val['icon'] . '" class="mb-2 component-icon"/>';
            $form .= '</div>';
            // Label + Input (label hidden by default)
            $form .= '<div class="flex-grow-1">';
            $form .= '<p class="small ms-3 lh-1 py-1 px-2 mb-0 fw-bold bg-transparent rounded config-input-label"><i class="fa-sharp fa-solid fa-check pe-2"></i>' . $key . '</p>';
            $form .= '<div class="input-group mb-0">';
            $form .= '<select name="' . $component_clean . '" id="' . $component_clean . '" class="form-select option-select" aria-label="Default select ">';
            $form .= '<option class="text-end" value="default">-- Select ' . $key . ' --</option>';

            $i = 1;
            $options_ordered = array_sort($val['options'], 'price', SORT_ASC);

            // Ouput "No {component} for non-mandatory components
            if ($val['optional']) {
                $no_option = [
                    'name' => 'No ' . $key,
                    'price' => 0
                ];

                array_unshift($options_ordered, $no_option);
            }

            foreach ($options_ordered as $option) {

                $no_position = strpos($option['name'], 'No ');
                if ($no_position === false) {
                    $option['name'] = str_replace(trim($key), '', $option['name']);
                }

                $option_clean = str_replace('"', ' Inch', trim($option['name']));
                $option_clean_no_spaces = str_replace(' ', '_', trim($option_clean));
                $form .= '<option id="' . $component_clean . '_' . $i . '" ';
                $form .= 'class="text-end" ';
                $form .= 'data-name="' . $option_clean_no_spaces . '" ';
                $form .= 'data-row="' . $i . '" ';
                $form .= 'data-price="' . $option['price'] . '" ';

                if ($key === 'Memory') {
                    $form .= 'data-minsocket="' . $option['min_sockets'] . '" ';
                }

                $form .= 'value="' . $option_clean_no_spaces . '">';
                $form .= $option['name'] . '   $' . $option['price'] . '</option>';

                $i++;
            }

            $form .= '</select>';

            $form .= '</div></div></div>';
        }

    }

    $form .= '</div>';

    return $form;

}

function return_formatted_component_options_float_labels($post_id) {
    $components = get_all_server_component_options($post_id);
    $form = '<div class="form-container  pt-0">';
    foreach ($components as $key => $val) {

        if ($val['options']) {

            $component_clean = str_replace(' ', '_', trim($key));
            $form .= '<div class="row d-flex flex-row justify-content-end align-items-center mb-3 config-option-container config-container ' . $component_clean . '" ';

            $form .= 'data-row="1" data-type="' . $component_clean . '" ';
            $form .= 'data-quantity="' . $val['default_qty'] . '">';

            // Icon
            $form .= '<div class="col-1">';
            $form .= '<img src="' . $val['icon'] . '" class="mb-2 component-icon"/>';
            $form .= '</div>';
            // Label + Input (label hidden by default)
            $form .= '<div class="flex-grow-1 col-9">';
            $form .= '<div class="form-floating">';
            $form .= '<select name="' . $component_clean . '" id="' . $component_clean . '" class="form-select option-select" aria-label="Default select ">';
            $form .= '<option class="text-end" value="default">-- Select ' . $key . ' --</option>';

            $i = 1;
            $options_ordered = array_sort($val['options'], 'price', SORT_ASC);

            if ($val['optional']) {
                $no_option = [
                    'name' => 'No ' . $key,
                    'price' => 0
                ];
                array_unshift($options_ordered, $no_option);
            }

            foreach ($options_ordered as $option) {

                $no_position = strpos($option['name'], 'No ');
                if ($no_position === false) {
                    $option['name'] = str_replace(trim($key), '', $option['name']);
                }

                $option_clean = str_replace('"', ' Inch', trim($option['name']));
                $option_clean_no_spaces = str_replace(' ', '_', trim($option_clean));
                $form .= '<option id="' . $component_clean . '_' . $i . '" ';
                $form .= 'class="text-end" ';
                $form .= 'data-name="' . $option_clean_no_spaces . '" ';
                $form .= 'data-row="' . $i . '" ';
                $form .= 'data-price="' . $option['price'] . '" ';

                if ($component_clean === 'Chassis') {
                    $form .= 'data-drives="' . $option['max_drives'] . '" ';
                }

                $form .= 'value="' . $option_clean_no_spaces . '">';
                $form .= $option['name'] . '   $' . $option['price'] . '</option>';

                $i++;
            }
            $form .= '</select>';

            $label_text = $val['default_qty'] > 1 ? $key . ' (' . $val['default_qty'] . 'x)' : $key;
            $form .= '<label for="' . $component_clean . '">' . $label_text . '</label>';

            $form .= '</div></div>';
            $form .= '<div class="col-2">';

            if ($val['maximum'] > 1) {
                $form .= '<select class="form-select option-qty">';
                for ($i = 1; $i < 7; $i++) {
                    $form .= '<option value="' . $i . '">' . $i . '</option>';
                }
                $form .= '</select>';
                $form .= '<div class="text-center ">';
                $form .= '<i class="fa-regular fa-circle-plus add-option"></i>';
                $form .= '</div>';
            }

            $form .= '</div></div>';
        }

    }

    $form .= '</div>';

    return $form;

}
