<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;

$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

if ( ! $short_description ) {
	return;
}

?>
<?php if(!get_post_meta(get_the_ID(), 'product_cat', true)):
$zonar_post_category = wp_get_post_terms($post->ID,'product_cat');?>
<?php if($zonar_post_category):?>
<div class="pr-tags">
<span><?php esc_html_e('Categories : ', 'zonar');?></span>
<ul>
<?php  foreach($zonar_post_category as $zonar_post_cat):?>
<li><a href="<?php echo get_category_link($zonar_post_cat->term_id); ?>"><?php echo esc_html($zonar_post_cat->name);?> </a></li>
<?php endforeach;?>
</ul>
</div>
<?php endif;?>
<?php endif;?>
<div class="clearfix"></div>
<div class="woocommerce-product-details__short-description">
	<?php echo $short_description; // WPCS: XSS ok. ?>
</div>
<div class="clearfix"></div>
<div class="section-separator sp2 fl-wrap"><span></span></div>
<div class="clearfix"></div>
<div class="shop-item-footer fl-wrap">
