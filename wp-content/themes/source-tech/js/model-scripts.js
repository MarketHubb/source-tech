/* jQuery (Footer) */
(function($) {

    // Define modal window
    const productModal = new bootstrap.Modal(document.getElementById('customModal'));

    // Image thumbnail gallery
    $('#model-page-image-container .image-thumb-container .list-group-item img').on('click', function(){
        $('#model-page-image-container .image-thumb-container .list-group-item').each(function(){
            $(this).removeClass('active');
        })
        $(this).closest('.list-group-item').addClass('active');
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


        // $('#customModal').on('show.bs.modal', function (event) {
        $('#customModal').on('show.bs.modal', function (event) {
        var modal = $(this)
        var firstImage = $('.model-page-featured-image').attr('src');
        modal.find('#modal-image').attr('src', firstImage);
        $('.global-alert').css('opacity', '.5');
    });

    $('#customModal').on('hide.bs.modal', function (event) {
        $('.global-alert').css('opacity', '1');
    });

    $('.modal-body .cta-chat').on('click', function(event) {
        console.log(event);
        productModal.hide();
    });


})( jQuery );