<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Dual Heading Widget
 */
class Bddex_Dual_Heading_Widget extends Widget_Base {
    
    /**
	 * Retrieve dual heading widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
    public function get_name() {
        return 'pp-dual-heading';
    }

    /**
	 * Retrieve dual heading widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
    public function get_title() {
        return esc_html__( 'Avas Dual Heading', 'avas-core' );
    }

    /**
	 * Retrieve the list of categories the dual heading widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
    public function get_categories() {
        return [ 'bddex' ];
    }

    /**
	 * Retrieve dual heading widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
    public function get_icon() {
        return 'fa fa-clone avas-admin-icon';
    }

    /**
	 * Register dual heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
    protected function _register_controls() {

        /*-----------------------------------------------------------------------------------*/
        /*	CONTENT TAB
        /*-----------------------------------------------------------------------------------*/
        
        /**
         * Content Tab: Dual Heading
         */
        $this->start_controls_section(
            'section_dual_heading',
            [
                'label'                 => esc_html__( 'Dual Heading', 'avas-core' ),
            ]
        );

        $this->add_control(
            'first_text',
            [
                'label'                 => esc_html__( 'First Part', 'avas-core' ),
                'type'                  => Controls_Manager::TEXTAREA,
                'label_block'           => true,
                'rows'                  => 3,
                'default'               => esc_html__( 'Our', 'avas-core' ),
            ]
        );
        
        $this->add_control(
            'second_text',
            [
                'label'                 => esc_html__( 'Second Part', 'avas-core' ),
                'type'                  => Controls_Manager::TEXTAREA,
                'label_block'           => true,
                'rows'                  => 3,
                'default'               => esc_html__( 'Services', 'avas-core' ),
            ]
        );

        $this->add_control(
            'link',
            [
                'label'                 => esc_html__( 'Link', 'avas-core' ),
                'type'                  => Controls_Manager::URL,
                'label_block'           => true,
                'placeholder'           => 'https://www.your-link.com',
            ]
        );
        
        $this->add_control(
            'heading_html_tag',
            [
                'label'                 => esc_html__( 'HTML Tag', 'avas-core' ),
                'type'                  => Controls_Manager::SELECT,
                'label_block'           => false,
                'default'               => 'h2',
                'options'               => [
                    'h1'     => esc_html__( 'H1', 'avas-core' ),
                    'h2'     => esc_html__( 'H2', 'avas-core' ),
                    'h3'     => esc_html__( 'H3', 'avas-core' ),
                    'h4'     => esc_html__( 'H4', 'avas-core' ),
                    'h5'     => esc_html__( 'H5', 'avas-core' ),
                    'h6'     => esc_html__( 'H6', 'avas-core' ),
                    'div'    => esc_html__( 'div', 'avas-core' ),
                    'span'   => esc_html__( 'span', 'avas-core' ),
                    'p'      => esc_html__( 'p', 'avas-core' ),
                ],
            ]
        );
        
        $this->add_control(
            'second_part_display',
            [
                'label'                 => esc_html__( 'Second Part Display', 'avas-core' ),
                'type'                  => Controls_Manager::SELECT,
                'label_block'           => false,
                'default'               => 'inline-block',
                'options'               => [
                    'inline-block'  => esc_html__( 'Inline', 'avas-core' ),
                    'block'         => esc_html__( 'Block', 'avas-core' ),
                ],
                'prefix_class'          => 'pp-dual-heading-',
				'selectors'             => [
					'{{WRAPPER}} .pp-second-text' => 'display: {{VALUE}};',
				],
            ]
        );
        
