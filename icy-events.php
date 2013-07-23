<?php
/*
Plugin Name: Icy Events
Plugin Script: icy-events.php
Plugin URI: http://www.icypixels.com/
Description: A simple and handy events post type plugin, which enables you to showcase your events beautifully. Brought to you by <a href="http://www.icypixels.com" title="Icy Pixels WordPress Themes">Icy Pixels</a> (<a href="http://twitter.com/theicypixels/">Twitter</a> | <a href="https://www.facebook.com/pages/Icy-Pixels/170508899756996">Facebook</a>). 
Version: 1.0
License: GPL 3.0
Author: Icy Pixels
Author URI: http://www.icypixels.com
*/


//Creating the Events Custom post type
function icy_create_post_type_events() 
{
	$labels = array(
		'name' => __( 'Event Items','framework'),
		'singular_name' => __( 'Event','framework' ),
		'add_new' => __('Add New','framework'),
		'add_new_item' => __('Add New Event','framework'),
		'new_item' => __('New Event','framework'),
		'edit_item' => __('Edit Event','framework'),
		'view_item' => __('View Event','framework'),
		'search_items' => __('Search Event','framework'),
		'not_found' =>  __('No Event found','framework'),
		'not_found_in_trash' => __('No Event found in Trash','framework'), 
		'parent_item_colon' => ''
	  );    
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
        'rewrite' => array('slug'=>'event','with_front'=>true),
        'has_archive' => true, 
		'supports' => array('title','editor','thumbnail','custom-fields','page-attributes', 'excerpt'),
	  ); 
	  
	  register_post_type(__( 'event', 'framework' ),$args);  
      flush_rewrite_rules(); 
}

// Creating the Event type taxonomy
function icy_build_taxonomies() {
    $labels = array(
        'name' => __( 'Event Type', 'framework' ),
        'singular_name' => __( 'Event Type', 'framework' ),
        'search_items' =>  __( 'Search Event Types', 'framework' ),
        'popular_items' => __( 'Popular Event Types', 'framework' ),
        'all_items' => __( 'All Event Types', 'framework' ),
        'parent_item' => __( 'Parent Event Type', 'framework' ),
        'parent_item_colon' => __( 'Parent Event Type:', 'framework' ),
        'edit_item' => __( 'Edit Event Type', 'framework' ), 
        'update_item' => __( 'Update Event Type', 'framework' ),
        'add_new_item' => __( 'Add New Event Type', 'framework' ),
        'new_item_name' => __( 'New Event Type Name', 'framework' ),
        'separate_items_with_commas' => __( 'Separate Event types with commas', 'framework' ),
        'add_or_remove_items' => __( 'Add or remove Event types', 'framework' ),
        'choose_from_most_used' => __( 'Choose from the most used Event types', 'framework' ),
        'menu_name' => __( 'Event Types', 'framework' )
    );
    
	register_taxonomy(
	    'type', 
	    array( __( 'event', 'framework' )), 
	    array(
	        'hierarchical' => true, 
	        'labels' => $labels,
	        'show_ui' => true,
	        'query_var' => true,
	        'rewrite' => array('slug' => 'type', 'hierarchical' => true)
	    )
	); 
}


/* Call our custom functions ---------------------------------------------*/
add_action( 'init', 'icy_create_post_type_events' );
add_action( 'init', 'icy_build_taxonomies', 0 );

?>