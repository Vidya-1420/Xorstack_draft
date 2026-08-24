<?php $zonar_options = get_option('zonar'); ?>
<?php
get_header();
 ?>


<?php if ( is_singular( 'product' ) ) {
           woocommerce_content();
          }else{
          //For ANY product archive.
          //Product taxonomy, product search or /shop landing
           wc_get_template( 'archive-product.php' );
          }?>

<?php get_footer(); ?>	
