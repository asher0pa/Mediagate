<?php require 'IsLoggedIn.php'; ?>


<!DOCTYPE html>
<html>
<head>
	<title>MediaGate Information System</title>
    <?php require 'components/head.php'; ?>
</head>
<body class="bg-light">
<header class="navbar navbar-dark bg-dark box-shadow">
    <?php require 'components/header.php' ?>
</header>
<main role="main" class="container">
    <section>
		<br><br>
        <h2>MediaGate Information System</h2>
		<br><br>
        <p>Welcome , <?= $_SESSION['name'] ?? '' ?>!</p>
		<br><br>
		<img src="logo.png" style='height: 100%; width: 100%; object-fit: contain' alt="logo">
    </section>
</main>
<footer></footer>
<?php require 'components/body.php'; ?>
</body>
</html>
