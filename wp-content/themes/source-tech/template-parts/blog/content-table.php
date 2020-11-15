<table class="table post-table">
    <tbody>
    <?php
        $table_repeater = get_field('post_content_sections');
        if ($table_repeater[0]['post_content_sections_table_columns'] == 2) {
            $table_rows = 2;
            $table_sub_field = 'post_content_sections_table_rows_2';
            $table_sub_fields_array = array('post_content_sections_table_rows_2_label', 'post_content_sections_table_rows_2_value');
        } else {
            $table_rows = 3;
            $table_sub_field = 'post_content_sections_table_rows_3';
            $table_sub_fields_array = array('post_content_sections_table_rows_3_label', 'post_content_sections_table_rows_3_value_1', 'post_content_sections_table_rows_3_value_2');
        }

        $specs_table = '';

        // Output specs from custom field
        if (have_rows('post_content_sections')):
            while (have_rows('post_content_sections')) : the_row();
                if (get_row_index() === 1) {
                    if (have_rows('$table_sub_field')):
                        while (have_rows('$table_sub_field')) : the_row();
                            $specs_table .= '<tr>';
                            $specs_table .= '<th scope="row">' . get_field(reset($table_sub_fields_array)) . ':</th>';
                            $table_sub_fields_values_array = array_shift($table_sub_fields_array);

                            foreach ($table_sub_fields_values_array as $val) {
                                $specs_table .= '<td>' . get_sub_field($val) . '</td>';
                            }

                            $specs_table .= '</tr>';
                        endwhile;
                    endif;
                }
            endwhile;
        endif;

        echo  $specs_table;
    ?>
    </tbody>
</table>