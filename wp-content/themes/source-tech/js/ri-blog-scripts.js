/* jQuery (Footer) */
(function($) {

    $(window).load(function() {

        $('table.tablepress tbody tr td').each(function() {
            let no = $('<td class="text-center"><span class="td-icon no">&#10005;</span></td>');
            let yes = $('<td class="text-center"><span class="td-icon yes">&#10003;</span></td>');
           if ($(this).text() == 'No') {
               $(this).replaceWith(no);
           } else if ($(this).text() == 'Yes') {
               $(this).replaceWith(yes);
           }



        });

    }); // END $(window).load(function()

})( jQuery );