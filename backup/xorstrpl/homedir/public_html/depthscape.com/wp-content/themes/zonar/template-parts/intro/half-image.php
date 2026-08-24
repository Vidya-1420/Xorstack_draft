<!-- content-->
                <div class="content full-height" data-pagetitle="<?php the_title();?>">
                    <div class="fl-wrap full-height hero-conatiner">
                        <div class="hero-wrapper fl-wrap full-height hidden-item">
							<?php if(get_post_meta($post->ID,'rnr_zo_intro_half_image_circle_animation',true)!='st2'){ ?>
                            <span class="hc_dec"></span>
							<?php } ;?>
                            <!-- fs-slider-wrap  -->
                            <!-- hero-slider-wrap -->
                            <div class="hero-slider-wrap home-half-slider fl-wrap full-height">
                                <div class="hero-slider fs-gallery-wraps fl-wrap full-height">
                                    
                                        <div class="fl-wrap full-height" >
									
                                            <!-- swiper-slide-->
                                            
                                                <div class="half-hero-wrap zo-half-image">
													<?php if (( get_post_meta($post->ID,'rnr_zo_intro_half_image_gallery_slider_sub_title',true))):?>
													<div class="hhw_header"><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_intro_half_image_gallery_slider_sub_title',true)); ?></div>
													<?php endif;?>
													
                                                    <?php if (( get_post_meta($post->ID,'rnr_zo_intro_half_image_gallery_slider_title',true))):?>
													<h1><?php echo do_shortcode(get_post_meta($post->ID,'rnr_zo_intro_half_image_gallery_slider_title',true)); ?></h1>
													<?php endif;?>
													<?php if (( get_post_meta($post->ID,'rnr_zo_intro_half_image_gallery_slider_sh_con',true))):?>
													<h4><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_intro_half_image_gallery_slider_sh_con',true)); ?></h4>
													<?php endif;?>
                                                    <div class="clearfix"></div>
													<?php if (( get_post_meta($post->ID,'rnr_zo_intro_half_image_image_gallery_slider_button_text',true))):?>
													<?php if (( get_post_meta($post->ID,'rnr_zo_intro_half_image_gallery_slider_button_url',true))):?>
                                                    <a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_zo_intro_half_image_gallery_slider_button_url',true)); ?>" class="btn <?php if(get_post_meta($post->ID,'rnr_zo_intro_half_image_buttn_target',true)!='_blank'){ ?>ajax<?php } ;?>  fl-btn color-bg" <?php if(get_post_meta($post->ID,'rnr_zo_intro_half_image_buttn_target',true)!='_blank'){ ?>target="_blank"<?php } ;?>><span><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_intro_half_image_image_gallery_slider_button_text',true)); ?></span></a>
													<?php endif;?>
													<?php endif;?>
                                                </div>
                                            
                                            <!-- swiper-slide end-->
                                            
                                        </div>
                                    
                                </div>
                            </div>
                            <!-- hero-slider-wrap  end-->
                            <!-- hero-slider-img-->
                            <div class="hero-slider-img hero-slider-wrap_halftwo hidden-item">
                                
									
                                        <!-- swiper-slide-->
                                        <div class="swiper-slides">
										<?php $zonar_images = rwmb_meta( 'rnr_zo_intro_half_image_gallery_slider_image','type=image&size=' );
										 foreach ( $zonar_images as $zonar_image ){ ?>
										<div class="bg"  data-bg="<?php echo esc_url(($zonar_image['url']));?>" data-swiper-parallax="20%"></div>
                                        <div class="overlay"></div>
										<?php } ;?>
                                            
                                        </div>
                                        <!-- swiper-slide end-->
                                      
                                    
                                <div class="hero-corner-dec"></div>
                                <div class="hero-corner-dec2"></div>
                            </div>
                            <!-- hero-slider-img  end-->
                            <!-- slider-controls -->
                            <div class="slider-progress-bar">
                                <span>
                                    <svg class="circ" width="50" height="50">
                                        <circle class="circ2" cx="25" cy="25" r="23" stroke="rgba(255,255,255,0.4)" stroke-width="1" fill="none"/>
                                        <circle class="circ1" cx="25" cy="25" r="23" stroke="#fff" stroke-width="2" fill="none"/>
                                    </svg>
                                </span>
                            </div>
                            <div class="clone-counter">
                                <div class="current">01</div>
                            </div>
                            <!-- slider-controls end-->
							<?php if (( get_post_meta($post->ID,'rnr_zo_intro_half_image_extra_button_url',true))):?>
                            <a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_zo_intro_half_image_extra_button_url',true)); ?>" class="<?php if(get_post_meta($post->ID,'rnr_zo_intro_half_image_extra_buttn_target',true)!='_blank'){ ?>ajax<?php } ;?> start-btn" <?php if(get_post_meta($post->ID,'rnr_zo_intro_slider_extra_buttn_target',true)=='_blank'){ ?>target="_blank"<?php } ;?>><span> <?php echo esc_attr(get_post_meta($post->ID,'rnr_zo_intro_half_image_extra_button_text',true)); ?> <i class="fal fa-long-arrow-right"></i></span></a>
							<?php endif;?>
							
                        </div>
                        <!-- hero-container end-->
						<?php if(get_post_meta($post->ID,'rnr_zo_loaction_half_image_tooltip',true)=='st2'){ ?>
                        <div class="hero-decor-numb">
						<?php
						$zonar_top_con = rwmb_meta( 'rnr_zo_loc_half_image_tooltip_content' );
						if ( ! empty( $zonar_top_con ) ) {
						foreach ( $zonar_top_con as $zonar_top_cons ) { ;?>
						<?php $zonar_intro_text_top = isset( $zonar_top_cons['rnr_zo_lo_half_image_tooltip_intro'] ) ? $zonar_top_cons['rnr_zo_lo_half_image_tooltip_intro'] : ''; ?>
						<?php if ( !empty( $zonar_intro_text_top ) ) { ?>
						<span><?php echo esc_html($zonar_intro_text_top);?>  </span>
						<?php } ;?>
						<?php } } ;?>
						<?php if(get_post_meta($post->ID,'rnr_zo_half_image_top_con_hover_intro',true)):?>
						<a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_zo_half_image_top_con_hover_intro_url',true));?>" target="_blank" class="hero-decor-numb-tooltip"><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_half_image_top_con_hover_intro',true));?></a>
						<?php endif;?>
						</div>
						<?php } ;?>
                        <div class="hero-slider-wrap_pagination"></div>
                        <div class="hero-scroll-down-notifer">
                            <div class="scroll-down-wrap ">
                                <div class="mousey">
                                    <div class="scroller"></div>
                                </div>
                            </div>
                            <i class="far fa-angle-down"></i>
                        </div>
                    </div>
                </div>
                <!-- content end -->