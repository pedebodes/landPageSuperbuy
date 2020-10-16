<?php
function apparatus_styles_custom() {
$custom_primary_color_one = isset( apparatus_get_option('custom_primary_color_one')['rgba'] ) ? apparatus_get_option('custom_primary_color_one')['rgba'] : '';
$custom_primary_color_two = isset( apparatus_get_option('custom_primary_color_two')['rgba'] ) ? apparatus_get_option('custom_primary_color_two')['rgba'] : '';
	if($custom_primary_color_one==''){
		$global_primary_color_one = '#F5F251';
	}else{
		$global_primary_color_one =isset(apparatus_get_option('custom_primary_color_one')['rgba']) ? apparatus_get_option('custom_primary_color_one')['rgba'] : '';
	}
	
	if($custom_primary_color_two==''){
		$global_primary_color_two = '#B8B00A';
	}else{
		$global_primary_color_two = isset(apparatus_get_option('custom_primary_color_two')['rgba']) ? apparatus_get_option('custom_primary_color_two')['rgba'] : '';
	}
	
$custom_secondary_color_one = isset(apparatus_get_option('custom_secondary_color_one')['rgba'])? apparatus_get_option('custom_secondary_color_one')['rgba'] :'';

$custom_secondary_color_two = isset(apparatus_get_option('custom_secondary_color_two')['rgba']) ? apparatus_get_option('custom_secondary_color_two')['rgba']:'';

	if($custom_secondary_color_one==''){
		$global_secondary_color_one = '#6326AA';
	}else{
		$global_secondary_color_one = isset(apparatus_get_option('custom_secondary_color_one')['rgba'])? apparatus_get_option('custom_secondary_color_one')['rgba']:'';
	}
	
	if($custom_secondary_color_two==''){
		$global_secondary_color_two = '#5C1B84';
	}else{
		$global_secondary_color_two = isset(apparatus_get_option('custom_secondary_color_two')['rgba'])? apparatus_get_option('custom_secondary_color_two')['rgba']:'';
	}
	
	$woo_button_color_one = isset(apparatus_get_option('woo_button_color_one')['rgba'])? apparatus_get_option('woo_button_color_one')['rgba'] :'';
	$woo_button_color_two = isset(apparatus_get_option('woo_button_color_two')['rgba'])? apparatus_get_option('woo_button_color_two')['rgba'] :'';
	//Logo Start
	if(isset(apparatus_get_option('logo_primary_color')['rgba'])  && !empty(apparatus_get_option('logo_primary_color')['rgba'])) {
		$logo_primary_color = apparatus_get_option('logo_primary_color')['rgba'];
	} else { 
		$logo_primary_color = '#F5F251';
	}
	if(isset(apparatus_get_option('logo_secondary_color')['rgba']) && !empty(apparatus_get_option('logo_secondary_color')['rgba'])) {
		$logo_secondary_color = apparatus_get_option('logo_secondary_color')['rgba'];
	} else { 
		$logo_secondary_color = '#B8B00A';
	}	
	if(isset(apparatus_get_option('text_logo_color')['rgba']) && !empty(apparatus_get_option('text_logo_color')['rgba'])) {
		$text_logo_color = apparatus_get_option('text_logo_color')['rgba'];
	} else { 
		$text_logo_color = '#fff';
	}
	if(apparatus_get_option('logo_height') != '') {
		$logo_height = apparatus_get_option('logo_height');
	} else { 
		$logo_height = '60px';
	}
	if(apparatus_get_option('logo_width') != '') {
		$logo_width = apparatus_get_option('logo_width');
	} else { 
		$logo_width = '60px';
	}
	if(apparatus_get_option('logo_fnt_size') != '') {
		$logo_fnt_size = apparatus_get_option('logo_fnt_size');
	} else { 
		$logo_fnt_size = '32px';
	}
	if(apparatus_get_option('brdr_radious') != '') {
		$brdr_radious = apparatus_get_option('brdr_radious');
	} else { 
		$brdr_radious = '50%';
	}
	if(apparatus_get_option('logo_pleft') != '') {
		$logo_pleft = apparatus_get_option('logo_pleft');
	} else { 
		$logo_pleft = '0';
	}
	if(apparatus_get_option('logo_pright') != '') {
		$logo_pright = apparatus_get_option('logo_pright');
	} else { 
		$logo_pright = '0';
	}
	if(apparatus_get_option('logo_ptop') != '') {
		$logo_ptop = apparatus_get_option('logo_ptop');
	} else { 
		$logo_ptop = '4px';	
	}
	if(apparatus_get_option('footer_logo_ptop') != '') {
		$footer_logo_ptop = apparatus_get_option('footer_logo_ptop');
	} else { 
		$footer_logo_ptop = '4px';	
	}
	
	//Newsletter Color Settings
	if(isset(apparatus_get_option('apparatus_blog_newsletter_heading1_color')['color']) && !empty(apparatus_get_option('apparatus_blog_newsletter_heading1_color')['color'])) {
		$apparatus_blog_newsletter_heading1_color = apparatus_get_option('apparatus_blog_newsletter_heading1_color')['color'];
	} else { 
		$apparatus_blog_newsletter_heading1_color = '';		
	}
	if(isset(apparatus_get_option('apparatus_blog_newsletter_heading2_color')['color']) && !empty(apparatus_get_option('apparatus_blog_newsletter_heading2_color')['color'])) {
		$apparatus_blog_newsletter_heading2_color = apparatus_get_option('apparatus_blog_newsletter_heading2_color')['color'];
	} else { 
		$apparatus_blog_newsletter_heading2_color = '';		
	}
	if(isset(apparatus_get_option('apparatus_blog_newsletter_heading3_color')['color']) && !empty(apparatus_get_option('apparatus_blog_newsletter_heading3_color')['color'])) {
		$apparatus_blog_newsletter_heading3_color = apparatus_get_option('apparatus_blog_newsletter_heading3_color')['color'];
	} else { 
		$apparatus_blog_newsletter_heading3_color = '';		
	}	
	
	if(isset(apparatus_get_option('apparatus_single_post_newsletter_heading1_color')['color']) && !empty(apparatus_get_option('apparatus_single_post_newsletter_heading1_color')['color'])) {
		$apparatus_single_post_newsletter_heading1_color = apparatus_get_option('apparatus_single_post_newsletter_heading1_color')['color'];
	} else { 
		$apparatus_single_post_newsletter_heading1_color = '';		
	}
	if(isset(apparatus_get_option('apparatus_single_post_newsletter_heading2_color')['color']) && !empty(apparatus_get_option('apparatus_single_post_newsletter_heading2_color')['color'])) {
		$apparatus_single_post_newsletter_heading2_color = apparatus_get_option('apparatus_single_post_newsletter_heading2_color')['color'];
	} else { 
		$apparatus_single_post_newsletter_heading2_color = '';		
	}
	if(isset(apparatus_get_option('apparatus_single_post_newsletter_heading3_color')['color']) && !empty(apparatus_get_option('apparatus_single_post_newsletter_heading3_color')['color'])) {
		$apparatus_single_post_newsletter_heading3_color = apparatus_get_option('apparatus_single_post_newsletter_heading3_color')['color'];
	} else { 
		$apparatus_single_post_newsletter_heading3_color = '';		
	}	
	
	if(isset(apparatus_get_option('apparatus_single_page_newsletter_heading1_color')['color']) && !empty(apparatus_get_option('apparatus_single_page_newsletter_heading1_color')['color'])) {
		$apparatus_single_page_newsletter_heading1_color = apparatus_get_option('apparatus_single_page_newsletter_heading1_color')['color'];
	} else { 
		$apparatus_single_page_newsletter_heading1_color = '';		
	}
	if(isset(apparatus_get_option('apparatus_single_page_newsletter_heading2_color')['color']) && !empty(apparatus_get_option('apparatus_single_page_newsletter_heading2_color')['color'])) {
		$apparatus_single_page_newsletter_heading2_color = apparatus_get_option('apparatus_single_page_newsletter_heading2_color')['color'];
	} else { 
		$apparatus_single_page_newsletter_heading2_color = '';		
	}
	if(isset(apparatus_get_option('apparatus_single_page_newsletter_heading3_color')['color']) && !empty(apparatus_get_option('apparatus_single_page_newsletter_heading3_color')['color'])) {
		$apparatus_single_page_newsletter_heading3_color = apparatus_get_option('apparatus_single_page_newsletter_heading3_color')['color'];
	} else { 
		$apparatus_single_page_newsletter_heading3_color = '';		
	}	
	//Newsletter Color Settings End
	//Heading Section Padding settings Start
	if(apparatus_get_option('apparatus_blog_header_sec_top_padding') !=''){	
		$apparatus_blog_page_header_sec_padding_top = apparatus_get_option('apparatus_blog_header_sec_top_padding');
	}else{
		$apparatus_blog_page_header_sec_padding_top = '';
	}
	if(apparatus_get_option('apparatus_blog_header_sec_bottom_padding') !=''){	
		$apparatus_blog_page_header_sec_padding_bottom = apparatus_get_option('apparatus_blog_header_sec_bottom_padding');
	}else{
		$apparatus_blog_page_header_sec_padding_bottom = '';
	}
	
	if(apparatus_get_option('apparatus_single_post_header_sec_top_padding') !=''){	
		$apparatus_single_post_header_sec_padding_top = apparatus_get_option('apparatus_single_post_header_sec_top_padding');
	}else{
		$apparatus_single_post_header_sec_padding_top = '';
	}	
	if(apparatus_get_option('apparatus_single_post_header_sec_bottom_padding') !=''){	
		$apparatus_single_post_header_sec_padding_bottom = apparatus_get_option('apparatus_single_post_header_sec_bottom_padding');
	}else{
		$apparatus_single_post_header_sec_padding_bottom = '';
	}
	
	if(apparatus_get_option('apparatus_single_page_header_sec_top_padding') !=''){	
		$apparatus_single_page_header_sec_padding_top = apparatus_get_option('apparatus_single_page_header_sec_top_padding');
	}else{
		$apparatus_single_page_header_sec_padding_top = '';
	}	
	if(apparatus_get_option('apparatus_single_page_header_sec_bottom_padding') !=''){	
		$apparatus_single_page_header_sec_padding_bottom = apparatus_get_option('apparatus_single_page_header_sec_bottom_padding');
	}else{
		$apparatus_single_page_header_sec_padding_bottom = '';
	}
	//Heading Section Padding setting end
	
	// Footer logo color settings
	if(isset(apparatus_get_option('footer_text_logo_color')['rgba']) && !empty(apparatus_get_option('footer_text_logo_color')['rgba'])) {
		$footer_text_logo_color = apparatus_get_option('footer_text_logo_color')['rgba'];
	} else { 
		$footer_text_logo_color = '';		
	}	
	if(isset(apparatus_get_option('footer_logo_primary_color')['rgba']) && !empty(apparatus_get_option('footer_logo_primary_color')['rgba'])) {
		$footer_logo_primary_color = apparatus_get_option('footer_logo_primary_color')['rgba'];
	} else { 
		$footer_logo_primary_color = '';		
	}	
	if(isset(apparatus_get_option('footer_logo_secondary_color')['rgba']) && !empty(apparatus_get_option('footer_logo_secondary_color')['rgba'])) {
		$footer_logo_secondary_color = apparatus_get_option('footer_logo_secondary_color')['rgba'];
	} else { 
		$footer_logo_secondary_color = '';		
	}	
	// Footer logo color settings end
	
	/*Mobile Logo*/
	$logo_height_nopx = substr($logo_height,0,-2);
	$logo_width_nopx = substr($logo_width,0,-2);
	$logo_fnt_size_nopx = substr($logo_fnt_size,0,-2);
	$logo_ptop_nopx = substr($logo_ptop,0,-2);
	$mobile_logo_height = $logo_height_nopx - 5 .'px';
	$mobile_logo_width = $logo_width_nopx - 5 .'px';
	$mobile_logo_fnt_size = $logo_fnt_size_nopx - 2 .'px';
	$mobile_logo_ptop = $logo_ptop_nopx - 2 .'px';
	//End Logo
	
	//Typography Settings Start
	if(isset(apparatus_get_option('apparatus_typography')['color']) && !empty(apparatus_get_option('apparatus_typography')['color'])) {
		$typography_color = apparatus_get_option('apparatus_typography')['color'];
	} else { 
		$typography_color = '';		
	}	
	if(isset(apparatus_get_option('apparatus_typography')['font-family']) && !empty(apparatus_get_option('apparatus_typography')['font-family'])) {
		$typography_font_family = apparatus_get_option('apparatus_typography')['font-family'];
	} else { 
		$typography_font_family = '';		
	}
	if(isset(apparatus_get_option('apparatus_typography')['font-weight']) && !empty(apparatus_get_option('apparatus_typography')['font-weight'])) {
		$typography_font_weight = apparatus_get_option('apparatus_typography')['font-weight'];
	} else { 
		$typography_font_weight = '';		
	}	
	
	if(isset(apparatus_get_option('apparatus_links_typography')['color']) && !empty(apparatus_get_option('apparatus_links_typography')['color'])) {
		$typography_links_color = apparatus_get_option('apparatus_links_typography')['color'];
	} else { 
		$typography_links_color = '';		
	}	
	if(isset(apparatus_get_option('apparatus_links_typography')['font-family']) && !empty(apparatus_get_option('apparatus_links_typography')['font-family'])) {
		$typography_links_font_family = apparatus_get_option('apparatus_links_typography')['font-family'];
	} else { 
		$typography_links_font_family = '';		
	}
	if(isset(apparatus_get_option('apparatus_links_typography')['font-weight']) && !empty(apparatus_get_option('apparatus_links_typography')['font-weight'])) {
		$typography_links_font_weight = apparatus_get_option('apparatus_links_typography')['font-weight'];
	} else { 
		$typography_links_font_weight = '';
	}
	
	if(isset(apparatus_get_option('apparatus_h1_font_style')['font-weight']) && !empty(apparatus_get_option('apparatus_h1_font_style')['font-weight'])) {
		$apparatus_h1_font_weight = apparatus_get_option('apparatus_h1_font_style')['font-weight'];
	} else { 
		$apparatus_h1_font_weight = '';		
	}
	if(isset(apparatus_get_option('apparatus_h1_font_style')['font-size']) && !empty(apparatus_get_option('apparatus_h1_font_style')['font-size'])) {
		$apparatus_h1_font_size = apparatus_get_option('apparatus_h1_font_style')['font-size'];
	} else { 
		$apparatus_h1_font_size = '';		
	}
	if(isset(apparatus_get_option('apparatus_h1_font_style')['line-height']) && !empty(apparatus_get_option('apparatus_h1_font_style')['line-height'])) {
		$apparatus_h1_line_height = apparatus_get_option('apparatus_h1_font_style')['line-height'];
	} else { 
		$apparatus_h1_line_height = '';		
	}	
	if(isset(apparatus_get_option('apparatus_h2_font_style')['font-weight']) && !empty(apparatus_get_option('apparatus_h2_font_style')['font-weight'])) {
		$apparatus_h2_font_weight = apparatus_get_option('apparatus_h2_font_style')['font-weight'];
	} else { 
		$apparatus_h2_font_weight = '';		
	}
	if(isset(apparatus_get_option('apparatus_h2_font_style')['font-size']) && !empty(apparatus_get_option('apparatus_h2_font_style')['font-size'])) {
		$apparatus_h2_font_size = apparatus_get_option('apparatus_h2_font_style')['font-size'];
	} else { 
		$apparatus_h2_font_size = '';		
	}
	if(isset(apparatus_get_option('apparatus_h2_font_style')['line-height']) && !empty(apparatus_get_option('apparatus_h2_font_style')['line-height'])) {
		$apparatus_h2_line_height = apparatus_get_option('apparatus_h2_font_style')['line-height'];
	} else { 
		$apparatus_h2_line_height = '';		
	}	
	
	if(isset(apparatus_get_option('apparatus_h3_font_style')['font-weight']) && !empty(apparatus_get_option('apparatus_h3_font_style')['font-weight'])) {
		$apparatus_h3_font_weight = apparatus_get_option('apparatus_h3_font_style')['font-weight'];
	} else { 
		$apparatus_h3_font_weight = '';		
	}
	if(isset(apparatus_get_option('apparatus_h3_font_style')['font-size']) && !empty(apparatus_get_option('apparatus_h3_font_style')['font-size'])) {
		$apparatus_h3_font_size = apparatus_get_option('apparatus_h3_font_style')['font-size'];
	} else { 
		$apparatus_h3_font_size = '';		
	}
	if(isset(apparatus_get_option('apparatus_h3_font_style')['line-height']) && !empty(apparatus_get_option('apparatus_h3_font_style')['line-height'])) {
		$apparatus_h3_line_height = apparatus_get_option('apparatus_h3_font_style')['line-height'];
	} else { 
		$apparatus_h3_line_height = '';		
	}
	if(isset(apparatus_get_option('apparatus_h4_font_style')['font-weight']) && !empty(apparatus_get_option('apparatus_h4_font_style')['font-weight'])) {
		$apparatus_h4_font_weight = apparatus_get_option('apparatus_h4_font_style')['font-weight'];
	} else { 
		$apparatus_h4_font_weight = '';		
	}
	if(isset(apparatus_get_option('apparatus_h4_font_style')['font-size']) && !empty(apparatus_get_option('apparatus_h4_font_style')['font-size'])) {
		$apparatus_h4_font_size = apparatus_get_option('apparatus_h4_font_style')['font-size'];
	} else { 
		$apparatus_h4_font_size = '';		
	}
	if(isset(apparatus_get_option('apparatus_h4_font_style')['line-height']) && !empty(apparatus_get_option('apparatus_h4_font_style')['line-height'])) {
		$apparatus_h4_line_height = apparatus_get_option('apparatus_h4_font_style')['line-height'];
	} else { 
		$apparatus_h4_line_height = '';		
	}
	if(isset(apparatus_get_option('apparatus_h5_font_style')['font-weight']) && !empty(apparatus_get_option('apparatus_h5_font_style')['font-weight'])) {
		$apparatus_h5_font_weight = apparatus_get_option('apparatus_h5_font_style')['font-weight'];
	} else { 
		$apparatus_h5_font_weight = '';		
	}
	if(isset(apparatus_get_option('apparatus_h5_font_style')['font-size']) && !empty(apparatus_get_option('apparatus_h5_font_style')['font-size'])) {
		$apparatus_h5_font_size = apparatus_get_option('apparatus_h5_font_style')['font-size'];
	} else { 
		$apparatus_h5_font_size = '';		
	}
	if(isset(apparatus_get_option('apparatus_h5_font_style')['line-height']) && !empty(apparatus_get_option('apparatus_h5_font_style')['line-height'])) {
		$apparatus_h5_line_height = apparatus_get_option('apparatus_h5_font_style')['line-height'];
	} else { 
		$apparatus_h5_line_height = '';		
	}
	if(isset(apparatus_get_option('apparatus_h6_font_style')['font-weight']) && !empty(apparatus_get_option('apparatus_h6_font_style')['font-weight'])) {
		$apparatus_h6_font_weight = apparatus_get_option('apparatus_h6_font_style')['font-weight'];
	} else { 
		$apparatus_h6_font_weight = '';		
	}
	if(isset(apparatus_get_option('apparatus_h6_font_style')['font-size']) && !empty(apparatus_get_option('apparatus_h6_font_style')['font-size'])) {
		$apparatus_h6_font_size = apparatus_get_option('apparatus_h6_font_style')['font-size'];
	} else { 
		$apparatus_h6_font_size = '';		
	}
	if(isset(apparatus_get_option('apparatus_h6_font_style')['line-height']) && !empty(apparatus_get_option('apparatus_h6_font_style')['line-height'])) {
		$apparatus_h6_line_height = apparatus_get_option('apparatus_h6_font_style')['line-height'];
	} else { 
		$apparatus_h6_line_height = '';		
	}	
	//Typography Settings End	
	
?>
<!-- Custom CSS Codes
========================================================= -->
<style id="custom-style">
	.logo {
		color: <?php echo esc_attr($text_logo_color); ?>;
		height: <?php echo esc_attr($logo_height); ?>;
		width: <?php echo esc_attr($logo_width); ?>;
		border-radius: <?php echo esc_attr($brdr_radious); ?>;
		font-size: <?php echo esc_attr($logo_fnt_size); ?>;
		padding-left: <?php echo esc_attr($logo_pleft); ?>;
		padding-right: <?php echo esc_attr($logo_pright); ?>;
		padding-top: <?php echo esc_attr($logo_ptop); ?>;
		background: -webkit-gradient(linear, left top, left bottom, from(<?php echo esc_attr($logo_primary_color); ?>), to(<?php echo esc_attr($logo_secondary_color); ?>));
		background: linear-gradient(-180deg, <?php echo esc_attr($logo_primary_color); ?> 0%, <?php echo esc_attr($logo_secondary_color); ?> 100%);
	}
	@media (max-width: 768px) {
		.logo {
			height: <?php echo esc_attr($mobile_logo_height); ?>;
			width: <?php echo esc_attr($mobile_logo_width); ?>;
			font-size: <?php echo esc_attr($mobile_logo_fnt_size); ?>;
			padding-top: <?php echo esc_attr($mobile_logo_ptop); ?>;
		}
	}
	logo-image{
		padding-left: <?php echo esc_attr($logo_pleft); ?>;
		padding-right: <?php echo esc_attr($logo_pright); ?>;
		padding-top: <?php echo esc_attr($logo_ptop); ?>;
	}
	/*Global Colors*/
	.bg-color-1,.nav-container-screen div,.nav-container div,button,.btn,input[type="submit"]{
		background: -webkit-gradient(linear, left top, left bottom, from(<?php echo esc_attr($global_primary_color_one); ?>), to(<?php echo esc_attr($global_primary_color_two); ?>));
		background: linear-gradient(-180deg, <?php echo esc_attr($global_primary_color_one); ?> 0%, <?php echo esc_attr($global_primary_color_two); ?> 100%);
	}
	.bg-color-2, .woocommerce .button, .woocommerce .login .button, .woocommerce div.product form.cart .button,
	.woocommerce div.product form.cart .button:hover,.woocommerce-tabs ul.tabs li.active,.woocommerce-tabs ul.tabs li:hover,
	.woocommerce .product ul.tabs li.active a,.woocommerce .product ul.tabs li:hover a,
	.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
	.woocommerce .button:hover, .wc-forward:hover, .woocommerce .login .button:hover, .woocommerce a.button:hover,
	.woocommerce #respond input#submit:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,  .woocommerce a.added_to_cart.wc-forward:hover,
	.woocommerce .menu-card:hover .button, .woocommerce .menu-card:hover .wc-forward, .woocommerce .menu-card:hover a.button{
		background: -webkit-gradient(linear, left top, left bottom, from(<?php echo esc_attr($global_secondary_color_one); ?>), to(<?php echo esc_attr($global_secondary_color_two); ?>));
		background: linear-gradient(-180deg, <?php echo esc_attr($global_secondary_color_one); ?> 0%, <?php echo esc_attr($global_secondary_color_two); ?> 100%);
	}
	.navbar button.navbar-toggler{
		background: transparent !important;
	}
	.wp-block-quote:not(.is-large):not(.is-style-large), .woocommerce a.added_to_cart.wc-forward:hover{
		border-color: <?php echo esc_attr($global_secondary_color_one); ?>;
	}
	<?php if($woo_button_color_one != ''){ ?>
	.woocommerce .button, .woocommerce .login .button, .woocommerce div.product form.cart .button,
	.woocommerce div.product form.cart .button:hover,.woocommerce-tabs ul.tabs li.active,.woocommerce-tabs ul.tabs li:hover,
	.woocommerce .product ul.tabs li.active a,.woocommerce .product ul.tabs li:hover a,
	.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
	.woocommerce .button:hover, .wc-forward:hover, .woocommerce .login .button:hover, .woocommerce a.button:hover,
	.woocommerce #respond input#submit:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,  .woocommerce a.added_to_cart.wc-forward:hover,
	.woocommerce .menu-card:hover .button, .woocommerce .menu-card:hover .wc-forward, .woocommerce .menu-card:hover a.button,
	.woocommerce div.product .woocommerce-tabs ul.tabs li a,
	.woocommerce div.product .woocommerce-tabs ul.tabs li{
		background: -webkit-gradient(linear, left top, left bottom, from(<?php echo esc_attr($woo_button_color_one); ?>), to(<?php echo esc_attr($woo_button_color_two); ?>));
		background: linear-gradient(-180deg, <?php echo esc_attr($woo_button_color_one); ?> 0%, <?php echo esc_attr($woo_button_color_two); ?> 100%);
	}
	<?php } ?>
	/*Background Images*/
	<?php if( (isset(apparatus_get_option('header_background_img')['url']) && !empty(apparatus_get_option('header_background_img')['url'])) ) { //Header BG ?>
	.header-blog{
		background-image: url(<?php echo esc_url( apparatus_get_option('header_background_img')['url'] ); ?>);
	}
	<?php } else { ?>
	.header-blog{
		background-image: url(<?php echo get_template_directory_uri().'/images'; ?>/backgrounds-min/ambient-min.jpg);
	}
	<?php } if( (isset(apparatus_get_option('header_background_img_mobile')['url']) && !empty(apparatus_get_option('header_background_img_mobile')['url'])) ) { //Header Mobile BG ?>
	@media (max-width: 768px) {
		.header-blog {
			background-image: url(<?php echo esc_url( apparatus_get_option('header_background_img_mobile')['url'] ); ?>);
			background-position: center;
		}
	}
	<?php } ?>
	@media (max-width: 768px) {
		.dif-mobile-bg {
			background-image: url(<?php echo get_template_directory_uri().'/images'; ?>/backgrounds-min/ambient-min.jpg) !important;
			height: 100vh !important;
			background-size: cover !important;
			background-repeat: no-repeat;
			-webkit-box-shadow: 0 15px 30px 0 rgba(5, 16, 44, .15);
			box-shadow: 0 15px 30px 0 rgba(5, 16, 44, .15);
		}
		.sm-tpadding{
			padding-top: 70px;
		}
	}
	<?php if(apparatus_get_option('apparatus_single_post_capitalize_headings') == '1') { ?>
	.single-post .h1, .single-post h1, .single-post h2, .single-post h3, .single-post h4, .single-post h5, .single-post h6, #comments-section .author_info {
		text-transform: capitalize;
	}
	<?php } ?>
	<?php if(apparatus_get_option('apparatus_sticky_menu_style') != '1') { ?>
		<?php if(apparatus_get_option('apparatus_sticky_menu_style') == '2') { ?>
		.navbar.vhidden, .navbar.vhidden li, .navbar.vhidden li a, .navbar.vhidden .navbar-brand {
			visibility: hidden !important;
			 -webkit-transition-timing-function: ease-out;
			transition-timing-function: ease-out;
			-webkit-transition: .5s;
			transition: .5s;
		}
		.navbar.vshow {
			visibility: visible !important;
			 -webkit-transition-timing-function: ease-in;
			transition-timing-function: ease-in;
			-webkit-transition: .3s;
			transition: .3s;
		}
		<?php } ?>
	<?php } else { ?>
		<?php if ( !apparatus_is_front() ) { ?>
		.navbar.vhidden, .navbar.vhidden li, .navbar.vhidden li a, .navbar.vhidden .navbar-brand {
			visibility: hidden !important;
			 -webkit-transition-timing-function: ease-out;
			transition-timing-function: ease-out;
			-webkit-transition: .5s;
			transition: .5s;
		}
		.navbar.vshow {
			visibility: visible !important;
			 -webkit-transition-timing-function: ease-in;
			transition-timing-function: ease-in;
			-webkit-transition: .3s;
			transition: .3s;
		}
		<?php } ?>
	<?php } ?>
	
	<?php if(apparatus_get_option('apparatus_global_button_style') == '2') { ?>
	a .button.bg-color-1, .pricing a.button, .button, a.link, .ft_blog_page .blog-standard .news-block .read-more{
		border-radius: 3em !important;
	}
	.woocommerce .button, .woocommerce .login .button, .woocommerce div.product form.cart .button,
	.woocommerce div.product form.cart .button:hover,.woocommerce-tabs ul.tabs li.active,.woocommerce-tabs ul.tabs li:hover,
	.woocommerce .product ul.tabs li.active a,.woocommerce .product ul.tabs li:hover a,
	.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
	.woocommerce .button:hover, .wc-forward:hover, .woocommerce .login .button:hover, .woocommerce a.button:hover,
	.woocommerce #respond input#submit:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,  .woocommerce a.added_to_cart.wc-forward:hover,
	.woocommerce .menu-card:hover .button, .woocommerce .menu-card:hover .wc-forward, .woocommerce .menu-card:hover a.button,
	.woocommerce div.product .woocommerce-tabs ul.tabs li a,
	.woocommerce div.product .woocommerce-tabs ul.tabs li{
		border-radius: 3em !important;
	}
	<?php } ?>

	<?php if( (isset(apparatus_get_option('footer_background_img')['url']) && !empty(apparatus_get_option('footer_background_img')['url'])) ) { //Footer BG ?>
	footer{
		background-image: url(<?php echo esc_url( apparatus_get_option('footer_background_img')['url'] ); ?>);
	}
	<?php } else { ?>
	footer{
		background-image: url(<?php echo get_template_directory_uri().'/images'; ?>/backgrounds-min/ambient-min.jpg);
	}
	<?php } ?>
	<?php if ( is_user_logged_in() ) { ?>
	.comment-form .col-sm-6, .comment-form .col-sm-12 {
		padding-right: 15px;
		padding-left: 15px;
	}
	<?php } ?>
	<?php if( !is_active_sidebar( 'apparatus_sidebar_widgets' ) ) { ?>
	@media only screen and (min-width: 992px) {
		.blog-mr-10 {
			margin-right: 0;
		}
	}
	<?php } ?>
	<?php if($footer_logo_ptop != ''){ ?>	
	.footer-brand .logo{
		padding-top:<?php echo esc_attr($footer_logo_ptop);?>
	}
	<?php } ?>		
	
	<?php if($typography_font_family != ''){ ?>	
		h1,h2,h3,h4,h5,h6,.hiw .fbox_title,.features .card-features p.title,.video h2.heading2,.call-to-action h2.heading2,.testimonials .user-name p.name,.pricing .plan_name,
		.stats p.white.bold, .blog  .blog-description p.bold.dark,.pricing .price.plan_price,.pricing .price.plan_price span,.ft_single_page .blog-description h2, .ft_blog_page h2, .ft_single_page h2,
		.meta-information  h2 a,.h1,.h2,.h3,.h4,.h5,.h6,th,dt{
		font-family: <?php echo wp_specialchars_decode($typography_font_family);?> !important; 
	}
	<?php } ?>	
	<?php if($typography_color != ''){ ?>	
		h1,h2,h3,h4,h5,h6,.hiw .fbox_title,.features .card-features p.title,.video h2.heading2,.call-to-action h2.heading2,.testimonials .user-name p.name,.pricing .plan_name,
		.stats p.white.bold, .blog  .blog-description p.bold.dark,.pricing .price.plan_price,.pricing .price.plan_price span, .ft_single_page .blog-description h2, .ft_blog_page h2,
		.ft_single_page section.single-layout-one h1, .ft_single_page section.single-layout-one .dialog h1,.ft_single_page section.single-layout-one h5,.ft_single_page h2,
		.side-bar .bg2-right-col-item-title, .side-bar .apparatus-recent-post-widget .widget .row h5, .ft_blog_page .blog-standard .news-block h2 a,
		.ft_single_page section.single-layout-one h4, #comments-section .author_info, #comments-section time,
		.ft_single_page section.single-layout-one h3, #comments-section .comment-field-heading, .comment-meta.author_info a,
		.meta-information  h2 a,.h1,.h2,.h3,.h4,.h5,.h6,th,dt{
		color: <?php echo esc_attr($typography_color);?>; 
	}
	<?php } ?>	
	<?php if($typography_font_weight != ''){ ?>	
		h1,h2,h3,h4,h5,h6,.hiw .fbox_title,.features .card-features p.title,.video h2.heading2,.call-to-action h2.heading2,.testimonials .user-name p.name,.pricing .plan_name,.stats p.white.bold, .blog  .blog-description p.bold.dark,.pricing .price.plan_price,.pricing .price.plan_price span,.meta-information  h2 a,.h1,.h2,.h3,.h4,.h5,.h6,th,dt{
		font-weight: <?php echo esc_attr($typography_font_weight);?> !important; 
	}
	<?php } ?>
	
	<?php if( ($typography_font_family != '') && ($typography_font_family == 'Poppins') ){ ?>
	/*Only for Poppins*/
	/*Headings*/
	.header h1.heading2{
		font-size: 45px !important;
		line-height: 53px !important;
		font-weight: 300 !important;
		color: rgb(88, 70, 140);
		letter-spacing: 0px !important;
	}
	h2.headline2, h2.heading2, h2.sec2_heading2, p.plan_price span, .ft_single_page section.single-layout-one .section-title h1,
	.ft_blog_page .section-title h2, .ft_single_page .section-title h2, .ft_blog_page .blog-standard .news-block h2{
		font-size: 45px !important;
		line-height: 1.22em !important; 
		font-weight: 300 !important;
	}
	.hiw p.fbox_title, .features .card-features p.title, .testimonials .user-name p.name, .stats p.white.bold,
	.side-bar .bg2-right-col-item-title, .side-bar .bg2-right-col-item-title.author-name, .blog .blog-card p.bold.dark,
	.ft_single_page .blog-description h2{
		font-size: 22px !important;
		line-height: 1.45em !important;
		font-weight: 400 !important;
	}
	.side-bar .apparatus-recent-post-widget .widget .row h5{
		font-size: 16px !important;
		line-height: 1.3em !important;
		font-weight: 400 !important;
	}
	/*END headings*/
	/*Paragraphs*/
	p.heading3, p.headline3, p.sec2_heading3, .about p.desc,
	.ft_blog_page p.thin, .ft_blog_page p.thin, .ft_single_page p.thin, .ft_single_page p.thin{
		color: #716c80;
		font-weight: 300 !important;
		font-size: 20px !important;
		line-height: 31px !important;
	}
	p.fbox_desc, .card-features p.light, .testimonial p.description, .pricing p.plan_desc,
	.ft_blog_page .blog-standard .news-block p,
	.ft_single_page section.single-layout-one p{
		font-size: 16px !important;
		line-height: 28px !important;
		color: #716c80;
		font-weight: 300 !important;
	}
	.side-bar .apparatus-recent-post-widget .widget .row .post-date{
		color: #716c80;
	}
	.blog-description p.light, .pricing p.plan_desc{
		font-size: 18px !important;
		line-height: 28px !important;
		color: #716c80;
		font-weight: 300 !important;
	}
	.section-title p.small, .main-title p.small, p.small.heading3, .ft_blog_page .blog-standard .news-block .meta-info ul li,
	.ft_blog_page .blog-standard .news-block .meta-info ul li a, .single-layout-one .meta-option ul li a{
		font-size: 11px !important;
		letter-spacing: .125em !important;
		font-weight: 400 !important;
		text-transform: uppercase !important;
		line-height: 28px !important;
		font-family: <?php echo wp_specialchars_decode($typography_font_family);?> !important;
	}
	/*End Paragraphs*/

	/*Buttons and Links*/
	a .button.bg-color-1, .pricing a.button, .button{
		font-size: 12px !important;
		font-family: <?php echo wp_specialchars_decode($typography_font_family);?> !important;
		line-height: 2em !important;
		letter-spacing: .125em !important;
		font-weight: 500 !important;
		text-transform: uppercase !important;
	}

	a.link, a.white-link, .ft_blog_page .blog-standard .news-block .read-more, .single-layout-one .posts-nav a{
		font-family: <?php echo wp_specialchars_decode($typography_font_family);?> !important;
		font-size: 11px !important;
		line-height: 2em !important;
		letter-spacing: .125em !important;
		font-weight: 500 !important;
		text-transform: uppercase !important;
	}
	/*END Buttons and Links*/
	/*Related Things*/
	.ft_blog_page .blog-standard .news-block .meta-info ul.pull-left:before {
		top: 113px;
	}
	.wpb_wrapper .dialog:after {
		bottom: 135px;
	}
	.white-light, .section-head .bcrumbs li a, .section-head .bcrumbs li span, .section-head .bcrumbs li.separator::before {
		opacity: 1;
	}
	.footer-copyright p.thin.white-light{
		opacity: .7 !important;
		font-weight: 400 !important;
		font-size: 80% !important;
		line-height: 27px !important;
	}
	/*END only for Poppins*/
	<?php } ?>
	
	<?php if($typography_links_font_family != ''){ ?>	
		.prev-post,.next-post,a .button.bg-color-1,a.gray.link,a.white-link,.button,.meta-info ul li a{
		font-family: <?php echo wp_specialchars_decode($typography_links_font_family);?> !important; 
	}
	<?php } ?>	
	<?php if($typography_links_color != ''){ ?>	
		.prev-post,.next-post,a.link,.meta-info ul li a, .side-bar li a, .side-bar a{
		color: <?php echo esc_attr($typography_links_color);?> !important; 
	}
	<?php } ?>	
	<?php if($typography_links_font_weight != ''){ ?>	
		.prev-post,.next-post,a .button.bg-color-1,a.gray.link,a.white-link,.button,.meta-info ul li a{
		font-weight: <?php echo esc_attr($typography_links_font_weight);?> !important; 
	}
	<?php } ?>
	
	<?php if(!empty($apparatus_h1_font_weight)){?>
	h1{
		font-weight:<?php echo esc_attr($apparatus_h1_font_weight);?> !important;
	}
	<?php } ?>
	<?php if(!empty($apparatus_h1_font_size)){?>
	h1{
		font-size:<?php echo esc_attr($apparatus_h1_font_size);?> !important;
	}
	<?php } ?>
	<?php if(!empty($apparatus_h1_line_height)){?>
	h1{
		line-height:<?php echo esc_attr($apparatus_h1_line_height);?> !important;
	}
	<?php } ?>
	<?php if(!empty($apparatus_h2_font_weight)){?>
	h2{
		font-weight:<?php echo esc_attr($apparatus_h2_font_weight);?> !important;
	}
	<?php } ?>
	<?php if(!empty($apparatus_h2_font_size)){?>
	h2{
		font-size:<?php echo esc_attr($apparatus_h2_font_size);?> !important;
	}
	<?php } ?>
	<?php if(!empty($apparatus_h2_line_height)){?>
	h2{
		line-height:<?php echo esc_attr($apparatus_h2_line_height);?> !important;
	}
	<?php } ?>	
	<?php if(!empty($apparatus_h3_font_weight)){?>
	h3,.blog .blog-card p.bold.dark{
		font-weight:<?php echo esc_attr($apparatus_h3_font_weight);?> !important;
	}
	<?php } ?>
	<?php if(!empty($apparatus_h3_font_size)){?>
	h3,.blog .blog-card p.bold.dark{
		font-size:<?php echo esc_attr($apparatus_h3_font_size);?> !important;
	}
	<?php } ?>
	<?php if(!empty($apparatus_h3_line_height)){?>
	h3,.blog .blog-card p.bold.dark{
		line-height:<?php echo esc_attr($apparatus_h3_line_height);?> !important;
	}
	<?php } ?>	
	<?php if(!empty($apparatus_h4_font_weight)){?>
	h4{
		font-weight:<?php echo esc_attr($apparatus_h4_font_weight);?> !important;
	}
	<?php } ?>
	<?php if(!empty($apparatus_h4_font_size)){?>
	h4{
		font-size:<?php echo esc_attr($apparatus_h4_font_size);?> !important;
	}
	<?php } ?>
	<?php if(!empty($apparatus_h4_line_height)){?>
	h4{
		line-height:<?php echo esc_attr($apparatus_h4_line_height);?> !important;
	}
	<?php } ?>
	<?php if(!empty($apparatus_h5_font_weight)){?>
	h5{
		font-weight:<?php echo esc_attr($apparatus_h5_font_weight);?> !important;
	}
	<?php } ?>
	<?php if(!empty($apparatus_h5_font_size)){?>
	h5{
		font-size:<?php echo esc_attr($apparatus_h5_font_size);?> !important;
	}
	<?php } ?>
	<?php if(!empty($apparatus_h5_line_height)){?>
	h5{
		line-height:<?php echo esc_attr($apparatus_h5_line_height);?> !important;
	}
	<?php } ?>
	<?php if(!empty($apparatus_h6_font_weight)){?>
	h6{
		font-weight:<?php echo esc_attr($apparatus_h6_font_weight);?> !important;
	}
	<?php } ?>
	<?php if(!empty($apparatus_h6_font_size)){?>
	h6{
		font-size:<?php echo esc_attr($apparatus_h6_font_size);?> !important;
	}
	<?php } ?>
	<?php if(!empty($apparatus_h6_line_height)){?>
	h6{
		line-height:<?php echo esc_attr($apparatus_h6_line_height);?> !important;
	}
	<?php } ?>	
	<?php if(!empty($apparatus_blog_newsletter_heading1_color) && is_home()){?>
	.newsletter_section .section-title p.white-light.bold.small{
		color:<?php echo esc_attr($apparatus_blog_newsletter_heading1_color);?> !important;
	}
	<?php } ?>		
	<?php if(!empty($apparatus_blog_newsletter_heading2_color) && is_home()){?>
	.newsletter_section .section-title h2.h1{
		color:<?php echo esc_attr($apparatus_blog_newsletter_heading2_color);?> !important;
	}
	<?php } ?>		
	<?php if(!empty($apparatus_blog_newsletter_heading3_color) && is_home()){?>
	.newsletter_section .section-title .white-light.thin{
		color:<?php echo esc_attr($apparatus_blog_newsletter_heading3_color);?> !important;
	}
	<?php } ?>	
	<?php if(!empty($apparatus_single_post_newsletter_heading1_color) && is_single()){?>
	.newsletter_section .section-title p.white-light.bold.small{
		color:<?php echo esc_attr($apparatus_single_post_newsletter_heading1_color);?> !important;
	}
	<?php } ?>		
	<?php if(!empty($apparatus_single_post_newsletter_heading2_color) && is_single()){?>
	.newsletter_section .section-title h2.h1{
		color:<?php echo esc_attr($apparatus_single_post_newsletter_heading2_color);?> !important;
	}
	<?php } ?>		
	<?php if(!empty($apparatus_single_post_newsletter_heading3_color) && is_single()){?>
	.newsletter_section .section-title .white-light.thin{
		color:<?php echo esc_attr($apparatus_single_post_newsletter_heading3_color);?> !important;
	}
	<?php } ?>	
	<?php if(!empty($apparatus_single_page_newsletter_heading1_color) && is_page()){?>
	.newsletter_section .section-title p.white-light.bold.small{
		color:<?php echo esc_attr($apparatus_single_page_newsletter_heading1_color);?> !important;
	}
	<?php } ?>		
	<?php if(!empty($apparatus_single_page_newsletter_heading2_color) && is_page()){?>
	.newsletter_section .section-title h2.h1{
		color:<?php echo esc_attr($apparatus_single_page_newsletter_heading2_color);?> !important;
	}
	<?php } ?>		
	<?php if(!empty($apparatus_single_page_newsletter_heading3_color) && is_page()){?>
	.newsletter_section .section-title .white-light.thin{
		color:<?php echo esc_attr($apparatus_single_page_newsletter_heading3_color);?> !important;
	}
	<?php } ?>		
	<?php if((!empty($apparatus_blog_page_header_sec_padding_top) || !empty($apparatus_blog_page_header_sec_padding_bottom)) && apparatus_is_blog_only()){?>
	.header-row{
			<?php if($apparatus_blog_page_header_sec_padding_top != '') { ?>
			padding-top:<?php echo esc_attr($apparatus_blog_page_header_sec_padding_top);?>;
			<?php } ?>
			<?php if($apparatus_blog_page_header_sec_padding_bottom != '') { ?>
			padding-bottom:<?php echo esc_attr($apparatus_blog_page_header_sec_padding_bottom);?>;
			<?php } ?>
	}
	<?php } ?>	
	<?php if((!empty($apparatus_single_post_header_sec_padding_top) || !empty($apparatus_single_post_header_sec_padding_bottom)) && is_single()){?>
	.header-row{
			<?php if($apparatus_single_post_header_sec_padding_top != '') { ?>
			padding-top:<?php echo esc_attr($apparatus_single_post_header_sec_padding_top);?>;
			<?php } ?>
			<?php if($apparatus_single_post_header_sec_padding_bottom != '') { ?>
			padding-bottom:<?php echo esc_attr($apparatus_single_post_header_sec_padding_bottom);?>;
			<?php } ?>
	}
	<?php } ?>	
	<?php if( (!empty($apparatus_single_page_header_sec_padding_top) || !empty($apparatus_single_page_header_sec_padding_bottom))
	&& ((is_page() || is_home() || is_search() || is_archive() || is_404()) || ( ( class_exists( 'woocommerce' ) ) && ( is_woocommerce() ) ) ) ){ ?>
	.header-blog{
			<?php if($apparatus_single_page_header_sec_padding_top != '') { ?>
			padding-top:<?php echo esc_attr($apparatus_single_page_header_sec_padding_top);?>;
			<?php } ?>
			<?php if($apparatus_single_page_header_sec_padding_bottom != '') { ?>
			padding-bottom:<?php echo esc_attr($apparatus_single_page_header_sec_padding_bottom);?>;
			<?php } ?>
	}
	<?php } elseif( (empty($apparatus_single_page_header_sec_padding_top) || empty($apparatus_single_page_header_sec_padding_bottom))
	&& ((is_page() || is_home() || is_search() || is_archive() || is_404()) || ( ( class_exists( 'woocommerce' ) ) && ( is_woocommerce() ) ) ) ){ ?>
	.header-blog {
		height: 40vh;
	}
	<?php } ?>
	<?php if(!empty($footer_text_logo_color)){?>
	.footer-brand .logo{
		color:<?php echo esc_attr($footer_text_logo_color);?>;
	}
	<?php } ?>	
	<?php if(!empty($footer_logo_primary_color) && !empty($footer_logo_secondary_color)){?>
	.footer-brand .logo{
		background: linear-gradient(-180deg, <?php echo esc_attr($footer_logo_primary_color); ?> 0%, <?php echo esc_attr($footer_logo_secondary_color); ?> 100%);
	}
	<?php } ?>
	.recentcomments a {
		display: inline-block !important;
		padding: 3px 12px !important;
		margin: 10px 7px 2px 0 !important;
	}
</style>
<?php }
add_action( 'wp_head', 'apparatus_styles_custom', 100 );
?>