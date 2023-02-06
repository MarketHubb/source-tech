<div class="order-type" id="custom-config">
    <div class="sticky-top" id="summary-total">
        <div class="alert bg-white  border  mt-2 px-4 pt-3 pb-2 shadow-sm" role="alert">
            <?php get_template_part('template-parts/config/content', 'summary-total'); ?>
            <?php get_template_part('template-parts/config/content', 'add-to-cart'); ?>
            <?php get_template_part('template-parts/config/content', 'summary'); ?>
        </div>
    </div>
    <?php echo return_formatted_component_options($post->ID); ?>
    <?php //echo return_formatted_component_options_float_labels($post->ID); ?>
</div>
