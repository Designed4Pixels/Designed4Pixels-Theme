<?php
/*
	THEME CUSTOMIZER Show Posts Feature Settings and Support for 'Designed4Pixels' theme

	NOTES

	- This file adds support and settings for the WordPress Theme Customizer
	- You can find more info at:  https://codex.wordpress.org/Theme_Customization_API
	- To customize your theme visit Appearance > Themes > Customize
	- Do not modify this file directly, use a child theme instead

*/

$color_settings  = (array) get_theme_mod( 'd4p_show_posts_feature_color_settings' );
$widget_settings = (array) get_theme_mod( 'd4p_show_posts_feature_widget_settings' );

foreach ( $widget_settings as $number => $value ) {

	if ( is_array($widget_settings[ $number ])) {

		$version = $widget_settings[ $number ]['index'];

		$wp_customize->add_section( 'd4p_show_posts_feature_colors_' . $number, 
			array(
				'title' => __( 'Show Posts Feature Colors ('. $version . ')', 'designed4pixels' ),
				'description' => __( 'Customize Your Websites Show Posts Feature;', 'designed4pixels' ),
				'priority' => 60,
				'panel' => 'd4p_color_settings',
				'active_callback' => 'd4p_show_posts_feature_on_home_page',
		));


		/* ----- Set-up Archive Background Color ----- */

		$wp_customize->add_setting( 'd4p_show_posts_feature_background_' . $number,
			array(
				'default' => $color_settings[ 'd4p_show_posts_feature_background_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));


		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_show_posts_feature_background_' . $number,
			array(
				'label'        => __( 'Show Posts Background Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_show_posts_feature_colors_' . $number,
		)));


		/* ----- Set-up Archive Border Color ----- */

		$wp_customize->add_setting( 'd4p_show_posts_feature_border_color_' . $number,
			array(
				'default' => $color_settings[ 'd4p_show_posts_feature_border_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));


		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_show_posts_feature_border_color_' . $number,
			array(
				'label'        => __( 'Show Posts Border Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_show_posts_feature_colors_' . $number,
		)));


		/* ----- Set-up Archive Heading Color ----- */

		$wp_customize->add_setting( 'd4p_show_posts_header_color_' . $number,
			array(
				'default' => $color_settings[ 'd4p_show_posts_header_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_show_posts_header_color_' . $number,
			array(
				'label'        => __( 'Show Posts Heading Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_show_posts_feature_colors_' . $number,
			)));


		/* ----- Set-up Archive Card Background Color ----- */

		$wp_customize->add_setting( 'd4p_show_posts_card_background_color_' . $number,
			array(
				'default' => $color_settings[ 'd4p_show_posts_card_background_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));


		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_show_posts_card_background_color_' . $number,
			array(
				'label'        => __( 'Show Posts Card Background Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_show_posts_feature_colors_' . $number,
			)));


		/* ----- Set-up Archive Card Border Color ----- */

		$wp_customize->add_setting( 'd4p_show_posts_card_border_color_' . $number,
			array(
				'default' => $color_settings[ 'd4p_show_posts_card_border_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_show_posts_card_border_color_' . $number,
			array(
				'label'        => __( 'Show Posts Card Border Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_show_posts_feature_colors_' . $number,
			)));


		/* ----- Set-up Archive Card Heading Color ----- */

		$wp_customize->add_setting( 'd4p_show_posts_card_header_color_' . $number,
			array(
				'default' => $color_settings[ 'd4p_show_posts_card_header_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_show_posts_card_header_color_' . $number,
			array(
				'label'        => __( 'Show Posts Card Heading Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_show_posts_feature_colors_' . $number,
			)));


		/* ----- Set-up Archive Card Text Color ----- */

		$wp_customize->add_setting( 'd4p_show_posts_card_text_color_' . $number,
			array(
				'default' => $color_settings[ 'd4p_show_posts_card_text_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_show_posts_card_text_color_' . $number,
			array(
				'label'        => __( 'Show Posts Card Text Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_show_posts_feature_colors_' . $number,
			)));

	} }


/* End of Show Posts Feature Settings */