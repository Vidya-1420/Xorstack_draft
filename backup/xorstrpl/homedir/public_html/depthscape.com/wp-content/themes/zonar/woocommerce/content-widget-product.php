<?php $restabook_options = get_option('restabook'); ?>	
<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}

?>
<li>
<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>
<div class="recent-post-img"><a href="<?php echo esc_url( $product->get_permalink() ); ?>"><?php echo $product->get_image(); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a></div>
<div class="recent-post-content">
    <h4><a href="<?php echo esc_url( $product->get_permalink() ); ?>"><?php echo wp_kses_post( $product->get_name() ); ?></a></h4>
	<div class="clear"></div>
    <div class="recent-post-opt">
		<?php if ($restabook_options['catalog_mode_price']!="st2") { ?>
        <span class="post-date"><?php if(!empty($restabook_options['translet_opt_3'])):?><?php echo esc_html(Restabook_AfterSetupTheme::return_thme_option('translet_opt_3',''));?><?php else: ?><?php esc_html_e('Price','restabook');?><?php endif;?>: <strong><?php echo $product->get_price_html(); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong></span> 
		<?php } else { ?>
		<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
		<?php } ;?>
		<?php
		if(!empty($restabook_options['translet_opt_8'])):
		$restabook_comment_text= esc_html(Restabook_AfterSetupTheme::return_thme_option('translet_opt_8',''));;
		else: 
		$restabook_comment_text='Review';
		endif;
		if(!empty($restabook_options['translet_opt_9'])):
		$restabook_comment_text2= esc_html(Restabook_AfterSetupTheme::return_thme_option('translet_opt_9',''));;
		else: 
		$restabook_comment_text2='Reviews';
		endif;
		?>
		<?php if ( comments_open() ) : ?>
		<?php if ( ! empty( $show_rating ) ) : ?>
        <a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="post-comments"><?php echo esc_attr(comments_number( '0 '.$restabook_comment_text.'', '1 '.$restabook_comment_text.'', '% '.$restabook_comment_text2.'' )); ?></a> 
		<?php endif; ?>
		<?php endif; ?>
		
    </div>
 </div>

	<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>

</li>
