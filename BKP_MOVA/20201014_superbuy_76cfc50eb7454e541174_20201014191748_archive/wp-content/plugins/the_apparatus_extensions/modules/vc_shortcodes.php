<?php
/*-----------------------------------------------------------------------------------*/
/* Start Using apparatus Shortcodes in the Visual Composer */
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'apparatus_vc_shortcodes' );
function apparatus_vc_shortcodes() {

/*****************
Header Section- 1
*****************/
vc_map( array(
      "name" => esc_html__("FT- Header Section- 1", 'apparatus'),
      "base" => "appeasy_shortcode_for_header_section_one",
      "icon" => plugins_url( 'images/vc.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'apparatus'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Shows Header Section.', 'apparatus'),
      "params" => array(         
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 1", 'apparatus'),
            "param_name" => "heading1",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 2", 'apparatus'),
            "param_name" => "heading2",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Which word do you want to thin from heading line 2?", 'apparatus'),
            "param_name" => "heading2_thin",
            "value" => '',
            "description" => esc_html__("Use comma(,) for seperate words.", 'apparatus'),
			"group" => 'Section-1',
         ),			 
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Tooltip Text", 'apparatus'),
            "param_name" => "heading3",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),	
		array(
            "type" => "attach_image",            
            "class" => "",
            "heading" => esc_html__("Attach Image", 'apparatus'),
            "param_name" => "image",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),	
		array(
            "type" => "attach_image",            
            "class" => "",
            "heading" => esc_html__("Attach Background Image", 'apparatus'),
            "param_name" => "bg_image",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),		
		array(
            "type" => "attach_image",            
            "class" => "",
            "heading" => esc_html__("Attach Background Image for Mobile/Tablets view.", 'apparatus'),
            "param_name" => "bg_image3",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),	 
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Button one Name", 'apparatus'),
            "param_name" => "btn1_name",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),		
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Button one URL", 'apparatus'),
            "param_name" => "btn1_url",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Button Two Name", 'apparatus'),
            "param_name" => "btn2_name",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),		
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Button Two URL", 'apparatus'),
            "param_name" => "btn2_url",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),	
		array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Facebook URL", 'apparatus'),
            "param_name" => "fb_url",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),	
		array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Twitter URL", 'apparatus'),
            "param_name" => "twitter_url",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),	
		array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Dribble URL", 'apparatus'),
            "param_name" => "dribble_url",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),	
		array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Behance URL", 'apparatus'),
            "param_name" => "behance_url",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),	
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 1", 'apparatus'),
            "param_name" => "sec2_heading1",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 2", 'apparatus'),
            "param_name" => "sec2_heading2",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Which word do you want to thin from heading line 2?", 'apparatus'),
            "param_name" => "sec2heading2_thin",
            "value" => '',
            "description" => esc_html__("Use comma(,) for seperate words.", 'apparatus'),
			"group" => 'Section-2',
         ),	
		 
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 3", 'apparatus'),
            "param_name" => "sec2_heading3",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),			 
		 
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box one Step Number", 'apparatus'),
            "param_name" => "fbox_one_step_number",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box one Title", 'apparatus'),
            "param_name" => "fbox_one_title",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box one Description", 'apparatus'),
            "param_name" => "fbox_one_desc",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box Two Step Number", 'apparatus'),
            "param_name" => "fbox_two_step_number",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box Two Title", 'apparatus'),
            "param_name" => "fbox_two_title",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box Two Description", 'apparatus'),
            "param_name" => "fbox_two_desc",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box Three Step Number", 'apparatus'),
            "param_name" => "fbox_three_step_number",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box Three Title", 'apparatus'),
            "param_name" => "fbox_three_title",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box Three Description", 'apparatus'),
            "param_name" => "fbox_three_desc",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box Four Step Number", 'apparatus'),
            "param_name" => "fbox_four_step_number",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box Four Title", 'apparatus'),
            "param_name" => "fbox_four_title",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box Four Description", 'apparatus'),
            "param_name" => "fbox_four_desc",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),			 

		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Section one Heading one color", 'apparatus'),
            "param_name" => "heading1_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Section one Heading Two color", 'apparatus'),
            "param_name" => "heading2_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Section one Heading Three color", 'apparatus'),
            "param_name" => "heading13_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		 array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Section one Button One Text Color", 'apparatus'),
            "param_name" => "btn1_txt_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Section one Button one primary color", 'apparatus'),
            "param_name" => "btn1_color_1",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Section one Button one secondary color", 'apparatus'),
            "param_name" => "btn1_color_2",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Section one Link Color", 'apparatus'),
            "param_name" => "link_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Section Two Heading One Color", 'apparatus'),
            "param_name" => "sec2_heading1_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),		
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Section Two Heading Two Color", 'apparatus'),
            "param_name" => "sec2_heading2_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Section Two Heading Three Color", 'apparatus'),
            "param_name" => "sec2_heading3_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Feature Box Step Primary Background Color", 'apparatus'),
            "param_name" => "fbox_step_bg_color_primary",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Feature Box Step Secondary Background Color", 'apparatus'),
            "param_name" => "fbox_step_bg_color_secondary",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),			 
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Feature Box Title Color", 'apparatus'),
            "param_name" => "fbox_title_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Feature Box Desc Color", 'apparatus'),
            "param_name" => "fbox_desc_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),		 
   )
)
);

