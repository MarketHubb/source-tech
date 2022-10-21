<?php $query_params = get_query_var('query_params'); ?>

<!-- Right Panel -->
<div class="col-md-5">

    <?php if (get_field('enable_custom') && get_field('enabled_pre')) { ?>

        <?php get_template_part('template-parts/config/content', 'tabs'); ?>

<!--        <div class="bg-white rounded py-2 order-types border border-1 border-grey">-->
        <div class="py-2 order-container">

            <div class="order-type" id="custom-config">
                <div class="sticky-top" id="summary-total">
                    <div class="alert alert-info bg-white border border-grey shadow-sm mt-2 p-4" role="alert">
                        <?php get_template_part('template-parts/config/content', 'summary-total'); ?>
                        <?php get_template_part('template-parts/config/content', 'add-to-cart'); ?>
                        <?php get_template_part('template-parts/config/content', 'summary'); ?>
                    </div>
                </div>

                <?php //echo return_formatted_component_options($post->ID); ?>
                <?php echo return_formatted_component_options_float_labels($post->ID); ?>
            </div>

            <div class="order-type" id="pre-config">
                <?php get_template_part('template-parts/products/content', 'preconfigured'); ?>
            </div>

        </div>

    </div>

    <?php } ?>

</div>


