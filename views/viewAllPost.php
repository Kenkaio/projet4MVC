<?php ob_start(); ?>

   <table id="tablePosts">
      <tr>
         <th>Id</th>
         <th>Date</th>
         <th>Titre</th>
         <th>Modifier</th>
         <th>Supprimer</th>
      </tr>
      <?php for ($i=0; $i < count($posts); $i++):?>

         <?php $date = date_create($posts[$i]->date); ?>
         <?php $echoDate = date_format($date, 'd-m-Y H:i:s'); ?>

         <tr>
            <td><?= $posts[$i]->id ?></td>
            <td><?= $echoDate ?></td>
            <td><?= $posts[$i]->titre ?></td>
            <td id="edit<?= $posts[$i]->id ?>"><a href="index.php?action=editPost&id=<?= $posts[$i]->id ?>"><img src="public/images/edit.png" alt="édititon"></a></td>
            <td id='dele<?= $posts[$i]->id ?>'><a href="index.php?action=delPost&id=<?= $posts[$i]->id ?>"><img src="public/images/croix.png" alt="édititon"></a></td>
         </tr>

   <?php endfor; ?>

  </table>
<?php $contentAdmin = ob_get_clean(); ?>

<?php require 'models/template/admin.php'; ?>