        $this->add_responsive_control(
			'align',
			[
				'label'                 => esc_html__( 'Alignment', 'avas-core' ),
				'type'                  => Controls_Manager::CHOOSE,
                'label_block'           => true,
				'options'               => [
					'left'      => [
						'title' => esc_html__( 'Left', 'avas-core' ),
						'icon'  => 'fa fa-align-left',
					],
					'center'    => [
						'title' => esc_html__( 'Center', 'avas-core' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'     => [
						'title' => esc_html__( 'Right', 'avas-core' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}}'   => 'text-align: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();

        /*-----------------------------------------------------------------------------------*/
        /*	STYLE TAB
        /*-----------------------------------------------------------------------------------*/
        
        /**
         * Style Tab: First Part
         */
        $this->start_controls_section(
            'first_section_style',
            [
                'label'                 => esc_html__( 'First Part', 'avas-core' ),
                'tab'                   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'first_text_color',
            [
                'label'                 => esc_html__( 'Text Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
                'selectors'             => [
                    '{{WRAPPER}} .pp-first-text' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'                  => 'first_part_bg',
                'label'                 => esc_html__( 'Background', 'avas-core' ),
                'types'                 => [ 'none','classic','gradient' ],
                'selector'              => '{{WRAPPER}} .pp-first-text',
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'                  => 'first_typography',
                'label'                 => esc_html__( 'Typography', 'avas-core' ),
                'scheme'                => Scheme_Typography::TYPOGRAPHY_4,
                'selector'              => '{{WRAPPER}} .pp-first-text',
				'separator'             => 'before',
            ]
        );

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'                  => 'first_border',
				'label'                 => esc_html__( 'Border', 'avas-core' ),
				'default'               => '1px',
				'selector'              => '{{WRAPPER}} .pp-first-text',
				'separator'             => 'before',
			]
		);

		$this->add_control(
			'first_border_radius',
			[
				'label'                 => esc_html__( 'Border Radius', 'avas-core' ),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => [ 'px', '%' ],
				'selectors'             => [
					'{{WRAPPER}} .pp-first-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'first_text_padding',
			[
				'label'                 => esc_html__( 'Padding', 'avas-core' ),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => [ 'px', 'em', '%' ],
				'selectors'             => [
					'{{WRAPPER}} .pp-first-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'                  => 'first_text_shadow',
				'selector'              => '{{WRAPPER}} .pp-first-text',
				'separator'             => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'                  => 'first_box_shadow',
				'selector'              => '{{WRAPPER}} .pp-first-text',
				'separator'             => 'before',
			]
		);

        $this->end_controls_section();

        /**
         * Style Tab: Second Part
         */
        $this->start_controls_section(
            'second_section_style',
            [
                'label'                 => esc_html__( 'Second Part', 'avas-core' ),
                'tab'                   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'second_text_color',
            [
                'label'                 => esc_html__( 'Text Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
                'selectors'             => [
                    '{{WRAPPER}} .pp-second-text' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'                  => 'second_part_bg',
                'label'                 => esc_html__( 'Background', 'avas-core' ),
                'types'                 => [ 'none','classic','gradient' ],
                'selector'              => '{{WRAPPER}} .pp-second-text',
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'                  => 'second_typography',
                'label'                 => esc_html__( 'Typography', 'avas-core' ),
                'scheme'                => Scheme_Typography::TYPOGRAPHY_4,
                'selector'              => '{{WRAPPER}} .pp-second-text',
				'separator'             => 'before',
            ]
        );

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'                  => 'second_border',
				'label'                 => esc_html__( 'Border', 'avas-core' ),
				'default'               => '1px',
				'selector'              => '{{WRAPPER}} .pp-second-text',
				'separator'             => 'before',
			]
		);

		$this->add_control(
			'second_border_radius',
			[
				'label'                 => esc_html__( 'Border Radius', 'avas-core' ),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => [ 'px', '%' ],
				'selectors'             => [
					'{{WRAPPER}} .pp-second-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->add_responsive_control(
			'second_text_margin',
			[
				'label'                 => esc_html__( 'Spacing', 'avas-core' ),
				'type'                  => Controls_Manager::SLIDER,
				'size_units'            => [ '%', 'px' ],
				'range'                 => [
					'px' => [
						'max' => 100,
					],
				],
				'tablet_default'        => [
					'unit' => 'px',
				],
				'mobile_default'        => [
					'unit' => 'px',
				],
				'selectors'             => [
					'{{WRAPPER}}.pp-dual-heading-inline-block .pp-second-text' => 'margin-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.pp-dual-heading-block .pp-second-text' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
				'separator'             => 'before',
			]
		);

		$this->add_control(
			'second_text_padding',
			[
				'label'                 => esc_html__( 'Padding', 'avas-core' ),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => [ 'px', 'em', '%' ],
				'selectors'             => [
					'{{WRAPPER}} .pp-second-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'                  => 'second_text_shadow',
				'selector'              => '{{WRAPPER}} .pp-second-text',
				'separator'             => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'                  => 'second_box_shadow',
				'selector'              => '{{WRAPPER}} .pp-second-text',
				'separator'             => 'before',
			]
		);

        $this->end_controls_section();

    }

    /**
	 * Render dual heading widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
    protected function render() {
        $settings = $this->get_settings();

        $this->add_render_attribute( 'dual-heading', 'class', 'pp-dual-heading' );
        $this->add_inline_editing_attributes( 'first_text', 'basic' );
        $this->add_render_attribute( 'first_text', 'class', 'pp-first-text' );
        $this->add_inline_editing_attributes( 'second_text', 'basic' );
        $this->add_render_attribute( 'second_text', 'class', 'pp-second-text' );
        
        if ( ! empty( $settings['link']['url'] ) ) {
            $this->add_render_attribute( 'dual-heading-link', 'href', $settings['link']['url'] );

            if ( $settings['link']['is_external'] ) {
                $this->add_render_attribute( 'dual-heading-link', 'target', '_blank' );
            }

            if ( $settings['link']['nofollow'] ) {
                $this->add_render_attribute( 'dual-heading-link', 'rel', 'nofollow' );
            }
        }
        
        if ( $settings['first_text'] || $settings['second_text'] ) {
            printf( '<%1$s %2$s>', $settings['heading_html_tag'], $this->get_render_attribute_string( 'dual-heading' ) );
                if ( ! empty( $settings['link']['url'] ) ) { printf( '<a %1$s>', $this->get_render_attribute_string( 'dual-heading-link' ) ); }
            
                if ( $settings['first_text'] ) {
                    echo '<span '.$this->get_render_attribute_string( 'first_text' ).'>' . $this->parse_text_editor( $settings['first_text'] ) . '</span>';
                }
                if ( $settings['second_text'] ) {
                    echo ' <span '.$this->get_render_attribute_string( 'second_text' ).'>' . $this->parse_text_editor( $settings['second_text'] ) . '</span>';
                }
            
                if ( ! empty( $settings['link']['url'] ) ) { printf( '</a>' ); }
            printf( '</%1$s>', $settings['heading_html_tag'] );
        }
    }

    /**
	 * Render dual heading widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @access protected
	 */
    protected function _content_template() {
        ?>
        <{{{settings.heading_html_tag}}} class="pp-dual-heading">
            <# if ( settings.link.url ) { #><a href="{{settings.link.url}}"><# } #>
                <# if ( settings.first_text ) { #>
                    <span class="pp-first-text elementor-inline-editing" data-elementor-setting-key="first_text" data-elementor-inline-editing-toolbar="basic">
                        {{ settings.first_text }}
                    </span>
                <# } #>
                <# if ( settings.second_text ) { #>
                    <span class="pp-second-text elementor-inline-editing" data-elementor-setting-key="second_text" data-elementor-inline-editing-toolbar="basic">
                        {{ settings.second_text }}
                    </span>
                <# } #>
            <# if ( settings.link.url ) { #></a><# } #>
        </{{{settings.heading_html_tag}}}>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Bddex_Dual_Heading_Widget() );