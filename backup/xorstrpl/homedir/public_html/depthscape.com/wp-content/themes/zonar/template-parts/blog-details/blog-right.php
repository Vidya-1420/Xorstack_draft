<?php $zonar_options = get_option('zonar'); ?>
<?php if(have_posts()) : while ( have_posts() ) : the_post();?>
<!-- content-->    
<div class="content" data-pagetitle="<?php echo wp_trim_words( get_the_title(), 3 ); ?>">
	<?php if(get_post_meta($post->ID,'rnr_wr_page_blog_dt_scrolling_ani',true)!='st2'){ ?>
        <!-- hero-section-dec-->                  
        <div class="hero-section-dec color-bg">
            <div class="progress-indicator">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 34 34">
                    <circle cx="16" cy="16" r="15.9155" class="progress-bar__background" />
                    <circle cx="16" cy="16" r="15.9155" class="progress-bar__progress js-progress-bar" />
                </svg>
            </div>
        </div>
        <!-- hero-section-dec end--> 
	<?php } ;?>
        <!--fw-content--> 
        <div class="fw-content fl-wrap">
            <!-- container -->   
            <div class="container">
				<div class="col-wc_dec"></div>
				<section class="scroll_sec " id="sec1">
                    <div class="container">
                        
                        <div class="row">
							<div class="<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>col-md-8<?php else : ?>col-md-12<?php endif;?>">
							<div class="section-title">
                            <h3><?php the_title();?></h3>
                                        <ul class="blog-title-opt  fl-wrap">
                                            <li><a href="#0"><?php the_time( get_option( 'date_format' ) ); ?></a></li>
											<?php if( has_category() ) {?>
                                            <li> - </li>
                                            <li><?php the_category(' ') ?></li>
											<?php }?>
                                            <li> - </li>
                                            <li><a href="#0"><span class="author_avatar"> 
											<?php
											// Display author avatar
											echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( '', 30 ) ); ?>
											</span><?php the_author();?></a></li>
                                        </ul>
							</div>
							<!-- blog media -->
                                    <?php if( has_post_format( 'image' ) !='') :?>
									<?php get_template_part('template-parts/posttype/image');?>	
									<?php elseif( has_post_format( 'video' ) !='') :?>
									<?php get_template_part('template-parts/posttype/video');?>
									<?php elseif( has_post_format( 'gallery' ) !='') :?>
									<?php get_template_part('template-parts/posttype/gallery');?>
									<?php else :?>
									<?php get_template_part('template-parts/posttype/image');?>	
									<?php endif;?>
                                    <!-- blog media end -->                                    
                                    <div class="fl-wrap text-block">
									<?php if( has_tag() ) {?>
                                        <div class="pr-tags">
                                            <span><?php if(!empty($zonar_options['translet_opt_19'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_19',''));?> : <?php else: ?><?php esc_html_e('Tags : ','zonar');?><?php endif;?></span>
                                            <ul>
                                                <?php the_tags( '<li>', '</li><li>', '</li>' ); ?>
                                            </ul>
                                        </div>
									<?php } ;?>
                                        <div class="clearfix"></div>
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
                                    </div>
									<?php if ( comments_open() || get_comments_number() ) { ?>
									<div id="comments" class="single-post-comm">
                                    <?php comments_template();?>
									</div>
									<?php }?>
 
							</div>
							<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
							<div class="col-md-4">
							<!-- blog-widgets -->    
 								<div class="blog-widgets fl-wrap">
									<?php dynamic_sidebar( 'sidebar-2' ); ?>
								</div>
							<!-- blog-widgets end--> 
							</div>
							<?php endif;?>
						</div>
				</div>
                <!-- container end -->
				<div class="section-number"> <span>0</span>1. </div>
				
                </section>
				
                <!--section end--> 
            </div>
            <!--fw-wrap end-->    
            <div class="to-top-btn to-top fw-totop"><i class="fal fa-long-arrow-up"></i></div>
        </div>
		<!-- content end--> 
		<?php if(get_post_meta($post->ID,'rnr_wr_page_blog_dt_pagination',true)!='st2'){ ?>
		<div class="page-scroll-nav blog-dt-nav psn_single fw-scroll_nav ">
                        <!--content-nav_holder-->            
                        <div class="content-nav_holder">
                            <div class="content-nav">
							<div class="container">
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
											<?php if(!empty($zonar_options['blogpageurl'])):?>
											<a href="<?php echo esc_url(Zonar_AfterSetupTheme::return_thme_option('blogpageurl',''));?>" class="ln ajax"><i class="fal fa-long-arrow-left"></i><span><?php if(!empty($zonar_options['translet_opt_25'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_25',''));?><?php else: ?><?php esc_html_e('Back To Blog','zonar');?><?php endif;?></span></a>
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
											<?php if(!empty($zonar_options['blogpageurl'])):?>
											<a href="<?php echo esc_url(Zonar_AfterSetupTheme::return_thme_option('blogpageurl',''));?>" class="rn ajax"><span ><?php if(!empty($zonar_options['translet_opt_25'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_25',''));?><?php else: ?><?php esc_html_e('Back To Blog','zonar');?><?php endif;?></span> <i class="fal fa-long-arrow-right"></i></a>
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
                        </div>
                        <!--content-nav_holder end -->   
        </div>
		<?php } ;?>
        <div class="hero-scroll-down-notifer">
            <div class="scroll-down-wrap ">
                <div class="mousey">
                    <div class="scroller"></div>
                </div>
            </div>
            <i class="far fa-angle-down"></i>
        </div>
                					
</div>
<?php endwhile;  endif; wp_reset_postdata(); ?>