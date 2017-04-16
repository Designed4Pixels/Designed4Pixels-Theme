<?php
/*
	THEME CUSTOMIZER Footer Settings and Support for 'Designed4Pixels' theme

	NOTES

	- This file adds support and settings for the WordPress Theme Customizer
	- You can find more info at:  https://codex.wordpress.org/Theme_Customization_API
	- To customize your theme visit Appearance > Themes > Customize
	- Do not modify this file directly, use a child theme instead

*/


		/* Footer Settings */
		
		$wp_customize->add_section(
			'd4p_footer_settings', 
			array(
				'title' => __( 'Footer', 'designed4pixels' ),
				'description' => __( 'Customize Your Websites Footer Settings;', 'designed4pixels' ),
				'priority' => 115,
		));


		/* Set-up Footer Text */

		$wp_customize->add_setting(
			'd4p_footer_text',
			array(
				'default' => '<p><a href="http://wordpress.org/">Proudly powered by WordPress</a></p>',
				'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_html',
		));


		$wp_customize->add_control(
			'd4p_footer_text',
			array(
				'label' => 'Footer Text:',
				'section' => 'd4p_footer_settings',
				'type' => 'text',
		));


		/* Set-up Footer Background Color */

        $wp_customize->add_section( 'd4p_footer_colors', 
			array(
				'title' => __( 'Footer Colors', 'designed4pixels', 'designed4pixels' ),
				'description' => __( 'Customize the Look & Feel of your Websites Footer.', 'designed4pixels' ),
				'priority'    => 110,
				'panel' => 'd4p_color_settings',
		));

		$wp_customize->add_setting( 'd4p_footer_background',
			array(
				'default' => '#fefefe',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_footer_background',
			array(
				'label'        => __( 'Footer Background Color', 'designed4pixels' ),
				'section'    => 'd4p_footer_colors',
			)));


		/* Set-up Footer Border Top Color */

		$wp_customize->add_setting( 'd4p_footer_border_top',
			array(
				'default' => '#f1f1f1',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_footer_border_top',
			array(
				'label'        => __( 'Footer Top Border Color', 'designed4pixels' ),
				'section'    => 'd4p_footer_colors',
			)));


		/* Set-up Footer Text Color */

		$wp_customize->add_setting( 'd4p_footer_text_color',
			array(
				'default' => '#c6c6c6',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_footer_text_color',
			array(
				'label'        => __( 'Footer Text Color', 'designed4pixels' ),
				'section'    => 'd4p_footer_colors',
			)));


		/* Set-up Footer Icon Background Color */

		$wp_customize->add_setting( 'd4p_footer_icon_background_color',
			array(
				'default' => '#c6c6c6',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_footer_icon_background_color',
			array(
				'label'        => __( 'Footer Icon Background Color', 'designed4pixels' ),
				'section'    => 'd4p_footer_colors',
			)));


		/* Set-up Footer Icon Text Color */

		$wp_customize->add_setting( 'd4p_footer_icon_text_color',
			array(
				'default' => '#fefefe',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_footer_icon_text_color',
			array(
				'label'        => __( 'Footer Icon Text Color', 'designed4pixels' ),
				'section'    => 'd4p_footer_colors',
			)));



		/* Set-up Footer Column Colors */

		$wp_customize->add_section( 'd4p_footer_col_colors', 
			array(
				'title' => __( 'Footer Column Colors', 'designed4pixels', 'designed4pixels' ),
				'description' => __( 'Customize the Look & Feel of the Home Page Footer Columns.', 'designed4pixels' ),
				'priority'    => 100,
				'panel' => 'd4p_color_settings',
				'active_callback' => 'is_footer_col_active'
		));

		$wp_customize->add_setting( 'd4p_footer_col_background',
			array(
				'default' => '#fefefe',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_footer_col_background',
			array(
				'label'        => __( 'Footer Cols Background Color', 'designed4pixels' ),
				'section'    => 'd4p_footer_col_colors',
		)));


		/* Set-up Footer Column Color */

		$wp_customize->add_setting( 'd4p_footer_col_border_color',
			array(
				'default' => '#f1f1f1',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_footer_col_border_color',
			array(
				'label'        => __( 'Footer Cols Border Color', 'designed4pixels' ),
				'section'    => 'd4p_footer_col_colors',
		)));


		/* Set-up Footer Column Heading Color */

		$wp_customize->add_setting( 'd4p_footer_col_header_color',
			array(
				'default' => '#666',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_footer_col_header_color',
			array(
				'label'        => __( 'Footer Cols Header Color', 'designed4pixels' ),
				'section'    => 'd4p_footer_col_colors',
		)));

		/* Set-up Footer Column Heading Color */

		$wp_customize->add_setting( 'd4p_footer_col_color',
			array(
				'default' => '#c6c6c6',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_footer_col_color',
			array(
				'label'        => __( 'Footer Cols Text Color', 'designed4pixels' ),
				'section'    => 'd4p_footer_col_colors',
		)));


    	/* End of Footer Settings */
