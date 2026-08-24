<?php $zonar_options = get_option('zonar'); ?>
<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;


if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<!-- content-->    
                <div class="content" data-pagetitle="<?php the_title();?>">
                    <div class="page-scroll-nav psn_single">
                        <!--content-nav_holder-->            
                        <div class="content-nav_holder">
                            <div class="content-nav">
                                <ul>
                                    <li>
											<?php $zonar_previous_post = get_previous_post();
                                            $zonar_url = is_object( $zonar_previous_post ) ? get_permalink( $zonar_previous_post->ID ) : '';
                                            $zonar_title = is_object( $zonar_previous_post ) ? get_the_title( $zonar_previous_post->ID ) : '';
											if ($zonar_previous_post) { 
											$zonar_image_nav = wp_get_attachment_image_src( get_post_thumbnail_id( $zonar_previous_post->ID ), 'zonar_portfolio_image' );
											}
											?>
											<?php  if ($zonar_previous_post) { ?>
                                                    <a href="<?php echo esc_url( $zonar_url ) ?>" class="ln ajax"><i class="fal fa-long-arrow-left"></i><span><?php if(!empty($zonar_options['translet_opt_18'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_18',''));?> - <?php else: ?><?php esc_html_e('Prev - ','zonar');?><?php endif;?><?php echo esc_html( $zonar_title ) ?></span></a>
                                                    <div class="content-nav-media">
                                                        <div class="bg"  data-bg="<?php echo esc_url($zonar_image_nav[0]);?>"></div>
                                                    </div>
											<?php } else { ?>
											
											<a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class="ln ajax"><i class="fal fa-long-arrow-left"></i><span><?php
											/**
											 * Filter "Return To Shop" text.
											 *
											 * @since 4.6.0
											 * @param string $default_text Default text.
											 */
											echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to shop', 'woocommerce' ) ) );
										?></span></a>
											
                                                    <div class="content-nav-media">
                                                        <div class="bg"  data-bg="<?php echo esc_url($zonar_image_nav[0]);?>"></div>
                                                    </div>
											<?php } ;?>
                                                </li>
                                                <li>
											<?php $zonar_next_post = get_next_post();
                                            $zonar_url = is_object( $zonar_next_post ) ? get_permalink( $zonar_next_post->ID ) : '';
                                            $zonar_title = is_object( $zonar_next_post ) ? get_the_title( $zonar_next_post->ID ) : ''; 
											if ($zonar_next_post) {
											$zonar_image_nav = wp_get_attachment_image_src( get_post_thumbnail_id( $zonar_next_post->ID ), 'zonar_portfolio_image' );
											}
											?>
											<?php if ($zonar_next_post) { ?>
                                                    <a href="<?php echo esc_url( $zonar_url ) ?>" class="rn ajax"><span ><?php if(!empty($zonar_options['translet_opt_20'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_20',''));?> - <?php else: ?><?php esc_html_e('Next - ','zonar');?><?php endif;?><?php echo esc_html( $zonar_title ) ?></span> <i class="fal fa-long-arrow-right"></i></a>
                                                    <div class="content-nav-media">
                                                        <div class="bg"  data-bg="<?php echo esc_url($zonar_image_nav[0]);?>"></div>
                                                    </div>
											<?php } else { ?>
											
											<a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class="rn ajax"><span ><?php
											/**
											 * Filter "Return To Shop" text.
											 *
											 * @since 4.6.0
											 * @param string $default_text Default text.
											 */
											echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to shop', 'woocommerce' ) ) );
										?></span> <i class="fal fa-long-arrow-right"></i></a>
											
                                                    <div class="content-nav-media">
                                                        <div class="bg"  data-bg="<?php echo esc_url($zonar_image_nav[0]);?>"></div>
                                                    </div>
											<?php } ;?>
                                                </li>
                                </ul>
                            </div>
                        </div>
                        <!--content-nav_holder end -->   
                    </div>
                    <!-- hero-section-dec-->                  
                    <div class="hero-section-dec color-bg">
                        <div class="progress-indicator">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="-1 -1 34 34">
                                <circle cx="16" cy="16" r="15.9155"
                                    class="progress-bar__background" />
                                <circle cx="16" cy="16" r="15.9155"
                                    class="progress-bar__progress 
                                    js-progress-bar" />
                            </svg>
                        </div>
                    </div>
                    <!-- hero-section-dec end--> 
                    <!--fixed-column-wrap-->
                    <div class="fixed-column-wrap">
                        <div class="pr-bg"></div>
                        <!--fixed-column-wrap-content-->
                        <div class="fixed-column-wrap-content">
						<?php 
						$zonar_shop_back = Zonar_AfterSetupTheme::return_thme_option('shopheaderimgdt','url');?>
						<?php $zonar_back_images = rwmb_meta( 'rnr_shop_column_grid_details_sidebar_image','type=image&size=' ); ?>
						<?php if ( ! empty( $zonar_back_images ) ) { ?>
						<?php foreach ( $zonar_back_images as $zonar_back_image ){ ?>			
						<div class="bg"  data-bg="<?php echo esc_url(($zonar_back_image['url']));?>" ></div>
						<?php } ;?>
						<?php } else { ?>
						<div class="bg"  data-bg="<?php echo esc_url($zonar_shop_back);?>"></div>
						<?php } ;?>
                         
                            <div class="overlay"></div>
                            <div class="progress-bar-wrap bot-element">
                                <div class="progress-bar"></div>
                            </div>
                            <!--fixed-column-wrap_title-->
                            <div class="fixed-column-wrap_title first-tile_load">
                                <h2>
								<?php if (( get_post_meta($post->ID,'rnr_rs_pro_dt_title',true))):?>
								<?php echo esc_html(get_post_meta($post->ID,'rnr_rs_pro_dt_title',true)); ?>
								<?php else : ?>
									<?php if(!empty($zonar_options['shoptitledt'])):?>
										<?php echo esc_attr(Zonar_AfterSetupTheme::return_thme_option('shoptitledt',''));?>
									<?php else :?>
										<?php esc_html_e('Our Shop','zonar');?>
									<?php endif;?>
								<?php endif;?>
								</h2>
								<?php if (( get_post_meta($post->ID,'rnr_rs_pro_dt_sub_title',true))):?>
								<p><?php echo esc_html(get_post_meta($post->ID,'rnr_rs_pro_dt_sub_title',true)); ?></p>
								<?php else : ?>
								<p><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('shopsubtitledt',''));?></p>
								<?php endif;?>
                               
                            </div>
                            <!--fixed-column-wrap_title end-->
                            <div class="fixed-column-dec"></div>
                            <div class="fixed-column-linedec"></div>
                            <div class="scroll-notifer"><?php if(!empty($zonar_options['translet_opt_3'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_3',''));?><?php else: ?><?php esc_html_e('Scroll Down','zonar');?><?php endif;?>  </div>
                        </div>
                        <!--fixed-column-wrap-content end-->                                     
                    </div>
                    <!--fixed-column-wrap end-->
                    <!--column-wrap--> 
                    <div class="column-wrap">
                        <!--column-wrap-container -->   
                        <div class="column-wrap-container fl-wrap">
                            <div class="col-wc_dec"></div>
                            <section <?php wc_product_class( 'scroll_sec', $product ); ?> id="sec1">
                                <div class="container">
								<?php
								/**
								 * Hook: woocommerce_before_single_product.
								 *
								 * @hooked woocommerce_output_all_notices - 10
								 */
								do_action( 'woocommerce_before_single_product' );
								?>
                                    
                                    
                                        <?php
										/**
										 * Hook: woocommerce_before_single_product_summary.
										 *
										 * @hooked woocommerce_show_product_sale_flash - 10
										 * @hooked woocommerce_show_product_images - 20
										 */
										do_action( 'woocommerce_before_single_product_summary' );
										?>
                                                                      
                                    <div class="fl-wrap text-block">
                                        
                                        <?php
											/**
											 * Hook: woocommerce_single_product_summary.
											 *
											 * @hooked woocommerce_template_single_title - 5
											 * @hooked woocommerce_template_single_rating - 10
											 * @hooked woocommerce_template_single_price - 10
											 * @hooked woocommerce_template_single_excerpt - 20
											 * @hooked woocommerce_template_single_add_to_cart - 30
											 * @hooked woocommerce_template_single_meta - 40
											 * @hooked woocommerce_template_single_sharing - 50
											 * @hooked WC_Structured_Data::generate_product_data() - 60
											 */
											do_action( 'woocommerce_single_product_summary' );
											?>
											
									</div>
											 <div class="clearfix"></div>
											 <?php
												/**
												 * Hook: woocommerce_after_single_product_summary.
												 *
												 * @hooked woocommerce_output_product_data_tabs - 10
												 * @hooked woocommerce_upsell_display - 15
												 * @hooked woocommerce_output_related_products - 20
												 */
												do_action( 'woocommerce_after_single_product_summary' );
												?>
                                    </div>
                                     
                                </div>
                                <div class="section-number"> <span>0</span>1. </div>
                            </section>
                            <!--section end-->                 
                        </div>
                        <!--column-wrap-container end -->          
                    </div>
                    <!--column-wrap end-->    
                    <div class="to-top-btn to-top"><i class="fal fa-long-arrow-up"></i></div>
                </div>
                <!-- content end--> 
                <div class="hero-scroll-down-notifer">
                    <div class="scroll-down-wrap ">
                        <div class="mousey">
                            <div class="scroller"></div>
                        </div>
                    </div>
                    <i class="far fa-angle-down"></i>
                </div>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
