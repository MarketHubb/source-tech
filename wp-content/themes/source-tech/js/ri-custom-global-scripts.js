/* jQuery (Footer) */
(function($) {

    // Hide Server dropdowns
    // $('#menu-item-529').find('ul.sub-menu').css('display', 'none');
    // Prevent links from page refresh
    $('body a').each(function(e) {
       if ($(this).attr('href') === '#prevent') {
           e.preventDefault();
        }
    });
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

    // Google Analytics Event: Launch Modal Window
    $('.modal-cta').on('click', function() {
        var attr = $(this).attr('href');

        if (typeof attr !== 'undefined' && attr !== false && attr.lowerindexOf('stripe') > -1) {
            var category = 'Buy Now';
        } else {
            var category = 'Launch Modal'
        }
        if ($(this).hasClass('cta-btn-primary')) {
            var label = 'Primary Button';
        } else {
            var label = 'Secondary Button';
        }
        gtag('event', 'Click', {
            'event_category' : category,
            'event_label' : label
        });
    });
    
})( jQuery );