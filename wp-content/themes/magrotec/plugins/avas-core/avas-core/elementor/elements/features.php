<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class Bddex_Features_Widget extends Widget_Base {

    public function get_name() {
        return 'avas-features';
    }

    public function get_title() {
        return esc_html__('Avas Features', 'avas-core');
    }

    public function get_icon() {
        return 'fa fa-th-large';
    }

    public function get_categories() {
        return array('bddex');
    }

   
    protected function _register_controls() {

        $this->start_controls_section(
            'section_features',
            [
                'label' => esc_html__('Features', 'avas-core'),
            ]
        );

        $this->add_control(
            'feature_class', [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Container Class', 'avas-core'),
                'description' => esc_html__('The CSS class for the features container DIV element.', 'avas-core'),
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail_size',
                'label' => esc_html__('Feature Image Size', 'avas-core'),
                'default' => 'full',
            ]
        );

        $this->add_control(
            'features_heading',
            [
                'label' => esc_html__('Features', 'avas-core'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'features',
            [
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'feature_title' => 'Ut enim ad minim veniam',
                        'feature_subtitle' => 'Lioula ulsrices',
                        'feature_text' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.',
                    ],
                    [
                        'feature_title' => 'Felis eros vehicula leo ato',
                        'feature_subtitle' => 'Ltrices semper',
                        'feature_text' => 'Nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.',
                    ],
                    [
                        'feature_title' => 'Nullam tinci dunt adip',
                        'feature_subtitle' => 'Pellentesque laoreet',
                        'feature_text' => 'Cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.',
                    ],
                    [
                        'feature_title' => 'Tristique sapien accum',
                        'feature_subtitle' => 'Ligula ultrices',
                        'feature_text' => 'Suspendisse potenti Phasellus euismod libero in neque molestie et elementum libero maximus. Etiam in enim vestibulum suscipit sem quis molestie nibh.',
                    ],
                ],
                'fields' => [

                    [
                        'name' => 'class',
                        'label' => esc_html__('Feature Class', 'avas-core'),
                        'description' => esc_html__('The CSS class for the feature DIV element (optional)', 'avas-core'),
                        'type' => Controls_Manager::TEXT,
                    ],

                    [
                        'name' => 'feature_title',
                        'label' => esc_html__('Feature Title', 'avas-core'),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                    ],

                    [
                        'name' => 'feature_subtitle',
                        'label' => esc_html__('Feature Subtitle', 'avas-core'),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                    ],

                    [
                        'name' => 'feature_image',
                        'library' => 'image',
                        'label' => esc_html__('Feature Image.', 'avas-core'),
                        'description' => esc_html__('An icon image or a bitmap which best represents the feature we are capturing', 'avas-core'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                    ],

                    [
                        'name' => 'feature_text',
                        'type' => Controls_Manager::WYSIWYG,
                        "label" => esc_html__("Text", 'avas-core'),
                        "description" => esc_html__("The feature content.", 'avas-core'),
                        "default" => esc_html__("Feature content goes here.", 'avas-core'),
                        'show_label' => true,
                    ],

                   

                ],
                //'title_field' => '{{{ feature_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_features_style',
            [
                'label' => esc_html__('General', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'tiled',
            [
                'type' => Controls_Manager::SWITCHER,
                'label' => esc_html__('Apply Tiled Design?', 'avas-core'),
                'label_off' => esc_html__('No', 'avas-core'),
                'label_on' => esc_html__('Yes', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'features_spacing',
            [
                'label' => esc_html__('Features Spacing', 'avas-core'),
                'description' => esc_html__('Takes effect only if tiled design has not been applied', 'avas-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 80,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .lae-features:not(.lae-tiled) .lae-feature' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_features_title',
            [
                'label' => esc_html__('Title', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'avas-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => esc_html__('H1', 'avas-core'),
                    'h2' => esc_html__('H2', 'avas-core'),
                    'h3' => esc_html__('H3', 'avas-core'),
                    'h4' => esc_html__('H4', 'avas-core'),
                    'h5' => esc_html__('H5', 'avas-core'),
                    'h6' => esc_html__('H6', 'avas-core'),
                    'div' => esc_html__('div', 'avas-core'),
                ],
                'default' => 'h3',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-features .lae-feature .lae-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .lae-features .lae-feature .lae-title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_features_subtitle',
            [
                'label' => esc_html__('Subtitle', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-features .lae-feature .lae-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .lae-features .lae-feature .lae-subtitle',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_features_text',
            [
                'label' => esc_html__('Text', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-features .lae-feature .lae-feature-details' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'selector' => '{{WRAPPER}} .lae-features .lae-feature .lae-feature-details',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings();
        ?>

        <?php $class = (($settings['tiled'] == 'yes') ? 'lae-tiled ' . $settings['feature_class'] : $settings['feature_class']); ?>

        <div class="lae-features lae-container <?php echo esc_attr($class); ?>">

            <?php foreach ($settings['features'] as $feature): ?>

                <div class="lae-feature lae-image-text-toggle <?php echo esc_attr($feature['class']); ?>">

                  

                    <div class="lae-feature-image lae-image-content <?php echo $animate_class; ?>">

                        <?php if (!empty($feature['feature_image'])): ?>

                            <?php $image_html = bddex_get_image_html($feature['feature_image'], 'thumbnail_size', $settings); ?>

                            <?php echo $image_html; ?>

                        <?php endif; ?>

                    </div>

                  

                    <div class="lae-feature-text lae-text-content <?php echo $animate_class; ?>">

                        <div class="lae-subtitle"><?php echo esc_html($feature['feature_subtitle']) ?></div>

                        <<?php echo esc_html($settings['title_tag']); ?> class="lae-title"><?php echo esc_html($feature['feature_title']) ?></<?php echo esc_html($settings['title_tag']); ?>>

                    <div class="lae-feature-details"><?php echo $this->parse_text_editor($feature['feature_text']) ?></div>

                </div>

                </div>

                <?php

            endforeach;

            ?>

            </div>

        <?php
    }

    protected function content_template() {
    }

}
Plugin::instance()->widgets_manager->register_widget_type( new Bddex_Features_Widget() );