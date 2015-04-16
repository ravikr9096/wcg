<?php get_header(); ?>

	<div class="inside load-item">
		<div class="page-content">

			<h2 class="ptitle">
				<?php if (is_category()) : ?>
					<?php single_cat_title(); ?>
				<?php elseif( is_tag() ) : ?>
					<?php printf( _e('Posts Tagged: ', ENGINE_THEME_NAME), single_tag_title() ); ?>
				<?php elseif ( is_day() ) : ?>
					<?php printf( __( '%s', ENGINE_THEME_NAME ), get_the_date() ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( '%s', ENGINE_THEME_NAME ), get_the_date( __( 'F Y', 'monthly archives date format', ENGINE_THEME_NAME ) ) ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( '%s', ENGINE_THEME_NAME ), get_the_date( __( 'Y', 'yearly archives date format', ENGINE_THEME_NAME ) ) ); ?>
				<?php endif; ?>
			</h2>
			
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
					<section class="blist clear">

						<?php
							if ( have_posts() ) :

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