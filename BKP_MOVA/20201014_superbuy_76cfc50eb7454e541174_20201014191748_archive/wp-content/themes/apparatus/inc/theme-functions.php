<?php
// **********************************************************************// 
// ! Custom Logo
// **********************************************************************//
function apparatus_the_custom_logo() {
   if ( function_exists( 'the_custom_logo' ) ) {
      the_custom_logo();
   }
}

// **********************************************************************// 
// ! Custom Is Blog
// **********************************************************************//
function apparatus_is_blog() {
	if ( (is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag()) || (is_search()) ) {
		return true;
	}
	else {
		return false; 
	}
}
/// Is Blog END ///

// **********************************************************************// 
// ! Custom Is Blog
// **********************************************************************//
function apparatus_is_front() {
	if ( (!is_home()) && (is_front_page()) ) {
		return true;
	}
	else {
		return false; 
	}
}

// **********************************************************************// 
// ! Excerpt and Content Limit
// **********************************************************************//
function apparatus_excerpt($category_excerpt_limit) {
      $excerpt = explode(' ', get_the_excerpt(), $category_excerpt_limit);

      if (count($excerpt) >= $category_excerpt_limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }

      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

      return $excerpt;
}

function apparatus_content($category_excerpt_limit) {
    $content = explode(' ', get_the_content(), $category_excerpt_limit);

    if (count($content) >= $category_excerpt_limit) {
        array_pop($content);
        $content = implode(" ", $content) . '...';
    } else {
        $content = implode(" ", $content);
    }

    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content); 
    $content = str_replace(']]>', ']]&gt;', $content);

    return $content;
}
// **********************************************************************// 
// ! Getting Theme Fonts
// **********************************************************************//
// ! Roboto and Nunito Font
function apparatus_fonts_nunito_and_roboto_url() {
$fonts_url = '';
 
$font_families[] = 'Roboto:100,300,400,400i,500,700,900|Nunito:200,300,400,600,700,800,900';
 
$query_args = array(
'family' => urlencode( implode( '|', $font_families ) ),
);
 
$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
 
return esc_url_raw( $fonts_url );
}

// ! Montserrat Font
function apparatus_fonts_montserrat_url() {
$fonts_url = '';
 
$font_families[] = 'Montserrat:200,300,400,500,500i,600,700,800';
 
$query_args = array(
'family' => urlencode( implode( '|', $font_families ) ),
);
 
$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
 
return esc_url_raw( $fonts_url );
}

