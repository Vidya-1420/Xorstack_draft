<?php

$args = array(
		'data_title'=>'Add Title :',
		'data_content'=>'Add Content',
		
);

extract(shortcode_atts($args, $atts));

$html = '';


    $html .= '<li><span>'.esc_html($data_title).' </span> '.$content.'</li>';
  
    


echo $html;