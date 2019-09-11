<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


class Widget_bddex_Testimonial_Slider extends Widget_Base {

	public function get_name() {
		return 'bddex-testimonial-slider';
	}

	public function get_title() {
		return esc_html__( 'Avas Testimonial Rating Slider ', 'avas-core' );
	}

	public function get_icon() {
		return 'fa fa-comments-o';
	}

   public function get_categories() {
		return [ 'bddex' ];
	}
	
	
	protected function _register_controls() {


  		$this->start_controls_section(
  			'bddex_section_testimonial_content',
  			[
  				'label' => esc_html__( 'Testimonial Content', 'avas-core' )
  			]
  		);


		$this->add_control(
			'bddex_testimonial_slider_item',
			[
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'bddex_testimonial_name' => 'John Doe',
					],
					[
						'bddex_testimonial_name' => 'Jane Doe',
					],

				],
				'fields' => [

					[
						'name' => 'bddex_testimonial_enable_avatar',
						'label' => esc_html__( 'Display Avatar?', 'avas-core' ),
						'type' => Controls_Manager::SWITCHER,
						'default' => 'yes',
					],
					[
						'name' => 'bddex_testimonial_image',
						'label' => esc_html__( 'Testimonial Avatar', 'avas-core' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
						'condition' => [
							'bddex_testimonial_enable_avatar' => 'yes',
						],
					],
					[
						'name' => 'bddex_testimonial_name',
						'label' => esc_html__( 'User Name', 'avas-core' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'John Doe', 'avas-core' ),
					],
					[
						'name' => 'bddex_testimonial_company_title',
						'label' => esc_html__( 'Company Name', 'avas-core' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'Envato', 'avas-core' ),
					],
					[
						'name' => 'bddex_testimonial_description',
						'label' => esc_html__( 'Testimonial Description', 'avas-core' ),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__( 'Add testimonial description here. Edit and place your own text.', 'avas-core' ),
					],

					[
						'name' => 'bddex_testimonial_enable_rating',
						'label' => esc_html__( 'Display Rating?', 'avas-core' ),
						'type' => Controls_Manager::SWITCHER,
						'default' => 'yes',
					],

				   [
					     'name' => 'bddex_testimonial_rating_number',
					     'label'       => esc_html__( 'Rating Number', 'avas-core' ),
					     'type' => Controls_Manager::SELECT,
					     'default' => 'rating-five',
					     'options' => [
					     	'rating-one'  => esc_html__( '1', 'avas-core' ),
					     	'rating-two' => esc_html__( '2', 'avas-core' ),
					     	'rating-three' => esc_html__( '3', 'avas-core' ),
					     	'rating-four' => esc_html__( '4', 'avas-core' ),
					     	'rating-five'   => esc_html__( '5', 'avas-core' ),
					     ],
						'condition' => [
							'bddex_testimonial_enable_rating' => 'yes',
						],
				   ],


				],
				//'title_field' => 'Testimonial Item',
			]
		);



		$this->end_controls_section();

		
		
		$this->start_controls_section(
			'bddex_section_testimonial_slider_settings',
			[
				'label' => esc_html__( 'Testimonial Slider Settings', 'avas-core' ),
			]
		);

		$this->add_control(
		  'bddex_testimonial_max_item',
		  [
		     'label'   => esc_html__( 'Max Visible Item', 'avas-core' ),
		     'type'    => Controls_Manager::NUMBER,
		     'default' => 1,
		     'min'     => 1,
		     'max'     => 100,
		     'step'    => 1,
		  ]
		);

		$this->add_control(
		  'bddex_testimonial_slide_item',
		  [
		     'label'   => esc_html__( 'Slide to Scroll', 'avas-core' ),
		     'type'    => Controls_Manager::NUMBER,
		     'default' => 1,
		     'min'     => 1,
		     'max'     => 100,
		     'step'    => 1,
		  ]
		);

		$this->add_control(
		  'bddex_testimonial_max_tab_item',
		  [
		     'label'   => esc_html__( 'Max Visible Items for Tablet', 'avas-core' ),
		     'type'    => Controls_Manager::NUMBER,
		     'default' => 1,
		     'min'     => 1,
		     'max'     => 100,
		     'step'    => 1,
		  ]
		);
		
