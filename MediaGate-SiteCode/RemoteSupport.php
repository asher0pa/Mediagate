<?php require 'IsLoggedIn.php'; 

require 'connection/connection.php';


$streamersListQuery = 'SELECT * FROM `streamer` WHERE `status` = "USE"';


$text = $_GET['text'] ?? '';
$option = $_GET['option'] ?? '';
if (!empty($text)) {
    $streamersListQuery .= " AND " . $option . " LIKE '%" . $text . "%'";
}

$result = $con->query($streamersListQuery);


?>

<!DOCTYPE html>
<html>
<head>
    <title>Remote Support</title>
    <?php require 'components/head.php'; ?>
</head>
<body class="bg-light">
<header class="navbar navbar-dark bg-dark box-shadow">
    <?php require 'components/header.php' ?>
</header>
<main role="main" class="container">
    <h1 class="display-4 m-3 text-center">Remote Support</h1>
    <section>
        <form action="RemoteSupport.php" method="get">
            <div class="form-row align-items-center">
                <div class="col-sm-3 my-1">
                    <input type="text" class="form-control" name="text" value="<?= $text ?>">
                </div>
                <div class="col-sm-3 my-1">
                    <select class="custom-select mr-sm-2" name="option">
                        <option value="SerialNum" <?php echo $option === 'SerialNum' ? 'selected' : ''?>>SerialNum</option>
                        <option value="model" <?php echo $option === 'model' ? 'selected' : ''?>>Model</option>
                    </select>
                </div>
                <div class="col-auto my-1">
                    <button type="submit" class="btn btn-info">Search</button>
                </div>
                <div class="col-auto my-1">
                    <a class="btn btn-outline-dark" href="RemoteSupport.php">Reset</a>
                </div>
            </div>
        </form>
    </section>
    <section>
        <table class="table table-hover table-responsive-lg table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Model</th>
                <th scope="col">Version</th>
                <th scope="col">Type</th>
                <th scope="col">Status</th>
                <th scope="col">SerialNum</th>
                <th scope="col">IP</th>
				<th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['model'] ?></td>
                    <td><?= $row['version'] ?></td>
                    <td><?= $row['type'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td><?= $row['SerialNum'] ?></td>
					<td><?= $row['IP'] ?></td>
                    <td><a href="Connect.php?streamerid=<?= $row['id'] ?>" class="btn btn-outline-danger">CONNECT</a></td>
                </tr>
                <?php
            } ?>
            </tbody>
        </table>
    </section>
</main>
<footer></footer>
<?php require 'components/body.php'; ?>
</body>
</html>

<?php $result->free_result(); ?>
