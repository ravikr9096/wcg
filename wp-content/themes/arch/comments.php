<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', ENGINE_THEME_NAME); ?></p>
	<?php
		return;
	}
?>

<!--COMMENT FORM-->

<?php 
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$fields = array(
			'author' => '<li><label for="author">' . __( 'Name', ENGINE_THEME_NAME ) . ' <span>(Required)</span></label><input type="text" id="author" name="author" ' . $aria_req . ' value="' .
        esc_attr( $commenter['comment_author'] ) . '" tabindex="1" /></li>',
			'email' => '<li><label for="email">' . __( 'Email', ENGINE_THEME_NAME ) . ' <span>(Required)</span></label><input type="text" id="email" name="email" ' . $aria_req . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" tabindex="2" /></li>',
			'URL' => '<li class="last"><label for="url">' . __( 'Website', ENGINE_THEME_NAME ) . '</label><input type="text" id="url" name="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" tabindex="3" /></li>'
	);

	if(get_option('arch_comment_fheader')!="") { $comm = get_option('arch_comment_fheader'); } else { $comm = "Leave a comment"; }

	$args = array(
		'fields' => apply_filters( 'comment_form_default_fields', $fields),
		'title_reply' => '<span class="picon"><img src=" '. get_template_directory_uri() . '/img/icons/form.png" alt="" title="" /></span>' . $comm,
		'cancel_reply_link' => 'Cancel reply',
		'comment_field' => '<li class="msg"><label for="comment">' . __( 'Your Comment', ENGINE_THEME_NAME ) . '</label><textarea id="comment" name="comment" ' . $aria_req . ' tabindex="4" rows="0" cols="0"></textarea></li>',
		'label_submit' => __( 'Comment', ENGINE_THEME_NAME ),
		'comment_notes_before' => '<ul>',
		'comment_notes_after' => '</ul>',
	);
	comment_form($args); 
?>

<!--COMMENTS-->
<div class="comments" id="comments">
	<?php if ( have_comments() ) : ?>
	<h3>
		<span class="picon"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/bubble.png" alt="" title="" /></span>
		<?php if(get_option('arch_comment_cheader')!="") { echo get_option('arch_comment_cheader'); } else { _e( 'Recent comments', ENGINE_THEME_NAME ); } ?>
	</h3>
	<!--comments_number('No Response', 'One Response', '% Responses' );-->
	<ul class="clist">
 		<?php 
 			$args = array ('type' => 'comment', 'callback' => 'theme_comment');
			wp_list_comments( $args ); 		
 		?>
 	</ul>
	 	<?php
		else :    
			if ('open' == $post->comment_status) : 
				?>
					<h3 style="color:#FF0000 !important;">
						<span class="picon"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/bubble.png" alt="" title="" /></span>
						<?php if(get_option('arch_comment_notify')!="") { echo get_option('arch_comment_notify'); } else { _e('No Comments Yet', ENGINE_THEME_NAME); } ?>
					</h3>
				<?php else : ?>            
					<h5><?php _e('Comments are closed.', ENGINE_THEME_NAME); ?></h5>    
			<?php endif; ?>
    <?php endif; ?>
</div>