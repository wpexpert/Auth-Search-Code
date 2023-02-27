<?php

/**
 *  insert card
 *
 */
function oso__player_insert_history() {
	global $wpdb;
	$sport_table = $wpdb->prefix . 'sportscards';
	$cards       = $wpdb->get_results( "SELECT * from $sport_table" );

	?>
    <div class="wrap">
        <h1 class='wp-heading-inline'>Add new player history</h1>
        <a href='<?php echo admin_url( "admin.php?page=player-info" ); ?>' class='page-title-action'>Go to Player
            History</a>
        <hr class='wp-header-end'/>
        <table class='form-table' style='margin-top: 1rem;'>
            <thead>
            <tr>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <form name="form" action="#" method="post">
                <tr>
                    <th for="id_sportcards">Select Player Name</th>
                    <td>
                    <select name="id_sportcards" required>

                            <option value="">--- Select ---</option>
							<?php
							foreach ( $cards as $card ) {
								?>
                                <option value="<?php echo $card->id; ?>">

									<?php echo $card->set_name; ?>
                                </option>
								<?php
							}
							?>
                        </select>
                        </td>
                </tr>
                <tr>
                    <th for="player_history_information_subject">Player Name</th>
                    <td>
                        <input class="regular-text code" type="text" name="player_history_information_subject"
                               placeholder="Player History Subject In Txt">
                    </td>
                </tr>

                <tr>
                    <th for="player_history_information_description">Set</th>
                    <td>
                        <textarea rows="5" class="regular-text code" name="player_history_information_description"
                                  placeholder="Set"></textarea>
                    </td>
                </tr>
                  <tr>
                    <th for="nine_five">Card #</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="nine_five" placeholder="Enter Card #">
                    </td>
                </tr>


                <tr>
                    <th for="ten_pri">10 BL</th>
                    <td>
                        <input  oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="ten_pri" placeholder="Enter Digit Only">
                    </td>
                </tr>
                <tr>
                    <th for="ten">10</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="ten" placeholder="Enter Digit Only">
                    </td>
                </tr>
                <!-- <tr>
                    <th for="nine_five">9.5</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="nine_five" placeholder="Enter Digit Only">
                    </td>
                </tr> -->
                <tr>
                    <th for="nine">9</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="nine" placeholder="Enter Digit Only">
                    </td>
                </tr>
                <!-- <tr>
                    <th for="eight_five">8.5</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="eight_five" placeholder="Enter Digit Only">
                    </td>
                </tr> -->
                <tr>
                    <th for="eight">8</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="eight" placeholder="Enter Digit Only">
                    </td>
                </tr>
                <!-- <tr>
                    <th for="seven_five">7.5</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="seven_five" placeholder="Enter Digit Only">
                    </td>
                </tr> -->
                <tr>
                    <th for="seven">7</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="seven" placeholder="Enter Digit Only">
                    </td>
                </tr>
                <!-- <tr>
                    <th for="six_five">6.5</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="six_five" placeholder="Enter Digit Only">
                    </td>
                </tr> -->
                <tr>
                    <th for="six">6</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="six" placeholder="Enter Digit Only">
                    </td>
                </tr>
                <!-- <tr>
                    <th for="five_five">5.5</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="five_five" placeholder="Enter Digit Only">
                    </td>
                </tr> -->
                <tr>
                    <th for="five">5</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="five" placeholder="Enter Digit Only">
                    </td>
                </tr>
                <!-- <tr>
                    <th for="four_five">4.5</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="four_five" placeholder="Enter Digit Only">
                    </td>
                </tr> -->
                <tr>
                    <th for="four">4</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="four" placeholder="Enter Digit Only">
                    </td>
                </tr>
                <!-- <tr>
                    <th for="three_five">3.5</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="three_five" placeholder="Enter Digit Only">
                    </td>
                </tr> -->
                <tr>
                    <th for="three">3</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="three" placeholder="Enter Digit Only">
                    </td>
                </tr>
                <!-- <tr>
                    <th for="two_five">2.5</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="two_five" placeholder="Enter Digit Only">
                    </td>
                </tr> -->
                <tr>
                    <th for="two">2</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="two" placeholder="Enter Digit Only">
                    </td>
                </tr>

                <!-- <tr>
                    <th for="one_five">1.5</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="one_five" placeholder="Enter Digit Only">
                    </td>
                </tr> -->
                <tr>
                    <th for="one">1</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="one" placeholder="Enter Digit Only">
                    </td>
                </tr>
                <tr>
                    <th for="aaaa">A</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="text" name="aaaa" placeholder="Enter Digit Only">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="button button-primary" type="submit" value="Insert" name="insert">
                    </td>
                </tr>

            </form>
            </tbody>
        </table>
    </div>
	<?php
	if ( isset( $_POST['insert'] ) && is_user_logged_in() ) {
		/**
		 * Table name $table_name
		 * Table rows $table_rows
		 */
		$table_rows = (object) array(
			'player_history_information_subject'     => $_POST['player_history_information_subject'],
			'player_history_information_description' => $_POST['player_history_information_description'],
			'ten_pri'                    => $_POST['ten_pri'],
			'ten'                        => $_POST['ten'],
			'nine_five'                  => $_POST['nine_five'],
			'nine'                       => $_POST['nine'],
		//	'eight_five'                 => $_POST['eight_five'],
			'eight'                      => $_POST['eight'],
		//	'seven_five'                 => $_POST['seven_five'],
			'seven'                      => $_POST['seven'],
		//	'six_five'                   => $_POST['six_five'],
			'six'                        => $_POST['six'],
		//	'five_five'                  => $_POST['five_five'],
			'five'                       => $_POST['five'],
		//	'four_five'                  => $_POST['four_five'],
			'four'                       => $_POST['four'],
		//	'three_five'                 => $_POST['three_five'],
			'three'                      => $_POST['three'],
		//	'two_five'                   => $_POST['two_five'],
			'two'                        => $_POST['two'],
		//	'one_five'                   => $_POST['one_five'],
			'one'                        => $_POST['one'],
			'aaaa'                       => $_POST['aaaa'],
			'id_sportcards'              => $_POST['id_sportcards'],
		);

		oso__schema__add_player_history_information( $table_rows );
	}
}
