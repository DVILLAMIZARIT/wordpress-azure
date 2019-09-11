<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_bddex_Fancy_Text extends Widget_Base {

	public function get_name() {
		return 'bddex-fancy-text';
	}

	public function get_title() {
		return esc_html__( 'Avas Fancy Text', 'avas-core' );
	}

	public function get_icon() {
		return 'eicon-animation-text';
	}

   public function get_categories() {
		return [ 'bddex' ];
	}


	protected function _register_controls() {

		// Content Controls
  		$this->start_controls_section(
  			'bddex_fancy_text_content',
  			[
  				'label' => esc_html__( 'Fancy Text', 'avas-core' )
  			]
  		);

		
		$this->add_control(
			'bddex_fancy_text_prefix',
			[	
				'label' => esc_html__( 'Prefix Text', 'avas-core' ),
				'placeholder' => esc_html__( 'Place your prefix text', 'avas-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'This is the ', 'avas-core' ),
			]
		);

		$this->add_control(
			'bddex_fancy_text_strings',
			[
				'label' => esc_html__( 'Fancy Text Strings', 'avas-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'bddex_fancy_text_strings_text_field' => esc_html__( 'first string', 'avas-core' ),
					],
					[
						'bddex_fancy_text_strings_text_field' => esc_html__( 'second string', 'avas-core' ),
					],
					[
						'bddex_fancy_text_strings_text_field' => esc_html__( 'third string', 'avas-core' ),
					],
				],
				'fields' => [
					[
						'name' => 'bddex_fancy_text_strings_text_field',
						'label' => esc_html__( 'Fancy String', 'avas-core' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
					],
				],
			//	'title_field' => '{{{ bddex_fancy_text_strings_text_field }}}',
			]
		);


		$this->add_control(
			'bddex_fancy_text_suffix',
			[
				'label' => esc_html__( 'Suffix Text', 'avas-core' ),
				'placeholder' => esc_html__( 'Place your suffix text', 'avas-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( ' of the sentence.', 'avas-core' ),
			]
		);
		
		

		$this->end_controls_section();
		
		// Settings Control
  		$this->start_controls_section(
  			'bddex_fancy_text_settings',
  			[
  				'label' => esc_html__( 'Fancy Text Settings', 'avas-core' )
  			]
  		);

  		$this->add_control(
			'bddex_fancy_text_style',
			[
				'label' => esc_html__( 'Style Type', 'avas-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => [
					'style-1' => esc_html__( 'Style 1', 'avas-core' ),
					'style-2' => esc_html__( 'Style 2', 'avas-core' ),
				],
			]
		);
		
		$this->add_responsive_control(
			'bddex_fancy_text_alignment',
			[
				'label' => esc_html__( 'Alignment', 'avas-core' ),
				'type' => Controls_Manager::CHOOSE,
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
					'{{WRAPPER}} .bddex-fancy-text-container' => 'text-align: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'bddex_fancy_text_transition_type',
			[
				'label' => esc_html__( 'Animation Type', 'avas-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'typing',
				'options' => [
					'typing' => esc_html__( 'Typing', 'avas-core' ),
					'fadeIn' => esc_html__( 'Fade', 'avas-core' ),
					'fadeInUp' => esc_html__( 'Fade Up', 'avas-core' ),
					'fadeInDown' => esc_html__( 'Fade Down', 'avas-core' ),
					'fadeInLeft' => esc_html__( 'Fade Left', 'avas-core' ),
					'fadeInRight' => esc_html__( 'Fade Right', 'avas-core' ),
					'zoomIn' => esc_html__( 'Zoom', 'avas-core' ),
					'bounceIn' => esc_html__( 'Bounce', 'avas-core' ),
					'swing' => esc_html__( 'Swing', 'avas-core' ),
				],
			]
		);
		

		$this->add_control(
			'bddex_fancy_text_speed',
			[
				'label' => esc_html__( 'Typing Speed', 'avas-core' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '50',
				'condition' => [
					'bddex_fancy_text_transition_type' => 'typing',
				],
			]
		);
		
		$this->add_control(
			'bddex_fancy_text_delay',
			[
				'label' => esc_html__( 'Delay on Change', 'avas-core' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '2500'
			]
		);
		
		$this->add_control(
			'bddex_fancy_text_loop',
			[
				'label' => esc_html__( 'Loop the Typing', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'bddex_fancy_text_transition_type' => 'typing',
				],
			]
		);
		
		$this->add_control(
			'bddex_fancy_text_cursor',
			[
				'label' => esc_html__( 'Display Type Cursor', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'bddex_fancy_text_transition_type' => 'typing',
				],
			]
		);
		
		
		$this->end_controls_section();
		
	
		
		$this->start_controls_section(
			'bddex_fancy_text_prefix_styles',
			[
				'label' => esc_html__( 'Prefix Text Styles', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		
		$this->add_control(
			'bddex_fancy_text_prefix_color',
			[
				'label' => esc_html__( 'Prefix Text Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bddex-fancy-text-prefix' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bddex-fancy-text-prefix',
			]
		);
		
		
		$this->end_controls_section();
		
		
		
		$this->start_controls_section(
			'bddex_fancy_text_strings_styles',
			[
				'label' => esc_html__( 'Fancy Text Styles', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		
		$this->add_control(
			'bddex_fancy_text_strings_color',
			[
				'label' => esc_html__( 'Fancy Text Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bddex-fancy-text-strings' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            'name' => 'bddex_fancy_text_strings_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bddex-fancy-text-strings, {{WRAPPER}} .typed-cursor',
			]
		);
		
		$this->add_control(
			'bddex_fancy_text_strings_background_color',
			[
				'label' => esc_html__( 'Background', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-fancy-text-strings' => 'background: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'bddex_fancy_text_cursor_color',
			[
				'label' => esc_html__( 'Typing Cursor Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .typed-cursor' => 'color: {{VALUE}};',
				],
				'condition' => [
					'bddex_fancy_text_cursor' => 'yes',
				],
			]
		);
		
		$this->add_responsive_control(
			'bddex_fancy_text_strings_padding',
			[
				'label' => esc_html__( 'Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-fancy-text-strings' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'bddex_fancy_text_strings_margin',
			[
				'label' => esc_html__( 'Margin', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-fancy-text-strings' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bddex_fancy_text_strings_border',
				'selector' => '{{WRAPPER}} .bddex-fancy-text-strings',
			]
		);
		
		
		$this->add_control(
			'bddex_fancy_text_strings_border_radius',
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
					'{{WRAPPER}} .bddex-fancy-text-strings' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		
		$this->end_controls_section();
		
		
		
		$this->start_controls_section(
			'bddex_fancy_text_suffix_styles',
			[
				'label' => esc_html__( 'Suffix Text Styles', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		
		$this->add_control(
			'bddex_fancy_text_suffix_color',
			[
				'label' => esc_html__( 'Suffix Text Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bddex-fancy-text-suffix' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'ending_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bddex-fancy-text-suffix',
			]
		);
		
		
		$this->end_controls_section();
		
	}


	protected function render( ) {
		
		
      $settings = $this->get_settings();
		
      if( 'style-1' === $settings['bddex_fancy_text_style'] ) {
      	$bddex_fancy_text_style = 'style-1';
      }elseif( 'style-2' === $settings['bddex_fancy_text_style'] ) {
      	$bddex_fancy_text_style = 'style-2';
      }
	?>

	<div class="bddex-fancy-text-container <?php echo esc_attr( $bddex_fancy_text_style ); ?>">			
			<?php if ( ! empty( $settings['bddex_fancy_text_prefix'] ) ) : ?><span class="bddex-fancy-text-prefix"><?php echo wp_kses(($settings['bddex_fancy_text_prefix'] ), true ); ?> </span><?php endif; ?>
			
			<?php if ( $settings['bddex_fancy_text_transition_type']  == 'fancy' ) : ?>
			<span id="bddex-fancy-text-<?php echo esc_attr($this->get_id()); ?>" class="bddex-fancy-text-strings"></span>
			<?php endif; ?>
			
			<?php if ( $settings['bddex_fancy_text_transition_type']  != 'fancy' ) : ?>
			<span id="bddex-fancy-text-<?php echo esc_attr($this->get_id()); ?>" class="bddex-fancy-text-strings"><?php 
				$bddex_fancy_text_strings_list = "";
				foreach ( $settings['bddex_fancy_text_strings'] as $item ) {
				           $bddex_fancy_text_strings_list .=  $item['bddex_fancy_text_strings_text_field'] . ', '; 
				}
				echo rtrim($bddex_fancy_text_strings_list, ", "); ?></span>
			<?php endif; ?>
			
			<?php if ( ! empty( $settings['bddex_fancy_text_suffix'] ) ) : ?><span class="bddex-fancy-text-suffix"> <?php echo wp_kses(($settings['bddex_fancy_text_suffix'] ), true ); ?> </span><?php endif; ?>
	</div><!-- close .bddex-fancy-text-container -->
	
	<div class="clearfix"></div>
	
	<?php if ( $settings['bddex_fancy_text_transition_type']  == 'typing' ) : ?>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		'use strict';
		$("#bddex-fancy-text-<?php echo esc_attr($this->get_id()); ?>").typed({
		strings: [<?php foreach ( $settings['bddex_fancy_text_strings'] as $item ) : ?><?php if ( ! empty( $item['bddex_fancy_text_strings_text_field'] ) ) : ?>"<?php echo esc_attr($item['bddex_fancy_text_strings_text_field'] ); ?>",<?php endif; ?><?php endforeach; ?>],
			typeSpeed: <?php echo esc_attr($settings['bddex_fancy_text_speed'] ); ?>,
			backSpeed: 0,
			startDelay: 300,
			backDelay: <?php echo esc_attr($settings['bddex_fancy_text_delay'] ); ?>,
			showCursor: <?php if ( ! empty( $settings['bddex_fancy_text_cursor'] ) ) : ?>true<?php else: ?>false<?php endif; ?>,
			loop: <?php if ( ! empty( $settings['bddex_fancy_text_loop'] ) ) : ?>true<?php else: ?>false<?php endif; ?>,
		});
	});
	</script>
	<?php endif; ?>
	
	<?php if ( $settings['bddex_fancy_text_transition_type']  != 'typing' ) : ?>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			'use strict';
			$("#bddex-fancy-text-<?php echo esc_attr($this->get_id()); ?>").Morphext({
				animation: "<?php echo esc_attr($settings['bddex_fancy_text_transition_type'] ); ?>",
				separator: ",",
				speed: <?php echo esc_attr($settings['bddex_fancy_text_delay'] ); ?>,
				complete: function () {
				        // Overrides default empty function
				    }
			});
		});
		</script>
	<?php endif; ?>
	
	<?php
	
	}

	protected function content_template() {
		
		?>
		
	
		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_bddex_Fancy_Text() );