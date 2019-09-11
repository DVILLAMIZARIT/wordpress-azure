<?php

namespace Elementor;


if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class BDDEX_Pricing_Table_Widget extends Widget_Base {


    public function __construct($data = [], $args = null) {
        parent::__construct($data, $args);

        add_shortcode('avas_pricing_item', array($this, 'pricing_item_shortcode'));
    }

    public function pricing_item_shortcode($atts, $content = null, $tag) {

        $title = $value = '';

        extract(shortcode_atts(array(
            'title' => '',
            'value' => ''

        ), $atts));

        ob_start();

        ?>

        <div class="lae-pricing-item">

            <div class="lae-title">

                <?php echo htmlspecialchars_decode(wp_kses_post($title)); ?>

            </div>

            <div class="lae-value-wrap">

                <div class="lae-value">

                    <?php echo htmlspecialchars_decode(wp_kses_post($value)); ?>

                </div>

            </div>

        </div>

        <?php


        $output = ob_get_clean();

        return $output;
    }

    public function get_name() {
        return 'lae-pricing-table';
    }

    public function get_title() {
        return esc_html__('Avas Pricing Table 1', 'avas-core');
    }

    public function get_icon() {
        return 'eicon-price-table';
    }

    public function get_categories() {
        return array('bddex');
    }

    public function get_script_depends() {
        return [
            'lae-widgets-scripts',
            'lae-frontend-scripts',
            'jquery-flexslider'
        ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_pricing_table',
            [
                'label' => esc_html__('Pricing Table', 'avas-core'),
            ]
        );

        $this->add_control(
            'per_line',
            [
                'label' => esc_html__('Pricing plans in a row', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 4,
            ]
        );

        $this->add_control(
            'pricing_heading',
            [
                'label' => esc_html__('Pricing Plans', 'avas-core'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'pricing_plans',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'pricing_title',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Pricing Plan Title', 'avas-core'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'tagline',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Tagline Text', 'avas-core'),
                        
                    ],

                    [
                        'name' => 'pricing_image',
                        'label' => esc_html__('Pricing Image', 'avas-core'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                    ],

                    [
                        'name' => 'price_tag',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Price Tag', 'avas-core'),
                        'description' => esc_html__('Enter the price tag for the pricing plan. HTML is accepted.', 'avas-core'),
                    ],

                    [
                        'name' => 'button_text',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Button Text', 'avas-core'),
                    ],

                    [
                        'name' => 'button_url',
                        'label' => esc_html__('URL', 'avas-core'),
                        'type' => Controls_Manager::URL,
                        'label_block' => true,
                        'default' => [
                            'url' => '',
                            'is_external' => 'true',
                        ],
                        'placeholder' => esc_html__('http://your-link.com', 'avas-core'),
                    ],


                    [
                        'name' => 'highlight',
                        'label' => esc_html__('Highlight Pricing Plan', 'avas-core'),
                        'type' => Controls_Manager::SWITCHER,
                        'label_off' => esc_html__('No', 'avas-core'),
                        'label_on' => esc_html__('Yes', 'avas-core'),
                        'return_value' => 'yes',
                        'default' => 'no',
                    ],

                    [
                        'name' => 'pricing_content',
                        'type' => Controls_Manager::TEXTAREA,
                        'label' => esc_html__('Pricing Plan Details', 'avas-core'),
                        'description' => esc_html__('You can use shortcode for description example: [avas_pricing_item title="Storage Space" value="30 GB"]', 'avas-core'),
                        'show_label' => true,
                        'rows' => 10
                    ],

                    

                ],
               // 'title_field' => '{{{pricing_title}}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_pricing_style',
            [
                'label' => esc_html__( 'Plan Name', 'avas-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'plan_name_tag',
            [
                'label' => esc_html__( 'HTML Tag', 'avas-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => esc_html__( 'H1', 'avas-core' ),
                    'h2' => esc_html__( 'H2', 'avas-core' ),
                    'h3' => esc_html__( 'H3', 'avas-core' ),
                    'h4' => esc_html__( 'H4', 'avas-core' ),
                    'h5' => esc_html__( 'H5', 'avas-core' ),
                    'h6' => esc_html__( 'H6', 'avas-core' ),
                    'div' => esc_html__( 'div', 'avas-core' ),
                ],
                'default' => 'h3',
            ]
        );

        $this->add_control(
            'plan_name_color',
            [
                'label' => esc_html__( 'Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-pricing-table .lae-top-header .lae-plan-name' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'plan_name_bg_color',
            [
                'label' => esc_html__( 'Background', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-pricing-table .lae-top-header' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'plan_name_br_color',
            [
                'label' => esc_html__( 'Border', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-pricing-table .lae-top-header' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'plan_name_typography',
                'selector' => '{{WRAPPER}} .lae-pricing-table .lae-top-header .lae-plan-name',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_plan_tagline',
            [
                'label' => esc_html__( 'Plan Tagline', 'avas-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'plan_tagline_color',
            [
                'label' => esc_html__( 'Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-pricing-table .lae-top-header .lae-tagline' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'plan_tagline_typography',
                'selector' => '{{WRAPPER}} .lae-pricing-table .lae-top-header .lae-tagline',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_plan_price',
            [
                'label' => esc_html__( 'Plan Price', 'avas-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'plan_price_tag',
            [
                'label' => esc_html__( 'HTML Tag', 'avas-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => esc_html__( 'H1', 'avas-core' ),
                    'h2' => esc_html__( 'H2', 'avas-core' ),
                    'h3' => esc_html__( 'H3', 'avas-core' ),
                    'h4' => esc_html__( 'H4', 'avas-core' ),
                    'h5' => esc_html__( 'H5', 'avas-core' ),
                    'h6' => esc_html__( 'H6', 'avas-core' ),
                    'div' => esc_html__( 'div', 'avas-core' ),
                ],
                'default' => 'h4',
            ]
        );


        $this->add_control(
            'plan_price_color',
            [
                'label' => esc_html__( 'Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-pricing-table .lae-pricing-plan .lae-plan-price span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'plan_price_bg_color',
            [
                'label' => esc_html__( 'Background', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-pricing-table .lae-plan-header' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'plan_price_tag_bg_color',
            [
                'label' => esc_html__( 'Tag Background', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-pricing-table .lae-plan-price .lae-text' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'plan_price_typography',
                'selector' => '{{WRAPPER}} .lae-pricing-table .lae-pricing-plan .lae-plan-price span',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_item_title',
            [
                'label' => esc_html__( 'Pricing Item Title', 'avas-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'item_title_color',
            [
                'label' => esc_html__( 'Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-pricing-table .lae-plan-details .lae-pricing-item .lae-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_title_bgcolor',
            [
                'label' => esc_html__( 'Background', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-pricing-table .lae-plan-details' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_title_brcolor',
            [
                'label' => esc_html__( 'Border', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-pricing-table .lae-plan-details' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'item_title_typography',
                'selector' => '{{WRAPPER}} .lae-pricing-table .lae-plan-details .lae-pricing-item .lae-title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_item_value',
            [
                'label' => esc_html__( 'Pricing Item Value', 'avas-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'item_value_color',
            [
                'label' => esc_html__( 'Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-pricing-table .lae-plan-details .lae-pricing-item .lae-value' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_value_separator_color',
            [
                'label' => esc_html__( 'Separator Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-pricing-table .lae-plan-details .lae-pricing-item .lae-value-wrap:after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'item_value_typography',
                'selector' => '{{WRAPPER}} .lae-pricing-table .lae-plan-details .lae-pricing-item .lae-value',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_purchase_button',
            [
                'label' => esc_html__( 'Purchase Button', 'avas-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'purchase_button_spacing',
            [
                'label' => esc_html__('Button Spacing', 'avas-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'top' => 15,
                    'right' => 15,
                    'bottom' => 15,
                    'left' => 15,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .lae-pricing-table .lae-purchase .lae-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'purchase_button_size',
            [
                'label' => esc_html__('Button Size', 'avas-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'top' => 12,
                    'right' => 25,
                    'bottom' => 12,
                    'left' => 25,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .lae-pricing-table .lae-purchase .lae-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'isLinked' => false
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => esc_html__('Background Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .lae-pricing-table .lae-purchase' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_bg_hov_color',
            [
                'label' => esc_html__('Background Hover Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .lae-pricing-table .lae-pricing-plan:hover .lae-purchase' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_custom_color',
            [
                'label' => esc_html__('Button Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .lae-pricing-table .lae-purchase .lae-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_custom_hover_color',
            [
                'label' => esc_html__('Button Hover Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .lae-pricing-table .lae-purchase .lae-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'purchase_button_color',
            [
                'label' => esc_html__( 'Label Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-pricing-table .lae-purchase .lae-button' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'purchase_button_hov_color',
            [
                'label' => esc_html__( 'Label Hover Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-pricing-table .lae-purchase .lae-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'purchase_button_typography',
                'selector' => '{{WRAPPER}} .lae-pricing-table .lae-purchase .lae-button',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings();

        if (empty($settings['pricing_plans']))
            return;

        ?>

        <?php $column_style = bddex_get_column_class(intval($settings['per_line'])); ?>

        <div class="lae-pricing-table lae-container">

            <?php

            foreach ($settings['pricing_plans'] as $pricing_plan) :

                $pricing_title = esc_html($pricing_plan['pricing_title']);
                $tagline = esc_html($pricing_plan['tagline']);
                $price_tag = htmlspecialchars_decode(wp_kses_post($pricing_plan['price_tag']));
                $pricing_img = $pricing_plan['pricing_image'];
                $pricing_url = (empty($pricing_plan['button_url']['url'])) ? '#' : esc_url($pricing_plan['button_url']['url']);
                $pricing_button_text = esc_html($pricing_plan['button_text']);
                $button_new_window = esc_html($pricing_plan['button_url']['is_external']);
                $highlight = ($pricing_plan['highlight'] == 'yes');

                $price_tag = (empty($price_tag)) ? '' : $price_tag;

                 list($animate_class, $animation_attr) = bddex_get_animation_atts($pricing_plan['widget_animation']);

                ?>

                <div class="lae-pricing-plan <?php echo ($highlight ? ' lae-highlight' : ''); ?> <?php echo $column_style; ?> <?php echo $animate_class; ?>"<?php echo $animation_attr; ?>>

                    <div class="lae-top-header">

                        <?php if (!empty($tagline))
                            echo '<p class="lae-tagline center">' . $tagline . '</p>'; ?>

                        <<?php echo $settings['plan_name_tag']; ?> class="lae-plan-name lae-center"><?php echo $pricing_title; ?></<?php echo $settings['plan_name_tag']; ?>>

                       

                    </div>
 <?php

                        if (!empty($pricing_img)) :
                            echo wp_get_attachment_image($pricing_img['id'], 'full', false, array('class' => 'lae-image full', 'alt' => $pricing_title));
                        endif;

                        ?>
                    <<?php echo $settings['plan_price_tag']; ?> class="lae-plan-price lae-plan-header lae-center">

                        <span class="lae-text">

                            <?php echo wp_kses_post($price_tag); ?>

                        </span>

                    </<?php echo $settings['plan_price_tag']; ?>>

                    <div class="lae-plan-details">

                        <?php echo $this->parse_text_editor($pricing_plan['pricing_content']) ?>

                    </div>

                    <div class="lae-purchase">

                        <a class="lae-button default" href="<?php echo esc_url($pricing_url); ?>"
                            <?php if (!empty($button_new_window))
                                echo 'target="_blank"'; ?>><?php echo esc_html($pricing_button_text); ?></a>

                    </div>

                </div>
              

                <?php

            endforeach;

            ?>

        </div>

        <div class="lae-clear"></div>

        <?php
    }

    protected function content_template() {
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new BDDEX_Pricing_Table_Widget() );