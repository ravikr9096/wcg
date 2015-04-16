<?php
	/****************************
	NOTIFICATIONS
	****************************/
	
	function notification( $atts, $content = null ) {
		extract(shortcode_atts(array(	
			'style' => ''
		), $atts));
		$out = "<label class='$style'>$content<span class='close'></span></label>";
		return $out;
	}
	add_shortcode('alert', 'notification');
	
	
	/****************************
	BLOCKQUOTES
	****************************/
	
	function quote( $atts, $content = null ) {
		extract(shortcode_atts(array(	
			'style' => ''
		), $atts));
		$out = "<blockquote class='$style'><p>$content</p></blockquote>";
		return $out;
	}
	add_shortcode('blockquote', 'quote');
	
	
	/****************************
	BUTTONS
	****************************/
	
	function button( $atts, $content = null ) {
		extract(shortcode_atts(array(	
			'href' => '',
			'style' => '',
			'target' => ''
		), $atts));
		$out = "<a href='$href' class='$style' target='$target'>$content</a>";
		return $out;
	}
	add_shortcode('a', 'button');
	
	
	/****************************
	UNORDERED LIST
	****************************/
	
	function ulist($atts, $content=null) {
	    extract(shortcode_atts(array(
	    	'style' => ''
	    ),$atts));
	    $ret = '<ul class="' . $style . '">'.do_shortcode($content);
	    $ret .= '</ul>';
	    return $ret;
	}
	add_shortcode('ul', 'ulist');

	function li( $atts, $content = null ) {
	    return '<li>' . do_shortcode($content) . '</li>';
	}
	add_shortcode('li', 'li');
	
	
	/****************************
	DROPCAPS
	****************************/
	
	function dcap( $atts, $content = null ) {
		extract(shortcode_atts(array(				
			'style' => '',			
		), $atts));
		$out = "<span class='$style'>$content</span>";
		return $out;
	}
	add_shortcode('dropcap', 'dcap');
	
	
	/****************************
	COLUMNS (3,2,1)
	****************************/
	
	function column( $atts, $content = null ) {
		extract(shortcode_atts(array(				
			'style' => '',			
		), $atts));
		$out = '<div class="' . $style . '">' . do_shortcode($content) . '</div>';
		return $out;
	}
	add_shortcode('columns', 'column');
	
	
	/****************************
	IMAGES
	****************************/	
	
	function singleimage($atts) {
		extract(shortcode_atts(array(
			'src' => '',
			'width' => '',
			'height' => '',
			'title' => '',
			'style' => ''
		), $atts));
		if($width == '' && $height == '')
			return "<img src='$src' alt='$title' class='$style' />";

		$theme = get_template_directory_uri();
		$out = "<img src='$src' height='$height' width='$width' title='$title' alt='$title' class='$style' />";

		return $out;
	}
	add_shortcode('image', 'singleimage');


	/****************************
	TABS
	****************************/

	function jtab_group( $atts, $content ){	
		$GLOBALS['tab_count'] = 0;
		do_shortcode( $content );

		if( is_array( $GLOBALS['tabs'] ) ){
			foreach( $GLOBALS['tabs'] as $tabCount => $tab ){
				$tabs[] = '<li><a href="#'.$tab['anchor'].'">'.$tab['title'].'</a></li>';
				$panes[] = '<div id="'.$tab['anchor'].'" class="tab-content">'.$tab['content'].'</div>';
			}
			$return = "\n".'<ul class="tab-menu clear">'.implode( "\n", $tabs ).'</ul>'."\n".'<div class="tab-container">'.implode( "\n", $panes ).'</div>'."\n";
		}
		return $return;
	}
	
	function jtabs( $atts, $content ){
		extract(shortcode_atts(array(
			'anchor' => '%d',	
			'title' => 'Tab %d'
		), $atts));

		$curTab = $GLOBALS['tab_count'];
		$GLOBALS['tabs'][$curTab] = array( 'title' => sprintf( $title, $curTab), 'anchor' => sprintf( $anchor, $curTab ), 'content' => do_shortcode($content) );

		$GLOBALS['tab_count']++;
	}
	add_shortcode( 'tabgroup', 'jtab_group' );	
	add_shortcode( 'tab', 'jtabs' );


	/****************************
	TOGGLE
	****************************/

	function toggle_shortcode( $atts, $content = null ) {
		extract( shortcode_atts(array(
			'title' => ''
		), $atts));
		$toggle = '<h4 class="toggle"><a href="#">'. $title .'</a></h4><div class="toggle_container">' . do_shortcode($content) . '</div>';		
		return $toggle;
	}
	add_shortcode('toggle', 'toggle_shortcode');


	/****************************
	VIDEO
	****************************/

	function video_shortcode( $atts, $content = null ) {
		 extract(  
	        shortcode_atts(array(  
	            'site' => 'youtube',  
	            'id' => '',  
	            'w' => '551',  
	            'h' => '350'  
	        ), $atts)  
	    );  
	    if ( $site == "youtube" ) { $src = 'http://www.youtube-nocookie.com/embed/'.$id; }  
	    else if ( $site == "vimeo" ) { $src = 'http://player.vimeo.com/video/'.$id; }  
	    else if ( $site == "dailymotion" ) { $src = 'http://www.dailymotion.com/embed/video/'.$id; }  
	    if ( $id != '' ) {  return '<iframe width="'.$w.'" height="'.$h.'" src="'.$src.'" class="video iframe-'.$site.'"></iframe>';  }  
	}
	add_shortcode('video', 'video_shortcode');


	/****************************
	GOOGLE MAP
	****************************/

	function googleMap( $atts, $content = null ) {
	   	extract(shortcode_atts(array(
			"width" => '653',
			"height" => '284',
			"src" => ''
	    ), $atts));
	    
	    return '<iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&amp;output=embed"></iframe>';
	}
	add_shortcode( 'googlemap', 'googleMap' );

?>