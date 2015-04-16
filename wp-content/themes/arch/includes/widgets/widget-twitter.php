<?php
	
	/**********************************************
	CUSTOM TWITTER FEED WIDGET
	***********************************************/
	
	class Widget_TwitterFeed extends WP_Widget {
	
		function Widget_TwitterFeed() {		
			$widget_ops = array('classname' => 'widget-twitter', 'description' => __('Arch custom widget for twitter feed', ENGINE_THEME_NAME));	
			$this -> WP_Widget('Twitter', __('Arch: Custom Twitter Feed', ENGINE_THEME_NAME), $widget_ops);		
		}

		function widget($args, $instance) {		
			extract($args);		
			$title = apply_filters('widget_title', $instance['title']);		
			if (empty($title)) $title = false;
				$instance_twitter_id = array();
				$instance_twitter_asize = array();
				$instance_twitter_limit = array();
				$instance_twitter_loading_text = array();
				
				$twitter_id = 'twitter_id';
				$instance_twitter_id = isset($instance[$twitter_id]) ? $instance[$twitter_id] : '';
				$twitter_asize = 'twitter_asize';
				$instance_twitter_asize = isset($instance[$twitter_asize]) ? $instance[$twitter_asize] : '';
				$twitter_limit = 'twitter_limit';
				$instance_twitter_limit = isset($instance[$twitter_limit]) ? $instance[$twitter_limit] : '';
				$twitter_loading_text = 'twitter_loading_text';
				$instance_twitter_loading_text = isset($instance[$twitter_loading_text]) ? $instance[$twitter_loading_text] : '';
							
				echo ''.$before_widget.'';					
					if ($title) {						
						echo $before_title;
						echo $title;
						echo $after_title.'';						
					}

				?>	

				<script type="text/javascript">
					(function($) {
					  	"use strict";
					  	
					  	jQuery(function($){
							$("#ticker").tweet({
						        modpath: "<?php echo get_template_directory_uri(); ?>/js/twitter/index.php",
								username: "<?php echo $instance_twitter_id; ?>",
								page: 1,
								//avatar_size: <?php echo $instance_twitter_asize; ?>,
								count: <?php echo $instance_twitter_limit; ?>,							
								loading_text: "<?php echo $instance_twitter_loading_text; ?>...",	
					        });

							$(document).ready(function() {
								var ul = $(this).find(".tweet_list");
								var ticker = function() {
									setTimeout(function() {
										var top = ul.position().top;
										var h = ul.height();
										var incr = (h / ul.children().length);
										var newTop = top - incr;
										if (h + newTop <= 0) newTop = 0;
										ul.animate( {top: newTop}, 500 );
										ticker();
									}, 7000);
								};
								ticker();							
							});						
						});

					})(jQuery);					
				</script>
				
				<!--TWITTER FEED-->
				<div id="ticker">&nbsp;</div>  

				<?php
					echo $after_widget.'';				
				}
			
				function update($new_instance, $old_instance) {				
					$instance = $old_instance;				
					$instance['title'] = strip_tags($new_instance['title']);
					$instance['twitter_id'] = $new_instance['twitter_id'];
					$instance['twitter_asize'] = $new_instance['twitter_asize'];				
					$instance['twitter_limit'] = $new_instance['twitter_limit'];				
					$instance['twitter_loading_text'] = $new_instance['twitter_loading_text'];				
					return $instance;				
				}
			
				function form($instance) {				
					$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
					$instance_twitter_id = array();
					$instance_twitter_asize = array();							
					$instance_twitter_limit = array();							
					$instance_twitter_loading_text = array();							
					
					$twitter_id = 'twitter_id';
					$instance_twitter_id = isset($instance[$twitter_id]) ? $instance[$twitter_id] : '';
					$twitter_asize = 'twitter_asize';
					$instance_twitter_asize = isset($instance[$twitter_asize]) ? $instance[$twitter_asize] : '';
					$twitter_limit = 'twitter_limit';
					$instance_twitter_limit = isset($instance[$twitter_limit]) ? $instance[$twitter_limit] : '';	
					$twitter_loading_text = 'twitter_loading_text';
					$instance_twitter_loading_text = isset($instance[$twitter_loading_text]) ? $instance[$twitter_loading_text] : '';					
					
				?>
					<p><label for="<?php echo $this -> get_field_id('title'); ?>"><?php _e('Title:', ENGINE_THEME_NAME); ?></label>
					<input class="widefat" id="<?php echo $this -> get_field_id('title'); ?>" name="<?php echo $this -> get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>					
					<div>			
						<div>
							<p><label for="<?php echo $this -> get_field_id($twitter_id); ?>"><?php _e('ID:', ENGINE_THEME_NAME); ?></label>
							<input class="widefat" type="text" id="<?php echo $this -> get_field_id($twitter_id); ?>" name="<?php echo $this -> get_field_name($twitter_id); ?>" value="<?php echo $instance_twitter_id; ?>">		
							</p>
							<!--<p><label for="<?php echo $this -> get_field_id($twitter_asize); ?>"><?php _e('Avatar Size:', ENGINE_THEME_NAME); ?></label>
							<input class="widefat" type="text" id="<?php echo $this -> get_field_id($twitter_asize); ?>" name="<?php echo $this -> get_field_name($twitter_asize); ?>" value="<?php echo $instance_twitter_asize; ?>">
							</p>-->
							<p><label for="<?php echo $this -> get_field_id($twitter_limit); ?>"><?php _e('Limit:', ENGINE_THEME_NAME); ?></label>
							<input class="widefat" type="text" id="<?php echo $this -> get_field_id($twitter_limit); ?>" name="<?php echo $this -> get_field_name($twitter_limit); ?>" value="<?php echo $instance_twitter_limit; ?>">
							</p>	
							<p><label for="<?php echo $this -> get_field_id($twitter_loading_text); ?>"><?php _e('Loading Text:', ENGINE_THEME_NAME); ?></label>
							<input class="widefat" type="text" id="<?php echo $this -> get_field_id($twitter_loading_text); ?>" name="<?php echo $this -> get_field_name($twitter_loading_text); ?>" value="<?php echo $instance_twitter_loading_text; ?>">
							</p>														
						</div>			
					</div>
		<?php
				}			
		}

		function widget_enqueue_twitter() {
			wp_register_script( 'tweet', get_template_directory_uri() . '/js/twitter/jquery.tweet.js', array(), '', true );
			wp_enqueue_script( 'tweet' );
		}
		add_action( 'wp_enqueue_scripts', 'widget_enqueue_twitter' );	


		function widgets_twitterfeed() {			
			register_widget('Widget_TwitterFeed');			
		}
		add_action('widgets_init', 'widgets_twitterfeed');

?>