<?php
/**
 * 404 page
 */
get_header();
$header_class = '';
	if(!empty(apparatus_get_option('apparatus_blog_header_sec_bg_img')['url'])) {
	   $header_class = ' style="background-image:url(';
	   $header_class .= esc_url( apparatus_get_option('apparatus_blog_header_sec_bg_img')['url'] );
	   $header_class .= ')"';
	}
?>
	<!-- Header -->
		<header class="header-blog<?php if(apparatus_get_option('apparatus_single_post_breadcrumb_section') == 1) { ?> section-head<?php } ?> bg-animation"<?php echo $header_class; //escaped already ?>>
            <div class="container">
                <div class="row header-row">
                    <?php if(apparatus_get_option('apparatus_single_post_breadcrumb_section') == 1){ ?>
					<!-- =-=-=-=-=-=-= PAGE BREADCRUMB SECTION =-=-=-=-=-=-= -->
					  <?php if (function_exists('apparatus_page_breadcrumb_function')) apparatus_page_breadcrumb_function(); ?>
					<!-- =-=-=-=-=-=-= PAGE BREADCRUMB SECTION END =-=-=-=-=-=-= -->
					<?php } else { ?>
					<!-- Main title -->
                    <div class="col align-self-center main-title">

                        <h1 class="white"><?php esc_html_e('Ooops - Page Not Found', 'apparatus'); ?></h1>     
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
						<div class="text-box col-12 col-lg-12 section-title text-center the-404">
                            <p class="light bold heading1"><?php esc_html_e('Oops!', 'apparatus'); ?></p>
							<p class="light heading1 small"><?php esc_html_e('Sorry, we cannot find what you are looking for!', 'apparatus'); ?></p>
                            <h2 class="heading2"><?php esc_html_e('404', 'apparatus'); ?></h2>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
						
			  </div>
			</div>
			</div>
		</section> 
<?php get_footer(); ?>