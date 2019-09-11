<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Icon List Widget
 */
class bddex_List_Widget extends Widget_Base {
    
    /**
	 * Retrieve icon list widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
    public function get_name() {
        return 'bddex-icon-list';
    }

    /**
	 * Retrieve icon list widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
    public function get_title() {
        return __( 'Avas Icon List', 'avas-core' );
    }

    /**
	 * Retrieve the list of categories the icon list widget belongs to.
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
	 * Retrieve icon list widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
    public function get_icon() {
        return 'eicon-bullet-list';
    }

    /**
	 * Register icon list widget controls.
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
         * Content Tab: List
         */
        $this->start_controls_section(
            'section_list',
            [
                'label'                 => __( 'List', 'avas-core' ),
            ]
        );
        
        $this->add_control(
			'list_items',
			[
				'label'                 => '',
				'type'                  => Controls_Manager::REPEATER,
				'default'               => [
					[
						'text'      => __( 'List Item #1', 'avas-core' ),
                        'list_icon' => __('fa fa-check','avas')
					],
                    [
						'text'      => __( 'List Item #2', 'avas-core' ),
                        'list_icon' => __('fa fa-check','avas')
					],
				],
				'fields'                => [
					[
						'name'        => 'text',
						'label'       => __( 'Text', 'avas-core' ),
						'label_block' => true,
						'type'        => Controls_Manager::TEXT,
                        'default'     => __('List Item #1','avas')
					],
                    [
						'name'        => 'pp_icon_type',
						'label'       => esc_html__( 'Icon Type', 'avas-core' ),
                        'type'        => Controls_Manager::CHOOSE,
                        'label_block' => false,
                        'options'     => [
                            'none' => [
                                'title' => esc_html__( 'None', 'avas-core' ),
                                'icon'  => 'fa fa-ban',
                            ],
                            'icon' => [
                                'title' => esc_html__( 'Icon', 'avas-core' ),
                                'icon'  => 'fa fa-gear',
                            ],
                            'image' => [
                                'title' => esc_html__( 'Image', 'avas-core' ),
                                'icon'  => 'fa fa-picture-o',
                            ],
                            'number' => [
                                'title' => esc_html__( 'Number', 'avas-core' ),
                                'icon'  => 'fa fa-hashtag',
                            ],
                        ],
                        'default'       => 'icon',
					],
                    [
						'name'        => 'list_icon',
						'label'       => __( 'Icon', 'avas-core' ),
						'label_block' => true,
						'type'        => Controls_Manager::ICON,
				        'default'     => 'fa fa-check',
				        'condition'     => [
                            'pp_icon_type' => 'icon',
                        ],
					],
                    [
						'name'        => 'list_image',
						'label'       => __( 'Image', 'avas-core' ),
						'label_block' => true,
						'type'        => Controls_Manager::MEDIA,
				        'default'     => [
                            'url' => Utils::get_placeholder_image_src(),
                         ],
				        'condition'   => [
                            'pp_icon_type' => 'image',
                        ],
					],
					[
						'name'        => 'link',
						'label'       => __( 'Link', 'avas-core' ),
						'type'        => Controls_Manager::URL,
						'label_block' => true,
						'placeholder' => __( 'http://your-link.com', 'avas-core' ),
					],
				],
				//'title_field'       => '{{{ text }}}',
			]
		);

        $this->end_controls_section();

