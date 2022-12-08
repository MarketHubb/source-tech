<?php
function get_verification($var_name, $var_value, $var_code, $var_parent_code = "", $for_value = false) {
    $api_key = "jw7MEFIGaY52vntB7Nd4PkzRCQDzIbvVBTy5uHUc5ThUcYF2jpZAEVdKcMDC";
    $encodingval = htmlspecialchars($var_code . $var_parent_code . $var_name . $var_value);
    $label = ($for_value) ? $var_value : $var_name;
    return $label . '||' . hash_hmac('sha256', $encodingval, $api_key) . ($var_value === "--OPEN--" ? "||open" : "");
}



