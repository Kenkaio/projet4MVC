<?php
session_start();
ob_start();

require('../models/modelCoBdd.php');
require('../models/modelAdmin.php');
require('../models/modelBillets.php');

if (isset($_GET['deco'])) {

 	session_start();
 	
	$_SESSION = array();
	session_destroy();
	 
	header('Location:../index.php');
}

if(empty($_SESSION['ouvert'])){
	tryConnect($_POST['pseudo'], $_POST['password']);
}

if ($_SESSION['ouvert']) {
	$totalComments = newComments();
	$totalResponses = newResponses();
	$totalArticle = posts();
	$posts = getPosts();
	$comments = comments();
	$responses = responses();
	require('../views/adminView.php');

	if (isset($_GET['id']) && $_GET['id'] > 0) {
	    $post = getPost($_GET['id']);
	    $comments = getComments($_GET['id']);	    
	    require('../views/postAdminView.php');
	}
}

if(isset($_POST['update'])){ 
	$adr = update();
	header('location:admin.php?id='.$adr);
}

if(isset($_GET['del'])){ 
	$id = $_GET['del'];
	delete($id);
	header('location:admin.php#mesArticles');
}

if(isset($_POST['delete'])){ 
	$id = $_POST['idArt'];
	delete($id);
	header('location:admin.php#mesArticles');
}

ob_end_flush();  

