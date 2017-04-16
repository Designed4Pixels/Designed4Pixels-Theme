<?php
/*
  THEME CUSTOMIZER Functions and Support for 'Designed4Pixels' theme

  NOTES

  - This file adds support and settings for the WordPress Theme Customizer
  - You can find more info at:  https://codex.wordpress.org/Theme_Customization_API
  - To customize your theme visit Appearance > Themes > Customize
  - Do not modify this file directly, use a child theme instead

*/


  /**
  * Custom Active Callback Functions for Home Page Feature Sections.
  */

  function d4p_image_feature_on_home_page() {
    return ( is_active_widget( false, false, 'designed4pixels_image_feature', true ) && is_front_page() );
  }

  function d4p_parallax_feature_on_home_page() {
    return ( is_active_widget( false, false, 'designed4pixels_parallax_feature', true ) && is_front_page() );
  }

  function d4p_icon_feature_on_home_page() {
    return ( is_active_widget( false, false, 'designed4pixels_icon_box_feature', true ) && is_front_page() && ( 'custom' == get_theme_mod( 'd4p_color_scheme' )) );
  }

  function d4p_cta_feature_on_home_page() {
    return ( is_active_widget( false, false, 'designed4pixels_call_to_action_feature', true ) && is_front_page() && ( 'custom' == get_theme_mod( 'd4p_color_scheme' )) );
  }

  function d4p_content_feature_on_home_page() {
    return ( is_active_widget( false, false, 'designed4pixels_content_feature', true ) && is_front_page() );
  }

  function d4p_general_colors() {
    return ( 'custom' == get_theme_mod( 'd4p_color_scheme' ));
  }

  function is_blog_or_page() {
    return ( (! is_front_page()));
  }

  function is_portfolio_page() {
    return ( get_post_type( get_the_ID()) == get_option( 'd4p_content_type' ));
  }

  function is_infobar_active() {
    if ( is_active_sidebar( 'top-info-bar-left' ) |  is_active_sidebar( 'top-info-bar-right' ) | is_nav_menu( 'Header Social Icons' ) ) {
      return true;
    } else {
      return false;
    }
  }

  function is_footer_col_active() {
    if ( is_active_sidebar( 'footer-col-1' ) | is_active_sidebar( 'footer-col-2' ) | is_active_sidebar( 'footer-col-3' ) | is_active_sidebar( 'footer-col-4' )) {
      return true;
    } else {
      return false;
    }
  }

  function off_canvas_active() {
    if ( is_active_sidebar( 'off-canvas-left' ) | is_active_sidebar( 'off-canvas-right' )) {
      return true;
    } else {
      return false;
    }
  }

  function off_canvas_top_bottom_active() {
    if ( is_active_sidebar( 'off-canvas-top' ) | is_active_sidebar( 'off-canvas-bottom' )) {
      return true;
    } else {
      return false;
    }
  }

  function d4p_header_output() {
        ?>
 
        <style type="text/css">

          <?php image_css_from_theme_mod( '.logo-img', '', 'background', 'd4p_header_logo_image', 'url(', ')' ); ?> 
          <?php image_css_from_theme_mod( '#title-logo', '', 'background', 'd4p_header_logo_image', 'url(', ')' ); ?>

          <?php 
          $d4p_image_feature_widget_settings = (array) get_theme_mod( 'd4p_image_feature_widget_settings' );
          foreach ( $d4p_image_feature_widget_settings as $widget => $value ) {
              image_css_from_page( '#image-feature-', $value['page_name'], ' .image-feature-' . $widget, '', 'background-image', 'url(', $value['hero_image'], ')' ); 
          } ?>

          <?php 
          $d4p_parallax_features = get_option( 'd4p_parallax_features' );
          foreach ( $d4p_parallax_features as $page_name => $value ) {
              image_css_from_page( '#parallax-', $page_name, ' .parallax-feature', '::before', 'background-image', 'url(', $value, ')' ); 
          } ?>

        </style> 

        <?php
    }
  // Output custom CSS to live site.
  add_action( 'wp_head' , 'd4p_header_output');


  function image_css_from_theme_mod( $selector, $pseudo, $style, $mod_name, $prefix='', $postfix='', $default='', $echo=true ) {
        $return = '';
        $mod = get_theme_mod( $mod_name, sprintf( '%s/assets/images/%s', get_template_directory_uri(), $default ) );
        if ( ! empty( $mod ) ) {
          $return = sprintf( '%s { %s:%s; }',
            $selector.$pseudo,
            $style,
            $prefix.$mod.$postfix
        );
        if ( $echo ) {
            echo $return;
        }
      }
      return $return;
    }

    function image_css_from_page( $id_selector, $page_name, $class_selector, $pseudo, $style, $prefix='', $value, $postfix='', $echo=true ) {
        $return = '';
        $selector = $id_selector . $page_name . $class_selector;
        if ( ! empty( $value ) ) {
          $return = sprintf( '%s { %s:%s; } ',
            $selector.$pseudo,
            $style,
            $prefix.$value.$postfix
        );
        if ( $echo ) {
            echo $return;
        }
      }
      return $return;
    }


    function d4p_customizer_live_preview() {

    wp_register_script( 
      'd4p-theme-customizer',                                                       // Give the script an ID
        get_template_directory_uri() . '/assets/js/theme-customizer.min.js',        // Point to customizer js file
        array( 'jquery','customize-preview' ),                                      // Define dependencies
        '',                                                                         // Define a version (optional) 
        true                                                                        // Put script in footer?
    );

       wp_enqueue_script( 'd4p-theme-customizer' );
         
  }
  // Enqueue live preview javascript in Theme Customizer admin screen.
  add_action( 'customize_preview_init' , 'd4p_customizer_live_preview' );


  function d4p_panels_js() {

    wp_register_script( 
      'd4p-customize-controls',
      get_theme_file_uri( '/assets/js/theme-customizer-controls.min.js' ),
      array( 'customize-controls', 'wp-util' ),
      '1.0',
      true
    );

    wp_enqueue_script( 'd4p-customize-controls' );

    wp_localize_script( 'd4p-customize-controls', 'colorScheme', d4p_color_default_settings() );

  }
  add_action( 'customize_controls_enqueue_scripts', 'd4p_panels_js' );
