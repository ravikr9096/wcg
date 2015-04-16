<?php
/*
Template Name: About	
*/	
?>

<?php get_header(); ?>

	<div class="inside load-item">
		<div class="page-content">

			<?php get_theme_page_title(); ?>
			
			<?php
				if(get_option('arch_services_hide')!="true") {
					?>
					<!--SERVICES-->		
					<div class="services">
						<ul class="clear">
							<?php
								$services_order = get_option('arch_services_order');
								$services_orderby = get_option('arch_services_orderby');

								$args = array( 'post_type' => 'services', 'orderby' => $services_orderby, 'order' => $services_order, 'posts_per_page' => get_option('arch_num_services') );	
								$wp_query = new WP_Query( $args );	
								
								for($i = 1; $wp_query->have_posts(); $i++) { 							
									$wp_query->the_post();			
									$columns = 3;	
									$class = '';
									$class .= ($i % $columns == 0) ? ' last' : '';
									?>
									<li id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
										<?php
											if ( has_post_thumbnail() ) {
												the_post_thumbnail('services-thumb', array('title' => ''.get_the_title().''));
											}
										?>
										<h3><?php the_title(); ?></h3>
										<?php the_excerpt(); ?>
									</li>
									<?php
								};
								wp_reset_query();	
							?>
						</ul>				
					</div>
					<?php
				}
			?>

			<?php
				if(get_option('arch_members_hide')!="true") {
					?>
					<!--OUR TEAM-->		
					<div class="team">
						<h2 class="ptitle"><?php if(get_option('arch_member_header')!="") { echo get_option('arch_member_header'); } else { _e( 'Who is behind Arch', ENGINE_THEME_NAME ); } ?></h2>
						<div class="team-list clear">
							<?php
								$member_order = get_option('arch_member_order');
								$member_orderby = get_option('arch_member_orderby');

								$args = array( 'post_type' => 'ourteam', 'orderby' => $member_orderby, 'order' => $member_order, 'posts_per_page' => get_option('arch_num_member') );			
								$wp_query = new WP_Query( $args );	
								
								for($i = 1; $wp_query->have_posts(); $i++) { 							
									$wp_query->the_post();			
									$columns = 3;	
									$class = 'member';
									$class .= ($i % $columns == 0) ? ' last' : '';
									?>
									<div id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
										<div class="thumbs-animate">
											<?php
												if ( has_post_thumbnail() ) {
													the_post_thumbnail(array(287,250), array('title' => ''.get_the_title().''));
												}
											?>

											<?php
												if(get_option('arch_asocial_hide')!="true") {
													?>
													<div class="team-social clear">
														<ul>
															<?php
																if(get_post_meta( $post->ID, "facebook", true )) {
																	?>
																	<li>
																		<a href="http://facebook.com/<?php echo get_post_meta( $post->ID, "facebook", true ); ?>" title="" target="_blank">
																			<img src="<?php echo get_template_directory_uri(); ?>/img/icons/facebook.png" alt="" title="" />
																		</a>
																	</li>
																	<?php
																}
																if(get_post_meta( $post->ID, "twitter", true )) {
																	?>
																	<li>
																		<a href="http://twitter.com/<?php echo get_post_meta( $post->ID, "twitter", true ); ?>" title="" target="_blank">
																			<img src="<?php echo get_template_directory_uri(); ?>/img/icons/twitter.png" alt="" title="" />
																		</a>
																	</li>
																	<?php
																}
																if(get_post_meta( $post->ID, "tumblr", true )) {
																	?>
																	<li>
																		<a href="http://<?php echo get_post_meta( $post->ID, "tumblr", true ); ?>.tumblr.com" title="" target="_blank">
																			<img src="<?php echo get_template_directory_uri(); ?>/img/icons/tumbler.png" alt="" title="" />
																		</a>
																	</li>
																	<?php
																}
																if(get_post_meta( $post->ID, "pinterest", true )) {
																	?>
																	<li>
																		<a href="http://pinterest.com/<?php echo get_post_meta( $post->ID, "pinterest", true ); ?>" title="" target="_blank">
																			<img src="<?php echo get_template_directory_uri(); ?>/img/icons/pinterest.png" alt="" title="" />
																		</a>
																	</li>
																	<?php
																}
																if(get_post_meta( $post->ID, "behance", true )) {
																	?>
																	<li>
																		<a href="http://behance.net/<?php echo get_post_meta( $post->ID, "behance", true ); ?>" title="" target="_blank">
																			<img src="<?php echo get_template_directory_uri(); ?>/img/icons/behance.png" alt="" title="" />
																		</a>
																	</li>
																	<?php
																}
																if(get_post_meta( $post->ID, "dribbble", true )) {
																	?>
																	<li>
																		<a href="http://dribbble.com/<?php echo get_post_meta( $post->ID, "dribbble", true ); ?>" title="" target="_blank">
																			<img src="<?php echo get_template_directory_uri(); ?>/img/icons/dribbble.png" alt="" title="" />
																		</a>
																	</li>
																	<?php
																}
																if(get_post_meta( $post->ID, "youtube", true )) {
																	?>
																	<li>
																		<a href="<?php echo get_post_meta( $post->ID, "youtube", true ); ?>" title="" target="_blank">
																			<img src="<?php echo get_template_directory_uri(); ?>/img/icons/youtube.png" alt="" title="" />
																		</a>
																	</li>
																	<?php
																}
															?>
														</ul>
													</div>
													<?php
												}
											?>
										</div>
										
										<div class="mdetails">
											<h3><?php the_title(); ?></h3>
											<span><?php echo get_post_meta( $post->ID, "position", true ); ?>	</span>
										</div>
									</div>
									<?php
								};
								wp_reset_query();	
							?>
						</div>				
					</div>
					<?php
				}
			?>
		</div>
	</div>

<?php get_footer(); ?>