// ! Oswald Font
function apparatus_fonts_oswald_url() {
$fonts_url = '';
 
$font_families[] = 'Oswald:400';
 
$query_args = array(
'family' => urlencode( implode( '|', $font_families ) ),
);
 
$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
 
return esc_url_raw( $fonts_url );
}
// **********************************************************************// 
// ! Custom Walker for wp_nav_menu()
// **********************************************************************//
class apparatus_walker_nav_menu extends Walker_Nav_Menu {

private $blog_sidebar_pos = "";
// add classes to ul sub-menus
public function start_lvl( &$output, $depth = 0, $args = Array() ) {
    // depth dependent classes
    $indent = str_repeat( "\t", $depth );
	$display_depth = ( $depth + 1); // because it counts the first submenu as 0
    $classes = array(
        ( $display_depth == 1  ? 'dm-align-2' : '' ),
		( $display_depth % 2  ? 'menu-odd sub-menu' : 'menu-even sub-menu' ),
        ( $display_depth >=2 ? '' : '' ),
        'menu-depth-' . $display_depth
        );
    $class_names = implode( ' ', $classes );
	$output .= "\n$indent<ul role=\"menu\" class=\"$class_names\" >\n";
}
  
// add main/sub classes to li's and links
public function start_el( &$output, $item, $depth = 0, $args = Array(), $id = 0 ) {
    global $wp_query;
	$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
  
    /**
			 * Dividers, Headers or Disabled
			 * =============================
			 * Determine whether the item is a Divider, Header, Disabled or regular
			 * menu item. To prevent errors we use the strcasecmp() function to so a
			 * comparison that is not case sensitive. The strcasecmp() function returns
			 * a 0 if the strings are equal.
			 */
			if ( 0 === strcasecmp( $item->attr_title, 'divider' ) && 1 === $depth ) {
				$output .= $indent . '<li role="presentation" class="divider">';
			} elseif ( 0 === strcasecmp( $item->title, 'divider' ) && 1 === $depth ) {
				$output .= $indent . '<li role="presentation" class="divider">';
			} elseif ( 0 === strcasecmp( $item->attr_title, 'dropdown-header' ) && 1 === $depth ) {
				$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
			} elseif ( 0 === strcasecmp( $item->attr_title, 'disabled' ) ) {
				$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
			} else {
				$value = '';
				$class_names = $value;
				$classes = empty( $item->classes ) ? array() : (array) $item->classes;
				$classes[] = 'menu-item-' . $item->ID .' nav-item';
				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
					
				if ( $args->has_children ) {
					$class_names .= ' dropdown dropdown-v1';
				}
				if ( $depth == 0 ) {
					$class_names .= ' the-top-parent-item';
				}
				if ( in_array( 'current-menu-item', $classes, true ) ) {
					$class_names .= ' active';
	
				}
				$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
				$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
				$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
				$output .= $indent . '<li ' . $id . $value . $class_names . '>';
				$atts = array();

				if ( empty( $item->attr_title ) ) {
					$atts['title']  = ! empty( $item->title )   ? strip_tags( $item->title ) : '';
				} else {
					$atts['title'] = $item->attr_title;
				}

				$atts['target'] = ! empty( $item->target ) ? $item->target : '';
				$atts['rel']    = ! empty( $item->xfn )    ? $item->xfn    : '';
				$home_url = home_url();
				// If item has_children add atts to a.
				if ( $args->has_children && 0 === $depth && empty( $item->url ) ) {
					$atts['href']           = '#';
					$atts['data-toggle']    = 'dropdown';
					$atts['class']          = 'nav-link';
					$atts['aria-haspopup']  = 'true';
				} elseif ( $args->has_children && 0 === $depth && ! empty( $item->url ) ) {
					$atts['href']           = $item->url;
					$atts['class']          = 'nav-link';
					$atts['aria-haspopup']  = 'true';
				} elseif ( $args->has_children && 1 === $depth && ! empty( $item->url ) ) {
					$atts['href']           = $item->url;
					$atts['class']          = 'nav-link'; //detecting sub-menu's sub-menu
					$atts['aria-haspopup']  = 'true';
				} elseif ( (! empty( $item->url )) && ($atts['title'] == 'onepage') && ( !apparatus_is_front() ) ) {
					//For OnePage functionality only; Users should put onepage in the "title attribute" of the menus.
					$atts['href'] = $home_url .'/'. $item->url;
					//$atts['class']          = 'nav-link';
				} else {
					$atts['href'] = ! empty( $item->url ) ? $item->url : '';
				}
				$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
				$attributes = '';
				foreach ( $atts as $attr => $value ) {
					if ( ! empty( $value ) ) {
						$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
						$attributes .= ' ' . $attr . '="' . $value . '"';
					}
				}
				$item_output = $args->before;

				/*
				 * Glyphicons/Font-Awesome
				 * ===========
				 * Since the the menu item is NOT a Divider or Header we check the see
				 * if there is a value in the attr_title property. If the attr_title
				 * property is NOT null we apply it as the class name for the glyphicon.
				 */
				 
				if( 'mega-menu' == $item->object ){
				$megamenu_item = get_post( $item->object_id );
				$item_output .= '' . apply_filters( 'the_content', $megamenu_item->post_content ) . '';
				}else{
			
				if ( ! empty( $item->attr_title ) && $item->attr_title != 'onepage' ) { // This (&& $item->attr_title != 'onepage') is for OnePage functionality only
					$pos = strpos( esc_attr( $item->attr_title ), 'glyphicon' );
					if ( false !== $pos ) {
						$item_output .= '<a' . $attributes . '><span class="glyphicon ' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></span>&nbsp;';
					} else {
						$item_output .= '<a' . $attributes . '><i class="' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></i>&nbsp;';
					}
				} else {
					$item_output .= '<a' . $attributes . ' class="nav-link">';
				}
				if ( ! empty( $item->title ) && ! empty( $item->ID ) ) {
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				}
				if ( $args->has_children && 0 === $depth ){
				$item_output .= '</a>';
				} elseif ( $args->has_children && 1 === $depth ){ //detecting sub-menu's sub-menu
				$item_output .= '</a>';
				} else {
				$item_output .= '</a>';
				}
				$item_output .= $args->after;
				}
				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
				
				
			} // End if().
		}
		
