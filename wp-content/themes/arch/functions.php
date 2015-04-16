<?php
	include get_template_directory() . '/includes/mabuc-panel/main.php';
	include get_template_directory() . '/includes/custom/custom-posts.php';
	include get_template_directory() . '/includes/custom/custom-fields.php';
	include get_template_directory() . '/includes/widgets/widgets.php';
	include get_template_directory() . '/includes/tgm/activation.php';


	/**********************************************
	REGISTER STYLES AND SCRIPTS
	***********************************************/

	function arch_script_styles_reg () {
		wp_register_style( 'style', get_stylesheet_directory_uri() . '/style.css' );	
		wp_register_style( 'responsive', get_stylesheet_directory_uri() . '/responsive.css' );			
		wp_register_style( 'opensans', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext,cyrillic,greek-ext,greek,vietnamese' );		
		wp_register_script( 'validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array(), '', true );
		wp_register_script( 'mobile-menu', get_template_directory_uri() . '/js/jquery.menu.js', array(), '', true );	
		wp_register_script( 'easing', get_template_directory_uri() . '/js/jquery.easing-1.3.min.js', array(), '', true );	
		wp_register_script( 'masonry', get_template_directory_uri() . '/js/jquery.masonry.js', array(), '', true );
		wp_register_script( 'hover', get_template_directory_uri() . '/js/jquery.hover.js', array(), '', true );	
		wp_register_script( 'toggle-category', get_template_directory_uri() . '/js/toggle-category.js', array(), '', true );		
		
		/*SUPERFISH DROPDOWN MENU*/
		wp_register_style( 'superfish-style', get_template_directory_uri() . '/js/superfish/superfish.css' );	
		wp_register_script( 'superfish', get_template_directory_uri() . '/js/superfish/jquery.superfish.min.js', array(), '', true );	

		/*SUPERSIZE*/
		wp_register_style( 'supersize-style', get_template_directory_uri() . '/js/supersized/supersized.css' );		
		wp_register_style( 'supersize-theme-style', get_template_directory_uri() . '/js/supersized/theme/supersized.shutter.css' );		
		wp_register_script( 'supersize', get_template_directory_uri() . '/js/supersized/supersized.3.2.7.min.js' );	
		wp_register_script( 'supersize-shutter', get_template_directory_uri() . '/js/supersized/theme/supersized.shutter.min.js' );	

		/*INFINITE SCROLL*/
		wp_register_script( 'infinite-scroll', get_template_directory_uri() . '/js/infinite-scroll/jquery.infinitescroll.min.js', array(), '', true );
		wp_register_script( 'mtrigger', get_template_directory_uri() . '/js/infinite-scroll/manual-trigger.js', array(), '', true );

		/*FLEXSLIDER*/
		wp_register_style( 'flexslider-style', get_template_directory_uri() . '/js/flexslider/flexslider.css' );		
		wp_register_script( 'flexslider', get_template_directory_uri() . '/js/flexslider/jquery.flexslider-min.js', array(), '', true );

		/*SCROLLPANE*/
		wp_register_style( 'scrollpane-style', get_template_directory_uri() . '/js/scrollpane/jquery.mCustomScrollbar.css' );	
		wp_register_script( 'scrollpane-mouse', get_template_directory_uri() . '/js/scrollpane/jquery.mousewheel.min.js', array(), '', true );
		wp_register_script( 'scrollpane', get_template_directory_uri() . '/js/scrollpane/jquery.mCustomScrollbar.js', array(), '', true );
		wp_register_script( 'scrollpane-custom', get_template_directory_uri() . '/js/scrollpane/mCustomScrollbar.js', array(), '', true );
		wp_register_script( 'scrollpane-mobile', get_template_directory_uri() . '/js/scrollpane/customScrollbarMobile.js', array(), '', true );	

		/*FANCYBOX*/
		wp_register_style( 'fancybox-style', get_template_directory_uri() . '/js/fancybox/jquery.fancybox-1.3.4.css' );	
		wp_register_script( 'fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox-1.3.4.pack.js', array(), '', true );

		/*HTML5 VIDEO PLAYER*/
		wp_register_style( 'videojs-css', get_template_directory_uri() . '/js/video/video-js.css' );	
		wp_register_script( 'videojs', get_template_directory_uri() . '/js/video/video.js', array(), '', true );

		/*TOUCHTOUCH*/
		wp_register_style( 'touch-style', get_template_directory_uri() . '/js/touchTouch/touchTouch.css' );	
		wp_register_script( 'touch', get_template_directory_uri() . '/js/touchTouch/touchTouch.jquery.js', array(), '', true );	

		/*GOOGLE MAP*/
		wp_register_script( 'gmap-sensor', 'http://maps.google.com/maps/api/js?sensor=true' );
		wp_register_script( 'gmap', get_template_directory_uri() . '/js/gmaps.js' );

		
		/*ENQUEUE SCRIPT*/
		wp_enqueue_style( 'style' );
		wp_enqueue_style( 'opensans' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-draggable' );
		wp_enqueue_style( 'superfish-style' );
		wp_enqueue_script( 'superfish' );
		wp_enqueue_script( 'easing' );

		wp_enqueue_style( 'supersize-style' );
		wp_enqueue_style( 'supersize-theme-style' );
		wp_enqueue_script( 'supersize' );
		wp_enqueue_script( 'supersize-shutter' );

		if (is_singular()) wp_enqueue_script('comment-reply');

		if(is_page_template('template-contact.php')) {
			wp_enqueue_script( 'validate' );
			wp_enqueue_script( 'gmap-sensor' );
			wp_enqueue_script( 'gmap' );

			//GOOGLE MAP 
			function google_map() {
				$lat = get_option('arch_map_lat');
				$lng = get_option('arch_map_lng');
				$marker_tip = get_option('arch_map_marker');
				$marker_window = get_option('arch_map_window');
				?>
				<script type="text/javascript">
					(function($) {
					  	"use strict";
					  	var map;
					    $(document).ready(function(){
					    	map = new GMaps({
						        div: '#map',
						        lat: <?php if($lat == "") { echo "-12.043333"; }else { echo $lat; } ?>,
	  							lng: <?php if($lng == "") { echo "-77.028333"; }else { echo $lng; } ?>
					      	});
					      	map.addMarker({
						        lat: <?php if($lat == "") { echo "-12.043333"; }else { echo $lat; } ?>,
	  							lng: <?php if($lng == "") { echo "-77.028333"; }else { echo $lng; } ?>,
						        title: '<?php if($marker_tip == "") { echo "Add your marker title window"; }else { echo $marker_tip; } ?>',
						        infoWindow: {
							    	content: '<p><?php if($marker_window == "") { echo "Please add your text marker here"; }else { echo $marker_window; } ?></p>'
							    }
					      	});
					    });
					})(jQuery);					
				</script>
				<?php
			}
			add_action( 'wp_head', 'google_map' );
		}

		if(is_archive() || is_page_template('template-about.php')) {
			wp_enqueue_script( 'hover' );
		}

		if(is_page_template('template-blog.php') || is_archive() || is_search()) {
			wp_enqueue_script( 'hover' );
			if(get_option('arch_blog_pnav')=="Infinite Scroll") {
				wp_enqueue_script( 'infinite-scroll' );		
				wp_enqueue_script( 'masonry' );
				wp_enqueue_script( 'mtrigger' );
			}						
		}

		if(is_single()) {
			wp_enqueue_script( 'hover' );
			wp_enqueue_style( 'videojs-css' );
			wp_enqueue_script( 'videojs' );
			wp_enqueue_style( 'flexslider-style' );
			wp_enqueue_script( 'flexslider' );
		}

		if(is_singular('projects')) {
			if(get_option('arch_project_hover_link')=="Url") {
				wp_enqueue_style( 'touch-style' );
				wp_enqueue_script( 'touch' );
			}
		}

		if(is_page_template('template-projects.php') || taxonomy_exists('project_categories')) {
			wp_enqueue_script( 'hover' );
			wp_enqueue_style( 'scrollpane-style' );
			wp_enqueue_script( 'scrollpane-mouse' );
			wp_enqueue_script( 'scrollpane' );
			wp_enqueue_script( 'scrollpane-custom' );
			wp_enqueue_script( 'scrollpane-mobile' );
			wp_enqueue_script( 'toggle-category' );
			if(get_option('arch_project_hover_link')=="Lightbox") {
				wp_enqueue_style( 'fancybox-style' );
				wp_enqueue_script( 'fancybox' );
			}
		}



		if(get_option('arch_site_layout') != "true") {
			wp_enqueue_style( 'responsive' );
			wp_enqueue_script( 'mobile-menu' );	
		}

	}
	add_action( 'wp_enqueue_scripts', 'arch_script_styles_reg' );


	/**********************************************
	CHANGE DEFAULT SITE TITLE 
	***********************************************/

	function change_default_site_title( $title ){
		$screen = get_current_screen();
		if('gallery' == $screen->post_type) {
			$title = 'Enter album name';
		}elseif('ourteam' == $screen->post_type) {
			$title = 'Enter member name';
		}
		return $title;
	}

	add_filter( 'enter_title_here', 'change_default_site_title' );


	/**********************************************
	MAIN MENU FALLBACK
	***********************************************/

	function menu_fallback() {
		if(is_front_page()){ $class="current_page_item"; }
		?>
		<div id="dropdown" class="menu clear">
			<ul id="menu-main-nav" class="sf-menu">
				<li class="<?php echo $class; ?>">
					<a href="<?php echo home_url(); ?>"><?php if(get_option('arch_home_menu')!="") { echo get_option('arch_home_menu'); } else { _e( 'Home', ENGINE_THEME_NAME ); } ?></a>
				</li>
				<?php wp_list_pages( 'title_li=&sort_column=menu_order' ); ?>
			</ul>
		</div>
		<?php
	}


	/*****************************************************
	THEME SUPPORTS, EDITOR, POST FORMATS AND BACKGROUND
	*****************************************************/

	add_theme_support( 'automatic-feed-links' );
	add_editor_style();
	//add_theme_support( 'custom-background' );
	//add_theme_support( 'custom-header' );
	add_theme_support( 'post-formats', array( 'image', 'video', 'gallery' ) );


	/**********************************************
	CUSTOM MENUS
	***********************************************/
	
	add_action( 'init', 'register_my_menus' );
	function register_my_menus() {
		register_nav_menus(
			array(
				'primary-menu' => 'Primary Menu',			
			)
		);
	}


	/**********************************************
	SUPPORT SHORTCODES IN WIDGETS
	***********************************************/

	add_filter('widget_text', 'do_shortcode');
	add_filter('the_content', 'do_shortcode');


	/**********************************************
	SET MAXIMUM CONTENT WIDTH
	***********************************************/

	if ( ! isset( $content_width ) ) $content_width = 960;


	/**********************************************
	LANGUAGE LOCALIZATION
	***********************************************/

	define('ENGINE_THEME_NAME', 'arch_lang');

	add_action('after_setup_theme', 'language_setup');
	function language_setup(){		
		load_theme_textdomain(ENGINE_THEME_NAME, get_template_directory() . '/lang');
	}
	

	/**********************************************
	POST THUMBNAIL
	***********************************************/

	if ( function_exists( 'add_theme_support' ) ) { 
		add_theme_support( 'post-thumbnails', array( 'post', 'projects', 'services', 'ourteam' ) );
		set_post_thumbnail_size( 287, 250, true ); 
		add_image_size( 'services-icon', 42, 42, true );
		add_image_size( 'blog-thumb', 69, 62, true );
		add_image_size( 'blog-medium', 294, 177, true );
		add_image_size( 'blog-large', 606, 9999 );
		add_image_size( 'portfolio-medium', 294, 177, true );
		add_image_size( 'portfolio-large', 728, 450, true );
	}


	/**********************************************
	GET PAGE CUSTOM TITLE
	***********************************************/

	function get_theme_page_title() {
		global $post;
		if ( get_post_meta( $post->ID, "hide_title", true ) !="on" ) {
			if( get_post_meta( $post->ID, "ptitle", true ) != "") { 
				?>
				<h2 class="ptitle"><?php echo stripslashes(get_post_meta( $post->ID, "ptitle", true )); ?></h2>
				<?php 
			}else {
				?>
				<h2 class="ptitle"><?php the_title(); ?></h2>
				<?php
			}
		}
	}


	/**********************************************
	LOAD MORE POST USING INFINITE SCROLL
	***********************************************/

	function load_more() {
		?>
		<div class="pagination-more">
			<span class="pagination-span">
				<a href="<?php next_posts(); ?>"> <?php if(get_option('arch_infinite_label') !="" ) { echo get_option('arch_infinite_label'); } else { _e( 'Load More', ENGINE_THEME_NAME );	} ?></a>
			</span>
		</div>
		<?php
	}


	/**********************************************
	GET RECEIPIANT IP ADDRESS
	***********************************************/

	function get_the_ip() {
	    if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
	        return $_SERVER["HTTP_X_FORWARDED_FOR"];
	    }
	    elseif (isset($_SERVER["HTTP_CLIENT_IP"])) {
	        return $_SERVER["HTTP_CLIENT_IP"];
	    }
	    else {
	        return $_SERVER["REMOTE_ADDR"];
	    }
	}


	/**********************************************
	FOR PAGINATION WORKING ON STATIC HOMEPAGE
	***********************************************/

	function get_home_pagination() {
		global $paged, $wp_query, $wp;
		$args = wp_parse_args($wp->matched_query);
		if ( !empty ( $args['paged'] ) && 0 == $paged ) {
			$wp_query->set('paged', $args['paged']);
		  	$paged = $args['paged'];
		}
	}


	/**********************************************
	GET PAGES LINK
	***********************************************/

	function project_link() {
		global $project_page_url;
		$project_pages = get_pages(array('meta_key' => '_wp_page_template', 'meta_value' => 'template-projects.php'));
		foreach($project_pages as $page){
			$project_page_id = $page->ID;
			$project_page_url = get_permalink($project_page_id);
		}
	}


	/**********************************************
	GET PROJECTS CATEGORIES
	***********************************************/

	function get_projects_category() {
		global $project_page_url;
		if(get_option('arch_hide_project_drop')!="true") {
			?>
				<div class="cat-toogles">
					<a href="#" class="pfilter">
						<?php if(get_option('arch_project_cfilter')!="") { echo get_option('arch_project_cfilter'); } else { _e( 'Filter Works', ENGINE_THEME_NAME ); } ?> <span>&nbsp;</span>
					</a>	
					<ul class="cat-list">						
						<li <?php if(is_page_template('template-projects.php')) { echo "class='current-cat'";  } ?>>
							<a href="<?php echo $project_page_url; ?>">
								<?php if(get_option('arch_pcategory_label')!="") { echo get_option('arch_pcategory_label'); } else { _e( 'View all', ENGINE_THEME_NAME ); } ?>
							</a>
						</li>
						<?php
							$args = array( 'taxonomy' => 'project_categories', 'style' => 'list', 'title_li' => '', 'hierarchical' => false, 'order' => 'DESC', 'orderby' => 'title' );
							wp_list_categories ( $args );							
						?>	
					</ul>
				</div>
			<?php
		}
	}
	

	/**********************************************
	CUSTOM EXCERPT LENGTH
	***********************************************/

	function custom_excerpt_length( $length ) {
		return 30;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	function new_excerpt_more( $excerpt ) {
		return str_replace( '[...]', '...', $excerpt );
	}
	add_filter( 'wp_trim_excerpt', 'new_excerpt_more' );


	/**********************************************
	REMOVE DEFAULT COMMENT FIELDS
	***********************************************/

	add_filter('comment_form_default_fields', 'mytheme_remove_url');
	function mytheme_remove_url($arg) {
	    $arg['url'] = '';
	    return $arg;
	}

	
	/**********************************************
	CUSTOM COMMENT STYLE
	***********************************************/

	function theme_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
			
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
				<div class="parent" id="comment-<?php comment_ID(); ?>">
					
					<div class="clear">
						<?php echo get_avatar( $comment, 76 ); ?>
						<div class="comment-details">
							<h6><?php comment_author_link() ?></h6> 
							<span><?php echo human_time_diff( get_comment_time('U'), current_time('timestamp') ) . ' ago'; ?> <?php edit_comment_link('edit','&nbsp;',''); ?> - <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>	
							<?php comment_text() ?> 
						</div>
					</div>
					
					<?php 
						if ($comment->comment_approved == '0') : ?>
						<em><?php _e( 'Your comment is awaiting moderation.', ENGINE_THEME_NAME ); ?></em>
					<?php 
						endif; 					
					?>
				</div>	
			
			<?php
				$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
				paginate_comments_links();
	}

	
	/**********************************************
	CUSTOM PAGINATION
	***********************************************/

	function pagination() {  
		global $wp_query;
		$big = 999999999;
		if($wp_query->max_num_pages == '1' ) {
		}else {
			echo "<div class=\"pagination clear\">";
		}
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			'format' => '?paged=%#%',
			'prev_text' => __( '&laquo;', ENGINE_THEME_NAME ),
    		'next_text' => __( '&raquo;', ENGINE_THEME_NAME ),
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'type' => 'list'
		));
		if($wp_query->max_num_pages == '1' ) {
		}else {
			echo "</div>";
		}
	}


	/**********************************************
	CUSTOM NEXT PREVIOUS LINK
	***********************************************/

	function next_previous_link() {
		?>
		<div class="pagination">
			<?php
			    global $wp_query, $paged;		    
			    if ($paged > 1) {
			    	?><div class="alignleft"><a href="<?php previous_posts(); ?>">&larr; <?php _e( 'Previous', ENGINE_THEME_NAME ); ?></a></div><?php
			    }
			    if ($wp_query->max_num_pages == 1) {		    		
		    	}elseif ($paged < $wp_query->max_num_pages) {
		    		?><div class="alignright"><a href="<?php next_posts(); ?>"><?php _e( 'Next', ENGINE_THEME_NAME ); ?> &rarr;</a> </div><?php
		    	}
			?>
		</div>
		<?php
	}


	/**********************************************
	SEARCH FILTER : BLOG POST ONLY
	***********************************************/

	function SearchFilter($query) {
	    if ( !$query->is_admin && $query->is_search) {
	         $query->set('post_type', 'post');
	    }
	    return $query;
	}	 
	add_filter('pre_get_posts','SearchFilter');


	/**********************************************
	REMOVE & ADD NEW FIELD IN USER PROFILE
	***********************************************/

	function remove_aim( $contactmethods ) {
		unset($contactmethods['aim']);
		unset($contactmethods['jabber']);
		unset($contactmethods['yim']);
		return $contactmethods;
	}
	add_filter('user_contactmethods','remove_aim',10,1);

	function add_twitter_facebook( $contactmethods ) {
	    $contactmethods['twitter'] = 'Twitter';
	    $contactmethods['facebook'] = 'Facebook';
	    return $contactmethods;
	}
	add_filter('user_contactmethods','add_twitter_facebook',10,1);


	/**********************************************
	DISPLAY LIST OF WIDGET
	***********************************************/

	add_action( 'add_meta_boxes', 'add_sidebar_metabox' );
	add_action( 'save_post', 'save_sidebar_postdata' );

	function add_sidebar_metabox() {
		add_meta_box( 'custom_sidebar', __( 'Custom Sidebar', ENGINE_THEME_NAME ), 'custom_sidebar_callback', 'page', 'side' );
		add_meta_box( 'custom_sidebar', __( 'Custom Sidebar', ENGINE_THEME_NAME ), 'custom_sidebar_callback', 'post', 'side' ); 
	}

	/*SIDEBAR CALLBACK*/

	function custom_sidebar_callback( $post ) {
		global $wp_registered_sidebars;
		$custom = get_post_custom($post->ID);

		if(isset($custom['custom_sidebar']))
			$val = $custom['custom_sidebar'][0];
		else
			$val = "Default";

			wp_nonce_field( plugin_basename( __FILE__ ), 'custom_sidebar_nonce' );

			$output = '<p><small><label for="myplugin_new_field">'.__("Choose a sidebar to display except footer columns", ENGINE_THEME_NAME ).'</label></small></p>';
			$output .= "<select name='custom_sidebar'>";

		$output .= "<option";
		if($val == "Default")
			$output .= " selected='selected'";
			$output .= " value='Default'>".__('Default', ENGINE_THEME_NAME)."</option>";

			foreach($wp_registered_sidebars as $sidebar_id => $sidebar) {
				$output .= "<option";
				if($sidebar_id == $val)
					$output .= " selected='selected'";
					$output .= " value='".$sidebar_id."'>".$sidebar['name']."</option>";
			}

		$output .= "</select>";
		echo $output;
	}


	/*SAVE SIDEBAR DATA*/

	function save_sidebar_postdata( $post_id ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return;

		if ( !wp_verify_nonce( @$_POST['custom_sidebar_nonce'], plugin_basename( __FILE__ ) ) )
		 	return;

		if ( !current_user_can( 'edit_page', $post_id ) )
			return;

		$data = $_POST['custom_sidebar'];
		update_post_meta($post_id, "custom_sidebar", $data);
	}


	/**********************************************
	GET CUSTOM SIDEBAR
	***********************************************/

	function get_custom_sidebar() {
		global $sidebar_choice;

		if($sidebar_choice == "sidebar") {
			get_sidebar();
		}elseif($sidebar_choice == "blog_sidebar") {
			get_sidebar( 'blog' );
		}elseif($sidebar_choice == "header_sidebar") {
			get_sidebar( 'header' );
		}else {
			get_sidebar();
		}
	}


	/**********************************************
	ADD CUSTOM FIELDS FOR ATTACHMENTS
	***********************************************/

	function cf_image_attachment_fields_to_edit($form_fields, $post) {
	    $form_fields["cf-image-link"] = array(
	        "label" => __('Custom Link', ENGINE_THEME_NAME),
	        "input" => "text", // this is default if "input" is omitted
	        "value" => get_post_meta($post->ID, "_cf-image-link", true),
	        "helps" => __('add your custom link for title here', ENGINE_THEME_NAME),
	    );
	   return $form_fields;
	}
	add_filter("attachment_fields_to_edit", "cf_image_attachment_fields_to_edit", null, 2);

    function cf_image_attachment_fields_to_save($post, $attachment) {
	    // $attachment part of the form $_POST ($_POST[attachments][postID])
	    // $post['post_type'] == 'attachment'
	    if( isset($attachment['cf-image-link']) ){
	        // update_post_meta(postID, meta_key, meta_value);
	        update_post_meta($post['ID'], '_cf-image-link', $attachment['cf-image-link']);
	    }
	    return $post;
	}
	add_filter("attachment_fields_to_save", "cf_image_attachment_fields_to_save", null , 2);


	/**********************************************
	ADD POST THUMBNAIL SIZE IN MEDIA UPLOAD
	***********************************************/

	function get_additional_image_sizes() {
		$sizes = array();
		global $_wp_additional_image_sizes;
		if ( isset($_wp_additional_image_sizes) && count($_wp_additional_image_sizes) ) {
			$sizes = apply_filters( 'intermediate_image_sizes', $_wp_additional_image_sizes );
			$sizes = apply_filters( 'get_additional_image_sizes', $_wp_additional_image_sizes );
		}
		return $sizes;
	}

	function additional_image_size_input_fields( $fields, $post ) {
		if ( !isset($fields['image-size']['html']) || substr($post->post_mime_type, 0, 5) != 'image' )
			return $fields;

		$sizes = get_additional_image_sizes();
		if ( !count($sizes) )
			return $fields;

		$items = array();
		foreach ( array_keys($sizes) as $size ) {
			$downsize = image_downsize( $post->ID, $size );
			$enabled = $downsize[3];
			$css_id = "image-size-{$size}-{$post->ID}";
			$label = apply_filters( 'image_size_name', $size );

			$html  = "<div class='image-size-item'>\n";
			$html .= "<input type='radio' " . disabled( $enabled, false, false ) . "name='attachments[{$post->ID}][image-size]' id='{$css_id}' value='{$size}' />\n";
			$html .= "<label for='{$css_id}'>{$label}</label>\n";
			if ( $enabled )
				$html .= "<label for='{$css_id}' class='help'>" . sprintf( "(%d x %d)", $downsize[1], $downsize[2] ). "</label>\n";
			$html .= "</div>";

			$items[] = $html;
		}

		$items = join( "\n", $items );
		$fields['image-size']['html'] = "{$fields['image-size']['html']}\n{$items}";

		return $fields;
	}

	add_filter( 'attachment_fields_to_edit', 'additional_image_size_input_fields', 11, 2 );


	/**********************************************
	IE9 FIXED FOR CUSTOM SCROLLBAR
	***********************************************/

	global $theUA;
	$theUA = strtolower($_SERVER['HTTP_USER_AGENT']);


	/**********************************************
	CONVERT HEX TO RGBA
	***********************************************/

	function hex2rgba($color, $opacity = false) {
		$default = 'rgb(0,0,0)';
		if(empty($color))
	        return $default; 
	        if ($color[0] == '#' ) {
	        	$color = substr( $color, 1 );
	        }

	        if (strlen($color) == 6) {
	            $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	        } elseif ( strlen( $color ) == 3 ) {
	            $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	        } else {
	            return $default;
	        }

	        $rgb =  array_map('hexdec', $hex);

	        if($opacity){
	        	if(abs($opacity) > 1)
	        		$opacity = 1.0;
	        		$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
	        } else {
	        	$output = 'rgb('.implode(",",$rgb).')';
	        }
	        return $output;
	}
	

	/**********************************************
	CUSTOM THEME STYLESHEETS
	***********************************************/

	function theme_custom_styles() {
		?><style type="text/css"><?php		

		/*CUSTOM COLORS*/

		$slider_bg_color = get_option('arch_slider_title_bg');
		$rgb_slider_bg = hex2rgba($slider_bg_color);
		$rgba_slider_bg = hex2rgba($slider_bg_color, 0.8);

		$header_bg_color = get_option('arch_header_bg_color');
		$rgb_header_bg = hex2rgba($header_bg_color);
		$rgba_header_bg = hex2rgba($header_bg_color, 0.8);

		if(get_option('arch_menu_text_color')!="" ) { 
			?>
			.menu ul li a:link, .menu ul li a:visited, .menu ul li.current_page_item a, .menu ul li.current-menu-item a, .menu ul li.current-menu-ancestor a, 
			.menu ul li.current-menu-parent a, .sf-menu li.sfHover ul a:link, .sf-menu li.sfHover ul a:visited { color:<?php echo get_option('arch_menu_text_color') ?> !important; }
			<?php
		}
		if(get_option('arch_menu_bg_color')!="" ) { 
			?>
			.menu ul li a:link, .menu ul li a:visited, .menu ul li.current_page_item a, .menu ul li.current-menu-item a, .menu ul li.current-menu-ancestor a, 
			.menu ul li.current-menu-parent a { background-color:<?php echo get_option('arch_menu_bg_color') ?> !important; }
			<?php
		}
		if(get_option('arch_menu_bg_hover')!="" ) { 
			?>
			.menu ul li a:hover, .menu ul li.current_page_item a, .menu ul li.current-menu-item a, .menu ul li.current-menu-ancestor a, 
			.menu ul li.current-menu-parent a, .sf-menu li.sfHover ul a:hover { background-color:<?php echo get_option('arch_menu_bg_hover') ?> !important ; }
			<?php
		}
		if(get_option('arch_submenu_bg_color')!="" ) { 
			?>.sf-menu li li a:link, .sf-menu li li a:visited { background:<?php echo get_option('arch_submenu_bg_color') ?> !important; }<?php
		}
		if(get_option('arch_header_text_color')!="" ) { 
			?>.ptitle { color:<?php echo get_option('arch_header_text_color') ?> !important; }<?php
		}
		if(get_option('arch_header_bg_color')!="" ) { 
			?>.ptitle { background:<?php echo $rgba_header_bg ?> !important; }<?php
		}	
		if(get_option('arch_sidebar_text_color')!="" ) { 
			?>.sidebar .widget h5 { color:<?php echo get_option('arch_sidebar_text_color') ?> !important; }<?php
		}
		if(get_option('arch_sidebar_bg_color')!="" ) { 
			?>.sidebar .widget h5 { background:<?php echo get_option('arch_sidebar_bg_color') ?> !important; }<?php
		}
		if(get_option('arch_slider_title_bg')!="" ) { 
			?>#slidecaption { background:<?php echo $rgba_slider_bg ?> !important; }<?php
		}
		if(get_option('arch_slider_text')!="" ) { 
			?>#slidecaption { color:<?php echo get_option('arch_slider_text') ?> !important; }<?php
		}
		if(get_option('arch_button_text_color')!="" ) { 
			?>.widget_search input[type="submit"], .newsletter input[type="submit"], 
			#respond input[type="submit"], .pagination-span a:link, .pagination-span a:visited, a.visit,
			a.kreading:link, a.kreading:visited, span.current,
			.page-numbers li a:hover, .alignleft a:hover, .alignright a:hover { color:<?php echo get_option('arch_button_text_color') ?> !important; }<?php
		}
		if(get_option('arch_button_bg_color')!="" ) { 
			?>.widget_search input[type="submit"], .newsletter input[type="submit"], 
			#respond input[type="submit"], .pagination-span a:link, .pagination-span a:visited, a.visit,
			a.kreading:link, a.kreading:visited, span.current,
			.page-numbers li a:hover, .alignleft a:hover, .alignright a:hover { background-color:<?php echo get_option('arch_button_bg_color') ?> !important; }<?php
		}
		if(get_option('arch_scrollbar_color')!="" ) { 
			?>
			.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar, 
			.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar,
			.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar, 
			.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar { background-color:<?php echo get_option('arch_scrollbar_color') ?>; }
			<?php
		}
		if(get_option('arch_custom_css')!="") {
			echo get_option('arch_custom_css');
		}

		?></style><?php
	}
	add_action( 'wp_head', 'theme_custom_styles' );
?>