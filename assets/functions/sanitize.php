<?php
/* Theme Customizer Sanization Utilities */

if ( ! function_exists( 'd4p_sanitize_text' ) ) :
/**
 * Sanitize a text string.
 *
 * @since  1.0.0.
 *
 * @param  string    $string    The unsanitized string.
 * @return string               The sanitized string.
 */
function d4p_sanitize_text( $string ) {

	return sanitize_text_field( $string );

}
endif;



if ( ! function_exists( 'd4p_sanitize_html' ) ) :
/**
 * Sanitize an HTML string.
 *
 * @since  1.0.0.
 *
 * @param  string    $string    Unsanitized HTML.
 * @return string               Sanitized HTML.
 */
function d4p_sanitize_html( $html ) {

	global $allowedtags;
    $allowedtags['p'] = array();

	return wp_kses_data($html);

}
endif;



if ( ! function_exists( 'd4p_sanitize_accent_color' ) ) :
/**
 * Sanitize the Accent Color Settings to only allow
 *  - Pastel Blue (Default)
 *  - Dark Blue
 *  - Red
 *
 * @since  1.0.0.
 *
 * @param  boolean    $value    The unsanitized setting.
 * @return boolean				The sanitized setting.
 */
function d4p_sanitize_accent_color( $value ) {

	if ( ! in_array( $value, array( 'pastelblue', 'darkblue', 'red', 'green', 'violet', 'gold', 'custom' ) ) )
        $value = 'pastelblue';
 
    return $value;
}
endif;



if ( ! function_exists( 'd4p_sanitize_color_scheme' ) ) :
/**
 * Sanitize the Color Scheme Settings to only allow
 *  - Light (Default)
 *  - Dark
 *
 * @since  1.0.0.
 *
 * @param  boolean    $value    The unsanitized setting.
 * @return boolean				The sanitized setting.
 */
function d4p_sanitize_color_scheme( $value ) {

	if ( ! in_array( $value, array( 'light', 'dark', 'custom' ) ) )
        $value = 'light';
 
    return $value;
}
endif;



if ( ! function_exists( 'd4p_sanitize_file_url' ) ) :
/**
 * Sanitize the url of uploaded media.
 *
 * @since 1.0.0.
 *
 * @param  string    $value      The url to sanitize
 * @return string    $output     The sanitized url.
 */
function d4p_sanitize_file_url( $url ) {

	$output = '';

	$filetype = wp_check_filetype( $url );
	if ( $filetype["ext"] ) {
		$output = esc_url_raw( $url );
	}

	return $output;
}
endif;



if ( ! function_exists( 'd4p_sanitize_hex_color' ) ) :
/**
 * Sanitizes a hex color.
 *
 * Returns either '', a 3 or 6 digit hex color (with #), or null.
 * For sanitizing values without a #, see sanitize_hex_color_no_hash().
 *
 * @since 3.4.0
 *
 * @param string $color
 * @return string|null
 */
function d4p_sanitize_hex_color( $color ) {
	if ( '' === $color ) {
		return '';
	}

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
		return $color;
	}

	return null;
}
endif;


if ( ! function_exists( 'd4p_sanitize_page' ) ) :
/**
 * Sanitize the Color Scheme Settings to only allow
 *  - Light (Default)
 *  - Dark
 *
 * @since  1.0.0.
 *
 * @param  boolean    $value    The unsanitized setting.
 * @return boolean				The sanitized setting.
 */
function d4p_sanitize_page( $value ) {
 
    return $value;
}
endif;


if ( ! function_exists( 'd4p_sanitize_int_val' ) ) :
/**
 * Sanitize the Color Scheme Settings to only allow
 *  - Light (Default)
 *  - Dark
 *
 * @since  1.0.0.
 *
 * @param  integer    $value    The unsanitized setting.
 * @return integer				The sanitized setting.
 */
function d4p_sanitize_int_val( $value ) {
    return (int) $value;
}
endif;
