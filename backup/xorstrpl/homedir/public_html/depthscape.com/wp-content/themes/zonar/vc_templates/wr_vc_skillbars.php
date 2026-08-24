<?php

$args = array(
    	'class'=>'',
		
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		
		$html .= '<div class="clearfix"></div>';
		$html .= '<div class="skillbar-box animaper '.$class.'">';
		$html .= '<div class="pr-bg pr-bg-white"></div>';
		$html .= do_shortcode($content);
		$html .= '</div>';
		


echo $html;