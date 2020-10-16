<?php 
$allowed_html_array = array(
					'b' => array(),
					'br' => array(),
					'span' => array('class' => array()),
					);
	if(apparatus_get_option('apparatus_blog_header_section_switch') == 1) {
	   //Rules
	   $header_class = '';
	   $h1_title = '';
	   $blog_tclass = '';
	   $apparatus_site_title = get_bloginfo( 'name', 'display' );
	   $apparatus_description = get_bloginfo( 'description', 'display' );
	   $apparatus_blog_title = get_the_title( get_option('page_for_posts', true) );
	   if(empty($apparatus_blog_title)) {
	   $apparatus_blog_title = ''.esc_html__( 'Our Blog', 'apparatus' ).'';
	   } else {
	   $apparatus_blog_title = $apparatus_blog_title;
	   }
	   if(isset(apparatus_get_option('apparatus_blog_header_sec_bg_img')['url'] ) && !empty(apparatus_get_option('apparatus_blog_header_sec_bg_img')['url'])) {
	   $header_class = ' style="background-image:url(';
	   $header_class .= esc_url( apparatus_get_option('apparatus_blog_header_sec_bg_img')['url'] );
	   $header_class .= ')"';
	   }
	   if(!empty(apparatus_get_option('apparatus_blog_header_sec_title'))) {
	   $h1_title = '<h1 class="white">';
	   $h1_title .= wp_kses(apparatus_get_option('apparatus_blog_header_sec_title'),$allowed_html_array);
	   $h1_title .= '</h1>';
	   } if (is_search()) {
	   $h1_title = '<h1 class="white"><span class="thin">';
	   $h1_title .= esc_html__('Search Results for ', 'apparatus');
	   $h1_title .= '</span>"';
	   $h1_title .= get_search_query();
	   $h1_title .= '"</h1>';
	   } if (is_archive()) {
		   $h1_title = '<h1 class="white">';
		   if ( is_day() ) :
			   $h1_title .= esc_html__('Daily Archives: ', 'apparatus');
			   $h1_title .= '<span class="thin">';
			   $h1_title .= get_the_date();
		   elseif ( is_month() ) :
			   $h1_title .= esc_html__('Monthly Archives: ', 'apparatus');
			   $h1_title .= '<span class="thin">';
			   $h1_title .= get_the_date( _x( 'F Y', 'monthly archives date format', 'apparatus' ) );
		   elseif ( is_year() ) :
			   $h1_title .= esc_html__('Yearly Archives: ', 'apparatus');
			   $h1_title .= '<span class="thin">';
			   $h1_title .= get_the_date( _x( 'Y', 'yearly archives date format', 'apparatus' ) );
		   elseif ( is_tag() ) :
			   $h1_title .= esc_html__('Tag', 'apparatus');
			   $h1_title .= '<span class="thin">';
			   $h1_title .= esc_html__(' Archives', 'apparatus');
		   elseif ( is_category() ) :
			   $h1_title .= esc_html__('Articles From ', 'apparatus');
			   $h1_title .= '<span class="thin">';
			   $h1_title .= single_cat_title('', false);
		   elseif ( is_author() ) :
			   $h1_title .= esc_html__('Articles Posted by ', 'apparatus');
			   $h1_title .= '<span class="thin">';
			   $h1_title .= get_the_author;
		   endif;
		   $h1_title .= '</span></h1>';
	   } if (is_search() || is_archive() || is_category() || is_tag() || is_author()) {
		   $blog_tclass = 'noshow';
	   }
	   if(empty(apparatus_get_option('apparatus_blog_header_sec_title')) && is_home() && !is_front_page()) {
			$h1_title = '<h1 class="white">';
		   $h1_title .= esc_html__('Read From ', 'apparatus');
		   $h1_title .= '<span class="thin">';
		   $h1_title .= '- '.esc_html__( 'Our Latest', 'apparatus' ).' '.$apparatus_blog_title.'';
		   $h1_title .= '</span></h1>';
	   }
	   if(empty(apparatus_get_option('apparatus_blog_header_sec_title')) && is_home() && is_front_page() && !empty( $apparatus_site_title )) {
			$h1_title = '<h1 class="white">';
		   $h1_title .= $apparatus_site_title;
		   $h1_title .= '</h1>';
	   }
	   ?>
		<header class="header-blog<?php if(apparatus_get_option('apparatus_blog_page_breadcrumb_section') == 1 && !(is_front_page())) { ?> section-head<?php } ?> bg-animation"<?php echo $header_class; //escaped already ?>>
            <div class="container">
                <div class="row header-row">
					<?php if(apparatus_get_option('apparatus_blog_page_breadcrumb_section') == 1 && !(is_front_page())){ ?>
					<!-- =-=-=-=-=-=-= PAGE BREADCRUMB SECTION =-=-=-=-=-=-= -->
					  <?php if (function_exists('apparatus_page_breadcrumb_function')) apparatus_page_breadcrumb_function(); ?>
					<!-- =-=-=-=-=-=-= PAGE BREADCRUMB SECTION END =-=-=-=-=-=-= -->
					<?php } else { ?>
                    <!-- Main title -->
                    <div class="col align-self-center main-title">
                        <?php echo $h1_title; //escaped already ?>
					<?php if(!empty(apparatus_get_option('apparatus_blog_header_sec_btn_two_label'))) { ?>  
                        <a class="white-link" href="<?php echo esc_url( apparatus_get_option('apparatus_blog_header_sec_btn_two_url') ); ?>"><?php echo esc_attr( apparatus_get_option('apparatus_blog_header_sec_btn_two_label') ); ?> <i class="fas fa-chevron-right"></i></a>
					<?php } ?>	
                    </div>
                    <!-- Main title end -->
					<?php } ?>
                </div>
            </div>
        </header>
        <!-- Header end -->    
<?php } ?>
	   <!-- Blog -->
        <section class="blog-standard <?php if(apparatus_get_option('apparatus_blog_page_breadcrumb_section') == 1 && !(is_front_page())) { ?>p-75-5<?php } else { ?>p-90-20<?php } ?>" id="full-section">
		<div id="msg" class="pagiloader"><img src="<?php echo esc_url(get_template_directory_uri().'/images/loader-blog.gif') ?>" alt="<?php esc_attr_e('loading...', 'apparatus'); ?>" class="img-responsive" /></div>
            <div class="container" id="content">
				<div class="load-this-section">
				
				<?php if(apparatus_get_option('apparatus_blog_headline_switch') == 1) {?>
                <!-- Section title -->
                <div class="section-title sm-ac mt-minus20 mb-60 <?php echo esc_attr($blog_tclass); ?>">
				<?php if(!empty(apparatus_get_option('apparatus_blog_headline_one'))) {?>
                    <p class="light bold small"><?php echo esc_attr( apparatus_get_option('apparatus_blog_headline_one') ); ?></p>
				<?php } ?>	
				<?php if(!empty(apparatus_get_option('apparatus_blog_headline_two'))) { ?>
                    <h2><?php echo wp_kses(apparatus_get_option('apparatus_blog_headline_two'),$allowed_html_array) ?></h2>
				<?php } ?>	
				<?php if(!empty(apparatus_get_option('apparatus_blog_headline_three'))) {?>
                    <p class="light thin"><?php echo esc_attr( apparatus_get_option('apparatus_blog_headline_three') ); ?></p>
				<?php } ?>	
                </div>
                <!-- Section title end -->
				<?php } ?>
				
				<?php if(apparatus_get_option('apparatus_blog_sidebar_switch') == 1) { ?>
				<div class="row">
					<div class="<?php if( is_active_sidebar( 'apparatus_sidebar_widgets' ) ) { ?>col-lg-9<?php } else { ?>col-lg-12<?php } ?> col-md-12 col-sm-12 col-xs-12">
				<?php } ?>

			<?php 
			if (have_posts()) :  while ( have_posts() ) : the_post(); 
			$title    = get_the_title();
			?>
					<div <?php post_class( 'blog-mr-10' ); ?> id="post-<?php the_ID(); ?>">
                                    
						<!-- News Block -->
						<div class="news-block">
							<?php if(has_post_thumbnail()) { ?>
								<div class="image-box">
									<a href="<?php the_permalink(); ?>" class="lightbox-image">
										<?php the_post_thumbnail(); ?>
									</a>
								</div>
							<?php } ?>
								
							<div class="content-box">
								<div class="outer ">
									<div class="meta-information ">
									<h2><a href="<?php the_permalink(); ?>"><?php echo substr($title, 0,47); ?></a></h2>
										<div class="meta-info clearfix">
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
											$tag_cat_class = 'noclass';
											$only_cat_class = '';
											
											if( (( $tag_and_cat_total > 5 ) && ( $count > 4 && $count < 8 )) || ( $tag_and_cat_total > 5 ) ) {
												$only_cat_class = ' mp-0';
											}
											
											if( ( $tag_and_cat_total > 5 ) && ( $cat_count > 4 && $count < 4 ) ) {
												$only_cat_class = ' mp-0';
											}
											
											if( ( $tag_and_cat_total > 5 ) && ( $count > 8 ) ) {
												$tag_cat_class = ' mp-0';
											}
											?>
											<ul class="pull-left">
												<li class="admin_sx"><i class="fa fa-user"></i><?php the_author(); ?></li>
												<li><i class="fas fa-calendar"></i><a href="<?php the_permalink(); ?>"><?php the_time(get_option('date_format')); ?></a></li>
												<?php if(apparatus_get_option('apparatus_blog_sidebar_switch') != 1) { ?>
												<li><i class="fas fa-comments"></i><a href="<?php echo esc_url(get_comments_link() ); ?>"><?php echo get_comments_number(); ?> <?php esc_html_e('comments', 'apparatus'); ?></a></li>
												<?php } if(has_tag()) { ?>
												<li class="<?php echo esc_attr($tag_cat_class); ?>"><i class="fas fa-tags"></i><?php the_tags( '', ', ' ); ?>
															</li>
												<?php } if(has_category()) { ?>
												<li class="<?php echo esc_attr($tag_cat_class); ?><?php echo esc_attr($only_cat_class); ?>"><i class="fas fa-tags"></i><?php the_category( ', ' ); ?>
															</li>
												<?php } ?>
											</ul>
										</div>
									</div>
										<?php if ( has_post_format( 'video' ) ) : ?>
												<?php the_content(); ?>
										<?php else: ?>
												<?php the_excerpt(); ?>
										<?php endif; ?>
									<div class="bi-meta-info clearfix">
										<a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e('Read More', 'apparatus'); ?><i class="fas fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div>                                <!-- blog post item -->
                    </div>
					<?php endwhile; endif; ?>
					<div class="clearfix"></div>
					  <!-- Start Pagination-->		
					  <div class="row bl-one-layout">		  
						<?php 
						if (function_exists('apparatus_custom_pagination')) apparatus_custom_pagination();
						?>					
					  </div>
					  <!--End Pagination-->
				<?php if(apparatus_get_option('apparatus_blog_sidebar_switch') == 1) { ?>
					</div>
					<?php get_sidebar(); ?>
				</div>
				<?php } ?>
				</div>
					
            </div>
        </section>
