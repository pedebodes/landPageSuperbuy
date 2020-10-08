/* -------------------------------------------
Name: 		apparatus
Author:		Fluent Themes
------------------------------------------- */

(function($) {

    "use strict";

    //navbar color after scroll
	jQuery(window).on("scroll", function () {
        var scroll = jQuery(window).scrollTop();

        if (scroll >= 60) {
            jQuery(".navbar").addClass("bg-scroll");
        } else {
            jQuery(".navbar").removeClass("bg-scroll");
        }
    });

})(jQuery);