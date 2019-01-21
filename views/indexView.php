<?php ob_start(); ?>

<div class="contenuArticles">
    <?php for ($i=0; $i < count($posts); $i++):?>
        <?php $content = $posts[$i]->contenu; ?>
        <?php $finalContent = changeArray($content); ?>
        <?php $date = date_create($posts[$i]->date); ?>
        <?php $echoDate = date_format($date, 'd-m-Y H:i:s'); ?>
        <div id='article'>
            <div id='titreDate'><span id='titreArticle'><?= $posts[$i]->titre ?></span></div>
            <span id='date'>Edité le : <?= $echoDate ?> </span>
            <span class='contenu'><?= $finalContent ?></span>
        </div>
        <a href="index.php?action=posts&id=<?= $posts[$i]->id ?>"><button class='suite'>Lire la suite</button></a>
    <?php endfor; ?>
</div>

<?php $contentIndex = ob_get_clean(); ?>

<?php require 'models/template/index.php'; ?>
