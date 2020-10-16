<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews" class="product-reviews">

	<?php if ( have_comments() ) : ?>

		<div class="pr-comment center-content">
			<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
		</div>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			echo '<nav class="woocommerce-pagination">';
			paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
				'prev_text' => '&larr;',
				'next_text' => '&rarr;',
				'type'      => 'list',
			) ) );
			echo '</nav>';
		endif; ?>

	<?php else : ?>
	<h5>
	<?php
		esc_html_e( 'No Reviews Yet!', 'apparatus' );
	?>
	</h5>
	<?php endif; ?>
	<div class="gap-40"></div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>

		<div class="post-review">
			<?php
				$commenter = wp_get_current_commenter();			
				
				$comment_form = array(
					'title_reply'          => have_comments() ? esc_html__( 'Product review', 'apparatus' ) : sprintf( esc_html__( 'Product Review', 'apparatus' ), '' ),
					'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'apparatus' ),
					'comment_notes_after'  => '',
					'fields'               => array(
						'author' => '<div class="clearfix"></div>
									<div class="row">
										<div class="col-sm-6">
											<input type="text" placeholder="' . esc_attr__( 'Full Name', 'apparatus' ) .'" id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" aria-required="true" required>
										</div>',
						'email'  => '<div class="col-sm-6">
							            	<input placeholder="' . esc_attr__( 'Email Address', 'apparatus' ) .'" id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" aria-required="true" required />
							            </div>
						            </div>',
					),
					'label_submit'  => esc_html__( 'Post Review', 'apparatus' ),
					'logged_in_as'  => '',
					'comment_field' => ''
				);	

				$comment_form['comment_field'] = '<textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Review', 'apparatus' ) .'" aria-required="true" required></textarea></p>';
				
				if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
					$comment_form['must_log_in'] = '<p class="must-log-in">' .  sprintf( esc_html__( 'You must be <a href="%s">logged in</a> to post a review.', 'apparatus' ), esc_url( $account_page_url ) ) . '</p>';
				}

				if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
					$comment_form['comment_field'] .= '<p class="comment-form-rating"><label for="rating">' . esc_html__( 'Ratings', 'apparatus' ) .'</label><select name="rating" id="rating" aria-required="true" required>
						<option value="">' . esc_html__( 'Rate&hellip;', 'apparatus' ) . '</option>
						<option value="5">' . esc_html__( 'Perfect', 'apparatus' ) . '</option>
						<option value="4">' . esc_html__( 'Good', 'apparatus' ) . '</option>
						<option value="3">' . esc_html__( 'Average', 'apparatus' ) . '</option>
						<option value="2">' . esc_html__( 'Not that bad', 'apparatus' ) . '</option>
						<option value="1">' . esc_html__( 'Very Poor', 'apparatus' ) . '</option>
					</select></p>';
				}
				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
			?>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'apparatus' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>