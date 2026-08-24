<?php
add_action( 'wp_enqueue_scripts', 'zonar_add_stylesheet' );
function zonar_add_stylesheet() {
    wp_enqueue_style( 'zonar-child-style', get_stylesheet_directory_uri() . '/style.css', false, '1.0', 'all' );
}
?>