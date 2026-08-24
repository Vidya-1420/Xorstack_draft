<?php

$args = array(
			'class'=>'',
			'id'=>'',
			'image'=>'',
			'big_title'=>'',
			'small_title'=>'',
			'button_text'=>'My Portfolio',
			'button_url'=>'',
			'button_target'=>'',
			'button_ajax_load'=>'det-anim',
			'button_padding'=>'',
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		
		$html='';
		$dot="'";
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
		};
		$html .= '<div class="clear"></div>';
		if($button_padding == "st2"){
		$html .= '<div class="main-about fl-wrap">';
		}
		if($button_url != ""){
		$html .= '<a href="'.$button_url.'" class="'.$button_ajax_load.'  btn  color-bg  fl-btn"'; 
		if($button_ajax_load == "noajax"){
		$html .= 'target="'.$link_target_opt.'"';
		}
		$html .= '><span>'.$button_text.'</span></a>';
		}
		if($button_padding == "st2"){
		$html .= '</div>';
		}
		
		


echo $html;