/*****************
Header Section- 2
*****************/
vc_map( array(
      "name" => esc_html__("FT- Header Section- 2", 'apparatus'),
      "base" => "appeasy_shortcode_for_header_section_two",
      "icon" => plugins_url( 'images/vc.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'apparatus'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Shows Header Section.', 'apparatus'),
      "params" => array(         
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 1", 'apparatus'),
            "param_name" => "heading1",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 2", 'apparatus'),
            "param_name" => "heading2",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Which word do you want to thin from heading line 2?", 'apparatus'),
            "param_name" => "heading2_thin",
            "value" => '',
            "description" => esc_html__("Use comma(,) for seperate words.", 'apparatus'),
			"group" => 'Section-1',
         ),			 
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Tooltip Text", 'apparatus'),
            "param_name" => "heading3",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Tooltip URL", 'apparatus'),
            "param_name" => "tooltip_url",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),	
		array(
            "type" => "attach_image",            
            "class" => "",
            "heading" => esc_html__("Attach Image", 'apparatus'),
            "param_name" => "image",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),	
		array(
            "type" => "attach_image",            
            "class" => "",
            "heading" => esc_html__("Attach Background Image", 'apparatus'),
            "param_name" => "bg_image",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),		
		array(
            "type" => "attach_image",            
            "class" => "",
            "heading" => esc_html__("Attach Background Image for Mobile/Tablets view.", 'apparatus'),
            "param_name" => "bg_image3",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),	 
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Button one Name", 'apparatus'),
            "param_name" => "btn1_name",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),		
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Button one URL", 'apparatus'),
            "param_name" => "btn1_url",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Button Two Name", 'apparatus'),
            "param_name" => "btn2_name",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),		
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Button Two URL", 'apparatus'),
            "param_name" => "btn2_url",
            "value" => '',
            "description" => '',
			"group" => 'Section-1',
         ),	

		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 1", 'apparatus'),
            "param_name" => "sec2_heading1",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 2", 'apparatus'),
            "param_name" => "sec2_heading2",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Which word do you want to thin from heading line 2?", 'apparatus'),
            "param_name" => "sec2heading2_thin",
            "value" => '',
            "description" => esc_html__("Use comma(,) for seperate words.", 'apparatus'),
			"group" => 'Section-2',
         ),	
		 
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 3", 'apparatus'),
            "param_name" => "sec2_heading3",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),			 
		 
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box one Step Number", 'apparatus'),
            "param_name" => "fbox_one_step_number",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box one Title", 'apparatus'),
            "param_name" => "fbox_one_title",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box one Description", 'apparatus'),
            "param_name" => "fbox_one_desc",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box Two Step Number", 'apparatus'),
            "param_name" => "fbox_two_step_number",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box Two Title", 'apparatus'),
            "param_name" => "fbox_two_title",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box Two Description", 'apparatus'),
            "param_name" => "fbox_two_desc",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box Three Step Number", 'apparatus'),
            "param_name" => "fbox_three_step_number",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box Three Title", 'apparatus'),
            "param_name" => "fbox_three_title",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box Three Description", 'apparatus'),
            "param_name" => "fbox_three_desc",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box Four Step Number", 'apparatus'),
            "param_name" => "fbox_four_step_number",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box Four Title", 'apparatus'),
            "param_name" => "fbox_four_title",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Feature Box Four Description", 'apparatus'),
            "param_name" => "fbox_four_desc",
            "value" => '',
            "description" => '',
			"group" => 'Section-2',
         ),			 
	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Section one Heading one color", 'apparatus'),
            "param_name" => "heading1_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Section one Heading Two color", 'apparatus'),
            "param_name" => "heading2_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Section one Heading Three color", 'apparatus'),
            "param_name" => "heading13_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Section one Button one primary color", 'apparatus'),
            "param_name" => "btn1_color_1",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		 array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Section one Button One Text Color", 'apparatus'),
            "param_name" => "btn1_txt_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Section one Button one secondary color", 'apparatus'),
            "param_name" => "btn1_color_2",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Section one Link Color", 'apparatus'),
            "param_name" => "link_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Section Two Heading One Color", 'apparatus'),
            "param_name" => "sec2_heading1_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),		
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Section Two Heading Two Color", 'apparatus'),
            "param_name" => "sec2_heading2_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Section Two Heading Three Color", 'apparatus'),
            "param_name" => "sec2_heading3_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Feature Box Step Primary Background Color", 'apparatus'),
            "param_name" => "fbox_step_bg_color_primary",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Feature Box Step Secondary Background Color", 'apparatus'),
            "param_name" => "fbox_step_bg_color_secondary",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),			 
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Feature Box Title Color", 'apparatus'),
            "param_name" => "fbox_title_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Feature Box Desc Color", 'apparatus'),
            "param_name" => "fbox_desc_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),		 
   )
)
);

/*****************
Headline Section- 1
*****************/
vc_map( array(
      "name" => esc_html__("FT- Headline Section- 1", 'apparatus'),
      "base" => "appeasy_shortcode_for_headline_sec_one",
      "icon" => plugins_url( 'images/vc.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'apparatus'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Shows Headlines', 'apparatus'),
      "params" => array(         
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 1", 'apparatus'),
            "param_name" => "heading1",
            "value" => '',
            "description" => '',
         ),
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 2", 'apparatus'),
            "param_name" => "heading2",
            "value" => '',
            "description" => '',
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Which word do you want to thin from heading line 2?", 'apparatus'),
            "param_name" => "heading2_thin",
            "value" => '',
            "description" => esc_html__("Use comma(,) for seperate words.", 'apparatus'),
         ),		 
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 3", 'apparatus'),
            "param_name" => "heading3",
            "value" => '',
            "description" => '',
         ),		 
	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Headline One Color", 'apparatus'),
            "param_name" => "heading1_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Headline Two Color", 'apparatus'),
            "param_name" => "heading2_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Headline Three Color", 'apparatus'),
            "param_name" => "heading3_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),			 
	 
   )
)
);

/*****************
Feature Box-1
*****************/
vc_map( array(
      "name" => esc_html__("FT- Feature Box- 1", 'apparatus'),
      "base" => "appeasy_shortcode_for_feature_Box_one",
      "icon" => plugins_url( 'images/vc.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'apparatus'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Shows Feature Box', 'apparatus'),
      "params" => array(    
		 array(
            "type" => "attach_image",            
            "class" => "",
            "heading" => esc_html__("Attach Image", 'apparatus'),
            "param_name" => "bg_image",
            "value" => '',
            "description" => '',
         ),	  
		 array(
            "type" => "checkbox",
            "class" => "",
            "heading" => esc_html__("Want to make the image animated?", 'apparatus'),
            "param_name" => "jump",
			"value" => array(
				  "" => "false"
			   ),
			"description" => esc_html__("Turn it on if you want to make the image always jumping?", 'apparatus'),
         ),
		array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Put Animation Delay Time", 'apparatus'),
            "param_name" => "jump_delay",
            "value" => '0',
            "description" => esc_html__("Put a numeric value. Default value is 0. You can put fration numbers also. Example: .75", 'apparatus'),
			 'dependency' => array(
               'element'=>'jump',
               'value' => 'false',
            )
         ),	
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 1", 'apparatus'),
            "param_name" => "heading1",
            "value" => '',
            "description" => '',
         ),
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 2", 'apparatus'),
            "param_name" => "heading2",
            "value" => '',
            "description" => '',
         ),

		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Headline One Color", 'apparatus'),
            "param_name" => "heading1_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Headline Two Color", 'apparatus'),
            "param_name" => "heading2_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),				 
	 
   )
)
);

