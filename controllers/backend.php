<?php

function addCom($name, $content, $idArt){
    $comment = new comment();
    if ($name != "Nom" && $content != "Votre commentaire" && !empty($content) && !empty($name)) {
        $comment->addCom(htmlspecialchars($idArt), htmlspecialchars($name), htmlspecialchars($content));
        header('location:index.php?action=posts&id='.$idArt);
    }
    else{
        header('location:index.php?action=posts&id='.$idArt);
    }
}

function signCom($post){
    $comment = new comment();
    if(isset($post['signalerCom'])){
        $comment->signTrue($post['idSignalementCom']);
        header('location:index.php?action=posts&id='.$post['idArt']);
    }
}

function tryCoAdmin($post){
    $user = new user();
    $user->tryConnect($post['pseudo'], $post['password']);
}

function connectedAdmin(){
    $comment = new comment();
    $postManager = new postManager();
    $message = new message();

    $totalComments = $comment->countNewComments();
    $totalArticle = $postManager->countPosts();
    $posts = $postManager->getPosts();
    $newMessage = $message->countNewMessage();
    require('views/admin.php');
}

function reloadCom(){
    $comment = new comment();
    $comment->reloadCom();
}

function reloadSign(){
    $manager = new postManager();
    $post = $manager->reloadSign();
}

function viewComs(){
    $comment = new comment();
    $comments = $comment->newComments();
    $comments = $comments->fetchAll(PDO::FETCH_OBJ);
    require('views/viewComments.php');
}

function viewSign(){
    $sign = new comment();
    $signs = $sign->signalementC();
    $signs = $signs->fetchAll(PDO::FETCH_OBJ);
    require('views/viewSignalements.php');
}

function delSign($id){
	$comment = new comment();
    $comment->delete($id);
    viewSign();
}

function addPost($posts){
    $postManager = new postManager();
    $post = new post([
        'title' => htmlspecialchars($posts['titlePost']),
        'content' => htmlspecialchars($posts['contentPost'])
    ]);
    $postManager->addPost($post);
    header('location:index.php?action=allPosts');
}

function allPosts(){
    $postManager = new postManager();
    $req = $postManager->getPosts();
    $posts = $req->fetchAll(PDO::FETCH_OBJ);
    require('views/viewAllPost.php');
}

function viewPostAdmin($id){
    if($id > 0) {
        $postManager = new postManager();
        $comment = new comment();

        $post = $postManager->getPostId($id);
        $comments = $comment->getCommentsId($id);
        $content = $post->contenu;
        $finalContent = changeArray($content);
        require('views/postAdminView.php');
    }
}

function update($content, $id){
    $postManager = new postManager();
    $post = $postManager->getPostId($id);
    $postManager->update($content, $id);
    header('location:index.php?action=editPost&id='.$id);
}

function delPost($id){
    $postManager = new postManager();
    $postManager->delete($id);
	header('location:index.php?action=allPosts');
}

function delCom($id){
    $comment = new comment();
    $comment->delete($id);
    header('location:index.php?action=allPosts');
}

function deco(){
    $user = new user();
    $user->logout();
    header('location:index.php');
}
