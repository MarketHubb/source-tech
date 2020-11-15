<div class="container-fluid content-section">
    <div class="wrapper">
        <div class="row justify-content-center content-heading mb-4">
            <div class="col-md-8 text-center">
                <h2 class="section-title">Why SourceTech</h2>
                <p>Whether you manage a one-person office or an enterprise-level data center, we'll provide exceptional customer service and the lowest possible prices on IT hardware.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <?php
                if( have_rows('page_home_faqs') ):
                    $faq = '<div class="accordion faqs" id="why-st">';
                    while ( have_rows('page_home_faqs') ) : the_row();
                        $state_class = get_row_index() === 1 ? "collapse show" : "collapse";
                        $faq .= '<div class="card no-border">';
                        $faq .= '<div class="card-header p-2" id="heading' . get_row_index() . '">';
                        $faq .= '<h4 class="mx-2">';
                        $faq .= '<button class="btn btn-link" type="button" data-toggle="collapse"';
                        $faq .= 'data-target="#collapse' . get_row_index() . '" aria-expanded="true" aria-controls="collapse' . get_row_index() . '">';
                        $faq .= get_sub_field('page_home_faq_question') . '</button></h4>';
                        $faq .= '</div>';
                        $faq .= '<div id="collapse' . get_row_index() . '" class="' . $state_class . '" ';
                        $faq .= 'aria-labelledby="heading' . get_row_index() . '" data-parent="#why-st">';
                        $faq .= '<div class="card-body px-5 py-5">';
                        $faq .= '<p>' . get_sub_field('page_home_faq_answer') . '</p>';
                        $faq .= '</div></div></div>';
                    endwhile;
                    $faq .= '</div>';
                    echo $faq;
                endif;
                ?>
            </div>
        </div>
    </div>
</div>