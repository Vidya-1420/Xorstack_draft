<?php

$args = array(
    	'page_name'=>'',
		'boxsize'=>'',
		'boxheight'=>'',
		'title'=>'',
		'iconclass'=>'',
		'class'=>'',
);

$html = "";

extract(shortcode_atts($args, $atts));

$html .= '<div class="fl-wrap client-list '.$class.'">';
$html .= '<ul>';
$html .= do_shortcode($content);
$html .= '</ul>';
$html .= '</div>';
		
		


echo $html;