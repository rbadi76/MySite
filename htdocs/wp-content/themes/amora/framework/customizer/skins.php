<?php
//Logo Settings
function amora_customize_register_skins( $wp_customize ) {
    //Replace Header Text Color with, separate colors for Title and Description
    $wp_customize->get_section('colors')->title = __('Theme Skins & Colors','amora');
    $wp_customize->get_control('header_textcolor')->label = __('Site Title Color','amora');
    $wp_customize->add_setting('amora_header_desccolor', array(
        'default'     => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'amora_header_desccolor', array(
            'label' => __('Site Tagline Color','amora'),
            'section' => 'colors',
            'settings' => 'amora_header_desccolor',
            'type' => 'color'
        ) )
    );

    //Skins
    $wp_customize->add_setting(
        'amora_skin',
        array(
            'default' => 'default',
            'sanitize_callback' => 'amora_sanitize_skin'
        )
    );

    $skins = array('default' => __('Default(Blue)', 'amora'),
        'red' => __('Roman', 'amora'),
        'pink' => __('Sweet Pink', 'amora'),
        'caribbean-green' => __('Caribbean Green', 'amora'),

    );

    $wp_customize->add_control(
        'amora_skin', array(
            'settings' => 'amora_skin',
            'section' => 'colors',
            'label' => __('Choose from the Skins Below', 'amora'),
            'type' => 'select',
            'choices' => $skins,
        )
    );

    function amora_sanitize_skin($input)
    {
        if (in_array($input, array('default', 'red', 'caribbean-green','pink')))
            return $input;
        else
            return '';
    }
}
add_action( 'customize_register', 'amora_customize_register_skins' );