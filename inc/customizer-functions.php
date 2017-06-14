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

  function d4p_show_posts_feature_on_home_page() {
    return ( is_active_widget( false, false, 'designed4pixels_show_posts_feature', true ) && is_front_page() );
  }

  function d4p_slider_feature_on_home_page() {
    return ( is_active_widget( false, false, 'designed4pixels_slider_feature', true ) && is_front_page() );
  }

  function d4p_general_colors() {
    return ( 'custom' == get_theme_mod( 'd4p_color_scheme' ));
  }

  function is_blog_or_page() {
    return ( (! is_front_page()));
  }

  function is_shop_page() {
    return ( is_shop() );
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
          'd4p-theme-customizer',                                                 // Give the script an ID
          get_template_directory_uri() . '/assets/js/theme-customizer.min.js',    // Point to customizer js file
          array( 'jquery','customize-preview' ),                                  // Define dependencies
          '',                                                                     // Define a version (optional) 
          true                                                                    // Put script in footer?
        );

        wp_enqueue_script( 'd4p-theme-customizer' );

        $google_fonts_list = (array) get_theme_mod( 'd4p_google_fonts_list' );
        wp_localize_script( 'd4p-theme-customizer', 'googleFontList', $google_fonts_list );

        // Retrieve the Content Widget Settings to send to Preview Script
        $content_widget_settings = get_theme_mod( 'd4p_content_feature_widget_settings');
        wp_localize_script( 'd4p-theme-customizer', 'contentFeatList', $content_widget_settings );     
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

    wp_localize_script( 'd4p-customize-controls', 'defaultSettings', d4p_default_settings() );

    $google_fonts_list = (array) get_theme_mod( 'd4p_google_fonts_list' );
    
    $d4p_master_font_one = $google_fonts_list[ get_theme_mod( 'd4p_master_font_one', 'Source Sans Pro') ];
    $d4p_master_font_two = $google_fonts_list[ get_theme_mod( 'd4p_master_font_two', 'Source Sans Pro') ];
    $d4p_master_font_three = $google_fonts_list[ get_theme_mod( 'd4p_master_font_three', 'Source Sans Pro') ];
    $d4p_master_font_four = $google_fonts_list[ get_theme_mod( 'd4p_master_font_four', 'Source Sans Pro') ];
    
    $query_args = array(
            'family' => ''. $d4p_master_font_one . '|' . $d4p_master_font_two . '|' . $d4p_master_font_three . '|' . $d4p_master_font_four .'',
    );
  
  wp_register_style( 'customizer-custom-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), '' );
  wp_enqueue_style( 'customizer-custom-fonts' );

  }
  add_action( 'customize_controls_enqueue_scripts', 'd4p_panels_js' );


  function d4p_google_font_options() {

    $selected_fonts_list = get_theme_mod( 'd4p_selected_fonts_list' );

    foreach ( $selected_fonts_list as $key => $value ) {
        $font_choices[ $key ] = __( $key, 'designed4pixels' );
    }

    return $font_choices;
  }


  function d4p_google_custom_fonts() {

    global $wp_styles;

    $master_font_list = (array) get_theme_mod( 'd4p_google_fonts_list' );

      // Copy the Master Google Font selections into array

      $d4p_master_font_one = get_theme_mod( 'd4p_google_font_option_one', 'Source Sans Pro' );
      $d4p_master_font_two = get_theme_mod( 'd4p_google_font_option_two', 'Source Sans Pro' );
      $d4p_master_font_three = get_theme_mod( 'd4p_google_font_option_three', 'Source Sans Pro' );
      $d4p_master_font_four = get_theme_mod( 'd4p_google_font_option_four', 'Source Sans Pro' );

      $selected_fonts_list = array(
              "Source Sans Pro" => "Source+Sans+Pro",
              $d4p_master_font_one    => $master_font_list[ $d4p_master_font_one ],
              $d4p_master_font_two    => $master_font_list[ $d4p_master_font_two ],
              $d4p_master_font_three  => $master_font_list[ $d4p_master_font_three ],
              $d4p_master_font_four  => $master_font_list[ $d4p_master_font_four ],
      );

      set_theme_mod( 'd4p_selected_fonts_list', $selected_fonts_list );
      set_theme_mod( 'd4p_master_font_one', $d4p_master_font_one );
      set_theme_mod( 'd4p_master_font_two', $d4p_master_font_two );
      set_theme_mod( 'd4p_master_font_three', $d4p_master_font_three );
      set_theme_mod( 'd4p_master_font_four', $d4p_master_font_four );
    
    $query_args = array(
    'family' => ''. $master_font_list[ $d4p_master_font_one ] . '|' . $master_font_list[ $d4p_master_font_two ] . '|' . $master_font_list[ $d4p_master_font_three ] . '|' . $master_font_list[ $d4p_master_font_four ] .'',
  );
  
  wp_register_style( 'google-custom-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), '' );
  wp_enqueue_style( 'google-custom-fonts' );


  }
  add_action('wp_enqueue_scripts', 'd4p_google_custom_fonts', 999);