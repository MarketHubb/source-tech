<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Source_Tech
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">

    <!-- Callout -->
    <?php //get_template_part('template-parts/global/content', 'footer-callout'); ?>
<!--    <div class="quote-block my-0">-->
<!--        <h3><a href="--><?php //echo get_permalink(726); ?><!--" class="button request-quote">Request a Quote</a></h3>-->
<!--        <p>Top Quality Servers, Networking & Storage Equipment at Great Prices.</p>-->
<!--    </div>-->

    <div class="bg-light-blue pt-5 mt-5">
        <div class="container">
                <!-- Logo + Mission -->
                <div class="row justify-content-center">
                    <div class="col-md-10 text-center">
                        <img src="<?php echo get_home_url() . '/wp-content/uploads/2020/05/SourceTech-Systems.svg' ?>"
                             class="logo-footer inline-block mb-2 pb-1" alt="Source Tech" itemprop="logo">
                        <p class="footer-mission pb-5 mb-2">Our mission is to ensure that visitors & customers receive dedicated, one-on-one support from our team of enterprise IT hardware & maintenance services experts. Whether you're on our site to purchase servers for a large data center or just browsing our inventory, we promise to provide you with personal & professional service via chat, phone or email. It's our goal to make the purchase of enterprise servers, networking equipment & service contracts easy & convenient. In doing so we strive to build long term relationships with all of our customers, which is the reason they continue to come back to us time and again.  </p>
                    </div>
                </div>
            </div>
    </div>

    <!-- Footer -->
    <div class="bg-white py-5">
        <div class="container">
                <div class="row">

                    <!-- Top Pages -->
                    <div class="col-md-4 px-md-3 px-lg-4">
                        <h5 class="font-weight-bold  pb-3 mb-3">Top Pages</h5>
                        <ul class="link-list">
                            <?php
                            if (have_rows('footer_pages', 'option')):
                                $footer_pages = '';
                                while (have_rows('footer_pages', 'option')) : the_row();
                                    $page = get_sub_field('footer_pages_page', 'option');
                                    $footer_pages .= '<li>';
                                    $footer_pages .= '<a href="' . get_permalink($page->ID) . '">';
                                    $footer_pages .= get_the_title($page->ID) . '</a></li>';
                                endwhile;
                                echo $footer_pages;
                            endif;
                            ?>
                        </ul>
                    </div>
                    <!-- Latest Post -->
                    <div class="col-md-4 px-md-3 px-lg-4">
                        <h5 class="font-weight-bold  pb-3 mb-3">Latest Post</h5>
                        <?php $footer_post = get_field('footer_post', 'option'); ?>
                        <img src="<?php echo get_field('post_featured_image', $footer_post->ID); ?>" alt="" class="mt-2"/>
                        <p class="font-weight-bold mt-3 mb-1"><?php echo get_the_title($footer_post->ID); ?></p>
                        <p class="mb-1"><?php echo get_field('pos_quick_read', $footer_post->ID); ?></p>
                        <a class="text-link" href="<?php echo get_permalink($footer_post->ID); ?>">Read the Post <i class="fas fa-long-arrow-right"></i></a>
                    </div>
                    <!-- Featured Products -->
                    <div class="col-md-4 px-md-3 px-lg-4">
                        <h5 class="font-weight-bold  pb-3 mb-3">Contact Us</h5>
                        <div class="footer-address">
                            <p>
                                <strong>SourceTech Systems</strong><br>
                                1701 Bingle Rd | Suite #4 <br>
                                Houston, TX 77055
                            </p>
                            <p>
                                <strong>Tel:</strong> (800) 932-0657 <br>
                                <strong>Email:</strong><a href="mailto:info@source-tech.net">info@source-tech.net</a> <br>
                                <strong>Chat:</strong> <span class="cta-chat" onclick="$zoho.salesiq.floatwindow.visible(&quot;show&quot;);">Click to Start</span>

                            </p>
                            <p>
                                <i class="fab fa-linkedin fa-lg"></i> <a href="https://www.linkedin.com/company/sourcetech-systems">LinkedIn</a>
                            </p>


                        </div>
                        <?php
                        if (have_rows('footer_products', 'option')):
                            $footer_products = '';
                            while (have_rows('footer_products', 'option')) : the_row();
                                $product = get_sub_field('footer_products_product', 'option');
                                $image = get_repeater_field_row('post_servers_images', 1, 'post_servers_images_image', $product->ID);
                                $footer_products .= '<div class="row my-3 py-3 bb-grey">';
                                $footer_products .= '<div class="col-md-5">';
                                $footer_products .= '<img src="' . $image . '" />';
                                $footer_products .= '</div>';
                                $footer_products .= '<div class="col-md-7">';
                                $footer_products .= '<p class="font-weight-bold mb-0">' . get_the_title($product->ID) . '</p>';
                                $footer_products .= '<a class="text-link" href="' . get_permalink($product->ID) . '">';
                                $footer_products .= 'View Product Details' . '</a>';
                                $footer_products .= '</div></div>';
                            endwhile;
                            //echo $footer_products;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
    </div>

    <div class="bg-grey-dark d-none d-md-block">
        <div class="container">
                <div class="row">
                    <ul class="list-group pt-3 pb-2 list-group-horizontal no-border">
                        <?php
                        if (have_rows('footer_payment', 'option')):
                            $payment = '';
                            while (have_rows('footer_payment', 'option')) : the_row();
                                $payment .= '<li class="list-group-item flex-fill no-border text-center bg-transparent">';
                                $payment .= '<i class="d-block ' . get_sub_field('footer_payment_icon', 'option') . ' fa-inverse fa-2x"></i>';
                                $payment .= '<p class="d-inline-block small thin mb-0 pb-0 text-white">' . get_sub_field('footer_payment_label', 'option') . '</p>';
                                $payment .= '</li>';
                            endwhile;
                            echo $payment;
                        endif;
                        ?>
                    </ul>
                </div>
            </div>
    </div>


    <div class="site-info">
        &copy;<?php echo date("Y"); ?> Source Tech Systems. All Rights Reserved. Privacy Policy. Terms of Use.
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php if (is_singular()) {
    get_template_part('template-parts/modals/content', 'custom');
    get_template_part('template-parts/modals/content', 'validation');
} ?>

