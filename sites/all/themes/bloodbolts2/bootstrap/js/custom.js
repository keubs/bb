+function ($) {
  'use strict';
    $(document).ready(function() {

    });

    $(window).load(function(){
        $('body').fadeIn('slow');
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

        window.onbeforeunload = function (e) {
            $('body').fadeOut('slow');
        }


        $('<div class="cycle-prev"><a href="#">prev</a></div>').insertAfter('.field-name-uc-product-image');
        $('<div class="cycle-next"><a href="#">next</a></div>').insertAfter('.field-name-uc-product-image');
        $('.field-name-uc-product-image .field-items')
        .cycle({
            slides: '> div', 
            hideNonActive: false,
            timeout: 0,
            next: '.cycle-next',
            prev: '.cycle-prev',
            fx: 'scrollHorz',
            visible: 2,
        });
    });

}(jQuery);
