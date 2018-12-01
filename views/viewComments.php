<?php     
  require('../models/modelReload.php');
  $message = file_get_contents('../models/json/arrayC.json');
  $message = json_decode($message, true);
  ?> <table id="tableComments">
        <tr>
            <th>Lu</th>
            <th>Id</th>
            <th>Date</th>
            <th>Auteur</th>
            <th>Contenu</th>
            <th>Supprimer</th>
        </tr> 
    </table>  <?php
  for ($i=0; $i < count($message); $i++) { 
    ?>
    <tr id="tr<?= $message[$i]['id'] ?>">
      <td><input type="checkbox" name="viewed" id="viewedCom<?= $message[$i]['id'] ?>" onclick='changeStatus(viewedCom<?= $message[$i]['id'] ?>)'/></td>
      <td><?= $message[$i]['id'] ?></td>
      <td><?= $message[$i]['date'] ?></td>
      <td><?= $message[$i]['auteur'] ?></td>
      <td><?= $message[$i]['contenu'] ?></td>
      <td id='deleC<?= $message[$i]['id'] ?>' class="modif"><img src="../public/images/croix.png" alt="édititon"></td>
    </tr>
    <?php
  }