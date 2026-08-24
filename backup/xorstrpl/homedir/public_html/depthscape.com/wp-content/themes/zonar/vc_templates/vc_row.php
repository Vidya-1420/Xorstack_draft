<?php
$output = $el_class = '';
extract(shortcode_atts(array(
	'el_class' => '',
	'row_type' => 'sec1',
	'use_as_box' => '',
	'zonar_sec_title' => '',
	'zonar_sec_number' => '',
	'zonar_sec_dectiption' => '',
	'enabletitle' => '',
	'enableseparator' => '',
	'sec_padding_bottom' => '',
	'secpadding' => '',
	'sec_padding_top' => '',
	'type' => 'full_width',
	'scroll_id' => '',
	'enablecontainer' => '',
	

), $atts));

wp_enqueue_style( 'js_composer_front' );
wp_enqueue_script( 'wpb_composer_front_js' );
wp_enqueue_style('js_composer_custom_css');
//title section
$zonar_section_number_opt="";
if ($enabletitle == "st2"){

if($zonar_sec_number != ''){
$zonar_section_number_opt =  '<div class="section-number"><span>0</span>'.$zonar_sec_number.'.</div>';
}
}
else {

}
// separator
$zonar_separator="";
if ($enableseparator == "st2"){
$zonar_separator ='';
}
else {
$zonar_separator ='<div class="section-separator fl-wrap"><span></span></div>';
}

// conatiner
$zonar_container="";
if ($enablecontainer == "st2"){
$zonar_container ='fl-wrap';
}
else {
$zonar_container ='container';
}
//padding section
if ($secpadding == "st2"){
$zonar_padding_custom= 'style="padding-top:'.$sec_padding_top.'px; padding-bottom:'.$sec_padding_bottom.'px;"';
}
else {
$zonar_padding_custom= '';
}

//scrolll ID
$zonar_scroll_id = "";
if($scroll_id != ""){
	$zonar_scroll_id = 'id="'.$scroll_id.'"';
}//scrolll ID
$zonar_scroll_id = "";
if($scroll_id != ""){
	$zonar_scroll_id = 'id="'.$scroll_id.'"';
}

if($row_type == 'sec1'){
    $output .='<div class="clear"></div>';
	$output .='<section '.$zonar_scroll_id.' class="scroll_sec vc_template" '.$zonar_padding_custom.'>';
	
	if ($enabletitle == "st2"){
	$output .='<div class="container">';
	$output .='<div class="section-title">';
	if($zonar_sec_title != ''){
	$output .='<h3> '.do_shortcode($zonar_sec_title).'</h3>';
	}
	$output .='<p>';
	if($zonar_sec_dectiption != ''){
	$output .=''.$zonar_sec_dectiption.'';
	}
	$output .='</p>';
	$output .='</div>';
	$output .='</div>';
	}
	else {}
	$output .='<div class="'.$zonar_container.'">';
	$output .='<div class="row">';
}
else {
	$output .='<div class="clear"></div>';
	$output .='<section '.$zonar_scroll_id.' class="scroll_sec vc_template" '.$zonar_padding_custom.'>';
	
	if ($enabletitle == "st2"){
	$output .='<div class="container">';
	$output .='<div class="section-title">';
	if($zonar_sec_title != ''){
	$output .='<h3> '.do_shortcode($zonar_sec_title).'</h3>';
	}
	$output .='<p>';
	if($zonar_sec_dectiption != ''){
	$output .=''.$zonar_sec_dectiption.'';
	}
	$output .='</p>';
	$output .='</div>';
	$output .='</div>';
	}
	else {}
	$output .='<div class="'.$zonar_container.'">';
	$output .='<div class="row">';
}

if($row_type != 'content_menu'){
	$output .= wpb_js_remove_wpautop($content);
}

if($row_type == 'sec1'){
	$output .= '</div> </div>'.$zonar_section_number_opt.'</section>'.$zonar_separator.''.$this->endBlockComment('row');
}
else {
$output .= '</div> </div>'.$zonar_section_number_opt.'</section>'.$zonar_separator.''.$this->endBlockComment('row');
}
echo $output;