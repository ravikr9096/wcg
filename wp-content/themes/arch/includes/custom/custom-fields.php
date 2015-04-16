<?php
	/**********************************************
	POSTS CUSTOM FIELDS
	***********************************************/

	function arch_post_menu() {
		global $post;

		$video = get_post_meta($post->ID, 'video', TRUE);
		$bgimage = get_post_meta($post->ID, 'bgimage', TRUE);		

		$custom = get_post_custom($post->ID);
		$selected = isset( $custom['video_host'] ) ? esc_attr( $custom['video_host'][0] ) : ''; 

		?>
			<div class="mabuc-form-wrap">
				<table>
					<tr>
						<td style="width:10%;"><label for="video_host"><?php _e( 'Video Host', ENGINE_THEME_NAME ); ?></label></td>
						<td>
							<select name="video_host" type="text" id="video_host">
								<option value="youtube" <?php selected( $selected, 'youtube' ); ?>>Youtube</option>
								<option value="vimeo" <?php selected( $selected, 'vimeo' ); ?>>Vimeo</option>
								<option value="self" <?php selected( $selected, 'self' ); ?>>Self Hosted</option>
							</select> <span class="desc"><?php _e( 'Select your video host here either YouTube, Vimeo or Self Hosted', ENGINE_THEME_NAME ); ?></span>
						</td>
					</tr>
					<tr>
						<td><label for="video"><?php _e( 'Video', ENGINE_THEME_NAME ); ?></label></td>
						<td>
							<input name="video" type="text" id="video" value="<?php echo $video; ?>" /> <input id="upload_image_button_arch_svideo" type="button" value="Upload" class="button-secondary" /><br>
							<span class="desc"><?php _e( 'Add your video url here or just click upload for self hosted video (ex. http://player.vimeo.com/video/21942776 and http://www.youtube.com/v/f2XQ97XHjVw)', ENGINE_THEME_NAME ); ?></span>
						</td>
					</tr>
					<tr>
						<td><label for="bgimage"><?php _e( 'Background', ENGINE_THEME_NAME ); ?></label></td>
						<td>	
							<input name="bgimage" type="text" id="bgimage" value="<?php echo $bgimage; ?>" /> <input id="upload_image_button_arch_bgimage" type="button" value="Upload" class="button-secondary" /><br>
							<span class="desc"><?php _e( 'Add your background image here', ENGINE_THEME_NAME ); ?></span>
						</td>
					</tr>
				</table>						
			</div>	
		<?php
	}		
	

	/**********************************************
	PAGE CUSTOM FIELDS
	***********************************************/

	function arch_page_menu() {
		global $post;

		$ptitle = get_post_meta($post->ID, 'ptitle', TRUE);
		$bgimage = get_post_meta($post->ID, 'bgimage', TRUE);	
		$hide_title = get_post_meta($post->ID, 'hide_title', TRUE);	

		?>
			<div class="mabuc-form-wrap">
				<table>
					<tr>
						<td style="width:10%;"><label for="ptitle"><?php _e( 'Page Title', ENGINE_THEME_NAME ); ?></label></td>
						<td>
							<input name="ptitle" type="text" id="ptitle" value="<?php echo $ptitle; ?>" /><br>
							<span class="desc"><?php _e( 'Add your page title here if you want another title header', ENGINE_THEME_NAME ); ?></span>
						</td>
					</tr>
					<tr>
						<td><label for="hide_title"><?php _e( 'Hide Page Title', 'core_lang' ); ?></label></td>
						<td>
							<input name="hide_title" type="checkbox" id="hide_title" <?php if( $hide_title == true ) { ?>checked="checked"<?php } ?> />
							<span class="desc"><?php _e( 'Check this if you want to hide the page title', ENGINE_THEME_NAME ); ?></span>
						</td>
					</tr>
					<tr>
						<td><label for="bgimage"><?php _e( 'Background', ENGINE_THEME_NAME ); ?></label></td>
						<td>	
							<input name="bgimage" type="text" id="bgimage" value="<?php echo $bgimage; ?>" /> <input id="upload_image_button_arch_bgimage" type="button" value="Upload" class="button-secondary" /><br>
							<span class="desc"><?php _e( 'Add your background image here', ENGINE_THEME_NAME ); ?></span>
						</td>
					</tr>					
				</table>											
			</div>	
		<?php
	}	


	/**********************************************
	ADD AND SAVE CUSTOM FIELDS
	***********************************************/

	add_action( 'add_meta_boxes', 'custom_fields_box' );
	function custom_fields_box(){
		add_meta_box("arch_post_menu", "Post Options", "arch_post_menu", "post", "normal", "low");							
		add_meta_box("arch_page_menu", "Page Options", "arch_page_menu", "page", "normal", "low");							
	}	
	
	add_action('save_post', 'custom_fields_save');
	function custom_fields_save( $post_id ){
		
		if ((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX)) return;
		if ( 'page' == isset($_POST['post_type']) ) { if ( !current_user_can( 'edit_page', $post_id ) ) return;
		} else { if ( !current_user_can( 'edit_post', $post_id ) ) return; }
			  
		update_post_meta($post_id, "ptitle", @$_POST["ptitle"]); 
		update_post_meta($post_id, "bgimage", @$_POST["bgimage"]); 
		update_post_meta($post_id, "hide_title", @$_POST["hide_title"]);	 
		update_post_meta($post_id, "video", @$_POST["video"]);		  
		update_post_meta($post_id, "video_host", @$_POST["video_host"]);		  
	}	

?>