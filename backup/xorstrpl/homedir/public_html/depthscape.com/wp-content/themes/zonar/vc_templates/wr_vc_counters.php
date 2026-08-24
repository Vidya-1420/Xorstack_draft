<?php

$args = array(
    	'class'=>'',
		
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		
		$html .= '<div class="clear"></div>';
		$html .= '<div class="main-about fl-wrap">';
		$html .= '<div class="facts-container fl-wrap '.$class.'">';
		$html .= do_shortcode($content);
		$html .= '</div>';
		$html .= '</div>';
		


echo $html;