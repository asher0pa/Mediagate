<?php

require 'connection/connection.php';

$userId = $_GET['userid'] ?? '';
if (empty($userId)) {
    echo 'no userId was found';
    exit(0);
}

$streamersToRemoveArray = $_GET['streamers'] ?? [];
if(!empty($streamersToRemoveArray)){
    $streamersToRemoveArray = array_keys($streamersToRemoveArray);
    $streamersToRemoveArrayAsString = implode(',', $streamersToRemoveArray);
    $streamersToRemoveQuery = sprintf('DELETE FROM `streamer2account` WHERE `streamer_id` IN (%s) AND account_id = %s', $streamersToRemoveArrayAsString, $userId);
    $showSuccessMsg = $con->query($streamersToRemoveQuery);
}

$availableStreamersQuery = 'SELECT `streamer`.`model`, `streamer2account`.`streamer_id` as `id` FROM `streamer` INNER JOIN `streamer2account` ON `streamer`.`id` = `streamer2account`.`streamer_id` WHERE `streamer2account`.`account_id` = '.$userId;
$result = $con->query($availableStreamersQuery);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Remove Streamer To Username</title>
        <?php require 'components/head.php'; ?>
    </head>
    <body class="bg-light">
        <header class="navbar navbar-dark bg-dark box-shadow">
            <?php require 'components/header.php' ?>
        </header>
        <main role="main" class="container">
            <?php if (!empty($showSuccessMsg)) :?>
                <div class="alert alert-success text-center" role="alert">
                    The streamer was remove!
                </div>
            <?php endif; ?>
        <h1 class="display-4 m-3 text-center">Remove Streamer To Username</h1>
        <form class="g-3" action="removeStreamerFromUsername.php">
            <input type="hidden" name="userid" value="<?= $userId ?>"/>
            <?php while($row = $result->fetch_assoc()) { ?>
                <div class="custom-checkbox custom-control mb-2">
                    <input type="checkbox" class="custom-control-input" id="type_<?= $row['id'] ?>" name="streamers[<?= $row['id'] ?>]">
                    <label class="custom-control-label" for="type_<?= $row['id'] ?>"><?= $row['model'] ?></label>
                </div>
            <?php } ?>
            <div class="col-auto p-0">
                <button type="submit" class="btn btn-primary mb-3">Remove</button>
            </div>
        </form>
        </main>
        <footer></footer>
        <?php require 'components/body.php'; ?>
    </body>
</html>

<?php $result->free_result(); ?>
