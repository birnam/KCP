<?php
/**
 * KCP back compat functionality
 *
 * Prevents KCP from running on WordPress versions prior to 3.6,
 * since this theme is not meant to be backward compatible and relies on
 * many new functions and markup changes introduced in 3.6.
 *
 * @package KCP
 * @subpackage 1.0
 */

/**
 * Prevent switching to KCP on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 *
 * @return void
 */
function kcp_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'kcp_upgrade_notice' );
}
add_action( 'after_switch_theme', 'kcp_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * KCP on WordPress versions prior to 3.6.
 *
 * @since KCP 1.0
 *
 * @return void
 */
function kcp_upgrade_notice() {
	$message = sprintf( __( 'KCP requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'kcp' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Theme Customizer from being loaded on WordPress versions prior to 3.6.
 *
 * @since KCP 1.0
 *
 * @return void
 */
function kcp_customize() {
	wp_die( sprintf( __( 'KCP requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'kcp' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'kcp_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 3.4.
 *
 * @since KCP 1.0
 *
 * @return void
 */
function kcp_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'KCP requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'kcp' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'kcp_preview' );
