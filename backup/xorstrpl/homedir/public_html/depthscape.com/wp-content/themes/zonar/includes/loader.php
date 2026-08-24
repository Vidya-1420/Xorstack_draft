<?php
function zonar_import_files() {
	return array(
		array(
			'import_file_name'             => 'WPBakery Demo',
			'categories'                   => array( 'Zonar' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/zonar-demo/wpbakery/demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/zonar-demo/wpbakery/widgets.wie',
			//'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'ocdi/customizer.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/zonar-demo/wpbakery/redux.json',
					'option_name' => 'zonar',
				),
			),
			'import_preview_image_url'     => 'http://webredox.net/demo/wp/zonar/screenshot.png',
			'import_notice'                => __( 'Be patient, it can take a couple of minutes.', 'zonar' ),
			'preview_url'                  => 'https://webredox.net/demo/wp/zonar/',
		),
		
		array(
			'import_file_name'             => 'Elementor Demo',
			'categories'                   => array( 'Zonar' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/zonar-demo/elementor/demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/zonar-demo/elementor/widgets.wie',
			//'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'ocdi/customizer.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/zonar-demo/elementor/redux.json',
					'option_name' => 'zonar',
				),
			),
			'import_preview_image_url'     => 'http://webredox.net/demo/wp/zonar/screenshot.png',
			'import_notice'                => __( 'Be patient, it can take a couple of minutes.', 'zonar' ),
			'preview_url'                  => 'https://webredox.net/demo/wp/zonar/elementor/',
		),
		
		
	);
}
add_filter( 'pt-ocdi/import_files', 'zonar_import_files' );

function zonar_after_import_setup( $selected_import ) {
	if ( 'WPBakery Demo' === $selected_import['import_file_name'] ) {
		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

		set_theme_mod( 'nav_menu_locations', array(
				'top-menu' => $main_menu->term_id,
			)
		);

		// Assign front page and posts page (blog page).
		$front_page_id = get_page_by_title( 'Home Slider' );
		$blog_page_id  = get_page_by_title( 'Sample Page' );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $blog_page_id->ID );
	}
	elseif ( 'Elementor Demo' === $selected_import['import_file_name'] ) {
		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

		set_theme_mod( 'nav_menu_locations', array(
				'top-menu' => $main_menu->term_id,
			)
		);

		// Assign front page and posts page (blog page).
		$front_page_id = get_page_by_title( 'Home Slider' );
		$blog_page_id  = get_page_by_title( 'Sample Page' );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $blog_page_id->ID );
	}
	

}
add_action( 'pt-ocdi/after_import', 'zonar_after_import_setup' );

function ocdi_plugin_page_setup( $default_settings ) {
	$default_settings['parent_slug'] = 'themes.php';
	$default_settings['page_title']  = esc_html__( 'Zonar Demo Importer' , 'pt-ocdi' );
	$default_settings['menu_title']  = esc_html__( 'Zonar Demo Importer' , 'pt-ocdi' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'zonar-one-click-demo-import';

	return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'ocdi_plugin_page_setup' );