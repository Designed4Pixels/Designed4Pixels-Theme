<?php
/*
	THEME CUSTOMIZER Settings and Support for 'Designed4Pixels' theme

	NOTES

	- This file adds support and settings for the WordPress Theme Customizer
	- You can find more info at:  https://codex.wordpress.org/Theme_Customization_API
	- To customize your theme visit Appearance > Themes > Customize
	- Do not modify this file directly, use a child theme instead
*/

	
// Load in Theme Customizer Functions
require_once( get_template_directory() . '/inc/customizer-functions.php' );


// Home Featured Sections Customizer Configuration Files
require_once( get_template_directory() . '/inc/home-section-config-files/config-hero-image.php' );
require_once( get_template_directory() . '/inc/home-section-config-files/config-icon-box.php' );
require_once( get_template_directory() . '/inc/home-section-config-files/config-content.php' );
require_once( get_template_directory() . '/inc/home-section-config-files/config-call-to-action.php' );
require_once( get_template_directory() . '/inc/home-section-config-files/config-parallax.php' );
require_once( get_template_directory() . '/inc/home-section-config-files/config-show-posts.php' );

if ( class_exists( 'MetaSliderPlugin' ) ) {
	require_once( get_template_directory() . '/inc/home-section-config-files/config-slider.php' );
}

// Theme Customizer Color Scheme CSS Settings
require_once( get_template_directory() . '/inc/color-scheme-css.php');


function d4p_register ( $wp_customize ) {

	/* Settings & Support for the Theme Customizer */

	//* Customizer Alpha Color Picker (Beta)
	require_once( get_template_directory() . '/inc/alpha-color-picker/alpha-color-picker.php' );

    //* Theme Customizer Color Scheme Settings
	require_once( get_template_directory() . '/inc/customizer-color-scheme.php' );

    //* Theme Customizer Header Settings
	require_once( get_template_directory() . '/inc/customizer-google-fonts.php' );

    //* Theme Customizer Header Settings
	require_once( get_template_directory() . '/inc/customizer-header.php' );

    //* Theme Customizer Hero Image Settings
	require_once( get_template_directory() . '/inc/customizer-hero-image.php' );

    //* Theme Customizer Icon Box Settings
	require_once( get_template_directory() . '/inc/customizer-icon-box.php' );

    //* Theme Customizer Content Settings
	require_once( get_template_directory() . '/inc/customizer-content.php' );		

    //* Theme Customizer Parallax Settings
	require_once( get_template_directory() . '/inc/customizer-parallax.php' );

    //* Theme Customizer Call-to-Action Settings
	require_once( get_template_directory() . '/inc/customizer-cta-feature.php' );

    //* Theme Customizer Show Posts Settings
	require_once( get_template_directory() . '/inc/customizer-show-posts.php' );

    //* Theme Customizer Footer Settings
	require_once( get_template_directory() . '/inc/customizer-footer.php' );

	//* Theme Customizer Archive Settings
	require_once( get_template_directory() . '/inc/customizer-archive.php' );

	//* Theme Customizer Off Canvas Left & Right Settings
	require_once( get_template_directory() . '/inc/customizer-off-canvas-left-right.php' );

	//* Theme Customizer Off Canvas Top & Bottom Settings
	require_once( get_template_directory() . '/inc/customizer-off-canvas-top-bottom.php' );

	if ( class_exists( 'MetaSliderPlugin' ) ) {
    	//* Theme Customizer Slider Settings
		require_once( get_template_directory() . '/inc/customizer-slider.php' );
	}

	if ( class_exists( 'WooCommerce' ) ) {
    	//* Theme Customizer Slider Settings
		require_once( get_template_directory() . '/inc/customizer-woocommerce.php' );
	}

}

// Set-up the Theme Customizer settings and controls.
add_action( 'customize_register' , 'd4p_register' );
