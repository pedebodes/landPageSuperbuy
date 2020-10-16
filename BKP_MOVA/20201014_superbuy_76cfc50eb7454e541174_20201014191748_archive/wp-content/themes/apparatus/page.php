<?php
/**
 * The default page of this theme
 */
get_header();
?>
<?php 
$allowed_html_array = array(
					'b' => array(),
					'br' => array(),
					'span' => array('class' => array()),
					);
?>
<?php if(apparatus_get_option('apparatus_single_page_header_section_switch') == 1) { ?>      
	   <!-- Header -->
		<header class="header-blog bg-animation" <?php if(isset(apparatus_get_option('apparatus_single_page_header_sec_bg_img')['url'] ) && !empty(apparatus_get_option('apparatus_single_page_header_sec_bg_img')['url'])) { ?> style="background-image:url(<?php echo esc_url( apparatus_get_option('apparatus_single_page_header_sec_bg_img')['url'] ); ?>)"<?php } ?>>
            <div class="container">
                <div class="row header-row">
                    <!-- Main title -->
                    <div class="col align-self-center main-title">
					<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
                        <?php 
						$get_the_title   = get_the_title();
						if(!empty($get_the_title)) {
						?> 
						<h1 class="white lmb-0"><?php echo esc_attr($get_the_title) ?></h1>
						<?php } ?>
					<?php endwhile; endif; ?>	
                	<?php if(!empty(apparatus_get_option('apparatus_single_page_header_sec_btn_one_label'))) { ?>       
                        <!-- Buttons -->
                        <a href="<?php echo esc_url( apparatus_get_option('apparatus_single_page_header_sec_btn_one_url') ); ?>">
                            <div class="button bg-color-1"><?php echo esc_attr( apparatus_get_option('apparatus_single_page_header_sec_btn_one_label') ); ?></div>
                        </a>
					<?php } ?>	
					<?php if(!empty(apparatus_get_option('apparatus_single_page_header_sec_btn_two_label'))) { ?>  
                        <a class="white-link" href="<?php echo esc_url( apparatus_get_option('apparatus_single_page_header_sec_btn_two_url') ); ?>"><?php echo esc_attr( apparatus_get_option('apparatus_single_page_header_sec_btn_two_label') ); ?> <i class="fas fa-chevron-right"></i></a>
					<?php } ?>	
                    </div>
                    <!-- Main title end -->
                </div>
            </div>
        </header>
        <!-- Header end -->    
<?php } ?>

