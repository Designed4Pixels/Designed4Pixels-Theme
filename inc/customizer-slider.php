<?php
/*
	THEME CUSTOMIZER Show Posts Feature Settings and Support for 'Designed4Pixels' theme

	NOTES

	- This file adds support and settings for the WordPress Theme Customizer
	- You can find more info at:  https://codex.wordpress.org/Theme_Customization_API
	- To customize your theme visit Appearance > Themes > Customize
	- Do not modify this file directly, use a child theme instead

*/

$color_settings  = (array) get_theme_mod( 'd4p_slider_feature_color_settings' );
$widget_settings = (array) get_theme_mod( 'd4p_slider_feature_widget_settings' );

foreach ( $widget_settings as $number => $value ) {

	if ( is_array($widget_settings[ $number ])) {

		$version = $widget_settings[ $number ]['index'];

		$wp_customize->add_section( 'd4p_slider_feature_colors_' . $number, 
			array(
				'title' => __( 'Meta Slider Feature Colors ('. $version . ')', 'designed4pixels' ),
				'description' => __( 'Customize Your Websites Meta Slider Image Feature;', 'designed4pixels' ),
				'priority' => 60,
				'panel' => 'd4p_color_settings',
				'active_callback' => 'd4p_slider_feature_on_home_page',
		));


		/* ----- Set-up Archive Background Color ----- */

		$wp_customize->add_setting( 'd4p_slider_feature_background_' . $number,
			array(
				'default' => $color_settings[ 'd4p_slider_feature_background_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));


		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_slider_feature_background_' . $number,
			array(
				'label'        => __( 'Meta Slider Background Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_slider_feature_colors_' . $number,
		)));
	}
}

/* End of Slider Feature Settings */