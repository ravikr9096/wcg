<?php
	/**********************************************
	CUSTOM NEWSLETTER WIDGET
	***********************************************/
	
	class Widget_Newsletter extends WP_Widget {
	
		function Widget_Newsletter() {			
			$widget_ops = array('classname' => 'widget-newsletter', 'description' => __('Arch custom widget for newsletter', ENGINE_THEME_NAME));	
			$this -> WP_Widget('Newsletter', __('Arch: Custom Newsletter', ENGINE_THEME_NAME), $widget_ops);		
		}

		function widget($args, $instance) {		
			extract($args);		
			$title = apply_filters('widget_title', $instance['title']);		
			if (empty($title)) $title = false;
				$instance_newsletter_uri = array();
				$instance_newsletter_text_label = array();
				$instance_newsletter_submit_label = array();
				$instance_newsletter_bdesc = array();
				
				$newsletter_uri = 'newsletter_uri';
				$instance_newsletter_uri = isset($instance[$newsletter_uri]) ? $instance[$newsletter_uri] : '';
				$newsletter_text_label = 'newsletter_text_label';
				$instance_newsletter_text_label = isset($instance[$newsletter_text_label]) ? $instance[$newsletter_text_label] : '';
				$newsletter_submit_label = 'newsletter_submit_label';
				$instance_newsletter_submit_label = isset($instance[$newsletter_submit_label]) ? $instance[$newsletter_submit_label] : '';
				$newsletter_bdesc = 'newsletter_bdesc';
				$instance_newsletter_bdesc = isset($instance[$newsletter_bdesc]) ? $instance[$newsletter_bdesc] : '';

				echo $before_widget;					
				if ($title) {						
					echo $before_title;
					echo $title;
					echo $after_title;						
				}
				
				?>

				<!--SUBSCRIBE-->
				<div class="newsletter">
					<label><?php echo $instance_newsletter_bdesc; ?></label>
					<form action="http://feedburner.google.com/fb/a/mailverify" method="post">
						<p><input type="text" name="subscribe" value="<?php echo $instance_newsletter_text_label; ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" /><input type="hidden" value="<?php echo $instance_newsletter_uri; ?>" name="uri"/><input type="hidden" name="loc" value="en_US"/><input type="submit" name="subscribe" value="<?php echo $instance_newsletter_submit_label; ?>" />	
						</p>
					</form>
				</div>

				<?php
					echo $after_widget.'';				
				}
			
				function update($new_instance, $old_instance) {				
					$instance = $old_instance;				
					$instance['title'] = strip_tags($new_instance['title']);
					$instance['newsletter_uri'] = $new_instance['newsletter_uri'];
					$instance['newsletter_text_label'] = $new_instance['newsletter_text_label'];
					$instance['newsletter_submit_label'] = $new_instance['newsletter_submit_label'];
					$instance['newsletter_bdesc'] = $new_instance['newsletter_bdesc'];						
					return $instance;			
				}
			
				function form($instance) {				
					$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
					$instance_newsletter_uri = array();
					$instance_newsletter_text_label = array();
					$instance_newsletter_submit_label = array();
					$instance_newsletter_bdesc = array();

					$newsletter_uri = 'newsletter_uri';
					$instance_newsletter_uri = isset($instance[$newsletter_uri]) ? $instance[$newsletter_uri] : '';
					$newsletter_text_label = 'newsletter_text_label';
					$instance_newsletter_text_label = isset($instance[$newsletter_text_label]) ? $instance[$newsletter_text_label] : '';
					$newsletter_submit_label = 'newsletter_submit_label';
					$instance_newsletter_submit_label = isset($instance[$newsletter_submit_label]) ? $instance[$newsletter_submit_label] : '';
					$newsletter_bdesc = 'newsletter_bdesc';
					$instance_newsletter_bdesc = isset($instance[$newsletter_bdesc]) ? $instance[$newsletter_bdesc] : '';				
					
				?>
					<p><label for="<?php echo $this -> get_field_id('title'); ?>"><?php _e('Title:', ENGINE_THEME_NAME); ?></label>
					<input class="widefat" id="<?php echo $this -> get_field_id('title'); ?>" name="<?php echo $this -> get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>					
					<div>			
						<div>
							<p><label for="<?php echo $this -> get_field_id($newsletter_uri); ?>"><?php _e('Uri:', ENGINE_THEME_NAME); ?></label>
							<input class="widefat" type="text" id="<?php echo $this -> get_field_id($newsletter_uri); ?>" name="<?php echo $this -> get_field_name($newsletter_uri); ?>" value="<?php echo $instance_newsletter_uri; ?>">		
							</p>
							<p><label for="<?php echo $this -> get_field_id($newsletter_text_label); ?>"><?php _e('Text Label:', ENGINE_THEME_NAME); ?></label>
							<input class="widefat" type="text" id="<?php echo $this -> get_field_id($newsletter_text_label); ?>" name="<?php echo $this -> get_field_name($newsletter_text_label); ?>" value="<?php echo $instance_newsletter_text_label; ?>">		
							</p>
							<p><label for="<?php echo $this -> get_field_id($newsletter_submit_label); ?>"><?php _e('Submit Label:', ENGINE_THEME_NAME); ?></label>
							<input class="widefat" type="text" id="<?php echo $this -> get_field_id($newsletter_submit_label); ?>" name="<?php echo $this -> get_field_name($newsletter_submit_label); ?>" value="<?php echo $instance_newsletter_submit_label; ?>">		
							</p>
							<p><label for="<?php echo $this -> get_field_id($newsletter_bdesc); ?>"><?php _e('Brief Description:', ENGINE_THEME_NAME); ?></label>
							<textarea class="widefat" type="text" id="<?php echo $this -> get_field_id($newsletter_bdesc); ?>" name="<?php echo $this -> get_field_name($newsletter_bdesc); ?>"><?php echo $instance_newsletter_bdesc; ?></textarea>
							</p>												
						</div>			
					</div>
		<?php
				}			
		}

		function widgets_newsletter() {			
			register_widget('Widget_Newsletter');			
		}
		add_action('widgets_init', 'widgets_newsletter');
?>