/*****************
Video Section- 1
*****************/
vc_map( array(
      "name" => esc_html__("FT- Video Section- 1", 'apparatus'),
      "base" => "appeasy_shortcode_for_video_sec_one",
      "icon" => plugins_url( 'images/vc.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'apparatus'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Shows Video Section', 'apparatus'),
      "params" => array(    
  
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 1", 'apparatus'),
            "param_name" => "heading1",
            "value" => '',
            "description" => '',
         ),
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 2", 'apparatus'),
            "param_name" => "heading2",
            "value" => '',
            "description" => '',
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Which word do you want to thin from heading line 2?", 'apparatus'),
            "param_name" => "heading2_thin",
            "value" => '',
            "description" => esc_html__("Use comma(,) for seperate words.", 'apparatus'),
         ),			 
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 3", 'apparatus'),
            "param_name" => "heading3",
            "value" => '',
            "description" => '',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Youtube Video URL", 'apparatus'),
            "param_name" => "video_url",
            "value" => '',
            "description" => '',
         ),		 
	
		array(
            "type" => "attach_image",            
            "class" => "",
            "heading" => esc_html__("Attach Background Image", 'apparatus'),
            "param_name" => "bg_image",
            "value" => '',
            "description" => esc_html__("Optional", 'apparatus'),
			"group" => 'Design-Options',
         ),			 
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Headline One Color", 'apparatus'),
            "param_name" => "heading1_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Headline Two Color", 'apparatus'),
            "param_name" => "heading2_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Headline Three Color", 'apparatus'),
            "param_name" => "heading3_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),					 
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Button Primary Background Color", 'apparatus'),
            "param_name" => "btn_bg_color_primary",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Button Secondary Background Color", 'apparatus'),
            "param_name" => "btn_bg_color_secondary",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),		 
   )
)
);

/*****************
What we offer Section- 1
*****************/
vc_map( array(
      "name" => esc_html__("FT- What we offer section- 1", 'apparatus'),
      "base" => "appeasy_shortcode_for_wwo_sec_one",
      "icon" => plugins_url( 'images/vc.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'apparatus'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Shows what we offer section.', 'apparatus'),
      "params" => array(    
  
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 1", 'apparatus'),
            "param_name" => "heading1",
            "value" => '',
            "description" => '',
         ),
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 2", 'apparatus'),
            "param_name" => "heading2",
            "value" => '',
            "description" => '',
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Which word do you want to thin from heading line 2?", 'apparatus'),
            "param_name" => "heading2_thin",
            "value" => '',
            "description" => esc_html__("Use comma(,) for seperate words.", 'apparatus'),
         ),			 
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Description", 'apparatus'),
            "param_name" => "desc",
            "value" => '',
            "description" => '',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Button One Name", 'apparatus'),
            "param_name" => "btn1_name",
            "value" => '',
            "description" => '',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Button One URL", 'apparatus'),
            "param_name" => "btn1_url",
            "value" => '',
            "description" => '',
         ),	
		 array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Button One Text Color", 'apparatus'),
            "param_name" => "btn1_txt_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Button Two Name", 'apparatus'),
            "param_name" => "btn2_name",
            "value" => '',
            "description" => '',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Button Two URL", 'apparatus'),
            "param_name" => "btn2_url",
            "value" => '',
            "description" => '',
         ),		 
		 array(
            "type" => "attach_image",            
            "class" => "",
            "heading" => esc_html__("Attach Image", 'apparatus'),
            "param_name" => "image",
            "value" => '',
            "description" => '',
         ),	
		 
		 array(
            "type" => "checkbox",
            "class" => "",
            "heading" => esc_html__("Want to make the image animated?", 'apparatus'),
            "param_name" => "jump",
			"value" => array(
				  "" => "false"
			   ),
			"description" => esc_html__("Turn it on if you want to make the image always jumping?", 'apparatus'),
         ),
		 
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Headline One Color", 'apparatus'),
            "param_name" => "heading1_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Headline Two Color", 'apparatus'),
            "param_name" => "heading2_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Description Color", 'apparatus'),
            "param_name" => "desc_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),		
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Button One Primary Background Color", 'apparatus'),
            "param_name" => "btn1_bg_color_primary",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Button One Secondary Background Color", 'apparatus'),
            "param_name" => "btn1_bg_color_secondary",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Button Two Link Color", 'apparatus'),
            "param_name" => "btn2_link_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),		 
   )
)
);

/*****************
What we offer Section- 2
*****************/
vc_map( array(
      "name" => esc_html__("FT- What we offer section- 2", 'apparatus'),
      "base" => "appeasy_shortcode_for_wwo_sec_two",
      "icon" => plugins_url( 'images/vc.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'apparatus'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Shows what we offer section.', 'apparatus'),
      "params" => array(    
  
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 1", 'apparatus'),
            "param_name" => "heading1",
            "value" => '',
            "description" => '',
         ),
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 2", 'apparatus'),
            "param_name" => "heading2",
            "value" => '',
            "description" => '',
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Which word do you want to thin from heading line 2?", 'apparatus'),
            "param_name" => "heading2_thin",
            "value" => '',
            "description" => esc_html__("Use comma(,) for seperate words.", 'apparatus'),
         ),		 
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Description", 'apparatus'),
            "param_name" => "desc",
            "value" => '',
            "description" => '',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Button One Name", 'apparatus'),
            "param_name" => "btn1_name",
            "value" => '',
            "description" => '',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Button One URL", 'apparatus'),
            "param_name" => "btn1_url",
            "value" => '',
            "description" => '',
         ),	
		 array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Button One Text Color", 'apparatus'),
            "param_name" => "btn1_txt_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Button Two Name", 'apparatus'),
            "param_name" => "btn2_name",
            "value" => '',
            "description" => '',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Button Two URL", 'apparatus'),
            "param_name" => "btn2_url",
            "value" => '',
            "description" => '',
         ),		 
		 array(
            "type" => "attach_image",            
            "class" => "",
            "heading" => esc_html__("Attach Image", 'apparatus'),
            "param_name" => "image",
            "value" => '',
            "description" => '',
         ),	

		array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Want to make the image animated?", 'apparatus'),
            "param_name" => "jump",
			"value" => array(
				  "" => "false"
			   ),
			"description" => esc_html__("Turn it on if you want to make the image always jumping?", 'apparatus'),
         ),

		 
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Headline One Color", 'apparatus'),
            "param_name" => "heading1_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Headline Two Color", 'apparatus'),
            "param_name" => "heading2_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Description Color", 'apparatus'),
            "param_name" => "desc_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),					 
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Button One Primary Background Color", 'apparatus'),
            "param_name" => "btn1_bg_color_primary",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Button One Secondary Background Color", 'apparatus'),
            "param_name" => "btn1_bg_color_secondary",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Button Two Link Color", 'apparatus'),
            "param_name" => "btn2_link_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),		 
   )
)
);

