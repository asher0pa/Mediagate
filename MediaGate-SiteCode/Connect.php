<?php require 'IsLoggedIn.php'; 

require 'connection/connection.php';

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}



// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_GET['streamerid']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill Seiral Number field!');
}

	$streamerId = $_GET['streamerid'];	


$sql = "SELECT IP FROM streamer WHERE `id` = $streamerId";
				
$result = $con->query($sql);

while($row = $result->fetch_assoc()) {
   $ip = $row['IP'];
}

$myfile = fopen("c:\\temp\\connection.bat", "w") or die("Unable to open file!");
$txt = 'START cmd /c c:\temp\putty.exe ' ;
fwrite($myfile, $txt);
$txt = $ip;
fwrite($myfile, $txt);
fclose($myfile);	



  // Set headers
  header("Cache-Control: public");
  header("Content-Description: File Transfer");
  header("Content-Disposition: attachment; filename=connection-".rand(10000000000000000,99999999999999999).".bat");
  header("Content-Type: application/bat");
  header("Content-Transfer-Encoding: ASCII");
    
	


	
	
  // Read the file from disk
  ?>
	 
	 
	 @echo off
	 echo "PLease Wait while connection to your equipment"
	 c:\temp\connection.bat
	 
<?php?>