<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*=====================================
* Recent posts widget with thumbnails.
*/

class bddex_recent_post_widget extends WP_Widget {
function __construct() {
parent::__construct(
// Base ID of your widget
'bddex_recent_post_widget', 
// Widget name will appear in UI
esc_html__('Avas - Recent Posts', 'avas-core'), 
// Widget description
array( 'description' => esc_html__( 'Display recent posts with thumbnail.', 'avas-core' ), ) 
);
// This is where we add the style and script
        add_action( 'load-widgets.php', array(&$this, 'bddex_color_picker') );
}

// load color picker from wp color picker
function bddex_color_picker() {    
    wp_enqueue_style( 'wp-color-picker' );        
    wp_enqueue_script( 'wp-color-picker' );    
}


// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
	extract( $args );
if(isset($instance['title'])) :
	$title = apply_filters( 'widget_title', $instance['title'] );
endif;
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) ) {
echo $args['before_title'] . $title . $args['after_title'];
}

$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
$title_lenth = ( ! empty( $instance['title_lenth'] ) ) ? absint( $instance['title_lenth'] ) : 30;
        if ( ! $title_lenth ) {
            $title_lenth = 30;
        }
$categories = isset($instance['categories']) ? absint( $instance['categories'] ) : '';
$show_date = isset($instance['show_date']) ? absint( $instance['show_date'] ) : 1;
$show_views = isset($instance['show_views']) ? absint( $instance['show_views'] ) : 1;


if ( ! empty($instance['orderby']) ) {
            $orderby     = $instance['orderby'];
        } else {
            $orderby     = 'latestpost';
        }

        if ( $orderby == 'popularposts' ) {
			$query = array(
				'posts_per_page' => $number,
				'order' => 'DESC',
				'nopaging' => false,
				'post_status' => 'publish',
				'meta_key' => 'post_views_count',
				'orderby' => 'meta_value_num',
				'ignore_sticky_posts' => true,
				'cat' => $categories
			);
        } else {
			$query = array(
				'posts_per_page' => $number,
				'order' => 'DESC',
				'nopaging' => false,
				'post_status' => 'publish',
				'ignore_sticky_posts' => true,
				'cat' => $categories
			);
        }		
	$args = new WP_Query($query);
	if ($args->have_posts()) :
?>

<div class="rpbl">
	<?php while ($args -> have_posts()) : $args -> the_post(); ?>
	<div class="rpost">
		<div class="rpthumb"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail('bddex-small-img'); ?></a></div>
		<div class="rpt"><a class="post-title-color" href="<?php the_permalink() ?>"><?php echo bddex_title($title_lenth); ?></a>
			<span class="clearfix"></span>
			<?php if ( $show_date ) : ?>
				<span class="rpd ptm"><?php the_time('d M y'); ?></span>
			<?php endif; ?>
			<?php if ( $show_views ) : ?>
			<span class="ptm">
				<?php echo bddex_getPostViews(get_the_ID()); ?>
			</span>
			<?php endif; ?>
		</div>
	</div>
	<?php 
		endwhile;

		wp_reset_postdata();
	?>
</div>
<?php
endif;
print $after_widget;
}
// Widget Backend 
public function form( $instance ) {

if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = esc_html__( 'Recent posts', 'avas-core' );
}
$number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5; 
$title_lenth = isset( $instance['title_lenth'] ) ? absint( $instance['title_lenth'] ) : 30;
$show_date = isset($instance['show_date']) ? absint( $instance['show_date'] ) : 1;
$show_views = isset($instance['show_views']) ? absint( $instance['show_views'] ) : 1;
$defaults = array(
			'orderby' => 'latestpost',
			'categories' => '',
			'post_title_color' => '#222',
			'post_meta_color' => '#999'
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
?>

<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'avas-core' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of posts to show:', 'avas-core' ); ?></label>
<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'title_lenth' ); ?>"><?php esc_html_e( 'Title Length:', 'avas-core' ); ?></label>
<input class="tiny-text" id="<?php echo $this->get_field_id( 'title_lenth' ); ?>" name="<?php echo $this->get_field_name( 'title_lenth' ); ?>" type="number" step="1" min="1" value="<?php echo $title_lenth; ?>" size="3" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php esc_html_e('Order By', 'avas-core'); ?></label>
    <?php
        $options = array(
                'latestpost' 	=> 'Latest Posts',
                'popularposts' 	=> 'Popular Posts',
        );
            if(isset($instance['orderby'])) $orderby = $instance['orderby'];
            ?>
            <select class="widefat" id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>">
                <?php
                $op = '<option value="%s"%s>%s</option>';

                foreach ($options as $key=>$value ) {

                    if ($orderby === $key) {
                        printf($op, $key, ' selected="selected"', $value);
                    } else {
                        printf($op, $key, '', $value);
                    }
                }
                ?>
            </select>
</p>

<p>
			<label for="<?php print $this->get_field_id('categories'); ?>"><?php esc_html_e('Filter by Categories', 'avas-core'); ?></label>
			<select id="<?php print $this->get_field_id('categories'); ?>" name="<?php print $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>>All categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php print $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php print $category->cat_name; ?></option>
				<?php } ?>
			</select>
</p>

<p>
			<input type="checkbox" id="<?php echo $this->get_field_name( 'show_date' ); ?>" class="checkbox" name="<?php echo $this->get_field_name( 'show_date' ); ?>" <?php checked( $show_date, 1 ); ?> />
			<label for="<?php echo $this->get_field_name( 'show_date' ); ?>"><?php esc_html_e( 'Display post date','avas-core' ); ?></label>
</p>
<p>
			<input type="checkbox" id="<?php echo $this->get_field_name( 'show_views' ); ?>" class="checkbox" name="<?php echo $this->get_field_name( 'show_views' ); ?>" <?php checked( $show_views, 1 ); ?> />
			<label for="<?php echo $this->get_field_name( 'show_views' ); ?>"><?php esc_html_e( 'Display post views','avas-core' ); ?></label>
</p>

<?php 
}
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['number'] = (int) $new_instance['number'];
$instance['title_lenth'] = (int) $new_instance['title_lenth'];
$instance['categories']  = wp_strip_all_tags( $new_instance['categories'] );
$instance['orderby'] 		= strip_tags( $new_instance['orderby'] );
$instance['show_date'] = isset( $new_instance['show_date'] ) ? 1 : 0;
$instance['show_views'] = isset( $new_instance['show_views'] ) ? 1 : 0;
return $instance;
}
} // Class bddex_recent_post_widget ends here
// Register and load the widget
function recent_post_load_widget() {
	register_widget( 'bddex_recent_post_widget' );
}
add_action( 'widgets_init', 'recent_post_load_widget' );
/* ---------------------------------------------------------
   EOF
------------------------------------------------------------ */ 