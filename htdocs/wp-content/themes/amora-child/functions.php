<?php

add_action( 'wp_enqueue_scripts', 'amora_child_enqueue_styles', 11);
function amora_child_enqueue_styles() {

    $parentStyle = 'parent-style';
    //$moove_gdpr_frontend = 'moove_gdpr_frontend';
    //$currentTemplateStyle = 'current-template-style';

    wp_dequeue_style( 'amora-style' ); // <-- Must dequeue this style as the parent theme incorrectly uses get_stylesheet_uri when enqueuing this style thus giving path to child theme style
    wp_enqueue_style( $parentStyle, get_template_directory_uri().'/style.css' ); // <-- Now enqueue the parent style and reference it here below
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parentStyle),
        wp_get_theme()->get('Version')
    ); // Don't forget to change the version number of the child template if you want to cache bust the css with the users
    
    //wp_enqueue_script('custom-scripts', get_stylesheet_directory_uri() . '/assets/js/custom.js');
}

?>