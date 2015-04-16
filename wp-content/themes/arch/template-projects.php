<?php
/*
Template Name: Projects	
*/	
?>

<?php get_header(); ?>

	<div class="inside load-item">
		<div class="page-content project-inside">
			<?php get_theme_page_title(); ?>
			<?php get_projects_category(); ?>
		</div>
	</div>

	<!--PROJECTS-->
	<div class="project-page <?php if(strpos($theUA,'msie')) { } else { echo "load-item"; } ?> clear">
		<?php 
			if (have_posts()) : 
				while (have_posts()) : the_post(); 
					the_content(); 								
				endwhile; 
			endif;
		?>

		<!--PROJECT LIST-->
		<div class="horScroll">
			<section class="project-list clear">
				<?php
					$project_order = get_option('arch_album_order');
					$project_orderby = get_option('arch_album_orderby');

					/*THIS IS A CODE FOR SPECIFIC CATEGORY SLUG*/
					//$args = array( 'post_type' => 'projects', 'orderby' => $project_orderby, 'order' => $project_order, 'posts_per_page' => -1, 'tax_query' => array(array('taxonomy' => 'project_categories', 'field' => 'slug', 'terms' => 'web-development' )));

					$args = array( 'post_type' => 'projects', 'orderby' => $project_orderby, 'order' => $project_order, 'posts_per_page' => -1 );
					$wp_query = new WP_Query( $args );	

					if ( $wp_query->have_posts() ) :
						while ($wp_query->have_posts()) : $wp_query->the_post(); 		
							get_template_part( 'loop', 'projects' );							
						endwhile;
					else :
						_e( 'You should add a record for your Project Post', ENGINE_THEME_NAME );
					endif;	
				?>	
			</section>
		</div>

	</div>

<?php get_footer(); ?>