<?php

declare( strict_types=1 );

/**
 *  to check if plugin is compatible with current version of WordPress 5.8 < 4.0
 *
 */
register_activation_hook( __FILE__, 'oso__sports_cards__activate_plugin' );
function oso__sports_cards__activate_plugin() {
	if ( version_compare( get_bloginfo( 'version' ), '4.0', '<' ) ) {
		wp_die( __( "You Must update WordPress to use this plugin.", 'Auth Code Lookup' ) );
	}
}