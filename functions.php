<?php

//loading style and script
function enqueue_resources() {
    $template_dir_uri = get_template_directory_uri();

    wp_enqueue_style(
        'event-theme-style',
        get_stylesheet_uri(),
        [],
        '0.02'
    );
    
    wp_enqueue_script(
        'custom-jquery',
        'https://code.jquery.com/jquery-3.6.0.min.js',
        ['jquery'],
        '3.6.0',
        false 
    );

    wp_enqueue_script(
        'slick-slider',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
        ['jquery'],
        '1.8.1',
        false 
    );

    wp_enqueue_script(
        'custom-script',
        $template_dir_uri . '/assets/js/script.js', 
        array('jquery'),
        '1.0',
        false 
    );
}
add_action('wp_enqueue_scripts', 'enqueue_resources');
