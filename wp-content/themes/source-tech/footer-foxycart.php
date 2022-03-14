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
        <div class="container-fluid">
            <div class="wrapper">
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
    </div>


    <div class="site-info">
        &copy;<?php echo date("Y"); ?> Source Tech Systems. All Rights Reserved.
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php if (is_singular()) {
    get_template_part('template-parts/modals/content', 'custom');
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

<!-- FC footer script insertion -->{% include template_from_string(fc_footer_content) %}<!-- /FC footer scripts -->
</body>
</html>
