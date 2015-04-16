<?php
	$categories = get_categories('hide_empty=0&orderby=name');
	$wp_cats = array();
	foreach ($categories as $category_list ) {
		$wp_cats[$category_list->cat_ID] = $category_list->cat_name;
	}

	$pages = get_pages();
	$wp_pages = array();
	foreach ($pages as $pages_list ) {
		$wp_pages[$pages_list->ID] = $pages_list->post_title;			
	}

	include get_template_directory() . '/includes/mabuc-panel/options.php';

	function mytheme_add_admin() {
		global $themename, $shortname, $options;
		
		if ( isset($_GET['page']) && $_GET['page'] == basename(__FILE__) ) {
			if ( 'save' == isset($_REQUEST['action']) ) {
				foreach ($options as $value) {
					update_option( @$value['id'], @$_REQUEST[ $value['id'] ] ); 
				}
				
				foreach ($options as $value) {
					if( isset( $_REQUEST[ @$value['id'] ] ) ) { 
						update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); 
					} else { delete_option( @$value['id'] ); } 
				}

				header("Location: themes.php?page=main.php&saved=true");
				die;

			}else if( 'reset' == isset($_REQUEST['action']) ) {
				foreach ($options as $value) {
					delete_option( $value['id'] ); 
				}
				header("Location: themes.php?page=main.php&reset=true");
				die;
			}
		}

		add_theme_page($themename, 'Theme Options', 'administrator', basename(__FILE__), 'mytheme_admin');
	}		

	function mytheme_add_init() {
		if(is_admin()) {
			$file_dir = get_template_directory_uri();			

			wp_register_style('font-awesome', $file_dir."/includes/font-awesome/css/font-awesome.min.css");
			wp_register_script('custom-jquery', $file_dir."/includes/mabuc-panel/js/custom.js", false, "1.0", "all");			

			wp_enqueue_style("admin", $file_dir."/includes/mabuc-panel/style.css", false, "1.0", "all");
			wp_enqueue_style('thickbox');
			wp_enqueue_style('wp-color-picker');
			wp_enqueue_style('font-awesome');

			wp_enqueue_script('thickbox');
			wp_enqueue_script('jquery-ui-accordion');
			wp_enqueue_script('wp-color-picker');
			wp_enqueue_script('custom-jquery');		
		}			
	}

	include get_template_directory() .'/includes/mabuc-panel/generator.php';

	add_action('admin_init', 'mytheme_add_init');
	add_action('admin_menu', 'mytheme_add_admin');
?>