<table id="tableResponses">
  <tr>
    <th>Lu</th>
    <th>Id</th>
    <th>Contenu du commentaire</th>
    <th>Date</th>
    <th>Auteur</th>
    <th>Contenu</th>
    <th>Modifier</th>
    <th>Supprimer</th>
  </tr>
  <?php 
  while ($response = $responses->fetch())
  {
    $contenuCom = selectCom($response['idArt']);
    $date = date_create($response['dateRep']);
    $echoDate = date_format($date, 'd-m-Y H:i:s');
    ?>
    <tr id="trRep<?= $response['idR'] ?>"> 
      <td><input type="checkbox" name="viewed" id="viewedRep<?= $response['idR'] ?>" /></td>
      <td><?= $response['idR'] ?></td>
      <td><?= $contenuCom[0] ?></td>
      <td><?= $echoDate ?></td>
      <td><?= $response['auteurRep'] ?></td>
      <td><?= $response['contenuRep'] ?></td>
      <td id="edit<?= $data['id'] ?>"><a href="admin.php?id=<?= $data['id'] ?>"><img src="../public/images/edit.png" alt="édititon"></a></td>
      <td id='dele<?= $data['id'] ?>'><a href="admin.php?del=<?= $data['id'] ?>"><img src="../public/images/croix.png" alt="édititon"></a></td>
    </tr>
  <?php } ?>                        
</table>
<button class="viewOff">Marquer comme lu</button>