/*****************
Team Member Box- 1
*****************/
vc_map( array(
      "name" => esc_html__("FT- Team Member Box- 1", 'apparatus'),
      "base" => "appeasy_shortcode_for_team_member_box_one",
      "icon" => plugins_url( 'images/vc.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'apparatus'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Shows Team Member Box.', 'apparatus'),
      "params" => array(    
		 array(
            "type" => "attach_image",            
            "class" => "",
            "heading" => esc_html__("Attach Image", 'apparatus'),
            "param_name" => "image",
            "value" => '',
            "description" => '',
         ),	  
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Name", 'apparatus'),
            "param_name" => "name",
            "value" => '',
            "description" => '',
         ),
 		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Designation", 'apparatus'),
            "param_name" => "designation",
            "value" => '',
            "description" => '',
         ),
 		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Twitter URL", 'apparatus'),
            "param_name" => "twitter_url",
            "value" => '',
            "description" => '',
         ),	
 		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Facebook URL", 'apparatus'),
            "param_name" => "facebook_url",
            "value" => '',
            "description" => '',
         ),	
 		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Dribble URL", 'apparatus'),
            "param_name" => "dribble_url",
            "value" => '',
            "description" => '',
         ),	
 		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Behance URL", 'apparatus'),
            "param_name" => "behance_url",
            "value" => '',
            "description" => '',
         ),			 

		 
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Name Color", 'apparatus'),
            "param_name" => "name_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Designation Color", 'apparatus'),
            "param_name" => "designation_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	 
   )
)
);

/*****************
Call to Action- 1
*****************/
vc_map( array(
      "name" => esc_html__("FT- Call to Action- 1", 'apparatus'),
      "base" => "appeasy_shortcode_for_call_to_action_one",
      "icon" => plugins_url( 'images/vc.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'apparatus'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Shows Call to Action.', 'apparatus'),
      "params" => array(    
	  
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Headline One", 'apparatus'),
            "param_name" => "heading1",
            "value" => '',
            "description" => '',
         ),
 		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Headline Two", 'apparatus'),
            "param_name" => "heading2",
            "value" => '',
            "description" => '',
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Which word do you want to thin from heading line two?", 'apparatus'),
            "param_name" => "heading2_thin",
            "value" => '',
            "description" => esc_html__("Use comma(,) for seperate words.", 'apparatus'),
         ),	
 		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Headline Three", 'apparatus'),
            "param_name" => "heading3",
            "value" => '',
            "description" => '',
         ),		
 		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Button One Name", 'apparatus'),
            "param_name" => "btn1_name",
            "value" => '',
            "description" => '',
         ),	
 		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Button One URL", 'apparatus'),
            "param_name" => "btn1_url",
            "value" => '',
            "description" => '',
         ),	
 		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Button Two Name", 'apparatus'),
            "param_name" => "btn2_name",
            "value" => '',
            "description" => '',
         ),	
 		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Button Two URL", 'apparatus'),
            "param_name" => "btn2_url",
            "value" => '',
            "description" => '',
         ),	
		 array(
            "type" => "attach_image",            
            "class" => "",
            "heading" => esc_html__("Section Background Image", 'apparatus'),
            "param_name" => "bg_image",
            "value" => '',
            "description" => esc_html__("Optional", 'apparatus'),
         ),		 

		 
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Heading One Color", 'apparatus'),
            "param_name" => "heading1_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Heading Two Color", 'apparatus'),
            "param_name" => "heading2_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Heading Three Color", 'apparatus'),
            "param_name" => "heading3_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		 array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Button One Text Color", 'apparatus'),
            "param_name" => "btn1_txt_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Button One Primary Background Color", 'apparatus'),
            "param_name" => "btn1_bg_color_primary",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Button One Secondary Background Color", 'apparatus'),
            "param_name" => "btn1_bg_color_secondary",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),
		 array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Button Two Link Color", 'apparatus'),
            "param_name" => "btn2_link_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
   )
)
);

