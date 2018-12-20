<?php
session_start();
ob_start();

require '../models/class/autoloader.php';
autoloader::register();

$post = new post();
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
	$totalArticle = $post->posts();
	$posts = $post->getPosts();
	$newMessage = $message->newMessage();
	require('../views/adminView.php');

	if (isset($_GET['id']) && $_GET['id'] > 0) {
	    $posts = $post->getPost($_GET['id']);
	    $comments = $comment->getComments($_GET['id']);
	    require('../views/postAdminView.php');
	}
}

if(isset($_POST['update'])){
	$post->update(htmlspecialchars($_POST['contenuArt']), $_POST['idArt']);
	header('location:admin.php');
}

if(isset($_GET['del'])){
	$post->delete($_GET['del']);
	header('location:admin.php#mesArticles');
}

if(isset($_POST['delete'])){
	$id = $_POST['idArt'];
	delete($id);
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
	$post->addPost($_POST['titlePost'], $_POST['contentPost']);
	header('location:admin.php');
}

ob_end_flush();

