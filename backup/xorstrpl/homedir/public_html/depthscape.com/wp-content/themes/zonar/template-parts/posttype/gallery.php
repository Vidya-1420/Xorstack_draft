								<?php $zonar_images = rwmb_meta( 'rnr_wr_galleryimg_blog','type=image&size=' ); ?>
									<?php if ( ! empty( $zonar_images ) ) { ?>
									<div class="blog-media fl-wrap">
                                        <div class="single-slider-wrap">
                                            <div class="single-slider fl-wrap">
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper lightgallery">
													<?php foreach ( $zonar_images as $zonar_image ){ ?>
                                                        <div class="swiper-slide hov_zoom"><img src="<?php echo esc_url(($zonar_image['url']));?>" alt="<?php echo esc_attr(($zonar_image['title']));?>"><a href="<?php echo esc_url(($zonar_image['url']));?>" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a></div>
                                                    <?php } ;?>    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ss-slider-pagination_wrap">
                                                <div class="ss-slider-pagination"></div>
                                            </div>
                                            <div class="ss-slider-cont ss-slider-cont-prev"><i class="fal fa-angle-left"></i></div>
                                            <div class="ss-slider-cont ss-slider-cont-next"><i class="fal fa-angle-right"></i></div>
                                        </div>
                                    </div>
									<?php } ;?>