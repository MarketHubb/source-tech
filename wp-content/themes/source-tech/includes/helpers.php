<?php
//region Global
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

//region WordPress
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
//endregion