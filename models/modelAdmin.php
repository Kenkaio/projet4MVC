<?php

function tryConnect($pseudo, $password)
{
	$db = dbConnect();
	$req = $db->prepare('SELECT * FROM admin WHERE pseudo= :pseudo');
	$req->execute(array(':pseudo' => $pseudo));
	$result = $req->fetch();
	$Verif_Pass = password_verify($password, $result["password"]);
	if (!$result) {
		$_SESSION['passError']=true; 
		header('location:../index.php');
	}
	else
	{	/* ---- Si connecté, création variable session ----- */
		if ($Verif_Pass) {
			$_SESSION['ouvert']=true; 
			$_SESSION['id'] = $result['id'];
			return array ($_SESSION, 'connexion ok');			
		}
	}	
}

function logout()
{	 
	$_SESSION = array();
	session_destroy();	
}


function newComments()
{
	$db = dbConnect();
	$req = $db->query("SELECT COUNT(*) FROM commentaires WHERE nouveau = true");
	$newComments = $req->fetch();
	return $newComments;
}

function newResponses()
{
	$db = dbConnect();
	$req = $db->query("SELECT COUNT(*) FROM reponses WHERE nouveau = true");
	$responses = $req->fetch();
	return $responses;
}

function newMessage(){
	$db = dbConnect();
	$req = $db->query("SELECT COUNT(*) FROM message WHERE nouveau = true");
	$newMessage = $req->fetch();
	return $newMessage;
}

function comments()
{
	$db = dbConnect();
	$req = $db->query("SELECT * FROM commentaires WHERE nouveau = true");
	return $req;
}

function responses()
{
	$db = dbConnect();
	$req = $db->query("SELECT * FROM reponses WHERE nouveau = true");
	return $req;
}

function messages()
{
	$db = dbConnect();
	$req = $db->query("SELECT * FROM message WHERE nouveau = true ORDER BY id DESC");
	return $req;
}

function posts()
{
	$db = dbConnect();
	$req = $db->query("SELECT COUNT(*) FROM articles");
	$articles = $req->fetch();
	return $articles;
}

function update(){
	$db = dbConnect();                   
    $req = $db->prepare('UPDATE articles SET contenu=? WHERE id=?');
    $req->execute(array(
        htmlspecialchars($_POST['contenuArt']),
        $_POST['idArt']
    ));
    return $_POST['idArt'];
}

function delete($id){
	$db = dbConnect();
    $req = $db->prepare('DELETE FROM articles WHERE id=?');
    $req->execute(array($id));
}

function selectCom($id){
	$db = dbConnect();
    $req = $db->query("SELECT contenu FROM commentaires WHERE id=" .$id);
    $post = $req->fetch();  
    return $post;
}

function deleteR($id){	
	$db = dbConnect();                   
    $req = $db->prepare("DELETE FROM reponses WHERE id=?");
    $req->execute(array($id));
}

function deleteC($id){	
	$db = dbConnect();                   
    $req = $db->prepare("DELETE FROM commentaires WHERE id=?");
    $req->execute(array($id));
}
