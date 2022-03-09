// WPEW Scripts


jQuery(document).ready(function($){
    //set animation timing
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



    // Breaking News
    var $ticker = $('[data-ticker="list"]'),
    tickerItem = '[data-ticker="item"]'
    itemCount = $(tickerItem).length,
    viewportWidth = 0;

    function setupViewport(){
        $ticker.find(tickerItem).clone().prependTo('[data-ticker="list"]');
        
        for (i = 0; i < itemCount; i ++){
            var itemWidth = $(tickerItem).eq(i).outerWidth();
            viewportWidth = viewportWidth + itemWidth;
        }
        
        $ticker.css('width', viewportWidth);
    }

    function animateTicker(){
        $ticker.animate({
            marginLeft: -viewportWidth
        }, 30000, "linear", function() {
            $ticker.css('margin-left', '0');
            animateTicker();
        });
    }

    function initializeTicker(){
        setupViewport();
        animateTicker();
        
        $ticker.on('mouseenter', function(){
            $(this).stop(true);
        }).on('mouseout', function(){
            animateTicker();
        });
    }

    initializeTicker();

});





/**
 * Bar Graph
 */
var label = document.querySelector(".label");
var c = document.getElementById("c");
var ctx = c.getContext("2d");
var cw = c.width = 700;
var ch = c.height = 350;
var cx = cw / 2,
	cy = ch / 2;
var rad = Math.PI / 180;
var frames = 0;

ctx.lineWidth = 1;
ctx.strokeStyle = "#999";
ctx.fillStyle = "#ccc";
ctx.font = "14px monospace";

var grd = ctx.createLinearGradient(0, 0, 0, cy);
grd.addColorStop(0, "hsla(167,72%,60%,1)");
grd.addColorStop(1, "hsla(167,72%,60%,0)");

var oData = {
	"2008": 10,
	"2009": 39.9,
	"2010": 17,
	"2011": 30.0,
	"2012": 5.3,
	"2013": 38.4,
	"2014": 15.7,
	"2015": 9.0
};

var valuesRy = [];
var propsRy = [];
for (var prop in oData) {

	valuesRy.push(oData[prop]);
	propsRy.push(prop);
}


var vData = 4;
var hData = valuesRy.length;
var offset = 50.5; //offset chart axis
var chartHeight = ch - 2 * offset;
var chartWidth = cw - 2 * offset;
var t = 1 / 7; // curvature : 0 = no curvature 
var speed = 2; // for the animation

var A = {
	x: offset,
	y: offset
}
var B = {
	x: offset,
	y: offset + chartHeight
}
var C = {
	x: offset + chartWidth,
	y: offset + chartHeight
}

/*
      A  ^
	    |  |  
	    + 25
	    |
	    |
	    |
	    + 25  
      |__|_________________________________  C
      B
*/

// CHART AXIS -------------------------
ctx.beginPath();
ctx.moveTo(A.x, A.y);
ctx.lineTo(B.x, B.y);
ctx.lineTo(C.x, C.y);
ctx.stroke();

// vertical ( A - B )
var aStep = (chartHeight - 50) / (vData);

var Max = Math.ceil(arrayMax(valuesRy) / 10) * 10;
var Min = Math.floor(arrayMin(valuesRy) / 10) * 10;
var aStepValue = (Max - Min) / (vData);
console.log("aStepValue: " + aStepValue); //8 units
var verticalUnit = aStep / aStepValue;

var a = [];
ctx.textAlign = "right";
ctx.textBaseline = "middle";
for (var i = 0; i <= vData; i++) {

	if (i == 0) {
		a[i] = {
			x: A.x,
			y: A.y + 25,
			val: Max
		}
	} else {
		a[i] = {}
		a[i].x = a[i - 1].x;
		a[i].y = a[i - 1].y + aStep;
		a[i].val = a[i - 1].val - aStepValue;
	}
	drawCoords(a[i], 3, 0);
}

//horizontal ( B - C )
var b = [];
ctx.textAlign = "center";
ctx.textBaseline = "hanging";
var bStep = chartWidth / (hData + 1);

for (var i = 0; i < hData; i++) {
	if (i == 0) {
		b[i] = {
			x: B.x + bStep,
			y: B.y,
			val: propsRy[0]
		};
	} else {
		b[i] = {}
		b[i].x = b[i - 1].x + bStep;
		b[i].y = b[i - 1].y;
		b[i].val = propsRy[i]
	}
	drawCoords(b[i], 0, 3)
}

function drawCoords(o, offX, offY) {
	ctx.beginPath();
	ctx.moveTo(o.x - offX, o.y - offY);
	ctx.lineTo(o.x + offX, o.y + offY);
	ctx.stroke();

	ctx.fillText(o.val, o.x - 2 * offX, o.y + 2 * offY);
}
//----------------------------------------------------------

