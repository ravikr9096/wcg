<?php get_header(); ?>

	<div class="inside load-item">
		<div class="page-content project-inside">
			<h2 class="ptitle"><?php $term = $wp_query->queried_object; echo $term->name; ?></h2>
			<?php get_projects_category(); ?>
		</div>
	</div>

	<!--PROJECTS-->
	<div class="project-page <?php if(strpos($theUA,'msie')) { } else { echo "load-item"; } ?> clear">
		<!--PROJECT LIST-->
		<div class="horScroll">
			<section class="project-list clear">
				<?php
					$project_order = get_option('arch_album_order');
					$project_orderby = get_option('arch_album_orderby');

					$args = array( 'post_type' => 'projects', 'taxonomy' => 'project_categories', 'orderby' => $project_orderby, 'order' => $project_order, 'posts_per_page' => -1, 'term' => $term->slug );
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