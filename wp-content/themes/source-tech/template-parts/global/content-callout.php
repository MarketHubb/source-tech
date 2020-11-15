<?php
$arg = wp_parse_args($args);

// Check if callout data is coming from a repeater field
if ($args['repeater'] && $args['repeater'] === true) {

    if( have_rows($args['custom_field']) ):
        $callout = '';
        while ( have_rows($args['custom_field']) ) : the_row();

            // Grab the specific callout from the repeater field
            if (get_sub_field('page_home_callout_name') === $args['callout_name']) {
                $orientation_class = $args['text_orientation'] == "left" ? '' : 'justify-content-end';
                $callout .= '<header class="masthead-callout" style="background-image: url(' . get_sub_field('page_home_callout_image') . ');">
                            <div class="container-fluid h-100">
                            <div class="wrapper">';
                $callout .= '<div class="row align-items-center h-100 py-2 ' . $orientation_class . '">';
                $callout .= '<div class="col-md-12 col-lg-7 z-index-1 py-5 px-md-3 px-lg-5">';
                $callout .= '<h1 class="text-white mb-0">' . get_sub_field('page_home_callout_heading_main');
                $callout .= '<span class="font-weight-lighter block">' . get_sub_field('page_home_callout_heading_sub') . '</span></h1>';
                $callout .= '<p class="text-white">' . get_sub_field('page_home_callout_description') . '</p>';
                $callout .= '<a href="' . get_sub_field('page_home_callout_link_url') . '" class="hero-btn">';
                $callout .= get_sub_field('page_home_callout_link_text') . '</a>';
                $callout .= '</div></div></div></div></header>';
            }
        endwhile;
        echo $callout;
    endif;
}
?>
