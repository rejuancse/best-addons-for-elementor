(function ($) {

    var dir = $("html").attr("dir");
    var rtl = false;
    if( dir == 'rtl' ){
        rtl = true;
    }

    /**
     * Review Slider
     * # Make sure you run this code under Elementor..
     * */ 
     $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/products-category-list.default', function($scope, $) {
            var headercarousel = $scope.find('.header-carousel').eq(0);
    
            // Header carousel
            if( headercarousel.length > 0 ){
                var itemslist = jQuery(".header-carousel").attr("items-list");
                $('.header-carousel').slick({
                    dots: false,
                    infinite: true,
                    speed: 300,
                    rtl: rtl,
                    slidesToShow: itemslist,
                    slidesToScroll: itemslist,
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: itemslist,
                                slidesToScroll: itemslist,
                                infinite: true,
                                dots: true
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            }
        });
    });

})(jQuery);
