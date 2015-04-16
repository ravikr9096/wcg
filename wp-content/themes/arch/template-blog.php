<?php
/*
Template Name: Blog	
*/	
?>

<?php get_header(); ?>

	<div class="inside load-item">
		<div class="page-content">

			<?php get_theme_page_title(); ?>
			
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

					<?php 
						if (have_posts()) : 
							while (have_posts()) : the_post(); 
								the_content(); 								
							endwhile; 
						endif;
					?>

					<!--BLOG LIST-->
					<section class="blist clear">

						<?php
							get_home_pagination();

							$args = array( 'post_type' => 'post', 'posts_per_page' => get_option('arch_num_blog'), 'paged' => $paged );
							$wp_query = new WP_Query( $args );	

							if ( $wp_query->have_posts() ) :

								for($i = 1; $wp_query->have_posts(); $i++) { 							
									$wp_query->the_post();			
									$columns = 2;	
									$class = '';
									$class .= ($i % $columns == 0) ? ' last' : '';
									
									get_template_part( 'loop', 'entry' );

								}

							else :
								_e( 'You should add a record for your Blog Post', ENGINE_THEME_NAME );
							endif;	

						?>	
					</section>

					<!--PAGE NAVIGATION-->
					<?php
						if(get_option('arch_blog_pnav')=="Pagination") { 
							pagination();
						}elseif(get_option('arch_blog_pnav')=="Next Previous Link") {
							next_previous_link();
						}else {
							load_more();
						}
						wp_link_pages();
					?>

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