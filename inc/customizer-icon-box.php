<?php
/*
	THEME CUSTOMIZER Icon Box Settings and Support for 'Designed4Pixels' theme

	NOTES

	- This file adds support and settings for the WordPress Theme Customizer
	- You can find more info at:  https://codex.wordpress.org/Theme_Customization_API
	- To customize your theme visit Appearance > Themes > Customize
	- Do not modify this file directly, use a child theme instead

*/

		$color_settings  = (array) get_theme_mod( 'd4p_icon_box_feature_color_settings' );
		$widget_settings = (array) get_theme_mod( 'd4p_icon_box_feature_widget_settings');

		foreach ( $widget_settings as $number => $value ) {

			if ( is_array($widget_settings[ $number ])) {

		$version = $widget_settings[ $number ]['index'];		

		$wp_customize->add_section(
			'd4p_icon_box_feature_settings_' . $number, 
			array(
				'title' => __( 'Icon Box Feature Colors ('. $version . ')', 'designed4pixels' ),
				'description' => __( 'Customize Your Websites Home Page Icon Box Feature;', 'designed4pixels' ),
				'priority' => 40,
				'panel' => 'd4p_color_settings',
				'active_callback' => 'd4p_icon_feature_on_home_page',
		));


		/* Set-up the Custom Header Site Description Custom Font */

		$wp_customize->add_setting( 'd4p_icon_font_heading_font_' . $number,
			array(
				'default' => 'Source Sans Pro',
    			'transport'   => 'postMessage',
		));


		$wp_customize->add_control( new WP_Customize_Font_Control( $wp_customize, 'd4p_icon_font_heading_font_' . $number,
    		array(
        		'type' => 'select_font',
        		'select_class' => 'customize-heading-font',
        		'show_styles'	=> false,
        		'label' => __('Icon Box Feature Heading Font ('. $version . ')', 'designed4pixels' ),
        		'section' => 'd4p_icon_box_feature_settings_' . $number,
        		'choices' => d4p_google_font_options(),
        )));


        /* Set-up the Custom Header Site Description Custom Font */

		$wp_customize->add_setting( 'd4p_icon_font_body_font_' . $number,
			array(
				'default' => 'Source Sans Pro',
    			'transport'   => 'postMessage',
		));


		$wp_customize->add_control( new WP_Customize_Font_Control( $wp_customize, 'd4p_icon_font_body_font_' . $number,
    		array(
        		'type' => 'select_font',
        		'select_class' => 'customize-body-font',
        		'show_styles'	=> false,
        		'label' => __('Icon Box Feature Body Font ('. $version . ')', 'designed4pixels' ),
        		'section' => 'd4p_icon_box_feature_settings_' . $number,
        		'choices' => d4p_google_font_options(),
        )));


		/* Set-up Icon Feature Background Color */

		$wp_customize->add_setting( 'd4p_icon_feature_background_' . $number,
			array(
				'default' => $color_settings[ 'd4p_icon_feature_background_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_icon_feature_background_' . $number,
			array(
				'label'        => __( 'Icon Box Section Background Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_icon_box_feature_settings_' . $number,
		)));


		/* Set-up Icon Feature Border Color */

		$wp_customize->add_setting( 'd4p_icon_feature_top_border_' . $number,
			array(
				'default' => $color_settings[ 'd4p_icon_feature_top_border_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_icon_feature_top_border_' . $number,
			array(
				'label'        => __( 'Top Border Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_icon_box_feature_settings_' . $number,
		)));


		/* ----- Set-up Show Posts Border Color & Opacity ----- */

		// Alpha Color Picker setting.
		$wp_customize->add_setting(
			'd4p_icon_feature_bottom_border_' . $number,
			array(
				'default'     => $color_settings[ 'd4p_icon_feature_bottom_border_' . $number ],
				'type'        => 'theme_mod',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);

		// Alpha Color Picker control.
		$wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize,
				'd4p_icon_feature_bottom_border_' . $number,
				array(
					'label'         => __( 'Bottom Border Color ('. $version . ')', 'designed4pixels' ),
					'section'       => 'd4p_icon_box_feature_settings_' . $number,
					'settings'      => 'd4p_icon_feature_bottom_border_' . $number,
					'show_opacity'  => true, // Optional.
					'palette'	=> array(
						'rgba( 0, 0, 0, 0.2 )',			// Black
						'rgba( 255, 255, 255, 0.8 )',	// White
						'rgba( 221, 51, 51, 0.2 )',		// Red
						'rgba( 221, 153, 51, 0.2 )',	// Orange
						'rgba( 238, 34, 34, 0.2 )',		// Yellow
						'rgba( 129, 215, 66, 0.2 )',	// Green
						'rgba( 30, 115, 188, 0.2 )',	// Blue
						'rgba( 130, 36, 227, 0.2 )',    // Violet
					)
				)
			)
		);


		/* Set-up Icon Box Color */

		$wp_customize->add_setting( 'd4p_icon_box_color_' . $number,
			array(
				'default' => $color_settings[ 'd4p_icon_box_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_icon_box_color_' . $number,
			array(
				'label'        => __( 'Icon Box Section Text Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_icon_box_feature_settings_' . $number,
			)));


		/* Set-up Icon Box Heading Color */

		$wp_customize->add_setting( 'd4p_icon_header_font_color_' . $number,
			array(
				'default' => $color_settings[ 'd4p_icon_header_font_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_icon_header_font_color_' . $number,
			array(
				'label'        => __( 'Icon Box Section Heading Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_icon_box_feature_settings_' . $number,
			)));


		/* Set-up Icon Box Font Background Color */

		$wp_customize->add_setting( 'd4p_icon_font_background_' . $number,
			array(
				'default' => $color_settings[ 'd4p_icon_font_background_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_icon_font_background_' . $number,
			array(
				'label'        => __( 'Font Icon Background Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_icon_box_feature_settings_' . $number,
		)));


		/* Set-up Icon Box Font Border Color */

		$wp_customize->add_setting( 'd4p_icon_font_border_' . $number,
			array(
				'default' => $color_settings[ 'd4p_icon_font_border_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_icon_font_border_' . $number,
			array(
				'label'        => __( 'Font Icon Border Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_icon_box_feature_settings_' . $number,
		)));


		/* Set-up Icon Box Font Color */

		$wp_customize->add_setting( 'd4p_icon_font_color_' . $number,
			array(
				'default' => $color_settings[ 'd4p_icon_font_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_icon_font_color_' . $number,
			array(
				'label'        => __( 'Font Icon Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_icon_box_feature_settings_' . $number,
		)));

	}}


/* End of Hero Image Settings */