/*****************
Testimonial Slider- 1
*****************/
vc_map( array(
      "name" => esc_html__("FT- Testimonial Slider- 1", 'apparatus'),
      "base" => "appeasy_shortcode_for_testimonial_slider_one",
      "icon" => plugins_url( 'images/vc.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'apparatus'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Shows Testimonial Slider Section.', 'apparatus'),
      "params" => array(    
	  
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Headline One", 'apparatus'),
            "param_name" => "heading1",
            "value" => '',
            "description" => '',
         ),
 		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Headline Two", 'apparatus'),
            "param_name" => "heading2",
            "value" => '',
            "description" => '',
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Which word do you want to thin from heading line two?", 'apparatus'),
            "param_name" => "heading2_thin",
            "value" => '',
            "description" => esc_html__("Use comma(,) for seperate words.", 'apparatus'),
         ),			 
 		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Headline Three", 'apparatus'),
            "param_name" => "heading3",
            "value" => '',
            "description" => '',
         ),
 		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Arrow Title", 'apparatus'),
            "param_name" => "arrow_title",
            "value" => '',
            "description" => '',
         ),		 
      array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Number of Testimonial", 'apparatus'),
            "param_name" => "number_of_testimonial",
            'admin_label' => true,
            "value" => array(
               esc_html__('One', 'apparatus')=>'1',
               esc_html__('Two', 'apparatus')=>'2',
               esc_html__('Three', 'apparatus')=>'3',
               esc_html__('Four', 'apparatus')=>'4',
               esc_html__('Five', 'apparatus')=>'5',
               esc_html__('Six', 'apparatus')=>'6',
               esc_html__('Seven', 'apparatus')=>'7',
               esc_html__('Eight', 'apparatus')=>'8',
               esc_html__('Nine', 'apparatus')=>'9',
               esc_html__('Ten', 'apparatus')=>'10',
               esc_html__('Eleven', 'apparatus')=>'11',
               esc_html__('Twelve', 'apparatus')=>'12',
               esc_html__('Thirteen', 'apparatus')=>'13',
               esc_html__('Fourteen', 'apparatus')=>'14',
               esc_html__('Fifteen', 'apparatus')=>'15',
            )
         ),	 
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Name 1", 'apparatus'),
            "param_name" => "name1",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array('1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),			 
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Designation 1", 'apparatus'),
            "param_name" => "designation1",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array('1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textarea",
            "class" => "",
            "heading" => esc_html__("Description 1", 'apparatus'),
            "param_name" => "description1",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array('1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Image 1 URL", 'apparatus'),
            "param_name" => "image1",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array('1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	

         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Name 2", 'apparatus'),
            "param_name" => "name2",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),			 
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Designation 2", 'apparatus'),
            "param_name" => "designation2",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textarea",
            "class" => "",
            "heading" => esc_html__("Description 2", 'apparatus'),
            "param_name" => "description2",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Image 2 URL", 'apparatus'),
            "param_name" => "image2",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	

         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Name 3", 'apparatus'),
            "param_name" => "name3",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),			 
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Designation 3", 'apparatus'),
            "param_name" => "designation3",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textarea",
            "class" => "",
            "heading" => esc_html__("Description 3", 'apparatus'),
            "param_name" => "description3",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Image 3 URL", 'apparatus'),
            "param_name" => "image3",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	

         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Name 4", 'apparatus'),
            "param_name" => "name4",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),			 
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Designation 4", 'apparatus'),
            "param_name" => "designation4",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textarea",
            "class" => "",
            "heading" => esc_html__("Description 4", 'apparatus'),
            "param_name" => "description4",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Image 4 URL", 'apparatus'),
            "param_name" => "image4",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	

         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Name 5", 'apparatus'),
            "param_name" => "name5",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),			 
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Designation 5", 'apparatus'),
            "param_name" => "designation5",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textarea",
            "class" => "",
            "heading" => esc_html__("Description 5", 'apparatus'),
            "param_name" => "description5",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Image 5 URL", 'apparatus'),
            "param_name" => "image5",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	

         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Name 6", 'apparatus'),
            "param_name" => "name6",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),			 
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Designation 6", 'apparatus'),
            "param_name" => "designation6",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textarea",
            "class" => "",
            "heading" => esc_html__("Description 6", 'apparatus'),
            "param_name" => "description6",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Image 6 URL", 'apparatus'),
            "param_name" => "image6",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	

         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Name 7", 'apparatus'),
            "param_name" => "name7",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),			 
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Designation 7", 'apparatus'),
            "param_name" => "designation7",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textarea",
            "class" => "",
            "heading" => esc_html__("Description 7", 'apparatus'),
            "param_name" => "description7",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Image 7 URL", 'apparatus'),
            "param_name" => "image7",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	

         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Name 8", 'apparatus'),
            "param_name" => "name8",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),			 
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Designation 8", 'apparatus'),
            "param_name" => "designation8",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textarea",
            "class" => "",
            "heading" => esc_html__("Description 8", 'apparatus'),
            "param_name" => "description8",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Image 8 URL", 'apparatus'),
            "param_name" => "image8",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	

         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Name 9", 'apparatus'),
            "param_name" => "name9",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),			 
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Designation 9", 'apparatus'),
            "param_name" => "designation9",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textarea",
            "class" => "",
            "heading" => esc_html__("Description 9", 'apparatus'),
            "param_name" => "description9",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Image 9 URL", 'apparatus'),
            "param_name" => "image9",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	

         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Name 10", 'apparatus'),
            "param_name" => "name10",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),			 
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Designation 10", 'apparatus'),
            "param_name" => "designation10",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textarea",
            "class" => "",
            "heading" => esc_html__("Description 10", 'apparatus'),
            "param_name" => "description10",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Image 10 URL", 'apparatus'),
            "param_name" => "image10",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	

         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Name 11", 'apparatus'),
            "param_name" => "name11",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),			 
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Designation 11", 'apparatus'),
            "param_name" => "designation11",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textarea",
            "class" => "",
            "heading" => esc_html__("Description 11", 'apparatus'),
            "param_name" => "description11",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Image 11 URL", 'apparatus'),
            "param_name" => "image11",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	

         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Name 12", 'apparatus'),
            "param_name" => "name12",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),			 
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Designation 12", 'apparatus'),
            "param_name" => "designation12",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textarea",
            "class" => "",
            "heading" => esc_html__("Description 12", 'apparatus'),
            "param_name" => "description12",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Image 12 URL", 'apparatus'),
            "param_name" => "image12",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '12',
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	

         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Name 13", 'apparatus'),
            "param_name" => "name13",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '13',
                                '14',
                                '15',
                        )
            )
         ),			 
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Designation 13", 'apparatus'),
            "param_name" => "designation13",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textarea",
            "class" => "",
            "heading" => esc_html__("Description 13", 'apparatus'),
            "param_name" => "description13",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Image 13 URL", 'apparatus'),
            "param_name" => "image13",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '13',
                                '14',
                                '15',
                        )
            )
         ),	

         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Name 14", 'apparatus'),
            "param_name" => "name14",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '14',
                                '15',
                        )
            )
         ),			 
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Designation 14", 'apparatus'),
            "param_name" => "designation14",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textarea",
            "class" => "",
            "heading" => esc_html__("Description 14", 'apparatus'),
            "param_name" => "description14",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '14',
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Image 14 URL", 'apparatus'),
            "param_name" => "image14",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '14',
                                '15',
                        )
            )
         ),	

         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Name 15", 'apparatus'),
            "param_name" => "name15",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '15',
                        )
            )
         ),			 
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Designation 15", 'apparatus'),
            "param_name" => "designation15",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textarea",
            "class" => "",
            "heading" => esc_html__("Description 15", 'apparatus'),
            "param_name" => "description15",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '15',
                        )
            )
         ),	
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Image 15 URL", 'apparatus'),
            "param_name" => "image15",
            "value" => '',
            "description" => '',
            'dependency' => array(
               'element'=>'number_of_testimonial',
               'value' => array(
                                '15',
                        )
            )
         ),	

		 
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Name Color", 'apparatus'),
            "param_name" => "name_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Designation Color", 'apparatus'),
            "param_name" => "designation_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),		
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Description Color", 'apparatus'),
            "param_name" => "description_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Arrow Button Primary Background Color", 'apparatus'),
            "param_name" => "btn1_bg_color_primary",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Arrow Button Secondary Background Color", 'apparatus'),
            "param_name" => "btn1_bg_color_secondary",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Arrow Title Color", 'apparatus'),
            "param_name" => "arrow_title_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),			 
   )
)
);

