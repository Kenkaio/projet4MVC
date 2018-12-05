<?php  
	if (isset($_GET['id']) && $_GET['id'] > 0) {
   		$post = getPost($_GET['id']);
    	$comments = getComments($_GET['id']);

	    $date = $post['date'];
		$titre = $post['titre'];
		$contenu = $post['contenu'];
		/* --- array 1 et remplacé par array 2 dans le contenu afin d'afficher le contenu sous forme html ----- */
		$array1 = array('&lt;', '&gt;', '&quot;', '&amp;', '&eacute;', '&#39;', '&egrave;', '&ccedil;', '&agrave;', '=&nbsp;');
		$array2 = array('<', '>', '"', '&', 'é', '\'', 'è', 'ç', 'à', '=');
		$contenuFinal = str_replace($array1, $array2, $contenu);
		?><div id="contentAll">
		<div id="contentAdminPost">
			<form action="../controllers/admin.php" method="post" enctype="multipart/form-data" id="formArticleAdmin">
				<input type='hidden' name='idArt' value='<?=$_GET['id']?>'></input>
				<textarea for='contenuArt' name='contenuArt' id='contenuArt' class='ckeditor' style='height: 40em'><?= $contenuFinal ?></textarea>	
				<input type="submit" name="update" id="update">
				<input type="submit" name="delete" id="supprimer">
			</form>
		</div>
		<div id="contentAdminComments">
	<?php
	 	$post = getPost($_GET['id']);
	    $comments = getComments($_GET['id']);
        while ($comment = $comments->fetch()){
            $date = date_create($comment['date']);
            $echoDate = date_format($date, 'd-m-Y H:i:s');
        ?>
            <div class='contenuCom'>
                <p><strong class='glyphicon glyphicon-user'><?= htmlspecialchars($comment['auteur']) ?></strong> Le <?= $echoDate ?></p>
                <?= $comment['contenu'] ?>  
                <a href="../models/modelReceptionFichier.php?idC=<?= $comment['id'] ?>"><img id='deleC<?= $comment['id'] ?>' src="../public/images/croix.png" alt="édititon"></a>
            </div>

        <?php
            $responses = getResponses($comment['id']);
            while ($response = $responses->fetch()){
                $date1 = date_create($response['dateRep']);
                $echoDate1 = date_format($date1, 'd-m-Y H:i:s');
            ?>  <div class='contenuRep'>                                    
                    <span id='auteurRep'>
                        <strong class='glyphicon glyphicon-user'><?= $response['auteurRep'] ?></strong> Le <?= $echoDate1 ?>
                    </span>                                        
                    </br>                                   
                    <span id='contenuRep<?=$response['id']?>'><?= $response['contenuRep'] ?></span> 
                    <a href="../models/modelReceptionFichier.php?idR=<?= $response['id'] ?>"><img id='deleR<?= $response['id'] ?>' src="../public/images/croix.png" alt="édititon"></a>        
                </div></div></div>
            <?php
            }
        }
    }    ?>