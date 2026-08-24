<?php
/*** Removing shortcodes ***/
vc_remove_element("vc_widget_sidebar");
vc_remove_element("vc_gallery");
vc_remove_element("vc_wp_search");
vc_remove_element("vc_wp_meta");
vc_remove_element("vc_wp_recentcomments");
vc_remove_element("vc_wp_calendar");
vc_remove_element("vc_wp_pages");
vc_remove_element("vc_wp_tagcloud");
vc_remove_element("vc_wp_custommenu");
vc_remove_element("vc_wp_text");
vc_remove_element("vc_wp_posts");
vc_remove_element("vc_wp_links");
vc_remove_element("vc_wp_categories");
vc_remove_element("vc_wp_archives");
vc_remove_element("vc_wp_rss");
vc_remove_element("vc_teaser_grid");
vc_remove_element("vc_button");
vc_remove_element("vc_button2");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_cta_button2");
vc_remove_element("vc_message");
vc_remove_element("vc_tour");
vc_remove_element("vc_progress_bar");
vc_remove_element("vc_pie");
vc_remove_element("vc_posts_slider");
vc_remove_element("vc_toggle");
vc_remove_element("vc_images_carousel");
vc_remove_element("vc_posts_grid");
vc_remove_element("vc_carousel");

/*** Remove unused parameters ***/
if (function_exists('vc_remove_param')) {
	vc_remove_param('vc_single_image', 'css_animation');
	vc_remove_param('vc_column_text', 'css_animation');
	vc_remove_param('vc_row', 'video_bg');
	vc_remove_param('vc_row', 'video_bg_url');
	vc_remove_param('vc_row', 'video_bg_parallax');
	vc_remove_param('vc_row', 'full_height');
	vc_remove_param('vc_row', 'content_placement');
	vc_remove_param('vc_row', 'full_width');
	vc_remove_param('vc_row', 'bg_image');
	vc_remove_param('vc_row', 'bg_color');
	vc_remove_param('vc_row', 'font_color');
	vc_remove_param('vc_row', 'margin_bottom');
	vc_remove_param('vc_row', 'bg_image_repeat');
	vc_remove_param('vc_tabs', 'interval');
	vc_remove_param('vc_separator', 'style');
	vc_remove_param('vc_separator', 'color');
	vc_remove_param('vc_separator', 'accent_color');
	vc_remove_param('vc_separator', 'el_width');
	vc_remove_param('vc_text_separator', 'style');
	vc_remove_param('vc_text_separator', 'color');
	vc_remove_param('vc_text_separator', 'accent_color');
	vc_remove_param('vc_text_separator', 'el_width');
	vc_remove_param('vc_row', 'gap');
    vc_remove_param('vc_row', 'columns_placement');
    vc_remove_param('vc_row', 'equal_height');
    vc_remove_param('vc_row_inner', 'gap');
    vc_remove_param('vc_row_inner', 'content_placement');
    vc_remove_param('vc_row_inner', 'equal_height');
    vc_remove_param('vc_hoverbox', 'use_custom_fonts_primary_title');
    vc_remove_param('vc_hoverbox', 'use_custom_fonts_hover_title');
    vc_remove_param('vc_hoverbox', 'hover_add_button');
	vc_remove_param('vc_row', 'parallax');
    vc_remove_param('vc_row', 'parallax_image');
	vc_remove_param('vc_row', 'parallax_speed_bg');
	vc_remove_param('vc_row', 'parallax_speed_video');
	vc_remove_param('vc_row', 'disable_element');
	vc_remove_param('vc_row', 'el_id');
	vc_remove_param('vc_row', 'el_class');
	//vc_remove_param('vc_row', 'css_animation');
}

