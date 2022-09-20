<?php
$post_id = get_the_ID();

if (get_field('use')) {

    echo return_formatted_component_options($post_id);

}

