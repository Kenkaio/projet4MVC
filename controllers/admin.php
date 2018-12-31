<?php
session_start();
ob_start();

require '../models/class/autoloader.php';
Autoloader::register();

$postManager = new postManager();
$comment = new comment();
$response = new response();
$user = new user();
$message = new message();

if (isset($_GET['deco'])) {

		$user->logout();
}

if(empty($_SESSION['ouvert'])){
	$user->tryConnect($_POST['pseudo'], $_POST['password']);
}

if ($_SESSION['ouvert']) {
	$totalComments = $comment->countNewComments();
	$totalResponses = $response->countNewResponses();
	$totalArticle = $postManager->countPosts();
	$posts = $postManager->getPosts();
	$newMessage = $message->countNewMessage();
	require('../views/adminView.php');

	if (isset($_GET['id']) && $_GET['id'] > 0) {
		$post = $postManager->getPostId($_GET['id']);
	    $comments = $comment->getCommentsId($_GET['id']);
	    require('../views/postAdminView.php');
	}
}

if(isset($_POST['update'])){
	$post = $postManager->getPostId($_POST['idArt']);
	$postManager->update($_POST);
	header('location:admin.php');
}

if(isset($_GET['del'])){
	$post = $postManager->getPostId($_GET['del']);
	$postManager->delete($post);
	header('location:admin.php#mesArticles');
}

if(isset($_GET['com'])){
	$content = substr($_GET['com'], 4, -2);
	$id = substr($_GET['com'], 5);
	if ($content == 'R') {
		deleteR($id);
	}else{
		$comment->deleteC($id);
	}
}

if(isset($_POST['confirmAddPost'])){
	$post = new post([
		'title' => htmlspecialchars($_POST['titlePost']),
		'content' => htmlspecialchars($_POST['contentPost'])
		]);
	$postManager->addPost($post);
	header('location:admin.php');
}

ob_end_flush();

