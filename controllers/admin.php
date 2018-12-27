<?php
session_start();
ob_start();

require '../models/class/autoloader.php';
autoloader::register();

$postManager = new postManager();
$comment = new comments();
$response = new responses();
$user = new user();
$message = new message();

if (isset($_GET['deco'])) {

 	session_start();

	$_SESSION = array();
	session_destroy();

	header('Location:../index.php');
}

if(empty($_SESSION['ouvert'])){
	$user->tryConnect($_POST['pseudo'], $_POST['password']);
}

if ($_SESSION['ouvert']) {
	$totalComments = $comment->newComments();
	$totalResponses = $response->newResponses();
	$totalArticle = $postManager->posts();
	$posts = $postManager->getPosts();
	$newMessage = $message->newMessage();
	require('../views/adminView.php');

	if (isset($_GET['id']) && $_GET['id'] > 0) {
		$post = $postManager->getPost($_GET['id']);
	    $comments = $comment->getComments($_GET['id']);
	    require('../views/postAdminView.php');
	}
}

if(isset($_POST['update'])){
	$post = $postManager->getPost($_POST['idArt']);
	$postManager->update($post);
	header('location:admin.php');
}

if(isset($_GET['del'])){
	$post = $postManager->getPost($_GET['id']);
	$postManager->delete($post);
	header('location:admin.php#mesArticles');
}

if(isset($_POST['delete'])){
	$post = $postManager->getPost($_GET['id']);
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