/*****************
Screenshot Slider- 1
*****************/
vc_map( array(
      "name" => esc_html__("FT- Screenshot Slider", 'apparatus'),
      "base" => "appeasy_shortcode_for_screenshots_slider",
      "icon" => plugins_url( 'images/vc.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'apparatus'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Shows Screenshots in a Slider', 'apparatus'),
      "params" => array(    
		 array(
            "type" => "attach_images",            
            "class" => "",
            "heading" => esc_html__("Attach Screenshots", 'apparatus'),
            "param_name" => "apps_screenshot",
            "value" => '',
            "description" => esc_html__("Recommended: Keep all the screenshots in Same Size.", 'apparatus'),
         ),
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Headline One", 'apparatus'),
            "param_name" => "heading1",
            "value" => '',
            "description" => '',
         ),
 		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Headline Two", 'apparatus'),
            "param_name" => "heading2",
            "value" => '',
            "description" => '',
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Which word do you want to thin from heading line two?", 'apparatus'),
            "param_name" => "heading2_thin",
            "value" => '',
            "description" => esc_html__("Use comma(,) for seperate words.", 'apparatus'),
         ),			 
 		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Headline Three", 'apparatus'),
            "param_name" => "heading3",
            "value" => '',
            "description" => '',
         ),
 		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Arrow Title", 'apparatus'),
            "param_name" => "arrow_title",
            "value" => '',
            "description" => '',
         ),	
		 
		 array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Arrow Button Primary Background Color", 'apparatus'),
            "param_name" => "btn1_bg_color_primary",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Arrow Button Secondary Background Color", 'apparatus'),
            "param_name" => "btn1_bg_color_secondary",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Arrow Title Color", 'apparatus'),
            "param_name" => "arrow_title_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	

   )
)
);

/*****************
Clients Logo Slider- 1
*****************/
vc_map( array(
      "name" => esc_html__("FT- Clients Logo Slider", 'apparatus'),
      "base" => "appeasy_shortcode_for_clients_logo_slider",
      "icon" => plugins_url( 'images/vc.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'apparatus'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Shows Clients logo slider', 'apparatus'),
      "params" => array(    
		 array(
            "type" => "attach_images",            
            "class" => "",
            "heading" => esc_html__("Attach Clients Logo", 'apparatus'),
            "param_name" => "company_logo",
            "value" => '',
            "description" => esc_html__("Recommended: Keep all the logo in Same Size.", 'apparatus'),
         ),		  

   )
)
);

/*****************
Pricing Table- 1
*****************/
vc_map( array(
      "name" => esc_html__("FT- Price Table- 1", 'apparatus'),
      "base" => "appeasy_shortcode_for_pricing_table_one",
      "icon" => plugins_url( 'images/vc.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'apparatus'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Shows Price Table', 'apparatus'),
      "params" => array(    
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Plan Name", 'apparatus'),
            "param_name" => "plan_name",
            "value" => '',
            "description" => '',
         ),	
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Plan Description", 'apparatus'),
            "param_name" => "plan_desc",
            "value" => '',
            "description" => '',
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Plan Currency", 'apparatus'),
            "param_name" => "plan_currency",
            "value" => '',
            "description" => esc_html__("Currency Icon. Example: $", 'apparatus'),
         ),		
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Plan Price", 'apparatus'),
            "param_name" => "plan_price",
            "value" => '',
            "description" => '',
         ),		 
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Plan Duration", 'apparatus'),
            "param_name" => "plan_duration",
            "value" => '',
            "description" => '',
         ),
		array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Plan Features", 'apparatus'),
            "param_name" => "features",
            "value" => '',
            "description" => esc_html__("Per New feature in new line.", 'apparatus'),
         ),
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Disable Features", 'apparatus'),
            "param_name" => "mute_features",
            "value" => '',
            "description" =>  esc_html__("Per New feature in new line.", 'apparatus'),
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Plan Button Name", 'apparatus'),
            "param_name" => "plan_btn_name",
            "value" => '',
            "description" => '',
         ),	
		array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Plan Button Icon', 'apparatus' ),
            'param_name' => 'plan_btn_icon',
            'value' => '',
            'group' => '',
            'settings' => array(
            'emptyIcon' => true,
            'type' => 'fontawesome',
            'iconsPerPage' => 4000,
            ),
            'dependency' => array(
            'element' => 'type',
            'value' => 'fontawesome',
            ),
            'description' => esc_html__( 'Select icon from library.', 'apparatus' ),
            ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Button URL", 'apparatus'),
            "param_name" => "plan_btn_url",
			"value" => '',
            "description" => esc_html__('Button url field. Leave it blank if you want to use PayPal.', 'apparatus')
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Want to use Paypal?", 'apparatus'),
            "param_name" => "paypal",
			"value" => array(
				  "" => "true"
			   ),
			"group" => 'PayPal',
			"description" => '',
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("PayPal Business Email ID", 'apparatus'),
            "param_name" => "email",
			"value" => '',
			"group" => 'PayPal',
			'dependency' => array(
               'element'=>'paypal',
               'value' => 'true'
            ),
            "description" => esc_html__('Your PayPal Business Email ID', 'apparatus')
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Currency", 'apparatus'),
            "param_name" => "currency",
			"value" => 'USD',
			"group" => 'PayPal',
			'dependency' => array(
               'element'=>'paypal',
               'value' => 'true'
            ),
            "description" => esc_html__('Currency of PayPal Payment. Example: USD', 'apparatus')
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Return URL", 'apparatus'),
            "param_name" => "return_url",
			"value" => '',
			"group" => 'PayPal',
			'dependency' => array(
               'element'=>'paypal',
               'value' => 'true'
            ),
            "description" => esc_html__('The URL of Thank You Page.', 'apparatus')
         ),

		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Price Table Background Color", 'apparatus'),
            "param_name" => "bg_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Plan Name Color", 'apparatus'),
            "param_name" => "plan_name_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Plan Description Color", 'apparatus'),
            "param_name" => "plan_description_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),		
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Plan Price Color", 'apparatus'),
            "param_name" => "plan_price_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Plan Features Color", 'apparatus'),
            "param_name" => "plan_features_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Plan Button Primary Background Color", 'apparatus'),
            "param_name" => "plan_btn_bg_color_primary",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Plan Button Secondary Background Color", 'apparatus'),
            "param_name" => "plan_btn_bg_color_secondary",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),		 
   )
)
);

