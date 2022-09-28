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
                    <form action="#" method="POST" name="formulaire" enctype="multipart/form-data">
                    <?php foreach($tableau as $row)
                    {
                    ?>
                    <div class="d-flex d-flex justify-content-start ">
                        <div class=" mb-3 ">
                            <label for="titre" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="titre" placeholder="<?php echo $row->disc_title?>" disabled>
                        </div>
                    
                        <div class="position mb-3 ">
                            <label for="artiste" class="form-label ">Artiste</label>
                            <input type="text" class="form-control " id="artiste" placeholder="<?php echo $row->artist_name?>"disabled>
                        </div>
                    </div>
                    <div class="d-flex d-flex justify-content-start ">
                        <div class="  mb-3">
                            <label for="annee" class="form-label ">Année</label>
                            <input type="text" class="form-control" id="annee" placeholder="<?php echo $row->disc_year?>"disabled>
                        </div>
                        <div class=" position mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <input type="text" class="form-control" id="genre" placeholder="<?php echo $row->disc_genre?>"disabled>
                        </div>
                    </div>
                    <div class="d-flex d-flex justify-content-start ">
                        <div class="mb-3">
                            <label for="label" class="form-label">Label</label>
                            <input type="text" class="form-control" id="label" placeholder="<?php echo $row->disc_label?>"disabled>
                        </div>
                        <div class="position mb-3">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="text" class="form-control" id="prix" placeholder="<?php echo $row->disc_price?>"disabled>
                        </div>
                    </div>
                    <div >
                            <div>Picture</div>
                            <div><img src="assets/img/<?=$row->disc_picture; ?>" class ="image img-fluid rounded float-start "alt="assets/img/<?=$row->disc_picture; ?>"></div>
                    </div>
            </div>
                    <div class="d-flex justify-content-center">
                        <a href="index.php" class="  btn btn-outline-primary w-100 "  role="button" aria-pressed="true">Retour</a>
                        <a href="formulaireModifications.php?disc_id=<?=$row->disc_id?>" class="position2 btn btn-outline-warning w-100" role="button" aria-pressed="true">Modification</a>
                        <a href="scriptFormulaireSuppression.php?disc_id=<?=$row->disc_id?>"class="position2 btn btn-outline-danger w-100" name = "disc_id" role="button" aria-pressed="true">Supprimer</a>
                    </div>
                <?php
                }
                
                ?>






                </form>    
            </div>
        </div>
    
</section>










