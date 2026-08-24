<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "zonar";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'zonar/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
		'class'                => 'admin-color-pimax',
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Zonar Options', 'zonar' ),
        'page_title'           => esc_html__( 'Zonar Options', 'zonar' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => 'AIzaSyCN8bSGZHdbSOXu0HbhXf8j0SnswTmbCNw',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => true,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 90,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the zonar. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'zonar'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'zonar'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    
    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( '', 'zonar' ), $v );
    } else {
        $args['intro_text'] = esc_html__( '', 'zonar' );
    }

    // Add content after the form.
    $args['footer_text'] = esc_html__( '', 'zonar' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Support', 'zonar' ),
            'content' => esc_html__( 'Send us a mail by using our item support form.', 'zonar' )
        ),
        
    );
    Redux::set_help_tab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( 'Send us a mail by using our item support form.', 'zonar' );
    Redux::set_help_sidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // ACTUAL DECLARATION OF SECTIONS
                Redux::setSection( $opt_name, array(
                    'title'  => esc_html__( 'General Settings', 'zonar' ),
                    'desc'   => esc_html__( '', 'zonar' ),
                    'icon'   => 'el-icon-home-alt',
                    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                    'fields' => array(
					array(
			                'id' => 'notice_ajax_loading',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Ajax Loading , Menu Item Hover Animation, Site Preloader & Custom Cursor', 'zonar'),
			                'desc' => esc_html__('Enable/ Disable ajax loading, menu hover animatin and custom cursor of your site.', 'zonar')
			            ),
                    array(
							'id' => 'enableajax',
							'type' => 'button_set',
							'title' => esc_attr__('Enable Ajax Loading', 'zonar'),
							'subtitle' => esc_attr__('If you would like to use WP Bakery default elements or Elementor Website Builder  please disable Ajax loading.', 'zonar'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'zonar'),
									'st2' => esc_html__('Enable', 'zonar'),
									
							),
							'default'  => 'st1'
					),
					
					array(
							'id' => 'enablecursor',
							'type' => 'button_set',
							'title' => esc_attr__('Custom Cursor', 'zonar'),
							'subtitle' => esc_attr__('', 'zonar'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'zonar'),
									'st2' => esc_html__('Enable', 'zonar'),
									
							),
							'default'  => 'st1'
					),
					
					array(
							'id' => 'menu_hover_effect',
							'type' => 'button_set',
							'title' => esc_html__('Menu Item Hover Animation', 'zonar'),
							'subtitle' => esc_html__('', 'zonar'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'zonar'),
									'st2' => esc_html__('Enable', 'zonar'),
							),
							'default'  => 'st1'
					),
					
					array(
							'id' => 'preloader_opt',
							'type' => 'button_set',
							'title' => esc_html__('Enable/ Disable Site Preloader', 'zonar'),
							'subtitle' => esc_html__('', 'zonar'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Enable', 'zonar'),
									'st2' => esc_html__('Disable', 'zonar'),
							),
							'default'  => 'st1'
					),
					
					array(
			                'id' => 'notice_header_logo',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Logo Options', 'zonar'),
			                'desc' => esc_html__('Logo options of your site header.', 'zonar')
			        ),
					
					array(
							'id' => 'textlogo',
							'type' => 'button_set',
							'title' => esc_html__('Select Logo Format', 'zonar'),
							'subtitle' => esc_html__('', 'zonar'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Text Logo', 'zonar'),
									'st2' => esc_html__('Image Logo', 'zonar'),
									
							),
							'default'  => 'st1'
					),
					 
					array(
						'id' => 'logopic',
						'type' => 'media',
						'compiler' => 'true',
						'title' => esc_html__('Upload  Logo', 'zonar'),
						'subtitle' => esc_html__('', 'zonar'),
						'required' => array('textlogo', '=' , 'st2')
					),
					
					$fields = array(
					'id'       => 'opt_logo_dimensions',
					'type'     => 'dimensions',
					'units'    => array('em','px','%'),
					'output' => array('.logo-holder img'),
					'title'    => __('Logo Dimensions', 'zonar'),
					'subtitle' => __('.', 'zonar'),
					'desc'     => __('Optional', 'zonar'),
					'default'  => array(
						'Width'   => '163', 
						'Height'  => '34'
					),
					'required' => array('textlogo', '=' , 'st2')
				),
				
				array(
			        'id' => 'notice_responsive_logo_opt',
			        'type' => 'info',
			        'notice' => true,
			        'style' => 'success',
			        'title' => esc_html__('Responsive Logo Options', 'zonar'),
			        'desc' => esc_html__('Responsive Logo Dimensions ', 'zonar'),
					'required' => array('textlogo', '=' , 'st2')
			    ),
				
				array(
					'id' => 'logopic_responsive',
					'type' => 'media',
					'compiler' => 'true',
					'title' => esc_html__('Upload  Logo', 'zonar'),
					'subtitle' => esc_html__('', 'zonar'),
					'required' => array('textlogo', '=' , 'st2')
				),
					
				$fields = array(
					'id'       => 'opt_logo_mobile_dimensions',
					'type'     => 'dimensions',
					'units'    => array('em','px','%'),
					'output' => array(''),
					'title'    => esc_html__('Responsive Logo Dimensions', 'zonar'),
					'subtitle' => __('Media width 768px', 'zonar'),
					'desc'     => __('Optional', 'zonar'),
					'default'  => array(
						'Width'   => '', 
						'Height'  => ''
					),
					'required' => array('textlogo', '=' , 'st2')
				),
				
				array(
			        'id' => 'notice_header_nav_opt',
			        'type' => 'info',
			        'notice' => true,
			        'style' => 'success',
			        'title' => esc_html__('Header Logo Position', 'restabook'),
			        'desc' => esc_html__('Header logo position controlling options.', 'restabook'),
					'required' => array('textlogo', '=' , 'st2')
				),
					
				$fields = array(
					'id'             => 'opt_header_logo_spacing',
					'type'           => 'spacing',
					'output'         => array(''),
					'mode'           => 'margin',
					'units'          => array('px', 'em'),
					'right'   => false, 
					'bottom'  => false, 
					'left'    => false,
					'units_extended' => 'false',
					'title'          => __('Logo Top Margin', 'restabook'),
					'subtitle'       => __('Default: 20px', 'restabook'),
					'desc'           => __('', 'restabook'),
					'default'            => array(
						'margin-top'     => '', 
						'margin-right'   => '0px', 
						'margin-bottom'  => '0px', 
						'margin-left'    => '0px',
						'units'          => 'px', 
					),
					'required' => array('textlogo', '=' , 'st2')
				),
					
				$fields = array(
					'id'             => 'opt_header_logo_spacing_resposive',
					'type'           => 'spacing',
					'output'         => array(''),
					'mode'           => 'margin',
					'units'          => array('px', 'em'),
					'right'   => false, 
					'bottom'  => false, 
					'left'    => false,
					'units_extended' => 'false',
					'title'          => __('Responsive Logo Top Margin', 'restabook'),
					'subtitle'       => __('Default: 0px<br>Media width 768px', 'restabook'),
					'desc'           => __('', 'restabook'),
					'default'            => array(
						'margin-top'     => '', 
						'margin-right'   => '0px', 
						'margin-bottom'  => '0px', 
						'margin-left'    => '0px',
						'units'          => 'px', 
					),
					'required' => array('textlogo', '=' , 'st2')
				),
					
					array(
							'id' => 'logotext',
							'type' => 'text',
							'title' => esc_html__('Logo Text ', 'zonar'),
							'subtitle' => esc_html__('', 'zonar'),
							'required' => array('textlogo', '=' , 'st1')
					),
					
					array(
			                'id' => 'notice_header_menu',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Menu Options', 'zonar'),
			                'desc' => esc_html__('Menu options of your site header.', 'zonar')
			            ),
						
					array(
							'id' => 'menu_st_title',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Menu Section Title', 'zonar'),
							'subtitle' => esc_html__('E.X: Menu', 'zonar'),
					),
					
					array(
			                'id' => 'notice_header_share',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Share Options', 'zonar'),
			                'desc' => esc_html__('Share options of your site header.', 'zonar')
			            ),
					
					array(
							'id' => 'headershare_opt',
							'type' => 'button_set',
							'title' => esc_html__('Share Option', 'zonar'),
							'subtitle' => esc_html__('', 'zonar'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'zonar'),
									'st2' => esc_html__('Enable', 'zonar'),
							),
							'default'  => 'st1'
					),
					
					array(
							'id' => 'headershare_facebook_opt',
							'type' => 'button_set',
							'title' => esc_html__('Facebook', 'zonark'),
							'subtitle' => esc_html__('', 'zonark'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Enable', 'zonark'),
									'st2' => esc_html__('Disable', 'zonark'),
							),
							'default'  => 'st1',
							'required' => array('headershare_opt', '=' , 'st2')
					),
					
					array(
							'id' => 'headershare_pinterest_opt',
							'type' => 'button_set',
							'title' => esc_html__('Pinterest', 'zonark'),
							'subtitle' => esc_html__('', 'zonark'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Enable', 'zonark'),
									'st2' => esc_html__('Disable', 'zonark'),
							),
							'default'  => 'st1',
							'required' => array('headershare_opt', '=' , 'st2')
					),
					
					array(
							'id' => 'headershare_tumblr_opt',
							'type' => 'button_set',
							'title' => esc_html__('Tumblr', 'zonark'),
							'subtitle' => esc_html__('', 'zonark'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Enable', 'zonark'),
									'st2' => esc_html__('Disable', 'zonark'),
							),
							'default'  => 'st1',
							'required' => array('headershare_opt', '=' , 'st2')
					),
					
					array(
							'id' => 'headershare_twitter_opt',
							'type' => 'button_set',
							'title' => esc_html__('Twitter', 'zonark'),
							'subtitle' => esc_html__('', 'zonark'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Enable', 'zonark'),
									'st2' => esc_html__('Disable', 'zonark'),
							),
							'default'  => 'st1',
							'required' => array('headershare_opt', '=' , 'st2')
					),
					
					array(
							'id' => 'headershare_linkedin_opt',
							'type' => 'button_set',
							'title' => esc_html__('Linkedin', 'zonark'),
							'subtitle' => esc_html__('', 'zonark'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Enable', 'zonark'),
									'st2' => esc_html__('Disable', 'zonark'),
							),
							'default'  => 'st1',
							'required' => array('headershare_opt', '=' , 'st2')
					),
					
					array(
							'id' => 'headershare_digg_opt',
							'type' => 'button_set',
							'title' => esc_html__('Digg', 'zonark'),
							'subtitle' => esc_html__('', 'zonark'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Enable', 'zonark'),
									'st2' => esc_html__('Disable', 'zonark'),
							),
							'default'  => 'st2',
							'required' => array('headershare_opt', '=' , 'st2')
					),
					
					array(
							'id' => 'headershare_reddit_opt',
							'type' => 'button_set',
							'title' => esc_html__('Reddit', 'zonark'),
							'subtitle' => esc_html__('', 'zonark'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Enable', 'zonark'),
									'st2' => esc_html__('Disable', 'zonark'),
							),
							'default'  => 'st2',
							'required' => array('headershare_opt', '=' , 'st2')
					),
					
					array(
							'id' => 'headershare_email_opt',
							'type' => 'button_set',
							'title' => esc_html__('Email', 'zonark'),
							'subtitle' => esc_html__('', 'zonark'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Enable', 'zonark'),
									'st2' => esc_html__('Disable', 'zonark'),
							),
							'default'  => 'st2',
							'required' => array('headershare_opt', '=' , 'st2')
					),
					
					array(
			                'id' => 'notice_header_share_translation',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Share Section Translation Options', 'zonar'),
			                'desc' => esc_html__('Share Section Text Translation Options', 'zonar'),
							'required' => array('headershare_opt', '=' , 'st2')
			        ),
					
					array(
							'id' => 'share_bt_title1',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Text 1', 'zonar'),
							'subtitle' => esc_html__('E.X: Share', 'zonar'),
							'required' => array('headershare_opt', '=' , 'st2')
					),
					
					array(
			                'id' => 'notice_header_contact_info',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Header Contacts', 'zonar'),
			                'desc' => esc_html__('Header contact section of your site.', 'zonar'),
							
			            ),
					array(
							'id' => 'hd_phn_number',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Phone Number', 'zonar'),
							'subtitle' => esc_html__('', 'zonar'),
							
					),
					array(
							'id' => 'hd_email_address',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Email Address', 'zonar'),
							'subtitle' => esc_html__('', 'zonar'),
					),
					array(
							'id' => 'header_con_title1',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Text 1', 'zonar'),
							'subtitle' => esc_html__('Translation Options. E.X:  01. Call  ', 'zonar'),
					),
					
					array(
							'id' => 'header_con_title2',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Text 2', 'zonar'),
							'subtitle' => esc_html__('Translation Options. E.X:  02. Write  ', 'zonar'),
					),
					
					array(
			                'id' => 'notice_header_contact',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Header Button Options', 'zonar'),
			                'desc' => esc_html__('Header Button options of your site header.', 'zonar')
			            ),
					
					array(
							'id' => 'headercontact_opt',
							'type' => 'button_set',
							'title' => esc_html__('Button Section', 'zonar'),
							'subtitle' => esc_html__('', 'zonar'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'zonar'),
									'st2' => esc_html__('Enable', 'zonar'),
							),
							'default'  => 'st1'
					),
					
					array(
							'id' => 'contact_bt_title',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Button Title', 'zonar'),
							'subtitle' => esc_html__('E.X: Get in touch', 'zonar'),
							'required' => array('headercontact_opt', '=' , 'st2')
					),
					
					array(
							'id' => 'headercontact_url_type',
							'type' => 'button_set',
							'title' => esc_html__('URL From', 'zonar'),
							'subtitle' => esc_html__('If you are using url from other site, then must select "Other Site"', 'zonar'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Own Site', 'zonar'),
									'st2' => esc_html__('Other Site', 'zonar'),
							),
							'default'  => 'st1',
							'required' => array('headercontact_opt', '=' , 'st2')
					),
					
					array(
							'id' => 'con_p_url',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('URL', 'zonar'),
							'subtitle' => esc_html__('', 'zonar'),
							'required' => array('headercontact_opt', '=' , 'st2')
					),
					
					array(
							'id' => 'theme-cus-copy',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_html__('Copy right Text', 'zonar'),
							'desc' => esc_html__('Menu copy right Text', 'zonar')
							
					  ),
					
					array(
							'id' => 'copyright',
							'type' => 'editor',
							'wpautop'=>true,
							'compiler' => 'true',
							'title' => esc_html__('Copyright text of the WebSite', 'zonar'),
							'subtitle' => esc_html__('Write a Copyright text of your WebSite', 'zonar'),
							'default'          => '<span>&#169; zonar 2020  /  All rights reserved. </span>',
							'args'   => array(
								'teeny'            => true,
								'textarea_rows'    => 10
							)
					),
					
				  )
               ) );
			   
			   
			   
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-bullhorn',
                    'title'  => esc_html__( '404 Page Options', 'zonar' ),
                    'fields' => array(
					
					array(
							'id' => '404back',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_html__('Upload  404 Page Background Image', 'zonar'),
							'subtitle' => esc_html__('', 'zonar'),
							
					),
					
					array(
			                'id' => 'notice_404page_translation',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('404 Page Translation Options', 'zonar'),
			                'desc' => esc_html__('404 Page Text Translation Options', 'zonar'),
							
			            ),
					
					array(
							'id' => '404_page_title',
							'type' => 'textarea',
							'compiler' => 'true',
							'title' => esc_html__('Text 1', 'zonar'),
							'subtitle' => esc_html__('Translation Options. E.X:  WE are SORRY, BUT THE PAGE YOU WERE LOOKING FOR, COULDNT BE FOUND. ', 'zonar'),
							
					),
					
					array(
							'id' => '404_page_title_4',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Text 2', 'zonar'),
							'subtitle' => esc_html__('Translation Options. E.X:  Back to Home Page', 'zonar'),
							
					),
					
                    )
                ) );
				
			
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-bullhorn',
                    'title'  => esc_html__( 'Blog & Portfolio Options', 'zonar' ),
                    'fields' => array(
					
					array(
							'id' => 'blogtyle',
							'type' => 'button_set',
							'title' => esc_html__('Select Blog Layout', 'zonar'),
							'subtitle' => esc_html__('', 'zonar'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Right Sidebar', 'zonar'),
									'st2' => esc_html__('Left Sidebar', 'zonar'),
							),
							'default'  => 'st1'
					),
					
					array(
							'id' => 'blogtyle_ani',
							'type' => 'button_set',
							'title' => esc_html__('Page Scrolling Animation', 'zonar'),
							'subtitle' => esc_html__('', 'zonar'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'zonar'),
									'st2' => esc_html__('Enable', 'zonar'),
							),
							'default'  => 'st1'
					),
					
					
					array(
							'id' => 'blogpageurl',
							'type' => 'text',
							'title' => esc_html__('Blog Page URL ', 'zonar'),
							'subtitle' => esc_html__('Working on post details page pagination.', 'zonar'),
						
					),
					
					array(
							'id' => 'post_details_back',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_html__('Post Details header Image', 'zonar'),
							'subtitle' => esc_html__('Upload post details page header image.', 'zonar'),
							
					),
					
					array(
			                'id' => 'notice_header_page_title_translation',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Index Page Title Options', 'zonar'),
			                'desc' => esc_html__('Working only sidebar style.', 'zonar'),
							'required' => array('headersearch_opt', '=' , 'st2')
			        ),
					
					array(
							'id' => 'blogtitle',
							'type' => 'text',
							'title' => esc_html__('Index Title ', 'zonar'),
							'subtitle' => esc_html__('Write header title for index page here. Ex: My Blog', 'zonar'),
					),
					
					array(
							'id' => 'blog_sub_title',
							'type' => 'textarea',
							'title' => esc_html__('Index Description. ', 'zonar'),
							'subtitle' => esc_html__('Working only sidebar style.', 'zonar'),
					),
					
					array(
							'id' => 'arch-page-title',
							'type' => 'text',
							'title' => esc_html__('Archive Page Title', 'zonar'),
							'subtitle' => esc_html__('Write header title for blog archive page here. Ex: Archive', 'zonar'),
							'default' => '',
					),	
					array(
							'id' => 'cat-page-title',
							'type' => 'text',
							'title' => esc_html__('Category Page Title', 'zonar'),
							'subtitle' => esc_html__('Write header title for blog category page here. Ex: Category', 'zonar'),
							'default' => '',
					),	
	
					array(
							'id' => 'tag-page-title',
							'type' => 'text',
							'title' => esc_html__('Tag Page Title', 'zonar'),
							'subtitle' => esc_html__('Write header title for blog tag page here. Ex: Tag', 'zonar'),
							'default' => '',
					),	
					
					array(
							'id' => 'search-page-title',
							'type' => 'text',
							'title' => esc_html__('Search Page Title', 'zonar'),
							'subtitle' => esc_html__('Write header title for blog search page here. Ex: Search', 'zonar'),
							'default' => '',
					),
					
					array(
			                'id' => 'notice_header_portfolio',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Portfolio Details Page Options', 'zonar'),
			                'desc' => esc_html__('', 'zonar')
			        ),
					
					array(
							'id' => 'portpageurl',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Portfolio Page URL', 'zonar'),
							'subtitle' => esc_html__('Working on portfolio details page pagination.', 'zonar'),
							
					),
					
					
                    )
                ) );
				
				if (class_exists('WooCommerce')) {
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el el-shopping-cart-sign',
                    'title'  => esc_attr__( 'Shop Options', 'zonar' ),
                    'fields' => array(
					
					array(
							'id' => 'wr-shop-opt',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_attr__('Shop Page Header Options', 'zonar'),
							'desc' => esc_attr__(' ', 'zonar')
					),

					array(
							'id' => 'shopheaderimg',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_attr__('Upload Shop Page Header Image', 'zonar'),
							'subtitle' => esc_attr__('', 'zonar'),
					),
					
					array(
							'id' => 'shopsubtitle',
							'type' => 'textarea',
							'title' => esc_attr__('Sub Title ', 'zonar'),
							'subtitle' => esc_attr__('Shop page sub title', 'zonar'),
					),
					
					array(
							'id' => 'wr-shop-dt-opt',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_attr__('Product Details Page Options', 'zonar'),
							'desc' => esc_attr__(' ', 'zonar')
						),
					  
					array(
							'id' => 'shopheaderimgdt',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_attr__('Upload Product Details Page Header Image', 'zonar'),
							'subtitle' => esc_attr__('', 'zonar'),
					),
					
					array(
							'id' => 'shoptitledt',
							'type' => 'text',
							'title' => esc_attr__('Title ', 'zonar'),
							'subtitle' => esc_attr__('Product Details Page Title', 'zonar'),
					),
					
					array(
							'id' => 'shopsubtitledt',
							'type' => 'textarea',
							'title' => esc_attr__('Sub Title ', 'zonar'),
							'subtitle' => esc_attr__('Product Details Page Sub Title', 'zonar'),
							'required' => array('shop_details_page_opt', '=' , 'st1')
					),
					
					
                    )
                ) );
				}
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-cog',
                    'title'  => __( 'Translate Options', 'zonar' ),
                    'fields' => array(
					
					array(
							'id' => 'wr-blog-opt2',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_html__('Translate Text', 'zonar'),
							'desc' => esc_html__(' ', 'zonar')
							
					  ),

					array(
							'id' => 'translet_opt_2',
							'type' => 'text',
							'title' => esc_html__('To top', 'zonar'),
							'subtitle' => esc_html__('Footer Text.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_3',
							'type' => 'text',
							'title' => esc_html__('Scroll Down', 'zonar'),
							'subtitle' => esc_html__('Shop Page & Index.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_4',
							'type' => 'text',
							'title' => esc_html__('Category', 'zonar'),
							'subtitle' => esc_html__('Post Meta.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_19',
							'type' => 'text',
							'title' => esc_html__('Tags', 'zonar'),
							'subtitle' => esc_html__('Post Meta.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_5',
							'type' => 'text',
							'title' => esc_html__('Read More', 'zonar'),
							'subtitle' => esc_html__('Post Meta.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_6',
							'type' => 'text',
							'title' => esc_html__('Type & Hit Enter...', 'zonar'),
							'subtitle' => esc_html__('Search Widget Placeholder Text.', 'zonar'),
					),
					
					
					array(
							'id' => 'translet_opt_8',
							'type' => 'text',
							'title' => esc_html__('Comment', 'zonar'),
							'subtitle' => esc_html__('Post Meta.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_9',
							'type' => 'text',
							'title' => esc_html__('Comments', 'zonar'),
							'subtitle' => esc_html__('Post Meta.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_10',
							'type' => 'text',
							'title' => esc_html__('One thought on', 'zonar'),
							'subtitle' => esc_html__('Post Comment Section.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_11',
							'type' => 'text',
							'title' => esc_html__('thought on', 'zonar'),
							'subtitle' => esc_html__('Post Comment Section.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_12',
							'type' => 'text',
							'title' => esc_html__('thoughts on', 'zonar'),
							'subtitle' => esc_html__('Post Comment Section.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_13',
							'type' => 'text',
							'title' => esc_html__('Comments are closed.', 'zonar'),
							'subtitle' => esc_html__('Post Comment Section.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_14',
							'type' => 'text',
							'title' => esc_html__('Your Name', 'zonar'),
							'subtitle' => esc_html__('Post Comment Section Form.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_15',
							'type' => 'text',
							'title' => esc_html__('Your Email', 'zonar'),
							'subtitle' => esc_html__('Post Comment Section Form.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_16',
							'type' => 'text',
							'title' => esc_html__('Your Comment', 'zonar'),
							'subtitle' => esc_html__('Post Comment Section Form.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_17',
							'type' => 'text',
							'title' => esc_html__('Send Comment', 'zonar'),
							'subtitle' => esc_html__('Post Comment Section Form.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_26',
							'type' => 'text',
							'title' => esc_html__('Leave a Reply', 'zonar'),
							'subtitle' => esc_html__('Post Comment Section Form.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_18',
							'type' => 'text',
							'title' => esc_html__('Prev', 'zonar'),
							'subtitle' => esc_html__('Post & Portfolio Pagination.', 'zonar'),
					),
					
					
					array(
							'id' => 'translet_opt_20',
							'type' => 'text',
							'title' => esc_html__('Next', 'zonar'),
							'subtitle' => esc_html__('Post & Portfolio Pagination.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_21',
							'type' => 'text',
							'title' => esc_html__('Back To Home', 'zonar'),
							'subtitle' => esc_html__('Portfolio & Post Pagination.', 'zonar'),
					),
					array(
							'id' => 'translet_opt_25',
							'type' => 'text',
							'title' => esc_html__('Back To Blog', 'zonar'),
							'subtitle' => esc_html__('Post Pagination.', 'zonar'),
					),
					array(
							'id' => 'translet_opt_22',
							'type' => 'text',
							'title' => esc_html__('Back To Portfolio', 'zonar'),
							'subtitle' => esc_html__('Portfolio Pagination.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_23',
							'type' => 'text',
							'title' => esc_html__('No Item Found', 'zonar'),
							'subtitle' => esc_html__('Post Search Page.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_24',
							'type' => 'text',
							'title' => esc_html__('Please Search Again.', 'zonar'),
							'subtitle' => esc_html__('Post Search Page.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_7',
							'type' => 'text',
							'title' => esc_html__('Search', 'zonar'),
							'subtitle' => esc_html__('SearchForm Placeholder Text.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_27',
							'type' => 'text',
							'title' => esc_html__('Swipe', 'zonar'),
							'subtitle' => esc_html__('Custom Cursor Text.', 'zonar'),
					),
					
					array(
							'id' => 'translet_opt_28',
							'type' => 'text',
							'title' => esc_html__('Next', 'zonar'),
							'subtitle' => esc_html__('Custom Cursor Text.', 'zonar'),
					),
					
					
					
                    )
                ) );
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-text-width',
                    'title'  => esc_attr__( 'Typography', 'zonar' ),
                    'fields' => array(  

						array(
                            'id'          => 'typo_body',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Body', 'nui'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('body'),
                            'units'       =>'px',
                            'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'text-align'       =>false,
                            'subtitle'    => esc_html__('Specify the Body Text font properties.', 'nui'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            'text-align' => false,
                            ),
						),
						
						
						array(
                            'id'          => 'typo_p',
                            'type'        => 'typography', 
                            'title'       => esc_html__('P', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.main-about-text-area, div:not(.elementor-widget-text-editor) p'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the P Text font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_t_h1',
                            'type'        => 'typography', 
                            'title'       => esc_html__('h1', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
							'font-weight'  => true,
                            'output'      => array('h1, .single-post .text-block h1, .wr-default-page h1'),
                            'units'       =>'px',
                            'line-height'       =>false,
							'font-size'   => true,
                            'text-align'       =>false,
                            'subtitle'    => esc_html__('Specify the h1 font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            'text-align' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_t_h2',
                            'type'        => 'typography', 
                            'title'       => esc_html__('h2', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
							'font-weight'  => true,
                            'output'      => array('h2, .single-post .text-block h2, .wr-default-page h2'),
                            'units'       =>'px',
                            'line-height'       =>false,
							'font-size'   => true,
                            'text-align'       =>false,
                            'subtitle'    => esc_html__('Specify the h2 font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            'text-align' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_t_h3',
                            'type'        => 'typography', 
                            'title'       => esc_html__('h3', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
							'font-weight'  => true,
                            'output'      => array('h3, .single-post .text-block h3, .wr-default-page h3'),
                            'units'       =>'px',
                            'line-height'       =>false,
							'font-size'   => true,
                            'text-align'       =>false,
                            'subtitle'    => esc_html__('Specify the h3 font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            'text-align' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_t_h4',
                            'type'        => 'typography', 
                            'title'       => esc_html__('h4', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
							'font-weight'  => true,
                            'output'      => array('h4, .single-post .text-block h4, .wr-default-page h4'),
                            'units'       =>'px',
                            'line-height'       =>false,
							'font-size'   => true,
                            'text-align'       =>false,
                            'subtitle'    => esc_html__('Specify the h4 font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            'text-align' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_t_h5',
                            'type'        => 'typography', 
                            'title'       => esc_html__('h5', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
							'font-weight'  => true,
                            'output'      => array('h5, .single-post .text-block h5, .wr-default-page h5'),
                            'units'       =>'px',
                            'line-height'       =>false,
							'font-size'   => true,
                            'text-align'       =>false,
                            'subtitle'    => esc_html__('Specify the h5 font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            'text-align' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_t_h6',
                            'type'        => 'typography', 
                            'title'       => esc_html__('h6', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
							'font-weight'  => true,
                            'output'      => array('h6, .single-post .text-block h6, .wr-default-page h6'),
                            'units'       =>'px',
                            'line-height'       =>false,
							'font-size'   => true,
                            'text-align'       =>false,
                            'subtitle'    => esc_html__('Specify the h6 font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            'text-align' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_a',
                            'type'        => 'typography', 
                            'title'       => esc_html__('a', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
							'font-weight'  => true,
                            'output'      => array('a'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the a Text font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_strong',
                            'type'        => 'typography', 
                            'title'       => esc_html__('strong', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
							'output'      => array('strong'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the strong Text font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_b',
                            'type'        => 'typography', 
                            'title'       => esc_html__('b', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('b'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the b Text font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_page_loading_title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Preloader Page Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.loading-text-container'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify preloader page title Text font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-all-button',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Button', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.btn, .vc-section button, .custom-form button, .vc-section input[type=submit]'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the  button  font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-all-button-hover',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Button Hover', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.btn:hover, .vc-section button:hover, .custom-form button:hover, .vc-section input[type=submit]:hover'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the  button  font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-start-button',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Start Button', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.start-btn'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the  start button  font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-start-button-hover',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Start Button Hover', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.start-btn:hover'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the  start button  font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
			                'id' => 'notice_critical11',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Entry Headings', 'zonar'),
			                'desc' => esc_html__('Entry Headings in Header/Left bar/ Menu/ Header Contact/ Scroll Menu', 'zonar')
			            ),
						
						array(
                            'id'          => 'typo_header_page_title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Header Page Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.page-subtitle'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the header page title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_header_entry',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Menu, Share', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.menu-button-text, .share-btn span'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the menu & share Text font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						
						
						array(
                            'id'          => 'logotextwr1',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Text Logo', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.ns-text-logo'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the Logo Text font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_menu_iten',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Menu Item', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.sliding-menu a'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the Menu Item Text font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-weight'  => true,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_menu_iten_hover',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Menu Item Hover', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.sliding-menu a:hover'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the Menu Item Text font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_menu_iten_active',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Menu Item Active', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.current-menu-parent > a, .current-menu-item > a'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the Menu Item Text font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						
						array(
                            'id'          => 'typo_header_contact',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Header Contact', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.header-contacts li, .contacts-btn'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the header contact text font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_page_scrollmenu',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Scroll Menu', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.page-scroll-nav_wrap li a, .fixed-bottom-panel .gallery-filters a, .pagination a'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the scroll menu text font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
			                'id' => 'notice_critical12',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Entry Headings', 'zonar'),
			                'desc' => esc_html__('Entry Headings in Home Page Template.', 'zonar')
			            ),
						
						array(
                            'id'          => 'typography-h1-slider',
                            'type'        => 'typography', 
                            'title'       => esc_html__('All Slider Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.half-hero-wrap h1, .hhw-vis.half-hero-wrap h1'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the all slider title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-con-slider',
                            'type'        => 'typography', 
                            'title'       => esc_html__('All Slider Content', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.half-hero-wrap h4'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the all slider content font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						
						array(
                            'id'          => 'typography_car_slider_title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Carousel Slider Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.grid-carousel-title h3, .grid-carousel-title h3 a '),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the all Carousel slider title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-car-slider-con',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Carousel Slider Content', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.grid-carousel-title h4'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the Carousel slider content font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-text-slider',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Text Slider/ Slider Sub Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.hhw_header'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the text slider font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-text-location-tip',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Location Tooltip', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.hero-decor-numb'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the location tooltip font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-number-counter-home',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Number Counter Item Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.hero-facts-wrap .inline-facts h6'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the number counter title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-number-counter-home-count',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Number Counter', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.hero-facts-wrap .num'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the number counter font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-promo-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Promo Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.hero_promo-title h4'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the promo title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-promo-content',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Promo Content', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.hero_promo-title p'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the promo content font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
			                'id' => 'notice_critical13',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Entry Headings', 'zonar'),
			                'desc' => esc_html__('Entry Headings in Default Page Template.', 'zonar')
			            ),
						
						array(
                            'id'          => 'typography-page-right-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Page Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.fixed-column-wrap_title h2'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the page title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-right-con',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Page Sub Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.fixed-column-wrap_title p'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the page sub title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						
						array(
                            'id'          => 'typography-page-right-scroll-button',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Scroll Button', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.scroll-notifer'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the page scroll button font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
			                'id' => 'notice_critical1con',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Entry Headings', 'zonar'),
			                'desc' => esc_html__('Entry Headings in Contact Page Template.', 'zonar')
			            ),
						
						array(
                            'id'          => 'typography-pagec-right-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Contcat Information Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.contact-details-title h2'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the contcat information title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-right-con-info-1',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Contcat Information Item Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.contact-details ul li span'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the contcat information item title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						array(
                            'id'          => 'typography-page-right-con-info-2',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Contcat Information Item Content', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.contact-details ul li, .contact-details ul li a'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the contcat information item content font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						
						array(
			                'id' => 'notice_critical1blog',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Entry Headings', 'zonar'),
			                'desc' => esc_html__('Entry Headings in Blog Page Template & Post Details.', 'zonar')
			            ),
						
						array(
                            'id'          => 'typography-blog-top-meta',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Top Meta', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.blog-btn'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the blog top meta item font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-blog-top-meta-item',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Top Meta List Iteam', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.blog-btn-filter ul li a'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the blog top meta list item item font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-blog-post-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Post Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.post-det h3, .post-det h3 a'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the blog post title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-blog-post-meta',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Post Meta', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.post-header span, .post-header a'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the blog post meta font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						
						array(
                            'id'          => 'typography-blog-post-button',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Read More Button', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.post-link'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the blog post read more button font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						
						
						
						
						array(
			                'id' => 'notice_critical14',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Entry Headings', 'zonar'),
			                'desc' => esc_html__('Entry Headings in WPBakery Page Builder only for zonar category.', 'zonar')
			            ),
						array(
                            'id'          => 'typography-page-vc-row-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Row Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.section-title h3'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the page row title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-sub-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Row Sub Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.section-title p'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the page row sub title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-counter-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Counter Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.inline-facts-wrap h6'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the counter title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-counter-number',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Counter Number', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.inline-facts-wrap .num'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the counter number font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						
						array(
                            'id'          => 'typography-page-vc-row-team-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Team Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.team-info h3'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the team title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-team-designation',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Team Designation', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.team-info h4'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the team designation font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-team-content',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Team Description', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.team-box p'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the team dscription font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-testimonial-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Testimonial Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.testimonilas-text h3'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the testimonial title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-testimonial-content',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Testimonial content', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.testimonilas-text p'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the testimonial content font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						
						
						array(
                            'id'          => 'typography-page-vc-row-skill-bar-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Skill Bar Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.custom-skillbar-title span'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the skill bar title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-skill-bar-number',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Skill Bar Number', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.skill-bar-percent'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the skill bar number font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-spirchart',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Piechart Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.piechart-holder h4'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the piechart title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-zo-text',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Zonar Text Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.main-about h2'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the Zonar text title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-zo-feature-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Zonar Features Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.process-details h4'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the Zonar features title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-zo-feature-button',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Zonar Features Button', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.show-phdc span'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the Zonar features button font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-zo-feature-tag',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Zonar Features Tags', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.pdcw_list li'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the Zonar features tags font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-zo-call-to-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Zonar Call To Actions Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.srv-link-text h4'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the Zonar Call To Actions Title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-zo-accordion-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Zonar Accordion Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.accordion a.toggle'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the Zonar Accordion Title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-zo-accordion-con',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Zonar Accordion Content', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.accordion-inner, .accordion-inner p'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the Zonar Accordion content font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-zo-information-con',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Zonar Information', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.project-details ul li, .project-details ul:after'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the Zonar Information font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-zo-simpletitle',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Zonar Simple Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.pr-subtitle'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the Zonar simple title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
			                'id' => 'notice_widget_area',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Widget Area', 'zonar'),
			                'desc' => esc_html__('', 'zonar')
			            ),
						array(
                            'id'          => 'typography-widget-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Widget Title', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.blog-widgets .wp-block-group .wp-block-group__inner-container h2, .blog-widget-title'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the page widget title font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-widget-li',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Widget List Item', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.widget.single-side-bar:not(.border-widget) ul li a'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the page widget list item font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-widget-tag',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Widget Tags', 'zonar'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.widget .tagcloud a'),
                            'units'       =>'px',
							'line-height'       =>false,
							'font-style'  => false,
							'font-weight'  => true,
                            'subtitle'    => esc_html__('Specify the page widget tags item font properties.', 'zonar'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						
                    )
                ) );
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-leaf',
                    'title'  => esc_html__( 'Social Options', 'zonar' ),
                    'fields' => array(
					
					
					array(
							'id' => 'social_show_hide_opt_head',
							'type' => 'button_set',
							'title' => esc_html__('Social Option', 'zonar'),
							'subtitle' => esc_html__('', 'zonar'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'zonar'),
									'st2' => esc_html__('Enable', 'zonar'),
							),
							'default'  => 'st1'
					),
					
					array(
							'id' => 'facebook',
							'type' => 'text',
							'title' => esc_html__('Facebook URL ', 'zonar'),
							'subtitle' => esc_html__('Write Social URL', 'zonar'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
					),
					
					array(
							'id' => 'twitter',
							'type' => 'text',
							'title' => esc_html__('Twitter URL ', 'zonar'),
							'subtitle' => esc_html__('Write Social URL', 'zonar'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
					),
					
					array(
							'id' => 'pinterest',
							'type' => 'text',
							'title' => esc_html__('Pinterest URL ', 'zonar'),
							'subtitle' => esc_html__('Write Social URL', 'zonar'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
					),
					
					array(
							'id' => 'behance',
							'type' => 'text',
							'title' => esc_html__('Behance URL ', 'zonar'),
							'subtitle' => esc_html__('Write Social URL', 'zonar'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
					),
					
					array(
							'id' => 'dribbble',
							'type' => 'text',
							'title' => esc_html__('Dribbble URL ', 'zonar'),
							'subtitle' => esc_html__('Write Social URL', 'zonar'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
					),
					
					array(
							'id' => 'gplus',
							'type' => 'text',
							'title' => esc_html__('Google URL ', 'zonar'),
							'subtitle' => esc_html__('Write Social URL', 'zonar'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
					),
					
					array(
							'id' => 'linkedin',
							'type' => 'text',
							'title' => esc_html__('Linkedin URL ', 'zonar'),
							'subtitle' => esc_html__('Write Social URL', 'zonar'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
					),
					
					array(
							'id' => 'youtube',
							'type' => 'text',
							'title' => esc_html__('Youtube URL ', 'zonar'),
							'subtitle' => esc_html__('Write Social URL', 'zonar'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
						
					),
					
					array(
							'id' => 'vimeo',
							'type' => 'text',
							'title' => esc_html__('Vimeo URL ', 'zonar'),
							'subtitle' => esc_html__('Write Social URL', 'zonar'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
							
					),
					
					array(
							'id' => 'slack',
							'type' => 'text',
							'title' => esc_html__('Slack ', 'zonar'),
							'subtitle' => esc_html__('Write Social URL', 'zonar'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
							
					),
					
					array(
							'id' => 'instagram',
							'type' => 'text',
							'title' => esc_html__('Instagram URL ', 'zonar'),
							'subtitle' => esc_html__('Write Social URL', 'zonar'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
							
					),
					
					array(
							'id' => 'tumblr',
							'type' => 'text',
							'title' => esc_html__('Tumblr URL ', 'zonar'),
							'subtitle' => esc_html__('Write Social URL', 'zonar'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
							
					),
					
					array(
							'id'       => 'opt_add_more_social',
							'type'     => 'multi_text',
							'title'    => esc_html__( 'Add More Social Icons.', 'zonar' ),
							'subtitle' => esc_html__( '', 'zonar' ),
							'desc'     => __( 'e.x: &lt;li&gt;&lt;a target="_blank" href="#"&gt;&lt;i class="fab fa-facebook-f"&gt;&lt;/i&gt;&lt;/a&gt;&lt;/li&gt;<br>Use <a href="https://fontawesome.com/icons?d=listing" target="_blank">Fontawesome</a> Icon Class', 'zonar' ),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
					),
					
					
                    )
                ) );
				
						
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-brush',
                    'title'  => esc_html__( 'Styling', 'zonar' ),
                    'fields' => array(
					
					array(
                            'id'       => 'opt-theme-style',
                            'type'     => 'color',
                            'title'    => esc_html__( 'Theme Color Option', 'zonar' ),
                            'subtitle' => esc_html__( 'Only color validation can be done on this field type', 'zonar' ),
                            'desc'     => esc_html__( 'Change all global color.', 'zonar' ),
                            //'regular'   => false, // Disable Regular Color
                            //'hover'     => false, // Disable Hover Color
                            //'active'    => false, // Disable Active Color
                            //'visited'   => true,  // Enable Visited Color
                            
                        ),
					
                    )
                ) );
				
				
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-key',
                    'title'  => esc_html__( 'Documentation', 'zonar' ),
                    'fields' => array(					
					
					array(
							'id' => 'docs',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_html__('zonar Theme Documentation', 'zonar'),
							'desc' => __('<a href="http://webredox.net/demo/wp/zonar/doc/documentation.html" target="_blank">Click Here</a> To get the theme documentation.', 'zonar')
							
					),	

			
					)
                ));
				
				
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'zonar' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'zonar' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-zonar plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }