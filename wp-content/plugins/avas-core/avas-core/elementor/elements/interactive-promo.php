<?php
namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


class Widget_bddex_Interactive_Promo extends Widget_Base {
	

	public function get_name() {
		return 'bddex-interactive-promo';
	}

	public function get_title() {
		return esc_html__( 'Avas Interactive Promo', 'avas-core' );
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
  			'bddex_section_promo_content',
  			[
  				'label' => esc_html__( 'Promo Content', 'avas-core' )
  			]
  		);

		
		$this->add_control(
			'promo_image',
			[
				'label' => __( 'Promo Image', 'avas-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'promo_image_alt',
			[
				'label' => __( 'Image ALT Tag', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '',
				'placeholder' => __( 'Enter alter tag for the image', 'avas-core' ),
				'title' => __( 'Input image alter tag here', 'avas-core' ),
			]
		);

		$this->add_control(
			'promo_heading',
			[
				'label' => __( 'Promo Heading', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'I am Interactive',
				'placeholder' => __( 'Enter heading for the promo', 'avas-core' ),
				'title' => __( 'Enter heading for the promo', 'avas-core' ),
			]
		);

		$this->add_control(
		  'promo_content',
		  [
		     'label'   => __( 'Promo Content', 'avas-core' ),
		     'type'    => Controls_Manager::TEXTAREA,
		     'default' => __( 'Click to inspect, then edit as needed.', 'avas-core' ),
		  ]
		);


		$this->add_control(
			'promo_link_url',
			[
				'label' => __( 'Link URL', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '#',
				'placeholder' => __( 'Enter link URL for the promo', 'avas-core' ),
				'title' => __( 'Enter heading for the promo', 'avas-core' ),
			]
		);

		$this->add_control(
			'promo_link_target',
			[
				'label' => esc_html__( 'Open in new window?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( '_blank', 'avas-core' ),
				'label_off' => __( '_self', 'avas-core' ),
				'default' => '_self',
			]
		);

		$this->end_controls_section();
		


  		// Style Controls
		$this->start_controls_section(
			'bddex_section_promo_settings',
			[
				'label' => esc_html__( 'Promo Effects &amp; Settings', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'promo_effect',
			[
				'label' => esc_html__( 'Set Promo Effect', 'avas-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'effect-lily',
				'options' => [
					'effect-lily' 	=> esc_html__( 'Lily', 		'avas-core' ),
					'effect-sadie' 	=> esc_html__( 'Sadie', 	'avas-core' ),
					'effect-layla'	=> esc_html__( 'Layla', 	'avas-core' ),
					'effect-oscar' 	=> esc_html__( 'Oscar',		'avas-core' ),
					'effect-marley' => esc_html__( 'Marley',	'avas-core' ),
					'effect-ruby' 	=> esc_html__( 'Ruby', 	 	'avas-core' ),
					'effect-roxy'	=> esc_html__( 'Roxy', 		'avas-core' ),
					'effect-bubba'	=> esc_html__( 'Bubba', 	'avas-core' ),
					'effect-romeo' 	=> esc_html__( 'Romeo', 	'avas-core' ),
					'effect-sarah' 	=> esc_html__( 'Sarah', 	'avas-core' ),
					'effect-chico' 	=> esc_html__( 'Chico', 	'avas-core' ),
					'effect-milo' 	=> esc_html__( 'Milo', 		'avas-core' ),
					'effect-apollo' => esc_html__( 'Apolo', 	'avas-core' ),
					'effect-jazz' 	=> esc_html__( 'Jazz', 		'avas-core' ),
					'effect-ming' 	=> esc_html__( 'Ming', 		'avas-core' ),
				],
			]
		);

		$this->add_control(
			'promo_container_width',
			[
				'label' => esc_html__( 'Set max width for the container?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'yes', 'avas-core' ),
				'label_off' => __( 'no', 'avas-core' ),
				'default' => 'yes',
			]
		);

		$this->add_responsive_control(
			'promo_container_width_value',
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
					'{{WRAPPER}} .bddex-interactive-promo' => 'max-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'promo_container_width' => 'yes',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'promo_border',
				'selector' => '{{WRAPPER}} .bddex-interactive-promo',
			]
		);
		
		
		$this->add_control(
			'promo_border_radius',
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
					'{{WRAPPER}} .bddex-interactive-promo' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		
		$this->end_controls_section();	


		$this->start_controls_section(
			'bddex_section_promo_styles',
			[
				'label' => esc_html__( 'Colors &amp; Typography', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'promo_heading_color',
			[
				'label' => esc_html__( 'Promo Heading Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .bddex-interactive-promo figure figcaption h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_promo_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bddex-interactive-promo figure figcaption h2',
			]
		);

		$this->add_control(
			'promo_content_color',
			[
				'label' => esc_html__( 'Promo Content Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .bddex-interactive-promo figure p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_promo_content_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bddex-interactive-promo figure p',
			]
		);

		$this->add_control(
			'promo_overlay_color',
			[
				'label' => esc_html__( 'Promo Overlay Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#3085a3',
				'selectors' => [
					'{{WRAPPER}} .bddex-interactive-promo figure' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();		
		
		
	}


	protected function render( ) {
		
		
      $settings = $this->get_settings();
      $promo_image = $this->get_settings( 'promo_image' );
		

	?>


<div id="bddex-promo-<?php echo esc_attr($this->get_id()); ?>" class="bddex-interactive-promo">
	<figure class="<?php echo esc_attr($settings['promo_effect'] ); ?>">
		<?php echo '<img alt="'. $settings['promo_image_alt'] . '" src="' . $promo_image['url'] . '">'; ?>
		<figcaption>
			<div>
				<?php if ( ! empty( $settings['promo_heading'] ) ) : ?>
					<h2><?php echo esc_attr($settings['promo_heading'] ); ?></h2>
				<?php endif; ?>
				<p><?php echo $settings['promo_content']; ?></p>
			</div>
			<a href="<?php echo esc_attr($settings['promo_link_url'] ); ?>" target="<?php echo esc_attr($settings['promo_link_target'] ); ?>"></a>
		</figcaption>			
	</figure>
</div>

	
	<?php
	
	}

	protected function content_template() {
		
		?>
		
	
		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_bddex_Interactive_Promo() );