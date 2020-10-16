<?php
/**
 * Template Name: Page With VC
 */
get_header(); ?>
  
<section class="sec-padding apparatus-page-post-page">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-12 nopadding">
			
		<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
		<!-- post grid -->		
        <div <?php post_class( 'apparatus-post-block' ); ?> id="post-<?php the_ID(); ?>">
			<div class="col-12 col-md-12 nopadding">
				<div class="text-box">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
		<?php endwhile; endif; ?>
		<div class="clearfix"></div>
				
	  </div>
    </div>
    </div>
</section> 
<?php get_footer(); ?>