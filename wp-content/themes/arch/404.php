<?php get_header(); ?>

	<div class="inside load-item">
		<div class="page-content fullwidth">
			
			<!--PAGE NOT FOUND-->

			<div class="page-not-found">
				<div class="nfound">
					<h2><?php if(get_option('arch_pagenotfound_header')!="") { echo get_option('arch_pagenotfound_header'); } else { _e( 'Error 404', ENGINE_THEME_NAME ); } ?></h2>
					<label>
						<?php 
							if(get_option('arch_notfound_link')!="") {
								?><a href="<?php echo home_url(); ?>"><?php echo get_option('arch_notfound_link'); ?></a><?php
							}
						?>
					</label>
				</div>
			</div>		

		</div>
	</div>

<?php get_footer(); ?>