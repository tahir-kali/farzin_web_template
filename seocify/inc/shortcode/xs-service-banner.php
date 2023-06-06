<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class XS_Service_banenr_Widget extends Widget_Base {

    public function get_name() {
        return 'xs-service-banner';
    }

    public function get_title() {
        return esc_html__( 'Seocify Service Banner', 'seocify' );
    }

    public function get_icon() {
        return 'eicon-banner';
    }

    public function get_categories() {
        return [ 'seocify-elements' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'service_banner',
            [
                'label' => esc_html__('Service Banner', 'seocify'),
            ]
        ); 
        $this->add_control(
            'left_image',
            [
                'label' =>esc_html__( 'Left banner image', 'seocify' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
		$this->add_control(
			'banner_link',
			[
				'label' =>esc_html__( 'Banner Link', 'seocify' ),
				'type' => Controls_Manager::URL,
				'placeholder' =>esc_html__('http://your-link.com','seocify' ),
				'default' => [
					'url' => '#',
				],
			]
		);

        $this->add_control(
            'get_in_touch_image',
            [
                'label' =>esc_html__( 'Get in touch image', 'seocify' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
			'get_in_touch_link',
			[
				'label' =>esc_html__( 'Get in touch Link', 'seocify' ),
				'type' => Controls_Manager::URL,
				'placeholder' =>esc_html__('http://your-link.com','seocify' ),
				'default' => [
					'url' => '#',
				],
			]
		);

        /*Service Banner*/

        $repeater = new Repeater();

		$repeater->add_control(
			'title', [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Title', 'seocify'),
                'default'   =>  esc_html__('2.4M','seocify'),
                'label_block' => true,
			]
		);

		$repeater->add_control(
			'description', [
                'type' => Controls_Manager::TEXTAREA,
                'label' => esc_html__('Hours of Expertise', 'seocify'),
                'label_block' => true,
			]
		);

		$repeater->add_control(
			'image',
			[
                'type' => Controls_Manager::MEDIA,
                'label' => esc_html__('Icon image', 'seocify'),
                'label_block' => true,
			]
		);

		$repeater->add_control(
			'extra_class',
			[
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Extra Class', 'seocify'),
                'label_block' => true,
			]
		);

		$this->add_control(
			'service_banner_items',
			[
				'label' => __( 'Service Banner', 'seocify' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => esc_html__('2.4M','seocify'),
                        'description' => esc_html__('Hours of Expertise','seocify'),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
        
        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_style',
            [
                'label' 	=> esc_html__( 'Title Styles', 'seocify' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'		=> esc_html__( 'Title Color', 'seocify' ),
                'type'		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-banner h4' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Typography', 'seocify'),
                'selector' => '{{WRAPPER}} .single-service-banner:hover h4',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_image_style',
            [
                'label' 	=> esc_html__( 'Circle Style', 'seocify' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'circle_bg_color',
            [
                'label'		=> esc_html__( 'Circle BG Color', 'seocify' ),
                'type'		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-banner .service-banner-icon' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_section();


    }

    protected function render( ) {
        $settings = $this->get_settings();
        extract($settings);
        ?>
        <div class="service-fact-area">
            <div class="row no-gutters">
                <div class=" col-lg-6">
                    <a href="<?php echo esc_url($banner_link['url']);?>" class="campaign-banner">
                        <?php echo wp_get_attachment_image( $left_image['id'], 'full',"",array(
                                'alt'  =>  get_the_title($left_image['id']),
                            )); ?>
                    </a>
                </div>
                <div class=" col-lg-6">
                    <ul class="campaign-fact-list">
                        
                    <?php foreach($service_banner_items as $key => $service_banner_item):

                        $active = ($key == 0) ? 'active' : '';
                        $id_int = 'workprocess-id-' . substr($this->get_id_int(), 0, 3);
                    ?>
                        <li>
                            <div class="media single-fact <?php echo esc_attr(($service_banner_item['extra_class'] != '') ? $service_banner_item['extra_class'] : ''); ?>">
                                <div class="campaign-fact-icon">
                                <?php echo wp_get_attachment_image( $service_banner_item['image']['id'], 'full',"",array(
                                    'alt'  =>  get_the_title($service_banner_item['image']['id']),
                                )); ?>
                                    
                                </div>
                                <div class="media-body align-self-center">
                                    <h3 class="fact"><?php echo esc_html($service_banner_item['title']);?></h3>
                                    <h4 class="fact-title"><?php echo esc_html($service_banner_item['description']);?></h4>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="getintouch">
                <a href="<?php echo esc_url($get_in_touch_link['url']);?>"><?php echo wp_get_attachment_image( $get_in_touch_image['id'], 'full',"",array(
                                'alt'  =>  get_the_title($get_in_touch_image['id']),
                            )); ?></a>
            </div>
        </div>
        <?php
    }


    protected function content_template() { }
}