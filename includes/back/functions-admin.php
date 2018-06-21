<?php
/**
  * @package cssecoST
  * includes/back/functions-admin.php
  *
  */
function csseco_add_admin_page() {
	
	/**
	 * ================
	 *      Generate main theme option page
	 * ================
	 */
	add_menu_page( 
		__('CSSeco Theme Option', 'cssecoST'),
		__('CSSeco Theme', 'cssecoST'),
		'manage_options',
		'csseco_theme_options_page',
		'csseco_theme_create_page',
		get_template_directory_uri() . '/imgs/csseco_admin_icon.png',
		110
	);
	
	/**
	 * ================
	 *      Generate main theme option secondary page/pages
	 * ================
	 */
	add_submenu_page( // page #1(same as csseco_theme_options_page)
		'csseco_theme_options_page',
		__('CSSeco Theme Option', 'cssecoST'),
		__('General Settings', 'cssecoST'),
		'manage_options',
		'csseco_theme_options_page',
		'csseco_theme_create_page'
	);
	
	add_submenu_page( // page #2
		'csseco_theme_options_page',
		__('Sidebar Settings', 'cssecoST'),
		__('Theme Settings', 'cssecoST'),
		'manage_options',
		'csseco_theme_options_page_2',
		'csseco_theme_support_page'
	);
	
	
	
	// Activate custom settings
	add_action( 'admin_init', 'cssecoST_custom_settings' );
	
}
add_action( 'admin_menu', 'csseco_add_admin_page' );



/**
 * ================
 *      Custom Settings api
 * ================
 */
function cssecoST_custom_settings() {
	
	/***
	  * General Settings Page - settings, sections and fields
	  */
	// Settings
	register_setting( 'cssecoST-setting-group', 'logo' ); // picture upload
	register_setting( 'cssecoST-setting-group', 'tw', 'csseco_sanitize_twitter_handler' );
	register_setting( 'cssecoST-setting-group', 'fb');
	register_setting( 'cssecoST-setting-group', 'gp' );
	
	// Sections
	add_settings_section( 'cssecoST-main-options', __( 'General Settings', 'cssecoST' ), 'cssecoST_general_options', 'csseco_theme_create_page' );
	add_settings_section( 'cssecoST-mainsm-options', __( 'Social Media Settings', 'cssecoST' ), 'cssecoST_social_options', 'csseco_theme_create_page' );
	
	// Fields
	add_settings_field( 'logo-setting', __( 'Logo', 'cssecoST' ), 'cssecoST_logo', 'csseco_theme_create_page', 'cssecoST-main-options' );
	add_settings_field( 'tw-setting', 'Twitter', 'cssecoST_smtw', 'csseco_theme_create_page', 'cssecoST-mainsm-options' );
	add_settings_field( 'fb-setting', 'Facebook', 'cssecoST_smfb', 'csseco_theme_create_page', 'cssecoST-mainsm-options' );
	add_settings_field( 'gp-setting', 'Google +', 'cssecoST_smgp', 'csseco_theme_create_page', 'cssecoST-mainsm-options' );
	
	/***
	  * Theme Settings Page - settings, sections and fields
	  */
	// Settings
	register_setting( 'cssecoST-theme-support', 'csseco_post_formats', 'cssecoST_post_formats_callback' );
	
	// Sections
	add_settings_section( 'cssecoST-theme-options', __( 'Theme Settings', 'cssecoST' ), 'cssecoST_theme_options', 'csseco_theme_support_page' );
	
	// Fields
	add_settings_field( 'post-formats', __( 'Post Formats', 'cssecoST' ), 'cssecoST_post_formats', 'csseco_theme_support_page', 'cssecoST-theme-options' );
	
}



/**
 * ================
 *      Sanitization and Callback Functions
 * ================
 */
function cssecoST_post_formats_callback( $input ) {
	return $input;
}

function csseco_sanitize_twitter_handler( $input ) {
	$output = sanitize_text_field( $input );
	$output = str_replace( '@', '', $output );
	return $output;
}

/**
 * ================
 *      Pages code generation
 * ================
 */
function csseco_theme_create_page() {
	require_once( get_template_directory() . '/includes/back/templates/csseco-general-opts.php' );
	
}

function csseco_theme_support_page() {
	require_once( get_template_directory() . '/includes/back/templates/csseco-theme-opts.php' );
}