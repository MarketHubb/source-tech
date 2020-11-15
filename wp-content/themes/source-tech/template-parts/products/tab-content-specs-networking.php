<table class="table" id="model-specs-table">
    <thead>
    <tr>
        <th scope="col">Model</th>
        <th scope="col">Total 10/100/1000 or SFP or SFP+ ports</th>
        <th scope="col">Power Supply</th>
        <th scope="col">Available PoE Power</th>
        <th scope="col">IOS Image</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php 
        if( have_rows('post_networking_specs') ):
            $network_table = '';
            while ( have_rows('post_networking_specs') ) : the_row();
                $network_table .= '<tr>';
                $network_table .= '<td>' . get_sub_field('post_networking_specs_model') . '</td>';
                $network_table .= '<td>' . get_sub_field('post_networking_specs_total_101001000_or_sfp_or_sfp+_ports') . '</td>';
                $network_table .= '<td>' . get_sub_field('post_networking_specs_power_supply') . '</td>';
                $network_table .= '<td>' . get_sub_field('post_networking_specs_available_poe_power') . '</td>';
                $network_table .= '<td>' . get_sub_field('post_networking_specs__ios_image') . '</td>';
                $network_table .= '</tr>';
            endwhile;
            echo $network_table;
        endif;
        ?>

    </tbody>
</table>