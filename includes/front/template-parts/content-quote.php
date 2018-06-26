<?php
/**
 * @package cssecoST
 * includes/front/template-parts/content-quote.php
 *
 * Quote Post Format
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'csseco-format-quote' ) ); ?>>
	<header class="entry-header text-center">
		<h1 class="qote-content">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php echo get_the_content(); ?>
			</a>
		</h1>
		<?php the_title('<h2 class="quote-author">','</h2>'); ?>
	</header><!--/.entry-header-->
	<footer class="entry-footer">
		<?php echo csseco_posted_footer(); ?>
	</footer><!-- /.entry-footer -->
</article>