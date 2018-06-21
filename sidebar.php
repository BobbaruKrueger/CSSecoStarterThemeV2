<?php
/**
 * @package cssecoST
 * sidebar.php
 *
 */
if ( !is_active_sidebar( 'csseco_sidebar' ) ) {
	return;
}
//global $sidebarWidth;
//<aside id="secondary" class="widget-area col-xs-12 col-md-<?php echo $sidebarWidth; php end" role="complementary">
//if ( get_option('sidebar_location') != 'sidebarNone' ) {
?>
	
    <aside id="secondary" class="widget-area col-12 col-lg-4" role="complementary">
        <?php dynamic_sidebar( 'csseco_sidebar' ); ?>
    </aside>
<?php
//}