        /**
         * Style Tab: List
         */
        $this->start_controls_section(
            'section_list_style',
            [
                'label'                 => __( 'List', 'avas-core' ),
                'tab'                   => Controls_Manager::TAB_STYLE,
            ]
        );
			
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'                  => 'items_background',
                'label'                 => __( 'Background', 'avas-core' ),
                'types'                 => [ 'classic','gradient' ],
                'selector'              => '{{WRAPPER}} .pp-list-items li',
            ]
        );

		$this->add_control(
			'items_spacing',
			[
				'label'                 => __( 'List Items Gap', 'avas-core' ),
				'type'                  => Controls_Manager::SLIDER,
				'range'                 => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors'             => [
					'{{WRAPPER}} .pp-list-items li:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'list_items_padding',
			[
				'label'                 => __( 'Padding', 'avas-core' ),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => [ 'px', '%' ],
				'selectors'             => [
					'{{WRAPPER}} .pp-list-items li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->add_responsive_control(
			'list_items_alignment',
			[
				'label'                 => __( 'Alignment', 'avas-core' ),
				'type'                  => Controls_Manager::CHOOSE,
				'options'               => [
					'left'      => [
						'title' => __( 'Left', 'avas-core' ),
						'icon'  => 'fa fa-align-left',
					],
					'center'    => [
						'title' => __( 'Center', 'avas-core' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'     => [
						'title' => __( 'Right', 'avas-core' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .pp-list-items'   => 'text-align: {{VALUE}};',
				],
				'selectors' => [
					'{{WRAPPER}} .pp-list-items li' => 'justify-content: {{VALUE}};',
				],
				'selectors_dictionary' => [
					'left' => 'flex-start',
					'right' => 'flex-end',
				],
			]
		);

		$this->add_control(
			'divider',
			[
				'label'                 => __( 'Divider', 'avas-core' ),
				'type'                  => Controls_Manager::SWITCHER,
				'label_off'             => __( 'Off', 'avas-core' ),
				'label_on'              => __( 'On', 'avas-core' ),
				'separator'             => 'before',
			]
		);

		$this->add_control(
			'divider_style',
			[
				'label'                 => __( 'Style', 'avas-core' ),
				'type'                  => Controls_Manager::SELECT,
				'options'               => [
					'solid'    => __( 'Solid', 'avas-core' ),
					'double'   => __( 'Double', 'avas-core' ),
					'dotted'   => __( 'Dotted', 'avas-core' ),
					'dashed'   => __( 'Dashed', 'avas-core' ),
					'groove'   => __( 'Groove', 'avas-core' ),
					'ridge'    => __( 'Ridge', 'avas-core' ),
				],
				'default'               => 'solid',
				'condition'             => [
					'divider' => 'yes',
				],
				'selectors'             => [
					'{{WRAPPER}} .pp-list-items li:not(:last-child)' => 'border-bottom-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'divider_weight',
			[
				'label'                 => __( 'Weight', 'avas-core' ),
				'type'                  => Controls_Manager::SLIDER,
				'default'               => [
					'size' => 1,
				],
				'range'                 => [
					'px'   => [
						'min' => 1,
						'max' => 10,
					],
				],
				'condition'             => [
					'divider' => 'yes',
				],
				'selectors'             => [
					'{{WRAPPER}} .pp-list-items li:not(:last-child)' => 'border-bottom-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'divider_color',
			[
				'label'                 => __( 'Color', 'avas-core' ),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '#ddd',
				'scheme'                => [
					'type'     => Scheme_Color::get_type(),
					'value'    => Scheme_Color::COLOR_3,
				],
				'condition'             => [
					'divider'  => 'yes',
				],
				'selectors'             => [
					'{{WRAPPER}} .pp-list-items li:not(:last-child)' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();

        /**
         * Style Tab: Icon
         */
        $this->start_controls_section(
            'section_icon_style',
            [
                'label'                 => __( 'Icon', 'avas-core' ),
                'tab'                   => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'icon_position',
			[
                'label'       => __( 'Position', 'avas-core' ),
                'type'        => Controls_Manager::CHOOSE,
                'default'     => 'left',
                'options'           => [
                    'left'      => [
                        'title' => __( 'Left', 'avas-core' ),
                        'icon'    => 'eicon-h-align-left',
                    ],
                    'right'     => [
                        'title' => __( 'Right', 'avas-core' ),
                        'icon'    => 'eicon-h-align-right',
                    ],
                ],
			]
		);

        $this->start_controls_tabs( 'tabs_icon_style' );

        $this->start_controls_tab(
            'tab_icon_normal',
            [
                'label'                 => __( 'Normal', 'avas-core' ),
            ]
        );

		$this->add_control(
			'icon_color',
			[
				'label'                 => __( 'Color', 'avas-core' ),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .pp-list-items .pp-icon-list-icon' => 'color: {{VALUE}};',
				],
				'scheme'                => [
					'type'     => Scheme_Color::get_type(),
					'value'    => Scheme_Color::COLOR_2,
				],
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label'                 => __( 'Background Color', 'avas-core' ),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .pp-list-items .pp-icon-wrapper' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label'                 => __( 'Size', 'avas-core' ),
				'type'                  => Controls_Manager::SLIDER,
				'default'               => [
					'size' => 14,
				],
				'range'                 => [
					'px' => [
						'min' => 6,
						'max' => 100,
					],
				],
				'selectors'             => [
					'{{WRAPPER}} .pp-list-items .pp-icon-list-icon' => 'font-size: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .pp-list-items .pp-icon-list-image img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_spacing',
			[
				'label'                 => __( 'Spacing', 'avas-core' ),
				'type'                  => Controls_Manager::SLIDER,
				'default'               => [
					'size' => 8,
				],
				'range'                 => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors'             => [
					'{{WRAPPER}} .pp-list-items .icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .pp-list-items .icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'                  => 'icon_border',
				'label'                 => __( 'Border', 'avas-core' ),
				'placeholder'           => '1px',
				'default'               => '1px',
				'selector'              => '{{WRAPPER}} .pp-list-items .pp-icon-wrapper',
			]
		);

		$this->add_control(
			'icon_border_radius',
			[
				'label'                 => __( 'Border Radius', 'avas-core' ),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => [ 'px', '%' ],
				'selectors'             => [
					'{{WRAPPER}} .pp-list-items .pp-icon-wrapper, {{WRAPPER}} .pp-list-items .pp-icon-list-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_padding',
			[
				'label'                 => __( 'Padding', 'avas-core' ),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => [ 'px', '%' ],
				'selectors'             => [
					'{{WRAPPER}} .pp-list-items .pp-icon-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_icon_hover',
            [
                'label'                 => __( 'Hover', 'avas-core' ),
            ]
        );

		$this->add_control(
			'icon_color_hover',
			[
				'label'                 => __( 'Color', 'avas-core' ),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .pp-list-items .pp-icon-wrapper:hover .pp-icon-list-icon' => 'color: {{VALUE}};',
				],
				'scheme'                => [
					'type'     => Scheme_Color::get_type(),
					'value'    => Scheme_Color::COLOR_2,
				],
			]
		);

		$this->add_control(
			'icon_bg_color_hover',
			[
				'label'                 => __( 'Background Color', 'avas-core' ),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .pp-list-items .pp-icon-wrapper:hover' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_border_color_hover',
			[
				'label'                 => __( 'Border Color', 'avas-core' ),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .pp-list-items .pp-icon-wrapper:hover' => 'border-color: {{VALUE}};',
				],
				'scheme'                => [
					'type'     => Scheme_Color::get_type(),
					'value'    => Scheme_Color::COLOR_2,
				],
			]
		);

		$this->add_control(
			'icon_hover_animation',
			[
				'label'                 => __( 'Animation', 'avas-core' ),
				'type'                  => Controls_Manager::HOVER_ANIMATION,
			]
		);

        $this->end_controls_tab();
        
        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Style Tab: Text
         */
        $this->start_controls_section(
            'section_text_style',
            [
                'label'                 => __( 'Text', 'avas-core' ),
                'tab'                   => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'text_color',
			[
				'label'                 => __( 'Color', 'avas-core' ),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .pp-icon-list-text' => 'color: {{VALUE}};',
				],
				'scheme'                => [
					'type'     => Scheme_Color::get_type(),
					'value'    => Scheme_Color::COLOR_2,
				],
			]
		);
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'                  => 'text_typography',
                'label'                 => __( 'Typography', 'avas-core' ),
                'scheme'                => Scheme_Typography::TYPOGRAPHY_4,
                'selector'              => '{{WRAPPER}} .pp-icon-list-text',
            ]
        );
        
        $this->end_controls_section();

    }

    /**
	 * Render icon list widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
    protected function render() {
        $settings = $this->get_settings();
        
        $this->add_render_attribute( 'icon-list', 'class', 'pp-list-items' );
        
        $this->add_render_attribute( 'icon', 'class', 'pp-icon-list-icon' );
        
        $this->add_render_attribute( 'icon-wrap', 'class', 'pp-icon-wrapper' );
        
        $i = 1;
        ?>
        <div class="pp-list-container">
            <ul <?php echo $this->get_render_attribute_string( 'icon-list' ); ?>>
                <?php foreach ( $settings['list_items'] as $index => $item ) : ?>
                    <?php if ( $item['text'] ) { ?>
                        <li>
                            <?php
                                $text_key = $this->get_repeater_setting_key( 'text', 'list_items', $index );
                                $this->add_render_attribute( $text_key, 'class', 'pp-icon-list-text' );
                                $this->add_inline_editing_attributes( $text_key, 'none' );

                                if ( ! empty( $item['link']['url'] ) ) {
                                    $link_key = 'link_' . $i;

                                    $this->add_render_attribute( $link_key, 'href', $item['link']['url'] );

                                    if ( $item['link']['is_external'] ) {
                                        $this->add_render_attribute( $link_key, 'target', '_blank' );
                                    }

                                    if ( $item['link']['nofollow'] ) {
                                        $this->add_render_attribute( $link_key, 'rel', 'nofollow' );
                                    }

                                    echo '<a ' . $this->get_render_attribute_string( $link_key ) . '>';
                                }
                                if ( $item['pp_icon_type'] != 'none' ) {
                                    $icon_key = 'icon_' . $i;
                                    $this->add_render_attribute( $icon_key, 'class', 'pp-icon-wrapper' );
                                    if ( $settings['icon_position'] == 'right' ) {
                                        $this->add_render_attribute( $icon_key, 'class', 'icon-right' );
                                    }
                                    else {
                                        $this->add_render_attribute( $icon_key, 'class', 'icon-left' );
                                    }
                                    
                                    if ( $settings['icon_hover_animation'] != '' ) {
                                        $icon_animation = 'elementor-animation-' . $settings['icon_hover_animation'];
                                    } else {
                                        $icon_animation = '';
                                    }
                                    ?>
                                    <span <?php echo $this->get_render_attribute_string( $icon_key ); ?>>
                                        <?php
                                            if ( $item['pp_icon_type'] == 'icon' ) {
                                                printf( '<span class="pp-icon-list-icon %1$s %2$s"></span>', esc_attr( $item['list_icon'] ), $icon_animation );
                                            } elseif ( $item['pp_icon_type'] == 'image' ) {
                                                printf( '<span class="pp-icon-list-image %2$s"><img src="%1$s"></span>', esc_url( $item['list_image']['url'] ), $icon_animation );
                                            } elseif ( $item['pp_icon_type'] == 'number' ) {
                                                printf( '<span class="pp-icon-list-icon %2$s">%1$s</span>', $i, $icon_animation );
                                            }
                                        ?>
                                    </span>
                                    <?php
                                }

                                printf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( $text_key ), $item['text'] );

                                if ( ! empty( $item['link']['url'] ) ) {
                                    echo '</a>';
                                }
                            ?>
                        </li>
                    <?php } ?>
                <?php $i++; endforeach; ?>
            </ul>
        </div>
        <?php
    }

    /**
	 * Render icon list widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @access protected
	 */
    protected function _content_template() {
        ?>
        <div class="pp-list-container">
            <ul class="pp-list-items">
                <# var i = 1; #>
                <# _.each( settings.list_items, function( item ) { #>
                    <# if ( item.text != '' ) { #>
                        <li>
                            <# if ( item.link && item.link.url ) { #>
                                <a href="{{ item.link.url }}">
                            <# } #>
                            <# if ( item.pp_icon_type != 'none' ) { #>
                                <#
                                    if ( settings.icon_position == 'right' ) {
                                        var icon_class = 'icon-right';
                                    } else {
                                        var icon_class = 'icon-left';
                                    }
                                #>
                                    <span class="pp-icon-wrapper {{ icon_class }}">
                                        <# if ( item.pp_icon_type == 'icon' ) { #>
                                            <span class="pp-icon-list-icon elementor-animation-{{ settings.icon_hover_animation }} {{ item.list_icon }}" aria-hidden="true"></span>
                                        <# } else if ( item.pp_icon_type == 'image' ) { #>
                                            <span class="pp-icon-list-image elementor-animation-{{ settings.icon_hover_animation }}">
                                                <img src="{{ item.list_image.url }}">
                                            </span>
                                        <# } else if ( item.pp_icon_type == 'number' ) { #>
                                            <span class="pp-icon-list-icon elementor-animation-{{ settings.icon_hover_animation }}">
                                                {{ i }}
                                            </span>
                                        <# } #>
                                    </span>
                            <# } #>

                            <span class="pp-icon-list-text elementor-inline-editing" data-elementor-setting-key="list_items.{{ i - 1 }}.text" data-elementor-inline-editing-toolbar="none">
                                {{{ item.text }}}
                            </span>
                                
                            <# if ( item.link && item.link.url ) { #>
                                </a>
                            <# } #>
                        </li>
                    <# } #>
                <# i++ } ); #>
            </ul>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new bddex_List_Widget() );