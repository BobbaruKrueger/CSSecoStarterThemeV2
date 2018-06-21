<?php
/**
  * @package cssecoST
  * includes/front/widgets.php
  *
  */

// https://www.youtube.com/watch?v=OJdIUU1pjl4&list=PLriKzYyLb28kpEnFFi9_vJWPf5-_7d3rX&index=51
//class CSSeco_Profile_Widget extends WP_Widget {
//	
//}

// Save posts views
function cssecoST_save_post_views( $postID ) {
	
	$metaKey = 'csseco_post_views';
	$views = get_post_meta( $postID, $metaKey, true );
	
	$count = ( empty( $views ) ? 0 : $views );
	$count++;
	
	update_post_meta( $postID, $metaKey, $count );
	
	// echo '<h1>'.$views.'</h1>';
	
}
remove_action( 'wp_head', 'adjacent_post_rel_link_wp_head', 10, 0 );

// Popular posts widget
class CSSeco_Popular_Posts_Widget extends WP_Widget {
	
	// setup the widget name, description and shit
	public function __construct() {
		
		$widget_ops = array(
			'classname'	=> 'csseco-popular-posts-widget',
			'description' => 'Popular Posts Widget'
		);
		parent::__construct( 'csseco_popular_posts', 'Popular Posts', $widget_ops );
		
	}
	
	// backend display
	public function form( $instance ) {
		
		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : __( 'Popular Posts', 'cssecoST' ) );
		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );
		
		$output = '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '" />';
		$output .= '</p>';
		
		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Posts:</label>';
		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '" />';
		$output .= '</p>';
		
		echo $output;
		
	}
	
	// update widget
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );
		
		return $instance;
		
	}
	
	// frontend display
	public function widget( $args, $instance ) {
		
		$tot = absint( $instance[ 'tot' ] );
		
		$posts_args = array(
			'post_type'			=> 'post',
			'posts_per_page'	=> $tot,
			'meta_key'			=> 'csseco_post_views',
			'orderby'			=> 'meta_value_num',
			'order'				=> 'DESC'
		);
		
		$posts_query = new WP_Query( $posts_args );
		
		echo $args[ 'before_widget' ];
		
		if ( !empty( $instance[ 'title' ] ) ) {
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
		}
		
		if ( $posts_query->have_posts() ) {
			echo '<ul>';
				while ( $posts_query->have_posts() ) {
					$posts_query->the_post();
					echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
				}
			echo '</ul>';
		}
		
		echo $args[ 'after_widget' ];
		
	}
	
}
add_action( 'widgets_init', function() {
	register_widget( 'CSSeco_Popular_Posts_Widget' );
});