<div class="container content-section py-4">
        <div class="row justify-content-center content-heading mb-4">
            <div class="col-md-8 text-center">
                <h2 class="section-title">Why SourceTech</h2>
                <p>Whether you manage a one-person office or an enterprise-level data center, we'll provide exceptional customer service and the lowest possible prices on IT hardware.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php
            if( have_rows('page_home_faqs') ):
                $faq = '';
                while ( have_rows('page_home_faqs') ) : the_row();
                    $faq .= '<div class="col-md-6 my-3">';
                    $faq .= '<div class=" h-100 p-5 shadow-sm">';
                    $faq .= '<h4>' . get_sub_field('page_home_faq_question') . '</h4>';
                    $faq .= '<p>' . get_sub_field('page_home_faq_answer') . '</p>';
                    $faq .= '</div></div>';

                endwhile;
                echo $faq;
            endif;
            ?>
        </div>
</div>

