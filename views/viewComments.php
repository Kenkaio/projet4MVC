<div class="col">
  <table id="tablePosts">
    <tr>
      <th>Lu</th>
      <th>Id</th>
      <th>Date</th>
      <th>Auteur</th>
      <th>Contenu</th>
      <th>Modifier</th>
      <th>Supprimer</th>
    </tr>
    <?php 
    while ($comment = $comments->fetch()){
      $date = date_create($comment['date']);
      $echoDate = date_format($date, 'd-m-Y H:i:s');
      ?>
      <tr id="trCom<?= $comment['id'] ?>">
        <td><input type="checkbox" name="viewed" id="viewedCom<?= $comment['id'] ?>" /></td>
        <td><?= $comment['id'] ?></td>
        <td><?= $echoDate ?></td>
        <td><?= $comment['auteur'] ?></td>
        <td><?= $comment['contenu'] ?></td>
        <td id="edit<?= $data['id'] ?>"><a href="admin.php?id=<?= $data['id'] ?>"><img src="../public/images/edit.png" alt="édititon"></a></td>
        <td id='dele<?= $data['id'] ?>'><a href="admin.php?del=<?= $data['id'] ?>"><img src="../public/images/croix.png" alt="édititon"></a></td>
      </tr>
      <?php } ?>                      
  </table>
</div>
<button class="viewOff">Marquer comme lu</button>