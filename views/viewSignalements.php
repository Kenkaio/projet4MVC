<?php     
  require('../models/modelReload.php');
  $message = file_get_contents('../models/json/arrayS.json');
  $message = json_decode($message, true);

  for ($i=0; $i < count($message); $i++) { 
    ?>
    <div id="returnSign">
      <p> Auteur : <strong><?= $message[$i]['auteur'] ?></strong> a été signalé pour le contenu : <strong><?= $message[$i]['contenu'] ?></strong>
        <a href="../models/modelReceptionFichier.php?sign=<?= $message[$i]['id'] ?>"><img id='sign<?= $message[$i]['id'] ?>' src="../public/images/croix.png" alt="édititon"></a></p>
    </div>
    <?php
  }