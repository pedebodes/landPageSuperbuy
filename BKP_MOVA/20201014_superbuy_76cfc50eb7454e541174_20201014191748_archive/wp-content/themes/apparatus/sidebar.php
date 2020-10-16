            <!--Right Sidebar-->
			<?php if ( is_active_sidebar( 'apparatus_sidebar_widgets' ) ) { ?>
            <div class="col-md-12 col-lg-3 col-sm-12 col-xs-12 sm-tm">
        	<!-- sidebar -->
            <div class="side-bar">
                    <!--widget area-->
                    <?php dynamic_sidebar( 'apparatus_sidebar_widgets' ); ?>
                    <!--End widget area-->
            </div>
			</div>
			<?php } ?>
            <!--End Right Sidebar-->