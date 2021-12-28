<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variable id from POST request
$team_ID = '';
if(isset($_POST['ID'])){
    $team_ID = $_POST['ID'];
}

// Delete method
$error_code = $database->deleteTeam($team_ID);

// Check result
if ($error_code == 1){
    echo "Team with ID: '{$team_ID}' successfully deleted!'";
}
else{
    echo "Error can't delete Team with ID: '{$team_ID}'. Errorcode: {$error_code}";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>