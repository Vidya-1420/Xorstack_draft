<?php $zonar_options = get_option('zonar');?>
<?php
/*Template Name:Home Page Template*/
 get_header();
?>
<!-- hero-wrap--> 
<?php if(get_post_meta($post->ID,'rnr_wr_intro_sc_opt',true)=='st1'){ ?>
	<?php get_template_part('template-parts/intro/image');?>
	<?php } else if(get_post_meta($post->ID,'rnr_wr_intro_sc_opt',true)=='st2'){ ?>
	<?php get_template_part('template-parts/intro/slider');?>
	<?php } else if(get_post_meta($post->ID,'rnr_wr_intro_sc_opt',true)=='st3'){ ?>
	<?php get_template_part('template-parts/intro/carousel');?>
	<?php } else if(get_post_meta($post->ID,'rnr_wr_intro_sc_opt',true)=='st4'){ ?>
	<?php get_template_part('template-parts/intro/slideshow');?>
	<?php } else if(get_post_meta($post->ID,'rnr_wr_intro_sc_opt',true)=='st5'){ ?>
	<?php get_template_part('template-parts/intro/video');?>
	<?php } else if(get_post_meta($post->ID,'rnr_wr_intro_sc_opt',true)=='st6'){ ?>
	<?php get_template_part('template-parts/intro/rev');?>
	<?php } else if(get_post_meta($post->ID,'rnr_wr_intro_sc_opt',true)=='st7'){ ?>
	<?php get_template_part('template-parts/intro/half-image');?>
	<?php } else if(get_post_meta($post->ID,'rnr_wr_intro_sc_opt',true)=='st0'){ ?>
	<?php } else { ?>
	<?php get_template_part('template-parts/intro/image');?>
<?php } ;?>

<?php get_footer(); ?>	