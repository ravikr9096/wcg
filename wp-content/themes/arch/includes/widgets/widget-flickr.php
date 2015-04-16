<?php
	/**********************************************
	CUSTOM FLICKR FEED WIDGET
	***********************************************/
	
	class Widget_Flickr extends WP_Widget {
	
		function Widget_Flickr() {		
			$widget_ops = array('classname' => 'widget-flickr', 'description' => __('Arch custom widget for flickr feed', ENGINE_THEME_NAME));	
			$this -> WP_Widget('Flickr', __('Arch: Custom Flickr Feed', ENGINE_THEME_NAME), $widget_ops);		
		}
	
		function widget($args, $instance) {		
			extract($args);		
			$title = apply_filters('widget_title', $instance['title']);		
			if (empty($title)) $title = false;
				$instance_flickr_id = array();
				$instance_flickr_limit = array();
				
				$flickr_id = 'flickr_id';
				$instance_flickr_id = isset($instance[$flickr_id]) ? $instance[$flickr_id] : '';
				$flickr_limit = 'flickr_limit';
				$instance_flickr_limit = isset($instance[$flickr_limit]) ? $instance[$flickr_limit] : '';
							
				echo ''.$before_widget.'';					
				if ($title) {						
					echo $before_title;
			 		echo $title;
			 		echo $after_title.'';						
			 	}

				?>
				<ul id="fbox" class="clear">
					<?php
						function attr($s,$attrname) { // return html attribute
							preg_match_all('#\s*('.$attrname.')\s*=\s*["|\']([^"\']*)["|\']\s*#i', $s, $x);
							if (count($x)>=3) return $x[2][0]; else return "";
						}

						function parseFlickrFeed($id,$n) {
							$url = "http://api.flickr.com/services/feeds/photos_public.gne?id={$id}&lang=it-it&format=rss_200";
							$s = wp_remote_fopen($url);
							preg_match_all('#<item>(.*)</item>#Us', $s, $items);
							$out = "";
							for($i=0;$i<count($items[1]);$i++) {
								if($i>=$n) return $out;
								$item = $items[1][$i];
								preg_match_all('#<link>(.*)</link>#Us', $item, $temp);
								$link = $temp[1][0];
								preg_match_all('#<title>(.*)</title>#Us', $item, $temp);
								$title = $temp[1][0];
								preg_match_all('#<media:thumbnail([^>]*)>#Us', $item, $temp);
								$thumb = attr($temp[0][0],"url");
								$out.="<li><a href='$link' onclick='window.open(this.href); return false;' title=\"".str_replace('"','',$title)."\"><img src='$thumb' alt='' title='' /></a></li>";
							}
							return $out;
						}

						echo parseFlickrFeed("$instance_flickr_id", $instance_flickr_limit);
					?>
				</ul>					
				<?php
					echo $after_widget.'';				
				}
			
				function update($new_instance, $old_instance) {				
					$instance = $old_instance;				
					$instance['title'] = strip_tags($new_instance['title']);
					$instance['flickr_id'] = $new_instance['flickr_id'];
					$instance['flickr_limit'] = $new_instance['flickr_limit'];				
					return $instance;				
				}
			
				function form($instance) {				
					$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
					$instance_flickr_id = array();
					$instance_flickr_limit = array();							
					
					$flickr_id = 'flickr_id';
					$instance_flickr_id = isset($instance[$flickr_id]) ? $instance[$flickr_id] : '';
					$flickr_limit = 'flickr_limit';
					$instance_flickr_limit = isset($instance[$flickr_limit]) ? $instance[$flickr_limit] : '';					
					
				?>
					<p><label for="<?php echo $this -> get_field_id('title'); ?>"><?php _e('Title:', ENGINE_THEME_NAME); ?></label>
					<input class="widefat" id="<?php echo $this -> get_field_id('title'); ?>" name="<?php echo $this -> get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>					
					<div>			
						<div>
							<p><label for="<?php echo $this -> get_field_id($flickr_id); ?>"><?php _e('ID:', ENGINE_THEME_NAME); ?></label>
							<input class="widefat" type="text" id="<?php echo $this -> get_field_id($flickr_id); ?>" name="<?php echo $this -> get_field_name($flickr_id); ?>" value="<?php echo $instance_flickr_id; ?>">		
							</p>
							<p><label for="<?php echo $this -> get_field_id($flickr_limit); ?>"><?php _e('Number of Photos:', ENGINE_THEME_NAME); ?></label>
							<input class="widefat" type="text" id="<?php echo $this -> get_field_id($flickr_limit); ?>" name="<?php echo $this -> get_field_name($flickr_limit); ?>" value="<?php echo $instance_flickr_limit; ?>">
							</p>														
						</div>			
					</div>
		<?php
				}			
		}

		function widget_flickr() {			
			register_widget('Widget_Flickr');			
		}
		add_action('widgets_init', 'widget_flickr');
?>