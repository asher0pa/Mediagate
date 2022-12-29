<?php

require 'connection/connection.php';

$userId = $_GET['userid'] ?? '';
if (empty($userId)) {
    echo 'no userId was found';
    exit(0);
}

$availableStreamersArray = $_GET['streamers'] ?? [];
if (!empty($availableStreamersArray)) {
    $availableStreamersArray = array_keys($availableStreamersArray);

    $streamerToAccountObjects = array_map(function ($availableStreamerId) use ($userId) {
        return sprintf("(NULL, '%s', '%s')", $userId, $availableStreamerId);
    }, $availableStreamersArray);
    $streamerToAccountObjectsQuery = implode(',', $streamerToAccountObjects);
    $setStreamersToUseridQuery = 'INSERT INTO `streamer2account` (`id`, `account_id`, `streamer_id`) VALUES ' . $streamerToAccountObjectsQuery;
    $showSuccessMsg = $con->query($setStreamersToUseridQuery);
}

$availableStreamersQuery = 'SELECT `streamer`.`model`, `streamer`.`id` FROM `streamer` LEFT OUTER JOIN streamer2account ON `streamer`.`id` = `streamer2account`.`streamer_id` WHERE `streamer2account`.`account_id` IS NULL';
$result = $con->query($availableStreamersQuery);

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <title>Attach Streamer To Username</title>
        <?php require 'components/head.php'; ?>
    </head>
    <body class="bg-light">
        <header class="navbar navbar-dark bg-dark box-shadow">
            <?php require 'components/header.php' ?>
        </header>
        <main role="main" class="container">
            <?php if (!empty($showSuccessMsg)) :?>
                <div class="alert alert-success text-center" role="alert">
                    Streamer Add To User!
                </div>
            <?php endif; ?>
            <h1 class="display-4 m-3 text-center">Attach Streamer To Username</h1>
            <form class="g-3" action="attachStreamerToUsername.php">
                <input type="hidden" name="userid" value="<?= $userId ?>"/>
                <?php while($row = $result->fetch_assoc()) { ?>
                    <div class="custom-checkbox custom-control mb-2">
                        <input type="checkbox" class="custom-control-input" id="type_<?= $row['id'] ?>" name="streamers[<?= $row['id'] ?>]">
                        <label class="custom-control-label" for="type_<?= $row['id'] ?>"><?= $row['model'] ?></label>
                    </div>
                <?php } ?>
                <div class="col-auto p-0">
                    <button type="submit" class="btn btn-primary mb-3">Add</button>
                </div>
            </form>
            </main>
        <footer></footer>
        <?php require 'components/body.php'; ?>
    </body>
</html>

<?php $result->free_result(); ?>
