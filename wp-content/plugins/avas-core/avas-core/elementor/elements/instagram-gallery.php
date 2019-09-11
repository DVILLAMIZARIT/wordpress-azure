<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


class Widget_bddex_Instagram_Feed extends Widget_Base {

	public function get_name() {
		return 'bddex-instafeed';
	}

	public function get_title() {
		return esc_html__( 'Avas Instagram', 'avas-core' );
	}

	public function get_icon() {
		return 'fa fa-instagram';
	}

   public function get_categories() {
		return [ 'bddex' ];
	}
	
	
	protected function _register_controls() {

		
  		$this->start_controls_section(
  			'bddex_section_instafeed_settings_general',
  			[
  				'label' => esc_html__( 'Instagram Account Settings', 'avas-core' )
  			]
  		);
		
		$this->add_control(
			'bddex_instafeed_access_token',
			[
				'label' => esc_html__( 'Access Token', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '6896066625.ba4c844.5169692e202a4afe8968a0c7a19e5ee4', 'avas-core' ),
				'description' => '<a href="http://instagramwordpress.rafsegat.com/docs/get-access-token/" class="bddex-btn" target="_blank">Get Access Token</a>', 'avas',
			]
		);
		
		$this->add_control(
			'bddex_instafeed_user_id',
			[
				'label' => esc_html__( 'User ID', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '6896066625', 'avas-core' ),
				'description' => '<a href="https://smashballoon.com/instagram-feed/find-instagram-user-id/" class="bddex-btn" target="_blank">Get User ID</a>', 'avas',
			]
		);

		
		$this->add_control(
			'bddex_instafeed_client_id',
			[
				'label' => esc_html__( 'Client ID', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'c4f9a2a7294f492f8e34d248ade83f6e', 'avas-core' ),
				'description' => '<a href="https://www.instagram.com/developer/clients/manage/" class="bddex-btn" target="_blank">Get Client ID</a>', 'avas',
			]
		);



		$this->end_controls_section();

  		$this->start_controls_section(
  			'bddex_section_instafeed_settings_content',
  			[
  				'label' => esc_html__( 'Instagram Feed Settings', 'avas-core' )
  			]
  		);

		$this->add_control(
			'bddex_instafeed_source',
			[
				'label' => esc_html__( 'Instagram Feed Source', 'avas-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'user',
				'options' => [
					'user' => esc_html__( 'User', 'avas-core' ),
					'tagged' => esc_html__( 'Hashtag', 'avas-core' ),
				],
			]
		);

		$this->add_control(
			'bddex_instafeed_hashtag',
			[
				'label' => esc_html__( 'Hashtag', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'cars', 'avas-core' ),
				'condition' => [
					'bddex_instafeed_source' => 'tagged',
				],
				'description' => 'Place the hashtag', 'avas',
			]
		);

		$this->add_control(
			'bddex_instafeed_image_count',
			[
				'label' => esc_html__( 'Max Visible Images', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 12,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
					],
				],
			]
		);

		$this->add_control(
			'bddex_instafeed_columns',
			[
				'label' => esc_html__( 'Number of Columns', 'avas-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'bddex-col-4',
				'options' => [
					'bddex-col-1' => esc_html__( 'Single Column', 'avas-core' ),
					'bddex-col-2' => esc_html__( 'Two Columns',   'avas-core' ),
					'bddex-col-3' => esc_html__( 'Three Columns', 'avas-core' ),
					'bddex-col-4' => esc_html__( 'Four Columns',  'avas-core' ),
					'bddex-col-5' => esc_html__( 'Five Columns',  'avas-core' ),
					'bddex-col-6' => esc_html__( 'Six Columns',   'avas-core' ),
				],
			]
		);


		$this->add_control(
			'bddex_instafeed_image_resolution',
			[
				'label' => esc_html__( 'Image Resolution', 'avas-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'low_resolution',
				'options' => [
					'thumbnail' => esc_html__( 'Thumbnail (150x150)', 'avas-core' ),
					'low_resolution' => esc_html__( 'Low Res (306x306)',   'avas-core' ),
					'standard_resolution' => esc_html__( 'Standard (612x612)', 'avas-core' ),
				],
			]
		);


		$this->add_control(
			'bddex_instafeed_sort_by',
			[
				'label' => esc_html__( 'Sort By', 'avas-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' => esc_html__( 'None', 'avas-core' ),
					'most-recent' => esc_html__( 'Most Recent',   'avas-core' ),
					'least-recent' => esc_html__( 'Least Recent', 'avas-core' ),
					'most-liked' => esc_html__( 'Most Likes', 'avas-core' ),
					'least-liked' => esc_html__( 'Least Likes', 'avas-core' ),
					'most-commented' => esc_html__( 'Most Commented', 'avas-core' ),
					'least-commented' => esc_html__( 'Least Commented', 'avas-core' ),
					'random' => esc_html__( 'Random', 'avas-core' ),
				],
			]
		);


		$this->add_control(
			'bddex_instafeed_caption_heading',
			[
				'label' => __( 'Caption & Link', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'bddex_instafeed_caption',
			[
				'label' => esc_html__( 'Display Caption', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'show-caption',
				'default' => 'no-caption',
			]
		);

		$this->add_control(
			'bddex_instafeed_link',
			[
				'label' => esc_html__( 'Enable Link', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// $this->add_control(
		// 	'bddex_instafeed_link_target',
		// 	[
		// 	//	'label' => esc_html__( 'Open in new window?', 'avas-core' ),
		// 		// 'type' => Controls_Manager::SWITCHER,
		// 		// 'return_value' => '_blank',
		// 		// 'default' => '_blank',
		// 		// 'condition' => [
		// 		// 	'bddex_instafeed_link' => 'yes',
		// 		// ],
		// 	]
		// );



		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'bddex_section_instafeed_styles_general',
			[
				'label' => esc_html__( 'Instagram Feed Styles', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		
		$this->add_responsive_control(
			'bddex_instafeed_spacing',
			[
				'label' => esc_html__( 'Padding Between Images', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-insta-feed-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bddex_instafeed_box_border',
				'label' => esc_html__( 'Border', 'avas-core' ),
				'selector' => '{{WRAPPER}} .bddex-insta-feed-wrap',
			]
		);

		$this->add_control(
			'bddex_instafeed_box_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .bddex-insta-feed-wrap' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
			]
		);
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'bddex_section_instafeed_styles_content',
			[
				'label' => esc_html__( 'Color &amp; Typography', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);


		$this->add_control(
			'bddex_instafeed_overlay_color',
			[
				'label' => esc_html__( 'Hover Overlay Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0,0,0, .75)',
				'selectors' => [
					'{{WRAPPER}} .bddex-insta-feed-wrap::after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_instafeed_like_comments_heading',
			[
				'label' => __( 'Like & Comments Styles', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'bddex_instafeed_like_comments_color',
			[
				'label' => esc_html__( 'Like &amp; Comments Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fbd800',
				'selectors' => [
					'{{WRAPPER}} .bddex-insta-likes-comments > p' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_instafeed_like_comments_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .bddex-insta-likes-comments > p',
			]
		);

		$this->add_control(
			'bddex_instafeed_caption_style_heading',
			[
				'label' => __( 'Caption Styles', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'bddex_instafeed_caption_color',
			[
				'label' => esc_html__( 'Caption Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .bddex-insta-info-wrap' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_instafeed_caption_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .bddex-insta-info-wrap',
			]
		);		


		$this->end_controls_section();

	}


	protected function render( ) {
		
      $settings = $this->get_settings();

      $image_limit 	= $this->get_settings( 'bddex_instafeed_image_count' ); 
	//  $link_target  = ( ($settings['bddex_instafeed_link_target'] == 'yes') ? "_self" : "_blank" );
	  $enable_link  = ( ($settings['bddex_instafeed_link'] == 'yes') ? "<a href=\"{{link}}\" target=\"_blank\"></a>" : "" );
	  $no_caption   = ( ($settings['bddex_instafeed_caption'] == 'show-caption') ? "show-caption" : "no-caption" );
	  $show_caption = ( ($settings['bddex_instafeed_caption'] == 'show-caption') ? '<p class="insta-caption">{{caption}}</p>' : "" );


	?>
	<div class="bddex-instagram-feed <?php echo $no_caption; ?> <?php echo esc_attr($settings['bddex_instafeed_columns'] ); ?>">
		<div id="bddex-instagram-feed-<?php echo esc_attr($this->get_id()); ?>" class="bddex-insta-grid">
		</div>
	</div>


	<script type="text/javascript">

	jQuery(document).ready(function($) {
	  var feed = new Instafeed({
	    get: '<?php echo esc_attr($settings['bddex_instafeed_source'] ); ?>',
	    tagName: '<?php echo esc_attr($settings['bddex_instafeed_hashtag'] ); ?>',
	    userId: <?php echo esc_attr($settings['bddex_instafeed_user_id'] ); ?>,
	    clientId: '<?php echo esc_attr($settings['bddex_instafeed_client_id'] ); ?>',
	    accessToken: '<?php echo esc_attr($settings['bddex_instafeed_access_token'] ); ?>',
	    limit: '<?php echo $image_limit['size']; ?>',
	    resolution: '<?php echo esc_attr($settings['bddex_instafeed_image_resolution'] ); ?>',
	    sortBy: '<?php echo esc_attr($settings['bddex_instafeed_sort_by'] ); ?>',
	    target: 'bddex-instagram-feed-<?php echo esc_attr($this->get_id()); ?>',
	    template: '<div class="bddex-insta-feed bddex-insta-box"><div class="bddex-insta-feed-inner"><div class="bddex-insta-feed-wrap"><div class="bddex-insta-img-wrap"><img src="{{image}}" /></div><div class="bddex-insta-info-wrap"><div class="bddex-insta-likes-comments"><p> <i class="fa fa-heart-o" aria-hidden="true"></i> {{likes}}</p> <p><i class="fa fa-comment-o" aria-hidden="true"></i> {{comments}}</p> </div><?php echo $show_caption; ?></div><?php echo $enable_link; ?></div></div></div>',
	    after: function() {
	      var el = document.getElementById('bddex-instagram-feed-<?php echo esc_attr($this->get_id()); ?>');
	      if (el.classList)
	        el.classList.add('show');
	      else
	        el.className += ' ' + 'show';
	    }
	  });
	  feed.run();
	  });

	</script>

	<script type="text/javascript">
	jQuery(document).ready(function($) {
		'use strict';
		  $(window).load(function(){

		    $('.bddex-insta-grid').masonry({
		      itemSelector: '.bddex-insta-feed',
		      percentPosition: true,
		      columnWidth: '.bddex-insta-box'
		    });

		  });
	});
	</script>
	
	<?php
	
	}

	protected function content_template() {
		
		?>
		
	
		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_bddex_Instagram_Feed() );