<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_bddex_Dual_Color_Header extends Widget_Base {

	public function get_name() {
		return 'bddex-dual-color-header';
	}

	public function get_title() {
		return esc_html__( 'Avas Dual Color Heading', 'avas-core' );
	}

	public function get_icon() {
		return 'eicon-animated-headline';
	}

   public function get_categories() {
		return [ 'bddex' ];
	}
	
	protected function _register_controls() {

  		/**
  		 * Dual Color Heading Content Settings
  		 */
  		$this->start_controls_section(
  			'bddex_section_dch_content_settings',
  			[
  				'label' => esc_html__( 'Content Settings', 'avas-core' )
  			]
  		);

  		$this->add_control(
		  'bddex_dch_type',
		  	[
		   	'label'       	=> esc_html__( 'Content Style', 'avas-core' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'dch-default',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'dch-default'  					=> esc_html__( 'Default', 'avas-core' ),
		     		'dch-icon-on-top'  				=> esc_html__( 'Icon on top', 'avas-core' ),
		     		'dch-icon-subtext-on-top'  	=> esc_html__( 'Icon &amp; sub-text on top', 'avas-core' ),
		     		'dch-subtext-on-top'  			=> esc_html__( 'Sub-text on top', 'avas-core' ),
		     	],
		  	]
		);

		// $this->add_control(
		//   'bddex_dch_color_type',
		//   	[
		//    	'label'       	=> esc_html__( 'Color Style', 'avas-core' ),
		//      	'type' 			=> Controls_Manager::SELECT,
		//      	'default' 		=> 'dch-colored',
		//      	'label_block' 	=> false,
		//      	'options' 		=> [
		//      		'dch-basic'  					=> esc_html__( 'Basic', 'avas-core' ),
		//      		'dch-colored'  				=> esc_html__( 'Colored', 'avas-core' ),
		//      		'dch-colored-reverse'  		=> esc_html__( 'Reverse Color', 'avas-core' ),
		//      	],
		//   	]
		// );

		$this->add_control(
			'bddex_show_dch_icon_content',
			[
				'label' => esc_html__( 'Show Icon', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => esc_html__( 'Show', 'avas-core' ),
				'label_off' => esc_html__( 'Hide', 'avas-core' ),
				'return_value' => 'yes',
				'separator' => 'after',
			]
		);
		/**
		 * Condition: 'bddex_show_dch_icon_content' => 'yes'
		 */
		$this->add_control(
			'bddex_dch_icon',
			[
				'label' => esc_html__( 'Icon', 'avas-core' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-snowflake-o',
				'condition' => [
					'bddex_show_dch_icon_content' => 'yes'
				]
			]
		);

		$this->add_control( 
			'bddex_dch_first_title',
			[
				'label' => esc_html__( 'Title ( First Part )', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Dual Heading', 'avas-core' )
			]
		);

		$this->add_control( 
			'bddex_dch_last_title',
			[
				'label' => esc_html__( 'Title ( Last Part )', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Example', 'avas-core' )
			]
		);

		$this->add_control( 
			'bddex_dch_subtext',
			[
				'label' => esc_html__( 'Sub Text', 'avas-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'Insert a meaningful line to evaluate the headline.', 'avas-core' )
			]
		);

		$this->add_responsive_control(
			'bddex_dch_content_alignment',
			[
				'label' => esc_html__( 'Alignment', 'avas-core' ),
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
				'prefix_class' => 'bddex-dual-header-content-align-'
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style ( Dual Heading Style )
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'bddex_section_dch_style_settings',
			[
				'label' => esc_html__( 'Dual Heading Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'bddex_dch_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-dual-header' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'bddex_dch_container_padding',
			[
				'label' => esc_html__( 'Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-dual-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'bddex_dch_container_margin',
			[
				'label' => esc_html__( 'Margin', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-dual-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bddex_dch_border',
				'label' => esc_html__( 'Border', 'avas-core' ),
				'selector' => '{{WRAPPER}} .bddex-dual-header',
			]
		);

		$this->add_control(
			'bddex_dch_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-dual-header' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'bddex_dch_shadow',
				'selector' => '{{WRAPPER}} .bddex-dual-header',
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Icon Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'bddex_section_dch_icon_style_settings',
			[
				'label' => esc_html__( 'Icon Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
		     		'bddex_show_dch_icon_content' => 'yes'
		     	]
			]
		);

		$this->add_control(
    		'bddex_dch_icon_size',
    		[
        		'label' => esc_html__( 'Icon Size', 'avas-core' ),
       		'type' => Controls_Manager::SLIDER,
        		'default' => [
            	'size' => 36,
        		],
        		'range' => [
            	'px' => [
                	'min' => 20,
                	'max' => 100,
                	'step' => 1,
            	]
        		],
        		'selectors' => [
            	'{{WRAPPER}} .bddex-dual-header i' => 'font-size: {{SIZE}}px;',
        		],
    		]
		);

		$this->add_control(
			'bddex_dch_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#4d4d4d',
				'selectors' => [
					'{{WRAPPER}} .bddex-dual-header i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Title Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'bddex_section_dch_title_style_settings',
			[
				'label' => esc_html__( 'Color &amp; Typography', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'bddex_dch_title_heading',
			[
				'label' => esc_html__( 'Title Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'bddex_dch_base_title_color',
			[
				'label' => esc_html__( 'Main Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#4d4d4d',
				'selectors' => [
					'{{WRAPPER}} .bddex-dual-header .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_dch_dual_title_color',
			[
				'label' => esc_html__( 'Dual Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1abc9c',
				'selectors' => [
					'{{WRAPPER}} .bddex-dual-header .title span.lead' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            'name' => 'bddex_dch_first_title_typography',
				'selector' => '{{WRAPPER}} .bddex-dual-header .title, {{WRAPPER}} .bddex-dual-header .title span',
			]
		);

		$this->add_control(
			'bddex_dch_sub_title_heading',
			[
				'label' => esc_html__( 'Sub-title Style ', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'bddex_dch_subtext_color',
			[
				'label' => esc_html__( 'Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#4d4d4d',
				'selectors' => [
					'{{WRAPPER}} .bddex-dual-header .subtext' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            'name' => 'bddex_dch_subtext_typography',
				'selector' => '{{WRAPPER}} .bddex-dual-header .subtext',
			]
		);

		$this->end_controls_section();

	}

	protected function render( ) {
		
   	$settings = $this->get_settings();

	?>
	<?php if( 'dch-default' == $settings['bddex_dch_type'] ) : ?>
	<div class="bddex-dual-header">
		<h2 class="title"><span class="lead"><?php esc_html_e( $settings['bddex_dch_first_title'], 'avas-core' ); ?></span> <span><?php esc_html_e( $settings['bddex_dch_last_title'], 'avas-core' ); ?></span></h2>
	   <span class="subtext"><?php esc_html_e( $settings['bddex_dch_subtext'], 'avas-core' ); ?></span>
	   <?php if( 'yes' == $settings['bddex_show_dch_icon_content'] ) : ?>
	   	<i class="<?php echo esc_attr( $settings['bddex_dch_icon'] ); ?>"></i>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<?php if( 'dch-icon-on-top' == $settings['bddex_dch_type'] ) : ?>
	<div class="bddex-dual-header">
		<?php if( 'yes' == $settings['bddex_show_dch_icon_content'] ) : ?>
	   	<i class="<?php echo esc_attr( $settings['bddex_dch_icon'] ); ?>"></i>
		<?php endif; ?>
		<h2 class="title"><span class="lead"><?php esc_html_e( $settings['bddex_dch_first_title'], 'avas-core' ); ?></span> <span><?php esc_html_e( $settings['bddex_dch_last_title'], 'avas-core' ); ?></span></h2>
	   <span class="subtext"><?php esc_html_e( $settings['bddex_dch_subtext'], 'avas-core' ); ?></span>
	</div>
	<?php endif; ?>

	<?php if( 'dch-icon-subtext-on-top' == $settings['bddex_dch_type'] ) : ?>
	<div class="bddex-dual-header">
		<?php if( 'yes' == $settings['bddex_show_dch_icon_content'] ) : ?>
	   	<i class="<?php echo esc_attr( $settings['bddex_dch_icon'] ); ?>"></i>
		<?php endif; ?>
	   <span class="subtext"><?php esc_html_e( $settings['bddex_dch_subtext'], 'avas-core' ); ?></span>
	   <h2 class="title"><span class="lead"><?php esc_html_e( $settings['bddex_dch_first_title'], 'avas-core' ); ?></span> <span><?php esc_html_e( $settings['bddex_dch_last_title'], 'avas-core' ); ?></span></h2>
	</div>
	<?php endif; ?>

	<?php if( 'dch-subtext-on-top' == $settings['bddex_dch_type'] ) : ?>
	<div class="bddex-dual-header">
	   <span class="subtext"><?php esc_html_e( $settings['bddex_dch_subtext'], 'avas-core' ); ?></span>
			<h2 class="title"><span class="lead"><?php esc_html_e( $settings['bddex_dch_first_title'], 'avas-core' ); ?></span> <span><?php esc_html_e( $settings['bddex_dch_last_title'], 'avas-core' ); ?></span></h2>
		<?php if( 'yes' == $settings['bddex_show_dch_icon_content'] ) : ?>
	   	<i class="<?php echo esc_attr( $settings['bddex_dch_icon'] ); ?>"></i>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<?php
	}

	protected function content_template() {
		?>
		
		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_bddex_Dual_Color_Header() );