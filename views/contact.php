<?php ob_start(); ?>

<div class="contenu">
	<form id="contact" method="POST" action="controllers/reload.php">
		<h1>CONTACT</h1>
		<div>
			<input type="text" name="nom" id="nom" required>
			<input type="email" name="mail" id="mail" required>
		</div>
		<input type="text" name="subject" id="subject" required>
		<textarea name="message" id="message" required></textarea>
		<input type="submit" value="Envoyer" id="valider">
	</form>
</div>

<?php $contentIndex = ob_get_clean(); ?>

<?php require 'models/template/index.php'; ?>