		public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
			if ( ! $element ) {
				return; }
			$id_field = $this->db_fields['id'];
			// Display this element.
			if ( is_object( $args[0] ) ) {
				$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] ); }
			parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}
} //End Walker_Nav_Menu


// **********************************************************************// 
// ! Function to Check if a Plugin is Active
// **********************************************************************// 
function apparatus_ipa( $plugin ) {
    $plugins_array = array();
	if ( is_multisite() ) {
	$plugins_array = get_site_option( 'active_sitewide_plugins', array() );
	$plugins_only = array_keys($plugins_array);
	} else {
	$plugins_array = get_option( 'active_plugins', array() );
	$plugins_only = array_keys($plugins_array);
	}	

		if( in_array( $plugin, $plugins_only, false ) ){
			return true;
		} else {
			return false;
		}
}


// **********************************************************************// 
// ! Get Global Variables
// **********************************************************************//
function apparatus_get_global_post() {
    global $post;
    if ( 
        ! $post instanceof \WP_Post
    ) {
        return false;
    }
    return $post;
}

function apparatus_get_global_wpquery() {
    global $wp_query;
    return $wp_query;
}

function apparatus_get_global_numpages() {
    global $numpages;
    return $numpages;
}

// **********************************************************************// 
// ! Set Content Width
// **********************************************************************// 
if (!isset($content_width)) { $content_width = 825; }

// **********************************************************************// 
// ! Custom Is Blog Only
// **********************************************************************//
function apparatus_is_blog_only() {
	if ( (is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_tag()) || (is_search()) ) {
		return true;
	}
	else {
		return false; 
	}
}

function apparatus_is_single_only() {
	if ( (is_singular()) && (!is_page_template('page-vc.php')) ) {
		return true;
	}
	else {
		return false; 
	}
}
// **********************************************************************// 
// ! Adding Conditional Class to Body
// **********************************************************************//
add_filter( 'body_class', 'apparatus_body_custom_class' );
function apparatus_body_custom_class( $classes ) {

    global $post;
	$classes[] = 'montserrat_font'; 
  
	if(apparatus_is_blog_only()){
        $classes[] = 'ft_blog_page';
    } else {
		$classes[] = '';
	}
	if(apparatus_is_single_only()){
        $classes[] = 'ft_single_page';
    } else {
		$classes[] = '';
	}
	
	if( is_a( $post, 'WP_Post' ) && (has_shortcode( $post->post_content, 'appeasy_shortcode_for_header_section_one') || has_shortcode( $post->post_content, 'appeasy_shortcode_for_header_section_two')) ){
		$classes[] = 'ft_home';
    } else {
		$classes[] = '';
	}
	
    return $classes;
}

// **********************************************************************// 
// ! Count Parent Menu Items and add Class accordingly
// **********************************************************************//
/**
 * Gets the count of the parent items in a nav menu based upon the id specified.
 * 
 * @param 	string $nav_id The id of the nav item to get the parent count for.
 * @return 	bool|int False on fail, or the count of how many parent items there are.
 * @uses 	wp_get_nav_menu_items
 */
