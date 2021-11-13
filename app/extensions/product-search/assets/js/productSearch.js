/*
    Product Search - jQuery plugin
*/
(function ($) {

    $('.xewc-ajax-search').on('keyup', function (e) {
        var $that = $(this);
        $that.addClass('search-active');
        var raw_data = $that.val(), // Item Container
            ajaxUrl = $that.data('url')
  
        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: {
                raw_data: raw_data
            },
            beforeSend: function () {
                if (!$that.parent().find('.fa-spinner').length) {
                    $('<i class="fa fa-spinner fa-spin"></i>').appendTo($that.parent()).fadeIn(100);
                } 
            },
            complete: function () {
                $that.parent().find('.fa-spinner ').remove();
            }
        })
        .done(function (data) {
            if (e.type == 'blur') {
                $that.parent().find('.xewc-products-search-results').html('');
            } else {
                $that.parent().find('.xewc-products-search-results').html(data);
            }
        })
        .fail(function () {
            console.log("error");
        });
    });

})(jQuery);
