<?php



function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    // Load What-Input files in footer
    // wp_enqueue_script( 'what-input', get_template_directory_uri() . '/assets/js/what-input.min.js', array(), '', true );
    
    // Adding Foundation scripts file in the footer
    wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/assets/js/foundation/foundation.min.js', array( 'jquery' ), '6.0', true );
    
    // Adding scripts file in the footer
    wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/scripts.min.js', array( 'jquery' ), '', true );

    // Load the Scroll-to-Top Script
    wp_enqueue_script( 'scroll-to-top', get_template_directory_uri() . '/assets/js/scroll-to-top.min.js', array(), '', true );
    wp_enqueue_script( 'wp-util' );

    //* Enqueue the Themes Fonts and Icons
    wp_enqueue_style( 'dashicons' );
    wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro', array(), '' ); //?family=Gentium+Basic
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0', 'all' );

    // Register Foundation stylesheet
    wp_enqueue_style( 'foundation-css', get_template_directory_uri() . '/assets/css/foundation/foundation.min.css', array(), '', 'all' );

    // Load our WooCommerce Styles if Plugin Loaded
    if ( class_exists( 'WooCommerce' ) ) {
        wp_enqueue_style( 'woocommerce-css', get_template_directory_uri() . '/assets/css/woocommerce/woocommerce.min.css', array(), '', 'all' );
    }  
   
    // Register main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/style.css', array(), '', 'all' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);


