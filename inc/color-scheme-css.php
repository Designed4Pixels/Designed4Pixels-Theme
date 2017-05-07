<?php
/**
 * Designed4Pixels: Custom Color Scheme Configure Default Color CSS 
 */


function d4p_color_default_settings() {

  $d4p_color_default_settings = array(
      'd4p_body_bg_color'                       => '#fefefe',
      'd4p_body_font_color'                     => '#c6c6c6',
      'd4p_footer_background'                   => '#fefefe',
      'd4p_footer_border_top'                   => '#f1f1f1',
      'd4p_footer_text_color'                   => '#c6c6c6',
      'd4p_footer_icon_background_color'        => '#c6c6c6',
      'd4p_footer_icon_text_color'              => '#fefefe',      
      'd4p_infobar_background'                  => '#fefefe',
      'd4p_infobar_border_color'                => '#f1f1f1',
      'd4p_infobar_text_color'                  => '#c6c6c6',
      'd4p_infobar_icon_background_color'       => '#e0e0e0',
      'd4p_infobar_icon_text_color'             => '#fefefe',
      'd4p_logobar_background'                  => '#fefefe', 
      'd4p_logobar_border_color'                => '#f1f1f1',
      'd4p_header_font_color'                   => '#444',
      'd4p_border_color'                        => '#f1f1f1',
      'd4p_nav_hover_background'                => '#f4f4f4',
      'd4p_nav_hover_color'                     => '#999',
      'd4p_anchor_color'                        => '#aaa',           
      'd4p_footer_col_background'               => '#fefefe',
      'd4p_footer_col_border_color'             => '#f1f1f1',
      'd4p_footer_col_header_color'             => '#666',
      'd4p_footer_col_color'                    => '#c6c6c6',
      'd4p_archive_header_color'                => '#666',
      'd4p_archive_header_border_color'         => '#f1f1f1',
      'd4p_archive_card_border_color'           => '#f1f1f1',
      'd4p_archive_card_background_color'       => '#fefefe',
      'd4p_archive_card_header_color'           => '#666',
      'd4p_archive_card_text_color'             => '#c6c6c6',
      'd4p_button_background_color'             => '#ffffff',
      'd4p_button_border_color'                 => '#c6c6c6',
      'd4p_button_text_color'                   => '#c6c6c6',
      'd4p_off_canvas_background_color'         => '#fefefe',
      'd4p_off_canvas_widget_background_color'  => '#fefefe',
      'd4p_off_canvas_font_color'               => '#c6c6c6',
      'd4p_off_canvas_header_color'             => '#666',
      'd4p_off_canvas_border_color'             => '#f1f1f1',
      'd4p_off_canvas_top_bottom_background_color'         => '#fefefe',
      'd4p_off_canvas_top_bottom_widget_background_color'  => '#fefefe',
      'd4p_off_canvas_top_bottom_font_color'               => '#c6c6c6',
      'd4p_off_canvas_top_bottom_header_color'             => '#666',
      'd4p_off_canvas_top_bottom_border_color'             => '#f1f1f1',       
  );


  $d4p_color_default_settings_updated = apply_filters( 'd4p_color_default_settings', $d4p_color_default_settings );

  $d4p_color_default_settings = array_filter( $d4p_color_default_settings_updated );

  set_theme_mod( 'd4p_default_color_settings_array', $d4p_color_default_settings );

  set_theme_mod( 'd4p_default_color_settings_keys',  array_keys( $d4p_color_default_settings ));

  return $d4p_color_default_settings;
}


// This function creates the customizer template at the bottom of the page
function d4p_color_scheme_css_template() {

  $color_settings_keys = (array) get_theme_mod( 'd4p_default_color_settings_keys' );

  foreach ( $color_settings_keys as $keys => $value ) {
        $colors[ $value ] = '{{ data.' . $value . ' }}';
  } ?>

  <script type="text/html" id="tmpl-d4p-color-scheme">
          <?php echo d4p_get_color_scheme_css( $colors ); ?>
  </script> <?php

}
add_action( 'customize_controls_print_footer_scripts', 'd4p_color_scheme_css_template' );