/*** Row ***/

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => "Row Type",
	"param_name" => "row_type",
	"value" => array(
		
		"Section" => "sec1",
	
	)
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Container",
	"param_name" => "enablecontainer",
	"value" => array(
		"Enable" => "st1",
		"Disable" => "st2",		
			
	),
	
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Scroll ID",
	"param_name" => "scroll_id",
	"value" => "",
	"description" => "e.x: sec2",
	
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Custom Padding",
	"param_name" => "secpadding",
	"value" => array(
		"Disable" => "st1",
		"Enable" => "st2",		
	),
	
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding Top",
	"value" => "",
	"param_name" => "sec_padding_top",
	"description" => "e.x: 50",
	"dependency" => Array('element' => "secpadding", 'value' => array('st2'))
	
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding Bottom",
	"value" => "",
	"param_name" => "sec_padding_bottom",
	"description" => "e.x: 50",
	"dependency" => Array('element' => "secpadding", 'value' => array('st2'))
	
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Title Section",
	"param_name" => "enabletitle",
	"value" => array(
		"Disable" => "st1",
		"Enable" => "st2",		
			
	),
	
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Section Number",
	"value" => "",
	"param_name" => "zonar_sec_number",
	"description" => "Optional.<br> e.x: 1",
	"dependency" => Array('element' => "enabletitle", 'value' => array('st2'))
	
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Title",
	"value" => "",
	"param_name" => "zonar_sec_title",
	"description" => "",
	"dependency" => Array('element' => "enabletitle", 'value' => array('st2'))
	
));

vc_add_param("vc_row", array(
	"type" => "textarea",
	"class" => "",
	"heading" => "Description",
	"value" => "",
	"param_name" => "zonar_sec_dectiption",
	"description" => "",
	"dependency" => Array('element' => "enabletitle", 'value' => array('st2'))
	
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Section Separator",
	"param_name" => "enableseparator",
	"value" => array(
		"Enable" => "st1",
		"Disable" => "st2",		
			
	),
	
));




/***************** Zonar  Shortcodes *********************/

// zonar image
vc_map( array(
		"name" => "Zonar Image",
		"base" => "zonar_image",
		"category" => 'bY Zonar',
		"icon" => "icon-wpb-single-image",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			
			array(
				"type" => "attach_image",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Upload Image",
				"param_name" => "image",
				"description" => "",
				"admin_label" => true,
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Popup Video URL",
				"param_name" => "pop_video",
				"value" => "",
				"description" => "Use Youtube/ Vimeo video URL. E.X: https://vimeo.com/34741214",
				"admin_label" => true,
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Play Story video",
				"param_name" => "text_translate_opt",
				"value" => "",
				"description" => "Translate Option.",
			),
				
		)
) );

// image slider
vc_map( array(
		"name" => "Zonar Image Carousel",
		"base" => "zonar_image_carousel",
		"category" => 'bY Zonar',
		"icon" => "zonar-icon",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			array(
				"type" => "attach_images",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Upload Images",
				"param_name" => "image",
				"description" => "Upload same size images.",
				"admin_label" => true,
			),
			
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Image Title & Caption",
				"param_name" => "zo_image_cap",
				"value" => array(
					"Disable" => "st1",
					"Enable" => "st2",
				),
				"description" => "Enable/ Disable Image Title & Caption.",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Info",
				"param_name" => "text_translate_opt",
				"value" => "",
				"description" => "Translate Option.",
				"dependency" => Array('element' => "zo_image_cap", 'value' => array('st2'))
			),
			
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Image Numbering",
				"param_name" => "zo_image_num",
				"value" => array(
					"Disable" => "st1",
					"Enable" => "st2",
				),
				"description" => "Enable/ Disable Image Number.",
			),
		)
) );

// image gallery
class WPBakeryShortCode_WR_VC_Gallerys  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Zonar Image Gallery", "zonar",
        "base" => "wr_vc_gallerys",
        "as_parent" => array('only' => 'wr_vc_gallery'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'bY Zonar',
		"icon" => "zonar-icon",
        "show_settings_on_create" => true,
        "params" => array(
		
		array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => "",
			),
			
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Gallery extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Gallery Item", "zonar",
        "base" => "wr_vc_gallery",
        "content_element" => true,
		"icon" => "zonar-icon",
        "as_child" => array('only' => 'wr_vc_gallerys'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
				
			
			
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Column Size",
				"param_name" => "column_size",
				"value" => array(
					"Default" => "gallery-item-one",
					"Large" => "gallery-item-second",
				),
				"description" => "",
			),
		
			array(
				"type" => "attach_images",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Upload Images",
				"param_name" => "image",
				"description" => "Upload only 1 image if you added a popup video URL.",
				"admin_label" => true,
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Popup Video",
				"param_name" => "popup_video",
				"value" => "",
				"description" => "Use Youtube/ Vimeo video URL.<br> E.X: https://vimeo.com/322246026 <br> Optional. ",
				"admin_label" => true,
			),
							
            
        )
) );

