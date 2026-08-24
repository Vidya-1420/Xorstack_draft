<?php $zonar_options = get_option('zonar'); ?>
<?php if(have_posts()) : while ( have_posts() ) : the_post();?>
<!-- content-->
                <div class="content full-height" data-pagetitle="<?php echo wp_trim_words(get_the_title(), 3, '..');?>">
                    <div class="fl-wrap full-height   video-single-wrapper">
                        <div class="show-details shibtn unvisthum2 sd_btn sd_btn2"><?php if (( get_post_meta($post->ID,'rnr_zo_port_carousel_text_translate_2_opt',true))):?><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_port_carousel_text_translate_2_opt',true)); ?><?php else: ?><?php esc_html_e('Project Details','zonar');?><?php endif;?> <i class="fal fa-long-arrow-right"></i></div>
                        <!-- fs-slider-wrap  -->
                        <div class="video-holder-wrap fhhw">
                            <div class="media-container" data-scrollax="properties: { translateY: '30%' }">
                        
                        <?php if(get_post_meta($post->ID,'rnr_zo_port_intro_video_select_opt',true)=='st2'){ ?>
						<?php $zonar_images = rwmb_meta( 'rnr_zo_port_intro_back_video_image','type=image&size=' );
						foreach ( $zonar_images as $zonar_image ){ ?>
                            <div class="bg mob-bg" style="background-image: url(<?php echo esc_url(($zonar_image['url']));?>)"></div>
						<?php } ;?>
							<div class="video-container">
								<div  class="background-youtube-wrapper" data-vid="<?php echo esc_attr(get_post_meta($post->ID,'rnr_zo_port_intro_youtube_video_url',true)); ?>" data-mv="<?php echo esc_attr(get_post_meta($post->ID,'rnr_zo_port_intro_youtube_video_sound',true)); ?>"> </div>
							</div>
						<?php } else if(get_post_meta($post->ID,'rnr_zo_port_intro_video_select_opt',true)=='st3'){ ?>
						<?php $zonar_images = rwmb_meta( 'rnr_zo_port_intro_back_video_image','type=image&size=' );
						foreach ( $zonar_images as $zonar_image ){ ?>
                            <div class="bg mob-bg" style="background-image: url(<?php echo esc_url(($zonar_image['url']));?>)"></div>
						<?php } ;?>
							<div class="video-container">
							<div class="video-holder">
							<div  class="background-vimeo" data-vim="<?php echo esc_attr(get_post_meta($post->ID,'rnr_zo_port_intro_vimeo_video_url',true)); ?>"> </div>
							</div>
							</div>
						<?php } else { ?>
                        <div class="video-container">
							<?php if (( get_post_meta($post->ID,'rnr_zo_port_intro_mp4_video_url',true))):?>
                            <video playsinline autoplay  loop muted  class="bgvid">
                                <source src="<?php echo esc_url(get_post_meta($post->ID,'rnr_zo_port_intro_mp4_video_url',true)); ?>" type="video/mp4">
                            </video>
							<?php endif;?>
						</div>
						<?php } ;?>
                            </div>
                            <div class="overlay"></div>
                            <div class="half-hero-wrap">
                            <?php if(get_post_meta($post->ID,'rnr_zo_port_intro_video_right_side_con',true)=='st2'){ ?>
                            <div class="hhw_header">
                                <div class="rotate_text hero-decor-let">
								<?php
								$zonar_left_con = rwmb_meta( 'rnr_zo_port_intro_video_rightside_con_opt' );
								if ( ! empty( $zonar_left_con ) ) {
								foreach ( $zonar_left_con as $zonar_left_cons ) { ;?>
								<?php $zonar_intro_text_left = isset( $zonar_left_cons['rnr_zo_port_intro_video_con_text'] ) ? $zonar_left_cons['rnr_zo_port_intro_video_con_text'] : ''; ?>
								<?php if ( !empty( $zonar_intro_text_left ) ) { ?>
                                    <div><?php echo esc_html($zonar_intro_text_left);?></div>
                                    <?php } ?>
								<?php } } ;?>
                                </div>
                            </div>
						<?php } ;?>
                            
							<h1><?php if (( get_post_meta($post->ID,'rnr_zo_port_intro_video_title',true))):?><?php echo do_shortcode(get_post_meta($post->ID,'rnr_zo_port_intro_video_title',true)); ?><?php else : ?><?php the_title();?><?php endif;?></h1>
							
                            <?php if (( get_post_meta($post->ID,'rnr_zo_port_intro_video_sub_title',true))):?>
							<h4><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_port_intro_video_sub_title',true)); ?></h4>
							<div class="clearfix"></div>
							<?php endif;?>
                            
							
                        </div>
                        <?php if(get_post_meta($post->ID,'rnr_zo_port_intro_video_video_story',true)=='st2'){ ?>
						
                        <!--hero_promo-wrap-->
                        <div class="hero_promo-wrap bot-element2">
                            <div class="hero_promo-title">
                                <h4><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_port_intro_video_video_story_title',true)); ?></h4>
                                <p><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_port_intro_video_video_story_content',true)); ?></p>
                            </div>
							<?php if(get_post_meta($post->ID,'rnr_zo_port_intro_video_video_type_story',true)=='st2'){ ?>
								<div class="hero_promo-button" id="html5-videos"   data-html="#video1">
                                    <?php $zonar_thumbnail_image = rwmb_meta( 'rnr_zo_port_intro_video_video_story_thumbnail','type=image&size=' );
									 foreach ( $zonar_thumbnail_image as $zonar_thumbnail_images ){ ?>
									<div class="bg" data-bg="<?php echo esc_url(($zonar_thumbnail_images['url']));?>"></div>
									<?php } ;?>
                                    <div class="overlay"></div>
                                    <a href="#"  ><i class="fas fa-play"></i></a>
                                </div>
							<?php } else { ?>
                            <div class="hero_promo-button">
							<?php $zonar_thumbnail_image = rwmb_meta( 'rnr_zo_port_intro_video_video_story_thumbnail','type=image&size=' );
							 foreach ( $zonar_thumbnail_image as $zonar_thumbnail_images ){ ?>
							<div class="bg" data-bg="<?php echo esc_url(($zonar_thumbnail_images['url']));?>"></div>
							<?php } ;?>
                            <div class="overlay"></div>
                                <a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_zo_port_intro_video_video_story_video_url',true)); ?>" class="image-popup"  ><i class="fas fa-play"></i></a>
                            </div>
							<?php } ?>
                        </div>
                        <!--hero_promo-wrap end-->
						<?php if(get_post_meta($post->ID,'rnr_zo_port_intro_video_video_type_story',true)=='st2'){ ?>
							<!-- Hidden video div -->
								<div style="display:none;" id="video1">
									<video class="lg-video-object lg-html5" controls preload="none">
										<source src="<?php echo esc_url(get_post_meta($post->ID,'rnr_zo_port_intro_video_video_story_video_mp4_url',true)); ?>" type="video/mp4">
									</video>
								</div>
							<?php };?>
						<?php };?>
                           
							<?php if(get_post_meta($post->ID,'rnr_zo_port_intro_image_gallery_opt',true)=='st2'){ ?>
                            <!-- gallery -->
                            <div class="dynamic-gal hdyn_gal" data-dynamicPath="[<?php $zonar_gallery_image = rwmb_meta( 'rnr_zo_port_intro_video_gallery_image_opt','type=image&size=' ); foreach ( $zonar_gallery_image as $zonar_gallery_images ){ ?>{'src': '<?php echo esc_url(($zonar_gallery_images['url']));?>'},<?php } ;?>]">   <i class="fal fa-search"></i> <span><?php if (( get_post_meta($post->ID,'rnr_zo_port_intro_video_translate_opt_1',true))):?><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_port_intro_video_translate_opt_1',true)); ?><?php else: ?><?php esc_html_e('Project Gallery','zonar');?><?php endif;?></span></div>
                            <!-- gallery end-->
							<?php } ;?>
                        </div>
                        <!-- fs-slider-wrap end -->
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
                    <div class="body-color-bg"></div>
                </div>
                <!-- content end-->
<?php endwhile;  endif; wp_reset_postdata(); ?>