// Generate the CSS for the custom color scheme.
function d4p_get_color_scheme_css( $colors ) {

$css = <<<CSS

body.custom-color-scheme {
    background:  {$colors['d4p_body_bg_color']};
    color: {$colors['d4p_body_font_color']};
}

.custom-color-scheme .sticky {
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
}

.custom-color-scheme .to-top {
    background-color: rgba(10, 10, 10, 0.7);
}

.custom-color-scheme h1, .custom-color-scheme .h1,
.custom-color-scheme h2, .custom-color-scheme .h2,
.custom-color-scheme h3, .custom-color-scheme .h3 { color: {$colors['d4p_header_font_color']};
}

.custom-color-scheme .archive-header {
    color: #a0a0a0;
    border-bottom: solid 2px {$colors['d4p_border_color']};
}

.custom-color-scheme .archive-header > h1 {
    color: #a0a0a0; 
}

.custom-color-scheme .info-bar {
    background-color: {$colors['d4p_infobar_background']};
    color: {$colors['d4p_infobar_text_color']};
    border-bottom: solid 1px {$colors['d4p_infobar_border_color']}; 
}

.custom-color-scheme .info-bar a {
    color: {$colors['d4p_infobar_text_color']};
}

.custom-color-scheme .info-bar ul {
    background-color: transparent;
}

.custom-color-scheme #infobar-icons a::before {
    background-color: {$colors['d4p_infobar_icon_background_color']};
    color: {$colors['d4p_infobar_icon_text_color']};
    width: 22px;
    padding-right: 1px;
    border-radius: 3px;
    margin: 1px 0 2.5px 0;
}

.custom-color-scheme .logo-bar {
    background-color: {$colors['d4p_logobar_background']};
    /* box-shadow: 0 2px 2px -2px rgba(0, 0, 0, 0.2); */
}

.custom-color-scheme .logo-bar ul {
    background-color: {$colors['d4p_logobar_background']};
}

.custom-color-scheme .logo-bar li > a {
    color: {$colors['d4p_anchor_color']};
    border-bottom: 2px solid transparent;
}

.custom-color-scheme .logo-bar li > a:hover,
.custom-color-scheme .logo-bar li > a:focus {
    background-color: {$colors['d4p_nav_hover_background']};
    color: {$colors['d4p_nav_hover_color']};
}

.custom-color-scheme .logo-bar .current-menu-item > a {
    background-color: {$colors['d4p_nav_hover_background']};
    color: {$colors['d4p_nav_hover_color']} !important;
}

.custom-color-scheme .title-bar {
    background: {$colors['d4p_logobar_background']};
    border-top: 1px solid {$colors['d4p_logobar_border_color']};
    color: #5b6971;
}

.custom-color-scheme .menu-icon::after {
    background: {$colors['d4p_body_font_color']};
    box-shadow: 0 7px 0 {$colors['d4p_body_font_color']}, 0 14px 0 {$colors['d4p_body_font_color']};
}

.custom-color-scheme button.menu-icon, 
.custom-color-scheme button.menu-icon:hover, 
.custom-color-scheme button.menu-icon:focus {
    border: none;
    background-color: transparent !important;
}

.custom-color-scheme .dropdown.menu.medium-horizontal > li.is-dropdown-submenu-parent > a::after {
    border-color: #bbb transparent transparent;
}

.custom-color-scheme .is-dropdown-submenu-item > a {
    color: #aaa;
}

.custom-color-scheme .is-dropdown-submenu > li.is-submenu-item > a:hover,
.custom-color-scheme li.is-submenu-item > a:focus {
    color: #aaa;
    border-bottom: none; 
}

.custom-color-scheme .is-dropdown-submenu {
    background: {$colors['d4p_logobar_background']};
    border: 1px solid {$colors['d4p_logobar_border_color']};
}

