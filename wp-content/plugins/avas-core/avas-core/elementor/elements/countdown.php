<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


class Widget_bddex_Countdown extends Widget_Base {

	public function get_name() {
		return 'bddex-countdown';
	}

	public function get_title() {
		return esc_html__( 'Avas Countdown', 'avas-core' );
	}

	public function get_icon() {
		return 'eicon-countdown';
	}

   public function get_categories() {
		return [ 'bddex' ];
	}
	
	
	protected function _register_controls() {

		
  		$this->start_controls_section(
  			'bddex_section_countdown_settings_general',
  			[
  				'label' => esc_html__( 'Countdown Settings', 'avas-core' )
  			]
  		);
		
		$this->add_control(
			'bddex_countdown_due_time',
			[
				'label' => esc_html__( 'Countdown Due Date', 'avas-core' ),
				'type' => Controls_Manager::DATE_TIME,
				'default' => date("Y-m-d", strtotime("+ 2 day")),
				'description' => esc_html__( 'Set the due date and time', 'avas-core' ),
			]
		);

		$this->add_control(
			'bddex_countdown_label_view',
			[
				'label' => esc_html__( 'Label Position', 'avas-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'bddex-countdown-label-block',
				'options' => [
					'bddex-countdown-label-block' => esc_html__( 'Block', 'avas-core' ),
					'bddex-countdown-label-inline' => esc_html__( 'Inline', 'avas-core' ),
				],
			]
		);

		$this->add_responsive_control(
			'bddex_countdown_label_padding_left',
			[
				'label' => esc_html__( 'Left spacing for Labels', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'description' => esc_html__( 'Use when you select inline labels', 'avas-core' ),
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-label' => 'padding-left:{{SIZE}}px;',
				],
				'condition' => [
					'bddex_countdown_label_view' => 'bddex-countdown-label-inline',
				],
			]
		);


		$this->end_controls_section();

  		$this->start_controls_section(
  			'bddex_section_countdown_settings_content',
  			[
  				'label' => esc_html__( 'Content Settings', 'avas-core' )
  			]
  		);

  		$this->add_control(
		  'bddex_section_countdown_style',
		  	[
		   	'label'       	=> esc_html__( 'Countdown Style', 'avas-core' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'style-1',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'style-1'  	=> esc_html__( 'Style 1', 'avas-core' ),
		     		'style-2' 	=> esc_html__( 'Style 2', 'avas-core' ),
		     		'style-3' 	=> esc_html__( 'Style 3', 'avas-core' ),
		     	],
		  	]
		);


		$this->add_control(
			'bddex_countdown_days',
			[
				'label' => esc_html__( 'Display Days', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'bddex_countdown_days_label',
			[
				'label' => esc_html__( 'Custom Label for Days', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Days', 'avas-core' ),
				'description' => esc_html__( 'Leave blank to hide', 'avas-core' ),
				'condition' => [
					'bddex_countdown_days' => 'yes',
				],
			]
		);
		

		$this->add_control(
			'bddex_countdown_hours',
			[
				'label' => esc_html__( 'Display Hours', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'bddex_countdown_hours_label',
			[
				'label' => esc_html__( 'Custom Label for Hours', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Hours', 'avas-core' ),
				'description' => esc_html__( 'Leave blank to hide', 'avas-core' ),
				'condition' => [
					'bddex_countdown_hours' => 'yes',
				],
			]
		);

		$this->add_control(
			'bddex_countdown_minutes',
			[
				'label' => esc_html__( 'Display Minutes', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'bddex_countdown_minutes_label',
			[
				'label' => esc_html__( 'Custom Label for Minutes', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Minutes', 'avas-core' ),
				'description' => esc_html__( 'Leave blank to hide', 'avas-core' ),
				'condition' => [
					'bddex_countdown_minutes' => 'yes',
				],
			]
		);
			
		$this->add_control(
			'bddex_countdown_seconds',
			[
				'label' => esc_html__( 'Display Seconds', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'bddex_countdown_seconds_label',
			[
				'label' => esc_html__( 'Custom Label for Seconds', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Seconds', 'avas-core' ),
				'description' => esc_html__( 'Leave blank to hide', 'avas-core' ),
				'condition' => [
					'bddex_countdown_seconds' => 'yes',
				],
			]
		);

		$this->add_control(
			'bddex_countdown_separator_heading',
			[
				'label' => esc_html__( 'Countdown Separator', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'bddex_countdown_separator',
			[
				'label' => esc_html__( 'Display Separator', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'bddex-countdown-show-separator',
				'default' => '',
			]
		);

		$this->add_control(
			'bddex_countdown_separator_color',
			[
				'label' => esc_html__( 'Separator Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'bddex_countdown_separator' => 'bddex-countdown-show-separator',
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-digits::after' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_countdown_separator_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .bddex-countdown-digits::after',
				'condition' => [
					'bddex_countdown_separator' => 'bddex-countdown-show-separator',
				],
			]
		);


		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'bddex_section_countdown_styles_general',
			[
				'label' => esc_html__( 'Countdown Styles', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		
		$this->add_control(
			'bddex_countdown_background',
			[
				'label' => esc_html__( 'Box Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-item > div' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'bddex_countdown_spacing',
			[
				'label' => esc_html__( 'Space Between Boxes', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 15,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-item > div' => 'margin-right:{{SIZE}}px; margin-left:{{SIZE}}px;',
					'{{WRAPPER}} .bddex-countdown-container' => 'margin-right: -{{SIZE}}px; margin-left: -{{SIZE}}px;',
				],
				'condition' => [
					'bddex_section_countdown_style' => ['style-1', 'style-3']
				]
			]
		);
		
		$this->add_responsive_control(
			'bddex_countdown_container_margin_bottom',
			[
				'label' => esc_html__( 'Space Below Container', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-container' => 'margin-bottom:{{SIZE}}px;',
				],
			]
		);
		
		$this->add_responsive_control(
			'bddex_countdown_box_padding',
			[
				'label' => esc_html__( 'Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-item > div' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bddex_countdown_box_border',
				'label' => esc_html__( 'Border', 'avas-core' ),
				'selector' => '{{WRAPPER}} .bddex-countdown-item > div',
			]
		);

		$this->add_control(
			'bddex_countdown_box_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-item > div' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
			]
		);
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'bddex_section_countdown_styles_content',
			[
				'label' => esc_html__( 'Color &amp; Typography', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'bddex_countdown_digits_heading',
			[
				'label' => esc_html__( 'Countdown Digits', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'bddex_countdown_digits_color',
			[
				'label' => esc_html__( 'Digits Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fec503',
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-digits' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_countdown_digit_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .bddex-countdown-digits',
			]
		);

		$this->add_control(
			'bddex_countdown_label_heading',
			[
				'label' => esc_html__( 'Countdown Labels', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'bddex_countdown_label_color',
			[
				'label' => esc_html__( 'Label Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-label' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_countdown_label_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .bddex-countdown-label',
			]
		);		


		$this->end_controls_section();


		
		$this->start_controls_section(
			'bddex_section_countdown_styles_individual',
			[
				'label' => esc_html__( 'Individual Box Styling', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'bddex_countdown_days_label_heading',
			[
				'label' => esc_html__( 'Days', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'bddex_countdown_days_background_color',
			[
				'label' => esc_html__( 'Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-item > div.bddex-countdown-days' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_countdown_days_digit_color',
			[
				'label' => esc_html__( 'Digit Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-days .bddex-countdown-digits' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_countdown_days_label_color',
			[
				'label' => esc_html__( 'Label Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-days .bddex-countdown-label' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_countdown_days_border_color',
			[
				'label' => esc_html__( 'Border Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-item > div.bddex-countdown-days' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_countdown_hours_label_heading',
			[
				'label' => esc_html__( 'Hours', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'bddex_countdown_hours_background_color',
			[
				'label' => esc_html__( 'Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-item > div.bddex-countdown-hours' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_countdown_hours_digit_color',
			[
				'label' => esc_html__( 'Digit Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-hours .bddex-countdown-digits' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_countdown_hours_label_color',
			[
				'label' => esc_html__( 'Label Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-hours .bddex-countdown-label' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_countdown_hours_border_color',
			[
				'label' => esc_html__( 'Border Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-item > div.bddex-countdown-hours' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_countdown_minutes_label_heading',
			[
				'label' => esc_html__( 'Minutes', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'bddex_countdown_minutes_background_color',
			[
				'label' => esc_html__( 'Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-item > div.bddex-countdown-minutes' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_countdown_minutes_digit_color',
			[
				'label' => esc_html__( 'Digit Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-minutes .bddex-countdown-digits' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_countdown_minutes_label_color',
			[
				'label' => esc_html__( 'Label Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-minutes .bddex-countdown-label' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_countdown_minutes_border_color',
			[
				'label' => esc_html__( 'Border Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-item > div.bddex-countdown-minutes' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_countdown_seconds_label_heading',
			[
				'label' => esc_html__( 'Seconds', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'bddex_countdown_seconds_background_color',
			[
				'label' => esc_html__( 'Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-item > div.bddex-countdown-seconds' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_countdown_seconds_digit_color',
			[
				'label' => esc_html__( 'Digit Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-seconds .bddex-countdown-digits' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_countdown_seconds_label_color',
			[
				'label' => esc_html__( 'Label Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-seconds .bddex-countdown-label' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_countdown_seconds_border_color',
			[
				'label' => esc_html__( 'Border Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-countdown-item > div.bddex-countdown-seconds' => 'border-color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_section();
		

	}


	protected function render( ) {
		
      $settings = $this->get_settings();
		
		$get_due_date =  esc_attr($settings['bddex_countdown_due_time']);
		$due_date = date("M d Y G:i:s", strtotime($get_due_date));
		if( 'style-1' === $settings['bddex_section_countdown_style'] ) {
			$bddex_countdown_style = 'style-1';
		}elseif( 'style-2' === $settings['bddex_section_countdown_style'] ) {
			$bddex_countdown_style = 'style-2';
		}elseif( 'style-3' === $settings['bddex_section_countdown_style'] ) {
			$bddex_countdown_style = 'style-3';
		}
	
	?>

	<div class="bddex-countdown-wrapper">
		<div class="bddex-countdown-container <?php echo esc_attr($settings['bddex_countdown_label_view'] ); ?> <?php echo esc_attr($settings['bddex_countdown_separator'] ); ?>">
			<ul id="bddex-countdown-<?php echo esc_attr($this->get_id()); ?>" class="bddex-countdown-items <?php echo esc_attr( $bddex_countdown_style ); ?>" data-date="<?php echo esc_attr($due_date) ; ?>">
			    <?php if ( ! empty( $settings['bddex_countdown_days'] ) ) : ?><li class="bddex-countdown-item"><div class="bddex-countdown-days"><span data-days class="bddex-countdown-digits">00</span><?php if ( ! empty( $settings['bddex_countdown_days_label'] ) ) : ?><span class="bddex-countdown-label"><?php echo esc_attr($settings['bddex_countdown_days_label'] ); ?></span><?php endif; ?></div></li><?php endif; ?>
			    <?php if ( ! empty( $settings['bddex_countdown_hours'] ) ) : ?><li class="bddex-countdown-item"><div class="bddex-countdown-hours"><span data-hours class="bddex-countdown-digits">00</span><?php if ( ! empty( $settings['bddex_countdown_hours_label'] ) ) : ?><span class="bddex-countdown-label"><?php echo esc_attr($settings['bddex_countdown_hours_label'] ); ?></span><?php endif; ?></div></li><?php endif; ?>
			   <?php if ( ! empty( $settings['bddex_countdown_minutes'] ) ) : ?><li class="bddex-countdown-item"><div class="bddex-countdown-minutes"><span data-minutes class="bddex-countdown-digits">00</span><?php if ( ! empty( $settings['bddex_countdown_minutes_label'] ) ) : ?><span class="bddex-countdown-label"><?php echo esc_attr($settings['bddex_countdown_minutes_label'] ); ?></span><?php endif; ?></div></li><?php endif; ?>
			   <?php if ( ! empty( $settings['bddex_countdown_seconds'] ) ) : ?><li class="bddex-countdown-item"><div class="bddex-countdown-seconds"><span data-seconds class="bddex-countdown-digits">00</span><?php if ( ! empty( $settings['bddex_countdown_seconds_label'] ) ) : ?><span class="bddex-countdown-label"><?php echo esc_attr($settings['bddex_countdown_seconds_label'] ); ?></span><?php endif; ?></div></li><?php endif; ?>
			</ul>
			<div class="clearfix"></div>
		</div>
	</div>


	<script type="text/javascript">
	jQuery(document).ready(function($) {
		'use strict';
		$("#bddex-countdown-<?php echo esc_attr($this->get_id()); ?>").countdown();
	});
	</script>
	
	<?php
	
	}

	protected function content_template() {
		
		?>
		
	
		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_bddex_Countdown() );