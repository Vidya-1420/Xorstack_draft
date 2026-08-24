<?php $zonar_options = get_option('zonar');?>
<?php get_header();?>
<?php
/*Template Name:Portfolio Page Template*/
?>
 
		 <?php if(get_post_meta($post->ID,'rnr_wr_portfolio_pagetype',true)=='st1'){ ?> 
         <?php get_template_part('template-parts/portfolio/horizonatal');?>
		 <?php }
		 else if(get_post_meta($post->ID,'rnr_wr_portfolio_pagetype',true)=='st2'){ ?> 
         <?php get_template_part('template-parts/portfolio/fullscreen-grid');?>
		 <?php }
		 else if(get_post_meta($post->ID,'rnr_wr_portfolio_pagetype',true)=='st3'){ ?> 
         <?php get_template_part('template-parts/portfolio/column-grid');?>
		 <?php }
		 else  { ?>
		 <?php get_template_part('template-parts/portfolio/horizonatal');?>
		 <?php }?>
<?php get_footer(); ?>