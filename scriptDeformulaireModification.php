<?php
require_once('connectionDb.php');
$db=connect();
include('header.php');
$disc_id = $_POST["disc_id"];
if(!empty($_POST['disc_id']))
{
    $disc_id = $_REQUEST['disc_id'];
    
}

//declaration des variables
$titre = htmlentities(trim($_POST['disc_title']));
$nom = htmlentities(trim($_POST['artist_name']));
$annee = htmlentities(trim($_POST['disc_year']));
$genre = htmlentities(trim($_POST['disc_genre']));
$label = htmlentities(trim($_POST['disc_label']));
$prix = htmlentities(trim($_POST['disc_price']));




//requete préparé

$requete = $db->prepare("UPDATE disc d 
                        INNER JOIN artist a
                        ON d.disc_id = a.artist_id
                        SET  d.disc_title = :disc_title, a.artist_name = :artist_name, d.disc_year = :disc_year, d.disc_genre = :disc_genre,
                             d.disc_label = :disc_label , d.disc_price = :disc_price
                        WHERE d.disc_id = :id");
$requete->bindValue(':disc_title',$titre);
$requete->bindValue(':artist_name',$nom);
$requete->bindValue(':disc_year',$annee,PDO::PARAM_INT);
$requete->bindValue(':disc_genre',$genre);
$requete->bindValue(':disc_label',$label);
$requete->bindValue(':disc_price',$prix,PDO::PARAM_STR);
$requete->bindValue(':id',$disc_id,PDO::PARAM_INT);
$requete->execute();



//enregistrer une image



// Si le bouton de submit est cliqué ...


    // basename() peut empêcher les attaques "filesystem traversal";
    $filename = basename($_FILES['telecharger']['name']);
    $tempname = $_FILES['telecharger']['tmp_name'];
    $folder = "assets/img/".$filename;

    //Obtenez toutes les données de l'image soumises à partir du formulaire
    $sql = $db->prepare("UPDATE disc SET disc_picture = :disc_picture WHERE disc_id = :id");
    $sql->bindValue(':disc_picture',$filename);
    $sql->bindValue(':id',$disc_id,PDO::PARAM_INT);
    $sql->execute();
    
    
    //Déplaçons maintenant l'image téléchargée dans le dossier : img
    if (move_uploaded_file($tempname, $folder)) 
    {
        echo "<h3>  Image uploaded successfully!</h3>";
    } 
    else 
    {
        echo "<h3>  Failed to upload image!</h3>";
    }

    





var_dump($_POST);
$requete->closeCursor();//on ferme la bdd
//header("Location: index.php");//revois sur modification.php l'id de l'annonce












