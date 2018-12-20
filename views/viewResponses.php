<?php


  $message = file_get_contents('../public/assets/json/arrayR.json');
  $message = json_decode($message, true);

  ?> <table id="tableResponses" class="table table-bordered table-striped table-condensed">
        <tr>
            <th>Lu</th>
            <th>Id</th>
            <th>Date</th>
            <th>Auteur</th>
            <th>Contenu</th>
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
    </tr>
    <?php
  }
