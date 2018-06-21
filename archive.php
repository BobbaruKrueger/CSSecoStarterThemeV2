<?php
/**
  * @package cssecoST
  * archive.php
  */
?>
<?php get_header(); ?>

	<main id="main" class="site-main col-lg-8" role="main">
		<?php
			if( have_posts() ) {
		?>
			<header class="archive-header">
				<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
			</header>
		<?php
				while( have_posts() ) {
					the_post();
					get_template_part( 'includes/front/template-parts/content', get_post_format() );
				}
			}
		?>
		<div class="col-12">
			<?php 
				if ( function_exists( "csseco_bs_pagination" ) ) {
					csseco_bs_pagination();
				}
			?>
		</div>
	</main>
	<?php get_sidebar(); ?>


<?php get_footer(); ?>