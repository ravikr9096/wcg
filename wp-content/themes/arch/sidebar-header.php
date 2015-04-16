<?php		
	if ( is_active_sidebar( 'header_sidebar' ) ) :
		dynamic_sidebar( 'header_sidebar' );
	else :
		_e('This is a widget area, so please add widgets here...', ENGINE_THEME_NAME);
	endif;
?>