<?php
/**
 * The template for displaying Comments.
 */

if ( post_password_required() )
	return;
?>


	<?php // You can start editing here -- including this comment! ?>
		   <div id="comments-section"<?php if ( !have_comments() && !comments_open() ) : ?> class="noshow"<?php endif; ?>>
                <div id="comments" class="comments<?php if ( !have_comments() ) : ?> nopadding<?php endif; ?>">

	<?php if ( have_comments() ) : ?>
                
               <div class="comments-section-div">
                <h4 class="heading-comments-section">
					<span><?php comments_number(esc_html__('No Comment Yet', 'apparatus'), esc_html__('1 Comment', 'apparatus'), esc_html__('% Comments', 'apparatus') );?></span>
				</h4>
              </div>
					
				<ul class="comments-list">
					<?php wp_list_comments( array( 'callback' => 'apparatus_comment' ) ); ?>
				</ul><!-- .commentlist -->
				<div class="clearfix"></div>
		  
				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
					<nav class="navigation comment-navigation" role="navigation">
						<div class="nav-links">
							<?php
							if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'apparatus' ) ) ) {
								printf( '<div class="nav-previous">%s</div>', $prev_link );
							}
							if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'apparatus' ) ) ) {
								printf( '<div class="nav-next">%s</div>', $next_link );
							}
							?>
						</div>
					</nav>
				<?php endif; ?>

				<?php
				/* If there are no comments and comments are closed, let's leave a note.
				 * But we only want the note on posts and pages that had comments in the first place.
				 */
				if ( ! comments_open() ) : ?>
					<h4 class="comment-field-heading"><?php esc_html_e( 'Comments are closed' , 'apparatus' ); ?></h4>
				<?php endif; ?>
			 
	<?php endif; // have_comments() ?>
	<?php if ( comments_open() ) : ?>
		<div id="responding" class="<?php if ( is_user_logged_in() ) { ?>mb-m50<?php } else { ?>mb-m30<?php } ?>">
			<?php comment_form(array(
			'title_reply' => esc_html__( 'Leave A Comment' , 'apparatus' ),
			'title_reply_before' => '<h4 class="comment-field-heading">',
			'title_reply_after' => '</h4>',
			)); ?>		
		</div><!--#respond end-->
	<?php endif; ?>
	</div><!--#comments-section end-->
	</div><!--#comments end-->