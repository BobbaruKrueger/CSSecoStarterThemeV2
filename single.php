<?php
/**
  * @package cssecoST
  * single.php
  */
?>
<?php get_header(); ?>

	<main id="main" class="site-main col-lg-8" role="main">
		<?php
			if( have_posts() ) {
				while( have_posts() ) {
					
					the_post();
					
					cssecoST_save_post_views( get_the_ID() );
					
					get_template_part( 'includes/front/template-parts/single', get_post_format() );
					
					echo csseco_post_navigation();
					
					if ( comments_open() ) {
						comments_template();	
					}
					
				}
			}
		?>
	</main>
	<?php get_sidebar(); ?>


<?php get_footer(); ?>