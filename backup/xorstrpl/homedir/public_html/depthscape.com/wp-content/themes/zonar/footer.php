<?php $zonar_options = get_option('zonar'); ?>
			<!-- share-wrapper-->
                <div class="share-wrapper">
                    <div class="close-share-btn"><i class="fal fa-long-arrow-left"></i></div>
                    <div class="share-container fl-wrap  isShare" data-share="[<?php if (Zonar_AfterSetupTheme::return_thme_option('headershare_facebook_opt')!='st2'){ ?>'facebook',<?php } ;?> <?php if (Zonar_AfterSetupTheme::return_thme_option('headershare_pinterest_opt')!='st2'){ ?>'pinterest',<?php };?> <?php if (Zonar_AfterSetupTheme::return_thme_option('headershare_tumblr_opt')!='st2'){ ?>'tumblr',<?php } ;?> <?php if (Zonar_AfterSetupTheme::return_thme_option('headershare_twitter_opt')!='st2'){ ?>'twitter',<?php } ;?> <?php if (Zonar_AfterSetupTheme::return_thme_option('headershare_linkedin_opt')!='st2'){ ?>'linkedin',<?php } ;?> <?php if (Zonar_AfterSetupTheme::return_thme_option('headershare_digg_opt')!='st2'){ ?>'digg',<?php } ;?> <?php if (Zonar_AfterSetupTheme::return_thme_option('headershare_reddit_opt')!='st2'){ ?>'reddit',<?php } ;?> <?php if (Zonar_AfterSetupTheme::return_thme_option('headershare_email_opt')!='st2'){ ?>'email'<?php } ?>]"></div>
                </div>
                <!-- share-wrapper  end -->
            </div>
            <!--wrapper end -->
            <!-- cursor-->
			<?php if(!empty($zonar_options['opt-theme-style'])):?>
			<?php $zonar_mouse_color= esc_attr(Zonar_AfterSetupTheme::return_thme_option('opt-theme-style',''));?>
			<?php else : ?>
			<?php $zonar_mouse_color= '#F68338';?>
			<?php endif;?>
            <div class="element">
                <div class="element-item" data-mouseback="<?php echo esc_attr($zonar_mouse_color);?>" data-mouseborder="<?php echo esc_attr($zonar_mouse_color);?>"></div>
            </div>
            <!-- cursor end-->          
        </div>
        <!-- Main end -->
<?php wp_footer(); ?>
</body>
</html>