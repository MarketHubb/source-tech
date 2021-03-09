<?php $product_type = get_query_var('product_type'); ?>
<div class="container" id="warranty">
    <div class="wrapper">
        <div class="row content h-section-right align-items-center">
            <div class="col-md-4 pl-md-4 order-sm-12">
                <i class="fas fa-file-certificate fa-2x orange"></i>
                <h2 class="">Best-in-Class Customer Service & Support</h2>
                <p><em>Every single order is backed by our 24-month warranty and free US-based support</em></p>
            </div>
            <div class="col-md-4">
                <div class="panel shadow orange-top">
                    <p class="lead"><strong>Fast, Free Shipping</strong></p>
                    <p>We provide free ground shipping on all domestic (United States based) orders over $1500. Orders are shipped via FEDEX Ground, and are always professionally packed to ensure safe transit. If you need your <?php echo strtolower($product_type); ?> delivered even faster, ask your SourceTech representative about our wide array of expedited shipping options.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel shadow orange-top">
                    <p class="lead"><strong>24-Month Warranty</strong></p>
                    <p>Every <?php echo strtolower($product_type); ?> undergoes rigorous testing to ensure reliability prior to shipping. If there is any problem with your <?php echo strtolower($product_type); ?>, you're covered by our best-in-class 24-month advance replacement warranty. Contact us and we'll help diagnose the problem and, if necessary, ship out a replacement part immediately to minimize your downtime.</p>
                </div>
            </div>
        </div>
    </div>
</div>
