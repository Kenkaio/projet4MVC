<?php

class Message {

    /*
        * Compte le nombre de nouveaux messages
    */
    public function countNewMessage(){
        $db = dataBase::dbConnect();
        $req = $db->query("SELECT COUNT(*) FROM message WHERE nouveau = true");
        $newMessage = $req->fetch();
        return $newMessage;
    }

    /*
        * Selectionne les nouveaux messages
    */
    public function getNewMessages()
    {
        $db = dataBase::dbConnect();
        $req = $db->query("SELECT * FROM message WHERE nouveau = true ORDER BY id DESC");
        return $req;
    }

    /*
        * Recharge le nombre de nouveaux messages
    */
    public function reloadMes(){
        $messages = self::getNewMessages();
        $arrayCom = array();
        fclose(fopen('../public/assets/json/messagerie.json', 'w'));
        $i=0;
        while ($message = $messages->fetch())
        {
            $arrayCom = $message;
            $i++;
            $js = file_get_contents('../public/assets/json/messagerie.json');

            $js = json_decode($js, true);

            $js[] = $arrayCom;

            $js = json_encode($js);
            file_put_contents('../public/assets/json/messagerie.json', $js);

        }
        $arrayNumber = array();
        fclose(fopen('../public/assets/json/numberM.json', 'w'));
        $put = file_get_contents('../public/assets/json/numberM.json');
        $put = json_decode($put, true);
        $put[] = $i;
        $put = json_encode($put);
        file_put_contents('../public/assets/json/numberM.json', $put);
    }

    /*
        * enlève le message des nouveaux messages
    */
    public function upMesNew($id){
        $db = dataBase::dbConnect();
        $req = $db->prepare('UPDATE message SET nouveau=0 WHERE id=?');
        $req->execute(array(
            substr($id, 9)
        ));
    }

    /*
        * enlève le message des nouveaux messages
    */
    public function addMail($from, $subject, $content){
        $db = dataBase::dbConnect();
        $req = $db->prepare('INSERT INTO message (expe, subject, text) VALUES (:expe, :subject, :text)');
        $req->execute(array(
            'expe' => $from,
            'subject' => $subject,
            'text' => $content
        ));
    }
}

