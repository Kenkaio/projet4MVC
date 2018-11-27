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
        require('../models/modelCobdd.php');
            $db = dbConnect();
                if(isset($_POST['update'])){           
                    $req = $db->prepare('UPDATE articles SET contenu=? WHERE id=?');
                    $req->execute(array(
                        htmlspecialchars($_POST['contenuArt']),
                        $_POST['idArt']
                    ));     
                    redirect_to('location:mesArticles.php?id=' . $_POST['idArt']);
                }

                if(isset($_POST['supprimer'])){
                    $req = $db->prepare('DELETE FROM articles WHERE id=?');
                    $req->execute(array($_POST['idArt']));
                    redirect_to('location:../admin.php');
                }

                if(isset($_POST['validerArticle'])){
                    $req = $db->prepare('INSERT INTO articles (titre, contenu) VALUES (:titre, :contenu)');
                    $req->execute(array(
                        'titre' => htmlspecialchars($_POST['titre']), 
                        'contenu' => htmlspecialchars($_POST['contenu'])
                    )); 
                    redirect_to('location:../admin.php');
                }

                if(isset($_POST['deleteCom'])){
                    $req = $db->prepare('DELETE FROM commentaires WHERE id=?');
                    $req->execute(array($_POST['deleteCom']));                    
                    redirect_to('location:mesArticles.php?id=' . $_POST['idArt']);
                }

                if(isset($_POST['deleteRep'])){
                    $req = $db->prepare('DELETE FROM reponses WHERE id=?');
                    $req->execute(array($_POST['deleteRep']));
                    redirect_to('location:mesArticles.php?id=' . $_POST['idArt']);
                }

                if(isset($_POST['confirmEdit'])){
                    $req = $db->prepare('UPDATE commentaires SET contenu=? WHERE id=?');
                    $req->execute(array(
                        $_POST['contenuCom'],
                        $_POST['confirmEdit']
                    ));
                    redirect_to('location:mesArticles.php?id=' . $_POST['idArt']); 
                }

                if(isset($_POST['confirmRepEdit'])){
                    $req = $db->prepare('UPDATE reponses SET contenuRep=? WHERE id=?');
                    $req->execute(array(
                        $_POST['contenuRep'],
                        $_POST['confirmRepEdit']
                    )); 
                    redirect_to('location:mesArticles.php?id=' . $_POST['idArt']);
                }

                if(isset($_POST['confirmRepCom'])){
                    $req = $db->prepare('INSERT INTO reponses (idArt, auteurRep, contenuRep) VALUES (:idArt, :auteurRep, :contenuRep)');
                    $req->execute(array(
                        'idArt' => $_POST['idCom'], 
                        'auteurRep' => htmlspecialchars($_POST['auteurCom']), 
                        'contenuRep' => htmlspecialchars($_POST['reponseCom']),
                    ));
                    redirect_to('location:../controllers/post.php?id=' . $_POST['idArt']);
                }  

                if(isset($_POST['signalerCom'])){
                    $req = $db->prepare('UPDATE commentaires SET signalements=signalements+1  WHERE id=?');
                    $req->execute(array(
                        $_POST['idSignalementCom']
                    )); 
                    redirect_to('location:../controllers/post.php?id=' . $_POST['idArt']);
                }  

                if(isset($_POST['signalerRep'])){
                    $req = $db->prepare('UPDATE reponses SET signalementsRep=signalementsRep+1  WHERE id=?');
                    $req->execute(array(
                        $_POST['idSignalementCom']
                    )); 
                    redirect_to('location:../controllers/post.php?id=' . $_POST['idArt']);
                }    

                if(isset($_POST['confirmerAjoutCom'])){
                    $req = $db->prepare('INSERT INTO commentaires (idArticle, auteur, contenu) VALUES (:idArticle, :auteur, :contenu)');
                    $req->execute(array(
                        'idArticle' => htmlspecialchars($_POST['idArt']), 
                        'auteur' => htmlspecialchars($_POST['auteurCom']), 
                        'contenu' => htmlspecialchars($_POST['contenuCom'])
                    )); 
                    redirect_to('location:../controllers/post.php?id=' . $_POST['idArt']);
                } 

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

                ob_end_flush();         
       		?>
    </div>    
</nav>