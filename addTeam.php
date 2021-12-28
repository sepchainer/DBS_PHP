<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request

$team_name = '';
if(isset($_POST['team_name'])){
    $team_name = $_POST['team_name'];
}

$age_limit = '';
if(isset($_POST['age_limit'])){
    $age_limit = $_POST['age_limit'];
}

$success = $database->insertIntoTeam($team_name, $age_limit);

// Check result
if ($success){
    echo "Team '{$team_name} {$age_limit}' successfully added!";
}
else{
    echo "Error can't insert Team '{$team_name} {$age_limit}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>