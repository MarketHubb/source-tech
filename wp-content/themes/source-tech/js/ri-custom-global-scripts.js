/* jQuery (Footer) */
(function($) {
    // Remove empty <p></p> tags from editor
    $('p:empty').remove();

    // Google Analytics Event: Open Chat Window
    $('.cta-chat').on('click', function() {
        gtag('event', 'Click', {
            'event_category' : 'Chat',
            'event_label' : 'Open Zoho chat window from CTA module'
        });
    });

    // Google Analytics Event: Open Email
    $('.cta-email').on('click', function() {
        gtag('event', 'Click', {
            'event_category' : 'Email',
            'event_label' : 'Open email application'
        });
    });
    
})( jQuery );