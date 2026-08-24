<?php
/*
Plugin Name: Zonar Plugin
Plugin URI: https://webredox.net
Description: Declares a plugin that will create Page Settings, VC addons & Custom Post Type
Version: 2.5.1
Author: webRedox
Author URI: https://webredox.net
License: GPLv2
*/
define('ZONAR_VERSION', '2.5.1');
define('ZONAR_PLUGIN_PATH',		plugin_dir_path(__FILE__));
define('ZONAR_URL', plugins_url('', __FILE__));
// Define the ZONAR_PLUGIN Folder
if( ! defined( 'ZONAR_FILE_' ) ) {
	define('ZONAR_FILE_', __FILE__ );
}
function zonar_plugin_load() {
// Elementor version  required
//$elementor_version_required = '3.0.15';

//if( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
    //add_action('admin_notices', 'zonar_load_fail_out_of_date');
    //return;
//}
include (ZONAR_PLUGIN_PATH .'meta-box-group.php');
include (ZONAR_PLUGIN_PATH .'meta-box-show-hide.php');
include (ZONAR_PLUGIN_PATH .'meta-box-tooltip.php');
include (ZONAR_PLUGIN_PATH .'meta-box-conditional-logic.php');
include (ZONAR_PLUGIN_PATH .'zonar-post-order.php');
include (ZONAR_PLUGIN_PATH .'elmentor-widgets.php');

function zonar_register_metabox_list() {
include (ZONAR_PLUGIN_PATH .'metaboxes.php');
require (ZONAR_PLUGIN_PATH .'/plugin-update-checker/plugin-update-checker.php');
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://webredox.net/demo/wp/zonar/pluginupdate/details.json',
	__FILE__, //Full path to the main plugin file or functions.php.
	'zonar-plugin'
);
}
add_action('init', 'zonar_register_metabox_list');

global $zonar_options;


