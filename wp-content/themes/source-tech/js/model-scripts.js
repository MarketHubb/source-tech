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
    const emptyOptionPrice = '<p class="summary-price-total mb-0 small fw-bold text-end"></p>';
    const emptyOptionPriceUnit = '<p class="summary-price-unit mb-0 small text-end"></p>';
    $('#summary-table tbody tr').each(function() {
        $(this).find('p.summary-name').after(emptyOptionVal);
        $(this).find('td')
            .html(emptyOptionPrice + emptyOptionPriceUnit);
    });

    //region Globals
    const preConfigTab = $('.order-type [data-type="pre-config"]');
    const customConfigTab = $('.order-type [data-type="custom-config"]');
    const configContainer = $('.form-container');
    const price = getComponentSelectionObject();
    //endregion

    //region Functions: Helpers
    function numberFromMoneyString(string, fallback = 0) {
        return string.indexOf("$") !== -1 ? parseInt(string.substring(string.indexOf('$') + 1).trim()) : fallback;
    }

    function removeEverythingFromString(needle, haystack, after = true) {
        let string = haystack.indexOf(needle);
        haystack = haystack.substring(0, string !== -1 ? string : haystack.length);

        return haystack;
    }

    function getNumberFromPriceString(priceString) {
        return parseInt(priceString.substring(priceString.indexOf('$') + 1).trim())
    }

    function isSelectionDefault(selectionText) {
        return selectionText.indexOf('Select') === -1;
    }
    //endregion

    //region Functions: Application logic
    function getSelectedOptionAttributes(inputContainer) {
        let component = inputContainer.data('type');
        let option = inputContainer.find('select.option-select option:selected');
        let optionText = inputContainer.find('select.option-select option:selected').text();
        let quantity = inputContainer.attr('data-quantity') ? inputContainer.attr('data-quantity') : 1;
        let validated = isSelectionDefault(optionText);
        let duplicate = inputContainer.attr('data-row') > 1;
        let count = parseInt(inputContainer.attr('data-row'));
        let id = (count > 1) ? component + '_' + count : component;
        return {
            component: component,
            id: id,
            count: count,
            quantity: parseInt(quantity),
            validated: validated,
            duplicate: duplicate,
            optionValue: option.val(),
            optionText: optionText,
            optionName: optionText.substring(0, optionText.indexOf('$')).trim(),
            optionPrice: numberFromMoneyString(optionText)
        };
    }

    function getSelectionTotalPrice(componentsArray) {
        var total = 0;
        componentsArray.forEach(function(el, index) {
            total +=  (el.optionPrice * el.quantity);
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

    function updatePriceWithQty(selectionArray) {
        let total = getSelectionTotalPrice(selectionArray);
        let qty = $('select#qty option:selected').val();
        let totalWithQty = qty * total;
        $('#total-price').text('$' + totalWithQty);
    }

    function getComponentSelectionObject() {
        let componentsObject = {};
        let componentsArray = [];

        $('.form-container .config-container').each(function(index) {
            componentsObject[index] = getSelectedOptionAttributes($(this));
            componentsArray.push(getSelectedOptionAttributes($(this)));
        });

         return function (selectionObject = null) {
             console.log(selectionObject);
             if (selectionObject !== null) {
                 var objectIDs = [];
                 componentsArray.forEach(function(el, index) {
                     objectIDs.push(el.id);
                 });

                 // If found, update
                 if ($.inArray(selectionObject.id, objectIDs) !== -1) {
                     componentsArray.forEach(function(el, index) {
                         if (el.id === selectionObject.id) {
                             componentsArray[index] = selectionObject;
                             updateSummaryTable(selectionObject);
                         }
                     });
                }
                 else {
                    componentsArray.push(selectionObject);
                 }

             }

                 // Add new (duplicate)
                 // if (selectionObject.duplicate) {
                 //     if ($.inArray(selectionObject.id, objectIDs) === -1) {
                 //         componentsArray.push(selectionObject);
                 //     } else {
                 //         componentsArray.forEach(function(el, index) {
                 //             if (el.id === selectionObject.id) {
                 //                 componentsArray[index] = selectionObject;
                 //                 updateSummaryTable(selectionObject);
                 //             }
                 //        });
                 //
                 //     }
            updatePriceWithQty(componentsArray)
            console.log(componentsArray);
            return componentsArray;
         }
    }

    function modifySummaryTableRow(selection, targetTableRow, returnRow = false) {
        let selectionText = '(' + selection.quantity + 'x) ' + selection.optionName;
        let unitPrice = selection.optionPrice;
        let totalPrice = selection.optionPrice * selection.quantity;
        targetTableRow.removeClass('d-none');
        targetTableRow.find('.summary-value').text(selectionText);
        targetTableRow.find('.summary-price-total').text('$' + totalPrice);
        targetTableRow.find('.summary-price-unit').text('$' + unitPrice);

        if (returnRow) {
            return targetTableRow;
        }
    }

    function updateSummaryTable(selection) {
        let targetTableRow = $('#summary-table tbody tr#' + selection.id)

        // Update existing
        if (targetTableRow.length === 1) {
            if (!selection.validated) {
                targetTableRow.addClass('d-none');
            } else {
                modifySummaryTableRow(selection, targetTableRow);
            }
        // Adding new
        } else {
            let cloneSource = $('#summary-table tbody tr.' + selection.component).last();
            if (cloneSource.length === 1) {
                let clonedTable = cloneSource.clone(true);
                //let newTableRow = modifySummaryTableRow(selection, clonedTable, true);
                clonedTable
                    .attr('id', selection.component + '_' + selection.count)
                    .insertAfter(cloneSource);
            }

        }
        // let sourceTr = $('#summary-table tbody tr#' + selection.component);
        // let optionSelection = '(' + selection.quantity + 'x) ' + selection.optionName;
        //
        // if (selection.validated && selection.duplicate) {
        //     let cloneTr = sourceTr.clone('true');
        //     cloneTr
        //         .attr('id', selection.component + '_' + selection.count)
        //         .insertAfter(sourceTr);
        // } else if (selection.validated && !selection.duplicate) {
        //     sourceTr.removeClass('d-none');
        //     sourceTr.find('.summary-value').text('(' + selection.quantity + 'x) ' + selection.optionName);
        //     let priceTd = sourceTr.closest('tr').find('td');
        //     priceTd.html('<p class="summary-price mb-0 small text-end">$' + selection.optionPrice + '</p>');
        // }
        //
        // if (!selection.validated) {
        //     sourceTr.addClass('d-none');
        // }
    }
    //endregion

    // Event: Order-type tabs
    $(document).on('click', ('.order-type .order-tab'), function() {
        showHideOrderTabs($(this));
    });

    // Event: Add to cart
    $('#custom-add').on('click', function() {
        console.log('test');
        validateSelections(price());
    });

    // Event: Duplicate option (add + icon)
    configContainer.on('click', '.add-option', function(event) {
        let cloneContainer = $(this).closest('.config-container').clone("true");
        let componentType = removeEverythingFromString('_', cloneContainer.attr('data-type'));
        let rowCount = parseInt($(this).closest('.config-container').attr('data-row')) + 1;

        // Move to external
        let defaultOptionText = cloneContainer.find('select.option-select option:first-of-type').text();
        if (defaultOptionText.indexOf('Additional') === -1) {
            var newDefaultOptionText = defaultOptionText.replace("Select ", "Select Additional ");
        }

        // Move to external
        let cloneSelect = cloneContainer.find('select.option-select');
        cloneSelect.attr('id', componentType + '_' + rowCount);
        cloneSelect.find('option').each(function() {
            let newOptionID = $(this).attr('id') + '_' + rowCount;
            $(this).attr('id', newOptionID);
        });
        cloneContainer.find('select.option-select option:first-of-type').text(newDefaultOptionText);

        cloneContainer
            .removeClass('option-selected')
            .attr('data-row', rowCount)
            .attr('data-type', componentType + '_' + rowCount)
            .insertAfter($(this).closest('.config-container'))
            .find('select').addClass('blinking');

        let selectionObject = getSelectedOptionAttributes(cloneContainer);
        price(selectionObject);
    });

    // Event: Summary quantity change
    configContainer.on('change', 'select#qty', function() {
        //updatePriceWithQty();
    });

    // Event Option quantity change
    configContainer.on('change', 'select.option-qty', function() {
        let optionQty = $(this).find('option:selected').val();
        let container = $(this).closest('.config-container');
        container.attr('data-quantity', optionQty);

        let selection = getSelectedOptionAttributes(container);
        price(selection);
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

        // Update summary price
        //updatePriceWithQty();

        // 4. Toggle selection validation classes (MOVE - create isDefault() function)
        if (selection.validated) {
            inputContainer.addClass('option-selected');
        } else {
            inputContainer.removeClass('option-selected');
        }

        // 5. Update summary table (MOVE)
       // updateSummaryTable(selection);
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