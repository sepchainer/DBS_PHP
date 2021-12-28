<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request
$player_social_insurance_ID = '';
if (isset($_POST['player_social_insurance_ID'])) {
    $player_social_insurance_ID = $_POST['player_social_insurance_ID'];
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

// Insert method
$success = $database->insertIntoPlayer($player_social_insurance_ID, $position, $player_salary, $player_team_ID);

// Check result
if ($success){
    echo "Player '{$player_social_insurance_ID} {$position} {$player_salary} {$player_team_ID}' successfully added!";
}
else{
    echo "Error can't insert Player '{$player_social_insurance_ID} {$position} {$player_salary} {$player_team_ID}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>