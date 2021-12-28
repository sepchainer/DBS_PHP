<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variable id from POST request
$coaches_ID = '';
if(isset($_POST['ID'])){
    $coaches_ID = $_POST['ID'];
}

// Delete method
$error_code = $database->deleteCoach($coaches_ID);

// Check result
if ($error_code == 1){
    echo "Coach with Coaches ID: '{$coaches_ID}' successfully deleted!'";
}
else{
    echo "Error can't delete Coach with ID: '{$coaches_ID}'. Errorcode: {$error_code}";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>