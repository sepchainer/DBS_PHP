<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variable id from POST request
$player_id = '';
if(isset($_POST['ID'])){
    $player_id = $_POST['ID'];
}

// Delete method
$error_code = $database->deletePlayer($player_id);

// Check result
if ($error_code == 1){
    echo "Player with Player ID: '{$player_id}' successfully deleted!'";
}
else{
    echo "Error can't delete Player with ID: '{$player_id}'. Errorcode: {$error_code}";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>