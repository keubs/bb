+function ($) {
  'use strict';
    $(document).ready(function() {

    });

    $(window).load(function(){
        // Sick fadein/out feature
        $('#content').fadeIn('slow');

        window.onbeforeunload = function (e) {
            $('#container').fadeOut('slow');
        }

        // homepage view masonry config
        $('.view-journal .view-content').masonry({
            itemSelector: '.views-row',
            percentPosition: true,
            gutter: '.gutter-sizer',
            columnWidth: '.grid-sizer',
        });


        // $('.view-journal').infinitescroll({
        //     navSelector: 'ul.pagination',
        //     nextSelector: 'li.next a',
        //     itemSelector: '.view-journal .views-row',
        //     finishedMsg: '',
        //     debug: true,
        // });

        // $(window).unbind('.infscr');

        // $('.readMore').on('click', function(e){
        //     e.preventDefault();
        //     $(document).trigger('retrieve.infscr');
        // })

        // Slidein/out config for homepage view
        $('.view-journal .views-row').on('mouseenter', function(){
            $(this).find('.content-wrapper').addClass('active');
        });

        $('.view-journal .views-row').on('mouseleave', function() {
           $(this).find('.content-wrapper').removeClass('active');
        });

        // masonry config for blog post view
        $('.view-details-products-and-pictures .view-content').masonry({
            itemSelector: '.views-row',
            percentPosition: true,
            gutter: '.gutter-sizer',
            columnWidth: '.grid-sizer',
        });

        // Slidein config for blog post view
        $('.view-details-products-and-pictures .views-row .close').on('click', function(e) {
            e.preventDefault();
            $(this).parent().removeClass('active');
        });

        // Product carousel
        if($('.field-name-uc-product-image .field-item').length > 1) {
            // append next/prev buttons 
            $('.field-name-uc-product-image').append('<div class="cyclers"><div class="cycle-prev"><a href="#"></a></div><div class="cycle-next"><a href="#"></a></div></div>');
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
        }

        // init product image cycle
        initCycle();

        // listen for ajax request and adjust accordingly
        $( document ).ajaxComplete(function( event, xhr, settings ) {
            if(settings.url.search(/\/views\/ajax/ > -1)) {
                initCycle();
            }
        });


        // function for cycling images
        function initCycle() {
            $('.view-store .views-row .views-field-uc-product-image').each(function(){
                $(this).find('div.field-content').cycle({
                    slides: 'a',
                    fx: 'none',
                    speed: 1,
                    timeout: 500
                }).cycle('pause');
                $(this).hover(function(){
                    $(this).find('div.field-content').addClass('active').cycle('resume');
                }, function(){
                    $(this).find('div.field-content').removeClass('active').cycle('pause');
                });
            });
        }

    });

}(jQuery);
