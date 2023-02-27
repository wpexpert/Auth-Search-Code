<?php

/**
 *  add new card - view
 *
 */
function oso__view__all_player_history_information(): void {
	global $wpdb;
	$table_name      = $wpdb->prefix . 'player_history_information';
	$player_history_informations = $wpdb->get_results( "SELECT * from $table_name" );
	?>

    <div class="wrap">
        <h1 class='wp-heading-inline'>Player History</h1>
        <a href='<?php echo admin_url( "admin.php?page=add-player-info" ); ?>' class='page-title-action'>Add New</a>

		<?php if ( count( $player_history_informations ) == 0 ): ?>
            <div style='text-align: center;'>
                <h2>Player History have not been added Yet</h2>
            </div>
			<?php exit(); endif; ?>

        <hr class='wp-header-end'/>
        <table class='wp-list-table widefat plugins' style='margin-top: 1rem;'>
            <thead>
            <tr>
                <th id="id">No</th>
                <th id="subject">Player Name</th>
                <th id="description">Description</th>
                <th id="cardnumber">Card #</th>
                <th id="ten_pri">10 BL</th>
                <th id="ten">10</th>
                <!-- <th id="nine_five">9.5</th> -->
                <th id="nine">9</th>
                <!-- <th id="eight_five">8.5</th> -->
                <th id="eight">8</th>
                <!-- <th id="seven_five">7.5</th> -->
                <th id="seven">7</th>
                <!-- <th id="six_five">6.5</th> -->
                <th id="six">6</th>
                <!-- <th id="five_five">5.5</th> -->
                <th id="five">5</th>
                <!-- <th id="four_five">4.5</th> -->
                <th id="four">4</th>
                <!-- <th id="three_five">3.5</th> -->
                <th id="three">3</th>
                <!-- <th id="two_five">2.5</th> -->
                <th id="two">2</th>
                <!-- <th id="one_five">1.5</th> -->
                <th id="one">1</th>
                <th id="aaaa">A</th>
                <th id="action">Action</th>
            </tr>
            </thead>
            <tbody>
			<?php
			$total_of_rows = 0;
            foreach ( $player_history_informations as $player_history_information ): ?>
                <tr>
                    <td headers="id"><?= $player_history_information->id; ?></td>
                    <td headers="subject"><?= $player_history_information->subject; ?></td>
                    <td headers="description"><?= $player_history_information->description; ?></td>
                    <td headers="nine_five"><?= check_colmun_empty_or_not( $player_history_information->nine_five ); ?></td>
                    <td headers="ten_pri"><?= check_colmun_empty_or_not( $player_history_information->ten_pri ); ?></td>
                    <td headers="ten"><?= check_colmun_empty_or_not( $player_history_information->ten ); ?></td>
                    <!-- <td headers="nine_five"><?= check_colmun_empty_or_not( $player_history_information->nine_five ); ?></td> -->
                    <td headers="nine"><?= check_colmun_empty_or_not( $player_history_information->nine ); ?></td>
                    <!-- <td headers="eight_five"><?= check_colmun_empty_or_not( $player_history_information->eight_five ); ?></td> -->
                    <td headers="eight"><?= check_colmun_empty_or_not( $player_history_information->eight ); ?></td>
                    <!-- <td headers="seven_five"><?= check_colmun_empty_or_not( $player_history_information->seven_five ); ?></td> -->
                    <td headers="seven"><?= check_colmun_empty_or_not( $player_history_information->seven ); ?></td>
                    <!-- <td headers="six_five"><?= check_colmun_empty_or_not( $player_history_information->six_five ); ?></td> -->
                    <td headers="six"><?= check_colmun_empty_or_not( $player_history_information->six ); ?></td>
                    <!-- <td headers="five_five"><?= check_colmun_empty_or_not( $player_history_information->five_five ); ?></td> -->
                    <td headers="five"><?= check_colmun_empty_or_not( $player_history_information->five ); ?></td>
                    <!-- <td headers="four_five"><?= check_colmun_empty_or_not( $player_history_information->four_five ); ?></td> -->
                    <td headers="four"><?= check_colmun_empty_or_not( $player_history_information->four ); ?></td>
                    <!-- <td headers="three_five"><?= check_colmun_empty_or_not( $player_history_information->three_five ); ?></td> -->
                    <td headers="three"><?= check_colmun_empty_or_not( $player_history_information->three ); ?></td>
                    <!-- <td headers="two_five"><?= check_colmun_empty_or_not( $player_history_information->two_five ); ?></td> -->
                    <td headers="two"><?= check_colmun_empty_or_not( $player_history_information->two ); ?></td>
                    <!-- <td headers="one_five"><?= check_colmun_empty_or_not( $player_history_information->one_five ); ?></td> -->
                    <td headers="one"><?= check_colmun_empty_or_not( $player_history_information->one ); ?></td>
                    <td headers="aaaa"><?= check_colmun_empty_or_not( $player_history_information->aaaa ); ?></td>
                    <td>
                        <a href="<?php echo admin_url( 'admin.php?page=edit-player-history&id=' . $player_history_information->id ); ?>">
                            <img src="<?php echo esc_url( plugins_url( '../assets/img/edit-solid.svg', __FILE__ ) ); ?>"
                                 width="19px">
                        </a>

                        <a href="<?php echo admin_url( 'admin.php?page=delete-player-history&id=' . $player_history_information->id ); ?>">
                            <img src="<?php echo esc_url( plugins_url( '../assets/img/trash.svg', __FILE__ ) ); ?>">
                        </a>

                    </td>
                    <td headers="total"><?php
	                    $total_of_row = $player_history_information->ten_pri + $player_history_information->ten + $player_history_information->nine_five +
						                $player_history_information->nine + $player_history_information->eight_five + $player_history_information->eight +
						                $player_history_information->seven_five + $player_history_information->seven + $player_history_information->six_five +
						                $player_history_information->six + $player_history_information->five_five + $player_history_information->five+
						                $player_history_information->four_five+$player_history_information->four+$player_history_information->three_five+
						                $player_history_information->three+$player_history_information->two_five+$player_history_information->two+
						                $player_history_information->one_five+$player_history_information->one+$player_history_information->aaaa;
						//echo $total_of_row;
	                    $total_of_rows = $total_of_rows+$total_of_row;

						?></td>
                </tr>
			<?php endforeach;

            ?>

            </tbody>
        </table>
    </div>
	<?php

}

add_shortcode( 'view__all_cards', 'oso__view__all_cards' );
