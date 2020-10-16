/* Template: Apparatus WooCommerce Theme | Author: Fluent-Themes */
/*----------------------------------------------------------*/
(function($) {

"use strict";

jQuery(document).ready(function($){
	
	//Styling sidebar widgets
	jQuery('.product-single .entry-summary small i').find('p').contents().unwrap();
	jQuery('.widget_product_search').addClass('widget_search_form').removeClass('widget_product_search');
	jQuery('.widget_layered_nav').addClass('cat-list').removeClass('widget_layered_nav');
	jQuery('.widget_layered_nav_filters').addClass('cat-list').removeClass('widget_layered_nav_filters');
	jQuery('.widget_product_categories').addClass('cat-list').removeClass('widget_product_categories');
	jQuery('.widget_rating_filter').addClass('cat-list').removeClass('widget_rating_filter');
	
	// RATINGS JS
    $('.js-star-rating').on('change', 'input', function() {
        $('.js-current-rating')
            .removeClass()
            .addClass('current-rating js-current-rating current-rating--' + this.value);
    });
	
	/*Load CSS after full page is loaded*/

	$(window).bind("load", function() {
		document.querySelector('#custom-style').textContent += ".star-rating{display: block !important;}";
	});
	
});
}(jQuery));