function apparatus_count_nav_parent_items( $nav_id = null ) {
	// if we don't have a nav_location, exit
	if( $nav_id === null || $nav_id === '' )
		return false;
	// now get the nav items of the id of nav_location
	$items = wp_get_nav_menu_items( $nav_id );
	// if we don't have anything, exit
	if( count( $items ) <= 0 )
		return false;
	// go through each item
	$parents = array();
	foreach( $items as $item ) {
		// if the item's parent is 0, it's a top level, add it to an array
		if( $item->menu_item_parent == 0 )
			$parents[] = $item;
	}
	// return our count
	return count( $parents );
}
/**
 * Adds a class to a nav container based upon how many parent items it contains.
 * 
 * @param 	array $args The array of args supplied by the filter for the nav menu.
 * @return 	array Returns the same array passed in, just modified
 * @uses 	get_nav_menu_locations, apparatus_count_nav_parent_items
 */
function apparatus_add_nav_parent_count( $args = '' ) {
	
	// is the id in the args?
	if( isset( $args[ 'menu' ]->term_id ) && $args[ 'menu' ]->term_id !== 0 ) {
		// if so, set it
		$menu_id = $args[ 'menu' ]->term_id;
	// do we have a theme location?
	} elseif( isset( $args[ 'theme_location' ] ) && $args[ 'theme_location' ] !== '' ) {
		// get all the locations
		$theme_nav_locations = get_nav_menu_locations();
		// if we don't have any theme locations, exit
		if( count( $theme_nav_locations ) <= 0 ) {
			// add a theme locations not found class and exit
			$args[ 'menu_class' ] = $args[ 'menu_class' ] .' parent-items-tlnf';
			return $args;
		}
		// set the menu id
		$menu_id = $theme_nav_locations[ $args[ 'theme_location' ] ];
	// we have nothing
	} else {
		// add an id not found class and exit
		$args[ 'menu_class' ] = $args[ 'menu_class' ] .' parent-items-idnf';
		return $args;
	}
	// count the parents
	$parent_count = apparatus_count_nav_parent_items( $menu_id );
	// if we got a count
	if( $parent_count ) {
		// add the class to the nav container
		$args[ 'menu_class' ] = $args[ 'menu_class' ] .' parent-items-'. $parent_count;
	// we didn't
	} else {
		// add a different class to the nav container
		$args[ 'menu_class' ] = $args[ 'menu_class' ] .' parent-items-pcnf';
	}
	// put the array back into play
	return $args;
}
add_filter( 'wp_nav_menu_args', 'apparatus_add_nav_parent_count' );

