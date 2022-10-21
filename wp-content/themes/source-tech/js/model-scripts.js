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

    // Create empty option value elements in summary table
    const emptyOptionVal = '<p class="summary-value small mb-0"></p>';
    $('#summary-table tbody tr p.summary-name').each(function() {
        $(this).after(emptyOptionVal);
    });

    // Globals
    const preConfigTab = $('.order-type [data-type="pre-config"]');
    const customConfigTab = $('.order-type [data-type="custom-config"]');
    const memoryComponent = $('.form-container .row[data-type="Memory"]');
    const price = getComponentSelectionObject();

    // Event: Order-type tabs
    $(document).on('click', ('.order-type .order-tab'), function() {
        showHideOrderTabs($(this));
    });

    function getNumberFromPriceString(priceString) {
        return parseInt(priceString.substring(priceString.indexOf('$') + 1).trim())
    }

    function isSelectionDefault(selectionText) {
        return selectionText.indexOf('Select') === -1;
    }

    function getSelectedOptionAttributes(inputContainer) {
        let option = inputContainer.find('select option:selected');
        let optionText = inputContainer.find('select option:selected').text();
        let validated = isSelectionDefault(optionText);
        return {
            component: inputContainer.data('type'),
            validated: validated,
            optionValue: option.val(),
            optionText: optionText,
            optionName: optionText.substring(0, optionText.indexOf('$')).trim(),
            optionPrice: optionText.indexOf("$") !== -1 ? parseInt(optionText.substring(optionText.indexOf('$') + 1).trim()) : 0
        };
    }

    function getSelectionTotalPrice(componentsObject) {
        let keys = Object.keys(componentsObject);
        let total = 0;
        keys.forEach((key, index) => {
            total += componentsObject[key]['optionPrice'];
        });

        return total;
    }

    function validateSelections(componentsObject) {
        if (componentsObject !== null) {
            const keys = Object.keys(componentsObject);
            let validated = false;
            keys.forEach((key, index) => {
                if (validated) {
                    return
                }
                if (!componentsObject[key]['validated']) {
                    validated = true;
                }
            });
            if (validated) {
                $('#custom-add').attr('disabled', false);
            } else {
                alert("Please select all options before proceeding");
            }

        }
    }

    function updatePriceWithQty() {
        let total = getSelectionTotalPrice(price());
        let qty = $('select#qty option:selected').val();
        let totalWithQty = qty * total;
        $('#total-price').text('$' + totalWithQty);
    }

    function getComponentSelectionObject() {
        let componentsObject = {};

        $('.form-container .config-container').each(function(index) {
            componentsObject[index] = getSelectedOptionAttributes($(this));
        });

         return function (selectionObject = null) {
            if (selectionObject !== null) {
                let total = 0;
                const keys = Object.keys(componentsObject);
                keys.forEach((key, index) => {
                    if (componentsObject[key]['component'] === selectionObject['component']) {
                        componentsObject[key] = selectionObject;
                    }
                    total += componentsObject[key]['optionPrice'];
                });

                updatePriceWithQty(total);
                console.log(componentsObject);
            }

            return componentsObject;
         }
    }

    // Event: Add to cart
    $('#custom-add').on('click', function() {
        console.log('test');
        validateSelections(price());
    });

    // Event: Quantity change
    $('select#qty').on('change', function() {
        updatePriceWithQty();
    });

    // Event: Component option change
    $(document).on('change', '.form-container .option-select', function() {

        // 1. Force order summary into view
        if (preConfigTab.hasClass('active')) {
            customConfigTab.trigger("click");
        }

        // 2. Define selected options
        let inputContainer = $(this).closest('.config-container');
        let selection = getSelectedOptionAttributes(inputContainer);

        // 3. Update selection object
        price(selection);

        // 4. Toggle selection validation classes (MOVE - create isDefault() function)
        if (selection.validated) {
            inputContainer.addClass('option-selected');
        } else {
            inputContainer.removeClass('option-selected');
        }


        // 5. Update summary table (MOVE)
        $('#summary-table tbody tr').each(function() {
            if ($(this).attr('id') === selection.component) {
                if (selection.optionValue !== 'default') {
                    $(this).removeClass('d-none');
                    selection.optionValue = selection.optionValue.replace(/\_/g, " ");
                    $(this).find('.summary-value').text(selection.optionValue);
                    let priceTd = $(this).closest('tr').find('td');
                    priceTd.html('<p class="summary-price mb-0 small text-end">$' + selection.optionPrice + '</p>');
                } else {
                    $(this).addClass('d-none');
                }
            }
        });

    });

    // EVENT: Order type container tabs
    $('#order-links .nav-link').on('click', function() {

        $('#order-links .nav-link').each(function() {
           $(this).removeClass('active');
        });

        $(this).addClass('active');
        let target = $(this).data('type');

        $('.order-type').each(function() {
           $(this).hide();
          if ($(this).attr('id') === target) {
              $(this).fadeIn();
          }
       });

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