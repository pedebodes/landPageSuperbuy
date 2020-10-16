<!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
        <?php if(apparatus_get_option('apparatus_footer_newsletter_switch') != 1) { ?> 
		<footer id="footer" class="bg-animation p-90-60">
            <div class="container">
                <div class="row">
					<?php if( (isset(apparatus_get_option('footer_logo_url')['url']) && !empty(apparatus_get_option('footer_logo_url')['url'])) || ( (apparatus_get_option('footer_apparatus_text_logo') != '') || (!has_nav_menu('apparatus_footer_menu')) ) ) { ?>
					<div class="col-12 mb-30 col-md-3 align-self-center">
                        <!-- Logo -->
						<?php if(isset(apparatus_get_option('footer_logo_url')['url']) && !empty(apparatus_get_option('footer_logo_url')['url'])) { ?>
						<a class="footer-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<div class="logo-image"><img src="<?php echo esc_url( apparatus_get_option('footer_logo_url')['url'] ); ?>" alt="<?php esc_attr_e('logo', 'apparatus'); ?>" /></div>
						</a>
						<?php } else { ?>
                        <a class="footer-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php if(apparatus_get_option('footer_apparatus_text_logo') == '') { ?>
							<div class="logo bg-color-1"><?php esc_html_e('å', 'apparatus'); ?></div>
							<?php } else { ?>
							<div class="logo bg-color-1"><?php echo esc_attr( apparatus_get_option('footer_apparatus_text_logo')); ?></div>
							<?php } ?>
                        </a>
						<?php } ?>
                        <!-- Logo end -->
                    </div>
					<div class="col-12 col-md-9 align-self-center justify-content-center mb-30">
					<?php } ?>
						<?php
						if ( has_nav_menu('apparatus_footer_menu') ) {
						wp_nav_menu( array(
							'theme_location'    => 'apparatus_footer_menu',
							'container'     => false,
							'container_id'      => '',
							'conatiner_class'   => '',
							'menu_class'        => '', 
							'echo'          => true,
							'items_wrap'        => '<ul id="menu-footer" class="footer-nav">%3$s</ul>',
							'depth'         => 1,
						) );
						}
						?>
					<?php if( (isset(apparatus_get_option('footer_logo_url')['url']) && !empty(apparatus_get_option('footer_logo_url')['url'])) || (apparatus_get_option('footer_apparatus_text_logo') != '') ) { ?>
					</div>
					<?php } ?>
                </div>
            </div>
        </footer>
        
		<?php } else { ?>
		 <footer id="footer" class="bg-animation p-90-60">
            <div class="container">
                <div class="row">
					<?php if( (isset(apparatus_get_option('footer_logo_url')['url']) && !empty(apparatus_get_option('footer_logo_url')['url'])) || ( (apparatus_get_option('footer_apparatus_text_logo') != '') || (!has_nav_menu('apparatus_footer_menu')) ) ) { ?>
					<div class="col-12 mb-30 col-md-7 align-self-center">
                        <!-- Logo -->
						<?php if(isset(apparatus_get_option('footer_logo_url')['url']) && !empty(apparatus_get_option('footer_logo_url')['url'])) { ?>
						<a class="footer-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<div class="logo-image"><img src="<?php echo esc_url( apparatus_get_option('footer_logo_url')['url'] ); ?>" alt="<?php esc_attr_e('logo', 'apparatus'); ?>" /></div>
						</a>
						<?php } else { ?>
                        <a class="footer-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php if(apparatus_get_option('footer_apparatus_text_logo') == '') { ?>
							<div class="logo bg-color-1"><?php esc_html_e('å', 'apparatus'); ?></div>
							<?php } else { ?>
							<div class="logo bg-color-1"><?php echo esc_attr( apparatus_get_option('footer_apparatus_text_logo')); ?></div>
							<?php } ?>
                        </a>
						<?php } ?>
                        <!-- Logo end -->
                    </div>
					<div class="col-12 col-md-5 align-self-center justify-content-center mb-30">
					<?php } ?>
					<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="POST" id="footer-newsletter">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="<?php esc_attr_e('Input Email to Subscribe', 'apparatus'); ?>" name="footer_email1" id="footer-email">
                            <div class="input-group-append">
                                <button class="btn bg-color-1"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                            </div>
							<img src="<?php echo get_template_directory_uri();?>/images/newsletter_loader.gif" class="footer-newsletter-loader" alt="<?php esc_attr_e('loading...', 'apparatus'); ?>" />
                        </div>
					</form>
					<div id="footer-output"></div>	
					<?php if( (isset(apparatus_get_option('footer_logo_url')['url']) && !empty(apparatus_get_option('footer_logo_url')['url'])) || (apparatus_get_option('footer_apparatus_text_logo') != '') ) { ?>
					</div>
					<?php } ?>
                </div>
            </div>
        </footer>
		<?php if (function_exists('apparatus_footer_newsletter_without_loading')) apparatus_footer_newsletter_without_loading();
		 } ?>
		<!-- Footer end -->
         <!-- Copyright -->
        <div class="footer-copyright">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-12 col-sm-6">
                        <!-- Copyright -->
                        <p class="small thin white-light sm-ac"><?php if(apparatus_get_option('copy_text') != '') {  echo esc_textarea( apparatus_get_option('copy_text') );  }  else { ?><?php esc_html_e('Copyrights © 2019. Todos os Direitos Reservados', 'apparatus'); ?><?php } ?></p>
                    </div>
					<?php if(apparatus_get_option('additional_author_text') != '') { ?>
                    <div class="col-12 col-sm-6">
                        <!-- Author -->
                        <p class="small thin white-light author sm-ac">
						<?php if(apparatus_get_option('additional_author_text') != '') { echo esc_textarea( apparatus_get_option('additional_author_text') );  } ?>
						</p>
                    </div>
					<?php } else { ?>
					<div class="col-12 col-sm-6">
                        <!-- Author -->
                        <p class="small thin white-light author sm-ac">
						<?php esc_html_e('Desenvolvido por Mova Ideias' , 'apparatus'); ?>
						</p>
                    </div>
					<?php } ?>
                </div>
            </div>
        </div>
        <!-- Copyright -->     
  </div>
	<!-- Page end -->

	<?php
		/* Always have wp_footer() just before the closing </body>
		* tag of your theme, or you will break many plugins, which
		* generally use this hook to reference JavaScript files.
		*/

		wp_footer();	
	?>
</body>
</html>