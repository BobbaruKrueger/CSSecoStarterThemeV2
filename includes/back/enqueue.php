<?php
/**
  * @package cssecoST
  * includes/back/enqueue.php
  */

function csseco_load_admin_scripts( $hook ) {
	
	//echo $hook;
	
	
	if ( // all pages($hook) that i want to have the style and scripts after if
		( 'toplevel_page_csseco_theme_options_page' != $hook ) &&
		( 'csseco-theme_page_csseco_theme_options_page_2' != $hook )
	   ) {
		return;
	}
	
	// styles
	wp_register_style( 'csseco_admin', get_template_directory_uri() . '/css/csseco.admin.css', array(), '1.0.0', 'all' );
	wp_enqueue_style ( 'csseco_admin' );
	
	// scripts
	wp_enqueue_media();
	
	wp_register_script ( 'csseco_admin_script', get_template_directory_uri() . '/js/csseco.admin.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'csseco_admin_script' );
	
	$translation_array = array( 'templateUrl' => get_stylesheet_directory_uri() );
	wp_localize_script( 'csseco_admin_script', 'object_name', $translation_array );
	
}
add_action( 'admin_enqueue_scripts', 'csseco_load_admin_scripts' ); 