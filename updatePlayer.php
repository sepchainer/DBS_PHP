<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request
$player_id = '';
if(isset($_POST['player_id'])){
    $player_id = $_POST['player_id'];
}

$position = '';
if (isset($_POST['position'])) {
    $position = $_POST['position'];
}

$player_salary = '';
if (isset($_POST['player_salary'])) {
    $player_salary = $_POST['player_salary'];
}

$player_team_ID = '';
if (isset($_POST['player_team_ID'])) {
    $player_team_ID = $_POST['player_team_ID'];
}

// Update method
$success = $database->UpdatePlayer($player_id, $position, $player_salary, $player_team_ID);

// Check result
if ($success){
    echo "Player '{$player_id}' successfully updated!";
}
else{
    echo "Error can't update Player '{$player_id}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>