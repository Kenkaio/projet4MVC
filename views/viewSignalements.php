<?php
  require('../controllers/reload.php');
  $message = file_get_contents('../public/assets/json/arrayS.json');
  $message = json_decode($message, true);

  for ($i=0; $i < count($message); $i++) {
    ?>
      <p> Auteur : <strong><?= $message[$i]['auteur'] ?></strong> a été signalé pour le contenu : <strong><?= $message[$i]['contenu'] ?></strong>
        <a href="../controllers/reload.php?sign=<?= $message[$i]['id'] ?>"><img id='sign<?= $message[$i]['id'] ?>' src="../public/images/croix.png" alt="édititon"></a></p>
    <?php
  }
