<?php
/*
Plugin Name: Compassites Custom Post Type
Plugin URI: https://github.com/balramg/wordpresstest
Description: This plugin will create custompost type of News and Quotes
Author: Balaram Giri
License: GPL2
*/

/*
* Creating a function to create our CPT
*/

function compassites_custom_post_type() {

	register_post_type( 'news',
	    array(
	      'labels' => array(
	        'name' => __( 'News' ),
	        'singular_name' => __( 'news' ),
			'add_new' => __( 'Add new news' ),
            'add_new_item' => __( 'Add new news' ),
            'edit_item' => __( 'Edit news' )
			
	      ),
	      'public' => true,
	      'has_archive' => true,
		  'supports' => array( 'title', 'editor', 'custom-fields' ),
	    )
	  );
  	register_post_type( 'quotes',
  	    array(
  	      'labels' => array(
  	        'name' => __( 'Quotes' ),
  	        'singular_name' => __( 'Quote' ),
			'add_new' => __( 'Add New Quote' ),
            'add_new_item' => __( 'Add New Quote' ),
            'edit_item' => __( 'Edit Quote' )
  	      ),
  	      'public' => true,
  	      'has_archive' => true,
		  'supports' => array( 'title', 'editor', 'custom-fields' ),
  	    )
  	  );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'compassites_custom_post_type', 0 );