if( ! function_exists( 'portfolio_post_types' ) ) {
    function portfolio_post_types() {

        register_post_type(
            'portfolio',
            array(
                'labels' => array(
                    'name'          => __( 'Portfolios', 'portfolio' ),
                    'singular_name' => __( 'Portfolio', 'portfolio' ),
                    'add_new'       => __( 'Add New', 'portfolio' ),
                    'add_new_item'  => __( 'Add New Portfolio', 'portfolio' ),
                    'edit'          => __( 'Edit', 'portfolio' ),
                    'edit_item'     => __( 'Edit Portfolio', 'portfolio' ),
                    'new_item'      => __( 'New Portfolio', 'portfolio' ),
                    'view'          => __( 'View Portfolio', 'portfolio' ),
                    'view_item'     => __( 'View Portfolio', 'portfolio' ),
                    'search_items'  => __( 'Search Portfolio', 'portfolio' ),
                    'not_found'     => __( 'No Portfolio item found', 'portfolio' ),
                    'not_found_in_trash' => __( 'No portfolio item found in Trash', 'portfolio' ),
                    'parent'        => __( 'Parent Portfolio', 'portfolio' ),
                ),
                
                'description'       => __( 'Create a Portfolio.', 'portfolio' ),
                'public'            => true,
                'show_ui'           => true,
                'show_in_menu'          => true,
                'publicly_queryable'    => true,
				'capability_type' => 'post',
                'exclude_from_search'   => true,
                'menu_position'         => 6,
                'hierarchical'      => false,
                'query_var'         => true,
				'menu_icon' => 'dashicons-portfolio',
                'supports'  => array (
                    'title', //Text input field to create a post title.
                    'editor',
                    'thumbnail',
                    
                )
            )
        );
register_taxonomy('portfolio_category', 'portfolio', array('hierarchical' => true, 'label' => 'Portfolio Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
        
        

    }
}

add_action( 'init', 'portfolio_post_types' ); // register post type

register_taxonomy_for_object_type('category', 'custom-type');



add_filter('widget_title', 'do_shortcode');
add_shortcode('span', 'wpse_shortcode_span');
function wpse_shortcode_span( $attr, $content ){ return '<span>'. $content . '</span>'; }
add_shortcode('br', 'wpse_shortcode_br');
function wpse_shortcode_br( $attr ){ return '<br>'; }
function zonar_social_media_icons( $zonar_contactmethods ) {
    // Add social media
    
    $zonar_contactmethods['twitter'] = 'Twitter';
    $zonar_contactmethods['facebook'] = 'Facebook';
    $zonar_contactmethods['instagram'] = 'Instagram';
    $zonar_contactmethods['tumblr'] = 'Tumblr';
    $zonar_contactmethods['pinterest'] = 'Pinterest';
    $zonar_contactmethods['youtube'] = 'Youtube';

    return $zonar_contactmethods;
}
add_filter('user_contactmethods','zonar_social_media_icons',10,1);
/* ==========================================
   Add featured image column to admin panel post list page
========================================== */
add_filter('manage_posts_columns', 'add_img_column');
add_filter('manage_posts_custom_column', 'manage_img_column', 10, 2);

function add_img_column($columns) {
	$columns['img'] = 'Thumbnail';
	return $columns;
}

function manage_img_column($column_name, $post_id) {
	if( $column_name == 'img' ) {
		echo get_the_post_thumbnail( $post_id, array( 80, 60) ); return true; // 80, 60 is for image size.
	}
}

// Change columns order
add_filter('manage_posts_columns', 'column_order');
function column_order($columns) {
  $n_columns = array();
  $move = 'img'; // what to move
  $before = 'title'; // move before this
  foreach($columns as $key => $value) {
    if ($key==$before){
      $n_columns[$move] = $move;
    }
      $n_columns[$key] = $value;
  }
  return $n_columns;
}

// Set columns width
function set_column_width() { ?>
	<style type="text/css">
		/*	Class ".column-img" is for image column */
		.edit-php .fixed .column-img { 
			width: 100px;
		}
	</style>
<?php }
add_action( 'admin_enqueue_scripts', 'set_column_width' );

function zonar_year_shortcode() {
  $zonar_year = date('Y');
  return $zonar_year;
}
add_shortcode('zonar_year', 'zonar_year_shortcode');

/**
*
*
*
 * Allow shortcodes in widgets
 * @since v1.0
 */
add_filter('widget_text', 'do_shortcode');

if( !function_exists('symple_fix_shortcodes') ) {
	function symple_fix_shortcodes($content){   
		$array = array (
			'<p>['		=> '[', 
			']</p>'		=> ']', 
			']<br />'	=> ']'
		);
		$content = strtr($content, $array);
		return $content;
	}
	add_filter('the_content', 'symple_fix_shortcodes');
}
// image
if(! function_exists('zonar_image_shortcode')){
	function zonar_image_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'image'=>'',
			'pop_video'=>'',
			'text_translate_opt'=>'Play Story video',
			
			), $atts) );
		if(is_numeric($image)) {
            $zonar_image = wp_get_attachment_url( $image );
            $zonar_title = get_the_title( $image );
        }else {
            $zonar_image = $image;
            $zonar_title = $image;
        }
		
		$html='';
		$dot="'";
		
		
		
		$html .= '<div class="dec-img   fl-wrap">';
		$html .= '<img src="'.esc_url($zonar_image).'" class="respimg" alt="'.esc_attr($zonar_title).'">';
		if($pop_video != ""){
		$html .= '<a class="video_link image-popup" href="'.esc_url($pop_video).'"><i class="fas fa-play"></i><span>'.esc_html($text_translate_opt).'</span></a>';
		}
		$html .= '</div>';
		
				
		return $html;
	}
	add_shortcode('zonar_image', 'zonar_image_shortcode');
}


