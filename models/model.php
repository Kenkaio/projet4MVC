<?php
// Récupération des données

function getPosts()
{
	$db = dbConnect();
	$req = $db->query("SELECT * FROM articles ORDER BY id DESC");
	return $req;
}


function getPost($postId)
{
    $db = dbConnect();
    $req = $db->query("SELECT * FROM articles WHERE id=" . $_GET['id']);
    $post = $req->fetch();

    return $post;
}


function getComments($postId)
{
    $db = dbConnect();
    $comments = $db->prepare("SELECT * FROM commentaires WHERE idArticle=? ORDER BY id DESC");
	$comments->execute(array($_GET['id']));

    return $comments;
}


function getResponses($postIdCom)
{
	$db = dbConnect();
	$responses = $db->prepare("SELECT * FROM reponses WHERE idArt=? ORDER BY idR DESC");
	$responses->execute(array($postIdCom));
	return $responses;
}


function dbConnect()
{
	try
	{
	    $db = new PDO('mysql:host=localhost;dbname=jeanforteroche;charset=utf8', 'root', '');
		/*$db = new PDO('mysql:host=db761958864.hosting-data.io;dbname=db761958864;charset=utf8', 'dbo761958864', 'Polo<555');*/
		return $db;
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}
}

