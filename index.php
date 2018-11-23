<?php
session_start();

require('models/modelBillets.php');
require('views/indexAccueil.php');	

if (isset($_SESSION['passError'])) {	
	echo "<script>alert('Pseudo ou password incorrect')</script>";
	$_SESSION = array();
	session_destroy();
}
