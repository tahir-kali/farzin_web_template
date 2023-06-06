<?php
if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: optimization
 */


//Block Library Enable/Disable Option
$fields[]= array(
    'type'        => 'switch',
    'label'       =>esc_html__( 'Load Block Library css files?', 'marketo' ),
    'description' => esc_attr__( 'Do you want to load block library css files?', 'marketo' ),
    'settings'    => 'optimization_blocklibrary_enable',
    'section'     => 'optimization_section',
    'default'     => 1,
    'choices'     => array(
        'on'  => esc_attr__( 'Enable', 'seocify' ),
        'off' => esc_attr__( 'Disable', 'seocify' ),
    ),
);

//Fontawesome Enable/Disable Option
$fields[]= array(
    'type'        => 'switch',
    'label'       =>esc_html__( 'Load Fontawesome icons?', 'seocify' ),
    'description' => esc_attr__( 'Do you want to load font awesome icons?', 'seocify' ),
    'settings'    => 'optimization_fontawesome_enable',
    'section'     => 'optimization_section',
    'default'     => 1,
    'choices'     => array(
        'on'  => esc_attr__( 'Enable', 'seocify' ),
        'off' => esc_attr__( 'Disable', 'seocify' ),
    ),
);

//Elementor Icons Enable/Disable Option
$fields[]= array(
    'type'        => 'switch',
    'label'       =>esc_html__( 'Load Elementor Icons?', 'seocify' ),
    'description' => esc_attr__( 'Do you want to load elementor icons?', 'seocify' ),
    'settings'    => 'optimization_elementoricons_enable',
    'section'     => 'optimization_section',
    'default'     => 1,
    'choices'     => array(
        'on'  => esc_attr__( 'Enable', 'seocify' ),
        'off' => esc_attr__( 'Disable', 'seocify' ),
    ),
);

//Elementskit Icons Enable/Disable Option
$fields[]= array(
    'type'        => 'switch',
    'label'       =>esc_html__( 'Load Elementskit Icons?', 'seocify' ),
    'description' => esc_attr__( 'Do you want to load elementskit icons?', 'seocify' ),
    'settings'    => 'optimization_elementkitsicons_enable',
    'section'     => 'optimization_section',
    'default'     => 1,
    'choices'     => array(
        'on'  => esc_attr__( 'Enable', 'seocify' ),
        'off' => esc_attr__( 'Disable', 'seocify' ),
    ),
);

//Dash Icons Enable/Disable Option
$fields[]= array(
    'type'        => 'switch',
    'label'       =>esc_html__( 'Load Dash Icons?', 'seocify' ),
    'description' => esc_attr__( 'Do you want to load dash icons?', 'seocify' ),
    'settings'    => 'optimization_dashicons_enable',
    'section'     => 'optimization_section',
    'default'     => 1,
    'choices'     => array(
        'on'  => esc_attr__( 'Enable', 'seocify' ),
        'off' => esc_attr__( 'Disable', 'seocify' ),
    ),
);

$fields[]= array(
    'type'        => 'switch',
    'label'       =>esc_html__( 'Load Gutenberg?', 'seocify' ),
    'description' => esc_attr__( 'If you are using Gutenberg', 'seocify' ),
    'settings'    => 'optimization_gutenberg_enable',
    'section'     => 'optimization_section',
    'default'     => 1,
    'choices'     => array(
        'on'  => esc_attr__( 'Enable', 'seocify' ),
        'off' => esc_attr__( 'Disable', 'seocify' ),
    ),
);