// **********************************************************************// 
// ! Breadcrumb Function Start
// **********************************************************************//
function apparatus_page_breadcrumb_function() {
       
    $allowed_html_array = array(
				'ul' => array(
					'class' => array(),
					'id' => array()
				),
				'li' => array(
					'class' => array()
				),
				'span' => array(
					'class' => array()
				),
				'a' => array(
					'class' => array(),
					'href' => array(),
					'title' => array()
				));
	// Settings
    $separator          = '';
    $breadcrums_id      = 'bcrumbs';
    $breadcrums_class   = 'bcrumbs';
    $home_title         = esc_html__('Home', 'apparatus');
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
    $prefix = '';
    $output = '';
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        $output .= '<ul id="' . esc_attr($breadcrums_id) . '" class="' . esc_attr($breadcrums_class) . '">';
           
        // Home page
        $output .= '<li class="item-home"><a class="bread-link bread-home" href="' . esc_url(get_home_url()) . '" title="' . esc_attr__('Home', 'apparatus') . '">' . esc_html__('Home', 'apparatus') . '</a></li>';
        $output .= '<li class="separator separator-home"> ' . esc_attr($separator) . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            $output .= '<li class="item-current item-archive"><span class="bread-current bread-archive">'.esc_html__('Archives', 'apparatus').'</span></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                $output .= '<li class="item-cat item-custom-post-type-' . esc_attr($post_type) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr($post_type) . '" href="' . esc_url($post_type_archive) . '" title="' . esc_attr($post_type_object->labels->name) . '">' . esc_attr($post_type_object->labels->name) . '</a></li>';
                $output .= '<li class="separator"> ' . esc_attr($separator) . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            $output .= '<li class="item-current item-archive"><span class="bread-current bread-archive">' . esc_attr($custom_tax_name) . '</span></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                $output .= '<li class="item-cat item-custom-post-type-' . esc_attr($post_type) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr($post_type) . '" href="' . esc_url($post_type_archive) . '" title="' . esc_attr($post_type_object->labels->name) . '">' . esc_attr($post_type_object->labels->name) . '</a></li>';
                $output .= '<li class="separator"> ' . esc_attr($separator) . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end($category);
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">' . $parents /*escaped already*/ . '</li>';
                    $cat_display .= '<li class="separator"> ' . esc_attr($separator) . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                $output .= $cat_display;
                $output .= '<li class="item-current item-' . esc_attr($post->ID) . '"><span class="bread-current bread-' . esc_attr($post->ID) . '" title="' . the_title_attribute('echo=0') . '">' . get_the_title() . '</span></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                $output .= '<li class="item-cat item-cat-' . esc_attr($cat_id) . ' item-cat-' . esc_attr($cat_nicename) . '"><a class="bread-cat bread-cat-' . esc_attr($cat_id) . ' bread-cat-' . esc_attr($cat_nicename) . '" href="' . esc_url($cat_link) . '" title="' . esc_attr($cat_name) . '">' . esc_attr($cat_name) . '</a></li>';
                $output .= '<li class="separator"> ' . esc_attr($separator) . ' </li>';
                $output .= '<li class="item-current item-' . esc_attr($post->ID) . '"><span class="bread-current bread-' . esc_attr($post->ID) . '" title="' . the_title_attribute('echo=0') . '">' . get_the_title() . '</span></li>';
              
            } else {
                  
                $output .= '<li class="item-current item-' . esc_attr($post->ID) . '"><span class="bread-current bread-' . esc_attr($post->ID) . '" title="' . the_title_attribute('echo=0') . '">' . get_the_title() . '</span></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            $output .= '<li class="item-current item-cat"><span class="bread-current bread-cat">' . single_cat_title('', false) . '</span></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . esc_attr($ancestor) . '"><a class="bread-parent bread-parent-' . esc_attr($ancestor) . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . esc_attr($ancestor) . '"> ' . esc_attr($separator) . ' </li>';
                }
                   
                // Display parent pages
                $output .= $parents; //escaped already
                   
                // Current page
                $output .= '<li class="item-current item-' . esc_attr($post->ID) . '"><span title="' . the_title_attribute('echo=0') . '"> ' . get_the_title() . '</span></li>';
                   
            } else {
                   
                // Just display current page if not parents
                $output .= '<li class="item-current item-' . esc_attr($post->ID) . '"><span class="bread-current bread-' . esc_attr($post->ID) . '"> ' . get_the_title() . '</span></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            $output .= '<li class="item-current item-tag-' . esc_attr($get_term_id) . ' item-tag-' . esc_attr($get_term_slug) . '"><span class="bread-current bread-tag-' . esc_attr($get_term_id) . ' bread-tag-' . esc_attr($get_term_slug) . '">' . esc_attr($get_term_name) . '</span></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            $output .= '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' '.esc_html__('Archives', 'apparatus').'</a></li>';
            $output .= '<li class="separator separator-' . get_the_time('Y') . '"> ' . esc_attr($separator) . ' </li>';
               
            // Month link
            $output .= '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' '.esc_html__('Archives', 'apparatus').'</a></li>';
            $output .= '<li class="separator separator-' . get_the_time('m') . '"> ' . esc_attr($separator) . ' </li>';
               
            // Day display
            $output .= '<li class="item-current item-' . get_the_time('j') . '"><span class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' '.esc_html__('Archives', 'apparatus').'</span></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            $output .= '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' '.esc_html__('Archives', 'apparatus').'</a></li>';
            $output .= '<li class="separator separator-' . get_the_time('Y') . '"> ' . esc_attr($separator) . ' </li>';
               
            // Month display
            $output .= '<li class="item-month item-month-' . get_the_time('m') . '"><span class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' '.esc_html__('Archives', 'apparatus').'</span></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            $output .= '<li class="item-current item-current-' . get_the_time('Y') . '"><span class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' '.esc_html__('Archives', 'apparatus').'</span></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            $output .= '<li class="item-current item-current-' . esc_attr($userdata->user_nicename) . '"><span class="bread-current bread-current-' . esc_attr($userdata->user_nicename) . '" title="' . esc_attr($userdata->display_name) . '">' . esc_html__( 'Search results for', 'apparatus') . ': ' . esc_attr($userdata->display_name) . '</span></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            $output .= '<li class="item-current item-current-' . get_query_var('paged') . '"><span class="bread-current bread-current-' . get_query_var('paged') . '" title="'.esc_attr__( 'Page', 'apparatus').' ' . get_query_var('paged') . '">'.esc_html__('Page', 'apparatus').' ' . get_query_var('paged') . '</span></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            $output .= '<li class="item-current item-current-' . esc_attr(get_search_query()) . '"><span class="bread-current bread-current-' . esc_attr(get_search_query()) . '" title="'.esc_attr__( 'Search results for', 'apparatus').': ' . esc_attr(get_search_query()) . '">'.esc_html__( 'Search results for', 'apparatus').': ' . esc_attr(get_search_query()) . '</span></li>';
           
        } else if ( is_home() ) {
           
            // Search results page
            $output .= '<li class="item-current item-current-blog"><span class="bread-current bread-current-blog" title="'.esc_attr__( 'Blog', 'apparatus').'">'.esc_html__( 'Blog', 'apparatus').'</span></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            $output .= '<li><span>' . esc_html__( 'Error 404', 'apparatus') . '</span></li>';
        }
       
        $output .= '</ul>';
		echo wp_kses($output, $allowed_html_array);  
    }
       
}
// **********************************************************************// 
// ! End Breadcrumb Function
// **********************************************************************//

