<?php

/**
 * Delete Cards
 */

function oso__cards_delete() {
	if (
		isset( $_GET['id'] ) &&
		is_user_logged_in()
	) {
		global $wpdb;
		$table_name = $wpdb->prefix . 'sportscards';
		$id         = $_GET['id'];

		$wpdb->delete(
			$table_name,
			array( 'id' => $id )
		);

		echo "
		<div style='text-align: center'>
			<h2>Card Deleted Successfully!</h2>
		<div>
		";
	}
}
