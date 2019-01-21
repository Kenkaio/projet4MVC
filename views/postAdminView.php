<?php ob_start(); ?>

<div id="contentAll">
    <div id="contentAdminPost">
        <form action="index.php?action=update&id=<?=$id?>" method="post" enctype="multipart/form-data" id="formArticleAdmin">
            <input type='hidden' name='idArt' value='<?=$id?>'>
            <textarea for='contenuArt' name='contenuArt' id='contenuArt' class='ckeditor' style='height: 40em'><?= $finalContent ?></textarea>
            <input type="submit" name="update" id="update">
        </form>
    </div>

    <div id="contentAdminComments">
	    <?php for ($i=0; $i < count($comments); $i++):?>
            <?php $date = date_create($comments[$i]->date); ?>
            <?php $echoDate = date_format($date, 'd-m-Y H:i:s'); ?>
            <div class='contenuCom'>
                <p><strong class='glyphicon glyphicon-user'><?= htmlspecialchars($comments[$i]->auteur) ?></strong> Le <?= $echoDate ?></p>
                <?= $comments[$i]->contenu ?>
                <a href="index.php?action=delCom&id=<?= $comments[$i]->id ?>"><img id='deleC<?= $comments[$i]->id ?>' src="public/images/croix.png" alt="édititon"></a>
            </div>

        <?php endfor; ?>
    </div>
</div>

<?php $contentAdmin = ob_get_clean(); ?>

<?php require 'models/template/admin.php'; ?>
