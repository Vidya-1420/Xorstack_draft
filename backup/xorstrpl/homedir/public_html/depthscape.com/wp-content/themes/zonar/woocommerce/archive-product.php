<?php $zonar_options = get_option('zonar'); ?>
<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
 <!-- content-->    
                <div class="content" data-pagetitle="<?php woocommerce_page_title(); ?>">
                    
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
							<?php $zonar_shop_back = Zonar_AfterSetupTheme::return_thme_option('shopheaderimg','url');?>
							<?php if ( is_product_category() ){
							global $wp_query;
							$zonar_cat = $wp_query->get_queried_object();
							$zonar_thumbnail_id = get_term_meta( $zonar_cat->term_id, 'thumbnail_id', true );
							$zonar_image = wp_get_attachment_url( $zonar_thumbnail_id );
							if ( $zonar_image ) {
							echo '<div class="bg"  data-bg="'.$zonar_image.'" ></div>';
							}
							else {
							echo '<div class="bg "  data-bg="'.$zonar_shop_back.'" ></div>';
							}
							} else { ?>
							<div class="bg "  data-bg="<?php echo esc_url($zonar_shop_back);?>" ></div>
							<?php } ;?>
                            
                            <div class="overlay"></div>
                            <div class="progress-bar-wrap bot-element">
                                <div class="progress-bar"></div>
                            </div>
                            <!--fixed-column-wrap_title-->
                            <div class="fixed-column-wrap_title first-tile_load">
							<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
							 <h2><?php woocommerce_page_title(); ?></h2>
							<?php endif; ?>
                                <?php if ( is_product_category() ){ ?>
									<?php
									/**
									 * Hook: woocommerce_archive_description.
									 *
									 * @hooked woocommerce_taxonomy_archive_description - 10
									 * @hooked woocommerce_product_archive_description - 10
									 */
									do_action( 'woocommerce_archive_description' );
									?> 
									<?php } else {?>
									<?php if(!empty($zonar_options['shopsubtitle'])):?>
									<p> 
									<?php echo esc_attr(Zonar_AfterSetupTheme::return_thme_option('shopsubtitle',''));?>
									</p>
									<?php endif;?>
									<?php } ;?>
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
                            <section class="scroll_sec" id="sec1">
                                <div class="container">
                                    <?php if ( woocommerce_product_loop() ) {?>
                                    <div class="blog-filters fl-wrap">
                                        <div class="blog-search-wrap">
										<form action="<?php echo esc_url( home_url( '/'  ) ); ?>">
                                            <input name="s" id="se" type="text" class="search" placeholder="<?php if(!empty($zonar_options['translet_opt_7'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_7',''));?><?php else: ?><?php esc_html_e('Search','zonar');?><?php endif;?>.." value="" />
                                            <button><i class="fal fa-search"></i></button>
											<input type="hidden" name="post_type" value="product" />
										</form>
                                        </div>
                                        <!-- filter tag   -->
                                        <?php if(!get_post_meta(get_the_ID(), 'product_cat', true)):
										$zonar_post_category = get_terms('product_cat');?>
										<?php if($zonar_post_category):?>
                                        <!-- filter category    -->
                                        <div class="category-filter blog-btn-filter">
                                            <div class="blog-btn"><?php esc_html_e('Categories','zonar');?> <i class="fa fa-list-ul" aria-hidden="true"></i></div>
                                            <ul>
												<?php  foreach($zonar_post_category as $zonar_post_cat):?>
												<li><a href="<?php echo get_category_link($zonar_post_cat->term_id); ?>"><?php echo esc_html($zonar_post_cat->name);?></a></li>
												<?php endforeach;?>
                                            </ul>
                                        </div>
                                        <!-- filter category end  -->
										<?php endif;?>
										<?php endif;?>
                                            <?php
												if ( woocommerce_product_loop() ) {

												/**
												 * Hook: woocommerce_before_shop_loop.
												 *
												 * @hooked woocommerce_output_all_notices - 10
												 * @hooked woocommerce_result_count - 20
												 * @hooked woocommerce_catalog_ordering - 30
												 */
												do_action( 'woocommerce_before_shop_loop' );
												}
												?>
                                       
                                        <!-- filter tag end  -->
                                        
                                    </div>
									<?php } ;?>
									<?php
										if ( woocommerce_product_loop() ) {
										woocommerce_product_loop_start();

										if ( wc_get_loop_prop( 'total' ) ) {
											while ( have_posts() ) {
												the_post();

												/**
												 * Hook: woocommerce_shop_loop.
												 */
												do_action( 'woocommerce_shop_loop' );

												wc_get_template_part( 'content', 'product' );
											}
										}

										woocommerce_product_loop_end();
										?>
										
										<?php
									} else {
										/**
										 * Hook: woocommerce_no_products_found.
										 *
										 * @hooked wc_no_products_found - 10
										 */
										do_action( 'woocommerce_no_products_found' );
									}

									/**
									 * Hook: woocommerce_after_main_content.
									 *
									 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
									 */
									do_action( 'woocommerce_after_main_content' );

									/**
									 * Hook: woocommerce_sidebar.
									 *
									 * @hooked woocommerce_get_sidebar - 10
									 */
									do_action( 'woocommerce_sidebar' );

									?>
                                                                                                 
                                </div>
                                
                            </section>
                            <!--section end-->                 
                        </div>
                        <!--column-wrap-container end -->          
                    </div>
                    <!--column-wrap end-->   

						<div class="page-scroll-nav psn_single">
                        <!--pagination-->   
                        <div class="pagination">
                            <div class="pr-bg pr-bg-white"></div>
                            <div class="container">
										<?php
										if ( woocommerce_product_loop() ) {
										/**
										 * Hook: woocommerce_after_shop_loop.
										 *
										 * @hooked woocommerce_pagination - 10
										 */
										do_action( 'woocommerce_after_shop_loop' );
										}
										?>
                            </div>
                        </div>
                        <!--pagination end-->   
                    </div>					
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


	
