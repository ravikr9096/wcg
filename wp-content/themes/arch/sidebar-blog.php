<?php
	if ( is_active_sidebar( 'blog_sidebar' ) ) :
		dynamic_sidebar( 'blog_sidebar' );
	else :
		_e('This is a widget area, so please add widgets here...', ENGINE_THEME_NAME);
	endif;
?>