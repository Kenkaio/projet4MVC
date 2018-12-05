<?php
ob_start();
function redirect_to($url){
    header($url);
    exit();
}
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
?>
<!-- Ajout / Suppresion / Update de l'article sélectionné avec id -->
<?php
        require('../models/modelCoBdd.php');
            $db = dbConnect();
                /*------- Mise à jour article ------*/
                if(isset($_POST['update'])){           
                    $req = $db->prepare('UPDATE articles SET contenu=? WHERE id=?');
                    $req->execute(array(
                        htmlspecialchars($_POST['contenuArt']),
                        $_POST['idArt']
                    ));     
                    redirect_to('location:mesArticles.php?id=' . $_POST['idArt']);
                }

                /*------- Envoi mail ------*/
                if (isset($_POST['subject'])) {
                    $message = htmlspecialchars($_POST['message']);
                    $from = htmlspecialchars($_POST['mail']);
                    $subject = htmlspecialchars($_POST['subject']);
                    $nom = htmlspecialchars($_POST['nom']);
                    $headers = 'From: '. $from ."\n" .
                    'Reply-To: matcrid@hotmail.fr' . "\n" .
                    'X-Mailer: PHP/' . phpversion();
                    $req = $db->prepare('INSERT INTO message (expe, subject, text) VALUES (:expe, :subject, :text)');
                    $req->execute(array(
                        'expe' => $from, 
                        'subject' => $subject,
                        'text' => $message
                    ));
                    mail('matcrid@hotmail.fr', $subject, $message);
                    redirect_to('location:../index.php');
                }

                /*------- supression article ------*/
                if(isset($_POST['supprimer'])){
                    $req = $db->prepare('DELETE FROM articles WHERE id=?');
                    $req->execute(array($_POST['idArt']));
                    redirect_to('location:../admin.php');
                }

                /*------- Création article ------*/
                if(isset($_POST['validerArticle'])){
                    $req = $db->prepare('INSERT INTO articles (titre, contenu) VALUES (:titre, :contenu)');
                    $req->execute(array(
                        'titre' => htmlspecialchars($_POST['titre']), 
                        'contenu' => htmlspecialchars($_POST['contenu'])
                    )); 
                    redirect_to('location:../admin.php');
                }
                
                /*------- Ajout réponse commentaire ------*/
                if(isset($_POST['confirmRepCom'])){
                    $req = $db->prepare('INSERT INTO reponses (idArt, auteurRep, contenuRep) VALUES (:idArt, :auteurRep, :contenuRep)');
                    $req->execute(array(
                        'idArt' => $_POST['idCom'], 
                        'auteurRep' => htmlspecialchars($_POST['auteurCom']), 
                        'contenuRep' => htmlspecialchars($_POST['reponseCom']),
                    ));
                    redirect_to('location:../controllers/post.php?id=' . $_POST['idArt']);
                }  

                /*------- Signalement commentaire ------*/
                if(isset($_POST['signalerCom'])){
                    $req = $db->prepare('UPDATE commentaires SET signalements=signalements+1  WHERE id=?');
                    $req->execute(array(
                        $_POST['idSignalementCom']
                    )); 
                    redirect_to('location:../controllers/post.php?id=' . $_POST['idArt']);
                } 

                /*------- Ajout commentaire ------*/
                if(isset($_POST['confirmerAjoutCom'])){
                    $req = $db->prepare('INSERT INTO commentaires (idArticle, auteur, contenu) VALUES (:idArticle, :auteur, :contenu)');
                    $req->execute(array(
                        'idArticle' => htmlspecialchars($_POST['idArt']), 
                        'auteur' => htmlspecialchars($_POST['auteurCom']), 
                        'contenu' => htmlspecialchars($_POST['contenuCom'])
                    )); 
                    redirect_to('location:../controllers/post.php?id=' . $_POST['idArt']);
                } 

                /*------- Suppression commentaire ou réponse ------*/
                if (isset($_POST['data'])) {    

                    $data = $_POST['data'];

                    if (substr($data, 6, -2) == 'Com'){
                        $db = dbConnect();
                        $req = $db->prepare('UPDATE commentaires SET nouveau=0 WHERE id=?');
                        $req->execute(array(
                            substr($data, 9)
                        ));
                    }
                    else if (substr($data, 6, -2) == 'Rep'){
                        $db = dbConnect();
                        $req = $db->prepare('UPDATE reponses SET nouveau=0 WHERE id=?');
                        $req->execute(array(
                            substr($data, 9)
                        ));
                    }
                }
                /* ------- Affichage des messages -------*/
                if (isset($_POST['mes'])) {
                    $mes = $_POST['mes'];
                    $db = dbConnect();
                    $req = $db->prepare('UPDATE message SET nouveau=0 WHERE id=?');
                    $req->execute(array(
                        substr($mes, 9)
                    ));
                    redirect_to('location:../controllers/admin.php');
                }

                if (isset($_GET['idC'])) {
                    $req = $db->prepare('DELETE FROM commentaires WHERE id=?');
                    $req->execute(array($_GET['idC']));
                    redirect_to('location:../controllers/admin.php');
                }

                if (isset($_GET['idR'])) {
                    $req = $db->prepare('DELETE FROM reponses WHERE id=?');
                    $req->execute(array($_GET['idR']));
                    redirect_to('location:../controllers/admin.php');
                }

                if (isset($_GET['sign'])) {
                    $req = $db->prepare('DELETE FROM commentaires WHERE id=?');
                    $req->execute(array($_GET['sign']));
                    redirect_to('location:../controllers/admin.php');
                }

                /* ------- Affichage message spec --------*/
                if (isset($_POST['deleteMsg'])) {
                    $req = $db->prepare('DELETE FROM reponses WHERE id=?');
                    $req->execute(array($_GET['idR']));
                    redirect_to('location:../controllers/admin.php');
                }
                ob_end_flush();         
       		?>
    </div>    
</nav>