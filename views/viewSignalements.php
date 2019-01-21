<?php ob_start(); ?>
<?php for ($i=0; $i < count($signs); $i++):?>

  <p> Auteur : <strong><?= $signs[$i]->auteur ?></strong> a été signalé pour le contenu : <strong><?= $signs[$i]->contenu ?></strong>
  <a href="index.php?action=delSign&id=<?= $signs[$i]->id ?>"><img id='sign<?= $signs[$i]->id ?>' src="public/images/croix.png" alt="édititon"></a></p>

<?php endfor; ?>

<?php $contentAdmin = ob_get_clean(); ?>


<?php require 'models/template/admin.php'; ?>
