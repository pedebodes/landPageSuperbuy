<?php
/**
 * The Search results page
 */
if (have_posts() ) {
 get_header(); ?>

 <?php get_template_part( 'blog-templates/blog-layout-one', 'apparatus' ); ?>
 
<?php get_footer();
} else {
get_header(); 
		$header_class = '';
	if(!empty(apparatus_get_option('apparatus_blog_header_sec_bg_img'))) {
	   $header_class = ' style="background-image:url(';
	   $header_class .= esc_url( apparatus_get_option('apparatus_blog_header_sec_bg_img')['url'] );
	   $header_class .= ')"';
	}
	   $h1_title = '<h1 class="white"><span class="thin">';
	   $h1_title .= esc_html__('Search Results for ', 'apparatus');
	   $h1_title .= '</span>"';
	   $h1_title .= get_search_query();
	   $h1_title .= '"</h1>';
?>
	<!-- Header -->
		<header class="header-blog<?php if(apparatus_get_option('apparatus_blog_page_breadcrumb_section') == 1) { ?> section-head<?php } ?> bg-animation"<?php echo $header_class; //escaped already ?>>
            <div class="container">
                <div class="row header-row">
					<?php if(apparatus_get_option('apparatus_blog_page_breadcrumb_section') == 1){ ?>
					<!-- =-=-=-=-=-=-= PAGE BREADCRUMB SECTION =-=-=-=-=-=-= -->
					  <?php if (function_exists('apparatus_page_breadcrumb_function')) apparatus_page_breadcrumb_function(); ?>
					<!-- =-=-=-=-=-=-= PAGE BREADCRUMB SECTION END =-=-=-=-=-=-= -->
					<?php } else { ?>
                    <!-- Main title -->
                    <div class="col align-self-center main-title">
                        <?php echo $h1_title; //escaped already ?> 
                        <!-- Buttons -->
                        <a href="<?php echo esc_url( home_url() ); ?>">
                            <div class="button bg-color-1"><?php esc_html_e('Take Me Home', 'apparatus'); ?></div>
                        </a>
                    </div>
                    <!-- Main title end -->
					<?php } ?>
                </div>
            </div>
        </header>
        <!-- Header end -->
		<section class="sec-padding apparatus-page-post-page">
			<div class="container">
			  <div class="row">
				<div class="col-12 col-md-12 nopadding">

				<!-- post grid -->		
				<div class="apparatus-post-block p-90-60">
					<div class="col-12 col-md-12 nopadding">
						<div class="text-box col-12 col-lg-10 section-title fleft mb-70">
                            <p class="bold heading1"><?php esc_html_e('Search Results for : ', 'apparatus'); ?><?php echo get_search_query(); ?></p>
                            <h2 class="light heading2"><?php esc_html_e('No posts were found', 'apparatus'); ?></h2>
						</div>
						<div class="text-box col-12 col-lg-2 section-title mt-30 fright">
                            <a class="gray link thome404" href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e('Take Me Home', 'apparatus'); ?> <i class="fas fa-chevron-right"></i></a>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
						
			  </div>
			</div>
			</div>
		</section> 
<?php get_footer();
} ?>