// zonar simple title
vc_map( array(
		"name" => "Zonar Simple Ttitle",
		"base" => "zonar_simple_title",
		"category" => 'bY Zonar',
		"icon" => "zonar-icon",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"value" => "",
				"description" => "E.X :Project Info",
				"admin_label" => true,
			),
			
			
		)
) );

// Zonar textblock
class WPBakeryShortCode_WR_VC_Textblock  extends WPBakeryShortCode {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Zonar Text Block", "zonar",
        "base" => "wr_vc_textblock",
        "content_element" => true,
		"category" => 'bY Zonar',
		"icon" => "icon-wpb-layer-shape-text",
        
        "params" => array(
			
			
			array(
				"type" => "textarea",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"value" => "",
				"description" => "E.X: Innovative solutions to boost [br][span] your creative [/span]  projects",
				"admin_label" => true,
			),
			
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "",
				"description" => "",
			),
			
        ),
        
) );

// zonar button
class WPBakeryShortCode_WR_VC_Button  extends WPBakeryShortCode {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Zonar Button", "zonar",
        "base" => "wr_vc_button",
        "content_element" => true,
		"category" => 'bY Zonar',
		"icon" => "icon-wpb-ui-button",
        
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Button Text",
				"param_name" => "button_text",
				"value" => "",
				"description" => "",
				"admin_label" => true,
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Button URL",
				"param_name" => "button_url",
				"value" => "",
				"description" => "",
				"admin_label" => true,
			),
			
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Padding Right",
				"param_name" => "button_padding",
				"value" => array(
					"Disable" => "st1",
					"Enable" => "st2",
				),
				"description" => "",
				
			),
			
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Ajax Load",
				"param_name" => "button_ajax_load",
				"value" => array(
					"Disable" => "det-anim",
					"Enable" => "ajax",
					
				),
				"description" => "Disable ajax load, if you are using URL from other site.",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Link Target",
				"param_name" => "button_target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => "",
				"dependency" => Array('element' => "button_ajax_load", 'value' => array('noajax'))
			),
            
        ),
        
) );

// Number Counter
class WPBakeryShortCode_WR_VC_Counters  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Zonar Number Counter", "zonar",
        "base" => "wr_vc_counters",
        "as_parent" => array('only' => 'wr_vc_counter'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'bY Zonar',
		"icon" => "zonar-icon",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => ""
			),	
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Counter extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Counter Item", "zonar",
        "base" => "wr_vc_counter",
        "content_element" => true,
		"icon" => "zonar-icon",
        "as_child" => array('only' => 'wr_vc_counters'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
		
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title",
				"param_name" => "datatitle",
				"value" => "",
				"description" => "e.x: Finished projects",
				"admin_label" => true,
			),
			
				
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Counter Number",
				"param_name" => "datanumber",
				"value" => "",
				"description" => "e.x: 145",
				"admin_label" => true,
			),
		 )
) );

