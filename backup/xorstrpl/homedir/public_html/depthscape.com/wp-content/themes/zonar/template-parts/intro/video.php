<!-- content-->
                <div class="content full-height" data-pagetitle="<?php the_title();?>">
                    <!-- fs-slider-wrap  -->
                    <div class="video-holder-wrap hero_entry">
                        <div class="media-container" data-scrollax="properties: { translateY: '30%' }">
						
                        <?php if(get_post_meta($post->ID,'rnr_zo_intro_video_select_opt',true)=='st2'){ ?>
						<?php $zonar_images = rwmb_meta( 'rnr_zo_intro_back_video_image','type=image&size=' );
						foreach ( $zonar_images as $zonar_image ){ ?>
                            <div class="bg mob-bg" style="background-image: url(<?php echo esc_url(($zonar_image['url']));?>)"></div>
						<?php } ;?>
							<div class="video-container">
								<div  class="background-youtube-wrapper" data-vid="<?php echo esc_attr(get_post_meta($post->ID,'rnr_zo_intro_youtube_video_url',true)); ?>" data-mv="<?php echo esc_attr(get_post_meta($post->ID,'rnr_zo_intro_youtube_video_sound',true)); ?>"> </div>
							</div>
						<?php } else if(get_post_meta($post->ID,'rnr_zo_intro_video_select_opt',true)=='st3'){ ?>
						<?php $zonar_images = rwmb_meta( 'rnr_zo_intro_back_video_image','type=image&size=' );
						foreach ( $zonar_images as $zonar_image ){ ?>
                            <div class="bg mob-bg" style="background-image: url(<?php echo esc_url(($zonar_image['url']));?>)"></div>
						<?php } ;?>
							<div class="video-container">
							<div class="video-holder">
							<div  class="background-vimeo" data-vim="<?php echo esc_attr(get_post_meta($post->ID,'rnr_zo_intro_vimeo_video_url',true)); ?>"> </div>
							</div>
							</div>
						<?php } else { ?>
                        <div class="video-container">
							<?php if (( get_post_meta($post->ID,'rnr_zo_intro_mp4_video_url',true))):?>
                            <video playsinline autoplay  loop muted  class="bgvid">
                                <source src="<?php echo esc_url(get_post_meta($post->ID,'rnr_zo_intro_mp4_video_url',true)); ?>" type="video/mp4">
                            </video>
							<?php endif;?>
						</div>
						<?php } ;?>
                        </div>
                        <div class="overlay"></div>
                        <div class="half-hero-wrap hhw-vis">
                            <?php if(get_post_meta($post->ID,'rnr_zo_intro_video_right_side_con',true)=='st2'){ ?>
                            <div class="hhw_header">
                                <div class="rotate_text hero-decor-let">
								<?php
								$zonar_left_con = rwmb_meta( 'rnr_zo_intro_video_rightside_con_opt' );
								if ( ! empty( $zonar_left_con ) ) {
								foreach ( $zonar_left_con as $zonar_left_cons ) { ;?>
								<?php $zonar_intro_text_left = isset( $zonar_left_cons['rnr_zo_intro_video_con_text'] ) ? $zonar_left_cons['rnr_zo_intro_video_con_text'] : ''; ?>
								<?php if ( !empty( $zonar_intro_text_left ) ) { ?>
                                    <div><?php echo esc_html($zonar_intro_text_left);?></div>
                                    <?php } ?>
								<?php } } ;?>
                                </div>
                            </div>
						<?php } ;?>
                            <?php if (( get_post_meta($post->ID,'rnr_zo_intro_video_title',true))):?>
							<h1><?php echo do_shortcode(get_post_meta($post->ID,'rnr_zo_intro_video_title',true)); ?></h1>
							<?php endif;?>
                            <?php if (( get_post_meta($post->ID,'rnr_zo_intro_video_sub_title',true))):?>
							<h4><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_intro_video_sub_title',true)); ?></h4>
							<?php endif;?>
                            <div class="clearfix"></div>
							<?php if (( get_post_meta($post->ID,'rnr_zo_intro_video_button_url',true))):?>
                            <a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_zo_intro_video_button_url',true)); ?>" class="btn <?php if(get_post_meta($post->ID,'rnr_zo_intro_video_button_target',true)!='_blank'){ ?>ajax<?php } ;?>  fl-btn color-bg" <?php if(get_post_meta($post->ID,'rnr_zo_intro_video_button_target',true)=='_blank'){ ?>target="_blank"<?php } ;?>><span><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_intro_video_button_text',true)); ?></span></a>
							<?php endif;?>
                        </div>
                        <?php if(get_post_meta($post->ID,'rnr_zo_intro_video_video_story',true)=='st2'){ ?>
						
                        <!--hero_promo-wrap-->
                        <div class="hero_promo-wrap bot-element2">
                            <div class="hero_promo-title">
                                <h4><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_intro_video_video_story_title',true)); ?></h4>
                                <p><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_intro_video_video_story_content',true)); ?></p>
                            </div>
							<?php if(get_post_meta($post->ID,'rnr_zo_intro_video_video_type_story',true)=='st2'){ ?>
								<div class="hero_promo-button" id="html5-videos"   data-html="#video1">
                                    <?php $zonar_thumbnail_image = rwmb_meta( 'rnr_zo_intro_video_video_story_thumbnail','type=image&size=' );
									 foreach ( $zonar_thumbnail_image as $zonar_thumbnail_images ){ ?>
									<div class="bg" data-bg="<?php echo esc_url(($zonar_thumbnail_images['url']));?>"></div>
									<?php } ;?>
                                    <div class="overlay"></div>
                                    <a href="#"  ><i class="fas fa-play"></i></a>
                                </div>
							<?php } else { ?>
								<div class="hero_promo-button">
								<?php $zonar_thumbnail_image = rwmb_meta( 'rnr_zo_intro_video_video_story_thumbnail','type=image&size=' );
								 foreach ( $zonar_thumbnail_image as $zonar_thumbnail_images ){ ?>
								<div class="bg" data-bg="<?php echo esc_url(($zonar_thumbnail_images['url']));?>"></div>
								<?php } ;?>
								<div class="overlay"></div>
									<a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_zo_intro_video_video_story_video_url',true)); ?>" class="image-popup"  ><i class="fas fa-play"></i></a>
								</div>
							<?php } ;?>
                        </div>
                        <!--hero_promo-wrap end-->
							<?php if(get_post_meta($post->ID,'rnr_zo_intro_video_video_type_story',true)=='st2'){ ?>
							<!-- Hidden video div -->
								<div style="display:none;" id="video1">
									<video class="lg-video-object lg-html5" controls preload="none">
										<source src="<?php echo esc_url(get_post_meta($post->ID,'rnr_zo_intro_video_video_story_video_mp4_url',true)); ?>" type="video/mp4">
									</video>
								</div>
							<?php };?> 
						<?php };?> 
                        
                        
                        <?php if(get_post_meta($post->ID,'rnr_zo_intro_video_number_counter',true)=='st2'){ ?>
						<!-- hero-facts-wrap -->
                        <div class="hero-facts-wrap">
						<?php
						$zonar_number_counter = rwmb_meta( 'rnr_zo_intro_video_number_counter_con_opt' );
						if ( ! empty( $zonar_number_counter ) ) {
						foreach ( $zonar_number_counter as $zonar_number_counters ) { ;?>
						<?php $zonar_number_counter_title = isset( $zonar_number_counters['rnr_zo_intro_video_number_counter_title'] ) ? $zonar_number_counters['rnr_zo_intro_video_number_counter_title'] : ''; ?>
						<?php $zonar_number_counter_number = isset( $zonar_number_counters['rnr_zo_intro_video_number_counter_number'] ) ? $zonar_number_counters['rnr_zo_intro_video_number_counter_number'] : ''; ?>
						<?php if ( !empty( $zonar_number_counter_title ) ) { ?>
						<?php if ( !empty( $zonar_number_counter_number ) ) { ?>
                            <!-- inline-facts -->
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="<?php echo esc_attr($zonar_number_counter_number);?>">0</div>
                                    </div>
                                </div>
                                <h6><?php echo esc_html($zonar_number_counter_title);?></h6>
                            </div>
                            <!-- inline-facts end -->
                            <?php } ;?>
                            <?php } ;?>
                            <?php } } ;?>
                        </div>
                        <!-- hero-facts-wrap  end-->
						<?php } ;?>
                        <?php if(get_post_meta($post->ID,'rnr_zo_intro_video_loaction_tooltip',true)=='st2'){ ?>
                        <div class="hero-decor-numb hdn2">
						<?php
						$zonar_top_con = rwmb_meta( 'rnr_zo_intro_video_loc_tooltip_content' );
						if ( ! empty( $zonar_top_con ) ) {
						foreach ( $zonar_top_con as $zonar_top_cons ) { ;?>
						<?php $zonar_intro_text_top = isset( $zonar_top_cons['rnr_zo_intro_video_lo_tooltip_intro'] ) ? $zonar_top_cons['rnr_zo_intro_video_lo_tooltip_intro'] : ''; ?>
						<?php if ( !empty( $zonar_intro_text_top ) ) { ?>
						<span><?php echo esc_html($zonar_intro_text_top);?>  </span>
						<?php } ;?>
						<?php } } ;?>
						<?php if(get_post_meta($post->ID,'rnr_zo_intro_video_top_con_hover_intro',true)):?>
						<a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_zo_intro_video_top_con_hover_intro_url',true));?>" target="_blank" class="hero-decor-numb-tooltip"><?php echo esc_html(get_post_meta($post->ID,'rnr_zo_intro_video_top_con_hover_intro',true));?></a>
						<?php endif;?>
						</div>
						<?php } ;?>
                    </div>
                    <!-- fs-slider-wrap end -->
                    <?php if (( get_post_meta($post->ID,'rnr_zo_intro_video_extra_button_url',true))):?>
                    <a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_zo_intro_video_extra_button_url',true)); ?>" class="<?php if(get_post_meta($post->ID,'rnr_zo_intro_video_extra_buttn_target',true)!='_blank'){ ?>ajax<?php } ;?> start-btn st2" <?php if(get_post_meta($post->ID,'rnr_zo_intro_video_extra_buttn_target',true)=='_blank'){ ?>target="_blank"<?php } ;?>><span> <?php echo esc_html(get_post_meta($post->ID,'rnr_zo_intro_video_extra_button_text',true)); ?> <i class="fal fa-long-arrow-right"></i></span></a>
					<?php endif;?>
                    <div class="body-color-bg"></div>
                </div>
                <!-- content end-->