// Call To Action
if(! function_exists('zonar_call_to_action1_shortcode')){
	function zonar_call_to_action1_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'Ready to order your project ? Visit my contacts page :',
			'button_text'=>'Contacts',
			'button_url'=>'',
			'button_target'=>'',
			'link_type'=>'',
		), $atts) );
		
		
		$html='';
		$link_target_opt ='';
		if($button_target == "_blank"){
		$link_target_opt .='_blank';
		}
		else if($button_target == "_parent"){
		$link_target_opt .='_parent';
		}
		else if($button_target == "_top"){
		$link_target_opt .='_top';
		}
		else {
		$link_target_opt .='_self';
		}
		
		$link_type_opt ='';
		if($link_type != "st2"){
		$link_type_opt .='ajax';
		}
		
		
		$html .= '<div class="srv-link-text fl-wrap">';
		$html .= '<h4>'.$title.'</h4>';
		if($button_url != ""){
		$html .= '<a href="'.esc_url($button_url).'" class="btn  color-bg  fl-btn '.esc_attr($link_type_opt).'" target="'.esc_attr($link_target_opt).'"><span>'.esc_html($button_text).'</span></a>';
		}
		$html .= '</div>';
		
		
				
		return $html;
	}
	add_shortcode('zonar_call_to_action1', 'zonar_call_to_action1_shortcode');
}



// 
if(! function_exists('zonar_team_shortcode')){
	function zonar_team_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'image'=>'',
			'title'=>'',
			'sec_number'=>'',
			'designation'=>'',
			'behance'=>'',
			'facebook'=>'',
			'tiktok'=>'',
			'twitter'=>'',
			'youtube'=>'',
			'vimeo'=>'',
			'pinterest'=>'',
			'linkedin'=>'',
			'instagram'=>'',
			'xing'=>'',
			'mail'=>'',
			'vkontakte'=>'',
			'custom_url'=>'',
				

			), $atts) );
			if(is_numeric($image)) {
            $zonar_team_image = wp_get_attachment_image_src( $image, '' );
			$zonar_title = get_the_title( $image );
			}else {
            $zonar_team_image = $image;
			$zonar_title = $image;
			}

		$html ='';
		
		
		$html .= '<div class="team-box fl-wrap no-padding">';
		$html .= '<div class="team-photo">';
		$html .= '<div class="overlay"></div>';
		if(is_numeric($image)) {
		$html .= '<img src="'.esc_url($zonar_team_image[0]).'" alt="'.esc_attr($zonar_title).'" class="respimg">';
		}
		if($mail != '') {
		$html .= '<a href="mailto:'.esc_attr($mail).'" class="team-contact_btn color-bg"><i class="fal fa-envelope"></i></a>';
		}
		if($sec_number != '') {
		$html .= '<div class="team-info-num">'.esc_html($sec_number).'.</div>';
		}
		$html .= '<ul class="team-social">';
		if($facebook != '') {
		$html .= '<li><a href="'.esc_url($facebook).'" target="_blank"><i class="fab fa-facebook-f"></i></a></li>';
		}
		if($instagram != '') {
		$html .= '<li><a href="'.esc_url($instagram).'" target="_blank"><i class="fab fa-instagram"></i></a></li>';
		}
		if($twitter != '') {
		$html .= '<li><a href="'.esc_url($twitter).'" target="_blank"><i class="fab fa-x-twitter"></i></a></li>';
		}
		if($vkontakte != '') {
		$html .= '<li><a href="'.esc_url($vkontakte).'" target="_blank"><i class="fab fa-vk"></i></a></li>';
		}
		if($tiktok != '') {
		$html .= '<li><a href="'.esc_url($tiktok).'" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>';
		}
		if($vimeo != '') {
		$html .= '<li><a href="'.esc_url($vimeo).'" target="_blank"><i class="fab fa-vimeo"></i></a></li>';
		}
		if($linkedin != '') {
		$html .= '<li><a href="'.esc_url($linkedin).'" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>';
		}
		if($youtube != '') {
		$html .= '<li><a href="'.esc_url($youtube).'" target="_blank"><i class="fab fa-youtube-square"></i></a></li>';
		}
		if($xing != '') {
		$html .= '<li><a href="'.esc_url($xing).'" target="_blank"><i class="fab fa-xing"></i></a></li>';
		}
		if($pinterest != '') {
		$html .= '<li><a href="'.esc_url($pinterest).'" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>';
		}
		if($behance != '') {
		$html .= '<li><a href="'.esc_url($behance).'" target="_blank"><i class="fab fa-behance"></i></a></li>';
		}
		$html .= '</ul>';
		$html .= '</div>';
		$html .= '<div class="team-info">';
		if($custom_url != '') {
		$html .= '<h3><a href="'.esc_url($custom_url).'">'.esc_html($title).'</a></h3>';
		}
		else {
		$html .= '<h3>'.esc_html($title).'</h3>';
		}
		$html .= '<h4>'.esc_html($designation).'</h4>';
		$html .= '<p>'.$content.'  </p>';
		$html .= '</div>';
		$html .= '</div>';
		return $html ;
	}
	add_shortcode('zonar_team', 'zonar_team_shortcode');
}

