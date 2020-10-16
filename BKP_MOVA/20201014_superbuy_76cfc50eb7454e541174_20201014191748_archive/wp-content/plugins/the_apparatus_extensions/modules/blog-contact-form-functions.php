<?php
/***********************
Contact Form Fucntion
************************/
function apparatus_contact_form(){
		$allowed_html_array = array(
		'b' => array(),
		'strong' => array(),
		'p' => array(),
		'br' => array(),
		'span' => array('class' => array()),
		'i' => array('class' => array()),
		'em' => array('class' => array()),
		);
		
		$first_line = '';
		$second_line = '';
		$third_line = '';
		
		if (apparatus_get_option('apparatus_blog_contact_form_headline_one') != '') {
			$first_line = apparatus_get_option('apparatus_blog_contact_form_headline_one');
		} if (apparatus_get_option('apparatus_blog_contact_form_headline_two') != '') {
			$second_line = apparatus_get_option('apparatus_blog_contact_form_headline_two');
		} if (apparatus_get_option('apparatus_blog_contact_form_headline_three') != '') {
			$third_line = apparatus_get_option('apparatus_blog_contact_form_headline_three');
		}
?>

      <section class="contact <?php if(apparatus_get_option('apparatus_blog_page_breadcrumb_section') == 1 && !(is_front_page())) { ?>p-75-50<?php } else { ?>p-90-60<?php } ?>">
            <div class="container">
			<?php if(!empty(apparatus_get_option('apparatus_blog_contact_form_bg_img'))){ ?>
                <div class="bg-map">
                    <img src="<?php echo esc_url(apparatus_get_option('apparatus_blog_contact_form_bg_img')['url']); ?>" alt="<?php esc_attr_e('bg-image', 'apparatus'); ?>">
                </div>
			<?php } else { ?>
				<div class="bg-map">
                    <img src="<?php echo esc_url(get_template_directory_uri());?>/images/bg-map.png" alt="<?php esc_attr_e('bg-image', 'apparatus'); ?>">
                </div>
			<?php } ?>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <!-- Section title -->
                        <div class="section-title sm-ac mb-70">
                            <p class="light bold small" <?php if(!empty(apparatus_get_option('apparatus_blog_contact_form_heading1_color')['rgba'])){ ?>style="color:<?php echo esc_attr(apparatus_get_option('apparatus_blog_contact_form_heading1_color')['rgba']); ?>" <?php } ?>><?php echo wp_kses(($first_line),$allowed_html_array); ?></p>
                            <h2 <?php if(!empty(apparatus_get_option('apparatus_blog_contact_form_heading2_color')['rgba'])){ ?>style="color:<?php echo esc_attr(apparatus_get_option('apparatus_blog_contact_form_heading2_color')['rgba']); ?>" <?php } ?>><?php echo wp_kses(($second_line),$allowed_html_array); ?></h2>
                            <p class="light thin" <?php if(!empty(apparatus_get_option('apparatus_blog_contact_form_heading3_color')['rgba'])){ ?>style="color:<?php echo esc_attr(apparatus_get_option('apparatus_blog_contact_form_heading3_color')['rgba']); ?>" <?php } ?>><?php echo wp_kses(($third_line),$allowed_html_array); ?></p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <!-- Social icons -->
                        <div class="contact-social-icons">
                            <ul class="sm-ac">
                                <li><a href="<?php echo esc_url(apparatus_get_option('social_twitter')); ?>"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="<?php echo esc_url(apparatus_get_option('social_facebook')); ?>"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="<?php echo esc_url(apparatus_get_option('social_googleplus')); ?>"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="<?php echo esc_url(apparatus_get_option('social_linkedin')); ?>"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <!-- Social icons end -->
                    </div>
                </div>
                <!-- Section title end -->
                <form  method="post" id="form" action="<?php echo esc_url(home_url()); ?>">
                    <div class="row">
                        <div class="col-12 col-md">
						
                            <!-- Name input -->
                            <input type="text" name="name" placeholder="<?php esc_attr_e('Name', 'apparatus'); ?>" id="sendername" required>
                            <!-- Email input -->
                            <input type="email" name="contact_email" placeholder="<?php esc_attr_e('Email', 'apparatus'); ?>" id="emailaddress" required>
                        </div>
                        <div class="col-12 col-md">
                            <!-- Text input -->
                            <textarea name="text" cols="30" rows="5" placeholder="<?php esc_attr_e('Message', 'apparatus'); ?>" id="sendermessage" required></textarea>
                        </div>
                        <div class="col-12 col-md-auto text-center">
                            <!-- Submit form button -->
                            <button class="submit bg-color-1"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
							<img src="<?php echo esc_url(get_template_directory_uri());?>/images/msg_loader.gif" class="img-responsive msg-loader"  alt="<?php esc_attr_e('loader', 'apparatus'); ?>"/>
                        </div>
                    </div>
  					<input type="hidden" name="email_subject" id="email_subject" value="<?php echo esc_attr(apparatus_get_option('apparatus_blog_contact_form_email_subject')); ?>" />
  					<input type="hidden" name="recipient_name" id="recipient_name" value="<?php echo esc_attr(apparatus_get_option('apparatus_blog_contact_form_recipient_name')); ?>" />
					<input type="hidden" name="recipient_email" id="recipient_email" value="<?php echo sanitize_email(apparatus_get_option('apparatus_blog_contact_form_recipient_email')) ?>" />
				
                </form>
				<div id="success_msg" class="alert alert-success"><?php echo esc_html__('Message Sent','apparatus')?></div>
				<div id="error_msg" class="alert alert-danger"><?php echo esc_html__('Sorry, Message Not Sent. Try again later.','apparatus')?></div>
            </div>
        </section>
		
  
        <script>
            jQuery(document).ready(function(){
				jQuery('.msg-loader').css({ 
				'width': '40px', 
				'height': '40px', 
				'display': 'inline',
				'display': 'none',
				});
				jQuery("#success_msg").hide();
				jQuery("#error_msg").hide();
                jQuery("#form").on("submit", function(e){
                    //Stop the form from submitting itself to the server.
                    e.preventDefault();

		    var data = {};
                    var name = jQuery("#sendername").val();
                    var email = jQuery("#emailaddress").val();
                    var message = jQuery("#sendermessage").val();
                    var recipient_email = jQuery("#recipient_email").val();
                    var recipient_name = jQuery("#recipient_name").val();
                    var email_subject = jQuery("#email_subject").val();	
                    jQuery.ajax({
                        type: "POST",
			dataType: "json",
			beforeSend: function(){
			jQuery(".msg-loader").css("display", "inline");
			},
                        url: "<?php echo plugins_url( 'blog-contact-form.php', __FILE__ );?>",
                        data: {name: name,email:email,message:message,recipient_email:recipient_email,recipient_name:recipient_name,email_subject:email_subject},
			complete: function(){
			jQuery("#form")[0].reset();
			jQuery(".msg-loader").css("display", "none");
			},
                        success: function(data){
                        jQuery("#success_msg").show();
			jQuery("html, body").animate({
        scrollTop: jQuery("#success_msg").offset().top - 200}, 2000);
                        },	
			error: function(data){
                        jQuery("#error_msg").show();
			jQuery("html, body").animate({
        scrollTop: jQuery("#error_msg").offset().top - 200}, 2000);
			},
					  
                    });
                });
            });
        </script>						
<?php } ?>