<?php
function validate_chassis($server_id, $component, $option, $option_price) {
    if (count(get_field('chassis', $server_id)) >= 1 && get_field('enable_custom', $server_id)) {
        $server_components = ['Chassis' => true];
    }

    return !empty($server_components) ? $server_components : "failed";
}

function validate_options($server_id, $component, $option_name, $option_price) {
    $server_components = [];

    $components = get_posts(array(
        'post_type' => 'component',
        'name' => $component
    ));

    // We returned a single, matching component
    if (!empty($components) && count($components) === 1) {
        $option_fields = get_field('options', $components[0]->ID);

        foreach ($option_fields as $field) {
            // Name and price matches database values
            if ($field['name'] === $option_name && $field['price'] == $option_price) {
                $server_components = [$component => true];
                break;
            } else {
                // Doesn't match database
                $server_components = [$component => "failed"];
            }
        }

    }

    return !empty($server_components) ? $server_components : "failed";
}

function validate_custom_config_selections($post_id, $selections = array()) {
    if (is_array($selections)) {
        $validation = [];
        foreach ($selections as $selection) {
            $component = str_replace('_', ' ', $selection['component']);
            $option_name = stripslashes($selection['optionName']);
            $option_price = $selection['optionPrice'];

            if (strpos($option_name, 'No ') !== false) {
                $validation[] = [$component => true];
            } elseif ($component === 'Chassis') {
                $validation[] = validate_chassis($post_id, $component, $option_name, $option_price);
            } else {
                $validation[] = validate_options($post_id, $component, $option_name, $option_price);
            }

        }
    }

    return $validation;
}

function are_options_validated($validated_options_check = array()) {
    $validated = true;

    foreach ($validated_options_check as $option) {
        foreach ($option as $key => $val) {
            if ($val === "failed") {
                $validated = false;
                break;
            }
        }
    }

    return $validated;
}

function return_foxycart_hmac_link($post_id, $server_id, $selections, $server_qty) {
    $options_array = [];
    $total_price = 0;

    if (is_array($selections)) {
        foreach ($selections as $selection) {
            $component = str_replace('_', ' ', trim($selection['id']));
            $option_prefix = $selection['quantity'] > 1 ? $selection['quantity'] . 'x ' : '';
            $option = $option_prefix . stripslashes(trim($selection['optionName']));
            $option_name = $component . ' - ' . $option;
            $total_price += ($selection['quantity'] * $selection['optionPrice']);
            $options_array[$component] = $option;
        }
    }

    if (count($options_array) > 1 && $total_price > 0) {
        $product_code = trim($post_id) . '-' . trim($server_id);
        $model_id = trim(get_the_title($post_id));
        ksort($options_array);
        return return_foxycart_links($post_id, $options_array, $total_price, $model_id, $product_code, false, $server_qty);
    }

}

add_action('wp_ajax_verify_custom_config', 'verify_custom_config');
add_action('wp_ajax_nopriv_verify_custom_config', 'verify_custom_config');
function verify_custom_config()
{
    if (!empty($_POST['post_id']) && !empty($_POST['server_id']) && !empty($_POST['selections']) && !empty($_POST['server_quantity'])) {
        $post_id = $_POST['post_id'];
        $server_id = $_POST['server_id'];
        $selections = $_POST['selections'];
        $server_qty = $_POST['server_quantity'];

        $validated_options_check = validate_custom_config_selections($post_id, $selections);
        $options_are_validated = are_options_validated($validated_options_check);
        if ($options_are_validated) {
            $link = return_foxycart_hmac_link($post_id, $server_id, $selections, $server_qty);
        }

//        echo json_encode($link);
        echo $link;
        die();

    }
}

