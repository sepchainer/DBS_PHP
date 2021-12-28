<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variable id from POST request
$social_insurance_id = '';
if(isset($_POST['id'])){
    $social_insurance_id = $_POST['id'];
}

// Delete method
$error_code = $database->deletePerson($social_insurance_id);

// Check result
if ($error_code == 1){
    echo "Person with ID: '{$social_insurance_id}' successfully deleted!'";
}
else{
    echo "Error can't delete Person with ID: '{$social_insurance_id}'. Errorcode: {$error_code}";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>