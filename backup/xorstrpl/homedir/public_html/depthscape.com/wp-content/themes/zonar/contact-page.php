<?php $zonar_options = get_option('zonar');?>
<?php
/*Template Name: Contact Page Template*/
 get_header();
?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="content full-height no-mob-hidden2" data-pagetitle="<?php the_title();?>">
			   <?php if(get_post_meta($post->ID,'rnr_rs_intro_google_map_con_info',true)=='st2'){ ?>
               <div class="content-inner">
                  <div class="content-front">
                     <div class="cf-inner">
                        <div class="contact-details-title fl-wrap">
                           <?php if (( get_post_meta($post->ID,'rnr_rs_intro_google_map_title',true))):?>
                            <h2><?php echo esc_html(get_post_meta($post->ID,'rnr_rs_intro_google_map_title',true)); ?></h2>
							<?php endif;?>
                        </div>
                        <div class="contact-details fl-wrap">
                           <ul>
                              
							<?php if (( get_post_meta($post->ID,'rnr_rs_intro_google_map_email_content',true))):?>
                            <li><span><?php if (( get_post_meta($post->ID,'rnr_rs_intro_google_map_email_title',true))):?><?php echo esc_html(get_post_meta($post->ID,'rnr_rs_intro_google_map_email_title',true)); ?><?php else : ?><?php esc_html_e('01. Mail','zonar');?><?php endif;?> :</span> <a href="mailto:<?php echo esc_attr(get_post_meta($post->ID,'rnr_rs_intro_google_map_email_content',true)); ?>"><?php echo esc_html(get_post_meta($post->ID,'rnr_rs_intro_google_map_email_content',true)); ?></a></li>
							<?php endif;?>  
							<?php if (( get_post_meta($post->ID,'rnr_rs_intro_google_map_address_content',true))):?>
                            <li><span><?php if (( get_post_meta($post->ID,'rnr_rs_intro_google_map_address_title',true))):?><?php echo esc_html(get_post_meta($post->ID,'rnr_rs_intro_google_map_address_title',true)); ?><?php else : ?><?php esc_html_e('02. Adress','zonar');?><?php endif;?> :</span> <a href="#0"><?php echo do_shortcode(get_post_meta($post->ID,'rnr_rs_intro_google_map_address_content',true)); ?></a></li>
							<?php endif;?>
							<?php if (( get_post_meta($post->ID,'rnr_rs_intro_google_map_phone_title',true))):?>
                            <li><span><?php if (( get_post_meta($post->ID,'rnr_rs_intro_google_map_phone_title',true))):?><?php echo esc_html(get_post_meta($post->ID,'rnr_rs_intro_google_map_phone_title',true)); ?><?php else : ?><?php esc_html_e('03. Phone','zonar');?><?php endif;?> :</span> <?php if (( get_post_meta($post->ID,'rnr_rs_intro_google_map_phone_content',true))):?><a href="tel:<?php echo esc_attr(get_post_meta($post->ID,'rnr_rs_intro_google_map_phone_content',true)); ?>"><?php echo esc_html(get_post_meta($post->ID,'rnr_rs_intro_google_map_phone_content',true)); ?></a><?php endif;?> <?php if (( get_post_meta($post->ID,'rnr_rs_intro_google_map_phone_content2',true))):?> , <a href="tel:<?php echo esc_attr(get_post_meta($post->ID,'rnr_rs_intro_google_map_phone_content2',true)); ?>"><?php echo esc_html(get_post_meta($post->ID,'rnr_rs_intro_google_map_phone_content2',true)); ?></a><?php endif;?></li>
							<?php endif;?>
							
                           </ul>
                        </div>
						<?php if (( get_post_meta($post->ID,'rnr_rs_intro_google_form_shortcode',true))):?>
                        <a href="#" class="btn fl-btn color-bg show_contact-form"><span><?php if (( get_post_meta($post->ID,'rnr_rs_intro_google_form_shortcode_translate_opt',true))):?><?php echo esc_html(get_post_meta($post->ID,'rnr_rs_intro_google_form_shortcode_translate_opt',true)); ?><?php else : ?><?php esc_html_e('Say Hello','zonar');?><?php endif;?></span></a> 
                        <div class="aside-show_cf show_contact-form"><i class="fal fa-envelope"></i></div>
						<?php endif;?>
                     </div>
                  </div>
                  <div class="content-back">
                     <div class="hidden-contact_form-wrap_inner">
                        <div class="close-contact_form cnt-anim"><i class="fal fa-times"></i></div>
                        <div class="contact-details-title fl-wrap">
                            <?php if (( get_post_meta($post->ID,'rnr_rs_intro_google_form_shortcode_title',true))):?>
                            <h2><?php echo esc_html(get_post_meta($post->ID,'rnr_rs_intro_google_form_shortcode_title',true)); ?></h2>
							<?php endif;?>
                        </div>
                        <div id="contact-form" class="fl-wrap">
                           <div id="message"></div>
						   <div  class="custom-form" >
							<?php if (( get_post_meta($post->ID,'rnr_rs_intro_google_form_shortcode',true))):?>
                            <?php echo do_shortcode(get_post_meta($post->ID,'rnr_rs_intro_google_form_shortcode',true)); ?>
							<?php endif;?>
							</div>
                        </div>
                     </div>
                  </div>
               </div>
			   <?php } ;?>
               <div class="map-container">
                  <div id="map-single" class="map" data-latlog="[<?php echo esc_attr(get_post_meta($post->ID,'rnr_rs_intro_google_map_main_location',true)); ?>]" data-popuptext="<?php if (( get_post_meta($post->ID,'rnr_rs_intro_google_map_main_marker_title',true))):?><?php echo esc_attr(get_post_meta($post->ID,'rnr_rs_intro_google_map_main_marker_title',true)); ?><?php else : ?><?php esc_attr_e('My Location in New York.','zonar');?><?php endif;?>" data-icon="<?php $zonar_map_marker = rwmb_meta( 'rnr_rs_intro_google_map_marker','type=image&size=' ); ?><?php if ( ! empty( $zonar_map_marker ) ) { ?><?php foreach ( $zonar_map_marker as $zonar_map_markers ){ ?><?php echo esc_url(($zonar_map_markers['url']));?><?php }; ?><?php } else { ?><?php echo ZONAR_THEME_URL ;?>/includes/images/marker.png<?php } ;?>"></div>
               </div>
			   <?php if(get_post_meta($post->ID,'rnr_rs_intro_google_map_social_opt',true)=='st2'){ ?>
               <div class="main_social">
                  <span class="main-social-title"><?php if (( get_post_meta($post->ID,'rnr_rs_intro_google_social_main_title',true))):?><?php echo esc_html(get_post_meta($post->ID,'rnr_rs_intro_google_social_main_title',true)); ?><?php else : ?><?php esc_html_e('Find on','zonar');?><?php endif;?>:</span>
                  <ul>
				  <?php $zonar_social_item = rwmb_meta( 'rnr_rs_intro_google_social_main_opt' ); 
				  if ( ! empty( $zonar_social_item ) ) { foreach ( $zonar_social_item as $zonar_social_items ) { ;?>
				  <?php $zonar_social_url = isset( $zonar_social_items['rnr_rs_intro_google_social_url'] ) ? $zonar_social_items['rnr_rs_intro_google_social_url'] : ''; ?>
				  <?php $zonar_social_icon = isset( $zonar_social_items['rnr_rs_intro_google_social_icon'] ) ? $zonar_social_items['rnr_rs_intro_google_social_icon'] : ''; ?>
				   <?php if ( !empty( $zonar_social_url ) ) { ?>
				   <?php if ( !empty( $zonar_social_icon ) ) { ?>
                   <li><a href="<?php echo esc_url($zonar_social_url);?>" target="_blank"><i class="<?php echo esc_attr($zonar_social_icon);?>"></i></a></li>
				   <?php } ;?>
				   <?php } ;?>
				   <?php } } ;?>
                     
                  </ul>
               </div>
			   <?php } ;?>
            </div>
<?php endwhile; ?>
<?php wp_reset_postdata();?>
<?php get_footer(); ?>	