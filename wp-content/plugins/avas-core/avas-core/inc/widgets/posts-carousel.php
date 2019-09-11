<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*=====================================
* Recent posts widget with thumbnails.
*/

class bddex_posts_carousel_widget extends WP_Widget {
function __construct() {
parent::__construct(
// Base ID of your widget
'bddex_posts_carousel_widget', 
// Widget name will appear in UI
esc_html__('Avas - Posts Carousel', 'avas-core'), 
// Widget description
array( 'description' => esc_html__( 'It will work as Mega Menu widgets properly.', 'avas-core' ), ) 
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

$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
		if ( ! $number ) {
			$number = 10;
		}
$title_lenth = ( ! empty( $instance['title_lenth'] ) ) ? absint( $instance['title_lenth'] ) : 30;
        if ( ! $title_lenth ) {
            $title_lenth = 30;
        }        
$post_title_color = isset($instance['post_title_color']) ? absint($instance['post_title_color']) : '';
$post_meta_color = isset($instance['post_meta_color']) ? absint($instance['post_meta_color']) : '';
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
	$ptc = $instance['post_title_color'];
	$ptm = $instance['post_meta_color'];
?>
<style>
.widget_bddex_posts_carousel_widget .owl-carousel .pc-title a{color:<?php echo $ptc; ?>}
.widget_bddex_posts_carousel_widget .owl-carousel .ptm{color:<?php echo $ptm; ?>}
</style>

<div class="container">
<div class="row">
<div class="col-md-11 col-sm-12"> 
<div class="row"> 
<div id="posts-carousel-widgets" class="owl-carousel">
	<?php while ($args -> have_posts()) : $args -> the_post(); ?>
	<div class="item">

	<?php if ($thumbnail_exists = has_post_thumbnail()):  
        $id = get_the_ID();
        $cat = get_the_category($id); ?>
            <div class="pc-img">
            <a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><img  src="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id(),'bddex-img-200x145' )?>" alt="image" ></a>
            </div><!-- pc-img -->
        <?php endif; ?>
            <div class="pc-cat">
                <a href="<?php echo get_category_link($cat[0]->cat_ID); ?>"><span><?php echo $cat[0]->name; ?></span></a>
            </div><!-- pc-cat -->
            <div class="pc-title">
                <a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo bddex_title($title_lenth); ?></a>
            </div><!-- pc-title -->
            <div class="pc-meta">
			<?php if ( $show_date ) : ?>
				<span class="ptm"><?php the_time('d M y'); ?></span>
			<?php endif; ?>
			<?php if ( $show_views ) : ?>
			<span class="ptm">
				<?php echo bddex_getPostViews(get_the_ID()); ?>
			</span>
			<?php endif; ?>
	        </div><!-- pc-meta -->
		
	</div><!-- item -->

	<?php 
		endwhile;
		wp_reset_postdata();
	?>
</div><!-- owl-carousel -->
</div><!-- row -->
</div><!-- col-lg-12 -->
</div><!-- row -->
</div><!-- container -->
<script>
(function($) {
"use strict";
 
$(document).ready(function() {
 
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:20,
    autoplay:true,
    slideSpeed: 200,
    paginationSpeed: 300,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
    lazyLoad:true,
    nav: true,
    navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'], 
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        768:{
            items:3
        },
        1000:{
            items:4
        }
    }
});
})
})(jQuery);
</script>

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
$title = esc_html__( 'Posts Carousel', 'avas-core' );
}
$number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 10;
$title_lenth = isset( $instance['title_lenth'] ) ? absint( $instance['title_lenth'] ) : 30;
$show_date = isset($instance['show_date']) ? absint( $instance['show_date'] ) : 1;
$show_views = isset($instance['show_views']) ? absint( $instance['show_views'] ) : 1;
$defaults = array(
			'orderby' => 'latestpost',
			'categories' => '',
			'post_title_color' => '#fff',
			'post_meta_color' => '#999'
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
?>
<script>
    jQuery(document).ready( function($) {
  	var params = { 
    change: function(e, ui) {
      $( e.target ).val( ui.color.toString() );
      $( e.target ).trigger('change'); // enable widget "Save" button
    },
  }

  $('.bddex-color-picker').wpColorPicker( params );
});
</script>

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
            <label for="<?php echo $this->get_field_id( 'post_title_color' ); ?>"><?php esc_html_e( 'Post Title Color', 'avas-core' ); ?></label>
            <input class="bddex-color-picker" type="text" id="<?php echo $this->get_field_id( 'post_title_color' ); ?>" name="<?php echo $this->get_field_name( 'post_title_color' ); ?>" value="<?php echo esc_attr( $instance['post_title_color'] ); ?>" />                            
</p>
<p>
            <label for="<?php echo $this->get_field_id( 'post_meta_color' ); ?>"><?php esc_html_e( 'Post Meta Color', 'avas-core' ); ?></label>
            <input class="bddex-color-picker" type="text" id="<?php echo $this->get_field_id( 'post_meta_color' ); ?>" name="<?php echo $this->get_field_name( 'post_meta_color' ); ?>" value="<?php echo esc_attr( $instance['post_meta_color'] ); ?>" />                            
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
$instance['post_title_color'] = ( ! empty( $new_instance['post_title_color'] ) ) ? strip_tags( $new_instance['post_title_color'] ) : '';
$instance['post_meta_color'] =  ( ! empty( $new_instance['post_meta_color'] ) ) ? strip_tags( $new_instance['post_meta_color'] ) : '';
return $instance;
}
} // Class bddex_posts_carousel_widget ends here
// Register and load the widget
function bddex_posts_carousel_widget_load() {
	register_widget( 'bddex_posts_carousel_widget' );
}
add_action( 'widgets_init', 'bddex_posts_carousel_widget_load' );
/* ---------------------------------------------------------
   EOF
------------------------------------------------------------ */ 