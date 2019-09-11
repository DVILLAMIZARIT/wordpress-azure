<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


class Widget_bddex_Team_Member extends Widget_Base {

	public function get_name() {
		return 'bddex-team-member';
	}

	public function get_title() {
		return esc_html__( 'Avas Team Member 2', 'avas-core' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

   public function get_categories() {
		return [ 'bddex' ];
	}
	
	
	protected function _register_controls() {

		
  		$this->start_controls_section(
  			'bddex_section_team_member_image',
  			[
  				'label' => esc_html__( 'Team Member Image', 'avas-core' )
  			]
  		);
		

		$this->add_control(
			'bddex_team_member_image',
			[
				'label' => __( 'Team Member Avatar', 'avas-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail',
				'default' => 'full',
				'condition' => [
					'bddex_team_member_image[url]!' => '',
				],
			]
		);


		$this->end_controls_section();

  		$this->start_controls_section(
  			'bddex_section_team_member_content',
  			[
  				'label' => esc_html__( 'Team Member Content', 'avas-core' )
  			]
  		);


		$this->add_control(
			'bddex_team_member_name',
			[
				'label' => esc_html__( 'Name', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'John Doe', 'avas-core' ),
			]
		);
		
		$this->add_control(
			'bddex_team_member_job_title',
			[
				'label' => esc_html__( 'Job Position', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Software Engineer', 'avas-core' ),
			]
		);
		
		$this->add_control(
			'bddex_team_member_description',
			[
				'label' => esc_html__( 'Description', 'avas-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Add team member description here. Remove the text if not necessary.', 'avas-core' ),
			]
		);
		

		$this->end_controls_section();


  		$this->start_controls_section(
  			'bddex_section_team_member_social_profiles',
  			[
  				'label' => esc_html__( 'Social Profiles', 'avas-core' )
  			]
  		);

		$this->add_control(
			'bddex_team_member_enable_social_profiles',
			[
				'label' => esc_html__( 'Display Social Profiles?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		
		
		$this->add_control(
			'bddex_team_member_social_profile_links',
			[
				'type' => Controls_Manager::REPEATER,
				'condition' => [
					'bddex_team_member_enable_social_profiles!' => '',
				],
				'default' => [
					[
						'social' => 'fa fa-facebook',
					],
					[
						'social' => 'fa fa-twitter',
					],
					[
						'social' => 'fa fa-google-plus',
					],
					[
						'social' => 'fa fa-linkedin',
					],
				],
				'fields' => [
					[
						'name' => 'social',
						'label' => esc_html__( 'Icon', 'avas-core' ),
						'type' => Controls_Manager::ICON,
						'label_block' => true,
						'default' => 'fa fa-wordpress',
						'include' => [
							'fa fa-apple',
							'fa fa-behance',
							'fa fa-bitbucket',
							'fa fa-codepen',
							'fa fa-delicious',
							'fa fa-digg',
							'fa fa-dribbble',
							'fa fa-envelope',
							'fa fa-facebook',
							'fa fa-flickr',
							'fa fa-foursquare',
							'fa fa-github',
							'fa fa-google-plus',
							'fa fa-houzz',
							'fa fa-instagram',
							'fa fa-jsfiddle',
							'fa fa-linkedin',
							'fa fa-medium',
							'fa fa-pinterest',
							'fa fa-product-hunt',
							'fa fa-reddit',
							'fa fa-shopping-cart',
							'fa fa-slideshare',
							'fa fa-snapchat',
							'fa fa-soundcloud',
							'fa fa-spotify',
							'fa fa-stack-overflow',
							'fa fa-tripadvisor',
							'fa fa-tumblr',
							'fa fa-twitch',
							'fa fa-twitter',
							'fa fa-vimeo',
							'fa fa-vk',
							'fa fa-whatsapp',
							'fa fa-wordpress',
							'fa fa-xing',
							'fa fa-yelp',
							'fa fa-youtube',
						],
					],
					[
						'name' => 'link',
						'label' => esc_html__( 'Link', 'avas-core' ),
						'type' => Controls_Manager::URL,
						'label_block' => true,
						'default' => [
							'url' => '',
							'is_external' => 'true',
						],
						'placeholder' => esc_html__( 'Place URL here', 'avas-core' ),
					],
				],
				'title_field' => '<i class="{{ social }}"></i> {{{ social.replace( \'fa fa-\', \'\' ).replace( \'-\', \' \' ).replace( /\b\w/g, function( letter ){ return letter.toUpperCase() } ) }}}',
			]
		);

		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'bddex_section_team_members_styles_general',
			[
				'label' => esc_html__( 'Team Member Styles', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);


		$this->add_control(
			'bddex_team_members_preset',
			[
				'label' => esc_html__( 'Style Preset', 'avas-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'bddex-team-members-simple',
				'options' => [
					'bddex-team-members-simple' 		=> esc_html__( 'Simple Style', 		'avas-core' ),
					'bddex-team-members-overlay' 	=> esc_html__( 'Overlay Style', 	'avas-core' ),
					'bddex-team-members-centered' 	=> esc_html__( 'Centered Style', 	'avas-core' ),
					'bddex-team-members-circle' 		=> esc_html__( 'Circle Style', 	'avas-core' ),
					'bddex-team-members-social-bottom' => esc_html__( 'Social on Bottom', 	'avas-core' ),
				],
			]
		);

		$this->add_control(
			'bddex_team_members_overlay_background',
			[
				'label' => esc_html__( 'Overlay Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,0.8)',
				'selectors' => [
					'{{WRAPPER}} .bddex-team-members-overlay .bddex-team-content' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'bddex_team_members_preset' => 'bddex-team-members-overlay',
				],
			]
		);

		$this->add_control(
			'bddex_team_members_background',
			[
				'label' => esc_html__( 'Content Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-team-item .bddex-team-content' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_team_members_alignment',
			[
				'label' => esc_html__( 'Set Alignment', 'avas-core' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'default' => [
						'title' => __( 'Default', 'avas-core' ),
						'icon' => 'fa fa-ban',
					],
					'left' => [
						'title' => esc_html__( 'Left', 'avas-core' ),
						'icon' => 'fa fa-align-left',
					],
					'centered' => [
						'title' => esc_html__( 'Center', 'avas-core' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'avas-core' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'bddex-team-align-default',
				'prefix_class' => 'bddex-team-align-',
			]
		);

		$this->add_responsive_control(
			'bddex_team_members_padding',
			[
				'label' => esc_html__( 'Content Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-team-item .bddex-team-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bddex_team_members_border',
				'label' => esc_html__( 'Border', 'avas-core' ),
				'selector' => '{{WRAPPER}} .bddex-team-item',
			]
		);

		$this->add_control(
			'bddex_team_members_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .bddex-team-item' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'bddex_team_members_box_shadow',
                'selector' => '{{WRAPPER}} .bddex-team-item',
            ]
        );
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'bddex_section_team_members_image_styles',
			[
				'label' => esc_html__( 'Team Member Image Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);		

		$this->add_responsive_control(
			'bddex_team_members_image_width',
			[
				'label' => esc_html__( 'Image Width', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => '100',
					'unit' => '%',
				],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'size_units' => [ '%', 'px' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-team-item figure img' => 'width:{{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'bddex_team_members_preset!' => 'bddex-team-members-circle'
				]
			]
		);

		$this->add_responsive_control(
			'bddex_team_members_circle_image_width',
			[
				'label' => esc_html__( 'Image Width', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 150,
					'unit' => 'px',
				],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-team-item.bddex-team-members-circle figure img' => 'width:{{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'bddex_team_members_preset' => 'bddex-team-members-circle'
				]
			]
		);

		$this->add_responsive_control(
			'bddex_team_members_circle_image_height',
			[
				'label' => esc_html__( 'Image Height', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 150,
					'unit' => 'px',
				],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-team-item.bddex-team-members-circle figure img' => 'height:{{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'bddex_team_members_preset' => 'bddex-team-members-circle'
				]
			]
		);


		$this->add_responsive_control(
			'bddex_team_members_image_margin',
			[
				'label' => esc_html__( 'Margin', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-team-item figure img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'bddex_team_members_image_padding',
			[
				'label' => esc_html__( 'Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-team-item figure img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bddex_team_members_image_border',
				'label' => esc_html__( 'Border', 'avas-core' ),
				'selector' => '{{WRAPPER}} .bddex-team-item figure img',
			]
		);

		$this->add_control(
			'bddex_team_members_image_rounded',
			[
				'label' => esc_html__( 'Rounded Avatar?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'team-avatar-rounded',
				'default' => '',
			]
		);


		$this->add_control(
			'bddex_team_members_image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .bddex-team-item figure img' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
				'condition' => [
					'bddex_team_members_image_rounded!' => 'team-avatar-rounded',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'bddex_section_team_members_typography',
			[
				'label' => esc_html__( 'Color &amp; Typography', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'bddex_team_members_name_heading',
			[
				'label' => __( 'Member Name', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'bddex_team_members_name_color',
			[
				'label' => esc_html__( 'Member Name Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#272727',
				'selectors' => [
					'{{WRAPPER}} .bddex-team-item .bddex-team-member-name' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_team_members_name_typography',
				'selector' => '{{WRAPPER}} .bddex-team-item .bddex-team-member-name',
			]
		);

		$this->add_control(
			'bddex_team_members_position_heading',
			[
				'label' => __( 'Member Job Position', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'bddex_team_members_position_color',
			[
				'label' => esc_html__( 'Job Position Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#272727',
				'selectors' => [
					'{{WRAPPER}} .bddex-team-item .bddex-team-member-position' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_team_members_position_typography',
				'selector' => '{{WRAPPER}} .bddex-team-item .bddex-team-member-position',
			]
		);

		$this->add_control(
			'bddex_team_members_description_heading',
			[
				'label' => __( 'Member Description', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'bddex_team_members_description_color',
			[
				'label' => esc_html__( 'Description Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#272727',
				'selectors' => [
					'{{WRAPPER}} .bddex-team-item .bddex-team-content .bddex-team-text' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_team_members_description_typography',
				'selector' => '{{WRAPPER}} .bddex-team-item .bddex-team-content .bddex-team-text',
			]
		);


		$this->end_controls_section();

		
		$this->start_controls_section(
			'bddex_section_team_members_social_profiles_styles',
			[
				'label' => esc_html__( 'Social Profiles Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);		


		$this->add_control(
			'bddex_team_members_social_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-team-member-social-link > a' => 'width: {{SIZE}}px; height: {{SIZE}}px; line-height: {{SIZE}}px;',
				],
			]
		);

		$this->add_responsive_control(
			'bddex_team_members_social_profiles_padding',
			[
				'label' => esc_html__( 'Social Profiles Spacing', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-team-content > .bddex-team-member-social-profiles' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->start_controls_tabs( 'bddex_team_members_social_icons_style_tabs' );

		$this->start_controls_tab( 'normal', [ 'label' => esc_html__( 'Normal', 'avas-core' ) ] );

		$this->add_control(
			'bddex_team_members_social_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f1ba63',
				'selectors' => [
					'{{WRAPPER}} .bddex-team-member-social-link > a' => 'color: {{VALUE}};',
				],
			]
		);
		
		
		$this->add_control(
			'bddex_team_members_social_icon_background',
			[
				'label' => esc_html__( 'Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-team-member-social-link > a' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bddex_team_members_social_icon_border',
				'selector' => '{{WRAPPER}} .bddex-team-member-social-link > a',
			]
		);
		
		$this->add_control(
			'bddex_team_members_social_icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-team-member-social-link > a' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_team_members_social_icon_typography',
				'selector' => '{{WRAPPER}} .bddex-team-member-social-link > a',
			]
		);

		
		$this->end_controls_tab();

		$this->start_controls_tab( 'bddex_team_members_social_icon_hover', [ 'label' => esc_html__( 'Hover', 'avas-core' ) ] );

		$this->add_control(
			'bddex_team_members_social_icon_hover_color',
			[
				'label' => esc_html__( 'Icon Hover Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ad8647',
				'selectors' => [
					'{{WRAPPER}} .bddex-team-member-social-link > a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_team_members_social_icon_hover_background',
			[
				'label' => esc_html__( 'Hover Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-team-member-social-link > a:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_team_members_social_icon_hover_border_color',
			[
				'label' => esc_html__( 'Hover Border Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-team-member-social-link > a:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_tab();
		
		$this->end_controls_tabs();


		$this->end_controls_section();


	}


	protected function render( ) {
		
      $settings = $this->get_settings();
      $team_member_image = $this->get_settings( 'bddex_team_member_image' );
	  $team_member_image_url = Group_Control_Image_Size::get_attachment_image_src( $team_member_image['id'], 'thumbnail', $settings );
	  if( empty( $team_member_image_url ) ) : $team_member_image_url = $team_member_image['url']; else: $team_member_image_url = $team_member_image_url; endif;
	  $team_member_classes = $this->get_settings('bddex_team_members_preset') . " " . $this->get_settings('bddex_team_members_image_rounded');
	
	?>


	<div id="bddex-team-member-<?php echo esc_attr($this->get_id()); ?>" class="bddex-team-item <?php echo $team_member_classes; ?>">
		<div class="bddex-team-item-inner">
			<div class="bddex-team-image">
				<figure>
					<img src="<?php echo esc_url($team_member_image_url);?>" alt="<?php echo $settings['bddex_team_member_name'];?>">
				</figure>
			</div>

			<div class="bddex-team-content">
				<h3 class="bddex-team-member-name"><?php echo $settings['bddex_team_member_name']; ?></h3>
				<h4 class="bddex-team-member-position"><?php echo $settings['bddex_team_member_job_title']; ?></h4>
				<?php if( 'bddex-team-members-social-bottom' === $settings['bddex_team_members_preset'] ) : ?>
					<p class="bddex-team-text"><?php echo $settings['bddex_team_member_description']; ?></p>
					<?php if ( ! empty( $settings['bddex_team_member_enable_social_profiles'] ) ): ?>
					<ul class="bddex-team-member-social-profiles">
						<?php foreach ( $settings['bddex_team_member_social_profile_links'] as $item ) : ?>
							<?php if ( ! empty( $item['social'] ) ) : ?>
								<?php $target = $item['link']['is_external'] ? ' target="_blank"' : ''; ?>
								<li class="bddex-team-member-social-link">
									<a href="<?php echo esc_attr( $item['link']['url'] ); ?>"<?php echo $target; ?>><i class="<?php echo esc_attr($item['social'] ); ?>"></i></a>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
				<?php else: ?>
					<?php if ( ! empty( $settings['bddex_team_member_enable_social_profiles'] ) ): ?>
					<ul class="bddex-team-member-social-profiles">
						<?php foreach ( $settings['bddex_team_member_social_profile_links'] as $item ) : ?>
							<?php if ( ! empty( $item['social'] ) ) : ?>
								<?php $target = $item['link']['is_external'] ? ' target="_blank"' : ''; ?>
								<li class="bddex-team-member-social-link">
									<a href="<?php echo esc_attr( $item['link']['url'] ); ?>"<?php echo $target; ?>><i class="<?php echo esc_attr($item['social'] ); ?>"></i></a>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
					<p class="bddex-team-text"><?php echo $settings['bddex_team_member_description']; ?></p>
				<?php endif; ?>
				
			</div>
		</div>
	</div>

	
	<?php
	
	}

	protected function content_template() {
		
		?>
		
	
		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_bddex_Team_Member() );