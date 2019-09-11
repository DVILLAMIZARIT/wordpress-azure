<?php


namespace Elementor;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class BDDEX_Piecharts_Widget extends Widget_Base {

    public function get_name() {
        return 'lae-piecharts';
    }

    public function get_title() {
        return __('Avas Piecharts', 'avas-core');
    }

    public function get_icon() {
        return 'eicon-counter-circle';
    }

    public function get_categories() {
        return array('bddex');
    }

    public function get_script_depends() {
        return [
            'lae-widgets-scripts',
            'lae-frontend-scripts',
            'waypoints',
            'jquery-stats'
        ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_piecharts',
            [
                'label' => __('Piecharts', 'avas-core'),
            ]
        );

        $this->add_control(
            'per_line',
            [
                'label' => __('Piecharts per row', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 4,
            ]
        );


        $this->add_control(
            'piecharts',
            [
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'stats_title' => __('Web Design', 'avas-core'),
                        'percentage_value' => 87,
                    ],
                    [
                        'stats_title' => __('SEO Services', 'avas-core'),
                        'percentage_value' => 76,
                    ],
                    [
                        'stats_title' => __('WordPress Development', 'avas-core'),
                        'percentage_value' => 90,
                    ],
                    [
                        'stats_title' => __('Brand Marketing', 'avas-core'),
                        'percentage_value' => 40,
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'stats_title',
                        'label' => __('Stats Title', 'avas-core'),
                        'type' => Controls_Manager::TEXT,
                        'description' => __('The title for the piechart', 'avas-core'),
                    ],
                    [
                        'name' => 'percentage_value',
                        'label' => __('Percentage Value', 'avas-core'),
                        'type' => Controls_Manager::NUMBER,
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                        'default' => 30,
                        'description' => __('The percentage value for the stats.', 'avas-core'),
                    ],

                ],
              //  'title_field' => '{{{ stats_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_styling',
            [
                'label' => __('Piechart Styling', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'bar_color',
            [
                'label' => __('Bar color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '#f94213',
            ]
        );


        $this->add_control(
            'track_color',
            [
                'label' => __('Track color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '#dddddd',
            ]
        );
         $this->add_control(
            'pie_size',
            [
                'label' => __('Size', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'max' => 500,
                'step' => 1,
                'default' => 240,
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'section_stats_title',
            [
                'label' => __('Stats Title', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'stats_title_color',
            [
                'label' => __('Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-piechart .lae-label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stats_title_typography',
                'selector' => '{{WRAPPER}} .lae-piechart .lae-label',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_stats_percentage',
            [
                'label' => __('Stats Percentage', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'stats_percentage_color',
            [
                'label' => __('Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-piechart .lae-percentage span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stats_percentage_typography',
                'selector' => '{{WRAPPER}} .lae-piechart .lae-percentage span',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_stats_percentage_symbol',
            [
                'label' => __('Stats Percentage Symbol', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'stats_percentage_symbol_color',
            [
                'label' => __('Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-piechart .lae-percentage sup' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stats_percentage_symbol_typography',
                'selector' => '{{WRAPPER}} .lae-piechart .lae-percentage sup',
            ]
        );


    }

    protected function render() {

        $settings = $this->get_settings();
        ?>

        <?php $column_style = bddex_get_column_class(intval($settings['per_line'])); ?>

        <?php

        $bar_color = ' data-bar-color="' . esc_attr($settings['bar_color']) . '"';
        $track_color = ' data-track-color="' . esc_attr($settings['track_color']) . '"';
        $pie_size   = ' style="width:' . esc_attr($settings['pie_size']) . 'px;"';
        ?>

        <div class="lae-piecharts lae-container">

            <?php foreach ($settings['piecharts'] as $piechart): ?>

                <div class="lae-piechart <?php echo $column_style; ?>" <?php echo $pie_size; ?> >

                    <div class="lae-percentage" <?php echo $bar_color; ?> <?php echo $track_color; ?>
                         data-percent="<?php echo intval($piechart['percentage_value']); ?>">

                        <span><?php echo intval($piechart['percentage_value']); ?><sup>%</sup></span>

                    </div>

                    <div class="lae-label"><?php echo esc_html($piechart['stats_title']); ?></div>

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

Plugin::instance()->widgets_manager->register_widget_type( new BDDEX_Piecharts_Widget() );