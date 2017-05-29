<?php
/*
	THEME CUSTOMIZER Archive Settings and Support for 'Designed4Pixels' theme

	NOTES

	- This file adds support and settings for the WordPress Theme Customizer
	- You can find more info at:  https://codex.wordpress.org/Theme_Customization_API
	- To customize your theme visit Appearance > Themes > Customize
	- Do not modify this file directly, use a child theme instead

*/


		/* ----- Set-up Archive Page Color Settings ----- */

		$wp_customize->add_section( 'd4p_woocommerce_colors', 
			array(
				'title' => __( 'Custom WooCommerce Colors', 'designed4pixels' ),
				'description' => __( 'Customize the Look & Feel of your WooCommerce Shop Page.', 'designed4pixels' ),
				'priority'    => 90,
				'panel' => 'd4p_color_settings',
				'active_callback' => 'is_shop_page'
		));


		/* ----- Set-up Archive Heading Color ----- */

		$wp_customize->add_setting( 'd4p_woocommerce_header_color',
			array(
				'default' => '#666',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_woocommerce_header_color',
			array(
				'label'        => __( 'WooCommerce Heading Color', 'designed4pixels' ),
				'section'    => 'd4p_woocommerce_colors',
			)));


		/* ----- Set-up Archive Heading Border Color ----- */

		$wp_customize->add_setting( 'd4p_woocommerce_header_border_color',
			array(
				'default' => '#f1f1f1',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_woocommerce_header_border_color',
			array(
				'label'        => __( 'WooCommerce Header Border Color', 'designed4pixels' ),
				'section'    => 'd4p_woocommerce_colors',
			)));


		/* ----- Set-up Archive Card Background Color ----- */

		$wp_customize->add_setting( 'd4p_woocommerce_card_background_color',
			array(
				'default' => '#fefefe',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));


		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_woocommerce_card_background_color',
			array(
				'label'        => __( 'WooCommerce Card Background Color', 'designed4pixels' ),
				'section'    => 'd4p_woocommerce_colors',
			)));


		/* ----- Set-up Archive Card Border Color ----- */

		$wp_customize->add_setting( 'd4p_woocommerce_card_border_color',
			array(
				'default' => '#f1f1f1',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_woocommerce_card_border_color',
			array(
				'label'        => __( 'WooCommerce Card Border Color', 'designed4pixels' ),
				'section'    => 'd4p_woocommerce_colors',
			)));


		/* ----- Set-up Archive Card Heading Color ----- */

		$wp_customize->add_setting( 'd4p_woocommerce_card_header_color',
			array(
				'default' => '#666',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_woocommerce_card_header_color',
			array(
				'label'        => __( 'WooCommerce Card Heading Color', 'designed4pixels' ),
				'section'    => 'd4p_woocommerce_colors',
			)));


		/* ----- Set-up Archive Card Text Color ----- */

		$wp_customize->add_setting( 'd4p_woocommerce_card_text_color',
			array(
				'default' => '#c6c6c6',
    			'transport'   => 'postMessage',
    			'sanitize_callback' => 'd4p_sanitize_hex_color',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'd4p_woocommerce_card_text_color',
			array(
				'label'        => __( 'WooCommerce Card Text Color', 'designed4pixels' ),
				'section'    => 'd4p_woocommerce_colors',
			)));


/* End of Custom Archive Settings */ 