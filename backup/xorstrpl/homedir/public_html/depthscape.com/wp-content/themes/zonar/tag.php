<?php get_header();?>
<?php $zonar_options = get_option('zonar'); ?>

<!-- content-->    
                <div class="content" data-pagetitle="<?php if ( is_category() ) { ?><?php if(!empty($zonar_options['cat-page-title'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('cat-page-title',''));?><?php else :?><?php esc_html_e('Category','zonar');?><?php endif;?><?php } else if ( is_tag() ) { ?><?php if(!empty($zonar_options['tag-page-title'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('tag-page-title',''));?><?php else :?><?php esc_html_e('Tag','zonar');?><?php endif;?><?php } else if ( is_archive() ) { ?><?php if(!empty($zonar_options['arch-page-title'])):?><?php echo esc_attr(Zonar_AfterSetupTheme::return_thme_option('arch-page-title',''));?><?php else :?><?php esc_html_e('Archive','zonar');?><?php endif;?><?php } else { ?><?php if(!empty($zonar_options['blogtitle'])):?><?php echo esc_attr(Zonar_AfterSetupTheme::return_thme_option('blogtitle',''));?><?php else :?><?php esc_html_e('My Blog','zonar');?><?php endif;?><?php } ?>">
				
					
                    <?php if ($zonar_options['blogtyle_ani']=="st2") { ?>
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
					<?php } ?>
					
                    <!--fw-content--> 
                    <div class="fw-content fl-wrap">
                        <!-- container -->   
                        <div class="container">
						
                            <div class="col-wc_dec"></div>
						
                            <section class="scroll_sec " id="sec1">
                                <div class="container">
                                    
                                    <div class="section-title">
                                        <?php if ( is_category() ) { ?>
										<h3><?php if(!empty($zonar_options['cat-page-title'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('cat-page-title',''));?><?php else :?><?php esc_html_e('Category','zonar');?><?php endif;?></h3>
										<p><?php single_cat_title( '', true ); ?></p>
										<?php } else if ( is_tag() ) { ?>
										<h3><?php if(!empty($zonar_options['tag-page-title'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('tag-page-title',''));?><?php else :?><?php esc_html_e('Tag','zonar');?><?php endif;?></h3>
										<p><?php single_tag_title(); ?></p>
										<?php } else if ( is_archive() ) { ?>
										<h3><?php if(!empty($zonar_options['arch-page-title'])):?><?php echo esc_attr(Zonar_AfterSetupTheme::return_thme_option('arch-page-title',''));?><?php else :?><?php esc_html_e('Archive','zonar');?><?php endif;?></h3>
										<p><?php single_month_title(' '); ?></p>
										<?php } else { ?>
										<h3><?php if(!empty($zonar_options['blogtitle'])):?><?php echo esc_attr(Zonar_AfterSetupTheme::return_thme_option('blogtitle',''));?><?php else :?><?php esc_html_e('My Blog','zonar');?><?php endif;?></h3>
										<p><?php echo esc_attr(Zonar_AfterSetupTheme::return_thme_option('blog_sub_title',''));?></p>
										<?php } ?>
                                    </div>
																		
									<div class="row">
										<div class="<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>col-md-8<?php else : ?>col-md-12<?php endif;?> <?php if ($zonar_options['blogtyle']=="st2") {?>pull-right<?php } ;?>">
 
 
                                    <!-- portfolio start -->
                                    <div class="gallery-items big-pad  <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>two-column<?php else : ?>three-column<?php endif;?>  fl-wrap  ">
                                    <?php global $post, $post_id;
									$zonar_counter=1;
									?>
									<?php while ( have_posts() ) : the_post();?>
                                        <!-- gallery-item-->
                                        <div class="gallery-item">
                                            <div class="grid-item-holder hov_zoom">
											<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
											<?php if (has_post_thumbnail( $post->ID ) ):?>
											<?php $zonar_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
                                                <div class="grid-post-media fl-wrap">
                                                    <a href="<?php the_permalink();?>" class="ajax"><img  src="<?php echo esc_url($zonar_image[0]);?>"    alt="<?php the_title_attribute();?>"></a>
                                                    <div class="post-det-num">0<?php echo esc_attr($zonar_counter);?>.</div>
                                                </div>
											<?php endif;?>
                                                <div class="post-det fl-wrap">
                                                    <h3><a href="<?php the_permalink();?>" class="ajax"><?php the_title();?></a></h3>
                                                    <div class="post-header fl-wrap"> <span><?php the_time( get_option( 'date_format' ) ); ?></span>  <?php if( has_category() ) {?><?php the_category(' ') ?><?php } ;?> </div>
                                                    <?php if( wp_link_pages('echo=0') ): ?>
													<?php the_content();
													wp_link_pages( array(
													'before'      => '<div class="page-links">',
													'after'       => '</div>',
													'link_before' => '<span>',
													'link_after'  => '</span>',
													'pagelink'    => '%',
													'separator'   => '',
													) );
													?>
													<?php else : ?>
													<?php the_excerpt();?>
													<?php endif;?>
                                                    <a href="<?php the_permalink();?>" class="ajax post-link"><?php if(!empty($zonar_options['translet_opt_5'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_5',''));?><?php else: ?><?php esc_html_e('Read more','zonar');?><?php endif;?> <i class="fal fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="pr-bg"></div>
                                        </div>
                                        <!-- gallery-item end-->
									<?php 
									$zonar_counter++;
									endwhile; ?>
									<?php wp_reset_postdata();?>
                                                                  
                                    </div>
                                    <!-- portfolio end -->                                                             
                                
 
								</div>
								<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
									<div class="col-md-4 <?php if ($zonar_options['blogtyle']=="st2") {?>pull-left<?php } ;?>">
									  <!-- blog-widgets -->    
 										<div class="blog-widgets fl-wrap">
										<?php dynamic_sidebar( 'sidebar-1' ); ?>
										</div>
										<!-- blog-widgets end--> 
									</div>
								<?php endif;?>
								</div>
									                        </div>
                        <!-- container end -->
								
								 <div class="section-number"> <span>0</span>1. </div>
								 
                            </section>
                            <!--section end--> 
           
                    </div>
                    <!--fw-wrap end-->    
                    <div class="to-top-btn to-top fw-totop"><i class="fal fa-long-arrow-up"></i></div>
                </div>
                <!-- content end--> 
				<?php if (function_exists("zonar_pagination")) { ?>
                    <div class="page-scroll-nav psn_single fw-scroll_nav">
                        <!--pagination-->   
                        <div class="pagination">
                            <div class="pr-bg pr-bg-white"></div>
                            <div class="container">
                                <?php zonar_pagination($wp_query->max_num_pages);?>
                            </div>
                        </div>
                        <!--pagination end-->   
                    </div>
				<?php } ;?>	
                <div class="hero-scroll-down-notifer">
                    <div class="scroll-down-wrap ">
                        <div class="mousey">
                            <div class="scroller"></div>
                        </div>
                    </div>
                    <i class="far fa-angle-down"></i>
                </div>
                					
            </div>
<?php get_footer(); ?>	