<?php
/**
  * @package cssecoST
  * includes/front/theme-support.php
  *
  */



// Post format https://www.youtube.com/watch?v=XWM3i1nvpNY&index=9&list=PLriKzYyLb28kpEnFFi9_vJWPf5-_7d3rX
$options = get_option( 'csseco_post_formats' );
$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
$output = array();
foreach ( $formats as $format ){
	$output[] = ( @$options[$format] == 1 ? $format : '' );
}
if( !empty( $options ) ){
	add_theme_support( 'post-formats', $output );
}


// Post Thumbnails(Featured Image)
add_theme_support( 'post-thumbnails' );


// HTML5 Features
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );