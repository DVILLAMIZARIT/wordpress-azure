<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_bddex_Info_Box extends Widget_Base {

	public function get_name() {
		return 'bddex-info-box';
	}

	public function get_title() {
		return esc_html__( 'Avas Info Box', 'avas-core' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

   public function get_categories() {
		return [ 'bddex' ];
	}
	
	protected function _register_controls() {

  		/**
  		 * Infobox Image Settings
  		 */
  		$this->start_controls_section(
  			'bddex_section_infobox_content_settings',
  			[
  				'label' => esc_html__( 'Infobox Image', 'avas-core' )
  			]
  		);

  		$this->add_control(
		  'bddex_infobox_img_type',
		  	[
		   	'label'       	=> esc_html__( 'Infobox Type', 'avas-core' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'img-on-top',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'img-on-top'  			=> esc_html__( 'Image On Top', 'avas-core' ),
		     		'img-on-left' 			=> esc_html__( 'Image On Left', 'avas-core' ),
		     		'img-beside-title' 	=> esc_html__( 'Image Beside Title', 'avas-core' ),
		     	],
		  	]
		);

		$this->add_responsive_control(
			'bddex_infobox_img_or_icon',
			[
				'label' => esc_html__( 'Image or Icon', 'avas-core' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'img' => [
						'title' => esc_html__( 'Image', 'avas-core' ),
						'icon' => 'fa fa-picture-o',
					],
					'icon' => [
						'title' => esc_html__( 'Icon', 'avas-core' ),
						'icon' => 'fa fa-info-circle',
					],
				],
				'default' => 'icon',
			]
		);
		/**
		 * Condition: 'bddex_infobox_img_or_icon' => 'img'
		 */
		$this->add_control(
			'bddex_infobox_image',
			[
				'label' => esc_html__( 'Infobox Image', 'avas-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'bddex_infobox_img_or_icon' => 'img'
				]
			]
		);

		
		/**
		 * Condition: 'bddex_infobox_img_or_icon' => 'icon'
		 */
		$this->add_control(
			'bddex_infobox_icon',
			[
				'label' => esc_html__( 'Icon', 'avas-core' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-building-o',
				'condition' => [
					'bddex_infobox_img_or_icon' => 'icon'
				]
			]
		);

		$this->end_controls_section();

		/**
		 * Infobox Content
		 */
		$this->start_controls_section( 
			'bddex_infobox_content',
			[
				'label' => esc_html__( 'Infobox Content', 'avas-core' ),
			]
		);
		$this->add_control( 
			'bddex_infobox_title',
			[
				'label' => esc_html__( 'Infobox Title', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'This is an icon box', 'avas-core' )
			]
		);
		$this->add_control( 
			'bddex_infobox_text',
			[
				'label' => esc_html__( 'Infobox Text', 'avas-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'Write a short description, that will describe the title or something informational and useful.', 'avas-core' )
			]
		);
		$this->add_control(
			'bddex_show_infobox_content',
			[
				'label' => __( 'Show Content', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Show', 'avas-core' ),
				'label_off' => __( 'Hide', 'avas-core' ),
				'return_value' => 'yes',
			]
		);
		$this->add_responsive_control(
			'bddex_infobox_content_alignment',
			[
				'label' => esc_html__( 'Content Alignment', 'avas-core' ),
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
				'prefix_class' => 'bddex-infobox-content-align-',
				'condition' => [
					'bddex_infobox_img_type' => 'img-on-top'
				]
			]
		);
		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Info Box Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'bddex_section_infobox_style_settings',
			[
				'label' => esc_html__( 'Info Box Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'bddex_infobox_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-infobox' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'bddex_infobox_container_padding',
			[
				'label' => esc_html__( 'Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-infobox' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'bddex_infobox_container_margin',
			[
				'label' => esc_html__( 'Margin', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-infobox' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
				[
					'name' => 'bddex_infobox_border',
					'label' => esc_html__( 'Border', 'avas-core' ),
					'selector' => '{{WRAPPER}} .bddex-infobox',
				]
		);

		$this->add_control(
			'bddex_infobox_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-infobox' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'bddex_infobox_shadow',
				'selector' => '{{WRAPPER}} .bddex-infobox',
			]
		);

		$this->end_controls_section();
		/**
		 * -------------------------------------------
		 * Tab Style (Info Box Image)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'bddex_section_infobox_imgae_style_settings',
			[
				'label' => esc_html__( 'Image Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
		     		'bddex_infobox_img_or_icon' => 'img'
		     	]
			]
		);

		$this->add_control(
		  'bddex_infobox_img_shape',
		  	[
		   	'label'     	=> esc_html__( 'Image Shape', 'avas-core' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'square',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'square'  	=> esc_html__( 'Square', 'avas-core' ),
		     		'circle' 	=> esc_html__( 'Circle', 'avas-core' ),
		     		'radius' 	=> esc_html__( 'Radius', 'avas-core' ),
		     	],
		     	'prefix_class' => 'bddex-infobox-shape-',
		     	'condition' => [
		     		'bddex_infobox_img_or_icon' => 'img'
		     	]
		  	]
		);

		$this->add_control(
			'bddex_infobox_image_resizer',
			[
				'label' => esc_html__( 'Image Resizer', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 100
				],
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-infobox .infobox-icon img' => 'width: {{SIZE}}px;',
				],
				'condition' => [
		     		'bddex_infobox_img_or_icon' => 'img',
		     		'bddex_infobox_img_type' => 'img-on-top'
		     	]
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail',
				'default' => 'full',
				'condition' => [
					'bddex_infobox_image[url]!' => '',
				],
				'condition' => [
					'bddex_infobox_img_or_icon' => 'img',
				]
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Info Box Icon Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'bddex_section_infobox_icon_style_settings',
			[
				'label' => esc_html__( 'Icon Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
		     		'bddex_infobox_img_or_icon' => 'icon'
		     	]
			]
		);

		$this->add_control(
    		'bddex_infobox_icon_size',
    		[
        		'label' => __( 'Icon Size', 'avas-core' ),
       		'type' => Controls_Manager::SLIDER,
        		'default' => [
            	'size' => 40,
        		],
        		'range' => [
            	'px' => [
                	'min' => 20,
                	'max' => 100,
                	'step' => 1,
            	]
        		],
        		'selectors' => [
            	'{{WRAPPER}} .bddex-infobox .infobox-icon i' => 'font-size: {{SIZE}}px;',
        		],
    		]
		);

		$this->add_control(
			'bddex_infobox_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#4d4d4d',
				'selectors' => [
					'{{WRAPPER}} .bddex-infobox .infobox-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .bddex-infobox.icon-beside-title .infobox-content .title figure i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
		  'bddex_infobox_icon_bg_shape',
		  	[
		   	'label'     	=> esc_html__( 'Background Shape', 'avas-core' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'none',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'none'  		=> esc_html__( 'None', 'avas-core' ),
		     		'circle' 	=> esc_html__( 'Circle', 'avas-core' ),
		     		'radius' 	=> esc_html__( 'Radius', 'avas-core' ),
		     		'square' 	=> esc_html__( 'Square', 'avas-core' ),
		     	],
		     	'prefix_class' => 'bddex-infobox-icon-bg-shape-',
		     	'condition' => [
					'bddex_infobox_img_type!' => 'img-on-left'
				]
		  	]
		);

		$this->add_control(
			'bddex_infobox_icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f4f4f4',
				'selectors' => [
					'{{WRAPPER}} .bddex-infobox .infobox-icon i' => 'background: {{VALUE}};',
				],
				'condition' => [
					'bddex_infobox_img_type!' => 'img-on-left',
					'bddex_infobox_icon_bg_shape!' => 'none',
				]
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Info Box Title Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'bddex_section_infobox_title_style_settings',
			[
				'label' => esc_html__( 'Color &amp; Typography', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'bddex_infobox_title_heading',
			[
				'label' => esc_html__( 'Title Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'bddex_infobox_title_color',
			[
				'label' => esc_html__( 'Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#4d4d4d',
				'selectors' => [
					'{{WRAPPER}} .bddex-infobox .infobox-content .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_infobox_title_typography',
				'selector' => '{{WRAPPER}} .bddex-infobox .infobox-content .title',
			]
		);

		$this->add_control(
			'bddex_infobox_content_heading',
			[
				'label' => esc_html__( 'Content Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'bddex_infobox_content_color',
			[
				'label' => esc_html__( 'Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#4d4d4d',
				'selectors' => [
					'{{WRAPPER}} .bddex-infobox .infobox-content p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_infobox_content_typography',
				'selector' => '{{WRAPPER}} .bddex-infobox .infobox-content p',
			]
		);
		
		$this->end_controls_section();

	}


	protected function render( ) {
		
   		$settings = $this->get_settings();
      	$infobox_image = $this->get_settings( 'bddex_infobox_image' );
	  	$infobox_image_url = Group_Control_Image_Size::get_attachment_image_src( $infobox_image['id'], 'thumbnail', $settings );
	  	if( empty( $infobox_image_url ) ) : $infobox_image_url = $infobox_image['url']; else: $infobox_image_url = $infobox_image_url; endif;	
	
	?>
		<?php if( 'img-on-top' == $settings['bddex_infobox_img_type'] ) : ?>
		<div class="bddex-infobox">
			<div class="infobox-icon">
				<?php if( 'img' == $settings['bddex_infobox_img_or_icon'] ) : ?>
				<figure>
					<img src="<?php echo esc_url( $infobox_image_url ); ?>" alt="Icon Image">
				</figure>
				<?php endif; ?>
				<?php if( 'icon' == $settings['bddex_infobox_img_or_icon'] ) : ?>
				<i class="<?php echo esc_attr( $settings['bddex_infobox_icon'] ); ?>"></i>
				<?php endif; ?>
			</div>
			<div class="infobox-content">
				<h4 class="title"><?php echo $settings['bddex_infobox_title']; ?></h4>
				<?php if( 'yes' == $settings['bddex_show_infobox_content'] ) : ?>
					<p><?php echo $settings['bddex_infobox_text']; ?></p>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
		<?php if( 'img-on-left' == $settings['bddex_infobox_img_type'] ) : ?>
		<div class="bddex-infobox icon-on-left">
			<div class="infobox-icon <?php if( 'icon' == $settings['bddex_infobox_img_or_icon'] ) : echo esc_attr( 'bddex-icon-only', 'avas-core' ); endif; ?>">
				<?php if( 'img' == $settings['bddex_infobox_img_or_icon'] ) : ?>
				<figure>
					<img src="<?php echo esc_url( $infobox_image_url ); ?>" alt="Icon Image">
				</figure>
				<?php endif; ?>
				<?php if( 'icon' == $settings['bddex_infobox_img_or_icon'] ) : ?>
				<i class="<?php echo esc_attr( $settings['bddex_infobox_icon'] ); ?>"></i>
				<?php endif; ?>
			</div>
			<div class="infobox-content <?php if( 'icon' == $settings['bddex_infobox_img_or_icon'] ) : echo esc_attr( 'bddex-icon-only', 'avas-core' ); endif; ?>">
				<h4 class="title"><?php echo $settings['bddex_infobox_title']; ?></h4>
				<?php if( 'yes' == $settings['bddex_show_infobox_content'] ) : ?>
					<p><?php echo $settings['bddex_infobox_text']; ?></p>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
		<?php if( 'img-beside-title' == $settings['bddex_infobox_img_type'] ) : ?>
		<div class="bddex-infobox icon-beside-title">
			<div class="infobox-content">
				<h4 class="title <?php if( 'icon' == $settings['bddex_infobox_img_or_icon'] ) : echo esc_attr( 'bddex-icon-only', 'avas-core' ); endif; ?>">
					<?php if( 'img' == $settings['bddex_infobox_img_or_icon'] ) : ?>
					<figure>
						<img src="<?php echo esc_url( $infobox_image_url ); ?>" alt="Icon Image">
					</figure>
					<?php endif; ?>
					<?php if( 'icon' == $settings['bddex_infobox_img_or_icon'] ) : ?>
					<figure>
					<i class="<?php echo esc_attr( $settings['bddex_infobox_icon'] ); ?>"></i>
					</figure>
					<?php endif; ?>
					<?php echo $settings['bddex_infobox_title']; ?>
				</h4>
				<?php if( 'yes' == $settings['bddex_show_infobox_content'] ) : ?>
					<p><?php echo $settings['bddex_infobox_text']; ?></p>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
	<?php
	}

	protected function content_template() {
		
		?>
		
	
		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_bddex_Info_Box() );