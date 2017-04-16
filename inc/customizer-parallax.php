<?php
/*
	THEME CUSTOMIZER Parallax Settings and Support for 'Designed4Pixels' theme

	NOTES

	- This file adds support and settings for the WordPress Theme Customizer
	- You can find more info at:  https://codex.wordpress.org/Theme_Customization_API
	- To customize your theme visit Appearance > Themes > Customize
	- Do not modify this file directly, use a child theme instead

*/


    	/* Parallax Feature Header Color */

    	$color_settings  = (array) get_theme_mod( 'd4p_parallax_feature_color_settings' );
		$widget_settings = (array) get_theme_mod( 'd4p_parallax_feature_widget_settings' );

		foreach ( $widget_settings as $number => $value ) {

			if ( is_array($widget_settings[ $number ])) {

		$version = $widget_settings[ $number ]['index'];

    	$wp_customize->add_section( 'd4p_parallax_feature_colors_' . $number, 
			array(
				'title' => __( 'Parallax Feature Colors ('. $version . ')', 'designed4pixels' ),
				'description' => __( 'Customize Your Websites Color Scheme;', 'designed4pixels' ),
				'priority' => 60,
				'panel' => 'd4p_color_settings',
				'active_callback' => 'd4p_parallax_feature_on_home_page',
		));


		$wp_customize->add_setting( 'd4p_parallax_header_color_' . $number,
			array(
				'default' => $color_settings[ 'd4p_parallax_header_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => '',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_parallax_header_color_' . $number,
			array(
				'label'        => __( 'Parallax Feature Heading Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_parallax_feature_colors_' . $number,
		)));


		/* Parallax Feature Text Color */

		$wp_customize->add_setting( 'd4p_parallax_font_color_' . $number,
			array(
				'default' => $color_settings[ 'd4p_parallax_font_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_parallax_font_color_' . $number,
			array(
				'label'        => __( 'Parallax Feature Text Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_parallax_feature_colors_' . $number,
		)));


		/* Parallax Feature Border Color */

		$wp_customize->add_setting( 'd4p_parallax_border_color_' . $number,
			array(
				'default' => $color_settings[ 'd4p_parallax_border_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_parallax_border_color_' . $number,
			array(
				'label'        => __( 'Parallax Feature Border Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_parallax_feature_colors_' . $number,
		)));


		/* Parallax Feature Horizontal Rule Color */

		$wp_customize->add_setting( 'd4p_parallax_hr_color_' . $number,
			array(
				'default' => $color_settings[ 'd4p_parallax_hr_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_parallax_hr_color_' . $number,
			array(
				'label'        => __( 'Parallax Feature Horizontal Rule Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_parallax_feature_colors_' . $number,
		)));

		/* Set-up Parallax Feature Mask Color & Opacity */

		// Alpha Color Picker setting.
		$wp_customize->add_setting(
			'd4p_parallax_feature_mask_color_' . $number,
			array(
				'default'     => $color_settings[ 'd4p_parallax_feature_mask_color_' . $number ],
				'type'        => 'theme_mod',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);

		// Alpha Color Picker control.
		$wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize,
				'd4p_parallax_feature_mask_color_' . $number,
				array(
					'label'         => __( 'Parallax Feature Mask Color ('. $version . ')', 'designed4pixels' ),
					'section'       => 'd4p_parallax_feature_colors_' . $number,
					'settings'      => 'd4p_parallax_feature_mask_color_' . $number,
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

		/* Set-up Parallax Inner Feature Mask Color & Opacity */

		// Alpha Color Picker setting.
		$wp_customize->add_setting(
			'd4p_parallax_inner_feature_mask_color_' . $number,
			array(
				'default'     => $color_settings[ 'd4p_parallax_inner_feature_mask_color_' . $number ],
				'type'        => 'theme_mod',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);

		// Alpha Color Picker control.
		$wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize,
				'd4p_parallax_inner_feature_mask_color_' . $number,
				array(
					'label'         => __( 'Parallax Inner Feature Mask Color ('. $version . ')', 'designed4pixels' ),
					'section'       => 'd4p_parallax_feature_colors_' . $number,
					'settings'      => 'd4p_parallax_inner_feature_mask_color_' . $number,
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


		/* ----- Set-up Parallax Feature Border Color & Opacity ----- */

		// Alpha Color Picker setting.
		$wp_customize->add_setting(
			'd4p_parallax_inner_feature_border_color_' . $number,
			array(
				'default'     => $color_settings[ 'd4p_parallax_inner_feature_border_color_' . $number ],
				'type'        => 'theme_mod',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);

		// Alpha Color Picker control.
		$wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize,
				'd4p_parallax_inner_feature_border_color_' . $number,
				array(
					'label'         => __( 'Text Container Border Color ('. $version . ')', 'designed4pixels' ),
					'section'       => 'd4p_parallax_feature_colors_' . $number,
					'settings'      => 'd4p_parallax_inner_feature_border_color_' . $number,
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

	} }


/* End of Parallax Image Settings */
