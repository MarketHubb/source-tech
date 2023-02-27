/* jQuery (Footer) */
// import document from "../../../plugins/divi-builder/includes/builder/scripts/stores/document";

(function($) {

    function wp_ajax_nopriv_verify_custom_config(post_id, server_id, selections = [], server_quantity)
    {
        $.ajax({
            type:"POST",
            url: "/wp-admin/admin-ajax.php",
            data: {
                action: "verify_custom_config",
                post_id: post_id,
                server_id: Date.now(),
                selections: selections,
                server_quantity: server_quantity
            },
            // dataType: "JSON",
            success:function(data){
                $('#foxy-form').html(data);
                $('body #foxy-form > form').submit();
            },
            complete:function(data){
                // data.insertAfter($('#custom-add'));
                console.log("complete", data)
            }
        });
    }

    //region Functions: Helpers
    function numberFromMoneyString(string, fallback = 0) {
        return string.indexOf("$") !== -1 ? parseInt(string.substring(string.indexOf('$') + 1).trim()) : fallback;
    }

    function removeEverythingFromString(needle, haystack, after = true) {
        let string = haystack.indexOf(needle);
        haystack = haystack.substring(0, string !== -1 ? string : haystack.length);

        return haystack;
    }

    function removeAllOccurrences(string, needle, replace) {
        return  string.replace(new RegExp(needle, 'g'), replace);
    }

    function getNumberFromPriceString(priceString) {
        return parseInt(priceString.substring(priceString.indexOf('$') + 1).trim())
    }

    function isSelectionDefault(selectionText) {
        return selectionText.indexOf('Select') === -1;
    }
    //endregion

    //region Globals & Instantiation
    const post_id = $('#custom-model-page-template').data('id');
    const serverName = $('#custom-model-page-template h1').text();
    const formFactor = $('h1').data('form');
    const emptyOptionVal = '<p class="summary-value small mb-0"></p>';
    const emptyOptionPrice = '<p class="summary-price-total mb-0 small fw-bold text-end"></p>';
    const emptyOptionPriceUnit = '<p class="summary-price-unit mb-0 small text-end"></p>';
    const productModal = new bootstrap.Modal(document.getElementById('customModal'));
    const preConfigTab = $('.order-type [data-type="pre-config"]');
    const customConfigTab = $('.order-type [data-type="custom-config"]');
    const configContainer = $('.form-container');
    const summaryContainer = $('#summary-total');
    const price = getComponentSelectionObject();
    const maxDrives = setMaxDrives();
    const countTotal = $('#count-total');
    const countSelected = $('#count-selected');
    const driveQty = $('.form-select.option-qty');

    // Setup order summary table
    $('#summary-table tbody tr').each(function() {
        $(this).find('p.summary-name').after(emptyOptionVal);
        $(this).find('td')
            .html(emptyOptionPrice + emptyOptionPriceUnit);
    });
    // Modify "No" options for Remote Management
    let serverManufacturer = serverName.indexOf('Dell') !== -1 ? 'Dell' : 'HPE';
    // let noRemoteMgmtOption = serverManufacturer === "Dell" ? IDRAC9 - Express


    //endregion

    //region Functions: Application logic
    function validateSelections(componentsArray) {
        var validated = true;
        let invalidComponents = [];
        let invalidQty = false;
        let drivesQty = 0;
        let pciQty = 0;
        const modalBody = $('#validationModal .modal-body');
        let drivesWarning = modalBody.find('.validate-drives');
        let pciWarning = modalBody.find('.validate-pci');
        let selectionsWarning = modalBody.find('.validate-selections');

        // Reset modal if opened already in same session
        drivesWarning
            .empty()
            .addClass('d-none');
        pciWarning
            .empty()
            .addClass('d-none');
        selectionsWarning
            .addClass('d-none');


        if (componentsArray && componentsArray.length) {
            /*
            * 1. Check that every component has a valid option select
            * 2. Determine which components need to be checked for max quantities
            *
            */
            componentsArray.forEach(function(el, index) {
                if (!el.validated && !invalidComponents.includes(el.component)) {
                    invalidComponents.push(el.component);
                }
                if (el.component === 'Drives') {
                    drivesQty += parseInt(el.quantity);
                }
                if (el.component === 'PCIe_Adapters') {
                    pciQty += parseInt(el.quantity);
                }
            });

            // Max Drives test
            if (drivesQty > maxDrives()) {
                drivesWarning
                    .text('Maximum of ' + maxDrives() + ' drives allowed for this chassis')
                    .removeClass('d-none');
                invalidQty = true;
                validated = false;
            }

            // Max PCI test
            console.log(formFactor);
            if (formFactor.length === 2) {
                let maxPCI = formFactor === "2U" ? 6 : 3;
                if (pciQty > maxPCI) {
                    pciWarning
                        .text('Maximum of ' + maxPCI + ' PCIe Adapters allowed for this server')
                        .removeClass('d-none');
                    invalidQty = true;
                    validated = false;
                }
            }

            // Not valid
            if (invalidComponents.length || invalidQty) {
                let list = '';
                if (invalidComponents.length > 0) {
                    invalidComponents.forEach(function(el) {
                        el = el.replace(/_/gi, ' ');
                        list += '<li class="list-group-item bg-transparent py-1 ps-3"><p class="fw-normal mb-1">' + el + '</p></li>';
                    });
                    modalBody.find('.validate-selections').removeClass('d-none');
                    modalBody.find('.unvalidated-list').html(list);
                }

                var myModal = new bootstrap.Modal(document.getElementById('validationModal'), {
                    keyboard: false
                })
                myModal.show();
                validated = false;
            }

        }
        console.log(invalidComponents);
        return validated;
    }

    function getComponentSelectionObject() {
        let componentsObject = {};
        let componentsArray = [];

        $('.form-container .config-container').each(function(index) {
            componentsArray.push(getSelectedOptionAttributes($(this)));
        });


        return function (selectionObject = null) {
            if (selectionObject !== null) {
                var objectIDs = [];
                componentsArray.forEach(function(el, index) {
                    objectIDs.push(el.id);
                });

                // If found update or remove
                if ($.inArray(selectionObject.id, objectIDs) !== -1) {
                    componentsArray.forEach(function(el, index) {
                        if (el.id === selectionObject.id) {
                            // Update
                            if (selectionObject.add) {
                                componentsArray[index] = selectionObject;
                                // Remove
                            } else {
                                componentsArray.splice(index, 1);
                            }
                        }
                    });
                }
                // If new, add
                else {
                    componentsArray.push(selectionObject);
                }

                updateSummaryTable(selectionObject);
            }

            updatePriceWithQty(componentsArray)
            console.log(componentsArray);
            return componentsArray;
        }
    }

    function getSelectedOptionAttributes(inputContainer, add = true) {
        let component = inputContainer.data('type');
        let option = inputContainer.find('select.option-select option:selected');
        let optionText = inputContainer.find('select.option-select option:selected').text();
        let optionPrice = numberFromMoneyString(optionText);

        var quantity;

        if (component.includes("Drives")) {
            quantity = inputContainer.find('select.option-qty').val();
        } else {
            if (add && optionText.includes("No") && optionPrice === 0) {
                quantity = 0;
            } else {
                quantity = inputContainer.attr('data-quantity') ? inputContainer.attr('data-quantity') : 1;
            }
        }


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
            optionPrice: optionPrice,
            add: add
        };
    }

    function getSelectionTotalPrice(componentsArray) {
        var total = 0;
        componentsArray.forEach(function(el, index) {
            total +=  (el.optionPrice * el.quantity);
        });
        return total;
    }

    function updatePriceWithQty(selectionArray = []) {
        let selections = selectionArray.length ? selectionArray : price();
        let unitPrice = getSelectionTotalPrice(selections);

        if (unitPrice > 0) {
            const unitLabels = summaryContainer.find('.unit-labels');
            const unitPriceEl = summaryContainer.find('#unit-price');
            let qty = parseInt($('select#qty option:selected').val())

            if (qty > 1) {
                unitPriceEl.text('$' + unitPrice);
                unitLabels.removeClass('d-none');
            } else {
                unitLabels.addClass('d-none');
            }

            let totalWithQty = qty * unitPrice;
            summaryContainer.find('#total-price').text('$' + totalWithQty);
        }
    }

    function modifySummaryTableRow(selection, targetTableRow, returnRow = false) {

        let selectionText = '';
        if (selection.quantity > 1) {
            selectionText = '(' + selection.quantity + 'x) ' + selection.optionName;
        } else {
            selectionText = selection.optionName;
        }

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

        // Remove
        if (!selection.add) {
            targetTableRow.remove();
        } else {
            // Update existing
            if (targetTableRow.length === 1) {
                if (!selection.validated) {
                    targetTableRow.addClass('d-none');
                } else {
                    modifySummaryTableRow(selection, targetTableRow);
                }
            // Adding new
            } else {
                let lastComponentRow = $('#summary-table tbody tr.' + selection.component).last();
                let clonedTable = lastComponentRow.clone(true);
                clonedTable
                    .attr('data-quantity', 1)
                    .attr('id', selection.component + '_' + selection.count)
                    .addClass('d-none');

                if (selection.validated) {
                    clonedTable = modifySummaryTableRow(selection, clonedTable, true);
                    clonedTable
                        .removeClass('d-none')
                        .insertAfter(lastComponentRow);
                }

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

    function setMaxDrives() {
        let max;
        return function updateMaxDrives(inputContainer = null, selection = null) {
            if (inputContainer && selection.component === 'Chassis') {
                max = inputContainer.find('select.option-select option:selected').attr('data-drives');
            }
            return max;
        }
    }

    function updateInputLabel(inputContainer, selection) {
        if (selection.validated) {
            let countPrefix = selection.quantity >= 1 ? selection.quantity + 'x' : '0';
            let component = removeAllOccurrences(selection.component, '_', ' ');
            let labelText = countPrefix + ' ' + component;
            let labelTotal = '<span class="fw-600">'
                + ' - $'
                + selection.optionPrice * selection.quantity
                + '</span>';

            let label = inputContainer.find('select.option-select + label');
            label.text(component);
            // label.append(labelTotal);

            inputContainer.addClass('option-selected');
            inputContainer.prev().addClass('option-selected');
        }

        if (!selection.validated) {
            inputContainer.removeClass('option-selected');
            inputContainer.prev().removeClass('option-selected');
        }

    }
    //endregion

    //region Events

    //  Order-type tabs
    $(document).on('click', ('.order-type .order-tab'), function() {
        showHideOrderTabs($(this));
    });

    // Add to cart
    $('#custom-add').on('click', function(event) {
        event.preventDefault();
        let validated = validateSelections(price());
        console.log(validated);
        let qty = parseInt($('select#qty option:selected').val())
       if (validated) {
           wp_ajax_nopriv_verify_custom_config(post_id, Date.now(), price(), qty);
       }
    });

    //  Add / remove component container
    configContainer.on('click', '.add-remove span', function(event) {
        let componentType = $(this).closest('.config-container').attr('data-type');
        let sourceContainers = configContainer.find('.config-container[data-type="' + componentType + '"]');
        let action = !!($(this).hasClass('add-option'));

        // + plus
        if (action) {
            var cloneContainer = sourceContainers.first().clone("true");
            let rowCount = sourceContainers.length + 1;

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
            cloneContainer
                .find('select.option-select option:first-of-type').text(newDefaultOptionText);

            cloneContainer
                .removeClass('option-selected')
                .attr('data-row', rowCount)
                .attr('data-type', componentType)
                .attr('data-quantity', 1)
                .insertAfter($(this).closest('.config-container'))
                .find('select').addClass('blinking');

            // price(getSelectedOptionAttributes(cloneContainer, action));

        // Prevent a minus (-) action when there's only one component container
        }  else if (sourceContainers.length > 1) {
            sourceContainers.last().remove();
        }

        // Update selections object
        let lastContainer = sourceContainers.last();

        if (lastContainer.length === 1) {
            price(getSelectedOptionAttributes(lastContainer, action));
        }
    });

    //  Quantity change (server)
    summaryContainer.on('change', 'select#qty', function() {
        updatePriceWithQty();
    });

    // Quantity change (component)
    configContainer.on('change', 'select.option-qty', function() {
        let optionQty = $(this).find('option:selected').val();
        let inputContainer = $(this).closest('.config-container');
        inputContainer.attr('data-quantity', optionQty);

        let selection = getSelectedOptionAttributes(inputContainer);
        price(selection);

        updateInputLabel(inputContainer, selection)
    });

    function resetGlobalSelectionObject() {
        $('.form-container .config-container').each(function(index) {
            if (!$(this).hasClass('Chassis')) {
                let select = $(this).find('select.form-select');
                select.prop('selectedIndex', 0);
                updateAndValidateSelection($(this));
            }
        });
    }

    function resetSelects(select) {
        select.find('option:first').prop('selected',true);
        select.closest('.config-container').removeClass('option-selected');
    }

    function updateAvailableDrivesQty(currentQtySelect) {
        let currentlySelectedQty = currentQtySelect.val();
        let currentlySelectedType = currentQtySelect.attr('data-type');
        let maxAvailableQty = currentQtySelect.attr('data-max');
        let remainingAvailableQty = maxAvailableQty - currentlySelectedQty;

        $('.form-select.option-qty').each(function () {
            if ($(this).attr('data-type') !== currentlySelectedType) {
                $(this).find('option').each(function() {
                    $(this).prop("disabled", false);

                    if ($(this).val() > remainingAvailableQty) {
                        $(this).prop("disabled", true);
                    }
                });
            }
        });
    }

    function updateDrivesQty(maxDrives) {
        let newOptions = '';
        // Remove existing and replace with new
        if (maxDrives) {
            $('.form-select.option-qty').each(function () {
                $(this).attr('data-max', maxDrives);
                $(this).find('option').remove();

                for (let i = 0; i <= maxDrives; i++) {
                    $(this).append($("<option></option>")
                        .attr("value", i).text(i));
                }
            });
        }
    }

    function chassis_selection() {
        let currentChassis = $('select[name="Chassis"] option:selected');
        let maxDrives = currentChassis.data('drives');
        let selectedFormFactor = currentChassis.data('form');

        resetGlobalSelectionObject();

        // Show drive qty inputs if Chassis selection made (and isn't default)
        if (currentChassis.val() !== 'default') {
            driveQty.removeClass('d-none');
        } else {
            driveQty.addClass('d-none');
        }

        updateDrivesQty(maxDrives);

        $('select[name*="Drives"] option').each(function() {
            $(this).prop("disabled", false);
            if (selectedFormFactor === "SFF" && $(this).data('size') !== selectedFormFactor && $(this).data('size')) {
                $(this).prop("disabled", true);
            }
        });
    }

    function updateAndValidateSelection(inputContainer) {
        // 1. Get formatted selection
        let selection = getSelectedOptionAttributes(inputContainer);

        // 2. Check max drives
        maxDrives(inputContainer, selection);

        // 3. Update selection object
        price(selection);

        // 4. Toggle selection validation classes (MOVE - create isDefault() function)
        updateInputLabel(inputContainer, selection);
        // if (selection.validated) {
        //     updateInputLabel(inputContainer, selection);
        // } else {
        //     inputContainer.removeClass('option-selected');
        // }
    }

    // Drive qty chanage
    $('select.option-qty').on('change', function () {
        updateAvailableDrivesQty($(this));
    });

    // Component selection
    $(document).on('change', '.form-container .option-select', function() {
        // 1. Force order summary into view
        if (preConfigTab.hasClass('active')) {
            customConfigTab.trigger("click");
        }

        // 2. Define selected options
        let inputContainer = $(this).closest('.config-container');

        // 2b. Check if component was the chassis
        if (inputContainer.data('type') === 'Chassis') {
            chassis_selection();
            // resetGlobalSelectionObject();
        }

        updateAndValidateSelection(inputContainer);

    });

    // Order type container tabs
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

    // Image thumbnail gallery
    $('.image-thumb-container .list-group-item img').on('click', function () {
        $('.image-thumb-container .list-group-item').each(function () {
            $(this).removeClass('active');
        })
        $(this).closest('.list-group-item').addClass('active');
        let selectedFeatureSrc = $(this).attr('src');
        $('.model-page-featured-image').attr('src', selectedFeatureSrc);
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