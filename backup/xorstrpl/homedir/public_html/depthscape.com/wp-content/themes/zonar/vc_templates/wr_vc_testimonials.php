<?php

$args = array(
    	'class'=>'',
		'boxsize'=>'',
		'boxheight'=>'',
		'title'=>'',
		'iconclass'=>'',
		'autoplay'=>'false',
		'slider_speed'=>'1400',
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		$html .= '<div class="testimonilas-carousel-wrap fl-wrap '.$class.'">';
		$html .= '<div class="tc-button tc-button-next"><i class="fal fa-angle-right"></i></div>';
		$html .= '<div class="tc-button tc-button-prev"><i class="fal fa-angle-left"></i></div>';
			$html .= '<div class="testimonilas-carousel">';
			$html .= '<div class="swiper-container" data-slider-speed="'.esc_attr($slider_speed).'" data-slider-play="'.esc_attr($autoplay).'">';
			$html .= '<div class="swiper-wrapper">';
			$html .= do_shortcode($content);
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';
		$html .= '<div class="tc-pagination"></div>';
		$html .= '</div>';
	


echo $html;