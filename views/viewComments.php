<?php     
  require('../models/modelCoBdd.php');
  require('../models/modelAdmin.php');
  $comments = comments();
  $arrayCom = array();
  fclose(fopen('../models/array.json', 'w'));
  $i=0;
  while ($comment = $comments->fetch())
  {    
    $arrayCom = $comment;

    $js = file_get_contents('../models/array.json');

    $js = json_decode($js, true);

    $js[] = $arrayCom;

    $js = json_encode($js);
    file_put_contents('../models/array.json', $js);
    $i++;
  }      

  $arrayNumber = array();
  fclose(fopen('../models/numberC.json', 'w'));
  $put = file_get_contents('../models/numberC.json');
  $put = json_decode($put, true);
  $put[] = $i;
  $put = json_encode($put);
  file_put_contents('../models/numberC.json', $put);


  $message = file_get_contents('../models/array.json');
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