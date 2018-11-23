<?php
session_start();
if (empty($_SESSION['ouvert']))  {
	header('location:php/connexion.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=0hkhpc4x9cs6zila14oyvwobq0nvvwt8jz83d0b6k58i1q6s"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
	<link rel="stylesheet" type="text/css" href="css/admin.css">	
	<link rel="stylesheet" type="text/css" href="css/articles.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>

	<!-- Menu droite partie admin -->
	<canvas id="menu" width="50" height="50"></canvas>
	<div class="menu">
		<div id="accueil" class="liensMenu"><a href="admin.php">Accueil</a></div>
		<div id="ajoutArticle" class="liensMenu">Ajouter un article</div>
		<div id="monProfil" class="liensMenu">Profil</div>
		<div id="deco" class="liensMenu"><a href="php/destroy_session.php">Déconnexion</a></div>
	</div>

	<!-- Menu avec les images au centre -->	
	<div id="tousLesArticles">
		<h1 id="titreTousArticles">Tous les articles</h1>
		<table id="tableArticle">
			<tr>
		       <th>Id</th>
		       <th>Date</th>
		       <th>Titre</th>
		       <th>Commentaires</th>
		   	</tr>
		   	<?php
				include 'php/tableauArticle.php';
			?>
		</table>
	</div>

	<!-- Ajout article -->
	<form action="php/reception_fichier.php" method="post" enctype="multipart/form-data" id="formArticle">
		<h2> Ajouter un article </h2>
		<div class="titreArticle">
			<label for="titre" name="titre" id="titre">Titre article : </label><input type="text" name="titre" required>
		</div>
		<div class="zoneArticle">
			<textarea for="contenu" name="contenu" id="contenu" class="ckeditor" style="height: 40em"></textarea>	
		</div>
            <input type="submit" name="validerArticle" id="validerArticle"/>		
	</form>
	<?php
		include 'php/allArticles.php';
	?>
	<script src="js/admin.js"></script>	
</body>
</html>	