// feature
class WPBakeryShortCode_WR_VC_Features  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Zonar Features", "zonar",
        "base" => "wr_vc_features",
        "as_parent" => array('only' => 'wr_vc_feature'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'bY Zonar',
		"icon" => "zonar-icon",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => ""
			),	
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Section Nubmer",
				"param_name" => "sec_number",
				"value" => "",
				"description" => "Optional. <br> E.X: 01",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"value" => "",
				"admin_label" => true,
			),
			
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Icon Class",
				"param_name" => "iconclass",
				"value" => "",
				"description" => "Use <a href='https://fontawesome.com/icons?d=gallery' target='_blank'>Fontawesome</a> Icon Class. <br> E.X: fal fa-desktop",
				"admin_label" => true,
			),
			
			array(
				"type" => "textarea",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Short Details",
				"param_name" => "text1",
				"value" => "",
				"admin_label" => true,
			),
			
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Popup Content",
				"param_name" => "text2",
				"value" => ""
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Details",
				"param_name" => "text_translate",
				"value" => "",
				"description" => "Translate Option.",
			),
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Feature extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Popup Area's Tag", "zonar",
        "base" => "wr_vc_feature",
        "content_element" => true,
		"icon" => "zonar-icon",
        "as_child" => array('only' => 'wr_vc_features'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
		
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Data Title",
				"param_name" => "datatitle",
				"value" => "",
				"description" => "e.x: Concept",
				"admin_label" => true,
			),
			
		 )
) );

// call to
vc_map( array(
		"name" => "Zonar Call To Action",
		"base" => "zonar_call_to_action1",
		"category" => 'bY Zonar',
		"icon" => "icon-wpb-call-to-action",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"value" => "",
				"description" => "",
				"admin_label" => true,
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Button Text",
				"param_name" => "button_text",
				"value" => "",
				"description" => "",
				"admin_label" => true,
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Button URL",
				"param_name" => "button_url",
				"value" => "",
				"description" => "",
				"admin_label" => true,
			),
			
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Ajax Load",
				"param_name" => "link_type",
				"value" => array(
					"Enable" => "st1",
					"Disable" => "st2",
					
				),
				"description" => "Disable ajax load, if you are using URL from other site.",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Link Target",
				"param_name" => "button_target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => "",
				"dependency" => Array('element' => "link_type", 'value' => array('st2'))
			),
				
		)
) );

// wr piechart
class WPBakeryShortCode_WR_VC_Piecharts  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Zonar Piechart", "zonar",
        "base" => "wr_vc_piecharts",
        "as_parent" => array('only' => 'wr_vc_piechart'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'bY Zonar',
		"icon" => "icon-wpb-vc-round-chart",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => "",
				"description" => "",
				
			),
			
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => "Piechart Background Color",
				"param_name" => "data_color",
				"value" => "",
				"description" => "Optional",
			),
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Piechart extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Piechart Item", "zonar",
        "base" => "wr_vc_piechart",
        "content_element" => true,
		"icon" => "icon-wpb-vc-round-chart",
        "as_child" => array('only' => 'wr_vc_piecharts'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
		
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"value" => "",
				"description" => "",
				"admin_label" => true,
			),
			
				
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Data Percent",
				"param_name" => "data_percent",
				"value" => "",
				"description" => "e.x: 80",
				"admin_label" => true,
			),
			
        )
) );

// wr skillbar
class WPBakeryShortCode_WR_VC_Skillbars  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Zonar Skill Bar", "zonar",
        "base" => "wr_vc_skillbars",
        "as_parent" => array('only' => 'wr_vc_skillbar'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'bY Zonar',
		"icon" => "icon-wpb-vc-line-chart",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => ""
			),	
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Skillbar extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Skill Bar Item", "zonar",
        "base" => "wr_vc_skillbar",
        "content_element" => true,
		"icon" => "icon-wpb-vc-line-chart",
        "as_child" => array('only' => 'wr_vc_skillbars'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
		
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"value" => "",
				"description" => "",
				"admin_label" => true,
			),
			
				
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Data Percent",
				"param_name" => "data_percent",
				"value" => "",
				"description" => "e.x: 80",
				"admin_label" => true,
			),
			
        )
) );


