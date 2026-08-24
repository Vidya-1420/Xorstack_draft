<?php
define('ZONAR_THEME_PATH', get_template_directory());
define('ZONAR_THEME_URL', get_template_directory_uri());
define('ZONAR_THEME_VERSION', '4.3');
// Enqueue Style
require(ZONAR_THEME_PATH . '/includes/style.php');
require(ZONAR_THEME_PATH . '/includes/js.php');
require(ZONAR_THEME_PATH . '/includes/color.php');
require(ZONAR_THEME_PATH . '/includes/AfterSetupTheme.php');
require(ZONAR_THEME_PATH . '/includes/functions.php');
require(ZONAR_THEME_PATH . '/pagination.php');
require (ZONAR_THEME_PATH . '/includes/ini/zonar-base.php');
require (ZONAR_THEME_PATH . '/zonar-widget/zonar-widget.php');

if ( ! isset( $content_width ) ) $content_width = 900;	

$zonar_options = get_option('zonar');

// register nav menu
function zonar_register_menus() {
register_nav_menus( array( 
'top-menu' => esc_html__( 'Primary menu','zonar' ),
)
);
}

add_action( 'after_setup_theme', 'zonar_setup' );

function zonar_setup() {
	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );
	// Enqueue editor styles.
	add_editor_style( 'style-editor.css' );
	
	// Add custom editor font sizes.
	add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Small', 'zonar' ),
					'shortName' => esc_html__( 'S', 'zonar' ),
					'size'      => 11,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'zonar' ),
					'shortName' => esc_html__( 'M', 'zonar' ),
					'size'      => 12,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'zonar' ),
					'shortName' => esc_html__( 'L', 'zonar' ),
					'size'      => 36,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'zonar' ),
					'shortName' => esc_html__( 'XL', 'zonar' ),
					'size'      => 49,
					'slug'      => 'huge',
				),
			)
		);
	
	add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'Lightning Yellow', 'zonar' ),
            'slug' => 'lightning-yellow',
            'color' => '#F9BF26',
        ),
        array(
            'name' => esc_html__( 'Black', 'zonar' ),
            'slug' => 'color-black',
            'color' => '#000',
        ),
        
    ) );
	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );
	
	add_action( 'after_setup_theme', 'zonar_lang_setup' );
	function zonar_lang_setup(){
    load_theme_textdomain('zonar', get_template_directory() . '/languages');
    }
	add_theme_support( 'automatic-feed-links' );
	remove_theme_support( 'widgets-block-editor' );
	add_theme_support( "title-tag" );
	add_theme_support( 'post-formats', array('image','video','gallery') );
	add_post_type_support( 'portgallery', 'post-formats' );
}
// Word Limit 
	function zonar_string_limit_words($string, $word_limit)
	{
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
	}
// Add post thumbnail functionality
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 559, 220, true ); // Normal post thumbnails
	add_image_size( 'zonar_blog_image', 370, 208, true ); // Blog Thumbnail
	add_image_size( 'zonar_portfolio_image', 758, 520, true ); // Portfolio Thumbnail
	add_image_size( 'zonar_portfolio_image_gallery_car', 604, 400, true ); // Portfolio Thumbnail
	add_image_size( 'zonar_port_gallery_header', 762, 441, true ); //galeery header
	add_image_size( 'zonar_blog', 695, 375, true ); //blog
	add_image_size( 'zonar_shop_cover', 349, 395, true ); // music Thumbnail
//comment	
function zonar_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
 
add_filter( 'comment_form_fields', 'zonar_move_comment_field_to_bottom' );

// How comments are displayed
function zonar_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
?>
    <<?php echo esc_attr($tag); ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?>>
    <?php if ( 'div' != $args['style'] ) : ?>
	<?php endif; ?>
    
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<div class="comment-author">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, '50' ); ?>
    </div>
	<cite class="fn"><?php printf(__('%s','zonar'), get_comment_author_link()) ?></cite>
	<div class="comment-meta">
    <h6><a href="#"><?php comment_date(get_option( 'date_format')); ?></a>  <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></h6>
    </div>
	<div class="comment-text">
		<?php comment_text() ?>
	</div>
	
	</div>
   
     
	 
     <div class="clearfix"></div>
      <?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.','zonar') ?></em>
    <br />
	
   <?php endif; ?>    
<?php if ( 'div' != $args['style'] ) : ?>
    
    <?php endif; ?>
<?php
        }
// create sidebar & widget area
if(function_exists('register_sidebar')) {
function zonar_theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'Blog Sidebar', 'zonar' ),
        'id' => 'sidebar-1',
        'description' => esc_html__( 'This area for Blog page widgets.', 'zonar' ),
        'before_widget' => '<div id="%1$s" class="widget blog-widget  fl-wrap single-side-bar %2$s">',
		'after_widget'  => '</div>', 
		'before_title'  => '<div class="blog-widget-title  fl-wrap">', 
		'after_title'   => '</div>'
    ) );
}
add_action( 'widgets_init', 'zonar_theme_slug_widgets_init' );

