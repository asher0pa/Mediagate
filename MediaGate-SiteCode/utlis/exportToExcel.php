<?php

header('Content-type: application/excel');
header('Content-Disposition: attachment; filename=streamers.xls');

$data = $_POST['table_data'] ?? '[]';
$streamers = json_decode($data);

?>
<html>
    <body>
          <table>
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
                  <?php foreach ($streamers as $streamer) {
                      ?>
                      <tr>
                          <td><?= $streamer->id ?></td>
                          <td><?= $streamer->model ?></td>
                          <td><?= $streamer->version ?></td>
                          <td><?= $streamer->type ?></td>
                          <td><?= $streamer->status ?></td>
                          <td><?= $streamer->SerialNum ?></td>
                      </tr>
                      <?php
                  } ?>
              </tbody>
          </table>
    </body>
</html>