.custom-color-scheme .is-dropdown-submenu > li {
   border-bottom: none;
}

.custom-color-scheme .is-dropdown-submenu > li.current-menu-item > a {
    border-bottom: 1px solid #0a0a0a;
    color: #5b6971;
    background-color: {$colors['d4p_nav_hover_background']};
}

.custom-color-scheme .is-dropdown-submenu > li:last-child {
    border-bottom: none;
}

.custom-color-scheme #off-canvas-left.off-canvas,
.custom-color-scheme #off-canvas-right.off-canvas{
    background: {$colors['d4p_off_canvas_background_color']};
}

.custom-color-scheme #off-canvas-left .off-canvas-content {
    background-color: transparent;
}

.custom-color-scheme #off-canvas-left button.close-button,
.custom-color-scheme #off-canvas-right button.close-button,
{
    background-color: transparent;
}

.custom-color-scheme #off-canvas-left .off-canvas-inner .widget {
    background-color: {$colors['d4p_off_canvas_widget_background_color']};
    color: {$colors['d4p_off_canvas_font_color']};
}

.custom-color-scheme  #off-canvas-left .off-canvas-inner .widgettitle {
    color: {$colors['d4p_off_canvas_header_color']};
    border-bottom: solid 3px {$colors['d4p_off_canvas_border_color']};
}


.custom-color-scheme #off-canvas-top.off-canvas,
.custom-color-scheme #off-canvas-bottom.off-canvas{
    background: {$colors['d4p_off_canvas_top_bottom_background_color']};
}

.custom-color-scheme #off-canvas-top .off-canvas-content {
    background-color: transparent;
}

.custom-color-scheme #top-close-button button.close-button,
.custom-color-scheme #bottom-close-button button.close-button,
{
    background-color: transparent;
}

.custom-color-scheme #off-canvas-top .off-canvas-inner .widget {
    background-color: {$colors['d4p_off_canvas_top_bottom_widget_background_color']};
    color: {$colors['d4p_off_canvas_top_bottom_font_color']};
}

.custom-color-scheme #off-canvas-top .off-canvas-inner .widgettitle {
    color: {$colors['d4p_off_canvas_top_bottom_header_color']};
    border-bottom: solid 3px {$colors['d4p_off_canvas_top_bottom_border_color']};
}

.custom-color-scheme #content #inner-content {
    background-color: {$colors['d4p_body_bg_color']};
}

.custom-color-scheme #content #inner-content #main {
    background-color: {$colors['d4p_body_bg_color']};
}

.custom-color-scheme .article-header h1 > a,
.custom-color-scheme .article-header h1 > a:hover,
.custom-color-scheme .article-header h2 > a,
.custom-color-scheme .article-header h2 > a:hover,
.custom-color-scheme .page-header h1 > a, 
.custom-color-scheme .page-header h1 > a:hover,
.custom-color-scheme .page-header h2 > a,
.custom-color-scheme .page-header h2 > a:hover {
    color: {$colors['d4p_header_font_color']};
}

.custom-color-scheme .article-footer .tags-title {
    border-top: solid 1px {$colors['d4p_border_color']};
    border-bottom: solid 1px {$colors['d4p_border_color']};
}

.custom-color-scheme .sidebar .widgettitle {
    color: {$colors['d4p_header_font_color']};
    border-bottom: solid 3px {$colors['d4p_border_color']};
}

.custom-color-scheme .archive-header > h1 {
    color: {$colors['d4p_archive_header_color']};
}

.custom-color-scheme .archive-header {
    border-bottom: 2px solid {$colors['d4p_archive_header_border_color']};
}

.custom-color-scheme .card {
    border: 1px solid {$colors['d4p_archive_card_border_color']};
    background: {$colors['d4p_archive_card_background_color']};
}

.custom-color-scheme .card-section .title a {
    color: {$colors['d4p_archive_card_header_color']};
}