function zonar_blog_slug_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'Blog Details Sidebar', 'zonar' ),
        'id' => 'sidebar-2',
        'description' => esc_html__( 'This area for Blog Details page widgets.', 'zonar' ),
        'before_widget' => '<div id="%1$s" class="widget blog-widget  fl-wrap single-side-bar %2$s">',
		'after_widget'  => '</div>', 
		'before_title'  => '<div class="blog-widget-title  fl-wrap">', 
		'after_title'   => '</div>'
    ) );
}
add_action( 'widgets_init', 'zonar_blog_slug_widgets_init' );

if (class_exists('WooCommerce')) {
function solonick_woo_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'WOOCOMMERCE Sidebar', 'zonar' ),
        'id' => 'sidebar-3',
        'description' => esc_html__( 'This area for All WOOCOMMERCE Widget.', 'zonar' ),
        'before_widget' => '<div id="%1$s" class="widget widget-wrap fl-wrap single-side-bar %2$s">',
		'after_widget'  => '</div>', 
		'before_title'  => '<h4 class="widget-title">', 
		'after_title'   => '</h4>'
    ) );
}
add_action( 'widgets_init', 'solonick_woo_widgets_init' );
}
}

if (is_admin() && isset($_GET['activated'])){

  wp_redirect(admin_url("themes.php?page=zonar"));
}

if(function_exists('vc_set_as_theme')) vc_set_as_theme();
// Initialising Shortcodes
if (class_exists('WPBakeryVisualComposerAbstract')) {
  function requireVcExtend(){
    require_once (ZONAR_THEME_PATH . '/extendvc/extend-vc.php');
  }
}

function zonar_my_search_form( $form ) {
$zonar_options = get_option('zonar');
if(!empty($zonar_options['translet_opt_6'])) {
$zonar_search_text = esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_6',''));
}
else {
$zonar_search_text ='Type & Hit Enter...';
}
    $zonar_form = '<div class="blog-search-wrap"><form role="search" method="get" id="searchform" class="searh-inner fl-wrap" action="' . esc_url(home_url( '/' )) . '" >
    <div><label class="screen-reader-text" for="s">' . esc_html__( 'Search for:','zonar' ) . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" class="search" placeholder="'. esc_attr($zonar_search_text).'" />
    <button><i class="fal fa-search"></i></button>
    </div>
    </form></div>';
 
    return $zonar_form;
}
add_filter( 'get_search_form', 'zonar_my_search_form' );


function zonar_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'zonar_excerpt_more');
function xen_excerpt_length( $length ) {
    return 22;
}
add_filter( 'excerpt_length', 'xen_excerpt_length', 999 );
/* CHECK WOOCOMMERCE IS ACTIVE
  ================================================== */ 
  if ( ! function_exists( 'zonar_woocommerce_activated' ) ) {
    function zonar_woocommerce_activated() {
      if ( class_exists( 'woocommerce' ) ) {
        return true;
      } else {
        return false;
      }
    }
}
function woocommerce_pagination() {
		zonar_pagination(); 		
	}
add_action( 'woocommerce_pagination', 'woocommerce_pagination', 10);

/**
 * Change number of related products output
 */ 
function woo_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'zonar_related_products_args', 20 );
  function zonar_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 3 related products
	$args['columns'] = 3; // arranged in 1 columns
	return $args;
}
add_filter( 'run_wptexturize', '__return_false' );

/*removing default submit tag*/
remove_action('wpcf7_init', 'wpcf7_add_form_tag_submit');
/*adding action with function which handles our button markup*/
add_action('wpcf7_init', 'zonar_child_cf7_button');
/*adding out submit button tag*/
if (!function_exists('zonar_child_cf7_button')) {
function zonar_child_cf7_button() {
wpcf7_add_form_tag('submit', 'zonar_child_cf7_button_handler');
}
}

/*out button markup inside handler*/
if (!function_exists('zonar_child_cf7_button_handler')) {
function zonar_child_cf7_button_handler($tag) {
$tag = new WPCF7_FormTag($tag);
$class = wpcf7_form_controls_class($tag->type);
$atts = array();
$atts['class'] = $tag->get_class_option($class);
$atts['class'] .= ' zonar-child-custom-btn';
$atts['id'] = $tag->get_id_option();
$atts['tabindex'] = $tag->get_option('tabindex', 'int', true);
$value = isset($tag->values[0]) ? $tag->values[0] : '';
if (empty($value)) {
$value = esc_html__('Send', 'zonar');
}
$atts['type'] = 'submit';
$atts = wpcf7_format_atts($atts);
$html = sprintf('<button class="btn fl-btn color-bg wpcf7-form-control wpcf7-submit"><span>%2$s</span></button>', $atts, $value);
return $html;
}
}

add_filter("use_block_editor_for_post_type", "zonar_disable_gutenberg_editor");
function zonar_disable_gutenberg_editor()
{
return false;
}
//body class
function zonar_body_classes( $classes ) {
$classes[] = 'zonar-v-'.ZONAR_THEME_VERSION.'';
    return $classes;
}
add_filter( 'body_class','zonar_body_classes' );