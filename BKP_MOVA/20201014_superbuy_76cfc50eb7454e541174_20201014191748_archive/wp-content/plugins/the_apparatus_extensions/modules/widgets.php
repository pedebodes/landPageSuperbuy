<?php
// **********************************************************************// 
// ! Apparatus WP Color picker for widgets
// **********************************************************************//

function apparatus_widgets_colorpicker_scripts( $hook ) {
    wp_enqueue_media();
    wp_enqueue_style( 'wp-color-picker' );        
    wp_enqueue_script( 'wp-color-picker' ); 
}
add_action( 'admin_enqueue_scripts', 'apparatus_widgets_colorpicker_scripts' );

// **********************************************************************// 
// ! Apparatus Footer Nav Widget
// **********************************************************************//
class apparatus_footer_nav_widget extends WP_Widget {

	function __construct()
	{
		$widget_ops = array( 'description' => __( 'Add a custom Nav menu to your footer.', 'apparatus' ) );
		parent::__construct( 'nav_plus_widget', __( 'apparatus Footer Navigation', 'apparatus' ), $widget_ops );
	}

	function widget( $args, $instance )
	{
		static $menu_id_slugs = array();

		$nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

		if ( ! $nav_menu ) {
			return;
		}

		$menu_args = array(
			'menu'				=> $nav_menu,
			'items_wrap'		=> '%3$s',
			'echo'				=> false,
			'container'			=> false,

		);

		$wp_nav_menu = wp_nav_menu( $menu_args );

		if ( ! $wp_nav_menu ) {
			return;
		}

		// Attributes
		$wrap_id = 'menu-' . $nav_menu->slug;
		while ( in_array( $wrap_id, $menu_id_slugs ) ) {
			if ( preg_match( '#-(\d+)$#', $wrap_id, $matches ) ) {
				$wrap_id = preg_replace('#-(\d+)$#', '-' . ++$matches[1], $wrap_id );
			} else {
				$wrap_id = $wrap_id . '-1';
			}
		}
		$menu_id_slugs[] = $wrap_id;

		$instance['title']		= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$instance['menu_class']	= ( isset( $instance['menu_class'] ) ) ? $instance['menu_class'] : 'menu';

		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . $instance['title'] . $args['after_title'];
		}

		?>
		<div class="menu-<?php echo $nav_menu->slug; ?>-container mrt-5">
			<ul id="<?php echo $wrap_id; ?>" class="<?php echo esc_attr( $instance['menu_class'] ); ?>">
				<?php echo $wp_nav_menu; ?>
			</ul>
		</div>
		<?php

		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance )
	{
		$instance['title'] 			= sanitize_text_field( $new_instance['title'] );
		$instance['menu_class'] 	= $this->sanitize_menu_classes( $new_instance['menu_class'] );
		$instance['nav_menu'] 		= (int) $new_instance['nav_menu'];
 

		return $instance;
	}

	function sanitize_menu_classes( $menu_classes, $sanitized_menu_classes = '' )
	{
		$menu_classes = explode( ' ', $menu_classes );
		if ( ! empty( $menu_classes ) ) {
			foreach ( $menu_classes as $menu_class ) {
				$sanitized_menu_classes .= sanitize_html_class( $menu_class ) . ' ';
			}
			$sanitized_menu_classes = rtrim( $sanitized_menu_classes );
		}

		return $sanitized_menu_classes;
	}

	function form( $instance )
	{
		// Get menus
		$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );

		$title 				= isset( $instance['title'] ) 			? $instance['title'] 			: '';
		$menu_class			= isset( $instance['menu_class'] ) 		? $instance['menu_class'] 		: 'menu';
		
			
	

		// If no menus exists, direct the user to go and create some.
		if ( ! $menus ) {
			echo '<p>'. sprintf( __( 'No menus have been created yet. <a href="%s">Create some</a>.', 'apparatus' ), admin_url('nav-menus.php') ) .'</p>';
			return;
		} else {
			$nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : $menus[0]->term_id;

			// Get menu items
			$menu_items = wp_get_nav_menu_items( $nav_menu );
		}
		?>

		
		<div class="wpnp_section_wrap general">
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'apparatus' ) ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e( 'Menu Name:', 'apparatus' ); ?></label>
				<select id="<?php echo $this->get_field_id('nav_menu'); ?>" class="wpnp_menu_name widefat" name="<?php echo $this->get_field_name('nav_menu'); ?>">
					<option value="0"><?php _e( '&mdash; Select &mdash;', 'apparatus' ); ?></option>
					<?php foreach ( $menus as $menu ) : ?>
						<option value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $nav_menu, $menu->term_id ); ?>>
							<?php echo esc_html( $menu->name ); ?>
						</option>
					<?php endforeach; ?>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('menu_class'); ?>"><?php _e( 'Menu Class:', 'apparatus' ) ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('menu_class'); ?>" name="<?php echo $this->get_field_name('menu_class'); ?>" value="<?php echo esc_attr( $menu_class ); ?>" />
				<span class="description"><?php _e('Enter here class "footer-nav" for footer navigation', 'apparatus' ) ?></span>
			</p>
		</div>

		<?php
	}
}

function register_apparatus_footer_nav_widget() {

	register_widget( 'apparatus_footer_nav_widget' );
}

add_action( 'widgets_init', 'register_apparatus_footer_nav_widget' );

/*************************
apparatus Text Logo Widget
*************************/
class apparatus_text_logo_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'apparatus_text_logo', // Base ID
      esc_html__('apparatus Text Logo', 'apparatus'), // Name
      array( 'description' => esc_html__( 'Displays a Text Logo', 'apparatus'), ) // Args
    );
  }


  public function widget( $args, $instance ) {
	  extract($args);
	  $logo_title = isset($instance['logo_title']) ? $instance['logo_title'] : '';
	  $logo_width= isset($instance['logo_width']) ? $instance['logo_width'] : '';
	  $logo_height = isset($instance['logo_height']) ? $instance['logo_height'] : '';
      $logo_left_padding = isset($instance['logo_left_padding']) ? $instance['logo_left_padding'] : '';
      $logo_right_padding = isset($instance['logo_right_padding']) ? $instance['logo_right_padding'] : '';	
      $logo_top_padding = isset($instance['logo_top_padding']) ? $instance['logo_top_padding'] : '';	
      $logo_font_size = isset($instance['logo_font_size']) ? $instance['logo_font_size'] : '';	
      $logo_text_color = isset($instance['logo_text_color']) ? $instance['logo_text_color'] : '';		
      $logo_bg_color_primary = isset($instance['logo_bg_color_primary']) ? $instance['logo_bg_color_primary'] : '';		 
      $logo_bg_color_secondary = isset($instance['logo_bg_color_secondary']) ? $instance['logo_bg_color_secondary'] : '';	
      $logo_border_radius = isset($instance['logo_border_radius']) ? $instance['logo_border_radius'] : '';	
      $logo_url = isset($instance['logo_url']) ? $instance['logo_url'] : '';	 	  
  ?>
					<div class="col-12 col-md-6 align-self-center mb-30">
                        <!-- Logo -->
                        <a class="footer-brand text-logo" href="<?php echo esc_attr($logo_url); ?>">
                            <div class="logo bg-color-1" style="<?php if($logo_width){ ?>width:<?php echo esc_attr($logo_width);?>;<?php } if($logo_height) { ?>height:<?php echo esc_attr($logo_height); ?>;<?php } if($logo_left_padding) { ?>padding-left:<?php echo esc_attr($logo_left_padding); ?>;<?php } if($logo_right_padding) { ?>padding-right:<?php echo esc_attr($logo_right_padding); ?>;<?php } if($logo_top_padding) { ?>padding-top:<?php echo esc_attr($logo_top_padding); ?>;<?php } if($logo_font_size) { ?>font-size:<?php echo esc_attr($logo_font_size); ?>;<?php } if($logo_text_color) { ?>color:<?php echo esc_attr($logo_text_color); ?>;<?php } ?>background: linear-gradient(-180deg, <?php echo esc_attr($logo_bg_color_primary); ?> 0%, <?php echo esc_attr($logo_bg_color_secondary); ?> 100%);<?php if($logo_border_radius) { ?>border-radius:<?php echo esc_attr($logo_border_radius); ?>;<?php } ?>"><?php echo esc_attr($logo_title); ?></div>
                        </a>
                        <!-- Logo end -->
						</div>
							
	<?php
  }

  function update( $new_instance, $old_instance ){

    $instance = $old_instance;
    $instance['logo_title']= strip_tags( $new_instance['logo_title'] );
    $instance['logo_width']= strip_tags( $new_instance['logo_width'] );
    $instance['logo_height']= strip_tags( $new_instance['logo_height'] );
    $instance['logo_left_padding']= strip_tags( $new_instance['logo_left_padding'] );
    $instance['logo_right_padding']= strip_tags( $new_instance['logo_right_padding'] );
    $instance['logo_top_padding']= strip_tags( $new_instance['logo_top_padding'] );
    $instance['logo_font_size']= strip_tags( $new_instance['logo_font_size'] );
    $instance['logo_text_color']= strip_tags( $new_instance['logo_text_color'] );
    $instance['logo_bg_color_primary']= strip_tags( $new_instance['logo_bg_color_primary'] );
    $instance['logo_bg_color_secondary']= strip_tags( $new_instance['logo_bg_color_secondary'] );
    $instance['logo_border_radius']= strip_tags( $new_instance['logo_border_radius'] );
    $instance['logo_url']= strip_tags( $new_instance['logo_url'] );
return $instance;
  }


  function form($instance){
    $defaults = array( 
      'logo_title'               => '',
      'logo_width'               => '',
      'logo_height'              => '',
      'logo_left_padding'        => '',
      'logo_right_padding'       => '',
      'logo_top_padding'         => '',
      'logo_font_size'           => '',
      'logo_text_color'          => '',
      'logo_bg_color_primary'    => '',
      'logo_bg_color_secondary'  => '',
      'logo_border_radius'       => '',
      'logo_url'       => '',
    );
    $instance = wp_parse_args( (array) $instance, $defaults );
  ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'logo_title' )); ?>"><?php esc_html_e('Text Logo', 'apparatus'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'logo_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'logo_title' )); ?>" class="widefat" value="<?php echo esc_attr($instance['logo_title']); ?>">
	  <small>You can use Text instead of Image as your site logo.</small>
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'logo_width' )); ?>"><?php esc_html_e('Text Logo Width', 'apparatus'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'logo_width' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'logo_width' )); ?>" class="widefat" value="<?php echo esc_attr($instance['logo_width']); ?>">
	  <small>Input width in pixel. Example: 60px</small>
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'logo_height' )); ?>"><?php esc_html_e('Text Logo Height', 'apparatus'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'logo_height' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'logo_height' )); ?>" class="widefat" value="<?php echo esc_attr($instance['logo_height']); ?>">
	  <small>Input height in pixel. Example: 60px</small>
    </p>	
    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'logo_left_padding' )); ?>"><?php esc_html_e('Text Logo Left Padding', 'apparatus'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'logo_left_padding' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'logo_left_padding' )); ?>" class="widefat" value="<?php echo esc_attr($instance['logo_left_padding']); ?>">
	  <small>Input padding in pixel. Example: 0px</small>
    </p>	
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'logo_right_padding' )); ?>"><?php esc_html_e('Text Logo Right Padding', 'apparatus'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'logo_right_padding' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'logo_right_padding' )); ?>" class="widefat" value="<?php echo esc_attr($instance['logo_right_padding']); ?>">
	  <small>Input padding in pixel. Example: 0px</small>
    </p>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'logo_top_padding' )); ?>"><?php esc_html_e('Text Logo Top Padding', 'apparatus'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'logo_top_padding' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'logo_top_padding' )); ?>" class="widefat" value="<?php echo esc_attr($instance['logo_top_padding']); ?>">
	  <small>Input padding in pixel. Example: 7px</small>
    </p>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'logo_font_size' )); ?>"><?php esc_html_e('Text Logo Font Size', 'apparatus'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'logo_font_size' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'logo_font_size' )); ?>" class="widefat" value="<?php echo esc_attr($instance['logo_font_size']); ?>">
	  <small>nput font-size in pixel. Example: 32px</small>
    </p>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'logo_text_color ' )); ?>"><?php esc_html_e('Text Logo Color', 'apparatus'); ?></label><br/>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'logo_text_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'logo_text_color' )); ?>" class="widefat logo_text_color" value="<?php echo esc_attr($instance['logo_text_color']); ?>">
    </p>	
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'logo_bg_color_primary' )); ?>"><?php esc_html_e('Text Logo Background Color - Primary', 'apparatus'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'logo_bg_color_primary' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'logo_bg_color_primary' )); ?>" class="widefat logo_bg_color_primary" value="<?php echo esc_attr($instance['logo_bg_color_primary']); ?>">
	  <small>If you want to use default color, keep it empty.</small>
	  
    </p>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'logo_bg_color_secondary' )); ?>"><?php esc_html_e('Text Logo Background Color - Secondary', 'apparatus'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'logo_bg_color_secondary' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'logo_bg_color_secondary' )); ?>" class="widefat logo_bg_color_secondary" value="<?php echo esc_attr($instance['logo_bg_color_secondary']); ?>">
	  <small>If you want to use default color, keep it empty.</small>
    </p>	
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'logo_border_radius' )); ?>"><?php esc_html_e('Text Logo Border Radius', 'apparatus'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'logo_border_radius' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'logo_border_radius' )); ?>" class="widefat logo_border_radius" value="<?php echo esc_attr($instance['logo_border_radius']); ?>">
	  <small>Input border-radius in percentage. Example: 50%</small>
    </p>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'logo_url' )); ?>"><?php esc_html_e('Link to:', 'apparatus'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'logo_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'logo_url' )); ?>" class="widefat logo_url" value="<?php echo esc_attr($instance['logo_url']); ?>" placeholder="http://">

    </p>	
	<script>
		jQuery(document).ready(function($){
			$('.logo_text_color').each(function(){
        		$(this).wpColorPicker();
    		});
			$('.logo_bg_color_primary').each(function(){
        		$(this).wpColorPicker();
    		});	
			$('.logo_bg_color_secondary').each(function(){
        		$(this).wpColorPicker();
    		});				
		});
	</script>
  <?php
  }

}//end of class

