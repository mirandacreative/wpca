<?php
/**
 * Genesis Sample.
 *
 * This file adds the required helper functions used in the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

/**
 * Get default link color for Customizer.
 * Abstracted here since at least two functions use it.
 *
 * @since 2.2.3
 *
 * @return string Hex color code for link color.
 */
function genesis_sample_customizer_get_default_link_color() {
	return '#c3251d';
}

/**
 * Get default accent color for Customizer.
 * Abstracted here since at least two functions use it.
 *
 * @since 2.2.3
 *
 * @return string Hex color code for accent color.
 */
function genesis_sample_customizer_get_default_accent_color() {
	return '#c3251d';
}

/**
 * Calculate the color contrast.
 *
 * @since 2.2.3
 *
 * @return string Hex color code for contrast color
 */
function genesis_sample_color_contrast( $color ) {

	$hexcolor = str_replace( '#', '', $color );
	$red      = hexdec( substr( $hexcolor, 0, 2 ) );
	$green    = hexdec( substr( $hexcolor, 2, 2 ) );
	$blue     = hexdec( substr( $hexcolor, 4, 2 ) );

	$luminosity = ( ( $red * 0.2126 ) + ( $green * 0.7152 ) + ( $blue * 0.0722 ) );

	return ( $luminosity > 128 ) ? '#333333' : '#ffffff';

}

/**
 * Calculate the color brightness.
 *
 * @since 2.2.3
 *
 * @return string Hex color code for the color brightness
 */
function genesis_sample_color_brightness( $color, $change ) {

	$hexcolor = str_replace( '#', '', $color );

	$red   = hexdec( substr( $hexcolor, 0, 2 ) );
	$green = hexdec( substr( $hexcolor, 2, 2 ) );
	$blue  = hexdec( substr( $hexcolor, 4, 2 ) );

	$red   = max( 0, min( 255, $red + $change ) );
	$green = max( 0, min( 255, $green + $change ) );
	$blue  = max( 0, min( 255, $blue + $change ) );

	return '#'.dechex( $red ).dechex( $green ).dechex( $blue );

}

/**
 * Return/Output SVG as html
 *
 * @param array|string $img Image link or array
 * @param string $class Additional class attribute for img tag
 * @param string $size Image size if $img is array
 *
 * @return void
 */
function display_svg( $img, $class = '', $size = 'medium' ) {
	echo return_svg( $img, $class, $size );
}

function return_svg( $img, $class = '', $size = 'medium' ) {
	if ( ! $img ) {
		return '';
	}

	$icon_url = is_array( $img ) ? $img['url'] : $img;

	$file_info = pathinfo( $icon_url );
	if ( $file_info['extension'] == 'svg' ):
		$arrContextOptions = array(
			"ssl" => array(
				"verify_peer" => false, "verify_peer_name" => false,
			),
		);
		$image = file_get_contents( $icon_url, false, stream_context_create( $arrContextOptions ) );
	elseif ( is_array( $img ) ):
		$image = '<img class="' . $class . '" src="' . $img['sizes'][ $size ] . '" />';
	else :
		$image = '<img class="' . $class . '" src="' . $img . '" />';
	endif;

	return $image;
}

/**
 * Output HTML markup of template with passed args
 *
 * @param string $file File name without extension (.php)
 * @param array $args Array with args ($key=>$value)
 * @param string $default_folder Requested file folder
 *
 * @author DimonPDAA, SemAlley
 * */
function show_template( $file, $args = null, $default_folder = 'parts' ) {
	echo return_template( $file, $args, $default_folder );
}

/**
 * Return HTML markup of template with passed args
 *
 * @param string $file File name without extension (.php)
 * @param array $args Array with args ($key=>$value)
 * @param string $default_folder Requested file folder
 *
 * @return string template HTML
 * @author DimonPDAA
 * */
function return_template( $file, $args = null, $default_folder = 'parts' ) {
	$file = $default_folder . '/' . $file . '.php';
	if ( $args ) {
		extract( $args );
	}
	if ( locate_template( $file ) ) {
		ob_start();
		include( locate_template( $file ) ); //Theme Check free. Child themes support.
		$template_content = ob_get_clean();

		return $template_content;
	}

	return '';
}