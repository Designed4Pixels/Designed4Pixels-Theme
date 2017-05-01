<?php
/*
	THEME CUSTOMIZER Show Posts Feature Settings for the 'Designed4Pixels' theme

	NOTES

	- This file adds support and settings for the WordPress Theme Customizer
	- You can find more info at:  https://codex.wordpress.org/Theme_Customization_API
	- To customize your theme visit Appearance > Themes > Customize
	- Do not modify this file directly, use a child theme instead

*/

/* Home Page Show Posts Feature Settings */


		$d4p_show_posts_feature_widget_settings = (array) get_theme_mod( 'd4p_show_posts_feature_widget_settings');

		$d4p_show_posts_feature_color_settings = (array) get_theme_mod( 'd4p_show_posts_feature_color_settings');

		$sidebars_widgets = get_option( 'sidebars_widgets' );

		foreach ( $sidebars_widgets as $sidebars => $widgets ) {

			if ( !empty( $widgets ) && ( is_array( $widgets ))) {

				foreach ( $widgets as $widget ) {

					$d4p_active_widgets[] = $widget;

				}
			}
		}

		if ( is_array( $d4p_active_widgets)) {

			foreach ( $d4p_show_posts_feature_widget_settings as $widget_number => $value ) {

				if ( in_array($d4p_show_posts_feature_widget_settings[ $widget_number ]['id'], $d4p_active_widgets)) {

					unset( $d4p_show_posts_feature_color_settings[ 0 ] );
					$d4p_show_posts_feature_color_settings[ 'd4p_show_posts_feature_background_' . $widget_number ]		= '#fefefe';
					$d4p_show_posts_feature_color_settings[ 'd4p_show_posts_feature_border_color_' . $widget_number ]	= '#f1f1f1';			
					$d4p_show_posts_feature_color_settings[ 'd4p_show_posts_header_color_' . $widget_number ]			= '#666';
					$d4p_show_posts_feature_color_settings[ 'd4p_show_posts_card_border_color_' . $widget_number ]		= '#f1f1f1';
					$d4p_show_posts_feature_color_settings[ 'd4p_show_posts_card_background_color_' . $widget_number ]	= '#fefefe';
					$d4p_show_posts_feature_color_settings[ 'd4p_show_posts_card_header_color_' . $widget_number ]		= '#666';
					$d4p_show_posts_feature_color_settings[ 'd4p_show_posts_card_text_color_' . $widget_number ]		= '#c6c6c6';

				} else {

					unset( $d4p_show_posts_feature_widget_settings[ $widget_number ] );
					unset( $d4p_show_posts_feature_color_settings[ 'd4p_show_posts_feature_background_' . $widget_number ] );
					unset( $d4p_show_posts_feature_color_settings[ 'd4p_show_posts_feature_border_color_' . $widget_number ] );
					unset( $d4p_show_posts_feature_color_settings[ 'd4p_show_posts_header_color_' . $widget_number ] );
					unset( $d4p_show_posts_feature_color_settings[ 'd4p_show_posts_card_border_color_' . $widget_number ] );
					unset( $d4p_show_posts_feature_color_settings[ 'd4p_show_posts_card_background_color_' . $widget_number ] );
					unset( $d4p_show_posts_feature_color_settings[ 'd4p_show_posts_card_header_color_' . $widget_number ] );
					unset( $d4p_show_posts_feature_color_settings[ 'd4p_show_posts_card_text_color_' . $widget_number ] );

				}
			}

			set_theme_mod( 'd4p_show_posts_feature_widget_settings', $d4p_show_posts_feature_widget_settings );
			set_theme_mod( 'd4p_show_posts_feature_color_settings', $d4p_show_posts_feature_color_settings );

}


function d4p_show_posts_feature_settings( $d4p_color_default_settings ) {

	$d4p_show_posts_feature_color_settings = (array) get_theme_mod( 'd4p_show_posts_feature_color_settings');

	if ( is_array( $d4p_show_posts_feature_color_settings ) ) {

		return ( array_merge( $d4p_color_default_settings, $d4p_show_posts_feature_color_settings ));

	} else {

		return $d4p_color_default_settings;

	}
}
	add_filter( 'd4p_color_default_settings', 'd4p_show_posts_feature_settings', 10, 1 );


/* ----- End of Show Posts Settings ----- */