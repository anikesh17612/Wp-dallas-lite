<?php
/**
 * Dallas Lite back compat functionality
 *
 * Prevents Dallas Lite from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package WordPress
 * @since Dallas Lite
 */

/**
 * Prevent switching to Dallas Lite on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Dallas Lite 1.0
 */
function dallas_lite_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'dallas_lite_upgrade_notice' );
}
add_action( 'after_switch_theme', 'dallas_lite_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Dallas Lite on WordPress versions prior to 4.7.
 *
 * @since Dallas Lite 1.0
 *
 * @global string $wp_version WordPress version.
 */
function dallas_lite_upgrade_notice() {
	$message = sprintf( 'Dallas Lite requires at least WordPress version 4.7. You are running version . Please upgrade and try again.', 'dallas-lite' , $wp_version );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since Dallas Lite 1.0
 *
 * @global string $wp_version WordPress version.
 */
function dallas_lite_customize() {
	wp_die( sprintf( 'Dallas Lite requires at least WordPress version 4.7. You are running version . Please upgrade and try again.', 'dallas-lite', $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'dallas_lite_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since Dallas Lite 1.0
 *
 * @global string $wp_version WordPress version.
 */
function dallas_lite_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( 'Dallas Lite requires at least WordPress version 4.7. You are running version . Please upgrade and try again.', 'dallas-lite', $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'dallas_lite_preview' );
