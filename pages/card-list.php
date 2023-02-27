<?php

/**
 *  add new card - view
 *
 */
function oso__view__all_cards(): void {
	global $wpdb;
	$table_name = $wpdb->prefix . 'sportscards';
	$cards      = $wpdb->get_results( "SELECT id, auth_code, set_name, card_num, subject, description, graded_on, grade from $table_name" );
	?>

    <div class="wrap">
        <h1 class='wp-heading-inline'>Sports Cards</h1>
        <a href='<?php echo admin_url( "admin.php?page=add-sports-card" ); ?>' class='page-title-action'>Add New</a>

		<?php if ( count( $cards ) == 0 ): ?>
            <div style='text-align: center;'>
                <h2>No Sports cards have been added Yet</h2>
            </div>
			<?php exit(); endif; ?>

        <hr class='wp-header-end'/>
        <table class='wp-list-table widefat plugins' style='margin-top: 1rem;'>
            <thead>
            <tr>
                <th>No</th>
                <th>Auth Code</th>
                <th>Set Name</th>
                <th>Card #</th>
                <th>Player Name</th>
                <th>Description</th>
                <th>Graded On</th>
                <th>Grade</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
			<?php foreach ( $cards as $card ): ?>
                <tr>
                    <td>
                        <a href="<?php echo admin_url( 'admin.php?page=player-info&id=' . $card->id ); ?>"><?= $card->id; ?></a>
                    </td>
                    <td><?= $card->auth_code; ?></td>
                    <td><?= $card->set_name; ?></td>
                    <td><?= $card->card_num; ?></td>
                    <td><?= $card->subject; ?></td>
                    <td><?= $card->description; ?></td>
                    <td><?= $card->graded_on; ?></td>
                    <td><?= $card->grade; ?></td>
                    <td>
                        <a href="<?php echo admin_url( 'admin.php?page=edit-sports-card&id=' . $card->id ); ?>">
                            <img src="<?php echo esc_url( plugins_url( '../assets/img/edit-solid.svg', __FILE__ ) ); ?>"
                                 width="19px">
                        </a>

                        <a href="<?php echo admin_url( 'admin.php?page=delete-sports-card&id=' . $card->id ); ?>">
                            <img src="<?php echo esc_url( plugins_url( '../assets/img/trash.svg', __FILE__ ) ); ?>">
                        </a>

                    </td>
                </tr>
			<?php endforeach; ?>

            </tbody>
        </table>
    </div>
	<?php

}

add_shortcode( 'view__all_cards', 'oso__view__all_cards' );
