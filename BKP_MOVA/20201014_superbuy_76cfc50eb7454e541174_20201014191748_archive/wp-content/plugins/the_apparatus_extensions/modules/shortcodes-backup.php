<?php
/*-----------------------------------------------------------------------------------*/
/* Creating Shortcodes in order to use in the WPBakery Page builder plugin */
/*-----------------------------------------------------------------------------------*/

/*****************
Header Section- 1
*****************/
//Function for Header Section- 1
function apparatus_header_section_one_shortcode( $atts ) {
	extract( shortcode_atts( array(
	'heading1' => '',
	'heading2' => '',
	'heading2_thin' => '',
	'heading3' => '',
	'btn1_url' => '',
	'btn1_name' => '',
	'btn2_url' => '',
	'btn2_name' => '',
	'fb_url' => '',
	'twitter_url' => '',
	'dribble_url' => '',
	'behance_url' => '',
	'heading1_color' => '',
	'heading2_color' => '',
	'heading3_color' => '',
	'btn1_color_1' => '',
	'btn1_color_2' => '',
	'link_color' => '',
	'sec2_heading1' => '',
	'sec2_heading2' => '',
	'sec2heading2_thin' => '',
	'sec2_heading3' => '',
	'fbox_one_step_number' => '',
	'fbox_one_title' => '',
	'fbox_one_desc' => '',
	'fbox_two_step_number' => '',
	'fbox_two_title' => '',
	'fbox_two_desc' => '',
	'fbox_three_step_number' => '',
	'fbox_three_title' => '',
	'fbox_three_desc' => '',
	'fbox_four_step_number' => '',
	'fbox_four_title' => '',
	'fbox_four_desc' => '',
	'sec2_heading1_color' => '',
	'sec2_heading2_color' => '',
	'sec2_heading3_color' => '',
	'fbox_step_bg_color_primary' => '',
	'fbox_step_bg_color_secondary' => '',
	'fbox_title_color' => '',
	'fbox_desc_color' => '',
	'btn1_txt_color' => '',
	), $atts ) );
	
	for($i=0;$i<=50;$i++){
	$str = 'abcdm';
	$shuffled = str_shuffle($str);
	}	
	$unique_css_class=$shuffled;

	$gallery = shortcode_atts(
    array(
        'bg_image'      =>  'bg_image',
    ), $atts );
	$gallery2 = shortcode_atts(
    array(
        'image'      =>  'image',
    ), $atts );
	$image_ids = explode(',',$gallery['bg_image']);

	foreach( $image_ids as $image_id ){
    $images = wp_get_attachment_image_src( $image_id, 'bg_image' );
	}	
	$image_ids2 = explode(',',$gallery2['image']);	
	foreach( $image_ids2 as $image_id2 ){
    $images2 = wp_get_attachment_image_src( $image_id2, 'image' );
	}
	
	$gallery3 = shortcode_atts(
    array(
        'bg_image3'      =>  'bg_image3',
    ), $atts );
	
	$image_ids3 = explode(',',$gallery3['bg_image3']);

	foreach( $image_ids3 as $image_id ){
    $images3 = wp_get_attachment_image_src( $image_id, 'bg_image3' );
	}	
		$allowed_html_array = array(
		'b' => array(),
		'strong' => array(),
		'p' => array(),
		'br' => array(),
		'span' => array('class' => array()),
		'i' => array('class' => array()),
		'em' => array('class' => array()),
		);	
		

    $myArray = explode(',', $sec2heading2_thin);	
    $ret = $sec2_heading2;	
	foreach($myArray as $patterns){
    $ret = preg_replace('/\b'.$patterns.'\b/i',"<span class='thin'>$patterns</span>",$ret);   
	}
	$ret ;	
	
    $myArray2 = explode(',', $heading2_thin);	
    $ret2 = $heading2;	
	foreach($myArray2 as $patterns){
    $ret2 = preg_replace('/\b'.$patterns.'\b/i',"<span class='thin'>$patterns</span>",$ret2);   
	}
	$ret2 ;		
	$output = '<!-- Start Header Section-->
	<div style="background-image:url('.esc_url($images[0]).');background-size: contain;background-position: top;background-repeat: no-repeat;" class="dif-mobile-bg">
        <header class="header '.esc_attr($unique_css_class).' header-section-one"  >
            <div class="container">
                <div class="row header-row">
                    <!-- Main title -->
                    <div class="col-sm-12 col-md-6 align-self-center main-title">
					'; if(!empty($heading1)){ $output.='
                        <p class="light bold small main-suptitle sm-white heading1">'.wp_kses(__($heading1),$allowed_html_array).'</p>
					'; } $output.='	
					'; if(!empty($heading2)){ $output.='
                        <h1 class="heading2 sm-white">'.wp_kses(__($ret2),$allowed_html_array).'</h1>
					'; } $output.='	
					'; if(!empty($btn1_name)){ $output.='
                        <!-- Buttons -->
                        <a href="'.esc_url($btn1_url).'">
                            <div class="button bg-color-1">'.esc_attr($btn1_name).'</div>
                        </a>
					'; } $output.='	
					'; if(!empty($btn2_name)){ $output.='		
                        <a class="gray link sm-white" href="'.esc_url($btn2_url).'">'.esc_attr($btn2_name).' <i class="fas fa-chevron-right"></i></a>
					'; } $output.='		
                    </div>
                    <!-- Main title end -->
					'; if(!empty($images2[0])){ $output.='					
                    <!-- Phone -->
                    <div class="col-12 col-md-6 align-self-center header-phone">
                        <img class="jump" src="'.esc_url($images2[0]).'" alt="">
                    </div>
                    <!-- Phone end -->
					'; } $output.='		
					'; if(!empty($fb_url) || !empty($twitter_url) || !empty($dribble_url) || !empty($behance_url)){ $output.='						
                    <!-- Social icons -->
                    <div class="social-icons">
                        <ul>
                            <li><a href="'.esc_url($twitter_url).'"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="'.esc_url($fb_url).'"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="'.esc_url($dribble_url).'"><i class="fab fa-dribbble"></i></a></li>
                            <li><a href="'.esc_url($behance_url).'"><i class="fab fa-behance"></i></a></li>
                        </ul>
                    </div>
                    <!-- Social icons end -->
					'; } $output.='						
                </div>
				'; if(!empty($heading3)){ $output.='				
                <!-- Tooltip -->
                <div class="header-tooltip"><i class="fas scroll-arrow bounce fa-angle-double-down"></i>
                    <p class="light thin small sm-white heading3" >'.wp_kses(__($heading3),$allowed_html_array).'</p>
                </div>
                <!-- Tooltip end -->
				'; } $output.='				
            </div>
        </header>
        <!-- End Header end -->
		<!-- How it works -->
        <section  class="hiw p-90-35 '.esc_attr($unique_css_class).'">
            <div class="line"></div>
            <div class="container">
                <!-- Section title -->
                <div class="section-title sm-ac mb-70">
                    <p class="light bold small sec2_heading1">'.wp_kses(__($sec2_heading1),$allowed_html_array).'</p>
                    <h2 class="sec2_heading2">'.wp_kses(__($ret),$allowed_html_array).'</h2>
                    <p class="light thin sec2_heading3">'.wp_kses(__($sec2_heading3),$allowed_html_array).'</p>
                </div>
                <!-- Section title end -->
                <div class="row">
				
				'; if(!empty($fbox_one_step_number) && !empty($fbox_one_title) && !empty($fbox_one_desc)){ $output.='
                    <!-- Item 1 -->
                    <div class="col-6 col-sm-6 col-md-3 hiw-item mb-30">
                        <div class="bg-color-2 puls mb-30 fbox_step_number" style="animation-delay: 0s">'.esc_attr($fbox_one_step_number).'</div>
                        <p class="bold fbox_title">'.wp_kses(__($fbox_one_title),$allowed_html_array).'</p>
                        <p class="light thin fbox_desc">'.wp_kses(__($fbox_one_desc),$allowed_html_array).'</p>
                    </div>
				'; } $output.='
				'; if(!empty($fbox_two_step_number) && !empty($fbox_two_title) && !empty($fbox_two_desc)){ $output.='
                    <!-- Item 2 -->
                    <div class="col-6 col-sm-6 col-md-3 hiw-item mb-30">
                        <div class="bg-color-2 puls mb-30 fbox_step_number" style="animation-delay: .75s">'.esc_attr($fbox_two_step_number).'</div>
                        <p class="bold fbox_title">'.wp_kses(__($fbox_two_title),$allowed_html_array).'</p>
                        <p class="light thin fbox_desc">'.wp_kses(__($fbox_two_desc),$allowed_html_array).'</p>
                    </div>
				'; } $output.='
				'; if(!empty($fbox_three_step_number) && !empty($fbox_three_title) && !empty($fbox_three_desc)){ $output.='
                    <!-- Item 3 -->
                    <div class="col-6 col-sm-6 col-md-3 hiw-item mb-30">
                        <div class="bg-color-2 puls mb-30 fbox_step_number" style="animation-delay: 1.5s">'.esc_attr($fbox_three_step_number).'</div>
                        <p class="bold fbox_title">'.wp_kses(__($fbox_three_title),$allowed_html_array).'</p>
                        <p class="light thin fbox_desc">'.wp_kses(__($fbox_three_desc),$allowed_html_array).'</p>
                    </div>
					'; } $output.='
					'; if(!empty($fbox_four_step_number) && !empty($fbox_four_title) && !empty($fbox_four_desc)){ $output.='
                    <!-- Item 4 -->
                    <div class="col-6 col-sm-6 col-md-3 hiw-item mb-30">
                        <div class="bg-color-2 puls mb-30 fbox_step_number" style="animation-delay: 2.25s">'.esc_attr($fbox_four_step_number).'</div>
                        <p class="bold fbox_title">'.wp_kses(__($fbox_four_title),$allowed_html_array).'</p>
                        <p class="light thin fbox_desc">'.wp_kses(__($fbox_four_desc),$allowed_html_array).'</p>
                    </div>
					'; } $output.='
                </div>
            </div>
        </section>
		</div>
        <!-- How it works end -->
		';
if(!empty($unique_css_class)){ $output.='
<style>
'; if(!empty($heading1_color)){ $output.='
.header-section-one.'.wp_trim_words($unique_css_class).' .heading1{
	color:'.esc_attr($heading1_color).';
} 
'; } $output.='
'; if(!empty($heading2_color)){ $output.='
.header-section-one.'.wp_trim_words($unique_css_class).' .heading2{
	color:'.esc_attr($heading2_color).' !important;
} 
'; } $output.='
'; if(!empty($heading3_color)){ $output.='
.header-section-one.'.wp_trim_words($unique_css_class).' .heading3{
	color:'.esc_attr($heading3_color).';
} 
'; } $output.='
'; if(!empty($btn1_color_1) && !empty($btn1_color_2)){ $output.='
.header-section-one.'.wp_trim_words($unique_css_class).' .bg-color-1{
     background-image: linear-gradient(-180deg, '.esc_attr($btn1_color_1).' 0%, '.esc_attr($btn1_color_2).' 100%) !important; 
} 
'; } $output.='
'; if(!empty($link_color)){ $output.='
.header-section-one.'.wp_trim_words($unique_css_class).' .link{
	color:'.esc_attr($link_color).' !important;
} 
'; } $output.='
'; if(!empty($btn1_txt_color)){ $output.='
.header-section-one.'.wp_trim_words($unique_css_class).' .button.bg-color-1{
	color:'.esc_attr($btn1_txt_color).' !important;
} 
'; } $output.='
'; if(!empty($sec2_heading1_color)){ $output.='
.hiw.'.wp_trim_words($unique_css_class).' .sec2_heading1{
	color:'.esc_attr($sec2_heading1_color).' !important;
} 
'; } $output.='
'; if(!empty($sec2_heading2_color)){ $output.='
.hiw.'.wp_trim_words($unique_css_class).' .sec2_heading2{
	color:'.esc_attr($sec2_heading2_color).' !important;
} 
'; } $output.='
'; if(!empty($sec2_heading3_color)){ $output.='
.hiw.'.wp_trim_words($unique_css_class).' .sec2_heading3{
	color:'.esc_attr($sec2_heading3_color).' !important;
} 
'; } $output.='
'; if(!empty($fbox_step_bg_color_primary) && !empty($fbox_step_bg_color_secondary)){ $output.='
.hiw.'.wp_trim_words($unique_css_class).' .fbox_step_number{
	background-image: linear-gradient(-180deg, '.esc_attr($fbox_step_bg_color_primary).' 0%, '.esc_attr($fbox_step_bg_color_secondary).' 100%);
} 
'; } $output.='
'; if(!empty($fbox_title_color)){ $output.='
.hiw.'.wp_trim_words($unique_css_class).' .fbox_title{
	color:'.esc_attr($fbox_title_color).' !important;
} 
'; } $output.='
'; if(!empty($fbox_desc_color)){ $output.='
.hiw.'.wp_trim_words($unique_css_class).' .fbox_desc{
	color:'.esc_attr($fbox_desc_color).' !important;

} 
'; } $output.='

</style>
';}	
 if(!empty($images3[0])){ $output.='
<style>
@media (max-width: 768px){
.dif-mobile-bg{
    background-image: url('.esc_url($images3[0]).') !important;
}
}
</style>
'; } 
;if(!empty($sec2_heading1) && empty($sec2_heading2) && empty($sec2_heading3)){ $output.='
<style>
.'.wp_trim_words($unique_css_class).' .line{
  top: 225px;	
}
</style>
';}
;if(!empty($sec2_heading2) && empty($sec2_heading1) && empty($sec2_heading3)){ $output.='
<style>
.'.wp_trim_words($unique_css_class).' .line{
  top: 250px;	
}
</style>
';}
;if(!empty($sec2_heading3) && empty($sec2_heading1) && empty($sec2_heading2)){ $output.='
<style>
.'.wp_trim_words($unique_css_class).' .line{
  top: 240px;	
}
</style>
';}
;if(!empty($sec2_heading1) && !empty($sec2_heading2) && !empty($sec2_heading3)){ $output.='
<style>
.'.wp_trim_words($unique_css_class).' .line{
  top: 300px;	
}
</style>
';}
;if(empty($sec2_heading1) && !empty($sec2_heading2) && !empty($sec2_heading3)){ $output.='
<style>
.'.wp_trim_words($unique_css_class).' .line{
  top: 280px;	
}
</style>
';}
;if(!empty($sec2_heading1) && empty($sec2_heading2) && !empty($sec2_heading3)){ $output.='
<style>
.'.wp_trim_words($unique_css_class).' .line{
  top: 255px;	
}
</style>
';}
;if(!empty($sec2_heading1) && !empty($sec2_heading2) && empty($sec2_heading3)){ $output.='
<style>
.'.wp_trim_words($unique_css_class).' .line{
  top: 265px;	
}
</style>
';}
	return $output;
}
add_shortcode('appeasy_shortcode_for_header_section_one', 'apparatus_header_section_one_shortcode');

/*****************
Header Section- 2
*****************/
//Function for Header Section- 2
function apparatus_header_section_two_shortcode( $atts ) {
	extract( shortcode_atts( array(
	'heading1' => '',
	'heading2' => '',
	'heading2_thin' => '',
	'heading3' => '',
	'tooltip_url' => '',
	'btn1_url' => '',
	'btn1_name' => '',
	'btn2_url' => '',
	'btn2_name' => '',
	'heading1_color' => '',
	'heading2_color' => '',
	'heading3_color' => '',
	'btn1_color_1' => '',
	'btn1_color_2' => '',
	'link_color' => '',
	'sec2_heading1' => '',
	'sec2_heading2' => '',
	'sec2heading2_thin' => '',
	'sec2_heading3' => '',
	'fbox_one_step_number' => '',
	'fbox_one_title' => '',
	'fbox_one_desc' => '',
	'fbox_two_step_number' => '',
	'fbox_two_title' => '',
	'fbox_two_desc' => '',
	'fbox_three_step_number' => '',
	'fbox_three_title' => '',
	'fbox_three_desc' => '',
	'fbox_four_step_number' => '',
	'fbox_four_title' => '',
	'fbox_four_desc' => '',
	'sec2_heading1_color' => '',
	'sec2_heading2_color' => '',
	'sec2_heading3_color' => '',
	'fbox_step_bg_color_primary' => '',
	'fbox_step_bg_color_secondary' => '',
	'fbox_title_color' => '',
	'fbox_desc_color' => '',
	'btn1_txt_color' => '',
	), $atts ) );

	for($i=0;$i<=50;$i++){
	$str = 'efghl';
	$shuffled = str_shuffle($str);
	}	
	$unique_css_class=$shuffled;	

	$gallery = shortcode_atts(
    array(
        'bg_image'      =>  'bg_image',
    ), $atts );
	$gallery2 = shortcode_atts(
    array(
        'image'      =>  'image',
    ), $atts );
	$image_ids = explode(',',$gallery['bg_image']);

	foreach( $image_ids as $image_id ){
    $images = wp_get_attachment_image_src( $image_id, 'bg_image' );
	}	
	$image_ids2 = explode(',',$gallery2['image']);	
	foreach( $image_ids2 as $image_id2 ){
    $images2 = wp_get_attachment_image_src( $image_id2, 'image' );
	}
	
	$gallery3 = shortcode_atts(
    array(
        'bg_image3'      =>  'bg_image3',
    ), $atts );
	
	$image_ids3 = explode(',',$gallery3['bg_image3']);

	foreach( $image_ids3 as $image_id ){
    $images3 = wp_get_attachment_image_src( $image_id, 'bg_image3' );
	}	
		$allowed_html_array = array(
		'b' => array(),
		'strong' => array(),
		'p' => array(),
		'br' => array(),
		'span' => array('class' => array()),
		'i' => array('class' => array()),
		'em' => array('class' => array()),
		);	
		

    $myArray = explode(',', $sec2heading2_thin);	
    $ret = $sec2_heading2;	
	foreach($myArray as $patterns){
    $ret = preg_replace('/\b'.$patterns.'\b/i',"<span class='thin'>$patterns</span>",$ret);   
	}
	$ret ;	
	
    $myArray2 = explode(',', $heading2_thin);	
    $ret2 = $heading2;	
	foreach($myArray2 as $patterns){
    $ret2 = preg_replace('/\b'.$patterns.'\b/i',"<span class='thin'>$patterns</span>",$ret2);   
	}
	$ret2 ;		
	$output = '<!-- Start Header Section-->
	<div style="background-image:url('.esc_url($images[0]).');background-size: contain;background-position: top;background-repeat: no-repeat;" class="dif-mobile-bg">
        <header class="header '.esc_attr($unique_css_class).' header-section-one"  >
            <div class="container">
                <div class="row header-row">
                    <!-- Main title -->
                    <div class="col-sm-12 col-md-6 align-self-center main-title">
					'; if(!empty($heading1)){ $output.='
                        <p class="light bold small main-suptitle sm-white heading1">'.wp_kses(__($heading1),$allowed_html_array).'</p>
					'; } $output.='	
					'; if(!empty($heading2)){ $output.='
                        <h1 class="heading2 sm-white">'.wp_kses(__($ret2),$allowed_html_array).'</h1>
					'; } $output.='	
					'; if(!empty($btn1_name)){ $output.='
                        <!-- Buttons -->
                        <a href="'.esc_url($btn1_url).'">
                            <div class="button bg-color-1">'.esc_attr($btn1_name).'</div>
                        </a>
					'; } $output.='	
					'; if(!empty($btn2_name)){ $output.='		
                        <a class="gray link sm-white" href="'.esc_url($btn2_url).'">'.esc_attr($btn2_name).' <i class="fas fa-chevron-right"></i></a>
					'; } $output.='		
                    </div>
                    <!-- Main title end -->
					'; if(!empty($images2[0])){ $output.='					
                    <!-- Phone -->
                    <div class="col-12 col-md-6 align-self-center header-macbook">
                        <img class="jump" src="'.esc_url($images2[0]).'" alt="">
                    </div>
                    <!-- Phone end -->
					'; } $output.='		
					
                </div>
				'; if(!empty($heading3)){ $output.='				
				<!-- Tooltip -->
                <a href="'.esc_url($tooltip_url).'">
                    <div class="header-tooltip"><i class="fas scroll-arrow bounce fa-angle-double-down"></i>
                        <p class="light thin small sm-white heading3">'.wp_kses(__($heading3),$allowed_html_array).'</p>
                    </div>
                </a>
                <!-- Tooltip end -->
				'; } $output.='				
            </div>
        </header>
        <!-- End Header end -->
		<!-- How it works -->
        <section  class="hiw p-90-35 '.esc_attr($unique_css_class).'">
            <div class="line"></div>
            <div class="container">
                <!-- Section title -->
                <div class="section-title sm-ac mb-70">
                    <p class="light bold small sec2_heading1">'.wp_kses(__($sec2_heading1),$allowed_html_array).'</p>
                    <h2 class="sec2_heading2">'.wp_kses(__($ret),$allowed_html_array).'</h2>
                    <p class="light thin sec2_heading3">'.wp_kses(__($sec2_heading3),$allowed_html_array).'</p>
                </div>
                <!-- Section title end -->
                <div class="row">
				
				'; if(!empty($fbox_one_step_number) && !empty($fbox_one_title) && !empty($fbox_one_desc)){ $output.='
                    <!-- Item 1 -->
                    <div class="col-6 col-sm-6 col-md-3 hiw-item mb-30">
                        <div class="bg-color-2 puls mb-30 fbox_step_number" style="animation-delay: 0s">'.esc_attr($fbox_one_step_number).'</div>
                        <p class="bold fbox_title">'.wp_kses(__($fbox_one_title),$allowed_html_array).'</p>
                        <p class="light thin fbox_desc">'.wp_kses(__($fbox_one_desc),$allowed_html_array).'</p>
                    </div>
				'; } $output.='
				'; if(!empty($fbox_two_step_number) && !empty($fbox_two_title) && !empty($fbox_two_desc)){ $output.='
                    <!-- Item 2 -->
                    <div class="col-6 col-sm-6 col-md-3 hiw-item mb-30">
                        <div class="bg-color-2 puls mb-30 fbox_step_number" style="animation-delay: .75s">'.esc_attr($fbox_two_step_number).'</div>
                        <p class="bold fbox_title">'.wp_kses(__($fbox_two_title),$allowed_html_array).'</p>
                        <p class="light thin fbox_desc">'.wp_kses(__($fbox_two_desc),$allowed_html_array).'</p>
                    </div>
				'; } $output.='
				'; if(!empty($fbox_three_step_number) && !empty($fbox_three_title) && !empty($fbox_three_desc)){ $output.='
                    <!-- Item 3 -->
                    <div class="col-6 col-sm-6 col-md-3 hiw-item mb-30">
                        <div class="bg-color-2 puls mb-30 fbox_step_number" style="animation-delay: 1.5s">'.esc_attr($fbox_three_step_number).'</div>
                        <p class="bold fbox_title">'.wp_kses(__($fbox_three_title),$allowed_html_array).'</p>
                        <p class="light thin fbox_desc">'.wp_kses(__($fbox_three_desc),$allowed_html_array).'</p>
                    </div>
					'; } $output.='
					'; if(!empty($fbox_four_step_number) && !empty($fbox_four_title) && !empty($fbox_four_desc)){ $output.='
                    <!-- Item 4 -->
                    <div class="col-6 col-sm-6 col-md-3 hiw-item mb-30">
                        <div class="bg-color-2 puls mb-30 fbox_step_number" style="animation-delay: 2.25s">'.esc_attr($fbox_four_step_number).'</div>
                        <p class="bold fbox_title">'.wp_kses(__($fbox_four_title),$allowed_html_array).'</p>
                        <p class="light thin fbox_desc">'.wp_kses(__($fbox_four_desc),$allowed_html_array).'</p>
                    </div>
					'; } $output.='
                </div>
            </div>
        </section>
		</div>
        <!-- How it works end -->
		';
if(!empty($unique_css_class)){ $output.='
<style>
'; if(!empty($heading1_color)){ $output.='
.header-section-one.'.wp_trim_words($unique_css_class).' .heading1{
	color:'.esc_attr($heading1_color).';
} 
'; } $output.='
'; if(!empty($heading2_color)){ $output.='
.header-section-one.'.wp_trim_words($unique_css_class).' .heading2{
	color:'.esc_attr($heading2_color).';
} 
'; } $output.='
'; if(!empty($heading3_color)){ $output.='
.header-section-one.'.wp_trim_words($unique_css_class).' .heading3{
	color:'.esc_attr($heading3_color).';
} 
'; } $output.='
'; if(!empty($btn1_color_1) && !empty($btn1_color_2)){ $output.='
.header-section-one.'.wp_trim_words($unique_css_class).' .bg-color-1{
     background-image: linear-gradient(-180deg, '.esc_attr($btn1_color_1).' 0%, '.esc_attr($btn1_color_2).' 100%) !important; 
} 
'; } $output.='
'; if(!empty($link_color)){ $output.='
.header-section-one.'.wp_trim_words($unique_css_class).' .link{
	color:'.esc_attr($link_color).';
} 
'; } $output.='
'; if(!empty($btn1_txt_color)){ $output.='
.header-section-one.'.wp_trim_words($unique_css_class).' .button.bg-color-1{
	color:'.esc_attr($btn1_txt_color).' !important;
} 
'; } $output.='
'; if(!empty($sec2_heading1_color)){ $output.='
.hiw.'.wp_trim_words($unique_css_class).' .sec2_heading1{
	color:'.esc_attr($sec2_heading1_color).' !important;
} 
'; } $output.='
'; if(!empty($sec2_heading2_color)){ $output.='
.hiw.'.wp_trim_words($unique_css_class).' .sec2_heading2{
	color:'.esc_attr($sec2_heading2_color).' !important;
} 
'; } $output.='
'; if(!empty($sec2_heading3_color)){ $output.='
.hiw.'.wp_trim_words($unique_css_class).' .sec2_heading3{
	color:'.esc_attr($sec2_heading3_color).' !important;
} 
'; } $output.='
'; if(!empty($fbox_step_bg_color_primary) && !empty($fbox_step_bg_color_secondary)){ $output.='
.hiw.'.wp_trim_words($unique_css_class).' .fbox_step_number{
	background-image: linear-gradient(-180deg, '.esc_attr($fbox_step_bg_color_primary).' 0%, '.esc_attr($fbox_step_bg_color_secondary).' 100%);
} 
'; } $output.='
'; if(!empty($fbox_title_color)){ $output.='
.hiw.'.wp_trim_words($unique_css_class).' .fbox_title{
	color:'.esc_attr($fbox_title_color).' !important;
} 
'; } $output.='
'; if(!empty($fbox_desc_color)){ $output.='
.hiw.'.wp_trim_words($unique_css_class).' .fbox_desc{
	color:'.esc_attr($fbox_desc_color).' !important;

} 
'; } $output.='

</style>
';}	
 if(!empty($images3[0])){ $output.='
<style>
@media (max-width: 768px){
.dif-mobile-bg{
    background-image: url('.esc_url($images3[0]).') !important;
}
}
</style>
'; } 
;if(!empty($sec2_heading1) && empty($sec2_heading2) && empty($sec2_heading3)){ $output.='
<style>
.'.wp_trim_words($unique_css_class).' .line{
  top: 225px;	
}
</style>
';}
;if(!empty($sec2_heading2) && empty($sec2_heading1) && empty($sec2_heading3)){ $output.='
<style>
.'.wp_trim_words($unique_css_class).' .line{
  top: 250px;	
}
</style>
';}
;if(!empty($sec2_heading3) && empty($sec2_heading1) && empty($sec2_heading2)){ $output.='
<style>
.'.wp_trim_words($unique_css_class).' .line{
  top: 240px;	
}
</style>
';}
;if(!empty($sec2_heading1) && !empty($sec2_heading2) && !empty($sec2_heading3)){ $output.='
<style>
.'.wp_trim_words($unique_css_class).' .line{
  top: 300px;	
}
</style>
';}
;if(empty($sec2_heading1) && !empty($sec2_heading2) && !empty($sec2_heading3)){ $output.='
<style>
.'.wp_trim_words($unique_css_class).' .line{
  top: 280px;	
}
</style>
';}
;if(!empty($sec2_heading1) && empty($sec2_heading2) && !empty($sec2_heading3)){ $output.='
<style>
.'.wp_trim_words($unique_css_class).' .line{
  top: 255px;	
}
</style>
';}
;if(!empty($sec2_heading1) && !empty($sec2_heading2) && empty($sec2_heading3)){ $output.='
<style>
.'.wp_trim_words($unique_css_class).' .line{
  top: 265px;	
}
</style>
';}
	return $output;
}
add_shortcode('appeasy_shortcode_for_header_section_two', 'apparatus_header_section_two_shortcode');

/*****************
Headline Section- 1
*****************/
//Function for Headline Section- 1
function apparatus_headline_section_one_shortcode( $atts ) {
	extract( shortcode_atts( array(
	'heading1' => '',
	'heading2' => '',
	'heading2_thin' => '',
	'heading3' => '',
	'heading1_color' => '',
	'heading2_color' => '',
	'heading3_color' => '',	
	), $atts ) );
	
	for($i=0;$i<=50;$i++){
	$str = 'ijklk';
	$shuffled = str_shuffle($str);
	}	
	$unique_css_class=$shuffled;	
	
		$allowed_html_array = array(
		'b' => array('class' => array()),
		'p' => array(),
		'br' => array(),
		'span' => array('class' => array()),
		'i' => array('class' => array()),
		'em' => array('class' => array()),
		);	
		
    $myArray = explode(',', $heading2_thin);	
    $ret = $heading2;	
	foreach($myArray as $patterns){
    $ret = preg_replace('/\b'.$patterns.'\b/i',"<span class='thin'>$patterns</span>",$ret);   
	}
	$ret ;		
	$output = '<!-- Start Headline Section-->
       
                <div class="section-title sm-ac p-15'; if(!empty($heading3)){ $output.=' mb-m5'; } else { $output.=' mb-m10'; }$output.=' '.esc_attr($unique_css_class).'">
                    <p class="light bold small headline1">'.esc_attr($heading1).'</p>
                    <h2 class="headline2">'.wp_kses(__($ret),$allowed_html_array).'</h2>
                    <p class="light thin headline3">'.wp_kses(__($heading3),$allowed_html_array).'</p>
                </div>

        <!-- End Headline Section -->
		';
if(!empty($unique_css_class)){ $output.='
<style>
'; if(!empty($heading1_color)){ $output.='
.section-title.'.wp_trim_words($unique_css_class).' .headline1{
	color:'.esc_attr($heading1_color).';
} 
'; } $output.='
'; if(!empty($heading2_color)){ $output.='
.section-title.'.wp_trim_words($unique_css_class).' .headline2{
	color:'.esc_attr($heading2_color).' !important;
} 
'; } $output.='
'; if(!empty($heading3_color)){ $output.='
.section-title.'.wp_trim_words($unique_css_class).' .headline3{
	color:'.esc_attr($heading3_color).';
} 
'; } $output.='
</style>
';}	
	return $output;
}
add_shortcode('appeasy_shortcode_for_headline_sec_one', 'apparatus_headline_section_one_shortcode');

/*****************
Feature Box-1
*****************/
//Function for Feature Box-1
function apparatus_feature_box_one_shortcode( $atts ) {
	extract( shortcode_atts( array(
	'heading1' => '',
	'heading2' => '',
	'heading1_color' => '',
	'heading2_color' => '',	
	'jump' => '',
	'jump_delay' => '0',
	), $atts ) );

	for($i=0;$i<=50;$i++){
	$str = 'mnopj';
	$shuffled = str_shuffle($str);
	}	
	$unique_css_class=$shuffled;
	
		$allowed_html_array = array(
		'b' => array('class' => array()),
		'p' => array(),
		'br' => array(),
		'span' => array('class' => array()),
		'i' => array('class' => array()),
		'em' => array('class' => array()),
		);		
	$gallery = shortcode_atts(
    array(
        'bg_image'      =>  'bg_image',
    ), $atts );

	$image_ids = explode(',',$gallery['bg_image']);
	foreach( $image_ids as $image_id ){
    $images = wp_get_attachment_image_src( $image_id, 'bg_image' );
	}		
	$output = '<!-- Start Feature Box -->
        <section class="features p-0-55 '.esc_attr($unique_css_class).'">

                    <!-- Features card  -->

                        <div class="card-features">
                            <img src="'.esc_url($images[0]).'" alt="icon"'; if ( $jump != false ) { $output .=' class="jump" style="animation-delay: '.$jump_delay.'s" '; } $output .='>
                            <p class="bold title">'.wp_kses(__($heading1),$allowed_html_array).'</p>
                            <p class="light thin desc">'.wp_kses(__($heading2),$allowed_html_array).'</p>
                        </div>
     				

        </section>
        <!-- End Feature Box  -->
		';
if(!empty($unique_css_class)){ $output.='
<style>
'; if(!empty($heading1_color)){ $output.='
.features.'.wp_trim_words($unique_css_class).' .title{
	color:'.esc_attr($heading1_color).' !important;
} 
'; } $output.='
'; if(!empty($heading2_color)){ $output.='
.features.'.wp_trim_words($unique_css_class).' .desc{
	color:'.esc_attr($heading2_color).';
} 
'; } $output.='
</style>
';}	
	return $output;
}
add_shortcode('appeasy_shortcode_for_feature_Box_one', 'apparatus_feature_box_one_shortcode');

/*****************
Video Section- 1
*****************/
//Function for Video Section- 1
function apparatus_video_sec_one_shortcode( $atts ) {
	extract( shortcode_atts( array(
	'heading1' => '',
	'heading2' => '',
	'heading2_thin' => '',
	'heading3' => '',
	'video_url' => '',
	'heading1_color' => '',
	'heading2_color' => '',	
	'heading3_color' => '',	
	'btn_bg_color_primary' => '',	
	'btn_bg_color_secondary' => '',	
	), $atts ) );

	for($i=0;$i<=50;$i++){
	$str = 'qrsti';
	$shuffled = str_shuffle($str);
	}	
	$unique_css_class=$shuffled;
	
		$allowed_html_array = array(
		'b' => array('class' => array()),
		'p' => array(),
		'br' => array(),
		'span' => array('class' => array()),
		'i' => array('class' => array()),
		);	
	$gallery = shortcode_atts(
    array(
        'bg_image'      =>  'bg_image',
    ), $atts );

	$image_ids = explode(',',$gallery['bg_image']);
	foreach( $image_ids as $image_id ){
    $images = wp_get_attachment_image_src( $image_id, 'bg_image' );
	}	
    $myArray = explode(',', $heading2_thin);	
    $ret = $heading2;	
	foreach($myArray as $patterns){
    $ret = preg_replace('/\b'.$patterns.'\b/i',"<span class='thin'>$patterns</span>",$ret);   
	}
	$ret ;	
	
	$output = '<!-- Start Video Section -->
        <section class="video bg-animation p-90-60 '.esc_attr($unique_css_class).'">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-7 align-self-center mb-30">
                        <!-- Section title -->
                        <div class="section-title">
                            <p class="white-light bold small heading1">'.wp_kses(__($heading1),$allowed_html_array).'</p>
                            <h2 class="h1 white heading2">'.wp_kses($ret,$allowed_html_array).'</h2>
                            <p class="white-light thin m-0 heading3">'.wp_kses(__($heading3),$allowed_html_array).'</p>
                        </div>
                        <!-- Section title end -->
                    </div>
                    <!-- Play button -->
                    <div class="col-12 col-sm-5 align-self-center mb-30">
                        <div class="play-frame play-rotate"></div>
                        <a href="'.esc_url($video_url).'" data-lity>
                            <div class="play-button bg-color-1">
                                <i class="fas fa-play"></i>
                            </div>
                        </a>
                    </div>
                    <!-- Play button end -->
                </div>
            </div>
        </section>
        <!-- End Video Section  -->
		';
if(!empty($unique_css_class)){ $output.='
<style>
'; if(!empty($images[0])){ $output.='
.video.'.wp_trim_words($unique_css_class).' {
    background-image: url('.esc_url($images[0]).');
}

'; } $output.='
'; if(!empty($heading1_color)){ $output.='
.video.'.wp_trim_words($unique_css_class).' .heading1{
	color:'.esc_attr($heading1_color).';
} 
'; } $output.='
'; if(!empty($heading2_color)){ $output.='
.video.'.wp_trim_words($unique_css_class).' .heading2{
	color:'.esc_attr($heading2_color).' !important;
} 
'; } $output.='
'; if(!empty($heading3_color)){ $output.='
.video.'.wp_trim_words($unique_css_class).' .heading3{
	color:'.esc_attr($heading3_color).';
} 
'; } $output.='
'; if(!empty($btn_bg_color_primary) && !empty($btn_bg_color_secondary)){ $output.='
.video.'.wp_trim_words($unique_css_class).' .bg-color-1{
	background-image: linear-gradient(-180deg, '.esc_attr($btn_bg_color_primary).' 0%, '.esc_attr($btn_bg_color_secondary).' 100%);
} 
'; } $output.='
</style>
';}	
	return $output;
}
add_shortcode('appeasy_shortcode_for_video_sec_one', 'apparatus_video_sec_one_shortcode');

/*****************
What we offer Section- 1
*****************/
//Function for What we offer Section- 1
function apparatus_wwo_sec_one_shortcode( $atts ) {
	extract( shortcode_atts( array(
	'heading1' => '',
	'heading2' => '',
	'heading2_thin' => '',
	'desc' => '',
	'btn1_name' => '',	
	'btn1_url' => '',	
	'btn2_name' => '',	
	'btn2_url' => '',
	'heading1_color' => '',
	'heading2_color' => '',	
	'desc_color' => '',	
	'btn1_bg_color_primary' => '',	
	'btn1_bg_color_secondary' => '',	
	'btn2_link_color' => '',
	'btn1_txt_color' => '',
	'jump' => '',
	), $atts ) );

	for($i=0;$i<=50;$i++){
	$str = 'uvwxh';
	$shuffled = str_shuffle($str);
	}	
	$unique_css_class=$shuffled;
	
	$allowed_html_array = array(
		'b' => array('class' => array()),
		'p' => array(),
		'br' => array(),
		'span' => array('class' => array()),
		);	
	$gallery = shortcode_atts(
    array(
        'image'      =>  'image',
    ), $atts );

	$image_ids = explode(',',$gallery['image']);
	foreach( $image_ids as $image_id ){
    $images = wp_get_attachment_image_src( $image_id, 'image' );
	}	
    $myArray = explode(',', $heading2_thin);	
    $ret = $heading2;	
	foreach($myArray as $patterns){
    $ret = preg_replace('/\b'.$patterns.'\b/i',"<span class='thin'>$patterns</span>",$ret);   
	}
	$ret ;	
	$output = '<!-- Start Who We Are Section -->
        <section  class="about about-1 p-30-30 '.esc_attr($unique_css_class).'">
            <div class="container">
                <div class="row">
                    <!-- Text -->
                    <div class="col-12 col-lg-5 order-lg-last mb-30 align-self-center">
                        <!-- Title -->
                        <div class="section-title mb-30">
                            <p class="light bold small heading1">'.wp_kses(__($heading1),$allowed_html_array).'</p>
                            <h2 class="heading2">'.wp_kses(__($ret),$allowed_html_array).'</h2>
                        </div>
                        <!-- Text -->
                        <p class="light thin desc">'.wp_kses(__($desc),$allowed_html_array).'</p>
                        <!-- Buttons -->
                        <a href="'.esc_url($btn1_url).'">
                            <div class="button bg-color-1">'.esc_attr($btn1_name).'</div>
                        </a>
                        <a class="gray link" href="'.esc_url($btn2_url).'">'.esc_attr($btn2_name).' <i class="fas fa-chevron-right"></i></a>
                    </div>
                    <!-- Ilustration -->
                    <div class="col-12 col-lg-7 mb-30 pull-lg-7 align-self-center screens-1">
                        <img src="'.esc_url($images[0]).'" '; if ( $jump != false ) { $output .='class="jump" '; } $output .='alt="image">
                    </div>
                </div>
            </div>
        </section>
        <!-- End Who We Are Section  -->
		';
if(!empty($unique_css_class)){ $output.='
<style>
'; if(!empty($heading1_color)){ $output.='
.about.'.wp_trim_words($unique_css_class).' .heading1{
color:'.esc_attr($heading1_color).';
}
'; } $output.='
'; if(!empty($heading2_color)){ $output.='
.about.'.wp_trim_words($unique_css_class).' .heading2{
color:'.esc_attr($heading2_color).' !important;
}
'; } $output.='
'; if(!empty($desc_color)){ $output.='
.about.'.wp_trim_words($unique_css_class).' .desc{
color:'.esc_attr($desc_color).';
}
'; } $output.='
'; if(!empty($btn1_bg_color_primary) && !empty($btn1_bg_color_secondary)){ $output.='
.about.'.wp_trim_words($unique_css_class).' .bg-color-1{
    background-image: linear-gradient(-180deg, '.esc_attr($btn1_bg_color_primary).' 0%, '.esc_attr($btn1_bg_color_secondary).' 100%) !important;
}
'; } $output.='
'; if(!empty($btn2_link_color)){ $output.='
.about.'.wp_trim_words($unique_css_class).' .link{
color:'.esc_attr($btn2_link_color).' !important;
}
'; } $output.='
'; if(!empty($btn1_txt_color)){ $output.='
.about.'.wp_trim_words($unique_css_class).' .button.bg-color-1{
color:'.esc_attr($btn1_txt_color).' !important;
}
'; } $output.='
</style>
';}	
	return $output;
}
add_shortcode('appeasy_shortcode_for_wwo_sec_one', 'apparatus_wwo_sec_one_shortcode');

/*****************
What we offer Section- 2
*****************/
//Function for What we offer Section- 2
function apparatus_wwo_sec_two_shortcode( $atts ) {
	extract( shortcode_atts( array(
	'heading1' => '',
	'heading2' => '',
	'heading2_thin' => '',
	'desc' => '',
	'btn1_name' => '',	
	'btn1_url' => '',	
	'btn2_name' => '',	
	'btn2_url' => '',
	'heading1_color' => '',
	'heading2_color' => '',	
	'desc_color' => '',	
	'btn1_bg_color' => '',	
	'btn1_txt_color' => '',	
	'btn2_link_color' => '',
	'btn1_bg_color_primary' => '',	
	'btn1_bg_color_secondary' => '',
	'jump' => '',
	), $atts ) );

	for($i=0;$i<=50;$i++){
	$str = 'yzabg';
	$shuffled = str_shuffle($str);
	}	
	$unique_css_class=$shuffled;
	
	$allowed_html_array = array(
		'b' => array('class' => array()),
		'p' => array(),
		'br' => array(),
		'span' => array('class' => array()),
		);	
	$gallery = shortcode_atts(
    array(
        'image'      =>  'image',
    ), $atts );

	$image_ids = explode(',',$gallery['image']);
	foreach( $image_ids as $image_id ){
    $images = wp_get_attachment_image_src( $image_id, 'image' );
	}
    $myArray = explode(',', $heading2_thin);
    $ret = $heading2;	
	foreach($myArray as $patterns){
    $ret = preg_replace('/\b'.$patterns.'\b/i',"<span class='thin'>$patterns</span>",$ret);   
	}
	$ret ;	
	$output = '<!-- Start Who We Are Section -->
        <section  class="about about-1 p-5-30 '.esc_attr($unique_css_class).'">
            <div class="container">
                <div class="row">
                    <!-- Text -->
                    <div class="col-12 col-lg-5  mb-30 align-self-center">
                        <!-- Title -->
                        <div class="section-title mb-30">
                            <p class="light bold small heading1">'.wp_kses(__($heading1),$allowed_html_array).'</p>
                            <h2 class="heading2">'.wp_kses(__($ret),$allowed_html_array).'</h2>
                        </div>
                        <!-- Text -->
                        <p class="light thin desc">'.wp_kses(__($desc),$allowed_html_array).'</p>
                        <!-- Buttons -->
                        <a href="'.esc_url($btn1_url).'">
                            <div class="button bg-color-1">'.esc_attr($btn1_name).'</div>
                        </a>
                        <a class="gray link" href="'.esc_url($btn2_url).'">'.esc_attr($btn2_name).' <i class="fas fa-chevron-right"></i></a>
                    </div>
                    <!-- Ilustration -->
                    <div class="col-12 col-lg-7 mb-30  align-self-center screens-1">
                        <img src="'.esc_url($images[0]).'" '; if ( $jump != false ) { $output .='class="jump" '; } $output .='alt="image">
                    </div>
                </div>
            </div>
        </section>
        <!-- End Who We Are Section  -->
		';
if(!empty($unique_css_class)){ $output.='
<style>
'; if(!empty($heading1_color)){ $output.='
.about.'.wp_trim_words($unique_css_class).' .heading1{
color:'.esc_attr($heading1_color).';
}
'; } $output.='
'; if(!empty($heading2_color)){ $output.='
.about.'.wp_trim_words($unique_css_class).' .heading2{
color:'.esc_attr($heading2_color).' !important;
}
'; } $output.='
'; if(!empty($desc_color)){ $output.='
.about.'.wp_trim_words($unique_css_class).' .desc{
color:'.esc_attr($desc_color).';
}
'; } $output.='
'; if(!empty($btn1_bg_color_primary) && !empty($btn1_bg_color_secondary)){ $output.='
.about.'.wp_trim_words($unique_css_class).' .bg-color-1{
    background-image: linear-gradient(-180deg, '.esc_attr($btn1_bg_color_primary).' 0%, '.esc_attr($btn1_bg_color_secondary).' 100%) !important;
}
'; } $output.='
'; if(!empty($btn2_link_color)){ $output.='
.about.'.wp_trim_words($unique_css_class).' .link{
color:'.esc_attr($btn2_link_color).' !important;
}
'; } $output.='
'; if(!empty($btn1_txt_color)){ $output.='
.about.'.wp_trim_words($unique_css_class).' .button.bg-color-1{
color:'.esc_attr($btn1_txt_color).' !important;
}
'; } $output.='
</style>
';}	
	return $output;
}
add_shortcode('appeasy_shortcode_for_wwo_sec_two', 'apparatus_wwo_sec_two_shortcode');

/*****************
Team Member Box- 1
*****************/
//Function for Team Member Box- 1
function apparatus_team_member_box_one_shortcode( $atts ) {
	extract( shortcode_atts( array(	
	'name' => '',	
	'designation' => '',	
	'twitter_url' => '',	
	'facebook_url' => '',	
	'dribble_url' => '',	
	'behance_url' => '',	
	'name_color' => '',	
	'designation_color' => '',	
	), $atts ) );

	for($i=0;$i<=50;$i++){
	$str = 'cdeff';
	$shuffled = str_shuffle($str);
	}	
	$unique_css_class=$shuffled;
	
	$allowed_html_array = array(
		'b' => array('class' => array()),
		'p' => array(),
		'br' => array(),
		'span' => array('class' => array()),
		);	
	$gallery = shortcode_atts(
    array(
        'image'      =>  'image',
    ), $atts );

	$image_ids = explode(',',$gallery['image']);
	foreach( $image_ids as $image_id ){
    $images = wp_get_attachment_image_src( $image_id, 'image' );
	}		
	$output = '<!-- Start Team Member Section -->
        <section class="team p-0-60 '.esc_attr($unique_css_class).'">
                        <div class="team-member">
                            <img src="'.esc_url($images[0]).'" alt="team member">
                        </div>
                        <div class="member-descr text-center">
                            <p class="bold name">'.esc_attr($name).'</p>
                            <p class="light thin desingation"><i>'.esc_attr($designation).'</i></p>
                            <!-- Social icons -->
                            <div class="member-social">
                                <ul>
                                    <li><a href="'.esc_url($twitter_url).'"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="'.esc_url($facebook_url).'"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="'.esc_url($dribble_url).'"><i class="fab fa-dribbble"></i></a></li>
                                    <li><a href="'.esc_url($behance_url).'"><i class="fab fa-behance"></i></a></li>
                                </ul>
                            </div>
                            <!-- Social icons end -->
                        </div>
        </section>
        <!-- End Team Member Section  -->
		';
if(!empty($unique_css_class)){ $output.='
<style>
'; if(!empty($name_color)){ $output.='
.team.'.wp_trim_words($unique_css_class).' .name{
color:'.esc_attr($name_color).';
}
'; } $output.='
'; if(!empty($designation_color)){ $output.='
.team.'.wp_trim_words($unique_css_class).' .desingation{
color:'.esc_attr($designation_color).';
}
'; } $output.='
</style>
';}	
	return $output;
}
add_shortcode('appeasy_shortcode_for_team_member_box_one', 'apparatus_team_member_box_one_shortcode');


/*****************
Call to Action- 1
*****************/
//Function for Call to Action- 1
function apparatus_call_to_action_one_shortcode( $atts ) {
	extract( shortcode_atts( array(		
	'heading1' => '',		
	'heading2' => '',		
	'heading2_thin' => '',		
	'heading3' => '',			
	'btn1_name' => '',			
	'btn1_url' => '',	
	'btn2_name' => '',			
	'btn2_url' => '',
	'heading1_color' => '',		
	'heading2_color' => '',		
	'heading3_color' => '',	
	'btn1_bg_color_primary' => '',	
	'btn1_bg_color_secondary' => '',	
	'btn2_link_color' => '',
	'btn1_txt_color' => '',	
	), $atts ) );

	for($i=0;$i<=50;$i++){
	$str = 'ghije';
	$shuffled = str_shuffle($str);
	}	
	$unique_css_class=$shuffled;
	
	$allowed_html_array = array(
		'b' => array('class' => array()),
		'p' => array(),
		'br' => array(),
		'span' => array('class' => array()),
		);	
	$gallery = shortcode_atts(
    array(
        'bg_image'      =>  'bg_image',
    ), $atts );

	$image_ids = explode(',',$gallery['bg_image']);
	foreach( $image_ids as $image_id ){
    $images = wp_get_attachment_image_src( $image_id, 'bg_image' );
	}	
    $myArray = explode(',', $heading2_thin);	
    $ret = $heading2;	
	foreach($myArray as $patterns){
    $ret = preg_replace('/\b'.$patterns.'\b/i',"<span class='thin'>$patterns</span>",$ret);   
	}
	$ret ;
	
	$output = '<!-- Start Call to Action -->
        <section class="call-to-action bg-animation p-90-60 '.esc_attr($unique_css_class).'"  ';if(!empty($images[0])){ $output.='style="background-image:url('.esc_url($images[0]).')"'; } $output.='>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7 align-self-center mb-30">
                        <!-- Section title -->
                        <div class="section-title">
                            <p class="white-light bold small heading1">'.wp_kses(__($heading1),$allowed_html_array).'</p>
                            <h2 class="h1 white heading2">'.wp_kses(__($ret),$allowed_html_array).'</h2>
                            <p class="white-light thin m-0 heading3">'.wp_kses(__($heading3),$allowed_html_array).'</p>
                        </div>
                        <!-- Section title end -->
                    </div>
                    <div class="col-12 col-lg-5 align-self-center mb-30">
					';if(!empty($btn1_name)){ $output.='
                        <a href="'.esc_url($btn1_url).'" class="m-0" aria-haspopup="true">
                            <div class="button bg-color-1">'.esc_attr($btn1_name).'</div>
                        </a>
					'; } $output.='	
					';if(!empty($btn2_name)){ $output.='
                        <a class="white-link m-0" href="'.esc_url($btn2_url).'" aria-haspopup="true">'.esc_attr($btn2_name).' <i class="fas fa-chevron-right"></i></a>
					'; } $output.='
                    </div>
                </div>
            </div>
        </section>
        <!-- End Call to Action  -->
		';
if(!empty($unique_css_class)){ $output.='
<style>
'; if(!empty($heading1_color)){ $output.='
.call-to-action.'.wp_trim_words($unique_css_class).' .heading1{
color:'.esc_attr($heading1_color).';
}
'; } $output.='
'; if(!empty($heading2_color)){ $output.='
.call-to-action.'.wp_trim_words($unique_css_class).' .heading2{
color:'.esc_attr($heading2_color).';
}
'; } $output.='
'; if(!empty($heading3_color)){ $output.='
.call-to-action.'.wp_trim_words($unique_css_class).' .heading3{
color:'.esc_attr($heading3_color).';
}
'; } $output.='
'; if(!empty($btn1_bg_color_primary) && !empty($btn1_bg_color_secondary)){ $output.='
.call-to-action.'.wp_trim_words($unique_css_class).' .bg-color-1{
    background-image: linear-gradient(-180deg, '.esc_attr($btn1_bg_color_primary).' 0%, '.esc_attr($btn1_bg_color_secondary).' 100%) !important;
}
'; } $output.='
'; if(!empty($btn2_link_color)){ $output.='
.call-to-action.'.wp_trim_words($unique_css_class).' .white-link{
color:'.esc_attr($btn2_link_color).';
}
'; } $output.='
'; if(!empty($btn1_txt_color)){ $output.='
.call-to-action.'.wp_trim_words($unique_css_class).' .button.bg-color-1{
color:'.esc_attr($btn1_txt_color).' !important;
}
'; } $output.='
</style>
';}	
	return $output;
}
add_shortcode('appeasy_shortcode_for_call_to_action_one', 'apparatus_call_to_action_one_shortcode');

/*****************
Testimonial Slider- 1
*****************/
//Function for Testimonial Slider-1

function apparatus_testimonial_slider_one_shortcode( $atts ) {
	extract( shortcode_atts( array(		
	'heading1' => '',		
	'heading2' => '',		
	'heading2_thin' => '',		
	'heading3' => '',			
	'arrow_title' => '',			
	'name_color' => '',			
	'designation_color' => '',			
	'description_color' => '',	
	'btn1_bg_color_primary' => '',	
	'btn1_bg_color_secondary' => '',	
	'arrow_title_color' => '',	
	
	), $atts ) );

	for($i=0;$i<=50;$i++){
	$str = 'klmnd';
	$shuffled = str_shuffle($str);
	}	
	$unique_css_class=$shuffled;
	
	$allowed_html_array = array(
		'b' => array('class' => array()),
		'p' => array(),
		'br' => array(),
		'span' => array('class' => array()),
		);	
   $a = shortcode_atts(array(
        'number_of_testimonial' => '',
    ),$atts);
	
    $myArray = explode(',', $heading2_thin);	
    $ret = $heading2;	
	foreach($myArray as $patterns){
    $ret = preg_replace('/\b'.$patterns.'\b/i',"<span class='thin'>$patterns</span>",$ret);   
	}
	$ret ;	
	$output = '<!-- Start Testimonial Slider Section -->
        <section  class="testimonials p-80-0 '.esc_attr($unique_css_class).'">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <!-- Section title -->
                        <div class="section-title sm-ac mb-70">
                            <p class="light bold small heading1">'.wp_kses(__($heading1),$allowed_html_array).'</p>
                            <h2 class="heading2">'.wp_kses(__($ret),$allowed_html_array).'</h2>
                            <p class="light thin heading3">'.wp_kses(__($heading3),$allowed_html_array).'</p>
                        </div>
                        <!-- Section title end -->
                    </div>
                    <div class="col-12 col-md-5 testimonials-tooltip">
                        <div class="nav-container sm-ac"></div>
                        <p class="light thin small sm-ac arrow_title">'.esc_attr($arrow_title).'</p>
                    </div>
                </div>
                <div id="owl" class="testimonial-slider">
';
	$i=1;
	$c=0;
	while ($i<=$a['number_of_testimonial']){
	$c++;
	$b = shortcode_atts(array(
	'description'.$c.'' => '',
	'name'.$c.'' => '',
	'designation'.$c.'' => '',
	'image'.$c.'' => '',
    ),$atts);
	
	$description  =$b['description'.$c.''];
	$name =$b['name'.$c.''];
	$designation =$b['designation'.$c.''];
	$image =$b['image'.$c.''];
	
  $output.='				
                    <!-- Start Item -->
                    <div class="item">
                        <div class="testimonial">
                            <div class="dialog">
                                <p class="light thin description">'.esc_attr($description).'</p>
                            </div>
                            <div class="user-name">
                                <div class="user"><img src="'.esc_url($image).'" alt="user"></div>
                                <p class="m-0 bold name">'.esc_attr($name).'</p>
                                <p class="light thin small designation">'.esc_attr($designation).'</p>
                            </div>
                        </div>
                    </div>
					<!-- End Item -->
';
$i++;
}
$output .='
                </div>

            </div>
        </section>
        <!-- End Testimonial Slider Section  -->
		';
if(!empty($unique_css_class)){ $output.='
<style>
'; if(!empty($name_color)){ $output.='
.testimonials.'.wp_trim_words($unique_css_class).' .name{
color:'.esc_attr($name_color).';
}
'; } $output.='
'; if(!empty($designation_color)){ $output.='
.testimonials.'.wp_trim_words($unique_css_class).' .designation{
color:'.esc_attr($designation_color).';
}
'; } $output.='
'; if(!empty($description_color)){ $output.='
.testimonials.'.wp_trim_words($unique_css_class).' .description{
color:'.esc_attr($description_color).';
}
'; } $output.='
'; if(!empty($btn1_bg_color_primary) && !empty($btn1_bg_color_secondary)){ $output.='
.testimonials.'.wp_trim_words($unique_css_class).' .nav-container div{
    background-image: linear-gradient(-180deg, '.esc_attr($btn1_bg_color_primary).' 0%, '.esc_attr($btn1_bg_color_secondary).' 100%) !important;
}
'; } $output.='
'; if(!empty($arrow_title_color)){ $output.='
.testimonials.'.wp_trim_words($unique_css_class).' .arrow_title{
color:'.esc_attr($arrow_title_color).';
}
'; } $output.='
</style>
';}	
	return $output;
}
add_shortcode('appeasy_shortcode_for_testimonial_slider_one', 'apparatus_testimonial_slider_one_shortcode');

/*****************
Screenshot Slider
*****************/
//Function for Screenshot Slider

function apparatus_screenshots_slider_shortcode( $atts ) {
	extract( shortcode_atts( array(		
	'heading1' => '',		
	'heading2' => '',		
	'heading2_thin' => '',		
	'heading3' => '',			
	'arrow_title' => '',
	'btn1_bg_color_primary' => '',	
	'btn1_bg_color_secondary' => '',	
	'arrow_title_color' => '',	
	
	), $atts ) );
	
	for($i=0;$i<=50;$i++){
	$str = 'klmnd';
	$shuffled = str_shuffle($str);
	}	
	$unique_css_class=$shuffled;
	
	$allowed_html_array = array(
		'b' => array('class' => array()),
		'p' => array(),
		'br' => array(),
		'span' => array('class' => array()),
		);
	
    $myArray = explode(',', $heading2_thin);	
    $ret = $heading2;	
	foreach($myArray as $patterns){
    $ret = preg_replace('/\b'.$patterns.'\b/i',"<span class='thin'>$patterns</span>",$ret);   
	}
	$ret ;	
	
	$gallery = shortcode_atts(
    array(
        'apps_screenshot'      =>  'apps_screenshot',
    ), $atts );

	$image_ids = explode(',',$gallery['apps_screenshot']);
	
	$output = '<section id="screenshots" class="screenshots p-80-0 '.esc_attr($unique_css_class).'">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <!-- Section title -->
                        <div class="section-title sm-ac mb-70">
                            <p class="light bold small heading1">'.wp_kses(__($heading1),$allowed_html_array).'</p>
                            <h2 class="heading2">'.wp_kses(__($ret),$allowed_html_array).'</h2>
                            <p class="light thin heading3">'.wp_kses(__($heading3),$allowed_html_array).'</p>
                        </div>
                        <!-- Section title end -->
                    </div>
                    <div class="col-12 col-md-5 testimonials-tooltip">
                        <div class="nav-container-screen sm-ac"></div>
                        <p class="light thin small sm-ac arrow_title">'.esc_attr($arrow_title).'</p>
                    </div>
                </div>
                <div class="screenshots-slider">

			';
			foreach( $image_ids as $image_id ){
				$images = wp_get_attachment_image_src( $image_id, 'apps_screenshot' ); $output .='			
                            <div class="slide wow">
                                <a href="'.esc_url($images[0]).'"><img src="'.esc_url($images[0]).'" alt="Screenshot"></a>
                            </div>
			';} $output .='
                 </div>

            </div>
        </section>
        <!-- End Screenshot Slider Section  -->
		';

if(!empty($unique_css_class)){ $output.='
<style>
'; $output.='
'; if(!empty($btn1_bg_color_primary) && !empty($btn1_bg_color_secondary)){ $output.='
.screenshots.'.wp_trim_words($unique_css_class).' .nav-container-screen div{
    background-image: linear-gradient(-180deg, '.esc_attr($btn1_bg_color_primary).' 0%, '.esc_attr($btn1_bg_color_secondary).' 100%) !important;
}
'; } $output.='
'; if(!empty($arrow_title_color)){ $output.='
.screenshots.'.wp_trim_words($unique_css_class).' .arrow_title{
color:'.esc_attr($arrow_title_color).';
}
'; } $output.='
</style>
';}	
	return $output;
}
add_shortcode('appeasy_shortcode_for_screenshots_slider', 'apparatus_screenshots_slider_shortcode');

/*****************
Clients Logo Slider- 1
*****************/
//Function for Clients Logo Slider- 1

function apparatus_clients_logo_slider_shortcode( $atts ) {

	
	$allowed_html_array = array(
		'b' => array('class' => array()),
		'p' => array(),
		'br' => array(),
		'span' => array('class' => array()),
		);	
	$gallery = shortcode_atts(
    array(
        'company_logo'      =>  'company_logo',
    ), $atts );

	$image_ids = explode(',',$gallery['company_logo']);
	
	$output = '<!-- Start Clients Logo Slider Section -->
        <section  class="clients_logo_slider testimonials">
		
                <div class="brands mb-30">
                    <div class="container">
                        <!-- Owl carousel -->
                        <div class="owl-carousel brands-slider owl-theme">						

			';
			foreach( $image_ids as $image_id ){
				$images = wp_get_attachment_image_src( $image_id, 'company_logo' ); $output .='			
                            <div class="item">
                                <!-- Brand 1 -->
                                <img src="'.esc_url($images[0]).'" alt="brand">
                            </div>
			';} $output .='
                        </div>
                        <!-- Owl carousel end -->
                    </div>
                </div>
              
        </section>
        <!-- End Clients Logo Slider Section  -->
		';

	return $output;
}
add_shortcode('appeasy_shortcode_for_clients_logo_slider', 'apparatus_clients_logo_slider_shortcode');

/*****************
Pricing Table- 1
*****************/
//Function for Pricing Table- 1

function apparatus_pricing_table_one_shortcode( $atts ) {
	extract( shortcode_atts( array(	
	'plan_name' => '',	
	'plan_desc' => '',	
	'plan_currency' => '',	
	'plan_duration' => '',	
	'plan_price' => '',	
	'features' 		=> '',	
	'mute_features' 		=> '',
	'plan_btn_name' => '',	
	'plan_btn_icon' => '',	
	'plan_btn_url' => '',	
	'plan_btn_color' => '',
	'paypal' => '',
	'email' => '',
	'currency' => '',
	'return_url' => '',
	'bg_color' 		=> '',	
	'plan_name_color' 		=> '',	
	'plan_description_color' 		=> '',	
	'plan_price_color' 		=> '',	
	'plan_features_color' 		=> '',	
	'plan_btn_bg_color_primary' 		=> '',	
	'plan_btn_bg_color_secondary' 		=> '',	
	), $atts ) );
	
	$allowed_html_array = array(
		'b' => array('class' => array()),
		'p' => array(),
		'br' => array(),
		'span' => array('class' => array()),
		);	
		
	
	for($i=0;$i<=50;$i++){
	$str = 'opqrc';
	$shuffled = str_shuffle($str);
	}	
	$unique_css_class=$shuffled;
		
	$content='';	
	if(!empty($features)){

      $output_result = '<ul class="pricing-detail gray">';
      $features = !empty($features) ? explode("\n", trim($features)) : array();
	  $c=-1;
      foreach($features as $feature) {
	  $c++;
	
		$output_result .='<li>'.htmlspecialchars_decode($feature).'</li>';
      }
      $output_result .= '</ul>';
      $content = $output_result;
    }
	$content2='';	
	if(!empty($mute_features)){

      $output_result2 = '<ul class="pricing-detail gray disabled-features">';
      $mute_feature = !empty($mute_features) ? explode("\n", trim($mute_features)) : array();
	  $c=-1;
      foreach($mute_feature as $mute_features) {
	  $c++;
	
		$output_result2 .='<li class="mute">'.htmlspecialchars_decode($mute_features).'</li>';
      }
      $output_result2 .= '</ul>';
      $content2 = $output_result2;
    }

	
	$output = '<!-- Start Price Table -->
        <section class="pricing p-55-60 '.esc_attr($unique_css_class).'">

                        <div class="pricing-table text-center">
                            <div class="row">
                                <div class="col-12">
                                    <p class="bold price-header plan_name">'.esc_attr($plan_name).'</p>
                                </div>
                                <div class="col-12">
                                    <p class="light thin plan_desc">
                                       '.esc_attr($plan_desc).'
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="bold price plan_price">'.esc_attr($plan_currency).'<span>'.esc_attr($plan_price).'</span>'.esc_attr($plan_duration).'</p>
                                </div>
                                <div class="col-12">
									'.do_shortcode($content).'  
'; if(!empty($mute_features)){ $output.='									
									'.do_shortcode($content2).'  
';} $output.='									
                                </div>
                                <div class="col-12">';
                                    if ( $paypal != true ) {	
	$output .='						<a href="'.esc_url( $plan_btn_url ).'" class="button bg-color-2"><i class="'.esc_attr($plan_btn_icon).'"></i> '.esc_attr($plan_btn_name).'</a>';				
										} else {	
	$output .= '						<form method="post" action="https://www.paypal.com/cgi-bin/webscr">
										<input type="hidden" value="_xclick" name="cmd">
										<input type="hidden" value="'.esc_attr( $email ).'" name="business">
										<input type="hidden" value="'.esc_attr( $plan_name ).'" name="item_name">
										<input type="hidden" value="'.esc_attr( $currency ).'" name="currency_code">
										<input type="hidden" value="'.esc_attr( $plan_price ).'" name="amount">
										<input type="hidden" value="'.esc_url( $return_url ).'" name="return">
										<button class="button bg-color-2" type="submit" name="submit"><i class="'.esc_attr($plan_btn_icon).'"></i> '.esc_attr($plan_btn_name).'</button>
									</form>';
									}
	$output .='
                                </div>
                            </div>
                        </div>

        </section>
        <!-- End Price Table  -->
		';
	
if(!empty($unique_css_class)){ $output.='
<style>
'; if(!empty($bg_color)){ $output.='
.pricing.'.wp_trim_words($unique_css_class).' .pricing-table{
background-color:'.esc_attr($bg_color).';
}
'; } $output.='
'; if(!empty($plan_name_color)){ $output.='
.pricing.'.wp_trim_words($unique_css_class).' .plan_name{
color:'.esc_attr($plan_name_color).';
}
'; } $output.='
'; if(!empty($plan_description_color)){ $output.='
.pricing.'.wp_trim_words($unique_css_class).' .plan_desc{
color:'.esc_attr($plan_description_color).';
}
'; } $output.='
'; if(!empty($plan_price_color)){ $output.='
.pricing.'.wp_trim_words($unique_css_class).' .plan_price{
color:'.esc_attr($plan_price_color).';
}
'; } $output.='
'; if(!empty($plan_features_color)){ $output.='
.pricing.'.wp_trim_words($unique_css_class).' .pricing-detail li{
color:'.esc_attr($plan_features_color).';
}
'; } $output.='
'; if(!empty($plan_btn_color)){ $output.='
.pricing.'.wp_trim_words($unique_css_class).' .button{
color:'.esc_attr($plan_btn_color).' !important;
}
'; } $output.='
'; if(!empty($plan_btn_bg_color_primary) && !empty($plan_btn_bg_color_secondary)){ $output.='
.pricing.'.wp_trim_words($unique_css_class).' .bg-color-2{
    background-image: linear-gradient(-180deg, '.esc_attr($plan_btn_bg_color_primary).' 0%, '.esc_attr($plan_btn_bg_color_secondary).' 100%);
}
'; } $output.='
</style>
';}	
if(!empty($mute_features)){ $output.='
<style>
.disabled-features{
	margin-top:-15px;
}
.mute {
    color: #CFD8DC !important;
}
</style>
';}
	return $output;
}
add_shortcode('appeasy_shortcode_for_pricing_table_one', 'apparatus_pricing_table_one_shortcode');

/*****************
Counter Section- 1
*****************/
//Function for Counter Section- 1

function apparatus_counter_section_one_shortcode( $atts ) {
	extract( shortcode_atts( array(
	'c1_icon' =>     '',
	'c1_heading1' => '',
	'c1_heading2' => '',
	'c2_icon' => '',
	'c2_heading1' => '',
	'c2_heading2' => '',
	'c3_icon' => '',
	'c3_heading1' => '',
	'c3_heading2' => '',	
	'c4_icon' => '',
	'c4_heading1' => '',
	'c4_heading2' => '',	
	'icon_color' => '',	
	'counter_color' => '',	
	'title_color' => '',	
	), $atts ) );

	for($i=0;$i<=50;$i++){
	$str = 'stuvb';
	$shuffled = str_shuffle($str);
	}	
	$unique_css_class=$shuffled;
	
	$allowed_html_array = array(
		'b' => array('class' => array()),
		'p' => array(),
		'br' => array(),
		'span' => array('class' => array()),
		);	
	$gallery = shortcode_atts(
    array(
        'bg_image'      =>  'bg_image',
    ), $atts );
	$image_ids = explode(',',$gallery['bg_image']);

	foreach( $image_ids as $image_id ){
    $images = wp_get_attachment_image_src( $image_id, 'bg_image' );
	}	
	$output = '<!-- Start Counter Section-->
        <div class="stats bg-animation p-90-60 '.esc_attr($unique_css_class).'" >
            <div class="container">
                <div class="row text-center">
				';if(!empty($c1_icon) || !empty($c1_heading1) || !empty($c1_heading2)){ $output.='
                    <div class="col-6 col-sm-6 col-md-3 mb-30">
                        <i class="white '.esc_attr($c1_icon).'"></i>
                        <h2 class="white thin numeric puls" style="animation-delay: 0s">'.esc_attr($c1_heading1).'</h2>
                        <p class="white bold">'.esc_attr($c1_heading2).'</p>
                    </div>
				'; } $output.='	
				';if(!empty($c2_icon) || !empty($c2_heading1) || !empty($c2_heading2)){ $output.='				
                    <div class="col-6 col-sm-6 col-md-3 mb-30">
                        <i class="white '.esc_attr($c2_icon).'"></i>
                        <h2 class="white thin numeric puls" style="animation-delay: .75s">'.esc_attr($c2_heading1).'</h2>
                        <p class="white bold">'.esc_attr($c2_heading2).'</p>
                    </div>
				'; } $output.='
				';if(!empty($c3_icon) || !empty($c3_heading1) || !empty($c3_heading2)){ $output.='					
                    <div class="col-6 col-sm-6 col-md-3 mb-30">
                        <i class="white '.esc_attr($c3_icon).'"></i>
                        <h2 class="white thin numeric puls" style="animation-delay: 1.5s">'.esc_attr($c3_heading1).'</h2>
                        <p class="white bold">'.esc_attr($c3_heading2).'</p>
                    </div>
				'; } $output.='	
				';if(!empty($c4_icon) || !empty($c4_heading1) || !empty($c4_heading2)){ $output.='				
                    <div class="col-6 col-sm-6 col-md-3 mb-30">
                        <i class="white '.esc_attr($c4_icon).'"></i>
                        <h2 class="white thin numeric puls" style="animation-delay: 2.25s">'.esc_attr($c4_heading1).'</h2>
                        <p class="white bold">'.esc_attr($c4_heading2).'</p>
                    </div>
				'; } $output.='						
                </div>
            </div>
        </div>
        <!-- End Counter Section  -->
		';
	
if(!empty($unique_css_class)){ $output.='
<style>
'; if(!empty($images[0])){ $output.='
.stats.'.wp_trim_words($unique_css_class).' {
background-image:url('.esc_url($images[0]).');
}
'; } $output.='
'; if(!empty($icon_color)){ $output.='
.stats.'.wp_trim_words($unique_css_class).' i{
color:'.esc_attr($icon_color).';
}
'; } $output.='
'; if(!empty($counter_color)){ $output.='
.stats.'.wp_trim_words($unique_css_class).' h2{
color:'.esc_attr($counter_color).';
}
'; } $output.='
'; if(!empty($title_color)){ $output.='
.stats.'.wp_trim_words($unique_css_class).' p{
color:'.esc_attr($title_color).' !important;
}
'; } $output.='
</style>
';}	
	return $output;
}
add_shortcode('appeasy_shortcode_for_counter_section_one', 'apparatus_counter_section_one_shortcode');

/*****************
Categorised Blog- 1
*****************/
//Function for Categorised Blog- 1

function apparatus_categorised_blog_one_shortcode( $atts ) {
	extract( shortcode_atts( array(
    'cat_id'     	 => '',
    'character'      => '70',
    'order'   	     => '',
    'orderby'        => 'post_date',	
    'post_per_page'        => '-1',	
	), $atts ) );


		
	$allowed_html_array = array(
		'b' => array('class' => array()),
		'p' => array(),
		'br' => array(),
		'span' => array('class' => array()),
		);	
	$args = array(
			'posts_per_page'   => $post_per_page,
			'cat' => $cat_id,
			'orderby'          => $orderby,
			'order'            => $order,
			'post_status'      => 'publish',
			);	
	$my_query = new WP_Query($args);	
	$output = '<!-- Start Categorised Blog Section-->
	    <section class="blog p-55-60">
            <div class="container">
                <div class="row n-paddings">
		';	while ( $my_query->have_posts() ) : $my_query->the_post();
	    $get_image = wp_get_attachment_url( get_post_thumbnail_id() ); 	
		$excerpt   = get_the_excerpt(); 
		$output .='
                    <div class="col-12 col-lg-4 mb-48 mlr-24">
                        <!-- Blog card -->
                        <a href="'.esc_url(get_the_permalink()).'">
                            <div class="blog-card">
							'; if(!empty($get_image)) { $output.='
                                <div class="blog-frame">
                                    <div class="more-tooltip bg-color-1"><i class="fas fa-link"></i></div>
                                    <div style="background-image:url('.esc_url( $get_image ).');" class="img"></div></div>
							'; } $output.='	
                                <div class="blog-description">
                                    <p class="bold dark">'.esc_attr(get_the_title()).'</p>
                                    <p class="light thin montserrat">
									'.esc_attr(substr(get_the_excerpt(), 0,$character)).'...
				
									</p>
                                </div>
                            </div>
                        </a>
                    </div>		
		'; endwhile;
        wp_reset_postdata();
    	$output .='	
		        </div>
            </div>
        </section>
        <!-- End Categorised Blog Section  -->
		';
	
	return $output;
}
add_shortcode('appeasy_shortcode_for_categorised_blog_one', 'apparatus_categorised_blog_one_shortcode');

/*****************
Contact us- 1
*****************/
//Function for Contact us- 1

function apparatus_contact_us_one_shortcode( $atts ) {
	extract( shortcode_atts( array(
	'heading1' => '',
	'heading2' => '',
	'heading2_thin' => '',
	'heading3' => '',
	'twitter_url' => '',
	'facebook_url' => '',
	'dribble_url' => '',
	'behance_url' => '',
	
    'recipient_name'    => '',
    'recipient_email'    => '',
    'email_subject'    => '',
    'name_field_placeholder' => 'Name',
    'email_field_placeholder' => 'Email',
    'message_field_placeholder' => 'Message',
	'heading1_color' => '',
	'heading2_color' => '',
	'heading3_color' => '',
	'btn_bg_primary' => '',
	'btn_bg_secondary' => '',
	
		'wanttoselect' => 'no',
		'yourselect' => 'Select One',
		'selectitems' => 'One, Two, Three, Four, Five',
		'wanttoradio' => 'no',
		'yourradio' => 'Select Radio',
		'radioitems' => 'One, Two, Three, Four, Five',
		'wanttocheckbox' => 'no',
		'yourcheckbox' => 'Select Checkbox',
		'checkboxitems' => 'One, Two, Three, Four, Five',	
	), $atts ) );

	for($i=0;$i<=50;$i++){
	$str = 'wxyza';
	$shuffled = str_shuffle($str);
	}	
	$unique_css_class=$shuffled;
		
	$allowed_html_array = array(
		'b' => array('class' => array()),
		'p' => array(),
		'br' => array(),
		'span' => array('class' => array()),
		);	
	$gallery = shortcode_atts(
    array(
        'bg_image'      =>  'bg_image',
    ), $atts );
	$image_ids = explode(',',$gallery['bg_image']);

	foreach( $image_ids as $image_id ){
    $images = wp_get_attachment_image_src( $image_id, 'bg_image' );
	}
	
    $myArray = explode(',', $heading2_thin);	
    $ret = $heading2;	
	foreach($myArray as $patterns){
    $ret = preg_replace('/\b'.$patterns.'\b/i',"<span class='thin'>$patterns</span>",$ret);   
	}
	$ret ;		
	$output = '<!-- Start Contact us Section-->
      <section class="contact p-0-60 '.esc_attr($unique_css_class).'">
            <div class="container">
			';if(!empty($images[0])){ $output.='
                <div class="bg-map">
                    <img src="'.esc_url($images[0]).'" alt="map">
                </div>
			';} $output.='
                <div class="row">
                    <div class="col-12 col-md-6">
                        <!-- Section title -->
                        <div class="section-title sm-ac mb-70">
                            <p class="light bold small heading1">'.wp_kses(__($heading1),$allowed_html_array).'</p>
                            <h2 class="heading2">'.wp_kses(__($ret),$allowed_html_array).'</h2>
                            <p class="light thin heading3">'.wp_kses(__($heading3),$allowed_html_array).'</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <!-- Social icons -->
                        <div class="contact-social-icons">
                            <ul class="sm-ac">
                                <li><a href="'.esc_url($twitter_url).'"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="'.esc_url($facebook_url).'"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="'.esc_url($dribble_url).'"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="'.esc_url($behance_url).'"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                        <!-- Social icons end -->
                    </div>
                </div>
                <!-- Section title end -->
                <form  method="post" id="form">
                    <div class="row">
                        <div class="col-12 col-md">
						
                            <!-- Name input -->
                            <input type="text" name="name" placeholder="Name" id="sendername" required>
                            <!-- Email input -->
                            <input type="email" name="contact_email" placeholder="Email" id="emailaddress" required>
                        </div>
                        <div class="col-12 col-md">
                            <!-- Text input -->
                            <textarea name="text" cols="30" rows="5" placeholder="Message" id="sendermessage" required></textarea>
                        </div>
                        <div class="col-12 col-md-auto text-center">
                            <!-- Submit form button -->
                            <button class="submit bg-color-1"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
							<img src="'.esc_url(plugin_dir_url( __FILE__ ) .'images/msg_loader.gif').'" class="img-responsive msg-loader" style="width:40px;height:40px;display: none;" alt="loader"/>
                        </div>
                    </div>
  					<input type="hidden" name="email_subject" id="email_subject" value="'.esc_attr($email_subject).'" />
  					<input type="hidden" name="recipient_name" id="recipient_name" value="'.esc_attr($recipient_name).'" />
					<input type="hidden" name="recipient_email" id="recipient_email" value="'.sanitize_email($recipient_email).'" />

			'; if($wanttoselect=="yes"){
				$output .= '  
<div class="row">    
<div class="col-md-12 col-sm-12">				
					<select class="input-1" name="cf-select" id="cf-select" >
					<option value="">'.esc_attr($yourselect).'</option>';
					$selectitemArray = explode(',', $selectitems);
					foreach($selectitemArray as $selectitem){
						$output .= '<option value="'.$selectitem.'">'.$selectitem.'</option>';
					}

				$output .= '</select>
</div>
</div>				                           
                      ';
			} $output .='


			'; if($wanttoradio=="yes"){
				
			$output .= '
<div class="row">    
<div class="col-md-12 col-sm-12">			
            <div class="radio_section">
				 <p><label class="lable-text" for="cf-radio">'.esc_attr($yourradio).'</label></p>';
				 $radioitemArray = explode(',', $radioitems);
				 $i=1;
					foreach($radioitemArray as $radioitem){
						$output .= '<span style="margin-right:10px;"><input class="control--radio" type="radio" name="cf-radio" value="'.$radioitem.'" style="margin-right:5px;" id="cf-radio'.$i.'">'.$radioitem.'</span>';
						$i++;
					}
			$output .= '</div>
</div>
</div>
            ';
			} $output .='


			';if($wanttocheckbox=="yes"){
				$output .=  '
<div class="row">    
<div class="col-md-12 col-sm-12">
                <div class="checkbox_section">
				 <p><label class="lable-text" for="cf-checkbox">'.esc_attr($yourcheckbox).'</label></p>';
				 $checkboxitemArray = explode(',', $checkboxitems);
				 $i=1;
					foreach($checkboxitemArray as $checkboxitem){
							$output .=  '<span style="margin-right:10px;"><input type="checkbox" class="control--checkbox" name="cf-checkbox[]" value="'.$checkboxitem.'" style="margin-right:5px;" id="cf-checkbox'.$i.'">'.$checkboxitem.'</span>';
							$i++;
					}

				$output .=  '</div>
</div>
</div>
                ';
			}  	$output .= '


			
					
                </form>
				<div id="success_msg" class="alert alert-success">Message Sent</div>
				<div id="error_msg" class="alert alert-danger">Sorry, Message Not Sent. Try again later.</div>
            </div>
        </section>
		
        <!-- End Contact us Section  -->
        <script>
            jQuery(document).ready(function(){
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
					
					var select_title = "";
					var select = jQuery("#cf-select").val();
					var radio_title = "";
					var radio = jQuery("input[name=cf-radio]:checked").val();
					var checkbox_title = "";
					var checkArray = [];					
					jQuery(".control--checkbox:checked").each(function(i,e) {
						checkArray.push(jQuery(this).val());
					});
					
				'; if($wanttoselect=="yes"){$output .= ' 	
                    var select_title = "'.esc_attr($yourselect).'";					
                    var select = jQuery("#cf-select").val();
				'; } $output.='	
				
				'; if($wanttoradio=="yes"){ $output .= '				
                    var radio = jQuery("input[name=cf-radio]:checked").val();
                    var radio_title = "'.esc_attr($yourradio).'";
				'; } $output.='	
				
				';if($wanttocheckbox=="yes"){ $output .=  '				
                    var checkbox_title = "'.esc_attr($yourcheckbox).'";
					var checkArray = [];					
					jQuery(".control--checkbox:checked").each(function(i,e) {
						checkArray.push(jQuery(this).val());
					});
				'; } $output.='	
					
                    jQuery.ajax({
                        type: "POST",
						dataType: "json",
						  beforeSend: function(){
							jQuery(".msg-loader").css("display", "inline");
						  },
                        url: "'.plugins_url( 'apparatus-contact-form.php', __FILE__ ).'",
                        data: {name: name,email:email,message:message,recipient_email:recipient_email,recipient_name:recipient_name,email_subject:email_subject,select_title:select_title,select:select,radio_title:radio_title,radio:radio,checkbox_title:checkbox_title,"checkbox[]":checkArray.join()},
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
		
		';
if(!empty($unique_css_class)){ $output.='
<style>
'; if(!empty($heading1_color)){ $output.='
.contact.'.wp_trim_words($unique_css_class).' .heading1{
color:'.esc_attr($heading1_color).';
}
'; } $output.='
'; if(!empty($heading2_color)){ $output.='
.contact.'.wp_trim_words($unique_css_class).' .heading2{
color:'.esc_attr($heading2_color).' !important;
}
'; } $output.='
'; if(!empty($heading3_color)){ $output.='
.contact.'.wp_trim_words($unique_css_class).' .heading3{
color:'.esc_attr($heading3_color).';
}
'; } $output.='
'; if(!empty($btn_bg_primary) && !empty($btn_bg_secondary)){ $output.='
.contact.'.wp_trim_words($unique_css_class).' .bg-color-1{
background-image: linear-gradient(-180deg, '.esc_attr($btn_bg_primary).' 0%, '.esc_attr($btn_bg_secondary).' 100%);
}
'; } $output.='
</style>
';}		

	return $output;
}
add_shortcode('appeasy_shortcode_for_contact_us_one', 'apparatus_contact_us_one_shortcode');

if(class_exists('WPBakeryVisualComposerAbstract')) {
	include_once('vc_shortcodes.php');
}