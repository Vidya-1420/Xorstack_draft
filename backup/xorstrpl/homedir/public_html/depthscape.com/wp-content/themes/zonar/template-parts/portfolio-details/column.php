<?php $zonar_options = get_option('zonar'); ?>
<!-- content-->    
                <div class="content" data-pagetitle="<?php echo wp_trim_words(get_the_title(), 3, '..');?>">
                    <div class="page-scroll-nav psn_single">
                        <!--content-nav_holder-->            
                        <div class="content-nav_holder">
                            <div class="content-nav">
                                <ul>
                                    <li>
											<?php $zonar_previous_post = get_previous_post();
                                            $zonar_url = is_object( $zonar_previous_post ) ? get_permalink( $zonar_previous_post->ID ) : '';
                                            $zonar_title = is_object( $zonar_previous_post ) ? wp_trim_words(get_the_title( $zonar_previous_post->ID ), 3) : '';
											$zonar_link_ajax = is_object( $zonar_previous_post ) ? get_post_meta($zonar_previous_post->ID,'rnr_open_page',true) : '';
											if ($zonar_previous_post) { 
											$zonar_image = wp_get_attachment_image_src( get_post_thumbnail_id( $zonar_previous_post->ID ), 'zonar_portfolio_image' );
											}
											?>
											<?php  if ($zonar_previous_post) { ?>
											<?php 
											global $zonar_buton_class;
											if($zonar_link_ajax!='1'){
											$zonar_buton_class="ajax";
											} ;?>
                                                    <a href="<?php echo esc_url( $zonar_url ) ?>" class="ln <?php echo $zonar_buton_class;?>"><i class="fal fa-long-arrow-left"></i><span><?php if(!empty($zonar_options['translet_opt_18'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_18',''));?> - <?php else: ?><?php esc_html_e('Prev - ','zonar');?><?php endif;?><?php echo esc_html( $zonar_title ) ?></span></a>
                                                    <div class="content-nav-media">
                                                        <div class="bg"  data-bg="<?php echo esc_url($zonar_image[0]);?>"></div>
                                                    </div>
											<?php } else { ?>
											<?php if(!empty($zonar_options['portpageurl'])):?>
											<a href="<?php echo esc_url(Zonar_AfterSetupTheme::return_thme_option('portpageurl',''));?>" class="ln ajax"><i class="fal fa-long-arrow-left"></i><span><?php if(!empty($zonar_options['translet_opt_22'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_22',''));?><?php else: ?><?php esc_html_e('Back To Portfolio','zonar');?><?php endif;?></span></a>
											<?php else : ?>
											<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ln ajax"><i class="fal fa-long-arrow-left"></i><span><?php if(!empty($zonar_options['translet_opt_21'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_21',''));?><?php else: ?><?php esc_html_e('Back To Home','zonar');?><?php endif;?></span></a>
											<?php endif;?>
                                                    <div class="content-nav-media">
                                                        <div class="bg"  data-bg="<?php echo esc_url($zonar_image[0]);?>"></div>
                                                    </div>
											<?php } ;?>
                                                </li>
                                                <li>
											<?php $zonar_next_post = get_next_post();
                                            $zonar_url = is_object( $zonar_next_post ) ? get_permalink( $zonar_next_post->ID ) : '';
                                            $zonar_title = is_object( $zonar_next_post ) ? wp_trim_words(get_the_title( $zonar_next_post->ID ), 3) : ''; 
											$zonar_link_ajax = is_object( $zonar_next_post ) ? get_post_meta($zonar_next_post->ID,'rnr_open_page',true) : '';
											if ($zonar_next_post) {
											$zonar_image = wp_get_attachment_image_src( get_post_thumbnail_id( $zonar_next_post->ID ), 'zonar_portfolio_image' );
											}
											?>
											<?php if ($zonar_next_post) { ?>
											<?php 
											global $zonar_buton_class;
											if($zonar_link_ajax!='1'){
											$zonar_buton_class="ajax";
											} ;?>
                                                    <a href="<?php echo esc_url( $zonar_url ) ?>" class="rn <?php echo $zonar_buton_class;?>"><span ><?php if(!empty($zonar_options['translet_opt_20'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_20',''));?> - <?php else: ?><?php esc_html_e('Next - ','zonar');?><?php endif;?><?php echo esc_html( $zonar_title ) ?></span> <i class="fal fa-long-arrow-right"></i></a>
                                                    <div class="content-nav-media">
                                                        <div class="bg"  data-bg="<?php echo esc_url($zonar_image[0]);?>"></div>
                                                    </div>
											<?php } else { ?>
											<?php if(!empty($zonar_options['portpageurl'])):?>
											<a href="<?php echo esc_url(Zonar_AfterSetupTheme::return_thme_option('portpageurl',''));?>" class="rn ajax"><span ><?php if(!empty($zonar_options['translet_opt_22'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_22',''));?><?php else: ?><?php esc_html_e('Back To Portfolio','zonar');?><?php endif;?></span> <i class="fal fa-long-arrow-right"></i></a>
											<?php else :?>
											<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="rn ajax"><span ><?php if(!empty($zonar_options['translet_opt_21'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_21',''));?><?php else: ?><?php esc_html_e('Back To Home','zonar');?><?php endif;?></span> <i class="fal fa-long-arrow-right"></i></a>
											<?php endif;?>
                                                    <div class="content-nav-media">
                                                        <div class="bg"  data-bg="<?php echo esc_url($zonar_image[0]);?>"></div>
                                                    </div>
											<?php } ;?>
                                                </li>
                                </ul>
                            </div>
                        </div>
                        <!--content-nav_holder end -->   
                    </div>
					<?php if(get_post_meta($post->ID,'rnr_wr_page_port_dt_scrolling_ani',true)!='st2'){ ?>
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
					<?php if(have_posts()) : while ( have_posts() ) : the_post();?>
					<?php global $zonar_image; ?>
					<?php if (has_post_thumbnail( $post->ID ) ):
					$zonar_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
					<?php endif;?>
                    <?php if(get_post_meta($post->ID,'rnr_wr_page_port_dt_header_opt',true)=='st2'){ ?>
					
				<!--fixed-column-wrap-->
                    <div class="fixed-column-wrap">
                        <div class="pr-bg"></div>
                        <!--fixed-column-wrap-content-->
                        <div class="fixed-column-wrap-content">
                            <!--slideshow-container-->
                            <div class="slideshow-container">
                                <div class="slideshow-container_wrap fl-wrap full-height">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
										<?php $zonar_block_images = rwmb_meta( 'rnr_zo_page_port_dt_block_slider_image','type=image&size=' );
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
                                <h2><?php if (( get_post_meta($post->ID,'rnr_zo_page_port_dt_header_title_opt',true))):?><?php echo  do_shortcode(get_post_meta($post->ID,'rnr_zo_page_port_dt_header_title_opt',true)); ?><?php else: ?><?php the_title();?><?php endif;?></h2>
                                <?php if (( get_post_meta($post->ID,'rnr_zo_page_port_dt_header_sub_title_opt',true))):?>	
                                <p><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_page_port_dt_header_sub_title_opt',true)); ?>  </p>
								<?php endif;?>
                            </div>
                            <!--fixed-column-wrap_title end-->
                            <div class="fixed-column-dec"></div>
                            <div class="scroll-notifer"><?php if(get_post_meta($post->ID,'rnr_zo_page_port_dt_header_translate_opt',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_page_port_dt_header_translate_opt',true));?> <?php else : ?><?php esc_html_e('Scroll Down','zonar');?><?php endif;?>  </div>
                            
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
						<?php $zonar_back_images = rwmb_meta( 'rnr_zo_page_port_dt_block_right_image','type=image&size=' ); ?>
						<?php if ( ! empty( $zonar_back_images ) ) { ?>
						<?php foreach ( $zonar_back_images as $zonar_back_image ){ ?>			
						<div class="bg"  data-bg="<?php echo esc_url(($zonar_back_image['url']));?>"></div>
						<?php } ;?>
						<?php } else { ?>
						<div class="bg"  data-bg="<?php echo esc_url($zonar_image[0]);?>"></div>
						<?php } ;?>
                            <div class="overlay"></div>
                            <div class="progress-bar-wrap bot-element">
                                <div class="progress-bar"></div>
                            </div>
                            <!--fixed-column-wrap_title-->
                            <div class="fixed-column-wrap_title first-tile_load">
                                <h2><?php if (( get_post_meta($post->ID,'rnr_zo_page_port_dt_header_title_opt',true))):?><?php echo  do_shortcode(get_post_meta($post->ID,'rnr_zo_page_port_dt_header_title_opt',true)); ?><?php else: ?><?php the_title();?><?php endif;?></h2>
                                <?php if (( get_post_meta($post->ID,'rnr_zo_page_port_dt_header_sub_title_opt',true))):?>	
                                <p><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_page_port_dt_header_sub_title_opt',true)); ?>  </p>
								<?php endif;?>
                            </div>
                            <!--fixed-column-wrap_title end-->
                            <div class="fixed-column-dec"></div>
                            <div class="fixed-column-linedec"></div>
                            <div class="scroll-notifer"><?php if(get_post_meta($post->ID,'rnr_zo_page_port_dt_header_translate_opt',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_page_port_dt_header_translate_opt',true));?> <?php else : ?><?php esc_html_e('Scroll Down','zonar');?><?php endif;?>  </div>
                            
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
                            <?php the_content();?>
                            <!--section end-->                 
                        </div>
                        <!--column-wrap-container end -->          
                    </div>
                    <!--column-wrap end-->    
                    <div class="to-top-btn to-top"><i class="fal fa-long-arrow-up"></i></div>
                </div>
				<?php endwhile;  endif; wp_reset_postdata(); ?>
                <!-- content end--> 
                <div class="hero-scroll-down-notifer">
                    <div class="scroll-down-wrap ">
                        <div class="mousey">
                            <div class="scroller"></div>
                        </div>
                    </div>
                    <i class="far fa-angle-down"></i>
                </div>
