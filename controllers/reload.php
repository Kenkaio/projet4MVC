<?php
function redirect_to($url){
    header($url);
    exit();
}
error_reporting(E_ALL);
ini_set("display_errors", 1);

/* charge la classe quand celle ci est appelée */
require '../models/class/autoloader.php';
autoloader::register();

$manager = new postManager();
$comment = new comments();
$response = new responses();
$user = new user();
$message = new message();
    /*
        * Recharge nombre réponses
    */
    if (isset($_POST['reloadRep'])) {
        $response->reloadRep();
    }

    /*
        * Recharge nombre commentaires
    */
    if (isset($_POST['reloadCom'])) {
        $comment->reloadCom();
    }

    /*
        * Recharge nombre messages
    */
    if (isset($_POST['reloadMes'])) {
        $message->reloadMes();
    }

    /*
        * Recharge nombre signalements
    */
    if (isset($_POST['reloadSign'])) {
        $post = $manager->reloadSign();
    }

    /*
        * Modifie les fichiers json numbers
    */
    if (isset($_POST['data'])) {
        $data = $_POST['data'];
        if (substr($data, 6, -2) == 'Com'){
            $comment->upNew($data);
        }
        else if (substr($data, 6, -2) == 'Rep'){
            $response->upNew($data);
        }
    }

    /*
        * Supprime un commentaire signalé
    */
    if (isset($_GET['sign'])) {
        $comment->deleteC($_GET['sign']);
        redirect_to('location:../controllers/admin.php');
    }

    /*
        * Enlève un message spécifique des nouveaux messages
    */
    if (isset($_POST['mes'])) {
        $message->upMesNew($_POST['mes']);
        redirect_to('location:../controllers/admin.php');
    }

    /*
        * Ajout commentaire
    */
    if(isset($_POST['confirmerAjoutCom'])){
        $comment->addCom(htmlspecialchars($_POST['idArt']), htmlspecialchars($_POST['auteurCom']), htmlspecialchars($_POST['contenuCom']));
        redirect_to('location:../controllers/post.php?id=' . $_POST['idArt']);
    }

    /*
        * Ajout réponse
    */
    if(isset($_POST['confirmRepCom'])){
        $response->addRepCom($_POST['idCom'], htmlspecialchars($_POST['auteurCom']), htmlspecialchars($_POST['reponseCom']));
        redirect_to('location:../controllers/post.php?id=' . $_POST['idArt']);
    }

    /*
        * Signalement commentaire
    */
    if(isset($_POST['signalerCom'])){
        $comment->signTrue($_POST['idSignalementCom']);
        redirect_to('location:../controllers/post.php?id=' . $_POST['idArt']);
    }

    /*
        * Supprime un commentaire
    */
    if (isset($_GET['idC'])) {
        $comment->deleteC($_GET['idC']);
        redirect_to('location:../controllers/admin.php');
    }

    /*
        * Supprime une réponse
    */
    if (isset($_GET['idR'])) {
        $response->deleteR($_GET['idR']);
        redirect_to('location:../controllers/admin.php');
    }

    /*
        * Ajoute message
    */
    if (isset($_POST['subject'])) {
        $message->addMail(htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['subject']), htmlspecialchars($_POST['message']));
        redirect_to('location:../index.php');
    }
