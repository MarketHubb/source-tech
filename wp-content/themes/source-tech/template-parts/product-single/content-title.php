<div class="mb-4 mb-md-5">
    <?php get_template_part('template-parts/products/content', 'tags'); ?>
</div>

<?php $form_factor = get_post_type(get_the_ID()) === 'servers' ? get_field('post_servers_size', get_the_ID()) : ""; ?>

<?php //$title = "Refurbished " . get_the_title() . ' ' . get_formatted_post_type(get_the_ID()) ?>
<?php $title = get_formatted_server_title(get_the_ID()); ?>

<h1 class="d-block d-md-none fw-bolder text-capitalize lh-sm  mb-3 mb-md-5" data-form="<?php echo $form_factor; ?>"><?php echo $title; ?></h1>
<h1 class="d-none d-md-block fw-bolder text-capitalize lh-base  mb-3 mb-md-5" data-form="<?php echo $form_factor; ?>"><?php echo $title; ?></h1>

<?php
if( have_rows('chassis') ):
    $configs = '<div><p class="mb-2"><strong class="d-block d-md-inline">Available in:</strong> ';
    while ( have_rows('chassis') ) : the_row();
        if (get_row_index() !== 1) {
            $configs .= '<span class="px-1 px-md-2">|</span>';
        }
        $configs .= '<span>' . get_sub_field('max_drives') . ' bay (' . get_sub_field('form') . ')</span>';
    endwhile;
    $configs .= '</p></div>';
endif;
?>
<div class="callout-details">
    <div><p class="mb-2"><strong class="d-block d-md-inline">Condition:</strong> Refurbished</p></div>
    <?php echo $configs; ?>
    <div><p><strong class="d-block d-md-inline">Typically ships:</strong> 2-5 days</p></div>
</div>