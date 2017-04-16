<?php
/*
	THEME CUSTOMIZER General Color Settings and Support for 'Designed4Pixels' theme

	NOTES

	- This file adds support and settings for the WordPress Theme Customizer
	- You can find more info at:  https://codex.wordpress.org/Theme_Customization_API
	- To customize your theme visit Appearance > Themes > Customize
	- Do not modify this file directly, use a child theme instead

*/


    	/* Color Scheme Settings */
		
		$wp_customize->add_section( 'd4p_color_scheme', 
			array(
				'title' => __( 'Theme Color Scheme', 'designed4pixels', 'designed4pixels' ),
				'description' => __( 'Customize Your Websites Color Scheme;', 'designed4pixels' ),
				'priority'    => 10,
		));


		/* Set-up Accent Color */

		$wp_customize->add_setting( 'd4p_accent_color',
			array(
				'default' => 'pastelblue',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_accent_color',
		));


		$wp_customize->add_control( 'd4p_accent_color',
    		array(
        		'type' => 'select',
        		'label' => __('Select Accent Color:', 'designed4pixels' ),
        		'section' => 'd4p_color_scheme',
        		'choices' => array(
        			'pastelblue' => __( 'Pastel Blue (Default)', 'designed4pixels' ),
            		'darkblue' => __( 'Blue', 'designed4pixels' ),
            		'red' => __( 'Red', 'designed4pixels' ),
            		'green' => __( 'Green', 'designed4pixels' ),
            		'violet' => __( 'Violet', 'designed4pixels' ),             		
            		'gold' => __( 'Gold', 'designed4pixels' ),
            		'custom' => __( 'Custom Color ...', 'designed4pixels' ),
        		),
        ));


		$wp_customize->add_setting( 'd4p_custom_accent_color',
			array(
				'default' => '#779ecb',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));


		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_custom_accent_color',
			array(
				'label'        => __( 'Custom Accent Color', 'designed4pixels' ),
				'section'    => 'd4p_color_scheme',
				'settings'   => 'd4p_custom_accent_color',
		)));


		/* Set-up Theme Color Scheme */

    	$wp_customize->add_setting( 'd4p_color_scheme',
            array(
                'default' => 'light',
                'transport'   => 'refresh',
    			'sanitize_callback' => 'd4p_sanitize_color_scheme',
        ));


        $wp_customize->add_control( 'd4p_color_scheme',
            array(
                'type' => 'select',
                'label' => __( 'Select Theme Color Scheme:', 'designed4pixels' ),
    			'description' => 'Chose from our built-in color schemes, or select "Custom Color scheme ..." to pick your own colors through a new "Custom Color Settings" Menu.',
                'section' => 'd4p_color_scheme',
                'choices' => array(
                    'light' => __( 'Minimal White (Default)', 'designed4pixels' ),
                    'dark' => __( 'Dark Color Scheme', 'designed4pixels' ),
            		'custom' => __( 'Custom Color Scheme ...', 'designed4pixels' ),
            ),
        ));


    	$wp_customize->add_panel( 'd4p_color_settings', array(
    		'title' => 'Custom Colors',
    		'description' => 'This is where you create your perfect color scheme.',
			'priority'    => 15,
    		'active_callback' => 'd4p_general_colors'
		) );


        $wp_customize->add_section( 'd4p_general_colors', 
			array(
				'title' => __( 'General Colors', 'designed4pixels', 'designed4pixels' ),
				'description' => __( 'Customize the Look & Feel of your websites general colors.', 'designed4pixels' ),
				'priority'    => 20,
				'panel' => 'd4p_color_settings',
		));


		$wp_customize->add_setting( 'd4p_body_bg_color',
				array(
					'default' => '#fefefe',
    				'transport'   => 'postMessage',
    				'sanitize_callback' => 'd4p_sanitize_hex_color',
			));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_body_bg_color',
				array(
					'label'        => __( 'Body Background Color', 'designed4pixels' ),
					'section'    => 'd4p_general_colors',
			)));


		$wp_customize->add_setting( 'd4p_body_font_color',
				array(
					'default' => '#c6c6c6',
    				'transport'   => 'postMessage',
    				'sanitize_callback' => 'd4p_sanitize_hex_color',
			));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_body_font_color',
				array(
					'label'        => __( 'Body Font Color', 'designed4pixels' ),
					'section'    => 'd4p_general_colors',
			)));

		$wp_customize->add_setting( 'd4p_header_font_color',
				array(
					'default' => '#444',
    				'transport'   => 'postMessage',
    				'sanitize_callback' => 'd4p_sanitize_hex_color',
			));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_header_font_color',
				array(
					'label'        => __( 'Header Font Color', 'designed4pixels' ),
					'section'    => 'd4p_general_colors',
			)));

		$wp_customize->add_setting( 'd4p_border_color',
				array(
					'default' => '#f1f1f1',
    				'transport'   => 'postMessage',
    				'sanitize_callback' => 'd4p_sanitize_hex_color',
			));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_border_color',
				array(
					'label'        => __( 'Border Color', 'designed4pixels' ),
					'section'    => 'd4p_general_colors',
			))); 

		$wp_customize->add_setting( 'd4p_button_background_color',
				array(
					'default' => '#ffffff',
    				'transport'   => 'postMessage',
    				'sanitize_callback' => 'd4p_sanitize_hex_color',
			));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_button_background_color',
				array(
					'label'        => __( 'Button Background Color', 'designed4pixels' ),
					'section'    => 'd4p_general_colors',
			)));

		$wp_customize->add_setting( 'd4p_button_border_color',
				array(
					'default' => '#c6c6c6',
    				'transport'   => 'postMessage',
    				'sanitize_callback' => 'd4p_sanitize_hex_color',
			));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_button_border_color',
				array(
					'label'        => __( 'Button Border Color', 'designed4pixels' ),
					'section'    => 'd4p_general_colors',
			))); 

		$wp_customize->add_setting( 'd4p_button_text_color',
				array(
					'default' => '#c6c6c6',
    				'transport'   => 'postMessage',
    				'sanitize_callback' => 'd4p_sanitize_hex_color',
			));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_button_text_color',
				array(
					'label'        => __( 'Button Text Color', 'designed4pixels' ),
					'section'    => 'd4p_general_colors',
			)));

    	/* End of Color Scheme Settings */ 

