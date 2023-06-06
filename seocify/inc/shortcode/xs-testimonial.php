<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Xs_Testimonial_Widget extends Widget_Base {

    public function get_name() {
        return 'xs-testimonial';
    }

    public function get_title() {
        return esc_html__( 'Seocify Testimonial', 'seocify' );
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return ['seocify-elements'];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_tab_style',
            [
                'label' => esc_html__('Seocify Testimonial', 'seocify'),
            ]
        );
        $this->add_control(

            'testimonial_style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Style', 'seocify'),
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Style 1', 'seocify'),
                    'style2' => esc_html__('Style 2', 'seocify'),
                    'style3' => esc_html__('Style 3', 'seocify'),
                    'style4' => esc_html__('Style 4', 'seocify'),
                ],
            ]
        );

        $this->add_control(
            'seocify_hide_navigation',
            [
                'label' => esc_html__( 'Navigation', 'seocify' ),
                'type' =>  Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'seocify' ),
                'label_off' => esc_html__( 'Hide', 'seocify' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' =>[
                    'testimonial_style' => 'style3'
                ]
            ]
        );


        $this->add_control(
            'show_watermark',
            [
                'type' => Controls_Manager::SWITCHER,
                'label' => esc_html__('Show Watermark', 'seocify'),
                'label_block'       => true,
                'default' => 'label_on',
                'label_on' => esc_html__( 'Yes', 'seocify' ),
                'label_off' => esc_html__( 'No', 'seocify' ),
            ]
        );
        $this->add_control(
            'watermark_style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Watermark Style', 'seocify'),
                'default' => 'big',
                'options' => [
                    'big' => esc_html__('Big', 'seocify'),
                    'small' => esc_html__('Small', 'seocify'),
                ],
                'condition' => [
                    'show_watermark' => 'yes'
                ],
            ]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'client_name', [
                'label' => esc_html__('Client Name', 'seocify'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Testimonial #1', 'seocify'),
                'label_block' => true,
			]
		);

		$repeater->add_control(
			'review', [
                'label' => esc_html__('Testimonial', 'seocify'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
			]
		);

		$repeater->add_control(
			'designation',
			[
                'label' => esc_html__('Designation', 'seocify'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);

		$repeater->add_control(
			'image',
			[
                'label' => esc_html__('Image', 'seocify'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'label_block' => true,
			]
		);

		$repeater->add_control(
			'icon',
			[
                'label' => esc_html__('Icon', 'seocify'),
                'type' => Controls_Manager::ICON,
                'default' => 'icon icon-quote2',
                'label_block' => true,
			]
		);

		$this->add_control(
			'testimonial',
			[
				'label' => __( 'Testimonial', 'seocify' ),
				'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'separator' => 'before',
				'default' => [
					[
                        'client_name' => esc_html__('Testimonial #1', 'seocify'),
                        'review' => esc_html__('Our best-in-class WordPress solution with additio nal optiz ation to make an running a ', 'seocify'),
                        'designation' => esc_html__('CEO, Pranklin Agency', 'seocify'),
                        'image' => Utils::get_placeholder_image_src(),
                        'icon' => 'icon icon-quote2',
                    ],

                    [
                        'client_name' => esc_html__('Testimonial #1', 'seocify'),
                        'review' => esc_html__('Our best-in-class WordPress solution with additio nal optiz ation to make an running a ', 'seocify'),
                        'designation' => esc_html__('CEO, Pranklin Agency', 'seocify'),
                        'image' => Utils::get_placeholder_image_src(),
                        'icon' => 'icon icon-quote2',
                    ],

                    [
                        'client_name' => esc_html__('Testimonial #1', 'seocify'),
                        'review' => esc_html__('Our best-in-class WordPress solution with additio nal optiz ation to make an running a ', 'seocify'),
                        'designation' => esc_html__('CEO, Pranklin Agency', 'seocify'),
                        'image' => Utils::get_placeholder_image_src(),
                        'icon' => 'icon icon-quote2',
                    ],
				],
				'title_field' => '{{{ client_name }}}',
			]
		);

        $this->end_controls_section();

        /**
         *
         * Client Name
         *
         */

        $this->start_controls_section(
            'section_name_style',
            [
                'label' => esc_html__('Name', 'seocify'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label' => esc_html__( 'Color', 'seocify' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .single-bio-thumb h4 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .xs-seocify-testimonial-review > h4 ' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'label' => esc_html__( 'Typography', 'seocify' ),
                'selector' => ' {{WRAPPER}} .single-bio-thumb h4, {{WRAPPER}} .xs-seocify-testimonial-review > h4 ',
            ]
        );

        $this->end_controls_section();


        /**
         *
         * Designnation Name
         *
         */

        $this->start_controls_section(
            'section_deg_style',
            [
                'label' => esc_html__('designation', 'seocify'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'deg_color',
            [
                'label' => esc_html__( 'Center Color', 'seocify' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .single-bio-thumb p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .xs-seocify-testimonial-review > h5' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'deg_typography',
                'label' => esc_html__( 'Typography', 'seocify' ),
                'selector' => ' {{WRAPPER}} .single-bio-thumb p, {{WRAPPER}} .xs-seocify-testimonial-review > h5',
            ]
        );

        $this->end_controls_section();

        /**
         *
         * Testimonial
         *
         */


        $this->start_controls_section(
            'section_testimonial_style',
            [
                'label' => esc_html__('Testimonial', 'seocify'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'tetimonial_color',
            [
                'label' => esc_html__( 'Text Color', 'seocify' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial-preview p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .single-testimonial-preview .border-line::before' => 'border-'.(is_rtl()) ? 'left' : 'right' .'-color: {{VALUE}} !important;',
                    '{{WRAPPER}} .single-testimonial-preview .border-line::after' => 'border-'.(is_rtl()) ? 'left' : 'right' .'-color: {{VALUE}} !important;',
                    '{{WRAPPER}} .single-testimonial-preview .border-line' => 'background-color: {{VALUE}}; box-shadow: 10px 0px 0px 0px rgba(0, 0, 0, 0), 138px 0px 0px {{VALUE}};',
                    '{{WRAPPER}} .xs-seocify-testimonial-review > p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'testimonial_typography',
                'label' => esc_html__( 'Typography', 'seocify' ),
                'selector' => '{{WRAPPER}} .single-testimonial-preview p, {{WRAPPER}} .xs-seocify-testimonial-review > p',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_watermark_style',
            [
                'label' => esc_html__('Watermark', 'seocify'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'watermark_color',
            [
                'label' => esc_html__( 'Color', 'seocify' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .big-watermark-icon .icon-quote' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_review_style',
            [
                'label' => esc_html__('Extra', 'seocify'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'testimonial_style' => ['style3', 'style4']
                ]
            ]
        );

        $this->add_control(
            'seocify_reviews_color',
            [
                'label' => esc_html__( 'Reviews Color', 'seocify' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fec42d',
                'selectors' => [
                    '{{WRAPPER}} .xs-seocify-testimonial-rating i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'seocify_arrows_color',
            [
                'label' => esc_html__( 'Arrors Color', 'seocify' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fec42d',
                'selectors' => [
                    '{{WRAPPER}} .xs-seocify-testimonial-preview .swiper-button-next' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .xs-seocify-testimonial-preview .swiper-button-prev' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


    }

    protected function render( ) {

        $settings = $this->get_settings();
        $testimonials = $settings['testimonial'];
        $style = $settings['testimonial_style'];
        $show_watermark = $settings['show_watermark'];
        $watermark_style = $settings['watermark_style'];
        $seocify_hide_navigation = $settings['seocify_hide_navigation'];

        require SEOCIFY_SHORTCODE_DIR_STYLE .'/testimonial/'.$style.'.php';

    }

    protected function content_template() { }
}