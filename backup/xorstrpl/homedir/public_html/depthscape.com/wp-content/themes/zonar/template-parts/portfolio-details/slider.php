<?php $zonar_options = get_option('zonar'); ?>
<?php if(have_posts()) : while ( have_posts() ) : the_post();?>
<!-- content-->
                <div class="content full-height" data-pagetitle="<?php echo wp_trim_words(get_the_title(), 3, '..');?>">
                    <div class="fs-slider-controls-wrap">
                        <div class="fs-slider-wrap_pagination-wrap">
                            <div class="fs-slider-wrap_pagination"></div>
                        </div>
                        <div class="play-pause_slider2 hsc_pp2 auto_actslider2"><i class="fas fa-play"></i></div>
                        <div class="tumbnail-button show_thumbnails unvisthum">
                            <div class="list">
                                <div   class="list-btn">
                                    <span>
                                    <i class="b1 c1"></i><i class="b1 c2"></i><i class="b1 c3"></i>
                                    <i class="b2 c1"></i><i class="b2 c2"></i><i class="b2 c3"></i>
                                    <i class="b3 c1"></i><i class="b3 c2"></i><i class="b3 c3"></i>
                                    </span>
                                </div>
                            </div>
                            <span class="thumbnail-tooltip"><?php if (( get_post_meta($post->ID,'rnr_zo_port_slider_text_translate_2_opt',true))):?><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_port_slider_text_translate_2_opt',true)); ?><?php else: ?><?php esc_html_e('Thumbnails','zonar');?><?php endif;?></span>
                        </div>
                    </div>
                    <div class="show-details shibtn unvisthum2 sd_btn sd_btn2"><?php if (( get_post_meta($post->ID,'rnr_zo_port_slider_text_translate_1_opt',true))):?><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_port_slider_text_translate_1_opt',true)); ?><?php else: ?><?php esc_html_e('Project Details','zonar');?><?php endif;?> <i class="fal fa-long-arrow-right"></i></div>
                    <!-- fs-slider-wrap  -->
                    <div class="fs-slider-wrap full-height fl-wrap">
                        <div class="fs-slider-dec"></div>
                        <!-- fs-slider controls  -->
                        <div class="fsc-next fsc"><i class="fal fa-angle-right"></i></div>
                        <div class="fsc-prev fsc"><i class="fal fa-angle-left"></i></div>
                        <!-- fs-slider  controls end  -->
                        <!-- fs-slider  -->
                        <div class="fs-slider lightgallery full-height fl-wrap thumb-contr " data-mousecontrol2="true">
                            <div class="swiper-container">
                                <div class="swiper-wrapper" >
									<?php
									$zonar_car_slide_opt = rwmb_meta( 'rnr_zo_pot_slider_gallery_opt' );
									if ( ! empty( $zonar_car_slide_opt ) ) {
									foreach ( $zonar_car_slide_opt as $zonar_car_slide_opts ) { ;?>
									<?php $zonar_gallery_pop = isset( $zonar_car_slide_opts['rnr_zo_pot_slider_gallery_video_opt'] ) ? $zonar_car_slide_opts['rnr_zo_pot_slider_gallery_video_opt'] : ''; ?>
									<?php $zonar_gallery_con_enable = isset( $zonar_car_slide_opts['rnr_zo_port_slider_img_content_opt'] ) ? $zonar_car_slide_opts['rnr_zo_port_slider_img_content_opt'] : ''; ?>
									<?php $zonar_gallery_con_small_title = isset( $zonar_car_slide_opts['rnr_zo_port_slider_small_title_opt'] ) ? $zonar_car_slide_opts['rnr_zo_port_slider_small_title_opt'] : ''; ?>
									<?php $zonar_gallery_con_title = isset( $zonar_car_slide_opts['rnr_zo_port_slider_big_title_opt'] ) ? $zonar_car_slide_opts['rnr_zo_port_slider_big_title_opt'] : ''; ?>
									<?php $zonar_gallery_con_content = isset( $zonar_car_slide_opts['rnr_zo_port_slider_content_opt'] ) ? $zonar_car_slide_opts['rnr_zo_port_slider_content_opt'] : ''; ?>
									<?php $zonar_image_ids = isset( $zonar_car_slide_opts['rnr_zo_pot_slider_gallery'] ) ? $zonar_car_slide_opts['rnr_zo_pot_slider_gallery'] : array();
									foreach ( $zonar_image_ids as $zonar_image_id ) {
									$zonar_image = RWMB_Image_Field::file_info( $zonar_image_id, array( 'size' => '' ) ); ?>
                                    <!-- swiper-slide-->
                                    <div class="swiper-slide hov_zoom" >
                                        <div class="fs-slider-item fl-wrap">
                                            <div class="bg"  data-bg="<?php echo esc_url(($zonar_image['url']));?>"></div>
											<?php if($zonar_gallery_con_enable != "st1"){ ?>
                                            <div class="overlay"></div>
											<?php } ;?>
                                            <?php if ( !empty( $zonar_gallery_pop ) ) { ?>
											<a href="<?php echo esc_url($zonar_gallery_pop);?>" class="box-media-zoom   image-popup"><i class="fal fa-play"></i></a>
											<?php } else { ?>
											<a href="<?php echo esc_url(($zonar_image['url']));?>" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
											<?php } ;?>
											<?php if($zonar_gallery_con_enable == "st2"){ ?>
                                            <div class="half-hero-wrap">
												<?php if ( !empty( $zonar_gallery_con_small_title ) ) { ?>
                                                <div class="hhw_header"><?php echo esc_html($zonar_gallery_con_small_title);?></div>
												<?php } ;?>
												<?php if ( !empty( $zonar_gallery_con_title ) ) { ?>
                                                <h1><?php echo do_shortcode($zonar_gallery_con_title);?></h1>
												<?php } ;?>
												<?php if ( !empty( $zonar_gallery_con_content ) ) { ?>
                                                <h4><?php echo esc_html($zonar_gallery_con_content);?> </h4>
												<?php } ;?>
                                            </div>
											<?php } ;?>
                                        </div>
                                    </div>
                                    <!-- swiper-slide-->
                                    <?php } } } ;?> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- fs-slider-wrap end -->
                    <div class="hsc_counter-wrap">
                        <div class="hsc_counter"><span></span></div>
                        <div class="hsc_total"></div>
                    </div>
                    <!-- project details -->
                    <div class="det-overlay act-closedet"></div>
                    <div class="fix-pr-det hid-det hid-det-anim">
                        <div class="fix-pr-det-dec"></div>
                        <div class="fix-pr-det-dec2 color-bg"></div>
                        <div class="act-closedet closedet_style"><i class="fal fa-times"></i></div>
                        <div class="pr-det-container    fl-wrap full-height hidden-section">
                          <div class="initscroll pr-details-wrap zo-no-overflow">
                                <?php the_content();?>
                          </div>  
                        </div>
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
                    <!-- project details  end-->
                    <!--thumbnail-container-->
                    <div class="thumbnail-container tc2">
                        <div class="thumbnail-wrap">
                        </div>
                    </div>
                    <!--thumbnail-container end-->
                    <div class="fs-pg-idicator_wrap color-bg">
                        <div class="slider-progress-bar">
                            <span>
                                <svg class="circ" width="50" height="50">
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
<?php endwhile;  endif; wp_reset_postdata(); ?>
