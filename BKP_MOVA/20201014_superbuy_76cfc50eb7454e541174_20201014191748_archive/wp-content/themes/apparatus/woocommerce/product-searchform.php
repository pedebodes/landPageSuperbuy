<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

				<div class="widget-content">
                  <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
                    <div class="input-group">
                      <input type="search" id="woocommerce-product-search-field" class="form-control" placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'apparatus' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search Here', 'label', 'apparatus' ); ?>" />
                      <span class="input-group-btn">
                        <button id="searchsubmit" class="btn" type="submit"><i class="fa fa-search"></i></button>
                      </span>
					  <input type="hidden" name="post_type" value="product" />
                    </div>
                  </form>
                </div>
