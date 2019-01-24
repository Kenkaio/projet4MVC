<?php ob_start(); ?>

    <div class="row" id="newPost">
        <div class="col-lg-12 col-md-12">
            <form action="index.php?action=addPost" method="post" enctype="multipart/form-data" id="addPost">
                <input type="text" id="titlePost" name="titlePost" value="Titre article">
                <textarea id="textPost" class='ckeditor' name="contentPost">Contenu</textarea>
                <input type='submit' id="confirmPost" value="valider" name='confirmAddPost'>
            </form>
        </div>
    </div>

<?php $contentAdmin = ob_get_clean(); ?>

<?php require 'models/template/admin.php'; ?>
