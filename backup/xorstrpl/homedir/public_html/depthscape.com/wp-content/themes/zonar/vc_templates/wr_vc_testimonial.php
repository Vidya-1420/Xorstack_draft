<?php

$args = array(
		'iconname'=>'',
		'title'=>'',
		'image'=>'',
		'companyname'=>'',
		'clientname'=>'',
		'button_text'=>'Via Twitter',
		'button_url'=>'',
		'button_target'=>'',
		'testimonial_number'=>'',
		
);

extract(shortcode_atts($args, $atts));
		if(is_numeric($image)) {
            $zonar_image = wp_get_attachment_url( $image );
            $zonar_title = get_the_title( $image );
        }else {
            $zonar_image = $image;
            $zonar_title = $image;
        }
$html = '';
$link_target_opt ='';
		

    $html .= '<div class="swiper-slide">';
    $html .= '<div class="testi-item fl-wrap">';
	if(is_numeric($image)) {
    $html .= '<div class="testi-avatar"><img src="'.$zonar_image.'" alt="'.$zonar_title.'"></div>';
	}
	
    $html .= '<div class="testimonilas-text fl-wrap">';
    $html .= '<h3>'.do_shortcode($clientname).'</h3>';
    $html .= '<p>"'.$content.' "</p>';
	if($testimonial_number != ""){
    $html .= '<span class="testi-number">.'.$testimonial_number.'</span>';
	}
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
  
    


echo $html;