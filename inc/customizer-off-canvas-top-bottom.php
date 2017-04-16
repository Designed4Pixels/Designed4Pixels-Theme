<?php
/*
	THEME CUSTOMIZER Parallax Settings and Support for 'Designed4Pixels' theme

	NOTES

	- This file adds support and settings for the WordPress Theme Customizer
	- You can find more info at:  https://codex.wordpress.org/Theme_Customization_API
	- To customize your theme visit Appearance > Themes > Customize
	- Do not modify this file directly, use a child theme instead

*/

		$color_settings = get_theme_mod( 'd4p_default_color_settings_array' );

    	/* Off Canvas Color */


    	$wp_customize->add_section( 'd4p_off_canvas_top_bottom_colors', 
			array(
				'title' => __( 'Off Canvas Colors (Top/Bottom)', 'designed4pixels' ),
				'description' => __( 'Customize Your Websites Off Canvas;', 'designed4pixels' ),
				'priority' => 60,
				'panel' => 'd4p_color_settings',
				'active_callback' => 'off_canvas_top_bottom_active',
		));


		/* Set-up Parallax Feature Mask Color & Opacity */

		// Alpha Color Picker setting.
		$wp_customize->add_setting(
			'd4p_off_canvas_top_bottom_background_color',
			array(
				'default'     => $color_settings[ 'd4p_off_canvas_top_bottom_background_color' ],
				'type'        => 'theme_mod',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);

		// Alpha Color Picker control.
		$wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize,
				'd4p_off_canvas_top_bottom_background_color',
				array(
					'label'         => __( 'Off Canvas Background Color', 'designed4pixels' ),
					'section'       => 'd4p_off_canvas_top_bottom_colors',
					'settings'      => 'd4p_off_canvas_top_bottom_background_color',
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


		/* Set-up Parallax Feature Mask Color & Opacity */

		// Alpha Color Picker setting.
		$wp_customize->add_setting(
			'd4p_off_canvas_top_bottom_widget_background_color',
			array(
				'default'     => $color_settings[ 'd4p_off_canvas_top_bottom_widget_background_color' ],
				'type'        => 'theme_mod',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);

		// Alpha Color Picker control.
		$wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize,
				'd4p_off_canvas_top_bottom_widget_background_color',
				array(
					'label'         => __( 'Off Canvas Widget Background Color', 'designed4pixels' ),
					'section'       => 'd4p_off_canvas_top_bottom_colors',
					'settings'      => 'd4p_off_canvas_top_bottom_widget_background_color',
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


		/* Off Canvas Text Color */

		$wp_customize->add_setting( 'd4p_off_canvas_top_bottom_font_color',
			array(
				'default' => $color_settings[ 'd4p_off_canvas_top_bottom_font_color' ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_off_canvas_top_bottom_font_color',
			array(
				'label'        => __( 'Off Canvas Text Color', 'designed4pixels' ),
				'section'    => 'd4p_off_canvas_top_bottom_colors',
		)));


		/* Off Canvas Heading Color */

		$wp_customize->add_setting( 'd4p_off_canvas_top_bottom_header_color',
			array(
				'default' => $color_settings[ 'd4p_off_canvas_top_bottom_header_color' ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_off_canvas_top_bottom_header_color',
			array(
				'label'        => __( 'Off Canvas Heading Color', 'designed4pixels' ),
				'section'    => 'd4p_off_canvas_top_bottom_colors',
		)));


		/* Off Canvas Border Color */

		$wp_customize->add_setting( 'd4p_off_canvas_top_bottom_border_color',
			array(
				'default' => $color_settings[ 'd4p_off_canvas_top_bottom_border_color' ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_off_canvas_top_bottom_border_color',
			array(
				'label'        => __( 'Off Canvas Border Color', 'designed4pixels' ),
				'section'    => 'd4p_off_canvas_top_bottom_colors',
		)));


/* End of Parallax Image Settings */