		$this->add_control(
		  'bddex_testimonial_max_mobile_item',
		  [
		     'label'   => esc_html__( 'Max Visible Items for Mobile', 'avas-core' ),
		     'type'    => Controls_Manager::NUMBER,
		     'default' => 1,
		     'min'     => 1,
		     'max'     => 100,
		     'step'    => 1,
		  ]
		);

		$this->add_control(
		  'bddex_testimonial_slide_speed',
		  [
		     'label'   => esc_html__( 'Slide Speed', 'avas-core' ),
		     'type'    => Controls_Manager::NUMBER,
		     'default' => 300,
		     'min'     => 100,
		     'max'     => 3000,
		     'step'    => 100,
		  ]
		);


		$this->add_control(
			'bddex_testimonial_slider_autoplay',
			[
				'label' => esc_html__( 'Autoplay?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->add_control(
			'bddex_testimonial_slider_infinite',
			[
				'label' => esc_html__( 'Infinite Loop?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'true',
				'default' => 'false',
			]
		);

		$this->add_control(
			'bddex_testimonial_slider_pause_hover',
			[
				'label' => esc_html__( 'Pause on Hover?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'true',
				'default' => 'false',
			]
		);

		$this->add_control(
			'bddex_testimonial_slide_draggable',
			[
				'label' => esc_html__( 'Draggable?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->add_control(
			'bddex_testimonial_slide_variable_width',
			[
				'label' => esc_html__( 'Variable Width?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'true',
				'default' => 'false',
			]
		);

		$this->add_control(
			'bddex_testimonial_slider_navigation',
			[
				'label' => esc_html__( 'Navigation & Pagination', 'avas-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'dots',
				'options' => [
					'none' => esc_html__( 'None', 'avas-core' ),
					'dots' => esc_html__( 'Dots Only', 'avas-core' ),
					'prev-next' => esc_html__( 'Prev/Next Only', 'avas-core' ),
					'dots-nav' => esc_html__( 'Dots & Prev/Next', 'avas-core' ),
				],
			]
		);

		$this->add_control(
			'bddex_testimonial_slider_navigation_position',
			[
				'label' => esc_html__( 'Navigation & Pagination', 'avas-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'nav-left-right',
				'options' => [
					'nav-left-right' => esc_html__( 'Normal (Left Right)', 'avas-core' ),
					'nav-top-left' => esc_html__( 'Navigation Top Left', 'avas-core' ),
					'nav-top-right' => esc_html__( 'Navigation Top Right', 'avas-core' ),
				],
				'condition' => [
					'bddex_testimonial_slider_navigation!' => 'none',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'bddex_section_testimonial_styles_general',
			[
				'label' => esc_html__( 'Testimonial Styles', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'bddex_testimonial_background',
			[
				'label' => esc_html__( 'Testimonial Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-item' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_testimonial_alignment',
			[
				'label' => esc_html__( 'Set Alignment', 'avas-core' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'bddex-testimonial-align-default' => [
						'title' => esc_html__( 'Default', 'avas-core' ),
						'icon' => 'fa fa-ban',
					],
					'bddex-testimonial-align-left' => [
						'title' => esc_html__( 'Left', 'avas-core' ),
						'icon' => 'fa fa-align-left',
					],
					'bddex-testimonial-align-centered' => [
						'title' => esc_html__( 'Center', 'avas-core' ),
						'icon' => 'fa fa-align-center',
					],
					'bddex-testimonial-align-right' => [
						'title' => esc_html__( 'Right', 'avas-core' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'bddex-testimonial-align-centered',
			]
		);

		$this->add_control(
			'bddex_testimonial_user_display_block',
			[
				'label' => esc_html__( 'Display User & Company Block?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => '',
			]
		);


		$this->add_responsive_control(
			'bddex_testimonial_margin',
			[
				'label' => esc_html__( 'Margin', 'avas-core' ),
				'description' => 'Need to refresh the page to see the change properly',
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'bddex_testimonial_padding',
			[
				'label' => esc_html__( 'Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bddex_testimonial_border',
				'label' => esc_html__( 'Border', 'avas-core' ),
				'selector' => '{{WRAPPER}} .bddex-testimonial-item',
			]
		);

		$this->add_control(
			'bddex_testimonial_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-item' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
			]
		);
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'bddex_section_testimonial_image_styles',
			[
				'label' => esc_html__( 'Testimonial Image Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);		

		$this->add_responsive_control(
			'bddex_testimonial_image_width',
			[
				'label' => esc_html__( 'Image Width', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 150,
					'unit' => 'px',
				],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'size_units' => [ '%', 'px' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-image img' => 'width:{{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->add_responsive_control(
			'bddex_testimonial_image_margin',
			[
				'label' => esc_html__( 'Margin', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-image img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'bddex_testimonial_image_padding',
			[
				'label' => esc_html__( 'Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-image img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bddex_testimonial_image_border',
				'label' => esc_html__( 'Border', 'avas-core' ),
				'selector' => '{{WRAPPER}} .bddex-testimonial-image img',
			]
		);

		$this->add_control(
			'bddex_testimonial_image_rounded',
			[
				'label' => esc_html__( 'Rounded Avatar?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'testimonial-avatar-rounded',
				'default' => '',
			]
		);


		$this->add_control(
			'bddex_testimonial_image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-image img' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
				'condition' => [
					'bddex_testimonial_image_rounded!' => 'testimonial-avatar-rounded',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'bddex_section_testimonial_typography',
			[
				'label' => esc_html__( 'Color &amp; Typography', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);


		$this->add_control(
			'bddex_testimonial_name_color',
			[
				'label' => esc_html__( 'User Name Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#272727',
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-content .bddex-testimonial-user' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_testimonial_name_typography',
				'selector' => '{{WRAPPER}} .bddex-testimonial-content .bddex-testimonial-user',
			]
		);


		$this->add_control(
			'bddex_testimonial_company_color',
			[
				'label' => esc_html__( 'Company Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#272727',
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-content .bddex-testimonial-user-company' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_testimonial_position_typography',
				'selector' => '{{WRAPPER}} .bddex-testimonial-content .bddex-testimonial-user-company',
			]
		);


		$this->add_control(
			'bddex_testimonial_description_color',
			[
				'label' => esc_html__( 'Testimonial Text Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#7a7a7a',
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-content .bddex-testimonial-text' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_testimonial_description_typography',
				'selector' => '{{WRAPPER}} .bddex-testimonial-content .bddex-testimonial-text',
			]
		);


		$this->add_control(
			'bddex_testimonial_quotation_color',
			[
				'label' => esc_html__( 'Quotation Mark Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0,0,0,0.15)',
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-quote' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_testimonial_quotation_typography',
				'selector' => '{{WRAPPER}} .bddex-testimonial-quote',
			]
		);

		$this->add_control(
			'bddex_testimonial_star_color',
			[
				'label' => esc_html__( 'Star Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f2b01e',
				'selectors' => [
					'{{WRAPPER}} .testimonial-star-rating li i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'bddex_section_testimonial_navigation_style',
			[
				'label' => esc_html__( 'Navigation/Pagination Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);


		$this->add_control(
			'bddex_testimonial_navigation_color',
			[
				'label' => esc_html__( 'Navigation Color (Arrows & Bullets)', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-slider .slick-prev::before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .bddex-testimonial-slider .slick-next::before' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_testimonial_navigation_bg',
			[
				'label' => esc_html__( 'Navigation Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#333',
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-slider .slick-dots li button::before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .bddex-testimonial-slider .slick-dots li.slick-active button::before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .bddex-testimonial-slider .slick-prev' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bddex-testimonial-slider .slick-next' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'bddex_testimonial_slider_bullet_size',
			[
				'label' => esc_html__( 'Bullet Size', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 12,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-slider .slick-dots li button::before' => 'font-size:{{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'bddex_testimonial_slider_active_bullet_size',
			[
				'label' => esc_html__( 'Active Bullet Size', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 18,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-slider .slick-dots li.slick-active button::before' => 'font-size:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


	}


	protected function render( ) {
		
      $settings = $this->get_settings();
	  $testimonial_classes = $this->get_settings('bddex_testimonial_image_rounded') . " " . $this->get_settings('bddex_testimonial_alignment');
	  $navigation_type = $this->get_settings('bddex_testimonial_slider_navigation');


	// Pagination type
	switch ( $navigation_type ) {
	  case 'dots':
	    $dots = 'true';
	    $nav  = 'false';
	    break;

	  case 'prev-next':
	    $dots = 'false';
	    $nav  = 'true';
	    break;

	  case 'dots-nav':
	    $dots = 'true';
	    $nav  = 'true';
	    break;

	  default: // NONE
	    $nav  = 'false';
	    $dots = 'false';
	    break;
	}

	$auto_play 		  = ( ($settings['bddex_testimonial_slider_autoplay'] 	  == 'true') ? "true" : "false" );
	$infinite    	  = ( ($settings['bddex_testimonial_slider_infinite']   	  == 'true') ? "true" : "false" );
	$pause_hover 	  = ( ($settings['bddex_testimonial_slider_pause_hover']   == 'true') ? "true" : "false" );
	$draggable   	  = ( ($settings['bddex_testimonial_slide_draggable'] 	  == 'true') ? "true" : "false" );
	$variable_width   = ( ($settings['bddex_testimonial_slide_variable_width'] == 'true') ? "true" : "false" );


	?>

	<div id="bddex-testimonial-<?php echo esc_attr($this->get_id()); ?>" class="bddex-testimonial-slider <?php echo $settings['bddex_testimonial_slider_navigation_position'];?>">
		<?php foreach ( $settings['bddex_testimonial_slider_item'] as $item ) : ?>
		<div class="bddex-testimonial-item clearfix <?php echo $testimonial_classes; ?>">

			<?php if ( $item['bddex_testimonial_enable_avatar'] == 'yes' ) : ?>
			<div class="bddex-testimonial-image">
				<span class="bddex-testimonial-quote"></span>
				<figure>
  					<?php $image = $item['bddex_testimonial_image']; ?>
  					<img src="<?php echo $image['url'];?>" alt="<?php echo esc_attr( $item['bddex_testimonial_name'] ); ?>">	
				</figure>
			</div>
			<?php endif; ?>
			<div class="bddex-testimonial-content <?php echo $item['bddex_testimonial_rating_number'] ?>" <?php if ( $item['bddex_testimonial_enable_avatar'] == '' ) : ?> style="width: 100%;" <?php endif; ?>>
				<span class="bddex-testimonial-quote"></span>
				<p class="bddex-testimonial-text"><?php echo $item['bddex_testimonial_description']; ?></p>
				<?php if ( ! empty($item['bddex_testimonial_enable_rating'] ) ) : ?>
				<ul class="testimonial-star-rating">
					<li><i class="fa fa-star" aria-hidden="true"></i></li>
					<li><i class="fa fa-star" aria-hidden="true"></i></li>
					<li><i class="fa fa-star" aria-hidden="true"></i></li>
					<li><i class="fa fa-star" aria-hidden="true"></i></li>
					<li><i class="fa fa-star" aria-hidden="true"></i></li>
				</ul>
				<?php endif;?>
				<p class="bddex-testimonial-user" <?php if ( ! empty( $settings['bddex_testimonial_user_display_block'] ) ) : ?> style="display: block; float: none;"<?php endif;?>><?php echo esc_attr( $item['bddex_testimonial_name'] ); ?></p>
				<p class="bddex-testimonial-user-company"><?php echo esc_attr( $item['bddex_testimonial_company_title'] ); ?></p>
			</div>
		</div>
		<?php endforeach; ?>
	</div>

<script type="text/javascript">

  jQuery(document).ready(function($) {
    $("#bddex-testimonial-<?php echo esc_attr($this->get_id()); ?>").slick({
      autoplay: <?php echo $auto_play;?>,
      infinite: <?php echo $infinite;?>,
      speed: <?php echo $settings['bddex_testimonial_slide_speed'];?>,
      slidesToShow: <?php echo $settings['bddex_testimonial_max_item'];?>,
      slidesToScroll: <?php echo $settings['bddex_testimonial_slide_item'];?>,
      arrows: <?= $nav ?>,
      dots: <?= $dots ?>,
      pauseOnHover: <?php echo $pause_hover;?>,
      draggable: <?php echo $draggable;?>,
      variableWidth: <?php echo $variable_width;?>,
      responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: <?php echo $settings['bddex_testimonial_max_tab_item'];?>,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: <?php echo $settings['bddex_testimonial_max_mobile_item'];?>,
        slidesToScroll: 1
      }
    }
  ]
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


Plugin::instance()->widgets_manager->register_widget_type( new Widget_bddex_Testimonial_Slider() );