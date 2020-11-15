<table class="table" id="model-specs-table">
    <tbody>
    <?php
    $specs_table = '';

    // Output specs from taxonomies
    $tax_specs = '';
    foreach ($tags as $tag => $value) {
        $tax_specs .= '<tr>';
        $tax_specs .= '<th scope="row">' . $tag . ':</th>';
        $tax_specs .= '<td>' . $value . '</td>';
        $tax_specs .= '</tr>';
    }
    // Output specs from custom field
    $post_specs = '';
    if( have_rows('post_servers_specs') ):
        while ( have_rows('post_servers_specs') ) : the_row();
            $post_specs .= '<tr>';
            $post_specs .= '<th scope="row">' . get_sub_field('post_servers_specs_label') . ':</th>';
            $post_specs .= '<td>' . get_sub_field('post_servers_specs_value') . '</td>';
            $post_specs .= '</tr>';
        endwhile;
    endif;

    $specs_table = $tax_specs . $post_specs;

    echo $specs_table;
    ?>
    </tbody>
</table>