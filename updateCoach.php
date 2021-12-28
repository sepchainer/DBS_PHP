<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request
$coaches_ID = '';
if(isset($_POST['coaches_ID'])){
    $coaches_ID = $_POST['coaches_ID'];
}

$coachingstyle = '';
if (isset($_POST['coachingstyle'])) {
    $coachingstyle = $_POST['coachingstyle'];
}

$coach_salary = '';
if (isset($_POST['coach_salary'])) {
    $coach_salary = $_POST['coach_salary'];
}

$coach_team_ID = '';
if (isset($_POST['coach_team_ID'])) {
    $coach_team_ID = $_POST['coach_team_ID'];
}

// Update method
$success = $database->UpdateCoach($coaches_ID, $coachingstyle, $coach_salary, $coach_team_ID);

// Check result
if ($success){
    echo "Coach '{$coaches_ID}' successfully updated!";
}
else{
    echo "Error can't update Coach '{$coaches_ID}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>