// **********************************************************************// 
// ! Custom Pagination
// **********************************************************************//
function apparatus_custom_pagination()
{
	global $wp_query;

	$big = 999999999; // need an unlikely integer
		
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'show_all'     => false,
		'end_size'     => 1,
		'mid_size'     => 2,
		'prev_next'    => true,
		'prev_text'    => '&laquo;',
		'next_text'    => '&raquo;',
		'type'         => 'list',
		'add_args'     => false,
		'add_fragment' => ''
	) ); 
}

// **********************************************************************// 
// ! Custom Pagination
// **********************************************************************//
function apparatus_custom_loadmore()
{
	global $wp_query;
	
	if ( $wp_query->max_num_pages > 1 ) :
		echo '<div class="load_more">'.get_next_posts_link( ''.esc_html__("Load More", "apparatus").' <i class="fas fa-redo"></i>' ).'</div>';
	endif;
}

// **********************************************************************// 
// ! Check if a page has Pagination
// **********************************************************************//
# Will return true if there is more than one page
function apparatus_has_pagination() {
	global $wp_query;
	if ($wp_query->max_num_pages > 1) {
		return true;
	} else {
		return false;
	}
}

// **********************************************************************// 
// ! Pagination without loading
// **********************************************************************//

function apparatus_pagination_without_loading() {
echo "
	<script>
	jQuery(function(jQuery) {
	jQuery('#msg').hide();	
    jQuery('#content').on('click', '.page-numbers a', function(e){
        e.preventDefault();
        var link = jQuery(this).attr('href');
        jQuery('#content').fadeOut(1500, function(){
			jQuery('#msg').show();
			jQuery('html, body').animate({
			scrollTop: jQuery('#full-section').offset().top - 100
		}, 1000);
            jQuery(this).load(link + ' #content .load-this-section', function() {
				jQuery('#msg').hide();
                jQuery(this).fadeIn(1500);
				var blogs_masonry = jQuery('body').find('.blog-grid-with-msnr');
				if (blogs_masonry.length) {

					var msnry = new Masonry('.blog-grid-with-msnr', {
						percentPosition: true,
						columnWidth: '.grid-sizer',

					});
				}
            });
        });
    });
});
</script>
";
}

