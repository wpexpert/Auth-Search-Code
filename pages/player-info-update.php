<?php
function oso__player_history_information_update() {
	global $wpdb;
	$id = $_GET['id'];
	$sport_table  = $wpdb->prefix . 'sportscards';
	$player_table = $wpdb->prefix . 'player_history_information';
	$player_names = $wpdb->get_results( "SELECT *
                                        FROM $sport_table
                                        INNER JOIN $player_table
                                        ON $sport_table.id = $player_table.id_suportcards 
                                     " );

	$cards                 = $wpdb->get_results( "SELECT * from $sport_table" );
	$player_history_information        = $wpdb->get_results( "SELECT * from $player_table WHERE id = $id" );
	$result_player_history_information = $player_history_information[0];
	foreach ( $player_names as $player_name ) {
//	    echo $player_name->set_name;
	}
	echo '<pre>';
//	print_r( $player_names );
	echo '</pre>';
	?>
    <div class="wrap">
        <a href='<?php echo admin_url( "admin.php?page=player-info" ); ?>' class='page-title-action'>Go to Card
            Listing</a></br>
        <h1 class='wp-heading-inline'>Edit/Update Player History</h1>
        <hr class='wp-header-end'/>
        <table class="form-table">
            <tbody>
            <form name="frm" action="#" method="post">
                <tr>
                    <th for="id_sportcards">Select Player Name</th>
                    <td>
                        <select name="id_sportcards" required>

							<?php
							foreach ( $cards as $card ) {
								if($card->id == $result_player_history_information->id_suportcards) {
									?>
                                    <option value="<?php echo $card->id; ?>">
										<?php echo $card->set_name; ?>
                                    </option>
									<?php
								}
							}

							foreach ( $cards as $card ) {
								 if($card->id != $result_player_history_information->id_suportcards) {
									?>
                                    <option value="<?php echo $card->id; ?>">
										<?php echo $card->set_name; ?>
                                    </option>
                                    <?php
								}
							}

							?>
                        </select>

                       
                    </td>
                </tr>
                <tr>
                    <th for="id">ID</th>
                    <td>
                        <input class="regular-text code" type="number" name="id"
                               value="<?= $result_player_history_information->id; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <th for="player_history_information_subject">Player Name</th>
                    <td>
                        <input class="regular-text code" type="text" name="player_history_information_subject"
                               value="<?= $result_player_history_information->subject; ?>">
                    </td>
                </tr>
                <tr>
                    <th for="player_history_information_description">Set</th>
                    <td>
                        <textarea class="regular-text code" name="player_history_information_description"
                                  value="<?= $result_player_history_information->description; ?>"><?= $result_player_history_information->description; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <th for="ten_pri">10 PRI</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="number" name="ten_pri"
                               value="<?= $result_player_history_information->ten_pri; ?>">
                    </td>
                </tr>
                <tr>
                    <th for="ten">10</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="number" name="ten"
                               value="<?= $result_player_history_information->ten; ?>">
                    </td>
                </tr>
                <!-- <tr>
                    <th for="nine_five">9.5</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="number" name="nine_five"
                               value="<?= $result_player_history_information->nine_five; ?>">
                    </td>
                </tr> -->
                <tr>
                    <th for="nine">9</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="number" name="nine"
                               value="<?= $result_player_history_information->nine; ?>">
                    </td>
                </tr>
                <!-- <tr>
                    <th for="eight_five">8.5</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="number" name="eight_five"
                               value="<?= $result_player_history_information->eight_five; ?>">
                    </td>
                </tr> -->
                <tr>
                    <th for="eight">8</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="number" name="eight"
                               value="<?= $result_player_history_information->eight; ?>">
                    </td>
                </tr>
                <!-- <tr>
                    <th for="seven_five">7.5</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="number" name="seven_five"
                               value="<?= $result_player_history_information->seven_five; ?>">
                    </td>
                </tr> -->
                <tr>
                    <th for="seven">7</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="number" name="seven"
                               value="<?= $result_player_history_information->seven; ?>">
                    </td>
                </tr>
                <!-- <tr>
                    <th for="six_five">6.5</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="number" name="six_five"
                               value="<?= $result_player_history_information->six_five; ?>">
                    </td>
                </tr> -->
                <tr>
                    <th for="six">6</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="number" name="six"
                               value="<?= $result_player_history_information->six; ?>">
                    </td>
                </tr>
                <!-- <tr>
                    <th for="five_five">5.5</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="number" name="five_five"
                               value="<?= $result_player_history_information->five_five; ?>">
                    </td>
                </tr> -->
                <tr>
                    <th for="five">5</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="number" name="five"
                               value="<?= $result_player_history_information->five; ?>">
                    </td>
                </tr>
                <!-- <tr>
                    <th for="four_five">4.5</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="number" name="four_five"
                               value="<?= $result_player_history_information->four_five; ?>">
                    </td>
                </tr> -->
                <tr>
                    <th for="four">4</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="number" name="four"
                               value="<?= $result_player_history_information->four; ?>">
                    </td>
                </tr>
                <!-- <tr>
                    <th for="three_five">3.5</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="number" name="three_five"
                               value="<?= $result_player_history_information->three_five; ?>">
                    </td>
                </tr> -->
                <tr>
                    <th for="three">3</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="number" name="three"
                               value="<?= $result_player_history_information->three; ?>">
                    </td>
                </tr>
                <!-- <tr>
                    <th for="two_five">2.5</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="number" name="two_five"
                               value="<?= $result_player_history_information->two_five; ?>">
                    </td>
                </tr> -->
                <tr>
                    <th for="two">2</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="number" name="two"
                               value="<?= $result_player_history_information->two; ?>">
                    </td>
                </tr>
                <!-- <tr>
                    <th for="one_five">1.5</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="number" name="one_five"
                               value="<?= $result_player_history_information->one_five; ?>">
                    </td>
                </tr> -->
                <tr>
                    <th for="one">1</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="number" name="one"
                               value="<?= $result_player_history_information->one; ?>">
                    </td>
                </tr>
                <tr>
                    <th for="aaaa">A</th>
                    <td>
                        <input oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                               class="regular-text code" type="number" name="aaaa"
                               value="<?= $result_player_history_information->aaaa; ?>">
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td><input class="button button-primary submit" type="submit" value="Update" name="update_history">
                    </td>
                </tr>
            </form>
            </tbody>
        </table>
    </div>

	<?php
}

if ( isset( $_POST['update_history'] ) ) {
// die( $_POST['id']);
	$table_rowsa = (object) array(
		'id'                         => $_POST['id'],
		'player_history_information_subject'     => $_POST['player_history_information_subject'],
		'player_history_information_description' => $_POST['player_history_information_description'],
		'ten_pri'                    => $_POST['ten_pri'],
		'ten'                        => $_POST['ten'],
		// 'nine_five'                  => $_POST['nine_five'],
		'nine'                       => $_POST['nine'],
		// 'eight_five'                 => $_POST['eight_five'],
		'eight'                      => $_POST['eight'],
		// 'seven_five'                 => $_POST['seven_five'],
		'seven'                      => $_POST['seven'],
		// 'six_five'                   => $_POST['six_five'],
		'six'                        => $_POST['six'],
		// 'five_five'                  => $_POST['five_five'],
		'five'                       => $_POST['five'],
		// 'four_five'                  => $_POST['four_five'],
		'four'                       => $_POST['four'],
		// 'three_five'                 => $_POST['three_five'],
		'three'                      => $_POST['three'],
		// 'two_five'                   => $_POST['two_five'],
		'two'                        => $_POST['two'],
		// 'one_five'                   => $_POST['one_five'],
		'one'                        => $_POST['one'],
		'aaaa'                       => $_POST['aaaa'],
		'id_sportcards'              => $_POST['id_sportcards'],
	);
	oso__schema__update_player_history_information( $table_rowsa );

}