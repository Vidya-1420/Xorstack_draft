<?php

$args = array(
    	'class'=>'',
    	'title'=>'',
    	'iconclass'=>'fal fa-desktop',
    	'text1'=>'',
    	'sec_number'=>'',
    	'text2'=>'',
    	'text_translate'=>'Details',
		
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		
		$html .= '<div class="clear"></div>';
		$html .= '<div class="process-details '.esc_attr($class).'">';
		$html .= '<span class="pd-icon">
                  <i class="'.esc_attr($iconclass).'"></i>
                  </span>';
		$html .= '<h4>'.esc_html($title).'</h4>';
		$html .= '<div class="clearfix"></div>';
		$html .= '<p>'.esc_html($text1).'</p>';
		if($sec_number != ""){
		$html .= '<span class="process-numder">'.esc_html($sec_number).'.</span>';
		}
			if($text2 != ""){
			$html .= '<div class="show-phdc"><i class="fal fa-plus"></i> <span>'.esc_html($text_translate).'</span></div>';
				$html .= '<div class="proces-details-content">';
				$html .= '<div class="close-hidden_pdc"><i class="fal fa-times"></i></div>';
					$html .= '<div class="proces-details-content-wrap">';
					$html .= '<ul class="pdcw_list fl-wrap">';
					$html .= do_shortcode($content);
					$html .= '</ul>';
					$html .= '<p>'.esc_html($text2).'</p>';
					$html .= '</div>';
				$html .= '</div>';
			}
		$html .= '</div>';
		


echo $html;