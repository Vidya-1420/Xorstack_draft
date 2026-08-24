<?php if (has_post_thumbnail( $post->ID ) ):?>


<div class="blog-media fl-wrap">
<?php 
$zonar_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
<img src="<?php echo esc_url($zonar_image[0]);?>"  class="respimg-blog" alt="<?php the_title_attribute();?>">
</div>

<?php endif;?>