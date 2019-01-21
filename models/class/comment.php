<?php

class Comment{

    /*
        * compte le nombres de nouveaux commentaires
    */
    public function countNewComments()
    {
        $db = dataBase::dbConnect();
        $req = $db->query("SELECT COUNT(*) FROM commentaires WHERE nouveau = true");
        $newComments = $req->fetch();
        return $newComments;
    }

    /*
        * Selectionne les nouveaux commentaires
    */
    public function newComments()
    {
        $db = dataBase::dbConnect();
        $req = $db->query("SELECT * FROM commentaires WHERE nouveau = true");
        return $req;
    }

    /*
        * Selectionne les commentaires signalés
    */
    public function signalementC()
    {
        $db = dataBase::dbConnect();
        $req = $db->query("SELECT * FROM commentaires WHERE signalements = true");
        return $req;
    }

    /*
        * Selectionne le contenu d'un commentaire spécifique
    */
    public function selectCom($id){
        $db = dataBase::dbConnect();
        $req = $db->query("SELECT contenu FROM commentaires WHERE id=" .$id);
        $post = $req->fetch();
        return $post;
    }

    /*
        * Supprime un commentaire spécifique
    */
    public function delete($id){
        $db = dataBase::dbConnect();
        $req = $db->prepare("DELETE FROM commentaires WHERE id=?");
        $req->execute(array($id));
    }

    /*
        * Selectionne tous les commentaires d'un article spécifique
    */
    public function getCommentsId($postId)
    {
        $db = dataBase::dbConnect();
        $comments = $db->prepare("SELECT * FROM commentaires WHERE idArticle=? ORDER BY id DESC");
        $comments->execute(array($_GET['id']));
        $req = $comments->fetchAll(PDO::FETCH_OBJ);
        return $req;
    }

    /*
        * modifie le nombre de nouveaux commentaires
    */
    public function reloadCom(){
        $comments = self::newComments();
        $i=0;
        while ($comment = $comments->fetch())
        {
            $i++;
        }

        $arrayNumber = array();
        fclose(fopen('public/assets/json/numberC.json', 'w'));
        $put = file_get_contents('public/assets/json/numberC.json');
        $put = json_decode($put, true);
        $put[] = $i;
        $put = json_encode($put);
        file_put_contents('public/assets/json/numberC.json', $put);
    }

    /*
        * enlève le commentaire des nouveaux commentaire
    */
    public function upNew($data){
        $db = dataBase::dbConnect();
        $req = $db->prepare('UPDATE commentaires SET nouveau=0 WHERE id=?');
        $req->execute(array(
            substr($data, 9)
        ));
    }

    /*
        * Ajoute un commentaire sur un article
    */
    public function addCom($idArt, $auteur, $content){
        $db = dataBase::dbConnect();
        $req = $db->prepare('INSERT INTO commentaires (idArticle, auteur, contenu) VALUES (:idArticle, :auteur, :contenu)');
        $req->execute(array(
            'idArticle' => $idArt,
            'auteur' => $auteur,
            'contenu' => $content
        ));
    }

    /*
        * passe un le signalement d'un commentaire à true
    */
    public function signTrue($id){
        $db = dataBase::dbConnect();
        $req = $db->prepare('UPDATE commentaires SET signalements=1  WHERE id=?');
        $req->execute(array(
            $id
        ));
    }

}
