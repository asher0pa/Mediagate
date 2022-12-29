<?php require 'IsLoggedIn.php'; 

require 'connection/connection.php';

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$fileContent = file_get_contents($_FILES['file']['tmp_name']);
$fileContentArray = explode('=', $fileContent);
$newVersionNumber = trim($fileContentArray[1]);

$streamersArrayAsString = !empty($_POST['streamers_ids'])?$_POST['streamers_ids']:[];

$updateQuery = sprintf('UPDATE streamer SET version="%s" WHERE id IN (%s)', $newVersionNumber, $streamersArrayAsString);


//var_dump($updateQuery);
/** @var mysqli_result|bool $result */
$result = $con->query($updateQuery);
if($result === true){
    header('Location: updateStreamersFirmware.php');
}
