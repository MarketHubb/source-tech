<div class="modal fade" id="customModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header d-flex justify-content-between align-items-center px-3 px-md-4 no-border bg-light-grey">
                <img src="<?php echo get_home_url() . '/wp-content/uploads/2020/05/SourceTech-Systems.svg' ?>" class="modal-logo" alt="Source Tech" itemprop="logo">
                <p class="d-inline-block mb-0 pb-0 text-blue-dark letter-wide-max fs-5">
                    <a href="tel:+18775644314" class="cta-phone cta-copy fw-800 letter-wide text-blue">877-564-4314</a>
                </p>
            </div>

            <div class="modal-body px-3 px-md-4 px-xl-5">

                <div class="container">

                    <!-- Body Title -->
                    <div class="row justify-content-center">
                        <div class="col col-md-11 col-lg-9 text-center">
                            <h2 class="fw-800 letter-tight text-center mb-1 mt-4 text-blue"><?php echo get_the_title(); ?></h2>
                            <p class="lead text-grey">Get a <span>same business day quote</span> on a custom configured <?php the_title(); ?></p>
                            <h4 class="modal-title text-center w-100" id="exampleModalLabel"></h4>
                            <div class="mx-auto my-1">
                                <img src="" id="modal-image" alt="" class="modal-image">
                            </div>
                        </div>
                    </div>

                    <!-- Contact Options -->
                    <div class="row justify-content-center my-4">
                        <div class="col-md-12 col-lg-4 mb-3">
                            <div class="d-flex flex-column shadow text-center h-100 px-3 pt-4 py-5 bg-light border rounded">
                                <h4 class="border-bottom pb-2 fw-800 letter-wide mb-0 me-4"><i class="fa-light fa-messages text-blue me-2"></i> Chat</h4>
                                <p class="text-dark letter-tight fs-5 mb-4 pb-2">
                                    <strong class="letter-tight fw-600 d-inline-block my-3 text-dark fst-italic">Agents online now</strong> <br>
                                    Live chat with an enterprise IT support specialist
                                </p>
                                <div class="mt-auto">
                                    <span class="cta-chat modal-cta fs-5 fw-bold bg-blue text-white shadow-sm border-pill border-blue px-4 py-1"
                                        onclick='$zoho.salesiq.floatwindow.visible("show");'>
                                        Chat Now <i class="fa-regular fa-arrow-right ms-1"></i>
                                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 mb-3">
                            <div class="d-flex flex-column shadow text-center h-100 px-3 pt-4 py-5 bg-light border rounded">
                                <h4 class="border-bottom pb-2 fw-800 letter-wide mb-0 me-4"> <i class="fa-light fa-phone text-blue me-2"></i> Phone</h4>
                                <p class="text-dark letter-tight fs-5 mb-4 pb-2">
                                    <strong class="letter-tight fw-600 d-inline-block my-3 text-dark fst-italic">8:00am - 6:00pm CST</strong> <br>
                                    Quotes, configuration support & technical assistance
                                </p>
                                <div class="mt-auto">
                                    <a href="tel:+18775644314" class="cta-phone modal-cta fw-bold fs-5 letter-wide bg-blue text-white shadow-sm border-pill border-blue px-4 py-1">
                                        877-564-4314
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 mb-3">
                            <div class="d-flex flex-column shadow text-center h-100 px-3 pt-4 py-5 bg-light border rounded">
                                <h4 class="border-bottom pb-2 fw-800 letter-wide mb-0 me-4"><i class="fa-light fa-envelope text-blue me-2"></i> Email</h4>
                                <p class="text-dark letter-tight fs-5 mb-4 pb-2">
                                    <strong class="letter-tight fw-600 d-inline-block my-3 text-dark fst-italic">Responses in 2 hours</strong> <br>
                                    Send configuration details, or a competitors quote
                                </p>

                                <?php
                                $manufacturer = get_query_var('manufacturer');
                                if ($post->post_type == 'servers' || $post->post_type == 'networking') {
                                    $mail_subject = 'Website inquiry for ' . get_the_title() . ' | SourceTech Systems';
                                } else {
                                    $mail_subject = "Website Inquiry | SourceTech Systems";
                                }
                                ?>
                                <div class="mt-auto">
                                    <a href="mailto:info@source-tech.net?subject=<?php echo rawurlencode($mail_subject); ?>"
                                       class="cta-email modal-cta fs-5 fw-bold bg-blue text-white shadow-sm border-pill border-blue px-4 py-1">
                                        Email Us <i class="fa-regular fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-light">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col col-md-10">
                            <figure class="text-center mt-2 my-4">
                                <blockquote class="blockquote mb-0">
                                    <p class="mb-1">"Probably the best vendor that I have worked with for refurbished data center hardware like Dell PowerEdge servers. No hesitation to give 5 stars to David and the entire SourceTech team."</p>
                                </blockquote>
                                <div class="text-center my-2">
                                    <i class="fa-solid fa-star text-orange"></i>
                                    <i class="fa-solid fa-star text-orange"></i>
                                    <i class="fa-solid fa-star text-orange"></i>
                                    <i class="fa-solid fa-star text-orange"></i>
                                    <i class="fa-solid fa-star text-orange"></i>
                                </div>
                                <figcaption class="blockquote-footer mt-3 text-dark">
                                    Paul A. |<cite title="Source Title"> 3 custom-configured Dell R730's</cite>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
