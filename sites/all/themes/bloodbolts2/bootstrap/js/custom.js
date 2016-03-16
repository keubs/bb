+function ($) {
  'use strict';

    $(document).ready(function() {

    });

    $(window).load(function(){
        $('.view-journal').masonry({
            itemSelector: '.views-row',
            percentPosition: true,
            gutter: 17
        });        
    })
}(jQuery);
