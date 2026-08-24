<?php $zonar_options = get_option('zonar'); ?>
<!-- content-->    
                <div class="content" data-pagetitle="<?php the_title();?>">
				
					<?php if(get_post_meta($post->ID,'rnr_wr_page_blog_scrolling_ani',true)!='st2'){ ?>
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
					<?php } ;?>
                    <!--fw-content--> 
                    <div class="fw-content fl-wrap">
                        <!-- container -->   
                        <div class="container">
						<?php if(get_post_meta($post->ID,'rnr_zo_blog_pages_2column_title_opt',true)=='st2'){ ?>
                            <div class="col-wc_dec"></div>
						<?php } ;?>
                            <section class="scroll_sec " id="sec1">
                                <div class="container">
                                    <?php if(get_post_meta($post->ID,'rnr_zo_blog_pages_2column_title_opt',true)=='st2'){ ?>
                                    <div class="section-title">
                                        <h3><?php if(get_post_meta($post->ID,'rnr_zo_blog_pages_2column_title',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_blog_pages_2column_title',true));?> <?php else : ?><?php esc_html_e('Lastes and future projects','zonar');?><?php endif;?></h3>
										<?php if(get_post_meta($post->ID,'rnr_zo_blog_pages_2column_subtitle',true)):?>
                                        <p><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_blog_pages_2column_subtitle',true));?>  </p>
										<?php endif;?>
                                    </div>
									<?php } ;?>									
									<div class="row">
										<div class="<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>col-md-8 pull-right<?php else : ?>col-md-12<?php endif;?>">
 
 
                                    <!-- portfolio start -->
                                    <div class="gallery-items big-pad  <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>two-column<?php else : ?>three-column<?php endif;?>  fl-wrap  ">
                                        <?php
									global $post, $post_id;;
									$zonar_showpost= get_post_meta($post->ID, 'rnr_blog-post-show', true);$zonar_categoryname=get_post_meta($post->ID, 'rnr_blog-post-cat', true);$zonar_paged=(get_query_var('paged'))?get_query_var('paged'):1;
									$zonar_loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page'=>$zonar_showpost, 'category_name'=> $zonar_categoryname, 'paged'=>$zonar_paged ) ); ?>
									<?php $zonar_counter = 1;?>
									<?php while ( $zonar_loop->have_posts() ) : $zonar_loop->the_post();?>
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
									<?php $zonar_counter++;?>
                                    <?php endwhile; ?>
									<?php wp_reset_postdata();?> 
                                                                  
                                    </div>
                                    <!-- portfolio end -->                                                             
                                
 
								</div>
								<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
									<div class="col-md-4 pull-left">
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
								<?php if(get_post_meta($post->ID,'rnr_zo_blog_pages_2column_title_opt',true)=='st2'){ ?>
								 <div class="section-number"> <span>0</span>1. </div>
								 <?php } ;?>
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
                                <?php zonar_pagination($zonar_loop->max_num_pages);?>
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