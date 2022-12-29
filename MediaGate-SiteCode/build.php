<?php

//if (!isset($_SESSION['loggedin'])) {
//	header('Location: index.html');
//	exit;
//}

require 'connection/connection.php';

$streamersListQuery = 'SELECT * FROM `streamer`';
$result = $con->query($streamersListQuery);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Streamers</title>
    <?php require 'components/head.php'; ?>
</head>
<body class="bg-light">

<header class="navbar navbar-dark bg-dark box-shadow">
    <?php require 'components/header.php' ?>
</header>
<main role="main" class="container">
    <div>
        <img class = "center" src="build.jpg" alt="myPic" />
    </div>
</main>
<footer></footer>
<?php require 'components/body.php'; ?>
</body>
</html>

<?php $result->free_result(); ?>
