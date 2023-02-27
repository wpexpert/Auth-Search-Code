<?php

declare( strict_types=1 );

/**
 *  Plugin Name: Auth Code Search
 *  Plugin URI:
 *  Description: Add and search sports cards in WordPres Site
 *  Version: 2.0
 *  Author: Irfan Ahmed
 *  Author URI: #
 */


add_action( 'wp_enqueue_scripts', 'oso__register_plugin_filter_js' );
function oso__register_plugin_filter_js(): void {
	$script_file = PLUGIN_DIR . '/assets/js/chunk-vendors.b1d52cc.js';
	$script_file1 = PLUGIN_DIR . '/assets/js/app.6463292f.js';

	wp_enqueue_script( 'oso__search_plugin__app', $script_file1, array(), '0.1', false );
	wp_script_add_data( 'oso__search_plugin__app', '', true );

	wp_enqueue_script( 'oso__search_plugin__chunk', $script_file, array(), '0.1', false );
	wp_script_add_data( 'oso__search_plugin__chunk', '', true );
}



/**
 *  prevent direct code execution
 *
 */
defined( 'ABSPATH' ) || exit;

/**
 *  get wp table prefix
 *
 */
global $table_prefix;

/**
 *  plugin constants
 *
 */
define( 'PLUGIN_NAME', 'auth-code-plugin' );
define( 'API_NAMESPACE', 'sports-cards' );
define( 'PLUGIN_TABLE_NAME', $table_prefix . 'sportscards' );
define( 'PLUGIN_player_history_information', $table_prefix . 'player_history_information' );
define( 'PLUGIN_DIR', '/wp-content/plugins/auth-code-plugin' );

/**
 *  project includes
 *
 */
require_once __DIR__ . '/includes/init.php';
require_once __DIR__ . '/includes/endpoints.php';
require_once __DIR__ . '/includes/dashboard.php';
require_once __DIR__ . '/includes/schema.php';
require_once __DIR__ . '/includes/shortcodes.php';
require_once __DIR__ . '/pages/card-delete.php';
require_once __DIR__ . '/pages/card-insert.php';
require_once __DIR__ . '/pages/card-list.php';
require_once __DIR__ . '/pages/card-update.php';
require_once __DIR__ . '/pages/player-info-list.php';
require_once __DIR__ . '/pages/player-info-insert.php';
require_once __DIR__ . '/pages/player-info-delete.php';
require_once __DIR__ . '/pages/player-info-update.php';

/**
 *  migrate the cards table schema
 *
 */
oso__schema__migrate_cards_table();

function check_colmun_empty_or_not( $check ) {
	if ( $check >= 1 ) {
		return $check;
	} else {
		return '-';
	}
}

add_filter( 'page_template', 'auth_player_history_information_page_template' );
function auth_player_history_information_page_template( $page_template )
{
	if ( is_page( 'player-history' ) ) {
		$page_template = dirname( __FILE__ ) . '/templates/player-history.php';
	}
	return $page_template;
}
function jsonToProp($data)
{
	return htmlentities(json_encode($data, JSON_HEX_QUOT), ENT_QUOTES);
}
