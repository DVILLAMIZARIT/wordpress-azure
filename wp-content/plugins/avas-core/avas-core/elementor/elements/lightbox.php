<?php
namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


class Widget_bddex_Lightbox extends Widget_Base {
	

	public function get_name() {
		return 'bddex-lightbox';
	}

	public function get_title() {
		return esc_html__( 'Avas Popupp &amp; Modal', 'avas-core' );
	}

	public function get_icon() {
		return 'fa fa-eye';
	}

   public function get_categories() {
		return [ 'bddex' ];
	}


	protected function _register_controls() {

		// Content Controls
  		$this->start_controls_section(
  			'bddex_section_ligthbox_content',
  			[
  				'label' => esc_html__( 'Lightbox/Modal Content', 'avas-core' )
  			]
  		);

		$this->add_control(
			'bddex_lightbox_type',
			[
				'label' => esc_html__( 'Lightbox Type', 'avas-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'lightbox_type_image',
				'options' => [
					'lightbox_type_image' => esc_html__( 'Image', 'avas-core' ),
					'lightbox_type_content' => esc_html__( 'HTML Content', 'avas-core' ),
					'lightbox_type_url' => esc_html__( 'External URL (Page/Video/Map)', 'avas-core' ),
				],
			]
		);
		

		$this->add_control(
			'bddex_lightbox_type_image',
			[
				'label' => __( 'Choose Lightbox Image', 'avas-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'bddex_lightbox_type' => 'lightbox_type_image',
				],
			]
		);

		$this->add_control(
		  'bddex_lightbox_type_content',
		  [
		     'label'   => __( 'Add your content here (HTML/Shortcode)', 'avas-core' ),
		     'type'    => Controls_Manager::WYSIWYG,
		     'default' => __( 'Add your popup content here', 'avas-core' ),
			 'condition' => [
				'bddex_lightbox_type' => 'lightbox_type_content',
			 ],
		  ]
		);

		$this->add_control(
			'bddex_lightbox_type_url',
			[
				'label' => __( 'Provide Page/Video/Map URL', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'https://x-theme.com/avas/',
				'placeholder' => __( 'Place Page/Video/Map URL', 'avas-core' ),
				'title' => __( 'Place Page/Video/Map URL', 'avas-core' ),
				'condition' => [
					'bddex_lightbox_type' => 'lightbox_type_url',
				],
			]
		);


		$this->end_controls_section();


		// Settings Controls
  		$this->start_controls_section(
  			'bddex_section_ligthbox_settings',
  			[
  				'label' => esc_html__( 'Lightbox/Modal Settings', 'avas-core' )
  			]
  		);

		$this->add_control(
			'bddex_lightbox_trigger_type',
			[
				'label' => esc_html__( 'Trigger Lightbox on', 'avas-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'bddex_lightbox_trigger_button',
				'options' => [
					'bddex_lightbox_trigger_button' => esc_html__( 'Button Click', 'avas-core' ),
					'bddex_lightbox_trigger_external' => esc_html__( 'External Element', 'avas-core' ),
					'bddex_lightbox_trigger_pageload' => esc_html__( 'Page Load', 'avas-core' ),
				],
			]
		);
		

		$this->add_control(
			'bddex_lightbox_trigger_external',
			[
				'label' => __( 'Element Identifier', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '#open-popup',
				'placeholder' => __( '#open-popup', 'avas-core' ),
				'title' => __( '#open-popup', 'avas-core' ),
				'condition' => [
					'bddex_lightbox_trigger_type' => 'bddex_lightbox_trigger_external',
				],
			]
		);

		$this->add_control(
			'bddex_lightbox_trigger_pageload',
			[
				'label' => esc_html__( 'Delay (Seconds)', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 1,
		        ],
				'range' => [
					'ms' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'condition' => [
					'bddex_lightbox_trigger_type' => 'bddex_lightbox_trigger_pageload',
				],
			]
		);

		// generate button for modal

		$this->add_control(
			'bddex_lightbox_open_btn',
			[
				'label' => esc_html__( 'Button Text', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Open Popup', 'avas-core' ),
				'description' => esc_html__( 'Open modal with this button', 'avas-core' ),
				'separator' => 'before',
				'condition' => [
					'bddex_lightbox_trigger_type' => 'bddex_lightbox_trigger_button',
				],
			]
		);
		
		$this->add_control(
			'bddex_lightbox_open_btn_icon',
			[
				'label' => esc_html__( 'Icon', 'avas-core' ),
				'type' => Controls_Manager::ICON,
				'condition' => [
					'bddex_lightbox_trigger_type' => 'bddex_lightbox_trigger_button',
				],
			]
		);

		$this->add_control(
			'bddex_lightbox_open_btn_icon_align',
			[
				'label' => esc_html__( 'Icon Position', 'avas-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => esc_html__( 'Before', 'avas-core' ),
					'right' => esc_html__( 'After', 'avas-core' ),
				],
				'condition' => [
					'bddex_lightbox_open_btn_icon!' => '',
					'bddex_lightbox_trigger_type' => 'bddex_lightbox_trigger_button',
				],
			]
		);

		$this->add_control(
			'bddex_lightbox_open_btn_icon_indent',
			[
				'label' => esc_html__( 'Icon Spacing', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'condition' => [
					'bddex_lightbox_open_btn_icon!' => '',
					'bddex_lightbox_trigger_type' => 'bddex_lightbox_trigger_button',
				],
				'selectors' => [
					'{{WRAPPER}} .open-pop-up-button-icon-right' => 'margin-left: {{SIZE}}px;',
					'{{WRAPPER}} .open-pop-up-button-icon-left' => 'margin-right: {{SIZE}}px;',
				],
			]
		);
		
		
		
		$this->add_responsive_control(
			'bddex_lightbox_open_btn_alignment',
			[
				'label' => esc_html__( 'Alignment', 'avas-core' ),
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
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .bddex-lightbox-btn' => 'text-align: {{VALUE}}',
				],
				'condition' => [
					'bddex_lightbox_trigger_type' => 'bddex_lightbox_trigger_button',
				],
			]
		);
		
		
		$this->add_control(
			'bddex_lightbox_open_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-lightbox-open-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'bddex_lightbox_trigger_type' => 'bddex_lightbox_trigger_button',
				],
			]
		);
		
		$this->add_control(
			'bddex_lightbox_open_btn_border_radius',
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
					'{{WRAPPER}} .bddex-lightbox-open-btn' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'bddex_lightbox_trigger_type' => 'bddex_lightbox_trigger_button',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_lightbox_open_btn_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bddex-lightbox-open-btn',
				'condition' => [
					'bddex_lightbox_trigger_type' => 'bddex_lightbox_trigger_button',
				],
			]
		);
		
		$this->start_controls_tabs( 'bddex_lightbox_open_btn_content_tabs' );

		$this->start_controls_tab( 'normal_default_content', [ 'label' => esc_html__( 'Normal', 'avas-core' ), 'condition' => [
					'bddex_lightbox_trigger_type' => 'bddex_lightbox_trigger_button',
				], ] );

		$this->add_control(
			'bddex_lightbox_open_btn_text_color',
			[
				'label' => esc_html__( 'Text Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .bddex-lightbox-open-btn' => 'color: {{VALUE}};',
				],
				'condition' => [
					'bddex_lightbox_trigger_type' => 'bddex_lightbox_trigger_button',
				],
			]
		);
		

		
		$this->add_control(
			'bddex_lightbox_open_btn_background_color',
			[
				'label' => esc_html__( 'Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .bddex-lightbox-open-btn' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'bddex_lightbox_trigger_type' => 'bddex_lightbox_trigger_button',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bddex_lightbox_open_btn_border',
				'selector' => '{{WRAPPER}} .bddex-lightbox-open-btn',
				'condition' => [
					'bddex_lightbox_trigger_type' => 'bddex_lightbox_trigger_button',
				],
			]
		);

		
		$this->end_controls_tab();

		$this->start_controls_tab( 'bddex_lightbox-open_btn_hover', 
			[ 
				'label' => esc_html__( 'Hover', 'avas-core' ), 'condition' => [
				'bddex_lightbox_trigger_type' => 'bddex_lightbox_trigger_button',
				], 
			] 
		);

		$this->add_control(
			'bddex_lightbox-open_btn_hover_text_color',
			[
				'label' => esc_html__( 'Text Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .bddex-lightbox-open-btn:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'bddex_lightbox_trigger_type' => 'bddex_lightbox_trigger_button',
				],
			]
		);

		$this->add_control(
			'bddex_lightbox-open_btn_hover_background_color',
			[
				'label' => esc_html__( 'Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#272727',
				'selectors' => [
					'{{WRAPPER}} .bddex-lightbox-open-btn:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'bddex_lightbox_trigger_type' => 'bddex_lightbox_trigger_button',
				],
			]
		);

		$this->add_control(
			'bddex_lightbox-open_btn_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bddex-lightbox-open-btn:hover' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'bddex_lightbox_trigger_type' => 'bddex_lightbox_trigger_button',
				],
			]
		);
		// generate button end

		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'bddex_section_lightbox_styles',
			[
				'label' => esc_html__( 'Lightbox Container Styles', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'bddex_lightbox_container_bg',
			[
				'label' => esc_html__( 'Container Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .bddex-lightbox-container' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_lightbox_container_width',
			[
				'label' => esc_html__( 'Set max width for the container?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'yes', 'avas-core' ),
				'label_off' => __( 'no', 'avas-core' ),
				'default' => 'yes',
			]
		);

		$this->add_responsive_control(
			'bddex_lightbox_container_width_value',
		    [
		        'label' => __( 'Lightbox Container max width', 'avas-core' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 650,
		        ],
		        'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 1000,
		                'step' => 5,
		            ],
		            '%' => [
		                'min' => 0,
		                'max' => 100,
		            ],
		        ],
		        'size_units' => [ 'px', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .bddex-lightbox-container' => 'max-width: {{SIZE}}{{UNIT}};',
		        ],
				'condition' => [
					'bddex_lightbox_container_width' => 'yes',
				],
		    ]
		);

		$this->add_control(
			'bddex_lightbox_container_padding',
			[
				'label' => esc_html__( 'Lightbox Container Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-lightbox-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'bddex_lightbox_container_border_radius',
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
					'{{WRAPPER}} .bddex-img-comp-container' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'bddex_lightbox_container_overlay',
			[
				'label' => esc_html__( 'Enable dark overlay?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'yes', 'avas-core' ),
				'label_off' => __( 'no', 'avas-core' ),
				'default' => 'yes',
			]
		);

		$this->add_control(
			'bddex_lightbox_container_overlay_color',
			[
				'label' => esc_html__( 'Overlay Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0, 0, 0, 0.75)',
				'selectors' => [
					'{{WRAPPER}} .bddex-lightbox-popup' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'bddex_lightbox_container_overlay' => 'yes',
				],
			]
		);

		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'bddex_section_lightbox_closebtn_styles',
			[
				'label' => esc_html__( 'Close Button Styles', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		
		$this->add_control(
			'bddex_lightbox_closebtn_color',
			[
				'label' => esc_html__( 'Close Button Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#a9a9a9',
				'selectors' => [
					'{{WRAPPER}} .bddex-lightbox-close' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_lightbox_closebtn_bg',
			[
				'label' => esc_html__( 'Close Button Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-lightbox-close' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		
		$this->end_controls_section();
		
		
	}


	protected function render( ) {
		
		
		$settings = $this->get_settings();
		
		$delay = $this->get_settings( 'bddex_lightbox_trigger_pageload' ); 

		$container_max_width = $this->get_settings( 'bddex_lightbox_container_width_value' ); 

		$container_padding = $this->get_settings( 'bddex_lightbox_container_padding' ); 

		$container_border_radius = $this->get_settings( 'bddex_lightbox_container_border_radius' ); 

		$popup_image = $this->get_settings( 'bddex_lightbox_type_image' );

		if ( ($settings['bddex_lightbox_container_overlay']) == 'yes' ) : 

			$enable_overlay = 'enabled';

		else: 

			$enable_overlay = 'disabled';

		endif; ?>

<?php
$popup_template = '<div id="popup-'.esc_attr($this->get_id()).'" class="bddex-lightbox-popup lity overlay-'.esc_js($enable_overlay).'" role="dialog" aria-label="Dialog Window (Press escape to close)" tabindex="-1"><div class="lity-wrap" data-lity-close role="document"><div class="lity-loader" aria-hidden="true">Loading...</div><div class="lity-container"><div class="lity-content"></div><button class="lity-close bddex-lightbox-close" style="background-color: '.esc_attr($settings['bddex_lightbox_closebtn_bg'] ).'; color: '.esc_attr($settings['bddex_lightbox_closebtn_color'] ).'" type="button" aria-label="Close (Press escape to close)" data-lity-close>&times;</button></div></div></div>';

?>

	<?php if ( ($settings['bddex_lightbox_trigger_type']) == 'bddex_lightbox_trigger_button' ) : ?>
		<div class="bddex-lightbox-btn">
		<a href="#" id="btn-bddex-lightbox-<?php echo esc_attr($this->get_id()); ?>" class="bddex-lightbox-open-btn bddex-lightbox-open-button">
			<?php if ( ! empty( $settings['bddex_lightbox_open_btn_icon'] ) && $settings['bddex_lightbox_open_btn_icon_align'] == 'left' ) : ?>
				<i class="<?php echo esc_attr($settings['bddex_lightbox_open_btn_icon'] ); ?> open-pop-up-button-icon-left" aria-hidden="true"></i> 
			<?php endif; ?>
			<?php echo esc_attr($settings['bddex_lightbox_open_btn'] ); ?>
			<?php if ( ! empty( $settings['bddex_lightbox_open_btn_icon'] ) && $settings['bddex_lightbox_open_btn_icon_align'] == 'right' ) : ?>
				<i class="<?php echo esc_attr($settings['bddex_lightbox_open_btn_icon'] ); ?> open-pop-up-button-icon-right" aria-hidden="true"></i> 
			<?php endif; ?>
		</a>
		</div><!-- close .bddex-lightbox-btn -->
	<?php endif; ?>

	<?php if ( ($settings['bddex_lightbox_type']) == 'lightbox_type_image' ) : ?>

	<div id="popup-content-<?php echo esc_attr($this->get_id()); ?>" class="lity-hide">
	  <div class="bddex-lightbox-container" style="background-color: <?php echo esc_attr($settings['bddex_lightbox_container_bg'] ); ?>; max-width: <?php echo $container_max_width['size'] . $container_max_width['unit'] ?>; padding: <?php echo $container_padding['top'] . $container_padding['unit'] .' '.  $container_padding['right'] . $container_padding['unit'] .' '.  $container_padding['bottom'] . $container_padding['unit'] .' '.  $container_padding['left'] . $container_padding['unit'] ?>; border-radius: <?php echo $container_border_radius['size'] . $container_border_radius['unit'] ?>">
	    <div class="bddex-lightbox-content">
	      <img src="<?php echo $popup_image['url'] ?>">
	    </div>
	  </div>
	</div>

	<?php elseif ( ($settings['bddex_lightbox_type']) == 'lightbox_type_content' ) : ?>

	<div id="popup-content-<?php echo esc_attr($this->get_id()); ?>" class="lity-hide">
	  <div class="bddex-lightbox-container" style="background-color: <?php echo esc_attr($settings['bddex_lightbox_container_bg'] ); ?>; max-width: <?php echo $container_max_width['size'] . $container_max_width['unit'] ?>; padding: <?php echo $container_padding['top'] . $container_padding['unit'] .' '.  $container_padding['right'] . $container_padding['unit'] .' '.  $container_padding['bottom'] . $container_padding['unit'] .' '.  $container_padding['left'] . $container_padding['unit'] ?>; border-radius: <?php echo $container_border_radius['size'] . $container_border_radius['unit'] ?>">
	    <div class="bddex-lightbox-content">
	        <?php echo $settings['bddex_lightbox_type_content']; ?>
	    </div>
	  </div>
	</div>

	<?php else: ?>

	<div id="popup-content-<?php echo esc_attr($this->get_id()); ?>" class="lity-hide">
	  <div class="bddex-lightbox-container" style="background-color: <?php echo esc_attr($settings['bddex_lightbox_container_bg'] ); ?>; max-width: <?php echo $container_max_width['size'] . $container_max_width['unit'] ?>; padding: <?php echo $container_padding['top'] . $container_padding['unit'] .' '.  $container_padding['right'] . $container_padding['unit'] .' '.  $container_padding['bottom'] . $container_padding['unit'] .' '.  $container_padding['left'] . $container_padding['unit'] ?>; border-radius: <?php echo $container_border_radius['size'] . $container_border_radius['unit'] ?>">
	    <div class="bddex-lightbox-content">
	      <div class="bddex-iframe-container">      
	        <iframe allowfullscreen="" src="<?php echo esc_attr($settings['bddex_lightbox_type_url'] ); ?>" frameborder="0"></iframe>
	      </div>
	    </div>
	  </div>
	</div>


	<?php endif; ?>

<script>
  jQuery(document).ready(function($) {
    var lightbox = null;
    
<?php if ( ($settings['bddex_lightbox_trigger_type']) == 'bddex_lightbox_trigger_button' ) : ?>

    <?php if ( ($settings['bddex_lightbox_type']) == 'lightbox_type_url' ) : ?>

        $("#btn-bddex-lightbox-<?php echo esc_attr($this->get_id()); ?>").click(function(e){
          e.preventDefault();
          lightbox = lity("<?php echo esc_attr($settings['bddex_lightbox_type_url'] ); ?>", { template: '<?php echo $popup_template; ?>' });
        });

    <?php else: ?>
        $("#btn-bddex-lightbox-<?php echo esc_attr($this->get_id()); ?>").click(function(e){
          e.preventDefault();
          lightbox = lity("#popup-content-<?php echo esc_attr($this->get_id()); ?>", { template: '<?php echo $popup_template; ?>' });
        });

    <?php endif; ?>

<?php elseif ( ($settings['bddex_lightbox_trigger_type']) == 'bddex_lightbox_trigger_external' ) : ?>

    <?php if ( ($settings['bddex_lightbox_type']) == 'lightbox_type_url' ) : ?>

        $("<?php echo esc_attr($settings['bddex_lightbox_trigger_external'] ); ?>").click(function(e) {
          e.preventDefault();
          lightbox = lity("<?php echo esc_attr($settings['bddex_lightbox_type_url'] ); ?>", { template: '<?php echo $popup_template; ?>' });
        });

    <?php else: ?>
        $("<?php echo esc_attr($settings['bddex_lightbox_trigger_external'] ); ?>").click(function(e) {
          e.preventDefault();
          lightbox = lity("#popup-content-<?php echo esc_attr($this->get_id()); ?>", { template: '<?php echo $popup_template; ?>' });
        });
    <?php endif; ?>


<?php else: ?>

    <?php if ( ($settings['bddex_lightbox_type']) == 'lightbox_type_url' ) : ?>

        setTimeout(function() {
          lightbox = lity("<?php echo esc_attr($settings['bddex_lightbox_type_url'] ); ?>", { template: '<?php echo $popup_template; ?>' });
        }, <?php echo floatVal($delay['size']) * 1000; ?>);

    <?php else: ?>

        setTimeout(function() {
          lightbox = lity("#popup-content-<?php echo esc_attr($this->get_id()); ?>", { template: '<?php echo $popup_template; ?>' });
        }, <?php echo floatVal($delay['size']) * 1000; ?>);
    <?php endif; ?>


<?php endif; ?>
    
  });
</script>

<style type="text/css">

<?php echo '#popup-'.esc_attr($this->get_id()); ?> {
  background-color: <?php echo esc_attr($settings['bddex_lightbox_container_overlay_color'] ); ?>;
}
<?php echo '#popup-'.esc_attr($this->get_id()).'.overlay-disabled'; ?>  {
  background-color: transparent;
}

<?php echo '#popup-'.esc_attr($this->get_id()); ?>.lity-iframe .lity-container  {
  background-color: <?php echo esc_attr($settings['bddex_lightbox_container_bg'] ); ?>; 
  max-width: <?php echo $container_max_width['size'] . $container_max_width['unit'] ?>; 
  padding: <?php echo $container_padding['top'] . $container_padding['unit'] .' '.  $container_padding['right'] . $container_padding['unit'] .' '.  $container_padding['bottom'] . $container_padding['unit'] .' '.  $container_padding['left'] . $container_padding['unit'] ?>; 
  border-radius: <?php echo $container_border_radius['size'] . $container_border_radius['unit'] ?>
}

</style>

	
	<?php
	
	}

	protected function content_template() {
		
		?>
		
	
		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_bddex_Lightbox() );