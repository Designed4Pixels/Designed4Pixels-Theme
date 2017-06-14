<?php
/*
	THEME CUSTOMIZER Call-to-Action Settings and Support for 'Designed4Pixels' theme

	NOTES

	- This file adds support and settings for the WordPress Theme Customizer
	- You can find more info at:  https://codex.wordpress.org/Theme_Customization_API
	- To customize your theme visit Appearance > Themes > Customize
	- Do not modify this file directly, use a child theme instead

*/

/* Call-to-Action Feature color settings */

$color_settings  = (array) get_theme_mod( 'd4p_cta_feature_color_settings' );
$widget_settings = (array) get_theme_mod( 'd4p_cta_feature_widget_settings');

foreach ( $widget_settings as $number => $value ) {

	if ( is_array($widget_settings[ $number ])) {

		$version = $widget_settings[ $number ]['index'];

        $wp_customize->add_section(
			'd4p_cta_settings_' . $number, 
			array(
				'title' => __( 'Call-to-Action Feature Colors ('. $version . ')', 'designed4pixels' ),
				'description' => __( 'Customize Your Home Page Call-to-Action Feature Settings;', 'designed4pixels' ),
				'priority' => 50,
				'panel' => 'd4p_color_settings',
				'active_callback' => 'd4p_cta_feature_on_home_page',
		));


				/* Set-up the Custom Header Site Description Custom Font */

		$wp_customize->add_setting( 'd4p_cta_feature_heading_font_' . $number,
			array(
				'default' => 'Source Sans Pro',
    			'transport'   => 'postMessage',
		));


		$wp_customize->add_control( new WP_Customize_Font_Control( $wp_customize, 'd4p_cta_feature_heading_font_' . $number,
    		array(
        		'type' => 'select_font',
        		'select_class' => 'customize-heading-font',
        		'show_styles'	=> false,
        		'label' => __('Call-to-Action Heading Font ('. $version . ')', 'designed4pixels' ),
        		'section' => 'd4p_cta_settings_' . $number,
        		'choices' => d4p_google_font_options(),
        )));


        /* Set-up the Custom Header Site Description Custom Font */

		$wp_customize->add_setting( 'd4p_cta_feature_body_font_' . $number,
			array(
				'default' => 'Source Sans Pro',
    			'transport'   => 'postMessage',
		));


		$wp_customize->add_control( new WP_Customize_Font_Control( $wp_customize, 'd4p_cta_feature_body_font_' . $number,
    		array(
        		'type' => 'select_font',
        		'select_class' => 'customize-body-font',
        		'show_styles'	=> false,
        		'label' => __('Call-to-Action Body Font ('. $version . ')', 'designed4pixels' ),
        		'section' => 'd4p_cta_settings_' . $number,
        		'choices' => d4p_google_font_options(),
        )));


		/* ----- Call-to-Action Feature Background Color ----- */
		
		$wp_customize->add_setting( 'd4p_cta_feature_background_' . $number,
			array(
				'default' => $color_settings[ 'd4p_cta_feature_background_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_cta_feature_background_' . $number,
			array(
				'label'        => __( 'Call-to-Action Background Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_cta_settings_' . $number,
		)));


		/* ----- Call-to-Action Feature Border Color ----- */


		$wp_customize->add_setting( 'd4p_cta_feature_top_border_' . $number,
			array(
				'default' => $color_settings[ 'd4p_cta_feature_top_border_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_cta_feature_top_border_' . $number,
			array(
				'label'        => __( 'Top Border Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_cta_settings_' . $number,
		)));


		/* ----- Set-up Show Posts Border Color & Opacity ----- */

		// Alpha Color Picker setting.
		$wp_customize->add_setting(
			'd4p_cta_feature_bottom_border_' . $number,
			array(
				'default'     => $color_settings[ 'd4p_cta_feature_bottom_border_' . $number ],
				'type'        => 'theme_mod',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);

		// Alpha Color Picker control.
		$wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize,
				'd4p_cta_feature_bottom_border_' . $number,
				array(
					'label'         => __( 'Bottom Border Color ('. $version . ')', 'designed4pixels' ),
					'section'       => 'd4p_cta_feature_settings_' . $number,
					'settings'      => 'd4p_cta_feature_bottom_border_' . $number,
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


		/* ----- Call-to-Action Feature Color ----- */

		$wp_customize->add_setting( 'd4p_cta_feature_color_' . $number,
			array(
				'default' => $color_settings[ 'd4p_cta_feature_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_cta_feature_color_' . $number,
			array(
				'label'        => __( 'Call-to-Action Text Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_cta_settings_' . $number,
		)));


		/* ----- Call-to-Action Feature Header Color ----- */

		$wp_customize->add_setting( 'd4p_cta_feature_header_color_' . $number,
			array(
				'default' => $color_settings[ 'd4p_cta_feature_header_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_cta_feature_header_color_' . $number,
			array(
				'label'        => __( 'Call-to-Action Header Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_cta_settings_' . $number,
		)));


		/* ----- Call-to-Action Feature Sub Heading Color ----- */

		$wp_customize->add_setting( 'd4p_cta_feature_sub_header_color_' . $number,
			array(
				'default' => $color_settings[ 'd4p_cta_feature_sub_header_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_cta_feature_sub_header_color_' . $number,
			array(
				'label'        => __( 'Call-to-Action Sub-Heading Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_cta_settings_' . $number,
		)));


		/* ----- Call-to-Action Feature Heading Color ----- */

		$wp_customize->add_setting( 'd4p_cta_feature_hr_color_' . $number,
			array(
				'default' => $color_settings[ 'd4p_cta_feature_hr_color_' . $number ],
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_cta_feature_hr_color_' . $number,
			array(
				'label'        => __( 'Call-to-Action Horizontal Rule Color ('. $version . ')', 'designed4pixels' ),
				'section'    => 'd4p_cta_settings_' . $number,
		)));

	}
}


/* End of Call-to-Action Settings */