// bafe Scripts


jQuery(document).ready(function($){

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

});
