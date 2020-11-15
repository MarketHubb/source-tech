<div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
    <h2 class="section-heading model-page-tab-content-heading">FAQs</h2>
    <?php $faq_subheading_field = 'global_' . $post->post_type . '_faq_subheading'; ?>
    <p class="model-page-tab-content-subheading"><?php the_field($faq_subheading_field, 'option'); ?></p>
    
    <?php
    $faq_repeater_field = 'global_' . $post->post_type . '_faqs';
    $faq_sub_field_question = 'global_' . $post->post_type . '_faqs_question';
    $faq_sub_field_answer = 'global_' . $post->post_type . '_faqs_answer';

    if( have_rows($faq_repeater_field, 'option') ):
        $faq = '<div class="faq-container">';
        while ( have_rows($faq_repeater_field, 'option') ) : the_row();
            $faq .= '<div class="faq-group">';
            $faq .= '<h3>' . get_sub_field($faq_sub_field_question, 'option') . '</h3>';
            $faq .= '<p>' . get_sub_field($faq_sub_field_answer, 'option') . '</p>';
            $faq .= '</div>';
        endwhile;
        $faq .= '</div>';
        echo $faq;
    endif;
    ?>

</div>
