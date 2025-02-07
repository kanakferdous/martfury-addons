<?php

namespace MartfuryAddons\Elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Banner Small widget
 */
class Banner_Medium extends Widget_Base {
	/**
	 * Retrieve the widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'martfury-banner-medium';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Banner Medium', 'martfury' );
	}


	/**
	 * Retrieve the widget icon.
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-banner';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'martfury' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_banner',
			[ 'label' => esc_html__( 'Banner', 'martfury' ) ]
		);
		$this->start_controls_tabs( 'banner_content_settings' );


		$this->start_controls_tab( 'content', [ 'label' => esc_html__( 'Content', 'martfury' ) ] );

		$this->add_control(
			'highlight_title',
			[
				'label'       => esc_html__( 'Highlight Title', 'martfury' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'This is', 'martfury' ),
				'placeholder' => esc_html__( 'Enter your title', 'martfury' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'highlight_title_position',
			[
				'label'   => esc_html__( 'Position', 'martfury' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					''      => esc_html__( 'Left The Title', 'martfury' ),
					'right' => esc_html__( 'Right The Title', 'martfury' ),
					'under' => esc_html__( 'Under The Title', 'martfury' ),
					'above' => esc_html__( 'Above The Title', 'martfury' ),
				],
				'default' => '',

			]
		);

		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'martfury' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( ' the <br> title', 'martfury' ),
				'placeholder' => esc_html__( 'Enter your title', 'martfury' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'desc',
			[
				'label'       => esc_html__( 'Description', 'martfury' ),
				'type'        => Controls_Manager::WYSIWYG,
				'default'     => __( 'Just <span style="color: #690">$159.99</span>', 'martfury' ),
				'placeholder' => esc_html__( 'Enter your description', 'martfury' ),
				'label_block' => true,
			]
		);


		$this->add_control(
			'button_text', [
				'label'         => esc_html__( 'Button Text', 'martfury' ),
				'type'          => Controls_Manager::TEXT,
				'show_external' => true,
				'default'       => esc_html__( 'Shop Now', 'martfury' ),
			]
		);

		$this->add_control(
			'button_link', [
				'label'         => esc_html__( 'Button URL', 'martfury' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://your-link.com', 'martfury' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => false,
					'nofollow'    => false,
				],
			]
		);


		$this->end_controls_tab();

		$this->start_controls_tab( 'background', [ 'label' => esc_html__( 'Background', 'martfury' ) ] );

		$this->add_control(
			'background_color',
			[
				'label'     => esc_html__( 'Color', 'martfury' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-featured-image' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'image',
			[
				'label'     => esc_html__( 'Image', 'martfury' ),
				'type'      => Controls_Manager::MEDIA,
				'selectors' => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-featured-image' => 'background-image: url("{{URL}}");',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'height',
			[
				'label'     => esc_html__( 'Height', 'martfury' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 210,
				],
				'range'     => [
					'px' => [
						'min' => 100,
						'max' => 600,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-content' => 'height: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);


		$this->end_controls_section();


		$this->start_controls_section(
			'section_style_banner',
			[
				'label' => esc_html__( 'Banner', 'martfury' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'banner_padding',
			[
				'label'      => esc_html__( 'Padding', 'martfury' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'    => [
					'top'    => '25',
					'right'  => '30',
					'bottom' => '25',
					'left'   => '30',
				],
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'banner_text_align',
			[
				'label'       => esc_html__( 'Text Align', 'martfury' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => [
					'left'   => [
						'title' => esc_html__( 'Left', 'martfury' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'martfury' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'martfury' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'default'     => 'left',
				'selectors'   => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-content' => 'text-align: {{VALUE}}',
				],
				'separator'   => 'before',
			]
		);

		$this->add_responsive_control(
			'banner_bg_position',
			[
				'label'     => esc_html__( 'Background Position', 'martfury' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					''              => esc_html__( 'Default', 'martfury' ),
					'left top'      => esc_html__( 'Left Top', 'martfury' ),
					'left center'   => esc_html__( 'Left Center', 'martfury' ),
					'left bottom'   => esc_html__( 'Left Bottom', 'martfury' ),
					'right top'     => esc_html__( 'Right Top', 'martfury' ),
					'right center'  => esc_html__( 'Right Center', 'martfury' ),
					'right bottom'  => esc_html__( 'Right Bottom', 'martfury' ),
					'center top'    => esc_html__( 'Center Top', 'martfury' ),
					'center center' => esc_html__( 'Center Center', 'martfury' ),
					'center bottom' => esc_html__( 'Center Bottom', 'martfury' ),
				],
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-featured-image' => 'background-position: {{VALUE}};',
				],

			]
		);

		$this->add_responsive_control(
			'banner_bg_position_custom',
			[
				'label'              => esc_html__( 'Custom Background Position', 'martfury' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ '%', 'px' ],
				'allowed_dimensions' => [ 'left', 'top' ],
				'default'            => [],
				'selectors'          => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-featured-image' => 'background-position: {{LEFT}}{{UNIT}} {{TOP}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'banner_bg_size',
			[
				'label'     => esc_html__( 'Background Size', 'martfury' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					''        => esc_html__( 'Cover', 'martfury' ),
					'auto'    => esc_html__( 'Auto', 'martfury' ),
					'contain' => esc_html__( 'Contain', 'martfury' ),
				],
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-featured-image' => 'background-size: {{VALUE}};',
				],

			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'banner_border',
				'label'     => esc_html__( 'Border', 'martfury' ),
				'selector'  => '{{WRAPPER}} .mf-elementor-banner-medium .banner-content',
				'separator' => 'before',
			]
		);


		$this->end_controls_section();


		$this->start_controls_section(
			'section_style_highlight_title',
			[
				'label' => esc_html__( 'Highlight Title', 'martfury' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'highlight_title_spacing',
			[
				'label'     => esc_html__( 'Spacing', 'martfury' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .mf-elementor-banner-medium.highlight-title-above .banner-title .hl-title' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'highlight_title_position' => 'above',
				],
			]
		);

		$this->add_control(
			'highlight_title_color',
			[
				'label'     => esc_html__( 'Text Color', 'martfury' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-title .hl-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'highlight_title_typography',
				'selector' => '{{WRAPPER}} .mf-elementor-banner-medium .banner-title .hl-title',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_title',
			[
				'label' => esc_html__( 'Title', 'martfury' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_spacing',
			[
				'label'     => esc_html__( 'Spacing', 'martfury' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-title' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label'     => esc_html__( 'Text Color', 'martfury' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-title' => 'color: {{VALUE}}',

				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'heading_typography',
				'selector' => '{{WRAPPER}} .mf-elementor-banner-medium .banner-title',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_description',
			[
				'label' => esc_html__( 'Description', 'martfury' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'description_spacing',
			[
				'label'     => esc_html__( 'Spacing', 'martfury' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-desc' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'description_color',
			[
				'label'     => esc_html__( 'Text Color', 'martfury' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-desc' => 'color: {{VALUE}}',

				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'description_typography',
				'selector' => '{{WRAPPER}} .mf-elementor-banner-medium .banner-desc',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_button',
			[
				'label' => esc_html__( 'Button', 'martfury' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'show_button',
			[
				'label'     => esc_html__( 'Show Button', 'martfury' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'block' => esc_html__( 'Show', 'martfury' ),
					'none'  => esc_html__( 'Hide', 'martfury' ),
				],
				'default'   => 'block',
				'selectors' => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-button' => 'display: {{VALUE}}',

				],
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label'      => esc_html__( 'Padding', 'martfury' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-button .btn-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .mf-elementor-banner-medium .banner-button .btn-button',
			]
		);

		$this->add_control(
			'button_border_width',
			[
				'label'     => esc_html__( 'Border Width', 'martfury' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 20,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-button .btn-button' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label'     => esc_html__( 'Border Radius', 'martfury' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-button .btn-button' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'after',
			]
		);

		$this->start_controls_tabs( 'button_tabs' );

		$this->start_controls_tab( 'normal', [ 'label' => esc_html__( 'Normal', 'martfury' ) ] );

		$this->add_control(
			'button_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'martfury' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-button .btn-button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'martfury' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-button .btn-button' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_border_color',
			[
				'label'     => esc_html__( 'Border Color', 'martfury' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-button .btn-button' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'hover', [ 'label' => esc_html__( 'Hover', 'martfury' ) ] );

		$this->add_control(
			'button_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'martfury' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-button .btn-button:hover' => 'color: {{VALUE}};',
				],

			]
		);

		$this->add_control(
			'button_hover_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'martfury' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-button .btn-button:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label'     => esc_html__( 'Border Color', 'martfury' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mf-elementor-banner-medium .banner-button .btn-button:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	/**
	 * Render icon box widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', [
			'mf-elementor-banner-medium',
			'highlight-title-' . $settings['highlight_title_position']
		] );

		if ( $settings['button_link']['is_external'] ) {
			$this->add_render_attribute( 'link', 'target', '_blank' );
		}

		if ( $settings['button_link']['nofollow'] ) {
			$this->add_render_attribute( 'link', 'rel', 'nofollow' );
		}

		if ( $settings['button_link']['url'] ) {
			$this->add_render_attribute( 'link', 'href', $settings['button_link']['url'] );
		}

		$title           = $settings['title'];
		$highlight_title = $settings['highlight_title'];
		if ( ! empty( $highlight_title ) ) {
			$highlight_title = sprintf( '<span class="hl-title">%s</span>', $settings['highlight_title'] );
		}

		if ( in_array( $settings['highlight_title_position'], array( 'right', 'under' ) ) ) {
			$title .= $highlight_title;
		} else {
			$title = $highlight_title . $title;
		}

		?>
        <div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
            <div class="banner-featured-image"></div>
			<?php if ( $settings['button_link']['url'] ) : ?>
                <a class="link" <?php echo $this->get_render_attribute_string( 'link' ); ?>></a>
			<?php endif; ?>
            <div class="banner-content">
                <h2 class="banner-title"><?php echo $title; ?></h2>
                <div class="banner-desc"><?php echo $settings['desc']; ?></div>
				<?php if ( ! empty( $settings['button_text'] ) ) : ?>
                    <div class="banner-button">
                        <a class="btn-button" <?php echo $this->get_render_attribute_string( 'link' ); ?>><?php echo $settings['button_text']; ?></a>
                    </div>
				<?php endif; ?>
            </div>
        </div>
		<?php
	}

	/**
	 * Render icon box widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */
	protected
	function _content_template() {
		?>
        <#
        view.addRenderAttribute( 'wrapper', 'class', ['mf-elementor-banner-medium', 'highlight-title-' + settings.highlight_title_position]);

        var title           = settings.title;
        var highlight_title = settings.highlight_title;
        if ( highlight_title ) {
        highlight_title = '<span class="hl-title">' + highlight_title + '</span>';
        }

        if ( settings.highlight_title_position == 'right' ||  settings.highlight_title_position == 'under') {
        title += highlight_title;
        } else {
        title = highlight_title + title;
        }

        #>
        <div {{{ view.getRenderAttributeString( 'wrapper' ) }}}>
        <div class="banner-featured-image"></div>
        <div class="banner-content">
            <h2 class="banner-title">{{{title}}}</h2>
            <div class="banner-desc">{{{settings.desc}}}</div>
            <div class="banner-price ">
                <span class="s-price">{{{settings.price}}}</span>
            </div>
            <# if ( settings.button_text ) { #>
            <div class="banner-button">
                <a class="btn-button">{{{settings.button_text}}}</a>
            </div>
            <# } #>
        </div>
        </div>
		<?php
	}
}