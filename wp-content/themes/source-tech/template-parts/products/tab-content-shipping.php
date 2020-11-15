<div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
    <h2 class="section-heading model-page-tab-content-heading">Shipping</h2>
    <?php $shipping_subheading_field = 'global_' . $post->post_type . '_shipping_subheading'; ?>
    <p class="model-page-tab-content-subheading"><?php the_field($shipping_subheading_field, 'option'); ?></p>
    <?php $shipping_field = 'global_' . $post->post_type . '_shipping'; ?>
    <p><?php echo get_field($shipping_field, 'option'); ?></p>
</div>
