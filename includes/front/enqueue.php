<?php
/**
  * @package cssecoST
  * includes/front/enqueue.php
  */

function csseco_load_scripts() {
	
	// Bootstrap style
	wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css', array(), '4.1.1', 'all' );
	// Main styles
	wp_enqueue_style( 'csseco_styles', get_template_directory_uri().'/css/csseco.css', array(), '1.0.0', 'all' );
	
	// Deregister jquery
	wp_deregister_script( 'jquery' );
	// Jquery in footer(down)
	wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, '3.3.1', true );
	wp_enqueue_script( 'jquery' );
	// Popper.js
	wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery'), '1.14.3', true );
	// Bootstrap scripts
	wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array('jquery'), '4.1.1', true );
	
	// FontAwesome scripts
	wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/releases/v5.0.13/js/all.js', array('jquery'), '5.0.13', true );
	
	// Main scripts
	wp_enqueue_script( 'csseco_scripts', get_template_directory_uri().'/js/csseco.js', array('jquery'), '1.0.0', true );
	
}
add_action( 'wp_enqueue_scripts', 'csseco_load_scripts' ); 