<?php
/**
 * @package cssecoST
 * includes/front/template-parts/content-gallery.php
 *
 * Gallery Post Format
 */
global $detect;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'csseco-format-gallery' ) ); ?>>
    <header class="entry-header">
		
		<?php 
			if ( csseco_get_post_attachment() && !$detect->isMobile() ) { //var_dump($attachments); ?>
			<div id="post-gallery-<?php the_ID(); ?>" class="carousel slide csseco_carousel" data-ride="carousel">
				
				<div class="carousel-inner">
					<?php 
				
						$attachments = csseco_get_bs_slides( csseco_get_post_attachment(10) );
												 
						foreach( $attachments as $attachment ) {
							
					?>
							<div class="carousel-item bg-img-el <?php echo $attachment['class']; ?>" style="background-image: url(<?php echo $attachment['url']; ?>);">
								<div class="d-none prev-thumb-preview" data-image="<?php echo $attachment['prev_img']; ?>"></div>
								<div class="d-none next-thumb-preview" data-image="<?php echo $attachment['next_img']; ?>"></div>

								<div class="entry-excerpt image-caption">
									<?php echo $attachment['caption']; ?>
								</div><!-- /.entry-excerpt -->
							</div>
					<?php
						}
					?>
				</div><!-- /.carousel-inner -->
				<a class="carousel-control left carousel-control-prev" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="prev">
					<i class="fa fa-chevron-left" aria-hidden="true"></i>
					<span class="preview-thumb bg-img-el"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control right carousel-control-next" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="next">
					<i class="fa fa-chevron-right" aria-hidden="true"></i>
					<span class="preview-thumb bg-img-el"></span>
					<span class="sr-only">Next</span>
				</a>
			</div><!-- /.csseco_carousel -->
		<?php } ?>
		
		<?php
            if ( csseco_get_post_attachment() && $detect->isMobile() ) {
        ?>
            <a class="standard-featured-link" href="<?php the_permalink(); ?>">
                <span class="standard-featured bg-img-el" style="background-image: url(<?php echo csseco_get_post_attachment(); ?>);"></span>
            </a>
		<?php } ?>
		
		<?php
			the_title(
				'<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">',
				'</a></h1>'
			);
		?>
        <div class="entry-meta">
			<?php echo csseco_posted_meta(); ?>
        </div><!-- /.entry-meta -->
    </header><!--/.entry-header-->
    <div class="entry-content">
        <div class="entry-excerpt">
			<?php the_excerpt(); ?>
        </div><!-- /.entry-excerpt -->
        <div class="button-container">
            <a href="<?php the_permalink(); ?>" class="btn btn-default">
				<?php _e( 'Read More', 'cssecotheme' ); ?>
            </a>
        </div><!-- /.button-container -->
    </div><!-- /.entry-content -->
    <footer class="entry-footer">
		<?php echo csseco_posted_footer(); ?>
    </footer><!-- /.entry-footer -->
</article>