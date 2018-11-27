<!DOCTYPE html>
<html>
<head>
    <title>Mes chapitres</title>
    <link rel="stylesheet" type="text/css" href="../public/css/index.css">
    <link rel="stylesheet" type="text/css" href="../public/css/chapitre.css">
    <link href="../models/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
    
    <?php 
        include '../views/menu.php';
    ?>
    
</head>
<body>
    <div class="contenuArticles">
        <div id='articleComplet'>
            <?php
                $content = $post['contenu'];
                $array1 = array('&lt;', '&gt;', '&quot;', '&amp;', '&eacute;', '&#39;', '&egrave;', '&ccedil;', '&agrave;', '=&nbsp;');
                $array2 = array('<', '>', '"', '&', 'é', '\'', 'è', 'ç', 'à', '=');
                $finalContent = str_replace($array1, $array2, $content);
            ?>
            <h3>
                <?= $post['titre'] ?>
                <em>le <?= $post['date'] ?></em>
            </h3>
            <span id='contenu'><?= $finalContent ?></span>
        </div>

        <h1 id='titreCom'>Commentaires</h1>

        <?php
        while ($comment = $comments->fetch()){
            $date = date_create($comment['date']);
            $echoDate = date_format($date, 'd-m-Y H:i:s');
        ?>
            <div class='contenuCom'>
                <p><strong class='glyphicon glyphicon-user'><?= htmlspecialchars($comment['auteur']) ?></strong> Le <?= $echoDate ?></p>
                <p><?= $comment['contenu'] ?></p>
                <input type='button' id="reponseCom<?= $comment['id']?>"  class='repondre' value='Répondre'></input>
                <form action='../models/modelReceptionFichier.php' method='post' enctype='multipart/form-data' id='formSignalementCom'>
                    <input type='hidden' name='idSignalementCom' value='<?= $comment['id']?>'></input>   
                    <input type='hidden' name='idArt' value='<?=$_GET['id']?>'></input>
                    <input type='submit' class='signalerCom' name='signalerCom' value='Signaler' id='signaler' onClick="signalementCom()"></input>
                </form>
                <!-- Textarea de réponse -->
                <form action='../models/modelReceptionFichier.php' method='post' enctype='multipart/form-data' id='formArticle'>
                    <input type='hidden' name='idCom' value='<?= $comment['id']?>'></input>
                    <input type='hidden' name='idArt' value='<?=$_GET['id']?>'></input>
                    <div id='editTextarea<?= $comment['id']?>' class='editTextarea'>
                        <input type='text' class='auteurRepCom' id='auteurCom<?= $comment['id']?>' name='auteurCom'></input>
                        <textarea for='reponseCom' name='reponseCom' id='textareaCom<?= $comment['id']?>' rows='10'></textarea></br>
                        <input type='submit' class='confirmRepCom' name='confirmRepCom' value='<?= $comment['id']?>'></input>
                    </div>
                </form>
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
                    <form action='../models/modelReceptionFichier.php' method='post' enctype='multipart/form-data' id='formSignalementRep'>
                        <input type='hidden' name='idSignalementCom' value='<?= $response['id']?>'></input>  
                        <input type='hidden' name='idArt' value='<?=$_GET['id']?>'></input>
                        <input type='submit' class='signalerRep' name='signalerRep' value='Signaler' id='signaler' onClick="signalementRep()"></input>
                    </form> 
                </div>
            <?php
            }
        }
        ?>
        <h2><a href='#ajoutCommentaire'>Ajouter un commentaire</a></h2>
        <form action="../models/modelReceptionFichier.php" method="post" enctype='multipart/form-data' id='ajoutCommentaire'>
            <input type='hidden' name='idArt' value='<?=$_GET['id']?>'></input>
            <input type="text" name="auteurCom" id="auteurCom">
            <textarea type="text" name="contenuCom" rows="10" id="reponseCom"></textarea>
            <input type="submit" name="confirmerAjoutCom" class="confirmRepCom">
        </form>
    </div>
    <script src="../public/js/chapitre.js"></script>
</body>
</html>