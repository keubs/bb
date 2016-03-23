+function ($) {
  'use strict';

    $(document).ready(function() {

    });

    $(window).load(function(){
        $('.view-journal .view-content').masonry({
            itemSelector: '.views-row',
            percentPosition: true,
            gutter: '.gutter-sizer',
            columnWidth: '.grid-sizer',
        });


        $('.view-journal').on('mouseenter', function(){
            $(this).find('.content-wrapper').slideDown('fast');
        });

        $('.view-journal').on('mouseleave', function() {
           $(this).find('.content-wrapper').slideUp('fast'); 
        });
    })
}(jQuery);
