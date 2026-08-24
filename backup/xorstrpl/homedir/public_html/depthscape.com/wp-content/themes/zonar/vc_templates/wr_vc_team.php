<?php

$args = array(
			'class'=>'',
			'image'=>'',
			'title'=>'',
			'sec_number'=>'',
			'designation'=>'',
			'behance'=>'',
			'facebook'=>'',
			'gplus'=>'',
			'twitter'=>'',
			'youtube'=>'',
			'vimeo'=>'',
			'pinterest'=>'',
			'linkedin'=>'',
			'instagram'=>'',
			'xing'=>'',
			'mail'=>'',
			'vkontakte'=>'',
			'custom_url'=>'',
		
);

extract(shortcode_atts($args, $atts));

$html = '';

		if(is_numeric($image)) {
            $zonar_image = wp_get_attachment_image_src( $image, '' );
            $zonar_title = get_the_title( $image );
        }else {
            $zonar_image = $image;
            $zonar_title = $image;
        }


$html .= '<div class="swiper-slide">';
$html .= '<div class="team-box">';
		$html .= '<div class="team-photo">';
		$html .= '<div class="overlay"></div>';
		if(is_numeric($image)) {
		$html .= '<img src="'.$zonar_image[0].'" alt="'.$zonar_title.'" class="respimg">';
		}
		if($mail != '') {
		$html .= '<a href="mailto:'.$mail.'" class="team-contact_btn color-bg"><i class="fal fa-envelope"></i></a>';
		}
		if($sec_number != '') {
		$html .= '<div class="team-info-num">'.$sec_number.'.</div>';
		}
		$html .= '<ul class="team-social">';
		if($facebook != '') {
		$html .= '<li><a href="'.$facebook.'" target="_blank"><i class="fab fa-facebook-f"></i></a></li>';
		}
		if($instagram != '') {
		$html .= '<li><a href="'.$instagram.'" target="_blank"><i class="fab fa-instagram"></i></a></li>';
		}
		if($twitter != '') {
		$html .= '<li><a href="'.$twitter.'" target="_blank"><i class="fab fa-twitter"></i></a></li>';
		}
		if($vkontakte != '') {
		$html .= '<li><a href="'.$vkontakte.'" target="_blank"><i class="fab fa-vk"></i></a></li>';
		}
		if($gplus != '') {
		$html .= '<li><a href="'.$gplus.'" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>';
		}
		if($vimeo != '') {
		$html .= '<li><a href="'.$vimeo.'" target="_blank"><i class="fab fa-vimeo"></i></a></li>';
		}
		if($linkedin != '') {
		$html .= '<li><a href="'.$linkedin.'" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>';
		}
		if($youtube != '') {
		$html .= '<li><a href="'.$youtube.'" target="_blank"><i class="fab fa-youtube-square"></i></a></li>';
		}
		if($xing != '') {
		$html .= '<li><a href="'.$xing.'" target="_blank"><i class="fab fa-xing"></i></a></li>';
		}
		if($pinterest != '') {
		$html .= '<li><a href="'.$pinterest.'" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>';
		}
		if($behance != '') {
		$html .= '<li><a href="'.$behance.'" target="_blank"><i class="fab fa-behance"></i></a></li>';
		}
		$html .= '</ul>';
		$html .= '</div>';
		$html .= '<div class="team-info">';
		if($custom_url != '') {
		$html .= '<h3><a href="'.$custom_url.'">'.$title.'</a></h3>';
		}
		else {
		$html .= '<h3>'.$title.'</h3>';
		}
		$html .= '<h4>'.$designation.'</h4>';
		$html .= '<p>'.$content.'  </p>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';

 
echo $html;