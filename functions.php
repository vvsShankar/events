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
 
}
add_action('wp_enqueue_scripts', 'enqueue_resources');
