<?php
get_header();
$id = $_GET['id'];
//echo $id;
if ( isset( $id ) ) {
	global $wpdb;
	$id           = $_GET['id'];
	$sport_table  = $wpdb->prefix . 'sportscards';
	$player_table = $wpdb->prefix . 'player_history_information';

	$players_data = $wpdb->get_results( "SELECT *
                                        FROM $sport_table
                                        INNER JOIN $player_table
                                        ON $sport_table.id = $player_table.id_suportcards 
                                        WHERE $player_table.id_suportcards = $id 
                                     " );
	echo '<pre>';
//print_r($player_names[0]);
	echo '</pre>';
//get_header();
//while ($player_names[0]){
//	echo json_encode( $player_names,true);
//}
	?>
    <div class="table__section">
		 <div class="player__profile">
    <div class="inner__section">
        <h4> 2007-08 FLEER MICHAEL JORDAN / BASKETBALL </h4>
    </div>
    <div class="new__search">
        <a href="/pop-report/">New Search</a>
    </div>
</div>
    <div class="scrollable">
    <div>
    <table cellpadding="1" cellspacing="1">
        <v-table playersjson="<?php echo jsonToProp($players_data); ?>"></v-table>
    </table>
    </div><!-- END inner div -->
    </div><!-- END scrollable -->

    </div>
<?php
}
get_footer();

