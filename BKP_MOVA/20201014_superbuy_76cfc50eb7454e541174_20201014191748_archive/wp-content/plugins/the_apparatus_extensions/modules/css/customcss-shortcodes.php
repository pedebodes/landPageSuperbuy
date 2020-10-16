<?php
function apparatus_styles_custom_shotcodes(){ ?>
<!-- Custom CSS Codes
========================================================= -->
<style id="custom-shortcode-styles">
<?php if(!empty($unique_css_class)){ 
	if(!empty($heading1_color)){ echo'
.header-section-one.'.wp_trim_words($unique_css_class).' .heading1{
	color:'.esc_attr($heading1_color).';
} 
'; } '
'; if(!empty($heading2_color)){ echo'
.header-section-one.'.wp_trim_words($unique_css_class).' .heading2{
	color:'.esc_attr($heading2_color).';
} 
'; } '
'; if(!empty($heading3_color)){ echo'
.header-section-one.'.wp_trim_words($unique_css_class).' .heading3{
	color:'.esc_attr($heading3_color).';
} 
'; } '
'; if(!empty($btn1_color_1) && !empty($btn1_color_2)){ echo'
.header-section-one.'.wp_trim_words($unique_css_class).' .bg-color-1{
     background-image: linear-gradient(-180deg, '.esc_attr($btn1_color_1).' 0%, '.esc_attr($btn1_color_2).' 100%) !important; 
} 
'; } '
'; if(!empty($link_color)){ echo'
.header-section-one.'.wp_trim_words($unique_css_class).' .link{
	color:'.esc_attr($link_color).';
} 
'; } '
'; if(!empty($sec2_heading1_color)){ echo'
.hiw.'.wp_trim_words($unique_css_class).' .sec2_heading1{
	color:'.esc_attr($sec2_heading1_color).' !important;
} 
'; } '
'; if(!empty($sec2_heading2_color)){ echo'
.hiw.'.wp_trim_words($unique_css_class).' .sec2_heading2{
	color:'.esc_attr($sec2_heading2_color).' !important;
} 
'; } '
'; if(!empty($sec2_heading3_color)){ echo'
.hiw.'.wp_trim_words($unique_css_class).' .sec2_heading3{
	color:'.esc_attr($sec2_heading3_color).' !important;
} 
'; } '
'; if(!empty($fbox_step_bg_color_primary) && !empty($fbox_step_bg_color_secondary)){ echo'
.hiw.'.wp_trim_words($unique_css_class).' .fbox_step_number{
	background-image: linear-gradient(-180deg, '.esc_attr($fbox_step_bg_color_primary).' 0%, '.esc_attr($fbox_step_bg_color_secondary).' 100%);
} 
'; } '
'; if(!empty($fbox_title_color)){ echo'
.hiw.'.wp_trim_words($unique_css_class).' .fbox_title{
	color:'.esc_attr($fbox_title_color).' !important;
} 
'; } '
'; if(!empty($fbox_desc_color)){ echo'
.hiw.'.wp_trim_words($unique_css_class).' .fbox_desc{
	color:'.esc_attr($fbox_desc_color).' !important;

}'; }
}

if(!empty($images3[0])){ echo'
@media (max-width: 768px){
.dif-mobile-bg{
    background-image: url('.esc_url($images3[0]).') !important;
}
}
'; } 
;if(!empty($sec2_heading1) && empty($sec2_heading2) && empty($sec2_heading3)){ echo'
.'.wp_trim_words($unique_css_class).' .line{
  top: 225px;	
}
';}
;if(!empty($sec2_heading2) && empty($sec2_heading1) && empty($sec2_heading3)){ echo'
.'.wp_trim_words($unique_css_class).' .line{
  top: 250px;	
}
';}
;if(!empty($sec2_heading3) && empty($sec2_heading1) && empty($sec2_heading2)){ echo'
.'.wp_trim_words($unique_css_class).' .line{
  top: 240px;	
}
';}
;if(!empty($sec2_heading1) && !empty($sec2_heading2) && !empty($sec2_heading3)){ echo'
.'.wp_trim_words($unique_css_class).' .line{
  top: 300px;	
}
';}
;if(empty($sec2_heading1) && !empty($sec2_heading2) && !empty($sec2_heading3)){ echo'
.'.wp_trim_words($unique_css_class).' .line{
  top: 280px;	
}
';}
;if(!empty($sec2_heading1) && empty($sec2_heading2) && !empty($sec2_heading3)){ echo'
.'.wp_trim_words($unique_css_class).' .line{
  top: 255px;	
}
';}
;if(!empty($sec2_heading1) && !empty($sec2_heading2) && empty($sec2_heading3)){ echo'
.'.wp_trim_words($unique_css_class).' .line{
  top: 265px;	
}
';}
echo'</style>';
}
add_action( 'wp_head', 'apparatus_styles_custom_shotcodes', 99 );