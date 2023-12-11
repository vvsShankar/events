
<?php
/*
    Plugin Name: Event Details
    Description: Event informtaions.
    Version: 1.0
    Author: Vishnu vijay sankar
*/

function event_details_register_block() {
    wp_register_script(
        'event-details-block-script',
        plugins_url('event-details.js', __FILE__),
        array('wp-blocks', 'wp-editor', 'wp-components', 'wp-element')
    );

    register_block_type('custom-event/event-details', array(
        'editor_script' => 'event-details-block-script',
    ));
}
add_action('init', 'event_details_register_block');
?>