// **********************************************************************// 
// ! Newsletter without loading
// **********************************************************************//
function apparatus_newsletter_without_loading(){
$theme_directory = get_template_directory();
$subscribe_file  = '/subscribe/sub_check.jpg';	
if ( file_exists( $theme_directory . $subscribe_file ) ) {
$subscribe_php = get_template_directory_uri(). '/subscribe/subscribe2.php';
} else {
$subscribe_php = '#';
}
echo " " ?>
        <script>
            jQuery(document).ready(function(){
				
                jQuery('#newsletter').on("submit", function(e){
                    //Stop the form from submitting itself to the server.
                    e.preventDefault();
					var data = {};                 
                    var email = jQuery("#email").val();
                    jQuery.ajax({
                        type: "POST",
						dataType: 'json',
						  beforeSend: function(){
							jQuery(".newsletter-loader").css("display", "inline");
						  },
                        url: "<?php echo esc_url($subscribe_php); ?>",
                        data: {email1:email},
						complete: function(){
							jQuery("#newsletter")[0].reset();
							jQuery(".newsletter-loader").css("display", "none");
						  },
                        success: function(data){
						jQuery('#output').html(data);
                        },	
						error: function(data){
						jQuery('#output').html('');
						  },
					  
                    });
                });
            });
        </script>
<?php "		
";
}

// **********************************************************************// 
// ! Footer Newsletter without loading
// **********************************************************************//
function apparatus_footer_newsletter_without_loading(){
$theme_directory = get_template_directory();
$subscribe_file  = '/subscribe/sub_check.jpg';	
if ( file_exists( $theme_directory . $subscribe_file ) ) {
$subscribe_php = get_template_directory_uri(). '/subscribe/subscribe1.php';
} else {
$subscribe_php = '#';
}
echo '<script>
            jQuery(document).ready(function(){
				
                jQuery("#footer-newsletter").on("submit", function(e){
                    e.preventDefault();
					var data = {};                 
                    var email = jQuery("#footer-email").val();
                    jQuery.ajax({
                        type: "POST",
						dataType: "json",
						  beforeSend: function(){
							jQuery(".footer-newsletter-loader").css("display", "inline");
						  },
                        url: "'.esc_url($subscribe_php).'",
                        data: {footer_email1:email},
						complete: function(){
							jQuery("#footer-newsletter")[0].reset();
							jQuery(".footer-newsletter-loader").css("display", "none");
						  },
                        success: function(data){
						jQuery("#footer-output").html(data);
                        },	
						error: function(data){
						jQuery("#footer-output").html("");
						  },
					  
                    });
                });
            });
        </script>
';
}
// **********************************************************************// 
// ! Display Comments section
// **********************************************************************//
if ( ! function_exists( 'apparatus_comment' ) ) {

	function apparatus_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	global $post;
	?>
	
	<li>
	<article>
	                    <div <?php comment_class( 'item' ); ?> id="comment-<?php comment_ID() ?>">
                        <div class="testimonial com">
						<div class="row">
						
						<div class="col-lg-1 sm-noshow">
						<div class="user-name">
                                <div class="user"><?php echo get_avatar($comment, 50); ?></div>
                            </div>
						</div>
						<div class="col-lg-11 col-md-12 col-sm-12">
						<div class="dialog">
								<h3 class="m-0 bold author_info"><?php comment_author(); ?></h3>
                                <p class="m-0 bold author_info"><span class="comment_time"><?php comment_date("M d 'y");?> <?php  esc_html_e(' at ', 'apparatus');?><?php comment_time(); ?></span></p>
							<div class="comment-meta author_info">
							<?php comment_reply_link(array_merge( $args, array(
							'reply_text' => '<i class="fas fa-reply"></i>',
							'depth' => $depth, 
							'max_depth' => $args['max_depth']
							))); ?>
							</div>
                                <div class="light thin mb-10 mt-30"><?php comment_text()?></div>
                            </div>
						</div>
						</div>

                        </div>
                    </div>

	</article>
	<!-- #comment-## -->

	<?php
	}
}

