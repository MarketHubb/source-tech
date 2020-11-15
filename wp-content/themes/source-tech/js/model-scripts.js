/* jQuery (Footer) */
(function($) {
	
	// URL query parameters
    $.extend({
        getUrlVars: function(){
            var vars = [], hash;
            var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
            for(var i = 0; i < hashes.length; i++)
            {
                hash = hashes[i].split('=');
                vars.push(hash[0]);
                vars[hash[0]] = hash[1];
            }
            return vars;
        },
        getUrlVar: function(name){
            return $.getUrlVars()[name];
        }
    });

    // Get object of URL parameters
    var allVars = $.getUrlVars();
    var speciality = decodeURIComponent(allVars['section']);
    
    if (typeof speciality != 'undefined') {
        $('#model-tabs a[href="#' + speciality + '"]').tab('show');
    }
    
    
	// Image thumbnail gallery
	$('#model-page-image-container .image-thumb-container .thumb-images img').on('click', function(){
		$('#model-page-image-container .image-thumb-container .thumb-images').each(function(){
			$(this).removeClass('active');
		})
		$(this).closest('.thumb-images').addClass('active');
		let selectedFeatureSrc = $(this).attr('src');
		$('.model-page-featured-image').attr('src', selectedFeatureSrc);
	});

})( jQuery );