<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*=====================================
* Recent Projects widget with thumbnails.
*/
class bddex_recent_project_widget extends WP_Widget {
function __construct() {
parent::__construct(
// Base ID of your widget
'bddex_recent_project_widget', 
// Widget name will appear in UI
esc_html__('Avas - Latest Project', 'avas-core'), 
// Widget description
array( 'description' => esc_html__( 'Add latest project', 'avas-core' ), ) 
);
}
// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 6;
		if ( ! $number )
			$number = 6;
?>

	<?php $the_query = new WP_Query( apply_filters( 'widget_posts_args', array(
				'post_type' => 'portfolio-item',
				'posts_per_page'      => $number,
				'no_found_rows'       => true,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true
			) ) );
	 ?>
	<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
	<div class="recent_project_widget">
		<div class="rprojw_thumb"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail('bddex-small-img'); ?></a></div>
		<!-- <div class="rpt"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
			<span class="clearfix"></span>
			<span class="rpd"><?php the_time('F j, Y'); ?></span>
		</div> -->
	</div>
	<?php 
		endwhile;
		wp_reset_postdata();
	?>

<?php
echo $args['after_widget'];
}
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = esc_html__( 'Latest Projects', 'avas-core' );
}
$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 6; ?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'avas-core' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of project to show:', 'avas-core' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>
<?php 
}
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['number'] = (int) $new_instance['number'];
return $instance;
}
} // Class bddex_recent_project_widget ends here
// Register and load the widget
function recent_project_load_widget() {
	register_widget( 'bddex_recent_project_widget' );
}
add_action( 'widgets_init', 'recent_project_load_widget' );
/* ---------------------------------------------------------
   EOF
------------------------------------------------------------ */ 