<?php require 'IsLoggedIn.php'; 

require 'connection/connection.php';

$streamersListQuery = 'SELECT * FROM `streamer`';
$result = $con->query($streamersListQuery);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Streamers</title>
        <?php require 'components/head.php'; ?>
        <style>
            .custom-file-label::after{
                content: none;
            }
        </style>
    </head>
    <body class="bg-light">
        <header class="navbar navbar-dark bg-dark box-shadow">
            <?php require 'components/header.php' ?>
        </header>
        <main role="main" class="container">
            <h1 class="display-4 m-3 text-center">Firmware Report</h1>
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
