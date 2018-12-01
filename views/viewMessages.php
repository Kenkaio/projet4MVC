<?php     
  require('../models/modelReload.php');
  $message = file_get_contents('../models/json/messagerie.json');
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
  ?><tr>
      <td><input type="checkbox" name="checkMail" onclick="deleteMsg(<?=$message[$i]['id'] ?>)"></td>
      <td><?=$message[$i]['expe'] ?></td>
      <td><em><?= $message[$i]['subject'] ?></em></td>
      <td><?= $message[$i]['text'] ?></td>
    </tr>
      <?php 
  }?>
    