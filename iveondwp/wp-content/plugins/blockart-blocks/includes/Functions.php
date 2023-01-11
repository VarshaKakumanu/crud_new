<?php
/**
 * Collections of functions.
 *
 * @since 1.0.0
 * @package BlockArt
 */

/**
 * Wrapper for _doing_it_wrong.
 *
 * @since 1.0.0
 * @param string $function Function used.
 * @param string $message  Message to log.
 * @param string $version  Version the message was added in.
 */
function blockart_doing_it_wrong( $function, $message, $version ) {

	// phpcs:disable
	$message .= ' Backtrace: ' . wp_debug_backtrace_summary();

	if ( function_exists( 'is_ajax' ) && is_ajax() ) {
		do_action( 'doing_it_wrong_run', $function, $message, $version );

		error_log( "{$function} was called incorrectly. {$message}. This message was added in version {$version}." );
	} else {
		_doing_it_wrong( $function, $message, $version );
	}
	// phpcs:enable
}

/**
 * Get asset file generated by wp-scripts.
 *
 * @since 1.0.0
 * @param string $slug Filename slug.
 * @return mixed|string[][]
 */
function blockart_get_asset_file( $slug ) {

	$asset_file = dirname( BLOCKART_PLUGIN_FILE ) . "/dist/$slug.asset.php";

	if ( ! file_exists( $asset_file ) ) {
		if ( 'admin' === $slug ) {
			return array( 'dependencies' => array( 'wp-api-fetch', 'wp-components', 'wp-element', 'wp-hooks', 'wp-i18n' ) );
		}
		return array( 'dependencies' => array( 'wp-api-fetch', 'wp-block-editor', 'wp-blocks', 'wp-components', 'wp-compose', 'wp-data', 'wp-dom-ready', 'wp-element', 'wp-hooks', 'wp-i18n', 'wp-keyboard-shortcuts' ) );
	}

	return require $asset_file;
}