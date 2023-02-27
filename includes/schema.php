<?php

declare( strict_types=1 );

/**
 *  migrate the database schema
 *
 */
function oso__schema__migrate_cards_table(): void {
	global $wpdb;
	$table_name        = PLUGIN_TABLE_NAME;
	$player_table_name = 'wp_player_history_information';
	$charset_collate   = $wpdb->get_charset_collate();

	$schema =
		"CREATE TABLE IF NOT EXISTS `{$table_name}` (
    `id` mediumint (9) NOT NULL AUTO_INCREMENT,
    `auth_code` text NOT NULL,
    `set_name` text NOT NULL,
    `card_num` mediumint (9) NOT NULL,
    `subject` text NOT NULL,
    `description` text NOT NULL,
    `sport` text NOT NULL,
    `graded_on` datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
    `grade` text NOT NULL, 
    PRIMARY KEY (`id`)
  ) {$charset_collate};";

	$schema1 =
		"CREATE TABLE IF NOT EXISTS `{$player_table_name}` (
    `id` mediumint (9) NOT NULL AUTO_INCREMENT,
    `subject` 		text NOT NULL,
    `description` 	text NOT NULL,
    `ten_pri`	mediumint (9) NULL,
    `ten`		mediumint (9) NULL,
    `nine_five` 		mediumint (9) NULL,
    `nine` 		mediumint (9) NULL,
    `eight_five` 		mediumint (9) NULL,
    `eight` 		mediumint (9) NULL,
    `seven_five` 		mediumint (9) NULL,
    `seven` 		mediumint (9) NULL,
    `six_five` 		mediumint (9) NULL,
    `six` 		mediumint (9) NULL,
    `five_five` 		mediumint (9) NULL,
    `five` 		mediumint (9) NULL,
    `four_five`		mediumint (9) NULL,
    `four` 		mediumint (9) NULL,
    `three_five` 		mediumint (9) NULL,
    `three` 		mediumint (9) NULL,
    `two_five` 		mediumint (9) NULL,
    `two` 		mediumint (9) NULL,
    `one_five` 		mediumint (9) NULL,
    `one` 		mediumint (9) NULL,
    `aaaa` 		mediumint (9) NULL,
    `id_suportcards` mediumint (9) NOT NULL,
    
	FOREIGN KEY(`id_suportcards`) REFERENCES wp_sportscards(id), 
    
    PRIMARY KEY (`id`)
  ) {$charset_collate};";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $schema );
	dbDelta( $schema1 );
}

/**
 *  add new sports card to db
 *
 */
function oso__schema__add_sports_card( stdClass $body ): void {
	global $wpdb;

	$wpdb->insert(
		PLUGIN_TABLE_NAME,
		[
			"auth_code"   => $body->auth_code,
			"set_name"    => $body->set_name,
			"card_num"    => $body->card_num,
			"subject"     => $body->subject,
			'description' => $body->description,
		//	'sport'       => $body->sport,
			'graded_on'   => $body->graded_on,
			'grade'       => $body->grade
		],
		[ "%s", "%s", "%d", "%s", "%s", "%s", "%s", "%s" ]
	);
}

/**
 * Function which is used to insert the player's played history
 * @param stdClass $body
 */

function oso__schema__add_player_history_information( stdClass $body ): void {
	global $wpdb;
	$wpdb->insert( PLUGIN_player_history_information,
		[
			"subject"        => $body->player_history_information_subject,
			"description"    => $body->player_history_information_description,
			"ten_pri"        => $body->ten_pri,
			"ten"            => $body->ten,
			"nine_five"      => $body->nine_five,
			"nine"           => $body->nine,
			// "eight_five"     => $body->eight_five,
			"eight"          => $body->eight,
			// "seven_five"     => $body->seven_five,
			"seven"          => $body->seven,
			// "six_five"       => $body->six_five,
			"six"            => $body->six,
			// "five_five"      => $body->five_five,
			"five"           => $body->five,
			// "four_five"      => $body->four_five,
			"four"           => $body->four,
			// "three_five"     => $body->three_five,
			"three"          => $body->three,
			// "two_five"       => $body->two_five,
			"two"            => $body->two,
			// "one_five"       => $body->one_five,
			"one"            => $body->one,
			"aaaa"           => $body->aaaa,
			"id_suportcards" => $body->id_sportcards,
		],
		[
			"%s",
			"%s",
			"%d",
			"%d",
			"%d",
			"%d",
		//	"%d",
			"%d",
		//	"%d",
			"%d",
		//	"%d",
			"%d",
		//	"%d",
			"%d",
		//	"%d",
			"%d",
		//	"%d",
			"%d",
			// "%d",
			"%d",
			// "%d",
			"%d",
			"%d",
			"%d",
		]
	);
	echo "Player History Inserted Success fully";
}


/**
 *  update players history
 */

function oso__schema__update_player_history_information( stdClass $body ): void {
	global $wpdb;
	$wpdb->update(
		PLUGIN_player_history_information,
		[
			"subject"        => $body->player_history_information_subject,
			"description"    => $body->player_history_information_description,
			"ten_pri"        => $body->ten_pri,
			"ten"            => $body->ten,
			 "nine_five"      => $body->nine_five,
			"nine"           => $body->nine,
			// "eight_five"     => $body->eight_five,
			"eight"          => $body->eight,
			// "seven_five"     => $body->seven_five,
			"seven"          => $body->seven,
			// "six_five"       => $body->six_five,
			"six"            => $body->six,
			// "five_five"      => $body->five_five,
			"five"           => $body->five,
			// "four_five"      => $body->four_five,
			"four"           => $body->four,
			// "three_five"     => $body->three_five,
			"three"          => $body->three,
			// "two_five"       => $body->two_five,
			"two"            => $body->two,
			// "one_five"       => $body->one_five,
			"one"            => $body->one,
			"aaaa"           => $body->aaaa,
			"id_suportcards" => $body->id_sportcards,
		],
		[
			'id' => $body->id,
		]
	);
}




/**
 *  get all cards from db
 *
 */
function oso__schema__all_sports_cards(): array {
	global $wpdb;
	$table_name = PLUGIN_TABLE_NAME;

	$cards = $wpdb->get_results( "SELECT * FROM {$table_name};" );

	return $cards;
}

/**
 *  delete a card from db
 *
 */
function oso__schema__delete_card( int $id ): void {
	global $wpdb;
	$table_name = PLUGIN_TABLE_NAME;

	$query = $wpdb->prepare( "DELETE FROM {$table_name} WHERE id = %d;", [ (int) $id ] );
	$wpdb->query( $query );
}


/**
 *  find a card by auth code
 *
 */
function oso__schema__find_by_auth_code(  $code ): array {
	global $wpdb;
	$table_name = PLUGIN_TABLE_NAME;

	$query = $wpdb->prepare( "SELECT * FROM {$table_name} WHERE auth_code = %s;", [ $code ] );
	$cards = $wpdb->get_results( $query );

	return $cards;
}


/**
 *  find cards by set name
 *
 */
function oso__schema__find_by_set_name( string $setname ): array {
	global $wpdb;
	$table_name = PLUGIN_TABLE_NAME;

	if ( count( $setname ) == 0 ) {
		return [];
	}

	$query = $wpdb->prepare( "SELECT * FROM {$table_name} WHERE set_name like %s;", [ '%' . $setname . '%' ] );
	$cards = $wpdb->get_results( $query );

	return $cards;
}