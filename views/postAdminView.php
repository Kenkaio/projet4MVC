<?php
	if (isset($_GET['id']) && $_GET['id'] > 0) {
   		$post = $postManager->getPost($_GET['id']);
    	$comments = $comment->getComments($_GET['id']);

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
        $posts = $postManager->getPost($_GET['id']);
        $comments = $comment->getComments($_GET['id']);
        while ($data = $comments->fetch()){
            $date = date_create($data['date']);
            $echoDate = date_format($date, 'd-m-Y H:i:s');
        ?>
            <div class='contenuCom'>
                <p><strong class='glyphicon glyphicon-user'><?= htmlspecialchars($data['auteur']) ?></strong> Le <?= $echoDate ?></p>
                <?= $data['contenu'] ?>
                <a href="../controllers/reload.php?idC=<?= $data['id'] ?>"><img id='deleC<?= $data['id'] ?>' src="../public/images/croix.png" alt="édititon"></a>
            </div>

        <?php
            $responses = $response->getResponses($data['id']);
            while ($dataR = $responses->fetch()){
                $date1 = date_create($dataR['dateRep']);
                $echoDate1 = date_format($date1, 'd-m-Y H:i:s');
            ?>  <div class='contenuRep'>
                    <span id='auteurRep'>
                        <strong class='glyphicon glyphicon-user'><?= $dataR['auteurRep'] ?></strong> Le <?= $echoDate1 ?>
                    </span>
                    </br>
                    <span id='contenuRep<?=$dataR['id']?>'><?= $dataR['contenuRep'] ?></span>
                    <a href="../controllers/reload.php?idR=<?= $dataR['id'] ?>"><img id='deleR<?= $dataR['id'] ?>' src="../public/images/croix.png" alt="édititon"></a>
                </div></div></div>
            <?php
            }
        }
    }    ?>
