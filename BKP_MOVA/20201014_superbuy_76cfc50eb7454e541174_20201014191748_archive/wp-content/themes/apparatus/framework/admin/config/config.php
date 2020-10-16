<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
	function apparatus_get_option($id) {
		$redux=get_option( 'theme_option_data' );
		if (is_array($redux) && array_key_exists($id, $redux)) {
		$returned_redux = $redux[$id];
		} else {
		$returned_redux = '';
		}
		return $returned_redux;
	}
    // This is your option name where all the Redux data is stored.
    $opt_name = "theme_option_data";
    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );
    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'apparatus' ),
        'page_title'           => esc_html__( 'Theme Options', 'apparatus' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        'disable_google_fonts_link' => false,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'apparatus-theme-options',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
       // 'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
		'show_options_object' => false,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

	$allowed_html = array(
    'span' => array(),
    'a' => array('href'=> array()),
    'p' => array(),
);



    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( '', $v );
    } else {
        $args['intro_text'] = '';
    }

    // Add content after the form.
    $args['footer_text'] = '';

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array();
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = '';
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'General', 'apparatus' ),
		'icon' => 'el el-home',
        'desc'       => '',
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'General Settings', 'apparatus' ),
		'icon' => 'el el-globe-alt',
        'subsection' => true,		
        'desc'       => '',
		'fields' => array(
			array(
				'id' => 'apparatus_favicon',
				'type' => 'media',
				'title' => esc_html__('Upload Favicon', 'apparatus') ,
				'subtitle' => esc_html__('This is favicon. Upload 64x64 favicon icon.', 'apparatus') ,
			),
			array(
				'id' => 'apparatus_preloader',
				'type' => 'switch',
				'title' => esc_html__('On/Off Page Preloader', 'apparatus') ,
				'subtitle' => esc_html__('On/Off Page Loader GIF', 'apparatus') ,
				'default' => '1'
			),

			array(
				'id' => 'apparatus_smooth_scroll',
				'type' => 'switch',
				'title' => esc_html__('On/Off Smooth Scroll Effect', 'apparatus'),
				'default' => '0'
			),
			array(
				'id' => 'custom_primary_color_one',
				'type' => 'color_rgba',
				'title' => esc_html__('Global Primary Color - One', 'apparatus'),
				'subtitle' => esc_html__('"Global Primary Color - One" and "Global Primary Color - Two" should be similar color.
										For example: White and Gray are similar color, but white and black is not similar.', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'custom_primary_color_two',
				'type' => 'color_rgba',
				'title' => esc_html__('Global Primary Color - Two', 'apparatus'),
				'subtitle' => esc_html__('"Global Primary Color - One" and "Global Primary Color - Two" should be similar color.
										For example: White and Gray are similar color, but white and black is not similar.', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'custom_secondary_color_one',
				'type' => 'color_rgba',
				'title' => esc_html__('Global Secondary Color - One', 'apparatus'),
				'subtitle' => esc_html__('"Global Secondary Color - One" and "Global Secondary Color - Two" should be similar color.
										For example: White and Gray are similar color, but white and black is not similar.', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'custom_secondary_color_two',
				'type' => 'color_rgba',
				'title' => esc_html__('Global Secondary Color - Two', 'apparatus'),
				'subtitle' => esc_html__('"Global Secondary Color - One" and "Global Secondary Color - Two" should be similar color.
										For example: White and Gray are similar color, but white and black is not similar.', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'apparatus_global_button_style',
				'type' => 'radio',
				'title' => esc_html__('Button Style', 'apparatus'),
				'options' => array(
					'1' => 'Square Shape',
					'2' => 'Rounded Shape',
				) , // Must provide key => value pairs for radio options
				'default' => '1'
			),
			array(
				'id' => 'woo_button_color_one',
				'type' => 'color_rgba',
				'title' => esc_html__('WooCommerce Buttons Color - One', 'apparatus'),
				'subtitle' => esc_html__('"WooCommerce Buttons Color - One" and "WooCommerce Buttons Color - Two" should be similar color.
										For example: White and Gray are similar color, but white and black is not similar.', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'woo_button_color_two',
				'type' => 'color_rgba',
				'title' => esc_html__('WooCommerce Buttons Color - Two', 'apparatus'),
				'subtitle' => esc_html__('"WooCommerce Buttons Color - One" and "WooCommerce Buttons Color - Two" should be similar color.
										For example: White and Gray are similar color, but white and black is not similar.', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'apparatus_sticky_menu_style',
				'type' => 'radio',
				'title' => esc_html__('Sticky Menu Style', 'apparatus'),
				'options' => array(
					'1' => '1st Style (Show Navigation Bar Always on Static HomePage and Not Always in Other Pages)',
					'2' => '2nd Style (Show Navigation Bar only when Scroll Up)',
					'3' => '3rd Style (Show Navigation Bar Always)',
				) , // Must provide key => value pairs for radio options
				'default' => '1'
			),
			array(
				'id' => 'header_background_img',
				'type' => 'media',
				'title' => esc_html__('Page Header Background Image', 'apparatus') ,
				'subtitle' => esc_html__('This will be overwritten if you upload different header images for different pages using the options given later.', 'apparatus') ,
			),
			array(
				'id' => 'header_background_img_mobile',
				'type' => 'media',
				'title' => esc_html__('Page Header Background Image for Mobile and Tabs', 'apparatus') ,
				'subtitle' => esc_html__('This page header image will be shown only in mobile and tablets.', 'apparatus'),
			),	
			array(
				'id' => 'apparatus_woo_page_breadcrumb_section',
				'type' => 'switch',
				'title' => esc_html__('Shop Page Header Breadcrumb', 'apparatus') ,
				'subtitle' => esc_html__('Turn on if you want Breadcrumb in Shop Page Header Section.', 'apparatus') ,
				'default' => '1'
			),
		),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Logo Settings', 'apparatus' ),
		'icon' => 'el el-adjust-alt',
        'subsection' => true,		
        'desc'       => esc_html__( 'This is for Logo options.', 'apparatus' ),
		'fields' => array(
			array(
				'id' => 'logo_url',
				'type' => 'media',
				'title' => esc_html__('Logo Image', 'apparatus'),
				'subtitle' => esc_html__('Upload your site logo here.', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'apparatus_text_logo',
				'type' => 'text',
				'title' => esc_html__('Text Logo', 'apparatus') ,
				'subtitle' => esc_html__('You can use Text instead of Image as your site logo. You must remove the above Logo Image to make Text Logo work.', 'apparatus') ,
				'default' => '',
			),
			array(
				'id' => 'logo_fnt_size',
				'type' => 'text',
				'title' => esc_html__('Text Logo Font Size', 'apparatus') ,
				'subtitle' => esc_html__('Input font-size in pixel. Example: 32px', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'text_logo_color',
				'type' => 'color_rgba',
				'title' => esc_html__('Text Logo Color', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'logo_primary_color',
				'type' => 'color_rgba',
				'title' => esc_html__('Text Logo Background Color - Primary', 'apparatus'),
				'subtitle' => esc_html__('If you want to use default color, keep it empty.', 'apparatus') ,
				'default' => '',
			),
			array(
				'id' => 'logo_secondary_color',
				'type' => 'color_rgba',
				'title' => esc_html__('Text Logo Background Color - Secondary', 'apparatus'),
				'subtitle' => esc_html__('If you want to use default color, keep it empty.', 'apparatus') ,
				'default' => '',
			),
			array(
				'id' => 'brdr_radious',
				'type' => 'text',
				'title' => esc_html__('Text Logo Border Radius', 'apparatus'),
				'subtitle' => esc_html__('Input border-radius in percentage. Example: 50%', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'logo_width',
				'type' => 'text',
				'title' => esc_html__('Logo Width', 'apparatus') ,
				'subtitle' => esc_html__('Input width in pixel. Example: 60px', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'logo_height',
				'type' => 'text',
				'title' => esc_html__('Logo Height', 'apparatus') ,
				'subtitle' => esc_html__('Input height in pixel. Example: 60px', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'logo_pleft',
				'type' => 'text',
				'title' => esc_html__('Left Padding for Logo', 'apparatus') ,
				'subtitle' => esc_html__('Input padding in pixel. Example: 0px', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'logo_pright',
				'type' => 'text',
				'title' => esc_html__('Right Padding for Logo', 'apparatus') ,
				'subtitle' => esc_html__('Input padding in pixel. Example: 0px', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'logo_ptop',
				'type' => 'text',
				'title' => esc_html__('Top Padding for Logo', 'apparatus') ,
				'subtitle' => esc_html__('Input padding in pixel. Example: 7px', 'apparatus'),
				'default' => '',
			),
		),
    ) );
	Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Typography', 'apparatus' ),
		'icon' => 'el el-font',
        'desc'       => '',
		'fields' => array(

            array(
                'id'       => 'apparatus_typography',
                'type'     => 'typography',
                'title'    => esc_html__('Headings Font-Family', 'apparatus'),
                'subtitle' => esc_html__('Specify the headings/titles font properties.', 'apparatus'),
                'google'   => true,
				'font-size'     => false,
				'font-style'    => false,
				 'line-height' => false,
				'text-align'   => false,
                'output' => '',
                'default'  => array(
                    'color'       => '',
                    'font-family' => '',
                    'font-weight' => '',
					'google'   => true,
                ),
				/*
				To support more than 1 font-weight, include the following condition in 600th line of this (framework/admin/ReduxCore/inc/fields/typography/field_typography.php) file.
				else {
					$link .= ':';
					$font_custom_weights = '300,400,500,700'; //add any other weights here as required
					$link .= $font_custom_weights;
				}
				*/
            ),
			
			array(
                'id'       => 'apparatus_links_typography',
                'type'     => 'typography',
                'title'    => esc_html__('Links and Buttons Font-Family', 'apparatus'),
                'subtitle' => esc_html__('Specify the links/buttons font properties.', 'apparatus'),
                'google'   => true,
				'font-size'     => false,
				'font-style'    => false,
				 'line-height' => false,
				'text-align'   => false,
                'output' => '',
                'default'  => array(
                    'color'       => '',
                    'font-family' => '',
                    'font-weight' => '',
					'google'   => true,
                ),
            ),
			
            array(
                'id'       => 'apparatus_h1_font_style',
                'type'     => 'typography',
                'title'    => esc_html__( 'Heading1 Font Styles', 'apparatus' ),
                'subtitle' => esc_html__( 'Specify the h1 font properties.', 'apparatus' ),
				'font-size'     => true,
				'font-style'    => false,
				'font-family'    => false,
				 'line-height' => true,
				'text-align'   => false,
				'color'   => false,
                'output' => '',
                'default'  => array(
                    'line-height' => '',
                    'font-size' => '',
                    'font-weight' => '',
                ),
            ),
            array(
                'id'       => 'apparatus_h2_font_style',
                'type'     => 'typography',
                'title'    => esc_html__( 'Heading2 Font Styles', 'apparatus' ),
                'subtitle' => esc_html__( 'Specify the h2 font properties.', 'apparatus' ),
				'font-size'     => true,
				'font-style'    => false,
				'font-family'    => false,
				 'line-height' => true,
				'text-align'   => false,
				'color'   => false,
                'output' => '',
                'default'  => array(
                    'line-height' => '',
                    'font-size' => '',
                    'font-weight' => '',
                ),
            ),
			
            array(
                'id'       => 'apparatus_h3_font_style',
                'type'     => 'typography',
                'title'    => esc_html__( 'Heading3 Font Styles', 'apparatus' ),
                'subtitle' => esc_html__( 'Specify the h3 font properties.', 'apparatus' ),
				'font-size'     => true,
				'font-style'    => false,
				'font-family'    => false,
				 'line-height' => true,
				'text-align'   => false,
				'color'   => false,
                'output' => '',
                'default'  => array(
                    'line-height' => '',
                    'font-size' => '',
                    'font-weight' => '',
                ),
            ),	

            array(
                'id'       => 'apparatus_h4_font_style',
                'type'     => 'typography',
                'title'    => esc_html__( 'Heading4 Font Styles', 'apparatus' ),
                'subtitle' => esc_html__( 'Specify the h4 font properties.', 'apparatus' ),
				'font-size'     => true,
				'font-style'    => false,
				'font-family'    => false,
				 'line-height' => true,
				'text-align'   => false,
				'color'   => false,
                'output' => '',
                'default'  => array(
                    'line-height' => '',
                    'font-size' => '',
                    'font-weight' => '',
                ),
            ),			
            array(
                'id'       => 'apparatus_h5_font_style',
                'type'     => 'typography',
                'title'    => esc_html__( 'Heading5 Font Styles', 'apparatus' ),
                'subtitle' => esc_html__( 'Specify the h5 font properties.', 'apparatus' ),
				'font-size'     => true,
				'font-style'    => false,
				'font-family'    => false,
				 'line-height' => true,
				'text-align'   => false,
				'color'   => false,
                'output' => '',
                'default'  => array(
                    'line-height' => '',
                    'font-size' => '',
                    'font-weight' => '',
                ),
            ),
            array(
                'id'       => 'apparatus_h6_font_style',
                'type'     => 'typography',
                'title'    => esc_html__( 'Heading6 Font Styles', 'apparatus' ),
                'subtitle' => esc_html__( 'Specify the h6 font properties.', 'apparatus' ),
				'font-size'     => true,
				'font-style'    => false,
				'font-family'    => false,
				 'line-height' => true,
				'text-align'   => false,
				'color'   => false,
                'output' => '',
                'default'  => array(
                    'line-height' => '',
                    'font-size' => '',
                    'font-weight' => '',
                ),
            ),			
			
		),
    ) ); 	
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog Settings', 'apparatus' ),
		'icon' => 'el el-cog-alt',
        'desc'       => '',
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog Page Settings', 'apparatus' ),
		'icon' => 'el el-th',
        'subsection' => true,		
        'desc'       => '',
		'fields' => array(
			array(
				'id' => 'apparatus_blog_sidebar_switch',
				'type' => 'switch',
				'title' => esc_html__('Blog Sidebar Switch', 'apparatus') ,
				'subtitle' => esc_html__('Turn on to Sidebar of Blog pages.', 'apparatus') ,
				'default' => '1'
				// 1 = checked | 0 = unchecked
			) ,
			array(
				'id' => 'apparatus_blog_header_section_switch',
				'type' => 'switch',
				'title' => esc_html__('Do you want Blog Header Section?', 'apparatus') ,
				'subtitle' => esc_html__('Turn on to display blog header section upon the blogs.', 'apparatus') ,
				'default' => '1'
			),
			array(
				'id' => 'apparatus_blog_page_breadcrumb_section',
				'type' => 'switch',
				'title' => esc_html__('Do you want Breadcrumb in Header Section?', 'apparatus') ,
				'subtitle' => esc_html__('Turn on to display Breadcrumb in Header section of Blog Pages.', 'apparatus') ,
				'default' => '1'
			),
			array(
				'id' => 'apparatus_blog_header_sec_title',
				'type' => 'textarea',
				'title' => esc_html__('Header Section Title', 'apparatus') ,
				'subtitle' => esc_html__('Enter here header section title. To make this option work, you need to Turn OFF Breadcrumb', 'apparatus') ,
				'validate' => 'html',
				'default' => '',
				'allowed_html' => array(
					'a' => array(
						'href' => array(),
						'title' => array()
					),
					'br' => array(),
					'em' => array(),
					'strong' => array()
				)
			) ,
			array(
				'id' => 'apparatus_blog_header_sec_btn_one_label',
				'type' => 'text',
				'title' => esc_html__('Header Section Button One Label', 'apparatus') ,
				'subtitle' => esc_html__('Enter here button label. To make this option work, you need to Turn OFF Breadcrumb', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_blog_header_sec_btn_one_url',
				'type' => 'text',
				'title' => esc_html__('Header Section Button One URL', 'apparatus') ,
				'subtitle' => esc_html__('Enter here button url. To make this option work, you need to Turn OFF Breadcrumb', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_blog_header_sec_btn_two_label',
				'type' => 'text',
				'title' => esc_html__('Header Section Button Two Label', 'apparatus') ,
				'subtitle' => esc_html__('Enter here button labe. To make this option work, you need to Turn OFF Breadcrumb', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_blog_header_sec_btn_two_url',
				'type' => 'text',
				'title' => esc_html__('Header Section Button Two URL', 'apparatus') ,
				'subtitle' => esc_html__('Enter here button url. To make this option work, you need to Turn OFF Breadcrumb', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_blog_header_sec_bg_img',
				'type' => 'media',
				'title' => esc_html__('Upload Header Section Background Image', 'apparatus') ,
				'subtitle' => esc_html__('Upload a Background Image, if you want to change default header section image for all Blog Page Headers', 'apparatus') ,
			) ,
            array(
				'id' => 'apparatus_blog_header_sec_top_padding',
				'type' => 'text',
				'title' => esc_html__('Header Section Top Padding for Blog pages', 'apparatus') ,
				'subtitle' => esc_html__('Input padding in pixel. Example: 100px', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_blog_header_sec_bottom_padding',
				'type' => 'text',
				'title' => esc_html__('Header Section Bottom Padding for Blog pages', 'apparatus') ,
				'subtitle' => esc_html__('Input padding in pixel. Example: 100px', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_blog_headline_switch',
				'type' => 'switch',
				'title' => esc_html__('Blog Headline', 'apparatus') ,
				'subtitle' => esc_html__('Turn on to display headlines below the Header Section of Blog pages.', 'apparatus') ,
				'default' => '0'

				// 1 = checked | 0 = unchecked

			) ,
			array(
				'id' => 'apparatus_blog_headline_one',
				'type' => 'text',
				'title' => esc_html__('Blog Headline One', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Blog Headline Switch.', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_blog_headline_two',
				'type' => 'textarea',
				'title' => esc_html__('Blog Headline Two', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Blog Headline Switch. To make text thin use "thin" class inside span tag. Example: <span class="thin">Blog</span>.To make text bold use "<b>" tag outside text. Example: <b>Blog</b>.', 'apparatus') ,
				'validate' => 'html',
				'default' => '',
				'allowed_html' => array(
					'a' => array(
						'href' => array(),
						'title' => array()
					),
					'br' => array(),
					'em' => array(),
					'strong' => array()
				)
			) ,
			array(
				'id' => 'apparatus_blog_headline_three',
				'type' => 'text',
				'title' => esc_html__('Blog Headline Three', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Blog Headline Switch.', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_blog_newsletter_switch',
				'type' => 'switch',
				'title' => esc_html__('Newsletter Section', 'apparatus') ,
				'subtitle' => esc_html__('Turn on to display newsletter section.', 'apparatus') ,
				'default' => '0'

				// 1 = checked | 0 = unchecked

			) ,
			array(
				'id' => 'apparatus_blog_newsletter_headline_one',
				'type' => 'text',
				'title' => esc_html__('Newsletter Headline One', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Blog Newsletter Switch.', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_blog_newsletter_headline_two',
				'type' => 'textarea',
				'title' => esc_html__('Newsletter Headline Two', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Blog Newsletter Switch. To make text thin use "thin" class inside span tag. Example: <span class="thin">Newsletter</span>.To make text bold use "<b>" tag outside text. Example: <b>Newsletter</b>.', 'apparatus') ,
				'validate' => 'html',
				'default' => '',
				'allowed_html' => array(
					'a' => array(
						'href' => array(),
						'title' => array()
					),
					'br' => array(),
					'em' => array(),
					'strong' => array()
				)
			) ,
			array(
				'id' => 'apparatus_blog_newsletter_headline_three',
				'type' => 'text',
				'title' => esc_html__('Newsletter Headline Three', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Blog Newsletter Switch.', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_blog_newsletter_sec_bg_img',
				'type' => 'media',
				'title' => esc_html__('Upload Newsletter Section Background Image', 'apparatus') ,
				'subtitle' => esc_html__('(Optional)', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_blog_newsletter_heading1_color',
				'type' => 'color_rgba',
				'title' => esc_html__('Blog Newsletter Headline One Color', 'apparatus'),
				'default' => '',
			),	
			array(
				'id' => 'apparatus_blog_newsletter_heading2_color',
				'type' => 'color_rgba',
				'title' => esc_html__('Blog Newsletter Headline Two Color', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'apparatus_blog_newsletter_heading3_color',
				'type' => 'color_rgba',
				'title' => esc_html__('Blog Newsletter Headline Three Color', 'apparatus'),
				'default' => '',
			),				
			array(
				'id' => 'apparatus_blog_contact_form_switch',
				'type' => 'switch',
				'title' => esc_html__('On/Off Contact Form Section', 'apparatus') ,
				'subtitle' => esc_html__('Turn on to display contact form section.', 'apparatus'),
				'default' => '0'

				// 1 = checked | 0 = unchecked
			) ,	
			array(
				'id' => 'apparatus_blog_contact_form_headline_one',
				'type' => 'text',
				'title' => esc_html__('Contact Form Headline One', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Contact Form Section Switch.', 'apparatus') ,
				'default' => esc_html__('Get in touch', 'apparatus'),
			) ,
			array(
				'id' => 'apparatus_blog_contact_form_headline_two',
				'type' => 'textarea',
				'title' => esc_html__('Contact Form Headline Two', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Contact Form Section Switch. To make text thin use "thin" class inside span tag. Example: <span class="thin">Blog</span>.To make text bold use "<b>" tag outside text. Example: <b>Blog</b>.', 'apparatus') ,
				'validate' => 'html',
				'default' => esc_html__('Write us a message', 'apparatus'),
				'allowed_html' => array(
					'a' => array(
						'href' => array(),
						'title' => array()
					),
					'br' => array(),
					'em' => array(),
					'strong' => array()
				)
			) ,
			array(
				'id' => 'apparatus_blog_contact_form_headline_three',
				'type' => 'text',
				'title' => esc_html__('Contact Form Headline Three', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Contact Form Section Switch.', 'apparatus') ,
				'default' => 'Dolor sit Mollitia harum ea ut eaque velit'
			) ,	
			array(
				'id' => 'apparatus_blog_contact_form_bg_img',
				'type' => 'media',
				'title' => esc_html__('Upload Contact Form Section Background Image', 'apparatus') ,
				'subtitle' => esc_html__('(Optional)', 'apparatus') ,
			) ,	
			array(
				'id' => 'apparatus_blog_contact_form_email_subject',
				'type' => 'text',
				'title' => esc_html__('Contact Form Email Subject', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Contact Form Section Switch.', 'apparatus') ,
			) ,	
			array(
				'id' => 'apparatus_blog_contact_form_recipient_email',
				'type' => 'text',
				'title' => esc_html__('Contact Form Recipient Email', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Contact Form Section Switch.', 'apparatus') ,
			) ,	
			array(
				'id' => 'apparatus_blog_contact_form_recipient_name',
				'type' => 'text',
				'title' => esc_html__('Contact Form Recipient Name', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Contact Form Section Switch.', 'apparatus') ,
			) ,	
			array(
				'id' => 'apparatus_blog_contact_form_heading1_color',
				'type' => 'color_rgba',
				'title' => esc_html__('Contact Form Headline One Color', 'apparatus'),
				'default' => '',
			),	
			array(
				'id' => 'apparatus_blog_contact_form_heading2_color',
				'type' => 'color_rgba',
				'title' => esc_html__('Contact Form Headline Two Color', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'apparatus_blog_contact_form_heading3_color',
				'type' => 'color_rgba',
				'title' => esc_html__('Contact Form Headline Three Color', 'apparatus'),
				'default' => '',
			),	
			
			
		),
    ) );	
	
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog Post Settings', 'apparatus' ),
		'icon' => 'el el-blogger',
        'subsection' => true,		
        'desc'       => '',
		'fields' => array(
			array(
				'id' => 'apparatus_single_post_style',
				'type' => 'radio',
				'title' => esc_html__('Turn On/Off Sidebar', 'apparatus') ,
				'options' => array(
					'1' => esc_html__('Sidebar with Single Post - Off', 'apparatus') ,
					'2' => esc_html__('Sidebar with Single Post - On', 'apparatus') ,
				) , // Must provide key => value pairs for radio options
				'default' => '2'
			),
			array(
				'id' => 'apparatus_single_post_capitalize_headings',
				'type' => 'switch',
				'title' => esc_html__('Capitalize Headings', 'apparatus') ,
				'subtitle' => esc_html__('Make the headings Capitalized of Single Posts.', 'apparatus') ,
				'default' => '0'
			) ,
			array(
				'id' => 'apparatus_single_post_header_section_switch',
				'type' => 'switch',
				'title' => esc_html__('Single Post Header Section', 'apparatus') ,
				'subtitle' => esc_html__('Turn on to display single post header section.', 'apparatus') ,
				
				'default' => '1'
			),
			array(
				'id' => 'apparatus_single_post_breadcrumb_section',
				'type' => 'switch',
				'title' => esc_html__('Single Post Breadcrumb in Header Section', 'apparatus') ,
				'subtitle' => esc_html__('Turn on to display Breadcrumb in header section.', 'apparatus') ,
				
				'default' => '1'
			),
			array(
				'id' => 'apparatus_single_post_header_sec_btn_two_label',
				'type' => 'text',
				'title' => esc_html__('Header Section Button Two Label', 'apparatus') ,
				'subtitle' => esc_html__('Enter here button label name. To make this option work, you need to Turn OFF Breadcrumb', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_single_post_header_sec_btn_two_url',
				'type' => 'text',
				'title' => esc_html__('Header Section Button Two URL', 'apparatus') ,
				'subtitle' => esc_html__('Enter here button label name. To make this option work, you need to Turn OFF Breadcrumb', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_single_post_header_sec_bg_img',
				'type' => 'media',
				'title' => esc_html__('Upload Header Section Background Image', 'apparatus') ,
				'subtitle' => esc_html__('Upload a Background Image, if you want to change default header section image for all Single Post headers', 'apparatus') ,
			),
            array(
				'id' => 'apparatus_single_post_header_sec_top_padding',
				'type' => 'text',
				'title' => esc_html__('Header Section Top Padding for Posts pages', 'apparatus') ,
				'subtitle' => esc_html__('Input padding in pixel. Example: 100px', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_single_post_header_sec_bottom_padding',
				'type' => 'text',
				'title' => esc_html__('Header Section Bottom Padding for Posts pages', 'apparatus') ,
				'subtitle' => esc_html__('Input padding in pixel. Example: 100px', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_blog_single_meta_tags',
				'type' => 'switch',
				'title' => esc_html__('Post Meta on Single Posts', 'apparatus') ,
				'subtitle' => esc_html__('Turn on to display post meta with each post.', 'apparatus'),				
				'default' => '1'
			),
			array(
				'id' => 'apparatus_blog_single_comments_meta',
				'type' => 'switch',
				'title' => esc_html__('Comments on Single Posts Meta of Post Layout One', 'apparatus') ,
				'subtitle' => esc_html__('Turn on to display Comments count on meta section of Single Posts.', 'apparatus'),				
				'default' => '0'
			),
			array(
				'id' => 'apparatus_single_post_single_next_posts',
				'type' => 'switch',
				'title' => esc_html__('Next and Previous Posts for Single Posts Layout One', 'apparatus') ,
				'subtitle' => esc_html__('This option is for Post Layout One only.', 'apparatus') ,				
				'default' => '1'
				// 1 = checked | 0 = unchecked
			) ,
			array(
				'id' => 'apparatus_single_post_next_prev_shadow',
				'type' => 'radio',
				'title' => esc_html__('Turn On/Off Shadow', 'apparatus') ,
				'options' => array(
					'1' => esc_html__('Shadow - Off', 'apparatus') ,
					'2' => esc_html__('Shadow - On', 'apparatus') ,
				) , // Must provide key => value pairs for radio options
				'default' => '1'
			),
			array(
				'id' => 'apparatus_single_post_newsletter_switch',
				'type' => 'switch',
				'title' => esc_html__('Newsletter Section', 'apparatus') ,
				'subtitle' => esc_html__('Turn on to display newsletter section.', 'apparatus') ,				
				'default' => '0'
			),
			array(
				'id' => 'apparatus_single_post_newsletter_headline_one',
				'type' => 'text',
				'title' => esc_html__('Newsletter Headline One', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Newsletter Section Switch.', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_single_post_newsletter_headline_two',
				'type' => 'textarea',
				'title' => esc_html__('Newsletter Headline Two', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Newsletter Section Switch. To make text thin use "thin" class inside span tag. Example: <span class="thin">Newsletter</span>.To make text bold use "<b>" tag outside text. Example: <b>Newsletter</b>.', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_single_post_newsletter_headline_three',
				'type' => 'text',
				'title' => esc_html__('Newsletter Headline Three', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Newsletter Section Switch.', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_single_post_newsletter_sec_bg_img',
				'type' => 'media',
				'title' => esc_html__('Upload Newsletter Section Background Image', 'apparatus') ,
				'subtitle' => esc_html__('(Optional)', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_single_post_newsletter_heading1_color',
				'type' => 'color_rgba',
				'title' => esc_html__('Newsletter Section Headline One Color', 'apparatus'),
				'default' => '',
			),	
			array(
				'id' => 'apparatus_single_post_newsletter_heading2_color',
				'type' => 'color_rgba',
				'title' => esc_html__('Newsletter Section Headline Two Color', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'apparatus_single_post_newsletter_heading3_color',
				'type' => 'color_rgba',
				'title' => esc_html__('Newsletter Section Headline Three Color', 'apparatus'),
				'default' => '',
			),				
			array(
				'id' => 'apparatus_cat_single_post_switch',
				'type' => 'switch',
				'title' => esc_html__('Categorised Posts Section', 'apparatus') ,
				'subtitle' => esc_html__('Turn on to display Categorised Posts Section.', 'apparatus') ,				
				'default' => '0'
				// 1 = checked | 0 = unchecked
			) ,	
			array(
				'id' => 'apparatus_cat_single_post_headline_one',
				'type' => 'text',
				'title' => esc_html__('Categorised Posts Headline One', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Categorised Posts Section Switch.', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_cat_single_post_headline_two',
				'type' => 'textarea',
				'title' => esc_html__('Categorised Posts Headline Two', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Categorised Posts Section Switch. To make text thin use "thin" class inside span tag. Example: <span class="thin">Blog</span>.To make text bold use "<b>" tag outside text. Example: <b>Blog</b>.', 'apparatus') ,
				'validate' => 'html',
				'default' => '',
				'allowed_html' => array(
				'a' => array(
					'href' => array(),
					'title' => array()
				),
				'br' => array(),
				'em' => array(),
				'strong' => array()
			)
			) ,
			array(
				'id' => 'apparatus_cat_single_post_headline_three',
				'type' => 'text',
				'title' => esc_html__('Categorised Posts Headline Three', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Categorised Posts Section Switch.', 'apparatus') ,
			) ,	
			array(
				'id' => 'apparatus_cat_single_post_category',
				'type' => 'text',
				'title' => esc_html__('Category ID:', 'apparatus') ,
				'subtitle' => esc_html__('Enter here numeric value only.', 'apparatus') ,
			) ,			
			array(
				'id' => 'apparatus_cat_single_post_post_no',
				'type' => 'text',
				'title' => esc_html__('Number of Posts in Categorised Posts Section', 'apparatus') ,
				'subtitle' => esc_html__('Enter here numeric value only.', 'apparatus') ,
			) ,		
			
		),
    ) );	
	
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Page Settings', 'apparatus' ),
		'icon' => 'el el-cog-alt',
        'desc'       => '',
		'fields' => array(
					array(
				'id' => 'apparatus_single_page_header_section_switch',
				'type' => 'switch',
				'title' => esc_html__('Single Page Header Section', 'apparatus') ,
				'subtitle' => esc_html__('Turn on to display Page header section (Works for those pages which are created using Default Page Template only)', 'apparatus') ,
				
				'default' => '1'
			),
			array(
				'id' => 'apparatus_single_page_header_sec_btn_one_label',
				'type' => 'text',
				'title' => esc_html__('Header Section Button One Label', 'apparatus') ,
				'subtitle' => esc_html__('Enter here button text, if you want a Button in all Page Headers (Works for those pages which are created using Default Page Template only)', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_single_page_header_sec_btn_one_url',
				'type' => 'text',
				'title' => esc_html__('Header Section Button One URL', 'apparatus') ,
				'subtitle' => esc_html__('Enter button url for the above button', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_single_page_header_sec_btn_two_label',
				'type' => 'text',
				'title' => esc_html__('Header Section Button Two Label', 'apparatus') ,
				'subtitle' => esc_html__('Enter here button text, if you want second Button in all Page Headers (Works for those pages which are created using Default Page Template only)', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_single_page_header_sec_btn_two_url',
				'type' => 'text',
				'title' => esc_html__('Header Section Button Two URL', 'apparatus') ,
				'subtitle' => esc_html__('Enter here button url for the above button', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_single_page_header_sec_bg_img',
				'type' => 'media',
				'title' => esc_html__('Upload Header Section Background Image', 'apparatus') ,
				'subtitle' => esc_html__('Upload a Background Image, if you want to change default header section image for all Page Headers (Works for those pages which are created using Default Page Template only)', 'apparatus') ,
			) ,
            array(
				'id' => 'apparatus_single_page_header_sec_top_padding',
				'type' => 'text',
				'title' => esc_html__('Header Section Top Padding', 'apparatus') ,
				'subtitle' => esc_html__('Input padding in pixel. Example: 100px', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_single_page_header_sec_bottom_padding',
				'type' => 'text',
				'title' => esc_html__('Header Section Bottom Padding', 'apparatus') ,
				'subtitle' => esc_html__('Input padding in pixel. Example: 100px', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_single_page_newsletter_switch',
				'type' => 'switch',
				'title' => esc_html__('Newsletter Section', 'apparatus') ,
				'subtitle' => esc_html__('Turn on to display newsletter section in all Pages (Works for those pages which are created using Default Page Template only)', 'apparatus') ,
				
				'default' => '0'

				// 1 = checked | 0 = unchecked

			) ,
			array(
				'id' => 'apparatus_single_page_newsletter_headline_one',
				'type' => 'text',
				'title' => esc_html__('Newsletter Headline One', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Newsletter Switch.', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_single_page_newsletter_headline_two',
				'type' => 'textarea',
				'title' => esc_html__('Newsletter Headline Two', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Newsletter Switch. To make text thin use "thin" class inside span tag. Example: <span class="thin">Newsletter</span>.To make text bold use "<b>" tag outside text. Example: <b>Newsletter</b>.', 'apparatus') ,
				'validate' => 'html',
				'default' => '',
				'allowed_html' => array(
					'a' => array(
						'href' => array(),
						'title' => array()
					),
					'br' => array(),
					'em' => array(),
					'strong' => array()
				)
			) ,
			array(
				'id' => 'apparatus_single_page_newsletter_headline_three',
				'type' => 'text',
				'title' => esc_html__('Newsletter Headline Three', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Newsletter Switch.', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_single_page_newsletter_sec_bg_img',
				'type' => 'media',
				'title' => esc_html__('Upload Newsletter Section Background Image', 'apparatus') ,
				'subtitle' => esc_html__('(Optional)', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_single_page_newsletter_heading1_color',
				'type' => 'color_rgba',
				'title' => esc_html__('Newsletter Headline One Color', 'apparatus'),
				'default' => '',
			),	
			array(
				'id' => 'apparatus_single_page_newsletter_heading2_color',
				'type' => 'color_rgba',
				'title' => esc_html__('Newsletter Headline Two Color', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'apparatus_single_page_newsletter_heading3_color',
				'type' => 'color_rgba',
				'title' => esc_html__('Newsletter Headline Three Color', 'apparatus'),
				'default' => '',
			),			
			array(
				'id' => 'apparatus_cat_single_page_switch',
				'type' => 'switch',
				'title' => esc_html__('Categorised Posts Section', 'apparatus') ,
				'subtitle' => esc_html__('Turn on to display Categorised Posts Section (Works for those pages which are created using Default Page Template only)', 'apparatus') ,
				
				'default' => '0'

				// 1 = checked | 0 = unchecked
			) ,	
			array(
				'id' => 'apparatus_cat_single_page_headline_one',
				'type' => 'text',
				'title' => esc_html__('Categorised Blog Headline One', 'apparatus') ,
				'subtitle' => esc_html__('To enable this feature turn on the Categorised Posts Section Switch.', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_cat_single_page_headline_two',
				'type' => 'textarea',
				'title' => esc_html__('Categorised Blog Headline Two', 'apparatus'),
				'subtitle' => esc_html__('To enable this feature turn on the Categorised Posts Section Switch. To make text thin use "thin" class inside span tag. Example: <span class="thin">Blog</span>.To make text bold use "<b>" tag outside text. Example: <b>Blog</b>.', 'apparatus') ,
			) ,
			array(
				'id' => 'apparatus_cat_single_page_headline_three',
				'type' => 'text',
				'title' => esc_html__('Categorised Blog Headline Three', 'apparatus'),
				'subtitle' => esc_html__('To enable this feature turn on the Categorised Posts Section Switch.', 'apparatus') ,
			) ,	
			array(
				'id' => 'apparatus_cat_single_page_category',
				'type' => 'text',
				'title' => esc_html__('Category ID:', 'apparatus') ,
				'subtitle' => esc_html__('Enter here numeric value only.', 'apparatus') ,
			) ,			
			array(
				'id' => 'apparatus_cat_single_page_post_no',
				'type' => 'text',
				'title' => esc_html__('Number of Posts in Categorised Posts Section', 'apparatus') ,
				'subtitle' => esc_html__('Enter here numeric value only.', 'apparatus') ,
			) ,	
		),		
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Settings', 'apparatus' ),
		'icon' => 'el el-cog-alt',
        'desc'       => '',
		'fields' => array(
			array(
				'id' => 'footer_logo_url',
				'type' => 'media',
				'title' => esc_html__('Logo Image', 'apparatus'),
				'subtitle' => esc_html__('Upload your footer logo here.', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'footer_apparatus_text_logo',
				'type' => 'text',
				'title' => esc_html__('Text Logo', 'apparatus') ,
				'subtitle' => esc_html__('You can use Text instead of Image as your footer logo. You must remove the above Logo Image to make Text Logo work.', 'apparatus') ,
				'default' => '',
			),
			array(
				'id' => 'footer_logo_ptop',
				'type' => 'text',
				'title' => esc_html__('Top Padding for Logo', 'apparatus') ,
				'subtitle' => esc_html__('Input padding in pixel. Example: 7px', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'footer_text_logo_color',
				'type' => 'color_rgba',
				'title' => esc_html__('Text Logo Color', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'footer_logo_primary_color',
				'type' => 'color_rgba',
				'title' => esc_html__('Text Logo Background Color - Primary', 'apparatus'),
				'subtitle' => esc_html__('If you want to use default color, keep it empty.', 'apparatus') ,
				'default' => '',
			),
			array(
				'id' => 'footer_logo_secondary_color',
				'type' => 'color_rgba',
				'title' => esc_html__('Text Logo Background Color - Secondary', 'apparatus'),
				'subtitle' => esc_html__('If you want to use default color, keep it empty.', 'apparatus') ,
				'default' => '',
			),			
			array(
				'id' => 'apparatus_footer_newsletter_switch',
				'type' => 'switch',
				'title' => esc_html__('Newsletter Form', 'apparatus') ,
				'subtitle' => esc_html__('Turn on to display Newsletter Form instead of Footer Menu. Turn this off if you want to Display Footer Menu here.', 'apparatus'),				
				'default' => '1'
			),				
			array(
				'id' => 'footer_background_img',
				'type' => 'media',
				'title' => esc_html__('Footer Background Image', 'apparatus'),
				'subtitle' => esc_html__('Upload footer background image here.', 'apparatus'),
				'default' => '',
			),
			array(
				'id' => 'copy_text',
				'type' => 'textarea',
				'title' => esc_html__('Copyright Text', 'apparatus') ,
				'subtitle' => esc_html__('Enter your Copyright text here', 'apparatus') ,
				'default' => '',
				'validate' => 'html',
				'allowed_html' => array(
						'a' => array(
							'href' => array(),
							'title' => array()
						),
						'br' => array(),
						'em' => array(),
						'strong' => array()
					)
			) ,
			array(
				'id' => 'additional_author_text',
				'type' => 'textarea',
				'title' => esc_html__('Text about Author', 'apparatus') ,
				'subtitle' => esc_html__('Enter your text here', 'apparatus') ,
				'default' => '',
				'validate' => 'html',
				'allowed_html' => array(
						'a' => array(
							'href' => array(),
							'title' => array()
						),
						'br' => array(),
						'em' => array(),
						'strong' => array()
					)
			) ,
		),
    ) );

	
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Newsletter Settings', 'apparatus' ),
		'icon' => 'el el-envelope-alt',
        'desc'       => '',
		'fields' => array(
			array(
				'id' => 'mailchimp_apikey',
				'type' => 'text',
				'title' => esc_html__('MailChimp API Key', 'apparatus') ,
				'desc' =>  wp_kses('The unique API Key of your MailChimp account. <a href="'.esc_url('https://mailchimp.com/help/about-api-keys/').'">Find Your API Key!</a>',$allowed_html ),
				'default' => '',
			) ,
			array(
				'id' => 'mailchimp_listid',
				'type' => 'text',
				'title' => esc_html__('MailChimp List ID', 'apparatus') ,
				'desc' => wp_kses('The unique List ID of your MailChimp account. <a href="'.esc_url('https://mailchimp.com/help/find-your-list-id/').'">Find Your List ID! </a>',$allowed_html ),
				'default' => '',
			) ,
			array(
				'id' => 'mailchimp_optin',
				'type' => 'switch',
				'title' => esc_html__('On/Off Mailchimp Double Optin', 'apparatus') ,
				'desc' => '',
				'default' => '1',
			) ,			
			array(
				'id' => '123',
				'type' => 'info',
				'desc' => esc_html__('If you want to use Aweber instead of MailChimp use the settings below and keep the above MailChimp fields empty.', 'apparatus') ,
			) ,
			array(
				'id' => 'ft_aweber_listid',
				'type' => 'text',
				'title' => esc_html__('Aweber List ID', 'apparatus') ,
				'desc' => esc_html__('The unique List ID of Aweber account', 'apparatus') ,
				'default' => '',
			) ,
			array(
				'id' => 'aweber_redirectpage',
				'type' => 'text',
				'title' => esc_html__('Redirect Page URL', 'apparatus') ,
				'desc' => esc_html__('Redirect page url after submission of Aweber form', 'apparatus') ,
				'default' => '',
			) ,
			array(
				'id' => 'aweber_redirectpage_old',
				'type' => 'text',
				'title' => esc_html__('Redirect Page URL for already subscribed users', 'apparatus') ,
				'desc' => esc_html__('Redirect page url for already subscribed users of Aweber', 'apparatus') ,
				'default' => '',
			) ,			
		),
    ) );		
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Social Media Settings', 'apparatus' ),
		'icon' => 'el el-group-alt',
        'desc'       => esc_html__( 'This is options for setting up the social media of website. Do not forget to use http:// for any social urls.', 'apparatus' ),
		'fields' => array(
			array(
				'id' => 'social_facebook',
				'type' => 'text',
				'title' => esc_html__('Facebook URL', 'apparatus') ,
				'desc' => esc_html__('The URL to your account page', 'apparatus') ,
				'default' => '',
			) ,
			array(
				'id' => 'social_twitter',
				'type' => 'text',
				'title' => esc_html__('Twitter URL', 'apparatus') ,
				'desc' => esc_html__('The URL to your account page', 'apparatus') ,
				'default' => '',
			) ,
			array(
				'id' => 'social_linkedin',
				'type' => 'text',
				'title' => esc_html__('Linkedin URL', 'apparatus') ,
				'desc' => esc_html__('The URL to your account page', 'apparatus') ,
				'default' => '',
			) ,
			array(
				'id' => 'social_googleplus',
				'type' => 'text',
				'title' => esc_html__('GooglePlus URL', 'apparatus') ,
				'desc' => esc_html__('The URL to your account page', 'apparatus') ,
				'default' => '',
			) ,
			array(
				'id' => 'social_flickr',
				'type' => 'text',
				'title' => esc_html__('Flicker URL', 'apparatus') ,
				'desc' => esc_html__('The URL to your account page', 'apparatus') ,
				'default' => '',
			) ,
			array(
				'id' => 'social_utube',
				'type' => 'text',
				'title' => esc_html__('YouTube URL', 'apparatus') ,
				'desc' => esc_html__('The URL to your account page', 'apparatus') ,
				'default' => '',
			) ,
			array(
				'id' => 'social_instagram',
				'type' => 'text',
				'title' => esc_html__('Instagram URL', 'apparatus') ,
				'desc' => esc_html__('The URL to your account page', 'apparatus') ,
				'default' => '',
			) ,
			array(
				'id' => 'social_wechat',
				'type' => 'text',
				'title' => esc_html__('WeChat URL', 'apparatus') ,
				'desc' => esc_html__('The URL to your account page', 'apparatus') ,
				'default' => '',
			) ,
		),		
    ) );		
	Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Minification', 'apparatus' ),
		'icon' => 'el el-cog-alt',
        'desc'       => esc_html__( 'Options for Minification of CSS and JS Files', 'apparatus' ),
		'fields' => array(
			array(
				'id' => 'apparatus_minified_css',
				'type' => 'switch',
				'title' => esc_html__('On/Off CSS Minifier', 'apparatus') ,
				'subtitle' => esc_html__('Switching On is good for faster loading. Though you should switch it Off if you face any broken design isssue at the front-end.', 'apparatus') ,
				'default' => '0'
			),
			array(
				'id' => 'apparatus_minified_js',
				'type' => 'switch',
				'title' => esc_html__('On/Off Javascript Minifier', 'apparatus') ,
				'subtitle' => esc_html__('Switching On is good for faster loading. Though you should switch it Off if you face any broken design isssue at the front-end.', 'apparatus') ,
				'default' => '0'
			),
		),
    ) );	
 

    /*
     * <--- END SECTIONS
     */