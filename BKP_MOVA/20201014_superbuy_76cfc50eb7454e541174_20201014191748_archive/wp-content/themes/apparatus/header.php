<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NDVG8TB');</script>
<!-- End Google Tag Manager -->
	
	<!-- Favicon -->
	<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
	if( (isset(apparatus_get_option('apparatus_favicon')['url']) && !empty(apparatus_get_option('apparatus_favicon')['url'])) ) { ?>
    <link rel="shortcut icon" href="<?php echo esc_url( apparatus_get_option('apparatus_favicon')['url'] ); ?>">
	<?php } } ?>
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NDVG8TB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	
<?php
$logo_url = isset( apparatus_get_option('logo_url')['url'] ) ? apparatus_get_option('logo_url')['url'] : '';
$apparatus_text_logo = apparatus_get_option('apparatus_text_logo');
?>
<?php if(apparatus_get_option('apparatus_preloader') == '1') { ?>
    <!-- Preloader -->
    <div class="preloader">
        <div class="status">
            <div class="spinner">
                <div class="bg-color-2 rect1"></div>
                <div class="bg-color-2 rect2"></div>
                <div class="bg-color-2 rect3"></div>
                <div class="bg-color-2 rect4"></div>
                <div class="bg-color-2 rect5"></div>
            </div>
        </div>
    </div>
   <!--  Preloader end -->

<?php } ?>
    <!-- Page -->
    <div id="top" class="page-wrap">
        <!-- Navigation -->
        <nav id="navigation" class="navbar navbar-expand-lg<?php if (!apparatus_is_front() || is_home()) { ?> navbar-blog<?php } ?>">
            <div class="container" id="navigation-container">
                <!-- Logo -->
				<?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>
					<?php apparatus_the_custom_logo(); ?>
				<?php else: ?>
				<?php if ($logo_url != '') { ?>
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="logo-image" id="logo_img"><img src="<?php echo esc_url( apparatus_get_option('logo_url')['url'] ); ?>" <?php if ( apparatus_get_option( 'logo_height') != '' ) { ?>height="<?php echo esc_attr( apparatus_get_option('logo_height') ); ?>"<?php } if ( apparatus_get_option( 'logo_width' ) != '') { ?> width="<?php echo esc_attr( apparatus_get_option('logo_width') ); ?>"<?php } ?> alt="<?php esc_attr_e('logo', 'apparatus'); ?>" /></div>
                </a>
				<?php } elseif ( ($logo_url == '' ) && ($apparatus_text_logo != '' ) ) { ?>
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="logo<?php if( (apparatus_get_option('logo_primary_color') == '') && (apparatus_get_option('logo_secondary_color') == '') ) { ?> bg-color-1<?php } ?>" id="logo_img"><?php echo esc_attr( $apparatus_text_logo ); ?></div>
                </a>
				<?php } else { ?>
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="logo<?php if( (apparatus_get_option('logo_primary_color') == '') && (apparatus_get_option('logo_secondary_color') == '') ) { ?> bg-color-1<?php } ?>" id="logo_img"><?php esc_html_e('å', 'apparatus'); ?></div>
                </a>
				<?php } ?>
				<?php endif; ?>
                <!-- Logo end -->
                <!-- Burger menu button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="burger-menu">
                        <span class="burger"></span>
                    </span>
                </button>
                <!-- Burger menu button end -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
						if ( has_nav_menu('apparatus_primary_menu') ) {
						wp_nav_menu( array(
							'theme_location'    => 'apparatus_primary_menu',
							'container'     => false,
							'container_id'      => '',
							'conatiner_class'   => '',
							'menu_class'        => 'navbar-nav mrg-auto nav-menu-width', 
							'echo'          => true,
							'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'         => 10, 
							'walker'        => new apparatus_walker_nav_menu
						) );
						} else {
							esc_html__( 'Setup Your Menu from "Appearance - Menus" page of your WP-Admin Panel' , 'apparatus' );
						}
					?>

                </div>
            </div>
        </nav>
        <!-- Navigation end -->