<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 7.8.0
 */

defined('ABSPATH') || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if (!function_exists('wc_get_gallery_image_html')) {
    return;
}

global $product;

$post_thumbnail_id = $product->get_image_id();
$image         = wp_get_attachment_image($post_thumbnail_id, 'zonar_shop_gallery', true,array( "class" => "attachment-shop_single size-shop_single wp-post-image " ));


$wrapper_classes = apply_filters('woocommerce_single_product_image_gallery_classes', array(
    'fl-wrap',
    ' ' . (has_post_thumbnail() ? 'with-images' : 'without-images'),
    'images',

));

?>
</ul>
</div>
<div class="blog-media fl-wrap <?php echo esc_attr(implode(' ', array_map('sanitize_html_class', $wrapper_classes))); ?>">
<div class="single-slider-wrap">



<?php
 if (has_post_thumbnail()) {
 $attachment_ids = $product->get_gallery_image_ids();
 $lightbox_src = wc_get_product_attachment_props($post_thumbnail_id);
	if ($attachment_ids) {
  
   echo '<div class="single-slider fl-wrap">';
   echo '<div class="swiper-container">';
   echo '<div class="swiper-wrapper lightgallery">';
   

    
   
    echo '<div class="swiper-slide hov_zoom woocommerce-product-gallery__image">' . $image . '<a class="box-media-zoom   image-popup"   href="'.$lightbox_src['url'].'" ><i class="fal fa-search"></i></a></div> ';

    
        foreach ($attachment_ids as $attachment_id) {
             $thumbnail_image     = wp_get_attachment_image($attachment_id, 'restabook_shop_gallery');
             $lightbox_src = wc_get_product_attachment_props($attachment_id);
            // fw_print($thumbnail_src);
              echo '<div class="swiper-slide hov_zoom ">' . $thumbnail_image . '<a class="box-media-zoom   image-popup"  href="'.$lightbox_src['url'].'" ><i class="fal fa-search"></i></a></div>';

        }
    
	
    echo "</div>";
	do_action( 'woocommerce_product_thumbnails' );
    echo "</div>";
    echo "</div>";
    
	}
	else {
	echo '<div class="single-sliders fl-wrap"><div class="lightgallery"><div class=" hov_zoom woocommerce-product-gallery__image fl-wrap">' . $image . '<a class="box-media-zoom   image-popup"   href="'.$lightbox_src['url'].'" ><i class="fal fa-search"></i></a></div></div></div> ';
	}
	
} else {
    $html = '<div class="woocommerce-product-gallery__image--placeholder">';
    $html .= sprintf('<img src="%s" alt="%s" class="wp-post-image" />', esc_url(wc_placeholder_img_src()), esc_html__('Awaiting product image', 'woocommerce'));
    $html .= '</div>';
}

//echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id);


?>



</div>
</div>

			