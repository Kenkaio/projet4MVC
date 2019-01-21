<?php ob_start(); ?>

    <div class="contenuArticles">
        <div id='articleComplet'>
            <h3>
                <?= $post->titre ?>
            </h3>
            <span id='contenu'><?= $finalContent ?></span>
        </div>

        <h1 id='titreCom'>Commentaires</h1>

        <?php for ($i=0; $i < count($comments); $i++):?>
        <?php $date = date_create($comments[$i]->date); ?>
        <?php $echoDate = date_format($date, 'd-m-Y H:i:s'); ?>

            <div class='contenuCom'>
                <p><strong class='glyphicon glyphicon-user'><?= htmlspecialchars($comments[$i]->auteur) ?></strong> Le <?= $echoDate ?></p>
                <p><?= $comments[$i]->contenu ?></p>
                <form action='index.php?action=signCom' method='post' enctype='multipart/form-data' id='formSignalementCom'>
                    <input type='hidden' name='idSignalementCom' value='<?= $comments[$i]->id?>'>
                    <input type='hidden' name='idArt' value='<?=$_GET['id']?>'>
                    <input type='submit' class='signalerCom' name='signalerCom' value='Signaler' id='signaler' onClick="signalementCom()">
                </form>
            </div>
        <?php endfor; ?>
        <h2><a href='#ajoutCommentaire'>Ajouter un commentaire</a></h2>
        <form action="index.php?action=addCom" method="post" enctype='multipart/form-data' id='ajoutCommentaire'>
            <input type='hidden' name='idArt' value='<?=$_GET['id']?>'>
            <input type="text" name="auteurCom" id="auteurCom">
            <textarea type="text" name="contenuCom" rows="10" id="reponseCom"></textarea>
            <input type="submit" name="confirmerAjoutCom" class="confirmRepCom">
        </form>
    </div>

<?php $contentIndex = ob_get_clean(); ?>

<?php require 'models/template/index.php'; ?>

