<?php
// VC_row customization

vc_add_param("vc_row", array(
   "type" => "textfield",
   "class" => "",
   "heading" => esc_html__("Want to have top padding?",'apparatus'),
   "param_name" => "top_padding",
   "value" => "",
   "description" => esc_html__("Input top padding in pixel (i.e 50px).", "apparatus"),
));

vc_add_param("vc_row", array(
   "type" => "textfield",
   "class" => "",
   "heading" => esc_html__("Want to have bottom padding?",'apparatus'),
   "param_name" => "bottom_padding",
   "value" => "",
   "description" => esc_html__("Input bottom padding in pixel (i.e 50px).", "apparatus"),
));

vc_add_param("vc_row", array(
   "type" => "textfield",
   "class" => "",
   "heading" => esc_html__("Want to have left padding?",'apparatus'),
   "param_name" => "zleft_padding",
   "value" => "",
   "description" => esc_html__("Input left padding in pixel (i.e 50px).", "apparatus"),
));

vc_add_param("vc_row", array(
   "type" => "textfield",
   "class" => "",
   "heading" => esc_html__("Want to have right padding?",'apparatus'),
   "param_name" => "zright_padding",
   "value" => "",
   "description" => esc_html__("Input right padding in pixel (i.e 50px).", "apparatus"),
));

// VC_column_text customization

vc_add_param("vc_column_text", array(
   "type" => "colorpicker",
   "class" => "",
   "heading" => esc_html__("Play text color", "apparatus"),
   "param_name" => "txt_color",
   "value" => "",
   "description" => '',
));



