<?php ob_start(); ?>

<div id="errorPost">
    <img src="public/images/404.png" alt="erreur 404">
</div>

<?php $contentIndex = ob_get_clean(); ?>

<?php require 'models/template/index.php'; ?>
