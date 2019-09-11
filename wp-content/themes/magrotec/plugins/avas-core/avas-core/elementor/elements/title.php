<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class bddex_Widget_title extends Widget_Base {
	public function get_name() {
		return 'avas-title';
	}

	public function get_title() {
		return __( 'Avas Title', 'avas-core' );
	}

	public function get_icon() {
		return 'eicon-type-tool';
	}

	public function get_categories() {
		return [ 'bddex' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
            'section_title',
            [
                'label' => __( 'Title Element', 'avas-core' )
            ]
        );

        $this->add_control(
            'title_txt',
            [
                'label' => __( 'Title', 'avas-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Add title', 'avas-core' ),
                'default' => __( 'Add Title', 'avas-core' ),
            ]
        );
        $this->add_control(
            'title_headline',
            [
                'label'     => __( 'Select Headline', 'avas-core' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'h3',
                'options'   => [
                        'h1'    => 'H1',
                        'h2'    => 'H2',
                        'h3'    => 'H3',
                        'h4'    => 'H4',
                        'h5'    => 'H5',
                        'h6'    => 'H6',
                        'div'   => 'div',
                        'span'  => 'Span',
                        'p'     => 'P'
                    ],
            ]
        );
        $this->add_control(
            'title_link',
            [
                'label' => __( 'Title Link', 'avas-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '',
            ]
        );

        $this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' 	=> __( 'Title', 'avas-core' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
            'title_arrow',
            [
                'label'         => __( 'Show arrow', 'avas-core' ),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'yes',
                'label_on'      => __( 'Yes', 'avas-core' ),
                'label_off'     => __( 'No', 'avas-core' ),
            ]
        );
        $this->add_control(
            'title_arrow_bg_color',
            [
                'label'     => __( 'Arrow background color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#1c1c1c',
                'selectors' => [
                    '{{WRAPPER}} .main-block-title.title-arrow > span:after' => 'border-color: {{VALUE}} rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) rgba(0, 0, 0, 0);',
                ],
                'condition' => [
                    'title_arrow' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'title_border',
            [
                'label'         => __( 'Show bottom border', 'avas-core' ),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'yes',
                'label_on'      => __( 'Yes', 'avas-core' ),
                'label_off'     => __( 'No', 'avas-core' ),
            ]
        );

        $this->add_control(
            'title_border_color',
            [
                'label'     => __( 'Title border color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#1c1c1c',
                'selectors' => [
                    '{{WRAPPER}} .main-title-border' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'title_border' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'title_bg_color1',
            [
                'label'     => __( 'Title Background color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#1c1c1c',
                'selectors' => [
                    '{{WRAPPER}} .main-block-title.classic span, {{WRAPPER}} .main-block-title.title-arrow span' => 'background: {{VALUE}};',
                ],
            ]
        );

		$this->add_control(
			'title_color',
			[
				'label'		=> __( 'Title color', 'avas-core' ),
				'type'		=> Controls_Manager::COLOR,
				'scheme'	=> [
				    'type'	=> Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
                'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .main-block-title span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
            'title_padding',
            [
                'label' 		=> __( 'Title Padding', 'avas-core' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .main-block-title.classic span, {{WRAPPER}} .main-block-title.title-arrow span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before',
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label' 		=> __( 'Title Margin', 'avas-core' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .main-block-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before',
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography',
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
				'selector' 	=> '{{WRAPPER}} .main-block-title',
			]
		);
        $this->add_responsive_control(
            'align',
            [
                'label'     => __( 'Alignment', 'avas-core' ),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
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
                    'justify'   => [
                        'title' => __( 'Justified', 'avas-core' ),
                        'icon'  => 'fa fa-align-justify',
                    ],
                ],
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
            ]
        );
		$this->end_controls_section();
	}

	protected function render( ) {
		$settings = $this->get_settings();
        $output = '';
		$titlelink = $settings['title_link'];
        $headline  = $settings['title_headline'];
        $title_border  = $settings['title_border'];

        // enable category
        if( $title_border == 'yes' ){
            $title_border = 'main-title-border';
        } else {
            $title_border = '';
        }

        if( empty( $headline ) ) {
            $headline = 'h2';
        }

		$output .= '<div class="news247-title-content-wrapper">';
			if (! empty(  $titlelink ) ) {
				if( $settings['title_arrow'] == 'yes' ) {
					$output .= '<'.$headline.' class="main-block-title title-arrow '.$title_border.'"><a href="'.$titlelink.'"><span>'.$settings['title_txt'].'</span></a></'.$headline.'>';
                } else {
					$output .= '<'.$headline.' class="main-block-title classic '.$title_border.'"><a href="'.$titlelink.'"><span>'.$settings['title_txt'].'</span></a></'.$headline.'>';
                }
			} else {
				if( $settings['title_arrow'] == 'yes' ) {
					$output .= '<'.$headline.' class="main-block-title title-arrow '.$title_border.'"><span>'.$settings['title_txt'].'</span></'.$headline.'>';
                } else {
					$output .= '<'.$headline.' class="main-block-title classic '.$title_border.'"><span>'.$settings['title_txt'].'</span></'.$headline.'>';
                }
			}
		$output .= '</div>';
        echo $output;
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new bddex_Widget_title() );