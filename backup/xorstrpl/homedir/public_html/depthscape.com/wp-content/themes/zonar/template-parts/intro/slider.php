<!-- content-->
                <div class="content full-height" data-pagetitle="<?php the_title();?>">
                    <div class="fl-wrap full-height hero-conatiner">
                        <div class="hero-wrapper fl-wrap full-height hidden-item">
							<?php if(get_post_meta($post->ID,'rnr_zo_intro_slider_circle_animation',true)!='st2'){ ?>
                            <span class="hc_dec"></span>
							<?php } ;?>
                            <!-- fs-slider-wrap  -->
							<!-- speed  -->
							<?php if(get_post_meta($post->ID,'rnr_ns_intro_slider_speed',true)):?>
								<?php $zonar_slider_speed = get_post_meta($post->ID,'rnr_ns_intro_slider_speed',true);?>
							<?php else: ?>
								<?php $zonar_slider_speed = '2400';?>
							<?php endif;?>
							<!-- delay  -->
							<?php if(get_post_meta($post->ID,'rnr_ns_intro_slider_delay',true)):?>
								<?php $zonar_slider_delay = get_post_meta($post->ID,'rnr_ns_intro_slider_delay',true);?>
							<?php else: ?>
								<?php $zonar_slider_delay = '2500';?>
							<?php endif;?>
                            <!-- hero-slider-wrap -->
                            <div class="hero-slider-wrap home-half-slider fl-wrap full-height">
                                <div class="hero-slider fs-gallery-wrap fl-wrap full-height">
                                    <div class="swiper-container" data-slider-speed="<?php echo esc_attr($zonar_slider_speed);?>" data-slider-delay="<?php echo esc_attr($zonar_slider_delay);?>">
                                        <div class="swiper-wrapper" >
									<?php
									$zonar_slider_text_opt = rwmb_meta( 'rnr_zo_intro_slider_gallery_slider' );
									if ( ! empty( $zonar_slider_text_opt ) ) {
									foreach ( $zonar_slider_text_opt as $zonar_slider_text_opts ) { ;?>
									
									<?php $zonar_intro_title = isset( $zonar_slider_text_opts['rnr_zo_intro_slider_gallery_slider_title'] ) ? $zonar_slider_text_opts['rnr_zo_intro_slider_gallery_slider_title'] : ''; ?>
									
									<?php $zonar_intro_subtitle = isset( $zonar_slider_text_opts['rnr_zo_intro_slider_gallery_slider_sub_title'] ) ? $zonar_slider_text_opts['rnr_zo_intro_slider_gallery_slider_sub_title'] : ''; ?>
									
									<?php $zonar_intro_buttontxt = isset( $zonar_slider_text_opts['rnr_zo_intro_slider_gallery_slider_button_text'] ) ? $zonar_slider_text_opts['rnr_zo_intro_slider_gallery_slider_button_text'] : ''; ?>
									
									<?php $zonar_intro_buttonurl = isset( $zonar_slider_text_opts['rnr_zo_intro_slider_gallery_slider_button_url'] ) ? $zonar_slider_text_opts['rnr_zo_intro_slider_gallery_slider_button_url'] : ''; ?>
									
									<?php $zonar_intro_short_cont = isset( $zonar_slider_text_opts['rnr_zo_intro_slider_gallery_slider_sh_con'] ) ? $zonar_slider_text_opts['rnr_zo_intro_slider_gallery_slider_sh_con'] : ''; ?>
									<?php $zonar_intro_button_target = isset( $zonar_slider_text_opts['rnr_zo_intro_slider_buttn_target'] ) ? $zonar_slider_text_opts['rnr_zo_intro_slider_buttn_target'] : ''; ?>
                                            <!-- swiper-slide-->
                                            <div class="swiper-slide">
                                                <div class="half-hero-wrap">
													<?php if ( !empty( $zonar_intro_subtitle ) ) { ?>
													<div class="hhw_header"><?php echo esc_html($zonar_intro_subtitle);?></div>
													<?php } ;?>
                                                    <?php if ( !empty( $zonar_intro_title ) ) { ?>
													<h1><?php echo do_shortcode($zonar_intro_title);?></h1>
													<?php } ;?>
													<?php if ( !empty( $zonar_intro_short_cont ) ) { ?>
                                                    <h4><?php echo esc_html($zonar_intro_short_cont);?></h4>
													<?php } ;?>
                                                    <div class="clearfix"></div>
													<?php if ( !empty( $zonar_intro_buttontxt ) ) { ?>
													<?php if ( !empty( $zonar_intro_buttonurl ) ) { ?>
                                                    <a href="<?php echo esc_url($zonar_intro_buttonurl);?>" class="btn <?php if($zonar_intro_button_target != "_blank") { ?>ajax<?php } ;?>  fl-btn color-bg" <?php if($zonar_intro_button_target == "_blank") { ?>target="_blank"<?php } ;?>><span><?php echo esc_html($zonar_intro_buttontxt);?></span></a>
													<?php } ?>
													<?php } ?>
                                                </div>
                                            </div>
                                            <!-- swiper-slide end-->
                                            <?php } } ;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- hero-slider-wrap  end-->
                            <!-- hero-slider-img-->
                            <div class="hero-slider-img hero-slider-wrap_halftwo hidden-item">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper" >
									<?php
									$zonar_slider_opt = rwmb_meta( 'rnr_zo_intro_slider_gallery_slider' );
									if ( ! empty( $zonar_slider_opt ) ) {
									foreach ( $zonar_slider_opt as $zonar_slider_opts ) { ;?>
									<?php $zonar_image_ids = isset( $zonar_slider_opts['rnr_zo_intro_slider_gallery_slider_image'] ) ? $zonar_slider_opts['rnr_zo_intro_slider_gallery_slider_image'] : array();
									foreach ( $zonar_image_ids as $zonar_image_id ) {
									$zonar_image = RWMB_Image_Field::file_info( $zonar_image_id, array( 'size' => '' ) ); ?>
                                        <!-- swiper-slide-->
                                        <div class="swiper-slide">
                                            <div class="bg"  data-bg="<?php echo esc_url(($zonar_image['url']));?>" data-swiper-parallax="20%"></div>
                                            <div class="overlay"></div>
                                        </div>
                                        <!-- swiper-slide end-->
                                        <?php } ?>
										<?php } } ;?>
                                    </div>
                                </div>
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
                            <div class="swiper-counter hs_counter">
                                <div class="current">01</div>
                                <div class="total"></div>
                            </div>
                            <div class="hero-slider_control-wrap">
                                <div class="hsc hsc-prev"><span><i class="fal fa-angle-left"></i></span> </div>
                                <div class="hsc hsc-next"><span><i class="fal fa-angle-right"></i></span></div>
                            </div>
                            <!-- slider-controls end-->
							<?php if (( get_post_meta($post->ID,'rnr_zo_intro_slider_extra_button_url',true))):?>
                            <a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_zo_intro_slider_extra_button_url',true)); ?>" class="<?php if(get_post_meta($post->ID,'rnr_zo_intro_slider_extra_buttn_target',true)!='_blank'){ ?>ajax<?php } ;?> start-btn" <?php if(get_post_meta($post->ID,'rnr_zo_intro_slider_extra_buttn_target',true)=='_blank'){ ?>target="_blank"<?php } ;?>><span> <?php echo esc_attr(get_post_meta($post->ID,'rnr_zo_intro_slider_extra_button_text',true)); ?> <i class="fal fa-long-arrow-right"></i></span></a>
							<?php endif;?>
							<?php if(get_post_meta($post->ID,'rnr_zo_intro_slider_pause_button',true)!='st2'){ ?>
                            <div class="play-pause_slider hsc_pp auto_actslider"><i class="fas fa-play"></i></div>
							<?php } ;?>
                        </div>
                        <!-- hero-container end-->
						<?php if(get_post_meta($post->ID,'rnr_zo_loaction_tooltip',true)=='st2'){ ?>
                        <div class="hero-decor-numb">
						<?php
						$zonar_top_con = rwmb_meta( 'rnr_zo_loc_tooltip_content' );
						if ( ! empty( $zonar_top_con ) ) {
						foreach ( $zonar_top_con as $zonar_top_cons ) { ;?>
						<?php $zonar_intro_text_top = isset( $zonar_top_cons['rnr_zo_lo_tooltip_intro'] ) ? $zonar_top_cons['rnr_zo_lo_tooltip_intro'] : ''; ?>
						<?php if ( !empty( $zonar_intro_text_top ) ) { ?>
						<span><?php echo esc_html($zonar_intro_text_top);?>  </span>
						<?php } ;?>
						<?php } } ;?>
						<?php if(get_post_meta($post->ID,'rnr_zo_top_con_hover_intro',true)):?>
						<a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_zo_top_con_hover_intro_url',true));?>" target="_blank" class="hero-decor-numb-tooltip"><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_top_con_hover_intro',true));?></a>
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