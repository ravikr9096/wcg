<?php
	function mytheme_admin() {
		global $themename, $shortname, $options, $version, $help, $author;
		$i=0;
		if ( isset($_REQUEST['saved']) ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
		if ( isset($_REQUEST['reset']) ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>'; 
	?>
		<div class="wrap mabuc_wrap">
			<h2><?php echo $themename; ?> <?php _e( 'Settings', ENGINE_THEME_NAME ); ?> <p class="version"><?php echo "version " . $version; ?></strong></p></h2>
			<div class="mabuc_opts">
				<p>
					<?php _e( 'Enter your Settings for', ENGINE_THEME_NAME ); ?> <?php echo $themename . "."; ?> 
					<?php _e( 'If you have any questions please refer to the user manual.', ENGINE_THEME_NAME ); ?>
				</p>	
				<form method="post" >
				<?php 
					foreach ($options as $value) {
					switch ( $value['type'] ) {
						case "open":
						break;
						case "close":
				?>
			</div>
		</div>

	<?php break;	

	case "headers":
		?>
		<h3><?php echo $value['name']; ?></h3>
		<?php 
	break;

	case "top_section":
		$i++;
		?>
		<div class="mabuc_section">
			<h4><?php echo $value['name']; ?></h4>
		<div class="mabuc_options">
		<?php 
	break;

	case "section":
		$i++;
		?>
		<div class="mabuc_section">
			<div class="mabuc_title">
				<h3><i class="<?php echo $value['icon']; ?>"></i><?php echo $value['name']; ?> <span><?php _e( 'open', ENGINE_THEME_NAME ); ?></span></h3>
				<div class="clearfix"></div>
			</div>
		<div class="mabuc_options">
		<?php 
	break;

	case 'text':
		?>
		<div class="mabuc_input mabuc_text">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
			<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
		</div>
		<?php
	break;

	case 'textarea':
		?>
		<div class="mabuc_input mabuc_textarea">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" id="<?php echo $value['id']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
			<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
		</div>
		<?php
	break;

	case 'upload':
		?>
		<div class="mabuc_input mabuc_textarea">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>"  style="width:422px;" />
			<input id="upload_image_button_<?php echo $value['id']; ?>" type="button" value="Upload" class="button-secondary" />
			<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
		</div>		
		<?php
	break;

	case 'img_preview':
		?>
		<div class="mabuc_input mabuc_textarea">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>"  style="width:422px;" />			
			<input id="upload_image_button_<?php echo $value['id']; ?>" type="button" value="Upload" class="button-secondary" />
			<small><?php echo $value['desc']; ?></small>
			<div class="ipreview">
				<img src="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>">
			</div>
			<div class="clearfix"></div>
		</div>		
		<?php
	break;
	
	case 'select':
		?>
		<div class="mabuc_input mabuc_select">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
				<?php foreach ($value['options'] as $option) { ?>
				<option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
			</select>
			<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
		</div>
		<?php
	break;

	case "checkbox":
		?>
		<div class="mabuc_input mabuc_checkbox">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
			<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
			<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
		</div>
		<?php 
	break;
	
	case 'color':
		?>
		<div class="mabuc_input mabuc_text">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			<input name="<?php echo $value['id']; ?>" type="text" id="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>">
			<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
		</div>
		<?php
	break;

	}
	}
?>
		<input type="hidden" name="action" value="save" />
		
		<div class="btn-actions">
			<span><input name="save" type="submit" value="Save Changes" class="button-primary" /></span>	
			<span><input name="support" type="button" value="Help Support?" class="button-primary" onClick="window.open('<?php echo $help; ?>')" /></span>	
			<span><input name="themes" type="button" value="More Themes" class="button-primary" onClick="window.open('http://themeforest.net/user/<?php echo $author; ?>/portfolio')" /></span>	
		</div>

		</form>
	</div>

	</div> 
<?php
}