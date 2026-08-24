<?php $zonar_options = get_option('zonar'); ?>
<?php get_header();?>
<!-- content-->    
                <div class="content full-height hor-content_padd" data-pagetitle="<?php single_cat_title( '', true ); ?>">
                    <div class="fixed-bottom-panel fs-fix-bom-panel hfw">
					
                        <div class="gallery-filters-wrap">
                           
                        </div>
					
                    </div>
                    <!--horizontal-grid   -->   
                    <div class="horizontal-grid-wrap  fl-wrap full-height ">
                        <!-- portfolio start -->
                        <div   id="portfolio_horizontal_container" class="two-ver-columns lightgallery">
							<?php global $loop; 
							$args = array_merge( $wp_query->query, array( 'post_type' => 'portfolio', 'posts_per_page'=>-1, ) );
							query_posts( $args );
							?>	
						    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
							<?php $zonar_portfolio_category = wp_get_post_terms($post->ID,'portfolio_category');?>
							<?php 
									$zonar_class = ""; 
									$zonar_categories = ""; 
									foreach ($zonar_portfolio_category as $zonar_item) {
									$zonar_class.=esc_attr($zonar_item->slug . ' ');
									$zonar_categories.='<a href="'.get_category_link($zonar_item->term_id).'">';
									$zonar_categories.=esc_attr($zonar_item->name . '  ');
									$zonar_categories.='</a>';
									}?>
								<?php if (has_post_thumbnail( $post->ID ) ):
								$zonar_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
                            <!-- portfolio_item-->
                            <div class="portfolio_item <?php echo (get_post_meta($post->ID,'rnr_post-box-width',true)) ?> <?php echo esc_attr($zonar_class);?>">
                                <div class="grid-item-holder hov_zoom">
                                    <img  src="<?php echo esc_url($zonar_image[0]);?>"    alt="<?php the_title_attribute();?>">
                                    <div class="grid-det">
                                        
										<?php if(get_post_meta($post->ID,'rnr_post-popup-option',true)=='st2'){ ?> 
										<?php if (( get_post_meta($post->ID,'rnr_post_popup_video',true))):?>
										<a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_post_popup_video',true)); ?>" class="grid-media-zoom   image-popup"><i class="far fa-play"></i></a>
										<?php endif;?>
										<?php } else { ?>
										<a href="<?php echo esc_url($zonar_image[0]);?>" class="grid-media-zoom   image-popup"><i class="far fa-search"></i></a>
										<?php } ;?>
                                        <div class="grid-det_category"><?php echo balanceTags($zonar_categories);?></div>
                                        <div class="grid-det-item">
                                            <a href="<?php the_permalink();?>" class="ajax grid-det_link"><?php the_title();?><i class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- portfolio_item end-->
                            <?php endif;?>
							<?php  endwhile; endif; wp_reset_postdata(); ?>                                             
                        </div>
                        <!-- portfolio end -->
                    </div>
                    <!--horizontal-grid end -->
                    <div class="hero-scroll-down-notifer">
                        <div class="scroll-down-wrap ">
                            <div class="mousey">
                                <div class="scroller"></div>
                            </div>
                        </div>
                        <i class="far fa-angle-down"></i>
                    </div>
                    <div class="fs-folio-counter hor-scroll-counter">
                        <div class="folio-counter">
                            <div class="num-album"><span></span></div>
                            <div class="all-album"></div>
                        </div>
                    </div>
                    <div class="body-color-bg"></div>
                    <div class="fs-pg-idicator_wrap hor-scroll-idicator color-bg">
                        <div class="progress-indicator">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="-1 -1 44 44">
                                <circle cx="16" cy="16" r="15.9155"
                                    class="progress-bar__background" />
                                <circle cx="16" cy="16" r="15.9155"
                                    class="progress-bar__progress 
                                    js-progress-bar" />
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- content end--> 
<?php get_footer();?>