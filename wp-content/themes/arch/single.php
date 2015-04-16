<?php get_header(); ?>

	<div class="inside load-item">
		<div class="page-content">
			
			<div class="content-inside clear">

				<?php
					if(get_option('arch_display_posts')=="true") {
						?>
						<div class="post-link clear">
							<span class="prev"><?php previous_post_link('%link'); ?></span>
							<span class="next"><?php next_post_link('%link'); ?></span>
						</div>
						<?php
					}
				?>

				<!--LEFT CONTENT-->
				<?php
					if(get_option( 'arch_blog_sidebar_type' ) == "Right") {
						?><div class="left-content"><?php
					}elseif(get_option( 'arch_blog_sidebar_type' ) == "Left") {
						?><div class="right left-content"><?php
					}else {
						?><div class="left-content"><?php
					}
				?>	

					<!--BLOG LIST-->
					<section class="single-blog clear">

						<?php
							if ( post_password_required() ) {
								?><div class="protected"><?php the_content(); ?></div><?php
							}else {
								while (have_posts()) : the_post();

									if ( ( function_exists( 'get_post_format' ) && 'image' == get_post_format( $post->ID ) )  ) {
										if ( has_post_thumbnail() ) {
											the_post_thumbnail('blog-large', array('title' => ''.get_the_title().''));
										}
									}elseif ( ( function_exists( 'get_post_format' ) && 'video' == get_post_format( $post->ID ) )  ) { 
										if(get_post_meta( $post->ID, "video_host", true ) == "self") {
											$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-large');
											?>
												<video id="videojs_blog" class="video-js vjs-default-skin" controls preload="none" width="606" height="350" poster="<?php echo $large_image_url[0]; ?>" data-setup="{}">
												    <source src="<?php echo get_post_meta( $post->ID, "video", true ); ?>" type='video/mp4' />
												    <source src="<?php echo get_post_meta( $post->ID, "video", true ); ?>" type='video/webm' />
												    <source src="<?php echo get_post_meta( $post->ID, "video", true ); ?>" type='video/ogg' />
												</video>
											<?php
										}else {
											?>
												<iframe width="606" height="350" src="<?php echo get_post_meta( $post->ID, "video", true ); ?>" frameborder="0" allowfullscreen></iframe>
											<?php
										}
									}elseif ( ( function_exists( 'get_post_format' ) && 'gallery' == get_post_format( $post->ID ) )  ) { 
										?>
										<div class="blog-flexslider">
											<ul class="slides">
												<?php
													$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID );

													$attachments = get_posts( $args );
													if ( $attachments ) {								
														foreach ( $attachments as $attachment ) {
															$attachment_id = $attachment->ID;
															?>
															<li><?php echo wp_get_attachment_image( $attachment->ID, 'blog-large' ); ?></li>
															<?php
														}
													}
												?>
											</ul>
										</div> 
										<?php
									}
								?>

								<h2><?php the_title(); ?></h2>
								<div class="single-details">
									<ul>
										<li class="date"><?php the_time(get_option('date_format')); ?></li>
										<li class="user"><?php the_author_meta('display_name'); ?></li>
										<li class="bubble"><a href="<?php the_permalink(); ?>#comments"><?php comments_number('No Comments', '1 Comment', '% Comments'); ?></a></li>
									</ul>
								</div>
								<div class="single-contents"><?php the_content(); ?></div>

								<!--TAGS-->
								<?php
									if(get_option('arch_hide_tags')!="true") {
										?><div class="the-tags"><?php the_tags('', ' ', ''); ?></div><?php
									}
								?>

							<?php 
								comments_template(); 
								endwhile;
							}							
						?>

					</section>

				</div>

				<!--SIDEBAR-->
				<?php
					if(get_option( 'arch_blog_sidebar_type' ) == "Right") { ?> <div class="sidebar"> <?php }
					elseif(get_option( 'arch_blog_sidebar_type' ) == "Left") { ?> <div class="left sidebar"> <?php }
					else { ?> <div class="sidebar"> <?php }

					if($sidebar_choice == "Default") {
						get_sidebar( 'blog' );
					}else {
						get_custom_sidebar(); 
					}
				?>
				</div>	

			</div>

		</div>
	</div>

<?php get_footer(); ?>