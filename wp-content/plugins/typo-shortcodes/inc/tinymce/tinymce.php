<?php

	/****************************
	BUTTONS
	****************************/
	
	add_action('init', 'notification');
	add_action('init', 'quote');
	add_action('init', 'buttons');
	add_action('init', 'unorderedlist');
	add_action('init', 'dropcap');	
	add_action('init', 'columns');	
	add_action('init', 'image');
	add_action('init', 'video');
	add_action('init', 'jtabgroups');	
	add_action('init', 'toggle');
	add_action('init', 'gmap');		
	
	function notifications() {	 
	   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
		 return;
	   }	 
	   if ( get_user_option('rich_editing') == 'true' ) {
		 add_filter( 'mce_external_plugins', 'add_plugin' );
		 add_filter( 'mce_buttons', 'register_button' );
	   }	 
	}	

	function quotes() {	 
	   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
		 return;
	   }	 
	   if ( get_user_option('rich_editing') == 'true' ) {
		 add_filter( 'mce_external_plugins', 'add_plugin' );
		 add_filter( 'mce_buttons', 'register_button' );
	   }	 
	}
	
	function buttons() {	 
	   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
		 return;
	   }	 
	   if ( get_user_option('rich_editing') == 'true' ) {
		 add_filter( 'mce_external_plugins', 'add_plugin' );
		 add_filter( 'mce_buttons', 'register_button' );
	   }	 
	}
	
	function unorderedlist() {	 
	   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
		 return;
	   }	 
	   if ( get_user_option('rich_editing') == 'true' ) {
		 add_filter( 'mce_external_plugins', 'add_plugin' );
		 add_filter( 'mce_buttons', 'register_button' );
	   }	 
	}
	
	function dropcap() {	 
	   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
		 return;
	   }	 
	   if ( get_user_option('rich_editing') == 'true' ) {
		 add_filter( 'mce_external_plugins', 'add_plugin' );
		 add_filter( 'mce_buttons', 'register_button' );
	   }	 
	}
	
	function columns() {	 
	   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
		 return;
	   }	 
	   if ( get_user_option('rich_editing') == 'true' ) {
		 add_filter( 'mce_external_plugins', 'add_plugin' );
		 add_filter( 'mce_buttons', 'register_button' );
	   }	 
	}
	
	function image() {	 
	   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
		 return;
	   }	 
	   if ( get_user_option('rich_editing') == 'true' ) {
		 add_filter( 'mce_external_plugins', 'add_plugin' );
		 add_filter( 'mce_buttons', 'register_button' );
	   }	 
	}

	function jtabgroups() {	 
	   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
		 return;
	   }	 
	   if ( get_user_option('rich_editing') == 'true' ) {
		 add_filter( 'mce_external_plugins', 'add_plugin' );
		 add_filter( 'mce_buttons', 'register_button' );
	   }	 
	}	

	function toggle() {	 
	   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
		 return;
	   }	 
	   if ( get_user_option('rich_editing') == 'true' ) {
		 add_filter( 'mce_external_plugins', 'add_plugin' );
		 add_filter( 'mce_buttons', 'register_button' );
	   }	 
	}	

	function video() {	 
	   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
		 return;
	   }	 
	   if ( get_user_option('rich_editing') == 'true' ) {
		 add_filter( 'mce_external_plugins', 'add_plugin' );
		 add_filter( 'mce_buttons', 'register_button' );
	   }	 
	}	

	function gmap() {	 
	   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
		 return;
	   }	 
	   if ( get_user_option('rich_editing') == 'true' ) {
		 add_filter( 'mce_external_plugins', 'add_plugin' );
		 add_filter( 'mce_buttons', 'register_button' );
	   }	 
	}		
	
	
	/****************************
	REGISTER BUTTONS
	****************************/
	
	function register_button( $buttons ) {
		array_push( $buttons, "|", "notifications" );
		array_push( $buttons, "", "quotes" );
		array_push( $buttons, "", "buttons" );
		array_push( $buttons, "", "unorderedlist" );		
		array_push( $buttons, "", "dropcap" );		
		array_push( $buttons, "", "columns" );		
		array_push( $buttons, "", "jtabgroups" );
		array_push( $buttons, "", "toggle" );
		array_push( $buttons, "|", "image" );
		array_push( $buttons, "", "video" );
		array_push( $buttons, "", "gmap" );
		return $buttons;
	}
	
	
	/****************************
	ADD PLUGIN
	****************************/
	
	function add_plugin( $plugin_array ) {
		$plugin_array['notifications'] = plugin_dir_url(__FILE__) . 'editor.js';
		$plugin_array['quotes'] = plugin_dir_url(__FILE__) . 'editor.js';	
		$plugin_array['buttons'] = plugin_dir_url(__FILE__) . 'editor.js';	
		$plugin_array['unorderedlist'] = plugin_dir_url(__FILE__) . 'editor.js';	
		$plugin_array['dropcap'] = plugin_dir_url(__FILE__) . 'editor.js';	
		$plugin_array['columns'] = plugin_dir_url(__FILE__) . 'editor.js';		
		$plugin_array['image'] = plugin_dir_url(__FILE__) . 'editor.js';
		$plugin_array['video'] = plugin_dir_url(__FILE__) . 'editor.js';
		$plugin_array['jtabgroups'] = plugin_dir_url(__FILE__) . 'editor.js';
		$plugin_array['toggle'] = plugin_dir_url(__FILE__) . 'editor.js';
		$plugin_array['gmap'] = plugin_dir_url(__FILE__) . 'editor.js';
		return $plugin_array;
	}
	
?>