// register apparatus Text Logo Widget 
function register_apparatus_text_logo_widget() {
  register_widget( 'apparatus_text_logo_widget' );  // Class Name
}
add_action( 'widgets_init', 'register_apparatus_text_logo_widget' );


// **********************************************************************// 
// ! Apparatus Recent Post Widget
// **********************************************************************//
class apparatus_recent_posts_widget extends WP_Widget {

	var $defaults;		// default values
	var $bools_false;	// key names of bool variables of value 'false'
	var $bools_true;	// key names of bool variables of value 'true'
	var $ints;			// key names of integer variables of any value
	var $customs;		// user defined values
	var $use_inline_css;// class wide setting, bool type
	var $use_no_css;	// class wide setting, bool type

	function __construct() {
		$language_codes = explode( '_', get_locale() );
		switch ( $language_codes[ 0 ] ) {
			default:
				$widget_name = 'Apparatus Recent Post List';
				$widget_desc = 'List of your blogs most recent posts with  thumbnails.';
		}
		$this->defaults[ 'category_ids' ]		= array( 0 ); // selected categories
		$this->defaults[ 'category_label' ]		= _x( 'In', 'In {categories}', 'apparatus' ); // label for category list
		$this->defaults[ 'css_file_path' ]		= dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'public.css'; // path of the public css file
		$this->defaults[ 'excerpt_length' ]		= absint( apply_filters( 'apparatus_excerpt_length', 55 ) ); // default length: 55 characters
		$this->defaults[ 'excerpt_more' ]		= apply_filters( 'apparatus_excerpt_more', ' ' . '[&hellip;]' ); // set ellipses as default 'more'
		$this->defaults[ 'number_posts' ]		= 5; // number of posts to show in the widget
		$this->defaults[ 'plugin_slug' ]		= 'apparatus'; // identifier of this plugin for WP
		$this->defaults[ 'plugin_version' ]		= '6.4.0'; // number of current plugin version
		$this->defaults[ 'post_title_length' ] 	= 1000; // default length: 1000 characters
		$this->defaults[ 'thumb_dimensions' ]	= 'custom'; // dimensions of the thumbnail
		$this->defaults[ 'thumb_height' ] 		= absint( round( get_option( 'thumbnail_size_h', 110 ) / 2 ) ); // custom height of the thumbnail
		$this->defaults[ 'thumb_url' ]			= plugins_url( 'default_thumb.gif', __FILE__ ); // URL of the default thumbnail
		$this->defaults[ 'thumb_width' ]		= absint( round( get_option( 'thumbnail_size_w', 110 ) / 2 ) ); // custom width of the thumbnail
		$this->defaults[ 'widget_title' ]		= ''; // title of the widget
		// Domain name and protocol of WP site
		$parsed_url = parse_url( home_url() );
		$this->defaults[ 'site_protocol' ]		= $parsed_url[ 'host' ];
		$this->defaults[ 'site_url' ]			= $parsed_url[ 'scheme' ];
		unset( $parsed_url );
		// other vars
		$this->bools_false						= array( 'hide_current_post', 'only_sticky_posts', 'hide_sticky_posts', 'hide_title', 'keep_aspect_ratio', 'keep_sticky', 'only_1st_img', 'random_order', 'show_author', 'show_categories', 'show_comments_number', 'show_date', 'show_excerpt', 'ignore_excerpt', 'set_more_as_link', 'try_1st_img', 'use_default', 'open_new_window', 'print_post_categories', 'set_cats_as_links', 'use_inline_css', 'use_no_css' );
		$this->bools_true						= array( 'show_thumb' );
		$this->ints 							= array( 'excerpt_length', 'number_posts', 'post_title_length', 'thumb_height', 'thumb_width' );
		$this->valid_excerpt_sources			= array( 'post_content', 'excerpt_field' );
		$widget_ops 							= array( 'classname' => $this->defaults[ 'plugin_slug' ], 'description' => $widget_desc );
		parent::__construct( $this->defaults[ 'plugin_slug' ], $widget_name, $widget_ops );

		add_action( 'save_post',				array( $this, 'flush_widget_cache' ) );
		add_action( 'deleted_post',				array( $this, 'flush_widget_cache' ) );
		add_action( 'switch_theme',				array( $this, 'flush_widget_cache' ) );
		add_action( 'wp_enqueue_scripts',		array( $this, 'enqueue_public_style' ) );


		// not in use, just for the po-editor to display the translation on the plugins overview list
		$widget_name = __( 'Apparatus Recent Post List', 'apparatus' );
		$widget_desc = __( 'Displays post with thumbnail', 'apparatus' );

	}

