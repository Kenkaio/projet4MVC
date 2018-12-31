<?php

class Response{

    /*
        * Compte le nombres de nouvelles reponses
    */
    public function countNewResponses()
    {
        $db = dataBase::dbConnect();
        $req = $db->query("SELECT COUNT(*) FROM reponses WHERE nouveau = true");
        $responses = $req->fetch();
        return $responses;
    }

    /*
        * Selectionne les nouvelles réponses
    */
    public function newResponses()
    {
        $db = dataBase::dbConnect();
        $req = $db->query("SELECT * FROM reponses WHERE nouveau = true");
        return $req;
    }

    /*
        * Supprime une réponse particulière
    */
    public function deleteR($id){
        $db = dataBase::dbConnect();
        $req = $db->prepare("DELETE FROM reponses WHERE id=?");
        $req->execute(array($id));
    }

    /*
        * Sélectionne les réponses d'un commentaire spécifique
    */
    public function getResponses($postIdCom){
        $db = dataBase::dbConnect();
        $responses = $db->prepare("SELECT * FROM reponses WHERE idArt=? ORDER BY id DESC");
        $responses->execute(array($postIdCom));
        return $responses;
    }

    /*
        * Modifie le nombre de nouvelles réponses
    */
    public function reloadRep(){
        $responses = self::newResponses();
        $arrayCom = array();
        fclose(fopen('../public/assets/json/arrayR.json', 'w'));
        $i=0;
        while ($response = $responses->fetch())
        {
            $arrayCom = $response;
            $i++;
            $js = file_get_contents('../public/assets/json/arrayR.json');

            $js = json_decode($js, true);

            $js[] = $arrayCom;

            $js = json_encode($js);
            file_put_contents('../public/assets/json/arrayR.json', $js);

        }

        $arrayNumber = array();
        fclose(fopen('../public/assets/json/numberR.json', 'w'));
        $put = file_get_contents('../public/assets/json/numberR.json');
        $put = json_decode($put, true);
        $put[] = $i;
        $put = json_encode($put);
        file_put_contents('../public/assets/json/numberR.json', $put);
    }

    /*
        * met a jour la réponse sélectionné
    */
    public function upNew($data){
        $db = dataBase::dbConnect();
        $req = $db->prepare('UPDATE reponses SET nouveau=0 WHERE id=?');
        $req->execute(array(
            substr($data, 9)
        ));
    }

    /*
        * Ajoute une réponse à un commentaire
    */
    public function addRepCom($idArt, $Author, $Content){
        $db = dataBase::dbConnect();
        $req = $db->prepare('INSERT INTO reponses (idArt, auteurRep, contenuRep) VALUES (:idArt, :auteurRep, :contenuRep)');
        $req->execute(array(
            'idArt' => $idArt,
            'auteurRep' => $Author,
            'contenuRep' => $Content,
        ));
    }
}
