<?php


namespace Elementor;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class BDDEX_Team_Widget extends Widget_Base {

    public function get_name() {
        return 'lae-team-members';
    }

    public function get_title() {
        return esc_html__('Avas Team Members 1', 'avas-core');
    }

    public function get_icon() {
        return 'fa fa-user-o';
    }

    public function get_categories() {
        return array('bddex');
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_team',
            [
                'label' => esc_html__('Team', 'avas-core'),
            ]
        );

        $this->add_control(

            'style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Team Style', 'avas-core'),
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Style 1', 'avas-core'),
                    'style2' => esc_html__('Style 2', 'avas-core'),
                ],
                'prefix_class' => 'lae-team-members-',
            ]
        );

        $this->add_control(
            'per_line',
            [
                'label' => esc_html__('Columns per row', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 6,
                'step' => 1,
                'default' => 3,
                'condition' => [
                    'style' => 'style1',
                ],
            ]
        );


        $this->add_control(
            'team_members',
            [
                'label' => esc_html__('Team Members', 'avas-core'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'member_name' => esc_html__('Team Member #1', 'avas-core'),
                        'member_link' => esc_html__('Enter url', 'avas-core'),
                        'member_position' => esc_html__('CEO', 'avas-core'),
                        'member_details' => esc_html__('I am member details. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'avas-core'),
                    ],
                    [
                        'member_name' => esc_html__('Team Member #2', 'avas-core'),
                        'member_position' => esc_html__('Lead Developer', 'avas-core'),
                        'member_details' => esc_html__('I am member details. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'avas-core'),
                    ],
                    [
                        'member_name' => esc_html__('Team Member #3', 'avas-core'),
                        'member_position' => esc_html__('Finance Manager', 'avas-core'),
                        'member_details' => esc_html__('I am member details. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'avas-core'),
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'member_name',
                        'label' => esc_html__('Member Name', 'avas-core'),
                        'type' => Controls_Manager::TEXT,
                    ],
                    [
                        'name'  => 'member_url',
                        'label' => esc_html__( 'Member url', 'avas-core-core' ),
                        'type'  => Controls_Manager::URL,
                        'placeholder' => 'Example: http://your-website.com',
                        'default'     => [
                            'url' => '',
                        ],
                    ],
                    [
                        'name' => 'member_position',
                        'label' => esc_html__('Position', 'avas-core'),
                        'type' => Controls_Manager::TEXT,
                    ],

                    [
                        'name' => 'member_image',
                        'label' => esc_html__('Team Member Image', 'avas-core'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                    ],
                    [
                        'name' => 'member_details',
                        'label' => esc_html__('Team Member details', 'avas-core'),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => esc_html__('Details about team member', 'avas-core'),
                        'description' => esc_html__('Provide a short writeup for the team member', 'avas-core'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'social_profile',
                        'label' => esc_html__('Social Profile', 'avas-core'),
                        'type' => Controls_Manager::HEADING,
                    ],
                    [
                        'type' => Controls_Manager::TEXT,
                        'name' => 'member_email',
                        'label' => esc_html__('Email Address', 'avas-core'),
                        'description' => esc_html__('Enter the email address of the team member.', 'avas-core'),
                    ],

                    [
                        'type' => Controls_Manager::TEXT,
                        'name' => 'facebook_url',
                        'label' => esc_html__('Facebook Page URL', 'avas-core'),
                        'description' => esc_html__('URL of the Facebook page of the team member.', 'avas-core'),
                    ],

                    [
                        'type' => Controls_Manager::TEXT,
                        'name' => 'twitter_url',
                        'label' => esc_html__('Twitter Profile URL', 'avas-core'),
                        'description' => esc_html__('URL of the Twitter page of the team member.', 'avas-core'),
                    ],

                    [
                        'type' => Controls_Manager::TEXT,
                        'name' => 'linkedin_url',
                        'label' => esc_html__('LinkedIn Page URL', 'avas-core'),
                        'description' => esc_html__('URL of the LinkedIn profile of the team member.', 'avas-core'),
                    ],

                    [
                        'type' => Controls_Manager::TEXT,
                        'name' => 'pinterest_url',
                        'label' => esc_html__('Pinterest Page URL', 'avas-core'),
                        'description' => esc_html__('URL of the Pinterest page for the team member.', 'avas-core'),
                    ],

                    [
                        'type' => Controls_Manager::TEXT,
                        'name' => 'dribbble_url',
                        'label' => esc_html__('Dribbble Profile URL', 'avas-core'),
                        'description' => esc_html__('URL of the Dribbble profile of the team member.', 'avas-core'),
                    ],

                    [
                        'type' => Controls_Manager::TEXT,
                        'name' => 'google_plus_url',
                        'label' => esc_html__('GooglePlus Page URL', 'avas-core'),
                        'description' => esc_html__('URL of the Google Plus page of the team member.', 'avas-core'),
                    ],

                    [
                        'type' => Controls_Manager::TEXT,
                        'name' => 'instagram_url',
                        'label' => esc_html__('Instagram Page URL', 'avas-core'),
                        'description' => esc_html__('URL of the Instagram feed for the team member.', 'avas-core'),
                    ],


                ],
               // 'title_field' => '{{{ member_name }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_team_profiles_style',
            [
                'label' => esc_html__('General', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
                'show_label' => false,
            ]
        );

        $this->add_responsive_control(
            'team_member_spacing',
            [
                'label' => esc_html__('Team Member Spacing', 'avas-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .lae-team-members .lae-team-member-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'isLinked' => false,
                'condition' => [
                    'style' => ['style2'],
                ],
            ]
        );

        $this->add_responsive_control(
            'thumbnail_hover_brightness',
            [
                'label' => esc_html__('Thumbnail Hover Brightness (%)', 'avas-core'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 50,
                ],
                'range' => [
                    'px' => [
                        'max' => 100,
                        'min' => 1,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .lae-team-members .lae-team-member:hover .lae-image-wrapper img' => '-webkit-filter: brightness({{SIZE}}%);-moz-filter: brightness({{SIZE}}%);-ms-filter: brightness({{SIZE}}%); filter: brightness({{SIZE}}%);',
                ],
            ]
        );


        $this->add_control(
            'thumbnail_border_radius',
            [
                'label' => esc_html__('Thumbnail Border Radius', 'avas-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .lae-team-members .lae-team-member .lae-image-wrapper img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'member_img_border',
                'label' => esc_html__( 'Border', 'avas-core' ),
                'selector' => '{{WRAPPER}} .lae-image-wrapper',
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'section_team_member_title',
            [
                'label' => esc_html__('Member Title', 'avas-core'),
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
                    '{{WRAPPER}} .lae-team-members .lae-team-member .lae-team-member-text .lae-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'title_hov_color',
            [
                'label' => esc_html__('Hover Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-team-members .lae-team-member .lae-team-member-text .lae-title:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .lae-team-members .lae-team-member .lae-team-member-text .lae-title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_team_member_position',
            [
                'label' => esc_html__('Member Position', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'position_color',
            [
                'label' => esc_html__('Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-team-members .lae-team-member .lae-team-member-text .lae-team-member-position' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'position_typography',
                'selector' => '{{WRAPPER}} .lae-team-members .lae-team-member .lae-team-member-text .lae-team-member-position',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_team_member_details',
            [
                'label' => esc_html__('Member Details', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-team-members .lae-team-member .lae-team-member-details' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'selector' => '{{WRAPPER}} .lae-team-members .lae-team-member .lae-team-member-details',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'member_details_border',
                'label' => esc_html__( 'Border', 'avas-core' ),
                'selector' => '{{WRAPPER}} .lae-team-member-text',
            ]
        );
        $this->add_responsive_control(
                    'member_details_padding',
                    [
                        'label' => esc_html__( 'Padding', 'avas-core' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', 'em' ],
                        'selectors' => [
                                 '{{WRAPPER}} .lae-team-member-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                         ],
                    ]
                );
        $this->end_controls_section();


        $this->start_controls_section(
            'section_social_icon_styling',
            [
                'label' => esc_html__('Social Icons', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'social_icon_size',
            [
                'label' => esc_html__('Icon size in pixels', 'avas-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em' ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 128,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .lae-team-members .lae-team-member .lae-image-wrapper .lae-social-list i,.lae-team-members-style2 .lae-team-member-wrapper .lae-team-member-text .lae-social-list i' => 'font-size: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->add_control(
            'social_icon_spacing',
            [
                'label' => esc_html__('Spacing', 'avas-core'),
                'description' => esc_html__('Space between icons.', 'avas-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => 0,
                    'right' => 15,
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .lae-team-members .lae-team-member .lae-social-list .lae-social-list-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'isLinked' => false
            ]
        );

        $this->add_control(
            'social_icon_color',
            [
                'label' => esc_html__('Icon Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .lae-team-members .lae-team-member .lae-social-list .lae-social-list-item i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'social_icon_hover_color',
            [
                'label' => esc_html__('Icon Hover Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .lae-team-members .lae-team-member .lae-social-list .lae-social-list-item i:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings();
        ?>

        <?php $column_style = ''; ?>

        <?php if ($settings['style'] == 'style1'): ?>

            <?php $column_style = bddex_get_column_class(intval($settings['per_line'])); ?>

        <?php endif; ?>

        <div class="lae-team-members lae-<?php echo $settings['style']; ?> lae-container">

            <?php foreach ($settings['team_members'] as $team_member): ?>

                <div class="lae-team-member-wrapper <?php echo $column_style; ?>">

                    <div class="lae-team-member">

                        <div class="lae-image-wrapper">

                            <?php $member_image = $team_member['member_image']; ?>

                            <?php if (!empty($member_image)): ?>

                                <?php echo wp_get_attachment_image($member_image['id'], 'full', false, array('class' => 'lae-image full')); ?>

                            <?php endif; ?>

                            <?php if ($settings['style'] == 'style1'): ?>

                                <?php $this->social_profile($team_member) ?>

                            <?php endif; ?>

                        </div>

                        <div class="lae-team-member-text">
                            <?php if($team_member['member_url']['is_external']) { ?>
                            <a href="<?php echo $team_member['member_url']['url']; ?>" target="_blank" ><<?php echo $settings['title_tag']; ?> class="lae-title"><?php echo esc_html($team_member['member_name']) ?></<?php echo $settings['title_tag']; ?>></a>
                            <?php }else{ ?>
                            <a href="<?php echo $team_member['member_url']['url']; ?>"><<?php echo $settings['title_tag']; ?> class="lae-title"><?php echo esc_html($team_member['member_name']) ?></<?php echo $settings['title_tag']; ?>></a>
                            <?php } ?>    
                            <div class="lae-team-member-position">

                                <?php echo do_shortcode($team_member['member_position']) ?>

                            </div>

                            <div class="lae-team-member-details">

                                <?php echo do_shortcode($team_member['member_details']) ?>

                            </div>

                            <?php if ($settings['style'] == 'style2'): ?>

                                <?php $this->social_profile($team_member) ?>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

                <?php

            endforeach;

            ?>

        </div>

        <div class="lae-clear"></div>

        <?php
    }

    private function social_profile($team_member) {
        ?>

        <div class="lae-social-wrap">

            <div class="lae-social-list">

                <?php

                $email = $team_member['member_email'];
                $facebook_url = $team_member['facebook_url'];
                $twitter_url = $team_member['twitter_url'];
                $linkedin_url = $team_member['linkedin_url'];
                $dribbble_url = $team_member['dribbble_url'];
                $pinterest_url = $team_member['pinterest_url'];
                $googleplus_url = $team_member['google_plus_url'];
                $instagram_url = $team_member['instagram_url'];


                if ($email)
                    echo '<div class="lae-social-list-item"><a class="lae-email" href="mailto:' . $email . '" title="' . esc_html__("Email", 'avas-core') . '"><i class="lae-icon-email"></i></a></div>';
                if ($facebook_url)
                    echo '<div class="lae-social-list-item"><a class="lae-facebook" href="' . $facebook_url . '" target="_blank" title="' . esc_html__("Facebook", 'avas-core') . '"><i class="lae-icon-facebook"></i></a></div>';
                if ($twitter_url)
                    echo '<div class="lae-social-list-item"><a class="lae-twitter" href="' . $twitter_url . '" target="_blank" title="' . esc_html__("Twitter", 'avas-core') . '"><i class="lae-icon-twitter"></i></a></div>';
                if ($linkedin_url)
                    echo '<div class="lae-social-list-item"><a class="lae-linkedin" href="' . $linkedin_url . '" target="_blank" title="' . esc_html__("LinkedIn", 'avas-core') . '"><i class="lae-icon-linkedin"></i></a></div>';
                if ($googleplus_url)
                    echo '<div class="lae-social-list-item"><a class="lae-googleplus" href="' . $googleplus_url . '" target="_blank" title="' . esc_html__("Google Plus", 'avas-core') . '"><i class="lae-icon-googleplus"></i></a></div>';
                if ($instagram_url)
                    echo '<div class="lae-social-list-item"><a class="lae-instagram" href="' . $instagram_url . '" target="_blank" title="' . esc_html__("Instagram", 'avas-core') . '"><i class="lae-icon-instagram"></i></a></div>';
                if ($pinterest_url)
                    echo '<div class="lae-social-list-item"><a class="lae-pinterest" href="' . $pinterest_url . '" target="_blank" title="' . esc_html__("Pinterest", 'avas-core') . '"><i class="lae-icon-pinterest"></i></a></div>';
                if ($dribbble_url)
                    echo '<div class="lae-social-list-item"><a class="lae-dribbble" href="' . $dribbble_url . '" target="_blank" title="' . esc_html__("Dribbble", 'avas-core') . '"><i class="lae-icon-dribbble"></i></a></div>';

                ?>

            </div>

        </div>
        <?php
    }

    protected function content_template() {
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new BDDEX_Team_Widget() );