<?php
  require('../controllers/reload.php');
  $message = file_get_contents('../public/assets/json/messagerie.json');
  $message = json_decode($message, true);
?>
  <tr>
      <th></th>
      <th>de</th>
      <th>Objet</th>
      <th>Message</th>
  </tr><?php


  for ($i=0; $i < count($message); $i++) {
    $date = date_create($message[$i]['date_envoi']);
    $echoDate = date_format($date, 'd-m-Y H:i');
  ?><tr id="tr<?= $message[$i]['id'] ?>">
      <td><input type="checkbox" name="viewed" id="viewedMes<?= $message[$i]['id'] ?>" onclick='changeStatus(viewedMes<?= $message[$i]['id'] ?>)'/></td>
      <td><?=$message[$i]['expe'] ?></td>
      <td><em><?= $message[$i]['subject'] ?></em></td>
      <td><?= $message[$i]['text'] ?></td>
    </tr>
      <?php
  }?>
