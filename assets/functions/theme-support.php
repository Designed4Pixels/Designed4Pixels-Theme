<?php
	
// Adding WP Functions & Theme Support
function d4p_theme_support() {

	// Add WP Thumbnail Support
	add_theme_support( 'post-thumbnails' );

	// Add RSS Support
	add_theme_support( 'automatic-feed-links' );
	
	// Add Support for WP Controlled Title Tag
	add_theme_support( 'title-tag' );
	
	// Add HTML5 Support
	add_theme_support( 'html5', array( 
	         	'comment-list', 
	         	'comment-form', 
	         	'search-form', 
	) );
	
} /* end theme support */