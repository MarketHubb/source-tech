<div class="modal fade" id="customModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body b-blue-thick">
<!--                <h2 class="modal-product fw-bold w-100 text-center mb-0">Need a Custom Configuration?</h2>-->
                <h2 class="fw-800 w-100 text-center mb-0 mt-4">Need a Custom Configuration?</h2>
                <h4 class="modal-title text-center w-100" id="exampleModalLabel">3 Easy Ways to Get a Quote</h4>

                <div class="text-center mt-3">
                    <img src="" id="modal-image" alt="">
                </div>

                <div class="container mt-3 mb-4 px-5" id="modal-cta">
                    <div class="row justify-content-center align-items-center py-4 ">
                        <div class="col-md-5 text-center">
                            <i class="fas fa-comments-alt text-orange fa-2x mb-2"></i>
                            <p class="text-black-50 lead fw-bold mb-0">Chat</p>
                        </div>
                        <div class="col-md-7">
                            <p class="mb-0 text-black"><span class="cta-chat cta-copy fw-bold" onclick='$zoho.salesiq.floatwindow.visible("show");'>Click here</span> to start a chat with one of our U.S. based enterprise IT hardware specialists</p>
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center py-4 ">
                        <div class="col-md-5 text-center">
                            <i class="fas fa-phone text-orange fa-2x mb-2"></i>
                            <p class="text-black-50 lead fw-bold pb-0 mb-0">Call</p>
                        </div>
                        <div class="col-md-7">
                            <p class="mb-0 text-black">Call <a href="tel:800-932-0657" class="cta-phone cta-copy fw-bold">800-932-0657</a> to speak to our live support team available Mon-Fri, 8:00am - 6:00pm CST</p>
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center py-4 ">
                        <div class="col-md-5 text-center">
                            <i class="fas fa-envelope-open-text text-orange fa-2x mb-2"></i>
                            <p class="text-black-50 lead fw-bold pb-0 mb-0">Email</p>
                        </div>
                        <div class="col-md-7">
                            <?php
                            $manufacturer = get_query_var('manufacturer');

                            if ($post->post_type == 'servers' || $post->post_type == 'networking') {
                                $mail_subject = 'Website inquiry for ' . get_the_title() . ' | SourceTech Systems';
                            } else {
                                $mail_subject = "Website Inquiry | SourceTech Systems";
                            }
                            ?>
                            <p class="mb-0 text-black"><a href="mailto:info@source-tech.net?subject=<?php echo rawurlencode($mail_subject); ?>" class="cta-email cta-copy fw-bold">Email us</a> your configuration details, or a competitor's quote and we'll try and beat it</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>