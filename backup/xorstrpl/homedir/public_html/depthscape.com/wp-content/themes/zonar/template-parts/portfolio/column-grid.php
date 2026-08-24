<?php $zonar_options = get_option('zonar'); ?>
<?php if (has_post_thumbnail( $post->ID ) ):
$zonar_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
<?php endif;?>
<!-- content-->    
                <div class="content" data-pagetitle="<?php echo wp_trim_words(get_the_title(), 3, '..');?>">
				<?php if (( get_post_meta($post->ID,'rnr_zo_port_page_filter',true))=='yes'):?>
				<?php if(!get_post_meta(get_the_ID(), 'portfolio_category', true)):
				$zonar_portfolio_category = get_terms('portfolio_category');?>
				<?php if($zonar_portfolio_category):?>
                    <div class="fixed-bottom-panel">
                        <div class="gallery-filters-wrap">
                            <div class="gallery-filters init_hidden_filter">
                                <a href="#" class="gallery-filter  gallery-filter-active" data-filter="*"><?php if(get_post_meta($post->ID,'rnr_zo_port_page_translate_opt2',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_port_page_translate_opt2',true));?> <?php else : ?><?php esc_html_e('All projects','zonar');?><?php endif;?></a>
                                <?php  foreach($zonar_portfolio_category as $zonar_portfolio_cat):?>
                                <a href="#" class="gallery-filter" data-filter=".<?php echo esc_attr($zonar_portfolio_cat->slug);?>"><?php echo esc_attr($zonar_portfolio_cat->name);?></a>
								<?php endforeach;?>
                            </div>
                            <div class="psn_button act-filter"><i class="fal fa-sort"></i> <?php if(get_post_meta($post->ID,'rnr_zo_port_page_translate_opt1',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_port_page_translate_opt1',true));?> <?php else : ?><?php esc_html_e('FIlter ','zonar');?><?php endif;?> </div>
                        </div>
                    </div>
				<?php endif;?>
				<?php endif;?>
				<?php endif;?>
				<?php if(get_post_meta($post->ID,'rnr_wr_page_port_scrolling_ani',true)!='st2'){ ?>
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
				<?php if(get_post_meta($post->ID,'rnr_wr_page_port_header_opt',true)=='st2'){ ?>
				<!--fixed-column-wrap-->
                    <div class="fixed-column-wrap">
                        <div class="pr-bg"></div>
                        <!--fixed-column-wrap-content-->
                        <div class="fixed-column-wrap-content">
                            <!--slideshow-container-->
							<!-- speed  -->
							<?php if(get_post_meta($post->ID,'rnr_zo_page_port_block_slider_image_speed',true)):?>
								<?php $zonar_slider_speed = get_post_meta($post->ID,'rnr_zo_page_port_block_slider_image_speed',true);?>
							<?php else: ?>
								<?php $zonar_slider_speed = '1400';?>
							<?php endif;?>
							<!-- delay  -->
							<?php if(get_post_meta($post->ID,'rnr_zo_page_port_block_slider_image_delay',true)):?>
								<?php $zonar_slider_delay = get_post_meta($post->ID,'rnr_zo_page_port_block_slider_image_delay',true);?>
							<?php else: ?>
								<?php $zonar_slider_delay = '2500';?>
							<?php endif;?>
                            <div class="slideshow-container">
                                <div class="slideshow-container_wrap fl-wrap full-height">
                                    <div class="swiper-container" data-slider-speed="<?php echo esc_attr($zonar_slider_speed);?>" data-slider-delay="<?php echo esc_attr($zonar_slider_delay);?>">
                                        <div class="swiper-wrapper">
										<?php $zonar_block_images = rwmb_meta( 'rnr_zo_page_port_block_slider_image','type=image&size=' );
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
                                <h2><?php if (( get_post_meta($post->ID,'rnr_zo_page_port_header_title_opt',true))):?><?php echo  do_shortcode(get_post_meta($post->ID,'rnr_zo_page_port_header_title_opt',true)); ?><?php else: ?><?php the_title();?><?php endif;?></h2>
                                <?php if (( get_post_meta($post->ID,'rnr_zo_page_port_header_sub_title_opt',true))):?>	
                                <p><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_page_port_header_sub_title_opt',true)); ?>  </p>
								<?php endif;?>
                            </div>
                            <!--fixed-column-wrap_title end-->
                            <div class="fixed-column-dec"></div>
                            <div class="scroll-notifer"><?php if(get_post_meta($post->ID,'rnr_zo_page_port_header_translate_opt',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_page_port_header_translate_opt',true));?> <?php else : ?><?php esc_html_e('Scroll Down','zonar');?><?php endif;?>  </div>
                            <div class="folio-counter fcc_column">
                                <div class="num-album"><span></span></div>
                                <div class="all-album"></div>
                            </div>
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
                                <h2><?php if (( get_post_meta($post->ID,'rnr_zo_page_port_header_title_opt',true))):?><?php echo  do_shortcode(get_post_meta($post->ID,'rnr_zo_page_port_header_title_opt',true)); ?><?php else: ?><?php the_title();?><?php endif;?></h2>
                                <?php if (( get_post_meta($post->ID,'rnr_zo_page_port_header_sub_title_opt',true))):?>	
                                <p><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_page_port_header_sub_title_opt',true)); ?>  </p>
								<?php endif;?>
                            </div>
                            <!--fixed-column-wrap_title end-->
                            <div class="fixed-column-dec"></div>
                            <div class="fixed-column-linedec"></div>
                            <div class="scroll-notifer"><?php if(get_post_meta($post->ID,'rnr_zo_page_port_header_translate_opt',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_page_port_header_translate_opt',true));?> <?php else : ?><?php esc_html_e('Scroll Down','zonar');?><?php endif;?>  </div>
                            <div class="folio-counter fcc_column">
                                <div class="num-album"><span></span></div>
                                <div class="all-album"></div>
                            </div>
                        </div>
                        <!--fixed-column-wrap-content end-->                                     
                    </div>
                    <!--fixed-column-wrap end-->
					<?php } ;?>
					<?php if(get_post_meta($post->ID,'rnr_zo_port_pages_column',true)=='st2'){ ?>
                    <!--column-wrap--> 
                    <div class="column-wrap dark-bg">
                        <!--column-wrap-container -->   
                        <div class="column-wrap-container no-pad-cwc fl-wrap">
                            <!-- portfolio start -->
                            <div class="gallery-items min-pad    fl-wrap  " id="port-scroll">
							<?php global $post, $post_id;?>
							<?php $zonar_showpost= get_post_meta($post->ID, 'rnr_zo_port_page_item_show_opt', true);$zonar_categoryname= get_post_meta($post->ID, 'rnr_zo_port_page_cat_opt', true);
							$zonar_offset= get_post_meta($post->ID, 'rnr_zo_port_page_offset_opt', true);
							$zonar_paged=(get_query_var('paged'))?get_query_var('paged'):1;
							$zonar_loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page'=>$zonar_showpost, 'portfolio_category'=> $zonar_categoryname, 'paged'=>$zonar_paged, 'offset' => $zonar_offset ) ); ?>
							<?php while ( $zonar_loop->have_posts() ) : $zonar_loop->the_post();?>
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
                                <!-- gallery-item-->
                                <div class="gallery-item  <?php if (( get_post_meta($post->ID,'rnr_post-box-width',true))=='portfolio_item_second'):?>gallery-item-second<?php else : ?><?php endif;?> <?php echo esc_attr($zonar_class);?>">
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
                                <!-- gallery-item end-->
                            <?php endif;?>
							<?php endwhile;
							wp_reset_postdata();?>                             
                            </div>
                            <!-- portfolio end -->                            
                        </div>
                        <!--column-wrap-container end -->          
                    </div>
                    <!--column-wrap end-->
					<?php } else { ?>
					<!--column-wrap--> 
                    <div class="column-wrap ">
                        <!--column-wrap-container -->   
                        <div class="column-wrap-container  fl-wrap">
                            <div class="col-wc_dec"></div>
                            <section <?php if(get_post_meta($post->ID,'rnr_zo_port_pages_2column_title_opt',true)!='st2'){ ?>class="no-padding-top"<?php } ;?>>
                                <div class="container">
								<?php if(get_post_meta($post->ID,'rnr_zo_port_pages_2column_title_opt',true)=='st2'){ ?>
                                    <div class="section-title">
                                        <h3><?php if(get_post_meta($post->ID,'rnr_zo_port_pages_2column_title',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_port_pages_2column_title',true));?> <?php else : ?><?php esc_html_e('Lastes and future projects','zonar');?><?php endif;?></h3>
										<?php if(get_post_meta($post->ID,'rnr_zo_port_pages_2column_subtitle',true)):?>
                                        <p><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_port_pages_2column_subtitle',true));?>  </p>
										<?php endif;?>
                                    </div>
								<?php } ;?>
                                    <!-- portfolio start -->
                                    <div class="gallery-items big-pad  two-column white-anim fl-wrap" id="port-scroll">
							<?php global $post, $post_id;?>
							<?php $zonar_showpost= get_post_meta($post->ID, 'rnr_zo_port_page_item_show_opt', true);$zonar_categoryname= get_post_meta($post->ID, 'rnr_zo_port_page_cat_opt', true);
							$zonar_offset= get_post_meta($post->ID, 'rnr_zo_port_page_offset_opt', true);
							$zonar_paged=(get_query_var('paged'))?get_query_var('paged'):1;
							$zonar_loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page'=>$zonar_showpost, 'portfolio_category'=> $zonar_categoryname, 'paged'=>$zonar_paged, 'offset' => $zonar_offset ) ); ?>
							<?php while ( $zonar_loop->have_posts() ) : $zonar_loop->the_post();?>
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
                                        <!-- gallery-item-->
                                        <div class="gallery-item  <?php if (( get_post_meta($post->ID,'rnr_post-box-width',true))=='portfolio_item_second'):?>gallery-item-second<?php else : ?><?php endif;?> <?php echo esc_attr($zonar_class);?>">
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
                                        <!-- gallery-item end-->
                                      <?php endif;?>
									  <?php endwhile;
									  wp_reset_postdata();?>                               
                                    </div>
                                    <!-- portfolio end -->                            
                                </div>
								<?php if(get_post_meta($post->ID,'rnr_zo_port_pages_2column_title_opt',true)=='st2'){ ?>
                                <div class="section-number"> <span>0</span>1. </div>
								<?php } ;?>
                            </section>
                        </div>
                        <!--column-wrap-container end -->          
                    </div>
                    <!--column-wrap end--> 
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