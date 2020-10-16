<?php 
$allowed_html_array = array(
					'b' => array(),
					'br' => array(),
					'span' => array('class' => array()),
					);	

					if (have_posts()) :  while (have_posts()) : the_post(); 					
					if( !empty($second_title) ) {
					$second_title = get_post_meta( get_the_ID(), 'apparatus_post_second_title', true );	
					} else {
					$second_title = ''.esc_html__( 'Blog Details', 'apparatus' ).'';
					}
					endwhile; endif;
					$header_class = '';
					if(isset(apparatus_get_option('apparatus_single_post_header_sec_bg_img')['url'] ) && !empty(apparatus_get_option('apparatus_single_post_header_sec_bg_img')['url'])) {
					   $header_class = ' style="background-image:url(';
					   $header_class .= esc_url( apparatus_get_option('apparatus_single_post_header_sec_bg_img')['url'] );
					   $header_class .= ')"';
					}
					$h1_title = '';
					$apparatus_description = get_bloginfo( 'description', 'display' );
					if(!empty($second_title) && !empty( $apparatus_description ) && (!empty(apparatus_get_option('apparatus_single_post_header_sec_btn_two_label')))) {
						$h1_title = '<p class="white p-header">';
					   $h1_title .= wp_kses($second_title,$allowed_html_array);
					  if ( $apparatus_description || is_customize_preview() ) :
					   $h1_title .= ' <span class="thin xs-noshow">- ';
					   $h1_title .= $apparatus_description;
					   $h1_title .= '</span>';
					  endif;
					   $h1_title .= '</p>';
				   } else {
						$h1_title = '<p class="white p-header">';
					   $h1_title .= wp_kses($second_title,$allowed_html_array);
					   $h1_title .= '</p>';
					}
						
