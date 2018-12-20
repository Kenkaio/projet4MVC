<?php

class post{

    /*
        * Compte le nombres d'articles
    */
    public function posts()
    {
        $db = dataBase::dbConnect();
        $req = $db->query("SELECT COUNT(*) FROM articles");
        $articles = $req->fetch();
        return $articles;
    }

    /*
        * Update le contenu d'un article
    */
    public function update($content, $id){
        $db = dataBase::dbConnect();
        $req = $db->prepare('UPDATE articles SET contenu=? WHERE id=?');
        $req->execute(array(
            $content,
            $id
        ));
    }

    /*
        * Delete un article
    */
    public function delete($id){
        $db = dataBase::dbConnect();
        $req = $db->prepare('DELETE FROM articles WHERE id=?');
        $req->execute(array($id));
    }

    /*
        * Crée un nouvel article
    */
    public function addPost($title, $content){
        $db = dataBase::dbConnect();
        $req = $db->prepare('INSERT INTO articles (titre, contenu) VALUES (:titre, :contenu)');
        $req->execute(array(
            'titre' => htmlspecialchars($title),
            'contenu' => htmlspecialchars($content)
        ));
    }

    /*
        * Selectionne un article précis
    */
    public function getPost($postId)
    {
        $db = dataBase::dbConnect();
        $req = $db->query("SELECT * FROM articles WHERE id=" . $_GET['id']);
        $post = $req->fetch();
        return $post;
    }


    /*
        * Selectionne tous les articles par ordre decroissant
    */
    public function getPosts()
    {
        $db = dataBase::dbConnect();
        $req = $db->query("SELECT * FROM articles ORDER BY id DESC");
        return $req;
    }


    public function signalementC(){
        $db = dataBase::dbConnect();
        $req = $db->query("SELECT * FROM commentaires WHERE signalements = true");
        return $req;
    }


    public function reloadSign(){
        $signalements = self::signalementC();
        $arrayCom = array();
        fclose(fopen('../public/assets/json/arrayS.json', 'w'));
        $i=0;
        while ($signalement = $signalements->fetch())
        {
            $arrayCom = $signalement;

            $js = file_get_contents('../public/assets/json/arrayS.json');

            $js = json_decode($js, true);

            $js[] = $arrayCom;

            $js = json_encode($js);
            file_put_contents('../public/assets/json/arrayS.json', $js);
            $i++;
        }

        $arrayNumber = array();
        fclose(fopen('../public/assets/json/numberS.json', 'w'));
        $put = file_get_contents('../public/assets/json/numberS.json');
        $put = json_decode($put, true);
        $put[] = $i;
        $put = json_encode($put);
        file_put_contents('../public/assets/json/numberS.json', $put);
    }


}

