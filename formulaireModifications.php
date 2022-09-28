<?php
require_once('connectionDb.php');
$db=connect();
include('header.php');


$disc_id = $_GET["disc_id"];



$requete = $db->prepare("SELECT * FROM disc d JOIN artist a ON d.disc_id = a.artist_id WHERE a.artist_id =".$disc_id);
$requete->execute();
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
?>

<section>
    <div class="container py-5 bg-light">
        <div class="row">
            <h2>Détails</h2>
            <div class=" details col-md-4 col-md-4">
                    <form action="scriptDeformulaireModification.php" method="POST" name="formulaire" enctype="multipart/form-data">
                    <?php foreach($tableau as $row)
                    {
                        var_dump($row);
                    ?>
                    <div class="mb-3">
                        <label for="disc_id" class="form-label"></label>
                        <input type="text"  class="form-control" id="id" hidden value="<?php  echo $row->disc_id?>" name="disc_id">
                    </div>

                    <div class="d-flex d-flex justify-content-start ">
                        <div class=" mb-3 ">
                            <label for="titre" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="titre"  value="<?php echo $row->disc_title?>" name= "disc_title">
                        </div>
                        
                    
                        <div class="position mb-3 ">
                            <label for="artiste" class="form-label ">Artiste</label>
                            <input type="text" class="form-control " id="artiste" value="<?php echo $row->artist_name?>" name="artist_name">
                        </div>
                    </div>
                    <div class="d-flex d-flex justify-content-start ">
                        <div class="  mb-3">
                            <label for="annee" class="form-label ">Année</label>
                            <input type="text" class="form-control" id="annee" value="<?php echo $row->disc_year?>" name="disc_year">
                        </div>
                        <div class=" position mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <input type="text" class="form-control" id="genre" value="<?php echo $row->disc_genre?>" name="disc_genre">
                        </div>
                    </div>
                    <div class="d-flex d-flex justify-content-start ">
                        <div class="mb-3">
                            <label for="label" class="form-label">Label</label>
                            <input type="text" class="form-control" id="label" value="<?php echo $row->disc_label?>"name="disc_label">
                        </div>
                        <div class="position mb-3">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="text" class="form-control" id="prix" value="<?php echo $row->disc_price?>" name="disc_price">
                        </div>
                    </div>
                    <div >
                            <div>Picture</div>
                            <div><img src="assets/img/<?=$row->disc_picture; ?>" class ="image img-fluid rounded float-start " name = "disc_picture" alt="assets/img/<?=$row->disc_id; ?>" ></div>
                    </div>
                    <div class="input-group mb-3">
                        <label for="telecharger"></label>
                        <input type="file" class="form-control" id="telecharger" name = "telecharger" value=""  aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                    </div>

        </div>
                    <div class="d-flex justify-content-center">
                        <a href="index.php" class="  btn btn-outline-primary w-100 " value= "retour"  role="button" aria-pressed="true">Retour</a>
                        <input class="position2 btn btn-outline-warning w-100"  type="submit" name= "submit" role="button" value= "Valider" aria-pressed="true"></a>
                    </div>
                <?php
                }
                ?>
                </form>  
                
            </div>
    </div>
    


</section>

</body>
</html>