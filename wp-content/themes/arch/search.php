<?php get_header(); ?>

	<div class="inside load-item">
		<div class="page-content">

			<h2 class="ptitle"><?php if(get_option('arch_search_header')!="") { echo get_option('arch_search_header'); } else { _e( 'Search Results', ENGINE_THEME_NAME ); } ?></h2>
			
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

								for($i = 1; have_posts(); $i++) { 							
									the_post();			
									$columns = 2;	
									$class = '';
									$class .= ($i % $columns == 0) ? ' last' : '';

									get_template_part( 'loop', 'entry' );
								}	

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

					<?php 
						else :
							?><div class="search-error"><?php _e( 'No Results Found on your Query', ENGINE_THEME_NAME ); ?></div><?php
						endif;	
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