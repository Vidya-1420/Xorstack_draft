<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="post-related fl-wrap">

		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

		if ( $heading ) :
			?>
			<div class="pr-subtitle"> <?php echo esc_html( $heading ); ?></div>
			<div class="section-separator sp2 fl-wrap"><span></span></div>
		<?php endif; ?>
		<div class="fl-wrap zo-margin-bottom-20"></div>
		<div class="row">
		<?php woocommerce_product_loop_start(); ?>

			<?php foreach ( $related_products as $related_product ) : ?>

					<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
					?>
					<div class="item-related col-md-4">
					<a href="<?php the_permalink();?>">
                    <?php 

						/**
						 * Hook: woocommerce_before_shop_loop_item_title.
						 *
						 * @hooked woocommerce_show_product_loop_sale_flash - 10
						 * @hooked woocommerce_template_loop_product_thumbnail - 10
						 */
						do_action( 'woocommerce_before_shop_loop_item_title' );
						?>
					</a>
                    <h3><a href="<?php the_permalink();?>"><?php the_title()?></a></h3>
                    <span class="post-date post-price"><?php 
					/**
					 * Hook: woocommerce_after_shop_loop_item_title.
					 *
					 * @hooked woocommerce_template_loop_rating - 5
					 * @hooked woocommerce_template_loop_price - 10
					 */
					do_action( 'woocommerce_after_shop_loop_item_title' );
					?></span>
                    </div>

			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>
</div>
<div class="clearfix"></div>
	</section>
	<?php
endif;

wp_reset_postdata();
