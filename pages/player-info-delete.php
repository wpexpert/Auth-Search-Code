<?php
function oso__player_history_information_delete(){
	if (
		isset($_GET['id']) &&
		is_user_logged_in()
	) {
		global $wpdb;
		$table_name = $wpdb->prefix . 'player_history_information';
		$id = $_GET['id'];

		$wpdb->delete(
			$table_name,
			array('id' => $id)
		);

		echo "
		<div style='text-align: center'>
			<h2>Player Deleted Successfully!</h2>
		<div>
		";
	}
}