<?php
/**
 * The default woocommerce template of this theme
 */
get_header(); ?>
<?php if(apparatus_get_option('apparatus_single_page_header_section_switch') == 1) { ?>      
	   <!-- Header -->
		<header class="header-blog bg-animation" <?php if(isset(apparatus_get_option('apparatus_single_page_header_sec_bg_img')['url'] ) && !empty(apparatus_get_option('apparatus_single_page_header_sec_bg_img')['url'])) { ?> style="background-image:url(<?php echo esc_url( apparatus_get_option('apparatus_single_page_header_sec_bg_img')['url'] ); ?>)"<?php } ?>>
            <div class="container">
                <div class="row header-row">
                    <!-- Main title -->
                    <div class="col align-self-center main-title">
						<h1 class="white lmb-0"><?php woocommerce_page_title(); ?></h1>
						<?php if(apparatus_get_option('apparatus_woo_page_breadcrumb_section') == 1){ ?>
						<?php if (function_exists('woocommerce_breadcrumb')) woocommerce_breadcrumb(); ?>
						<?php } ?>
                    </div>
                    <!-- Main title end -->
                </div>
            </div>
        </header>
        <!-- Header end -->    
<?php } ?>
  

 <section class="blog p-70-40 dflt-page single-layout-one">
    <div class="container">
		<div class="row">
			<div class="col-md-12 left-padd0">
					<?php woocommerce_content(); ?>
			</div>
		</div>
	</div>
 </section>
  <!-- end features section 1 -->
  <?php get_footer(); ?>