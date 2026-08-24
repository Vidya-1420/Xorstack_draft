<?php $zonar_options = get_option('zonar'); ?>
<!-- content-->    
                <div class="content" data-pagetitle="<?php echo wp_trim_words(get_the_title(), 3);?>">
				
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
                    <!--fw-content--> 
                    <div class="fw-content fl-wrap">
                        <!-- container -->   
						<?php if(get_post_meta($post->ID,'rnr_wr_pagetype_container',true)=='st2'){ ?>
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
						<?php } else { ?>
                        <div class="container">
							<section class="scroll_sec " id="sec1">
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
							</section>
                      </div>
						<?php } ;?>
                    <!--fw-wrap end-->    
                    <div class="to-top-btn to-top fw-totop"><i class="fal fa-long-arrow-up"></i></div>
                  </div>
                <!-- content end--> 
				<?php if(get_post_meta($post->ID,'rnr_wr_nav_sc_opt',true)=='st2'){ ?>
				<div class="page-scroll-nav psn_single fw-scroll_nav">
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
				
                <div class="hero-scroll-down-notifer">
                    <div class="scroll-down-wrap ">
                        <div class="mousey">
                            <div class="scroller"></div>
                        </div>
                    </div>
                    <i class="far fa-angle-down"></i>
                </div>
                					
            </div>