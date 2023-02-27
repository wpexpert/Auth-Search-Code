<?php

declare( strict_types=1 );

/**
 *  add pages to admin dashboard
 *
 */
function oso__register_pages(): void {
	add_menu_page(
		'Sports Cards',
		' All Sports Cards',
		'manage_options',
		'sports-cards',
		'oso__view__all_cards',
		'dashicons-book-alt'
	);

	//adding submenu to a menu
	add_submenu_page(
		'sports-cards',                // parent page slug
		'add_sports_cards',               // page title
		'Add Sports Card',           // menu title
		'manage_options',            // manage options
		'add-sports-card',         // slug
		'oso__cards_insert'         // function
	);

	add_submenu_page(
		null,
		'sports_cards_update',
		'Edit Sports Card',
		'manage_options',
		'edit-sports-card',
		'oso__cards_update'
	);

	add_submenu_page(
		null,
		'sports_cards_delete',
		'Delete Sports Card',
		'manage_options',
		'delete-sports-card',
		'oso__cards_delete'
	);

	add_submenu_page(
		'sports-cards',                // parent page slug
		'player_history_information',               // page title
		'All Player History',           // menu title
		'manage_options',            // manage options
		'player-info',         // slug
		'oso__view__all_player_history_information'         // function
	);

	add_submenu_page(
		'sports-cards',                // parent page slug
		'player_info',               // page title
		'Add Player History',           // menu title
		'manage_options',            // manage options
		'add-player-info',         // slug
		'oso__player_insert_history'         // function
	);

	add_submenu_page(
		null,
		'player_history_information_update',
		'Edit Player History',
		'manage_options',
		'edit-player-history',
		'oso__player_history_information_update'
	);

	add_submenu_page(
		null,
		'player_history_information_delete',
		'Delete Players History',
		'manage_options',
		'delete-player-history',
		'oso__player_history_information_delete'
	);
}

add_action( 'admin_menu', 'oso__register_pages' );
