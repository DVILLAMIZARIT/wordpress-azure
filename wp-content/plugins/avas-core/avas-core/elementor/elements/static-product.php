<?php
namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


class Widget_bddex_Static_Product extends Widget_Base {
	

	public function get_name() {
		return 'bddex-static-product';
	}

	public function get_title() {
		return esc_html__( 'Avas Static Product', 'avas-core' );
	}

	public function get_icon() {
		return 'eicon-image-box';
	}

   public function get_categories() {
		return [ 'bddex' ];
	}


	protected function _register_controls() {

		// Content Controls
  		$this->start_controls_section(
  			'bddex_section_static_product_content',
  			[
  				'label' => esc_html__( 'Product Details', 'avas-core' )
  			]
  		);

		
		$this->add_control(
			'bddex_static_product_image',
			[
				'label' => __( 'Product Image', 'avas-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->add_control(
			'bddex_static_product_heading',
			[
				'label' => __( 'Product Heading', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Product Name',
				'placeholder' => __( 'Enter heading for the product', 'avas-core' ),
				'title' => __( 'Enter heading for the product', 'avas-core' ),
			]
		);

		$this->add_control(
		  'bddex_static_product_description',
		  [
		     'label'   => __( 'Product Description', 'avas-core' ),
		     'type'    => Controls_Manager::TEXTAREA,
		     'default' => __( 'Click to inspect, then edit as needed.', 'avas-core' ),
		  ]
		);


		$this->add_control(
			'bddex_static_product_title_buttons',
			[
				'label' => __( 'Links & Buttons', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'bddex_static_product_link_url',
			[
				'label' => __( 'Product Link URL', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '#',
				'placeholder' => __( 'Enter link URL for the promo', 'avas-core' ),
				'title' => __( 'Enter URL for the product', 'avas-core' ),
			]
		);

		$this->add_control(
			'bddex_static_product_link_target',
			[
				'label' => esc_html__( 'Open in new window?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( '_blank', 'avas-core' ),
				'label_off' => __( '_self', 'avas-core' ),
				'default' => '_self',
			]
		);

		$this->add_control(
			'bddex_static_product_demo_link_url',
			[
				'label' => __( 'Live Demo URL', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '#',
				'placeholder' => __( 'Enter link URL for live demo', 'avas-core' ),
				'title' => __( 'Enter URL for the promo', 'avas-core' ),
			]
		);

		$this->add_control(
			'bddex_static_product_demo_text',
			[
				'label' => esc_html__( 'Live Demo Text', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Live Demo', 'avas-core' ),
			]
		);

		$this->add_control(
			'bddex_static_product_demo_link_target',
			[
				'label' => esc_html__( 'Open in new window?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( '_blank', 'avas-core' ),
				'label_off' => __( '_self', 'avas-core' ),
				'default' => '_blank',
			]
		);

		
		$this->add_control(
			'bddex_static_product_show_details_btn',
			[
				'label' => esc_html__( 'Show Details Button?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'yes', 'avas-core' ),
				'label_off' => __( 'no', 'avas-core' ),
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'bddex_static_product_btn',
			[
				'label' => esc_html__( 'Button Text', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'View Details', 'avas-core' ),
				'condition' => [
					'bddex_static_product_show_details_btn' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'bddex_static_product_btn_icon',
			[
				'label' => esc_html__( 'Icon', 'avas-core' ),
				'type' => Controls_Manager::ICON,
				'condition' => [
					'bddex_static_product_show_details_btn' => 'yes',
				],
			]
		);

		$this->add_control(
			'bddex_static_product_btn_icon_align',
			[
				'label' => esc_html__( 'Icon Position', 'avas-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => esc_html__( 'Before', 'avas-core' ),
					'right' => esc_html__( 'After', 'avas-core' ),
				],
				'condition' => [
					'bddex_static_product_show_details_btn' => 'yes',
				],
			]
		);

		$this->add_control(
			'bddex_static_product_btn_icon_indent',
			[
				'label' => esc_html__( 'Icon Spacing', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'condition' => [
					'bddex_static_product_show_details_btn' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-static-product-button-icon-right' => 'margin-left: {{SIZE}}px;',
					'{{WRAPPER}} .bddex-static-product-button-icon-left' => 'margin-right: {{SIZE}}px;',
				],
			]
		);
		
		
		
		$this->add_control(
			'bddex_static_product_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-static-product-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'bddex_static_product_show_details_btn' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'bddex_static_product_btn_border_radius',
			[
				'label' => esc_html__( 'Button Border Radius', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-static-product-btn' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'bddex_static_product_show_details_btn' => 'yes',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            	'name' => 'bddex_static_product_btn_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bddex-static-product-btn',
				'condition' => [
					'bddex_static_product_show_details_btn' => 'yes',
				],
			]
		);
		
		$this->start_controls_tabs( 'bddex_static_product_btn_content_tabs' );

		$this->start_controls_tab( 'normal_default_content', [ 'label' => esc_html__( 'Normal', 'avas-core' ), 
				'condition' => [
					'bddex_static_product_show_details_btn' => 'yes',
				],
			 ] 
		);

		$this->add_control(
			'bddex_static_product_btn_text_color',
			[
				'label' => esc_html__( 'Text Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .bddex-static-product-btn' => 'color: {{VALUE}};',
				],
				'condition' => [
					'bddex_static_product_show_details_btn' => 'yes',
				],
			]
		);
		

		
		$this->add_control(
			'bddex_static_product_btn_background_color',
			[
				'label' => esc_html__( 'Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#646464',
				'selectors' => [
					'{{WRAPPER}} .bddex-static-product-btn' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'bddex_static_product_show_details_btn' => 'yes',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bddex_static_product_btn_border',
				'selector' => '{{WRAPPER}} .bddex-static-product-btn',
				'condition' => [
					'bddex_static_product_show_details_btn' => 'yes',
				],
			]
		);

		$this->add_control(
			'bddex_static_product_btn_spacing',
			[
				'label' => esc_html__( 'Button Spacing', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-static-product-btn-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'bddex_static_product_show_details_btn' => 'yes',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab( 'bddex_static_product_btn_hover', 
			[ 
				'label' => esc_html__( 'Hover', 'avas-core' ), 
				'condition' => [
					'bddex_static_product_show_details_btn' => 'yes',
				],
			] 
		);

		$this->add_control(
			'bddex_static_product_btn_hover_text_color',
			[
				'label' => esc_html__( 'Text Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .bddex-static-product-btn:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'bddex_static_product_show_details_btn' => 'yes',
				],
			]
		);

		$this->add_control(
			'bddex_static_product_btn_hover_background_color',
			[
				'label' => esc_html__( 'Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#272727',
				'selectors' => [
					'{{WRAPPER}} .bddex-static-product-btn:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'bddex_static_product_show_details_btn' => 'yes',
				],
			]
		);

		$this->add_control(
			'bddex_static_product_btn_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bddex-static-product-btn:hover' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'bddex_static_product_show_details_btn' => 'yes',
				],
			]
		);
		
		



		$this->end_controls_section();
		


  		// Style Controls
		$this->start_controls_section(
			'bddex_section_bddex_static_product_settings',
			[
				'label' => esc_html__( 'Product Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);


		$this->add_control(
			'bddex_static_product_container_width',
			[
				'label' => esc_html__( 'Set max width for the container?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'yes', 'avas-core' ),
				'label_off' => __( 'no', 'avas-core' ),
				'default' => 'no',
			]
		);

		$this->add_responsive_control(
			'bddex_static_product_container_width_value',
			[
				'label' => __( 'Container Max Width (% or px)', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 480,
					'unit' => 'px',
				],
				'size_units' => [ 'px', '%' ],
				'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 1000,
		                'step' => 5,
		            ],
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-static-product' => 'max-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'bddex_static_product_container_width' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'bddex_static_product_text_alignment',
			[
				'label' => esc_html__( 'Content Text Alignment', 'avas-core' ),
				'separator' => 'before',
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'avas-core' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'avas-core' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'avas-core' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .bddex-static-product-details' => 'text-align: {{VALUE}}',
					'{{WRAPPER}} .bddex-static-product-btn-wrap' => 'text-align: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'bddex_static_product_content_padding',
			[
				'label' => esc_html__( 'Content Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-static-product-details' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bddex_static_product_border',
				'selector' => '{{WRAPPER}} .bddex-static-product',
			]
		);
		
		
		$this->add_control(
			'bddex_static_product_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-static-product' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'bddex_static_product_box_shadow',
				'selector' => '{{WRAPPER}} .bddex-static-product',
				'separator' => '',
			]
		);


		$this->add_control(
			'bddex_static_product_hover_style_title',
			[
				'label' => __( 'Hover Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bddex_static_product_hover_border',
				'selector' => '{{WRAPPER}} .bddex-static-product:hover',
			]
		);
		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'bddex_static_product_hover_box_shadow',
				'selector' => '{{WRAPPER}} .bddex-static-product:hover',
				'separator' => '',
			]
		);
		
		
		$this->end_controls_section();	


		$this->start_controls_section(
			'bddex_section_bddex_static_product_styles',
			[
				'label' => esc_html__( 'Colors &amp; Typography', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'bddex_static_product_overlay_color',
			[
				'label' => esc_html__( 'Product Thumbnail Overlay Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0,0,0, .75)',
				'selectors' => [
					'{{WRAPPER}} .bddex-static-product-thumb-overlay' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'bddex_static_product_live_link_color',
			[
				'label' => esc_html__( 'Live Link Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .bddex-static-product-thumb-overlay > a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_static_product_live_link_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bddex-static-product-thumb-overlay > a',
			]
		);		

		$this->add_control(
			'bddex_static_product_title_color',
			[
				'label' => esc_html__( 'Product Title Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#303133',
				'selectors' => [
					'{{WRAPPER}} .bddex-static-product-details > h2 > a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_static_product_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bddex-static-product-details > h2',
			]
		);

		$this->add_control(
			'bddex_static_product_content_color',
			[
				'label' => esc_html__( 'Product Content Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#7a7a7a',
				'selectors' => [
					'{{WRAPPER}} .bddex-static-product-details > p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_static_product_content_background',
			[
				'label' => esc_html__( 'Product Content Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .bddex-static-product-details' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_static_product_content_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bddex-static-product-details > p',
			]
		);


		$this->end_controls_section();		
		
		
	}


	protected function render( ) {
		
		
      $settings = $this->get_settings();
      $static_product_image = $this->get_settings( 'bddex_static_product_image' );
		

	?>


<div id="bddex-static-product-<?php echo esc_attr($this->get_id()); ?>" class="bddex-static-product">
	<div class="bddex-static-product-media">
		<div class="bddex-static-product-thumb-overlay">
			<a href="<?php echo esc_attr($settings['bddex_static_product_demo_link_url'] ); ?>" target="<?php echo esc_attr($settings['bddex_static_product_demo_link_target'] ); ?>"><span><?php echo esc_attr($settings['bddex_static_product_demo_text'] ); ?></span></a>	
		</div>
		<div class="bddex-static-product-thumb">
			<?php echo '<img alt="'. $settings['bddex_static_product_heading'] . '" src="' . $static_product_image['url'] . '">'; ?>	
		</div>
	</div>
	<div class="bddex-static-product-details">
		<?php if ( ! empty( $settings['bddex_static_product_heading'] ) ) : ?>
			<h2><a href="<?php echo esc_attr($settings['bddex_static_product_link_url'] ); ?>" target="<?php echo esc_attr($settings['bddex_static_product_link_target'] ); ?>"><?php echo esc_attr($settings['bddex_static_product_heading'] ); ?></a></h2>
		<?php endif; ?>
		<p><?php echo $settings['bddex_static_product_description']; ?></p>

		<?php if ( ! empty( $settings['bddex_static_product_show_details_btn'] ) ) : ?>
			<div class="bddex-static-product-btn-wrap">
				<a href="<?php echo esc_attr($settings['bddex_static_product_link_url'] ); ?>" target="<?php echo esc_attr($settings['bddex_static_product_link_target'] ); ?>" class="bddex-static-product-btn">
					<?php if ( ! empty( $settings['bddex_static_product_btn_icon'] ) && $settings['bddex_static_product_btn_icon_align'] == 'left' ) : ?>
						<i class="<?php echo esc_attr($settings['bddex_static_product_btn_icon'] ); ?> bddex-static-product-button-icon-left" aria-hidden="true"></i> 
					<?php endif; ?>

					<?php echo esc_attr($settings['bddex_static_product_btn'] ); ?>

					<?php if ( ! empty( $settings['bddex_static_product_btn_icon'] ) && $settings['bddex_static_product_btn_icon_align'] == 'right' ) : ?>
						<i class="<?php echo esc_attr($settings['bddex_static_product_btn_icon'] ); ?> bddex-static-product-button-icon-right" aria-hidden="true"></i> 
					<?php endif; ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
</div>

	
	<?php
	
	}

	protected function content_template() {
		
		?>
		
	
		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_bddex_Static_Product() );