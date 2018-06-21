<?php
/**
  * @package cssecoST
  * includes/back/templates/csseco-admin-opts.php
  *
  */
?>

<h1>CSSeco Theme</h1>

<?php

	function cssecoST_general_options() {}

	function cssecoST_logo() {
		$logoPct = esc_attr( get_option( 'logo' ) );
		if ( empty( $logoPct ) ) {
			echo '<input type="button" value="Upload logo" id="uploadButton" class="button button-secondary" />';
			echo '<input type="button" value="Remove logo" id="removeButton" class="button button-secondary" disabled />';
			echo '<img id="previewLogo" src="'.get_template_directory_uri().'/imgs/No_Image_Available.gif" alt="Logo Preview" />';
		} else {
			echo '<input type="button" value="Replace logo" id="uploadButton" class="button button-secondary" />';
			echo '<input type="button" value="Remove logo" id="removeButton" class="button button-secondary" />';
			echo '<img id="previewLogo" src="' . $logoPct . '" alt="Logo Preview" />';
		}
		echo '<input type="hidden" name="logo" value="' . $logoPct . '" id="siteLogoB" />';
	}

	function cssecoST_social_options() {}

	function cssecoST_smtw() {
		$twh = esc_attr( get_option( 'tw' ) );
		echo '<input type="text" name="tw" id="" value="'.$twh.'" placeholder="Twitter Handler" />';
		echo '<p class="description">Without @</p>';
	}

	function cssecoST_smfb() {
		$fbh = esc_attr( get_option( 'fb' ) );
		echo '<input type="text" name="fb" id="" value="'.$fbh.'" placeholder="Facebook Handler" />';
	}

	function cssecoST_smgp() {
		$gph = esc_attr( get_option( 'gp' ) );
		echo '<input type="text" name="gp" id="" value="'.$gph.'" placeholder="Google Plus Handler" />';
	}

?>


<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php 
		settings_fields( 'cssecoST-setting-group' );
		do_settings_sections( 'csseco_theme_create_page' );
		submit_button(); 
	?>
</form>