.custom-color-scheme .card-section .entry-content {
    color: {$colors['d4p_archive_card_text_color']};
}

.custom-color-scheme .dropdown.menu.medium-horizontal > li.is-dropdown-submenu-parent > a::after {
    border-color: #b0b0b0 transparent transparent;
}

.custom-color-scheme .button,
.custom-color-scheme button,
.custom-color-scheme input[type="button"],
.custom-color-scheme input[type="reset"],
.custom-color-scheme input[type="submit"] {
    background-color: {$colors['d4p_button_background_color']};
    border: 1px solid {$colors['d4p_button_border_color']};
    color: {$colors['d4p_button_text_color']};
}

.custom-color-scheme button:hover,
.custom-color-scheme .button:hover, 
.custom-color-scheme input[type="button"]:hover,
.custom-color-scheme input[type="submit"]:hover {
    background-color: {$colors['d4p_button_background_color']};
    border: 1px solid {$colors['d4p_button_border_color']};
}

.custom-color-scheme .button.secondary {
    background-color: #767676;
    border: 1px solid #5d5d5d;
    color: #fff;
}

.custom-color-scheme .button.secondary:hover {
    background-color: #5d5d5d;
}

.custom-color-scheme .button.alert {
    background-color: #cc4b37;
    border: 1px solid #a63b2a;
}

.custom-color-scheme .button.alert:hover {
    background-color: #a63b2a;
}

.custom-color-scheme .button.success {
    background-color: #3adb76;
    border: 1px solid #23bf5d;
}

.custom-color-scheme .button.success:hover {
    background-color: #23bf5d;
}

.custom-color-scheme .widget {
    background-color: {$colors['d4p_body_bg_color']};
    color: #6a6a6a;
    padding: 5px;
}

.custom-color-scheme .footer-cols {
    background-color: {$colors['d4p_footer_col_background']};
    color: {$colors['d4p_footer_col_color']};
    border-top: solid 5px {$colors['d4p_footer_col_border_color']};
}

.custom-color-scheme .footer-cols .widgettitle {
    color: {$colors['d4p_footer_col_header_color']};
    border-bottom: solid 3px {$colors['d4p_footer_col_border_color']};
}

.custom-color-scheme .footer-cols li {
    border-bottom: solid 1px {$colors['d4p_footer_col_border_color']};
}

.custom-color-scheme .footer-cols .menu > li {
    border-bottom: solid 1px {$colors['d4p_footer_col_border_color']};
}

.custom-color-scheme .footer {
    background-color: {$colors['d4p_footer_background']};
    border-top: solid 5px {$colors['d4p_footer_border_top']};
    color: #666;
}

.custom-color-scheme #inner-footer .footer-left a {
    color: {$colors['d4p_footer_text_color']};
}

.custom-color-scheme .footer #footer-right a::before {
    background-color: {$colors['d4p_footer_icon_background_color']};
    color: {$colors['d4p_footer_icon_text_color']};
}

.custom-color-scheme .mc4wp-form-fields input[type="text"],
.custom-color-scheme .mc4wp-form-fields input[type="email"],
.custom-color-scheme .mc4wp-form-fields input[type="url"],
.custom-color-scheme .mc4wp-form-fields textarea {
    background: {$colors['d4p_body_bg_color']};
}

