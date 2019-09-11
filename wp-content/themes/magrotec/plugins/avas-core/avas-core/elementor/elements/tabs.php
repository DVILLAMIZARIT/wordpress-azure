<?php


namespace Elementor;


if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class BDDEX_Tabs_Widget extends Widget_Base {

    public function get_name() {
        return 'lae-tabs';
    }

    public function get_title() {
        return esc_html__('Avas Tabs', 'avas-core');
    }

    public function get_icon() {
        return 'eicon-tabs';
    }

    public function get_categories() {
        return array('bddex');
    }

    public function get_script_depends() {
        return [
            'lae-widgets-scripts',
            'lae-frontend-scripts'
        ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tabs',
            [
                'label' => esc_html__('Tabs', 'avas-core'),
            ]
        );

        $this->add_control(

            'style',
            [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Style', 'avas-core'),
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Tab Style 1', 'avas-core'),
                    'style2' => esc_html__('Tab Style 2', 'avas-core'),
                    'style3' => esc_html__('Tab Style 3', 'avas-core'),
                    'style4' => esc_html__('Tab Style 4', 'avas-core'),
                    'style5' => esc_html__('Tab Style 5', 'avas-core'),
                    'style6' => esc_html__('Tab Style 6', 'avas-core'),
                    'style7' => esc_html__('Vertical Tab Style 1', 'avas-core'),
                    'style8' => esc_html__('Vertical Tab Style 2', 'avas-core'),
                    'style9' => esc_html__('Vertical Tab Style 3', 'avas-core'),
                    'style10' => esc_html__('Vertical Tab Style 4', 'avas-core'),
                ],
                'prefix_class' => 'lae-tabs-',
            ]
        );

        $this->add_control(
            'mobile_width',
            [
                'label' => esc_html__('Mobile Resolution', 'avas-core'),
                'description' => esc_html__('The device resolution at which the mobile view takes effect', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 767,
                'min' => 400,
                'max' => 1024,
                'step' => 5,
            ]
        );

        $this->add_control(
            'tabs',
            [
                'label' => esc_html__('Tab Panes', 'avas-core'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'tab_title' => esc_html__('Tab #1', 'avas-core'),
                        'tab_content' => esc_html__('I am tab content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'avas-core'),
                    ],
                    [
                        'tab_title' => esc_html__('Tab #2', 'avas-core'),
                        'tab_content' => esc_html__('I am tab content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'avas-core'),
                    ],
                    [
                        'tab_title' => esc_html__('Tab #3', 'avas-core'),
                        'tab_content' => esc_html__('I am tab content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'avas-core'),
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'icon_type',
                        'label' => esc_html__('Tab Icon Type', 'avas-core'),
                        'type' => Controls_Manager::SELECT,
                        'default' => 'none',
                        'options' => [
                            'none' => esc_html__('None', 'avas-core'),
                            'icon' => esc_html__('Icon', 'avas-core'),
                            'icon_image' => esc_html__('Icon Image', 'avas-core'),
                        ],
                    ],
                    [
                        'name' => 'icon_image',
                        'label' => esc_html__('Tab Image', 'avas-core'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                        'condition' => [
                            'icon_type' => 'icon_image',
                        ],
                    ],
                    [
                        'name' => 'icon',
                        'label' => esc_html__('Tab Icon', 'avas-core'),
                        'type' => Controls_Manager::ICON,
                        'label_block' => true,
                        'default' => '',
                        'condition' => [
                            'icon_type' => 'icon',
                        ],
                    ],
                    [
                        'name' => 'tab_title',
                        'label' => esc_html__('Tab Title & Content', 'avas-core'),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__('Tabs Title', 'avas-core'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'tab_content',
                        'label' => esc_html__('Tab Content', 'avas-core'),
                        'type' => Controls_Manager::WYSIWYG,
                        'default' => esc_html__('Tabs Content', 'avas-core'),
                        'show_label' => false,
                    ],
                ],
                'title_field' => '{{{ tab_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_title',
            [
                'label' => esc_html__( 'Tab Title', 'avas-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

       
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Tab Title Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-tabs .lae-tab-nav .lae-tab a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'active_title_color',
            [
                'label' => esc_html__( 'Active Tab Title Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-tabs .lae-tab-nav .lae-tab.lae-active a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'hover_title_color',
            [
                'label' => esc_html__( 'Hover Tab Title Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-tabs .lae-tab-nav .lae-tab:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'highlight_color',
            [
                'label' => esc_html__('Tab highlight Border color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '#f94213',
                'selectors' => [
                    '{{WRAPPER}}.lae-tabs-style4 .lae-tab-nav .lae-tab.lae-active:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}}.lae-tabs-style4.lae-mobile-layout.lae-mobile-open .lae-tab.lae-active' => 'border-left-color: {{VALUE}};',
                    '{{WRAPPER}}.lae-tabs-style4.lae-mobile-layout.lae-mobile-open .lae-tab.lae-active' => 'border-right-color: {{VALUE}};',
                    '{{WRAPPER}}.lae-tabs-style6 .lae-tab-nav .lae-tab.lae-active a' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}}.lae-tabs-style7 .lae-tab-nav .lae-tab.lae-active a' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}}.lae-tabs-style8 .lae-tab-nav .lae-tab.lae-active a' => 'border-left-color: {{VALUE}};',
                ],
                'condition' => [
                    'style' => ['style4', 'style6', 'style7', 'style8'],
                ],
            ]
        );

        $this->add_control(
            'title_spacing',
            [
                'label' => esc_html__('Tab Title Padding', 'avas-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .lae-tabs .lae-tab-nav .lae-tab a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'isLinked' => false
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .lae-tabs .lae-tab-nav .lae-tab .lae-tab-title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_content',
            [
                'label' => esc_html__( 'Tab Content', 'avas-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'content_spacing',
            [
                'label' => esc_html__('Tab Content Padding', 'avas-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .lae-tabs .lae-tab-panes .lae-tab-pane' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'isLinked' => false
            ]
        );
        $this->add_control(
            'content_color',
            [
                'label' => esc_html__( 'Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-tabs .lae-tab-panes .lae-tab-pane' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'content_bg_color',
            [
                'label' => esc_html__( 'Bacground Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-tabs .lae-tab-panes .lae-tab-pane' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .lae-tabs .lae-tab-panes .lae-tab-pane',
            ]
        );



        $this->end_controls_section();


        $this->start_controls_section(
            'section_icon_styling',
            [
                'label' => esc_html__('Icons', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__('Icon or Icon Image size in pixels', 'avas-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em' ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 256,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .lae-tabs .lae-tab-nav .lae-tab .lae-image-wrapper img' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .lae-tabs .lae-tab-nav .lae-tab .lae-icon-wrapper span' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_space',
            [
                'label' => esc_html__('Icon or Icon Image space', 'avas-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 256,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .lae-tabs .lae-tab-nav .lae-tab .lae-image-wrapper img' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .lae-tabs .lae-tab-nav .lae-tab .lae-icon-wrapper span' => 'padding-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .lae-tabs .lae-tab-nav .lae-tab .lae-icon-wrapper span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'active_icon_color',
            [
                'label' => esc_html__('Active Tab Icon Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .lae-tabs .lae-tab-nav .lae-tab.lae-active .lae-icon-wrapper span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'hover_icon_color',
            [
                'label' => esc_html__('Hover Tab Icon Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .lae-tabs .lae-tab-nav .lae-tab .lae-icon-wrapper:hover span' => 'color: {{VALUE}};',
                ],
            ]
        );
    }

    protected function render() {

        $settings = $this->get_settings();

        $plain_styles = array('style2', 'style6', 'style7');

        $vertical_class = '';

        $vertical_styles = array('style7', 'style8', 'style9', 'style10');

        if (in_array($settings['style'], $vertical_styles, true)):

            $vertical_class = 'lae-vertical';

        endif;

        foreach ($settings['tabs'] as $tab) :

            if (in_array($settings['style'], $plain_styles, true)):

                $icon_type = 'none'; // do not display icons for plain styles even if chosen by the user

            else :

                $icon_type = $tab['icon_type'];

            endif;

            $tab_id = sanitize_title_with_dashes($tab['tab_title']) . '-' . uniqid();

            $tab_title = '<a href="#' . $tab_id . '">';

            if ($icon_type == 'icon_image') :

                $tab_title .= '<span class="lae-image-wrapper">';

                $icon_image = $tab['icon_image'];

                $tab_title .= wp_get_attachment_image($icon_image['id'], 'thumbnail', false, array('class' => 'lae-image'));

                $tab_title .= '</span>';

            elseif ($icon_type == 'icon') :

                $tab_title .= '<span class="lae-icon-wrapper">';

                $tab_title .= '<span class="' . esc_attr($tab['icon']) . '"></span>';

                $tab_title .= '</span>';

            endif;

            $tab_title .= '<span class="lae-tab-title">';

            $tab_title .= esc_html($tab['tab_title']);

            $tab_title .= '</span>';

            $tab_title .= '</a>';

            $tab_nav = '<div class="lae-tab">' . $tab_title . '</div>';

            $tab_content = '<div id="' . $tab_id . '" class="lae-tab-pane">' . $this->parse_text_editor($tab['tab_content']) . '</div>';

            $tab_elements[] = $tab_nav;

            $tab_panes[] = $tab_content;

        endforeach;

        ?>

        <div class="lae-tabs <?php echo $vertical_class; ?> <?php echo esc_attr($settings['style']); ?>"
             data-mobile-width="<?php echo intval($settings['mobile_width']); ?>">

            <a href="#" class="lae-tab-mobile-menu"><i class="lae-icon-menu"></i>&nbsp;</a>

            <div class="lae-tab-nav">

                <?php

                foreach ($tab_elements as $tab_nav) :

                    echo $tab_nav;

                endforeach;

                ?>

            </div>

            <div class="lae-tab-panes">

                <?php

                foreach ($tab_panes as $tab_pane) :

                    echo $tab_pane;

                endforeach;

                ?>

            </div>

        </div>

        <?php
    }

    protected function content_template() {

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new BDDEX_Tabs_Widget() );