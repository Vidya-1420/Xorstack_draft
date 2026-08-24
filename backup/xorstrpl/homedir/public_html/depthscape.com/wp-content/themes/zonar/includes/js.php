<?php

if( !function_exists ('zonar_enqueue_scripts') ) :
	function zonar_enqueue_scripts() {
	$zonar_options = get_option('zonar');
	$zonar_protocol = is_ssl() ? 'https' : 'http';
			
	
	wp_enqueue_script('zonar-plugins', (ZONAR_THEME_URL . '/includes/js/plugins.js'), array('jquery'), '1.0',true);
	wp_enqueue_script('zonar-scripts', (ZONAR_THEME_URL . '/includes/js/scripts.js'), array('jquery'), '1.0',true);
	wp_enqueue_script('swiper', (ZONAR_THEME_URL . '/includes/js/swiper.min.js'), array('jquery'), '1.0',true);
	if (Zonar_AfterSetupTheme::return_thme_option('menu_hover_effect')=='st2'){
		wp_enqueue_script('zonar-shuffleLetters', (ZONAR_THEME_URL . '/includes/js/shuffleLetters.js'), array('jquery'), '1.0',true);
	}
	if (Zonar_AfterSetupTheme::return_thme_option('enableajax')=='st1'){
	wp_enqueue_script('zonar-ajax', (ZONAR_THEME_URL . '/includes/js/disableajx.js'), array('jquery'), '1.0',true);
	}
	else{
	wp_enqueue_script('zonar-title-replace', (ZONAR_THEME_URL . '/includes/js/title-replace.js'), array('jquery'), '1.0',true);
	}
	wp_enqueue_script( 'comment-reply' );
}
	add_action('wp_enqueue_scripts', 'zonar_enqueue_scripts');
endif;