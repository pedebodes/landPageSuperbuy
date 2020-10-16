/* -------------------------------------------
Name: 		apparatus
Author:		Fluent Themes
------------------------------------------- */

(function($) {

    "use strict";
    // Testimonials slider
    jQuery("#owl").owlCarousel({
        nav: true,
        loop: true,
        dots: false,
        navSpeed: 1000,
        navContainer: '.nav-container',
        navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }

    });

    // screenshots slider
    jQuery('.screenshots-slider').owlCarousel({
        nav: true,
        loop: true,
        dots: false,
        navSpeed: 1000,
        navContainer: '.nav-container-screen',
        autoplay: true,
        margin: 15,
        navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 4
            }
        }

    });
	
	// brands slider
    jQuery('.brands-slider').owlCarousel({
        loop: true,
        nav: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplaySpeed: 2000,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });

})(jQuery);