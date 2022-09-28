<?php
require_once('connectionDb.php');
$db=connect();
include('header.php');


/* if(isset($_POST['titre'])) 
    {
        $titre = $_POST['titre'];
    }
    else  $titre = NULL;

    if(isset($_POST['annee'])) 
    {
        $annee = $_POST['annee'];
    }
    else  $annee = NULL;

    if(isset($_POST['label'])) 
    {
        $label = $_POST['label'];
    }
    else  $label = NULL;

    if(isset($_POST['genre'])) 
    {
        $genre = $_POST['genre'];
    }
    else  $genre = NULL;

    if(isset($_POST['prix'])) 
    {
        $prix = $_POST['prix'];
    }
    else  $prix = NULL;
*/ 

//declaration des variables pour la table artist
//$artist_id = htmlentities(trim($_POST['artist_id']));

//requete preparé 

//$artist=$db->prepare("SELECT artist_id 
                   // FROM artist)");

//on lie chaque marqueur a sa valeur

//$artist->bindValue('artist_id',$artist_id);
//$artist->execute();

//recuperation du dernier id inserer pour la table artist
//$artist_id= $db->lastInsertId();



/* ************************************************************/
//declaration des variables pour la table disc
$titre = htmlentities(trim($_POST['disc_title']));
$annee = htmlentities(trim($_POST['disc_year']));
$genre = htmlentities(trim($_POST['disc_genre']));
$label = htmlentities(trim($_POST['disc_label']));
$prix = htmlentities(trim($_POST['disc_price']));
$artist_id = htmlentities(trim($_POST['artist_id']));
var_dump($titre);


// basename() peut empêcher les attaques "filesystem traversal";
//declaration variable pour ajouter l'image
$filename = basename($_FILES['telecharger']['name']);
$tempname = $_FILES['telecharger']['tmp_name'];
$folder = "assets/img/".$filename;

//requete preparé
$pdoStat =$db->prepare("INSERT INTO disc (disc_title,disc_year,disc_genre,disc_label,disc_price,artist_id,disc_picture)
                        VALUES (:disc_title,:disc_year,:disc_genre,:disc_label,:disc_price,:artist_id,:disc_picture)");

// on lie chaque marqueur à une valeur

$pdoStat->bindValue(':disc_title',$titre);
$pdoStat->bindValue(':disc_year',$annee,PDO::PARAM_INT);
$pdoStat->bindValue(':disc_genre',$genre);
$pdoStat->bindValue(':disc_label',$label);
$pdoStat->bindValue(':disc_price',$prix,PDO::PARAM_INT);
$pdoStat->bindValue(':artist_id',$artist_id,PDO::PARAM_INT);
$pdoStat->bindValue(':disc_picture',$filename);


$pdoStat->execute();



//***************************************************************************

//partie pour inserer une photo

//Déplaçons maintenant l'image téléchargée dans le dossier : img

//Déplaçons maintenant l'image téléchargée dans le dossier : img
if (move_uploaded_file($tempname, $folder)) 
{
    echo "<h3>  Image uploaded successfully!</h3>";
} 
else 
{
    echo "<h3>  Failed to upload image!</h3>";
}


























/*  if(isset($_POST["submit"]))
    {
        $maxsizeSize=50000;

        if ($_FILES['fichier']['error'] > 0) 
        {
            echo "une erreure est survenue lors du transfert";
            die;
        }

        if ($_FILES['fichier']['size'] > $maxsize) 
        {
            echo "le fichier est trop gros";
            die;
        }

    }*/ 
