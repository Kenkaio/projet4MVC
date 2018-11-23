<table id="tablePosts">
  <tr>
     <th>Id</th>
     <th>Date</th>
     <th>Titre</th>
     <th>Modifier</th>
     <th>Supprimer</th>
  </tr>
  <?php 
  while ($data = $posts->fetch())
  {
      $date = date_create($data['date']);
      $echoDate = date_format($date, 'd-m-Y H:i:s');
  ?>
  <tr>
     <td><?= $data['id'] ?></td>
     <td><?= $echoDate ?></td>
     <td><?= $data['titre'] ?></td>
     <td id="edit<?= $data['id'] ?>"><a href="admin.php?id=<?= $data['id'] ?>"><img src="../public/images/edit.png" alt="édititon"></a></td>
     <td id='dele<?= $data['id'] ?>'><a href="admin.php?del=<?= $data['id'] ?>"><img src="../public/images/croix.png" alt="édititon"></a></td>
  </tr>
  <?php } ?>                        
</table> 