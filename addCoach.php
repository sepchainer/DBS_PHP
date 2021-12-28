<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request
$coach_social_insurance_ID = '';
if (isset($_POST['coach_social_insurance_ID'])) {
    $coach_social_insurance_ID = $_POST['coach_social_insurance_ID'];
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

// Insert method
$success = $database->insertIntoCoach($coach_social_insurance_ID, $coachingstyle, $coach_salary, $coach_team_ID);

// Check result
if ($success){
    echo "Coach '{$coach_social_insurance_ID} {$coachingstyle} {$coach_salary} {$coach_team_ID}' successfully added!";
}
else{
    echo "Error can't insert Coach '{$coach_social_insurance_ID} {$coachingstyle} {$coach_salary} {$coach_team_ID}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>