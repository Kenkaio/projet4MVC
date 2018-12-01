<?php     
  require('../models/modelReload.php');

  $message = file_get_contents('../models/json/arrayR.json');
  $message = json_decode($message, true); 

  ?> <table id="tableResponses">
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
      <td><input type="checkbox" name="viewed" id="viewedRep<?= $message[$i]['id'] ?>" onclick='changeStatus(viewedRep<?= $message[$i]['id'] ?>)'/></td>
      <td><?= $message[$i]['id'] ?></td>
      <td><?= $message[$i]['dateRep'] ?></td>
      <td><?= $message[$i]['auteurRep'] ?></td>
      <td><?= $message[$i]['contenuRep'] ?></td>
      <td id='deleR<?= $message[$i]['id'] ?>' class="modif"><img src="../public/images/croix.png" alt="édititon"></td>
    </tr>
    <?php
  }