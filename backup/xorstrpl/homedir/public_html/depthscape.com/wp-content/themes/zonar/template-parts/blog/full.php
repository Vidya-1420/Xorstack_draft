<?php $zonar_options = get_option('zonar'); ?>
<?php if (has_post_thumbnail( $post->ID ) ):
$zonar_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
<?php endif;?>
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
                    <?php if(get_post_meta($post->ID,'rnr_wr_page_blog_header_opt',true)=='st2'){ ?>
				<!--fixed-column-wrap-->
                    <div class="fixed-column-wrap">
                        <div class="pr-bg"></div>
                        <!--fixed-column-wrap-content-->
                        <div class="fixed-column-wrap-content">
                            <!--slideshow-container-->
                            <div class="slideshow-container">
                                <div class="slideshow-container_wrap fl-wrap full-height">
								<!-- speed  -->
									<?php if(get_post_meta($post->ID,'rnr_zo_page_blog_block_slider_image_speed',true)):?>
										<?php $zonar_slider_speed = get_post_meta($post->ID,'rnr_zo_page_blog_block_slider_image_speed',true);?>
									<?php else: ?>
										<?php $zonar_slider_speed = '1400';?>
									<?php endif;?>
									<!-- delay  -->
									<?php if(get_post_meta($post->ID,'rnr_zo_page_blog_block_slider_image_delay',true)):?>
										<?php $zonar_slider_delay = get_post_meta($post->ID,'rnr_zo_page_blog_block_slider_image_delay',true);?>
									<?php else: ?>
										<?php $zonar_slider_delay = '2500';?>
									<?php endif;?>
                                    <div class="swiper-container" data-slider-speed="<?php echo esc_attr($zonar_slider_speed);?>" data-slider-delay="<?php echo esc_attr($zonar_slider_delay);?>">
                                        <div class="swiper-wrapper">
										<?php $zonar_block_images = rwmb_meta( 'rnr_zo_page_blog_block_slider_image','type=image&size=' );
										foreach ( $zonar_block_images as $zonar_block_image ){ ?>
                                            <!--ms_item-->
                                            <div class="swiper-slide">
                                                <div class="ms-item_fs fl-wrap">
                                                    <div class="bg par-elem"  data-bg="<?php echo esc_url(($zonar_block_image['url']));?>"  ></div>
                                                </div>
                                            </div>
                                            <!--ms_item end-->
                                        <?php } ;?>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--slideshow-container end--> 
                            <div class="overlay"></div>
                            <div class="progress-bar-wrap bot-element">
                                <div class="progress-bar"></div>
                            </div>
                            <!--fixed-column-wrap_title-->
                            <div class="fixed-column-wrap_title first-tile_load">
                                <h2><?php if (( get_post_meta($post->ID,'rnr_zo_page_blog_header_title_opt',true))):?><?php echo  do_shortcode(get_post_meta($post->ID,'rnr_zo_page_blog_header_title_opt',true)); ?><?php else: ?><?php the_title();?><?php endif;?></h2>
                                <?php if (( get_post_meta($post->ID,'rnr_zo_page_blog_header_sub_title_opt',true))):?>	
                                <p><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_page_blog_header_sub_title_opt',true)); ?>  </p>
								<?php endif;?>
                            </div>
                            <!--fixed-column-wrap_title end-->
                            <div class="fixed-column-dec"></div>
                            <div class="scroll-notifer"><?php if(get_post_meta($post->ID,'rnr_zo_page_blog_header_translate_opt',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_page_blog_header_translate_opt',true));?> <?php else : ?><?php esc_html_e('Scroll Down','zonar');?><?php endif;?>  </div>
                            
                            <div class="fcwc-pagination fcwc-wrap"></div>
                        </div>
                        <!--fixed-column-wrap-content end-->                                     
                    </div>
                    <!--fixed-column-wrap end-->
				<?php } else { ?>
                    <!--fixed-column-wrap-->
                    <div class="fixed-column-wrap">
                        <!--fixed-column-wrap-content-->
                        <div class="fixed-column-wrap-content">
                            <div class="bg"  data-bg="<?php echo esc_url($zonar_image[0]);?>"></div>
                            <div class="overlay"></div>
                            <div class="progress-bar-wrap bot-element">
                                <div class="progress-bar"></div>
                            </div>
                            <!--fixed-column-wrap_title-->
                            <div class="fixed-column-wrap_title first-tile_load">
                                <h2><?php if (( get_post_meta($post->ID,'rnr_zo_page_blog_header_title_opt',true))):?><?php echo  do_shortcode(get_post_meta($post->ID,'rnr_zo_page_blog_header_title_opt',true)); ?><?php else: ?><?php the_title();?><?php endif;?></h2>
                                <?php if (( get_post_meta($post->ID,'rnr_zo_page_blog_header_sub_title_opt',true))):?>	
                                <p><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_page_blog_header_sub_title_opt',true)); ?>  </p>
								<?php endif;?>
                            </div>
                            <!--fixed-column-wrap_title end-->
                            <div class="fixed-column-dec"></div>
                            <div class="fixed-column-linedec"></div>
                            <div class="scroll-notifer"><?php if(get_post_meta($post->ID,'rnr_zo_page_blog_header_translate_opt',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_page_blog_header_translate_opt',true));?> <?php else : ?><?php esc_html_e('Scroll Down','zonar');?><?php endif;?>  </div>
                           
                        </div>
                        <!--fixed-column-wrap-content end-->                                     
                    </div>
                    <!--fixed-column-wrap end-->
					<?php } ;?>
                    <!--column-wrap--> 
                    <div class="column-wrap">
                        <!--column-wrap-container -->   
                        <div class="column-wrap-container fl-wrap">
                            <div class="col-wc_dec"></div>
                            <section class="scroll_sec <?php if(get_post_meta($post->ID,'rnr_zo_blog_pages_2column_title_opt',true)!='st2'){ ?>no-padding-top<?php } ;?>" id="sec1">
                                <div class="container">
                                    <?php if(get_post_meta($post->ID,'rnr_zo_blog_pages_2column_title_opt',true)=='st2'){ ?>
                                    <div class="section-title">
                                        <h3><?php if(get_post_meta($post->ID,'rnr_zo_blog_pages_2column_title',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_blog_pages_2column_title',true));?> <?php else : ?><?php esc_html_e('Lastes and future projects','zonar');?><?php endif;?></h3>
										<?php if(get_post_meta($post->ID,'rnr_zo_blog_pages_2column_subtitle',true)):?>
                                        <p><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_blog_pages_2column_subtitle',true));?>  </p>
										<?php endif;?>
                                    </div>
									<?php } ;?>
									<?php if(get_post_meta($post->ID,'rnr_zo_blog_pages_info_opt',true)=='st2'){ ?>
                                    <div class="blog-filters fl-wrap">
                                        <div class="blog-search-wrap">
										<form action="<?php echo esc_url( home_url( '/'  ) ); ?>">
                                            <input name="s" id="se" type="text" class="search" placeholder="<?php if(get_post_meta($post->ID,'rnr_zo_blog_post_meta_bar_t1',true)):?><?php echo esc_attr(get_post_meta($post->ID,'rnr_zo_blog_post_meta_bar_t1',true)); ?><?php else : ?><?php esc_html_e('Search','zonar');?><?php endif;?>.." value="" />
                                            <button><i class="fal fa-search"></i></button>
                                        </form>
                                        </div>
										<?php if(!get_post_meta(get_the_ID(), 'post_tag', true)):
										$zonar_post_tag = get_terms('post_tag');?>
										<?php if($zonar_post_tag):?>
                                        <!-- filter tag   -->
                                        <div class="tag-filter blog-btn-filter">
                                            <div class="blog-btn"><?php if(get_post_meta($post->ID,'rnr_zo_blog_post_meta_bar_t3',true)):?><?php echo esc_attr(get_post_meta($post->ID,'rnr_zo_blog_post_meta_bar_t3',true)); ?><?php else : ?><?php esc_html_e('Tags','zonar');?><?php endif;?> <i class="fa fa-tags" aria-hidden="true"></i></div>
                                            <ul>
                                                <?php  foreach($zonar_post_tag as $zonar_post_tags):?>
												<li><a href="<?php echo get_tag_link($zonar_post_tags->term_id); ?>"><?php echo esc_html($zonar_post_tags->name);?></a></li>
												<?php endforeach;?>
                                            </ul>
                                        </div>
                                        <!-- filter tag end  -->
										<?php endif;?>
										<?php endif;?>
										<?php if(!get_post_meta(get_the_ID(), 'category', true)):
										$zonar_post_category = get_terms('category');?>
										<?php if($zonar_post_category):?>
                                        <!-- filter category    -->
                                        <div class="category-filter blog-btn-filter">
                                            <div class="blog-btn"><?php if(get_post_meta($post->ID,'rnr_zo_blog_post_meta_bar_t2',true)):?><?php echo esc_attr(get_post_meta($post->ID,'rnr_zo_blog_post_meta_bar_t2',true)); ?><?php else : ?><?php esc_html_e('Categories','zonar');?><?php endif;?> <i class="fa fa-list-ul" aria-hidden="true"></i></div>
                                            <ul>
												<?php  foreach($zonar_post_category as $zonar_post_cat):?>
												<li><a href="<?php echo get_category_link($zonar_post_cat->term_id); ?>"><?php echo esc_html($zonar_post_cat->name);?></a></li>
												<?php endforeach;?>
                                            </ul>
                                        </div>
                                        <!-- filter category end  -->
										<?php endif;?>
										<?php endif;?>
                                    </div>
									<?php } ;?>
                                    <!-- post start -->
                                    <div class="gallery-items big-pad  two-column  fl-wrap  ">
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
                                <?php if(get_post_meta($post->ID,'rnr_zo_blog_pages_2column_title_opt',true)=='st2'){ ?>
                                <div class="section-number"> <span>0</span>1. </div>
								<?php } ;?>
                            </section>
                            <!--section end-->                 
                        </div>
                        <!--column-wrap-container end -->          
                    </div>
                    <!--column-wrap end-->   
					<?php if (function_exists("zonar_pagination")) { ?>
                    <div class="page-scroll-nav psn_single">
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