// wr testimonials
class WPBakeryShortCode_WR_VC_Testimonials  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Zonar Testimonial", "zonar",
        "base" => "wr_vc_testimonials",
        "as_parent" => array('only' => 'wr_vc_testimonial'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'bY Zonar',
		"icon" => "zonar-icon",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => ""
			),	
			
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Slider Autoplay",
				"param_name" => "autoplay",
				"value" => array(
					"Disable" => "false",
					"Enable" => "true",
					
				),
				"description" => "Optional.",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Slider Speed",
				"param_name" => "slider_speed",
				"value" => "",
				"description" => "Default: 1400"
			),
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Testimonial extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Testimonial Item", "zonar",
        "base" => "wr_vc_testimonial",
        "content_element" => true,
		"icon" => "zonar-icon",
        "as_child" => array('only' => 'wr_vc_testimonials'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
				
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Testimonial Number",
				"param_name" => "testimonial_number",
				"value" => "",
				"description" => "Optional. e.x: 01",
			),
			
			array(
				"type" => "attach_image",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Client's Image",
				"param_name" => "image",
				"description" => "",
				"admin_label" => true,
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Client Name",
				"param_name" => "clientname",
				"value" => "",
				"description" => "",
				"admin_label" => true,
			),
			
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Text",
				"param_name" => "content",
				"value" => ""
			),
			
        )
) );

// client logo
class WPBakeryShortCode_WR_VC_Clients  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Client Logo", "zonar",
        "base" => "wr_vc_clients",
        "as_parent" => array('only' => 'wr_vc_client'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'bY Zonar',
		"icon" => "zonar-icon",
        "show_settings_on_create" => true,
        "params" => array(
		
		array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => ""
			),
			
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Client extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Client Logo Item", "zonar",
        "base" => "wr_vc_client",
        "content_element" => true,
		"icon" => "zonar-icon",
        "as_child" => array('only' => 'wr_vc_clients'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
				
			
			
			array(
				"type" => "attach_image",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Uplod Client Logo",
				"param_name" => "image",
				"description" => "",
				"admin_label" => true,
			),
			
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Custom URL",
				"param_name" => "button_url",
				"value" => "",
				"description" => "",
				"admin_label" => true,
			),
			
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Link Target",
				"param_name" => "button_target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => "",
			),
							
            
        )
) );

// wr team block
vc_map( array(
		"name" => "Zonar Team Member",
		"base" => "zonar_team",
		"category" => 'bY Zonar',
		"icon" => "zonar-icon",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Section_number",
				"param_name" => "sec_number",
				"value" => "",
				"description" => "E.X: 01",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Name",
				"param_name" => "title",
				"value" => "",
				"admin_label" => true,
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Custom Url",
				"param_name" => "custom_url",
				"value" => "",
				"description" => "Effected on title. <br> Optional.",
				"admin_label" => true,
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Designation",
				"param_name" => "designation",
				"value" => "",
				"admin_label" => true,
			),
			
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Description",
				"param_name" => "content",
				"value" => "",
			),
			
			 array(
				"type" => "attach_image",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Member's Image",
				"param_name" => "image",
				"description" => "",
				"admin_label" => true,
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Mail Address",
				"param_name" => "mail",
				"value" => "",
			),
				
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Behance Social URL",
				"param_name" => "behance",
				"value" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Facebook Social URL",
				"param_name" => "facebook",
				"value" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Google Social URL",
				"param_name" => "gplus",
				"value" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Twitter Social URL",
				"param_name" => "twitter",
				"value" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Youtube Social URL",
				"param_name" => "youtube",
				"value" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Vimeo Social URL",
				"param_name" => "vimeo",
				"value" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Pinterest Social URL",
				"param_name" => "pinterest",
				"value" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Xing Social URL",
				"param_name" => "xing",
				"value" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Linkedin Social URL",
				"param_name" => "linkedin",
				"value" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Instagram Social URL",
				"param_name" => "instagram",
				"value" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "VKontakte Social URL",
				"param_name" => "vkontakte",
				"value" => "",
			),
			
		)
) );


