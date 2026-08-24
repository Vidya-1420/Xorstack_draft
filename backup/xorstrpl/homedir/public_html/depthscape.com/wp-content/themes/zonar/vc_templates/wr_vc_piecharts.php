<?php

$args = array(
    	'class'=>'',
		'data_color'=>'#F57500',
		
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		
		$html .= '<div class="clearfix"></div>';
		$html .= '<div class="piechart-holder animaper '.$class.'" data-skcolor="'.$data_color.'">';
		$html .= do_shortcode($content);
		$html .= '</div>';
		


echo $html;