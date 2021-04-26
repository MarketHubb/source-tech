/* jQuery (Footer) */
(function($) {

    // Hide Server dropdowns
    $('#menu-item-529').find('ul.sub-menu').css('display', 'none');
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
    $('.cta-btn').on('click', function() {
        let buttonText = $(this).text();
        gtag('event', 'Click', {
            'event_category' : 'Launch Modal',
            'event_label' : buttonText
        });
    });
    
})( jQuery );