	function widget( $args, $instance ) {
		global $post;

		if ( ! isset( $args[ 'widget_id' ] ) ) {
			$args[ 'widget_id' ] = $this->id;
		}

		// get and sanitize values
		$title					= ( ! empty( $instance[ 'title' ] ) )				? $instance[ 'title' ]									: $this->defaults[ 'widget_title' ];
		$title					= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$category_ids 			= ( ! empty( $instance[ 'category_ids' ] ) )		? array_map( 'absint', $instance[ 'category_ids' ] )	: $this->defaults[ 'category_ids' ];
		$default_url 			= ( ! empty( $instance[ 'default_url' ] ) )			? $instance[ 'default_url' ]							: $this->defaults[ 'thumb_url' ];
		$thumb_dimensions		= ( ! empty( $instance[ 'thumb_dimensions' ] ) )	? $instance[ 'thumb_dimensions' ]						: $this->defaults[ 'thumb_dimensions' ];
		// initialize integer variables
		$ints = array();
		foreach ( $this->ints as $key ) {
			$ints[ $key ] = ( ! empty( $instance[ $key ] ) ) ? absint( $instance[ $key ] ) : $this->defaults[ $key ];
		}
		// initialize bool variables
		$bools = array();
		foreach ( $this->bools_false as $key ) {
			$bools[ $key ] = ( isset( $instance[ $key ] ) ) ? (bool) $instance[ $key ] : false;
		}
		foreach ( $this->bools_true as $key ) {
			$bools[ $key ] = ( isset( $instance[ $key ] ) ) ? (bool) $instance[ $key ] : false;
		}
		// special case: class wide setting
		$this->use_inline_css = $bools[ 'use_inline_css' ];
		$this->use_no_css = $bools[ 'use_no_css' ];
		// if 'all categories' was selected ignore other selections of categories
		if ( in_array( 0, $category_ids ) ) {
			$category_ids = $this->defaults[ 'category_ids' ];
		}
		// if no URL take default URL
		if ( '' == esc_url_raw( $default_url ) ) {
			$default_url = $this->defaults[ 'thumb_url' ];
		}

		// standard params
		$query_args = array(
			'posts_per_page'      => $ints[ 'number_posts' ],
			'no_found_rows'       => true,
			'post_status'         => 'publish',
		);
		
		// set order of posts in widget
		$query_args[ 'orderby' ] = ( $bools[ 'random_order' ] ) ? 'rand' : 'date';
		$query_args[ 'order' ] = 'DESC';
		
		// add categories param only if 'all categories' was not selected
		if ( ! in_array( 0, $category_ids ) ) {
			$query_args[ 'category__in' ] = $category_ids;
		}
		
		// exclude current displayed post
		if ( $bools[ 'hide_current_post' ] ) {
			if ( isset( $post->ID ) and is_singular() ) {
				$query_args[ 'post__not_in' ] = array( $post->ID );
			}
		}

		// ignore sticky posts if desired, else show them on top
		$query_args[ 'ignore_sticky_posts' ] = ( $bools[ 'keep_sticky' ] ) ? false : true;
		
		// exclude sticky posts
		if ( $bools[ 'only_sticky_posts' ] ) {
			// set the filter with IDs of sticky posts
	        $query_args[ 'post__in' ] = get_option( 'sticky_posts', array() );
			// The next line appears illogical in comparison with the 
			// previous line, but is necessary to display the correct 
			// number of posts if the number of sticky posts is greater 
			// than the number of posts to be displayed.
			$query_args[ 'ignore_sticky_posts' ] = true;
		} elseif ( $bools[ 'hide_sticky_posts' ] ) {
			// get IDs of sticky posts
			$post_ids = get_option( 'sticky_posts', array() );
			// if there are sticky posts
			if ( $post_ids ) {
				// if argument 'post__not_in' is defined
				if ( isset( $query_args[ 'post__not_in' ] ) ) {
					// merge argument arrays
					$tmp1 = array_merge( $query_args[ 'post__not_in' ], $post_ids );
					// make post IDs in array unique by using a faster way than array_unique()
					$tmp2 = array(); 
					foreach( $tmp1 as $key => $val ) {    
						$tmp2[ $val ] = true; 
					}
					// set argument with cleaned array
					$query_args[ 'post__not_in' ] = array_keys( $tmp2 );
					// delete temporary variables
					unset( $tmp1, $tmp2 );
				} else {
					// set argument with array of post IDs
					$query_args[ 'post__not_in' ] = $post_ids;
				}
			}
			// delete temporary variable
			unset( $post_ids );
		}

		// apply correction function if query includes sticky posts and categories filter
		if ( isset( $query_args[ 'category__in' ] ) and $bools[ 'keep_sticky' ] ) {
			add_filter( 'the_posts', array( $this, 'get_stickies_on_top' ) );
		}
		
		// run the query: get the latest posts
		$r = new WP_Query( apply_filters( 'apparatus_widget_posts_args', $query_args ) );

		// remove correction function if query includes sticky posts and categories filter
		if ( isset( $query_args[ 'category__in' ] ) and $bools[ 'keep_sticky' ] ) {
			remove_filter( 'the_posts', array( $this, 'get_stickies_on_top' ) );
		}
		
		if ( $r->have_posts()) :
		
			// take custom size if desired
			if ( $thumb_dimensions != 'custom' ) {
				// overwrite thumb_width and thumb_height with closest size
				list( $ints[ 'thumb_width' ], $ints[ 'thumb_height' ] ) = $this->get_image_dimensions( $thumb_dimensions );
				// set dimensions with specified size name
				$this->customs[ 'thumb_dimensions' ] = $thumb_dimensions;
			} else {
				// set dimensions with specified size array
				$this->customs[ 'thumb_dimensions' ] = array( $ints[ 'thumb_width' ], $ints[ 'thumb_height' ] );
			}

			// let there be an empty 'more' label if desired
			if ( isset( $instance[ 'excerpt_more' ] ) ) {
				if ( '' === $instance[ 'excerpt_more' ] ) {
					$this->customs[ 'excerpt_more' ] = '';
				} else {
					$this->customs[ 'excerpt_more' ] = $instance[ 'excerpt_more' ];
				}
			} else {
				$this->customs[ 'excerpt_more' ] = $this->defaults[ 'excerpt_more' ];
			}
			// let there be an empty category label if desired
			if ( isset( $instance[ 'category_label' ] ) ) {
				if ( '' === $instance[ 'category_label' ] ) {
					$this->customs[ 'category_label' ] = '';
				} else {
					$this->customs[ 'category_label' ] = $instance[ 'category_label' ];
				}
			} else {
				$this->customs[ 'category_label' ] = $this->defaults[ 'category_label' ];
			}

			// set other global vars
			$this->customs[ 'ignore_excerpt' ]		= $bools[ 'ignore_excerpt' ]; // whether to ignore post excerpt field or not
			$this->customs[ 'set_more_as_link' ]	= $bools[ 'set_more_as_link' ]; // whether to set 'more' signs as link or not
			$this->customs[ 'set_cats_as_links' ]	= $bools[ 'set_cats_as_links' ]; // whether to set category names as links or not
			$this->customs[ 'excerpt_length' ]		= $ints[ 'excerpt_length' ]; // number of characters of excerpt
			$this->customs[ 'post_title_length' ]	= $ints[ 'post_title_length' ]; // maximum number of characters of post title

			// set default image code
			$default_attr = array(
				'src'	=> $default_url,
				'class'	=> sprintf( "attachment-%dx%d", $ints[ 'thumb_width' ], $ints[ 'thumb_height' ] ),
				'alt'	=> '',
			);
			$default_img = '<img ';
			$default_img .= rtrim( image_hwstring( $ints[ 'thumb_width' ], $ints[ 'thumb_height' ] ) );
			foreach ( $default_attr as $name => $value ) {
				$default_img .= ' ' . $name . '="' . $value . '"';
			}
			$default_img .= ' />';
			
			// set link target
			if ( $bools[ 'open_new_window' ] ) {
				$this->customs[ 'link_target' ] = ' target="_blank"';
			} else {
				$this->customs[ 'link_target' ] = '';
			}
			
			// translate repeately used texts once (for more performance)
			$text = ', ';
			$this->defaults[ 'comma' ] = __( $text );
			$text = '&hellip;';
			$this->defaults[ 'ellipses' ] = __( $text );
			$text = 'By %s';
			$this->defaults[ 'author_label' ] = _x( $text, 'theme author' );

			// print list
?>
<?php echo $args[ 'before_widget' ]; ?>
<div id="apparatus-<?php echo $args[ 'widget_id' ];?>" class="apparatus-recent-post-widget">
	<?php if ( $title ) echo $args[ 'before_title' ] . $title . $args[ 'after_title' ]; ?>
	<div class="widget">
	<?php while ( $r->have_posts() ) : $r->the_post(); ?>
		<div<?php 
			$classes = array();
			if ( is_sticky() ) { 
				$classes[] = 'apparatus-sticky widget-post-item-5 d-flex row';
			}else{
				$classes[] = 'widget-post-item-5 d-flex row';
			}
			if ( $bools[ 'print_post_categories' ] ) {
				$cats = get_the_category();
				if ( is_array( $cats ) and $cats ) {
					foreach ( $cats as $cat ) {
						$classes[] = $cat->slug;
					}
				}
			}
			if ( $classes ) {
				echo ' class="', join( ' ', $classes ), '"';
			}
			?>><div class="col-lg-4 col-md-2 col-sm-2 col-3 rp_image"><div class="thumbnail"><a href="<?php the_permalink(); ?>"<?php echo $this->customs[ 'link_target' ]; ?>><?php 
			if ( $bools[ 'show_thumb' ] ) : 
				$is_thumb = false;
				// if only first image
				if ( $bools[ 'only_1st_img' ] ) :
					// try to find and to display the first post image and to return success
					$is_thumb = $this->the_first_post_image();
				else :
					// look for featured image
					if ( has_post_thumbnail() ) : 
						// if there is featured image then show it
						the_post_thumbnail( $this->customs[ 'thumb_dimensions' ] );
						$is_thumb = true;
					else :
						// if user wishes first image trial
						if ( $bools[ 'try_1st_img' ] ) :
							// try to find and to display the first post image and to return success
							$is_thumb = $this->the_first_post_image();
						endif; // try_1st_img 
					endif; // has_post_thumbnail
				endif; // only_1st_img
				// if there is no image 
				if ( ! $is_thumb ) :
					// if user allows default image then
					if ( $bools[ 'use_default' ] ) :
						echo $default_img;
					endif; // use_default
				endif; // not is_thumb
				// (else do nothing)
			endif; // show_thumb
			// show title if wished

			?></a></div></div>
			<div class="col-lg-8 col-md-10 col-sm-10 col-9 plr-0">
			<?php
			if ( ! $bools[ 'hide_title' ] ) {?>
			<a class="no-color" href="<?php the_permalink(); ?>">
			<h5 class=" post-title animate-300 hover-color-primary"><?php if ( $post_title = $this->get_the_trimmed_post_title() ) { echo $post_title; } else { the_ID(); } ?></h5></a>
			<?php 
			if ( $bools[ 'show_date' ] ) : 
				?><div class="post-date"> <?php echo get_the_date(); ?></div><?php 
			endif;
			if ( $bools[ 'show_author' ] ) : 
				?><div class="post-date apparatus-post-author"> <?php echo esc_html( $this->get_the_author() ); ?></div><?php 
			endif;
			if ( $bools[ 'show_categories' ] ) : 
				?><div class="post-date apparatus-post-categories"> <?php echo $this->get_the_categories( $r->post->ID ); ?></div><?php 
			endif;
			if ( $bools[ 'show_comments_number' ] ) : 
				?><div class="post-date apparatus-post-comments-number"> <?php echo get_comments_number_text(); ?></div><?php 
			endif;
			if ( $bools[ 'show_excerpt' ] ) : 
				?><div class="post-date apparatus-post-excerpt"> <?php echo $this->get_the_trimmed_excerpt(); ?></div><?php 
			endif;
			
			?>
			<?php } ?>
			</div><?php 
 
		?></div>
	<?php endwhile; ?>
	</div>
</div><!-- .apparatus-widget -->
<?php echo $args[ 'after_widget' ]; ?>

<?php

			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();

		endif;

	}