<?php if ( ( class_exists( 'woocommerce' ) ) && ( (is_shop()) || (is_product_category()) || (is_product_tag()) || (is_product()) || (is_cart()) || (is_checkout()) ) ) { ?> 
 <section class="blog p-70-70 dflt-page single-layout-one">
	<div class="container">
		<div class="row">
			<div class="col-md-12 left-padd0">
				<div class="col-md-12">
					<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>
 </section>
 <?php } else { // Not WooCommerce Page ?>
 <section class="blog p-70-70<?php if ( !have_comments() && !comments_open() ) : ?> make-lastp<?php endif; ?> dflt-page single-layout-one">
    <div class="container">
      <div class="rowplr-15">
        <div class="col-12 col-md-12<?php if ( class_exists( 'woocommerce' ) && (is_woocommerce() || is_cart() || is_checkout()) ) { ?> left-padd0<?php } ?>">
			
				<?php if (have_posts()) :  while (have_posts()) : the_post(); 
					$apparatus_global_post = apparatus_get_global_post();
					$postid = $apparatus_global_post->ID;
					$get_image = esc_url( wp_get_attachment_url( get_post_thumbnail_id($postid) ) ); 
				?>
		<!-- post grid -->
		
        <div <?php post_class( 'apparatus-post-block' ); ?> id="post-<?php the_ID(); ?>">
			<!-- image grid -->
			<?php if ( $get_image ) : ?>
			<div class="col-12 col-md-12 nopadding">
				<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $get_image ); ?>" alt="<?php esc_attr_e('image', 'apparatus'); ?>" class="img-responsive"/></a>
			</div>
			<div class="clearfix"></div>
			<br/><br/>
			<?php endif; ?>
			<!-- image grid end -->
			<div class="col-12 col-md-12 nopadding">
				<div class="text-box">
					<?php the_content(); ?>
					<?php
						 wp_link_pages( array(
							'before'      => '<div class="clearfix"></div><div class="page-links page-numbers"><span class="page-links-title">' . esc_html__( 'Pages:', 'apparatus' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span class="linkstyle">',
							'link_after' => '</span>',
							'pagelink'    => '%',
							'separator'   => '',
						) );
					?>
				</div>
			</div>
		</div>
		<?php endwhile; endif; ?>
		<div class="clearfix"></div>	
		  <div class="col-md-12 nopadding">
			<?php comments_template( '', true ); ?>
		  </div>
						
	  </div>
    </div>
    </div>
  </section>
  <?php if(apparatus_get_option('apparatus_single_page_newsletter_switch') == 1) { ?> 		
        <!-- Newsletter Section Start-->
        <section class="call-to-action bg-animation p-90-60 newsletter_section" <?php if(!empty(apparatus_get_option('apparatus_single_page_newsletter_sec_bg_img'))) { ?> style="background-image:url(<?php echo esc_url( apparatus_get_option('apparatus_single_page_newsletter_sec_bg_img')['url'] ); ?>)"<?php } ?>>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7 align-self-center mb-30">
                        <!-- Section title -->
                        <div class="section-title">
						<?php if(!empty(apparatus_get_option('apparatus_single_page_newsletter_headline_one'))) { ?>
                            <p class="white-light bold small"><?php echo esc_attr( apparatus_get_option('apparatus_single_page_newsletter_headline_one') ); ?></p>
						<?php } ?>	
						<?php if(!empty(apparatus_get_option('apparatus_single_page_newsletter_headline_two'))) { ?>						
                            <h2 class="h1 white"><?php echo wp_kses(apparatus_get_option('apparatus_single_page_newsletter_headline_two'),$allowed_html_array) ?></h2>
						<?php } ?>	
						<?php if(!empty(apparatus_get_option('apparatus_single_page_newsletter_headline_three'))) { ?>						
                            <p class="white-light thin m-0"><?php echo esc_attr( apparatus_get_option('apparatus_single_page_newsletter_headline_three') ); ?></p>
						<?php } ?>	
                        </div>
                        <!-- Section title end -->
                    </div>
                    <div class="col-12 col-lg-5 align-self-center mb-30">
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

	<?php } if(apparatus_get_option('apparatus_cat_single_page_switch') == 1) { ?> 	
        <!-- Categorised Blog Start -->
        <section class="blog p-90-60">
            <div class="container">
                <!-- Section title -->
                <div class="section-title sm-ac mb-90">
				<?php if(!empty(apparatus_get_option('apparatus_cat_single_page_headline_one'))) { ?>
                    <p class="light bold small"><?php echo esc_attr( apparatus_get_option('apparatus_cat_single_page_headline_one') ); ?></p>
				<?php } ?>	
				<?php if(!empty(apparatus_get_option('apparatus_cat_single_page_headline_two'))) { ?>				
                    <h2><?php echo wp_kses(apparatus_get_option('apparatus_cat_single_page_headline_two'),$allowed_html_array) ?></h2>
				<?php } ?>		
				<?php if(!empty(apparatus_get_option('apparatus_cat_single_page_headline_three'))) { ?>				
                    <p class="light thin"><?php echo esc_attr( apparatus_get_option('apparatus_cat_single_page_headline_three') ); ?></p>
				<?php } ?>						
                </div>
                <!-- Section title end -->
                <div class="row n-paddings">
			<?php 
			if(!empty(apparatus_get_option('apparatus_cat_single_page_post_no'))){
				$post_per_page = apparatus_get_option('apparatus_cat_single_page_post_no');
			}else{
				$post_per_page='3';
			}	
			if(!empty(apparatus_get_option('apparatus_cat_single_page_category'))){
				$cat_id = apparatus_get_option('apparatus_cat_single_page_category');
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
					$d = '';
					if(empty($get_image)) {
						$d = 'nimg-row';
					}
					if(is_sticky()) { 
						$sticky = 'sticky';
					} else {
						$sticky = '';
					}
				?>									
                    <div <?php post_class( 'col-12 col-lg-4 mb-48 mlr-24 '.$sticky.'' ); ?>>
                        <!-- Blog card -->
                        <a href="<?php the_permalink(); ?>">
                            <div class="blog-card <?php echo esc_attr($d); ?>">
							<?php if(!empty($get_image)) { ?>
                                <div class="blog-frame">
                                    <div class="more-tooltip bg-color-1"><i class="fas fa-link"></i></div>
                                    <div style="background-image:url(<?php echo esc_url( $get_image ); ?>);" class="img"></div></div>
							<?php } ?>	
                                <div class="blog-description<?php if(empty($get_image)) { ?> deflt-noimage<?php } else { ?> deflt-image<?php } ?>">
                                    <p class="bold dark"><?php the_title(); ?></p>
                                    <p class="light thin">
					<?php if ( has_post_format( 'video' ) ) : ?>
						<?php the_content(); ?>
					<?php else: ?>
						<?php if(empty($get_image)) { ?>
							<?php echo substr($excerpt, 0,120) ?>...
						<?php } else { ?>
							<?php echo substr($excerpt, 0,80) ?>...
						<?php } ?>
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
  <?php } // Not WooCommerce Page END ?>

  <!-- end -->
  <?php get_footer(); ?>