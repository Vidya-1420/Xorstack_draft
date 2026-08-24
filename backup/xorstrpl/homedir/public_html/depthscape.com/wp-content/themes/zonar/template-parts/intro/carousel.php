<!-- content-->
                <div class="content full-height" data-pagetitle="<?php the_title();?>">
                    <!-- fw-carousel-wrap -->
                    <div class="hero-carousel-wrap  full-height   fl-wrap">
                        <!-- fw-carousel  -->
						<!-- speed  -->
							<?php if(get_post_meta($post->ID,'rnr_ns_intro_car_speed',true)):?>
								<?php $zonar_slider_speed = get_post_meta($post->ID,'rnr_ns_intro_car_speed',true);?>
							<?php else: ?>
								<?php $zonar_slider_speed = '1400';?>
							<?php endif;?>
							<!-- delay  -->
							<?php if(get_post_meta($post->ID,'rnr_ns_intro_car_delay',true)):?>
								<?php $zonar_slider_delay = get_post_meta($post->ID,'rnr_ns_intro_car_delay',true);?>
							<?php else: ?>
								<?php $zonar_slider_delay = '2500';?>
							<?php endif;?>
                        <div class="hero-carousel   fl-wrap full-height lightgallery">
                            <div class="swiper-container" data-slider-speed="<?php echo esc_attr($zonar_slider_speed);?>" data-slider-delay="<?php echo esc_attr($zonar_slider_delay);?>">
                                <div class="swiper-wrapper">
									<?php
									$zonar_counter=1;
									$zonar_cus_car_main_opt = rwmb_meta( 'rnr_md_po_car_cus_gallery' );
									if ( ! empty( $zonar_cus_car_main_opt ) ) {
									
									foreach ( $zonar_cus_car_main_opt as $zonar_cus_car_main_opts ) { ;?>
									<?php $zonar_intro_title = isset( $zonar_cus_car_main_opts['rnr_md_car_cus_gallery_intro_title_opt'] ) ? $zonar_cus_car_main_opts['rnr_md_car_cus_gallery_intro_title_opt'] : ''; ?>
									<?php $zonar_intro_subtitle = isset( $zonar_cus_car_main_opts['rnr_md_car_cus_gallery_intro_sub_title_opt'] ) ? $zonar_cus_car_main_opts['rnr_md_car_cus_gallery_intro_sub_title_opt'] : ''; ?>
									<?php $zonar_intro_buttonurl = isset( $zonar_cus_car_main_opts['rnr_md_car_cus_intro_buttonurl_opt'] ) ? $zonar_cus_car_main_opts['rnr_md_car_cus_intro_buttonurl_opt'] : ''; ?>
									<?php $zonar_intro_buttontxt = isset( $zonar_cus_car_main_opts['rnr_md_car_cus_intro_buttontext_opt'] ) ? $zonar_cus_car_main_opts['rnr_md_car_cus_intro_buttontext_opt'] : ''; ?>
									<?php $zonar_intro_button_target = isset( $zonar_cus_car_main_opts['rnr_zo_intro_carousel_button_target'] ) ? $zonar_cus_car_main_opts['rnr_zo_intro_carousel_button_target'] : ''; ?>
									<?php $zonar_image_ids = isset( $zonar_cus_car_main_opts['rnr_md_po_car_cus_gallery_img'] ) ? $zonar_cus_car_main_opts['rnr_md_po_car_cus_gallery_img'] : array();
									
									foreach ( $zonar_image_ids as $zonar_image_id ) {
									$zonar_image = RWMB_Image_Field::file_info( $zonar_image_id, array( 'size' => '' ) ); ?>
                                    <!-- swiper-slide-->
                                    <div class="swiper-slide hov_zoom">
                                        <div class="bg"  data-bg="<?php echo esc_url(($zonar_image['url']));?>" data-swiper-parallax="10%"></div>
                                        <div class="overlay"></div>
                                        <div class="grid-carousel-title">
											<?php if ( !empty( $zonar_intro_title ) ) { ?>
                                            <h3><a href="<?php if ( !empty( $zonar_intro_buttonurl ) ) { ?><?php echo esc_url($zonar_intro_buttonurl);?><?php } else { ?>#<?php } ?>" <?php if($zonar_intro_button_target != "_blank") { ?>class="ajax"<?php } ;?>  target="_blank"><?php echo do_shortcode($zonar_intro_title);?></a></h3>
											<?php } ?>
                                            <div class="clearfix"></div>
                                            <h4><?php echo esc_html($zonar_intro_subtitle);?></h4>
											<?php if ( !empty( $zonar_intro_buttonurl ) ) { ?>
											<?php if ( !empty( $zonar_intro_buttontxt ) ) { ?>
                                            <a href="<?php echo esc_url($zonar_intro_buttonurl);?>" class="btn <?php if($zonar_intro_button_target != "_blank") { ?>ajax<?php } ;?>  fl-btn   color-bg" <?php if($zonar_intro_button_target == "_blank") { ?>target="_blank"<?php } ;?>><span><?php echo esc_html($zonar_intro_buttontxt);?></span></a>
											<?php } ;?>
											<?php } ;?>
                                        </div>
                                        <div class="carousle-item-number"><span>0<?php echo esc_attr($zonar_counter);?>.</span></div>
                                        <div class="carousle-item-dec"></div>
                                    </div>
                                    <!-- swiper-slide end-->
                                    <?php 
									$zonar_counter++;
									} ;
									?>
									<?php } } ;?>
                                </div>
                            </div>
                        </div>
                        <!-- fw-carousel end -->
                        <div class="fs-slider-controls-wrap fscw2">
                            <div class="fs-slider-wrap_pagination-wrap">
                                <div class="fs-slider-wrap_pagination"></div>
                            </div>
                        </div>
                        <div class="ss-slider-cont ss-slider-cont-prev"><i class="fal fa-angle-left"></i></div>
                        <div class="ss-slider-cont ss-slider-cont-next"><i class="fal fa-angle-right"></i></div>
                    </div>
                    <!-- fw-carousel-wrap end -->
                    <div class="hsc_counter-wrap">
                        <div class="hsc_counter"><span></span></div>
                        <div class="hsc_total"></div>
                    </div>
                    <div class="fs-pg-idicator_wrap color-bg">
                        <div class="slider-progress-bar">
                            <span>
                                <svg class="circ" width="50" height="50"  >
                                    <circle class="circ2" cx="20" cy="20" r="18" stroke="rgba(255,255,255,0.4)" stroke-width="1" fill="none"/>
                                    <circle class="circ1" cx="20" cy="20" r="18" stroke="#fff" stroke-width="2" fill="none"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="hero-scroll-down-notifer">
                        <div class="scroll-down-wrap ">
                            <div class="mousey">
                                <div class="scroller"></div>
                            </div>
                        </div>
                        <i class="far fa-angle-down"></i>
                    </div>
                    <div class="body-color-bg"></div>
                </div>
                <!-- content end-->