<?php $zonar_options = get_option('zonar'); ?>
<?php get_header();?>
<div class="content full-height" data-pagetitle="404">
                    <div class="fs-hero-wrap">
                        <div class="bg" data-bg="<?php echo esc_url(Zonar_AfterSetupTheme::return_thme_option('404back','url'));?>"></div>
                        <div class="overlay"></div>
                        <div class="error-wrap fl-wrap">
                            <div class="container">
                                <h2><?php esc_html_e('404','zonar');?></h2>
                                <p><?php if(!empty($zonar_options['404_page_title'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('404_page_title',''));?><?php else :?><?php esc_html_e('We are sorry, but the Page you were looking for, could not be found.','zonar');?><?php endif;?></p>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn ajax color-bg"><span><?php if(!empty($zonar_options['404_page_title_4'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('404_page_title_4',''));?><?php else: ?><?php esc_html_e('Back to Home Page ','zonar');?><?php endif;?></span></a>
                            </div>
                        </div>
                        <div class="body-color-bg"></div>
                    </div>
                </div>
<?php get_footer(); ?>	