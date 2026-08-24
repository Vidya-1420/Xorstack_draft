<?php
global $zonar_options;
$zonar_options = get_option('zonar');
function zonar_style() {
//home
wp_enqueue_style('zonar-main', (ZONAR_THEME_URL . '/style.css'));
wp_enqueue_style('zonar-plugins', (ZONAR_THEME_URL . '/includes/css/plugins.css'));
wp_enqueue_style('zonar-style', (ZONAR_THEME_URL . '/includes/css/style.css'));
wp_enqueue_style('zonar-color', (ZONAR_THEME_URL . '/includes/css/color.css'));
wp_enqueue_style('zonar-main-style', (ZONAR_THEME_URL . '/includes/css/zonar-main-style.css'));
if (class_exists('WooCommerce')) {
wp_enqueue_style('zonar-woocommerce', (ZONAR_THEME_URL . '/includes/css/zonar-woocommerce.css'));
}
wp_enqueue_style('js_composer_front', (ZONAR_THEME_URL . '/includes/css/js_composer.min.css'));

}
add_action('wp_enqueue_scripts', 'zonar_style');

function zonar_fonts_url() {
    $zonar_font_url = '';
    
        $zonar_font_url = add_query_arg( 'family','Mukta+Vaani:200,300,400,500,600,700,800|Playfair+Display:400,500,700|Oswald:500,700|Roboto:500&display=swap' , "//fonts.googleapis.com/css" );
    if ( 'off' !== _x( 'on', 'Mukta font: on or off', 'zonar' ) ) {
    }
    return $zonar_font_url;
}

function zonar_scripts() {
    wp_enqueue_style( 'zonar_fonts', zonar_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'zonar_scripts' );

function zonar_enqueue_custom_admin_style() {
wp_enqueue_style( 'zonar_wp_admin_css', (ZONAR_THEME_URL . '/includes/css/admin-style.css'), false, '1.0.0' );

}
add_action( 'admin_enqueue_scripts', 'zonar_enqueue_custom_admin_style' );