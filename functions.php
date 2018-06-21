<?php
/**
  * @package cssecoST
  * functions.php
  *
  */
?>
<?php

	require get_template_directory() . '/includes/cleanup.php';							// clean up
	require get_template_directory() . '/includes/back/enqueue.php';					// enqueue scripts and styles in backend
	require get_template_directory() . '/includes/back/functions-admin.php';			// functions for backend
	require get_template_directory() . '/includes/front/enqueue.php';					// enqueue scripts and styles in frontend
	require get_template_directory() . '/includes/theme-support.php';					// theme support
	require get_template_directory() . '/includes/front/reg-menus.php';					// register menus
	require get_template_directory() . '/includes/front/functions-front.php';			// functions for frontend
	require get_template_directory() . '/includes/vendor/bootstrap-pagination.php';		// pagination
	require get_template_directory() . '/includes/front/reg-sidebar.php';				// register sidebar
	require get_template_directory() . '/includes/front/widgets.php';					// custom widgets
	require get_template_directory() . '/includes/vendor/Mobile_Detect.php';			// PHP mobile detect