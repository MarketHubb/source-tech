<div class="container" id="faq">
    <div class="wrapper">
        <div class="row content">
            <div class="col-md-12 text-center mb-3">
                <h2>Your Questions, Answered</h2>
                <p>Shop and order for servers and other enterprise IT hardware with complete confidence</p>
            </div>
            <?php

            $faq_repeater_field = 'global_' . $post->post_type . '_faqs';
            $faq_sub_field_question = 'global_' . $post->post_type . '_faqs_question';
            $faq_sub_field_answer = 'global_' . $post->post_type . '_faqs_answer';

            if( have_rows($faq_repeater_field, 'option') ):
                $faq = '<div class="row">';
                while ( have_rows($faq_repeater_field, 'option') ) : the_row();
                    $faq .= '<div class="col-md-6 mb-3">';
                    $faq .= '<p class="lead font-weight-bold mb-0 pb-0">' . get_sub_field($faq_sub_field_question, 'option') . '</p>';
                    $faq .= '<p class="">' . get_sub_field($faq_sub_field_answer, 'option'). '</p>';
                    $faq .= '</div>';
                endwhile;
                $faq .= '</div>';
                echo $faq;
            endif;
            ?>
        </div>
    </div>
</div>
