<?php $zonar_options = get_option('zonar'); ?>
<?php get_header();?>
<?php if(get_post_meta($post->ID,'rnr_blog_details_layout_opt',true)=='st2'){ ?> 
    <?php get_template_part('template-parts/blog-details/blog-left');?>
<?php }
else if(get_post_meta($post->ID,'rnr_blog_details_layout_opt',true)=='st3') { ?>
     <?php get_template_part('template-parts/blog-details/blog-right');?>
<?php }
else  { ?>
	<?php get_template_part('template-parts/blog-details/block');?>
<?php }?>
<?php get_footer(); ?>	