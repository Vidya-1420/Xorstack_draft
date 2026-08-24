<?php $zonar_options = get_option('zonar'); ?>
<?php get_header();?>
<?php 
global $zonar_image;
if (has_post_thumbnail( $post->ID ) ):
$zonar_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
<?php endif;?>		 
<!-- content-->
<?php if(get_post_meta($post->ID,'rnr_wr_page_header_opt',true)=='st3'){ ?>
 <?php get_template_part('template-parts/page/default');?>
<?php } else { ?>    
                <div class="content"  data-pagetitle="<?php echo wp_trim_words(get_the_title(), 3, '..');?>">
				<?php if(get_post_meta($post->ID,'rnr_wr_nav_sc_opt',true)=='st2'){ ?>
                    <div class="page-scroll-nav">
                        <nav class="scroll-init page-scroll-nav_wrap">
                            <ul class="no-list-style init_hidden_filter">
							<?php
							global $zonar_scroll_navs;
							$zonar_scroll_nav = rwmb_meta( 'rnr_po_pu_scroll_nav' );
							$zonar_counter=1;
							$zonar_count = count((array)$zonar_scroll_navs);
							if ( ! empty( $zonar_scroll_nav ) ) {
							foreach ( $zonar_scroll_nav as $zonar_scroll_navs ) { ;?>
							<?php $zonar_menu_name = isset( $zonar_scroll_navs['po_pu_opt_nav_n'] ) ? $zonar_scroll_navs['po_pu_opt_nav_n'] : ''; ?>
							<?php $zonar_scroll_id = isset( $zonar_scroll_navs['po_pu_opt_nav_i'] ) ? $zonar_scroll_navs['po_pu_opt_nav_i'] : ''; ?>
							<?php if ( !empty( $zonar_menu_name ) ) { ?>
							<?php if ( !empty( $zonar_scroll_id ) ) { ?>
                                <li><a class="scroll-link fbgs <?php if ($zonar_counter == 1) : ?> act-sec<?php else : ?><?php endif;?>" href="<?php echo esc_attr($zonar_scroll_id);?>" data-bgtext="0<?php echo esc_attr($zonar_counter);?>"><span><?php echo esc_html($zonar_menu_name);?></span></a></li>
							<?php } ;?>
                            <?php } ;?>
							<?php $zonar_counter++;?>
                            <?php } } ;?>
                            </ul>
                            <div class="psn_button act-filter"><i class="fal fa-sort"></i> <?php if(get_post_meta($post->ID,'rnr_zo_page_nav_filtert_opt',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_page_nav_filtert_opt',true));?> <?php else : ?><?php esc_html_e('FIlter ','zonar');?><?php endif;?></div>
                        </nav>
                    </div>
				<?php } ;?>
				<?php if(get_post_meta($post->ID,'rnr_wr_pagetype_scrolling_ani',true)!='st2'){ ?>
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
					<?php if(get_post_meta($post->ID,'rnr_wr_page_header_opt',true)=='st2'){ ?>					
                    <!--fixed-column-wrap-->
                    <div class="fixed-column-wrap">
                        <div class="pr-bg"></div>
                        <!--fixed-column-wrap-content-->
                        <div class="fixed-column-wrap-content">
                            <!--slideshow-container-->
							<!-- speed  -->
							<?php if(get_post_meta($post->ID,'rnr_zo_page_block_slider_image_speed',true)):?>
								<?php $zonar_slider_speed = get_post_meta($post->ID,'rnr_zo_page_block_slider_image_speed',true);?>
							<?php else: ?>
								<?php $zonar_slider_speed = '1400';?>
							<?php endif;?>
							<!-- delay  -->
							<?php if(get_post_meta($post->ID,'rnr_zo_page_block_slider_image_delay',true)):?>
								<?php $zonar_slider_delay = get_post_meta($post->ID,'rnr_zo_page_block_slider_image_delay',true);?>
							<?php else: ?>
								<?php $zonar_slider_delay = '2500';?>
							<?php endif;?>
                            <div class="slideshow-container">
                                <div class="slideshow-container_wrap fl-wrap full-height">
                                    <div class="swiper-container" data-slider-speed="<?php echo esc_attr($zonar_slider_speed);?>" data-slider-delay="<?php echo esc_attr($zonar_slider_delay);?>">
                                        <div class="swiper-wrapper">
										<?php $zonar_block_images = rwmb_meta( 'rnr_zo_page_block_slider_image','type=image&size=' );
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
                                <h2><?php if (( get_post_meta($post->ID,'rnr_zo_page_header_title_opt',true))):?><?php echo  do_shortcode(get_post_meta($post->ID,'rnr_zo_page_header_title_opt',true)); ?><?php else: ?><?php the_title();?><?php endif;?></h2>
                                <?php if (( get_post_meta($post->ID,'rnr_zo_page_header_sub_title_opt',true))):?>	
                                <p><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_page_header_sub_title_opt',true)); ?>  </p>
								<?php endif;?>
                            </div>
                            <!--fixed-column-wrap_title end-->
                            <div class="fixed-column-dec"></div>
                            <div class="scroll-notifer"><?php if(get_post_meta($post->ID,'rnr_zo_page_header_translate_opt',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_page_header_translate_opt',true));?> <?php else : ?><?php esc_html_e('Scroll Down','zonar');?><?php endif;?>  </div>
							<?php if(get_post_meta($post->ID,'rnr_wr_nav_sc_opt',true)=='st2'){ ?>
                            <div class="section-counter">
                                <div class="sc_current"><span>01</span></div>
                                <div class="sc_total"></div>
                            </div>
                            <div class="fcwc-pagination fcwc-wrap"></div>
							<?php } ;?>
                        </div>
                        <!--fixed-column-wrap-content end-->                                     
                    </div>
                    <!--fixed-column-wrap end-->
					<?php } else if(get_post_meta($post->ID,'rnr_wr_page_header_opt',true)=='st4'){ ?>
					<!--fixed-column-wrap-->
                    <div class="fixed-column-wrap">
                        <div class="pr-bg"></div>
                        <!--fixed-column-wrap-content-->
                        <div class="fixed-column-wrap-content if-video-container">
                            
							<div class="video-holder-wrap">
							<div class="media-container">
							<div class="video-container">
							<?php if (( get_post_meta($post->ID,'rnr_zo_page_header_video_opt',true))):?>
                            <video playsinline autoplay  loop muted  class="bgvid" poster="<?php echo esc_url($zonar_image[0]);?>">
                                <source src="<?php echo esc_url(get_post_meta($post->ID,'rnr_zo_page_header_video_opt',true)); ?>" type="video/mp4">
                            </video>
							<?php endif;?>
						   </div>
						   </div>
                        </div>
                            <div class="overlay"></div>
                            <div class="progress-bar-wrap bot-element">
                                <div class="progress-bar"></div>
                            </div>
                            <!--fixed-column-wrap_title-->
                            <div class="fixed-column-wrap_title first-tile_load">
                                <h2><?php if (( get_post_meta($post->ID,'rnr_zo_page_header_title_opt',true))):?><?php echo  do_shortcode(get_post_meta($post->ID,'rnr_zo_page_header_title_opt',true)); ?><?php else: ?><?php the_title();?><?php endif;?></h2>
                                <?php if (( get_post_meta($post->ID,'rnr_zo_page_header_sub_title_opt',true))):?>	
                                <p><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_page_header_sub_title_opt',true)); ?>  </p>
								<?php endif;?>
                            </div>
                            <!--fixed-column-wrap_title end-->
                            <div class="fixed-column-dec"></div>
                            <div class="fixed-column-linedec"></div>
                            <div class="scroll-notifer"><?php if(get_post_meta($post->ID,'rnr_zo_page_header_translate_opt',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_page_header_translate_opt',true));?> <?php else : ?><?php esc_html_e('Scroll Down','zonar');?><?php endif;?>  </div>
                        
						</div>
                        <!--fixed-column-wrap-content end-->                                     
                    </div>
                    <!--fixed-column-wrap end-->
					<?php } else { ?>
					<!--fixed-column-wrap-->
                    <div class="fixed-column-wrap">
                        <div class="pr-bg"></div>
                        <!--fixed-column-wrap-content-->
                        <div class="fixed-column-wrap-content">
                            <div class="bg"  data-bg="<?php echo esc_url($zonar_image[0]);?>"></div>
                            <div class="overlay"></div>
                            <div class="progress-bar-wrap bot-element">
                                <div class="progress-bar"></div>
                            </div>
                            <!--fixed-column-wrap_title-->
                            <div class="fixed-column-wrap_title first-tile_load">
                                <h2><?php if (( get_post_meta($post->ID,'rnr_zo_page_header_title_opt',true))):?><?php echo  do_shortcode(get_post_meta($post->ID,'rnr_zo_page_header_title_opt',true)); ?><?php else: ?><?php the_title();?><?php endif;?></h2>
                                <?php if (( get_post_meta($post->ID,'rnr_zo_page_header_sub_title_opt',true))):?>	
                                <p><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_page_header_sub_title_opt',true)); ?>  </p>
								<?php endif;?>
                            </div>
                            <!--fixed-column-wrap_title end-->
                            <div class="fixed-column-dec"></div>
                            <div class="fixed-column-linedec"></div>
                            <div class="scroll-notifer"><?php if(get_post_meta($post->ID,'rnr_zo_page_header_translate_opt',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_page_header_translate_opt',true));?> <?php else : ?><?php esc_html_e('Scroll Down','zonar');?><?php endif;?>  </div>
                        </div>
                        <!--fixed-column-wrap-content end-->                                     
                    </div>
                    <!--fixed-column-wrap end-->
					<?php } ;?>
                    <!--column-wrap--> 
                    <div class="column-wrap">
                        <!--column-wrap-container -->   
                       <div class="column-wrap-container fl-wrap">
                            
						<?php if(get_post_meta($post->ID,'rnr_wr_pagetype_top_block',true)!='st2'){ ?>
                        <div class="col-wc_dec"></div>
						<?php } ;?>
                        <?php 
						global $zonar_content_div_class;
						if(get_post_meta($post->ID,'rnr_wr_pagetype_container',true)=='st2'){
						$zonar_content_div_class="container-disable fl-wrap";
						} else {
						$zonar_content_div_class="container ";
						} ;?>
                        <div class="<?php echo esc_attr ($zonar_content_div_class);?> wr-default-page">
						<?php while ( have_posts() ) : the_post(); ?>
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
                        <?php endwhile; ?>
						<?php wp_reset_postdata();?>
						</div>						
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
<?php } ;?>				
       
 <?php get_footer(); ?>	 

