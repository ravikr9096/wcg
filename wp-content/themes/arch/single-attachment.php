<?php get_header(); ?>

	<div class="inside load-item">
		<div class="page-content">
			
			<div class="content-inside clear">

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
							while (have_posts()) : the_post();

								if ( wp_attachment_is_image( $post->id ) ) : 
									$att_image = wp_get_attachment_image_src( $post->id, "blog-large"); 
									$description = $post->post_content;									
									?>

	                       			<img src="<?php echo $att_image[0];?>" class="attachment-medium" alt="<?php $post->post_excerpt; ?>" />
			                        <h2><?php the_title(); ?></h2>
									<div class="single-details">
										<ul>
											<li class="date"><?php the_time(get_option('date_format')); ?></li>
											<li class="user"><?php the_author_meta('display_name'); ?></li>
											<li class="bubble"><a href="<?php the_permalink(); ?>#comments"><?php comments_number('No Comments', '1 Comment', '% Comments'); ?></a></li>
										</ul>
									</div>
									<div class="single-contents"><?php echo $description; ?></div>

							<?php 
								endif;
							endwhile;
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