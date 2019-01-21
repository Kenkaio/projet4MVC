<?php ob_start(); ?>

  <table id="tableComments" class="table table-bordered table-striped table-condensed">
        <tr>
            <th>Lu</th>
            <th>Id</th>
            <th>Date</th>
            <th>Auteur</th>
            <th>Contenu</th>
        </tr>

  <?php for ($i=0; $i < count($comments); $i++):?>

    <tr id="tr<?= $comments[$i]->id ?>">
      <td><input type="checkbox" name="viewed" id="viewedCom<?= $comments[$i]->id ?>" onclick='changeStatus(viewedCom<?= $comments[$i]->id ?>)'/></td>
      <td><?= $comments[$i]->id ?></td>
      <td><?= $comments[$i]->date ?></td>
      <td><?= $comments[$i]->auteur ?></td>
      <td><?= $comments[$i]->contenu ?></td>
    </tr>

  <?php endfor; ?>

  </table>
<?php $contentAdmin = ob_get_clean(); ?>

<?php require 'models/template/admin.php'; ?>