@media screen and (max-width: 64em) {

  .custom-color-scheme .logo-bar {
      background-color: {$colors['d4p_body_bg_color']};
  }

  .custom-color-scheme .logo-bar li {
      border-bottom: 1px solid {$colors['d4p_border_color']};
  }

  .custom-color-scheme .logo-bar li > a {
      color: {$colors['d4p_anchor_color']};
      border-left: 2px solid {$colors['d4p_body_bg_color']};
  }

  .custom-color-scheme .logo-bar li > a:hover,
  .custom-color-scheme .logo-bar li > a:focus {
      color: {$colors['d4p_anchor_color']};
      border-bottom: 2px solid {$colors['d4p_nav_hover_background']};
      background-color: {$colors['d4p_nav_hover_background']};
  }

  .custom-color-scheme .logo-bar .current-menu-item > a {
      color: {$colors['d4p_anchor_color']} !important;
      background-color: {$colors['d4p_nav_hover_background']};
  }

  .custom-color-scheme .logo-bar .is-accordion-submenu-parent:focus {
      border-left: 2px solid {$colors['d4p_body_bg_color']}; }

  .custom-color-scheme .logo-bar .is-accordion-submenu > li.is-submenu-item > a:hover,
  .custom-color-scheme .logo-bar li.is-submenu-item > a:focus {
      color: {$colors['d4p_anchor_color']};
      border-bottom: 2px solid {$colors['d4p_border_color']};
  }

    .custom-color-scheme .logo-bar .is-accordion-submenu {
      background: {$colors['d4p_body_bg_color']};
      border-top: solid 1px {$colors['d4p_border_color']};
  }

    .custom-color-scheme .logo-bar .is-accordion-submenu > li.current-menu-item > a {
      border-bottom: 2px solid {$colors['d4p_body_bg_color']};
      color: {$colors['d4p_anchor_color']};
      background-color: {$colors['d4p_body_bg_color']};
  }

    .custom-color-scheme .logo-bar .is-accordion-submenu-item > a, .custom-color-scheme .logo-bar .current-menu-item > a {
      color: {$colors['d4p_anchor_color']};
  }
}

CSS;

$image_feature_colors = (array) get_theme_mod( 'd4p_image_feature_widget_settings');

foreach ( $image_feature_colors as $key => $value) {

/* Set-up the image feature data */

if ( is_array($image_feature_colors[ $key ])) {

$color_1 = $colors[ 'd4p_image_feature_background_' . $key ];
$color_2 = $colors[ 'd4p_image_feature_mask_color_' . $key ];
$color_3 = $colors[ 'd4p_image_feature_header_color_' . $key ];
$color_4 = $colors[ 'd4p_image_feature_text_color_' . $key ];
$color_5 = $colors[ 'd4p_image_feature_container_mask_color_' . $key ];
$color_6 = $colors[ 'd4p_image_feature_container_border_color_' . $key ];
$color_7 = $colors[ 'd4p_image_feature_position_' . $key ];

$feature_colors .= <<<CSS

    .custom-color-scheme #image-feature-{$value['page_name']} .image-feature {
        background-color: {$color_1};      
    }

    .custom-color-scheme #image-feature-{$value['page_name']} .image-feature .image-mask {
        background-color: {$color_2};
    }

    .custom-color-scheme #image-feature-{$value['page_name']} .image-feature h1 {
        color: {$color_3};
    }

    .custom-color-scheme #image-feature-{$value['page_name']} .image-feature .narrow-container {
        top: {$color_7}px;
        color: {$color_4};
        background-color: {$color_5};
        border: 5px solid {$color_6}
    }

CSS;

}}
 

$icon_box_feature_colors = (array) get_theme_mod( 'd4p_icon_box_feature_widget_settings');

foreach ( $icon_box_feature_colors as $key => $value) {

/* Set-up the icon box feature data */

if ( is_array($icon_box_feature_colors[ $key ])) { 

$color_1 = $colors[ 'd4p_icon_feature_background_' . $key ];
$color_2 = $colors[ 'd4p_icon_feature_border_' . $key ];
$color_3 = $colors[ 'd4p_icon_box_color_' . $key ];
$color_4 = $colors[ 'd4p_icon_header_font_color_' . $key ];
$color_5 = $colors[ 'd4p_icon_font_background_' . $key ];
$color_6 = $colors[ 'd4p_icon_font_border_' . $key ];
$color_7 = $colors[ 'd4p_icon_font_color_' . $key ];


$feature_colors .= <<<CSS

.custom-color-scheme #icon-feature-{$key} .icon-feature {
    background-color: {$color_1};
    border-top: 5px solid {$color_2};
}

.custom-color-scheme #icon-feature-{$key} .icon-feature .icon-font {
    background-color: {$color_5};
    color: {$color_7};
    border: 1px solid {$color_6};
}