// image slider
if(! function_exists('zonar_image_carousel_shortcode')){
	function zonar_image_carousel_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'image'=>'',
			'zo_image_cap'=>'',
			'zo_image_num'=>'',
			'text_translate_opt'=>'Info',
			), $atts) );
		
		$ids        = $atts['image'];
		$ids        = explode(',', $ids);
		
		$html='';
		$dot="'";
		
		$html .= ' <div class="clearfix"></div>';
		$html .= '<div class="center-carousel-wrap fl-wrap">';
		$html .= '<div class="center-carousel center-carousel-wb fl-wrap">';
		$html .= '<div class="swiper-container">';
		$html .= '<div class="swiper-wrapper lightgallery">';
		$zonar_counter=1;
		foreach ($ids as $id) {
		$image = wp_get_attachment_image_src($id, '');
		$image_alt = get_the_title( $id, '' );
		$image_cap = wp_get_attachment_caption( $id, '' );
		$html .= '<!--swiper-slide  --> ';
		$html .= '<div class="swiper-slide hov_zoom">';
		$html .= '<img src="'.esc_url($image[0]).'" alt="'.esc_attr($image_alt).'">';
		$html .= '<a href="'.esc_url($image[0]).'" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>';
		if($zo_image_num == "st2"){
		$html .= '<span class="slide-numb">.0'.esc_html($zonar_counter).'</span>';
		}
		if($zo_image_cap == "st2"){
		$html .= '<div class="show-info">';
		$html .= '<span>'.esc_html($text_translate_opt).'</span>';
		$html .= '<div class="tooltip-info">';
		$html .= '<h5>'.esc_html($image_alt).'</h5>';
		$html .= '<p>'.esc_html($image_cap).'</p>';
		$html .= '</div>';
		$html .= '</div>';
		}
		$html .= '</div>';
		$html .= '<!--swiper-slide end --> ';
		$zonar_counter++;
		}
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '<div class="fsc ccsw-next"><i class="fal fa-angle-right"></i></div>
                  <div class="fsc ccsw-prev"><i class="fal fa-angle-left"></i></div>';
		$html .= '</div>';
		$html .= '<div class="clearfix"></div>';
		
				
		return $html;
	}
	add_shortcode('zonar_image_carousel', 'zonar_image_carousel_shortcode');
}

// simple title
if(! function_exists('zonar_simple_title_shortcode')){
	function zonar_simple_title_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'title'=>'',
			), $atts) );
		
		$html='';
		$dot="'";
		
		$html .= '<div class="clearfix"></div>';
		$html .= '<div class="fl-wrap text-block">';
		$html .= '<div class="pr-subtitle"> '.esc_html($title).'</div>';
		$html .= '</div>';
		$html .= '<div class="clearfix"></div>';
		
				
		return $html;
	}
	add_shortcode('zonar_simple_title', 'zonar_simple_title_shortcode');
}
}
add_action('plugins_loaded', 'zonar_plugin_load');

function zonar_load_fail_out_of_date() {
	if ( ! current_user_can( 'update_plugins' ) ) {
		return;
	}

	$file_path = 'elementor/elementor.php';

	$upgrade_link = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file_path, 'upgrade-plugin_' . $file_path );
	$message = '<p>' . __( 'Zonar theme support is not working because you are using an old version of Elementor.', 'zonar-plugin' ) . '</p>';
	$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $upgrade_link, __( 'Update Elementor Now', 'zonar-plugin' ) ) . '</p>';

	echo '<div class="error">' . $message . '</div>';
}

?>