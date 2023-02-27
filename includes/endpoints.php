<?php

declare( strict_types=1 );

/**
 *  register a callback function with a route url
 *
 */
function oso__register_controller( string $route, string $method, string $callback_name ): void {
	register_rest_route( API_NAMESPACE, $route, [
		'methods'  => $method,
		'callback' => $callback_name,
	] );
}

/**
 *  register all API Endpoints
 *
 */
add_action( 'rest_api_init', 'oso__register_api_endpoints' );
function oso__register_api_endpoints() {
	oso__register_controller( 'all-cards', 'GET', 'oso__controller__get_all_card' );
	oso__register_controller( 'add-card', 'POST', 'oso__controller__add_sports_card' );
	oso__register_controller( 'find-card', 'POST', 'oso__controller__find_by_auth_code' );
	oso__register_controller( 'pop-search', 'POST', 'oso__controller__find_by_set_name' );
}

/**
 *  add a sports card to database
 *
 * @endpoint: /wp-json/sports-cards/add-card
 * @method: POST
 */
function oso__controller__add_sports_card( WP_REST_Request $request ): WP_REST_Response {
	$body = $request->get_body();
	$body = json_decode( $body );

	oso__schema__add_sports_card( $body );

	return rest_ensure_response( [
		'message' => 'Card added successfully'
	] );
}

/**
 *  get all sports cards from db
 *
 * @endpoint: /wp-json/sports-cards/all-cards
 * @method: POST
 */
function oso__controller__get_all_card( WP_REST_Request $request ): WP_REST_Response {
	$all_cards = oso__schema__all_sports_cards();

	return rest_ensure_response( $all_cards );
}


/**
 *  find card by auth code
 *
 * @endpoint: /wp-json/sports-cards/find-card
 * @method: POST
 */
function oso__controller__find_by_auth_code( WP_REST_Request $request ): WP_REST_Response {
	$body = $request->get_body();
	$body = json_decode( $body );

	if ( ! isset( $body->auth_code ) ) {
		return wp_send_json_error( [
			'message' => 'Missing Parameter: auth_code'
		], 400 );
	}

	$cards = oso__schema__find_by_auth_code(  $body->auth_code );
	if ( isset( $cards ) && count( $cards ) == 0 ) {
		// no content response
		return wp_send_json_error( [], 204 );
	}

	return rest_ensure_response( $cards[0] );
}

/**
 *  find card by auth code
 *
 * @endpoint: /wp-json/sports-cards/pop-search
 * @method: POST
 */
function oso__controller__find_by_set_name( WP_REST_Request $request ): WP_REST_Response {
	$body = $request->get_body();
	$body = json_decode( $body );

	if ( ! isset( $body->set_name ) || $body->set_name === '' ) {
		return wp_send_json_error( [
			'message' => 'Missing Parameter: set_name'
		], 400 );
	}

	$cards = oso__schema__find_by_set_name( $body->set_name );
	if ( isset( $cards ) && count( $cards ) == 0 ) {
		// no content response
		return wp_send_json_error( [], 204 );
	}

	return rest_ensure_response( $cards );
}