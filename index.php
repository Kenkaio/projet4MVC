<?php
session_start();

require('controllers/frontend.php');
require('controllers/backend.php');


try {

	require 'models/class/autoloader.php';
	Autoloader::register();

	($_SERVER['SERVER_NAME'] == 'localhost') ? $directory = "jeanForterocheMVC/" : $directory = "projet4/";
	$_SESSION['server'] = $_SERVER['SERVER_NAME'].'/'.$directory;
	
	if(isset($_GET['action'])){
		if($_GET['action'] == "posts"){
			if(isset($_GET['id'])){
				$getPost = post($_GET['id']);
			}
			else{
				$posts = posts();
			}
		}
		else if($_GET['action'] == "addCom"){
			addcom($_POST['auteurCom'], $_POST['contenuCom'], $_POST['idArt']);
		}
		else if($_GET['action'] == "signCom"){
			signCom($_POST);
		}
		else if($_GET['action'] == "contact"){
			require('views/contact.php');
		}
		else if($_GET['action'] == "formAdmin"){
			require('views/formAdmin.php');
		}
		else if($_GET['action'] == "coAdmin"){
			if(empty($_SESSION['ouvert'])){
				tryCoAdmin($_POST);
			}
			else{
				connectedAdmin();
			}
		}
		else if($_GET['action'] == "reloadCom"){
			reloadCom();
		}
		else if($_GET['action'] == "reloadSign"){
			reloadSign();
		}
		else if($_GET['action'] == "viewComs"){
			viewComs();
		}
		else if($_GET['action'] == "viewSign"){
			viewSign();
		}
		else if($_GET['action'] == "delSign"){
			$id = $_GET['id'];
			delSign($id);
		}
		else if($_GET['action'] == "formNewPost"){
			require('views/newPost.php');
		}
		else if($_GET['action'] == "addPost"){
			addPost($_POST);
		}
		else if($_GET['action'] == "allPosts"){
			allPosts();
		}
		else if($_GET['action'] == "editPost"){
			viewPostAdmin($_GET['id']);
		}
		else if($_GET['action'] == "update"){
			update($_POST['contenuArt'], $_POST['idArt']);
		}
		else if($_GET['action'] == "delPost"){
			delPost($_GET['id']);
		}
		else if($_GET['action'] == "delCom"){
			delCom($_GET['id']);
		}
		else if($_GET['action'] == "deco"){
			deco();
		}
		else{
			require('views/error.php');
		}
	}
	else{
		require('views/indexAccueil.php');
	}

	if (isset($_SESSION['passError'])) {
		echo "<script>alert('Pseudo ou password incorrect')</script>";
		$_SESSION = array();
		session_destroy();
	}

}
catch(Exception $e) {
	echo 'Erreur: ' . $e->getMessage();
}

?>
