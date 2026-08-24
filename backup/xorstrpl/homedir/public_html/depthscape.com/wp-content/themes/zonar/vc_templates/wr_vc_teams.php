<?php

$args = array(
    	'page_name'=>'',
		'boxsize'=>'',
		'boxheight'=>'',
		'title'=>'',
		'iconclass'=>'',
		'class'=>'',
		'autoplay'=>'false',
		'slider_speed'=>'1400',
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		
		$html .= '<div class="grid-carousel-wrap fl-wrap '.$class.'">
                  <div class="grid-carousel fl-wrap">
                  <div class="swiper-container" data-slider-speed="'.esc_attr($slider_speed).'" data-slider-play="'.esc_attr($autoplay).'">
                  <div class="swiper-wrapper">';
		$html .= do_shortcode($content);
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '<div class="gc-slider-cont-wrap">
                  <div class="gc-slider-cont gc-slider-cont-next"><i class="fal fa-angle-right"></i></div>
                  <div class="gc-slider-cont gc-slider-cont-prev"><i class="fal fa-angle-left"></i></div>
                  </div>';
		$html .= '</div>';
		
		


echo $html;