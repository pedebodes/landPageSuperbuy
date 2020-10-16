<?php
// **********************************************************************// 
// ! Function is_woocommerce_activated
// **********************************************************************//
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}

// **********************************************************************// 
// ! Declare WooCommerce support in third party theme
// **********************************************************************//
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

// *************************************************************************// 
// ! Ensure cart contents update when products are added to the cart via AJAX
// *************************************************************************//
add_filter( 'woocommerce_add_to_cart_fragments', 'apparatus_woocommerce_header_add_to_cart_fragment' );
function apparatus_woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
	<span class="apparatus_cart_count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
	<?php
	
	$fragments['span.apparatus_cart_count'] = ob_get_clean();
	
	return $fragments;
}


// **********************************************************************// 
// ! Customizing image of product loop
// **********************************************************************//
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
/**
 * WooCommerce Loop Product Thumbs
 **/
 if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
	function woocommerce_template_loop_product_thumbnail() {
		echo woocommerce_get_product_thumbnail();
	} 
 }
/**
 * WooCommerce Product Thumbnail
 **/
 if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {
	
	function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $deprecated1 = 0, $deprecated2 = 0 ) {
		global $post;
		global $product;
		$image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );

		if ( has_post_thumbnail() ) {
			$props = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
			$output = '<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="menu-card">
            <div class="m-bottom2"><a href="' . get_the_permalink() . '">';
			$output .= get_the_post_thumbnail( $post->ID, $image_size, array(
				'title'	 => $props['title'],
				'alt'    => $props['alt'],
			) );
			$output .= '</a></div>
            ';
			return $output;
		} elseif ( wc_placeholder_img_src() ) {
			return wc_placeholder_img( $image_size );
		}
	}
 }

// **********************************************************************// 
// ! Editng the Place of Sale Badge
// **********************************************************************//
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 20 );
 
// **********************************************************************// 
// ! Editng Loop Rating
// **********************************************************************//
function wc_apparatus_get_rating_html( $rating, $count = 0 ) {
	global $product;
	if ( 0 < $rating ) {
		$html  = '<div class="star-rating" title="'.$product->get_average_rating().''.esc_attr__(' out of 5.00', 'apparatus').'">';
		$html .= wc_get_star_rating_html( $rating, $count );
		$html .= '</div>';
	} else {
		$html  = '<div class="star-rating" title="'.esc_attr__('No Rating Yet', 'apparatus').'">';
		$html .= wc_get_star_rating_html( $rating, $count );
		$html .= '</div>';
	}

	return apply_filters( 'woocommerce_product_get_rating_html', $html, $rating, $count );
}

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
function woocommerce_template_loop_rating() {
	global $product;

	if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
		return;
	}

	echo wc_apparatus_get_rating_html( $product->get_average_rating() );
}

// **********************************************************************// 
// ! Customizing category product of loop
// **********************************************************************//
 remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );
 
 add_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );
 function woocommerce_template_loop_category_title( $category ) {
 ?>
		<div class="menu-items">
			<h3 class="font-bold font-black">
			<a href="<?php echo get_term_link( $category, 'product_cat' ); ?>"><?php echo esc_attr( $category->name ); ?><?php if ( $category->count > 0 )
								echo apply_filters( 'woocommerce_subcategory_count_html', ' <span class="count padding_point2">(' . $category->count . ')</span>', $category ); ?></a>
			</h3>
		</div>
		<div class="button full-wid left m-top2"><a href="<?php echo get_term_link( $category, 'product_cat' ); ?>" class="btn boxed-color-xs uppercase font-bold"><?php esc_html_e('View Details', 'apparatus'); ?></a></div>
<?php
}

// **********************************************************************// 
// ! Customizing single product rating position
// **********************************************************************//
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 30 );

// **********************************************************************// 
// ! Customizing woocommerce breadcrumb
// **********************************************************************//
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
add_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	function woocommerce_breadcrumb( $args = array() ) {
		$args = wp_parse_args( $args, apply_filters( 'woocommerce_breadcrumb_defaults', array(
				'delimiter'   => '<li class="separator separator-home">/</li>',
				'wrap_before' => '<ul id="bcrumbs" class="bcrumbs">',
				'wrap_after'  => '</ul>',
				'before'      => '<li class="woo-crumbs">',
				'after'       => '</li>',
				'home'        => _x( 'Home', 'breadcrumb', 'apparatus' )
			) ) );

			$breadcrumbs = new WC_Breadcrumb();

			if ( ! empty( $args['home'] ) ) {
				$breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
			}

			$args['breadcrumb'] = $breadcrumbs->generate();

			wc_get_template( 'global/breadcrumb.php', $args );
	}