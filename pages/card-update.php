<?php

/**
 * Update cards
 */

function oso__cards_update() {
	$id = $_GET['id'];
	global $wpdb;
	$table_name = $wpdb->prefix . 'sportscards';
	$cards      = $wpdb->get_results( "SELECT * from $table_name where id = $id" );
	$card       = $cards[0];
	?>
    <div class="wrap">
        <a href='<?php echo admin_url( "admin.php?page=sports-cards" ); ?>' class='page-title-action'>Go to Card
            Listing</a></br>
        <h1 class='wp-heading-inline'>Edit Sports Card</h1>
        <hr class='wp-header-end'/>
        <table class="form-table">
            <tbody>
            <form name="frm" action="#" method="post">
                <tr>
                    <th for="id">ID</th>
                    <td>
                        <input class="regular-text code" type="number" name="id" value="<?= $card->id; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <th for="auth-code">Auth Code</th>
                    <td>
                        <input class="regular-text code" type="text" name="auth-code"
                               value="<?= $card->auth_code; ?>">
                    </td>
                </tr>
                <tr>
                    <th for="card-sets">Set Name</th>
                    <td>
                        <input class="regular-text code" type="text" name="card-sets" value="<?= $card->set_name; ?>">
                    </td>
                </tr>

                <tr>
                    <th for="card-numbers">Card #</th>
                    <td>
                        <input class="regular-text code" type="number" name="card-numbers"
                               value="<?= $card->card_num; ?>">
                    </td>
                </tr>
                <tr>
                    <th for="subject">Player Name</th>
                    <td>
                        <input class="regular-text code" type="text" name="subject" value="<?= $card->subject; ?>">
                    </td>
                </tr>
                <tr>
                    <th for="description">Description</th>
                    <td>
                        <textarea class="regular-text code" name="description"
                                  value="<?= $card->description; ?>"><?= $card->description; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th for="sport">Sport</th>
                    <td>
                        <input class="regular-text code" type="text" name="sport" value="<?= $card->sport; ?>">
                    </td>
                </tr>
                <tr>
                    <th for="datetime">Graded On</th>
                    <td>
                        <input class="regular-text code" type="date" name="datetime"
                               value="<?= explode( ' ', $card->graded_on )[0]; ?>">
                    </td>
                </tr>
                <tr>
                    <th for="grade">Grade</th>
                    <td>
                        <select name="grade">
							<?php
							$range = array(
								'1 PR',
								'2 GOOD',
								'3 VG',
								'4 VG-EX',
								'5 EX',
								'6 EX-MT',
								'7 NM',
								'8 NM-MT',
								'9 MINT',
								'10 GEM-MT',
								'11 PRISTINE'
							);

							foreach ( $range as $rg ) {
								$selected = ( $rg == $card->grade ) ? 'selected="selected"' : '';
								echo "<option value='$rg'" . $selected . ">" . $rg . "</option>";
							}
							?>
                        </select>
                    </td>
                    </td>
                </tr>
                <tr>
                    <td><input class="button button-primary submit" type="submit" value="Update" name="update"></td>
                </tr>
            </form>
            </tbody>
        </table>
    </div>
	<?php
}

if ( isset( $_POST['update'] ) ) {
	global $wpdb;
	$table_name = $wpdb->prefix . 'sportscards';

	$id          = $_POST['id'];
	$auth_code   = $_POST['auth-code'];
	$card_sets   = $_POST['card-sets'];
	$card_number = $_POST['card-numbers'];
	$subject     = $_POST['subject'];
	$description = $_POST['description'];
	$sport       = $_POST['sport'];
	$graded_on   = $_POST['datetime'];
	$grade       = $_POST['grade'];

	$wpdb->update(
		$table_name,
		array(
			'auth_code'   => $auth_code,
			'set_name'    => $card_sets,
			'card_num'    => $card_number,
			'subject'     => $subject,
			'description' => $description,
			'sport'       => $sport,
			'graded_on'   => $graded_on,
			'grade'       => $grade
		),
		array(
			'id' => $id
		)
	);
}