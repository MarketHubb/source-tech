/* jQuery (Footer) */
(function($) {

    // Image thumbnail gallery
    $('#model-page-image-container .image-thumb-container .thumb-images img').on('click', function(){
        $('#model-page-image-container .image-thumb-container .thumb-images').each(function(){
            $(this).removeClass('active');
        })
        $(this).closest('.thumb-images').addClass('active');
        let selectedFeatureSrc = $(this).attr('src');
        $('.model-page-featured-image').attr('src', selectedFeatureSrc);
    });

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

    // Pass product info to modal
    $('#quoteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var product = button.data('product') // Extract info from data-* attributes
        var firstImage = $('.model-page-featured-image').attr('src');
        console.log(product);
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-product').text('- ' + product + ' -');
        modal.find('#modal-image').attr('src', firstImage);
    })


})( jQuery );