// wr team
class WPBakeryShortCode_WR_VC_Teams  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Zonar Team Carousel", "zonar",
        "base" => "wr_vc_teams",
        "as_parent" => array('only' => 'wr_vc_team'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'bY Zonar',
		"icon" => "zonar-icon",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Class",
				"param_name" => "data_class",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Slider Autoplay",
				"param_name" => "autoplay",
				"value" => array(
					"Disable" => "false",
					"Enable" => "true",
					
				),
				"description" => "Optional.",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Slider Speed",
				"param_name" => "slider_speed",
				"value" => "",
				"description" => "Default: 1400"
			),
		),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Team extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Team Item", "zonar",
        "base" => "wr_vc_team",
        "content_element" => true,
		"icon" => "zonar-icon",
        "as_child" => array('only' => 'wr_vc_teams'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Section_number",
				"param_name" => "sec_number",
				"value" => "",
				"description" => "E.X: 01",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Name",
				"param_name" => "title",
				"value" => "",
				"admin_label" => true,
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Custom URL",
				"param_name" => "custom_url",
				"value" => "",
				"description" => "Effected on title. <br> Optional.",
				"admin_label" => true,
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Designation",
				"param_name" => "designation",
				"value" => "",
				"admin_label" => true,
			),
			
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Description",
				"param_name" => "content",
				"value" => "",
			),
			
			 array(
				"type" => "attach_image",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Member's Image",
				"param_name" => "image",
				"description" => "",
				"admin_label" => true,
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Mail Address",
				"param_name" => "mail",
				"value" => "",
			),
				
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Behance Social URL",
				"param_name" => "behance",
				"value" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Facebook Social URL",
				"param_name" => "facebook",
				"value" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Google Social URL",
				"param_name" => "gplus",
				"value" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Twitter Social URL",
				"param_name" => "twitter",
				"value" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Youtube Social URL",
				"param_name" => "youtube",
				"value" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Vimeo Social URL",
				"param_name" => "vimeo",
				"value" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Pinterest Social URL",
				"param_name" => "pinterest",
				"value" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Xing Social URL",
				"param_name" => "xing",
				"value" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Linkedin Social URL",
				"param_name" => "linkedin",
				"value" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Instagram Social URL",
				"param_name" => "instagram",
				"value" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "VKontakte Social URL",
				"param_name" => "vkontakte",
				"value" => "",
			),
			
		
        )
) );


// wr biography
class WPBakeryShortCode_WR_VC_Biographys  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Zonar Information", "theside",
        "base" => "wr_vc_biographys",
        "as_parent" => array('only' => 'wr_vc_biography'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'bY Zonar',
		"icon" => "zonar-icon",
        "show_settings_on_create" => true,
        "params" => array(
			
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => "",
				"description" => "",
			),
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Details",
				"param_name" => "translate_txt",
				"value" => "",
				"description" => "Translate Option.",
			),
			
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Biography extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Information Item", "zonar",
        "base" => "wr_vc_biography",
        "content_element" => true,
		"icon" => "zonar-icon",
        "as_child" => array('only' => 'wr_vc_biographys'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
				
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Data Title",
				"param_name" => "data_title",
				"description" => "e.x: 01. Category :",
				"admin_label" => true,
			),
			
			array(
				"type" => "textarea_html",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Data Content",
				"param_name" => "content",
				"description" => "e.x: Architect <br> HTML tag allowed. ",
				"admin_label" => true,
			),
		)
) );

// wr accordion
class WPBakeryShortCode_WR_VC_Accordions  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Zonar Accordion", "zonar",
        "base" => "wr_vc_accordions",
        "as_parent" => array('only' => 'wr_vc_accordion'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'bY Zonar',
		"icon" => "zonar-icon",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => ""
			),

		),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Accordion extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Accordion Item", "Zonar",
        "base" => "wr_vc_accordion",
        "content_element" => true,
		"icon" => "zonar-icon",
        "as_child" => array('only' => 'wr_vc_accordions'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
		
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => esc_html__('Active', 'zonar'),
				"param_name" => "accordion_active",
				"value" => array(
					"No" => "dact-accordion",
					"Yes" => "act-accordion",
				),
				"description" => "Select Yes For 1st Accordion Item.",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Data Title",
				"param_name" => "title",
				"value" => "",
				"description" => "e.x: Concept for Project",
				"admin_label" => true,
			),
			
			
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Content",
				"param_name" => "content",
				"value" => "",
				"description" => "",
			),
		
			
        )
) );


?>