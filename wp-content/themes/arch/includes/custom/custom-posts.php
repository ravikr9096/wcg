<?php	
	/**********************************************
	CUSTOM POST TYPE: PROJECTS
	***********************************************/	

	add_action( 'init', 'project_post_type' );
	function project_post_type() { 

		if(get_option('arch_project_cpt')!="") { $project_name = get_option('arch_project_cpt'); } else { $project_name = "Projects"; }
		if(get_option('arch_project_cpt_slug')!="") { $project_slug = get_option('arch_project_cpt_slug'); } else { $project_slug = "projects-item"; }
		if(get_option('arch_project_add')!="") { $project_add = get_option('arch_project_add'); } else { $project_add = "Add Project"; }
		if(get_option('arch_project_edit')!="") { $project_edit = get_option('arch_project_edit'); } else { $project_edit = "Edit Projects"; }
		
		register_post_type( 'projects',
			array(
				'labels' => array(
					'name' => $project_name,
					'singular_name' => $project_name,
					'add_new_item' => $project_add,
					'edit_item' => $project_edit,
				),
				'public' => true,
				'has_archive' => true,	
				'publicly_queryable' => true,
				'show_ui' => true, 
			    'show_in_menu' => true, 
			    'query_var' => true,	
			    'rewrite' => array( 'slug' => $project_slug, 'with_front' => TRUE ),
			    'supports' => array('title', 'editor', 'author', 'thumbnail', 'page-attributes'),
				'menu_icon' => get_template_directory_uri() . '/includes/custom/img/projects.png'		
			)
		);
	}
	
	/*META*/
	function project_meta() {
		global $post;

		$bgslide = get_post_meta($post->ID, 'bgslide', TRUE);
		$bgimage = get_post_meta($post->ID, 'bgimage', TRUE);
		$url = get_post_meta($post->ID, 'url', TRUE);
		$exclude = get_post_meta($post->ID, 'exclude', TRUE);
		$video = get_post_meta($post->ID, 'video', TRUE);

		?>
			<div class="mabuc-form-wrap">	
				<table>
					<tr>
						<td style="width:10%"><label for="exclude"><?php _e( 'Exclude', ENGINE_THEME_NAME ); ?></label> </td>
						<td>
							<input name="exclude" type="checkbox" id="exclude" <?php if( $exclude == true ) { ?>checked="checked"<?php } ?> />
							<span class="desc"><?php _e( 'Check this if you want to exclude this album in your project list', ENGINE_THEME_NAME ); ?></span>
						</td>
					</tr>
					<tr>
						<td><label for="bgslide"><?php _e( 'Slider', ENGINE_THEME_NAME ); ?></label> </td>
						<td>
							<input name="bgslide" type="checkbox" id="bgslide" <?php if( $bgslide == true ) { ?>checked="checked"<?php } ?> />
							<span class="desc"><?php _e( 'Check this if you want to include this album in background slider', ENGINE_THEME_NAME ); ?></span>
						</td>
					</tr>
					<tr>
						<td><label for="url"><?php _e( 'Website', ENGINE_THEME_NAME ); ?></label></td>
						<td>
							<input name="url" type="text" id="url" value="<?php echo $url; ?>" /> <br>
							<span class="desc"><?php _e( 'Add your project website or link here', ENGINE_THEME_NAME ); ?></span>
						</td>
					</tr>
					<tr>
						<td><label for="video"><?php _e( 'Video', ENGINE_THEME_NAME ); ?></label></td>
						<td>
							<input name="video" type="text" id="video" value="<?php echo $video; ?>" /><br>
							<span class="desc"><?php _e( 'Add your video url here (ex: http://player.vimeo.com/video/21942776 and http://www.youtube.com/v/f2XQ97XHjVw)', ENGINE_THEME_NAME ); ?></span>
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

	
	/*TAXONOMIES*/
	add_action( 'init', 'project_taxonomies', 0 );
	function project_taxonomies() {
		if(get_option('arch_project_tax_slug')!="") { $project_tax_slug = get_option('arch_project_tax_slug'); } else { $project_tax_slug = "project-category"; }

		register_taxonomy( 'project_categories', 'projects', 
			array( 'hierarchical' => true, 'label' => 'Project Categories', 'query_var' => true, 'rewrite' => array('slug' => $project_tax_slug) ) );
	}

	/*CUSTOM COLUMNS*/
	add_filter( 'manage_edit-projects_columns', 'edit_projects_columns' ) ;
	function edit_projects_columns( $columns ) {
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Name', ENGINE_THEME_NAME ),						
			'category' => __( 'Categories', ENGINE_THEME_NAME ),
			'author' => __( 'Author', ENGINE_THEME_NAME ),
			'thumbnail' => __( 'Thumbnail', ENGINE_THEME_NAME ),
			'date' => __( 'Date', ENGINE_THEME_NAME )
		);
		return $columns;
	}

	/*CUSTOM COLUMNS LIST*/
	add_action( 'manage_projects_posts_custom_column', 'manage_projects_columns', 10, 2 );
	function manage_projects_columns( $column, $post_id ) {
		global $post;

		switch($column) {
			case 'category' :
				$terms = get_the_terms( $post_id, 'project_categories' );
				if ( !empty( $terms ) ) {
					$out = array();
					foreach ( $terms as $term ) {
						$out[] = sprintf( '<a href="%s">%s</a>',
							esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'project_categories' => $term->slug ), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'project_categories', 'display' ) )
						);
					}
					echo join( ', ', $out );
				}				
				else { __( 'No Categories', ENGINE_THEME_NAME ); }
			break;

			case 'thumbnail' : 
      			echo the_post_thumbnail( array(35,35) );
      		break;
			
			default :
			break;
		}
	}


	/**********************************************
	CUSTOM POST TYPE: SERVICES
	***********************************************/	
	
	add_action( 'init', 'services_post_type' );
	function services_post_type() {

		if(get_option('arch_services_cpt')!="") { $services_name = get_option('arch_services_cpt'); } else { $services_name = "Services"; }
		if(get_option('arch_services_cpt_slug')!="") { $services_slug = get_option('arch_services_cpt_slug'); } else { $services_slug = "services-item"; }
		if(get_option('arch_services_add')!="") { $services_add = get_option('arch_services_add'); } else { $services_add = "Add New Services"; }
		if(get_option('arch_services_edit')!="") { $services_edit = get_option('arch_services_edit'); } else { $services_edit = "Edit Services"; }

		register_post_type( 'services',
			array(
				'labels' => array(
					'name' => $services_name,
					'singular_name' => $services_name,
					'add_new_item' => $services_add,
					'edit_item' => $services_edit,
				),
				'public' => true,
				'has_archive' => true,	
				'exclude_from_search' => true,
				'rewrite' => array('slug' => $services_slug, 'with_front' => TRUE),
				'supports' => array('title','editor', 'author', 'page-attributes', 'thumbnail'),
				'menu_icon' => get_template_directory_uri() . '/includes/custom/img/services.png'					
			)
		);
	}	


	/*CUSTOM COLUMNS*/
	add_filter( 'manage_edit-services_columns', 'edit_services_columns' ) ;
	function edit_services_columns( $columns ) {
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Title', ENGINE_THEME_NAME ),			
			'icon' => __( 'Icon', ENGINE_THEME_NAME ),
			'author' => __( 'Author', ENGINE_THEME_NAME ),
			'date' => __( 'Date', ENGINE_THEME_NAME )
		);
		return $columns;
	}
	
	/*CUSTOM COLUMNS LIST*/
	add_action( 'manage_services_posts_custom_column', 'manage_services_columns', 10, 2 );
	function manage_services_columns( $column, $post_id ) {
		global $post;

		switch( $column ) {
			case 'icon' : 
				echo the_post_thumbnail( array(35,35) );
      		break;

      		default :
			break;
		}
	}


	/**********************************************
	CUSTOM POST TYPE: OUR TEAM
	***********************************************/	
	
	add_action( 'init', 'team_post_type' );
	function team_post_type() {

		if(get_option('arch_team_cpt')!="") { $team_name = get_option('arch_team_cpt'); } else { $team_name = "Our Team"; }
		if(get_option('arch_team_cpt_slug')!="") { $team_slug = get_option('arch_team_cpt_slug'); } else { $team_slug = "ourteam"; }
		if(get_option('arch_team_add')!="") { $team_add = get_option('arch_team_add'); } else { $team_add = "Add New Member"; }
		if(get_option('arch_team_edit')!="") { $team_edit = get_option('arch_team_edit'); } else { $team_edit = "Edit Member"; }

		register_post_type( 'ourteam',
			array(
				'labels' => array(
					'name' => $team_name,
					'singular_name' => $team_name,
					'add_new_item' => $team_add,
					'edit_item' => $team_edit,
				),
				'public' => true,
				'has_archive' => true,
				'exclude_from_search' => true,
				'rewrite' => array('slug' => $team_slug, 'with_front' => TRUE),
				'supports' => array('title','author', 'editor', 'thumbnail', 'page-attributes'),
				'menu_icon' => get_template_directory_uri() . '/includes/custom/img/team.png'			
			)
		);
	}	
	
	/*META*/
	function team_meta() {
		global $post;

		$position = get_post_meta($post->ID, 'position', TRUE);
		$facebook = get_post_meta($post->ID, 'facebook', TRUE);
		$twitter = get_post_meta($post->ID, 'twitter', TRUE);
		$tumblr = get_post_meta($post->ID, 'tumblr', TRUE);
		$pinterest = get_post_meta($post->ID, 'pinterest', TRUE);
		$behance = get_post_meta($post->ID, 'behance', TRUE);
		$dribbble = get_post_meta($post->ID, 'dribbble', TRUE);
		$youtube = get_post_meta($post->ID, 'youtube', TRUE);

		?>
			<div class="mabuc-form-wrap">
				<table>
					<tr>
						<td style="width:10%;"><label for="position"><?php _e( 'Position', ENGINE_THEME_NAME ); ?></label></td>
						<td>
							<input id="position" name="position" type="text" value="<?php echo $position; ?>" /><br>
							<span class="desc"><?php _e( 'Add the position of this member', ENGINE_THEME_NAME ); ?></span>
						</td>
					</tr>
					<tr>
						<td><label for="facebook"><?php _e( 'Facebook', ENGINE_THEME_NAME ); ?></label></td>
						<td>
							<input name="facebook" id="facebook" type="text" value="<?php echo $facebook; ?>" /><br>
							<span class="desc"><?php _e( 'Add the facebook username of this member', ENGINE_THEME_NAME ); ?></span>
						</td>
					</tr>
					<tr>
						<td><label for="twitter"><?php _e( 'Twitter', ENGINE_THEME_NAME ); ?></label></td>
						<td>
							<input name="twitter" id="twitter" type="text" value="<?php echo $twitter; ?>" /><br>
							<span class="desc"><?php _e( 'Add the twitter username of this member', ENGINE_THEME_NAME ); ?></span>
						</td>
					</tr>
					<tr>
						<td><label for="tumblr"><?php _e( 'Tumblr', ENGINE_THEME_NAME ); ?></label></td>
						<td>
							<input name="tumblr" id="tumblr" type="text" value="<?php echo $tumblr; ?>" /><br>
							<span class="desc"><?php _e( 'Add the tumblr id of this member', ENGINE_THEME_NAME ); ?></span>
						</td>
					</tr>
					<tr>
						<td><label for="pinterest"><?php _e( 'Pinterest', ENGINE_THEME_NAME ); ?></label></td>
						<td>
							<input name="pinterest" id="pinterest" type="text" value="<?php echo $pinterest; ?>" /><br>
							<span class="desc"><?php _e( 'Add the pinterest username of this member', ENGINE_THEME_NAME ); ?></span>
						</td>
					</tr>
					<tr>
						<td><label for="behance"><?php _e( 'Behance', ENGINE_THEME_NAME ); ?></label></td>
						<td>
							<input name="behance" id="behance" type="text" value="<?php echo $behance; ?>" /><br>
							<span class="desc"><?php _e( 'Add the behance username of this member', ENGINE_THEME_NAME ); ?></span>
						</td>
					</tr>
					<tr>
						<td><label for="dribbble"><?php _e( 'Dribbble', ENGINE_THEME_NAME ); ?></label></td>
						<td>
							<input name="dribbble" id="dribbble" type="text" value="<?php echo $dribbble; ?>" /><br>
							<span class="desc"><?php _e( 'Add the dribbble username of this member', ENGINE_THEME_NAME ); ?></span>
						</td>
					</tr>
					<tr>
						<td><label for="youtube"><?php _e( 'Youtube', ENGINE_THEME_NAME ); ?></label></td>
						<td>
							<input name="youtube" id="youtube" type="text" value="<?php echo $youtube; ?>" /><br>
							<span class="desc"><?php _e( 'Add the youtube channel of this member', ENGINE_THEME_NAME ); ?></span>
						</td>
					</tr>
				</table>
			</div>	
		<?php
	}
	
	/*CUSTOM COLUMNS*/
	add_filter( 'manage_edit-ourteam_columns', 'edit_ourteam_columns' ) ;
	function edit_ourteam_columns( $columns ) {
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Name', ENGINE_THEME_NAME ),			
			'position' => __( 'Position', ENGINE_THEME_NAME ),
			'author' => __( 'Author', ENGINE_THEME_NAME ),
			'thumbnail' => __( 'Thumbnail', ENGINE_THEME_NAME ),
			'date' => __( 'Date', ENGINE_THEME_NAME )
		);
		return $columns;
	}
	
	/*CUSTOM COLUMNS LIST*/
	add_action( 'manage_ourteam_posts_custom_column', 'manage_ourteam_columns', 10, 2 );
	function manage_ourteam_columns( $column, $post_id ) {
		global $post;

		switch( $column ) {
			case 'position' :
				$position = get_post_meta( $post_id, 'position', true );
				if ( empty( $position ) )
					echo __( 'Unknown', ENGINE_THEME_NAME );
				else
					printf( __( '%s', ENGINE_THEME_NAME ), $position );
			break;

			case 'thumbnail' : 
      			echo the_post_thumbnail( array(35,35) );
      		break;
			
			default :
			break;
		}
	}	


	/**********************************************
	SAVE & UPDATE CUSTOM FIELDS
	***********************************************/
	
	add_action( 'add_meta_boxes', 'custom_posts_box' );
	function custom_posts_box(){
		add_meta_box("project_meta", "Project Options", "project_meta", "projects", "normal", "low");
		add_meta_box("team_meta", "Member Options", "team_meta", "ourteam", "normal", "low");	
	}	
	
	add_action('save_post', 'custom_posts_save');
	function custom_posts_save( $post_id ){
		
		if ((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX)) return;
		if ( 'page' == isset($_POST['post_type']) ) { if ( !current_user_can( 'edit_page', $post_id ) ) return;
		} else { if ( !current_user_can( 'edit_post', $post_id ) ) return; }
			 
		update_post_meta($post_id, "bgslide", @$_POST["bgslide"]);
		update_post_meta($post_id, "bgimage", @$_POST["bgimage"]);
		update_post_meta($post_id, "exclude", @$_POST["exclude"]);
		update_post_meta($post_id, "video", @$_POST["video"]);
		update_post_meta($post_id, "position", @$_POST["position"]);
		update_post_meta($post_id, "facebook", @$_POST["facebook"]);	
		update_post_meta($post_id, "twitter", @$_POST["twitter"]);			
		update_post_meta($post_id, "tumblr", @$_POST["tumblr"]);	
		update_post_meta($post_id, "pinterest", @$_POST["pinterest"]);	
		update_post_meta($post_id, "behance", @$_POST["behance"]);	
		update_post_meta($post_id, "dribbble", @$_POST["dribbble"]);	
		update_post_meta($post_id, "youtube", @$_POST["youtube"]);
		update_post_meta($post_id, "url", @$_POST["url"]);
	}	
?>