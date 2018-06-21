<?php
/**
  * @package cssecoST
  * includes/back/templates/csseco-theme-opts.php
  *
  */
?>

<h1>CSSeco Theme</h1>

<?php

	function cssecoST_theme_options() {}

	function cssecoST_post_formats() {
		$options = get_option( 'csseco_post_formats' );
		$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
		$output = '';
		foreach ( $formats as $format ) {
			$checked = ( @$options[$format] == 1 ? 'checked' : '' );
			$output .= '<label for="' . $format . '" class="csseco-label-' . $format . '"><input ' . $checked . ' 
						name="csseco_post_formats[' . $format . ']" type="checkbox" id="' . $format . '" 
						class="post-format-' . $format . '" value="1" />' . $format  . '</label><br>';
		}
		echo $output;
	}
?>
<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php 
		settings_fields( 'cssecoST-theme-support' );
		do_settings_sections( 'csseco_theme_support_page' );
		submit_button(); 
	?>
</form>