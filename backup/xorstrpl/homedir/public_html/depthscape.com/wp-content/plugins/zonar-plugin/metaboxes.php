<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'rnr_';

global $meta_boxes;

$meta_boxes = array();

global $smof_data;


/* ----------------------------------------------------- */
// Page Sections Metaboxes
/* ----------------------------------------------------- */


/* ----------------------------------------------------- */
// Revolution Slider
/* ----------------------------------------------------- */

$revolutionslider = array();
$revolutionslider[0] = 'No Slider';

if(class_exists('RevSlider')){
    $slider = new RevSlider();
	$arrSliders = $slider->getArrSliders();
	foreach($arrSliders as $revSlider) { 
		$revolutionslider[$revSlider->getAlias()] = $revSlider->getTitle();
	}
}

/* Page Section Background Settings */

$grid_array = array('2 Columns','3 Columns','4 Columns');

$pagebg_type_array = array(
	'image' => 'Image',
	'gradient' => 'Gradient',
	'color' => 'Color'
);

/* ----------------------------------------------------- */
/* page Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'ajax_page_type',
	'title' => 'Ajax Loading',
	// Show this meta box for posts matched below conditions
    'hide'   => array(
    // List of page templates (used for page only). Array. Optional.
    'template'    => array( 'contact-page.php'),
	),
	'pages' => array( 'page', 'post', 'portfolio', 'product' ),
	'context' => 'normal',	

	'fields' => array(
	
	array(
			'name'		=> 'Disable Ajax Page Loading',
			'id'		=> $prefix . 'open_page',
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std'  => 0,
			'desc' =>'If you would like to use WP Bakery default elements or Elementor Website Builder  please disable Ajax loading.',
		),	

			
	)
);

/* ----------------------------------------------------- */
/* page Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'blog_page_type',
	'title' => 'Blog Page Template Function',
	// Show this meta box for posts matched below conditions
        'show'   => array(
    // List of page templates (used for page only). Array. Optional.
    'template'    => array( 'blog.php'),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
	
		
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Blog Layout', 'dogmawp' ),
			'id'   => $prefix . 'wrblog-pagetype',
			'desc'  => __( 'Working only Blog Page Template', 'dogmawp' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st0' => esc_attr__( 'Right Sidebar', 'zonar' ),
				'st1' => esc_attr__( 'Masonry grid', 'zonar' ),
				'st2' => esc_attr__( 'Left Sidebar', 'zonar' ),
			),
			'desc'  => esc_attr__( '', 'dogmawp' ),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st0',
			'placeholder' => __( 'Select an Option', 'dogmawp' ),
		),
		
		array(
				'name'       => esc_attr__( 'Number Of Post Show', 'blps' ),
				'id'         => $prefix . 'blog-post-show',
				'desc'		=> '',
				'type'       => 'slider',
				// Text labels displayed before and after value
				'prefix'     => __( '', 'blps' ),
				'suffix'     => __( ' Posts', 'blps' ),
				'js_options' => array(
					'min'  => 1,
					'max'  => 400,
					'step' => 1,
				),
			),	

			array(
			'name'		=> 'Include Category',
			'id'		=> $prefix . 'blog-post-cat',
			'desc'		=> 'Enter category name ex: web design, web development (Optional).',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
		array(
		   'name'     => esc_attr__( 'Section Title', 'zonar' ),
		   'id'   => $prefix . 'zo_blog_pages_2column_title_opt',
		   'desc' => '',
		   'type'     => 'select_advanced',
		   // Array of 'value' => 'Label' pairs for select box
		   'options'  => array(
			'st1' => esc_attr__( 'Disable', 'zonar' ),
			'st2' => esc_attr__( 'Enable', 'zonar' ),
		   ),
		   // Select multiple values, optional. Default is false.
		   'std'         => 'st1',
			
		  ),
		  
		  array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'zo_blog_pages_2column_title',
			'desc'		=> 'E.X: My Personal  Blog',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'hidden' => array( 'rnr_zo_blog_pages_2column_title_opt', '!=', 'st2' )
		    ),
			
		array(
			'name'		=> 'Sub Title',
			'id'		=> $prefix . 'zo_blog_pages_2column_subtitle',
			'desc'		=> '',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'hidden' => array( 'rnr_zo_blog_pages_2column_title_opt', '!=', 'st2' )
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Page Scrolling Animation', 'zonar' ),
			'id'   => $prefix . 'wr_page_blog_scrolling_ani',
			'desc'  => esc_html__( 'Disable/ Enable Page Scrolling Animation Section.', 'zonar' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				
				'st1' => esc_attr__( 'Enable', 'zonar' ),
				'st2' => esc_attr__( 'Disable', 'zonar' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'zonar' ),
		),
		
		array(
		   'name'     => esc_attr__( 'Post Meta', 'zonar' ),
		   'id'   => $prefix . 'zo_blog_pages_info_opt',
		   'desc' => 'Enable/ Disable Search, Category & Tag Bar',
		   'type'     => 'select_advanced',
		   // Array of 'value' => 'Label' pairs for select box
		   'options'  => array(
			'st1' => esc_attr__( 'Disable', 'zonar' ),
			'st2' => esc_attr__( 'Enable', 'zonar' ),
		   ),
		   // Select multiple values, optional. Default is false.
		   'std'         => 'st1',
		   'hidden' => array( 'rnr_wrblog-pagetype', '!=', 'st1' )
		  ),
		  
		array(
			'name'		=> 'Search',
			'id'		=> $prefix . 'zo_blog_post_meta_bar_t1',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'hidden' => array( 'rnr_zo_blog_pages_info_opt', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Categories',
			'id'		=> $prefix . 'zo_blog_post_meta_bar_t2',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'hidden' => array( 'rnr_zo_blog_pages_info_opt', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Tags',
			'id'		=> $prefix . 'zo_blog_post_meta_bar_t3',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'hidden' => array( 'rnr_zo_blog_pages_info_opt', '!=', 'st2' )
		),

			
	)
);


/* ----------------------------------------------------- */
/* page Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'home_page_type',
	'title' => 'Default Page Template Function',
	'hide'   => array(
    // List of page templates (used for page only). Array. Optional.
    'template'    => array( 'one-page.php', 'portfolio.php', 'home-page.php', 'blog.php', 'contact-page.php'),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Page Container', 'zonar' ),
			'id'   => $prefix . 'wr_pagetype_container',
			'desc'  => __( 'Disable/ Enable Page Container.', 'zonar' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				
				'st1' => esc_attr__( 'Enable', 'zonar' ),
				'st2' => esc_attr__( 'Disable', 'zonar' ),
			),
			'tooltip' => array(
                    'icon'     => 'help',
                    'content'  => ' Disable page container, If you are using WPBakey Editor.',
                    'position' => 'top',
            ),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'zonar' ),
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Page Top Block Style', 'zonar' ),
			'id'   => $prefix . 'wr_pagetype_top_block',
			'desc'  => esc_html__( 'Disable/ Enable Page Top Block Style.', 'zonar' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				
				'st1' => esc_attr__( 'Enable', 'zonar' ),
				'st2' => esc_attr__( 'Disable', 'zonar' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'zonar' ),
			'visible' => array( 'rnr_wr_page_header_opt', '!=', 'st3' )
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Page Scrolling Animation', 'zonar' ),
			'id'   => $prefix . 'wr_pagetype_scrolling_ani',
			'desc'  => esc_html__( 'Disable/ Enable Page Scrolling Animation Section.', 'zonar' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				
				'st1' => esc_attr__( 'Enable', 'zonar' ),
				'st2' => esc_attr__( 'Disable', 'zonar' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'zonar' ),
		),
		
		
	)
);


/* ----------------------------------------------------- */
/* page Header Options
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'th_default_page_header_opt',
	'title' => 'Default Page Options.',
	'hide'   => array(
    // List of page templates (used for page only). Array. Optional.
   'template'    => array( 'one-page.php', 'portfolio.php', 'home-page.php', 'blog.php', 'contact-page.php'),
	),
	
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Default Page Header/ Right Sidebar Options', 'zonar' ),
			'id'   => $prefix . 'wr_page_header_opt',
			'desc'  => esc_attr__( '', 'zonar' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				
				'st1' => esc_attr__( 'Featured Image', 'zonar' ),
				'st2' => esc_attr__( 'Slideshow', 'zonar' ),
				'st4' => esc_attr__( 'Video', 'zonar' ),
				'st3' => esc_attr__( 'Hidden', 'zonar' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'zonar' ),
		),
		
		array(
				'name'		=> 'Slideshow Speed',
				'id'		=> $prefix . 'zo_page_block_slider_image_speed',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> 'Default: 1400',
				'hidden' => array( 'rnr_wr_page_header_opt', '!=', 'st2' )
				),
		
		array(
			'name'		=> 'Slideshow Delay',
			'id'		=> $prefix . 'zo_page_block_slider_image_delay',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Default: 2500',
			'hidden' => array( 'rnr_wr_page_header_opt', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Slideshow Images',
			'id'		=> $prefix . 'zo_page_block_slider_image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1000',
			'desc'		=> 'Upload Images',
			'hidden' => array( 'rnr_wr_page_header_opt', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'MP4 Video URL',
			'id'		=> $prefix . 'zo_page_header_video_opt',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: https://webredox.net/demo/wp/zonar/wp-content/uploads/2020/11/2.mp4',
			'hidden' => array( 'rnr_wr_page_header_opt', '!=', 'st4' )
		),
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'zo_page_header_title_opt',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'For marking text e.x: Sandy Plegas  - [br][span] Web  developer[/span] and designer[br] form [span]USA[/span]',
			'visible' => array( 'rnr_wr_page_header_opt', '!=', 'st3' )
		),
		
		array(
			'name'		=> 'Description',
			'id'		=> $prefix . 'zo_page_header_sub_title_opt',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> '',
			'visible' => array( 'rnr_wr_page_header_opt', '!=', 'st3' )
		),
		
		
		array(
			'name'		=> 'Scroll Down',
			'id'		=> $prefix . 'zo_page_header_translate_opt',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'visible' => array( 'rnr_wr_page_header_opt', '!=', 'st3' )
		   ),
		  
	)
);




/* ----------------------------------------------------- */
/* Scrolling Page Template Navigation Options
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'scroll_page_nav_opt',
	'title' => 'Scrolling Navigation Options.',
	'hide'   => array(
    // List of page templates (used for page only). Array. Optional.
    'template'    => array( 'one-page.php', 'portfolio.php', 'home-page.php', 'blog.php', 'contact-page.php'),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
	
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Navigation', 'solonick' ),
			'id'   => $prefix . 'wr_nav_sc_opt',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		array(
			'name'		=> 'Filter',
			'id'		=> $prefix . 'zo_page_nav_filtert_opt',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'tooltip' => array(
                    'icon'     => 'help',
                    'content'  => 'Working only on mobile device.',
                    'position' => 'top',
            ),
			'hidden' => array( 'rnr_wr_nav_sc_opt', '!=', 'st2' )
		   ),
		
		array(
				'id'		=> $prefix . 'po_pu_scroll_nav',
				'name'        => 'Scrolling Nvaigation',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Scrolling Nvaigation', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name' => 'Menu Name',
						'id'   => 'po_pu_opt_nav_n',
						'type' => 'text',
						'desc'		=> '',
					),
					
					array(
						'name' => 'Scroll ID',
						'id'   => 'po_pu_opt_nav_i',
						'type' => 'text',
						'desc'		=> 'Use VC Row Scroll ID / Elementor section ID <br> e.x: #about',
					),
					
					
					
				
				),
				'hidden' => array( 'rnr_wr_nav_sc_opt', '!=', 'st2' )
			),
		
	)
);

/* ----------------------------------------------------- */
/* blog page Header Options
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'th_blog_page_header_opt',
	'title' => 'Blog Page Header/ Sidebar Options.',
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wrblog-pagetype' => 'st1',
    ),
	),
	
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Blog Page Header/ Right Sidebar Options', 'zonar' ),
			'id'   => $prefix . 'wr_page_blog_header_opt',
			'desc'  => esc_attr__( '', 'zonar' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				
				'st1' => esc_attr__( 'Featured Image', 'zonar' ),
				'st2' => esc_attr__( 'Slideshow', 'zonar' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'zonar' ),
		),
		array(
				'name'		=> 'Slideshow Speed',
				'id'		=> $prefix . 'zo_page_blog_block_slider_image_speed',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> 'Default: 1400',
				'hidden' => array( 'rnr_wr_page_blog_header_opt', '!=', 'st2' )
				),
		
		array(
			'name'		=> 'Slideshow Delay',
			'id'		=> $prefix . 'zo_page_port_block_slider_image_delay',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Default: 2500',
			'hidden' => array( 'rnr_wr_page_blog_header_opt', '!=', 'st2' )
		),
		array(
			'name'		=> 'Slideshow Images',
			'id'		=> $prefix . 'zo_page_blog_block_slider_image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1000',
			'desc'		=> 'Upload Images',
			'hidden' => array( 'rnr_wr_page_blog_header_opt', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'zo_page_blog_header_title_opt',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'For marking text e.x: Sandy Plegas  - [br][span] Web  developer[/span] and designer[br] form [span]USA[/span]',
		),
		
		array(
			'name'		=> 'Description',
			'id'		=> $prefix . 'zo_page_blog_header_sub_title_opt',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> '',
		),
		
		
		array(
			'name'		=> 'Scroll Down',
			'id'		=> $prefix . 'zo_page_blog_header_translate_opt',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
		
		
		
	)
);



/* ----------------------------------------------------- */
/* home Post Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'home_page_intro_opt',
	'title' => 'Home Page Template Options.',
	// Show this meta box for posts matched below conditions
    'show'   => array(
    // List of page templates (used for page only). Array. Optional.
    'template'    => array( 'home-page.php'),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
	// SELECT BOX
		array(
			'name'     => esc_attr__( 'Home Page Style', 'solonick' ),
			'id'   => $prefix . 'wr_intro_sc_opt',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st0' => esc_attr__( 'Select an Option', 'solonick' ),
				'st1' => esc_attr__( 'Image', 'solonick' ),
				'st7' => esc_attr__( 'Half Image', 'solonick' ),
				'st2' => esc_attr__( 'Slider', 'solonick' ),
				'st3' => esc_attr__( 'Carousel', 'solonick' ),
				'st4' => esc_attr__( 'Slideshow', 'solonick' ),
				'st5' => esc_attr__( 'Video', 'solonick' ),
				'st6' => esc_attr__( 'Revolution Slider', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st0',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		
	
	)
);

/* ----------------------------------------------------- */
/* intro parallax image
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_parallax_image_solonick',
	'title' => 'Image Options.',
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_intro_sc_opt'              => 'st1',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'		=> 'Background Image',
			'id'		=> $prefix . 'zo_intro_back_parallax_image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1',
			'desc'		=> 'Background Image',
		),
		
		
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'zo_intro_parallax_image_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> 'For marking text e.x: Sandy Plegas  - [br][span] Web  developer[/span] and designer[br] form [span]USA[/span]',
		),
		
		array(
			'name'		=> 'Content',
			'id'		=> $prefix . 'zo_intro_parallax_image_sub_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> '',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Text Slider', 'solonick' ),
			'id'   => $prefix . 'zo_intro_parallax_image_right_side_con',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
			array(
				'id'		=> $prefix . 'zo_intro_parallax_image_rightside_con_opt',
				'name'        => 'Text Slider Item',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Text Slider Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name'		=> 'Content',
						'id'		=> $prefix . 'zo_intro_parallax_image_con_text',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'e.x: Web Design',
					),
					
					
				),
				'hidden' => array( 'rnr_zo_intro_parallax_image_right_side_con', '!=', 'st2' )
			),
		
		
		array(
			'name'		=> 'Button URL',
			'id'		=> $prefix . 'zo_intro_parallax_image_button_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		
		array(
			'name'		=> 'Button Text',
			'id'		=> $prefix . 'zo_intro_parallax_image_button_text',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'E.X: My portfolio',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Button Target', 'solonick' ),
			'id'   => $prefix . 'zo_intro_parallax_image_button_target',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'_self' => esc_attr__( 'Self', 'solonick' ),
				'_blank' => esc_attr__( 'Blank', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => '_self',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		// number counter
		array(
			'name'     => esc_attr__( 'Number Counter', 'solonick' ),
			'id'   => $prefix . 'zo_intro_parallax_image_number_counter',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
			array(
				'id'		=> $prefix . 'zo_intro_parallax_image_number_counter_con_opt',
				'name'        => 'Number Counter Item',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Number Counter Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name'		=> 'Data Title',
						'id'		=> $prefix . 'zo_intro_parallax_image_number_counter_title',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'e.x: Finished projects',
					),
					
					array(
						'name'		=> 'Data Number',
						'id'		=> $prefix . 'zo_intro_parallax_image_number_counter_number',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'e.x: 145',
					),
					
					
				),
				'hidden' => array( 'rnr_zo_intro_parallax_image_number_counter', '!=', 'st2' )
			),
			
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Location Tooltip', 'solonick' ),
			'id'   => $prefix . 'zo_intro_parallax_loaction_tooltip',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		array(
		'id'		=> $prefix . 'zo_intro_parallax_loc_tooltip_content',
			'name'        => 'Location Tooltip Content',
			'type'        => 'group',
			'clone'       => true,
			'sort_clone'  => true,
			'collapsible' => true,
			'group_title' => 'Location Tooltip Content', // ID of the subfield
			'save_state' => true,
			'fields' => array(
				array(
				'name'		=> 'Content',
				'id'		=> $prefix . 'zo_intro_parallax_lo_tooltip_intro',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> 'e.x: 40.7143528',
				),
			),
			'hidden' => array( 'rnr_zo_intro_parallax_loaction_tooltip', '!=', 'st2' )
		),
			
		array(
			'name'		=> 'Hover Content',
			'id'		=> $prefix . 'zo_intro_parallax_top_con_hover_intro',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: Based In NewYork',
			'hidden' => array( 'rnr_zo_intro_parallax_loaction_tooltip', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Hover Content URL',
			'id'		=> $prefix . 'zo_intro_parallax_top_con_hover_intro_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Optional',
			'hidden' => array( 'rnr_zo_intro_parallax_loaction_tooltip', '!=', 'st2' )
		),
		
		// Video Story
		array(
			'name'     => esc_attr__( 'Promo Video', 'solonick' ),
			'id'   => $prefix . 'zo_intro_parallax_video_story',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		array(
			'name'		=> 'Promo Title',
			'id'		=> $prefix . 'zo_intro_parallax_video_story_title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'E.X: Play Story Video',
			'hidden' => array( 'rnr_zo_intro_parallax_video_story', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Promo Content',
			'id'		=> $prefix . 'zo_intro_parallax_video_story_content',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
			'hidden' => array( 'rnr_zo_intro_parallax_video_story', '!=', 'st2' )
		),
		
		// Video Story type
		array(
			'name'     => esc_attr__( 'Video Type', 'solonick' ),
			'id'   => $prefix . 'zo_intro_parallax_video_type_story',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Youtube/ Vimeo', 'solonick' ),
				'st2' => esc_attr__( 'MP4', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
			'hidden' => array( 'rnr_zo_intro_parallax_video_story', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Youtube/ Vimeo Video URL',
			'id'		=> $prefix . 'zo_intro_parallax_video_story_video_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Youtube/ Vimeo video. <br>E.X: https://vimeo.com/322246026',
			'hidden' => array( 'rnr_zo_intro_parallax_video_type_story', '!=', 'st1' )
		),
		
		array(
			'name'		=> 'MP4 Video URL',
			'id'		=> $prefix . 'zo_intro_parallax_video_story_video_mp4_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: https://webredox.net/demo/wp/zonar/wp-content/uploads/2020/11/2.mp4',
			'hidden' => array( 'rnr_zo_intro_parallax_video_type_story', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Video Thumbnail',
			'id'		=> $prefix . 'zo_intro_parallax_video_story_thumbnail',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1',
			'desc'		=> 'Upload video thumbnail image.',
			'hidden' => array( 'rnr_zo_intro_parallax_video_story', '!=', 'st2' )
		),
		
		array(
		'name'		=> 'Explore Button Text',
		'id'		=> $prefix . 'zo_intro_parallax_extra_button_text',
		'clone'		=> false,
		'type'		=> 'text',
		'std'		=> '',
		'desc'		=> 'E.X: Start explore',
		),
					
		array(
		'name'		=> 'Explore Button URL',
		'id'		=> $prefix . 'zo_intro_parallax_extra_button_url',
		'clone'		=> false,
		'type'		=> 'text',
		'std'		=> '',
		'desc'		=> 'Optional.',
		),
		array(
		'name'     => esc_attr__( 'Explore Button Target', 'solonick' ),
		'id'   => $prefix . 'zo_intro_parallax_extra_buttn_target',
		'desc'  => esc_attr__( '', 'solonick' ),
		'type'     => 'select_advanced',
		// Array of 'value' => 'Label' pairs for select box
		'options'  => array(
			'_slef' => esc_attr__( 'Self', 'solonick' ),
			'_blank' => esc_attr__( 'Blank', 'solonick' ),
		),
		// Select multiple values, optional. Default is false.
		'multiple'    => false,
		'std'         => '_self',
		'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
	)
);


/* ----------------------------------------------------- */
/* intro Slider
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_slider_zonar',
	'title' => 'Slider Options.',
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_intro_sc_opt'              => 'st2',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
	
		array(
				'name'		=> 'Slider Speed',
				'id'		=> $prefix . 'ns_intro_slider_speed',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> 'Default: 2400',
		),
		
		array(
				'name'		=> 'Slide Delay',
				'id'		=> $prefix . 'ns_intro_slider_delay',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> 'Default: 2500',
		),
		
		array(
				'id'		=> $prefix . 'zo_intro_slider_gallery_slider',
				'name'        => 'Slider Item',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Slider Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
					'name'		=> 'Slide Image',
					'id'		=> $prefix . 'zo_intro_slider_gallery_slider_image',
					'clone'		=> false,
					'type'		=> 'image_advanced',
					'max_file_uploads' => '1',
					'desc'		=> '',
					),
					
					
					array(
						'name'		=> 'Title',
						'id'		=> $prefix . 'zo_intro_slider_gallery_slider_title',
						'clone'		=> false,
						'type'		=> 'textarea',
						'std'		=> '',
						'desc'		=> 'For marking text e.x: Sandy Plegas  - [br][span] Web  developer[/span] and designer[br] form [span]USA[/span]',
					),
					
					array(
						'name'		=> 'Sub Title',
						'id'		=> $prefix . 'zo_intro_slider_gallery_slider_sub_title',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'Optional.<br> E.X: Welcome to my Website',
					),
					
					array(
						'name'		=> 'Content',
						'id'		=> $prefix . 'zo_intro_slider_gallery_slider_sh_con',
						'clone'		=> false,
						'type'		=> 'textarea',
						'std'		=> '',
						'desc'		=> 'Optional.',
					),
					
					array(
						'name'		=> 'Button Text',
						'id'		=> $prefix . 'zo_intro_slider_gallery_slider_button_text',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'Optional.',
					),
					
					array(
						'name'		=> 'Button URL',
						'id'		=> $prefix . 'zo_intro_slider_gallery_slider_button_url',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'Optional.',
					),
					
					array(
					'name'     => esc_attr__( 'Button Target', 'solonick' ),
					'id'   => $prefix . 'zo_intro_slider_buttn_target',
					'desc'  => esc_attr__( '', 'solonick' ),
					'type'     => 'select_advanced',
					// Array of 'value' => 'Label' pairs for select box
					'options'  => array(
						'_slef' => esc_attr__( 'Self', 'solonick' ),
						'_blank' => esc_attr__( 'Blank', 'solonick' ),
					),
					// Select multiple values, optional. Default is false.
					'multiple'    => false,
					'std'         => '_self',
					'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
				),
				
				),
			),
		
		// circle ani
		array(
			'name'     => esc_attr__( 'Circle Animation', 'solonick' ),
			'id'   => $prefix . 'zo_intro_slider_circle_animation',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Enable', 'solonick' ),
				'st2' => esc_attr__( 'Disable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		// pause
		array(
			'name'     => esc_attr__( 'Slider Pause Button', 'solonick' ),
			'id'   => $prefix . 'zo_intro_slider_pause_button',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Enable', 'solonick' ),
				'st2' => esc_attr__( 'Disable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Location Tooltip', 'solonick' ),
			'id'   => $prefix . 'zo_loaction_tooltip',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		array(
			'id'		=> $prefix . 'zo_loc_tooltip_content',
			'name'        => 'Location Tooltip Content',
			'type'        => 'group',
			'clone'       => true,
			'sort_clone'  => true,
			'collapsible' => true,
			'group_title' => 'Location Tooltip Content', // ID of the subfield
			'save_state' => true,
			'fields' => array(
				array(
				'name'		=> 'Content',
				'id'		=> $prefix . 'zo_lo_tooltip_intro',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> 'e.x: 40.7143528',
				),
			),
			'hidden' => array( 'rnr_zo_loaction_tooltip', '!=', 'st2' )
		),
			
		array(
			'name'		=> 'Hover Content',
			'id'		=> $prefix . 'zo_top_con_hover_intro',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: Based In NewYork',
			'hidden' => array( 'rnr_zo_loaction_tooltip', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Hover Content URL',
			'id'		=> $prefix . 'zo_top_con_hover_intro_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Optional',
			'hidden' => array( 'rnr_zo_loaction_tooltip', '!=', 'st2' )
		),
		
		array(
		'name'		=> 'Explore Button Text',
		'id'		=> $prefix . 'zo_intro_slider_extra_button_text',
		'clone'		=> false,
		'type'		=> 'text',
		'std'		=> '',
		'desc'		=> 'E.X: Start explore',
		),
					
		array(
		'name'		=> 'Explore Button URL',
		'id'		=> $prefix . 'zo_intro_slider_extra_button_url',
		'clone'		=> false,
		'type'		=> 'text',
		'std'		=> '',
		'desc'		=> 'Optional.',
		),
		array(
		'name'     => esc_attr__( 'Explore Button Target', 'solonick' ),
		'id'   => $prefix . 'zo_intro_slider_extra_buttn_target',
		'desc'  => esc_attr__( '', 'solonick' ),
		'type'     => 'select_advanced',
		// Array of 'value' => 'Label' pairs for select box
		'options'  => array(
			'_slef' => esc_attr__( 'Self', 'solonick' ),
			'_blank' => esc_attr__( 'Blank', 'solonick' ),
		),
		// Select multiple values, optional. Default is false.
		'multiple'    => false,
		'std'         => '_self',
		'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
	)
);



/* ----------------------------------------------------- */
/* Intro Fullscreen Carousel
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_full_car_content2_opt',
	'title' => 'Carousel Options.',
	// Show this meta box for posts matched below conditions
    'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_intro_sc_opt'              => 'st3',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
				
				array(
				'name'		=> 'Carousel Speed',
				'id'		=> $prefix . 'ns_intro_car_speed',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> 'Default: 1400',
				),
		
				array(
						'name'		=> 'Carousel Delay',
						'id'		=> $prefix . 'ns_intro_car_delay',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'Default: 2500',
				),
					
				array(
				'id'		=> $prefix . 'md_po_car_cus_gallery',
				'name'        => 'Carousel Item',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Carousel Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
					'name'		=> 'Carousel Image',
					'id'		=> $prefix . 'md_po_car_cus_gallery_img',
					'clone'		=> false,
					'type'		=> 'image_advanced',
					'max_file_uploads' => '1',
					'desc'		=> '',
					),
					
					
					array(
						'name'		=> 'Title',
						'id'		=> $prefix . 'md_car_cus_gallery_intro_title_opt',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> '',
					),
					
					array(
						'name'		=> 'Sub Title',
						'id'		=> $prefix . 'md_car_cus_gallery_intro_sub_title_opt',
						'clone'		=> false,
						'type'		=> 'textarea',
						'std'		=> '',
						'desc'		=> 'Optional.',
					),
					
					
					array(
						'name'		=> 'Button URL',
						'id'		=> $prefix . 'md_car_cus_intro_buttonurl_opt',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> '',
					),
					
					array(
						'name'		=> 'Button Text',
						'id'		=> $prefix . 'md_car_cus_intro_buttontext_opt',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'E.X: View Project',
					),
					
					array(
						'name'     => esc_attr__( 'Button Target', 'solonick' ),
						'id'   => $prefix . 'zo_intro_carousel_button_target',
						'desc'  => esc_attr__( '', 'solonick' ),
						'type'     => 'select_advanced',
						// Array of 'value' => 'Label' pairs for select box
						'options'  => array(
							'_slef' => esc_attr__( 'Self', 'solonick' ),
							'_blank' => esc_attr__( 'Blank', 'solonick' ),
						),
						// Select multiple values, optional. Default is false.
						'multiple'    => false,
						'std'         => '_self',
						'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
						),
					
				),
			),
			
	)
);

/* ----------------------------------------------------- */
/* intro slideshow
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_slideshow_image_zonar',
	'title' => 'Slideshow Options.',
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_intro_sc_opt'              => 'st4',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
	
		array(
				'name'		=> 'Slideshow Speed',
				'id'		=> $prefix . 'ns_intro_slideshow_speed',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> 'Default: 1400',
				),
		
		array(
			'name'		=> 'Slideshow Delay',
			'id'		=> $prefix . 'ns_intro_slideshow_delay',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Default: 2500',
		),
	
		array(
			'name'		=> 'Slideshow Images',
			'id'		=> $prefix . 'zo_intro_back_slideshow_image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1000',
			'desc'		=> 'Upload Slideshow Images',
		),
		
		
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'zo_intro_slideshow_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> 'For marking text e.x: Sandy Plegas  - [br][span] Web  developer[/span] and designer[br] form [span]USA[/span]',
		),
		
		array(
			'name'		=> 'Content',
			'id'		=> $prefix . 'zo_intro_slideshow_sub_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> '',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Text Slider', 'solonick' ),
			'id'   => $prefix . 'zo_intro_slideshow_right_side_con',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
			array(
				'id'		=> $prefix . 'zo_intro_slideshow_rightside_con_opt',
				'name'        => 'Text Slider Item',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Text Slider Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name'		=> 'Content',
						'id'		=> $prefix . 'zo_intro_slideshow_con_text',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'e.x: Web Design',
					),
					
					
				),
				'hidden' => array( 'rnr_zo_intro_slideshow_right_side_con', '!=', 'st2' )
			),
		
		
		array(
			'name'		=> 'Button URL',
			'id'		=> $prefix . 'zo_intro_slideshow_button_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		
		array(
			'name'		=> 'Button Text',
			'id'		=> $prefix . 'zo_intro_slideshow_button_text',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'E.X: My portfolio',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Button Target', 'solonick' ),
			'id'   => $prefix . 'zo_intro_slideshow_button_target',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'_self' => esc_attr__( 'Self', 'solonick' ),
				'_blank' => esc_attr__( 'Blank', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => '_self',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		// number counter
		array(
			'name'     => esc_attr__( 'Number Counter', 'solonick' ),
			'id'   => $prefix . 'zo_intro_slideshow_number_counter',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
			array(
				'id'		=> $prefix . 'zo_intro_slideshow_number_counter_con_opt',
				'name'        => 'Number Counter Item',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Number Counter Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name'		=> 'Data Title',
						'id'		=> $prefix . 'zo_intro_slideshow_number_counter_title',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'e.x: Finished projects',
					),
					
					array(
						'name'		=> 'Data Number',
						'id'		=> $prefix . 'zo_intro_slideshow_number_counter_number',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'e.x: 145',
					),
					
					
				),
				'hidden' => array( 'rnr_zo_intro_slideshow_number_counter', '!=', 'st2' )
			),
			
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Location Tooltip', 'solonick' ),
			'id'   => $prefix . 'zo_intro_slideshow_loaction_tooltip',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		array(
		'id'		=> $prefix . 'zo_intro_slideshow_loc_tooltip_content',
			'name'        => 'Location Tooltip Content',
			'type'        => 'group',
			'clone'       => true,
			'sort_clone'  => true,
			'collapsible' => true,
			'group_title' => 'Location Tooltip Content', // ID of the subfield
			'save_state' => true,
			'fields' => array(
				array(
				'name'		=> 'Content',
				'id'		=> $prefix . 'zo_intro_slideshow_lo_tooltip_intro',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> 'e.x: 40.7143528',
				),
			),
			'hidden' => array( 'rnr_zo_intro_slideshow_loaction_tooltip', '!=', 'st2' )
		),
			
		array(
			'name'		=> 'Hover Content',
			'id'		=> $prefix . 'zo_intro_slideshow_top_con_hover_intro',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: Based In NewYork',
			'hidden' => array( 'rnr_zo_intro_slideshow_loaction_tooltip', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Hover Content URL',
			'id'		=> $prefix . 'zo_intro_slideshow_top_con_hover_intro_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Optional',
			'hidden' => array( 'rnr_zo_intro_slideshow_loaction_tooltip', '!=', 'st2' )
		),
		
		// Video Story
		array(
			'name'     => esc_attr__( 'Promo Video', 'solonick' ),
			'id'   => $prefix . 'zo_intro_slideshow_video_story',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		array(
			'name'		=> 'Promo Title',
			'id'		=> $prefix . 'zo_intro_slideshow_video_story_title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'E.X: Play Story Video',
			'hidden' => array( 'rnr_zo_intro_slideshow_video_story', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Promo Content',
			'id'		=> $prefix . 'zo_intro_slideshow_video_story_content',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
			'hidden' => array( 'rnr_zo_intro_slideshow_video_story', '!=', 'st2' )
		),
		
		// Video Story
		array(
			'name'     => esc_attr__( 'Video Type', 'solonick' ),
			'id'   => $prefix . 'zo_intro_slideshow_video_type_story',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Youtube/ Vimeo', 'solonick' ),
				'st2' => esc_attr__( 'MP4', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
			'hidden' => array( 'rnr_zo_intro_slideshow_video_story', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Youtube/ Vimeo Video URL',
			'id'		=> $prefix . 'zo_intro_slideshow_video_story_video_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Youtube/ Vimeo video. <br>E.X: https://vimeo.com/322246026',
			'hidden' => array( 'rnr_zo_intro_slideshow_video_type_story', '!=', 'st1' )
		),
		
		array(
			'name'		=> 'MP4 Video URL',
			'id'		=> $prefix . 'zo_intro_slideshow_video_story_video_mp4_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: https://webredox.net/demo/wp/zonar/wp-content/uploads/2020/11/2.mp4',
			'hidden' => array( 'rnr_zo_intro_slideshow_video_type_story', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Video Thumbnail',
			'id'		=> $prefix . 'zo_intro_slideshow_video_story_thumbnail',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1',
			'desc'		=> 'Upload video thumbnail image.',
			'hidden' => array( 'rnr_zo_intro_slideshow_video_story', '!=', 'st2' )
		),
		
		array(
		'name'		=> 'Explore Button Text',
		'id'		=> $prefix . 'zo_intro_slideshow_extra_button_text',
		'clone'		=> false,
		'type'		=> 'text',
		'std'		=> '',
		'desc'		=> 'E.X: Start explore',
		),
					
		array(
		'name'		=> 'Explore Button URL',
		'id'		=> $prefix . 'zo_intro_slideshow_extra_button_url',
		'clone'		=> false,
		'type'		=> 'text',
		'std'		=> '',
		'desc'		=> 'Optional.',
		),
		array(
		'name'     => esc_attr__( 'Explore Button Target', 'solonick' ),
		'id'   => $prefix . 'zo_intro_slideshow_extra_buttn_target',
		'desc'  => esc_attr__( '', 'solonick' ),
		'type'     => 'select_advanced',
		// Array of 'value' => 'Label' pairs for select box
		'options'  => array(
			'_slef' => esc_attr__( 'Self', 'solonick' ),
			'_blank' => esc_attr__( 'Blank', 'solonick' ),
		),
		// Select multiple values, optional. Default is false.
		'multiple'    => false,
		'std'         => '_self',
		'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
	)
);


/* ----------------------------------------------------- */
/* intro mp4 video
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_mp4_image_zonar',
	'title' => 'Video Options.',
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_intro_sc_opt'  => 'st5',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
	
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Video Type', 'restabook' ),
			'id'   => $prefix . 'zo_intro_video_select_opt',
			'desc'  => esc_attr__( '', 'restabook' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'MP4', 'restabook' ),
				'st2' => esc_attr__( 'Youtube', 'restabook' ),
				'st3' => esc_attr__( 'Vimeo', 'restabook' ),
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'restabook' ),
		),
		
		array(
			'name'		=> 'MP4 Video URL',
			'id'		=> $prefix . 'zo_intro_mp4_video_url',
			'clone'		=> false,
			'type' => 'text',
			'desc'		=> '',
			'hidden' => array( 'rnr_zo_intro_video_select_opt', '!=', 'st1' )
		),
		
		array(
			'name'		=> 'Youtube Video ID',
			'id'		=> $prefix . 'zo_intro_youtube_video_url',
			'clone'		=> false,
			'type' => 'text',
			'desc'		=> 'E.X: Hg5iNVSp2z8',
			'hidden' => array( 'rnr_zo_intro_video_select_opt', '!=', 'st2' )
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Video Sound', 'restabook' ),
			'id'   => $prefix . 'zo_intro_youtube_video_sound',
			'desc'  => esc_attr__( '', 'restabook' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'1' => esc_attr__( 'Mute', 'restabook' ),
				'0' => esc_attr__( 'On', 'restabook' ),
			),
			'std'         => '1',
			'hidden' => array( 'rnr_zo_intro_video_select_opt', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Vimeo Video ID',
			'id'		=> $prefix . 'zo_intro_vimeo_video_url',
			'clone'		=> false,
			'type' => 'text',
			'desc'		=> 'E.X: 97871257',
			'hidden' => array( 'rnr_zo_intro_video_select_opt', '!=', 'st3' )
		),
		
		array(
			'name'		=> 'Background Image',
			'id'		=> $prefix . 'zo_intro_back_video_image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1',
			'desc'		=> 'Working only on mobile device.',
			'visible' => array( 'rnr_zo_intro_video_select_opt', '!=', 'st1' )
		),
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'zo_intro_video_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> 'For marking text e.x: Sandy Plegas  - [br][span] Web  developer[/span] and designer[br] form [span]USA[/span]',
		),
		
		array(
			'name'		=> 'Content',
			'id'		=> $prefix . 'zo_intro_video_sub_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> '',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Text Slider', 'solonick' ),
			'id'   => $prefix . 'zo_intro_video_right_side_con',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
			array(
				'id'		=> $prefix . 'zo_intro_video_rightside_con_opt',
				'name'        => 'Text Slider Item',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Text Slider Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name'		=> 'Content',
						'id'		=> $prefix . 'zo_intro_video_con_text',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'e.x: Web Design',
					),
					
					
				),
				'hidden' => array( 'rnr_zo_intro_video_right_side_con', '!=', 'st2' )
			),
		
		
		array(
			'name'		=> 'Button URL',
			'id'		=> $prefix . 'zo_intro_video_button_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		
		array(
			'name'		=> 'Button Text',
			'id'		=> $prefix . 'zo_intro_video_button_text',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'E.X: My portfolio',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Button Target', 'solonick' ),
			'id'   => $prefix . 'zo_intro_video_button_target',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'_self' => esc_attr__( 'Self', 'solonick' ),
				'_blank' => esc_attr__( 'Blank', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => '_self',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		// number counter
		array(
			'name'     => esc_attr__( 'Number Counter', 'solonick' ),
			'id'   => $prefix . 'zo_intro_video_number_counter',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
			array(
				'id'		=> $prefix . 'zo_intro_video_number_counter_con_opt',
				'name'        => 'Number Counter Item',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Number Counter Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name'		=> 'Data Title',
						'id'		=> $prefix . 'zo_intro_video_number_counter_title',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'e.x: Finished projects',
					),
					
					array(
						'name'		=> 'Data Number',
						'id'		=> $prefix . 'zo_intro_video_number_counter_number',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'e.x: 145',
					),
					
					
				),
				'hidden' => array( 'rnr_zo_intro_video_number_counter', '!=', 'st2' )
			),
			
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Location Tooltip', 'solonick' ),
			'id'   => $prefix . 'zo_intro_video_loaction_tooltip',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		array(
		'id'		=> $prefix . 'zo_intro_video_loc_tooltip_content',
			'name'        => 'Location Tooltip Content',
			'type'        => 'group',
			'clone'       => true,
			'sort_clone'  => true,
			'collapsible' => true,
			'group_title' => 'Location Tooltip Content', // ID of the subfield
			'save_state' => true,
			'fields' => array(
				array(
				'name'		=> 'Content',
				'id'		=> $prefix . 'zo_intro_video_lo_tooltip_intro',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> 'e.x: 40.7143528',
				),
			),
			'hidden' => array( 'rnr_zo_intro_video_loaction_tooltip', '!=', 'st2' )
		),
			
		array(
			'name'		=> 'Hover Content',
			'id'		=> $prefix . 'zo_intro_video_top_con_hover_intro',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: Based In NewYork',
			'hidden' => array( 'rnr_zo_intro_video_loaction_tooltip', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Hover Content URL',
			'id'		=> $prefix . 'zo_intro_video_top_con_hover_intro_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Optional',
			'hidden' => array( 'rnr_zo_intro_video_loaction_tooltip', '!=', 'st2' )
		),
		
		// Video Story
		array(
			'name'     => esc_attr__( 'Promo Video', 'solonick' ),
			'id'   => $prefix . 'zo_intro_video_video_story',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		array(
			'name'		=> 'Promo Title',
			'id'		=> $prefix . 'zo_intro_video_video_story_title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'E.X: Play Story Video',
			'hidden' => array( 'rnr_zo_intro_video_video_story', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Promo Content',
			'id'		=> $prefix . 'zo_intro_video_video_story_content',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
			'hidden' => array( 'rnr_zo_intro_video_video_story', '!=', 'st2' )
		),
		
		// Video Story type
		array(
			'name'     => esc_attr__( 'Video Type', 'solonick' ),
			'id'   => $prefix . 'zo_intro_video_video_type_story',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Youtube/ Vimeo', 'solonick' ),
				'st2' => esc_attr__( 'MP4', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
			'hidden' => array( 'rnr_zo_intro_video_video_story', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Youtube/ Vimeo Video URL',
			'id'		=> $prefix . 'zo_intro_video_video_story_video_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Youtube/ Vimeo video. <br>E.X: https://vimeo.com/322246026',
			'hidden' => array( 'rnr_zo_intro_video_video_type_story', '!=', 'st1' )
		),
		
		array(
			'name'		=> 'MP4 Video URL',
			'id'		=> $prefix . 'zo_intro_video_video_story_video_mp4_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: https://webredox.net/demo/wp/zonar/wp-content/uploads/2020/11/2.mp4',
			'hidden' => array( 'rnr_zo_intro_video_video_type_story', '!=', 'st2' )
		),
		
		
		array(
			'name'		=> 'Video Thumbnail',
			'id'		=> $prefix . 'zo_intro_video_video_story_thumbnail',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1',
			'desc'		=> 'Upload video thumbnail image.',
			'hidden' => array( 'rnr_zo_intro_video_video_story', '!=', 'st2' )
		),
		
		array(
		'name'		=> 'Explore Button Text',
		'id'		=> $prefix . 'zo_intro_video_extra_button_text',
		'clone'		=> false,
		'type'		=> 'text',
		'std'		=> '',
		'desc'		=> 'E.X: Start explore',
		),
					
		array(
		'name'		=> 'Explore Button URL',
		'id'		=> $prefix . 'zo_intro_video_extra_button_url',
		'clone'		=> false,
		'type'		=> 'text',
		'std'		=> '',
		'desc'		=> 'Optional.',
		),
		array(
		'name'     => esc_attr__( 'Explore Button Target', 'solonick' ),
		'id'   => $prefix . 'zo_intro_video_extra_buttn_target',
		'desc'  => esc_attr__( '', 'solonick' ),
		'type'     => 'select_advanced',
		// Array of 'value' => 'Label' pairs for select box
		'options'  => array(
			'_slef' => esc_attr__( 'Self', 'solonick' ),
			'_blank' => esc_attr__( 'Blank', 'solonick' ),
		),
		// Select multiple values, optional. Default is false.
		'multiple'    => false,
		'std'         => '_self',
		'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
	)
);


/* ----------------------------------------------------- */
/* intro parallax image
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_rev_image_solonick',
	'title' => 'Revolution Slider Options.',
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_intro_sc_opt'   => 'st6',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'		=> 'Revolution slider Shortcode',
			'id'		=> $prefix . 'zo_rev_shortcode_opt',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: [rev_slider alias="home-slider"][/rev_slider]',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Slider Overlay', 'solonick' ),
			'id'   => $prefix . 'zo_intro_rev_image_overlay',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Enable', 'solonick' ),
				'st2' => esc_attr__( 'Disable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'zo_intro_rev_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> 'For marking text e.x: Sandy Plegas  - [br][span] Web  developer[/span] and designer[br] form [span]USA[/span]',
		),
		
		array(
			'name'		=> 'Content',
			'id'		=> $prefix . 'zo_intro_rev_sub_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> '',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Text Slider', 'solonick' ),
			'id'   => $prefix . 'zo_intro_rev_right_side_con',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
			array(
				'id'		=> $prefix . 'zo_intro_rev_rightside_con_opt',
				'name'        => 'Text Slider Item',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Text Slider Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name'		=> 'Content',
						'id'		=> $prefix . 'zo_intro_rev_con_text',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'e.x: Web Design',
					),
					
					
				),
				'hidden' => array( 'rnr_zo_intro_rev_right_side_con', '!=', 'st2' )
			),
		
		
		array(
			'name'		=> 'Button URL',
			'id'		=> $prefix . 'zo_intro_rev_button_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		
		array(
			'name'		=> 'Button Text',
			'id'		=> $prefix . 'zo_intro_rev_button_text',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'E.X: My portfolio',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Button Target', 'solonick' ),
			'id'   => $prefix . 'zo_intro_rev_button_target',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'_self' => esc_attr__( 'Self', 'solonick' ),
				'_blank' => esc_attr__( 'Blank', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => '_self',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		// number counter
		array(
			'name'     => esc_attr__( 'Number Counter', 'solonick' ),
			'id'   => $prefix . 'zo_intro_rev_number_counter',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
			array(
				'id'		=> $prefix . 'zo_intro_rev_number_counter_con_opt',
				'name'        => 'Number Counter Item',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Number Counter Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name'		=> 'Data Title',
						'id'		=> $prefix . 'zo_intro_rev_number_counter_title',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'e.x: Finished projects',
					),
					
					array(
						'name'		=> 'Data Number',
						'id'		=> $prefix . 'zo_intro_rev_number_counter_number',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'e.x: 145',
					),
					
					
				),
				'hidden' => array( 'rnr_zo_intro_rev_number_counter', '!=', 'st2' )
			),
			
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Location Tooltip', 'solonick' ),
			'id'   => $prefix . 'zo_intro_rev_loaction_tooltip',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		array(
		'id'		=> $prefix . 'zo_intro_rev_loc_tooltip_content',
			'name'        => 'Location Tooltip Content',
			'type'        => 'group',
			'clone'       => true,
			'sort_clone'  => true,
			'collapsible' => true,
			'group_title' => 'Location Tooltip Content', // ID of the subfield
			'save_state' => true,
			'fields' => array(
				array(
				'name'		=> 'Content',
				'id'		=> $prefix . 'zo_intro_rev_lo_tooltip_intro',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> 'e.x: 40.7143528',
				),
			),
			'hidden' => array( 'rnr_zo_intro_rev_loaction_tooltip', '!=', 'st2' )
		),
			
		array(
			'name'		=> 'Hover Content',
			'id'		=> $prefix . 'zo_intro_rev_top_con_hover_intro',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: Based In NewYork',
			'hidden' => array( 'rnr_zo_intro_rev_loaction_tooltip', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Hover Content URL',
			'id'		=> $prefix . 'zo_intro_rev_top_con_hover_intro_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Optional',
			'hidden' => array( 'rnr_zo_intro_rev_loaction_tooltip', '!=', 'st2' )
		),
		
		// Video Story
		array(
			'name'     => esc_attr__( 'Promo Video', 'solonick' ),
			'id'   => $prefix . 'zo_intro_rev_video_story',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		array(
			'name'		=> 'Promo Title',
			'id'		=> $prefix . 'zo_intro_rev_video_story_title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'E.X: Play Story Video',
			'hidden' => array( 'rnr_zo_intro_rev_video_story', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Promo Content',
			'id'		=> $prefix . 'zo_intro_rev_video_story_content',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
			'hidden' => array( 'rnr_zo_intro_rev_video_story', '!=', 'st2' )
		),
		
		// Video Story type
		array(
			'name'     => esc_attr__( 'Video Type', 'solonick' ),
			'id'   => $prefix . 'zo_intro_rev_video_story_video_type_story',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Youtube/ Vimeo', 'solonick' ),
				'st2' => esc_attr__( 'MP4', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
			'hidden' => array( 'rnr_zo_intro_rev_video_story', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Youtube/ Vimeo Video URL',
			'id'		=> $prefix . 'zo_intro_rev_video_story_video_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Youtube/ Vimeo video. <br>E.X: https://vimeo.com/322246026',
			'hidden' => array( 'rnr_zo_intro_rev_video_story_video_type_story', '!=', 'st1' )
		),
		
		array(
			'name'		=> 'MP4 Video URL',
			'id'		=> $prefix . 'zo_intro_rev_video_story_video_mp4_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: https://webredox.net/demo/wp/zonar/wp-content/uploads/2020/11/2.mp4',
			'hidden' => array( 'rnr_zo_intro_rev_video_story_video_type_story', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Video Thumbnail',
			'id'		=> $prefix . 'zo_intro_rev_video_story_thumbnail',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1',
			'desc'		=> 'Upload video thumbnail image.',
			'hidden' => array( 'rnr_zo_intro_rev_video_story', '!=', 'st2' )
		),
		
		array(
		'name'		=> 'Explore Button Text',
		'id'		=> $prefix . 'zo_intro_rev_extra_button_text',
		'clone'		=> false,
		'type'		=> 'text',
		'std'		=> '',
		'desc'		=> 'E.X: Start explore',
		),
					
		array(
		'name'		=> 'Explore Button URL',
		'id'		=> $prefix . 'zo_intro_rev_extra_button_url',
		'clone'		=> false,
		'type'		=> 'text',
		'std'		=> '',
		'desc'		=> 'Optional.',
		),
		array(
		'name'     => esc_attr__( 'Explore Button Target', 'solonick' ),
		'id'   => $prefix . 'zo_intro_rev_extra_buttn_target',
		'desc'  => esc_attr__( '', 'solonick' ),
		'type'     => 'select_advanced',
		// Array of 'value' => 'Label' pairs for select box
		'options'  => array(
			'_slef' => esc_attr__( 'Self', 'solonick' ),
			'_blank' => esc_attr__( 'Blank', 'solonick' ),
		),
		// Select multiple values, optional. Default is false.
		'multiple'    => false,
		'std'         => '_self',
		'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
	)
);

/* ----------------------------------------------------- */
/* intro half image
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_half_image_zonar',
	'title' => 'Half Image Options.',
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_intro_sc_opt'              => 'st7',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
	
		
		
		array(
					'name'		=> 'Background Image',
					'id'		=> $prefix . 'zo_intro_half_image_gallery_slider_image',
					'clone'		=> false,
					'type'		=> 'image_advanced',
					'max_file_uploads' => '1',
					'desc'		=> '',
					),
					
					
					array(
						'name'		=> 'Title',
						'id'		=> $prefix . 'zo_intro_half_image_gallery_slider_title',
						'clone'		=> false,
						'type'		=> 'textarea',
						'std'		=> '',
						'desc'		=> 'For marking text e.x: Sandy Plegas  - [br][span] Web  developer[/span] and designer[br] form [span]USA[/span]',
					),
					
					array(
						'name'		=> 'Sub Title',
						'id'		=> $prefix . 'zo_intro_half_image_gallery_slider_sub_title',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'Optional.<br> E.X: Welcome to my Website',
					),
					
					array(
						'name'		=> 'Content',
						'id'		=> $prefix . 'zo_intro_half_image_gallery_slider_sh_con',
						'clone'		=> false,
						'type'		=> 'textarea',
						'std'		=> '',
						'desc'		=> 'Optional.',
					),
					
					array(
						'name'		=> 'Button Text',
						'id'		=> $prefix . 'zo_intro_half_image_image_gallery_slider_button_text',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'Optional.',
					),
					
					array(
						'name'		=> 'Button URL',
						'id'		=> $prefix . 'zo_intro_half_image_gallery_slider_button_url',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'Optional.',
					),
					
					array(
					'name'     => esc_attr__( 'Button Target', 'solonick' ),
					'id'   => $prefix . 'zo_intro_half_image_buttn_target',
					'desc'  => esc_attr__( '', 'solonick' ),
					'type'     => 'select_advanced',
					// Array of 'value' => 'Label' pairs for select box
					'options'  => array(
						'_slef' => esc_attr__( 'Self', 'solonick' ),
						'_blank' => esc_attr__( 'Blank', 'solonick' ),
					),
					// Select multiple values, optional. Default is false.
					'multiple'    => false,
					'std'         => '_self',
					'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
				),
		
		// circle ani
		array(
			'name'     => esc_attr__( 'Circle Animation', 'solonick' ),
			'id'   => $prefix . 'zo_intro_half_image_circle_animation',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Enable', 'solonick' ),
				'st2' => esc_attr__( 'Disable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Location Tooltip', 'solonick' ),
			'id'   => $prefix . 'zo_loaction_half_image_tooltip',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		array(
			'id'		=> $prefix . 'zo_loc_half_image_tooltip_content',
			'name'        => 'Location Tooltip Content',
			'type'        => 'group',
			'clone'       => true,
			'sort_clone'  => true,
			'collapsible' => true,
			'group_title' => 'Location Tooltip Content', // ID of the subfield
			'save_state' => true,
			'fields' => array(
				array(
				'name'		=> 'Content',
				'id'		=> $prefix . 'zo_lo_half_image_tooltip_intro',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> 'e.x: 40.7143528',
				),
			),
			'hidden' => array( 'rnr_zo_loaction_half_image_tooltip', '!=', 'st2' )
		),
			
		array(
			'name'		=> 'Hover Content',
			'id'		=> $prefix . 'zo_half_image_top_con_hover_intro',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: Based In NewYork',
			'hidden' => array( 'rnr_zo_loaction_half_image_tooltip', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Hover Content URL',
			'id'		=> $prefix . 'zo_half_image_top_con_hover_intro_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Optional',
			'hidden' => array( 'rnr_zo_loaction_half_image_tooltip', '!=', 'st2' )
		),
		
		array(
		'name'		=> 'Explore Button Text',
		'id'		=> $prefix . 'zo_intro_half_image_extra_button_text',
		'clone'		=> false,
		'type'		=> 'text',
		'std'		=> '',
		'desc'		=> 'E.X: Start explore',
		),
					
		array(
		'name'		=> 'Explore Button URL',
		'id'		=> $prefix . 'zo_intro_half_image_extra_button_url',
		'clone'		=> false,
		'type'		=> 'text',
		'std'		=> '',
		'desc'		=> 'Optional.',
		),
		array(
		'name'     => esc_attr__( 'Explore Button Target', 'solonick' ),
		'id'   => $prefix . 'zo_intro_half_image_extra_buttn_target',
		'desc'  => esc_attr__( '', 'solonick' ),
		'type'     => 'select_advanced',
		// Array of 'value' => 'Label' pairs for select box
		'options'  => array(
			'_slef' => esc_attr__( 'Self', 'solonick' ),
			'_blank' => esc_attr__( 'Blank', 'solonick' ),
		),
		// Select multiple values, optional. Default is false.
		'multiple'    => false,
		'std'         => '_self',
		'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
	)
);

/* ----------------------------------------------------- */
/* page Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'portfolio_page_types',
	'title' => 'Portfolio Page Template Options',
	'show'   => array(
    'template'    => array( 'portfolio.php' ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Select Template', 'zonar' ),
			'id'   => $prefix . 'wr_portfolio_pagetype',
			'desc'  => esc_attr__( '', 'zonar' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st0' => esc_attr__( 'Select an Option', 'zonar' ),
				'st1' => esc_attr__( 'Horizonatal', 'zonar' ),
				'st2' => esc_attr__( 'Fullscreen Grid ', 'zonar' ),
				'st3' => esc_attr__( 'Column Grid', 'zonar' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st0',
			'placeholder' => esc_attr__( 'Select an Option', 'zonar' ),
		),
		
		
	)
);

/* ----------------------------------------------------- */
/* page Header Options
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'th_port_page_header_opt',
	'title' => 'Portfolio Page Header Options.',
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_portfolio_pagetype' => 'st3',
    ),
	),
	
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Portfolio Page Header/ Right Sidebar Options', 'zonar' ),
			'id'   => $prefix . 'wr_page_port_header_opt',
			'desc'  => esc_attr__( '', 'zonar' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				
				'st1' => esc_attr__( 'Featured Image', 'zonar' ),
				'st2' => esc_attr__( 'Slideshow', 'zonar' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'zonar' ),
		),
		
		array(
				'name'		=> 'Slideshow Speed',
				'id'		=> $prefix . 'zo_page_port_block_slider_image_speed',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> 'Default: 1400',
				'hidden' => array( 'rnr_wr_page_port_header_opt', '!=', 'st2' )
				),
		
		array(
			'name'		=> 'Slideshow Delay',
			'id'		=> $prefix . 'zo_page_port_block_slider_image_delay',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Default: 2500',
			'hidden' => array( 'rnr_wr_page_port_header_opt', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Slideshow Images',
			'id'		=> $prefix . 'zo_page_port_block_slider_image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1000',
			'desc'		=> 'Upload Images',
			'hidden' => array( 'rnr_wr_page_port_header_opt', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'zo_page_port_header_title_opt',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'For marking text e.x: Sandy Plegas  - [br][span] Web  developer[/span] and designer[br] form [span]USA[/span]',
		),
		
		array(
			'name'		=> 'Description',
			'id'		=> $prefix . 'zo_page_port_header_sub_title_opt',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> '',
		),
		
		
		array(
			'name'		=> 'Scroll Down',
			'id'		=> $prefix . 'zo_page_port_header_translate_opt',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Page Scrolling Animation', 'zonar' ),
			'id'   => $prefix . 'wr_page_port_scrolling_ani',
			'desc'  => esc_html__( 'Disable/ Enable Page Scrolling Animation Section.', 'zonar' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				
				'st1' => esc_attr__( 'Enable', 'zonar' ),
				'st2' => esc_attr__( 'Disable', 'zonar' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'zonar' ),
		),
		  
	)
);

/* ----------------------------------------------------- */
/* portfolio style Boxed
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'portfolio_page_opt',
	'title' => 'Portfolio Page Options.',
	'hide'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_portfolio_pagetype' => 'st0',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
		   'name'     => esc_attr__( 'Portfolio columns', 'zonar' ),
		   'id'   => $prefix . 'zo_port_pages_column',
		   'desc' => '',
		   'type'     => 'select_advanced',
		   // Array of 'value' => 'Label' pairs for select box
		   'options'  => array(
			'st1' => esc_attr__( '2 Columns', 'zonar' ),
			'st2' => esc_attr__( '3 Columns', 'zonar' ),
		   ),
		   // Select multiple values, optional. Default is false.
		   'std'         => 'st1',
			'hidden' => array( 'rnr_wr_portfolio_pagetype', '!=', 'st3' )
		),
		
		array(
		   'name'     => esc_attr__( 'Portfolio columns', 'zonar' ),
		   'id'   => $prefix . 'zo_port_pages_column_full',
		   'desc' => '',
		   'type'     => 'select_advanced',
		   // Array of 'value' => 'Label' pairs for select box
		   'options'  => array(
			'st1' => esc_attr__( '4 Columns', 'zonar' ),
			'st2' => esc_attr__( '3 Columns', 'zonar' ),
			'st3' => esc_attr__( '2 Columns', 'zonar' ),
		   ),
		   // Select multiple values, optional. Default is false.
		   'std'         => 'st1',
			'hidden' => array( 'rnr_wr_portfolio_pagetype', '!=', 'st2' )
		),
		  
		array(
		   'name'     => esc_attr__( 'Section Title', 'zonar' ),
		   'id'   => $prefix . 'zo_port_pages_2column_title_opt',
		   'desc' => '',
		   'type'     => 'select_advanced',
		   // Array of 'value' => 'Label' pairs for select box
		   'options'  => array(
			'st1' => esc_attr__( 'Disable', 'zonar' ),
			'st2' => esc_attr__( 'Enable', 'zonar' ),
		   ),
		   // Select multiple values, optional. Default is false.
		   'std'         => 'st1',
			'hidden' => array( 'rnr_zo_port_pages_column', '!=', 'st1' )
		),
		  
		  array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'zo_port_pages_2column_title',
			'desc'		=> 'E.X: Lastes and future projects',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'hidden' => array( 'rnr_zo_port_pages_2column_title_opt', '!=', 'st2' )
		    ),
			
		array(
			'name'		=> 'Sub Title',
			'id'		=> $prefix . 'zo_port_pages_2column_subtitle',
			'desc'		=> '',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'hidden' => array( 'rnr_zo_port_pages_2column_title_opt', '!=', 'st2' )
		    ),
		
		array(
		   'name'     => esc_attr__( 'Portfolio Filter', 'zonar' ),
		   'id'   => $prefix . 'zo_port_page_filter',
		   'desc' => '',
		   'type'     => 'radio',
		   // Array of 'value' => 'Label' pairs for select box
		   'options'  => array(
			'yes' => esc_attr__( 'Enable', 'zonar' ),
			'no' => esc_attr__( 'Disable', 'zonar' ),
		   ),
		   // Select multiple values, optional. Default is false.
		   'std'         => 'yes',

		  ),
		  
		  
		  array(
				'name'       => esc_attr__( 'Number Of Post Show', 'zonar' ),
				'id'         => $prefix . 'zo_port_page_item_show_opt',
				'desc'		=> '',
				'type'       => 'slider',
				// Text labels displayed before and after value
				'prefix'     => __( '', 'zonar' ),
				'suffix'     => __( ' Posts', 'zonar' ),
				'js_options' => array(
					'min'  => 1,
					'max'  => 400,
					'step' => 1,
				),
			),	

			array(
			'name'		=> 'Include Category',
			'id'		=> $prefix . 'zo_port_page_cat_opt',
			'desc'		=> 'Enter category name ex: web design, web development (Optional).',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'hidden' => array( 'rnr_zo_port_page_filter', '!=', 'no' )
		    ),
			
			array(
			'name'		=> 'Post Offset',
			'id'		=> $prefix . 'zo_port_page_offset_opt',
			'desc'		=> 'Optional.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		    ),
		   
		   
		   array(
			'name'		=> 'Filter',
			'id'		=> $prefix . 'zo_port_page_translate_opt1',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'tooltip' => array(
                    'icon'     => 'help',
                    'content'  => 'Working only on mobile device.',
                    'position' => 'top',
            ),
			'hidden' => array( 'rnr_zo_port_page_filter', '!=', 'yes' )
		   ),
		   
		   array(
			'name'		=> 'All projects',
			'id'		=> $prefix . 'zo_port_page_translate_opt2',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'hidden' => array( 'rnr_zo_port_page_filter', '!=', 'yes' )
		   ),
		   
		  
		
	)
);

/* ----------------------------------------------------- */
/* portfoloio options 
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'portfolio_width',
	'title' => 'Portfolio Post Width & Popup Options.</small>',
	'pages' => array( 'portfolio' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'     => __( 'Post Box Width', 'solonick' ),
			'id'   => $prefix . 'post-box-width',
			'type'     => 'radio',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'default-galley' => esc_attr__( 'Default', 'solonick' ),
				'portfolio_item_second' => esc_attr__( 'Large', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'default-galley',

		),	
		
		
		array(
			'name'     => __( 'Popup Option', 'solonick' ),
			'id'   => $prefix . 'post-popup-option',
			'type'     => 'radio',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Image', 'solonick' ),
				'st2' => esc_attr__( 'video', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'st1',

		),	
		
		array(
			'name'		=> 'Popup Video',
			'id'		=> $prefix . 'post_popup_video',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Youtube/ Vimeo Video URL <br>e.x: https://vimeo.com/6698875 or https://www.youtube.com/watch?v=Hg5iNVSp2z8',
			'hidden' => array( 'rnr_post-popup-option', '!=', 'st2' )
		),
		
		
	)
);

/* ----------------------------------------------------- */
/* portfolio Post Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'portfolio_type',
	'title' => 'Portfolio Format',
	'pages' => array( 'portfolio' ),
	'context' => 'normal',	

	'fields' => array(
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Details Page Style', 'solonick' ),
			'id'   => $prefix . 'wr_port_dt_opt',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st0' => esc_attr__( 'Select an Option', 'solonick' ),
				'st1' => esc_attr__( 'Carousel', 'solonick' ),
				'st2' => esc_attr__( 'Slider', 'solonick' ),
				'st3' => esc_attr__( 'Column Grid', 'solonick' ),
				'st4' => esc_attr__( 'Video', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st0',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
	
	)
);

/* portfolio Post carousel Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'pt_carousel_link_popu',
	'title' => 'Portfolio Carousel Options',
	'pages' => array( 'portfolio' ),
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_port_dt_opt' => 'st1',
    ),
	),
	'context' => 'normal',	

	'fields' => array(
	
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Carousel Slider Image Infomation', 'solonick' ),
			'id'   => $prefix . 'zo_port_carousel_info_opt',
			'desc'  => esc_attr__( 'Show/Hide Image Title and Caption.', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		array(
			'name'		=> 'Info',
			'id'		=> $prefix . 'zo_port_carousel_info_translate_opt',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'hidden' => array( 'rnr_zo_port_carousel_info_opt', '!=', 'st2' )
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Carousel Slider Image Numbering', 'solonick' ),
			'id'   => $prefix . 'zo_port_carousel_number_opt',
			'desc'  => esc_attr__( 'Show/Hide Image Number', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Enable', 'solonick' ),
				'st2' => esc_attr__( 'Disable', 'solonick' ),
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		array(
				'id'		=> $prefix . 'zo_pot_carousel_gallery_opt',
				'name'        => 'Carousel Options',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Carousel Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
				
					array(
					'name'		=> 'Upload Images',
					'id'		=> $prefix . 'zo_pot_carousel_gallery',
					'clone'		=> false,
					'type'		=> 'image_advanced',
					'max_file_uploads' => '1000',
					'desc'		=> 'Upload only 1 image if you added a popup video URL.',
					),
					
					array(
					'name'		=> 'Popup Video URL',
					'id'		=> $prefix . 'zo_pot_carousel_gallery_video_opt',
					'clone'		=> false,
					'type'		=> 'text',
					'std'		=> '',
					'desc'		=> 'Youtube/ Vimeo Video URL. E.X: https://vimeo.com/322246026',
					),
					
				
				),
			),
			
		array(
			'name'		=> 'Project Details',
			'id'		=> $prefix . 'zo_port_carousel_text_translate_1_opt',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
		),
		
		array(
			'name'		=> 'Thumbnails',
			'id'		=> $prefix . 'zo_port_carousel_text_translate_2_opt',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
		),
		
	)
);

/* portfolio Post Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'pt_slider_link_popu',
	'title' => 'Portfolio Slider Options',
	'pages' => array( 'portfolio' ),
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_port_dt_opt' => 'st2',
    ),
	),
	'context' => 'normal',	

	'fields' => array(
	
		
		array(
				'id'		=> $prefix . 'zo_pot_slider_gallery_opt',
				'name'        => 'Slider Options',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Slider Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
				
					array(
					'name'		=> 'Upload Images',
					'id'		=> $prefix . 'zo_pot_slider_gallery',
					'clone'		=> false,
					'type'		=> 'image_advanced',
					'max_file_uploads' => '',
					'desc'		=> '',
					),
					
					array(
					'name'		=> 'Popup Video URL',
					'id'		=> $prefix . 'zo_pot_slider_gallery_video_opt',
					'clone'		=> false,
					'type'		=> 'text',
					'std'		=> '',
					'desc'		=> 'Youtube/ Vimeo Video URL. E.X: https://vimeo.com/322246026',
					),
					
					// SELECT BOX
					array(
						'name'     => esc_attr__( 'Image Content', 'solonick' ),
						'id'   => $prefix . 'zo_port_slider_img_content_opt',
						'desc'  => esc_attr__( 'Enable/ Disable Image Content.', 'solonick' ),
						'type'     => 'select_advanced',
						// Array of 'value' => 'Label' pairs for select box
						'options'  => array(
							'st1' => esc_attr__( 'Disable', 'solonick' ),
							'st2' => esc_attr__( 'Enable', 'solonick' ),
							
						),
						// Select multiple values, optional. Default is false.
						'multiple'    => false,
						'std'         => 'st1',
						'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
					),
					
					array(
					'name'		=> 'Small Title',
					'id'		=> $prefix . 'zo_port_slider_small_title_opt',
					'desc'		=> 'E.X: 25 may 2020',
					'clone'		=> false,
					'type'		=> 'text',
					'std'		=> '',
					'hidden' => array( 'rnr_zo_port_slider_img_content_opt', '!=', 'st2' )
				    ),
					
					array(
						'name'		=> 'Title',
						'id'		=> $prefix . 'zo_port_slider_big_title_opt',
						'clone'		=> false,
						'type'		=> 'textarea',
						'std'		=> '',
						'desc'		=> 'For marking text e.x: Sandy Plegas  - [br][span] Web  developer[/span] and designer[br] form [span]USA[/span]',
						'hidden' => array( 'rnr_zo_port_slider_img_content_opt', '!=', 'st2' )
					),
					
					array(
						'name'		=> 'Content',
						'id'		=> $prefix . 'zo_port_slider_content_opt',
						'clone'		=> false,
						'type'		=> 'textarea',
						'std'		=> '',
						'desc'		=> '',
						'hidden' => array( 'rnr_zo_port_slider_img_content_opt', '!=', 'st2' )
					),
					
				
				),
			),
			
		array(
			'name'		=> 'Project Details',
			'id'		=> $prefix . 'zo_port_slider_text_translate_1_opt',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
		),
		
		array(
			'name'		=> 'Thumbnails',
			'id'		=> $prefix . 'zo_port_slider_text_translate_2_opt',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
		),
		
	)
);

/* ----------------------------------------------------- */
/* portfolio details page Header Options
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'pt_column_link_popu',
	'title' => 'Portfolio Column Grid Header/ Sidebar Options',
	'pages' => array( 'portfolio' ),
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_port_dt_opt' => 'st3',
    ),
	),
	'context' => 'normal',	

	'fields' => array(
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Header/ Right Sidebar Options', 'zonar' ),
			'id'   => $prefix . 'wr_page_port_dt_header_opt',
			'desc'  => esc_attr__( '', 'zonar' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				
				'st1' => esc_attr__( 'Image', 'zonar' ),
				'st2' => esc_attr__( 'Slideshow', 'zonar' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'zonar' ),
		),
		
		array(
			'name'		=> 'Header Image',
			'id'		=> $prefix . 'zo_page_port_dt_block_right_image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1',
			'desc'		=> 'Upload Image.',
			'hidden' => array( 'rnr_wr_page_port_dt_header_opt', '!=', 'st1' )
		),
		
		array(
			'name'		=> 'Slideshow Images',
			'id'		=> $prefix . 'zo_page_port_dt_block_slider_image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1000',
			'desc'		=> 'Upload Images.',
			'hidden' => array( 'rnr_wr_page_port_dt_header_opt', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'zo_page_port_dt_header_title_opt',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'For marking text e.x: Sandy Plegas  - [br][span] Web  developer[/span] and designer[br] form [span]USA[/span]',
		),
		
		array(
			'name'		=> 'Description',
			'id'		=> $prefix . 'zo_page_port_dt_header_sub_title_opt',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> '',
		),
		
		
		array(
			'name'		=> 'Scroll Down',
			'id'		=> $prefix . 'zo_page_port_dt_header_translate_opt',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Page Scrolling Animation', 'zonar' ),
			'id'   => $prefix . 'wr_page_port_dt_scrolling_ani',
			'desc'  => esc_html__( 'Disable/ Enable Page Scrolling Animation Section.', 'zonar' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				
				'st1' => esc_attr__( 'Enable', 'zonar' ),
				'st2' => esc_attr__( 'Disable', 'zonar' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'zonar' ),
		),
		  
	)
);


/* ----------------------------------------------------- */
/* port mp4 video
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'pt_video_link_popu',
	'title' => 'Portfolio Video Options.',
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_port_dt_opt' => 'st4',
    ),
	),
	'pages' => array( 'portfolio' ),
	'context' => 'normal',	

	'fields' => array(
	
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Video Type', 'restabook' ),
			'id'   => $prefix . 'zo_port_intro_video_select_opt',
			'desc'  => esc_attr__( '', 'restabook' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'MP4', 'restabook' ),
				'st2' => esc_attr__( 'Youtube', 'restabook' ),
				'st3' => esc_attr__( 'Vimeo', 'restabook' ),
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'restabook' ),
		),
		
		array(
			'name'		=> 'MP4 Video URL',
			'id'		=> $prefix . 'zo_port_intro_mp4_video_url',
			'clone'		=> false,
			'type' => 'text',
			'desc'		=> '',
			'hidden' => array( 'rnr_zo_port_intro_video_select_opt', '!=', 'st1' )
		),
		
		array(
			'name'		=> 'Youtube Video ID',
			'id'		=> $prefix . 'zo_port_intro_youtube_video_url',
			'clone'		=> false,
			'type' => 'text',
			'desc'		=> 'E.X: Hg5iNVSp2z8',
			'hidden' => array( 'rnr_zo_port_intro_video_select_opt', '!=', 'st2' )
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Video Sound', 'restabook' ),
			'id'   => $prefix . 'zo_port_intro_youtube_video_sound',
			'desc'  => esc_attr__( '', 'restabook' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'1' => esc_attr__( 'Mute', 'restabook' ),
				'0' => esc_attr__( 'On', 'restabook' ),
			),
			'std'         => '1',
			'hidden' => array( 'rnr_zo_port_intro_video_select_opt', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Vimeo Video ID',
			'id'		=> $prefix . 'zo_port_intro_vimeo_video_url',
			'clone'		=> false,
			'type' => 'text',
			'desc'		=> 'E.X: 97871257',
			'hidden' => array( 'rnr_zo_port_intro_video_select_opt', '!=', 'st3' )
		),
		
		array(
			'name'		=> 'Background Image',
			'id'		=> $prefix . 'zo_port_intro_back_video_image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1',
			'desc'		=> 'Working only on mobile device.',
			'visible' => array( 'rnr_zo_port_intro_video_select_opt', '!=', 'st1' )
		),
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'zo_port_intro_video_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> 'For marking text e.x: Sandy Plegas  - [br][span] Web  developer[/span] and designer[br] form [span]USA[/span]',
		),
		
		array(
			'name'		=> 'Content',
			'id'		=> $prefix . 'zo_port_intro_video_sub_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> '',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Text Slider', 'solonick' ),
			'id'   => $prefix . 'zo_port_intro_video_right_side_con',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
			array(
				'id'		=> $prefix . 'zo_port_intro_video_rightside_con_opt',
				'name'        => 'Text Slider Item',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Text Slider Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name'		=> 'Content',
						'id'		=> $prefix . 'zo_port_intro_video_con_text',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'e.x: Web Design',
					),
					
					
				),
				'hidden' => array( 'rnr_zo_port_intro_video_right_side_con', '!=', 'st2' )
			),
		
				
		// Video Story
		array(
			'name'     => esc_attr__( 'Promo Video', 'solonick' ),
			'id'   => $prefix . 'zo_port_intro_video_video_story',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		array(
			'name'		=> 'Promo Title',
			'id'		=> $prefix . 'zo_port_intro_video_video_story_title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'E.X: Play Story Video',
			'hidden' => array( 'rnr_zo_port_intro_video_video_story', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Promo Content',
			'id'		=> $prefix . 'zo_port_intro_video_video_story_content',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
			'hidden' => array( 'rnr_zo_port_intro_video_video_story', '!=', 'st2' )
		),
		
		// Video Story type
		array(
			'name'     => esc_attr__( 'Video Type', 'solonick' ),
			'id'   => $prefix . 'zo_port_intro_video_video_type_story',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Youtube/ Vimeo', 'solonick' ),
				'st2' => esc_attr__( 'MP4', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
			'hidden' => array( 'rnr_zo_port_intro_video_video_story', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Youtube/ Vimeo Video URL',
			'id'		=> $prefix . 'zo_port_intro_video_video_story_video_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Youtube/ Vimeo video. <br>E.X: https://vimeo.com/322246026',
			'hidden' => array( 'rnr_zo_port_intro_video_video_type_story', '!=', 'st1' )
		),
		
		array(
			'name'		=> 'MP4 Video URL',
			'id'		=> $prefix . 'zo_port_intro_video_video_story_video_mp4_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: https://webredox.net/demo/wp/zonar/wp-content/uploads/2020/11/2.mp4',
			'hidden' => array( 'rnr_zo_port_intro_video_video_type_story', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Video Thumbnail',
			'id'		=> $prefix . 'zo_port_intro_video_video_story_thumbnail',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1',
			'desc'		=> 'Upload video thumbnail image.',
			'hidden' => array( 'rnr_zo_port_intro_video_video_story', '!=', 'st2' )
		),
		
		// Video Story
		array(
			'name'     => esc_attr__( 'Image Gallery', 'solonick' ),
			'id'   => $prefix . 'zo_port_intro_image_gallery_opt',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		
		
		array(
			'name'		=> 'Gallery Images',
			'id'		=> $prefix . 'zo_port_intro_video_gallery_image_opt',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1000',
			'desc'		=> 'Upload gallery images.',
			'hidden' => array( 'rnr_zo_port_intro_image_gallery_opt', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Project Gallery',
			'id'		=> $prefix . 'zo_port_intro_video_translate_opt_1',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Translate Option.',
			'hidden' => array( 'rnr_zo_port_intro_image_gallery_opt', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Project Details ',
			'id'		=> $prefix . 'zo_port_intro_video_translate_opt_2',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Translate Option.',
		),
		
		
		
	)
);

/* ----------------------------------------------------- */
/* portfolio details page Header Options
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'pt_column_link_post_blog',
	'title' => 'Post Options',
	'pages' => array( 'post' ),
	'context' => 'normal',	

	'fields' => array(
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Page Layout', 'dogmawp' ),
			'id'   => $prefix . 'blog_details_layout_opt',
			'desc'  => __( 'Working only Blog Page Template', 'dogmawp' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Right Side Block', 'zonar' ),
				'st2' => esc_attr__( 'Left Sidebar', 'zonar' ),
				'st3' => esc_attr__( 'Right Sidebar', 'zonar' ),
			),
			'desc'  => esc_attr__( '', 'dogmawp' ),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => __( 'Select an Option', 'dogmawp' ),
		),
		
		array(
			'name'		=> 'Header Image',
			'id'		=> $prefix . 'zo_page_post_dt_block_right_image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1',
			'desc'		=> 'Upload Image.',
			'hidden' => array( 'rnr_blog_details_layout_opt', '!=', 'st1' )
		),
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'zo_page_post_dt_header_title_opt',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'For marking text e.x: Sandy Plegas  - [br][span] Web  developer[/span] and designer[br] form [span]USA[/span]',
			'hidden' => array( 'rnr_blog_details_layout_opt', '!=', 'st1' )
		),
		
		array(
			'name'		=> 'Description',
			'id'		=> $prefix . 'zo_page_post_dt_header_sub_title_opt',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> '',
			'hidden' => array( 'rnr_blog_details_layout_opt', '!=', 'st1' )
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Page Scrolling Animation', 'zonar' ),
			'id'   => $prefix . 'wr_page_blog_dt_scrolling_ani',
			'desc'  => esc_html__( 'Disable/ Enable Page Scrolling Animation Section.', 'zonar' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				
				'st1' => esc_attr__( 'Enable', 'zonar' ),
				'st2' => esc_attr__( 'Disable', 'zonar' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'zonar' ),
			'visible' => array( 'rnr_blog_details_layout_opt', '!=', 'st1' )
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Post Pagination', 'zonar' ),
			'id'   => $prefix . 'wr_page_blog_dt_pagination',
			'desc'  => esc_html__( 'Disable/ Enable Page Scrolling Animation Section.', 'zonar' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				
				'st1' => esc_attr__( 'Enable', 'zonar' ),
				'st2' => esc_attr__( 'Disable', 'zonar' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'zonar' ),
		),
	)
);

// Blog Post Metaboxes
/* ----------------------------------------------------- */


