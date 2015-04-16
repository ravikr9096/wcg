<?php
	/**********************************************
	CUSTOM VIDEO WIDGET
	***********************************************/
	
	class Widget_Video extends WP_Widget {
	
		function Widget_Video() {		
			$widget_ops = array('classname' => 'widget-video', 'description' => __('Arch custom widget for video', ENGINE_THEME_NAME));	
			$this -> WP_Widget('Video', __('Arch: Custom Video', ENGINE_THEME_NAME), $widget_ops);		
		}
	
		function widget($args, $instance) {		
			extract($args);		
			$title = apply_filters('widget_title', $instance['title']);		
			if (empty($title)) $title = false;
				$instance_video_url = array();
				$instance_portfolio_bdesc = array();
				
				$video_url = 'video_url';
				$instance_video_url = isset($instance[$video_url]) ? $instance[$video_url] : '';

				echo $before_widget;					

				?>	
				
				<!--VIDEO-->
				<?php
					if ($title) {						
						echo $before_title;
						echo $title;
						echo $after_title;						
					}
				
					echo $instance_video_url;

				?>

				<?php
					echo $after_widget.'';				
				}
			
				function update($new_instance, $old_instance) {				
					$instance = $old_instance;				
					$instance['title'] = strip_tags($new_instance['title']);
					$instance['video_url'] = $new_instance['video_url'];				
					return $instance;				
				}
			
				function form($instance) {				
					$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
					$instance_video_url = array();
					
					$video_url = 'video_url';
					$instance_video_url = isset($instance[$video_url]) ? $instance[$video_url] : '';			
					
				?>
					<p><label for="<?php echo $this -> get_field_id('title'); ?>"><?php _e('Title:', ENGINE_THEME_NAME); ?></label>
					<input class="widefat" id="<?php echo $this -> get_field_id('title'); ?>" name="<?php echo $this -> get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>					
					<div>			
						<div>
							<p><label for="<?php echo $this -> get_field_id($video_url); ?>"><?php _e('Video URL:', ENGINE_THEME_NAME); ?></label>
							<textarea class="widefat" type="text" id="<?php echo $this -> get_field_id($video_url); ?>" name="<?php echo $this -> get_field_name($video_url); ?>"><?php echo $instance_video_url; ?></textarea>		
							</p>
							<small><i><?php _e( 'Please enter the entire embedd codes from vimeo, youtube or dailymotion', ENGINE_THEME_NAME ); ?></i></small>
						</div>			
					</div>
		<?php
				}			
		}

		function widgets_video() {			
			register_widget('Widget_Video');			
		}
		add_action('widgets_init', 'widgets_video');
?>