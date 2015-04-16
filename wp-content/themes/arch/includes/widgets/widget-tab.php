<?php
	/**********************************************
	CUSTOM REVIEW WIDGET
	***********************************************/
	
	class Widget_Tab extends WP_Widget {
	
		function Widget_Tab() {		
			$widget_ops = array('classname' => 'widget-tab', 'description' => __('Arch custom widget for tabs', ENGINE_THEME_NAME));	
			$this -> WP_Widget('Tabs', __('Arch: Custom Tabs', ENGINE_THEME_NAME), $widget_ops);		
		}
	
		function widget($args, $instance) {		
			extract($args);		
			$title = apply_filters('widget_title', $instance['title']);		
			if (empty($title)) $title = false;
				$instance_tab_one = array();
				$instance_tab_two = array();
				$instance_tab_limit = array();
				
				$tab_one = 'tab_one';
				$instance_tab_one = isset($instance[$tab_one]) ? $instance[$tab_one] : '';			
				$tab_two = 'tab_two';
				$instance_tab_two = isset($instance[$tab_two]) ? $instance[$tab_two] : '';	
				$tab_limit = 'tab_limit';
				$instance_tab_limit = isset($instance[$tab_limit]) ? $instance[$tab_limit] : '';	

				echo $before_widget;					

				if ($title) {						
					echo $before_title;
					echo $title;
					echo $after_title;						
				}

				?>	
					
				<!--TABS-->
				<ul class="tab-menu clear"> 
					<li><a href="#tab<?php echo $instance_tab_one; ?>"><?php echo $instance_tab_one; ?></a></li> 
					<li><a href="#tab<?php echo $instance_tab_two; ?>"><?php echo $instance_tab_two; ?></a></li>
				</ul> 

				<div class="tab-container">
					<div id="tab<?php echo $instance_tab_one; ?>" class="tab-content">
						<ul>
							<?php
								if($instance_tab_one == "Recent" || $instance_tab_one == "recent") {
									$args = array( 'post_type' => 'post', 'posts_per_page' => $instance_tab_limit );								
									$wp_query = new WP_Query( $args );	
									for($i = 1; $wp_query->have_posts(); $i++) { 							
										$wp_query->the_post();
										$columns = $instance_tab_limit;
										$class = ($i % $columns == 0) ? 'last' : '';
									?>
									<li class="<?php echo $class; ?>">
										<div class="img-tail">
											<a href="<?php the_permalink(); ?>">
												<?php
													if ( has_post_thumbnail() ) {
														the_post_thumbnail('blog-thumb', array('title' => ''.get_the_title().''));
													}
												?>
											</a>
										</div>
										<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
										<span class="details"><?php the_time('F d, Y'); ?></span>
									</li>
									<?php
									};
									wp_reset_query(); 
								}elseif($instance_tab_one == "Popular" || $instance_tab_one == "popular") {
									$args = array( 'post_type' => 'post', 'orderby' => 'comment_count', 'posts_per_page' => $instance_tab_limit );								
									$wp_query = new WP_Query( $args );	
									for($i = 1; $wp_query->have_posts(); $i++) { 							
										$wp_query->the_post();
										$columns = $instance_tab_limit;
										$class = ($i % $columns == 0) ? 'last' : '';
									?>
									<li class="<?php echo $class; ?>">
										<div class="img-tail">
											<a href="<?php the_permalink(); ?>">
												<?php
													if ( has_post_thumbnail() ) {
														the_post_thumbnail('blog-thumb', array('title' => ''.get_the_title().''));
													}
												?>
											</a>
										</div>
										<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
										<span class="details"><?php the_time('F d, Y'); ?></span>
									</li>
									<?php
									};
									wp_reset_query(); 
								}
							?>
						</ul>
					</div>	
					<div id="tab<?php echo $instance_tab_two; ?>" class="tab-content">
						<ul>
							<?php
								if($instance_tab_two == "Recent" || $instance_tab_two == "recent") {
									$args = array( 'post_type' => 'post', 'posts_per_page' => $instance_tab_limit );								
									$wp_query = new WP_Query( $args );	
									for($i = 1; $wp_query->have_posts(); $i++) { 							
										$wp_query->the_post();
										$columns = $instance_tab_limit;
										$class = ($i % $columns == 0) ? 'last' : '';
									?>
									<li class="<?php echo $class; ?>">
										<div class="img-tail">
											<a href="<?php the_permalink(); ?>">
												<?php
													if ( has_post_thumbnail() ) {
														the_post_thumbnail('blog-thumb', array('title' => ''.get_the_title().''));
													}
												?>
											</a>
										</div>
										<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
										<span class="details"><?php the_time('F d, Y'); ?></span>
									</li>
									<?php
									};
									wp_reset_query(); 
								}elseif($instance_tab_two == "Popular" || $instance_tab_two == "popular") {
									$args = array( 'post_type' => 'post', 'orderby' => 'comment_count', 'posts_per_page' => $instance_tab_limit );								
									$wp_query = new WP_Query( $args );	
									for($i = 1; $wp_query->have_posts(); $i++) { 							
										$wp_query->the_post();
										$columns = $instance_tab_limit;
										$class = ($i % $columns == 0) ? 'last' : '';
									?>
									<li class="<?php echo $class; ?>">
										<div class="img-tail">
											<a href="<?php the_permalink(); ?>">
												<?php
													if ( has_post_thumbnail() ) {
														the_post_thumbnail('blog-thumb', array('title' => ''.get_the_title().''));
													}
												?>
											</a>
										</div>
										<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
										<span class="details"><?php the_time('F d, Y'); ?></span>
									</li>
									<?php
									};
									wp_reset_query(); 
								}
							?>
						</ul>
					</div>													
				</div>	

				<?php
					echo $after_widget.'';				
				}
			
				function update($new_instance, $old_instance) {				
					$instance = $old_instance;				
					$instance['title'] = strip_tags($new_instance['title']);
					$instance['tab_one'] = $new_instance['tab_one'];				
					$instance['tab_two'] = $new_instance['tab_two'];			
					$instance['tab_limit'] = $new_instance['tab_limit'];				
					return $instance;				
				}

				function form($instance) {				
					$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
					$instance_tab_one = array();
					$instance_tab_two = array();
					$instance_tab_limit = array();
					
					$tab_one = 'tab_one';
					$instance_tab_one = isset($instance[$tab_one]) ? $instance[$tab_one] : '';			
					$tab_two = 'tab_two';
					$instance_tab_two = isset($instance[$tab_two]) ? $instance[$tab_two] : '';	
					$tab_limit = 'tab_limit';
					$instance_tab_limit = isset($instance[$tab_limit]) ? $instance[$tab_limit] : '';	
					
				?>
									
					<div>	
						<div><p><i><small><?php _e('You can add only 2 tabs (Popular and Recent)', ENGINE_THEME_NAME); ?></small></i></p></div>		
						<div>
							<p><label for="<?php echo $this -> get_field_id($tab_one); ?>"><?php _e('Tab 1:', ENGINE_THEME_NAME); ?></label>
							<input class="widefat" type="text" id="<?php echo $this -> get_field_id($tab_one); ?>" name="<?php echo $this -> get_field_name($tab_one); ?>" value="<?php echo $instance_tab_one; ?>">		
							</p>											
						</div>		
						<div>
							<p><label for="<?php echo $this -> get_field_id($tab_two); ?>"><?php _e('Tab 2:', ENGINE_THEME_NAME); ?></label>
							<input class="widefat" type="text" id="<?php echo $this -> get_field_id($tab_two); ?>" name="<?php echo $this -> get_field_name($tab_two); ?>" value="<?php echo $instance_tab_two; ?>">		
							</p>											
						</div>
						<div>
							<p><label for="<?php echo $this -> get_field_id($tab_limit); ?>"><?php _e('Limit:', ENGINE_THEME_NAME); ?></label>
							<input class="widefat" type="text" id="<?php echo $this -> get_field_id($tab_limit); ?>" name="<?php echo $this -> get_field_name($tab_limit); ?>" value="<?php echo $instance_tab_limit; ?>">		
							</p>											
						</div>	
					</div>
		<?php
				}			
		}


		function widget_enqueue_tab() {
			wp_register_style( 'tab-style', get_template_directory_uri() . '/js/tabs/tabs.css' );	
			wp_enqueue_style( 'tab-style' );
			wp_register_script( 'tab', get_template_directory_uri() . '/js/tabs/jquery.tabs.js', array(), '', true );
			wp_enqueue_script( 'tab' );	
		}
		add_action( 'wp_enqueue_scripts', 'widget_enqueue_tab' );


		function widgets_tab() {			
			register_widget('Widget_Tab');			
		}
		add_action('widgets_init', 'widgets_tab');
?>