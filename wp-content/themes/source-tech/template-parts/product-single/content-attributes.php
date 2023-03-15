<?php
if( have_rows('chassis') ):
    $configs = '<div class="my-0"><p><strong class="d-block d-md-inline">Available in:</strong> ';
    while ( have_rows('chassis') ) : the_row();
        if (get_row_index() !== 1) {
            $configs .= '<span class="px-1 px-md-2">|</span>';
        }
        $configs .= '<span>' . get_sub_field('max_drives') . ' bay (' . get_sub_field('form') . ')</span>';
    endwhile;
    $configs .= '</p></div>';
endif;
?>
<div class="product-attributes mt-2 mb-2 mb-md-4 px-4 mx-auto">
    <span class="small"><strong class="">Condition:</strong> Refurbished</span>
    <span class="small"><strong class="">Ships:</strong> 2-5 days</span>
    <span class="small d-none d-md-inline"><strong class="">Warranty:</strong> 2 year</span>
</div>
<div class="callout-details d-none p-md-4">
    <div class="my-0"><p><strong class="d-block d-md-inline">Condition:</strong> Refurbished</p></div>
    <div class="my-0"><p><strong class="d-block d-md-inline">Warranty:</strong> Free 2-year (with parts replacement)</p></div>
    <?php echo $configs; ?>
    <div class="my-0"><p><strong class="d-block d-md-inline">Typically ships:</strong> 2-5 days</p></div>
</div>
