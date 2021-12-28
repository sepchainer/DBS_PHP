<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request
$social_insurance_ID = '';
if(isset($_POST['social_insurance_ID'])){
    $social_insurance_ID = $_POST['social_insurance_ID'];
}

$name = '';
if(isset($_POST['name'])){
    $name = $_POST['name'];
}

$birthdate = '';
if(isset($_POST['birthdate'])){
    $birthdate = $_POST['birthdate'];
}

$success = $database->UpdatePerson($social_insurance_ID, $name, $birthdate);

// Check result
if ($success){
    echo "Person with Social Insurance Number '{$social_insurance_ID}' successfully updated!'";
}
else{
    echo "Error can't update Person '{$social_insurance_ID}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>