<!DOCTYPE html>
<html>
<head>
    <title>Mes chapitres</title>
    <link rel="stylesheet" type="text/css" href="../public/css/index.css">
    <link rel="stylesheet" type="text/css" href="../public/css/chapitre.css">
    <link href="../bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
    
    <?php 
        include 'menu.php';
    ?>
    
</head>
<body>
        <h1>Mon super blog !</h1>
        <p><a href="../index.php">Retour à la liste des billets</a></p>

        <div class="news">
            <h3>
                <?= $post['titre'] ?>
                <em>le <?= $post['date'] ?></em>
            </h3>
            
            <p>
                <?= $post['contenu'] ?>
            </p>
        </div>

        <h2>Commentaires</h2>

        <?php
        while ($comment = $comments->fetch()){
        ?>
            <p><strong><?= htmlspecialchars($comment['auteur']) ?></strong> le <?= $comment['date'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p>

        <?php
            $responses = getResponses($comment['id']);
            while ($response = $responses->fetch()){
            ?>
                <p><strong><?= htmlspecialchars($response['auteurRep']) ?></strong> le <?= $response['dateRep'] ?></p>
                <p><?= nl2br(htmlspecialchars($response['contenuRep'])) ?></p>
            <?php
            }
        }
        ?>
    </body>
</html>