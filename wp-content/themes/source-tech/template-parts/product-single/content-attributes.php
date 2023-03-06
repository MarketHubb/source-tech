<?php
if( have_rows('chassis') ):
    $configs = '<div class="my-2"><p><strong class="d-block d-md-inline">Available in:</strong> ';
    while ( have_rows('chassis') ) : the_row();
        if (get_row_index() !== 1) {
            $configs .= '<span class="px-1 px-md-2">|</span>';
        }
        $configs .= '<span>' . get_sub_field('max_drives') . ' bay (' . get_sub_field('form') . ')</span>';
    endwhile;
    $configs .= '</p></div>';
endif;
?>
<div class="callout-details d-none d-md-block p-md-4">
    <div class="my-2"><p><strong class="d-block d-md-inline">Condition:</strong> Refurbished</p></div>
    <div class="my-2"><p><strong class="d-block d-md-inline">Warranty:</strong> Free 2-year (with parts replacement)</p></div>
    <?php echo $configs; ?>
    <div class="my-2"><p><strong class="d-block d-md-inline">Typically ships:</strong> 2-5 days</p></div>
</div>
