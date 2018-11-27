<table id="tableResponses">
  <tr>
    <th>Lu</th>
    <th>Id</th>
    <th>Contenu du commentaire</th>
    <th>Date</th>
    <th>Auteur</th>
    <th>Contenu</th>
    <th>Supprimer</th>
  </tr>
  <?php 
  while ($response = $responses->fetch())
  {
    $contenuCom = selectCom($response['idArt']);
    $date = date_create($response['dateRep']);
    $echoDate = date_format($date, 'd-m-Y H:i:s');
    ?>
    <tr id="trRep<?= $response['id'] ?>"> 
      <td><input type="checkbox" name="viewed" id="viewedRep<?= $response['id'] ?>" /></td>
      <td><?= $response['id'] ?></td>
      <td><?= $contenuCom[0] ?></td>
      <td><?= $echoDate ?></td>
      <td><?= $response['auteurRep'] ?></td>
      <td id='content<?= $response['id'] ?>'><?= $response['contenuRep'] ?></td>
      <td id='deleR<?= $response['id'] ?>' class="modif"><img src="../public/images/croix.png" alt="édititon" id="imageR<?= $response['id'] ?>"></td>
    </tr>
  <?php } ?>                        
</table>