/*****************
Counter Section- 1
*****************/
vc_map( array(
      "name" => esc_html__("FT- Counter Section- 1", 'apparatus'),
      "base" => "appeasy_shortcode_for_counter_section_one",
      "icon" => plugins_url( 'images/vc.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'apparatus'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Shows Counter Section.', 'apparatus'),
      "params" => array(   
		array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Counter Icon', 'apparatus' ),
            'param_name' => 'c1_icon',
            'value' => '',
            'group' => 'Counter-1',
            'settings' => array(
            'emptyIcon' => true,
            'type' => 'fontawesome',
            'iconsPerPage' => 4000,
            ),
            'dependency' => array(
            'element' => 'type',
            'value' => 'fontawesome',
            ),
            'description' => __( 'Select icon from library.', 'apparatus' ),
            ),	  
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Counter Number", 'apparatus'),
            "param_name" => "c1_heading1",
            "value" => '',
            "description" => '',
			'group' => 'Counter-1',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Counter Title", 'apparatus'),
            "param_name" => "c1_heading2",
            "value" => '',
            "description" => '',
			'group' => 'Counter-1',
         ),	
		array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Counter Icon', 'apparatus' ),
            'param_name' => 'c2_icon',
            'value' => '',
            'group' => 'Counter-2',
            'settings' => array(
            'emptyIcon' => true,
            'type' => 'fontawesome',
            'iconsPerPage' => 4000,
            ),
            'dependency' => array(
            'element' => 'type',
            'value' => 'fontawesome',
            ),
            'description' => __( 'Select icon from library.', 'apparatus' ),
            ),	  
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Counter Number", 'apparatus'),
            "param_name" => "c2_heading1",
            "value" => '',
            "description" => '',
			'group' => 'Counter-2',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Counter Title", 'apparatus'),
            "param_name" => "c2_heading2",
            "value" => '',
            "description" => '',
			'group' => 'Counter-2',
         ),	

		array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Counter Icon', 'apparatus' ),
            'param_name' => 'c3_icon',
            'value' => '',
            'group' => 'Counter-3',
            'settings' => array(
            'emptyIcon' => true,
            'type' => 'fontawesome',
            'iconsPerPage' => 4000,
            ),
            'dependency' => array(
            'element' => 'type',
            'value' => 'fontawesome',
            ),
            'description' => __( 'Select icon from library.', 'apparatus' ),
            ),	  
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Counter Number", 'apparatus'),
            "param_name" => "c3_heading1",
            "value" => '',
            "description" => '',
			'group' => 'Counter-3',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Counter Title", 'apparatus'),
            "param_name" => "c3_heading2",
            "value" => '',
            "description" => '',
			'group' => 'Counter-3',
         ),	
		array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Counter Icon', 'apparatus' ),
            'param_name' => 'c4_icon',
            'value' => '',
            'group' => 'Counter-4',
            'settings' => array(
            'emptyIcon' => true,
            'type' => 'fontawesome',
            'iconsPerPage' => 4000,
            ),
            'dependency' => array(
            'element' => 'type',
            'value' => 'fontawesome',
            ),
            'description' => __( 'Select icon from library.', 'apparatus' ),
            ),	  
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Counter Number", 'apparatus'),
            "param_name" => "c4_heading1",
            "value" => '',
            "description" => '',
			'group' => 'Counter-4',
         ),	
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Counter Title", 'apparatus'),
            "param_name" => "c4_heading2",
            "value" => '',
            "description" => '',
			'group' => 'Counter-4',
         ),	

		array(
            "type" => "attach_image",            
            "class" => "",
            "heading" => esc_html__("Section Background Image", 'apparatus'),
            "param_name" => "bg_image",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),			 
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Icon Color", 'apparatus'),
            "param_name" => "icon_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Counter Color", 'apparatus'),
            "param_name" => "counter_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Title Color", 'apparatus'),
            "param_name" => "title_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),		 
   )
)
);

/******************* 
Categorised Blog- 1
********************/
    $categories_array = array();
    $categories = get_categories(array('taxonomy' => 'category',));
    foreach( $categories as $category ) {
        $categories_array[$category->name] = $category->term_id;
    }
vc_map( array(
      "name" => esc_html__("FT- Categorised Blog- 1", 'apparatus'),
      "base" => "appeasy_shortcode_for_categorised_blog_one",
      "icon" => plugins_url( 'images/vc.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'apparatus'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Shows the category wise blog.', 'apparatus'),
      "params" => array(
 
    array(
        "type" => "dropdown",
        "heading" => esc_html__("Which Category Post do you want to display?", 'apparatus'),
        "param_name" => "cat_id",
        "value" => $categories_array,
        "description" => '',
    ),
    array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("How many post do you want to display?", 'apparatus'),
            "param_name" => "post_per_page",
            "value" => '',
            "description" => 'Enter nemeric value.',
         ),
    array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("How many character do you want to display?", 'apparatus'),
            "param_name" => "character",
            "value" => '',
            "description" => 'Enter nemeric value.',
         ),
	 
        array(
          'param_name'    => 'order',
          'type'          => 'dropdown',
          'value' => array(
                    array(
                    'value' => 'DESC',
                    'label' => __( 'DESC', 'apparatus' ),
                    ),
                    array(
                    'value' => 'ASC',
                    'label' => __( 'ASC', 'apparatus' ),
                    ),
                    ),
          'heading'       => esc_html__('Order', 'apparatus'),
          'description'   => 'Select the post order(ASC or DESC). By default is DESC Order',
          'class'         => ''
        ),
        array(
          'param_name'    => 'orderby',
          'type'          => 'dropdown',
          'value' => array(
                    array(
                    'value' => 'date',
                    'label' => __( 'Date', 'apparatus' ),
                    ),
                    array(
                    'value' => 'title',
                    'label' => __( 'Title', 'apparatus' ),
                    ),
                    array(
                    'value' => 'rand',
                    'label' => __( 'Random', 'apparatus' ),
                    ),
                    array(
                    'value' => 'id',
                    'label' => __( 'ID', 'apparatus' ),
                    ),

                    ),
          'heading'       => esc_html__('Sort Post By Order', 'apparatus'),
          'description'   => 'By default is Order By Date',
          'class'         => ''
        ),

   )
)
);

