<?php

	/**********************************************
	SIDEBAR WIDGETS
	***********************************************/
	
	function sidebar_widgets_init() {
	
		register_sidebar( array(
			'name' => __( 'Sidebar', ENGINE_THEME_NAME ),
			'id' => 'sidebar',
			'description' => __( 'Main sidebar of the theme', ENGINE_THEME_NAME ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		) );

		register_sidebar( array(
			'name' => __( 'Header', ENGINE_THEME_NAME ),
			'id' => 'header_sidebar',
			'description' => __( 'Header widgets of the theme', ENGINE_THEME_NAME ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		) );

		register_sidebar( array(
			'name' => __( 'Blog Sidebar', ENGINE_THEME_NAME ),
			'id' => 'blog_sidebar',
			'description' => __( 'Blog widgets of the theme', ENGINE_THEME_NAME ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		) );
		
	}
	add_action( 'widgets_init', 'sidebar_widgets_init' );

	include get_template_directory() . '/includes/widgets/widget-twitter.php';
	include get_template_directory() . '/includes/widgets/widget-video.php';
	include get_template_directory() . '/includes/widgets/widget-newsletter.php';
	include get_template_directory() . '/includes/widgets/widget-tab.php';
	include get_template_directory() . '/includes/widgets/widget-flickr.php';
	include get_template_directory() . '/includes/widgets/widget-dribbble.php';
?>