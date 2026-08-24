<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>> 
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php $zonar_options = get_option('zonar'); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?php 
	wp_head(); 
	?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
		<?php if (Zonar_AfterSetupTheme::return_thme_option('preloader_opt')!='st2'){ ?>
		<!-- loader   -->
        <div class="loader">
            <div class="loading-text-container "><span class="loading-text"><?php esc_html_e('Load','zonar')?><strong><?php esc_html_e('ing','zonar')?></strong></span> <span class="loader_count">0</span></div>
            <div class="loader-anim"></div>
            <div class="loader-anim2 color-bg"></div>
        </div>
        <!-- loader  end-->
		<?php } ;?>
        <!-- main start  -->
        <div id="main">
            <!-- header-->
            <header class="main-header">
                <!-- logo  -->
				<?php if (Zonar_AfterSetupTheme::return_thme_option('textlogo')=='st2'){ ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ajax logo-holder dsk-logo"><img src="<?php echo esc_url(Zonar_AfterSetupTheme::return_thme_option('logopic','url'));?>" alt="<?php  bloginfo('name'); ?>"></a>
				<?php if(!empty(Zonar_AfterSetupTheme::return_thme_option('logopic_responsive','url'))) { ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ajax logo-holder mob-logo mob-orginal"><img alt="<?php  bloginfo('name'); ?>"  src="<?php echo esc_url(Zonar_AfterSetupTheme::return_thme_option('logopic_responsive','url'));?>"></a>
				<?php } else { ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ajax logo-holder mob-logo"><img alt="<?php  bloginfo('name'); ?>"  src="<?php echo esc_url(Zonar_AfterSetupTheme::return_thme_option('logopic','url'));?>"></a>
				<?php } ;?>
				<?php }
				else{ ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ajax logo-holder">
				<?php if(!empty($zonar_options['logotext'])):?>
				<h1 class="ns-text-logo"><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('logotext',''));?></h1>
				<?php else:?>
				<h1 class="ns-text-logo"><?php  bloginfo('name'); ?></h1>
				<?php endif;?>
				</a>
				<?php } ;?>
                
                <!-- logo end -->
				<?php if(has_nav_menu('top-menu')) { ?>
                <!-- nav-button-wrap-->
                <div class="nav-button but-hol">
                    <span  class="ncs"></span>
                    <span class="nos"></span>
                    <span class="nbs"></span>
                    <div class="menu-button-text"><?php if(!empty($zonar_options['menu_st_title'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('menu_st_title',''));?><?php else: ?><?php esc_html_e('Menu','zonar');?><?php endif;?></div>
                </div>
                <!-- nav-button-wrap end-->
				<?php } ;?>
                <!-- header-contacts-->
                <div class="header-contacts">
                    <ul>
						<?php if(!empty($zonar_options['hd_phn_number'])):?>
                        <li><span><?php if(!empty($zonar_options['header_con_title1'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('header_con_title1',''));?><?php else: ?><?php esc_html_e('01. Call ','zonar');?><?php endif;?></span> <a href="tel:<?php echo esc_attr(Zonar_AfterSetupTheme::return_thme_option('hd_phn_number',''));?>"><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('hd_phn_number',''));?></a></li>
						<?php endif;?>
						<?php if(!empty($zonar_options['hd_email_address'])):?>
                        <li><span><?php if(!empty($zonar_options['header_con_title2'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('header_con_title2',''));?><?php else: ?><?php esc_html_e('02. Write ','zonar');?><?php endif;?></span> <a href="mailto:<?php echo esc_attr(Zonar_AfterSetupTheme::return_thme_option('hd_email_address',''));?>"><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('hd_email_address',''));?></a></li>
						<?php endif;?>
                    </ul>
                    
					<?php global $zonar_button_class;?>
					<?php if (Zonar_AfterSetupTheme::return_thme_option('headercontact_opt')=='st2'){ ?>
					<?php if (Zonar_AfterSetupTheme::return_thme_option('headercontact_url_type')!='st2'){
					$zonar_button_class ='ajax';
					 };?>
						<a href="<?php echo esc_url(Zonar_AfterSetupTheme::return_thme_option('con_p_url',''));?>" class="<?php echo sanitize_html_class($zonar_button_class);?> contacts-btn"><?php if(!empty($zonar_options['contact_bt_title'])):?>
						<?php echo esc_attr(Zonar_AfterSetupTheme::return_thme_option('contact_bt_title',''));?>
						<?php else: ?>
						<?php esc_html_e('Get in touch','zonar');?>
						<?php endif;?></a>
					<?php } ;?>
                </div>
                <!-- header-contacts end-->
            </header>
            <!-- header end-->
			<?php if (Zonar_AfterSetupTheme::return_thme_option('social_show_hide_opt_head')=='st2'){ ?>
            <!-- left-header-->
            <aside class="left-header">
                <span class="lh_dec color-bg"></span>
                <div class="left-header_social">
                    <ul >
                        <?php if(!empty($zonar_options['facebook'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($zonar_options['facebook']);?>"><i class="fab fa-facebook-f"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($zonar_options['twitter'])):?>
                         <li><a target="_blank" href="<?php echo esc_url($zonar_options['twitter']);?>"><i class="fab fa-twitter"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($zonar_options['pinterest'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($zonar_options['pinterest']);?>"><i class="fab fa-pinterest"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($zonar_options['dribbble'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($zonar_options['dribbble']);?>"><i class="fab fa-dribbble"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($zonar_options['behance'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($zonar_options['behance']);?>"><i class="fab fa-behance"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($zonar_options['gplus'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($zonar_options['gplus']);?>"><i class="fab fa-google-plus"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($zonar_options['linkedin'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($zonar_options['linkedin']);?>"><i class="fab fa-linkedin"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($zonar_options['youtube'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($zonar_options['youtube']);?>"><i class="fab fa-youtube"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($zonar_options['vimeo'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($zonar_options['vimeo']);?>"><i class="fab fa-vimeo"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($zonar_options['slack'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($zonar_options['slack']);?>"><i class="fab fa-slack"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($zonar_options['instagram'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($zonar_options['instagram']);?>"><i class="fab fa-instagram"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($zonar_options['tumblr'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($zonar_options['tumblr']);?>"><i class="fab fa-tumblr"></i></a></li>
						<?php endif;?>
						<?php
						$zonar_more_social = Zonar_AfterSetupTheme::return_thme_option('opt_add_more_social','');
						if ( ! empty( $zonar_more_social ) ) {
						foreach ( $zonar_more_social as $zonar_more_socials ) { ;?>
						<?php echo balanceTags($zonar_more_socials);?>
						<?php } } ;?> 
                    </ul>
                </div>
            </aside>
            <!-- left-header end-->
			<?php } ;?>
			<?php if (Zonar_AfterSetupTheme::return_thme_option('headershare_opt')=='st2'){ ?>
            <!-- share button-->
            <div class="share-btn showshare color-bg"><span><?php if(!empty($zonar_options['share_bt_title1'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('share_bt_title1',''));?><?php else : ?><?php esc_html_e('Share','zonar');?><?php endif;?> <i class="fal fa-plus"></i></span></div>
            <!-- share button end-->
			<?php } ;?>
            <!-- right header-->
            <div class="hc_dec_color">
                <div class="page-subtitle"><span></span></div>
            </div>
			
            <!-- right header end-->
            <!-- wrapper  -->
            <div id="wrapper">
			<!-- content-holder  -->	
            <?php get_template_part('template-parts/main-header');?>
				