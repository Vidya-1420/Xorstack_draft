<?php $zonar_options = get_option('zonar'); ?>
<?php
if ( post_password_required() ) {
	return;
}
?>
<?php
	
	if ( have_comments() ) : ?>
	<?php
	global $zonar_comment_meta_text, $zonar_comment_meta_text2, $zonar_comment_meta_text3;
	if(!empty($zonar_options['translet_opt_10'])):
	$zonar_comment_meta_text= esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_10',''));;
	else: 
	$zonar_comment_meta_text='One thought on';
	endif;
	if(!empty($zonar_options['translet_opt_11'])):
	$zonar_comment_meta_text2= esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_11',''));;
	else: 
	$zonar_comment_meta_text2='thought on';
	endif;
	if(!empty($zonar_options['translet_opt_12'])):
	$zonar_comment_meta_text3= esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_12',''));;
	else: 
	$zonar_comment_meta_text3='thoughts on';
	endif;
	?>
		<div class="pr-subtitle">
			<?php
			$comment_count = get_comments_number();
			if ( 1 === $comment_count ) {
				printf(
					
					esc_html_e( ''.$zonar_comment_meta_text.' &ldquo;%1$s&rdquo;', 'zonar' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( 
					esc_html( _nx( '%1$s '.$zonar_comment_meta_text2.' &ldquo;%2$s&rdquo;', '%1$s '.$zonar_comment_meta_text3.' &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'zonar' ) ),
					number_format_i18n( $comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</div>
		<div class="section-separator sp2 fl-wrap"><span></span></div>
		
		<!-- .comments-title -->

		<?php the_comments_navigation(); ?>
		
		<ul class="commentlist clearafix">
			
			<?php
				wp_list_comments( array(
					'callback'   => 'zonar_comment',
					'short_ping' => true,
				) );
			?>
		</ul><!-- .comment-list -->
		<div class="clearfix"></div>
		
		<?php the_comments_navigation();
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php if(!empty($zonar_options['translet_opt_13'])):?><?php echo esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_13',''));?><?php else: ?><?php esc_html_e( 'Comments are closed.', 'zonar' ); ?><?php endif;?></p>
		
		<?php
		endif;
	endif; // Check for have_comments().
	
	global $zonar_comment_your_name, $zonar_comment_your_email, $zonar_comment_your_comment, $zonar_comment_send_commen, $zonar_comment_leave_reply;
	if(!empty($zonar_options['translet_opt_14'])):
	$zonar_comment_your_name= esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_14',''));;
	else: 
	$zonar_comment_your_name='Your Name';
	endif;
	if(!empty($zonar_options['translet_opt_15'])):
	$zonar_comment_your_email= esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_15',''));;
	else: 
	$zonar_comment_your_email='Your Email';
	endif;
	if(!empty($zonar_options['translet_opt_16'])):
	$zonar_comment_your_comment= esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_16',''));;
	else: 
	$zonar_comment_your_comment='Your Comment';
	endif;
	if(!empty($zonar_options['translet_opt_17'])):
	$zonar_comment_send_comment= esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_17',''));;
	else: 
	$zonar_comment_send_comment='Submit Comment';
	endif;
	if(!empty($zonar_options['translet_opt_26'])):
	$zonar_comment_leave_reply= esc_html(Zonar_AfterSetupTheme::return_thme_option('translet_opt_26',''));;
	else: 
	$zonar_comment_leave_reply='Leave a Reply';
	endif;
	
		 $zonar_args = array(
		 'class_form' => 'add-comment custom-form',
		'fields' => apply_filters(
		'comment_form_default_fields', array(
		
			
			'author' =>'<div class="row"><div class="col-md-6">' . '<input id="author"  placeholder="'. $zonar_comment_your_name .'*" name="author" type="text" value="' .
				esc_attr( $commenter['comment_author'] ) . '" size="40"/>'.
				
				'</div>'
				,
			'email'  => '<div class="col-md-6">' . '<input id="email" placeholder="'.$zonar_comment_your_email.'*" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="40"/>'  .
				
				'</div></div>',
			
		)
		),
		'comment_field' => '' .
		'<textarea id="comment" name="comment" cols="40" rows="3" placeholder="'.$zonar_comment_your_comment.'*" aria-required="true"></textarea>' .
		'',
		'comment_notes_after' => '<button class="btn flat-btn color-bg"><span>'.$zonar_comment_send_comment.'</span></button>',
		'title_reply' => '<div class="comment-title-area crunchify-text"> <div class="pr-subtitle"> <span>'.$zonar_comment_leave_reply.'</span>'.'</div></div><div class="section-separator fl-wrap sp2"><span></span></div>'
		
	);
	comment_form($zonar_args);
	?>
	



