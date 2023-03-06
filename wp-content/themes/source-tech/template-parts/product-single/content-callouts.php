<?php if ($args && $args === 'list') { ?>

    <div class="product-callouts my-4">
        <?php
        if( have_rows('callouts', 'option') ):
            $callouts = '';
            while ( have_rows('callouts', 'option') ) : the_row();
                $callouts .= '<div class="callout mb-2 mb-md-3 d-flex align-items-center">';
                $callouts .= '<img src="' . get_sub_field('icon') . '" class="callout-icon me-3" />';
                $callouts .= '<p class="d-inline fw-bold text-blue-700 anti mb-0 pb-1 lh-sm">' . get_sub_field('callout', 'option') . '</p>';
                $callouts .= '<p class="mb-0 d-none d-md-inline ps-1">- ' . get_sub_field('description', 'option') . '</p>';
                $callouts .= '</div>';
            endwhile;
            echo $callouts;
        endif;
        ?>
    </div>

<?php } ?>

<?php if ($args && $args === 'grid') { ?>

    <div class="product-callouts p-2 d-none d-md-block">
        <h5 class="text-blue-700 anti mt-4 py-2">Why more IT professionals choose SourceTech:</h5>
        <div class="row">
            <?php
            if( have_rows('callouts', 'option') ):
                $callouts = '';
                while ( have_rows('callouts', 'option') ) : the_row();
                    $callouts .= '<div class="col-md-6 mb-2 ">';
                    $callouts .= '<div class="rounded  h-100 text-center p-4">';
                    $callouts .= '<img src="' . get_sub_field('icon') . '" class="callout-icon mb-3" />';
                    $callouts .= '<p class="fw-bold text-blue-700 mb-0 pb-1 lh-sm">' . get_sub_field('callout', 'option') . '</p>';
                    $callouts .= '<p class="mb-0">' . get_sub_field('description', 'option') . '</p>';
                    $callouts .= '</div></div>';
                endwhile;
                echo $callouts;
            endif;
            ?>
        </div>
    </div>

<?php } ?>