?>
<?php if(apparatus_get_option('apparatus_single_post_header_section_switch') == 1) { ?>      
	   <!-- Header -->
		<header class="header-blog bg-animation<?php if(apparatus_get_option('apparatus_single_post_breadcrumb_section') == 1 && !(is_front_page())) { ?> section-head<?php } ?>" <?php echo $header_class; //escaped already ?>>
            <div class="container">
                <div class="row header-row">
					<?php if(apparatus_get_option('apparatus_single_post_breadcrumb_section') == 1 && !(is_front_page())){ ?>
					<!-- =-=-=-=-=-=-= PAGE BREADCRUMB SECTION =-=-=-=-=-=-= -->
					  <?php if (function_exists('apparatus_page_breadcrumb_function')) apparatus_page_breadcrumb_function(); ?>
					<!-- =-=-=-=-=-=-= PAGE BREADCRUMB SECTION END =-=-=-=-=-=-= -->
					<?php } else { ?>
                    <!-- Main title -->
                    <div class="col align-self-center main-title">
						<?php echo $h1_title; //escaped already ?>
					<?php if(!empty(apparatus_get_option('apparatus_single_post_header_sec_btn_two_label'))) { ?>  
                        <a class="white-link" href="<?php echo esc_url( apparatus_get_option('apparatus_single_post_header_sec_btn_two_url') ); ?>"><?php echo esc_attr( apparatus_get_option('apparatus_single_post_header_sec_btn_two_label') ); ?> <i class="fas fa-chevron-right"></i></a>
					<?php } ?>	
                    </div>
					<?php } ?>
                    <!-- Main title end -->
                </div>
            </div>
        </header>
        <!-- Header end -->    
<?php } ?>
        <!-- Blog post -->
        <section class="blog <?php if(apparatus_get_option('apparatus_single_post_breadcrumb_section') == 1 && !(is_front_page())) { ?>p-75-60<?php } else { ?>p-90-70<?php } ?> single-layout-one">
            <div class="container">
                <div class="row">
				<div class="col-12 col-md-12 post-text mb-30 <?php if(apparatus_get_option('apparatus_single_post_style') == 2) { if( is_active_sidebar( 'apparatus_sidebar_widgets' ) ) { ?>col-lg-9<?php } else { ?>col-lg-12<?php } } else { ?>col-lg-12<?php } ?>">
				<?php if (have_posts()) :  while (have_posts()) : the_post(); 
					$apparatus_global_numpages = apparatus_get_global_numpages();
					$apparatus_global_post = apparatus_get_global_post();
					$postid = $apparatus_global_post->ID;
					$get_image = esc_url( wp_get_attachment_url( get_post_thumbnail_id($postid) ) );
					$get_the_title   = get_the_title();				
				?>				
                    <div <?php post_class( 'blog-single-post blog-mr-10' ); ?> id="post-<?php the_ID(); ?>">						
						
						<?php if(apparatus_get_option('apparatus_single_post_style') == 2) { ?>
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="aligncenter st-two-ft_image">
								<?php the_post_thumbnail(); ?>
								</div>
							<?php } ?>
						<?php } ?>
                        <!-- Post title end -->
						<div class="single-mainpost">
						<?php if(apparatus_get_option('apparatus_single_post_style') == 1) { ?>
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="alignleft nofloat">
								<?php the_post_thumbnail(); ?>
								</div>
							<?php } ?>
						<?php } ?>
						<div class="section-title sm-ac">
						<?php if(!empty($get_the_title)) { ?> 
                            <h1><?php the_title(); ?></h1>
						<?php } ?>	
                        </div>
						<?php if (apparatus_get_option('apparatus_blog_single_meta_tags') == 1) { ?>
							<div class="meta-option clearfix">
							<ul class="info pull-left">
								<li><i class="fas fa-user"></i><a href="<?php echo esc_url(get_the_author_posts_link() ); ?>"><?php esc_html_e('By', 'apparatus'); ?>  <?php the_author(); ?></a></li>
								<li><i class="fas fa-calendar"></i><a href="<?php the_permalink(); ?>"><?php the_date(get_option('date_format')); ?></a></li>
								<?php if(apparatus_get_option('apparatus_blog_single_comments_meta') == 1) { ?>
								<li><i class="fas fa-comments"></i><a href="<?php echo esc_url(get_comments_link() ); ?>"><?php echo get_comments_number(); ?> <?php esc_html_e('comments', 'apparatus'); ?></a></li>
								<?php } ?>
							</ul>
							<?php
									$posttags = get_the_tags();
									$postcategories = get_the_category();
									$tag_cat_class = '';
									$count = 0;
									$cat_count = 0;
									
									if ($posttags) {									  
									  foreach($posttags as $tag) {
										$count++;										
									  }										
									} if ($postcategories) {									  
									  foreach($postcategories as $cats) {
										$cat_count++;										
									  }										
									}
									
									$tag_and_cat_total = $count + $cat_count;
									
									if( $tag_and_cat_total > 5 ) {
										$tag_cat_class = ' fl_inherit';
									} else {
										$tag_cat_class = '';
									}
							?>
							<?php if(has_tag() || has_category()) { ?>
							<ul class="tags pull-right<?php echo esc_attr($tag_cat_class); ?>">
								<?php if(has_tag()) { ?>
								<li><i class="fas fa-tags"></i><?php the_tags( '', ', ' ); ?>
								</li>    
								<?php } if(has_category()) { ?>
								<li><i class="fas fa-tags"></i><?php the_category( ', ' ); ?>
								</li>
								<?php } ?>
							</ul>
							<?php } ?>
							</div>
						<?php } ?>
                        <?php the_content(); ?>
						<div class="clearfix"></div>
						<?php
							 wp_link_pages( array(
								'before'      => '<div class="page-links page-numbers"><span class="page-links-title">' . esc_html__( 'Pages:', 'apparatus' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span class="linkstyle">',
								'link_after' => '</span>',
								'pagelink'    => '%',
								'separator'   => '',
							) );
						?>
						</div>
                    </div>
					<?php if (apparatus_get_option('apparatus_single_post_single_next_posts') == 1) { ?>
					<div class="meta-option next_prev clearfix">
                        <!--Posts Nav-->
						<?php
							$prevPost = get_previous_post(true);
							$nextPost = get_next_post(true);
							if((!empty($prevPost)) || (!empty($nextPost))){
						?>
						<div class="posts-nav">
							<div class="clearfix">
								<?php $prevPost = get_previous_post(true);
									if($prevPost) {
										$args = array(
											'posts_per_page' => 1,
											'include' => $prevPost->ID
										);
										$prevPost = get_posts($args);
										foreach ($prevPost as $post) {
											setup_postdata($post);
								?>
								<div class="pull-left">
									<a href="<?php the_permalink(); ?>" rel="prev"><div class="prev-post<?php if (apparatus_get_option('apparatus_single_post_next_prev_shadow') == 2) { ?> the-shadow-on<?php } ?>"><span class="fas fa-long-arrow-alt-left"></span> &nbsp;&nbsp;&nbsp; <?php esc_html_e('Prev Post', 'apparatus'); ?></div></a>								
								</div>
								<?php
							wp_reset_postdata();
									} //end foreach
								} // end if
								 
								$nextPost = get_next_post(true);
								if($nextPost) {
									$args = array(
										'posts_per_page' => 1,
										'include' => $nextPost->ID
									);
									$nextPost = get_posts($args);
									foreach ($nextPost as $post) {
										setup_postdata($post);
							?>
								<div class="pull-right">
									<a href="<?php the_permalink(); ?>" rel="next"><div class="next-post<?php if (apparatus_get_option('apparatus_single_post_next_prev_shadow') == 2) { ?> the-shadow-on<?php } ?>"><?php esc_html_e('Next Post', 'apparatus'); ?> &nbsp;&nbsp;&nbsp; <span class="fas fa-long-arrow-alt-right"></span> </div></a>								
								</div>  
							<?php
							wp_reset_postdata();
									} //end foreach
								} // end if
							?>
							</div>
						</div>
                        <?php } ?>
                    </div>
					<?php } ?>
			<?php endwhile; endif; ?>		
			<div class="clearfix"></div>	
		  <div class="col-md-12 nopadding<?php if ( !have_comments() && !comments_open() ) : ?> mb-m30<?php endif; ?>">
			<?php comments_template( '', true ); ?>
		  </div>
		  
                </div>
				<?php if(apparatus_get_option('apparatus_single_post_style') == 2) { 
				 get_sidebar(); } 
				 ?>
                </div>
            </div>
        </section>
        <!-- Blog post end -->