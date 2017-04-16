<?php
/*
	THEME CUSTOMIZER Image Feature Settings for the 'Designed4Pixels' theme

	NOTES

	- This file adds support and settings for the WordPress Theme Customizer
	- You can find more info at:  https://codex.wordpress.org/Theme_Customization_API
	- To customize your theme visit Appearance > Themes > Customize
	- Do not modify this file directly, use a child theme instead

*/

/* Home Page Image Feature Settings */

$color_settings  = (array) get_theme_mod( 'd4p_image_feature_color_settings' );
$widget_settings = (array) get_theme_mod( 'd4p_image_feature_widget_settings');

foreach ( $widget_settings as $number => $value ) {

	if ( is_array($widget_settings[ $number ])) {

		$version = $widget_settings[ $number ]['index'];
		
    	$wp_customize->add_section( 'd4p_image_feature_colors_' . $number, 
			array(
				'title' => __( 'Image Feature Colors ('. $version . ')', 'designed4pixels' ),
				'description' => __( 'Customize your websites home page image feature settings using the controls below.', 'designed4pixels' ),
				'priority' => 30,
				'panel' => 'd4p_color_settings',
				'active_callback' => 'd4p_image_feature_on_home_page',
		));


		/* ----- Set-up Image Feature Heading Color ----- */

		$wp_customize->add_setting( 'd4p_image_feature_header_color_'. $number,
			array(
				'default' => $color_settings[ 'd4p_image_feature_header_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_image_feature_header_color_' . $number,
			array(
				'label'        => __( 'Image Feature Heading Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_image_feature_colors_' . $number,
		)));


		/* ----- Set-up Image Feature Text Color ----- */

		$wp_customize->add_setting( 'd4p_image_feature_text_color_'. $number,
			array(
				'default' => $color_settings[ 'd4p_image_feature_text_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_image_feature_text_color_'. $number,
			array(
				'label'        => __( 'Image Feature Text Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_image_feature_colors_' . $number,
		)));


		/* ----- Set-up Image Feature Mask Color & Opacity ----- */

		// Alpha Color Picker setting.
		$wp_customize->add_setting(
			'd4p_image_feature_mask_color_' . $number,
			array(
				'default'     => $color_settings[ 'd4p_image_feature_mask_color_' . $number ],
				'type'        => 'theme_mod',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);

		// Alpha Color Picker control.
		$wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize,
				'd4p_image_feature_mask_color_' . $number,
				array(
					'label'         => __( 'Image Feature Mask Color ('. $version . ')', 'designed4pixels' ),
					'section'       => 'd4p_image_feature_colors_' . $number,
					'settings'      => 'd4p_image_feature_mask_color_' . $number,
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


		/* ----- Set-up Image Feature Container Mask Color & Opacity ----- */

		// Alpha Color Picker setting.
		$wp_customize->add_setting(
			'd4p_image_feature_container_mask_color_' . $number,
			array(
				'default'     => $color_settings[ 'd4p_image_feature_container_mask_color_' . $number ],
				'type'        => 'theme_mod',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);

		// Alpha Color Picker control.
		$wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize,
				'd4p_image_feature_container_mask_color_' . $number,
				array(
					'label'         => __( 'Image Feature Container Mask Color ('. $version . ')', 'designed4pixels' ),
					'section'       => 'd4p_image_feature_colors_' . $number,
					'settings'      => 'd4p_image_feature_container_mask_color_' . $number,
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



		/* ----- Set-up Image Feature Container Border Color & Opacity ----- */

		// Alpha Color Picker setting.
		$wp_customize->add_setting(
			'd4p_image_feature_container_border_color_' . $number,
			array(
				'default'     => $color_settings[ 'd4p_image_feature_container_border_color_' . $number ],
				'type'        => 'theme_mod',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);

		// Alpha Color Picker control.
		$wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize,
				'd4p_image_feature_container_border_color_' . $number,
				array(
					'label'         => __( 'Text Container Border Color ('. $version . ')', 'designed4pixels' ),
					'section'       => 'd4p_image_feature_colors_' . $number,
					'settings'      => 'd4p_image_feature_container_border_color_' . $number,
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


		/* ----- Set-up Image Feature Background Color ----- */

		$wp_customize->add_setting( 'd4p_image_feature_background_' . $number,
			array(
				'default'			=> $color_settings[ 'd4p_image_feature_background_' . $number ],
    			'transport'			=> 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_image_feature_background_'. $number,
			array(
				'label'			=> __( 'Image Feature Background Color ('. $version . ')', 'designed4pixels' ),
				'description'	=> __( 'Note: The background color setting only shows when you have no featured image selected.', 'designed4pixels' ),
				'section'		=> 'd4p_image_feature_colors_' . $number,
		)));


		/* ----- Set-up Image Feature Top Padding ----- */

		$wp_customize->add_setting( 'd4p_image_feature_position_' . $number,
			array(
        		'default' => '',
        		'type' => 'theme_mod',
        		'capability' => 'edit_theme_options',
        		'transport' => 'postMessage',
        		'sanitize_callback' => 'd4p_sanitize_int_val',
    	));

    	$wp_customize->add_control( 'd4p_image_feature_position_' . $number,
    		array(
        		'type' => 'range',
        		'priority' => 10,
        		'section' => 'd4p_image_feature_colors_' . $number,
        		'label' => __( 'Image Feature Text Box Position ('. $version . ')', 'designed4pixels' ),
        		'description'	=> __( 'This allows the position of the image feature text position to be adjusted.', 'designed4pixels' ),
    			'input_attrs' => array(
            		'min' => 1,
            		'max' => 300,
            		'step' => 1,
            		'class' => 'example-class',
            		'style' => 'color: #ff0022',
            ),
    	));

	}
}

/* ----- End of Hero Image Settings ----- */