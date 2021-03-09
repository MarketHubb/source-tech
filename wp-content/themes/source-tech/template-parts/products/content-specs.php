<?php $product_type = get_query_var('product_type'); ?>
<div class="container" id="specs">
    <div class="wrapper">
        <div class="row content">
            <div class="col-md-12 text-center mb-3">
                <h2>Details & Specs</h2>

                <?php if (get_field('pdf')) { ?>
                    <p class="mb-0 pb-0">Explore the custom configuration options available for the <?php echo get_the_title(); ?></p>
                    <a href="<?php echo get_field('pdf') ?>" class="hero-btn shadow text-link mb-5" download><i class="fas fa-file-pdf pr-2"></i> Download Manufacturer Spec Sheet</a>
                <?php } else { ?>
                    <p class="">Explore the custom configuration options available for the <?php echo get_the_title(); ?></p>
                <?php } ?>

            </div>
            <div class="col-md-12">
                <table class="table" id="">
                    <tbody>
                    <?php
                    $specs_table = '';

                    // Output specs from taxonomies
                    $tax_specs = '';
                    foreach ($tags as $tag => $value) {
                        $no_output_tags = ['title', 'product'];

                        if (!in_array($tag, $no_output_tags)) {
                            if ($tag === 'Product Line') {
                                $tag = 'Model';
                            } elseif ($tag === 'Form Factor' && $product_type === 'Servers') {
                                $tag = 'Size';
                            }  elseif ($tag === 'Form Factor' && $product_type === 'Storage Array') {
                                $tag = 'Type';
                            }

                            $value = $value === 'Rackmount' ? 'Rack' : $value;

                            $tax_specs .= '<tr>';
                            $tax_specs .= '<th scope="row" class="w-50">' . $tag . ':</th>';
                            $tax_specs .= '<td>' . $value . '</td>';
                            $tax_specs .= '</tr>';
                        }

                    }
                    // Output specs from custom field
                    $post_specs = '';
                    if (have_rows('post_servers_specs')):
                        while (have_rows('post_servers_specs')) : the_row();
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
            </div>
        </div>
    </div>
</div>