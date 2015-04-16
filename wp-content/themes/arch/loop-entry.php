<?php global $class; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
	<div class="image-hover">
		<a href="<?php the_permalink(); ?>">
			<?php
				if ( post_password_required() ) {
					?>
					<img src="<?php echo get_template_directory_uri(); ?>/img/password-protect-blog.jpg" alt="" title="" />
					<?php
				}else {
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('blog-large', array('title' => ''.get_the_title().''));
					}
				}				
			?>					
		</a>
		<a href="<?php the_permalink(); ?>" class="kreading"><?php if(get_option('arch_continue_reading')!="") { echo get_option('arch_continue_reading'); } else { _e( 'Keep reading', ENGINE_THEME_NAME ); } ?><span>&nbsp;</span></a>
	</div>
	<div class="blog-details">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php if(get_option('arch_display_excerpt')=="true") { the_excerpt(); } ?>
	</div>
	<div class="single-details list">
		<ul>
			<li class="date"><?php the_time(get_option('date_format')); ?></li>
			<li class="user"><?php the_author_meta('display_name'); ?></li>
			<li class="bubble"><a href="<?php the_permalink(); ?>#comments"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></a></li>
		</ul>
	</div>
</div>		