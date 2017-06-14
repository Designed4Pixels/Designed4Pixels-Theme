<?php
/*
	THEME CUSTOMIZER General Color Settings and Support for 'Designed4Pixels' theme

	NOTES

	- This file adds support and settings for the WordPress Theme Customizer
	- You can find more info at:  https://codex.wordpress.org/Theme_Customization_API
	- To customize your theme visit Appearance > Themes > Customize
	- Do not modify this file directly, use a child theme instead

*/


		/* ----- Set-up New Select Font Control ----- */

        if( class_exists( 'WP_Customize_Control' ) ):
				class WP_Customize_Font_Control extends WP_Customize_Control {
					public $type = 'select_font';

					/**
	 				* Add support for font display box class to be passed in.
	 				*
	 				* Supported palette values are true, false, or an array of RGBa and Hex colors.
	 				*/
					public $output_class = '';

					/**
	 				* Add support for font display box class to be passed in.
	 				*
	 				* Supported palette values are true, false, or an array of RGBa and Hex colors.
	 				*/
					public $select_class = 'customize-font-list';

					/**
	 				* Add support for font display box class to be passed in.
	 				*
	 				* Supported palette values are true, false, or an array of RGBa and Hex colors.
	 				*/
					public $default_font = 'Source Sans Pro';

					/**
	 				* Add support for font display box class to be passed in.
	 				*
	 				* Supported palette values are true, false, or an array of RGBa and Hex colors.
	 				*/
					public $show_styles = false;
 
					public function render_content() {
				
					if ( empty( $this->choices ) )
						return;
					?>
					<label>
						<?php if ( ! empty( $this->label ) ) : ?>
							<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
						<?php endif;
						if ( ! empty( $this->description ) ) : ?>
							<span class="description customize-control-description"><?php echo $this->description; ?></span>
						<?php endif; ?>

						<select class="<?php echo $this->select_class; ?>" <?php $this->link(); ?>>
						<?php
						foreach ( $this->choices as $value => $label )
							echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . $label . '</option>';
						?>
						</select>
						
					</label>

					<?php if ( $this->show_styles ) { ?> 
					<div style="background-color: white; border: solid 1px #ddd; height: 30px; display: table; margin: 10px 1px; overflow: auto; padding: 5px; width: 260px;">
							<p class="<?php echo $this->output_class; ?>" style="margin-top: 0; vertical-align: middle; display: table-cell; font-size: 16px; line-height: 1.6; font-family: <?php echo $this->default_font; ?>">
								This is the font selected
							</p>
					</div>
					<?php
					}}
				}
		endif;

		/* ----- Set-up Archive Page Color Settings ----- */

		$wp_customize->add_section( 'd4p_google_fonts', 
			array(
				'title' => __( 'Custom Google Fonts', 'designed4pixels' ),
				'description' => __( 'Select the Google Fonts to use throughout your Website below. These will then show-up in drop-down lists throughout the customizer.', 'designed4pixels' ),
				'priority'    => 10,
				'panel' => 'd4p_color_settings'
		));

    			/* $fonts_list = array_flip( get_theme_mod( 'd4p_selected_fonts_list' ) );

    	$font_one = $fonts_list[ get_theme_mod( 'd4p_google_font_option_one', 'Source Sans Pro') ];
    	$font_two = $fonts_list[ get_theme_mod( 'd4p_google_font_option_two', 'Source Sans Pro') ];	*/

    	$font_one = get_theme_mod( 'd4p_google_font_option_one', 'Source Sans Pro');
    	$font_two = get_theme_mod( 'd4p_google_font_option_two', 'Source Sans Pro');
    	$font_three = get_theme_mod( 'd4p_google_font_option_three', 'Source Sans Pro');
    	$font_four = get_theme_mod( 'd4p_google_font_option_four', 'Source Sans Pro');


		/* Set-up First Google Font Option */

		$wp_customize->add_setting( 'd4p_google_font_option_one',
			array(
				'default' => 'Source Sans Pro',
    			'transport'   => 'postMessage'
		));


		$wp_customize->add_control( new WP_Customize_Font_Control( $wp_customize, 'd4p_google_font_option_one',
    		array(
        		'type' => 'select_font',
        		'output_class' => 'google-font-option-one',
        		'default_font' => $font_one,
        		'show_styles'	=> true,
        		'label' => __('Select First Google Font:', 'designed4pixels' ),
        		'section' => 'd4p_google_fonts',
        		'choices' => d4p_google_font_list(),
        )));


		/* Set-up Second Google Font Option */

		$wp_customize->add_setting( 'd4p_google_font_option_two',
			array(
				'default' => 'Source Sans Pro',
    			'transport'   => 'postMessage'
		));


		$wp_customize->add_control( new WP_Customize_Font_Control( $wp_customize, 'd4p_google_font_option_two',
    		array(
        		'type' => 'select_font',
        		'output_class' => 'google-font-option-two',
        		'default_font' => $font_two,
        		'show_styles'	=> true,
        		'label' => __('Select Second Google Font:', 'designed4pixels' ),
        		'section' => 'd4p_google_fonts',
        		'choices' => d4p_google_font_list(),
        )));


		/* Set-up Third Google Font Option */

		$wp_customize->add_setting( 'd4p_google_font_option_three',
			array(
				'default' => 'Source Sans Pro',
    			'transport'   => 'postMessage'
		));


		$wp_customize->add_control( new WP_Customize_Font_Control( $wp_customize, 'd4p_google_font_option_three',
    		array(
        		'type' => 'select_font',
        		'output_class' => 'google-font-option-three',
        		'default_font' => $font_three,
        		'show_styles'	=> true,
        		'label' => __('Select Third Google Font:', 'designed4pixels' ),
        		'section' => 'd4p_google_fonts',
        		'choices' => d4p_google_font_list(),
        )));


		/* Set-up Forth Google Font Option */

		$wp_customize->add_setting( 'd4p_google_font_option_four',
			array(
				'default' => 'Source Sans Pro',
    			'transport'   => 'postMessage'
		));


		$wp_customize->add_control( new WP_Customize_Font_Control( $wp_customize, 'd4p_google_font_option_four',
    		array(
        		'type' => 'select_font',
        		'output_class' => 'google-font-option-four',
        		'default_font' => $font_four,
        		'show_styles'	=> true,
        		'label' => __('Select Forth Google Font:', 'designed4pixels' ),
        		'section' => 'd4p_google_fonts',
        		'choices' => d4p_google_font_list(),
        )));


// creates list of fonts for the drop-down list in controls
function d4p_google_font_list() {

	include get_template_directory() . '/inc/google-fonts/google-font-list.php' ;

  	set_theme_mod( 'd4p_google_fonts_list', $google_fonts_list );

  	foreach ( $google_fonts_list as $key => $value ) {

		$choices[ $key ] = __( $key, 'designed4pixels' );
	}

	return $choices;
}


function my_customizer_script(){

	$google_fonts_list = (array) get_theme_mod( 'd4p_google_fonts_list' );

/*	foreach ( $google_fonts_list as $key => $value ) {

		$updated_font_list[ $value ] = __( $key, 'designed4pixels' );
	} */

	wp_register_script( 
      	'customizer-script',
      	get_theme_file_uri( '/assets/js/customizer-script.min.js' ),
      	array( 'customize-controls', 'wp-util' ),
      	'1.0',
      	true
    	);

    wp_enqueue_script( 'customizer-script' );

    wp_localize_script( 'customizer-script', 'googleFontList', $google_fonts_list );
}

add_action( 'customize_controls_print_footer_scripts', 'my_customizer_script' );

/* End of Color Scheme Settings */