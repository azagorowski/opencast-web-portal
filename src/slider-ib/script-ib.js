$(document).ready(function() {

'use strict';

$(function() {

    //settings for slider
    var width = 960;
    var animationSpeed = 4000;
    var pause = 8000;
    var currentSlide = 1;

    //cache DOM elements
    var $slider = $('#slider');
    var $slideContainer = $('.slides', $slider);
    var $slides = $('.slide', $slider);

    var interval;

    function startSlider() {
        interval = setInterval(function() {
            $slideContainer.animate({'margin-left': '-='+width}, animationSpeed, function() {
                if (++currentSlide === $slides.length) {
                    currentSlide = 1;
                    $slideContainer.css('margin-left', 0);
                }
            });
        }
		, pause++
		);
    }
    function pauseSlider() {
        clearInterval(interval);
    }

    startSlider();


});
});

/*Based on LearnCode.academy YouTube channel */
