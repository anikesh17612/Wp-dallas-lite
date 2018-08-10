<?php
/**
 * Dallas Lite back compat functionality
 *
 * Prevents Dallas Lite from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package Dallas Lite
 */

/**
 * Prevent switching to Dallas Lite on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Dallas Lite 1.2
 */
function dallaslite_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );// Input var okay.
	add_action( 'admin_notices', 'dallaslite_upgrade_notice' );
}
add_action( 'after_switch_theme', 'dallaslite_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Dallas Lite on WordPress versions prior to 4.7.
 *
 * @since Dallas Lite 1.2
 *
 * @global string $wp_version WordPress version.
 */
function dallaslite_upgrade_notice() {
	$message = sprintf( 'Dallas Lite requires at least WordPress version 4.7. You are running version . Please upgrade and try again.', 'dallas-lite' , $GLOBALS['wp_version'] );
	printf( // WPCS: XSS OK.
	'<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since Dallas Lite 1.2
 *
 * @global string $wp_version WordPress version.
 */
function dallaslite_customize() {
	$message1 = sprintf( 'Dallas Lite requires at least WordPress version 4.7. You are running version . Please upgrade and try again.', 'dallas-lite', $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	);
	printf( // WPCS: XSS OK.
	'<div class="error"><p>%s</p></div>', $message1 );
}
add_action( 'load-customize.php', 'dallaslite_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since Dallas Lite 1.2
 *
 * @global string $wp_version WordPress version.
 */
function dallaslite_preview() {
	$message2	= sprintf( 'Dallas Lite requires at least WordPress version 4.7. You are running version . Please upgrade and try again.', 'dallas-lite', $GLOBALS['wp_version'] );
	printf( // WPCS: XSS OK.
	'<div class="error"><p>%s</p></div>', $message2 );
}
add_action( 'template_redirect', 'dallaslite_preview' );
