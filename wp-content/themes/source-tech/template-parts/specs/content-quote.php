<!-- Max Specs -->
<?php
if( have_rows('post_servers_specs') ):
    $s  = '<div class="d-grid gap-1 bg-light border rounded p-4">';
    $s .= '<h5 class="mb-2 text-center d-inline-block border-bottom border-1 pb-2">' . get_sub_field('configuration_label')[0] . ' Configuration Spec</h5>';
    $s .= '<table class="table table-borderless">';
    $s .= '<tbody>';
    $exclude = ['Storage Controllers', 'Dimensions', 'Weight', 'I/O Expansion'];
    while ( have_rows('post_servers_specs') ) : the_row();
        if (!in_array(get_sub_field('post_servers_specs_label'), $exclude)) {

            if (get_sub_field('post_servers_specs_label') == 'Processors') {
                $label = 'CPU';
            } elseif (get_sub_field('post_servers_specs_label') == 'Drive Bays/Storage') {
                $label = 'Drives';
            } else {
                $label = get_sub_field('post_servers_specs_label');
            }

            $s .= '<tr>';
            $s .= '<th scope="row">' . $label . '</th>';
            $s .= '<td>' . get_sub_field('post_servers_specs_value') . '</td>';
            $s .= '</tr>';
        }

        $label = get_sub_field('post_servers_specs_label');
        $value = get_sub_field('post_servers_specs_value');

    endwhile;
    $s .= '</tbody>';
    $s .= '</table>';
    $s .= '</div>';
    echo $s;
endif;
?>