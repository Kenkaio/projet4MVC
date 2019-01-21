<?php

function posts(){
    $manager = new postManager();
    $posts = $manager->getPosts();
    $posts = $posts->fetchAll(PDO::FETCH_OBJ);
    require('views/indexView.php');
}

function post($id){
    if ($id > 0) {
        $manager = new postManager();
        $comment = new comment();
        $post = $manager->getPostId($id);
        if($post){
            $comments = $comment->getCommentsId($id);
            $content = $post->contenu;
            $finalContent = changeArray($content);
            require('views/postView.php');
        }
        else{
            require('views/error.php');
        }
    }
}

function changeArray($content){
    $array1 = array('&lt;', '&gt;', '&quot;', '&amp;', '&eacute;', '&#39;', '&egrave;', '&ccedil;', '&agrave;', '=&nbsp;');
    $array2 = array('<', '>', '"', '&', 'é', '\'', 'è', 'ç', 'à', '=');
    $finalContent = str_replace($array1, $array2, $content);
    return $finalContent;
}
