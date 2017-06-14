<?php
/*
	THEME CUSTOMIZER Parallax Settings and Support for 'Designed4Pixels' theme

	NOTES

	- This file adds support and settings for the WordPress Theme Customizer
	- You can find more info at:  https://codex.wordpress.org/Theme_Customization_API
	- To customize your theme visit Appearance > Themes > Customize
	- Do not modify this file directly, use a child theme instead

*/


$color_settings  = (array) get_theme_mod( 'd4p_content_feature_color_settings' );
$widget_settings = (array) get_theme_mod( 'd4p_content_feature_widget_settings' );


foreach ( $widget_settings as $number => $value ) {

	if ( is_array($widget_settings[ $number ])) {

		$version = $widget_settings[ $number ]['index'];

		$wp_customize->add_section( 'd4p_content_feature_colors_' . $number, 
			array(
				'title' => __( 'Content Feature Colors ('. $version . ')', 'designed4pixels' ),
				'description' => __( 'Customize Your Websites Color Scheme;', 'designed4pixels' ),
				'priority' => 60,
				'panel' => 'd4p_color_settings',
				'active_callback' => 'd4p_content_feature_on_home_page',
		));


		/* Set-up the Custom Header Site Description Custom Font */

		$wp_customize->add_setting( 'd4p_content_feature_heading_font_' . $number,
			array(
				'default' => 'Source Sans Pro',
    			'transport'   => 'postMessage',
		));


		$wp_customize->add_control( new WP_Customize_Font_Control( $wp_customize, 'd4p_content_feature_heading_font_' . $number,
    		array(
        		'type' => 'select_font',
        		'select_class' => 'customize-heading-font',
        		'show_styles'	=> false,
        		'label' => __('Content Feature Heading Font ('. $version . ')', 'designed4pixels' ),
        		'section' => 'd4p_content_feature_colors_' . $number,
        		'choices' => d4p_google_font_options(),
        )));


        /* Set-up the Custom Header Site Description Custom Font */

		$wp_customize->add_setting( 'd4p_content_feature_body_font_' . $number,
			array(
				'default' => 'Source Sans Pro',
    			'transport'   => 'postMessage',
		));


		$wp_customize->add_control( new WP_Customize_Font_Control( $wp_customize, 'd4p_content_feature_body_font_' . $number,
    		array(
        		'type' => 'select_font',
        		'select_class' => 'customize-body-font',
        		'show_styles'	=> false,
        		'label' => __('Content Feature Body Font ('. $version . ')', 'designed4pixels' ),
        		'section' => 'd4p_content_feature_colors_' . $number,
        		'choices' => d4p_google_font_options(),
        )));


		$wp_customize->add_setting( 'd4p_content_feature_background_' . $number,
			array(
				'default' => $color_settings[ 'd4p_content_feature_background_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));


		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_content_feature_background_' . $number,
			array(
				'label'        => __( 'Content Background Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_content_feature_colors_' . $number,
		)));


		/* Parallax Feature Header Color */

		$wp_customize->add_setting( 'd4p_content_feature_header_color_' . $number,
			array(
				'default' => $color_settings[ 'd4p_content_feature_header_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => '',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_content_feature_header_color_' . $number,
			array(
				'label'        => __( 'Content Feature Heading Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_content_feature_colors_' . $number,
		)));


		/* Parallax Feature Text Color */

		$wp_customize->add_setting( 'd4p_content_feature_font_color_' . $number,
			array(
				'default' => $color_settings[ 'd4p_content_feature_font_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_content_feature_font_color_' . $number,
			array(
				'label'        => __( 'Content Feature Text Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_content_feature_colors_' . $number,
		)));


		/* Parallax Feature Border Color */

		$wp_customize->add_setting( 'd4p_content_feature_border_color_' . $number,
			array(
				'default' => $color_settings[ 'd4p_content_feature_border_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_content_feature_border_color_' . $number,
			array(
				'label'        => __( 'Content Feature Border Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_content_feature_colors_' . $number,
		)));


		/* Parallax Feature Horizontal Rule Color */

		$wp_customize->add_setting( 'd4p_content_feature_hr_color_' . $number,
			array(
				'default' => $color_settings[ 'd4p_content_feature_hr_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_content_feature_hr_color_' . $number,
			array(
				'label'        => __( 'Content Feature Horizontal Rule Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_content_feature_colors_' . $number,
		)));
	}
}

/* End of Content Feature Settings */