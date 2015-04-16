<?php
	if ( is_active_sidebar( 'sidebar' ) ) :
		dynamic_sidebar( 'sidebar' );
	else :
		_e('This is a widget area, so please add widgets here...', ENGINE_THEME_NAME);
	endif;
?>