	function update( $new_widget_settings, $old_widget_settings ) {
		$instance = $old_widget_settings;
		// sanitize user input before update
		$instance[ 'title' ] 				= ( isset( $new_widget_settings[ 'title' ] ) )					? strip_tags( $new_widget_settings[ 'title' ] )						: $this->defaults[ 'widget_title' ];
		$instance[ 'default_url' ] 			= ( isset( $new_widget_settings[ 'default_url' ] ) )			? esc_url_raw( $new_widget_settings[ 'default_url' ] )				: $this->defaults[ 'thumb_url' ];
		$instance[ 'thumb_dimensions' ] 	= ( isset( $new_widget_settings[ 'thumb_dimensions' ] ) )		? strip_tags( $new_widget_settings[ 'thumb_dimensions' ] )			: $this->defaults[ 'thumb_dimensions' ];
		$instance[ 'category_ids' ]   		= ( isset( $new_widget_settings[ 'category_ids' ] ) )			? array_map( 'absint', $new_widget_settings[ 'category_ids' ] )		: $this->defaults[ 'category_ids' ];
		// initialize integer variables
		foreach ( $this->ints as $key ) {
			$instance[ $key ] = ( isset( $new_widget_settings[ $key ] ) ) ? absint( $new_widget_settings[ $key ] ) : $this->defaults[ $key ];
		}
		// initialize bool variables
		foreach ( $this->bools_false as $key ) {
			$instance[ $key ] = ( isset( $new_widget_settings[ $key ] ) ) ? (bool) $new_widget_settings[ $key ] : false;
		}
		foreach ( $this->bools_true as $key ) {
			$instance[ $key ] = ( isset( $new_widget_settings[ $key ] ) ) ? (bool) $new_widget_settings[ $key ] : false;
		}

		// let there be an empty 'more' label if desired
		if ( isset( $new_widget_settings[ 'excerpt_more' ] ) ) {
			if ( '' == $new_widget_settings[ 'excerpt_more' ] ) {
				$instance[ 'excerpt_more' ] = '';
			} else {
				$instance[ 'excerpt_more' ] = $new_widget_settings[ 'excerpt_more' ];
			}
		} else {
			$instance[ 'excerpt_more' ] = $this->defaults[ 'excerpt_more' ];
		}
		// let there be an empty category label if desired
		if ( isset( $new_widget_settings[ 'category_label' ] ) ) {
			if ( '' == $new_widget_settings[ 'category_label' ] ) {
				$instance[ 'category_label' ] = '';
			} else {
				$instance[ 'category_label' ] = $new_widget_settings[ 'category_label' ];
			}
		} else {
			$instance[ 'category_label' ] = $this->defaults[ 'category_label' ];
		}

		// if 'all categories' was selected ignore other selections of categories
		if ( in_array( 0, $instance[ 'category_ids' ] ) ) {
			$instance[ 'category_ids' ] = $this->defaults[ 'category_ids' ];
		}
		
		// empty widget cache
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions[ $this->defaults[ 'plugin_slug' ] ] ) ) {
			delete_option( $this->defaults[ 'plugin_slug' ] );
		}

		// delete current css file to let make new one via $this->enqueue_public_style()
		if ( file_exists( $this->defaults[ 'css_file_path' ] ) ) {
			// remove the file
			unlink( $this->defaults[ 'css_file_path' ] );
		}

		// return sanitized current widget settings
		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete( $this->defaults[ 'plugin_slug' ], 'widget' );
	}

	function form( $instance ) {
		// get and sanitize values
		$title					= ( isset( $instance[ 'title' ] ) ) 				? $instance[ 'title' ]				: $this->defaults[ 'widget_title' ];
		$thumb_dimensions		= ( isset( $instance[ 'thumb_dimensions' ] ) )		? $instance[ 'thumb_dimensions' ]	: $this->defaults[ 'thumb_dimensions' ];
		$default_url			= ( isset( $instance[ 'default_url' ] ) )			? $instance[ 'default_url' ]		: $this->defaults[ 'thumb_url' ];
		$category_ids			= ( isset( $instance[ 'category_ids' ] ) )			? $instance[ 'category_ids' ]		: $this->defaults[ 'category_ids' ];
		// initialize integer variables
		$ints = array();
		foreach ( $this->ints as $key ) {
			$ints[ $key ] = ( isset( $instance[ $key ] ) ) ? absint( $instance[ $key ] ) : $this->defaults[ $key ];
		}
		// initialize bool variables
		$bools = array();
		foreach ( $this->bools_false as $key ) {
			$bools[ $key ] = ( isset( $instance[ $key ] ) ) ? (bool) $instance[ $key ] : false;
		}
		foreach ( $this->bools_true as $key ) {
			$bools[ $key ] = ( isset( $instance[ $key ] ) ) ? (bool) $instance[ $key ] : true;
		}

		// let there be an empty 'more' label if desired
		if ( isset( $instance[ 'excerpt_more' ] ) ) {
			if ( '' == $instance[ 'excerpt_more' ] ) {
				$excerpt_more = '';
			} else {
				$excerpt_more = $instance[ 'excerpt_more' ];
			}
		} else {
			$excerpt_more = $this->defaults[ 'excerpt_more' ];
		}
		// let there be an empty category label if desired
		if ( isset( $instance[ 'category_label' ] ) ) {
			if ( '' == $instance[ 'category_label' ] ) {
				$category_label = '';
			} else {
				$category_label = $instance[ 'category_label' ];
			}
		} else {
			$category_label = $this->defaults[ 'category_label' ];
		}
		
		// if 'all categories' was selected ignore other selections of categories
		if ( in_array( 0, $category_ids ) ) {
			$category_ids = $this->defaults[ 'category_ids' ];
		}
		// if no URL take default URL
		if ( '' == esc_url_raw( $default_url ) ) {
			$default_url = $this->defaults[ 'thumb_url' ];
		}

		// compute ids only once to improve performance
		$field_ids = array();
		$field_ids[ 'category_ids' ]	= $this->get_field_id( 'category_ids' );
		$field_ids[ 'category_label' ]	= $this->get_field_id( 'category_label' );
		$field_ids[ 'default_url' ]		= $this->get_field_id( 'default_url' );
		$field_ids[ 'excerpt_more' ]	= $this->get_field_id( 'excerpt_more' );
		$field_ids[ 'title' ]			= $this->get_field_id( 'title' );
		$field_ids[ 'thumb_dimensions' ]= $this->get_field_id( 'thumb_dimensions' );
		foreach ( array_merge( $this->ints, $this->bools_false, $this->bools_true ) as $key ) {
			$field_ids[ $key ] = $this->get_field_id( $key );
		}
		
		// get texts and values for image sizes dropdown
		global $_wp_additional_image_sizes;
		$wp_standard_image_size_labels = array();
		$label = 'Full Size';	$wp_standard_image_size_labels[ 'full' ]		= __( $label );
		$label = 'Large';		$wp_standard_image_size_labels[ 'large' ]		= __( $label );
		$label = 'Medium';		$wp_standard_image_size_labels[ 'medium' ]		= __( $label );
		$label = 'Thumbnail';	$wp_standard_image_size_labels[ 'thumbnail' ]	= __( $label );
		
		$wp_standard_image_size_names = array_keys( $wp_standard_image_size_labels );
		$size_options = array();
		foreach ( get_intermediate_image_sizes() as $size_name ) {
			// Don't take numeric sizes that appear
			if( is_integer( $size_name ) ) {
				continue;
			}
			$option_values = array();
			// Set technical name
			$option_values[ 'size_name' ] = $size_name;
			// Set name
			$option_values[ 'name' ] = in_array( $size_name, $wp_standard_image_size_names ) ? $wp_standard_image_size_labels[$size_name] : $size_name;
			// Set width
			$option_values[ 'width' ] = isset( $_wp_additional_image_sizes[$size_name]['width'] ) ? $_wp_additional_image_sizes[$size_name]['width'] : get_option( "{$size_name}_size_w" );
			// Set height
			$option_values[ 'height' ] = isset( $_wp_additional_image_sizes[$size_name]['height'] ) ? $_wp_additional_image_sizes[$size_name]['height'] : get_option( "{$size_name}_size_h" );
			// add option to options list
			$size_options[] = $option_values;
		}
		
		// create text to Media Settings page
		$text = 'Settings';	$label_settings	= __( $text );
		$text = 'Media';	$label_media	= _x( $text, 'post type general name' );
		$label = sprintf( '%s &rsaquo; %s', $label_settings, $label_media );
		$media_trail = ( current_user_can( 'manage_options' ) ) ? sprintf( '<a href="%s" target="_blank">%s</a>', esc_url( admin_url( 'options-media.php' ) ), esc_html( $label ) ) : sprintf( '<em>%s</em>', esc_html( $label ) );

		// get texts and values for categories dropdown
		#$none_text = 'All Categories';
		$all_text = 'All Categories';
		$label_all_cats = __( $all_text );

		// get categories
		$categories = get_categories( array( 'hide_empty' => 0, 'hierarchical' => 1 ) );
		$number_of_cats = count( $categories );
		
		// get size (number of rows to display) of selection box: not more than 10
		$number_of_rows = ( 10 > $number_of_cats ) ? $number_of_cats + 1 : 10;

		// start selection box
		$selection_element = sprintf(
			'<select name="%s[]" id="%s" class="apparatus-cat-select" multiple size="%d">',
			$this->get_field_name( 'category_ids' ),
			$field_ids[ 'category_ids' ],
			$number_of_rows
		);
		$selection_element .= "\n";

		// make selection box entries
		$cat_list = array();
		if ( 0 < $number_of_cats ) {

			// make a hierarchical list of categories
			while ( $categories ) {
				// go on with the first element in the categories list:
				// if there is no parent
				if ( '0' == $categories[ 0 ]->parent ) {
					// get and remove it from the categories list
					$current_entry = array_shift( $categories );
					// append the current entry to the new list
					$cat_list[] = array(
						'id'	=> absint( $current_entry->term_id ),
						'name'	=> esc_html( $current_entry->name ),
						'depth'	=> 0
					);
					// go on looping
					continue;
				}
				// if there is a parent:
				// try to find parent in new list and get its array index
				$parent_index = $this->get_cat_parent_index( $cat_list, $categories[ 0 ]->parent );
				// if parent is not yet in the new list: try to find the parent later in the loop
				if ( false === $parent_index ) {
					// get and remove current entry from the categories list
					$current_entry = array_shift( $categories );
					// append it at the end of the categories list
					$categories[] = $current_entry;
					// go on looping
					continue;
				}
				// if there is a parent and parent is in new list:
				// set depth of current item: +1 of parent's depth
				$depth = $cat_list[ $parent_index ][ 'depth' ] + 1;
				// set new index as next to parent index
				$new_index = $parent_index + 1;
				// find the correct index where to insert the current item
				foreach( $cat_list as $entry ) {
					// if there are items with same or higher depth than current item
					if ( $depth <= $entry[ 'depth' ] ) {
						// increase new index
						$new_index = $new_index + 1;
						// go on looping in foreach()
						continue;
					}
					// if the correct index is found:
					// get current entry and remove it from the categories list
					$current_entry = array_shift( $categories );
					// insert current item into the new list at correct index
					$end_array = array_splice( $cat_list, $new_index ); // $cat_list is changed, too
					$cat_list[] = array(
						'id'	=> absint( $current_entry->term_id ),
						'name'	=> esc_html( $current_entry->name ),
						'depth'	=> $depth
					);
					$cat_list = array_merge( $cat_list, $end_array );
					// quit foreach(), go on while-looping
					break;
				} // foreach( cat_list )
			} // while( categories )

			// make HTML of selection box
			$selected = ( in_array( 0, $category_ids ) ) ? ' selected="selected"' : '';
			$selection_element .= "\t";
			$selection_element .= '<option value="0"' . $selected . '>' . $label_all_cats . '</option>';
			$selection_element .= "\n";

			foreach ( $cat_list as $category ) {
				$cat_name = apply_filters( 'apparatus_list_cats', $category[ 'name' ], $category );
				$pad = ( 0 < $category[ 'depth' ] ) ? str_repeat('&ndash;&nbsp;', $category[ 'depth' ] ) : '';
				$selection_element .= "\t";
				$selection_element .= '<option value="' . $category[ 'id' ] . '"';
				$selection_element .= ( in_array( $category[ 'id' ], $category_ids ) ) ? ' selected="selected"' : '';
				$selection_element .= '>' . $pad . $cat_name . '</option>';
				$selection_element .= "\n";
			}
			
		}

		// close selection box
		$selection_element .= "</select>\n";
		
		// print form in widgets page
?>


<p><label for="<?php echo $field_ids[ 'title' ]; ?>"><?php $text = 'Title'; esc_html_e( $text ); ?></label>
<input class="widefat" id="<?php echo $field_ids[ 'title' ]; ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

<p><label for="<?php echo $field_ids[ 'number_posts' ]; ?>"><?php $text = 'Number of posts to show:'; esc_html_e( $text ); ?></label>
<input id="<?php echo $field_ids[ 'number_posts' ]; ?>" name="<?php echo $this->get_field_name( 'number_posts' ); ?>" type="text" value="<?php echo $ints[ 'number_posts' ]; ?>" size="3" /></p>

<p><input class="checkbox" type="checkbox" <?php checked( $bools[ 'open_new_window' ] ); ?> id="<?php echo $field_ids[ 'open_new_window' ]; ?>" name="<?php echo $this->get_field_name( 'open_new_window' ); ?>" />
<label for="<?php echo $field_ids[ 'open_new_window' ]; ?>"><?php esc_html_e( 'Open post links in new windows?', 'apparatus' ); ?></label></p>

<p><input class="checkbox" type="checkbox" <?php checked( $bools[ 'random_order' ] ); ?> id="<?php echo $field_ids[ 'random_order' ]; ?>" name="<?php echo $this->get_field_name( 'random_order' ); ?>" />
<label for="<?php echo $field_ids[ 'random_order' ]; ?>"><?php esc_html_e( 'Show posts in random order?', 'apparatus' ); ?></label></p>

<p><input class="checkbox" type="checkbox" <?php checked( $bools[ 'hide_current_post' ] ); ?> id="<?php echo $field_ids[ 'hide_current_post' ]; ?>" name="<?php echo $this->get_field_name( 'hide_current_post' ); ?>" />
<label for="<?php echo $field_ids[ 'hide_current_post' ]; ?>"><?php esc_html_e( 'Do not show the current post?', 'apparatus' ); ?></label></p>

<h4><?php $text = 'Sticky'; esc_html_e( $text ); ?></h4>

<p><input class="checkbox" type="checkbox" <?php checked( $bools[ 'only_sticky_posts' ] ); ?> id="<?php echo $field_ids[ 'only_sticky_posts' ]; ?>" name="<?php echo $this->get_field_name( 'only_sticky_posts' ); ?>" />
<label for="<?php echo $field_ids[ 'only_sticky_posts' ]; ?>"><?php esc_html_e( 'Show only sticky posts?', 'apparatus' ); ?><br />
<em><?php esc_html_e( 'If activated the options to hide sticky posts and to keep them on top will be ignored.', 'apparatus' ); ?></em></label></p>

<p><input class="checkbox" type="checkbox" <?php checked( $bools[ 'hide_sticky_posts' ] ); ?> id="<?php echo $field_ids[ 'hide_sticky_posts' ]; ?>" name="<?php echo $this->get_field_name( 'hide_sticky_posts' ); ?>" />
<label for="<?php echo $field_ids[ 'hide_sticky_posts' ]; ?>"><?php esc_html_e( 'Do not show sticky posts?', 'apparatus' ); ?><br />
<em><?php esc_html_e( 'If activated the option to keep sticky posts on top will be ignored.', 'apparatus' ); ?></em></label></p>

<p><input class="checkbox" type="checkbox" <?php checked( $bools[ 'keep_sticky' ] ); ?> id="<?php echo $field_ids[ 'keep_sticky' ]; ?>" name="<?php echo $this->get_field_name( 'keep_sticky' ); ?>" />
<label for="<?php echo $field_ids[ 'keep_sticky' ]; ?>"><?php esc_html_e( 'Keep sticky posts on top of the list?', 'apparatus' ); ?></label></p>

<h4><?php $text = 'Title'; esc_html_e( $text ); ?></h4>

<p><input class="checkbox" type="checkbox" <?php checked( $bools[ 'hide_title' ] ); ?> id="<?php echo $field_ids[ 'hide_title' ]; ?>" name="<?php echo $this->get_field_name( 'hide_title' ); ?>" />
<label for="<?php echo $field_ids[ 'hide_title' ]; ?>"><?php esc_html_e( 'Do not show post title?', 'apparatus' ); ?><br />
<em><?php esc_html_e( 'Make sure you set a default thumbnail for posts without a thumbnail, otherwise there will be no link.', 'apparatus' ); ?></em></label></p>

<p><label for="<?php echo $field_ids[ 'post_title_length' ]; ?>"><?php esc_html_e( 'Maximum length of post title', 'apparatus' ); ?>:</label>
<input id="<?php echo $field_ids[ 'post_title_length' ]; ?>" name="<?php echo $this->get_field_name( 'post_title_length' ); ?>" type="text" value="<?php echo $ints[ 'post_title_length' ]; ?>" size="3" /></p>

<h4><?php $text = 'Author'; esc_html_e( $text ); ?></h4>

<p><input class="checkbox" type="checkbox" <?php checked( $bools[ 'show_author' ] ); ?> id="<?php echo $field_ids[ 'show_author' ]; ?>" name="<?php echo $this->get_field_name( 'show_author' ); ?>" />
<label for="<?php echo $field_ids[ 'show_author' ]; ?>"><?php esc_html_e( 'Show post author?', 'apparatus' ); ?></label></p>

<h4><?php $text = 'Categories'; esc_html_e( $text ); ?></h4>

<p><input class="checkbox" type="checkbox" <?php checked( $bools[ 'show_categories' ] ); ?> id="<?php echo $field_ids[ 'show_categories' ]; ?>" name="<?php echo $this->get_field_name( 'show_categories' ); ?>" />
<label for="<?php echo $field_ids[ 'show_categories' ]; ?>"><?php esc_html_e( 'Show post categories?', 'apparatus' ); ?></label></p>

<p><input class="checkbox" type="checkbox" <?php checked( $bools[ 'set_cats_as_links' ] ); ?> id="<?php echo $field_ids[ 'set_cats_as_links' ]; ?>" name="<?php echo $this->get_field_name( 'set_cats_as_links' ); ?>" />
<label for="<?php echo $field_ids[ 'set_cats_as_links' ]; ?>"><?php esc_html_e( 'Set post category names as links, pointing to their archives?', 'apparatus' ); ?></label></p>

<p><label for="<?php echo $field_ids[ 'category_label' ]; ?>"><?php esc_html_e( 'Label for categories:', 'apparatus' ); ?></label>
<input class="widefat" id="<?php echo $field_ids[ 'category_label' ]; ?>" name="<?php echo $this->get_field_name( 'category_label' ); ?>" type="text" value="<?php echo esc_attr( $category_label ); ?>" /><br />
<em><?php esc_html_e( 'This field can be empty.', 'apparatus' );?></em></p>

<h4><?php $text = 'Date'; esc_html_e( $text ); ?></h4>

<p><input class="checkbox" type="checkbox" <?php checked( $bools[ 'show_date' ] ); ?> id="<?php echo $field_ids[ 'show_date' ]; ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
<label for="<?php echo $field_ids[ 'show_date' ]; ?>"><?php esc_html_e( 'Show post date?', 'apparatus' ); ?></label></p>

<h4><?php $text = 'Excerpt'; esc_html_e( $text ); ?></h4>

<p><input class="checkbox" type="checkbox" <?php checked( $bools[ 'show_excerpt' ] ); ?> id="<?php echo $field_ids[ 'show_excerpt' ]; ?>" name="<?php echo $this->get_field_name( 'show_excerpt' ); ?>" />
<label for="<?php echo $field_ids[ 'show_excerpt' ]; ?>"><?php esc_html_e( 'Show excerpt?', 'apparatus' ); ?></label></p>

<p><label for="<?php echo $field_ids[ 'excerpt_length' ]; ?>"><?php esc_html_e( 'Maximum length of excerpt', 'apparatus' ); ?>:</label>
<input id="<?php echo $field_ids[ 'excerpt_length' ]; ?>" name="<?php echo $this->get_field_name( 'excerpt_length' ); ?>" type="text" value="<?php echo $ints[ 'excerpt_length' ]; ?>" size="3" /></p>

<p><label for="<?php echo $field_ids[ 'excerpt_more' ]; ?>"><?php esc_html_e( 'Signs after excerpt', 'apparatus' ); ?>:</label>
<input id="<?php echo $field_ids[ 'excerpt_more' ]; ?>" name="<?php echo $this->get_field_name( 'excerpt_more' ); ?>" type="text" value="<?php echo esc_attr( $excerpt_more ); ?>" size="3" /></p>

<p><input class="checkbox" type="checkbox" <?php checked( $bools[ 'set_more_as_link' ] ); ?> id="<?php echo $field_ids[ 'set_more_as_link' ]; ?>" name="<?php echo $this->get_field_name( 'set_more_as_link' ); ?>" />
<label for="<?php echo $field_ids[ 'set_more_as_link' ]; ?>"><?php esc_html_e( 'Set signs after excerpt as a link to the post?', 'apparatus' ); ?></label></p>

<p><input class="checkbox" type="checkbox" <?php checked( $bools[ 'ignore_excerpt' ] ); ?> id="<?php echo $field_ids[ 'ignore_excerpt' ]; ?>" name="<?php echo $this->get_field_name( 'ignore_excerpt' ); ?>" />
<label for="<?php echo $field_ids[ 'ignore_excerpt' ]; ?>"><?php esc_html_e( 'Ignore post excerpt field as excerpt source?', 'apparatus' ); ?></label><br />
<em><?php esc_html_e( 'Normally the widget takes the excerpt from the text of the excerpt field unchanged and if there is no text it creates the excerpt from the post content automatically. If this option is activated the excerpt is created from the post content only.', 'apparatus' );?></em></p>

<h4><?php $text = 'Comments'; esc_html_e( $text ); ?></h4>

<p><input class="checkbox" type="checkbox" <?php checked( $bools[ 'show_comments_number' ] ); ?> id="<?php echo $field_ids[ 'show_comments_number' ]; ?>" name="<?php echo $this->get_field_name( 'show_comments_number' ); ?>" />
<label for="<?php echo $field_ids[ 'show_comments_number' ]; ?>"><?php esc_html_e( 'Show number of comments?', 'apparatus' ); ?></label></p>

<h4><?php $text = 'Filter by category'; esc_html_e( $text ); ?></h4>

<p><label for="<?php echo $field_ids[ 'category_ids' ];?>"><?php esc_html_e( 'Show posts of selected categories only?', 'apparatus' ); ?></label><br />
<?php echo $selection_element; ?><br />
<em><?php printf( esc_html__( 'Click on the categories with pressed CTRL key to select multiple categories. If &#8220;%s&#8221; was selected then other selections will be ignored.', 'apparatus' ), $label_all_cats ); ?></em></p>

<h4><?php $text = 'Thumbnail Settings'; esc_html_e( $text ); ?></h4>

<p><input class="checkbox" type="checkbox" <?php checked( $bools[ 'show_thumb' ] ); ?> id="<?php echo $field_ids[ 'show_thumb' ]; ?>" name="<?php echo $this->get_field_name( 'show_thumb' ); ?>" />
<label for="<?php echo $field_ids[ 'show_thumb' ]; ?>"><?php esc_html_e( 'Show thumbnail?', 'apparatus' ); ?></label><br>
<em><?php esc_html_e( 'By default, the featured image of the post is used as long as the next checkboxes do not specify anything different.', 'apparatus' ); ?></em></p>

<p><label for="<?php echo $field_ids[ 'thumb_dimensions' ]; ?>"><?php esc_html_e( 'Size of thumbnail', 'apparatus' ); ?>:</label>
	<select id="<?php echo $field_ids[ 'thumb_dimensions' ]; ?>" name="<?php echo $this->get_field_name( 'thumb_dimensions' ); ?>">
		<option value="<?php echo $this->defaults[ 'thumb_dimensions' ]; ?>" <?php selected( $thumb_dimensions, $this->defaults[ 'thumb_dimensions' ] ); ?>><?php esc_html_e( 'Specified width and height', 'apparatus' ); ?></option>
<?php
// Display the sizes in the array
foreach ( $size_options as $option ) {
?>
		<option value="<?php echo esc_attr( $option[ 'size_name' ] ); ?>"<?php selected( $thumb_dimensions, $option[ 'size_name' ] ); ?>><?php echo esc_html( $option[ 'name' ] ); ?> (<?php echo absint( $option[ 'width' ] ); ?> &times; <?php echo absint( $option[ 'height' ] ); ?>)</option>
<?php
} // end foreach(option)
?>
	</select><br />
	<em><?php printf( esc_html__( 'If you use a specified size the following sizes will be taken, otherwise they will be ignored and the selected dimension as stored in %s will be used:', 'apparatus' ), $media_trail ); ?></em>
</p>

<p><label for="<?php echo $field_ids[ 'thumb_width' ]; ?>"><?php esc_html_e( 'Width of thumbnail', 'apparatus' ); ?>:</label>
<input id="<?php echo $field_ids[ 'thumb_width' ]; ?>" name="<?php echo $this->get_field_name( 'thumb_width' ); ?>" type="text" value="<?php echo $ints[ 'thumb_width' ]; ?>" size="3" /></p>

<p><label for="<?php echo $field_ids[ 'thumb_height' ]; ?>"><?php esc_html_e( 'Height of thumbnail', 'apparatus' ); ?>:</label>
<input id="<?php echo $field_ids[ 'thumb_height' ]; ?>" name="<?php echo $this->get_field_name( 'thumb_height' ); ?>" type="text" value="<?php echo $ints[ 'thumb_height' ]; ?>" size="3" /></p>

<p><input class="checkbox" type="checkbox" <?php checked( $bools[ 'keep_aspect_ratio' ] ); ?> id="<?php echo $field_ids[ 'keep_aspect_ratio' ]; ?>" name="<?php echo $this->get_field_name( 'keep_aspect_ratio' ); ?>" />
<label for="<?php echo $field_ids[ 'keep_aspect_ratio' ]; ?>"><?php esc_html_e( 'Use aspect ratios of original images?', 'apparatus' ); ?><br />
<em><?php esc_html_e( 'If activated the given width is used to determine the height of the thumbnail automatically. This option also supports responsive web design.', 'apparatus' ); ?></em></label></p>

<p><input class="checkbox" type="checkbox" <?php checked( $bools[ 'try_1st_img' ] ); ?> id="<?php echo $field_ids[ 'try_1st_img' ]; ?>" name="<?php echo $this->get_field_name( 'try_1st_img' ); ?>" />
<label for="<?php echo $field_ids[ 'try_1st_img' ]; ?>"><?php esc_html_e( "Try to use the post's first image if post has no featured image?", 'apparatus' ); ?></label></p>

<p><input class="checkbox" type="checkbox" <?php checked( $bools[ 'only_1st_img' ] ); ?> id="<?php echo $field_ids[ 'only_1st_img' ]; ?>" name="<?php echo $this->get_field_name( 'only_1st_img' ); ?>" />
<label for="<?php echo $field_ids[ 'only_1st_img' ]; ?>"><?php esc_html_e( 'Use first image only, ignore featured image?', 'apparatus' ); ?></label></p>

<p><input class="checkbox" type="checkbox" <?php checked( $bools[ 'use_default' ] ); ?> id="<?php echo $field_ids[ 'use_default' ]; ?>" name="<?php echo $this->get_field_name( 'use_default' ); ?>" />
<label for="<?php echo $field_ids[ 'use_default' ]; ?>"><?php esc_html_e( 'Use default thumbnail if no image could be determined?', 'apparatus' ); ?></label></p>

<p><label for="<?php echo $field_ids[ 'default_url' ]; ?>"><?php esc_html_e( 'URL of default thumbnail (start with http://)', 'apparatus' ); ?>:</label>
<input class="widefat" id="<?php echo $field_ids[ 'default_url' ]; ?>" name="<?php echo $this->get_field_name( 'default_url' ); ?>" type="text" value="<?php echo esc_url( $default_url ); ?>" /></p>

<?php

	}
	
	/**
	 * Return the array index of a given ID
	 *
	 * @since 4.1
	 */
	private function get_cat_parent_index( $arr, $id ) {
		$len = count( $arr );
		if ( 0 == $len ) {
			return false;
		}
		$id = absint( $id );
		for ( $i = 0; $i < $len; $i++ ) {
			if ( $id == $arr[ $i ][ 'id' ] ) {
				return $i;
			}
		}
		return false; 
	}
	
	/**
	 * Load the widget's CSS in the HEAD section of the frontend
	 *
	 * @since 2.3
	 */
	public function enqueue_public_style () {
		
		$is_file = false;
		$css_code = '';
		// make sure the CSS file exists; if not available: generate it
		if ( file_exists( $this->defaults[ 'css_file_path' ] ) ) {
			$is_file = true;
		} else {
			// get stored settings
			$all_settings = $this->get_settings();
			// quit if at least 1 widget was set for no CSS at all
			foreach ( $all_settings as $id => $settings ) {
				if ( isset( $settings[ 'use_no_css' ] ) and $settings[ 'use_no_css' ] ) {
					return;
				}
			} // foreach ( $all_settings as $id => $settings )

			// get the CSS code
			list( $css_code, $use_inline_css ) = $this->generate_css_code( $all_settings );
			// if not to print the CSS as inline code in the HTML document
			if ( ! $use_inline_css ) {
				// write file safely
				if ( @file_put_contents( $this->defaults[ 'css_file_path' ], $css_code ) ) {
					// file writing was successfull, so change file permissions
					chmod( $this->defaults[ 'css_file_path' ], 0644 );
					$is_file = true;
				} // if CSS file successfully created
			} // if no inline CSS
		} // if CSS file exists
			
		// if there is a CSS file
		if ( $is_file ) {
			// enqueue the CSS file
			wp_enqueue_style(
				$this->defaults[ 'plugin_slug' ] . '-public-style',
				plugin_dir_url( __FILE__ ) . 'public.css',
				array(),
				$this->defaults[ 'plugin_version' ],
				'all' 
			);
		} else {
			// print inline CSS
			print "\n<!-- Apparatus Recent Post List Widget: inline CSS -->\n";
			printf( "<style type='text/css'>\n%s</style>\n", $css_code );
		} // if $is_file
	}





	/**
	 * Returns the id of the first image in the content, else 0
	 *
	 * @access   private
	 * @since     2.0
	 *
	 * @return    integer    the post id of the first content image
	 */
	private function get_first_content_image_id () {
		// set variables
		global $wpdb;
		$post = get_post();
		if ( $post and isset( $post->post_content ) ) {
			// look for images in HTML code
			preg_match_all( '/<img[^>]+>/i', $post->post_content, $all_img_tags );
			if ( $all_img_tags ) {
				foreach ( $all_img_tags[ 0 ] as $img_tag ) {
					// find class attribute and catch its value
					preg_match( '/<img.*?class\s*=\s*[\'"]([^\'"]+)[\'"][^>]*>/i', $img_tag, $img_class );
					if ( $img_class ) {
						// Look for the WP image id
						preg_match( '/wp-image-([\d]+)/i', $img_class[ 1 ], $thumb_id );
						// if first image id found: check whether is image
						if ( $thumb_id ) {
							$img_id = absint( $thumb_id[ 1 ] );
							// if is image: return its id
							if ( wp_attachment_is_image( $img_id ) ) {
								return $img_id;
							}
						} // if(thumb_id)
					} // if(img_class)
					
					// else: try to catch image id by its url as stored in the database
					// find src attribute and catch its value
					preg_match( '/<img.*?src\s*=\s*[\'"]([^\'"]+)[\'"][^>]*>/i', $img_tag, $img_src );
					if ( $img_src ) {
						// delete optional query string in img src
						$url = preg_replace( '/([^?]+).*/', '\1', $img_src[ 1 ] );
						// delete image dimensions data in img file name, just take base name and extension
						$url = preg_replace( '/(.+)-\d+x\d+\.(\w+)/', '\1.\2', $url );
						// if path is protocol relative then set it absolute
						if ( 0 === strpos( $url, '//' ) ) {
							$url = $this->defaults[ 'site_protocol' ] . ':' . $url;
						// if path is domain relative then set it absolute
						} elseif ( 0 === strpos( $url, '/' ) ) {
							$url = $this->defaults[ 'site_url' ] . $url;
						}
						// look up its id in the db
						$thumb_id = $wpdb->get_var( $wpdb->prepare( "SELECT `ID` FROM $wpdb->posts WHERE `guid` = '%s'", $url ) );
						// if id is available: return it
						if ( $thumb_id ) {
							return absint( $thumb_id );
						} // if(thumb_id)
					} // if(img_src)
				} // foreach(img_tag)
			} // if(all_img_tags)
		} // if (post content)
		
		// if nothing found: return 0
		return 0;
	}

	/**
	 * Echoes the thumbnail of first post's image and returns success
	 *
	 * @access   private
	 * @since     2.0
	 *
	 * @return    bool    success on finding an image
	 */
	private function the_first_post_image () {
		// look for first image
		$thumb_id = $this->get_first_content_image_id();
		// if there is first image then show first image
		if ( $thumb_id ) :
			echo wp_get_attachment_image( $thumb_id, $this->customs[ 'thumb_dimensions' ] );
			return true;
		else :
			return false;
		endif; // thumb_id
	}

	/**
	 * Returns the assigned categories of a post in a string
	 *
	 * @access   private
	 * @since     4.6
	 *
	 */
	private function get_the_categories ( $id ) {
		$terms = get_the_terms( $id, 'category' );

		if ( is_wp_error( $terms ) ) {
			return __( 'Error on listing categories', 'apparatus' );
		}

		if ( empty( $terms ) ) {
			$text = 'No categories';
			return __( $text );
		}

		$categories = array();

		if ( $this->customs[ 'set_cats_as_links' ] ) {
			foreach ( $terms as $term ) {
				// get link to category
				$categories[] = sprintf(
					'<a href="%s">%s</a>',
					get_category_link( $term->term_id ),
					esc_html( $term->name )
				);
			}
		} else {
			foreach ( $terms as $term ) {
				// get sanitized category name
				$categories[] = esc_html( $term->name );
			}
		}
		/*foreach ( $terms as $term ) {
			$categories[] = $term->name;
		}*/

		$string = '';
		if ( $this->customs[ 'category_label' ] ) {
			$string = $this->customs[ 'category_label' ] . ' ';
		}
		$string .= join( $this->defaults[ 'comma' ], $categories );
		
		return $string;
	}

	/**
	 * Returns the assigned author of a post in a string
	 *
	 * @access   private
	 * @since     4.8
	 *
	 */
	private function get_the_author () {
		$author = get_the_author();

		if ( empty( $author ) ) {
			return '';
		} else {
			return sprintf( $this->defaults[ 'author_label' ], $author );
		}

	}

	/**
	 * Generate the css code with stored settings
	 *
	 * @since 2.3
	 */
	private function generate_css_code ( $all_instances ) {

		$set_default = true;
		$ints = array();
		$use_inline_css = false;

		// generate CSS
		$css_code  = ".apparatus-widget ul { list-style: outside none none; margin-left: 0; margin-right: 0; padding-left: 0; padding-right: 0; }\n"; 
		$css_code .= ".apparatus-widget ul li { overflow: hidden; margin: 0 0 1.5em; }\n"; 
		$css_code .= ".apparatus-widget ul li:last-child { margin: 0; }\n"; 
		if ( is_rtl() ) {
			$css_code .= ".apparatus-widget ul li img { display: inline; float: right; margin: .3em 0 .75em .75em; }\n";
		} else {
			$css_code .= ".apparatus-widget ul li img { display: inline; float: left; margin: .3em .75em .75em 0; }\n";
		}

		foreach ( $all_instances as $number => $settings ) {
			// set width and height
			$ints[ 'thumb_width' ] = $this->defaults[ 'thumb_width' ];
			$ints[ 'thumb_height' ] = $this->defaults[ 'thumb_height' ];
			$thumb_dimensions = isset( $settings[ 'thumb_dimensions' ] ) ? $settings[ 'thumb_dimensions' ] : $this->defaults[ 'thumb_dimensions' ];
			if ( $thumb_dimensions == 'custom' ) {
				if ( isset( $settings[ 'thumb_width' ] ) ) {
					$ints[ 'thumb_width' ]  = absint( $settings[ 'thumb_width' ]  );
				}
				if ( isset( $settings[ 'thumb_height' ] ) ) {
					$ints[ 'thumb_height' ] = absint( $settings[ 'thumb_height' ] );
				}
			} else {
				list( $ints[ 'thumb_width' ], $ints[ 'thumb_height' ] ) = $this->get_image_dimensions( $thumb_dimensions );
			} // $settings[ 'thumb_dimensions' ]
			// get aspect ratio option
			$bools[ 'keep_aspect_ratio' ] = false;
			if ( isset( $settings[ 'keep_aspect_ratio' ] ) ) {
				$bools[ 'keep_aspect_ratio' ] = (bool) $settings[ 'keep_aspect_ratio' ];
				// set CSS code
				if ( $bools[ 'keep_aspect_ratio' ] ) {
					$css_code .= sprintf( '#apparatus-%s-%d img { max-width: %dpx; width: 100%%; height: auto; }', $this->defaults[ 'plugin_slug' ], $number, $ints[ 'thumb_width' ] );
					$css_code .= "\n"; 
				} else {
					$css_code .= sprintf( '#apparatus-%s-%d img { width: %dpx; height: %dpx; }', $this->defaults[ 'plugin_slug' ], $number, $ints[ 'thumb_width' ], $ints[ 'thumb_height' ] );
					$css_code .= "\n"; 
				}
			} else {
				$css_code .= sprintf( '#apparatus-%s-%d img { width: %dpx; height: %dpx; }', $this->defaults[ 'plugin_slug' ], $number, $ints[ 'thumb_width' ], $ints[ 'thumb_height' ] );
				$css_code .= "\n"; 
			}
			// override default code
			$set_default = false;
			// inline CSS if at least 1 widget was set for that
			if ( isset( $settings[ 'use_inline_css' ] ) ) {
				$bools[ 'use_inline_css' ] = (bool) $settings[ 'use_inline_css' ];
				if ( $bools[ 'use_inline_css' ] ) {
					$use_inline_css = true;
				}
			}

		} // foreach ( $all_instances as $number => $settings )
		// set at least this statement if no settings are stored
		if ( $set_default ) {
			$css_code .= sprintf( '.apparatus-widget ul li img { width: %dpx; height: %dpx; }', $this->defaults[ 'thumb_width' ], $this->defaults[ 'thumb_height' ] );
			$css_code .= "\n"; 
		}
		
		return array( $css_code, $use_inline_css );
	}

	/**
	 * Returns the shortened excerpt, must use in a loop.
	 *
	 * @since 3.0
	 */
	private function get_the_trimmed_excerpt () {
		
		$post = get_post();
								
		if ( empty( $post ) ) {
			return '';
		}

		$excerpt = '';
		
		if ( post_password_required( $post ) ) {
			$excerpt = 'There is no excerpt because this is a protected post.';
			return esc_html__( $excerpt );
		}

		// get excerpt from text field if desired
		if ( ! $this->customs[ 'ignore_excerpt' ] ) {
			$excerpt = apply_filters( 'apparatus_the_excerpt', $post->post_excerpt, $post );
		}
		
		// text processings if no manual excerpt is available
		if ( empty( $excerpt ) ) {

			// get excerpt from post content
			$excerpt = strip_shortcodes( get_the_content( '' ) );
			$excerpt = apply_filters( 'the_excerpt', $excerpt );
			$excerpt = str_replace( ']]>', ']]&gt;', $excerpt );
			$excerpt = wp_trim_words( $excerpt, $this->customs[ 'excerpt_length' ], $this->customs[ 'excerpt_more' ] );
			
			// if excerpt is longer than desired
			if ( mb_strlen( $excerpt ) > $this->customs[ 'excerpt_length' ] ) {
				// get excerpt in desired length
				$sub_excerpt = mb_substr( $excerpt, 0, $this->customs[ 'excerpt_length' ] );
				// get array of shortened excerpt words
				$excerpt_words = explode( ' ', $sub_excerpt );
				// get the length of the last word in the shortened excerpt
				$excerpt_cut = - ( mb_strlen( $excerpt_words[ count( $excerpt_words ) - 1 ] ) );
				// if there is no empty string
				if ( $excerpt_cut < 0 ) {
					// get the shorter excerpt until the last word
					$excerpt = mb_substr( $sub_excerpt, 0, $excerpt_cut );
				} else {
					// get the shortened excerpt
					$excerpt = $sub_excerpt;
				} // if ( $excerpt_cut < 0 )
			} // if ( mb_strlen( $excerpt ) > $this->customs[ 'excerpt_length' ] )
		} // if ( empty( $excerpt ) )
		
		// append 'more' text, set 'more' signs as link if desired
		if ( $this->customs[ 'set_more_as_link' ] ) {
			$excerpt .= sprintf( '<a href="%s"%s>%s</a>', get_the_permalink( $post ), $this->customs[ 'link_target' ], $this->customs[ 'excerpt_more' ] );
		} else {
			$excerpt .= $this->customs[ 'excerpt_more' ];
		}
		
		// return text
		return $excerpt;
	}

	/**
	 * Returns the shortened post title, must use in a loop.
	 *
	 * @since 4.5
	 */
	private function get_the_trimmed_post_title () {
		
		// get current post's post_title
		$post_title = get_the_title();

		// if post_title is longer than desired
		if ( mb_strlen( $post_title ) > $this->customs[ 'post_title_length' ] ) {
			// get post_title in desired length
			$post_title = mb_substr( $post_title, 0, $this->customs[ 'post_title_length' ] );
			// append ellipses
			$post_title .= $this->defaults[ 'ellipses' ];
		}
		// return text
		return $post_title;
	}

	/**
	 * Returns width and height of a image size name, else default sizes
	 *
	 * @since 4.0
	 */
	private function get_image_dimensions ( $size = 'thumbnail' ) {

		$width  = 0;
		$height = 0;
		// check if selected size is in registered images sizes
		if ( in_array( $size, get_intermediate_image_sizes() ) ) {
			// if in WordPress standard image sizes
			if ( in_array( $size, array( 'thumbnail', 'medium', 'large' ) ) ) {
				$width  = get_option( $size . '_size_w' );
				$height = get_option( $size . '_size_h' );
			} else {
				// custom image sizes, formerly added via add_image_size()
				global $_wp_additional_image_sizes;
				$width  = $_wp_additional_image_sizes[ $size ][ 'width' ];
				$height = $_wp_additional_image_sizes[ $size ][ 'height' ];
			}
		}
		// check if vars have true values, else use default size
		if ( ! $width )  $width  = $this->defaults[ 'thumb_width' ];
		if ( ! $height ) $height = $this->defaults[ 'thumb_height' ];
		
		// return sizes
		return array( $width, $height );
	}
	
	/**
	 * Shows sticky posts on top of categories list
	 *
	 * @since 6.2.1
	 */
	public function get_stickies_on_top( $posts ) {
		// get sticky post IDs
		$sticky_posts = get_option( 'sticky_posts' );
		// initialize variables for the correct number of posts in the result list
		$num_posts = count( $posts );
		$sticky_offset = 0;
		// loop over posts and relocate stickies to the front
		for( $i = 0; $i < $num_posts; $i++ ) {
			// if sticky post
			if ( in_array( $posts[ $i ]->ID, $sticky_posts ) ) {
				$sticky_post = $posts[ $i ];
				// remove sticky post from current position
				array_splice( $posts, $i, 1 );
				// move to front, after other stickies
				array_splice( $posts, $sticky_offset, 0, array( $sticky_post ) );
				// increment the sticky offset. the next sticky will be placed at this offset.
				$sticky_offset++;
				// remove post from sticky posts array
				//$offset = array_search( $sticky_post->ID, $sticky_posts );
				//unset( $sticky_posts[ $offset ] );
			} // if ( in_array( $posts[ $i ]->ID, $sticky_posts ) )
		} // for()
		// return new list
		return $posts;
	}
	
}

