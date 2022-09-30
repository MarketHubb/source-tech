/* jQuery (Footer) */
(function($) {

    // Define modal window
    const productModal = new bootstrap.Modal(document.getElementById('customModal'));

    // Image thumbnail gallery
    $('.image-thumb-container .list-group-item img').on('click', function () {
        $('.image-thumb-container .list-group-item').each(function () {
            $(this).removeClass('active');
        })
        $(this).closest('.list-group-item').addClass('active');
        let selectedFeatureSrc = $(this).attr('src');
        $('.model-page-featured-image').attr('src', selectedFeatureSrc);
    });


    //region Custom Config

    // Constants


    function wp_ajax_nopriv_update_custom_config(post_id, component, option) {
        $.ajax({
            type: "POST",
            url: "/wp-admin/admin-ajax.php",
            data: {
                action: "update_custom_config",
                post_id: post_id,
                component: component,
                option: option,
            },
            success: function (data) {

            },
            complete: function () {

            }
        });
    }

    function update_summary_qty(adjustedQty) {
        let total = $('#total-price');
        let qty = $('#total-qty');

        qty
            .text(adjustedQty).fadeIn()
            .attr('data-quantity', parseInt(adjustedQty));

        let adjustedPrice = parseInt(total.data('configured')) * parseInt(adjustedQty);

        total
            .text('$' + parseFloat(adjustedPrice).toFixed(2))
            .attr('data-total', adjustedPrice);
    }

    function update_summary_price(adjustedPrice) {
        let total = $('#total-price');
        let qty = $('#total-qty');
        let priceAsConfigured = parseInt(adjustedPrice) + parseInt(total.data('base'));

        total
            .attr('data-configured', priceAsConfigured)
            .text('$' + parseFloat(priceAsConfigured * qty.data('quantity')).toFixed(2));
    }

    function get_price_adjustment() {
        let price = $('#total-price');
        let priceAdjustment = 0;

        $('.form-container .row select option:selected').each(function () {
            if ($(this).val() !== 'default') {
                priceAdjustment += parseInt($(this).data('price'));
            }
        });
        update_summary_price(priceAdjustment);
    }

    function updateSummaryPanel(component, val, optionContainer, priceAdjustment) {
        let row = optionContainer.data('row');
        let additionalPrice = optionContainer.find('select option:selected').data('price');

        let summaryComponent = $(document).find('#' + 'summary_' + component);
        let summaryItems = $(document).find('#summary-config .summary-list');

        if (summaryComponent.length && row === 1) {

            summaryItems.each(function () {

                // We found a matching component
                if ($(this).data('type') === component) {

                    // User changed input to a valid selection
                    if (val !== 'default') {

                        // Special: Update CPU label
                        $(this).find('.summary-option > p').text(val);
                        $(this).find('.summary-price').text('($' + priceAdjustment + ')');
                        $(this).removeClass('d-none');

                    }

                }

            });

        } else {

            //We did not find a matching component
            if (component === 'CPU') {

                let summarySocket = $('#summary_CPU');
                let summarySocket2 = summarySocket.clone();

                summarySocket2
                    .attr('data-type', 'CPU2')
                    .attr('id', 'summary_CPU2');
                summarySocket2.find('.summary-name').text('CPU - Socket 2');
                summarySocket2.find('.summary-option > p').text(val);
                summarySocket2.find('.summary-price').text('($' + priceAdjustment + ')');
                summarySocket2.insertAfter(summarySocket);

            }

        }
    }

    function showHideOrderTabs(active) {
        $('.order-type .order-tab').each(function() {
            $(this).removeClass('active');
        });

        let activeTab = active.data('type');

        if (activeTab === "pre-config") {
            $('.form-container').hide();
        } else {
            $('.form-container').show();
        }

        $('.order-types .order-type-container').each(function () {
            $(this).hide();
            if ($(this).attr('id') === activeTab) {
                $(this).show();
            }
        });

        active.addClass('active');
    }


    // Globals
    const preConfigTab = $('.order-type [data-type="pre-config"]');
    const customConfigTab = $('.order-type [data-type="custom-config"]');
    const memoryComponent = $('.form-container .row[data-type="Memory"]');

    // Event: Order-type tabs
    $(document).on('click', ('.order-type .order-tab'), function() {
        showHideOrderTabs($(this));
    });

    // Event: Change product quantity (summary)
    $(document).on('change', '#qty-select', function() {
        let qtySelect = $(this).val();
        update_summary_qty(qtySelect);
    });

    // (1) Event: Select config options
    $(document).on('change', '.form-container .option-select', function() {

        // 1. Make sure the custom summary is in view
        if (preConfigTab.hasClass('active')) {
            customConfigTab.trigger("click");
        }
        // 2. Define current config options
        let optionContainer = $(this).closest('.row');
        let component = optionContainer.data('type');
        let option = optionContainer.find('.option-select option:selected');

        if ($(this).val() === 'default') {
            optionContainer.removeClass('option-selected');
        } else {
            optionContainer.addClass('option-selected');
        }

        let optionValNoPrice = option.text().substring(0, option.text().indexOf('+'));

        if (optionValNoPrice.length === 0) {
            optionValNoPrice = option.text();
        }

        // 4. Get adjusted price
        get_price_adjustment();


        // 5. Update summary panel
        updateSummaryPanel(component,optionValNoPrice, optionContainer, option.attr('data-price'));
    });
    //endregion

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