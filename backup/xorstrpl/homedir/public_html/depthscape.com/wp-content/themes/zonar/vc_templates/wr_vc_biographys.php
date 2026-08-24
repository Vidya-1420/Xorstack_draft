<?php

$args = array(
    	'class'=>'',
    	'translate_txt'=>'Details',
		
);

extract(shortcode_atts($args, $atts));

		
		$html = "";
		$dot = "'";
		$html .= '<div class="project-details fl-wrap '.esc_attr($class).'">';
		$html .= '<ul>';
		$html .= do_shortcode($content);
		$html .= '</ul>';
		$html .= '</div>';
		$html .= '<style>.project-details ul:after{content: '.$dot.''.$translate_txt.''.$dot.';}</style>';


echo $html;