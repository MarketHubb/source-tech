/* jQuery (Footer) */
(function($) {
    $('li.project ul li p').each(function() {
        var task = $(this);
        $(this).addClass('d-inline');
        var assignees = ["Chris", "Emily"];
        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        $.each(assignees, function (index, value) {
            let taskClean = task.text().split(value)[0];
            task.text(taskClean);
        });
        $.each(months, function (index, value) {
            let taskClean = task.text().split(value)[0];
            task.text(taskClean);
        });
        $('<span><label class="check-container"><input type="checkbox" checked=""><span class="checkmark"></span></label></span>').insertBefore(task);
    });


    
    function fade_in_form_selection() {
        $('#rfq-selection-container').fadeIn();
    }
    
    function clean_selection_text(selection) {
        return selection.replace('#', '');
    }
    
    function tabs_active_class(selection) {
        var type = selection.replace('#', '');
        
        $('#rfq-tabs-container .et_pb_module.et_clickable').each(function(){
            $(this).removeClass('rfq-active-tab');
        });  
      
        if (type == 'servers') {
            $('#rfq-servers-tab').addClass('rfq-active-tab')
        } else if (type == 'networking') {
            $('#rfq-networking-tab').addClass('rfq-active-tab')
        } else if (type == 'maintenance') {
            $('#rfq-maintenance-tab').addClass('rfq-active-tab')
        }
    }

    function form_selection(selection) {
        var type = clean_selection_text(selection);
        
        $('#et-boc .rfq-form-container').each(function(){
            $(this).hide();
        });
    
        $('#rfq-selection-container').fadeOut();
        $('#rfq-tabs-container').fadeIn('slow');
        
        $('#et-boc .rfq-form-container').each(function(){
            $(this).removeClass('rfq-active-form');
        });
    
        if (type == 'servers') {
            $('#rfq-server-form-container')
                .addClass('rfq-active-form')
                .fadeIn();
        } else if (type == 'networking') {
            $('#rfq-networking-form-container')
                .addClass('rfq-active-form')
                .fadeIn();
        } else if (type == 'maintenance') {
            $('#rfq-maintenance-form-container')
                .addClass('rfq-active-form')
                .fadeIn();
        }
        
        tabs_active_class(type);
    }
    
    function populate_product_details(product_image, product_name) {
        if (product_image != 'undefined') {
            $('#et-boc .rfq-form-container.rfq-active-form .product-logo-image').attr('src', product_image);
        }
        if (product_name != 'undefined') {
            $('#et-boc .rfq-form-container.rfq-active-form .product-name').text(product_name);
        }
    }

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
    var form_type = decodeURIComponent(allVars['type']);
    var product_name = decodeURIComponent(allVars['model']);
    var product_image = decodeURIComponent(allVars['image']);
    console.log("product_image", product_image);

    if (form_type != 'undefined') {
      form_selection(form_type);
    } else {
        fade_in_form_selection();
    }
    
    populate_product_details(product_image, product_name);
      
    // RFQ type selection (button)
    $('#rfq-selection-container a').on('click', function(e) {
        form_selection($(this).attr('href'));
     });
    // RFQ type selection (module)
    $('#rfq-selection-container .et_pb_module.et_clickable').on('click', function(e) {
        form_selection($(this).find('a.rfq-selection-link').attr('href'));
    });
    // RFQ type selection (tabs)
    $('#rfq-tabs-container .et_pb_module.et_clickable').on('click', function(e){
        form_selection($(this).closest('.et_pb_column_1_3').find('h2').data('type'));
  });
    
})( jQuery );