<?php
/**
 * The default single post page of this theme
 */
get_header();
$allowed_html_array = array(
					'b' => array(),
					'br' => array(),
					'span' => array('class' => array()),
					);
?>

	<?php get_template_part( 'blog-templates/single-layout-one', 'apparatus' ); ?>

<?php if(apparatus_get_option('apparatus_single_post_newsletter_switch') == 1) { ?> 		
        <!-- Newsletter Section Start-->
        <section class="call-to-action bg-animation <?php if(apparatus_get_option('apparatus_single_post_breadcrumb_section') == 1 && !(is_front_page())) { ?>p-75-45<?php } else { ?>p-90-60<?php } ?> newsletter_section" <?php if(!empty(apparatus_get_option('apparatus_single_post_newsletter_sec_bg_img'))) { ?> style="background-image:url(<?php echo esc_url( apparatus_get_option('apparatus_single_post_newsletter_sec_bg_img')['url'] ); ?>)"<?php } ?>>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7 align-self-center mb-30">
                        <!-- Section title -->
                        <div class="section-title">
						<?php if(!empty(apparatus_get_option('apparatus_single_post_newsletter_headline_one'))) { ?>
                            <p class="white-light bold small"><?php echo esc_attr( apparatus_get_option('apparatus_single_post_newsletter_headline_one') ); ?></p>
						<?php } ?>	
						<?php if(!empty(apparatus_get_option('apparatus_single_post_newsletter_headline_two'))) { ?>						
                            <h2 class="h1 white"><?php echo wp_kses(apparatus_get_option('apparatus_single_post_newsletter_headline_two'),$allowed_html_array) ?></h2>
						<?php } ?>	
						<?php if(!empty(apparatus_get_option('apparatus_single_post_newsletter_headline_three'))) { ?>						
                            <p class="white-light thin m-0"><?php echo esc_attr( apparatus_get_option('apparatus_single_post_newsletter_headline_three') ); ?></p>
						<?php } ?>	
                        </div>
                        <!-- Section title end -->
                    </div>
                    <div class="col-12 col-lg-5 align-self-center mb-15">
					<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="POST" id="newsletter">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="<?php esc_attr_e('Email', 'apparatus'); ?>" name="email1" id="email">
                            <div class="input-group-append">
                                <button class="btn bg-color-1"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>

                            </div>
							<img src="<?php echo get_template_directory_uri();?>/images/newsletter_loader.gif" class="newsletter-loader" alt="<?php esc_attr_e('loading...', 'apparatus'); ?>" />
                        </div>
					</form>
					<div id="output"></div>											
                    </div>
                </div>
            </div>
        </section>
		<!-- Newsletter Section End -->	
<!-- =-=-=-=-=-=-= Newsletter Without Loading Function =-=-=-=-=-=-= -->
<?php
	if (function_exists('apparatus_newsletter_without_loading')) apparatus_newsletter_without_loading();
?>
<!-- =-=-=-=-=-=-= Newsletter Without Loading Function End =-=-=-=-=-=-= -->	

<?php } if(apparatus_get_option('apparatus_cat_single_post_switch') == 1) { ?> 	
        <!-- Categorised Blog Start -->
        <section class="blog <?php if(apparatus_get_option('apparatus_single_post_breadcrumb_section') == 1 && !(is_front_page())) { ?>p-75-60<?php } else { ?>p-90-70<?php } ?> pplr">
            <div class="container">
                <!-- Section title -->
                <div class="section-title sm-ac mb-60">
				<?php if(!empty(apparatus_get_option('apparatus_cat_single_post_headline_one'))) { ?>
                    <p class="light bold small"><?php echo esc_attr( apparatus_get_option('apparatus_cat_single_post_headline_one') ); ?></p>
				<?php } ?>	
				<?php if(!empty(apparatus_get_option('apparatus_cat_single_post_headline_two'))) { ?>				
                    <h2><?php echo wp_kses(apparatus_get_option('apparatus_cat_single_post_headline_two'),$allowed_html_array) ?></h2>
				<?php } ?>		
				<?php if(!empty(apparatus_get_option('apparatus_cat_single_post_headline_three'))) { ?>				
                    <p class="light thin"><?php echo esc_attr( apparatus_get_option('apparatus_cat_single_post_headline_three') ); ?></p>
				<?php } ?>						
                </div>
                <!-- Section title end -->
                <div class="row n-paddings">
			<?php 
if(!empty(apparatus_get_option('apparatus_cat_single_post_post_no'))){
	$post_per_page = apparatus_get_option('apparatus_cat_single_post_post_no');
}else{
	$post_per_page='3';
}	
if(!empty(apparatus_get_option('apparatus_cat_single_post_category'))){
	$cat_id = apparatus_get_option('apparatus_cat_single_post_category');
}else{
	$cat_id ='';
}		
			$args2 = array(
			'cat'          => $cat_id,
			'posts_per_page'          => $post_per_page,
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'post_status'      => 'publish',	
			);
			
			$query2 = new WP_Query($args2);
			while ( $query2->have_posts() ) : $query2->the_post(); 
					$apparatus_global_post = apparatus_get_global_post();
					$postid = $apparatus_global_post->ID;
					$get_image = wp_get_attachment_url( get_post_thumbnail_id($postid) ); 
					$excerpt   = get_the_excerpt(); 
					if(is_sticky()) { 
						$sticky = 'sticky';
					} else {
						$sticky = '';
					}
				?>									
                    <div <?php post_class( 'col-12 col-lg-4 mb-25 mlr-24 '.$sticky.'' ); ?>>
                        <!-- Blog card -->
                        <a href="<?php the_permalink(); ?>">
                            <div class="blog-card">
							<?php if(!empty($get_image)) { ?>
                                <div class="blog-frame">
                                    <div class="more-tooltip bg-color-1"><i class="fas fa-link"></i></div>
                                    <div style="background-image:url(<?php echo esc_url( $get_image ); ?>);" class="img"></div></div>
							<?php } ?>	
                                <div class="blog-description">
                                    <h2 class="dark"><?php the_title(); ?></h2>
                                    <p class="light thin">
					<?php if ( has_post_format( 'video' ) ) : ?>
						<?php the_content(); ?>
					<?php else: ?>
						<?php echo substr($excerpt, 0,74) ?>...
					<?php endif; ?>
									</p>
                                </div>
                            </div>
                        </a>
                    </div>
			<?php endwhile; ?>	
			<?php wp_reset_postdata(); ?>
			<div class="clearfix"></div>
					
					
                </div>
            </div>
        </section>
        <!-- Categorised Blog end -->	
<?php } ?>
	

  <?php get_footer(); ?>