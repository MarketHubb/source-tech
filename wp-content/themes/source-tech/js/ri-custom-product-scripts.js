/* jQuery (Footer) */
(function($) {
    // Variant copy testing for primary CTA button
    var variant = $('header').data('buttonvariant');
    var cta_button = $('a.button.request-quote span');
    cta_button.text(variant);
    
    // Trigger GA event on CTA button click
    $('a.button.request-quote').click(function() {
        gtag('event', 'Click', {
               'event_category' : 'CTA Button',
               'event_label' : variant
             });
    });
    
    // Get first word of CTA button
    var cta_button_words = variant.split(' ');
    var cta_button_first_word = cta_button_words.shift();
    
    // Pass model # and image to RFQ form
    var productImage = $('.woocommerce-product-gallery__wrapper > div > a >img').attr('src');
    var productImageQueryString = 'image=' + productImage;
    var headlineLeadIn = '&lead=' + cta_button_first_word;
    
    $('.summary a.button.request-quote').each(function() {
        var href = $(this).attr('href');

        if (href) {
            href += (href.match(/\?/) ? '&' : '?') + productImageQueryString + headlineLeadIn;
            $(this).attr('href', href);
        }
    });
    
    var model_rfq_href = $('.summary a.button.request-quote').attr('href');
    $('.site-footer .button.request-quote').attr('href', model_rfq_href);

})( jQuery );