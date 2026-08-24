<?php

$args = array(
			'class'=>'',
			'id'=>'',
			'image'=>'',
			'title'=>'',
			
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		
		$html='';
		$dot="'";
		
		$html .= '<div class="main-about fl-wrap">';
		if($title != ""){
		$html .= '<h2>'.do_shortcode($title).'</h2>';
		}
		$html .= '<div class="main-about-text-area">';
		$html .= ''.do_shortcode($content).'';
		$html .= '</div>';
		
		$html .= '</div>';
		


echo $html;