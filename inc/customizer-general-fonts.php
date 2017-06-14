<?php
/*
	THEME CUSTOMIZER General Color Settings and Support for 'Designed4Pixels' theme

	NOTES

	- This file adds support and settings for the WordPress Theme Customizer
	- You can find more info at:  https://codex.wordpress.org/Theme_Customization_API
	- To customize your theme visit Appearance > Themes > Customize
	- Do not modify this file directly, use a child theme instead

*/




		/* ----- Set-up General Font Settings ----- */

		$wp_customize->add_section( 'd4p_general_fonts', 
			array(
				'title' => __( 'General Fonts', 'designed4pixels' ),
				'description' => __( 'Select the General Font Settings for your Website .', 'designed4pixels' ),
				'priority'    => 25,
				'panel' => 'd4p_color_settings'
		));


		/* Set-up the Custom Header Site Description Custom Font */

		$wp_customize->add_setting( 'd4p_general_heading_custom_font',
			array(
				'default' => 'Source Sans Pro',
    			'transport'   => 'postMessage',
		));


		$wp_customize->add_control( new WP_Customize_Font_Control( $wp_customize, 'd4p_general_heading_custom_font',
    		array(
        		'type' => 'select_font',
        		'select_class' => 'customize-heading-font',
        		'show_styles'	=> false,
        		'label' => __('General Heading Font:', 'designed4pixels' ),
        		'section' => 'd4p_general_fonts',
        		'choices' => d4p_google_font_options(),
        )));


		/* Set-up the Custom Header Title Custom Font */

		$wp_customize->add_setting( 'd4p_general_body_custom_font',
			array(
				'default' => 'Source Sans Pro',
    			'transport'   => 'postMessage',
		));


		$wp_customize->add_control( new WP_Customize_Font_Control( $wp_customize, 'd4p_general_body_custom_font',
    		array(
        		'type' => 'select_font',
        		'select_class' => 'customize-body-font',
        		'show_styles'	=> false,
        		'label' => __('General Body Font:', 'designed4pixels' ),
        		'section' => 'd4p_general_fonts',
        		'choices' => d4p_google_font_options(),
        )));


    	/* End of Header Settings */