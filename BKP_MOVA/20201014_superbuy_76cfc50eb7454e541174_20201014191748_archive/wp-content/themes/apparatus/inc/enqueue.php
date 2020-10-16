<?php
function apparatus_scripts_basic() {  

	/* ------------------------------------------------------------------------ */
	/* Enqueue Scripts */
	/* ------------------------------------------------------------------------ */
	//Template scripts
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '1.0.0', true);
		if(apparatus_get_option('apparatus_smooth_scroll') == '1') {
			wp_enqueue_script('smoth-scroll', get_template_directory_uri() . '/js/smooth-scroll.min.js', array( 'jquery' ), '1.0.0', true);
		}
		wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '1.0.0', true);	
		wp_enqueue_script('lity', get_template_directory_uri() . '/js/lity.js', array( 'jquery' ), '1.0.0', true);	
		if( !apparatus_is_front() || ( ( class_exists( 'woocommerce' ) ) && ( (is_woocommerce()) || (is_cart()) || (is_checkout()) ) ) ) {
			wp_enqueue_script('apparatus-main-inner', get_template_directory_uri() . '/js/main-inner.js', array( 'jquery' ), '1.0.0', true);
		} else {
			wp_enqueue_script('apparatus-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0.0', true);
		}
		wp_enqueue_script('apparatus-custom-owl', get_template_directory_uri() . '/js/custom-owl.js', array( 'jquery', 'owl-carousel' ), '1.0.0', true);
		
		if( ((apparatus_get_option('apparatus_sticky_menu_style') == '1') && ( apparatus_is_front() )) || (apparatus_get_option('apparatus_sticky_menu_style') == '3') ) {
			wp_enqueue_script('apparatus-nav-one', get_template_directory_uri() . '/js/navigation-one.js', array( 'jquery' ), '1.0.0', true);
		} elseif( ((apparatus_get_option('apparatus_sticky_menu_style') == '1') && ( !apparatus_is_front() )) || (apparatus_get_option('apparatus_sticky_menu_style') == '2') ) {
			wp_enqueue_script('apparatus-nav-two', get_template_directory_uri() . '/js/navigation-two.js', array( 'jquery' ), '1.0.0', true);
		}
		if ( class_exists( 'woocommerce' ) ) {
			wp_enqueue_script('apparatus-woocommerce', get_template_directory_uri() . '/js/apparatus-woocommerce.js', array( 'jquery' ), '1.0.0', true);
		}
}
add_action( 'wp_enqueue_scripts', 'apparatus_scripts_basic' ); 

function apparatus_styles_basic()  { 
	/* ------------------------------------------------------------------------ */
	/* Enqueue Stylesheets */
	/* ------------------------------------------------------------------------ */
	global $post;
		/* Fonts */
		wp_enqueue_style( 'apparatus-fonts-montserrat', apparatus_fonts_montserrat_url(), array(), false, 'all' );
		wp_enqueue_style( 'apparatus-fonts-nunito_and_roboto', apparatus_fonts_nunito_and_roboto_url(), array(), false, 'all' );
		 
		/* Bootstrap */
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
		/* Styles */
		wp_enqueue_style( 'font-awesome-new', get_template_directory_uri() . '/fonts/font-awesome/css/all.css');
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.min.css');
		wp_enqueue_style( 'owl-carousel-theme-default', get_template_directory_uri() . '/css/owl.theme.default.min.css');
		wp_enqueue_style( 'lity', get_template_directory_uri() . '/css/lity.min.css');
		wp_enqueue_style( 'animations', get_template_directory_uri() . '/css/animations.css');
		wp_enqueue_style( 'apparatus-stylesheet', get_template_directory_uri() . '/style.css'); // Main Stylesheet
		wp_enqueue_style( 'apparatus-media-queries', get_template_directory_uri() . '/css/media-queries.css');
		wp_enqueue_style( 'apparatus-sidebar-widgets', get_template_directory_uri() . '/css/widget.css');
		/*Gutenberg Only*/
		if ( function_exists( 'the_gutenberg_project' ) || function_exists( 'wp_common_block_scripts_and_styles' ) ) {
		wp_enqueue_style( 'apparatus-gutenberg-additions', get_template_directory_uri() . '/gutenberg/css/gutenberg-additions.css'); // Gutenberg CSS
		}
	
		wp_enqueue_style( 'apparatus-font-style-one', get_template_directory_uri() . '/css/font-style-one.css');
		
		if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'appeasy_shortcode_for_video_sec_one') ){
			$apparatus_description = get_bloginfo( 'name' );
			if (($apparatus_description == 'Apparatus | App Demo One') ||
				($apparatus_description == 'Apparatus | Software Demo One') ||
				($apparatus_description == 'Apparatus | App Demo Two') ||
				($apparatus_description == 'Apparatus | Software Demo Two') ||
				($apparatus_description == 'Apparatus | App Demo Three') ||
				($apparatus_description == 'Apparatus | Software Demo Three') ||
				($apparatus_description == 'Apparatus | App Demo Four') ||
				($apparatus_description == 'Apparatus | Software Demo Four')) {
			wp_enqueue_style( 'apparatus-embedded', get_template_directory_uri() . '/css/live/app-one-custom.css');
			}
		}
		if ( ( class_exists( 'woocommerce' ) ) && ( (is_woocommerce()) || (is_cart()) || (is_checkout()) || (is_account_page()) ) ) {
			/* woocommerce */
			wp_enqueue_style( 'apparatus-fonts-oswald', apparatus_fonts_oswald_url(), array(), false, 'all' );
			wp_enqueue_style( 'apparatus-shop-templates.css', get_template_directory_uri() . '/css/shop-templates.css');
		}
}
add_action( 'wp_enqueue_scripts', 'apparatus_styles_basic' );


function apparatus_enqueue_comment_reply() {
    if ( get_option( 'thread_comments' ) ) { 
        wp_enqueue_script( 'comment-reply' ); 
    }
	}
add_action( 'comment_form_before', 'apparatus_enqueue_comment_reply' );