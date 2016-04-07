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


        $('.view-journal .views-row').on('mouseenter', function(){
            $(this).find('.content-wrapper').addClass('active');
        });

        $('.view-journal .views-row').on('mouseleave', function() {
           $(this).find('.content-wrapper').removeClass('active');
        });

        $('.view-details-products-and-pictures .view-content').masonry({
            itemSelector: '.views-row',
            percentPosition: true,
            gutter: '.gutter-sizer',
            columnWidth: '.grid-sizer',
        });

        $('.view-details-products-and-pictures .views-row.Product').on('mouseenter', function(){
            $(this).find('.content-wrapper').addClass('active');
        });
    });

}(jQuery);
