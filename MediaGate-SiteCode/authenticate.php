<?php

require 'connection/connection.php';


// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}													   

// Put Given password into Virable
$password = $_POST['password'];

// Validate password strength
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password);




if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    exit('Your Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.');
	//exit($password);
	
}else{
//    echo 'Strong password.';




// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, password FROM employees WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if (password_verify($_POST['password'], $password)) {
		// Verification success! User has logged-in!
		// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_start();
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $id;
		header('Location: home.php');
	} else {
		// Incorrect password
		echo 'Incorrect username and/or password - Please Check POC Guide for system credentials!';
		
	}
} else {
	// Incorrect username
	
	echo 'Incorrect username and/or password - Please Check POC Guide for system credentials!';
}


	$stmt->close();
}
}
?>