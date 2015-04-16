<?php
/*
Plugin Name: Typo Shortcodes
Plugin URI: http://themeforest.net/user/mabuc
Description: A simple, minimalist typography shortcode for your themes and website.
Version: 1.0.1
Author: Mabuc	
Author URI: http://themeforest.net/user/mabuc
License: GPL
*/

include 'inc/main.php';
include 'inc/tinymce/tinymce.php';


/**********************************************
ENQUEUE STYLE and SCRIPT
***********************************************/

function widget_enqueue_typo_style() {
	wp_enqueue_script( 'jquery' );
	
	wp_register_style( 'typo-style', plugin_dir_url(__FILE__) . 'typo-style.css' );	
	wp_enqueue_style( 'typo-style' );

	wp_register_style( 'toggle-style', plugin_dir_url(__FILE__) . 'js/toggle/style.css' );				
	wp_register_script( 'toggle', plugin_dir_url(__FILE__) . 'js/toggle/jquery.toggle.js', array(), '', true );	
	wp_enqueue_style( 'toggle-style' );
	wp_enqueue_script( 'toggle' );

	wp_register_style( 'tab-style', plugin_dir_url(__FILE__) . 'js/tabs/tabs.css' );				
	wp_register_script( 'tab', plugin_dir_url(__FILE__) . 'js/tabs/jquery.tabs.js', array(), '', true );
	wp_enqueue_style( 'tab-style' );
	wp_enqueue_script( 'tab' );

	wp_register_script( 'alert', plugin_dir_url(__FILE__) . 'js/alert.js', array(), '', true  );
	wp_enqueue_script( 'alert' );
}

add_action( 'wp_enqueue_scripts', 'widget_enqueue_typo_style' );

function typo_stylesheet_form() {
	?>
	<div>
		<h2>Typography Shortcode</h2>
		<p>This plugin is developed by WordPress developer <a href="http://themeforest.net/user/mabuc" target="_blank">Mark Abucayon</a> for your themes and website. Please enter your customize stylesheet code below to overwrite the current styles of shortcode elements.</p>

		<form method="post" action="options.php">
			<?php wp_nonce_field('update-options'); ?>
			<table width="510">
				<tr valign="top"><td style="padding-bottom:10px;">Enter your Custom CSS Code</td></tr>
				<tr valign="top">
					<td>
						<textarea name="typo_custom_stylesheet" type="text" id="typo_custom_stylesheet" cols="250" rows="25"><?php echo get_option('typo_custom_stylesheet'); ?></textarea>
					</td>
				</tr>
			</table>

			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="page_options" value="typo_custom_stylesheet" />

			<p><input type="submit" value="Save Changes" class="button-primary" /></p>
		</form>
	</div>
	<?php
}


function shortcode_empty_paragraph_fix($content) {   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );
    $content = strtr($content, $array);
	return $content;
}
add_filter('the_content', 'shortcode_empty_paragraph_fix');


function the_content_filter($content) {	 
	// array of custom shortcodes requiring the fix 
	$block = join("|",array("alert","blockquote","a","ul","li","div","dropcap","columns","image","tabgroup","tab","toggle","video","googlemap"));	 
	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);			
	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);	 
	return $rep;	 
}
add_filter("the_content", "the_content_filter"); 


/**********************************************
ADD CUSTOM QUICKTAGS
***********************************************/

add_action('admin_print_scripts', 'my_custom_quicktags');
function my_custom_quicktags() {
	wp_enqueue_script(
		'my_custom_quicktags',
		plugin_dir_url(__FILE__) . 'inc/tinymce/quicktags.js',
		array('quicktags')
	);
}

?>