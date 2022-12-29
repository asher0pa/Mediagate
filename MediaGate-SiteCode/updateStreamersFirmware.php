<?php require 'IsLoggedIn.php'; 

require 'connection/connection.php';

# region query for type
// query for type enum
$enum_query = "SELECT COLUMN_TYPE FROM information_schema.`COLUMNS` WHERE TABLE_NAME = 'streamer' AND COLUMN_NAME = 'type'";
$result = $con->query($enum_query);
$typeEnumArray = [];
while ($row = $result->fetch_row()) {
    $row = reset($row);

    $enumStr = str_replace('enum', '', $row);
    $enumStr = str_replace('(', '', $enumStr);
    $enumStr = str_replace(')', '', $enumStr);
    $enumStr = str_replace("'", '', $enumStr);

    $typeEnumArray = explode(',', $enumStr);

}
$result->free_result();
# endregion

#region query for table
// query for table
$query = 'SELECT * from streamer';

$typeArray = $_GET['type'] ?? [];
$typeArray = array_keys($typeArray);

if (!empty($typeArray)) {
    $typeArrayWithQuotes = array_map(function ($type) {
        return sprintf("'%s'", $type);
    }, $typeArray);
    $query = sprintf('%s WHERE type IN (%s)', $query, implode(',', $typeArrayWithQuotes));
}

/** @var mysqli_result $result */
$result = $con->query($query);
#endregion

$streamersIds = [];
$data=[];

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Firmware Update</title>
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
            <h1 class="display-4 m-3 text-center">Firmware Update</h1>
            <section>
                <form action="updateStreamersFirmware.php">
                    <div class="form-group row">
                        <div class="col-sm-2">Types</div>
                        <div class="col-sm-10">
                            <?php foreach ($typeEnumArray as $typeEnum) {
                                ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="type[<?= $typeEnum ?>]" type="checkbox" id="type_<?= $typeEnum ?>" <?php echo in_array($typeEnum, $typeArray) ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="type_<?= $typeEnum ?>"><?= $typeEnum ?></label>
                                    </div>
                                <?php
                            } ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary mb-3" >Filter</button>
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
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = $result->fetch_assoc()) {
                        $data[] = $row;
                        $streamersIds[] = $row['id'];
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
            <section>
                <form action="upload.php" method="post" enctype="multipart/form-data" class="m-0 row">
                    <input type="hidden" name="streamers_ids" value="<?= implode(',', $streamersIds) ?>"/>
                    <div class="col-sm-5 input-group mb-3 p-0">
                        <div class="custom-file">
                            <input type="file" name="file" class="custom-file-input" id="file">
                            <label class="custom-file-label" for="file">Click <b> HERE </b>to upload Firmware</label>
                        </div>
                        <div class="input-group-append">
                            <input type="submit" class="input-group-text" value="Submit To Streamers"/>
                        </div>
                    </div>
                </form>
            </section>
            
        </main>
        <footer></footer>
        <?php require 'components/body.php'; ?>
    </body>
</html>

<?php $result->free_result(); ?>
