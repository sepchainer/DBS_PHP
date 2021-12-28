<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request
$team_ID = '';
if(isset($_POST['team_ID'])){
    $team_ID = $_POST['team_ID'];
}

$team_name = '';
if(isset($_POST['team_name'])){
    $team_name = $_POST['team_name'];
}

$age_limit = '';
if(isset($_POST['age_limit'])){
    $age_limit = $_POST['age_limit'];
}

$success = $database->UpdateTeam($team_ID, $team_name, $age_limit);

// Check result
if ($success){
    echo "Team with Team ID '{$team_ID}' successfully updated!'";
}
else{
    echo "Error can't update Team '{$team_ID}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>