.custom-color-scheme #icon-feature-{$key} .icon-feature .icon-box {
    color: {$color_3};
}

.custom-color-scheme #icon-feature-{$key} .icon-feature h2 {
    color: {$color_4};
}

CSS;

}}


$content_feature_colors = (array) get_theme_mod( 'd4p_content_feature_widget_settings');

foreach ( $content_feature_colors as $key => $value) {

/* Set-up the content feature data */

if ( is_array($content_feature_colors[ $key ])) { 

$color_1 = $colors[ 'd4p_content_feature_background_' . $key ];
$color_2 = $colors[ 'd4p_content_feature_border_color_' . $key ];
$color_3 = $colors[ 'd4p_content_feature_font_color_' . $key ];
$color_4 = $colors[ 'd4p_content_feature_header_color_' . $key ];
$color_5 = $colors[ 'd4p_content_feature_hr_color_' . $key ];


$feature_colors .= <<<CSS

    .custom-color-scheme #content-feature-{$value['page_name']} .content-feature {
        background-color: {$color_1};
        color: {$color_3};
        border-top: solid 5px {$color_2};
    }

    .custom-color-scheme #content-feature-{$value['page_name']} .content-feature h1,
    .custom-color-scheme #content-feature-{$value['page_name']} .content-feature h2,
    .custom-color-scheme #content-feature-{$value['page_name']} .content-feature h3 {
        color: {$color_4};
    }

    .custom-color-scheme #content-feature-{$value['page_name']} .content-feature hr {
        border: solid {$color_5};
        border-width: 1px 0 0;
    }

CSS;

}}


$cta_feature_colors = (array) get_theme_mod( 'd4p_cta_feature_widget_settings');

foreach ( $cta_feature_colors as $key => $value) {

/* Set-up the cta feature data */

if ( is_array($cta_feature_colors[ $key ])) { 

$color_1 = $colors[ 'd4p_cta_feature_background_' . $key ];
$color_2 = $colors[ 'd4p_cta_feature_border_' . $key ];
$color_3 = $colors[ 'd4p_cta_feature_color_' . $key ];
$color_4 = $colors[ 'd4p_cta_feature_header_color_' . $key ];
$color_5 = $colors[ 'd4p_cta_feature_sub_header_color_' . $key ];
$color_6 = $colors[ 'd4p_cta_feature_hr_color_' . $key ];


$feature_colors .= <<<CSS

  .custom-color-scheme #cta-feature-{$key} .cta-feature {
      background-color: {$color_1};
      color: {$color_3};
      border-top: solid 5px {$color_2};
  }

    .custom-color-scheme #cta-feature-{$key} .cta-feature h1,
    .custom-color-scheme #cta-feature-{$key} .cta-feature h2 {
        color: {$color_4};
    }

    .custom-color-scheme #cta-feature-{$key} .cta-feature h3 {
        color: {$color_5};
    }

    .custom-color-scheme #cta-feature-{$key} .cta-feature hr {
        border: solid {$color_6};
        border-width: 1px 0 0;
    }

CSS;

}}


$parallax_feature_colors = (array) get_theme_mod( 'd4p_parallax_feature_widget_settings');