/******************* 
Contact us- 1
********************/

vc_map( array(
      "name" => esc_html__("FT- Contact us- 1", 'apparatus'),
      "base" => "appeasy_shortcode_for_contact_us_one",
      "icon" => plugins_url( 'images/vc.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'apparatus'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Shows the contact us section.', 'apparatus'),
      "params" => array(
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 1", 'apparatus'),
            "param_name" => "heading1",
            "value" => '',
            "description" => '',
         ),
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 2", 'apparatus'),
            "param_name" => "heading2",
            "value" => '',
            "description" => '',
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Which word do you want to thin from heading line 2?", 'apparatus'),
            "param_name" => "heading2_thin",
            "value" => '',
            "description" => esc_html__("Use comma(,) for seperate words.", 'apparatus'),
         ),			 
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Heading Line 3", 'apparatus'),
            "param_name" => "heading3",
            "value" => '',
            "description" => '',
         ),	
		array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__("Twitter URL", 'apparatus'),
					"param_name" => "twitter_url",
					"value" => '',
					"description" => '',
					"group" => '',
				 ),	
		array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__("Facebook URL", 'apparatus'),
					"param_name" => "facebook_url",
					"value" => '',
					"description" => '',
					"group" => '',
				 ),
		array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__("Dribble URL", 'apparatus'),
					"param_name" => "dribble_url",
					"value" => '',
					"description" => '',
					"group" => '',
				 ),
		array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__("Behance URL", 'apparatus'),
					"param_name" => "behance_url",
					"value" => '',
					"description" => '',
					"group" => '',
				 ),				 
				 array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__("Recipient Name", 'apparatus'),
					"param_name" => "recipient_name",
					"value" => '',
					"description" => '',
					"group" => '',
				 ),
				 array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__("Recipient Email", 'apparatus'),
					"param_name" => "recipient_email",
					"value" => '',
					"description" => '',
					"group" => '',
				 ),
				 array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__("Email Subject", 'apparatus'),
					"param_name" => "email_subject",
					"value" => '',
					"description" => '',
					"group" => '',
				 ),	
				 array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__("Name Field Placeholder", 'apparatus'),
					"param_name" => "name_field_placeholder",
					"value" => '',
					"description" => '',
					"group" => '',
				 ),
				 array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__("Email Field Placeholder", 'apparatus'),
					"param_name" => "email_field_placeholder",
					"value" => '',
					"description" => '',
					"group" => '',
				 ),		 

				 array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__("Message Field Placeholder", 'apparatus'),
					"param_name" => "message_field_placeholder",
					"value" => '',
					"description" => '',
					"group" => '',
				 ),
				 
                 array(
            "type" => "checkbox",
            "class" => "",
            "heading" => esc_html__("Do you want Select options?", 'mahveen'),
            "param_name" => "wanttoselect",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Placeholder For Select", 'mahveen'),
            "param_name" => "yourselect",
            "value" => 'Select One',
			'dependency' => array(
				 'element' => 'wanttoselect',
				 'value' =>'yes',
			 ),
            "description" => ''
         ),
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Add items comma separated", 'mahveen'),
            "param_name" => "selectitems",
            "value" => 'One, Two, Three, Four, Five',
			'dependency' => array(
				 'element' => 'wanttoselect',
				 'value' =>'yes',
			 ),
            "description" => 'Add items comma separated with a space like One, Two, Three, Four, Five'
         ),
		 array(
            "type" => "checkbox",
            "class" => "",
            "heading" => esc_html__("Do you want Radio options?", 'mahveen'),
            "param_name" => "wanttoradio",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Placeholder For Radio", 'mahveen'),
            "param_name" => "yourradio",
            "value" => 'Select Radio',
			'dependency' => array(
				 'element' => 'wanttoradio',
				 'value' =>'yes',
			 ),
            "description" => ''
         ),
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Add radio items comma separated", 'mahveen'),
            "param_name" => "radioitems",
            "value" => 'One, Two, Three, Four, Five',
			'dependency' => array(
				 'element' => 'wanttoradio',
				 'value' =>'yes',
			 ),
            "description" => 'Add radio items comma separated with a space like One, Two, Three, Four, Five'
         ),
		 array(
            "type" => "checkbox",
            "class" => "",
            "heading" => esc_html__("Do you want Checkbox options?", 'mahveen'),
            "param_name" => "wanttocheckbox",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Placeholder For Checkbox", 'mahveen'),
            "param_name" => "yourcheckbox",
            "value" => 'Select Checkbox',
			'dependency' => array(
				 'element' => 'wanttocheckbox',
				 'value' =>'yes',
			 ),
            "description" => ''
         ),
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Add checkbox items comma separated", 'mahveen'),
            "param_name" => "checkboxitems",
            "value" => 'One, Two, Three, Four, Five',
			'dependency' => array(
				 'element' => 'wanttocheckbox',
				 'value' =>'yes',
			 ),
            "description" => 'Add checkbox items comma separated with a space like One, Two, Three, Four, Five'
         ),				 
		 array(
            "type" => "attach_image",            
            "class" => "",
            "heading" => esc_html__("Attach Background Image", 'apparatus'),
            "param_name" => "bg_image",
            "value" => '',
            "description" => '',
         ),					 

		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Headline One Color", 'apparatus'),
            "param_name" => "heading1_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Headline Two Color", 'apparatus'),
            "param_name" => "heading2_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ),	
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Headline Three Color", 'apparatus'),
            "param_name" => "heading3_color",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ), 
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Button Primary Background Color", 'apparatus'),
            "param_name" => "btn_bg_primary",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ), 
		array(
            "type" => "colorpicker",            
            "class" => "",
            "heading" => esc_html__("Button Secondary Background Color", 'apparatus'),
            "param_name" => "btn_bg_secondary",
            "value" => '',
            "description" => '',
			"group" => 'Design-Options',
         ), 

   )
)
);

}