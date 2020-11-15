<div class="tab-pane fade" id="warranty" role="tabpanel" aria-labelledby="warranty-tab">
    <h2 class="section-heading model-page-tab-content-heading">Warranty</h2>
    <?php $warranty_subheading_field = 'global_' . $post->post_type . '_warranty_subheading'; ?>
    <p class="model-page-tab-content-subheading"><?php the_field($warranty_subheading_field, 'option'); ?></p>
    <?php $warranty_field = 'global_' . $post->post_type . '_warranty'; ?>
    <p><?php echo get_field($warranty_field, 'option'); ?></p>
</div>
