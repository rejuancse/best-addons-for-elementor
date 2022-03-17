// WPEW Scripts


jQuery(document).ready(function($){


    /**
    * WPEW POST SEARCH
    * */ 
    $('.wpew-ajax-search').bind('keyup', function (e) {
        var $that = $(this);
        $that.addClass('search-active');
        var raw_data = $that.val(), // Item Container
            ajaxUrl = $that.data('url');
  
        $.ajax({ 
            url: ajaxUrl,
            type: 'POST',
            data: {
                raw_data: raw_data
            },
            beforeSend: function () {
                if (!$that.parent().find('.fa-spinner').length) {
                    $('<i class="fa-spin ico"></i>').appendTo($that.parent()).fadeIn(100);
                }
            },
            complete: function () {
                $that.parent().find('.fa-spin ').remove();
            }
        })
        .done(function (data) {
            if (e.type == 'blur') {
                $('.wpew-search-results').html('');
            } else {
                $('.wpew-search-results').html(data);
            }
        })
        .fail(function () {
            console.log("error");
        });
    });
    // End Search post.


    /**
    *  Set animation timing
    **/
    var animationDelay = 2500,
        //loading bar effect
        barAnimationDelay = 3800,
        barWaiting = barAnimationDelay - 3000, //3000 is the duration of the transition on the loading bar - set in the scss/css file
        //letters effect
        lettersDelay = 50,
        //type effect
        typeLettersDelay = 150,
        selectionDuration = 500,
        typeAnimationDelay = selectionDuration + 800,
        //clip effect 
        revealDuration = 600,
        revealAnimationDelay = 1500;


    initHeadline();
    
  
    function initHeadline() {
        //insert <i> element for each letter of a changing word
        singleLetters($('.headline.letters').find('b'));
        //initialise headline animation
        animateHeadline($('.headline'));
    }
  
    function singleLetters($words) {
        $words.each(function(){
            var word = $(this),
            letters = word.text().split(''),
            selected = word.hasClass('is-visible');

            for (i in letters) {
                if(word.parents('.rotate-2').length > 0) letters[i] = '<em>' + letters[i] + '</em>';
                letters[i] = (selected) ? '<i class="in">' + letters[i] + '</i>': '<i>' + letters[i] + '</i>';
            }
            var newLetters = letters.join('');
            word.html(newLetters);
        });
    }
  
    function animateHeadline($headlines) {
        var duration = animationDelay;
        $headlines.each(function(){
            var headline = $(this);
            
            if(headline.hasClass('loading-bar')) {
                duration = barAnimationDelay;
                setTimeout(function(){ headline.find('.words-wrapper').addClass('is-loading') }, barWaiting);
            } else if (headline.hasClass('clip')){
                var spanWrapper = headline.find('.words-wrapper'),
                newWidth = spanWrapper.width() + 10
                spanWrapper.css('width', newWidth);
            } else if (!headline.hasClass('type') ) {
                //assign to .words-wrapper the width of its longest word
                var words = headline.find('.words-wrapper b'),
                width = 0;
                words.each(function(){
                var wordWidth = $(this).width();
                    if (wordWidth > width) width = wordWidth;
                });
                headline.find('.words-wrapper').css('width', width);
            };
    
            //trigger animation
            setTimeout(function(){ hideWord( headline.find('.is-visible').eq(0) ) }, duration);
        });
    }
  
    function hideWord($word) {
        var nextWord = takeNext($word);

        if($word.parents('.headline').hasClass('type')) {
        var parentSpan = $word.parent('.words-wrapper');
        parentSpan.addClass('selected').removeClass('waiting'); 
        setTimeout(function(){ 
            parentSpan.removeClass('selected'); 
            $word.removeClass('is-visible').addClass('is-hidden').children('i').removeClass('in').addClass('out');
        }, selectionDuration);
        setTimeout(function(){ showWord(nextWord, typeLettersDelay) }, typeAnimationDelay);

        } else if($word.parents('.headline').hasClass('letters')) {
            var bool = ($word.children('i').length >= nextWord.children('i').length) ? true : false;
            hideLetter($word.find('i').eq(0), $word, bool, lettersDelay);
            showLetter(nextWord.find('i').eq(0), nextWord, bool, lettersDelay);
        }  else if($word.parents('.headline').hasClass('clip')) {
            $word.parents('.words-wrapper').animate({ width : '2px' }, revealDuration, function(){
                switchWord($word, nextWord);
                showWord(nextWord);
            });
        } else if ($word.parents('.headline').hasClass('loading-bar')){
            $word.parents('.words-wrapper').removeClass('is-loading');
            switchWord($word, nextWord);
            setTimeout(function(){ hideWord(nextWord) }, barAnimationDelay);
            setTimeout(function(){ $word.parents('.words-wrapper').addClass('is-loading') }, barWaiting);
        } else {
            switchWord($word, nextWord);
            setTimeout(function(){ hideWord(nextWord) }, animationDelay);
        }
    }
  
    function showWord($word, $duration) {
        if($word.parents('.headline').hasClass('type')) {
            showLetter($word.find('i').eq(0), $word, false, $duration);
            $word.addClass('is-visible').removeClass('is-hidden');
        }  else if($word.parents('.headline').hasClass('clip')) {
            $word.parents('.words-wrapper').animate({ 'width' : $word.width() + 10 }, revealDuration, function(){ 
                setTimeout(function(){ hideWord($word) }, revealAnimationDelay); 
            });
        }
    }
  
    function hideLetter($letter, $word, $bool, $duration) {
        $letter.removeClass('in').addClass('out');

        if(!$letter.is(':last-child')) {
            setTimeout(function(){ hideLetter($letter.next(), $word, $bool, $duration); }, $duration);  
        } else if($bool) { 
            setTimeout(function(){ hideWord(takeNext($word)) }, animationDelay);
        }

        if($letter.is(':last-child') && $('html').hasClass('no-csstransitions')) {
            var nextWord = takeNext($word);
            switchWord($word, nextWord);
        } 
    }
  
    function showLetter($letter, $word, $bool, $duration) {
        $letter.addClass('in').removeClass('out');

        if(!$letter.is(':last-child')) { 
            setTimeout(function(){ showLetter($letter.next(), $word, $bool, $duration); }, $duration); 
        } else { 
            if($word.parents('.headline').hasClass('type')) { setTimeout(function(){ $word.parents('.words-wrapper').addClass('waiting'); }, 200);}
            if(!$bool) { setTimeout(function(){ hideWord($word) }, animationDelay) }
        }
    }
  
    function takeNext($word) {
        return (!$word.is(':last-child')) ? $word.next() : $word.parent().children().eq(0);
    }
  
    function takePrev($word) {
        return (!$word.is(':first-child')) ? $word.prev() : $word.parent().children().last();
    }
  
    function switchWord($oldWord, $newWord) {
        $oldWord.removeClass('is-visible').addClass('is-hidden');
        $newWord.removeClass('is-hidden').addClass('is-visible');
    }

    /**
     * Countdown Script
    **/
    function makeTimer() {
        //  var endTime = new Date("20 Dec 2022 9:56:00 GMT+01:00");  
        var ending = jQuery("#timer").attr("data-endtime");
        var endTime = new Date(ending);      
        endTime = (Date.parse(endTime) / 1000);
        var now = new Date();
        now = (Date.parse(now) / 1000);
        var timeLeft = endTime - now;
        var days = Math.floor(timeLeft / 86400); 
        var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
        var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
        var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));  
        if(days < 0) { days = 0 }
        if (hours < "10") { hours = "0" + hours; }
        if (minutes < "10") { minutes = "0" + minutes; }
        if (seconds < "10") { seconds = "0" + seconds; }
        $(".days").html(days + "<span> Days</span>");
        $(".hours").html(hours + "<span> Hours</span>");
        $(".minutes").html(minutes + "<span> Min</span>");
        $(".seconds").html(seconds + "<span> Sec</span>");
    }
    setInterval(function() { makeTimer(); }, 1000);


    $(".Click-here").on('click', function() {
        $(".custom-model-main").addClass('model-open');
    }); 
    $(".close-btn, .bg-overlay").click(function(){
        $(".custom-model-main").removeClass('model-open');
    });

    /* --------------------------------------
    *       13. Google Map
    *  -------------------------------------- */
    var map;
    function initMap() {
        var wpaddress       = $('#map').data( 'address' );
        var wplatitude      = $('#map').data( 'latitude' );
        var wplongitude     = $('#map').data( 'longitude' );
        var wpheight        = $('#map').data( 'height' );
        var wptype          = $('#map').data( 'type' );
        var wpzoom          = $('#map').data( 'zoom' );
        var flugurl         = $('#map').data( 'flugurl' );
        var wpstyles        = $('#map').data( 'styles' );
        var controls        = $('#map').data( 'controls' );
        var zoomcontrol     = $('#map').data( 'zoomcontrol' );
        // Style Option
        var styles = '';
        switch( wpstyles ){
            case 'style1':
                styles = [{"featureType": "road","stylers": [{"color": "#b4b4b4"}]}, {"featureType": "water","stylers": [{"color": "#d8d8d8"}]}, {"featureType": "landscape","stylers": [{"color": "#f1f1f1"}]}, {"elementType": "labels.text.fill","stylers": [{"color": "#000000"}]}, {"featureType": "poi","stylers": [{"color": "#d9d9d9"}]}, {"elementType": "labels.text","stylers": [{"saturation": 1}, {"weight": 0.1}, {"color": "#000000"}]}];
                break;
            case 'style2':
                styles = [{elementType: 'geometry', stylers: [{color: '#242f3e'}]},{elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},{elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},{featureType: 'administrative.locality',elementType: 'labels.text.fill',stylers: [{color: '#d59563'}]},{featureType: 'poi',elementType: 'labels.text.fill',stylers: [{color: '#d59563'}]},{featureType: 'poi.park',elementType: 'geometry',stylers: [{color: '#263c3f'}]},{featureType: 'poi.park',elementType: 'labels.text.fill',stylers: [{color: '#6b9a76'}]},{featureType: 'road',elementType: 'geometry',stylers: [{color: '#38414e'}]},{featureType: 'road',elementType: 'geometry.stroke',stylers: [{color: '#212a37'}]},{featureType: 'road',elementType: 'labels.text.fill',stylers: [{color: '#9ca5b3'}]},{featureType: 'road.highway',elementType: 'geometry',stylers: [{color: '#746855'}]},{featureType: 'road.highway',elementType: 'geometry.stroke',stylers: [{color: '#1f2835'}]},{featureType: 'road.highway',elementType: 'labels.text.fill',stylers: [{color: '#f3d19c'}]},{featureType: 'transit',elementType: 'geometry',stylers: [{color: '#2f3948'}]},{featureType: 'transit.station',elementType: 'labels.text.fill',stylers: [{color: '#d59563'}]},{featureType: 'water',elementType: 'geometry',stylers: [{color: '#17263c'}]},{featureType: 'water',elementType: 'labels.text.fill',stylers: [{color: '#515c6d'}]},{featureType: 'water',elementType: 'labels.text.stroke',stylers: [{color: '#17263c'}]}];
                break;
            case 'style3':
                styles = [{ "elementType": "labels", "stylers": [ { "visibility": "off" }, { "color": "#f49f53" }] },{ "featureType": "landscape", "stylers": [ { "color": "#f9ddc5" }, { "lightness": -7 }] },{ "featureType": "road", "stylers": [ { "color": "#813033" }, { "lightness": 43 }] },{ "featureType": "poi.business", "stylers": [ { "color": "#645c20" }, { "lightness": 38 }] },{ "featureType": "water", "stylers": [ { "color": "#1994bf" }, { "saturation": -69 }, { "gamma": 0.99 }, { "lightness": 43 }] },{ "featureType": "road.local", "elementType": "geometry.fill", "stylers": [ { "color": "#f19f53" }, { "weight": 1.3 }, { "visibility": "on" }, { "lightness": 16 }] },{ "featureType": "poi.business" },{ "featureType": "poi.park", "stylers": [ { "color": "#645c20" }, { "lightness": 39 }] },{ "featureType": "poi.school", "stylers": [ { "color": "#a95521" }, { "lightness": 35 }] },{ "featureType": "poi.medical", "elementType": "geometry.fill", "stylers": [ { "color": "#813033" }, { "lightness": 38 }, { "visibility": "off" }] },{ "elementType": "labels" },{ "featureType": "poi.sports_complex", "stylers": [ { "color": "#9e5916" }, { "lightness": 32 }] },{ "featureType": "poi.government", "stylers": [ { "color": "#9e5916" }, { "lightness": 46 }] },{ "featureType": "transit.station", "stylers": [ { "visibility": "off" }] },{ "featureType": "transit.line", "stylers": [ { "color": "#813033" }, { "lightness": 22 }] },{ "featureType": "transit", "stylers": [ { "lightness": 38 }] },{ "featureType": "road.local", "elementType": "geometry.stroke", "stylers": [ { "color": "#f19f53" }, { "lightness": -10 }] }];
                break;
            case 'style4':
                styles = [{ "featureType": "all", "elementType": "labels.text.fill", "stylers": [ { "color": "#ffffff" } ] },{ "featureType": "all", "elementType": "labels.text.stroke", "stylers": [ { "color": "#000000" }, { "lightness": 13 } ] },{ "featureType": "administrative", "elementType": "geometry.fill", "stylers": [ { "color": "#000000" } ] },{ "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [ { "color": "#144b53" }, { "lightness": 14 }, { "weight": 1.4 } ] },{ "featureType": "landscape", "elementType": "all", "stylers": [ { "color": "#08304b" } ] },{ "featureType": "poi", "elementType": "geometry", "stylers": [ { "color": "#0c4152" }, { "lightness": 5 } ] },{ "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [ { "color": "#000000" } ] },{ "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [ { "color": "#0b434f" }, { "lightness": 25 } ] },{ "featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [ { "color": "#000000" } ] },{ "featureType": "road.arterial", "elementType": "geometry.stroke", "stylers": [ { "color": "#0b3d51" }, { "lightness": 16 } ] },{ "featureType": "road.local", "elementType": "geometry", "stylers": [ { "color": "#000000" } ] },{ "featureType": "transit", "elementType": "all", "stylers": [ { "color": "#146474" } ] },{ "featureType": "water", "elementType": "all", "stylers": [ { "color": "#021019" } ] }];
                break;
            default:
                break;
        }
        $("#map").height( wpheight );
        var latlng = new google.maps.LatLng(wplatitude, wplongitude);
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: wpzoom,
          center: latlng,
          styles: styles,
          mapTypeId: wptype,
          disableDefaultUI: controls,
          scrollwheel: zoomcontrol,
        });
        // Marker + Flug
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            icon: flugurl
        });
        // Address
        var contentString = '<div class="map-info-content">'+wpaddress+'</div>';
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        infowindow.open(map, marker);
    }
    if( $('#map').length > 0 ){
        initMap();    
    }



});
