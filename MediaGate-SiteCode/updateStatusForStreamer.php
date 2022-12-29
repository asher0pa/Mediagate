<?php

$streamerId = $_GET['streamerid'] ?? '';
if (empty($streamerId)) {
    echo 'streamer id was not found';
    die(0);
}

require 'connection/connection.php';


$newStatus = $_GET['new_status'] ?? '';
if (!empty($newStatus)) {
    $updateStreamerQuery = sprintf("UPDATE `streamer` SET `status` = '%s' WHERE `streamer`.`id` = %s", $newStatus, $streamerId);
    $response = $con->query($updateStreamerQuery);
    if ($response === true) {
        header('Location: streamers.php');
    }
}


// get list of available statuses
$statusEnumQuery = "SELECT COLUMN_TYPE FROM information_schema.`COLUMNS` WHERE TABLE_NAME = 'streamer' AND COLUMN_NAME = 'status'";
$result = $con->query($statusEnumQuery);
$statusEnumArray = [];
while ($row = $result->fetch_row()) {
    $row = reset($row);

    $statusEnum = str_replace('enum', '', $row);
    $statusEnum = str_replace('(', '', $statusEnum);
    $statusEnum = str_replace(')', '', $statusEnum);
    $statusEnum = str_replace("'", '', $statusEnum);

    $statusEnumArray = explode(',', $statusEnum);
}
$result->free_result();

// get single streamer
$getSingleStreamerQuery = sprintf("SELECT status FROM `streamer` WHERE `id` = %s", $streamerId);
$result = $con->query($getSingleStreamerQuery);
$streamer = $result->fetch_assoc();
$streamerStatus = $streamer['status'];
$result->free_result();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Status For Streamer</title>
        <?php require 'components/head.php'; ?>
    </head>
    <body class="bg-light">
        <header class="navbar navbar-dark bg-dark box-shadow">
            <?php require 'components/header.php'; ?>
        </header>
        <main role="main" class="container">
            <h1 class="display-4 m-3 text-center">Update Status For Streamer</h1>
            <p>Select new status</p>
            <form action="updateStatusForStreamer.php" method="get">
                <input type="hidden" value="<?= $streamerId ?>" name="streamerid"/>
                <div class="form-row align-items-center">
                    <div class="col-auto my-1">
                        <select name="new_status" class="custom-select mr-sm-4">
                            <?php foreach ($statusEnumArray as $statusEnum) {
                                ?>
                                <option value="<?= $statusEnum ?>" <?php echo $streamerStatus == $statusEnum ? 'selected' : '' ?>><?= $statusEnum ?></option>
                                <?php
                            } ?>
                        </select>
                    </div>
                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </main>
        <footer></footer>
        <?php require 'components/body.php'; ?>
    </body>
</html>
