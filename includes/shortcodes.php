<?php

declare( strict_types=1 );

/**
 *  register plugin styles
 *
 */
add_action( 'wp_enqueue_scripts', 'oso__register_plugin_styles' );
function oso__register_plugin_styles(): void {
	$styles_file = PLUGIN_DIR . '/assets/css/styles.css';
	$script_file = PLUGIN_DIR . '/assets/js/main.js';

	wp_register_style( 'oso__search_plugin__styles', $styles_file );
	wp_enqueue_style( 'oso__search_plugin__styles' );

	wp_enqueue_script( 'oso__search_plugin__js', $script_file, array(), '0.1', false );
	wp_script_add_data( 'oso__search_plugin__js', 'async', true );
}


/**
 *  shortcode: find a card by auth_code
 *
 */
add_shortcode( 'sports-cards-find', 'oso__shortcode__find_by_auth_code' );
function oso__shortcode__find_by_auth_code(): void {
	echo "
  <h3>Serial Number Lookup</h3>
  
    <form id='sports_card_search_form'>
    	<input type='text' class='auth_input' placeholder='Auth Code' />
    	<input type='submit' value='Serial Number Code' disabled>
	</form>
	<small>Enter your 5-Digit card authentication code</small>
   
  
  <div id='card_output'>
  </div>
  ";
}


/**
 *  shortcode: find cards by set_name
 *
 */
add_shortcode( 'sports-cards-find-by-set', 'oso__shortcode__find_by_set_name' );
function oso__shortcode__find_by_set_name(): void {
	echo "
  
  <div class='card-search'>
  		<form id='sports_card_search_set_name__form'>
    		<input type='text' class='set_input' placeholder='Set Name' />
    		<input type='submit' value='Search'>
		</form>
  </div>
  <div class='all__data'>
  	<div id='card_output'>
  	</div>
  </div>
  ";
}

