<div class="container">

    <!-- Body Title -->
    <div class="row justify-content-center">
        <div class="col col-md-11 col-lg-9 text-center">
            <h2 class="">Need a Quote?</h2>
            <p class="">Our server support specialists are available by phone, chat & email</p>
            <h4 class="modal-title text-center w-100" id="exampleModalLabel"></h4>
            <div class="mx-auto my-1">
                <img src="" id="modal-image" alt="" class="modal-image">
            </div>
        </div>
    </div>

    <!-- Contact Options -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-12 col-lg-4 mb-3">
            <div class="px-5  px-md-3 d-flex flex-column shadow-sm text-center h-100 pt-4 py-5  border rounded">
                <h4 class="border-bottom pb-2 fw-800 letter-wide mb-0 me-4"><i class="fa-light fa-messages text-blue me-2"></i> Chat</h4>
                <p class="text-dark letter-tight  mb-4 pb-2">
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
            <div class="px-5  px-md-3 d-flex flex-column shadow-sm text-center h-100 pt-4 py-5  border rounded">
                <h4 class="border-bottom pb-2 fw-800 letter-wide mb-0 me-4"> <i class="fa-light fa-phone text-blue me-2"></i> Phone</h4>
                <p class="text-dark letter-tight  mb-4 pb-2">
                    <strong class="letter-tight fw-600 d-inline-block my-3 text-dark fst-italic">8:00am - 6:00pm CST</strong> <br>
                    Quotes, configuration support & technical assistance
                </p>
                <div class="mt-auto">
                    <a href="tel:+8009320657" class="cta-phone modal-cta fw-bold fs-5 letter-wide bg-blue text-white shadow-sm border-pill border-blue px-4 py-1">
                        800-932-0657
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4 mb-3">
            <div class="px-5  px-md-3 d-flex flex-column shadow-sm text-center h-100 pt-4 py-5  border rounded">
                <h4 class="border-bottom pb-2 fw-800 letter-wide mb-0 me-4"><i class="fa-light fa-envelope text-blue me-2"></i> Email</h4>
                <p class="text-dark letter-tight  mb-4 pb-2">
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