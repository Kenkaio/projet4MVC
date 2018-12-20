<?php
  require('../controllers/reload.php');
  $message = file_get_contents('../public/assets/json/arrayC.json');
  $message = json_decode($message, true);
  ?> <table id="tableComments" class="table table-bordered table-striped table-condensed">
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
      <td><input type="checkbox" name="viewed" id="viewedCom<?= $message[$i]['id'] ?>" onclick='changeStatus(viewedCom<?= $message[$i]['id'] ?>)'/></td>
      <td><?= $message[$i]['id'] ?></td>
      <td><?= $message[$i]['date'] ?></td>
      <td><?= $message[$i]['auteur'] ?></td>
      <td><?= $message[$i]['contenu'] ?></td>
    </tr>
    <?php
  }
