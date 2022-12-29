<?php require 'IsLoggedIn.php'; 

require 'connection/connection.php';


$username = $_GET['username'] ?? '';
$clientsQuery = "SELECT id, CusName FROM `customers` WHERE CusName LIKE '%".$username."%'";
//var_dump($clientsQuery);
$result = $con->query($clientsQuery);

?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Attach Streamer To Customer</title>
        <?php require 'components/head.php'; ?>
        <style>
            .custom-file-label::after{
                content: none;
            }
        </style>
    </head>
    <?php require 'components/head.php' ?>
    <body class="loggedin">
        <header class="navbar navbar-dark bg-dark box-shadow">
            <?php require 'components/header.php' ?>
        </header>
        <main role="main" class="container">
            <h1 class="display-4 m-3 text-center">Attach Streamer To Customer</h1>
            <form method="get" action="accountToStreamer.php">
                <div class="form-row align-items-center">
                    <div class="col-sm-5 my-1">
                        <input type="text" class="form-control" name="username" value="<?= $username ?>" placeholder="Client Name">
                    </div>

                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-info">Search</button>
                    </div>
                    <div class="col-auto my-1">
                        <a class="btn btn-outline-dark" href="accountToStreamer.php">Reset</a>
                    </div>
                </div>
            </form>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Attach</th>
                <th scope="col">Detach</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['CusName'] ?></td>
                    <td><a href="attachStreamerToUsername.php?userid=<?= $row['id'] ?>"class="btn btn-outline-success">Attach Streamer</a></td>
                    <td><a href="removeStreamerFromUsername.php?userid=<?= $row['id'] ?>"class="btn btn-outline-danger">Detach Streamer</a></td>
                </tr>
                <?php
            } ?>
            </tbody>
        </table>
        </main>
        <footer></footer>
        <?php require 'components/body.php'; ?>
</body>
</html>

<?php $result->free_result(); ?>
