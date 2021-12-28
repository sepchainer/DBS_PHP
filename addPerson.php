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

// Insert method
$success = $database->insertIntoPerson($social_insurance_ID, $name, $birthdate);

// Check result
if ($success){
    echo "Person '{$social_insurance_ID} {$name} {$birthdate}' successfully added!'";
}
else{
    echo "Error can't insert Person '{$social_insurance_ID} {$name} {$birthdate}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>