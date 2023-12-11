<?php
/*
Plugin Name: Custom Events Post Type
Description: Adds a custom posts for Events.
Version: 1.0
Author: Vishnu vijay sankar
*/

function create_events_post_type() {
    $labels = array(
        'name'               => 'Events',
        'singular_name'      => 'Event',
        'menu_name'          => 'Events',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Event',
        'edit_item'          => 'Edit Event',
        'new_item'           => 'New Event',
        'view_item'          => 'View Event',
        'view_items'         => 'View Events',
        'search_items'       => 'Search Events',
        'not_found'          => 'No events found',
        'not_found_in_trash' => 'No events found in trash',
        'all_items'          => 'All Events',
        'archives'           => 'Event Archives',
        'attributes'         => 'Event Attributes',
        'insert_into_item'   => 'Insert into event',
        'uploaded_to_this_item' => 'Uploaded to this event',
        'filter_items_list'  => 'Filter events list',
        'items_list_navigation' => 'Events list navigation',
        'items_list'         => 'Events list',
        'item_published'     => 'Event published.',
        'item_published_privately' => 'Event published privately.',
        'item_reverted_to_draft' => 'Event reverted to draft.',
        'item_scheduled'     => 'Event scheduled.',
        'item_updated'       => 'Event updated.',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'menu_icon'           => 'dashicons-calendar-alt',
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'rewrite'             => array( 'slug' => 'events' ),
        'show_in_rest'        => true,
        'rest_base'           => 'events-api',
    );

    register_post_type( 'event', $args );
}
add_action( 'init', 'create_events_post_type' );


