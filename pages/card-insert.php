<?php

/**
 *  insert card
 *
 */
function oso__cards_insert() {
	global $wpdb;
	?>
    <div class="wrap">
        <h1 class='wp-heading-inline'>Sports Cards</h1>
        <a href='<?php echo admin_url( "admin.php?page=sports-cards" ); ?>' class='page-title-action'>Go to Card
            Listing</a>
        <hr class='wp-header-end'/>
        <table class='form-table' style='margin-top: 1rem;'>
            <thead>
            <tr>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <form name="form"
                  action=""
                  method="post">
                <tr>
                    <th for="auth-code">Auth Code</th>
                    <td>
                        <input class="regular-text code" type="text" name="auth-code"
                               placeholder="Auth Code in Digits" required>
                    </td>
                </tr>

                <tr>
                    <th for="card-sets">Set</th>
                    <td>
                        <input class="regular-text code" type="text" name="card-sets" placeholder="Set in Text"
                               required>
                    </td>
                </tr>

                <tr>
                    <th for="card-numbers">Card #</th>
                    <td>
                        <input class="regular-text code" type="number" name="card-numbers"
                               placeholder="Card # in Digits" required>
                    </td>
                </tr>

                <tr>
                    <th for="subject">Player Name</th>
                    <td>
                        <input class="regular-text code" type="text" name="subject" placeholder="Subject in Text"
                               required>
                    </td>
                </tr>

                <tr>
                    <th for="description">Description</th>
                    <td>
                        <textarea class="regular-text code" name="description"
                                  placeholder="Description in Text" required></textarea>
                    </td>
                </tr>

                <tr>
                    <th for="datetime">Graded On</th>
                    <td>
                        <input class="regular-text code" type="date" name="datetime" required>
                    </td>
                </tr>

                <tr>
                    <th for="grade">Grade</th>
                    <td>
                        <select class="regular-text code" name="grade" required>
                            <option value="1 PR">1 PR</option>
                            <option value="2 GOOD">2 GOOD</option>
                            <option value="3 VG">3 VG</option>
                            <option value="4 VG-EX">4 VG-EX</option>
                            <option value="5 EX">5 EX</option>
                            <option value="6 EX-MT">6 EX-MT</option>
                            <option value="7 NM">7 NM</option>
                            <option value="8 NM-MT">8 NM-MT</option>
                            <option value="9 MINT">9 MINT</option>
                            <option value="10 GEM-MT">10 GEM-MT</option>
                            <option value="11 PRISTINE">11 PRISTINE</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="button button-primary" type="submit" value="Save" name="insert">
                    </td>
                </tr>
            </form>
            </tbody>
        </table>
    </div>
	<?php
	if ( isset( $_POST['insert'] ) && is_user_logged_in() ) {
		global $wpdb;
		$auth_code   = $_POST['auth-code'];
		$card_sets   = $_POST['card-sets'];
		$card_number = $_POST['card-numbers'];
		$subject     = $_POST['subject'];
		$description = $_POST['description'];
	//	$sport       = $_POST['sport'];
		$graded_on   = $_POST['datetime'];
		$grade       = $_POST['grade'];


		/**
		 * Table name $table_name
		 * Table rows $table_rows
		 */
		$table_rows = (object) array(
			'auth_code'   => $auth_code,
			'set_name'    => $card_sets,
			'card_num'    => $card_number,
			'subject'     => $subject,
			'description' => $description,
		//	'sport'       => $sport,
			'graded_on'   => $graded_on,
			'grade'       => $grade
		);

		oso__schema__add_sports_card( $table_rows );
	}
}
