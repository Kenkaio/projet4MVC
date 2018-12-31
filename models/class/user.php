<?php
class User {

	/*
        * Connecte un utilisateur
    */
	public function tryConnect($pseudo, $password)
	{
		$db = dataBase::dbConnect();
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

	/*
        * Détruit une session
    */
	public function logout()
	{
		$_SESSION = array();
		session_destroy();
	}
}