foreach ( $parallax_feature_colors as $key => $value) {

/* Set-up the cta feature data */

if ( is_array($parallax_feature_colors[ $key ])) { 

$color_1 = $colors[ 'd4p_parallax_header_color_' . $key ];
$color_2 = $colors[ 'd4p_parallax_font_color_' . $key ];
$color_3 = $colors[ 'd4p_parallax_border_color_' . $key ];
$color_4 = $colors[ 'd4p_parallax_hr_color_' . $key ];
$color_5 = $colors[ 'd4p_parallax_feature_mask_color_' . $key ];
$color_6 = $colors[ 'd4p_parallax_inner_feature_mask_color_' . $key ];
$color_7 = $colors[ 'd4p_parallax_inner_feature_border_color_' . $key ];


$feature_colors .= <<<CSS

    .custom-color-scheme  #parallax-feature-{$value['page_name']} .parallax-feature .image-mask,
    .custom-color-scheme  #parallax-feature-{$value['page_name']} .parallax-custom .image-mask {
        background-color: {$color_5};
    }

    .custom-color-scheme #parallax-inner-feature-{$value['page_name']} .parallax-inner-feature .image-mask {
        background-color: {$color_6};
    }

    .custom-color-scheme #parallax-inner-feature-{$value['page_name']} .parallax-inner-feature {
        border: 5px solid {$color_7};
    }

    .custom-color-scheme #parallax-feature-{$value['page_name']} .parallax-feature {
        border-top: 5px solid {$color_3};
    }

    .custom-color-scheme #parallax-inner-feature-{$value['page_name']} .parallax-inner-content {
        color: {$color_2};
    }

    .custom-color-scheme #parallax-inner-feature-{$value['page_name']} .parallax-inner-content h1,
    .custom-color-scheme #parallax-inner-feature-{$value['page_name']} .parallax-inner-content h2,
    .custom-color-scheme #parallax-inner-feature-{$value['page_name']} .parallax-inner-content h3 {
        color: {$color_1};
    }

    .custom-color-scheme #parallax-inner-feature-{$value['page_name']} .parallax-inner-content hr {
        border: solid {$color_4};
        border-width: 1px 0 0;
    }

    .custom-color-scheme #parallax-inner-feature-{$value['page_name']} .parallax-inner-content .button {
      color: #ffffff !important;
      background-color: transparent;
      border: 1px solid #ffffff !important;
    }

CSS;

}}


$show_posts_feature_colors = (array) get_theme_mod( 'd4p_show_posts_feature_widget_settings');

foreach ( $show_posts_feature_colors as $key => $value) {

/* Set-up the content feature data */

if ( is_array($show_posts_feature_colors[ $key ])) { 

$color_1 = $colors[ 'd4p_show_posts_feature_background_' . $key ];
$color_2 = $colors[ 'd4p_show_posts_feature_border_color_' . $key ];
$color_3 = $colors[ 'd4p_show_posts_header_color_' . $key ];
$color_4 = $colors[ 'd4p_show_posts_card_border_color_' . $key ];
$color_5 = $colors[ 'd4p_show_posts_card_background_color_' . $key ];
$color_6 = $colors[ 'd4p_show_posts_card_header_color_' . $key ];
$color_7 = $colors[ 'd4p_show_posts_card_text_color_' . $key ];

$feature_colors .= <<<CSS

    .custom-color-scheme #show-posts-feature-{$value['name']} .show-posts-feature {
          background-color: {$color_1};
          border-top: 5px solid {$color_2};
          border-bottom:  5px solid {$color_2};
    }

    .custom-color-scheme #show-posts-feature-{$value['name']} .show-posts-feature .archive-header > h2 {
          color: {$color_3};
    }

    .custom-color-scheme #show-posts-feature-{$value['name']} .show-posts-feature .card {
          border: 1px solid {$color_4};
          background: {$color_5};
    }

    .custom-color-scheme #show-posts-feature-{$value['name']} .show-posts-feature .card-section .title a {
          color: {$color_6};
    }

    .custom-color-scheme #show-posts-feature-{$value['name']} .show-posts-feature .card-section .entry-content {
          color: {$color_7};
    }

CSS;

}}


  /**
   * Filters Designed4Pixels Color Settings Array.
   *
   * @since Designed4Pixels 0.5.4
   *
   * @param $css    String containing the Designed4Pixels Custom Color CSS Settings.
   */
  return apply_filters( 'd4p_color_scheme_css', $css . $feature_colors );
}
