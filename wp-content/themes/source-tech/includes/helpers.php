<?php
//region Global
function get_formatted_server_title($post_id) {
    $type = get_post_type($post_id);
    if ($type === "servers") {
        $form_factor = get_post_type(get_the_ID()) === 'servers' ? get_field('post_servers_size', get_the_ID()) : "";
        $form = isset($form_factor) ? $form_factor : '';
        $type = isset(get_the_terms($post_id,'server_types')[0]) ? get_the_terms($post_id,'server_types')[0]->name : '';

        return trim(get_the_title() . ' ' . $form . ' ' . $type . ' Server');
    }
}
function get_formatted_post_type($post_id) {
    $type = get_post_type($post_id);
    switch ($type) {
        case "servers":
            return "Server";
    }
}
function remove_spaces_from_string($string) {
    return str_replace(' ', '_', trim($string));
}
function array_sort($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}

function return_season_of_year()
{
    $today = new DateTime();

    $spring = new DateTime('March 20');
    $summer = new DateTime('June 20');
    $fall = new DateTime('September 22');
    $winter = new DateTime('December 21');

    switch(true) {
        case $today >= $spring && $today < $summer:
            return 'Spring';

        case $today >= $summer && $today < $fall:
            return 'Summer';

        case $today >= $fall && $today < $winter:
            return 'Fall';

        default:
            return 'Winter';
    }
}
function return_only_numbers($model)
{
    return preg_replace('/\D/', '', $model);
}

function explode_content($delimiter, $content)
{
    $formatted = explode($delimiter, $content);
    $formatted = array_map('trim', $formatted);

    return $formatted;
}

function get_first_section($content, $delimeter = "")
{
    $needle = !empty($delimeter) ? $delimeter : '.';

    $needle_offset = strlen($needle);

    $pos = strpos($content, $needle);

    return substr($content, 0, $pos + $needle_offset);
}

function get_truncated_string($str, $chars, $to_space, $replacement="...")
{
    if($chars > strlen($str)) return $str;

    $str = substr($str, 0, $chars);
    $space_pos = strrpos($str, " ");

    if($to_space && $space_pos >= 0)
        $str = substr($str, 0, strrpos($str, " "));

    return($str . $replacement);
}

function remove_character_from_end_of_string($string, $character)
{
    $result = rtrim($string, $character);

    return str_pad($result, strlen($string) - 1, $character);
}

//endregion

function get_repeater_field_row($repeater_field, $row_index, $sub_field, $post_id)
{
    $rows = get_field($repeater_field, $post_id);
    $row_index = $row_index - 1;

    if ($rows) {
        $repeater_field_row = $rows[$row_index];
        $repeater_field = $repeater_field_row[$sub_field];
    }

    return $repeater_field;
}
//region WordPress

function get_first_category($post_id)
{
    $categories = get_the_category($post_id);
    return $categories[0];
}

function get_tax_terms($tax)
{
    $terms = get_terms(array(
        'taxonomy' => $tax,
        'hide_empty' => true
    ));

    return $terms;
}
function get_server_manufacturer_logo($title)
{
    $logo = [];

    if (strpos(strtoupper($title), 'HP') !== false || strpos(strtoupper($title), 'HPE') !== false) {
        $logo['image'] = '/wp-content/uploads/2020/05/HPE.jpg';
        $logo['class'] = 'w-50';
    }

    if (strpos(strtoupper($title), 'DELL') !== false) {
        $logo['image'] = '/wp-content/uploads/2020/05/Dell-Logo.png';
        $logo['class'] = 'w-25';
    }

    if (strpos(strtoupper($title), 'SUN') !== false || strpos(strtoupper($title), 'SUN/ORACLE') !== false) {
        $logo['image'] = '/wp-content/uploads/2020/05/Sun-Oracle-Logo-Space.jpg';
        $logo['class'] = 'w-25';
    }

    if (strpos(strtoupper($title), 'LENOVO') !== false) {
        $logo['image'] = '/wp-content/uploads/2020/11/Logo-Lenovo.png';
        $logo['class'] = 'w-50';
    }

    return $logo;
}
function get_form_factor_size($post_id)
{
    $size = wp_get_post_terms($post_id, 'size');

    if (is_array($size) && !empty($size)) {

        return $size[0]->name;

    }
}
function get_server_part_number($title = array())
{
    if (is_array($title)) {

        $title = array_slice($title, 2);

        return implode(" ", $title);

    }
}
function return_server_category_heading($cat_title)
{
    $heading = [];

    $cat_title_array = explode_content(" ", $cat_title);

    $heading['manufacturer'] = strtolower($cat_title_array[0]);

    $heading['description'] = 'We stock all models of ' . $cat_title . ' that streamline the workload for small businesses, departments and work-group environments as well as web, cloud and data center applications. ' . $cat_title_array[0] . ' servers are an ideal platform for enterprise-level Linux, Windows Server, and VMware operating systems.';
    
    return $heading;
}

function order_hpe_rack_servers($term_id, $taxonomy)
{
    $ordered_array = [];

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'term_id',
                'terms' => $term_id
            ),
        ),
    );

    $hp_racks = get_posts($args);

    foreach ($hp_racks as $post) {
        $title_explode = explode_content(" ", get_the_title());
        $part_number = get_server_part_number($title_explode);
        $hpe_explode = explode(" ", $part_number);

        foreach ($hpe_explode as $c) {
            preg_replace('/\D/', '', $c);
            $ordered_array[] = $c;
        }




//preg_replace('/\D/', '', get_the_title($post->ID)

//        $ordered_array[] = $hpe_explode;
    }





    return $ordered_array;
}
//endregion












