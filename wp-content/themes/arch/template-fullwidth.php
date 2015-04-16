<?php
/*
Template Name: Fullwidth	
*/	
?>

<?php get_header(); ?>

	<div class="inside load-item">
		<div class="page-content fullwidth">
			
			<!--FULLWIDTH-->

			<?php get_theme_page_title(); ?>

			<div class="theme-pages">

				<?php 
					if (have_posts()) : 
						while (have_posts()) : the_post(); 
							the_content(); 								
						endwhile; 
					endif;
				?>
			</div>

		</div>
	</div>

<?php get_footer(); ?>