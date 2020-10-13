/* -------------------------------------------
Name: 		apparatus
Author:		Fluent Themes
------------------------------------------- */

(function($) {

    "use strict";

    //preloader
    jQuery(window).on('load', function () {
        jQuery(".status").fadeOut();
        jQuery(".preloader").delay(500).fadeOut("slow");
    })
    
   jQuery('body').scrollspy({target: "#navigation", offset: 91});
   
   jQuery(".tagcloud").addClass("bg2-tags").removeClass("tagcloud");
   /*Tablet Responsive of VC*/
   jQuery(".vc_col-sm-3").addClass("vc_col-md-3 vc_col-sm-6").removeClass("vc_col-sm-3");
   jQuery(".vc_col-sm-4").addClass("vc_col-md-4 vc_col-sm-12").removeClass("vc_col-sm-4");
   /*END Tablet Responsive of VC*/

    jQuery('#navigation a').on("click",function () {
        //Toggle Class
        jQuery(".active").removeClass("active");
        jQuery(this).closest('li a').addClass("active");
        var theClass = jQuery(this).attr("class");
        jQuery('.' + theClass).parent('li a').addClass('active');
        //Animate
        jQuery('html, body').stop().animate({
            scrollTop: jQuery(jQuery(this).attr('href')).offset().top - 85
        }, 1000);
        return false;
    });

	if (jQuery('.wpb_wrapper section').hasClass('features')) {
		jQuery('.wpb_wrapper section.features').parent().parent().parent().parent().addClass('mlr-0');
	} if (jQuery('.wpb_wrapper section').hasClass('pricing')) {
		jQuery('.wpb_wrapper section.pricing').parent().parent().parent().parent().addClass('mlr-m6');
	}

    // close popup
    jQuery(".popup").on('click', function () {
        jQuery(".popup").removeClass("active-popup");
        jQuery(".popup").addClass("n-active-popup");
    });
	
	
	// //Calculating Logo Size
	// var nav_container = document.getElementById('navigation-container'); 
	// var logo_img = document.getElementById('logo_img'); 
	// var main_menu = document.getElementsByClassName('nav-menu-width'); 
	// var nav_container_width = nav_container.clientWidth;
	// var logo_width = logo_img.clientWidth;
	// var main_menu_width = main_menu[0].clientWidth;
	// var menu_logo_width = main_menu_width + logo_width + 92;
	// var blank_space = nav_container_width - menu_logo_width;
	// var margin = blank_space+'px';
	// //now adding the required style in the custom-css style
	// document.querySelector('#custom-style').textContent += "@media screen and (min-width:992px) {.ft_home .bg-scroll ul.navbar-nav{ margin-left:"+margin+" }}";

    //   /* blogs grid masonary  */
	// 	(function($) {
			
	// 		/* blogs grid masonary  */
    //         var blogs_masonry = $('body').find('.blog-grid-with-msnr');
    //         if (blogs_masonry.length) {

    //             var msnry = new Masonry('.blog-grid-with-msnr', {
    //                 percentPosition: true,
    //                 columnWidth: '.grid-sizer',

    //             });
    //         }

    //     })(jQuery);
	
	// Load More Post On Cat, Blog and Index page
	jQuery('.load_more a').live('click', function(e){
	  e.preventDefault();
	  var link = jQuery(this).attr('href');
	  jQuery('.load_more');
	  jQuery('.load_more a i').addClass('fa-spin');
	  jQuery('body').addClass('not-first-page');
	  $.get(link, function(data) {
		  var post = $("#posts_load_pagination .post ", data);
		  $('#posts_load_pagination').append(post);
	  });
	  jQuery('.load_more').load(link+' .load_more a');
	});
	// End Load More Posts

})(jQuery);