$meta_boxes[] = array(
	'id' => 'rnr-blogmeta-video',
	'title' => 'Post Format Video Option',
	'show'   => array(
    'post_format' => array( 'Video' ),
	),
	'pages' => array( 'post'),
	'context' => 'normal',

	// List of meta fields
	'fields' => array(

		array(
			'name'		=> 'Vimeo/ Youtube Video Link:',
			'id'		=> $prefix . 'bl-video',
			'desc'		=> 'Set Vimeo / Youtube Video Embed Link',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		
	)
);


// Blog Post Metaboxes
/* ----------------------------------------------------- */


$meta_boxes[] = array(
	'id' => 'rnr-blogmeta-gallery',
	'title' => 'Post Format Gallery Option',
	'show'   => array(
    'post_format' => array( 'Gallery' ),
	),
	'pages' => array( 'post'),
	'context' => 'normal',

	// List of meta fields
	'fields' => array(

		array(
			'name'		=> 'Upload Images',
			'id'		=> $prefix . 'wr_galleryimg_blog',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'desc'		=> 'Use same size images.',
		),

		
	)
);

/* ----------------------------------------------------- */
/* galeery Post Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'shop_width',
	'title' => 'Shop Options',
	'pages' => array( 'product' ),
	'context' => 'normal',	

	'fields' => array(
		
				
		array(
		'name'		=> 'Header Images',
		'id'		=> $prefix . 'shop_column_grid_details_sidebar_image',
		'clone'		=> false,
		'type'		=> 'image_advanced',
		'max_file_uploads' => '1',
		'desc'		=> 'Details Page Header Image.',
		'tooltip' => array(
            'icon'     => 'help',
            'content'  => 'You can select global header image from Zonar Shop Option.',
            'position' => 'top',
            ),
		),
		
		array(
			'name'		=> 'Header Title',
			'id'		=> $prefix . 'rs_pro_dt_title',
			'desc'		=> 'Details Page Header Title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'tooltip' => array(
            'icon'     => 'help',
            'content'  => 'You can select global header title from Zonar Shop Option.',
            'position' => 'top',
            ),
		),
		
		array(
			'name'		=> 'Header Sub Title',
			'id'		=> $prefix . 'rs_pro_dt_sub_title',
			'desc'		=> 'Details Page Sub Header Sub Title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'tooltip' => array(
            'icon'     => 'help',
            'content'  => 'You can select global header sub title from Zonar Shop Option.',
            'position' => 'top',
            ),
		),
		
		array(
			'name'		=> 'Product description',
			'id'		=> $prefix . 'rs_pro_short_des',
			'desc'		=> 'Effcted only in shop page.',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),
		
		array(
			'name'		=> 'Additional Information',
			'id'		=> $prefix . 'rs_pro_additional_info',
			'desc'		=> 'e.x: Sale -30%',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'tooltip' => array(
            'icon'     => 'help',
            'content'  => 'Effcted only in shop page.',
            'position' => 'top',
            ),
		),
		
		array(
			'name'		=> 'Product Video',
			'id'		=> $prefix . 'rs_pro_video_url',
			'desc'		=> 'Youtube/ Vimeo video URL.<br>Optional.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'tooltip' => array(
            'icon'     => 'help',
            'content'  => 'Working only in shop page. ',
            'position' => 'top',
            ),
		),
		
		
	)
);

/* ----------------------------------------------------- */
/* intro parallax image
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_google_map_restabook',
	'title' => 'Contact Page Options.',
	// Show this meta box for posts matched below conditions
    'show'   => array(
    // List of page templates (used for page only). Array. Optional.
    'template'    => array( 'contact-page.php'),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
	
		array(
			'name'		=> 'Map Location',
			'id'		=> $prefix . 'rs_intro_google_map_main_location',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: 40.7143528, -74.0059731',
			'tooltip' => array(
            'icon'     => 'help',
            'content'  => "Required.",
            'position' => 'top',
            ),
			
		),
		
		array(
			'name'		=> 'Map Marker',
			'id'		=> $prefix . 'rs_intro_google_map_marker',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1',
			'desc'		=> 'Upload Map Marker. Optional.',
		),
		
		array(
			'name'		=> 'Marker Title',
			'id'		=> $prefix . 'rs_intro_google_map_main_marker_title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: My Location in New York.',
			
			
		),
		
		// contact information
		array(
			'name'     => esc_attr__( 'Contcat Information', 'restabook' ),
			'id'   => $prefix . 'rs_intro_google_map_con_info',
			'desc'  => esc_attr__( '', 'restabook' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'restabook' ),
				'st2' => esc_attr__( 'Enable', 'restabook' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'restabook' ),
		),
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'rs_intro_google_map_title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: Contacts Details',
			'hidden' => array( 'rnr_rs_intro_google_map_con_info', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Data Email Title',
			'id'		=> $prefix . 'rs_intro_google_map_email_title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: 01. Mail',
			'hidden' => array( 'rnr_rs_intro_google_map_con_info', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Data Email Content',
			'id'		=> $prefix . 'rs_intro_google_map_email_content',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: yourmail@domain.com',
			'hidden' => array( 'rnr_rs_intro_google_map_con_info', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Data Address Title',
			'id'		=> $prefix . 'rs_intro_google_map_address_title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: 02. Address',
			'hidden' => array( 'rnr_rs_intro_google_map_con_info', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Data Address Content',
			'id'		=> $prefix . 'rs_intro_google_map_address_content',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: USA 27TH Brooklyn NY',
			'hidden' => array( 'rnr_rs_intro_google_map_con_info', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Data Phone Title',
			'id'		=> $prefix . 'rs_intro_google_map_phone_title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: 03. Phone',
			'hidden' => array( 'rnr_rs_intro_google_map_con_info', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Data Phone Content 1',
			'id'		=> $prefix . 'rs_intro_google_map_phone_content',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x:+7(123)987654',
			'hidden' => array( 'rnr_rs_intro_google_map_con_info', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Data Phone Content 2',
			'id'		=> $prefix . 'rs_intro_google_map_phone_content2',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x:+7(123)987654',
			'hidden' => array( 'rnr_rs_intro_google_map_con_info', '!=', 'st2' )
		),
		
		array(
			'name'		=> 'Contact Form Shortcode',
			'id'		=> $prefix . 'rs_intro_google_form_shortcode',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: [contact-form-7 id="5" title="Contact form 1"]',
		),
		
		array(
			'name'		=> 'Form Section Title',
			'id'		=> $prefix . 'rs_intro_google_form_shortcode_title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: Get in Touch',
		),
		
		array(
			'name'		=> 'Say Hello',
			'id'		=> $prefix . 'rs_intro_google_form_shortcode_translate_opt',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: Text translate Option.',
		),
		
		// contact information
		array(
			'name'     => esc_attr__( 'Social Options', 'restabook' ),
			'id'   => $prefix . 'rs_intro_google_map_social_opt',
			'desc'  => esc_attr__( '', 'restabook' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'restabook' ),
				'st2' => esc_attr__( 'Enable', 'restabook' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'restabook' ),
		),
		
		array(
			'name'		=> 'Social Section Title',
			'id'		=> $prefix . 'rs_intro_google_social_main_title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: Find on',
			'hidden' => array( 'rnr_rs_intro_google_map_social_opt', '!=', 'st2' )
		),
		
		array(
				'id'		=> $prefix . 'rs_intro_google_social_main_opt',
				'name'        => 'Social Item',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Social Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name'		=> 'Social URL',
						'id'		=> $prefix . 'rs_intro_google_social_url',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> '',
					),
					
					array(
						'name'		=> 'Social Icon',
						'id'		=> $prefix . 'rs_intro_google_social_icon',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'e.x: fab fa-facebook-f <br> <a href="https://fontawesome.com/icons?d=gallery" target="_blank">Fontawesome Icon Class</a>',
					),
					
					
				),
				'hidden' => array( 'rnr_rs_intro_google_map_social_opt', '!=', 'st2' )
			),
			
	)
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function zonar_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}

// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'zonar_register_meta_boxes' );