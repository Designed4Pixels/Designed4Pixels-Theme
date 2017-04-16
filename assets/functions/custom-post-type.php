<?php
/* joints Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

*/


// let's create the function for the custom type
function d4p_custom_post_setup() {

	$content_type =  get_option( 'd4p_content_type' );

	$content_name = ucfirst ( $content_type );

	// creating (registering) the custom type 
	register_post_type( $content_type, 														/* (http://codex.wordpress.org/Function_Reference/register_post_type) */

	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __( $content_name, 'designed4pixels'), 									/* This is the Title of the Group */
			'singular_name' => __($content_name, 'designed4pixels'), 							/* This is the individual type */
			'all_items' => __('All Posts', 'designed4pixels'), 							/* the all items menu item */
			'add_new' => __('Add New', 'designed4pixels'), 										/* The add new menu item */
			'add_new_item' => __('Add New Custom Type', 'designed4pixels'), 					/* Add New Display Title */
			'edit' => __( 'Edit', 'designed4pixels' ), 											/* Edit Dialog */
			'edit_item' => __('Edit Post Types', 'designed4pixels'), 							/* Edit Display Title */
			'new_item' => __('New Post Type', 'designed4pixels'), 								/* New Display Title */
			'view_item' => __('View Post Type', 'designed4pixels'), 							/* View Display Title */
			'search_items' => __('Search Post Type', 'designed4pixels'), 						/* Search Custom Type Title */ 
			'not_found' =>  __('No Posts Available.', 'designed4pixels'), 			/* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'designed4pixels'), 			/* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example custom post type', 'designed4pixels' ), 	/* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, 																/* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-grid-view', 													/* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> array( 'slug' => $content_type, 'with_front' => false ), 			/* you can specify its url slug */
			'has_archive' => $content_type, 													/* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type('category', $content_type);
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', $content_type);
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'd4p_custom_post_setup');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
    register_taxonomy( 'custom_cat', 
    	array( get_site_option( 'd4p_content_type' ) ), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Custom Categories', 'designed4pixels' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Custom Category', 'designed4pixels' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Custom Categories', 'designed4pixels' ), /* search title for taxomony */
    			'all_items' => __( 'All Custom Categories', 'designed4pixels' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Custom Category', 'designed4pixels' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Custom Category:', 'designed4pixels' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Custom Category', 'designed4pixels' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Custom Category', 'designed4pixels' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Custom Category', 'designed4pixels' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Custom Category Name', 'designed4pixels' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'custom-slug' ),
    	)
    );   
    
	// now let's add custom tags (these act like categories)
    register_taxonomy( 'custom_tag', 
    	array( get_site_option( 'd4p_content_type' ) ), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => false,    /* if this is false, it acts like tags */                
    		'labels' => array(
    			'name' => __( 'Custom Tags', 'designed4pixels' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Custom Tag', 'designed4pixels' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Custom Tags', 'designed4pixels' ), /* search title for taxomony */
    			'all_items' => __( 'All Custom Tags', 'designed4pixels' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Custom Tag', 'designed4pixels' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Custom Tag:', 'designed4pixels' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Custom Tag', 'designed4pixels' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Custom Tag', 'designed4pixels' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Custom Tag', 'designed4pixels' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Custom Tag Name', 'designed4pixels' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
    	)
    ); 