<?php wp_footer(); ?>

<!-- Zoho Live Chat widget -->
<!--<script type="text/javascript">-->
<!--    var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode:"00c1181641a8e8a370b3731ece5fb9e8aaf8fb161310d62c4552975ade569d50", values:{},ready:function(){}};var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;s.src="https://salesiq.zoho.com/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);d.write("<div id='zsiqwidget'></div>");-->
<!--</script>-->

<script type="text/javascript" id="zsiqchat">var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode: "00c1181641a8e8a370b3731ece5fb9e8aaf8fb161310d62c4552975ade569d50", values:{},ready:function(){}};var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;s.src="https://salesiq.zoho.com/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);</script>

<script>
    // $zoho.salesiq.ready=function(embedinfo)
    // {
    //     $zoho.salesiq.floatwindow.onlinetitle('Live Support: David');
    //     $zoho.salesiq.floatwindow.offlinetitle('Currently Offline');
    // }
</script>

<?php if (is_singular()) { ?>
    <?php if( have_rows('configurations', get_queried_object_id())) { ?>
<!--        <script>-->
<!--            $zoho.salesiq.ready=function()-->
<!---->
<!--        {-->
<!--            $zoho.salesiq.floatbutton.coin.hidetooltip();-->
<!--        }-->
<!--        </script>-->
    <?php } ?>
<?php } ?>

<!-- FOXYCART -->
<script data-cfasync="false" src="https://cdn.foxycart.com/source-tech/loader.js" async defer></script>
<!-- /FOXYCART -->


</body>
</html>
