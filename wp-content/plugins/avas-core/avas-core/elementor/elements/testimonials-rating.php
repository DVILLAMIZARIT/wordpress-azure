<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


class Widget_bddex_Testimonial extends Widget_Base {

	public function get_name() {
		return 'bddex-testimonial';
	}

	public function get_title() {
		return esc_html__( 'Avas Testimonial Rating', 'avas-core' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
	}

   public function get_categories() {
		return [ 'bddex' ];
	}
	
	
	protected function _register_controls() {

		
  		$this->start_controls_section(
  			'bddex_section_testimonial_image',
  			[
  				'label' => esc_html__( 'Testimonial Image', 'avas-core' )
  			]
  		);

		$this->add_control(
			'bddex_testimonial_enable_avatar',
			[
				'label' => esc_html__( 'Display Avatar?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);		

		$this->add_control(
			'bddex_testimonial_image',
			[
				'label' => __( 'Testimonial Avatar', 'avas-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'bddex_testimonial_enable_avatar' => 'yes',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail',
				'default' => 'thumbnail',
				'condition' => [
					'bddex_testimonial_image[url]!' => '',
					'bddex_testimonial_enable_avatar' => 'yes',
				],
			]
		);


		$this->end_controls_section();

  		$this->start_controls_section(
  			'bddex_section_testimonial_content',
  			[
  				'label' => esc_html__( 'Testimonial Content', 'avas-core' )
  			]
  		);


		$this->add_control(
			'bddex_testimonial_name',
			[
				'label' => esc_html__( 'User Name', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'John Doe', 'avas-core' ),
			]
		);
		
		$this->add_control(
			'bddex_testimonial_company_title',
			[
				'label' => esc_html__( 'Company Name', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Codetic', 'avas-core' ),
			]
		);
		
		$this->add_control(
			'bddex_testimonial_description',
			[
				'label' => esc_html__( 'Testimonial Description', 'avas-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Add testimonial description here. Edit and place your own text.', 'avas-core' ),
			]
		);
		

		$this->add_control(
			'bddex_testimonial_enable_rating',
			[
				'label' => esc_html__( 'Display Rating?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);	


		$this->add_control(
		  'bddex_testimonial_rating_number',
		  [
		     'label'       => __( 'Rating Number', 'avas-core' ),
		     'type' => Controls_Manager::SELECT,
		     'default' => 'rating-five',
		     'options' => [
		     	'rating-one'  => __( '1', 'avas-core' ),
		     	'rating-two' => __( '2', 'avas-core' ),
		     	'rating-three' => __( '3', 'avas-core' ),
		     	'rating-four' => __( '4', 'avas-core' ),
		     	'rating-five'   => __( '5', 'avas-core' ),
		     ],
			'condition' => [
				'bddex_testimonial_enable_rating' => 'yes',
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
						'title' => __( 'Default', 'avas-core' ),
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
				'default' => 'bddex-testimonial-align-default',
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
			'bddex_testimonial_name_heading',
			[
				'label' => __( 'User Name', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
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
			'bddex_testimonial_company_heading',
			[
				'label' => __( 'Company Name', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
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
			'bddex_testimonial_description_heading',
			[
				'label' => __( 'Testimonial Text', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
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
			'bddex_testimonial_quotation_heading',
			[
				'label' => __( 'Quotation Mark', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
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


		$this->end_controls_section();


	}


	protected function render( ) {
		
      $settings = $this->get_settings();
      $testimonial_image = $this->get_settings( 'bddex_testimonial_image' );
	  $testimonial_image_url = Group_Control_Image_Size::get_attachment_image_src( $testimonial_image['id'], 'thumbnail', $settings );	
	  $testimonial_classes = $this->get_settings('bddex_testimonial_image_rounded') . " " . $this->get_settings('bddex_testimonial_alignment') . " " . $this->get_settings('bddex_testimonial_rating_number');


	?>


<div id="bddex-testimonial-<?php echo esc_attr($this->get_id()); ?>" class="bddex-testimonial-item clearfix <?php echo $testimonial_classes; ?>">

	<div class="bddex-testimonial-image">
		<span class="bddex-testimonial-quote"></span>
		<figure>
			<img src="<?php echo esc_url($testimonial_image_url);?>" alt="<?php echo $settings['bddex_testimonial_name'];?>">
		</figure>
	</div>

	<div class="bddex-testimonial-content">
		<span class="bddex-testimonial-quote"></span>
		<p class="bddex-testimonial-text"><?php echo $settings['bddex_testimonial_description']; ?></p>

		<?php if ( ! empty( $settings['bddex_testimonial_enable_rating'] ) ) : ?>
		<ul class="testimonial-star-rating">
			<li><i class="fa fa-star" aria-hidden="true"></i></li>
			<li><i class="fa fa-star" aria-hidden="true"></i></li>
			<li><i class="fa fa-star" aria-hidden="true"></i></li>
			<li><i class="fa fa-star" aria-hidden="true"></i></li>
			<li><i class="fa fa-star" aria-hidden="true"></i></li>
		</ul>
		<?php endif;?>
		<p class="bddex-testimonial-user" <?php if ( ! empty( $settings['bddex_testimonial_user_display_block'] ) ) : ?> style="display: block; float: none;"<?php endif;?>><?php echo $settings['bddex_testimonial_name']; ?></p>
		<p class="bddex-testimonial-user-company"><?php echo $settings['bddex_testimonial_company_title']; ?></p>
	</div>
</div>

	
	<?php
	
	}

	protected function content_template() {
		
		?>
		
	
		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_bddex_Testimonial() );