/*******************
Comment form styling
*******************/
if ( ! function_exists( 'apparatus_modify_comment_fields' ) ) {
	function apparatus_modify_comment_fields($fields) {

    $fields['fields'] = '<div class="row"><div class="col-sm-6"><div class="form-group">
                      <input type="text" id="author" name="author"  placeholder="'.esc_attr__("Name*", "apparatus").'"';
	$n_value = '';
	$e_value = '';

	$fields['fields'] .= ' value="'.esc_attr($n_value).'" aria-required="true" /></div></div>
						  <div class="col-sm-6"><div class="form-group">';
    $fields['fields'] .= '<input type="email" id="email_address" name="email"  placeholder="'.esc_attr__("Email*", "apparatus").'" value="'.esc_attr($e_value).'" aria-required="true" /></div></div>';
	return $fields;
	}
}

add_filter('comment_form_defaults', 'apparatus_modify_comment_fields');//Name, Email and Website fields customization filter

if ( !is_user_logged_in() ) { 
if ( ! function_exists( 'apparatus_comment_field' ) ) {
	function apparatus_comment_field($arg) {
  
	$arg['comment_field'] = '
								<div class="col-sm-12"><div class="form-group">
								<textarea name="comment" id="comment" rows="10"  placeholder="'.esc_attr__("Your Comment", "apparatus").'"></textarea></div></div>
							 ';    
	return $arg;
	}
}
add_filter('comment_form_defaults', 'apparatus_comment_field');//Text area customization filter
} else {
if ( ! function_exists( 'apparatus_comment_field' ) ) {
	function apparatus_comment_field($arg) {
  
	$arg['comment_field'] = '
								<div class="col-sm-12 ml15 xs-tcenter"><div class="form-group">
								<textarea name="comment" id="comment" rows="10"  placeholder="'.esc_attr__("Your Comment", "apparatus").'"></textarea></div></div>
							 ';    
	return $arg;
	}
}
add_filter('comment_form_defaults', 'apparatus_comment_field');//Text area customization filter
}

if ( !is_user_logged_in() ) {
function apparatus_comment_form_submit_button($button) {
	$button =
		'
            <div class="col-sm-6 xs-tcenter">
                 <button name="submit" type="submit" id="[args:id_submit]" value="[args:label_submit]" class="button  bg-color-1">'.esc_html__("Post Comment", "apparatus").'</button>
            </div> <!-- End col-sm-6 -->
			</div><!--End row--><p>
         ';// .
		//get_comment_id_fields();
	return $button;
}
add_filter('comment_form_submit_button', 'apparatus_comment_form_submit_button');//Submit button customization filter
} else {
function apparatus_comment_form_submit_button($button) {
	$button =
		'
            <div class="col-sm-6 row xs-tcenter">
                 <button name="submit" type="submit" id="[args:id_submit]" value="[args:label_submit]" class="button  bg-color-1">'.esc_html__("Post Comment", "apparatus").'</button>
            </div> <!-- End col-sm-6 --><p>
         ';// .
		//get_comment_id_fields();
	return $button;
}
add_filter('comment_form_submit_button', 'apparatus_comment_form_submit_button');//Submit button customization filter
}

function apparatus_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;

return $fields;
}
add_filter( 'comment_form_fields', 'apparatus_move_comment_field_to_bottom' );//move the comment text field to the bottom