<?php
/*
	THEME CUSTOMIZER Header Settings and Support for 'Designed4Pixels' theme

	NOTES

	- This file adds support and settings for the WordPress Theme Customizer
	- You can find more info at:  https://codex.wordpress.org/Theme_Customization_API
	- To customize your theme visit Appearance > Themes > Customize
	- Do not modify this file directly, use a child theme instead

*/


		/* Header Settings */

		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
      	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		
		$wp_customize->add_section('d4p_header_settings', array(
        	'title'       => __( 'Header', 'designed4pixels' ),
        	'priority'    => 40,
        	'description' => __( 'Customize the Websites Header Settings;', 'designed4pixels' ),
    	));
    	

		/* Set-up Header Logo Image */
		
		$wp_customize->add_setting( 'd4p_header_logo_image' , array(
    		'default'     => sprintf( '%s/assets/images/demo-logo.png', get_template_directory_uri() ),
    		'transport'   => 'postMessage',
    		'sanitize_callback' => 'd4p_sanitize_file_url',
		));

		
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'd4p_header_logo_image',
			array(
               'label'      => __( 'Upload a New Header Logo Image:', 'designed4pixels' ),
               'section'    => 'd4p_header_settings',
               'settings'   => 'd4p_header_logo_image',
			   'context'	=> 'header-logo',
    	)));


    	/* ------ Set-up Infobar Color Settings ------ */

    	$wp_customize->add_section( 'd4p_header_colors', 
			array(
				'title' => __( 'Header & Menu Colors', 'designed4pixels', 'designed4pixels' ),
				'description' => __( 'Customize your websites Header & Menu Colors.', 'designed4pixels' ),
				'priority'    => 10,
				'panel' => 'd4p_color_settings',
		));


		/* Set-up Infobar background Color */

		// Alpha Color Picker setting.
		$wp_customize->add_setting(
			'd4p_infobar_background',
			array(
				'default'     => '#fefefe',
				'type'        => 'theme_mod',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);


		// Alpha Color Picker control.
		$wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'd4p_infobar_background',
				array(
					'label'         => __( 'Info Bar Background Color', 'designed4pixels' ),
					'section'       => 'd4p_header_colors',
					'active_callback' => 'is_infobar_active',
					'settings'      => 'd4p_infobar_background',
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


		/* Set-up Infobar Border Color */

		// Alpha Color Picker setting.
		$wp_customize->add_setting(
			'd4p_infobar_border_color',
			array(
				'default'     => '#f1f1f1',
				'type'        => 'theme_mod',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);


		// Alpha Color Picker control.
		$wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'd4p_infobar_border_color',
				array(
					'label'         => __( 'Info Bar Border Color', 'designed4pixels' ),
					'section'       => 'd4p_header_colors',
					'active_callback' => 'is_infobar_active',
					'settings'      => 'd4p_infobar_border_color',
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


		/* Set-up Infobar Text Color */

		$wp_customize->add_setting( 'd4p_infobar_text_color',
			array(
				'default' => '#c6c6c6',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_infobar_text_color',
			array(
				'label'        => __( 'Info Bar Text Color', 'designed4pixels' ),
				'section'    => 'd4p_header_colors',
				'active_callback' => 'is_infobar_active',
		)));


		/* ----- Set-up Infobar Icon Text Color ----- */

		$wp_customize->add_setting( 'd4p_infobar_icon_text_color',
			array(
				'default' => '#fefefe',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_infobar_icon_text_color',
			array(
				'label'        => __( 'Info Bar Icon Text Color', 'designed4pixels' ),
				'section'    => 'd4p_header_colors',
				'active_callback' => 'is_infobar_active',
		)));


		/* ----- Set-up Infobar Icon Background Color ----- */

		$wp_customize->add_setting( 'd4p_infobar_icon_background_color',
			array(
				'default' => '#c6c6c6',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_infobar_icon_background_color',
			array(
				'label'        => __( 'Info Bar Icon Background Color', 'designed4pixels' ),
				'section'    => 'd4p_header_colors',
				'active_callback' => 'is_infobar_active',
		)));


		/* Set-up Logo Bar background Color */

		// Alpha Color Picker setting.
		$wp_customize->add_setting(
			'd4p_logobar_background',
			array(
				'default'     => '#fefefe',
				'type'        => 'theme_mod',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);

		// Alpha Color Picker control.
		$wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'd4p_logobar_background',
				array(
					'label'         => __( 'Logo/Menu Bar Background Color', 'designed4pixels' ),
					'section'       => 'd4p_header_colors',
					'settings'      => 'd4p_logobar_background',
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


		/* Set-up Logo Bar Border Color */

		// Alpha Color Picker setting.
		$wp_customize->add_setting(
			'd4p_logobar_border_color',
			array(
				'default'     => '#f1f1f1',
				'type'        => 'theme_mod',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);

		// Alpha Color Picker control.
		$wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'd4p_logobar_border_color',
				array(
					'label'         => __( 'Logo/Menu Bar Border Color', 'designed4pixels' ),
					'section'       => 'd4p_header_colors',
					'settings'      => 'd4p_logobar_border_color',
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


		$wp_customize->add_setting( 'd4p_anchor_color',
				array(
					'default' => '#aaa',
    				'transport'   => 'postMessage',
    				'sanitize_callback' => 'd4p_sanitize_hex_color',
			));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_anchor_color',
				array(
					'label'        => __( 'Menu Link Text Color', 'designed4pixels' ),
					'section'    => 'd4p_header_colors',
			)));


		/* Set-up Logo Bar Border Color */

		// Alpha Color Picker setting.
		$wp_customize->add_setting(
			'd4p_nav_hover_color',
			array(
				'default'     => '#999',
				'type'        => 'theme_mod',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);

		// Alpha Color Picker control.
		$wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'd4p_nav_hover_color',
				array(
					'label'         => __( 'Menu Link Text Hover Color', 'designed4pixels' ),
					'section'       => 'd4p_header_colors',
					'settings'      => 'd4p_nav_hover_color',
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


		/* Set-up Logo Bar background Color */

		// Alpha Color Picker setting.
		$wp_customize->add_setting(
			'd4p_nav_hover_background',
			array(
				'default'     => '#f4f4f4',
				'type'        => 'theme_mod',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);

		// Alpha Color Picker control.
		$wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'd4p_nav_hover_background',
				array(
					'label'         => __( 'Menu Option Background/Hover Color', 'designed4pixels' ),
					'section'       => 'd4p_header_colors',
					'settings'      => 'd4p_nav_hover_background',
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


    	/* End of Header Settings */