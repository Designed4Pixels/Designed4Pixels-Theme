<?php
/*
	THEME CUSTOMIZER Archive Settings and Support for 'Designed4Pixels' theme

	NOTES

	- This file adds support and settings for the WordPress Theme Customizer
	- You can find more info at:  https://codex.wordpress.org/Theme_Customization_API
	- To customize your theme visit Appearance > Themes > Customize
	- Do not modify this file directly, use a child theme instead

*/


		/* Custom Archive Settings */
		
		$wp_customize->add_section(
			'd4p_archive_settings', 
			array(
				'title' => __( 'Custom Portfolio', 'designed4pixels' ),
				'description' => __( 'Configure the Custom Portfolio;', 'designed4pixels' ),
				'priority' => 118,
		));		


		/* Set-up Archive Name */

		$wp_customize->add_setting(
			'd4p_content_type',
			array(
				'type' => 'option',
				'default' => 'portfolio',
				'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_html',
		));


		$wp_customize->add_control(
			'd4p_content_type',
			array(
				'label' => 'Edit Custom Archive Name:',
				'section' => 'd4p_archive_settings',
				'type' => 'text',
		));


		/* ----- Set-up Archive Page Color Settings ----- */

		$wp_customize->add_section( 'd4p_portfolio_colors', 
			array(
				'title' => __( 'Custom Portfolio Colors', 'designed4pixels', 'designed4pixels' ),
				'description' => __( 'Customize the Look & Feel of your Websites Portfolio Page.', 'designed4pixels' ),
				'priority'    => 90,
				'panel' => 'd4p_color_settings',
				'active_callback' => 'is_portfolio_page'
		));


		/* ----- Set-up Archive Heading Color ----- */

		$wp_customize->add_setting( 'd4p_archive_header_color',
			array(
				'default' => '#666',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_archive_header_color',
			array(
				'label'        => __( 'Portfolio Heading Color', 'designed4pixels' ),
				'section'    => 'd4p_portfolio_colors',
			)));


		/* ----- Set-up Archive Heading Border Color ----- */

		$wp_customize->add_setting( 'd4p_archive_header_border_color',
			array(
				'default' => '#f1f1f1',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_archive_header_border_color',
			array(
				'label'        => __( 'Portfolio Header Border Color', 'designed4pixels' ),
				'section'    => 'd4p_portfolio_colors',
			)));


		/* ----- Set-up Archive Card Background Color ----- */

		$wp_customize->add_setting( 'd4p_archive_card_background_color',
			array(
				'default' => '#fefefe',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));


		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_archive_card_background_color',
			array(
				'label'        => __( 'Portfolio Card Background Color', 'designed4pixels' ),
				'section'    => 'd4p_portfolio_colors',
			)));


		/* ----- Set-up Archive Card Border Color ----- */

		$wp_customize->add_setting( 'd4p_archive_card_border_color',
			array(
				'default' => '#f1f1f1',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_archive_card_border_color',
			array(
				'label'        => __( 'Portfolio Card Border Color', 'designed4pixels' ),
				'section'    => 'd4p_portfolio_colors',
			)));


		/* ----- Set-up Archive Card Heading Color ----- */

		$wp_customize->add_setting( 'd4p_archive_card_header_color',
			array(
				'default' => '#666',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_archive_card_header_color',
			array(
				'label'        => __( 'Portfolio Card Heading Color', 'designed4pixels' ),
				'section'    => 'd4p_portfolio_colors',
			)));


		/* ----- Set-up Archive Card Text Color ----- */

		$wp_customize->add_setting( 'd4p_archive_card_text_color',
			array(
				'default' => '#c6c6c6',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_archive_card_text_color',
			array(
				'label'        => __( 'Portfolio Card Text Color', 'designed4pixels' ),
				'section'    => 'd4p_portfolio_colors',
			)));


/* End of Custom Archive Settings */ 