<?php ob_start(); ?>

<div class="contenu">
	<form id="formAdmin" method="POST" action="index.php?action=coAdmin">
		<h1 id="admin">Partie privée</h1>
		<input type="text" name="pseudo" id="pseudo" required>
		<input type="password" name="password" id="password" required>
		<input type="submit" value="Envoyer" id="confirmAdmin">
	</form>
</div>

<?php $contentIndex = ob_get_clean(); ?>

<?php require 'models/template/index.php'; ?>