/**
 * Register widget on init
 *
 * @since 1.0
 */
function register_apparatus_recent_posts_widget () {
	register_widget( 'apparatus_recent_posts_widget' );
}
add_action( 'widgets_init', 'register_apparatus_recent_posts_widget', 1 );

/*************************
Apparatus Author Bio Widget
*************************/
class apparatus_author_bio_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'apparatus_author_bio', // Base ID
      esc_html__('Apparatus Author Bio Widget', 'apparatus'), // Name
      array( 'description' => esc_html__( 'Displays author details', 'apparatus'), ) // Args
    );
  }


  public function widget( $args, $instance ) {
	  extract($args);
	  $title = isset($instance['title']) ? $instance['title'] : '';
	  $desc= isset($instance['desc']) ? $instance['desc'] : '';	
	  $image_url= isset($instance['image_url']) ? $instance['image_url'] : '';	
	  $name= isset($instance['name']) ? $instance['name'] : '';	
	  $link= isset($instance['link']) ? $instance['link'] : '';	
	  $allowed_html = array(
		'span' => array(
			'class' => array(),
			'style' => array()
		),
		'br' => array(),
		'strong' => array(),
		'p' => array(),
	);	  
  ?>
				<div class="widget bg2-right-col-item-holder">
						<?php if(!empty($title)){ ?>
							<h5 class="bg2-right-col-item-title"><?php echo esc_attr($title);?></h5>
						<?php } ?>	
					<div class="qodef-aiw-inner">
					<?php if(!empty($image_url)){ ?>
                    <a itemprop="url" class="qodef-aiw-image" href="<?php echo esc_url($link);?>">
                        <img src="<?php echo esc_url($image_url);?>" width="150" height="150" alt="author-image" class="avatar avatar-150 wp-user-avatar wp-user-avatar-150 alignnone photo">                    
					</a>
					<?php } ?>
					<?php if(!empty($name)){ ?>
                       <h5 class="bg2-right-col-item-title<?php if(!empty($title)){ ?> author-name<?php } ?>"><?php echo esc_attr($name);?></h5>
					<?php } ?>  
					   <?php if(!empty($desc)){ ?>
                       <p itemprop="description" class="qodef-aiw-text"><?php echo wp_kses($desc,$allowed_html); ?></p>
					   <?php } ?>
                     </div>
					
				</div>
							
<?php	
 }

  function update( $new_instance, $old_instance ){

    $instance = $old_instance;
    $instance['title']= strip_tags( $new_instance['title'] );
    $instance['desc']= strip_tags( $new_instance['desc'] );
    $instance['image_url']= strip_tags( $new_instance['image_url'] );
    $instance['name']= strip_tags( $new_instance['name'] );
    $instance['link']= strip_tags( $new_instance['link'] );
return $instance;
  }


  function form($instance){
    $defaults = array( 
      'title'               => '',
      'desc'               => '',
      'image_url'               => '',
      'name'               => '',
      'link'               => '',
    );
    $instance = wp_parse_args( (array) $instance, $defaults );
	$allowed_html = array(
    'span' => array(
        'class' => array(),
        'style' => array()
    ),
    'br' => array(),
    'strong' => array(),
    'p' => array(),
);
  ?>

    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Title', 'apparatus'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" class="widefat" value="<?php echo esc_attr($instance['title']); ?>">
	  
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'image_url' )); ?>"><?php esc_html_e('Profile Image URL', 'apparatus'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'image_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'image_url' )); ?>" class="widefat" value="<?php echo esc_url($instance['image_url']); ?>">
	  
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'name' )); ?>"><?php esc_html_e('Name', 'apparatus'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'name' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'name' )); ?>" class="widefat" value="<?php echo esc_attr($instance['name']); ?>">
	  
    </p>	
    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'desc' )); ?>"><?php esc_html_e('Description', 'apparatus'); ?></label>
      <textarea type="text" id="<?php echo esc_attr($this->get_field_id( 'desc' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'desc' )); ?>" class="widefat" ><?php echo wp_kses($instance['desc'],$allowed_html); ?></textarea>
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'link' )); ?>"><?php esc_html_e('Profile Page URL', 'apparatus'); ?></label>
      <input type="text" placeholder="http://" id="<?php echo esc_attr($this->get_field_id( 'link' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'link' )); ?>" class="widefat" value="<?php echo esc_url($instance['link']); ?>">
	  
    </p>	
  <?php
  }

}//end of class

 
function register_apparatus_author_bio_widget() {
  register_widget( 'apparatus_author_bio_widget' );  // Class Name
}
add_action( 'widgets_init', 'register_apparatus_author_bio_widget' );