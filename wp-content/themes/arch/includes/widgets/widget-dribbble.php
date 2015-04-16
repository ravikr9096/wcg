<?php
	
	/**********************************************
	CUSTOM DRIBBBLE FEED WIDGET
	***********************************************/
	
	class Widget_Dribbble extends WP_Widget {
	
		function Widget_Dribbble() {		
			$widget_ops = array('classname' => 'widget-dribbble', 'description' => __('Arch custom widget for dribbble feed', ENGINE_THEME_NAME));	
			$this -> WP_Widget('DribbbleFeed', __('Arch: Custom Dribbble Feed', ENGINE_THEME_NAME), $widget_ops);		
		}
	
		function widget($args, $instance) {		
			extract($args);		
			$title = apply_filters('widget_title', $instance['title']);		
			if (empty($title)) $title = false;
				$instance_dribbble_id = array();
				$instance_dribbble_limit = array();
				
				$dribbble_id = 'dribbble_id';
				$instance_dribbble_id = isset($instance[$dribbble_id]) ? $instance[$dribbble_id] : '';
				$dribbble_limit = 'dribbble_limit';
				$instance_dribbble_limit = isset($instance[$dribbble_limit]) ? $instance[$dribbble_limit] : '';
							
				echo ''.$before_widget.'';					
					if ($title) {						
						echo $before_title;
						echo $title;
						echo $after_title.'';						
					}

				?>	

				<!--DRIBBBLE FEED-->
				<ul id="dribbble" class="clear"></ul>

				<script type="text/javascript">
					(function($) {
					  	"use strict";
					  	$(document).ready(function () {		
							$.jribbble.getShotsByPlayerId( '<?php echo $instance_dribbble_id; ?>', function (playerShots) {
							    var html = [];
							
							    $.each(playerShots.shots, function (i, shot) {
							        html.push('<li><a href="' + shot.url + '" target="_blank">');
							        html.push('<img src="' + shot.image_teaser_url + '" ');
							        html.push('alt="' + shot.title + '"></a></li>');
							    });
							
							    $('#dribbble').html(html.join(''));
							}, {page: 1, per_page: <?php echo $instance_dribbble_limit; ?> });
						});
					})(jQuery);					
				</script>

				<?php
					echo $after_widget.'';				
				}
			
				function update($new_instance, $old_instance) {				
					$instance = $old_instance;				
					$instance['title'] = strip_tags($new_instance['title']);
					$instance['dribbble_id'] = $new_instance['dribbble_id'];
					$instance['dribbble_limit'] = $new_instance['dribbble_limit'];				
					return $instance;				
				}
			
				function form($instance) {				
					$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
					$instance_dribbble_id = array();
					$instance_dribbble_limit = array();							
					
					$dribbble_id = 'dribbble_id';
					$instance_dribbble_id = isset($instance[$dribbble_id]) ? $instance[$dribbble_id] : '';
					$dribbble_limit = 'dribbble_limit';
					$instance_dribbble_limit = isset($instance[$dribbble_limit]) ? $instance[$dribbble_limit] : '';	
					
				?>
					<p><label for="<?php echo $this -> get_field_id('title'); ?>"><?php _e('Title:', ENGINE_THEME_NAME); ?></label>
					<input class="widefat" id="<?php echo $this -> get_field_id('title'); ?>" name="<?php echo $this -> get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>					
					<div>			
						<div>
							<p><label for="<?php echo $this -> get_field_id($dribbble_id); ?>"><?php _e('User ID:', ENGINE_THEME_NAME); ?></label>
							<input class="widefat" type="text" id="<?php echo $this -> get_field_id($dribbble_id); ?>" name="<?php echo $this -> get_field_name($dribbble_id); ?>" value="<?php echo $instance_dribbble_id; ?>">		
							</p>
							<p><label for="<?php echo $this -> get_field_id($dribbble_limit); ?>"><?php _e('Limit:', ENGINE_THEME_NAME); ?></label>
							<input class="widefat" type="text" id="<?php echo $this -> get_field_id($dribbble_limit); ?>" name="<?php echo $this -> get_field_name($dribbble_limit); ?>" value="<?php echo $instance_dribbble_limit; ?>">
							</p>														
						</div>			
					</div>
		<?php
				}			
		}

		function widget_enqueue_dribbble() {
			wp_register_script( 'dribbble', get_template_directory_uri() . '/js/jribbble.js', array(), '', true );
			wp_enqueue_script( 'dribbble' );
		}
		add_action( 'wp_enqueue_scripts', 'widget_enqueue_dribbble' );	

		function Widget_dribbble() {			
			register_widget('Widget_Dribbble');			
		}
		add_action('widgets_init', 'Widget_dribbble');
?>