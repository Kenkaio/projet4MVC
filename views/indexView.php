<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mes chapitres</title>
        <link href="../public/css/chapitre.css" rel="stylesheet" /> 
        <link href="../public/css/index.css" rel="stylesheet" />         
        <link href="../models/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 

        <?php 
            include '../views/menu.php';
        ?>
    </head>
        
    <body>
        <div class="contenuArticles">
            <?php
            while ($data = $posts->fetch())
            {
                $content = $data['contenu'];
                $array1 = array('&lt;', '&gt;', '&quot;', '&amp;', '&eacute;', '&#39;', '&egrave;', '&ccedil;', '&agrave;', '=&nbsp;');
                $array2 = array('<', '>', '"', '&', 'é', '\'', 'è', 'ç', 'à', '=');
                $finalContent = str_replace($array1, $array2, $content);
                $date = date_create($data['date']);
                $echoDate = date_format($date, 'd-m-Y H:i:s');
            ?>
            <div id='article'>  
                    <div id='titreDate'><span id='titreArticle'><?= $data['titre'] ?></span></div>
                    <span id='date'>Edité le : <?= $echoDate ?> </span>
                    <span class='contenu'><?= $finalContent ?></span>
                </div>
            <a href="post.php?id=<?= $data['id'] ?>"><button class='suite'>Lire la suite</button></a>
            <?php
            }
            $posts->closeCursor();
            ?>
        </div>
    </body>
</html>