// DATA
var oDots = [];
var oFlat = [];
var i = 0;

for (var prop in oData) {
	oDots[i] = {}
	oFlat[i] = {}

	oDots[i].x = b[i].x;
	oFlat[i].x = b[i].x;

	oDots[i].y = b[i].y - oData[prop] * verticalUnit - 25;
	oFlat[i].y = b[i].y - 25;

	oDots[i].val = oData[b[i].val];

	i++
}



///// Animation Chart ///////////////////////////
//var speed = 3;
function animateChart() {
	requestId = window.requestAnimationFrame(animateChart);
	frames += speed; //console.log(frames)
	ctx.clearRect(60, 0, cw, ch - 60);

	for (var i = 0; i < oFlat.length; i++) {
		if (oFlat[i].y > oDots[i].y) {
			oFlat[i].y -= speed;
		}
	}
	drawCurve(oFlat);
	for (var i = 0; i < oFlat.length; i++) {
		ctx.fillText(oDots[i].val, oFlat[i].x, oFlat[i].y - 25);
		ctx.beginPath();
		ctx.arc(oFlat[i].x, oFlat[i].y, 3, 0, 2 * Math.PI);
		ctx.fill();
	}

	if (frames >= Max * verticalUnit) {
		window.cancelAnimationFrame(requestId);

	}
}
requestId = window.requestAnimationFrame(animateChart);

/////// EVENTS //////////////////////
c.addEventListener("mousemove", function(e) {
	label.innerHTML = "";
	label.style.display = "none";
	this.style.cursor = "default";

	var m = oMousePos(this, e);
	for (var i = 0; i < oDots.length; i++) {

		output(m, i);
	}

}, false);

function output(m, i) {
	ctx.beginPath();
	ctx.arc(oDots[i].x, oDots[i].y, 20, 0, 2 * Math.PI);
	if (ctx.isPointInPath(m.x, m.y)) {
		//console.log(i);
		label.style.display = "block";
		label.style.top = (m.y + 10) + "px";
		label.style.left = (m.x + 10) + "px";
		label.innerHTML = "<strong>" + propsRy[i] + "</strong>: " + valuesRy[i] + "%";
		c.style.cursor = "pointer";
	}
}

// CURVATURE
function controlPoints(p) {
	// given the points array p calculate the control points
	var pc = [];
	for (var i = 1; i < p.length - 1; i++) {
		var dx = p[i - 1].x - p[i + 1].x; // difference x
		var dy = p[i - 1].y - p[i + 1].y; // difference y
		// the first control point
		var x1 = p[i].x - dx * t;
		var y1 = p[i].y - dy * t;
		var o1 = {
			x: x1,
			y: y1
		};

		// the second control point
		var x2 = p[i].x + dx * t;
		var y2 = p[i].y + dy * t;
		var o2 = {
			x: x2,
			y: y2
		};

		// building the control points array
		pc[i] = [];
		pc[i].push(o1);
		pc[i].push(o2);
	}
	return pc;
}

function drawCurve(p) {

	var pc = controlPoints(p); // the control points array

	ctx.beginPath();
	//ctx.moveTo(p[0].x, B.y- 25);
	ctx.lineTo(p[0].x, p[0].y);
	// the first & the last curve are quadratic Bezier
	// because I'm using push(), pc[i][1] comes before pc[i][0]
	ctx.quadraticCurveTo(pc[1][1].x, pc[1][1].y, p[1].x, p[1].y);

	if (p.length > 2) {
		// central curves are cubic Bezier
		for (var i = 1; i < p.length - 2; i++) {
			ctx.bezierCurveTo(pc[i][0].x, pc[i][0].y, pc[i + 1][1].x, pc[i + 1][1].y, p[i + 1].x, p[i + 1].y);
		}
		// the first & the last curve are quadratic Bezier
		var n = p.length - 1;
		ctx.quadraticCurveTo(pc[n - 1][0].x, pc[n - 1][0].y, p[n].x, p[n].y);
	}

	//ctx.lineTo(p[p.length-1].x, B.y- 25);
	ctx.stroke();
	ctx.save();
	ctx.fillStyle = grd;
	ctx.fill();
	ctx.restore();
}

function arrayMax(array) {
	return Math.max.apply(Math, array);
};

function arrayMin(array) {
	return Math.min.apply(Math, array);
};

function oMousePos(canvas, evt) {
	var ClientRect = canvas.getBoundingClientRect();
	return { //objeto
		x: Math.round(evt.clientX - ClientRect.left),
		y: Math.round(evt.clientY - ClientRect.top)
	}
}