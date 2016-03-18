+function ($) {
  'use strict';

    $(document).ready(function() {

    });

    $(window).load(function(){
        $('.view-journal').masonry({
            itemSelector: '.views-row',
            percentPosition: true,
            gutter: 17,
            columnWidth: 390,
        });


        $('.view-journal').on('mouseenter', function(){
            $(this).find('.content-wrapper').slideDown('fast');
        });

        $('.view-journal').on('mouseleave', function() {
           $(this).find('.content-wrapper').slideUp('fast'); 
        });
    })
}(jQuery);
