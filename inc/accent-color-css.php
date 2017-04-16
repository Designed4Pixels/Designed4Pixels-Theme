<?php
/**
 * Designed4Pixels: Accent Colors
 *
 * @package WordPress
 * @subpackage Designed4Pixels
 * @since 1.0
 */

/**
 * Generate the CSS for the current custom color scheme.
 */
function d4p_accent_color_css() {

	$accent_color = get_theme_mod( 'd4p_custom_accent_color' );

	$css = '
/**
 * Designed4Pixels: Accent Colors CSS
 *
 */

.custom-color .accent-color {
  color: ' . $accent_color . ' !important; }

.custom-color .pagination .current {
  background: ' . $accent_color . '; }

.custom-color .icon-feature .icon-font {
  color: ' . $accent_color . '; }

.custom-color .logo-bar li > a:hover, .color-one .logo-bar li > a:focus {
  border-bottom: 2px solid ' . $accent_color . '; }

.custom-color .logo-bar li > a:focus {
  border-bottom: 2px solid ' . $accent_color . '; }

.custom-color .logo-bar .current-menu-item > a {
  border-bottom: 2px solid ' . $accent_color . '; }

.custom-color .info-bar a {
  color: ' . $accent_color . '; }

.custom-color .info-bar a:hover {
  color: #5284bd; }

.custom-color a {
  color: ' . $accent_color . '; }

.custom-color a:hover {
  color: #5284bd; }

.custom-color input::-moz-placeholder, .color-one textarea::-moz-placeholder {
  border: 1px solid ' . $accent_color . ';
  color: ' . $accent_color . '; }

.custom-color .commentlist .bypostauthor {
  border-top: 2px solid ' . $accent_color . '; }

.custom-color blockquote {
  border-left: 2px solid ' . $accent_color . '; }

@media screen and (max-width: 64em) {
  .custom-color .title-bar button, .color-one .title-bar button:hover {
    border: none; }
  .custom-color .title-bar-left h1 a {
    color: ' . $accent_color . '; }
  .custom-color .logo-bar .current-menu-item > a, .color-one .logo-bar li > a:hover, .color-one .logo-bar li > a:focus {
    border-left: 2px solid ' . $accent_color . ';
    border-bottom: none; } }
}';


	/**
	 * Filters Twenty Seventeen custom colors CSS.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param $css        string Base theme colors CSS.
	 * @param $hue        int    The user's selected color hue.
	 * @param $saturation string Filtered theme color saturation level.
	 */
	return apply_filters( 'd4p_accent_color_css', $css );
}