<?php if(apparatus_get_option('apparatus_blog_newsletter_switch') == 1) { ?> 		
        <!-- Newsletter Section Start-->
        <section class="call-to-action bg-animation <?php if(apparatus_get_option('apparatus_blog_page_breadcrumb_section') == 1 && !(is_front_page())) { ?>p-75-45<?php } else { ?>p-90-60<?php } ?> newsletter_section" <?php if( (isset(apparatus_get_option('apparatus_blog_newsletter_sec_bg_img')['url']) && !empty(apparatus_get_option('apparatus_blog_newsletter_sec_bg_img')['url'])) ) { ?> style="background-image:url(<?php echo esc_url( apparatus_get_option('apparatus_blog_newsletter_sec_bg_img')['url'] ); ?>)"<?php } ?>>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7 align-self-center mb-30">
                        <!-- Section title -->
                        <div class="section-title">
						<?php if(!empty(apparatus_get_option('apparatus_blog_newsletter_headline_one'))) { ?>
                            <p class="white-light bold small"><?php echo esc_attr( apparatus_get_option('apparatus_blog_newsletter_headline_one') ); ?></p>
						<?php } ?>	
						<?php if(!empty(apparatus_get_option('apparatus_blog_newsletter_headline_two'))) { ?>						
                            <h2 class="h1 white"><?php echo wp_kses(apparatus_get_option('apparatus_blog_newsletter_headline_two'),$allowed_html_array) ?></h2>
						<?php } ?>	
						<?php if(!empty(apparatus_get_option('apparatus_blog_newsletter_headline_three'))) { ?>						
                            <p class="white-light thin m-0"><?php echo esc_attr( apparatus_get_option('apparatus_blog_newsletter_headline_three') ); ?></p>
						<?php } ?>	
                        </div>
                        <!-- Section title end -->
                    </div>
                    <div class="col-12 col-lg-5 align-self-center mb-15">
					<form action="<?php echo esc_url(home_url()); ?>" method="POST" id="newsletter">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="<?php esc_attr_e('Email', 'apparatus'); ?>" name="email1" id="email">
                            <div class="input-group-append">
                                <button class="btn bg-color-1"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>

                            </div>
							<img src="<?php echo get_template_directory_uri();?>/images/newsletter_loader.gif" alt="<?php esc_attr_e('loading...', 'apparatus'); ?>" class="newsletter-loader" />
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

<?php } ?>	
<?php if(apparatus_get_option('apparatus_blog_contact_form_switch') == 1) {
	$plugin = 'the_apparatus_extensions/the_apparatus_extensions.php';
	if(apparatus_ipa($plugin)){
	if (function_exists('apparatus_contact_form')) apparatus_contact_form();
	}
 } ?> 		
<!-- =-=-=-=-=-=-= Pagination Without Loading Function =-=-=-=-=-=-= -->
<?php
	if (function_exists('apparatus_pagination_without_loading')) apparatus_pagination_without_loading();
?>
<!-- =-=-=-=-=-=-= Pagination Without Loading Function End =-=-=-=-=-=-= -->