<?php
$zonar_options = get_option('zonar');
add_theme_support( 'woocommerce' );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action('woocommerce_pagination', 'woocommerce_pagination', 10);
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
//add_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 30);
add_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 20);
//
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 31);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
add_action('woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 5);
//add_action('woocommerce_before_single_product_summary', 'woocommerce_template_single_price', 6);
add_action('woocommerce_before_single_product_summary', 'woocommerce_template_single_rating', 7);
add_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 8);


?>