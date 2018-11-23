<?php  
	if (!empty($_GET['id'])) {
	    $date = $post['date'];
		$titre = $post['titre'];
		$contenu = $post['contenu'];
		/* --- array 1 et remplacé par array 2 dans le contenu afin d'afficher le contenu sous forme html ----- */
		$array1 = array('&lt;', '&gt;', '&quot;', '&amp;', '&eacute;', '&#39;', '&egrave;', '&ccedil;', '&agrave;', '=&nbsp;');
		$array2 = array('<', '>', '"', '&', 'é', '\'', 'è', 'ç', 'à', '=');
		$contenuFinal = str_replace($array1, $array2, $contenu);
		?>
		<form action="../controllers/admin.php" method="post" enctype="multipart/form-data" id="formArticleAdmin">
			<input type='hidden' name='idArt' value='<?=$_GET['id']?>'></input>
			<textarea for='contenuArt' name='contenuArt' id='contenuArt' class='ckeditor' style='height: 40em'><?= $contenuFinal ?></textarea>	
			<input type="submit" name="update" id="update">
			<input type="submit" name="delete" id="supprimer">
		</form>
	<?php } ?>