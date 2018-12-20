<?php
session_start();

require('views/indexAccueil.php');

if (isset($_SESSION['passError'])) {
	echo "<script>alert('Pseudo ou password incorrect')</script>";
	$_SESSION = array();
	session_destroy();
}
