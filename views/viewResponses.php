<?php     
  require('../models/modelCoBdd.php');
  require('../models/modelAdmin.php');
  $responses = responses();
  $arrayCom = array();
  fclose(fopen('../models/array.json', 'w'));
  $i=0;
  while ($response = $responses->fetch())
  {    
    $arrayCom = $response;
    $i++;
    $js = file_get_contents('../models/array.json');

    $js = json_decode($js, true);

    $js[] = $arrayCom;

    $js = json_encode($js);
    file_put_contents('../models/array.json', $js);
    
  }    
  
  $arrayNumber = array();
  fclose(fopen('../models/numberR.json', 'w'));
  $put = file_get_contents('../models/numberR.json');
  $put = json_decode($put, true);
  $put[] = $i;
  $put = json_encode($put);
  file_put_contents('../models/numberR.json', $put);



  $message = file_get_contents('../models/array.json');
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